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
        $price=isset($_POST['price'])?$_POST['price']:'';
        $d=DateTime::createFromFormat('d/m/Y',$date);
        $timestamp=$d->getTimestamp();
        if($code=='' || $timestamp=='' || empty($product) || empty($quantity) || empty($price)){
            $this->session->set_flashdata('act_fail','Thêm phiếu nhập không thành công');
            redirect('admin/importwh/add');
        }
        $model=new Importwh_Model();
        $rs=$model->add_bill($code,$timestamp);
        if($rs){
            $rs_detail=$model->add_detail_bill($rs,$product,$quantity,$price);
            if($rs_detail){
                $this->session->set_flashdata('act_success','Thêm phiếu nhập thành công');
                redirect('admin/importwh');
            }
            else{
                $this->session->set_flashdata('act_fail','Thêm phiếu nhập không thành công');
                redirect('admin/color/add');
            }
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm phiếu nhập không thành công');
            redirect('admin/color/add');
        }
    }

    public function detail(){
        $id=$this->uri->segment(4);
        $model=new Importwh_Model();
        $check=$model->check_id($id);
        if($check){
            $this->data['bill']=$model->get_bill_by_id($id);
            $this->data['items']=$model->get_detail_bill_by_id($id);
            $this->load->view('admin/importwh/detail',$this->data);
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }
}
            