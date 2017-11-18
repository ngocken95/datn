<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Adm extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
	{
		$this->load->view('backend/login',$this->data);
	}

	public function checklogin(){
        $user=isset($_POST['username'])?trim($_POST['username']):'';
        $pass=isset($_POST['password'])?trim($_POST['password']):'';
        if($user=='' || $pass==''){
            $this->session->set_flashdata('login_fail',$this->lang->line('enter_full_info'));
            redirect($_SERVER['HTTP_REFERER']);
        }
        $model=new Login_Model();
        $check=$model->checkLogin($user,$pass);
        if(!$check){
            $this->session->set_flashdata('login_fail',$this->lang->line('incorrect_account_info'));
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->session->set_flashdata('login_success',$this->lang->line('login_success'));
            $this->session->set_userdata('user_id',$check);
            redirect('admin/homepage');
        }
    }

    public function sendemail(){
	    $send_to=isset($_POST['email_address'])?trim($_POST['email_address']):'';
        $config['protocol'] = 'sendmail';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->from($send_to, 'hỗ trợ');
        $this->email->to('ngocken95@gmail.com');
        $this->email->subject('Forgot password');
        $this->email->message('Vui lòng giúp tôi lấy lại mật khẩu');
        if ( ! $this->email->send())
        {
            echo $this->email->print_debugger();
        }else{
            echo 'Gửi email thành công';
        }
    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        redirect('admin/login');
    }
}
