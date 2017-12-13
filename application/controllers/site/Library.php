<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Library extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/library_model');
    }
    
    public function index(){

    }

    public function image(){
        $this->load->view('site/library/album',$this->data);
    }

    public function video(){
        $this->load->view('site/library/video',$this->data);
    }
}
            