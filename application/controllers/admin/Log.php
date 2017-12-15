<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Log extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/log_model');
    }
    
    public function index(){
      
    }
}
            