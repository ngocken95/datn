<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        $this->data = parent::__construct();
        $this->load->model('site/search_model');
    }

    public function index()
    {
        $model = new Search_Model();
        $this->data['brand'] = $model->get_brand();
        $this->data['type_product'] = $model->get_type_product();
        $this->data['price_min'] = $model->get_price()['min'] / 100;
        $this->data['price_max'] = $model->get_price()['max'] / 100;
        $find = isset($_GET['find']) ? $_GET['find'] : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
        $type_product = isset($_GET['type_product']) ? $_GET['type_product'] : '';
        $brand = isset($_GET['brand']) ? $_GET['brand'] : '';
        $price_min = isset($_GET['price_min']) ? $_GET['price_min'] : $this->data['price_min'];
        $price_max = isset($_GET['price_max']) ? $_GET['price_max'] : $this->data['price_max'];
        $page_next = isset($_GET['page_next']) ? ($_GET['page_next']) :2;
        $page_pre = isset($_GET['page_pre']) ? ($_GET['page_pre']) : 0;
        $show_pre = false;
        $show_next = true;
        $btn_next = isset($_GET['btn_next']) ? $_GET['btn_next'] : '';
        $btn_pre = isset($_GET['btn_pre']) ? $_GET['btn_pre'] : '';

        if ($price_min > $price_max) {
            $this->session->set_flashdata('fail_price', 'Giá thấp nhất không được lớn hơn giá cao nhất');
            redirect('search');
        }
        if (($page_next - $page_pre) != 2) {
            $this->session->set_flashdata('fail_price', 'Trang tìm kiếm không tồn tại');
            redirect('search');
        }

        $item_start=($page_next-2)*4;
        if($btn_next!=''){
            $item_start=($page_next-1)*4;
        }
        if($btn_pre!=''){
            $item_start=($page_pre-1)*4;
        }

        $this->data['list'] = $model->get_list_product($find, $sort, $type_product, $brand, $price_min, $price_max, $item_start);
        if ($btn_next != '') {
            $page_pre++;
            $page_next++;
            $show_pre = true;
            if ($this->data['list'] == null) {
                $show_next = false;
            }
            else{
                $show_next = true;
            }
        }
        if ($btn_pre != '') {
            $page_pre--;
            $page_next--;
            $show_next = true;
            if ($page_pre==0) {
                $show_pre=false;
            }
            else{
                $show_pre=true;
            }
        }
        $d = array(
            'find' => $find,
            'sort' => $sort,
            'type_product' => $type_product,
            'brand' => $brand,
            'price_min' => $price_min,
            'price_max' => $price_max,
            'page_pre' => $page_pre,
            'page_next' => $page_next,
            'show_pre' => $show_pre,
            'show_next' => $show_next
        );
        $this->session->set_flashdata('data', $d);
        $this->load->view('site/search/search', $this->data);
    }
}
            