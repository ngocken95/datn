<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Import_report extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/import_report_model');
    }
    
    public function index(){
         $model=new Import_report_Model();
         $this->data['list_product']=$model->get_list_product();
        $this->load->view('admin/import_report/list',$this->data);
    }
}
            