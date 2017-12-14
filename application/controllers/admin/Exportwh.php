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

        }
        else{
            $list_order=isset($_POST['code_order'])?$_POST['code_order']:'';
            $rs=$model->check_wh($list_order);
            echo $rs;
        }
    }
}
            