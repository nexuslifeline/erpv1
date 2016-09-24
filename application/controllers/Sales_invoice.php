<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_invoice extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();

        $this->load->model('Sales_invoice_model');
        $this->load->model('Sales_invoice_item_model');

        $this->load->model('Sales_order_model');
        $this->load->model('Departments_model');
        $this->load->model('Customers_model');
        $this->load->model('Products_model');


    }

    public function index() {

        //default resources of the active view
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);


        //data required by active view
        $data['departments']=$this->Departments_model->get_list(
            array('departments.is_active'=>TRUE,'departments.is_deleted'=>FALSE)
        );


        //data required by active view
        $data['customers']=$this->Customers_model->get_list(
            array('customers.is_active'=>TRUE,'customers.is_deleted'=>FALSE)
        );



        $data['products']=$this->Products_model->get_list(

            'products.is_deleted=FALSE AND products.is_active=TRUE',

            array(
                'products.product_id',
                'products.product_code',
                'products.product_desc',
                'products.product_desc1',
                'products.is_tax_exempt',
                'FORMAT(products.sale_price,2)as sale_price',
                'FORMAT(products.purchase_cost,2)as purchase_cost',
                'products.unit_id',
                'units.unit_name'
            ),
            array(
                // parameter (table to join(left) , the reference field)
                array('units','units.unit_id=products.unit_id','left'),
                array('categories','categories.category_id=products.category_id','left')

            )

        );

        $data['title'] = 'Sales Invoice';
        $this->load->view('sales_invoice_view', $data);


    }




    function transaction($txn = null,$id_filter=null) {
        switch ($txn){
            case 'list':  //this returns JSON of Issuance to be rendered on Datatable
                $m_invoice=$this->Sales_invoice_model;
                $response['data']=$this->response_rows(
                    'sales_invoice.is_active=TRUE AND sales_invoice.is_deleted=FALSE'.($id_filter==null?'':' AND sales_invoice.sales_invoice_id='.$id_filter)
                );
                echo json_encode($response);
                break;

            ////****************************************items/products of selected Items***********************************************
            case 'items': //items on the specific PO, loads when edit button is called
                $m_items=$this->Sales_invoice_item_model;
                $response['data']=$m_items->get_list(
                    array('sales_invoice_id'=>$id_filter),
                    array(
                        'sales_invoice_items.*',
                        'products.product_code',
                        'products.product_desc',
                        'units.unit_id',
                        'units.unit_name'
                    ),
                    array(
                        array('products','products.product_id=sales_invoice_items.product_id','left'),
                        array('units','units.unit_id=sales_invoice_items.unit_id','left')
                    ),
                    'sales_invoice_items.sales_item_id DESC'
                );


                echo json_encode($response);
                break;


            //***************************************create new Items************************************************
            case 'create':
                $m_invoice=$this->Sales_invoice_model;

                if(count($m_invoice->get_list(array('sales_inv_no'=>$this->input->post('sales_inv_no',TRUE))))>0){
                    $response['title'] = 'Invalid!';
                    $response['stat'] = 'error';
                    $response['msg'] = 'Slip No. already exists.';

                    echo json_encode($response);
                    exit;
                }


                //get sales order id base on SO number
                $m_so=$this->Sales_order_model;
                $arr_so_info=$m_so->get_list(
                    array('sales_order.so_no'=>$this->input->post('so_no',TRUE)),
                    'sales_order.sales_order_id'
                );
                $sales_order_id=(count($arr_so_info)>0?$arr_so_info[0]->sales_order_id:0);


                $m_invoice->begin();

                //treat NOW() as function and not string
                $m_invoice->set('date_created','NOW()'); //treat NOW() as function and not string

                $m_invoice->department_id=$this->input->post('department',TRUE);
                $m_invoice->customer_id=$this->input->post('customer',TRUE);
                $m_invoice->sales_order_id=$sales_order_id;
                $m_invoice->remarks=$this->input->post('remarks',TRUE);
                $m_invoice->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                $m_invoice->date_invoice=date('Y-m-d',strtotime($this->input->post('date_invoice',TRUE)));
                $m_invoice->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_invoice->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_invoice->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_invoice->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));
                $m_invoice->posted_by_user=$this->session->user_id;
                $m_invoice->save();

                $sales_invoice_id=$m_invoice->last_insert_id();

                $m_invoice_items=$this->Sales_invoice_item_model;

                $prod_id=$this->input->post('product_id',TRUE);
                $inv_qty=$this->input->post('inv_qty',TRUE);
                $inv_price=$this->input->post('inv_price',TRUE);
                $inv_discount=$this->input->post('inv_discount',TRUE);
                $inv_line_total_discount=$this->input->post('inv_line_total_discount',TRUE);
                $inv_tax_rate=$this->input->post('inv_tax_rate',TRUE);
                $inv_line_total_price=$this->input->post('inv_line_total_price',TRUE);
                $inv_tax_amount=$this->input->post('inv_tax_amount',TRUE);
                $inv_non_tax_amount=$this->input->post('inv_non_tax_amount',TRUE);

                for($i=0;$i<count($prod_id);$i++){

                    $m_invoice_items->sales_invoice_id=$sales_invoice_id;
                    $m_invoice_items->product_id=$prod_id[$i];
                    $m_invoice_items->inv_qty=$inv_qty[$i];
                    $m_invoice_items->inv_price=$this->get_numeric_value($inv_price[$i]);
                    $m_invoice_items->inv_discount=$this->get_numeric_value($inv_discount[$i]);
                    $m_invoice_items->inv_line_total_discount=$this->get_numeric_value($inv_line_total_discount[$i]);
                    $m_invoice_items->inv_tax_rate=$this->get_numeric_value($inv_tax_rate[$i]);
                    $m_invoice_items->inv_line_total_price=$this->get_numeric_value($inv_line_total_price[$i]);
                    $m_invoice_items->inv_tax_amount=$this->get_numeric_value($inv_tax_amount[$i]);
                    $m_invoice_items->inv_non_tax_amount=$this->get_numeric_value($inv_non_tax_amount[$i]);

                    $m_invoice_items->set('unit_id','(SELECT unit_id FROM products WHERE product_id='.(int)$prod_id[$i].')');
                    $m_invoice_items->save();
                }

                //update invoice number base on formatted last insert id
                $m_invoice->sales_inv_no='INV-'.date('Ymd').'-'.$sales_invoice_id;
                $m_invoice->modify($sales_invoice_id);


                //update status of so
                $m_so->order_status_id=$this->get_so_status($sales_order_id);
                $m_so->modify($sales_order_id);

                //******************************************************************************************
                // IMPORTANT!!!
                //update receivable amount field of customer table
                $m_customers=$this->Customers_model;
                $m_customers->recalculate_customer_receivable($this->input->post('customer',TRUE));
                //******************************************************************************************


                $m_invoice->commit();



                if($m_invoice->status()===TRUE){
                    $response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Sales invoice successfully created.';
                    $response['row_added']=$this->response_rows($sales_invoice_id);

                    echo json_encode($response);
                }


                break;


            ////***************************************update Items************************************************
            case 'update':
                $m_invoice=$this->Sales_invoice_model;
                $sales_invoice_id=$this->input->post('sales_invoice_id',TRUE);

                //get sales order id base on SO number
                $m_so=$this->Sales_order_model;
                $arr_so_info=$m_so->get_list(
                    array('sales_order.so_no'=>$this->input->post('so_no',TRUE)),
                    'sales_order.sales_order_id'
                );
                $sales_order_id=(count($arr_so_info)>0?$arr_so_info[0]->sales_order_id:0);

                $m_invoice->begin();

                $m_invoice->department_id=$this->input->post('department',TRUE);
                $m_invoice->remarks=$this->input->post('remarks',TRUE);
                $m_invoice->customer_id=$this->input->post('customer',TRUE);
                $m_invoice->sales_order_id=$sales_order_id;
                $m_invoice->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                $m_invoice->date_invoice=date('Y-m-d',strtotime($this->input->post('date_invoice',TRUE)));
                $m_invoice->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_invoice->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_invoice->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_invoice->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));
                $m_invoice->modified_by_user=$this->session->user_id;
                $m_invoice->modify($sales_invoice_id);


                $m_invoice_items=$this->Sales_invoice_item_model;

                $m_invoice_items->delete_via_fk($sales_invoice_id); //delete previous items then insert those new

                $prod_id=$this->input->post('product_id',TRUE);
                $inv_price=$this->input->post('inv_price',TRUE);
                $inv_discount=$this->input->post('inv_discount',TRUE);
                $inv_line_total_discount=$this->input->post('inv_line_total_discount',TRUE);
                $inv_tax_rate=$this->input->post('inv_tax_rate',TRUE);
                $inv_qty=$this->input->post('inv_qty',TRUE);
                $inv_line_total_price=$this->input->post('inv_line_total_price',TRUE);
                $inv_tax_amount=$this->input->post('inv_tax_amount',TRUE);
                $inv_non_tax_amount=$this->input->post('inv_non_tax_amount',TRUE);

                for($i=0;$i<count($prod_id);$i++){

                    $m_invoice_items->sales_invoice_id=$sales_invoice_id;
                    $m_invoice_items->product_id=$prod_id[$i];
                    $m_invoice_items->inv_price=$this->get_numeric_value($inv_price[$i]);
                    $m_invoice_items->inv_discount=$this->get_numeric_value($inv_discount[$i]);
                    $m_invoice_items->inv_line_total_discount=$this->get_numeric_value($inv_line_total_discount[$i]);
                    $m_invoice_items->inv_tax_rate=$this->get_numeric_value($inv_tax_rate[$i]);
                    $m_invoice_items->inv_qty=$inv_qty[$i];
                    $m_invoice_items->inv_line_total_price=$this->get_numeric_value($inv_line_total_price[$i]);
                    $m_invoice_items->inv_tax_amount=$this->get_numeric_value($inv_tax_amount[$i]);
                    $m_invoice_items->inv_non_tax_amount=$this->get_numeric_value($inv_non_tax_amount[$i]);

                    $m_invoice_items->set('unit_id','(SELECT unit_id FROM products WHERE product_id='.(int)$prod_id[$i].')');
                    $m_invoice_items->save();
                }



                //update status of so
                $m_so->order_status_id=$this->get_so_status($sales_order_id);
                $m_so->modify($sales_order_id);


                //******************************************************************************************
                // IMPORTANT!!!
                //update receivable amount field of customer table
                $m_customers=$this->Customers_model;
                $m_customers->recalculate_customer_receivable($this->input->post('customer',TRUE));
                //******************************************************************************************


                $m_invoice->commit();



                if($m_invoice->status()===TRUE){
                    $response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Sales invoice successfully updated.';
                    $response['row_updated']=$this->response_rows($sales_invoice_id);

                    echo json_encode($response);
                }


                break;


            //***************************************************************************************
            case 'delete':
                $m_invoice=$this->Sales_invoice_model;
                $sales_invoice_id=$this->input->post('sales_invoice_id',TRUE);

                //mark Items as deleted
                $m_invoice->set('date_deleted','NOW()'); //treat NOW() as function and not string
                $m_invoice->deleted_by_user=$this->session->user_id;//user that deleted the record
                $m_invoice->is_deleted=1;//mark as deleted
                $m_invoice->modify($sales_invoice_id);



                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Record successfully deleted.';
                echo json_encode($response);

                break;

            //***************************************************************************************
            case 'sales-for-review':
                $m_sales_invoice=$this->Sales_invoice_model;
                $response['data']=$m_sales_invoice->get_list(

                    array(
                        'sales_invoice.is_active'=>TRUE,
                        'sales_invoice.is_deleted'=>FALSE,
                        'sales_invoice.is_journal_posted'=>FALSE
                    ),

                    array(
                        'sales_invoice.sales_invoice_id',
                        'sales_invoice.sales_inv_no',
                        'sales_invoice.remarks',
                        'DATE_FORMAT(sales_invoice.date_invoice,"%m/%d/%Y") as date_invoice',
                        'customers.customer_name'
                    ),

                    array(
                        array('customers','customers.customer_id=sales_invoice.customer_id','left')
                    )



                );
                echo json_encode($response);
                break;


        }

    }



//**************************************user defined*************************************************
    function response_rows($filter_value){
        return $this->Sales_invoice_model->get_list(
            $filter_value,
            array(
                'sales_invoice.sales_invoice_id',
                'sales_invoice.sales_inv_no',
                'sales_invoice.remarks',
                'sales_invoice.date_created',
                'sales_invoice.customer_id',
                'DATE_FORMAT(sales_invoice.date_invoice,"%m/%d/%Y") as date_invoice',
                'DATE_FORMAT(sales_invoice.date_due,"%m/%d/%Y") as date_due',
                'departments.department_id',
                'departments.department_name',
                'customers.customer_name'
            ),
            array(
                array('departments','departments.department_id=sales_invoice.department_id','left'),
                array('customers','customers.customer_id=sales_invoice.customer_id','left')
            )
        );
    }


    function get_so_status($id){
        //NOTE : 1 means open, 2 means Closed, 3 means partially invoice
        $m_sales_invoice=$this->Sales_invoice_model;

        if(count($m_sales_invoice->get_list(
                array('sales_invoice.sales_order_id'=>$id,'sales_invoice.is_active'=>TRUE,'sales_invoice.is_deleted'=>FALSE),
                'sales_invoice.sales_invoice_id'))==0 ){ //means no SO found on sales invoice that means this so is still open

            return 1;

        }else{
            $m_so=$this->Sales_order_model;
            $row=$m_so->get_so_balance_qty($id);
            return ($row[0]->Balance>0?3:2);
        }

    }


//***************************************************************************************





}
