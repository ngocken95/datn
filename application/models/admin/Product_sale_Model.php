<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_sale_Model extends CI_Model {

    public function get_list($from_date,$to_date){
        $d=new DateTime($from_date);
        $date_first=$d->getTimestamp();
        $d=new DateTime($to_date);
        $date_last=$d->getTimestamp()+86400;
        $sql='SELECT product.id,product.name,product.code,bill.type,sum(detail_bill.total) as total FROM detail_bill JOIN bill ON detail_bill.bill_id=bill.id
JOIN product_color ON detail_bill.product_color_id=product_color.id
JOIN product ON product.id=product_color.product_id
WHERE bill.created BETWEEN '.$date_first.' and '.$date_last.'
GROUP BY product.id,bill.type
';
        $rs=$this->db->query($sql);
        $list=array();
        if($rs->num_rows()>0){
            foreach ($rs->result_array() as $item){
                if(empty($list[$item['id']])){
                    $list[$item['id']]['id']=$item['id'];
                    $list[$item['id']]['name']=$item['name'];
                    $list[$item['id']]['export']=0;
                    $list[$item['id']]['import']=0;
                    if($item['type']=='EXPORT'){
                        $list[$item['id']]['export']=$item['total'];
                    }
                    if($item['type']=='IMPORT'){
                        $list[$item['id']]['import']=$item['total'];
                    }
                }
                else{
                    $list[$item['id']]['id']=$item['id'];
                    $list[$item['id']]['name']=$item['name'];
                    if($item['type']=='EXPORT'){
                        $list[$item['id']]['export']=$item['total'];
                    }
                    if($item['type']=='IMPORT'){
                        $list[$item['id']]['import']=$item['total'];
                    }
                }
            }
        }
        return $list;
    }
}
            