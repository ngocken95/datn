<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class News extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/news_model');
    }
    
    public function index(){
        $model=new News_Model();
        $this->data['list_news']=$model->get_list_news();
        $this->load->view('site/news/news',$this->data);
    }

    public function detail(){
        $model=new News_Model();
        $this->data['news_view']=$model->get_top_view();
        $id=$this->uri->segment(3);
        $check=$model->check_id($id);
        if($check){
            $rs=$model->get_news_by_id($id);
            if($rs){
                $this->data['news']=$rs;
                $this->load->view('site/news/detail',$this->data);
            }
            else{
                $this->data['heading']='Lỗi';
                $this->data['message']='Không tìm thấy dữ liệu';
                $this->load->view('errors/html/error_404',$this->data);
            }
        }
        else{
            $this->data['heading']='Lỗi';
            $this->data['message']='Không tìm thấy dữ liệu';
            $this->load->view('errors/html/error_404',$this->data);
        }
    }
}
            