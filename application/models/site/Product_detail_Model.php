<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_detail_Model extends CI_Model {

    public function check_id($id){
        $sql='SELECT * FROM product WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_product_by_id($id){
        $sql='SELECT product.*,brand.name as brand 
            FROM product JOIN brand ON brand.id=product.brand_id
            WHERE product.is_show=1 and product.id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

    public function get_list_color_product($id){
        $sql='SELECT product_color.*,color.code as color_code,color.name as color 
            FROM product_color 
            JOIN color ON product_color.color_id=color.id
            WHERE product_color.is_show=1 and product_color.product_id='.$id
        ;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_list_product($id){
        $rs=$this->db->query('SELECT product_id FROM product_color WHERE id='.$id);
        $product_id=$rs->row_array()['product_id'];
        $rs1=$this->db->query('SELECT brand_id FROM product JOIN product_color ON product.id=product_color.product_id WHERE product_color.id='.$id);
        $brand=$rs1->row_array()['brand_id'];
        $rs2=$this->db->query('SELECT product_type_id FROM product JOIN product_color ON product.id=product_color.product_id WHERE product_color.id='.$id);
        $type=$rs2->row_array()['product_type_id'];
        $sql='SELECT * 
        FROM product 
        WHERE id<>'.$product_id.' AND 
         product.brand_id='.$brand.' AND 
         product.product_type_id='.$type.'
         ORDER BY product_view DESC LIMIT 0,4';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function update_view($id){
        $sql='SELECT * FROM product WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            $view=$rs->row_array()['product_view'];
        }
        $view++;
        $data=array('product_view'=>$view);
        $this->db->trans_start();
        $this->db->update('product',$data,"id=".$id);
        $this->db->trans_complete();
    }
}
            