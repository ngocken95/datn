<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Month_report_Model extends CI_Model {

    public function get_list_product_sell($from_date,$to_date){
        $d=new DateTime($from_date);
        $date_first=$d->getTimestamp();
        $d=new DateTime($to_date);
        $date_last=$d->getTimestamp()+86400;
        $sql='SELECT customer_order.time,product.code,product_type.name as type,detail_order.*,customer_order.status,sum(detail_order.quantity) as quantity,product.name as name,sum(detail_order.quantity*detail_order.price) as total FROM detail_order 
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

    public function get_order($from_date,$to_date){
        $d=new DateTime($from_date);
        $date_first=$d->getTimestamp();
        $d=new DateTime($to_date);
        $date_last=$d->getTimestamp()+86400;
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

    public function get_order_chart($from_date,$to_date){
        $d=new DateTime($from_date);
        $date_first=$d->getTimestamp();
        $d=new DateTime($to_date);
        $date_last=$d->getTimestamp()+86400;
        $sql='SELECT status,count(id) as qty,from_unixtime(time,\'%d/%m/%Y\') as time 
FROM customer_order 
WHERE is_show=1 and time BETWEEN '.$date_first.' and '.$date_last.' 
        GROUP BY time,status';
        $rs=$this->db->query($sql);
        $list=array();
        if($rs->num_rows()>0){
            foreach ($rs->result_array() as $item){
                $d=new DateTime(convert_dmY_to_Ymd($item['time']));
                $timestamp=$d->getTimestamp()-21600;
                if(empty($list[$timestamp])){
                    $list[$timestamp][0]['status']=$item['status'];
                    $list[$timestamp][0]['qty']=$item['qty'];
                }
                else{
                    $k=count($list[$timestamp]);
                    $list[$timestamp][$k]['status']=$item['status'];
                    $list[$timestamp][$k]['qty']=$item['qty'];
                }
            }
        }
        return json_encode($list);
    }
}
            