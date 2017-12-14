<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Search extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/search_model');
    }
    
    public function index(){
        echo 'đây là search';
    }
}
            