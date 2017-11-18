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

    public function check_code_group($code){
        $sql='SELECT * FROM account WHERE username=\''.$code.'\' and group_account_id=0 and is_show=1';
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



    public function check_code($code,$location){
        $sql='SELECT * FROM module WHERE is_show=1 and code=\''.$code.'\' and location=\''.$location.'\'';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return null;
        }
        else{
            return $code;
        }
    }

    public function add($code,$name,$location){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'location'=>$location,
            'is_show'=>1
        );
        $this->db->trans_start();
        $add=$this->db->insert('module',$data);
        $this->db->trans_complete();
        return $add;
    }

    public function check_exist($id){
        $sql='SELECT * FROM module WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return null;
        }
    }

    public function edit($id,$name,$location){
        $data=array(
            'name'=>$name,
            'location'=>$location,
            'is_show'=>1
        );
        $this->db->trans_start();
        $update=$this->db->update('module', $data, "id = $id");
        $this->db->trans_complete();
        return $update;
    }

    public function delete($id){
        $this->db->trans_start();
        $delete=$this->db->delete('module', "id = $id");
        $this->db->trans_complete();
        return $delete;
    }
}
