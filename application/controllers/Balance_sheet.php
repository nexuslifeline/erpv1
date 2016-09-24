<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balance_sheet extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(array(
                'Account_class_model',
                'Journal_info_model',
                'Journal_account_model'
            )
        );
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
        $data['title'] = 'Balance Sheet';

        //asset account
        $data['asset_classes']=$this->Journal_account_model->get_list(
            array(
                'account_classes.account_type_id'=>1 //1 is asset
            ),
            'journal_accounts.account_id,account_classes.account_class_id,account_classes.account_class,account_classes.account_type_id',
            array(
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            ),
            null,
            'account_classes.account_class_id'
        );
        $data['asset_accounts']=$this->Journal_info_model->get_account_balance(1);



        //liabilities account
        $data['liability_classes']=$this->Journal_account_model->get_list(
            array(
                'account_classes.account_type_id'=>2 //1 is asset
            ),
            'journal_accounts.account_id,account_classes.account_class_id,account_classes.account_class,account_classes.account_type_id',
            array(
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            ),
            null,
            'account_classes.account_class_id'
        );
        $data['liability_accounts']=$this->Journal_info_model->get_account_balance(2);



        //capital account
        $data['capital_classes']=$this->Journal_account_model->get_list(
            array(
                'account_classes.account_type_id'=>3 //1 is asset
            ),
            'journal_accounts.account_id,account_classes.account_class_id,account_classes.account_class,account_classes.account_type_id',
            array(
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            ),
            null,
            'account_classes.account_class_id'
        );
        $data['capital_accounts']=$this->Journal_info_model->get_account_balance(3);


        $current_year_income=$this->Journal_account_model->get_list(
            array(
                'account_classes.account_type_id'=>4 //1 is asset
            ),
            '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount))as current_year_earning',
            array(
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            )
        );


        $current_year_expense=$this->Journal_account_model->get_list(
            array(
                'account_classes.account_type_id'=>5 //1 is asset
            ),
            '(SUM(journal_accounts.dr_amount)-SUM(journal_accounts.cr_amount))as current_year_expense',
            array(
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            )
        );


        $data['current_year_earnings']=$current_year_income[0]->current_year_earning-$current_year_expense[0]->current_year_expense;



        $this->load->view('balance_sheet_view', $data);
    }




}
