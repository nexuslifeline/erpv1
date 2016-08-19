<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class receivable_payments extends CORE_Controller
{

    function __construct() {
        parent::__construct('');

        $this->validate_session();

        $this->load->model('Receivable_payment_model');
        $this->load->model('Receivable_payment_list_model');
        $this->load->model('Customers_model');

    }

    public function index() {

        //default resources of the active view
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);


        //data required by active view
        $data['customers']=$this->Customers_model->get_list('customers.total_receivable_amount>0');

        $data['title'] = 'AR Payment';
        $this->load->view('payment_receivable_view', $data);


    }


    function transaction($txn=null,$filter_value=null){
        switch($txn){
            case 'list':
                $response['data']=$this->response_rows($filter_value);
                echo json_encode($response);
                break;
            //***********************************************************************************************
            case 'create':
                $m_payment=$this->Receivable_payment_model;
                $m_payment_items=$this->Receivable_payment_list_model;

                $receipt_no=$this->input->post('receipt_no',TRUE);

                //******************************************************************************************************
                //IMPORTANT!!!!!
                //validation
                if( count(
                        $m_payment->get_list(
                            array(
                                'receivable_payments.receipt_no'=>$receipt_no,
                                'receivable_payments.is_active'=>TRUE,
                                'receivable_payments.is_deleted'=>FALSE
                            ),
                            'receivable_payments.payment_id'
                        )
                    )  > 0
                ){
                    $response['title']="Error!";
                    $response['stat']="error";
                    $response['msg']="Invalid receipt number. Please make sure receipt number do not exists.";
                    echo json_encode($response);
                    exit;
                }
                //******************************************************************************************************




                $m_payment->begin();
                //details for auditing
                $m_payment->set('date_created','NOW()');
                $m_payment->created_by_user=$this->session->user_id;

                //payment details
                $m_payment->receipt_no=$receipt_no;
                $m_payment->customer_id=$this->input->post('customer_id',TRUE);
                $m_payment->total_paid_amount=$this->get_numeric_value($this->input->post('total_paid_amount',TRUE));
                $m_payment->remarks=$this->input->post('remarks',TRUE);
                $m_payment->date_paid=date('Y-m-d',strtotime($this->input->post('date_paid',TRUE)));
                $m_payment->save();

                //payment to purchase invoice, amount per line
                $payment_id=$m_payment->last_insert_id();
                $payment_amount=$this->input->post('payment_amount',TRUE);
                $sales_invoice_id=$this->input->post('sales_invoice_id',TRUE);
                $receivable_amount=$this->input->post('receivable_amount',TRUE);

                for($i=0;$i<=count($payment_amount)-1;$i++){
                    $m_payment_items->payment_id=$payment_id;
                    $m_payment_items->sales_invoice_id=$sales_invoice_id[$i];
                    $m_payment_items->payment_amount=$this->get_numeric_value($payment_amount[$i]);
                    $m_payment_items->receivable_amount=$this->get_numeric_value($receivable_amount[$i]);
                    $m_payment_items->save();
                }



                //******************************************************************************************
                // IMPORTANT!!!
                //update receivable amount field of customer table
                $m_customers=$this->Customers_model;
                $m_customers->recalculate_customer_receivable($this->input->post('customer_id',TRUE));
                //******************************************************************************************



                $m_payment->commit();

                if($m_payment->status()===TRUE){
                    $response['title']="Success!";
                    $response['stat']="success";
                    $response['msg']="Payment successfully recorded.";
                    $response['row_added']=$this->response_rows($payment_id);
                    echo json_encode($response);
                }


                break;


            //***********************************************************************************************
            case 'cancel':
                $payment_id=$this->input->post('payment_id',TRUE);
                $m_payment=$this->Receivable_payment_model;


                $m_payment->begin();

                $m_payment->set('date_cancelled','NOW()');
                $m_payment->is_active=0;
                $m_payment->cancelled_by_user=$this->session->user_id;
                $m_payment->modify($payment_id);

                //get the customer id of the payment transaction being cancelled
                $id=$m_payment->get_list($payment_id,'receivable_payments.customer_id');
                $customer_id=$id[0]->customer_id;

                //******************************************************************************************
                // IMPORTANT!!!
                //update receivable amount field of customer table
                $m_customers=$this->Customers_model;
                $m_customers->recalculate_customer_receivable($customer_id);
                //******************************************************************************************

                $m_payment->commit();

                if($m_payment->status()===TRUE){
                    $response['title']="Success!";
                    $response['stat']="success";
                    $response['msg']="Payment successfully cancelled.";
                    $response['row_updated']=$this->response_rows($payment_id);
                    echo json_encode($response);
                }

                break;
        }



    }





    function response_rows($id){
        $m_payments=$this->Receivable_payment_model;
        return $m_payments->get_list(
        //filter
            'receivable_payments.is_deleted=FALSE'.($id==null?'':' AND receivable_payments.payment_id='.$id),
            //fields
            array(
                'receivable_payments.*',
                'DATE_FORMAT(receivable_payments.date_paid,"%m/%d/%Y")as date_paid',
                'FORMAT(receivable_payments.total_paid_amount,2)as total_paid_amount',
                'customers.customer_name',
                'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as posted_by_user'
            ),
            //joins
            array(
                array('customers','customers.customer_id=receivable_payments.customer_id','left'),
                array('user_accounts','user_accounts.user_id=receivable_payments.created_by_user','left')
            )

        );
    }














}
