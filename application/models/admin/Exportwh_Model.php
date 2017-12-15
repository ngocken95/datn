<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exportwh_Model extends CI_Model
{

    public function get_code()
    {
        $sql = 'SELECT MAX(REPLACE(code , \'PX-\', \'\')) as code FROM bill WHERE type=\'EXPORT\' and is_show=1';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() == 1) {
            return $rs->row_array()['code'];
        } else {
            return 0;
        }
    }

    public function get_list_bill()
    {
        $sql = 'SELECT bill.*,account.name as name FROM bill JOIN account ON bill.account_id=account.id WHERE bill.is_show=1 and type=\'EXPORT\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function check_wh($list_order){
        $this->db->trans_start();
        $list=implode(',',$list_order);
        $sql='SELECT detail_order.*,product_color.quantity as quantity_wh 
FROM detail_order 
        JOIN product_color ON detail_order.product_color_id=product_color.id
        WHERE detail_order.is_show=1 and product_color.is_show=1 and order_id in ('.$list.')';
        $rs=$this->db->query($sql);
        $list=array();
        if($rs->num_rows()>0){
            foreach ($rs->result_array() as $product){
                if(empty($list[$product['order_id']])){
                    if($product['quantity_wh']-$product['quantity']>0){
                        $list[$product['order_id']][0]['product_color_id']=$product['product_color_id'];
                        $list[$product['order_id']][0]['check']=1;
                    }
                    else{
                        $list[$product['order_id']][0]['product_color_id']=$product['product_color_id'];
                        $list[$product['order_id']][0]['check']=0;
                    }
                }
                else{
                    $k=count($list[$product['order_id']]);
                    if($product['quantity_wh']-$product['quantity']>0){
                        $list[$product['order_id']][$k]['product_color_id']=$product['product_color_id'];
                        $list[$product['order_id']][$k]['check']=1;
                    }
                    else{
                        $list[$product['order_id']][$k]['product_color_id']=$product['product_color_id'];
                        $list[$product['order_id']][$k]['check']=0;
                    }
                }
            }
            return $list;
        }
        else{
            return null;
        }
        $this->db->trans_complete();
    }

    public function create_bill_export($code,$created){
        $data=array(
            'code'=>$code,
            'created'=>$created,
            'is_show'=>1,
            'type'=>'EXPORT',
            'account_id'=>$this->session->userdata('user')['id']
        );
        $this->db->trans_start();
        $this->db->insert('bill',$data);
        $add=$this->db->insert_id();
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>'Thêm hóa đơn xuất<br>Mã hóa đơn xuất: '.$code,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function add_detail_bill($id,$list_order){
        $data_insert=array(
            'bill_id'=>$id,
            'is_show'=>1
        );
        $total=0;
        $this->db->trans_start();
        $order=implode(',',$list_order);
        $sql='SELECT * FROM detail_order 
            JOIN customer_order ON detail_order.order_id=customer_order.id 
            WHERE customer_order.id in('.$order.')';
        $rs=$this->db->query($sql);
        foreach ($rs->result_array() as $product) {
            $data_insert['product_color_id'] = $product['product_color_id'];
            $data_insert['quantity'] = $product['quantity'];
            $data_insert['price'] = $product['price'];
            $data_insert['total'] = $product['quantity'] * $product['price'];
            $this->db->insert('detail_bill', $data_insert);
            $total += $product['quantity'] * $product['price'];
            //cập nhật số lượng
            $sql = 'SELECT * FROM product_color WHERE is_show=1 and id=' . $product['product_color_id'];
            $rs = $this->db->query($sql);
            $quantity = $rs->row_array()['quantity'] - $product['quantity'];
            $data_quantity = array('quantity' => $quantity);
            $this->db->update('product_color', $data_quantity, " id=" . $product['product_color_id']);
        }

        //cập nhật total hóa đơn
        $data_bill=array(
            'total'=>$total
        );
        $this->db->update('bill',$data_bill,' id='.$id);
        //cập nhật order đặt hàng thành done
        $data_order=array('status'=>'DONE');
        $this->db->update('customer_order',$data_order,' id in ('.$order.')');
        $this->db->trans_complete();
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
            