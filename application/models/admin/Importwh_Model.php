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
        $sql='SELECT * FROM bill WHERE is_show=1 and code LIKE \'%'.$find.'%\' and type=\'IMPORT\'';
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
}
            