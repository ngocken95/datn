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

    public function get_code_order(){
        $sql='SELECT MAX(REPLACE(code , \'DH-\', \'\')) as code FROM customer_order WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            return $rs->row_array()['code'];
        }
        else{
            return 0;
        }
    }

    public function add_order($name,$email,$phone,$address,$note,$code,$total){
        $data=array(
            'code'=>$code,
            'is_show'=>1,
            'created'=>getdate()[0],
            'cus_name'=>$name,
            'cus_email'=>$email,
            'cus_phone'=>$phone,
            'cus_address'=>$address,
            'cus_note'=>$note,
            'total'=>$total,
            'status'=>'ORDER'
        );
        $this->db->trans_start();
        $this->db->insert('customer_order',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }

    public function add_detail($order){
        $data=array(
            'order_id'=>$order,
            'is_show'=>1
        );
        $this->db->trans_start();
        foreach ($this->cart->contents() as $product){
            $data['product_color_id']=$product['id'];
            $data['quantity']=$product['qty'];
            $data['price']=$product['price'];
            if(!self::update_buy($product['id'],$product['qty'])){
                return false;
            }
            $add=$this->db->insert('detail_order',$data);
        }
        $this->db->trans_complete();
        return $add;
    }

    public function update_buy($id,$qty){
        $sql='SELECT product.product_buy as buy,product.id as id FROM product JOIN product_color ON product.id=product_color.product_id WHERE product.is_show=1 and product_color.id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            $buy=$rs->row_array()['buy'];
            $id_product=$rs->row_array()['id'];
            $buy+=$qty;
            $data=array('product_buy'=>$buy);
            $this->db->trans_start();
            $update=$this->db->update('product',$data,'id='.$id_product);
            $this->db->trans_complete();
            return $update;
        }
        else{
            return false;
        }
    }
}
            