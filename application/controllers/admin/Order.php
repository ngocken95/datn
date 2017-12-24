<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        $this->data = parent::__construct();
        $this->load->model('admin/order_model');
    }

    public function index()
    {
        $model = new Order_Model();
        $this->data['items'] = $model->get_list();
        $this->data['list_delete'] = $model->get_list_del();
        $this->load->view('admin/order/list', $this->data);
    }

    public function detail()
    {
        $md5 = $this->uri->segment(4);
        $model = new Order_Model();
        $check = $model->check_md5($md5);
        if (!$check) {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        } else {
            $this->data['item'] = $model->get_order_by_md5($md5);
            $this->data['list_product'] = $model->get_list_product($this->data['item']['id']);
            $this->load->view('admin/order/detail', $this->data);
        }
    }

    public function checkorder()
    {
        $md5 = $this->uri->segment(4);
        $model = new Order_Model();
        $check = $model->check_md5($md5);
        if (!$check) {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        } else {
            $rs = $model->update_user($md5);
            if ($rs) {
                $this->session->set_flashdata('check', 'Duyệt đơn hàng thành công');
                redirect('admin/order');
            } else {
                $this->session->set_flashdata('check', 'Lỗi duyệt đơn hàng thành công');
                redirect('admin/order');
            }
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(4);
        $model = new Order_Model();
        $check = $model->check_id($id);
        if (!$check) {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        } else {
            $rs = $model->delete($id);
            if ($rs) {
                $this->session->set_flashdata('check', 'Xóa đơn hàng thành công');
                redirect('admin/order');
            } else {
                $this->session->set_flashdata('check', 'Lỗi xóa đơn hàng thành công');
                redirect('admin/order');
            }
        }
    }
}
            