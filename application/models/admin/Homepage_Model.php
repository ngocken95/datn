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
        $this->db->update('product_color',array('price_avg'=>0,'quantity'=>0,'is_show'=>1),' 1=1');
        $this->db->update('product',array('product_like'=>0,'product_view'=>0,'product_buy'=>0,'product_cmt'=>0),' 1=1');
        $this->db->trans_complete();
    }
}
            