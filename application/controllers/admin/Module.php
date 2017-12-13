<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/module_model');
    }

    public function index(){
        $this->data['action']='list';
        $model=new Module_Model();
        $find=isset($_GET['find'])?$_GET['find']:'';
        $this->data['items']=$model->get_list($find);
        $this->load->view('admin/module/list',$this->data);
    }

    public function add(){
        $this->data['action']='add';
        $this->load->view('admin/module/add',$this->data);
    }

    public function check_code_exist_none(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $location=isset($_POST['location'])?$_POST['location']:'';
        $model=new Module_Model();
        $rs=$model->check_code($code,$location);
        echo json_encode($rs);
    }

    public function addAction(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        $location=isset($_POST['location'])?$_POST['location']:'';
        if($code=='' || $name==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/module/add');
        }
        $model=new Module_Model();
        $rs=$model->add_module($code,$name,$location);
        if($rs){
            $model='<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

class '.ucfirst($code).'_Model extends CI_Model {

}
            ';
            if($location=='backend'){
                $controller='<?php 
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
    
class '.ucfirst($code).' extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model(\'admin/'.$code.'_model\');
    }
    
    public function index(){
      
    }
}
            ';
                $ctrl =@fopen($_SERVER['DOCUMENT_ROOT'].'/final/application/controllers/admin/'.ucfirst($code).'.php','w');
                $mdl =@fopen($_SERVER['DOCUMENT_ROOT'].'/final/application/models/admin/'.ucfirst($code.'_Model').'.php','w');
                $view=$_SERVER['DOCUMENT_ROOT'].'/final/application/views/admin/'.$code;
            }
            else{
                $controller='<?php 
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
    
class '.ucfirst($code).' extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model(\'site/'.$code.'_model\');
    }
    
    public function index(){
      
    }
}
            ';
                $ctrl =@fopen($_SERVER['DOCUMENT_ROOT'].'/final/application/controllers/site/'.ucfirst($code).'.php','w');
                $mdl =@fopen($_SERVER['DOCUMENT_ROOT'].'/final/application/models/site/'.ucfirst($code.'_Model').'.php','w');
                $view=$_SERVER['DOCUMENT_ROOT'].'/final/application/views/site/'.$code;
            }

            fwrite($ctrl, $controller);
            fwrite($mdl, $model);
            mkdir($view);
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/module');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/module/add');
        }
    }

}
