<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CORE_Controller extends CI_Controller
{

    public function __construct($controller_name = '')
    {
        parent::__construct();
    }


    function validate_session(){
        if(!$this->session->user_id){
            redirect(base_url().'login');
        }
    }


    function end_session(){
        session_destroy();
        redirect(base_url().'login');
    }




}