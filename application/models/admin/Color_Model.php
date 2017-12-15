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
        $this->db->trans_start();
        $this->db->insert('color',$data);
        $add=$this->db->insert_id();
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>'Thêm màu son<br>Màu son thêm: '.$name,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function check_id($id){
        $sql='SELECT * FROM color WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_item_by_id($id){
        $sql='SELECT * FROM color WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function edit_color($id,$code,$name){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $update=$this->db->update('color',$data," id=".$id);
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'CHANGE',
            'is_show'=>1,
            'content'=>'Sửa màu son<br>Màu son sửa: '.$name,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $update;
    }

    public function check_color($id_color){
        //check xem có sản phẩm nào có màu này không
        $sql_list_product='SELECT * FROM product_color WHERE is_show=1 and color_id='.$id_color;
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

    public function delete_color($id_color){
        $data=array(
            'is_show'=>0
        );
        $this->db->trans_start();
        $update=$this->db->update('color',$data," id=".$id_color);
        $this->db->update('product_color',$data," color_id=".$id_color);
        $sql='SELECT * FROM color WHERE id='.$id_color;
        $rs=$this->db->query($sql);
        $name=$rs->row_array()['name'];
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'DELETE',
            'is_show'=>1,
            'content'=>'Xóa màu son<br>Màu son bị xóa: '.$name,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $update;
    }
}
            