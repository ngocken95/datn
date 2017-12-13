<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

    public function check_id($id,$type){
        $sql='SELECT * FROM '.$type.' WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_type_by_id($id){
        $sql='SELECT * FROM product_type WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

    public function get_brand_by_id($id){
        $sql='SELECT * FROM brand WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

    public function get_list_product($id,$type){
        $sql='SELECT * FROM product WHERE is_show=1 and '.$type.'='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }
}
            