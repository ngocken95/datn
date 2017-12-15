<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importwh_Model extends CI_Model {

    public function get_code(){
        $sql='SELECT MAX(REPLACE(code , \'PN-\', \'\')) as code FROM bill WHERE type=\'IMPORT\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            return $rs->row_array()['code'];
        }
        else{
            return 0;
        }
    }

    public function get_list($find){
        if($find!=''){
            $cond='and code LIKE \'%'.$find.'%\'';
        }
        else{
            $cond='';
        }
        $sql='SELECT bill.*,account.name as name
FROM bill 
JOIN account ON bill.account_id=account.id
WHERE bill.is_show=1 and account.is_show=1 and type=\'IMPORT\''.$cond;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function get_product_color(){
        $sql='SELECT product_color.*,product.name as product,color.name as color
                FROM product_color
                JOIN product ON product_color.product_id=product.id
                JOIN color ON product_color.color_id=color.id
                WHERE product.is_show=1 and product_color.is_show=1 and color.is_show=1
                ORDER BY product.name
                ';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function add_bill($code,$date){
        $data=array(
            'code'=>$code,
            'created'=>$date,
            'is_show'=>1,
            'type'=>'IMPORT',
            'account_id'=>$this->session->userdata('user')['id']
        );
        $this->db->trans_start();
        $this->db->insert('bill',$data);
        $add=$this->db->insert_id();
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: '.$code,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function add_detail_bill($id,$product,$quantity,$price){
        $data=array(
          'bill_id'=>$id,
            'is_show'=>1
        );
        $total=0;
        $this->db->trans_start();
        foreach ($product as $key=>$item) {
            $data['product_color_id']=$item;
            $data['quantity']=$quantity[$key];
            $data['price']=$price[$key];
            $data['total']=$data['quantity']*$data['price'];
            $total+=$data['quantity']*$data['price'];
            //update giá trung bình,số lượng sản phẩm
            $sql='SELECT * FROM product_color WHERE is_show=1 and id='.$item;
            $rs=$this->db->query($sql);
            $avg_new=($rs->row_array()['price_avg']*$rs->row_array()['quantity']+$data['price']*$data['quantity'])/($rs->row_array()['quantity']+$data['quantity']);
            $quantity_new=$rs->row_array()['quantity']+$data['quantity'];
            $data_update=array(
                'price_avg'=>$avg_new,
                'quantity'=>$quantity_new
            );
            $this->db->update('product_color',$data_update," id=".$item);
            $this->db->insert('detail_bill',$data);
            $add=$this->db->insert_id();
        }
        //update total hóa đơn
        $data_bill=array(
            'total'=>$total
        );
        $this->db->update('bill',$data_bill,' id='.$id);
        $this->db->trans_complete();
        return $add;
    }

    public function check_id($id){
        $sql='SELECT * FROM bill WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_detail_bill_by_id($id_bill){
        $sql='SELECT detail_bill.*,product.name as name,color.name as color 
FROM detail_bill
 JOIN product_color ON detail_bill.product_color_id=product_color.id
 JOIN product ON product.id=product_color.product_id
 JOIN color ON color.id=product_color.color_id
 WHERE detail_bill.is_show=1 and product_color.is_show=1 and product.is_show=1 and color.is_show=1 and bill_id='.$id_bill;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_bill_by_id($id){
        $sql='SELECT bill.*,account.name as name 
FROM bill
 JOIN account ON bill.account_id=account.id
 WHERE bill.is_show=1 and account.is_show=1 and bill.id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }
}
            