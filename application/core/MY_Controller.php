<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    private $data=array();

    function __construct(){
        parent::__construct();
		//==========================ACCESS=================================
        if($this->session->userdata('user')['id']!=1){
            if($this->session->userdata('user')){
                $sql='SElECT * FROM access WHERE account_id='.$this->session->userdata('user')['id'].' and is_show=1';
                $rs=$this->db->query($sql);
                $this->data['access']=$rs->result_array();
                if(count($this->data['access'])>0){

                }
                else{
                    if(strtolower(get_class($this))=='login'){

                    }
                    else{
                        redirect('admin/login');
                    }
                }
            }
            else{
                if(strtolower(get_class($this))=='login'){

                }
                else{
                    redirect('admin/login');
                }
            }
        }
        //==========================ACTIVE=================================
        $sql='SELECT * FROM module WHERE code=\''.strtolower(get_class($this)).'\'';
        $rs=$this->db->query($sql);
        $this->data['active']=$rs->row_array();
        //==========================RETURN=================================
        return $this->data;
	}
}
