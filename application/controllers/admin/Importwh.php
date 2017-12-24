<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Importwh extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/importwh_model');
    }

    public function index(){
        $this->data['action']='list';
        $model=new Importwh_Model();
        $find=isset($_GET['find'])?$_GET['find']:'';
        $this->data['items']=$model->get_list($find);
        $this->data['list_delete']=$model->get_list_del();
        $this->load->view('admin/importwh/list',$this->data);
    }

    public function add(){
        $this->data['action']='add';
        $model=new Importwh_Model();
        $code=$model->get_code()+1;
        $this->data['code_bill']='PN-'.$code;
        $this->data['product_color']=$model->get_product_color();
        $this->load->view('admin/importwh/add',$this->data);
    }

    public function addAction(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $date=isset($_POST['date'])?$_POST['date']:'';
        $product=isset($_POST['product'])?$_POST['product']:'';
        $quantity=isset($_POST['quantity'])?$_POST['quantity']:'';
        foreach ($product as $p){
            if($p==0){
                $this->session->set_flashdata('act_fail','Lỗi nhập dữ liệu');
                redirect('admin/importwh/add');
            }
        }
        foreach ($quantity as $q){
            if($q==0){
                $this->session->set_flashdata('act_fail','Lỗi nhập dữ liệu');
                redirect('admin/importwh/add');
            }
        }
        $price=isset($_POST['price'])?$_POST['price']:'';
        $d=DateTime::createFromFormat('d/m/Y',$date);
        $timestamp=$d->getTimestamp();
        if($code=='' || $timestamp=='' || empty($product) || empty($quantity) || empty($price)){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/importwh/add');
        }
        $model=new Importwh_Model();
        $rs=$model->add_bill($code,$timestamp);
        echo $rs;
        if($rs){
            $rs_detail=$model->add_detail_bill($rs,$product,$quantity,$price);
            if($rs_detail){
                $this->session->set_flashdata('act_success','Thêm phiếu nhập thành công');
                redirect('admin/importwh');
            }
            else{
                $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
                redirect('admin/importwh/add');
            }
        }
        else{
            $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
            redirect('admin/color/add');
        }
    }

    public function detail(){
        $md5=$this->uri->segment(4);
        $model=new Importwh_Model();
        $check=$model->check_md5($md5);
        if($check){
            $this->data['bill']=$model->get_bill_by_md5($md5);
            $this->data['items']=$model->get_detail_bill_by_bill_md5($md5);

            $this->load->view('admin/importwh/detail',$this->data);
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }

    public function edit(){
        $model=new Importwh_Model();
        $md5=$this->uri->segment(4);
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $this->data['item']=$model->get_bill_by_md5($md5);
            $this->data['list_product']=$model->get_detail_bill_by_bill_md5($this->data['item']['md5']);
            $this->data['product_color']=$model->get_product_color();
            $this->load->view('admin/importwh/edit',$this->data);
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }

    public function editAction(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $md5=isset($_POST['md5'])?$_POST['md5']:'';
        $id=isset($_POST['id'])?$_POST['id']:'';
        $date=isset($_POST['date'])?$_POST['date']:'';
        $product=isset($_POST['product'])?$_POST['product']:'';
        $quantity=isset($_POST['quantity'])?$_POST['quantity']:'';
        foreach ($product as $p){
            if($p==0){
                $this->session->set_flashdata('act_fail','Lỗi nhập dữ liệu');
                redirect('admin/importwh/add');
            }
        }
        foreach ($quantity as $q){
            if($q==0){
                $this->session->set_flashdata('act_fail','Lỗi nhập dữ liệu');
                redirect('admin/importwh/add');
            }
        }
        $price=isset($_POST['price'])?$_POST['price']:'';
        $d=DateTime::createFromFormat('d/m/Y',$date);
        $timestamp=$d->getTimestamp();
        if($code=='' || $timestamp=='' || empty($product) || empty($quantity) || empty($price)){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/importwh/add');
        }
        $model=new Importwh_Model();
        $model->edit_bill($id,$timestamp,$md5);
        $rs=$model->edit_detail_bill($id,$product,$quantity,$price);
        if($rs){
                $this->session->set_flashdata('act_success','Sửa hóa đơn thành công');
                redirect('admin/importwh');
        }
        else{
            $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
            redirect('admin/importwh/edit/'.$md5);
        }
    }

    public function delete(){
        $model=new Importwh_Model();
        $md5=$this->uri->segment(4);
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $rs=$model->delete($md5);
            if($rs){
                $this->session->set_flashdata('act_success','Xóa hóa đơn thành công');
                redirect('admin/importwh');
            }
            else{
                $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
                redirect('admin/importwh');
            }
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }
}
            