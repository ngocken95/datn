<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_Model extends CI_Model {

    public function get_list($find){
        $cond='is_show=1';
        if($find!=''){
            $cond.=' and (code LIKE \'%'.$find.'%\' or name LIKE\'%'.$find.'%\')';
        }
        $sql='SELECT * FROM brand WHERE '.$cond;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function check_md5($md5){
        $sql='SELECT * FROM brand WHERE md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }


    public function get_brand_by_md5($md5){
        $sql='SELECT * FROM brand WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function edit_brand($md5,$name){
        $data=array('name'=>$name);
        $brand=self::get_brand_by_md5($md5);
        $this->db->trans_start();
        $update=$this->db->update('brand',$data,"md5='$md5'");
        $content='
<h4>Sửa thương hiệu</h4>
<table>
<thead>
<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>
</thead>
<tbody>
<tr><td>'.$brand['name'].'</td><td>'.$name.'</td></tr>
</tbody>
</table>';
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'CHANGE',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $update;
    }

    public function check_product($md5){
        $sql='SELECT * 
        FROM brand 
        JOIN product ON brand.id=product.brand_id
        WHERE brand.is_show=1 and brand.md5=\''.$md5.'\'
        ';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($md5){
        $data=array('is_show'=>0);
        $brand=self::get_brand_by_md5($md5);
        $content='
<h4>Xóa thương hiệu</h4>
<table>
<thead>
<tr><th>Thông tin thương hiệu</th></tr>
</thead>
<tbody>
<tr><td>'.$brand['name'].'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $update=$this->db->update('brand',$data,"md5='$md5'");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'DELETE',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $update;
    }

    public function check_code($code){
        $sql='SELECT * FROM brand WHERE code=\''.$code.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_brand($code,$name,$img){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'logo'=>$img,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $content='
<h4>Thêm thương hiệu</h4>
<table>
<thead>
<tr><th>Thông tin thương hiệu</th></tr>
</thead>
<tbody>
<tr><td>'.$code.'</td></tr>
<tr><td>'.$name.'</td></tr>
<tr><td>'.$img.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $this->db->insert('brand',$data);
        $add=$this->db->insert_id();
        $add=$this->db->update('brand',array('md5'=>md5($add)),'id='.$add);
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

}
            