<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    public function check_code_product_type($code){
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
        $content='
<h4>Thêm loại son</h4>
<table>
<thead>
<tr><th>Thông tin loại son</th></tr>
</thead>
<tbody>
<tr><td>'.$code.'</td></tr>
<tr><td>'.$name.'</td></tr>
<tr><td>'.$description.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $this->db->insert('product_type',$data);
        $add=$this->db->insert_id();
        $add=$this->db->update('product_type',array('md5'=>md5($add)),"id=$add");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function check_code_brand($code){
        $sql='SELECT * FROM brand WHERE code=\''.strtolower($code).'\'';
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
        $content='
<h4>Thêm thương hiệu</h4>
<table>
<thead>
<tr><th>Thông tin thương hiệu</th></tr>
</thead>
<tbody>
<tr><td>'.$code.'</td></tr>
<tr><td>'.$name.'</td></tr>
<tr><td>'.$logo.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $this->db->insert('brand',$data);
        $add=$this->db->insert_id();
        $add=$this->db->update('brand',array('md5'=>md5($add)),"id=$add");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function check_code_product($code){
        $sql='SELECT * FROM product WHERE code=\''.strtolower($code).'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_product($code,$name,$price,$discount,$product_type,$brand,$cover,$img_list,$description,$hide){
        $data=array(
            'code'=>strtolower($code),
            'name'=>$name,
            'price'=>$price,
            'discount'=>$discount,
            'name_vi'=>convert_vi_to_en($name),
            'brand_id'=>$brand,
            'product_type_id'=>$product_type,
            'img_cover'=>$cover,
            'img_list'=>$img_list,
            'description'=>$description,
            'created'=>getdate()[0],
            'is_show'=>1,
            'hide'=>$hide
        );
        $content='
<h4>Thêm sản phẩm</h4>
<table>
<thead>
<tr><th>Thông tin sản phẩm</th></tr>
</thead>
<tbody>
<tr><td>'.$code.'</td></tr>
<tr><td>'.$name.'</td></tr>
<tr><td>'.$price.'</td></tr>
<tr><td>'.$discount.'</td></tr>
<tr><td>'.$product_type.'</td></tr>
<tr><td>'.$brand.'</td></tr>
<tr><td>'.$cover.'</td></tr>
<tr><td>'.$img_list.'</td></tr>
<tr><td>'.$description.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $this->db->insert('product',$data);
        $add=$this->db->insert_id();
        $add=$this->db->update('product',array('md5'=>md5($add)),"id=$add");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
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
            return null;
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

    public function edit_product($md5, $code, $name, $product_type, $brand, $cover, $img_list,$description,$hide){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'brand_id'=>$brand,
            'product_type_id'=>$product_type,
            'img_cover'=>$cover,
            'img_list'=>$img_list,
            'description'=>$description,
            'hide'=>$hide,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $product=self::get_item_by_md5($md5);
        $content='
<h4>Sửa sản phẩm</h4>
<table>
<thead>
<tr><th>Sản phẩm cũ</th><th>Sản phẩm mới</th></tr>
</thead>
<tbody>
<tr><td>'.$product['code'].'</td><td>'.$code.'</td></tr>
<tr><td>'.$product['name'].'</td><td>'.$name.'</td></tr>
<tr><td>'.$product['product_type_id'].'</td><td>'.$product_type.'</td></tr>
<tr><td>'.$product['brand_id'].'</td><td>'.$brand.'</td></tr>
<tr><td>'.$product['img_cover'].'</td><td>'.$cover.'</td></tr>
<tr><td>'.$product['img_list'].'</td><td>'.$img_list.'</td></tr>
<tr><td>'.$product['description'].'</td><td>'.$description.'</td></tr>
<tr><td>'.$product['hide'].'</td><td>'.$hide.'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $edit=$this->db->update('product',$data,"md5='$md5'");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'CHANGE',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $edit;
    }

    public function get_item_by_md5($md5){
        $sql='SELECT * FROM product WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function get_product_color_by_id($id){
        $sql='SELECT product_color.*,color.name as color
        FROM product_color 
        JOIN color ON product_color.color_id=color.id
        WHERE product_color.is_show=1 and product_color.is_show=1 and product_color.product_id=\''.$id.'\''
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

    public function check_color($id_product,$id_color,$index){
        $sql='SELECT * FROM product_color WHERE is_show=1 and product_id='.$id_product.' and color_id='.$id_color;
        $rs=$this->db->query($sql);
        $list=array('index'=>$index);
        if($rs->num_rows()>0){
            $list['id']=$rs->row_array()['id'];
        }
        else{
            $list['id']=false;
        }
        return $list;
    }

    public function save_color($md5,$list_color){
        $this->db->trans_start();
        $product=self::get_item_by_md5($md5);
        $data=array(
            'product_id'=>$product['id'],
            'is_show'=>1,
            'created'=>getdate()[0],
            'price_avg'=>0
        );
        $content='
<h4>Thêm màu sản phẩm</h4>
<table>
<thead>
<tr><th>Thông tin màu sản phẩm</th></tr>
</thead>
<tbody>
<tr><td>'.$product['id'].'</td></tr>
<tr><td>'.print_r($list_color).'</td></tr>
</tbody>
</table>';
        if(!empty($list_color)){
            foreach ($list_color as $id_color){
                if($id_color>0){
                    $data['color_id']=$id_color;
                    $this->db->insert('product_color',$data);
                    $add=$this->db->insert_id();
                    $add=$this->db->update('product_color',array('md5'=>md5($add)),"id=$add");
                }
            }
        }
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function delete($md5){
        $data=array(
            'is_show'=>0,
            'created'=>getdate()[0]
        );
        $this->db->trans_start();
        //xóa sản phẩm trong bảng product_color
        $product=self::get_item_by_md5($md5);
        $content='
<h4>Xóa sản phẩm</h4>
<table>
<thead>
<tr><th>Thông tin sản phẩm</th></tr>
</thead>
<tbody>
<tr><td>'.$product['code'].'</td></tr>
<tr><td>'.$product['name'].'</td></tr>
<tr><td>'.$product['img_cover'].'</td></tr>
<tr><td>'.$product['img_list'].'</td></tr>
<tr><td>'.$product['description'].'</td></tr>
<tr><td>'.$product['price'].'</td></tr>
<tr><td>'.$product['discount'].'</td></tr>
<tr><td>'.$product['product_type_id'].'</td></tr>
<tr><td>'.$product['brand_id'].'</td></tr>
</tbody>
</table>';
        $this->db->update('product_color',$data,"product_id=".$product['id']);
        $delete=$this->db->update('product', $data, "md5 = '$md5'");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'DELETE',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $delete;
    }

    public function check_name($md5){
        //giá trị trả về =true không xóa,=false có thể xóa
        //kiểm tra trong order
        $sql='SELECT * FROM product 
JOIN product_color ON product.id=product_color.product_id
JOIN  detail_order ON product_color.id=detail_order.product_color_id
WHERE product.is_show=1 and product.md5=\''.$md5.'\'
';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        //kiểm tra trong bill
        $sql='SELECT * FROM product 
JOIN product_color ON product.id=product_color.product_id
JOIN  detail_bill ON product_color.id=detail_bill.product_color_id
WHERE product.is_show=1 and product.md5=\''.$md5.'\'
';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        return false;
    }

    public function check_md5($md5){
        $sql='SELECT * FROM product WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function check_md5_product_color($md5){
        $sql='SELECT * FROM product_color WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_product_color_by_md5($md5){
        $sql='SELECT * FROM product_color WHERE is_show=1 and md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function check_product_color_in_bill($md5){
        //giá trị trả về =true không cho xóa,=false có thể xóa
        $product_color=self::get_product_color_by_md5($md5);
        if($product_color['quantity']>0){
            return true;
        }
        $sql='SELECT * FROM product_color JOIN detail_bill ON product_color.id=detail_bill.product_color_id WHERE product_color.is_show=1 and product_color.md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        $sql='SELECT * FROM product_color JOIN detail_order ON product_color.id=detail_order.product_color_id WHERE product_color.is_show=1 and product_color.md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        return false;
    }

    public function delete_product_color($md5){
        $data=array('is_show'=>0);
        $this->db->trans_start();
        $product_color=self::get_product_color_by_md5($md5);
        $content='
<h4>Xóa màu son</h4>
<table>
<thead>
<tr><th>Thông màu son</th></tr>
</thead>
<tbody>
<tr><td>'.$product_color['product_id'].'</td></tr>
<tr><td>'.$product_color['color_id'].'</td></tr>
</tbody>
</table>';
        $delete= $this->db->update('product_color',$data,"md5='$md5'");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'DELETE',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $delete;
    }

    public function get_product_by_md5_product_color($md5){
        $sql='SELECT * FROM product_color JOIN product ON product_color.product_id=product.id WHERE product_color.md5=\''.$md5.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }
}
