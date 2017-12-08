<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color_Model extends CI_Model {

    public function get_list($find){
        $sql='SELECT * FROM color WHERE is_show=1 and (code LIKE \'%'.$find.'%\' or name_vi LIKE \'%'.$find.'%\')';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return false;
        }
    }

    public function check_code($code){
        $sql='SELECT * FROM color WHERE code=\''.$code.'\' and is_show=1';
        $rs=$this->db->query($sql);
        if($rs->num_rows()==1){
            return $code.true;
        }
        else{
            return $code.false;
        }
    }

    public function add_color($code,$name){
        $data=array(
            'code'=>$code,
            'name'=>$name,
            'name_vi'=>convert_vi_to_en($name),
            'created'=>getdate()[0],
            'is_show'=>1
        );
        $this->db->trans_start();
        $this->db->insert('color',$data);
        $add=$this->db->insert_id();
        $this->db->trans_complete();
        return $add;
    }
}
            