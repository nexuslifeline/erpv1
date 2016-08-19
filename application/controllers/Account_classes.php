<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_classes extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Account_class_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
        $data['title'] = 'Account Classification Management';

        //$this->load->view('cards_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_classes = $this->Account_class_model;
                $response['data'] = $m_classes->get_card_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_classes = $this->Account_class_model;

                $m_classes->set('date_created','NOW()');
                $m_classes->created_by_user=$this->session->user_id;

                $m_classes->account_class = $this->input->post('account_class', TRUE);
                $m_classes->description = $this->input->post('description', TRUE);
                $m_classes->account_type_id = $this->input->post('account_type', TRUE);
                $m_classes->save();

                $account_class_id = $m_classes->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Account classification successfully created.';
                $response['row_added'] = $m_classes->get_list($account_class_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_classes=$this->Account_class_model;

                $account_class_id=$this->input->post('account_class_id',TRUE);

                $m_classes->is_deleted=1;
                if($m_classes->modify($account_class_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='card information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_classes=$this->Account_class_model;

                $account_class_id=$this->input->post('account_class_id',TRUE);

                $m_classes->set('date_modified','NOW()');
                $m_classes->modified_by_user=$this->session->user_id;

                $m_classes->account_class=$this->input->post('account_class',TRUE);
                $m_classes->description = $this->input->post('description', TRUE);
                $m_classes->account_type_id = $this->input->post('account_type', TRUE);
                $m_classes->modify($account_class_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Account classification successfully updated.';
                $response['row_updated']=$m_classes->get_list($account_class_id);
                echo json_encode($response);

                break;
        }
    }
}
