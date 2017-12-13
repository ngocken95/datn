<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data['access']=parent::__construct();
        $this->load->model('admin/login_model');
    }

    public function index()
	{
	    $this->load->view('admin/login/login');
	}

	public function checkLogin(){
        $user=isset($_POST['username'])?$_POST['username']:'';
        $pass=isset($_POST['password'])?$_POST['password']:'';
        if($user=='' || $pass==''){
            $this->session->set_flashdata('required','Nhập đầy đủ thông tin');
            redirect('admin/login');
        }
        $model=new Login_Model();
        $rs=$model->checkLogin($user,$pass);
        if($rs){
            $model->update_status($rs['id'],1);
            $this->session->set_userdata('user',$rs);
            $this->session->set_flashdata('login_success','Đăng nhập thành công');
            redirect('admin/homepage');
        }
        else{
            $this->session->set_flashdata('login_fail','Thông tin tài khoản không đúng');
            redirect('admin/login');
        }
    }

    public function logout(){
	    $model=new Login_Model();
        $model->update_status($this->session->userdata('user')['id'],0);
	    $this->session->unset_userdata('user');
	    redirect('admin/login');
    }
}
