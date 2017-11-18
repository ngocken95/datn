<?php
/**
 * Created by PhpStorm.
 * User: ngock
 * Date: 12-Oct-17
 * Time: 3:13 AM
 */

class Login_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

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