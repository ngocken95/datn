<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends CI_Model {

    public function get_list($find){
        $cond='is_show=1';
        if($find!=''){
            $cond.=' and (username like \'%'.$find.'%\' or name_vi like \'%'.$find.'%\')';
        }
        $sql='SELECT * FROM account WHERE '.$cond.'
        UNION
        SELECT * FROM account WHERE group_account_id=0 and is_show=1
        ORDER BY group_account_id ASC 
        ';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function get_group(){
        $sql='SELECT * FROM account WHERE group_account_id=0 and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function check_code_group($id,$code,$code_old){
        if($id==''){
            $cond=' and username=\''.$code.'\'';
        }
        else{
            if($code==$code_old){
                $cond=' and username=\''.$code.'\' and id<>'.$id;
            }
            else{
                $cond=' and username=\''.$code.'\'';
            }
        }
        $sql='SELECT * FROM account WHERE group_account_id=0 and is_show=1'.$cond;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_group($code,$name){
        $data=array(
            'username'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'group_account_id'=>0,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('account',$data);
        $add=$this->db->insert_id();
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>'Thêm nhóm tài khoản<br>Nhóm khoản thêm: '.$name.'<br>Mã nhóm: '.$code,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function check_username($username){
        $sql='SELECT * FROM account WHERE username=\''.$username.'\' and group_account_id<>0';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            return $username.true;
        }
        else{
            return $username.false;
        }
    }

    public function add_account($username,$password,$name,$email,$phone,$group){
        $data=array(
            'username'=>$username,
            'password'=>$password,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'email'=>$email,
            'phone'=>$phone,
            'group_account_id'=>$group,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('account',$data);
        $add=$this->db->insert_id();
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'ADD',
            'is_show'=>1,
            'content'=>'Thêm tài khoản<br>Tài khoản thêm: '.$username,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function edit_account($id,$username,$password,$name,$email,$phone,$group){
        $data=array(
            'username'=>$username,
            'password'=>$password,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'email'=>$email,
            'phone'=>$phone,
            'group_account_id'=>$group,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $add=$this->db->update('account',$data,"id=".$id);
        $this->db->delete('access',"account_id=".$id);
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'CHANGE',
            'is_show'=>1,
            'content'=>'Sửa tài khoản<br>Tài khoản sửa: '.$username,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $add;
    }

    public function get_item_by_id($id){
        $sql='SELECT * FROM account WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

    public function edit_group($id,$code_group,$name_group){
        $data=array(
            'username'=>$code_group,
            'name'=>$name_group,
            'name_vi'=>convert_vi_to_en($name_group),
            'created'=>getdate()[0]
        );
        $this->db->trans_start();
        $update=$this->db->update('account', $data, "id = $id");
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'CHANGE',
            'is_show'=>1,
            'content'=>'Sửa nhóm tài khoản<br>Nhóm tài khoản sửa: '.$name_group,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $update;
    }

    public function check_list_by_group_id($group_id){
        $sql='SELECT * FROM account WHERE group_account_id='.$group_id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return false;
        }
        else{
            return $group_id;
        }
    }

    public function check_delete($id){
        //kiểm tra có phải là nhóm tài khoản không?
        $sql='SELECT * FROM account WHERE group_account_id=0 and is_show=1 and id='.$id;
        $rs_check_group=$this->db->query($sql);
        if($rs_check_group->num_rows()>0){
            //nếu là nhóm tài khoản kiểm tra xem có tài khoản nào trong nhóm không?
            $sql_check_account='SELECT * FROM account WHERE group_account_id='.$id.' and is_show=1';
            $rs_check_account=$this->db->query($sql_check_account);
            if($rs_check_account->num_rows()>0){
                return false;
            }
            else{
                return true;
            }
        }
        else{
            //không phải nhóm tài khoản thì kiểm tra có đơn hàng nào đang được xử lý bằng tài khoản này không?
            //kiểm tra order
            $sql='SELECT * FROM customer_order WHERE account_id='.$id;
            $rs_order=$this->db->query($sql);
            if($rs_order->num_rows()>0){
                return false;
            }
            //kiểm tra bill
            $sql='SELECT * FROM bill WHERE account_id='.$id;
            $rs_bill=$this->db->query($sql);
            if($rs_bill->num_rows()>0){
                return false;
            }
            return true;
        }
    }

    public function check_id($id){
        $sql='SELECT * FROM account WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($id){
        $data=array(
            'is_show'=>0,
            'created'=>getdate()[0]
        );
        $this->db->trans_start();
        if($id==1){
            return false;
        }
        $delete=$this->db->update('account', $data, "id = $id");
        $sql='SELECT * FROM account WHERE id='.$id;
        $rs_log=$this->db->query($sql);
        $acc_name=$rs_log->row_array()['username'];
        $data_log=array(
            'user'=>$this->session->userdata('user')['username'],
            'type'=>'DELETE',
            'is_show'=>1,
            'content'=>'Xóa tài khoản<br>Tài khoản bị xóa: '.$acc_name,
            'created'=>getdate()[0]
        );
        $this->db->insert('log',$data_log);
        $this->db->trans_complete();
        return $delete;
    }

}
