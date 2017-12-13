<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Contact extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/contact_model');
    }
    
    public function index(){
      $this->load->view('site/contact/contact',$this->data);
    }

    public function add(){
        $name=isset($_POST['fullname'])?$_POST['fullname']:'';
        $phone=isset($_POST['phone'])?$_POST['phone']:'';
        $email=isset($_POST['email'])?$_POST['email']:'';
        $address=isset($_POST['address'])?$_POST['address']:'';
        $content=isset($_POST['content'])?$_POST['content']:'';
        if($name=='' || $phone=='' || $email=='' || $address=='' || $content==''){
            redirect('contact');
        }
        $model=new Contact_Model();
        $rs=$model->add_feedback($name,$phone,$email,$address,$content);
        if($rs){
            $this->session->set_flashdata('act_success','Gửi phản hồi thành công');
            redirect('contact');
        }
        else{
            $this->session->set_flashdata('act_success','Gửi phản hồi không thành công');
            redirect('contact');
        }
    }
}
            