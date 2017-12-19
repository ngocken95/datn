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
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/color/add');
        }
        $model=new Color_Model();
        $rs=$model->add_color($code,$name);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm màu son thành công');
            redirect('admin/color');
        }
        else{
            $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
            redirect('admin/color/add');
        }
    }

    public function edit(){
        $this->data['action']='edit';
        $md5=$this->uri->segment(4);
        $model=new Color_Model();
        $check=$model->check_md5($md5);
        if($check){
            $this->data['item']=$model->get_item_by_md5($md5);
            $this->load->view('admin/color/edit',$this->data);
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }

    public function editAction(){
        $md5=isset($_POST['md5'])?$_POST['md5']:'';
        $code=isset($_POST['code'])?$_POST['code']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        if($md5=='' || $code=='' || $name==''){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/color/edit/'.$md5);
        }
        else{
            $model=new Color_Model();
            $rs=$model->edit_color($md5,$code,$name);
            if($rs){
                $this->session->set_flashdata('act_success','Sửa màu son thành công');
                redirect('admin/color');
            }
            else{
                $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
                redirect('admin/color/edit/'.$md5);
            }
        }
    }

    public function delete(){
        $md5=$this->uri->segment(4);
        $model=new Color_Model();
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $check_color=$model->check_color($md5);
            if($check_color){
               $rs= $model->delete_color($md5);
                if($rs){
                    $this->session->set_flashdata('act_success','Xóa màu son thành công');
                    redirect('admin/color');
                }
                else{
                    $this->session->set_flashdata('act_fail','Có lỗi trong quá tình xử lý');
                    redirect('admin/color');
                }
            }
            else{
                $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
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
            