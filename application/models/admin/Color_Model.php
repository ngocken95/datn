<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color_Model extends CI_Model {

    public function get_list($find){
        $sql='SELECT * FROM color WHERE is_show=1 and (code LIKE \'%'.$find.'%\' or name_vi LIKE \'%'.$find.'%\')';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function check_code($code){
        $sql='SELECT * FROM color WHERE code=\''.$code.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_color($code,$name){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $content='
<h4>Thêm màu son</h4>
<table>
<thead>
<tr><th>Thông tin màu son</th></tr>
</thead>
<tbody>
<tr><td>'.$code.'</td></tr>
<tr><td>'.$name.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $this->db->insert('color',$data);
        $add=$this->db->insert_id();
        $this->db->update('color',array('md5'=>md5($add)),'id='.$add);
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

    public function check_md5($md5){
        $sql='SELECT * FROM color WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_item_by_md5($md5){
        $sql='SELECT * FROM color WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function edit_color($md5,$code,$name){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $color=self::get_item_by_md5($md5);
        $content='
<h4>Sửa màu son</h4>
<table>
<thead>
<tr><th>Màu son cũ</th><th>Màu son mới</th></tr>
</thead>
<tbody>
<tr><td>'.$color['code'].'</td><td>'.$code.'</td></tr>
<tr><td>'.$color['name'].'</td><td>'.$name.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $update=$this->db->update('color',$data," md5='$md5'");
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

    public function check_color($md5){
        //giá trị trả về =true có thể xóa.=false không cho xóa
        //check xem có sản phẩm nào có màu này không
        $sql_list_product='SELECT * FROM product_color JOIN color ON product_color.color_id=color.id WHERE color.is_show=1 and color.md5=\''.$md5.'\'';
        $rs=$this->db->query($sql_list_product);
        if($rs->num_rows()>0){
            $list_product=$rs->result_array();
            //check trong bill
            foreach ($list_product as $product){
                $sql_bill='SELECT * FROM detail_bill WHERE is_show=1 and product_color_id='.$product['id'];
                $rs_bill=$this->db->query($sql_bill);
                if($rs_bill->num_rows()>0){
                    return false;
                }
            }
            //check trong order
            foreach ($list_product as $product){
                $sql_bill='SELECT * FROM detail_order WHERE is_show=1 and product_color_id='.$product['id'];
                $rs_bill=$this->db->query($sql_bill);
                if($rs_bill->num_rows()>0){
                    return false;
                }
            }
            return true;
        }
        else{
            return true;
        }
    }

    public function delete_color($md5){
        $data=array(
            'is_show'=>0
        );
        $this->db->trans_start();
        $color=self::get_item_by_md5($md5);
        $content='
<h4>Xóa màu son</h4>
<table>
<thead>
<tr><th>Thông tin màu son</th></tr>
</thead>
<tbody>
<tr><td>'.$color['code'].'</td></tr>
<tr><td>'.$color['name'].'</td></tr>
<tr><td>'.$color['img'].'</td></tr>
</tbody>
</table>';
        $this->db->update('product_color',$data," color_id=".$color['id']);
        $update=$this->db->update('color',$data," md5=".'\''.$color['md5'].'\'');
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
}
            