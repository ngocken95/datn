<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Login extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/login_model');
    }
    
    public function index(){
        $this->load->view('site/login/login',$this->data);
    }

    public function login(){
        $user=isset($_POST['user'])?trim($_POST['user']):'';
        $pass=isset($_POST['pass'])?trim($_POST['pass']):'';
        if($user=='' || $pass==''){
            $this->session->set_flashdata('alert','Nhập thông tin đăng nhập');
            redirect('login');
        }
        $model=new Login_Model();
        $rs=$model->checkLogin($user,$pass);
        if($rs){
            $this->session->set_userdata('user',$rs);
            $this->session->set_flashdata('alert','Đăng nhập thành công');
            redirect('homepage');
        }
        else{
            $this->session->set_flashdata('alert','Thông tin tài khoản không chính xác');
            redirect('login');
        }
    }

    public function logout(){

    }
}
            