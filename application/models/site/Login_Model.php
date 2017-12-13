<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

    public function checkLogin($user,$pass){
        $sql='SELECT * FROM account WHERE is_show=1 and username=\'member\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            $group=$rs->row_array()['id'];
        }
        else{
            redirect('login');
        }
        $sql='SELECT * FROM account WHERE username=\''.$user.'\' and password=\''.$pass.'\' and is_show=1 and group_account_id='.$group;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }
}
            