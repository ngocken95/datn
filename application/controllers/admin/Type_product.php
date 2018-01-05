<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_product extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/type_product_model');
    }

    public function index(){
        $model=new Type_product_Model();
        $this->data['action']='list';
        $this->data['items']=$model->get_list($this->data['find']);
        $this->load->view('admin/type_product/list',$this->data);
    }

    public function edit(){
        $md5=$this->uri->segment(4);
        $this->data['action']='edit';
        $model=new Type_product_Model();
        $check_md5=$model->check_md5($md5);
        if($check_md5){
            $this->data['item']=$model->get_brand_by_md5($md5);
            $this->load->view('admin/type_product/edit',$this->data);
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function editaction(){
        $md5=isset($_POST['md5'])?$_POST['md5']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        if($md5=='' || $name==''){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/brand');
        }
        $model=new Brand_Model();
        $rs=$model->edit_brand($md5,$name);
        if($rs){
            $this->session->set_flashdata('act_success','Sửa thương hiệu thành công');
            redirect('admin/type_product');
        }
        else{
            $this->session->set_flashdata('act_fail','Lỗi trong quá trình xử lý');
            redirect('admin/type_product/edit/'.$md5);
        }
    }

    public function delete(){
        $md5=$this->uri->segment(4);
        $model=new Type_product_Model();
        $check_id=$model->check_md5($md5);
        if($check_id){
            $check_product=$model->check_product($md5);
            if($check_product){
                $this->session->set_flashdata('act_fail','Có sản phẩm của thương hiệu này');
                redirect('admin/type_product');
            }
            else{
                $rs=$model->delete($md5);
                if($rs){
                    $this->session->set_flashdata('act_success','Xóa thương hiệu thành công');
                    redirect('admin/type_product');
                }
                else{
                    $this->session->set_flashdata('act_success','Lỗi trong quá trình xử lý');
                    redirect('admin/type_product');
                }
            }
        }
        else{
            $this->data['heading'] = 'Lỗi';
            $this->data['message'] = 'Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404', $this->data);
        }
    }

    public function add(){
        $this->data['action']='add';
        $this->load->view('admin/type_product/add',$this->data);
    }

    public function check_code(){
        $code=isset($_POST['code'])?$_POST['code']:'';
        $model=new Type_product_Model();
        $rs=$model->check_code($code);
        echo json_encode($rs);
    }

    public function addAction()
    {
        $code = isset($_POST['code']) ? $_POST['code'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $code . '-' . convert_vi_to_en(str_replace(' ','-',$name)).'-brand';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("img")) {
                $img = $this->upload->data()['file_name'];
            } else {
                $img = '';
                $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh');
                redirect('admin/brand/add');
            }
        } else {
            $this->session->set_flashdata('act_fail', 'Có lỗi trong quá trình upload ảnh');
            redirect('admin/type_product/add');
        }
        if($code=='' || $name=='' || $img==''){
            $this->session->set_flashdata('act_fail','Nhập đầy đủ thông tin');
            redirect('admin/type_product/add');
        }
        $model=new Type_product_Model();
        $rs=$model->add_brand($code,$name,$img);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thương hiệu thành công');
            redirect('admin/type_product');
        }
        else{
            $this->session->set_flashdata('act_fail','Có lỗi trong quá trình xử lý');
            redirect('admin/type_product/add');
        }
    }
}
            