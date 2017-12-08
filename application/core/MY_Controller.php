<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    private $data = array();

    function __construct()
    {
        parent::__construct();
        //==========================CHECK VIEW=================================
        if ($this->session->userdata('user')) {
            $sql = 'SELECT * 
                    FROM access  
                    JOIN module ON access.module_id=module.id
                    WHERE access.account_id=' . $this->session->userdata('user')['id'] . ' 
                    AND access.is_show=1
                    AND module.is_show=1
                    AND module.code=\'' . strtolower(get_class($this)) . '\'
                    ';
            $rs = $this->db->query($sql);
            $this->data['act'] = $rs->row_array();
            if (count($this->data['act']) > 0) {
                if ($this->data['act']['view_act'] != 1) {
                    $this->session->set_flashdata('login_fail', 'Bạn không có quyền truy cập vào module này!');
                    redirect('admin/login');
                }
                if($this->data['act']['add_act']!=1 && $this->uri->segment(3)=='add'){
                    $this->session->set_flashdata('login_fail', 'Bạn không có quyền truy cập vào module này!');
                    redirect('admin/login');
                }
                if($this->data['act']['edit_act']!=1 && $this->uri->segment(3)=='edit'){
                    $this->session->set_flashdata('login_fail', 'Bạn không có quyền truy cập vào module này!');
                    redirect('admin/login');
                }
            } else {
                if (strtolower(get_class($this)) == 'login') {

                } else {
                    redirect('admin/login');
                }
            }
        } else {
            if (strtolower(get_class($this)) == 'login') {

            } else {
                redirect('admin/login');
            }
        }
        //==========================ACCESS=============================
        if ($this->session->userdata('user')) {
            $sql = 'SELECT * 
                    FROM access 
                    JOIN module ON access.module_id=module.id
                    WHERE access.account_id=' . $this->session->userdata('user')['id'] . ' 
                    AND access.is_show=1
                    AND module.is_show=1
                    ';
            $rs = $this->db->query($sql);
            $this->data['access'] = $rs->result_array();
        }
        //==========================ACTIVE=================================
        $sql = 'SELECT * FROM module WHERE code=\'' . strtolower(get_class($this)) . '\'';
        $rs = $this->db->query($sql);
        $this->data['active'] = $rs->row_array();
        //==========================FIND===================================
        $find = isset($_GET['find']) ? $_GET['find'] : '';
        $this->data['find'] = $find;
        //==========================LOAD===================================
        $this->load->helper('dequy');
        $this->load->helper('convert');
        //==========================RETURN=================================
        return $this->data;
    }
}
