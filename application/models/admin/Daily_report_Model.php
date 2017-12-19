<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_report_Model extends CI_Model {

    public function get_list_product_sell($date){
        $d=new DateTime($date);
        $date_first=$d->getTimestamp();
        $date_last=$date_first+86400;
        $sql='SELECT product.code,product_type.name as type,detail_order.*,customer_order.status,sum(detail_order.quantity) as quantity,product.name as name,sum(detail_order.quantity*detail_order.price) as total FROM detail_order 
JOIN customer_order ON detail_order.order_id=customer_order.id
JOIN product_color ON product_color.id=detail_order.product_color_id
JOIN product ON product.id=product_color.product_id
JOIN product_type ON product.product_type_id=product_type.id
WHERE customer_order.is_show=1 and customer_order.time BETWEEN '.$date_first.' and '.$date_last.' 
GROUP BY product.id,customer_order.status
ORDER BY customer_order.status ASC
        ';
        $rs=$this->db->query($sql);
        $list=array();
        if($rs->num_rows()>0){
            $items=$rs->result_array();
            foreach ($items as $item){
                if($item['status']=='DONE'){
                    if(empty($list['export'])){
                        $k=0;
                    }
                    else{
                        $k=count($list['export']);
                    }
                    $list['export'][$k]=$item;
                }
                else{
                    if(empty($list['no_export'])){
                        $j=0;
                    }
                    else{
                        $j=count($list['no_export']);
                    }
                    $list['no_export'][$j]=$item;
                }
            }
            return $list;
        }
        else{
            return null;
        }
    }

    public function get_order($date){
        $d=new DateTime($date);
        $date_first=$d->getTimestamp();
        $date_last=$date_first+86400;
        $sql='SELECT status,count(status) as qty 
FROM customer_order 
WHERE is_show=1 AND time BETWEEN '.$date_first.' and '.$date_last.' 
GROUP BY status';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }
}
            