<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    public function check_code_product_type($id,$code,$code_old){
        $sql='SELECT * FROM product_type WHERE code=\''.strtolower($code).'\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_product_type($code,$name,$description){
        $data=array(
            'code'=>strtolower($code),
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'description'=>$description,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('product_type',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }

    public function check_code_brand($id,$code,$code_old){
        $sql='SELECT * FROM brand WHERE code=\''.strtolower($code).'\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_brand($code,$name,$logo){
        $data=array(
            'code'=>strtolower($code),
            'name'=>$name,
            'logo'=>$logo,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('brand',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }

    public function check_code_product($id,$code,$code_old){
        $sql='SELECT * FROM product WHERE code=\''.strtolower($code).'\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_product($code,$name,$product_type,$brand,$cover,$img_list,$description){
        $data=array(
            'code'=>strtolower($code),
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'brand_id'=>$brand,
            'product_type_id'=>$product_type,
            'img_cover'=>$cover,
            'img_list'=>$img_list,
            'description'=>$description,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('product',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }

    public function get_list($find)
    {
        $cond = '';
        if ($find != '') {
            $cond .= ' and (name_vi like \'%' . $find . '%\' or code like \'%' . $find . '%\')';
        }
        $sql = 'SELECT product.*,brand.name as brand,product_type.name as product_type 
            FROM product
            JOIN product_type ON product.product_type_id=product_type.id
            JOIN brand ON product.brand_id=brand.id
            WHERE product.is_show=1 and product_type.is_show=1 and brand.is_show=1' . $cond;
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->result_array();
        } else {
            return false;
        }
    }

    public function get_brand(){
        $sql='SELECT * FROM brand WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_product_type(){
        $sql='SELECT * FROM product_type WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function edit_product($id, $code, $name, $product_type, $brand, $cover, $img_list,$description){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'brand_id'=>$brand,
            'product_type_id'=>$product_type,
            'img_cover'=>$cover,
            'img_list'=>$img_list,
            'description'=>$description,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $edit=$this->db->update('product',$data,"id=".$id);
        $this->db->trans_complete();
        return $edit;
    }

    public function get_item_by_id($id){
        $sql='SELECT * FROM product WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

    public function get_product_color_by_id($id){
        $sql='SELECT product_color.*,color.name as color
        FROM product_color 
        JOIN color ON product_color.color_id=color.id
        WHERE color.is_show=1 and product_color.is_show=1 and product_color.product_id='.$id
        ;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_list_color(){
        $sql='SELECT * FROM color WHERE is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function check_color($id_product,$id_color){
        $sql='SELECT * FROM product_color WHERE is_show=1 and product_id='.$id_product.' and color_id='.$id_color;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function save_color($id_product,$list_color){
        $this->db->trans_start();
        $data=array(
            'product_id'=>$id_product,
            'is_show'=>1,
            'created'=>getdate()[0],
            'discount'=>0,
            'price_avg'=>0
        );
        if(!empty($list_color)){
            foreach ($list_color as $id_color){
                $data['color_id']=$id_color;
                $this->db->insert('product_color',$data);
                $add=$this->db->insert_id();
            }
        }
        $this->db->trans_complete();
        return $add;
    }

    public function delete($id){
        $data=array(
            'is_show'=>1,
            'created'=>getdate()[0]
        );
        $this->db->trans_start();
        $delete=$this->db->update('account', $data, "id = $id");
        $this->db->trans_complete();
        return $delete;
    }
}
