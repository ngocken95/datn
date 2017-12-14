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
        $sql = 'SELECT customer_order.*,CONCAT(product.name,\' - \',color.name) as product,product_color.id as product_id,detail_order.quantity as quantity FROM  customer_order
    JOIN detail_order ON customer_order.id=detail_order.order_id
    JOIN product_color ON product_color.id=detail_order.product_color_id
    JOIN product ON product_color.product_id=product.id
    JOIN color ON color.id=product_color.color_id
    WHERE customer_order.is_show=1 and detail_order.is_show=1 and status=\'WH\'';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            $list = array();
            foreach ($rs->result_array() as $item) {
                if(empty($list[$item['code'].'/'.$item['id']])){
                    $list[$item['code'].'/'.$item['id']][0]['id']=$item['id'];
                    $list[$item['code'].'/'.$item['id']][0]['product_id']=$item['product_id'];
                    $list[$item['code'].'/'.$item['id']][0]['product']=$item['product'];
                    $list[$item['code'].'/'.$item['id']][0]['quantity']=$item['quantity'];
                }
                else{
                    $k=count($list[$item['code'].'/'.$item['id']]);
                    $list[$item['code'].'/'.$item['id']][$k]['id']=$item['id'];
                    $list[$item['code'].'/'.$item['id']][$k]['product_id']=$item['product_id'];
                    $list[$item['code'].'/'.$item['id']][$k]['product']=$item['product'];
                    $list[$item['code'].'/'.$item['id']][$k]['quantity']=$item['quantity'];
                }
            }
            return $list;
        } else {
            return null;
        }
    }

    public function check_wh($list_order){
        $list=implode(',',$list_order);
        $sql='SELECT detail_order.*,product_color.quantity as quantity_wh 
FROM detail_order 
        JOIN product_color ON detail_order.product_color_id=product_color.id
        WHERE detail_order.is_show=1 and product_color.is_show=1 and order_id in ('.$list.')';
        return $sql;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            foreach ($rs->result_array() as $product){
                
            }
        }
    }
}
            