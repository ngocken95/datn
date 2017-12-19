<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Month_report extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/month_report_model');
    }
    
    public function index(){
        $model=new Month_report_Model();
        $this->data['from_date']=isset($_POST['from_date'])?convert_dmY_to_Ymd($_POST['from_date']):date('Y-m-d',getdate()[0]);
        $this->data['to_date']=isset($_POST['to_date'])?convert_dmY_to_Ymd($_POST['to_date']):date('Y-m-d',getdate()[0]);
        $this->data['list_product_sell']=$model->get_list_product_sell($this->data['from_date'],$this->data['to_date']);
        $this->data['order']=$model->get_order($this->data['from_date'],$this->data['to_date']);
        $this->data['order_chart']=$model->get_order_chart($this->data['from_date'],$this->data['to_date']);
        $this->session->set_flashdata('from_date',convert_Ymd_to_dmY($this->data['from_date']));
        $this->session->set_flashdata('to_date',convert_Ymd_to_dmY($this->data['to_date']));
        $this->load->view('admin/month_report/list',$this->data);
    }
}
            