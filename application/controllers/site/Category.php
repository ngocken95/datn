<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        $this->data = parent::__construct();
        $this->load->model('site/category_model');
    }

    public function index()
    {

    }

    public function type()
    {
        $id = $this->uri->segment(3);
        $model = new Category_Model();
        $check = $model->check_id($id,'product_type');
        if ($check) {
            $rs=$model->get_type_by_id($id);
            if($rs){
                $this->data['item']=$rs;
                $this->data['list_product']=$model->get_list_product($rs['id'],'product_type_id');
                $this->load->view('site/category/category',$this->data);
            }
            else{
                $this->data['heading'] = 'Lỗi';
                $this->data['message'] = 'Không tìm thấy dữ liệu';
                $this->load->view('errors/html/error_404', $this->data);
            }
        } else {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function brand()
    {
        $id = $this->uri->segment(3);
        $model = new Category_Model();
        $check = $model->check_id($id,'brand');
        if ($check) {
            $rs=$model->get_brand_by_id($id);
            if($rs){
                $this->data['item']=$rs;
                $this->data['list_product']=$model->get_list_product($rs['id'],'brand_id');
                $this->load->view('site/category/category',$this->data);
            }
            else{
                $this->data['heading'] = 'Lỗi';
                $this->data['message'] = 'Không tìm thấy dữ liệu';
                $this->load->view('errors/html/error_404', $this->data);
            }
        } else {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }
}
            