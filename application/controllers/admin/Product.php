<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        $this->data = parent::__construct();
        $this->load->model('admin/product_model');
    }

    public function index()
    {
        $this->data['action'] = 'list';
        $model = new Product_Model();
        $find = isset($_GET['find']) ? $_GET['find'] : '';
        $this->data['items'] = $model->get_list($find);
        $this->data['product_color']=$model->get_list_color();
        $this->load->view('admin/product/list', $this->data);
    }

    public function add()
    {
        $this->data['action'] = 'add';
        $model = new Product_Model();
        $this->data['brand'] = $model->get_brand();
        $this->data['product_type'] = $model->get_product_type();
        $this->load->view('admin/product/add', $this->data);
    }

    public function check_code_product_type_exist()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $code_product_type = isset($_POST['code_product_type']) ? $_POST['code_product_type'] : '';
        $code_group_old = isset($_POST['code_old']) ? $_POST['code_old'] : '';
        $model = new Product_Model();
        $rs = $model->check_code_product_type($id, $code_product_type, $code_group_old);
        echo json_encode($rs);
    }

    public function addproducttype()
    {
        $code = isset($_POST['code_product_type']) ? $_POST['code_product_type'] : '';
        $name = isset($_POST['name_product_type']) ? $_POST['name_product_type'] : '';
        $description = isset($_POST['description_type']) ? $_POST['description_type'] : '';
        if ($code == '' || $name == '' || $description == '') {
            $this->session->set_flashdata('act_fail', 'Thêm không thành công');
            redirect('admin/product/add');
        }
        $model = new Product_Model();
        $rs = $model->add_product_type($code, $name, $description);
        if ($rs) {
            $this->session->set_flashdata('act_success', 'Thêm thành công');
            redirect('admin/product/add');
        } else {
            $this->session->set_flashdata('act_fail', 'Thêm không thành công');
            redirect('admin/product/add');
        }
    }

    public function check_code_brand_exist()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $code_brand = isset($_POST['code_brand']) ? $_POST['code_brand'] : '';
        $code_group_old = isset($_POST['code_old']) ? $_POST['code_old'] : '';
        $model = new Product_Model();
        $rs = $model->check_code_brand($id, $code_brand, $code_group_old);
        echo json_encode($rs);
    }

    public function addbrand()
    {
        $code_brand = isset($_POST['code_brand']) ? $_POST['code_brand'] : '';
        $name_brand = isset($_POST['name_brand']) ? $_POST['name_brand'] : '';
        if (!empty($_FILES['logo']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['logo']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("logo")) {
                $logo = $this->upload->data()['file_name'];
            } else {
                $logo = '';
                $this->session->set_flashdata('act_fail', 'Thêm không thành công');
                redirect('admin/product/add');
            }
        } else {
            $this->session->set_flashdata('act_fail', 'Thêm không thành công');
            redirect('admin/product/add');
        }
        if ($code_brand == '' || $name_brand == '' || $logo == '') {
            $this->session->set_flashdata('act_fail', 'Thêm không thành công');
            redirect('admin/product/add');
        }
        $model = new Product_Model();
        $rs = $model->add_brand($code_brand, $name_brand, $logo);
        if ($rs) {
            $this->session->set_flashdata('act_success', 'Thêm thành công');
            redirect('admin/product/add');
        } else {
            $this->session->set_flashdata('act_fail', 'Thêm không thành công');
            redirect('admin/product/add');
        }
    }

    public function check_code_product_exist()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $code = isset($_POST['code']) ? $_POST['code'] : '';
        $code_group_old = isset($_POST['code_old']) ? $_POST['code_old'] : '';
        $model = new Product_Model();
        $rs = $model->check_code_product($id, $code, $code_group_old);
        echo json_encode($rs);
    }

    public function addAction()
    {
        $code = isset($_POST['code_product']) ? $_POST['code_product'] : '';
        $name = isset($_POST['name_product']) ? $_POST['name_product'] : '';
        $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';
        $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
        if (!empty($_FILES['img_cover']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $brand . '-' . $product_type . '-' . $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-cover';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("img_cover")) {
                $cover = $this->upload->data()['file_name'];
            } else {
                $cover = '';
                $this->session->set_flashdata('act_fail', 'Thêm không thành công');
                redirect('admin/product/add');
            }
        } else {
            $this->session->set_flashdata('act_fail', 'Thêm không thành công');
            redirect('admin/product/add');
        }

        $img_list='';
        $file  = $_FILES['img_list'];
        $count = count($file['name']);
        if($count>0){
            $config=array();

            for($i=0; $i<=$count-1; $i++) {
                $config['upload_path']   = 'upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $_FILES['userfile']['name']     = $file['name'][$i];
                $_FILES['userfile']['type']     = $file['type'][$i];
                $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
                $_FILES['userfile']['error']    = $file['error'][$i];
                $_FILES['userfile']['size']     = $file['size'][$i];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload())
                {
                    $img_list.= $this->upload->data()['file_name'].'/';
                }
                else{
                    $this->session->set_flashdata('act_fail','Thêm không thành công');
                    redirect('admin/product/add');
                }
            }
        }
        $description=isset($_POST['description'])?$_POST['description']:'';
        if($code=='' || $name=='' || $product_type=='' || $brand=='' || $cover=='' || $img_list=='' || $description==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
        $model=new Product_Model();
        $rs=$model->add_product($code,$name,$product_type,$brand,$cover,$img_list,$description);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/product');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/product/add');
        }
    }

    public function edit()
    {
        $this->data['action'] = 'edit';
        $model = new Product_Model();
        $id = $this->uri->segment(4);
        if ($id == '') {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        } else {
            $this->data['brand'] = $model->get_brand();
            $this->data['product_type'] = $model->get_product_type();
            $item = $model->get_item_by_id($id);
            if ($item) {
                $this->data['item'] = $item;
                $this->load->view('admin/product/edit', $this->data);
            } else {
                $this->data['heading'] = 'Lỗi';
                $this->data['message'] = 'Không tìm thấy dữ liệu';
                $this->load->view('errors/html/error_404', $this->data);
            }
        }
    }

    public function editAction()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $code = isset($_POST['code_product']) ? $_POST['code_product'] : '';
        $name = isset($_POST['name_product']) ? $_POST['name_product'] : '';
        $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';
        $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
        if (!empty($_FILES['img_cover']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $brand . '-' . $product_type . '-' . $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-cover';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("img_cover")) {
                $cover = $this->upload->data()['file_name'];
            } else {
                $cover = '';
                $this->session->set_flashdata('act_fail', 'Sửa không thành công');
                redirect('admin/product/edit/'.$id);
            }
        } else {
            $this->session->set_flashdata('act_fail', 'Sửa không thành công');
            redirect('admin/product/edit/'.$id);
        }

        $img_list='';
        $file  = $_FILES['img_list'];
        $count = count($file['name']);
        if($count>0){
            $config=array();

            for($i=0; $i<=$count-1; $i++) {
                $config['upload_path']   = 'upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $_FILES['userfile']['name']     = $file['name'][$i];
                $_FILES['userfile']['type']     = $file['type'][$i];
                $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
                $_FILES['userfile']['error']    = $file['error'][$i];
                $_FILES['userfile']['size']     = $file['size'][$i];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload())
                {
                    $img_list.= $this->upload->data()['file_name'].'/';
                }
                else{
                    $this->session->set_flashdata('act_fail','Sửa không thành công');
                    redirect('admin/product/add');
                }
            }
        }
        $description=isset($_POST['description'])?$_POST['description']:'';
        if($id=='' || $code=='' || $name=='' || $product_type=='' || $brand=='' || $cover=='' || $img_list=='' || $description==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
        $model=new Product_Model();
        $rs = $model->edit_product($id, $code, $name, $product_type, $brand, $cover, $img_list,$description);
        if ($rs) {
            $this->session->set_flashdata('act_success', 'Sửa thành công');
            redirect('admin/product');
        } else {
            $this->session->set_flashdata('act_fail', 'Sửa không thành công');
            redirect('admin/product/edit/' . $id);
        }
    }

    public function getItemById(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $model = new Product_Model();
        $rs = $model->get_item_by_id($id);
        echo json_encode($rs);
    }

    public function setColor(){
        $model=new Product_Model();
        $id=$this->uri->segment(4);
        $item=$model->get_item_by_id($id);
        $this->data['color_exist']=$model->get_product_color_by_id($id);
        $this->data['list_color']=$model->get_list_color();
        if ($item) {
            $this->data['item'] = $item;
            $this->load->view('admin/product/setcolor', $this->data);
        } else {
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function check_color_exist(){
        $id_product=isset($_POST['id_product'])?$_POST['id_product']:'';
        $id_color=isset($_POST['id_color'])?$_POST['id_color']:'';
        $model=new Product_Model();
        $rs=$model->check_color($id_product,$id_color);
        echo json_encode($rs);
    }

    public function savecolor(){
        $id_product=isset($_POST['id'])?$_POST['id']:'';
        $list_id_color=isset($_POST['list_color'])?$_POST['list_color']:'';
        $model=new Product_Model();
        $add=$model->save_color($id_product,$list_id_color);
        if($add){
            $this->session->set_flashdata('act_success','Thêm màu thành công');
            redirect('admin/product/setcolor/'.$id_product);
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/product/setcolor/'.$id_product);
        }
    }

    public function delById()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if ($id == '') {
            $this->session->set_flashdata('act_fail', 'Xóa không thành công');
            redirect('admin/account');
        }
        $model = new Account_Model();
        $model->delete($id);
    }

}
