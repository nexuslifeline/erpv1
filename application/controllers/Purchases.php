<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Purchases_model');

    }

    public function index() {

        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Purchase Order';
        $this->load->view('po_view', $data);
    }

    function transaction($txn = null) {
            switch ($txn){
                case 'list':
                    $m_purchases=$this->Purchases_model;
                    $response['data']=$m_purchases->get_po_list();
                    echo json_encode($response);
                    break;
            }

    }
}
