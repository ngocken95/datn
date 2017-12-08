<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_Model extends CI_Model {

    public function get_list_account(){
        $sql='SELECT * FROM account WHERE is_show=1 ORDER BY id';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function get_access_by_account($find,$account){
        $sql_module='SELECT * FROM module WHERE is_show=1 and name_vi like \'%'.convert_vi_to_en($find).'%\'';
        $list_module=$this->db->query($sql_module)->result_array();
        $sql_access='SELECT * FROM access WHERE is_show=1 and account_id='.$account;
        if($this->db->query($sql_access)->num_rows()>0){
            $list_access=$this->db->query($sql_access)->result_array();
        }
        else{
            $sql_group='SELECT * FROM account WHERE is_show=1 and id='.$account;
            $id_group=$this->db->query($sql_group)->row_array()['group_account_id'];
            $sql='SELECT * FROM access WHERE is_show=1 and account_id='.$id_group;
            $list_access=$this->db->query($sql)->result_array();
        }
        $list=array();
        foreach ($list_module as $key=>$module){
            $list[$module['id']]['id']=$module['id'];
            $list[$module['id']]['name']=$module['name'];
            $list[$module['id']]['location']=$module['location'];
            $list[$module['id']]['view']=0;
            $list[$module['id']]['edit']=0;
            $list[$module['id']]['delete']=0;
            $list[$module['id']]['add']=0;
            foreach ($list_access as $k=>$access){
                if($module['id']==$access['module_id']){
                    $list[$module['id']]['view']=$access['view_act'];
                    $list[$module['id']]['edit']=$access['edit_act'];
                    $list[$module['id']]['delete']=$access['delete_act'];
                    $list[$module['id']]['add']=$access['add_act'];
                }
            }
        }
        return $list;
    }

    public function save($account,$view,$edit,$delete,$add,$restore){
        $this->db->trans_start();
        $this->db->delete('access', "account_id = $account");
        $sql_module='SELECT * FROM module WHERE is_show=1';
        $module=$this->db->query($sql_module)->result_array();
        foreach ($module as $mod){
            $data[$mod['id']]=array(
                'account_id'=>$account,
                'module_id'=>$mod['id'],
                'view_act'=>0,
                'edit_act'=>0,
                'delete_act'=>0,
                'add_act'=>0,
                'is_show'=>1
            );
            if(!empty($view)){
                foreach ($view as $k1=>$v) {
                    if($mod['id']==$v){
                        $data[$mod['id']]['view_act']=1;
                    }
                }
            }
            if(!empty($edit)){
                foreach ($edit as $k2=>$e) {
                    if($mod['id']==$e){
                        $data[$mod['id']]['edit_act']=1;
                    }
                }
            }
            if(!empty($delete)){
                foreach ($delete as $k3=>$d) {
                    if($mod['id']==$d){
                        $data[$mod['id']]['delete_act']=1;
                    }
                }
            }
            if(!empty($add)){
                foreach ($add as $k4=>$a) {
                    if($mod['id']==$a){
                        $data[$mod['id']]['add_act']=1;
                    }
                }
            }
        }
        foreach ($data as $item) {
            $this->db->insert('access',$item);
        }
        $this->db->trans_complete();
    }
}
