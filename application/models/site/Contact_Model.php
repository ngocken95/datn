<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends CI_Model {

    public function add_feedback($name,$phone,$email,$address,$content){
        $data=array(
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email,
            'address'=>$address,
            'content'=>$content,
            'status'=>0,
            'is_show'=>1,
            'type'=>'INBOX',
            'parent_messenger'=>0
        );
        $this->db->trans_start();
        $this->db->insert('feedback',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }
}
            