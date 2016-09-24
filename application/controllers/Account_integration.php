<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_integration extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(array(
                'Account_title_model',
                'Account_integration_model',
                'Account_year_model'
            )

        );
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Account Integration';


        $data['accounts'] = $this->Account_title_model->get_list();
        $current_accounts= $this->Account_integration_model->get_list();
        $data['current_accounts'] =$current_accounts[0];

        $this->load->view('account_integration_view', $data);

    }


    public function transaction($txn=null){
        switch($txn){
            case 'save':
                $m_integration=$this->Account_integration_model;

                $m_integration->delete(1); //delete it first

                $m_integration->integration_id=1;


                //suppliers
                $m_integration->input_tax_account_id=$this->input->post('input_tax_account_id',TRUE);
                $m_integration->payable_account_id=$this->input->post('payable_account_id',TRUE);
                $m_integration->payable_discount_account_id=$this->input->post('payable_discount_account_id',TRUE);

                //customers
                $m_integration->output_tax_account_id=$this->input->post('output_tax_account_id',TRUE);
                $m_integration->receivable_account_id=$this->input->post('receivable_account_id',TRUE);
                $m_integration->receivable_discount_account_id=$this->input->post('receivable_discount_account_id',TRUE);
                $m_integration->save();

                $response['stat']="success";
                $response['title']="Success!";
                $response['msg']="Account successfully integrated.";

                echo json_encode($response);

                break;


            case 'get-account-year':
                $m_year=$this->Account_year_model;

                $response['data']=$m_year->get_list();
                echo json_encode($response);
                break;
        }
    }




}
