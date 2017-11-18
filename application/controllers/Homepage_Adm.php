<?php
/**
 * Created by PhpStorm.
 * User: ngock
 * Date: 12-Oct-17
 * Time: 4:53 AM
 */

class Homepage_Adm extends MY_Controller{

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();

    }

    public function index(){
        $this->load->view('backend/homepage',$this->data);
    }
}