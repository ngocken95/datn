<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_best_Model extends CI_Model {

    public function get_list_product_best($from_date,$to_date){
        $d=new DateTime($from_date);
        $date_first=$d->getTimestamp();
        $d=new DateTime($to_date);
        $date_last=$d->getTimestamp()+86400;
        $sql='SELECT product.id,product.code,product.name,sum(detail_order.quantity) as qty,sum(detail_order.quantity*detail_order.price) as total FROM detail_order JOIN product_color ON detail_order.product_color_id=product_color.id
JOIN customer_order ON customer_order.id=detail_order.order_id
JOIN product ON product.id=product_color.product_id
WHERE product.is_show=1 and customer_order.time BETWEEN '.$date_first.' and '.$date_last.' 
        GROUP BY product.id
        ORDER BY detail_order.quantity DESC';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

}
            