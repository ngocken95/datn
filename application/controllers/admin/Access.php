<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MY_Controller {

    private $data=array();

    function __construct(){
        $this->data=parent::__construct();
        $this->load->model('admin/access_model');
    }

    public function index(){
        $this->data['action']='list';
        $model=new Access_Model();
        $account=isset($_POST['account'])?$_POST['account']:1;
        $find=isset($_GET['find'])?$_GET['find']:'';
        $this->data['list_account']=$model->get_list_account();
        $this->data['items']=$model->get_access_by_account($find,$account);
        $this->load->view('admin/access/list',$this->data);
    }

    public function save(){
        $model=new Access_Model();
        $account=isset($_POST['account_id'])?$_POST['account_id']:1;
        if($account==''){
            $this->session->set_flashdata('act_fail','Lưu không thành công');
            redirect('admin/access');
        }
        else{
            $view=isset($_POST['view'])?$_POST['view']:'';
            $edit=isset($_POST['edit'])?$_POST['edit']:'';
            $delete=isset($_POST['delete'])?$_POST['delete']:'';
            $add=isset($_POST['add'])?$_POST['add']:'';
            $restore=isset($_POST['restore'])?$_POST['restore']:'';
            $model->save($account,$view,$edit,$delete,$add,$restore);
            $this->session->set_flashdata('act_success','Lưu thành công');
            redirect('admin/access');
        }
    }

    public function add(){
        $this->data['action']='add';
        $model=new Account_Model();
        $this->data['group']=$model->get_group();
        $this->load->view('admin/account/add',$this->data);
    }

    public function edit(){
        $this->data['action']='edit';
        $model=new Account_Model();
        $id=$this->uri->segment(4);
        if($id==''){
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
        else{
            $this->data['group']=$model->get_group();
            $item=$model->get_item_by_id($id);
            if($item){
                $this->data['item']=$item;
                $this->load->view('admin/account/edit',$this->data);
            }
            else{
                $this->data['heading']='Lỗi';
                $this->data['message']='Không tìm thấy dữ liệu';
                $this->load->view('errors/html/error_404',$this->data);
            }
        }
    }

    public function addgroup(){
        $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
        $name_group=isset($_POST['name_group'])?$_POST['name_group']:'';
        if($code_group=='' || $name_group==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
        $model=new Account_Model();
        $rs=$model->add_group($code_group,$name_group);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/account/add');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
    }

    public function check_group_exist_none(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
        $code_group_old=isset($_POST['code_old'])?$_POST['code_old']:'';
        $model=new Account_Model();
        $rs=$model->check_code_group($id,$code_group,$code_group_old);
        echo json_encode($rs);
    }

    public function check_username_exist_none(){
        $username=isset($_POST['username'])?$_POST['username']:'';
        $model=new Account_Model();
        $rs=$model->check_username($username);
        echo json_encode($rs);
    }

    public function addAction(){
        $username=isset($_POST['username'])?$_POST['username']:'';
        $password=isset($_POST['password'])?$_POST['password']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        $email=isset($_POST['email'])?$_POST['email']:'';
        $phone=isset($_POST['phone'])?$_POST['phone']:'';
        $group=isset($_POST['group'])?$_POST['group']:'';
        if($username=='' || $password=='' || $email=='' || $name=='' || $phone=='' || $group==''){
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
        $model=new Account_Model();
        $rs=$model->add_account($username,$password,$name,$email,$phone,$group);
        if($rs){
            $this->session->set_flashdata('act_success','Thêm thành công');
            redirect('admin/account');
        }
        else{
            $this->session->set_flashdata('act_fail','Thêm không thành công');
            redirect('admin/account/add');
        }
    }

    public function editAction(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        $username=isset($_POST['username'])?$_POST['username']:'';
        $password=isset($_POST['password'])?$_POST['password']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        $email=isset($_POST['email'])?$_POST['email']:'';
        $phone=isset($_POST['phone'])?$_POST['phone']:'';
        $group=isset($_POST['group'])?$_POST['group']:'';
        if($id=='' || $username=='' || $password=='' || $email=='' || $name=='' || $phone=='' || $group==''){
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/account/edit/'.$id);
        }
        $model=new Account_Model();
        $rs=$model->edit_account($id,$username,$password,$name,$email,$phone,$group);
        if($rs){
            if($this->session->userdata['user']['id']==$id){
                $item=$model->get_item_by_id($id);
                $this->session->set_userdata('user',$item);
            }
            $this->session->set_flashdata('act_success','Sửa thành công');
            redirect('admin/account');
        }
        else{
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/account/edit/'.$id);
        }
    }

    public function getItemById($id=''){
        if($id==''){
            $id=isset($_POST['id'])?$_POST['id']:'';
        }
        $model=new Account_Model();
        $rs=$model->get_item_by_id($id);
        echo json_encode($rs);
    }

    public function editGroup(){
        $code_group=isset($_POST['code_group'])?$_POST['code_group']:'';
        $name_group=isset($_POST['name_group'])?$_POST['name_group']:'';
        $id=isset($_POST['id'])?$_POST['id']:'';
        if($code_group=='' || $name_group=='' || $id==''){
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/account');
        }
        $model=new Account_Model();
        $rs=$model->edit_group($id,$code_group,$name_group);
        if($rs){
            $this->session->set_flashdata('act_success','Sửa thành công');
            redirect('admin/account');
        }
        else{
            $this->session->set_flashdata('act_fail','Sửa không thành công');
            redirect('admin/account');
        }
    }

    public function checkListByGroupId(){
        $id_group=isset($_POST['id'])?$_POST['id']:'';
        if($id_group==''){
            $this->session->set_flashdata('act_fail','Xóa không thành công');
            redirect('admin/account');
        }
        $model=new Account_Model();
        $rs=$model->check_list_by_group_id($id_group);
        echo json_encode($rs);
    }

    public function delById(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        if($id==''){
            $this->session->set_flashdata('act_fail','Xóa không thành công');
            redirect('admin/account');
        }
        $model=new Account_Model();
        $model->delete($id);
    }

}
