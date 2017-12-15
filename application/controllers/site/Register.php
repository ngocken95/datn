<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Register extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/register_model');
    }
    
    public function index(){
        $this->load->view('site/register/register',$this->data);
    }

    public function register(){
        $name=isset($_POST['name'])?trim($_POST['name']):'';
        $email=isset($_POST['email'])?trim($_POST['email']):'';
        $phone=isset($_POST['phone'])?trim($_POST['phone']):'';
        $address=isset($_POST['address'])?trim($_POST['address']):'';
        $user=isset($_POST['user'])?trim($_POST['user']):'';
        $pass=isset($_POST['pass'])?trim($_POST['pass']):'';
        if($name=='' || $email=='' || $phone=='' || $address=='' || $user=='' || $pass==''){
            redirect('register');
        }
        $model=new Register_Model();
        $rs=$model->add_account($name,$email,$phone,$address,$user,$pass);
        if($rs){
            $this->session->set_flashdata('alert','Tạo tài khoản thành công');
            redirect('register');
        }
        else{
            $this->session->set_flashdata('alert','Tạo tài khoản không thành công');
            echo $name.'<br>';
            echo $email.'<br>';
            echo $phone.'<br>';
            echo $address.'<br>';
            echo $user.'<br>';
            echo $pass.'<br>';
//            redirect('register');
        }
    }

    public function check_user(){
        $user=isset($_POST['user'])?$_POST['user']:'';
        $model=new Register_Model();
        $rs=$model->check_user($user);
        echo json_encode($rs);
    }
}
            