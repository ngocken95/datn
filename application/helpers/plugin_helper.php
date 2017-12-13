<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if (!function_exists('set_new')) {
    function set_new($time)
    {
        if(getdate()[0]-$time<3600){
            return true;
        }
        else{
            return false;
        }
    }
}
