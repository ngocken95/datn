<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_Model extends CI_Model {

    public function get_brand(){
        $sql='SELECT * FROM brand WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_type_product(){
        $sql='SELECT * FROM product_type WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_price(){
        $sql='SELECT max(price*(100-discount)) as max,min(price*(100-discount)) as min FROM product WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function get_list_product($find,$sort,$type_product,$brand,$price_min,$price_max,$item_start){
        $cond='is_show=1 and hide=1';
        if($find!=''){
            $cond.=' and name_vi LIKE \'%'.$find.'%\' ';
        }
        if($type_product!=''){
            $cond.=' and product_type_id='.$type_product;
        }
        if($brand!=''){
            $cond.=' and brand_id='.$brand;
        }
        $cond.=' and price*(100-discount)/100 BETWEEN '.$price_min.' and '.$price_max;
        $cond.=' ORDER BY price*(100-discount)/100 '.$sort;

        $cond.=' LIMIT '.$item_start.',4';
        $sql='SELECT * FROM product WHERE '.$cond;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

}
            