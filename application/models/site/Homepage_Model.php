<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_Model extends CI_Model {

    public function get_list_product($type,$n=0){
        $cond=' ORDER BY '.$type.' DESC';
        if($n!=0){
            $cond.=' LIMIT 0,'.$n.'';
        }
        $sql='SELECT * FROM product WHERE is_show=1 and hide=1 '.$cond;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function update_like($id){
        $sql='SELECT * FROM product WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            $like=$rs->row_array()['product_like'];
        }
        $like++;
        $data=array('product_like'=>$like);
        $this->db->trans_start();
        $this->db->update('product',$data,"id=".$id);
        $this->db->trans_complete();
    }
}
            