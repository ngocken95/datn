<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_Model extends CI_Model {

    public function setup_data(){
        $this->db->trans_start();
        $this->db->delete('detail_bill'," 1=1");
        $this->db->delete('detail_order'," 1=1");
        $this->db->delete('customer_order'," 1=1");
        $this->db->delete('bill'," 1=1");
        $this->db->delete('access'," account_id not in (1,2)");
        $this->db->delete('account'," id not in (0,1,2,6)");
        $this->db->delete('product_color','1=1');
        $this->db->delete('product',' 1=1');
        $this->db->trans_complete();
    }

    public function check_order(){
        $sql='SELECT * FROM customer_order WHERE is_show=1 and check_new=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->num_rows();
        }
        else{
            return false;
        }
    }
}
            