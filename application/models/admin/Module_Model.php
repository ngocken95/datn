<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_Model extends CI_Model {

    public function get_list($find){
        $cond='is_show=1';
        if($find!=''){
            $cond.=' and (code like \'%'.$find.'%\' or name_vi like \'%'.$find.'%\')';
        }
        $sql='SELECT * FROM module WHERE '.$cond.' ORDER BY location';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function check_code($code,$location){
        $sql='SELECT * FROM module WHERE code=\''.$code.'\' and location=\''.$location.'\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            return$code.true;
        }
        else{
            return$code.false;
        }
    }

    public function add_module($code,$name,$location){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'location'=>$location,
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('module',$data);
        $id=$this->db->insert_id();
        if($location=='backend'){
            //thêm cho tài khoản admin
            $data_adm=array(
                'account_id'=>1,
                'module_id'=>$id,
                'view_act'=>1,
                'delete_act'=>1,
                'add_act'=>1,
                'edit_act'=>1,
                'is_show'=>1
            );
            $this->db->insert('access',$data_adm);
            //thêm cho nhóm admin
            $data_group_adm=array(
                'account_id'=>3,
                'module_id'=>$id,
                'view_act'=>1,
                'delete_act'=>1,
                'add_act'=>1,
                'edit_act'=>1,
                'is_show'=>1
            );
            $this->db->insert('access',$data_group_adm);
        }
        $this->db->trans_complete();
        return $id;
    }

    public function get_item_by_id($id){
        $sql='SELECT * FROM module WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

}
