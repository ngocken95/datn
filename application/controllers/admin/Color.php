<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Color extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/color_model');
    }

    public function index(){
        $this->data['action']='list';
        $model=new Color_Model();
        $find=isset($_GET['find'])?$_GET['find']:'';
        $this->data['items']=$model->get_list($find);
        $this->load->view('admin/color/list',$this->data);
    }

    public function check_code_exist(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $model=new Color_Model();
        $rs=$model->check_code($code);
        echo json_encode($rs);
    }

    public function add(){
        $this->data['action']='add';
        $this->load->view('admin/color/add',$this->data);
    }

    public function addAction(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        if($code=='' || $name==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/color/add');
        }
        $model=new Color_Model();
        $rs=$model->add_color($code,$name);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/color');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/color/add');
        }
    }

    public function edit(){
        $this->data['action']='edit';
        $id=$this->uri->segment(4);
        $model=new Color_Model();
        $check=$model->check_id($id);
        if($check){
            $this->data['item']=$model->get_item_by_id($id);
            $this->load->view('admin/color/edit',$this->data);
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }

    public function editAction(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        $code=isset($_POST['code'])?$_POST['code']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        if($id=='' || $code=='' || $name==''){
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/color/edit/'.$id);
        }
        else{
            $model=new Color_Model();
            $rs=$model->edit_color($id,$code,$name);
            if($rs){
                $this->session->set_flashdata('act_success','Sửa thành công');
                redirect('admin/color');
            }
            else{
                $this->session->set_flashdata('act_fail','Sửa không thành công');
                redirect('admin/color/edit/'.$id);
            }
        }
    }

    public function delete(){
        $id=$this->uri->segment(4);
        $model=new Color_Model();
        $check=$model->check_id($id);
        if($check){
            $rs=$model->delete_color($id);
            if($rs){
                $this->session->set_flashdata('act_success','Xóa thành công');
                redirect('admin/color');
            }
            else{
                $this->session->set_flashdata('act_fail','Xóa không thành công');
                redirect('admin/color');
            }
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }
}
            