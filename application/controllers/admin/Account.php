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
	    $model=new Account_Model();
        $rs=$model->add_group($code_group,$name_group);
        if($rs){
            $this->session->set_flashdata('add_act_success','Thêm thành công');
            redirect('admin/account/add');
        }
        else{
            $this->session->set_flashdata('add_act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
    }

    public function check_group_exist_none(){
        $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
        $model=new Account_Model();
        $model->check_code_group($code_group);
    }




    public function addAction(){
        $model=new Module_Model();
        $code=isset($_POST['code'])?trim($_POST['code']):'';
        $name=isset($_POST['name'])?trim($_POST['name']):'';
        $location=isset($_POST['location'])?trim($_POST['location']):'';
        $rs=$model->add($code,$name,$location);
        if($rs){
            $this->session->set_flashdata('add_act_success','Thêm thành công');
            redirect('admin/module');
        }
        else{
            $this->session->set_flashdata('add_act_fail','Thêm không thành công');
            redirect('admin/module/add');
        }
    }

    public function edit(){
        $this->data['action']='edit';
        $id=$this->input->get('id')?$this->input->get('id'):0;
        $model=new Module_Model();
        $rs=$model->check_exist($id);
        if($rs){
            $this->data['item']=$rs;
            $this->load->view('admin/module/add',$this->data);
        }
        else{
            $this->session->set_flashdata('id_not_exist','Mã không tồn tại');
            redirect('admin/module');
        }
    }

    public function editAction(){
        $model=new Module_Model();
        $id=isset($_POST['id'])?trim($_POST['id']):'';
        $name=isset($_POST['name'])?trim($_POST['name']):'';
        $location=isset($_POST['location'])?trim($_POST['location']):'';
        $rs=$model->edit($id,$name,$location);
        if($rs){
            $this->session->set_flashdata('edit_act_success','Sửa thành công');
            redirect('admin/module');
        }
        else{
            $this->session->set_flashdata('edit_act_fail','Sửa không thành công');
            redirect('admin/module');
        }
    }

    public function checkExist(){
	    $model=new Module_Model();
	    $code=isset($_POST['code'])?trim($_POST['code']):'';
	    $location=isset($_POST['location'])?($_POST['location']):'';
	    if($code=='' || $location==''){
	        redirect('admin/login');
        }
	    $rs=$model->check_code($code,$location);
	    echo json_encode($rs);
    }

    public function delete(){
        $model=new Module_Model();
        $id=$this->input->get('id')?$this->input->get('id'):0;
        $rs=$rs=$model->check_exist($id);
        if($rs){
            $del=$model->delete($rs['id']);
            if($del){
                $this->session->set_flashdata('del_act_success','Xóa thành công');
                redirect('admin/module');
            }
            else{
                $this->session->set_flashdata('del_act_fail','Xóa không thành công');
                redirect('admin/module');
            }
        }
        else{
            $this->session->set_flashdata('id_not_exist','Mã không tồn tại');
            redirect('admin/module');
        }
    }
}
