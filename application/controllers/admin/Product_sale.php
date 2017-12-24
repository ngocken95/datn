<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Product_sale extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/product_sale_model');
    }
    
    public function index(){
         $model=new Product_sale_Model();
        $this->data['from_date']=isset($_POST['from_date'])?convert_dmY_to_Ymd($_POST['from_date']):date('Y-m-d',getdate()[0]);
        $this->data['to_date']=isset($_POST['to_date'])?convert_dmY_to_Ymd($_POST['to_date']):date('Y-m-d',getdate()[0]);
        $this->session->set_flashdata('from_date',convert_Ymd_to_dmY($this->data['from_date']));
        $this->session->set_flashdata('to_date',convert_Ymd_to_dmY($this->data['to_date']));
        $this->data['list']=$model->get_list($this->data['from_date'],$this->data['to_date']);
        $this->load->view('admin/product_sale/list',$this->data);
    }
}
            