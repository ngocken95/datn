<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangSwitch extends CI_Controller{

    function switchLanguage() {
        $language=$this->input->get('lang');
        $language = ($language != "") ? $language : "vietnamese";
        $this->session->set_userdata('lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
    }
}