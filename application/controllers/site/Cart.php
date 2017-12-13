<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Cart extends MY_Controller {

    private $data=array();
    
     function __construct(){
        $this->data=parent::__construct();
        $this->load->model('site/cart_model');
    }
    
    public function index(){
        $this->load->view('site/cart/cart',$this->data);
    }

    public function additem(){
        $model=new Cart_Model();
        $product_color_id=isset($_POST['color_pick'])?$_POST['color_pick']:'';
        $product=$model->get_product_by_id($product_color_id);
        $qty=isset($_POST['quantity'])?$_POST['quantity']:'';
        $price=isset($_POST['price'])?$_POST['price']:'';
        $rs=$model->add_item($product,$qty,$price);
        if($rs){
            redirect('cart');
        }
        else{
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }

    public function updatecart(){
        $id=isset($_POST['id'])?$_POST['id']:'';
        $qty=isset($_POST['qty'])?$_POST['qty']:'';
        if(!empty($id)){
            foreach ($this->cart->contents() as $key=>$item_cart){
                foreach ($id as $k=>$v){
                    if($key==$v){
                        $this->cart->update(array('rowid'=>$v,'qty'=>$qty[$k]));
                    }
                }
            }
        }
        $this->session->set_flashdata('update_success','Cập nhật thành công');
        redirect('cart');
    }

    public function delete(){
        $rowid=$this->uri->segment(3);
        $check=self::check_cart($rowid);
        if($check){
            $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
            $this->session->set_flashdata('update_success','Xóa thành công');
            redirect('cart');
        }
        else{
            redirect('cart');
        }
    }

    public function check_cart($rowid){
        if(!empty($this->cart->contents())){
            foreach ($this->cart->contents() as $k=>$p){
                if($rowid==$k){
                    return true;
                }
            }
            return false;
        }
    }
}
            