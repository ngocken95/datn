<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_Model extends CI_Model {

    public function add_item($product,$qty,$price){
        $data=array(
            "id" => $product['id'],
            "name" => $product['product_name'],
            "qty" => $qty,
            "price" => $price,
            "option" => array(
                "color" => $product['color_name'],
                "img"=>$product['img']
            ),
        );
        if($this->cart->insert($data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_product_by_id($id){
        $sql='SELECT product_color.*,product.img_cover as img,product.name as product_name,color.name as color_name
FROM product_color 
JOIN product ON product_color.product_id=product.id
JOIN color ON product_color.color_id=color.id
WHERE product.is_show=1 and product_color.id=
'.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }
}
            