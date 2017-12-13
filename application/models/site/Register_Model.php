<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Model extends CI_Model
{

    public function check_user($user)
    {
        $sql = 'SELECT * FROM account WHERE username=\'' . $user . '\' and is_show=1';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() == 1) {
            return $user . true;
        } else {
            return $user . false;
        }
    }

    public function add_account($name,$email,$phone,$address,$user,$pass){
        $sql='SELECT * FROM account WHERE is_show=1 and username=\'member\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            $group=$rs->row_array()['id'];
        }
        else{
            return false;
        }
        $data=array(
            'username'=>$user,
            'password'=>$pass,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'is_show'=>1,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'created'=>getdate()[0],
            'status'=>0,
            'group_account_id'=>$group
        );
        $this->db->trans_start();
        $this->db->insert('account',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }
}
            