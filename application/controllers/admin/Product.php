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
        $code_product_type = isset($_POST['code_product_type']) ? $_POST['code_product_type'] : '';
        $model = new Product_Model();
        $rs = $model->check_code_product_type( $code_product_type);
        echo json_encode($rs);
    }

    public function addproducttype()
    {
        $code = isset($_POST['code_product_type']) ? $_POST['code_product_type'] : '';
        $name = isset($_POST['name_product_type']) ? $_POST['name_product_type'] : '';
        $description = isset($_POST['description_type']) ? $_POST['description_type'] : '';
        if ($code == '' || $name == '' || $description == '') {
            $this->session->set_flashdata('act_fail', 'Nhập đầy đủ thông tin');
            redirect('admin/product/add');
        }
        $model = new Product_Model();
        $rs = $model->add_product_type($code, $name, $description);
        if ($rs) {
            $this->session->set_flashdata('act_success', 'Thêm loại son thành công');
            redirect('admin/product/add');
        } else {
            $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình xử lý');
            redirect('admin/product/add');
        }
    }

    public function check_code_brand_exist()
    {
        $code_brand = isset($_POST['code_brand']) ? $_POST['code_brand'] : '';
        $model = new Product_Model();
        $rs = $model->check_code_brand($code_brand);
        echo json_encode($rs);
    }

    public function addbrand()
    {
        $code_brand = isset($_POST['code_brand']) ? $_POST['code_brand'] : '';
        $name_brand = isset($_POST['name_brand']) ? $_POST['name_brand'] : '';
        if (!empty($_FILES['logo']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] =$name_brand;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("logo")) {
                $logo = $this->upload->data()['file_name'];
            } else {
                $logo = '';
                $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh');
                redirect('admin/product/add');
            }
        } else {
            $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh');
            redirect('admin/product/add');
        }
        if ($code_brand == '' || $name_brand == '' || $logo == '') {
            $this->session->set_flashdata('act_fail', 'Nhập đầy đủ thông tin');
            redirect('admin/product/add');
        }
        $model = new Product_Model();
        $rs = $model->add_brand($code_brand, $name_brand, $logo);
        if ($rs) {
            $this->session->set_flashdata('act_success', 'Thêm thương hiệu thành công');
            redirect('admin/product/add');
        } else {
            $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình xử lý');
            redirect('admin/product/add');
        }
    }

    public function check_code_product_exist()
    {
        $code = isset($_POST['code']) ? $_POST['code'] : '';
        $model = new Product_Model();
        $rs = $model->check_code_product( $code);
        echo json_encode($rs);
    }

    public function addAction()
    {
        $code = isset($_POST['code_product']) ? $_POST['code_product'] : '';
        $name = isset($_POST['name_product']) ? $_POST['name_product'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $discount = isset($_POST['discount']) ? $_POST['discount'] : '';
        $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';
        $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
        $hide = isset($_POST['hide']) ? $_POST['hide'] : '';
        if (!empty($_FILES['img_cover']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-cover';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("img_cover")) {
                $cover = $this->upload->data()['file_name'];
            } else {
                $cover = '';
                $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh cover');
                redirect('admin/product/add');
            }
        } else {
            $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh cover');
            redirect('admin/product/add');
        }

        $file  = $_FILES['img_list'];
        $count = count($file['name']);
        if($count>0){
            $config=array();
            $img_list_array=array();
            for($i=0; $i<=$count-1; $i++) {
                $config['upload_path']   = 'upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] =  $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-img-'.$i;
                $_FILES['userfile']['name']     = $file['name'][$i];
                $_FILES['userfile']['type']     = $file['type'][$i];
                $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
                $_FILES['userfile']['error']    = $file['error'][$i];
                $_FILES['userfile']['size']     = $file['size'][$i];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload("userfile"))
                {
                    $img_list_array[$i]= $this->upload->data()['file_name'];
                }
                else{
                    $this->session->set_flashdata('act_fail','Có lỗi trong quá tình upload ảnh');
                    redirect('admin/product/add');
                }
            }
            $img_list=implode('/',$img_list_array);
        }
        $description=isset($_POST['description'])?$_POST['description']:'';
        if($code=='' || $name=='' || $product_type=='' || $brand=='' || $cover=='' || $img_list=='' || $description=='' || $price=='' || $discount=='' || $hide==''){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/account/add');
        }
        $model=new Product_Model();
        $rs=$model->add_product($code,$name,$price,$discount,$product_type,$brand,$cover,$img_list,$description,$hide);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm sản phẩm thành công');
            redirect('admin/product');
        }
        else{
            $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
            redirect('admin/product/add');
        }
    }

    public function edit()
    {
        $this->data['action'] = 'edit';
        $model = new Product_Model();
        $md5 = $this->uri->segment(4);
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $this->data['brand'] = $model->get_brand();
            $this->data['product_type'] = $model->get_product_type();
            $item = $model->get_item_by_md5($md5);
            if ($item) {
                $this->data['check']=$model->check_name($item['md5']);
                $this->data['item'] = $item;
                $this->load->view('admin/product/edit', $this->data);
            } else {
                $this->data['heading'] = 'Lỗi';
                $this->data['message'] = 'Không tìm thấy dữ liệu';
                $this->load->view('errors/html/error_404', $this->data);
            }
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function editAction()
    {
        $md5 = isset($_POST['md5']) ? $_POST['md5'] : '';
        $code = isset($_POST['code']) ? $_POST['code'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';
        $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
        $change_img=isset($_POST['change_img'])?$_POST['change_img']:'';
        $cover=isset($_POST['img_cover_old'])?$_POST['img_cover_old']:'';
        $img_list=isset($_POST['img_list_old'])?$_POST['img_list_old']:'';
        $description=isset($_POST['description'])?$_POST['description']:'';
        if($change_img==1){
            //xóa ảnh
            if(file_exists('upload/'.$cover)){
                unlink('upload/'.$cover);
            }
            $img=explode('/',$img_list);
            foreach ($img as $i){
                if(file_exists('upload/'.$i)){
                    unlink('upload/'.$i);
                }
            }
            //tải ảnh mới
            if (!empty($_FILES['img_cover']['name'])){
                $config['upload_path'] = 'upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] =  $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-cover';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload("img_cover")) {
                    $cover = $this->upload->data()['file_name'];
                } else {
                    $cover = '';
                    $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh cover');
                    redirect('admin/product/edit/'.$md5);
                }
            } else {
                $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh cover');
                redirect('admin/product/edit/'.$md5);
            }
            $file  = $_FILES['img_list'];
            $count = count($file['name']);
            if($count>0){
                $config=array();
                $img_list_array=array();
                for($i=0; $i<=$count-1; $i++) {
                    $config['upload_path']   = 'upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] =  $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-img-'.$i;
                    $_FILES['userfile']['name']     = $file['name'][$i];
                    $_FILES['userfile']['type']     = $file['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
                    $_FILES['userfile']['error']    = $file['error'][$i];
                    $_FILES['userfile']['size']     = $file['size'][$i];
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload("userfile"))
                    {
                        $img_list_array[$i]= $this->upload->data()['file_name'];
                    }
                    else{
                        $this->session->set_flashdata('act_fail','Có lỗi trong quá trình upload ảnh');
                        redirect('admin/product/edit/'.$md5);
                    }
                }
                $img_list=implode('/',$img_list_array);
            }
        }
        if($md5=='' || $code=='' || $name=='' || $product_type=='' || $brand=='' || $cover=='' || $img_list=='' || $description==''){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/product/edit/' . $md5);
        }
        $model=new Product_Model();
        $rs = $model->edit_product($md5, $code, $name, $product_type, $brand, $cover, $img_list,$description);
        if ($rs) {
            $this->session->set_flashdata('act_success', 'Sửa sản phẩm thành công');
            redirect('admin/product');
        } else {
            $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình xử lý');
            redirect('admin/product/edit/' . $md5);
        }
    }

    public function getItemById(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $model = new Product_Model();
        $rs = $model->get_item_by_md5(md5($id));
        echo json_encode($rs);
    }

    public function setColor(){
        $model=new Product_Model();
        $md5=$this->uri->segment(4);
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $this->data['item']=$model->get_item_by_md5($md5);
            $this->data['color_exist']=$model->get_product_color_by_id($this->data['item']['id']);
            $this->data['list_color']=$model->get_list_color();
            $this->load->view('admin/product/setcolor', $this->data);
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function delcolor(){
        $model=new Product_Model();
        $md5=$this->uri->segment(4);
        $product=$model->get_product_by_md5_product_color($md5);
        $check_md5=$model->check_md5_product_color($md5);
        if($check_md5){
            $check_bill=$model->check_product_color_in_bill($md5);
            if(!$check_bill){
                $rs=$model->delete_product_color($md5);
                if($rs){
                    $this->session->set_flashdata('act_success','Xóa màu son thành công');
                    redirect('admin/product/setcolor/'.$product['md5']);
                }
                else{
                    $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
                    redirect('admin/product/setcolor/'.$product['md5']);
                }
            }
            else{
                $this->session->set_flashdata('act_fail','Có đơn hàng chứa sản phẩm này');
                redirect('admin/product/setcolor/'.$product['md5']);
            }
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function check_color_exist(){
        $id_product=isset($_POST['id_product'])?$_POST['id_product']:'';
        $id_color=isset($_POST['id_color'])?$_POST['id_color']:'';
        $index=isset($_POST['index'])?$_POST['index']:"";
        $model=new Product_Model();
        $rs=$model->check_color($id_product,$id_color,$index);
        echo json_encode($rs);
    }

    public function savecolor(){
        $md5=isset($_POST['md5'])?$_POST['md5']:'';
        echo $md5;
        $list_id_color=isset($_POST['list_color'])?$_POST['list_color']:'';
        $model=new Product_Model();
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $add=$model->save_color($md5,$list_id_color);
            if($add){
                $this->session->set_flashdata('act_success','Thêm màu son thành công');
                redirect('admin/product/setcolor/'.$md5);
            }
            else{
                $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
                redirect('admin/product/setcolor/'.$md5);
            }
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function delete()
    {
        $md5 = $this->uri->segment(4);
        $model = new Product_Model();
        $check_md5=$model->check_md5($md5);
        if ($check_md5) {
            $check_name=$model->check_name($md5);
            if(!$check_name){
                $rs=$model->delete($md5);
                if($rs){
                    $this->session->set_flashdata('act_sucess', 'Xóa sản phẩm thành công');
                    redirect('admin/product');
                }
                else{
                    $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình xử lý');
                    redirect('admin/product');
                }
            }
            else{
                $this->session->set_flashdata('act_fail', 'Sản phẩm đã tồn tại trong đơn hàng');
                redirect('admin/product');
            }
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }

    }

}
