<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Homepage extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/homepage_model');
    }

    public function index()
    {
        $model=new Homepage_Model();
        $this->data['list_product_buy']=$model->get_list_product('product_buy',4);
        $this->data['list_product_new']=$model->get_list_product('created',4);
        $this->data['list_product_like']=$model->get_list_product('product_like',4);
        $this->load->view('site/homepage/homepage',$this->data);
    }

    public function like(){
         $id=$this->uri->segment(3);
         print_r($this->session->userdata('product'));
         $check=false;
         if(!empty($this->session->userdata('product')['like'])){
             foreach ($this->session->userdata('product')['like'] as $k=>$like){
                 $product[$k]=$like;
                 if($like==$id){
                    $check=true;
                 }
             }
         }
         if($check){
             redirect($_SERVER['HTTP_REFERER']);
         }
         else{
             //update like product
             $model=new Homepage_Model();
             $model->update_like($id);
             //
             $product=$this->session->userdata('product');
             $product['like'][count($this->session->userdata('product')['like'])]=$id;
             $this->session->set_userdata('product',$product);
             redirect($_SERVER['HTTP_REFERER']);
         }
    }
}
            