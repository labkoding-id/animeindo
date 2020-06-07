<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{

    public function _partials($main, $data = null){

        $CI =& get_instance();
        $CI->load->view('partials/head');	
        $CI->load->view('partials/nav');
        $CI->load->view('partials/header');
        $CI->load->view($main, $data);
        $CI->load->view('partials/footer'); 
		
    }

    public function _flixgo($main, $data = null, $meta = null){

        $CI =& get_instance();
        $CI->load->view('_partials/head', $meta);	
        $CI->load->view('_partials/header');
        $CI->load->view($main, $data);
        $CI->load->view('_partials/footer'); 
        $CI->load->view('_partials/scripts');
		
    }
    


}