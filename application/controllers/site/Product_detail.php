<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_detail extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        $this->data = parent::__construct();
        $this->load->model('site/product_detail_model');
    }

    public function index()
    {
        $model = new Product_detail_Model();
        $id = $this->uri->segment(2);
        $check = $model->check_id($id);
        if ($check) {
            $ck = false;
            $product = $this->session->userdata('product');
            if ($this->session->userdata('product')['view']) {
                if (count($this->session->userdata('product')['view']) > 0) {
                    foreach ($this->session->userdata('product')['view'] as $view) {
                        if ($id == $view) {
                            $ck = true;
                        }
                    }
                    if ($ck) {

                    } else {
                        $model->update_view($id);
                        $product['view'][count($this->session->userdata('product')['view'])] = $id;
                    }
                }
            } else {
                $model->update_view($id);
                $product['view'][count($this->session->userdata('product')['view'])] = $id;
            }
            $this->session->set_userdata('product', $product);

            $rs = $model->get_product_by_id($id);
            $this->data['item'] = $rs;
            $this->data['list_color'] = $model->get_list_color_product($id);
            $this->data['list_product'] = $model->get_list_product($id);
            $this->load->view('site/product_detail/product_detail', $this->data);
        } else {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }
}
            