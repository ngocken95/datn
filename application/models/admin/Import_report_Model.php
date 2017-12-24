<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_report_Model extends CI_Model {

    public function get_list_product(){
        $sql='SELECT product.id,product.code,product.name,sum(detail_order.quantity) as qty FROM detail_order JOIN product_color ON detail_order.product_color_id=product_color.id
JOIN product ON product.id=product_color.product_id
WHERE product.is_show=1
        GROUP BY product.id';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

}
            