<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model {

    public function get_list_news(){
        $sql='SELECT * FROM news WHERE is_show=1 ORDER BY created desc';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

    public function check_id($id){
        $sql='SELECT * FROM news WHERE is_show=1 and id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_news_by_id($id){
        $sql='SELECT news.*,account.name as name FROM news JOIN account ON news.account_id=account.id WHERE news.is_show=1 and news.id='.$id;
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->row_array();
        }
        else{
            return false;
        }
    }

    public function get_top_view(){
        $sql='SELECT * FROM news WHERE is_show=1 ORDER BY news_view LIMIT 0,3';
        $rs=$this->db->query($sql);
        if($rs->num_rows()>0){
            return $rs->result_array();
        }
        else{
            return null;
        }
    }

}
            