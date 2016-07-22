<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_groups extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Tax_model');
    }

    public function index() {

    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_tax_groups = $this->Tax_model;
                $response['data'] = $m_tax_groups->get_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_tax_groups = $this->Tax_model;

                $m_tax_groups->tax_type = $this->input->post('tax_name', TRUE);
                $m_tax_groups->tax_rate = $this->input->post('tax_rate', TRUE);
                $m_tax_groups->description = $this->input->post('tax_group_desc', TRUE);
                $m_tax_groups->save();

                $tax_type_id = $m_tax_groups->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'User group information successfully created.';
                $response['row_added'] = $m_tax_groups->get_list(array('tax_type_id'=>$tax_type_id));

                echo json_encode($response);

                break;

            case 'delete':

                break;

            case 'update':


                break;
        }
    }
}
