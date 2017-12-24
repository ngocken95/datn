<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        $this->data = parent::__construct();
        $this->load->model('site/cart_model');
    }

    public function index()
    {
        $this->load->view('site/cart/cart', $this->data);
    }

    public function additem()
    {
        $model = new Cart_Model();
        $product_color_id = isset($_POST['color_pick']) ? $_POST['color_pick'] : '';
        $product = $model->get_product_by_id($product_color_id);
        $qty = isset($_POST['quantity']) ? $_POST['quantity'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $rs = $model->add_item($product, $qty, $price);
        if ($rs) {
            redirect('cart');
        } else {
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function updatecart()
    {
        print_r($this->cart->contents());
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $qty = isset($_POST['qty']) ? $_POST['qty'] : '';
        if (!empty($id)) {
            foreach ($this->cart->contents() as $key => $item_cart) {
                foreach ($id as $k => $v) {
                    if ($item_cart['id'] == $v) {
                        $this->cart->update(array('rowid' => $key, 'qty' => $qty[$k]));
                    }
                }
            }
        }
        print_r($this->cart->contents());
        $this->session->set_flashdata('update_success', 'Cập nhật thành công');
        redirect('cart');
    }

    public function delete()
    {
        $rowid = $this->uri->segment(3);
        $check = self::check_cart($rowid);
        if ($check) {
            $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
            $this->session->set_flashdata('update_success', 'Xóa sản phẩm thành công');
            redirect('cart');
        } else {
            $this->session->set_flashdata('update_success', 'Sản phẩm không tồn tại trong giỏ hàng');
            redirect('cart');
        }
    }

    public function check_cart($rowid)
    {
        if (!empty($this->cart->contents())) {
            foreach ($this->cart->contents() as $k => $p) {
                if ($rowid == $k) {
                    return true;
                }
            }
            return false;
        }
    }

    public function addorder()
    {
        $model = new Cart_Model();
        if (!$this->session->userdata('user')['id']) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        } else {
            $name = $this->session->userdata('user')['name'];
            $email = $this->session->userdata('user')['email'];
            $phone = $this->session->userdata('user')['phone'];
        }
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $note = isset($_POST['note']) ? $_POST['note'] : '';
        $code = 'DH-' . ($model->get_code_order() + 1);
        $total = $this->cart->total();
        if ($name == '' || $email == '' || $phone == '' || $address == '' || $note == '') {
            redirect('cart');
        }
        $rs = $model->add_order($name, $email, $phone, $address, $note, $code, $total);
        if ($rs) {
            $detail = $model->add_detail($rs);
            if ($detail) {
                $this->session->set_flashdata('order_success', 'Gửi đơn hàng thành công');
                $this->cart->destroy();
                redirect('cart');
            } else {
                $this->session->set_flashdata('order_success', 'Lỗi trong việc gửi đơn hàng');
                redirect('cart');
            }
        } else {
            $this->session->set_flashdata('order_success', 'Lỗi trong việc gửi đơn hàng');
            redirect('cart');
        }
    }
}
            