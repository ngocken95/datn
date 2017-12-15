<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Exportwh extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/exportwh_model');
    }
    
    public function index(){
        $model=new Exportwh_Model();
        $this->data['items']=$model->get_list_bill();
        $this->load->view('admin/exportwh/list',$this->data);
    }

    public function add(){
        $this->data['action']='add';
        $model=new Exportwh_Model();
        $code=$model->get_code()+1;
        $this->data['code_bill']='PX-'.$code;
        $this->data['list_order']=$model->get_list_bill();
        $this->load->view('admin/exportwh/add',$this->data);
    }

    public function addAction(){
        $model=new Exportwh_Model();
        if(isset($_POST['add'])){
            $code=isset($_POST['code'])?$_POST['code']:'';
            $created=isset($_POST['date'])?$_POST['date']:'';
            $list_order=isset($_POST['code_order'])?$_POST['code_order']:'';
            if($list_order=='' || $code=='' || $created==''){
                redirect('admin/exportwh/add');
            }
            $d=DateTime::createFromFormat('d/m/Y',$created);
            $timestamp=$d->getTimestamp();
            $bill_id=$model->create_bill_export($code,$timestamp);
            $model->add_detail_bill($bill_id,$list_order);
            $this->session->set_flashdata('success','Tạo đơn hàng thành công');
            redirect('admin/exportwh');
        }
        else{
            $list_order=isset($_POST['code_order'])?$_POST['code_order']:'';
            if($list_order==''){
                redirect('admin/exportwh/add');
            }
            $rs=$model->check_wh($list_order);
            $this->session->set_flashdata('check_wh',$rs);
            redirect('admin/exportwh/add');
        }
    }

    public function detail(){
        $id=$this->uri->segment(4);
        $model=new Exportwh_Model();
        $check=$model->check_id($id);
        if($check){
            $this->data['bill']=$model->get_bill_by_id($id);
            $this->data['items']=$model->get_detail_bill_by_id($id);
            $this->load->view('admin/exportwh/detail',$this->data);
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }
}
            