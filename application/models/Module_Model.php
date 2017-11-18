<?php
/**
 * Created by PhpStorm.
 * User: ngock
 * Date: 12-Oct-17
 * Time: 3:13 AM
 */

class Module_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        if ($data['location'] == 'backend') {
            $code = $data['code'] . '_adm';
        } else {
            $code = $data['code'];
        }
        $sql = 'SELECT DISTINCT code FROM module WHERE code=\'' . $code . '\'';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $data += array('check_code' => 0);
            return $data;
        } else {
            $data_ctrl = $data + array('check_code' => 1);
            try {
                $this->db->query('SET AUTOCOMMIT=0');
                $this->db->query('START TRANSACTION');
                $this->db->insert('module', $data_ctrl);


                $this->db->query('COMMIT');
            } catch (Exception $e) {
                $this->db->query('ROLLBACK');
                $data = array('check_code' => 0);
                return $data;
            }
            $data = array('check_code' => 1);
            return $data;
        }
    }
}