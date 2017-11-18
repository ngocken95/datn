<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

    public function checkLogin($user,$pass){
        $sql='SELECT * FROM account WHERE username=\''.$user.'\' and password=\''.$pass.'\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }
}
