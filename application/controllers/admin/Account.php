<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->helper('dequy');
        $this->load->model('admin/account_model');
    }

    public function index(){
        $this->data['action']='list';
        $model=new Account_Model();
        $this->data['items']=$model->get_list();
	    $this->load->view('admin/account/list',$this->data);
	}

    public function add(){
        $this->data['action']='add';
        $model=new Account_Model();
        $this->data['group']=$model->get_group();
        $this->load->view('admin/account/add',$this->data);
    }

    public function addgroup(){
	    $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
	    $name_group=isset($_POST['name_group'])?$_POST['name_group']:'';
	    if($code_group=='' || $name_group==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
	        redirect('admin/account/add');
        }
	    $model=new Account_Model();
        $rs=$model->add_group($code_group,$name_group);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/account/add');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
    }

    public function check_group_exist_none(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
        $code_group_old=isset($_POST['code_old'])?$_POST['code_old']:'';
        $model=new Account_Model();
        $model->check_code_group($id,$code_group,$code_group_old);
    }

    public function check_username_exist_none(){
        $username=isset($_POST['username'])?$_POST['username']:'';
        $model=new Account_Model();
        $model->check_username($username);
    }

    public function addAction(){
        $username=isset($_POST['username'])?$_POST['username']:'';
        $password=isset($_POST['password'])?$_POST['password']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        $email=isset($_POST['email'])?$_POST['email']:'';
        $phone=isset($_POST['phone'])?$_POST['phone']:'';
        $group=isset($_POST['group'])?$_POST['group']:'';
        if($username=='' || $password=='' || $email=='' || $name=='' || $phone=='' || $group==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
        $model=new Account_Model();
        $rs=$model->add_account($username,$password,$name,$email,$phone,$group);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/account');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
    }

    public function getItemById($id=''){
        if($id==''){
            $id=isset($_POST['id'])?$_POST['id']:'';
        }
        $model=new Account_Model();
        $model->get_item_by_id($id);
    }

    public function editGroup(){
        $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
        $name_group=isset($_POST['name_group'])?$_POST['name_group']:'';
        $id=isset($_POST['id'])?$_POST['id']:'';
        if($code_group=='' || $name_group=='' || $id==''){
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/account');
        }
        $model=new Account_Model();
        $rs=$model->edit_group($id,$code_group,$name_group);
        if($rs){
            $this->session->set_flashdata('act_success','Sửa thành công');
            redirect('admin/account');
        }
        else{
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/account');
        }
    }

    public function checkListByGroupId(){
        $id_group=isset($_POST['id'])?$_POST['id']:'';
        if($id_group==''){
            $this->session->set_flashdata('act_fail','Xóa không thành công');
            redirect('admin/account');
        }
        $model=new Account_Model();
        $model->check_list_by_group_id($id_group);
    }

    public function delById(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        if($id==''){
            $this->session->set_flashdata('act_fail','Xóa không thành công');
            redirect('admin/account');
        }
        $model=new Account_Model();
        $model->delete($id);
    }

}
