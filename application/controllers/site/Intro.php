<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Intro extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
    }
    
    public function index(){
        $this->load->view('site/intro/intro',$this->data);
    }
}
            