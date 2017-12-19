<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Daily_report extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/daily_report_model');
    }
    
    public function index(){
        $model=new Daily_report_Model();
        $this->data['date']=isset($_POST['date'])?convert_dmY_to_Ymd($_POST['date']):date('Y-m-d',getdate()[0]);
        $this->data['list_product_sell']=$model->get_list_product_sell($this->data['date']);
        $this->data['order']=$model->get_order($this->data['date']);
        $this->session->set_flashdata('date',convert_Ymd_to_dmY($this->data['date']));
        $this->load->view('admin/daily_report/list',$this->data);
    }
}
            