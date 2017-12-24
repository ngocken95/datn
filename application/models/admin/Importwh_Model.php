<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importwh_Model extends CI_Model
{

    public function get_code()
    {
        $sql = 'SELECT MAX(REPLACE(code , \'PN-\', \'\')) as code FROM bill WHERE type=\'IMPORT\'';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() == 1) {
            return $rs->row_array()['code'];
        } else {
            return 0;
        }
    }

    public function get_list($find)
    {
        if ($find != '') {
            $cond = 'and code LIKE \'%' . $find . '%\'';
        } else {
            $cond = '';
        }
        $sql = 'SELECT bill.*,account.name as name
FROM bill 
JOIN account ON bill.account_id=account.id
WHERE bill.is_show=1 and account.is_show=1 and type=\'IMPORT\'' . $cond;
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->result_array();
        } else {
            return false;
        }
    }

    public function get_product_color()
    {
        $sql = 'SELECT product_color.*,product.name as product,color.name as color
                FROM product_color
                JOIN product ON product_color.product_id=product.id
                JOIN color ON product_color.color_id=color.id
                WHERE product.is_show=1 and product_color.is_show=1 and color.is_show=1
                ORDER BY product.name
                ';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->result_array();
        } else {
            return false;
        }
    }

    public function add_bill($code, $date)
    {
        $data = array(
            'code' => $code,
            'created' => $date,
            'is_show' => 1,
            'type' => 'IMPORT',
            'account_id' => $this->session->userdata('user')['id']
        );
        $content = '
<h4>Thêm hóa đơn</h4>
<table>
<thead>
<tr><th>Thông tin hóa đơn</th></tr>
</thead>
<tbody>
<tr><td>' . $code . '</td></tr>
<tr><td>' . $this->session->userdata('user')['name'] . '</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $this->db->insert('bill', $data);
        $add = $this->db->insert_id();
        $this->db->update('bill', array('md5' => md5($add)), "id=$add");
        $data_log = array(
            'user' => $this->session->userdata('user')['username'],
            'type' => 'ADD',
            'is_show' => 1,
            'content' => $content,
            'created' => getdate()[0]
        );
        $this->db->insert('log', $data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function add_detail_bill($id, $product, $quantity, $price)
    {
        $data = array(
            'bill_id' => $id,
            'is_show' => 1
        );
        $total = 0;
        $this->db->trans_start();
        echo json_encode($product);
        foreach ($product as $key => $item) {
            $data['product_color_id'] = $item;
            $data['quantity'] = $quantity[$key];
            $data['price'] = $price[$key];
            $data['total'] = $data['quantity'] * $data['price'];
            $total += $data['quantity'] * $data['price'];
            //update giá trung bình,số lượng sản phẩm
            $sql = 'SELECT * FROM product_color WHERE is_show=1 and id=' . $item;
            $rs = $this->db->query($sql);
            $avg_new = ($rs->row_array()['price_avg'] * $rs->row_array()['quantity'] + $data['price'] * $data['quantity']) / ($rs->row_array()['quantity'] + $data['quantity']);
            $quantity_new = $rs->row_array()['quantity'] + $data['quantity'];
            $data_update = array(
                'price_avg' => $avg_new,
                'quantity' => $quantity_new
            );
            $this->db->update('product_color', $data_update, " id=" . $item);
            $this->db->insert('detail_bill', $data);
            $add = $this->db->insert_id();
        }
        //update total hóa đơn
        $data_bill = array(
            'total' => $total
        );
        $this->db->update('bill', $data_bill, ' id=' . $id);
        $this->db->trans_complete();
        return $add;
    }

    public function check_md5($md5)
    {
        $sql = 'SELECT * FROM bill WHERE md5=\'' . $md5 . '\'';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_detail_bill_by_bill_md5($md5)
    {
        $sql = 'SELECT detail_bill.*,product.name as name,color.name as color 
FROM detail_bill
JOIN bill ON bill.id=detail_bill.bill_id
 JOIN product_color ON detail_bill.product_color_id=product_color.id
 JOIN product ON product.id=product_color.product_id
 JOIN color ON color.id=product_color.color_id
 WHERE detail_bill.is_show=1 and product_color.is_show=1 and product.is_show=1 and color.is_show=1 and bill.md5=\'' . $md5.'\'';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->result_array();
        } else {
            return null;
        }
    }

    public function get_bill_by_md5($md5)
    {
        $sql = 'SELECT bill.*,account.name as name 
FROM bill
 JOIN account ON bill.account_id=account.id
 WHERE account.is_show=1 and bill.md5=\'' . $md5 . '\'';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->row_array();
        } else {
            return null;
        }
    }

    public function edit_bill($id, $time, $md5)
    {
        $data = array(
            'account_id' => $this->session->userdata('user')['id'],
            'created' => $time
        );
        $bill = self::get_bill_by_md5($md5);
        $content = '
<h4>Sửa hóa đơn</h4>
<table>
<thead>
<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>
</thead>
<tbody>
<tr><td>' . $bill['created'] . '</td><td>' . $time . '</td></tr>
<tr><td>' . $bill['account_id'] . '</td><td>' . $this->session->userdata('user')['id'] . '</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $update = $this->db->update('bill', $data, "id=$id");
        $data_log = array(
            'user' => $this->session->userdata('user')['username'],
            'type' => 'CHANGE',
            'is_show' => 1,
            'content' => $content,
            'created' => getdate()[0]
        );
        $this->db->insert('log', $data_log);
        $this->db->trans_complete();
        return $update;
    }

    public function get_product_color_by_id_pc($id)
    {
        $sql = 'SELECT * FROM product_color WHERE is_show=1 and id='. $id;
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->row_array();
        } else {
            return null;
        }
    }

    public function get_detail_bill_by_bill_id_pc_id($bill_id, $product_color_id)
    {
        $sql = 'SELECT * FROM detail_bill WHERE bill_id=' . $bill_id . ' and product_color_id=' . $product_color_id . ' and is_show=1';
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0) {
            return $rs->row_array();
        } else {
            return null;
        }
    }

    public function edit_detail_bill($id, $product, $quantity, $price)
    {
        $this->db->trans_start();
        //cập nhật lại giá trung bình, số lượng
        foreach ($product as $key=>$p) {
            $detail_bill_old = self::get_detail_bill_by_bill_id_pc_id($id, $p);
            $product_color = self::get_product_color_by_id_pc($p);
            $qty=$product_color['quantity'] - $detail_bill_old['quantity'];
            if ($qty <= 0) {
                $price_avg = 0;
            } else {
                $price_avg = ($product_color['price_avg'] * $product_color['quantity'] - $detail_bill_old['quantity'] * $detail_bill_old['price']) / ($product_color['quantity'] - $detail_bill_old['quantity']);
            }
            $quantity_new = $qty+$quantity[$key];
            $price_avg_new=($price_avg*$qty+$quantity[$key]*$price[$key])/$quantity_new;
            $data = array(
                'price_avg' => $price_avg_new,
                'quantity' => $quantity_new
            );
            $this->db->update('product_color', $data, "id=" . $product_color['id']);
        }
//        //xóa chi tiết hóa đơn cũ
        $this->db->delete('detail_bill', "bill_id=$id");
        //thêm chi tiết hóa đơn mới,cập nhật tổng tiền bill mới
        $total = 0;

        foreach ($product as $key => $p) {
            $data_ins = array();
            $data_ins['product_color_id'] = $p;
            $data_ins['bill_id'] = $id;
            $data_ins['quantity'] = $quantity[$key];
            $data_ins['price'] = $price[$key];
            $data_ins['is_show'] = 1;
            $data_ins['total'] = $data_ins['quantity'] * $data_ins['price'];
            $total += $data_ins['total'];
            $this->db->insert('detail_bill', $data_ins);
        }

        $edit = $this->db->update('bill', array('total' => $total), "id=" . $id);
        $this->db->trans_complete();
        return $edit;
    }

    public function delete($md5){
        $data=array('is_show'=>0);
        $bill=self::get_bill_by_md5($md5);
        $content='
<h4>Xóa hóa đơn</h4>
<table>
<thead>
<tr><th>Thông tin hóa đơn</th></tr>
</thead>
<tbody>
<tr><td>'.$bill['code'].'</td></tr>
<tr><td>'.$bill['total'].'</td></tr>
<tr><td>'.$bill['type'].'</td></tr>
</tbody>
</table>';
        $this->db->trans_start();
        $update=$this->db->update('bill',$data,"md5='$md5'");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'DELETE',
            'is_show'=>1,
            'content'=>$content,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $update;
    }

    public function get_list_del(){
        $sql='SELECT * FROM bill WHERE is_show=0 and type=\'IMPORT\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }
}
            