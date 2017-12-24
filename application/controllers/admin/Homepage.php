<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/homepage_model');
    }

    public function index()
	{
	    $this->load->view('admin/homepage/homepage',$this->data);
	}

	public function setup_data(){
        $model=new Homepage_Model();
        $model->setup_data();
        echo 'Xóa dữ liệu thành công';

    }

    public function check_order(){
	    $model=new Homepage_Model();
	    $rs=$model->check_order();
	    echo json_encode($rs);
    }
}
