<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {

    public function get_list(){
        $sql='SELECT customer_order.*,account.name as username FROM customer_order
 LEFT JOIN account ON customer_order.account_id=account.id
 WHERE customer_order.is_show=1 ORDER BY customer_order.status';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function check_md5($md5){
        $sql='SELECT * FROM customer_order WHERE md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_order_by_md5($md5){
        $sql='SELECT customer_order.*,account.name as account_name FROM customer_order JOIN account ON account.id=customer_order.account_id WHERE customer_order.md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function get_list_product($id){
        $sql='SELECT detail_order.*,product.name as product,color.name as color FROM detail_order 
JOIN customer_order ON customer_order.id=detail_order.order_id
JOIN product_color ON detail_order.product_color_id=product_color.id
JOIN product ON product.id=product_color.product_id
JOIN color ON product_color.color_id=color.id
WHERE detail_order.order_id=
'.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function update_user($md5){
        $data=array(
            'account_id'=>$this->session->userdata('user')['id'],
            'status'=>'WH',
            'time'=>getdate()[0],
            'check_new'=>0
        );
        $this->db->trans_start();
        $add=$this->db->update('customer_order',$data,"md5='$md5'");
        $this->db->trans_complete();
        return $add;
    }

    public function delete($md5){
        $data=array('is_show'=>0);
        $this->db->trans_start();
        $add=$this->db->update('customer_order',$data,"id='$md5'");
        $this->db->trans_complete();
        return $add;
    }

    public function get_list_del(){
        $sql='SELECT * FROM customer_order WHERE is_show=0';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }
}
            