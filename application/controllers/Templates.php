<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CORE_Controller {
    function __construct() {
        parent::__construct('');

        $this->validate_session();

        $this->load->model('Purchases_model');
        $this->load->model('Purchase_items_model');

        $this->load->model('Delivery_invoice_model');
        $this->load->model('Delivery_invoice_item_model');

        $this->load->model('Issuance_model');
        $this->load->model('Issuance_item_model');

        $this->load->model('Adjustment_model');
        $this->load->model('Adjustment_item_model');

        $this->load->model('Sales_invoice_model');
        $this->load->model('Sales_invoice_item_model');


        $this->load->model('Sales_order_model');
        $this->load->model('Sales_order_item_model');

        $this->load->model('Suppliers_model');

        $this->load->model('Customers_model');

        $this->load->model('Payable_payment_model');

        $this->load->model('Receivable_payment_model');

        $this->load->model('Journal_info_model');

        $this->load->model('Journal_account_model');

        $this->load->model('Account_title_model');

        $this->load->model('User_group_right_model');

        $this->load->model('Company_model');
        $this->load->library('M_pdf');
    }

    public function index() {

    }


    function layout($layout=null,$filter_value=null,$type=null){




        switch($layout){
            case 'po': //purchase order
                        $m_purchases=$this->Purchases_model;
                        $m_po_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;
                        $type=$this->input->get('type',TRUE);

                        $info=$m_purchases->get_list(
                                $filter_value,
                                'purchase_order.*,CONCAT_WS(" ",purchase_order.terms,purchase_order.duration)as term_description,suppliers.supplier_name,suppliers.address,suppliers.email_address,suppliers.landline',
                                array(
                                    array('suppliers','suppliers.supplier_id=purchase_order.supplier_id','left')
                                )
                            );

                        $company=$m_company->get_list();

                        $data['purchase_info']=$info[0];
                        $data['company_info']=$company[0];
                        $data['po_items']=$m_po_items->get_list(
                                array('purchase_order_id'=>$filter_value),
                                'purchase_order_items.*,products.product_desc,units.unit_name',

                                array(
                                    array('products','products.product_id=purchase_order_items.product_id','left'),
                                    array('units','units.unit_id=purchase_order_items.unit_id','left')
                                )
                                
                            );


                        //show only inside grid with menu buttons
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/po_content',$data,TRUE);
                            echo $this->load->view('template/po_content_menus',$data,TRUE);
                        }

                        //for approval view on DASHBOARD
                        if($type=='approval'){

                            //echo '<br /><hr /><center><strong>Purchase Order for Approval</strong></center><hr />';
                            echo '<br />';
                            echo $this->load->view('template/po_content',$data,TRUE);
                            echo $this->load->view('template/po_content_approval_menus',$data,TRUE);
                        }

                        //show only inside grid
                        if($type=='contentview'){
                            echo $this->load->view('template/po_content',$data,TRUE);
                        }

                        //download pdf
                        if($type=='pdf'){
                            $file_name=$info[0]->po_no;
                            $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/po_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $file_name=$info[0]->po_no;
                            $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/po_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output();
                        }



                        break;


            //****************************************************
            case 'dr': //delivery invoice
                        $m_delivery=$this->Delivery_invoice_model;
                        $m_dr_items=$this->Delivery_invoice_item_model;
                        $m_company=$this->Company_model;
                        $type=$this->input->get('type',TRUE);


                        $info=$m_delivery->get_list(
                            $filter_value,

                            'delivery_invoice.*,purchase_order.po_no,CONCAT_WS(" ",delivery_invoice.terms,delivery_invoice.duration)as term_description,
                            suppliers.supplier_name,suppliers.address,suppliers.email_address,suppliers.landline',

                            array(
                                array('suppliers','suppliers.supplier_id=delivery_invoice.supplier_id','left'),
                                array('purchase_order','purchase_order.purchase_order_id=delivery_invoice.purchase_order_id','left')
                            )
                        );

                        $company=$m_company->get_list();

                        $data['delivery_info']=$info[0];
                        $data['company_info']=$company[0];
                        $data['dr_items']=$m_dr_items->get_list(
                            array('dr_invoice_id'=>$filter_value),
                            'delivery_invoice_items.*,products.product_desc,units.unit_name',
                            array(
                                array('products','products.product_id=delivery_invoice_items.product_id','left'),
                                array('units','units.unit_id=delivery_invoice_items.unit_id','left')
                            )
                        );

                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/dr_content',$data,TRUE);
                            echo $this->load->view('template/dr_content_menus',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/dr_content',$data,TRUE);
                        }


                        //download pdf
                        if($type=='pdf'){
                            $file_name=$info[0]->dr_invoice_no;
                            $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/dr_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $file_name=$info[0]->dr_invoice_no;
                            $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/dr_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output();
                        }

                        break;
                break;


            //****************************************************
            case 'issuance': //delivery invoice
                $m_issuance=$this->Issuance_model;
                $m_dr_items=$this->Issuance_item_model;
                $m_company=$this->Company_model;
                $type=$this->input->get('type',TRUE);

                $info=$m_issuance->get_list(
                    $filter_value,
                    'issuance_info.*,departments.department_name',
                    array(
                        array('departments','departments.department_id=issuance_info.department_id','left')
                    )
                );

                $company=$m_company->get_list();

                $data['issuance_info']=$info[0];
                $data['company_info']=$company[0];
                $data['issue_items']=$m_dr_items->get_list(
                    array('issuance_items.issuance_id'=>$filter_value),
                    'issuance_items.*,products.product_desc,units.unit_name',
                    array(
                        array('products','products.product_id=issuance_items.product_id','left'),
                        array('units','units.unit_id=issuance_items.unit_id','left')
                    )
                );



                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/issue_content',$data,TRUE);
                    echo $this->load->view('template/issue_content_menus',$data,TRUE);
                }

                //show only inside grid without menu button
                if($type=='contentview'){
                    echo $this->load->view('template/issue_content',$data,TRUE);
                }


                //download pdf
                if($type=='pdf'){
                    $file_name=$info[0]->slip_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/issue_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$info[0]->slip_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/issue_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            //****************************************************
            case 'adjustments': //delivery invoice
                $m_adjustment=$this->Adjustment_model;
                $m_adjustment_items=$this->Adjustment_item_model;
                $m_company=$this->Company_model;
                $type=$this->input->get('type',TRUE);

                $info=$m_adjustment->get_list(
                    $filter_value,
                    'adjustment_info.*,departments.department_name',
                    array(
                        array('departments','departments.department_id=adjustment_info.department_id','left')
                    )
                );

                $company=$m_company->get_list();

                $data['adjustment_info']=$info[0];
                $data['company_info']=$company[0];
                $data['adjustment_items']=$m_adjustment_items->get_list(
                    array('adjustment_items.adjustment_id'=>$filter_value),
                    'adjustment_items.*,products.product_desc,units.unit_name',
                    array(
                        array('products','products.product_id=adjustment_items.product_id','left'),
                        array('units','units.unit_id=adjustment_items.unit_id','left')
                    )
                );



                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/adjustment_content',$data,TRUE);
                    echo $this->load->view('template/adjustment_content_menus',$data,TRUE);
                }

                //show only inside grid without menu button
                if($type=='contentview'){
                    echo $this->load->view('template/adjustment_content',$data,TRUE);
                }


                //download pdf
                if($type=='pdf'){
                    $file_name=$info[0]->adjustment_code;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/adjustment_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$info[0]->slip_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/adjustment_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            //****************************************************
            case 'sales-invoice': //delivery invoice
                $m_sales_invoice=$this->Sales_invoice_model;
                $m_sales_invoice_items=$this->Sales_invoice_item_model;
                $type=$this->input->get('type',TRUE);

                $info=$m_sales_invoice->get_list(
                    $filter_value,
                    'sales_invoice.*,departments.department_name,customers.customer_name',
                    array(
                        array('departments','departments.department_id=sales_invoice.department_id','left'),
                        array('customers','customers.customer_id=sales_invoice.customer_id','left')
                    )
                );


                $data['sales_info']=$info[0];
                $data['sales_invoice_items']=$m_sales_invoice_items->get_list(
                    array('sales_invoice_items.sales_invoice_id'=>$filter_value),
                    'sales_invoice_items.*,products.product_desc,units.unit_name',
                    array(
                        array('products','products.product_id=sales_invoice_items.product_id','left'),
                        array('units','units.unit_id=sales_invoice_items.unit_id','left')
                    )
                );



                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/sales_invoice_content',$data,TRUE);
                    echo $this->load->view('template/sales_invoice_content_menus',$data,TRUE);
                }

                //show only inside grid without menu button
                if($type=='contentview'){
                    echo $this->load->view('template/sales_invoice_content',$data,TRUE);
                }


                //download pdf
                if($type=='pdf'){
                    $file_name=$info[0]->sales_inv_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/sales_invoice_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$info[0]->slip_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/sales_invoice_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            //****************************************************
            case 'sales-order': //sales order
                $m_sales_order=$this->Sales_order_model;
                $m_sales_order_items=$this->Sales_order_item_model;
                $type=$this->input->get('type',TRUE);

                $info=$m_sales_order->get_list(
                    $filter_value,
                    'sales_order.*,departments.department_name,customers.customer_name',
                    array(
                        array('departments','departments.department_id=sales_order.department_id','left'),
                        array('customers','customers.customer_id=sales_order.customer_id','left')
                    )
                );


                $data['sales_order']=$info[0];
                $data['sales_order_items']=$m_sales_order_items->get_list(
                    array('sales_order_items.sales_order_id'=>$filter_value),
                    'sales_order_items.*,products.product_desc,units.unit_name',
                    array(
                        array('products','products.product_id=sales_order_items.product_id','left'),
                        array('units','units.unit_id=sales_order_items.unit_id','left')
                    )
                );



                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/so_content',$data,TRUE);
                    echo $this->load->view('template/so_content_menus',$data,TRUE);
                }

                //show only inside grid without menu button
                if($type=='contentview'){
                    echo $this->load->view('template/so_content',$data,TRUE);
                }


                //download pdf
                if($type=='pdf'){
                    $file_name=$info[0]->so_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/so_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$info[0]->slip_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/so_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            case 'supplier':
                $supplier_id=$filter_value;
                $m_suppliers=$this->Suppliers_model;
                $m_purchases=$this->Purchases_model;

                //supplier info
                $supplier_info=$m_suppliers->get_list(
                    $supplier_id,
                    array(
                        'suppliers.*',
                        'supplier_photos.photo_path',
                        'tax_types.tax_type',
                        'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as user',
                        'DATE_FORMAT(suppliers.date_created,"%m/%d/%Y %r")as date_added',
                    ),
                    array(
                        array('supplier_photos','supplier_photos.supplier_id=suppliers.supplier_id','left'),
                        array('user_accounts','user_accounts.user_id=suppliers.posted_by_user','left'),
                        array('tax_types','tax_types.tax_type_id=suppliers.tax_type_id','left')
                    )
                );
                $data['supplier_info']=$supplier_info[0];
                //**********************************************************************

                //list of purchase order that are not closed
                $purchases=$m_purchases->get_list(
                    'purchase_order.supplier_id='.$supplier_id.' AND purchase_order.is_deleted=FALSE AND purchase_order.is_active=TRUE AND (purchase_order.order_status_id=1 OR purchase_order.order_status_id=3)',

                    array(
                        'purchase_order.*',
                        'CONCAT_WS(" ",purchase_order.terms,purchase_order.duration)as term_description',
                        'order_status.order_status',
                        'approval_status.approval_status'
                    ),

                    array(
                        array('order_status','order_status.order_status_id=purchase_order.order_status_id','left'),
                        array('approval_status','approval_status.approval_id=purchase_order.approval_id','left')
                    )

                );
                $data['purchases']=$purchases;

                //get details of last active payment
                $m_payment=$this->Payable_payment_model;
                $recent_payment=$m_payment->get_list(

                    array(
                        'payable_payments.supplier_id'=>$supplier_id,
                        'payable_payments.is_active'=>TRUE,
                        'payable_payments.is_deleted'=>FALSE
                    )
                    ,

                    'payable_payments.receipt_no,DATE_FORMAT(payable_payments.date_paid,"%m/%d/%Y")as date_paid,payable_payments.total_paid_amount',
                    null,'payable_payments.payment_id DESC',null,TRUE,1

                );

                $data['recent_payment']=(count($recent_payment)>0?$recent_payment:'');
                //shows when Expand Icon is click on Supplier Management
                $content=$this->load->view('template/supplier_expandable_details',$data,TRUE);
                echo $content;

                break;



            case 'customer':
                $customer_id=$filter_value;
                $m_customers=$this->Customers_model;
                $m_sales_order=$this->Sales_order_model;

                //customer info
                $customer_info=$m_customers->get_list(
                    $customer_id,
                    array(
                        'customers.*',
                        'customer_photos.photo_path',
                        'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as user',
                        'DATE_FORMAT(customers.date_created,"%m/%d/%Y %r")as date_added',
                    ),
                    array(
                        array('customer_photos','customer_photos.customer_id=customers.customer_id','left'),
                        array('user_accounts','user_accounts.user_id=customers.posted_by_user','left')
                    )
                );
                $data['customer_info']=$customer_info[0];
                //**********************************************************************

                //list of purchase order that are not closed
                $sales=$m_sales_order->get_list(

                    'sales_order.customer_id='.$customer_id.' AND sales_order.is_deleted=FALSE AND sales_order.is_active=TRUE AND (sales_order.order_status_id=1 OR sales_order.order_status_id=3)',

                    array(
                        'sales_order.*',
                        'order_status.order_status'
                    ),

                    array(
                        array('order_status','order_status.order_status_id=sales_order.order_status_id','left')
                    )

                );
                $data['sales']=$sales;

                //get details of last active payment
                $m_payment=$this->Receivable_payment_model;
                $recent_payment=$m_payment->get_list(

                    array(
                        'receivable_payments.customer_id'=>$customer_id,
                        'receivable_payments.is_active'=>TRUE,
                        'receivable_payments.is_deleted'=>FALSE
                    )
                    ,

                    'receivable_payments.receipt_no,DATE_FORMAT(receivable_payments.date_paid,"%m/%d/%Y")as date_paid,receivable_payments.total_paid_amount',
                    null,'receivable_payments.payment_id DESC',null,TRUE,1

                );

                $data['recent_payment']=(count($recent_payment)>0?$recent_payment:'');
                //shows when Expand Icon is click on Customer Management
                $content=$this->load->view('template/customer_expandable_details',$data,TRUE);
                echo $content;

                break;


            case 'journal-ap':
                $m_journal_info=$this->Journal_info_model;
                $journal_id=$this->input->get('id',TRUE);
                $type=$this->input->get('type',TRUE);

                $journal_info=$m_journal_info->get_list(
                    $journal_id,

                    array(
                        'journal_info.*',
                        'suppliers.supplier_name',
                        'suppliers.address',
                        'suppliers.email_address',
                        'suppliers.landline',
                        'suppliers.contact_person'
                    ),

                    array(
                        array('suppliers','suppliers.supplier_id=journal_info.supplier_id','left')
                    )

                );

                $data['journal_info']=$journal_info[0];

                $m_journal_accounts=$this->Journal_account_model;
                $data['journal_accounts']=$m_journal_accounts->get_list(

                    array(
                        'journal_accounts.journal_id'=>$journal_id
                    ),

                    array(
                        'journal_accounts.*',
                        'account_titles.account_no',
                        'account_titles.account_title'
                    ),

                    array(
                        array('account_titles','account_titles.account_id=journal_accounts.account_id','left')
                    )

                );


                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/journal_entries_content',$data,TRUE);
                    echo $this->load->view('template/journal_entries_content_menus',$data,TRUE);
                }

                //download pdf
                if($type=='pdf'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            case 'journal-cdj':
                $m_journal_info=$this->Journal_info_model;
                $journal_id=$this->input->get('id',TRUE);
                $type=$this->input->get('type',TRUE);

                $journal_info=$m_journal_info->get_list(
                    $journal_id,

                    array(
                        'journal_info.*',
                        'suppliers.supplier_name',
                        'suppliers.address',
                        'suppliers.email_address',
                        'suppliers.landline',
                        'suppliers.contact_person'
                    ),

                    array(
                        array('suppliers','suppliers.supplier_id=journal_info.supplier_id','left')
                    )

                );

                $data['journal_info']=$journal_info[0];

                $m_journal_accounts=$this->Journal_account_model;
                $data['journal_accounts']=$m_journal_accounts->get_list(

                    array(
                        'journal_accounts.journal_id'=>$journal_id
                    ),

                    array(
                        'journal_accounts.*',
                        'account_titles.account_no',
                        'account_titles.account_title'
                    ),

                    array(
                        array('account_titles','account_titles.account_id=journal_accounts.account_id','left')
                    )

                );


                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/cdj_journal_entries_content',$data,TRUE);
                    echo $this->load->view('template/cdj_journal_entries_content_menus',$data,TRUE);
                }

                //download pdf
                if($type=='pdf'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/cdj_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/cdj_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            case 'journal-ar':
                $m_journal_info=$this->Journal_info_model;
                $journal_id=$this->input->get('id',TRUE);
                $type=$this->input->get('type',TRUE);

                $journal_info=$m_journal_info->get_list(
                    $journal_id,

                    array(
                        'journal_info.*',
                        'customers.customer_name',
                        'customers.address',
                        'customers.email_address',
                        'customers.landline',
                        'customers.mobile_no'
                    ),

                    array(
                        array('customers','customers.customer_id=journal_info.customer_id','left')
                    )

                );

                $data['journal_info']=$journal_info[0];

                $m_journal_accounts=$this->Journal_account_model;
                $data['journal_accounts']=$m_journal_accounts->get_list(

                    array(
                        'journal_accounts.journal_id'=>$journal_id
                    ),

                    array(
                        'journal_accounts.*',
                        'account_titles.account_no',
                        'account_titles.account_title'
                    ),

                    array(
                        array('account_titles','account_titles.account_id=journal_accounts.account_id','left')
                    )

                );


                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/sales_journal_entries_content',$data,TRUE);
                    echo $this->load->view('template/sales_journal_entries_content_menus',$data,TRUE);
                }

                //download pdf
                if($type=='pdf'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/sales_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/sales_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            case 'journal-crj':
                $m_journal_info=$this->Journal_info_model;
                $journal_id=$this->input->get('id',TRUE);
                $type=$this->input->get('type',TRUE);

                $journal_info=$m_journal_info->get_list(
                    $journal_id,

                    array(
                        'journal_info.*',
                        'customers.customer_name',
                        'customers.address',
                        'customers.email_address',
                        'customers.landline',
                        'customers.mobile_no'
                    ),

                    array(
                        array('customers','customers.customer_id=journal_info.customer_id','left')
                    )

                );

                $data['journal_info']=$journal_info[0];

                $m_journal_accounts=$this->Journal_account_model;
                $data['journal_accounts']=$m_journal_accounts->get_list(

                    array(
                        'journal_accounts.journal_id'=>$journal_id
                    ),

                    array(
                        'journal_accounts.*',
                        'account_titles.account_no',
                        'account_titles.account_title'
                    ),

                    array(
                        array('account_titles','account_titles.account_id=journal_accounts.account_id','left')
                    )

                );


                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/crj_journal_entries_content',$data,TRUE);
                    echo $this->load->view('template/crj_journal_entries_content_menus',$data,TRUE);
                }

                //download pdf
                if($type=='pdf'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/crj_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");

                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/crj_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            case 'journal-gje':
                $m_journal_info=$this->Journal_info_model;
                $journal_id=$this->input->get('id',TRUE);
                $type=$this->input->get('type',TRUE);

                $journal_info=$m_journal_info->get_list(

                    "journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND journal_info.book_type='GJE' AND journal_info.journal_id=$journal_id",

                    array(
                        'journal_info.journal_id',
                        'journal_info.txn_no',
                        'DATE_FORMAT(journal_info.date_txn,"%m/%d/%Y")as date_txn',
                        'journal_info.is_active',
                        'journal_info.remarks',
                        'CONCAT_WS(" ",IFNULL(customers.customer_name,""),IFNULL(suppliers.supplier_name,"")) as particular',
                        'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as posted_by'
                    ),

                    array(
                        array('customers','customers.customer_id=journal_info.customer_id','left'),
                        array('suppliers','suppliers.supplier_id=journal_info.supplier_id','left'),
                        array('user_accounts','user_accounts.user_id=journal_info.created_by_user','left')
                    )

                );

                $data['journal_info']=$journal_info[0];

                $m_journal_accounts=$this->Journal_account_model;
                $data['journal_accounts']=$m_journal_accounts->get_list(

                    array(
                        'journal_accounts.journal_id'=>$journal_id
                    ),

                    array(
                        'journal_accounts.*',
                        'account_titles.account_no',
                        'account_titles.account_title'
                    ),

                    array(
                        array('account_titles','account_titles.account_id=journal_accounts.account_id','left')
                    )

                );


                //show only inside grid with menu button
                if($type=='fullview'||$type==null){
                    echo $this->load->view('template/gje_journal_entries_content',$data,TRUE);
                    echo $this->load->view('template/gje_journal_entries_content_menus',$data,TRUE);
                }

                //download pdf
                if($type=='pdf'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/gje_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");
                }

                //preview on browser
                if($type=='preview'){
                    $file_name=$journal_info[0]->txn_no;
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/gje_journal_entries_content',$data,TRUE); //load the template
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }

                break;


            case 'ap-journal-for-review':
                $purchase_invoice_id=$this->input->get('id',TRUE);

                $m_suppliers=$this->Suppliers_model;
                $m_accounts=$this->Account_title_model;
                $m_purchases_items=$this->Delivery_invoice_item_model;
                $m_purchases_info=$this->Delivery_invoice_model;

                $purchase_info=$m_purchases_info->get_list(
                    array(
                        'delivery_invoice.is_active'=>TRUE,
                        'delivery_invoice.is_deleted'=>FALSE,
                        'delivery_invoice.dr_invoice_id'=>$purchase_invoice_id
                    ),

                    array(
                        'delivery_invoice.dr_invoice_id',
                        'delivery_invoice.dr_invoice_no',
                        'delivery_invoice.supplier_id',
                        'delivery_invoice.external_ref_no',
                        'delivery_invoice.remarks',
                        'CONCAT_WS(" ",delivery_invoice.terms,delivery_invoice.duration)as term_description',
                        'DATE_FORMAT(delivery_invoice.date_delivered,"%m/%d/%Y")as date_delivered',
                        'DATE_FORMAT(delivery_invoice.date_created,"%m/%d/%Y %r")as date_created',
                        'suppliers.supplier_name',
                        'suppliers.address',
                        'suppliers.email_address',
                        'suppliers.landline',
                        'purchase_order.po_no',
                        'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as posted_by'
                    ),

                    array(
                        array('suppliers','suppliers.supplier_id=delivery_invoice.supplier_id','left'),
                        array('purchase_order','purchase_order.purchase_order_id=delivery_invoice.purchase_order_id','left'),
                        array('user_accounts','user_accounts.user_id=delivery_invoice.posted_by_user','left')
                    )

                );
                $data['purchase_info']=$purchase_info[0];
                $data['suppliers']=$m_suppliers->get_list(
                    array(
                        'suppliers.is_active'=>TRUE,
                        'suppliers.is_deleted'=>FALSE
                    ),

                    array(
                        'suppliers.supplier_id',
                        'suppliers.supplier_name'
                    )
                );
                $data['entries']=$m_purchases_info->get_journal_entries($purchase_invoice_id);
                $data['accounts']=$m_accounts->get_list(
                    array(
                        'account_titles.is_active'=>TRUE,
                        'account_titles.is_deleted'=>FALSE
                    )
                );
                $data['items']=$m_purchases_items->get_list(
                    array(
                        'delivery_invoice_items.dr_invoice_id'=>$purchase_invoice_id
                    ),

                    array(
                        'delivery_invoice_items.*',
                        'products.product_desc'
                    ),

                    array(
                        array('products','products.product_id=delivery_invoice_items.product_id','left')
                    )

                );


                echo $this->load->view('template/ap_journal_for_review',$data,TRUE); //details of the journal


                break;


            case 'ar-journal-for-review':
                $sales_invoice_id=$this->input->get('id',TRUE);

                $m_customers=$this->Customers_model;
                $m_accounts=$this->Account_title_model;
                $m_sales_items=$this->Sales_invoice_item_model;
                $m_sales_invoice=$this->Sales_invoice_model;

                $sales_info=$m_sales_invoice->get_list(
                    array(
                        'sales_invoice.is_active'=>TRUE,
                        'sales_invoice.is_deleted'=>FALSE,
                        'sales_invoice.sales_invoice_id'=>$sales_invoice_id
                    ),

                    array(
                        'sales_invoice.sales_invoice_id',
                        'sales_invoice.sales_inv_no',
                        'sales_invoice.customer_id',
                        'sales_invoice.remarks',
                        'DATE_FORMAT(sales_invoice.date_invoice,"%m/%d/%Y")as date_invoice',
                        'DATE_FORMAT(sales_invoice.date_created,"%m/%d/%Y %r")as date_created',
                        'customers.customer_name',
                        'customers.address',
                        'customers.email_address',
                        'customers.landline',
                        'sales_order.so_no',
                        'CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as posted_by'
                    ),

                    array(
                        array('customers','customers.customer_id=sales_invoice.customer_id','left'),
                        array('sales_order','sales_order.sales_order_id=sales_invoice.sales_order_id','left'),
                        array('user_accounts','user_accounts.user_id=sales_invoice.posted_by_user','left')
                    )

                );
                $data['sales_info']=$sales_info[0];
                $data['customers']=$m_customers->get_list(
                    array(
                        'customers.is_active'=>TRUE,
                        'customers.is_deleted'=>FALSE
                    ),

                    array(
                        'customers.customer_id',
                        'customers.customer_name'
                    )
                );
                $data['entries']=$m_sales_invoice->get_journal_entries($sales_invoice_id);
                $data['accounts']=$m_accounts->get_list(
                    array(
                        'account_titles.is_active'=>TRUE,
                        'account_titles.is_deleted'=>FALSE
                    )
                );
                $data['items']=$m_sales_items->get_list(
                    array(
                        'sales_invoice_items.sales_invoice_id'=>$sales_invoice_id
                    ),

                    array(
                        'sales_invoice_items.*',
                        'products.product_desc'
                    ),

                    array(
                        array('products','products.product_id=sales_invoice_items.product_id','left')
                    )

                );


                echo $this->load->view('template/ar_journal_for_review',$data,TRUE); //details of the journal


                break;


            case 'user-rights':
                $m_rights=$this->User_group_right_model;

                $id=$this->input->get('id',TRUE);

                $data['rights']=$m_rights->get_user_group_rights($id);
                $data['user_group_id']=$id;

                $this->load->view('template/user_group_rights',$data);
                break;


            case 'balance-sheet':
                $type=$this->input->get('type',TRUE);
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


                //download pdf
                if($type=='pdf'){
                    $file_name=date('Y-m-d');
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/balance_sheet_report',$data,TRUE);
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");
                }

                //preview on browser
                if($type=='preview'){
                    $file_name=date('Y-m-d');
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/balance_sheet_report',$data,TRUE);
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }



                break;



            case 'income-statement':
                $type=$this->input->get('type',TRUE);

                $data['income_accounts']=$this->Journal_info_model->get_account_balance(4);
                $data['expense_accounts']=$this->Journal_info_model->get_account_balance(5);


                //download pdf
                if($type=='pdf'){
                    $file_name=date('Y-m-d');
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/income_statement_report',$data,TRUE);
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output($pdfFilePath,"D");
                }

                //preview on browser
                if($type=='preview'){
                    $file_name=date('Y-m-d');
                    $pdfFilePath = $file_name.".pdf"; //generate filename base on id
                    $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                    $content=$this->load->view('template/income_statement_report',$data,TRUE);
                    $pdf->setFooter('{PAGENO}');
                    $pdf->WriteHTML($content);
                    //download it.
                    $pdf->Output();
                }



                break;
        }
    }


}
