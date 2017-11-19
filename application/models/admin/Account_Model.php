<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends CI_Model {

    public function get_list(){
        $this->db->select('*');
        $this->db->where('is_show','1');
        $sql='SELECT * FROM account WHERE is_show=1 ORDER BY group_account_id ASC';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
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
            echo json_encode($code.true);
        }
        else{
            echo json_encode($code.false);
        }
    }

    public function add_group($code,$name){
        $data=array(
            'username'=>$code,
            'name'=>$name,
            'group_account_id'=>0,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $add=$this->db->insert('account',$data);
        $this->db->trans_complete();
        return $add;
    }

    public function check_username($username){
        $sql='SELECT * FROM account WHERE username=\''.$username.'\' and group_account_id<>0 and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            echo json_encode($username.true);
        }
        else{
            echo json_encode($username.false);
        }
    }

    public function add_account($username,$password,$name,$email,$phone,$group){
        $data=array(
            'username'=>$username,
            'password'=>$password,
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'group_account_id'=>$group,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $add=$this->db->insert('account',$data);
        $this->db->trans_complete();
        return $add;
    }

    public function get_item_by_id($id){
        $sql='SELECT * FROM account WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            echo json_encode($rs->row_array());
            return true;
        }
        else{
            echo json_encode($id);
            return false;
        }
    }

    public function edit_group($id,$code_group,$name_group){
        $data=array(
            'username'=>$code_group,
            'name'=>$name_group,
            'created'=>getdate()[0]
        );
        $this->db->trans_start();
        $update=$this->db->update('account', $data, "id = $id");
        $this->db->trans_complete();
    }

    public function check_list_by_group_id($group_id){
        $sql='SELECT * FROM account WHERE group_account_id='.$group_id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            echo json_encode(false);
        }
        else{
            echo json_encode($group_id);
        }
    }

    public function delete($id){
        $this->db->trans_start();
        $delete=$this->db->delete('account', "id = $id");
        $this->db->trans_complete();
        return $delete;
    }
}
