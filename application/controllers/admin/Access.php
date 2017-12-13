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
        $account=isset($_POST['account'])?$_POST['account']:$this->session->userdata('user')['id'];
        $find=isset($_GET['find'])?$_GET['find']:'';
        $this->data['list_account']=$model->get_list_account();
        $this->data['items']=$model->get_access_by_account($find,$account);
        $this->load->view('admin/access/list',$this->data);
    }

    public function save(){
        $model=new Access_Model();
        $account=isset($_POST['account_id'])?$_POST['account_id']:'';
        if($account==''){
            $this->session->set_flashdata('act_fail','Lưu không thành công');
            redirect('admin/access');
        }
        else{
            $view=isset($_POST['view'])?$_POST['view']:'';
            $edit=isset($_POST['edit'])?$_POST['edit']:'';
            $delete=isset($_POST['delete'])?$_POST['delete']:'';
            $add=isset($_POST['add'])?$_POST['add']:'';
            $model->save($account,$view,$edit,$delete,$add);
            $this->data['acc']=$account;
            $this->session->set_flashdata('act_success','Lưu thành công');
            redirect('admin/access');
        }
    }

}
