<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/module_model');
    }

    public function index(){
        $this->data['action']='list';
        $model=new Module_Model();
        $this->data['items']=$model->get_list();
	    $this->load->view('admin/module/list',$this->data);
	}

	public function add(){
        $this->data['action']='add';
        $this->load->view('admin/module/add',$this->data);
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
