<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliveries extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();

        $this->load->model('Delivery_invoice_model');
        $this->load->model('Suppliers_model');
        $this->load->model('Tax_types_model');
        $this->load->model('Products_model');
        $this->load->model('Delivery_invoice_item_model');

    }

    public function index() {

        //default resources of the active view
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);


        //data required by active view
        $data['suppliers']=$this->Suppliers_model->get_list(
            null,
            'suppliers.*,IFNULL(tax_types.tax_rate,0)as tax_rate',
            array(
                array('tax_types','tax_types.tax_type_id=suppliers.tax_type_id','left')
            )
        );


        $data['tax_types']=$this->Tax_types_model->get_list();

        $data['products']=$this->Products_model->get_list(
            null, //no id filter
            array(
                'products.product_id',
                'products.product_code',
                'products.product_desc',
                'products.product_desc1',
                'products.is_tax_excempt',
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

        $data['title'] = 'Delivery Invoice';
        $this->load->view('delivery_view', $data);


    }

    function transaction($txn = null,$id_filter=null) {
        switch ($txn){
            case 'list':  //this returns JSON of Purchase Order to be rendered on Datatable
                $m_delivery_invoice=$this->Delivery_invoice_model;
                $response['data']=$this->response_rows($id_filter);
                echo json_encode($response);
                break;


            case 'items': //items on the specific PO, loads when edit button is called
                $m_items=$this->Delivery_invoice_item_model;

                $response['data']=$m_items->get_list(
                    array('dr_invoice_id'=>$id_filter),
                    array(
                        'delivery_invoice_items.*',
                        'products.product_code',
                        'products.product_desc',
                        'units.unit_id',
                        'units.unit_name'
                    ),
                    array(
                        array('products','products.product_id=delivery_invoice_items.product_id','left'),
                        array('units','units.unit_id=units.unit_id','left')
                    ),
                    'delivery_invoice_items.dr_invoice_item_id DESC'
                );


                echo json_encode($response);
                break;

            case 'create':
                $m_delivery_invoice=$this->Delivery_invoice_model;

                if(count($m_delivery_invoice->get_list(array('dr_invoice_no'=>$this->input->post('dr_invoice_no',TRUE))))>0){
                    $response['title'] = 'Invalid!';
                    $response['stat'] = 'error';
                    $response['msg'] = 'Delivery Invoice No. already exists.';

                    echo json_encode($response);
                    exit;
                }


                $m_delivery_invoice->begin();

                $m_delivery_invoice->set('date_created','NOW()'); //treat NOW() as function and not string
                $m_delivery_invoice->dr_invoice_no=$this->input->post('dr_invoice_no',TRUE);
                $m_delivery_invoice->external_ref_no=$this->input->post('external_ref_no',TRUE);
                $m_delivery_invoice->contact_person=$this->input->post('contact_person',TRUE);
                $m_delivery_invoice->terms=$this->input->post('terms',TRUE);
                $m_delivery_invoice->duration=$this->input->post('duration',TRUE);
                $m_delivery_invoice->supplier_id=$this->input->post('supplier',TRUE);
                $m_delivery_invoice->remarks=$this->input->post('remarks',TRUE);
                $m_delivery_invoice->tax_type_id=$this->input->post('tax_type',TRUE);
                $m_delivery_invoice->date_received=date('Y-m-d',strtotime($this->input->post('date_received',TRUE)));
                $m_delivery_invoice->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                $m_delivery_invoice->posted_by_user=$this->session->user_id;
                $m_delivery_invoice->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_delivery_invoice->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_delivery_invoice->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_delivery_invoice->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));

                $m_delivery_invoice->save();

                $dr_invoice_id=$m_delivery_invoice->last_insert_id();
                $m_dr_items=$this->Delivery_invoice_item_model;

                $prod_id=$this->input->post('product_id',TRUE);
                $dr_qty=$this->input->post('dr_qty',TRUE);
                $dr_price=$this->input->post('dr_price',TRUE);
                $dr_discount=$this->input->post('dr_discount',TRUE);
                $dr_line_total_discount=$this->input->post('dr_line_total_discount',TRUE);
                $dr_tax_rate=$this->input->post('dr_tax_rate',TRUE);
                $dr_line_total_price=$this->input->post('dr_line_total_price',TRUE);
                $dr_tax_amount=$this->input->post('dr_tax_amount',TRUE);
                $dr_non_tax_amount=$this->input->post('dr_non_tax_amount',TRUE);

                for($i=0;$i<count($prod_id);$i++){

                    $m_dr_items->dr_invoice_id=$dr_invoice_id;
                    $m_dr_items->product_id=$prod_id[$i];
                    $m_dr_items->dr_qty=$dr_qty[$i];
                    $m_dr_items->dr_price=$this->get_numeric_value($dr_price[$i]);
                    $m_dr_items->dr_discount=$this->get_numeric_value($dr_discount[$i]);
                    $m_dr_items->dr_line_total_discount=$this->get_numeric_value($dr_line_total_discount[$i]);
                    $m_dr_items->dr_tax_rate=$this->get_numeric_value($dr_tax_rate[$i]);
                    $m_dr_items->dr_line_total_price=$this->get_numeric_value($dr_line_total_price[$i]);
                    $m_dr_items->dr_tax_amount=$this->get_numeric_value($dr_tax_amount[$i]);
                    $m_dr_items->dr_non_tax_amount=$this->get_numeric_value($dr_non_tax_amount[$i]);

                    $m_dr_items->set('unit_id','(SELECT unit_id FROM products WHERE product_id='.(int)$prod_id[$i].')');
                    $m_dr_items->save();
                }

                $m_delivery_invoice->commit();



                if($m_delivery_invoice->status()===TRUE){
                    $response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Delivery invoice successfully created.';
                    $response['row_added']=$this->response_rows($dr_invoice_id);

                    echo json_encode($response);
                }


                break;

            case 'update':
                $m_delivery_invoice=$this->Delivery_invoice_model;
                $dr_invoice_id=$this->input->post('dr_invoice_id',TRUE);

                $m_delivery_invoice->begin();
                $m_delivery_invoice->set('date_created','NOW()'); //treat NOW() as function and not string
                $m_delivery_invoice->dr_invoice_no=$this->input->post('dr_invoice_no',TRUE);
                $m_delivery_invoice->external_ref_no=$this->input->post('external_ref_no',TRUE);
                $m_delivery_invoice->contact_person=$this->input->post('contact_person',TRUE);
                $m_delivery_invoice->terms=$this->input->post('terms',TRUE);
                $m_delivery_invoice->duration=$this->input->post('duration',TRUE);
                $m_delivery_invoice->supplier_id=$this->input->post('supplier',TRUE);
                $m_delivery_invoice->remarks=$this->input->post('remarks',TRUE);
                $m_delivery_invoice->tax_type_id=$this->input->post('tax_type',TRUE);
                $m_delivery_invoice->date_received=date('Y-m-d',strtotime($this->input->post('date_received',TRUE)));
                $m_delivery_invoice->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                $m_delivery_invoice->modified_by_user=$this->session->user_id;
                $m_delivery_invoice->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_delivery_invoice->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_delivery_invoice->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_delivery_invoice->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));
                $m_delivery_invoice->modify($dr_invoice_id);


                $m_dr_items=$this->Delivery_invoice_item_model;

                $m_dr_items->delete_via_fk($dr_invoice_id); //delete previous items then insert those new

                $prod_id=$this->input->post('product_id',TRUE);
                $dr_price=$this->input->post('dr_price',TRUE);
                $dr_discount=$this->input->post('dr_discount',TRUE);
                $dr_line_total_discount=$this->input->post('dr_line_total_discount',TRUE);
                $dr_tax_rate=$this->input->post('dr_tax_rate',TRUE);
                $dr_qty=$this->input->post('dr_qty',TRUE);
                $dr_line_total_price=$this->input->post('dr_line_total_price',TRUE);
                $dr_tax_amount=$this->input->post('dr_tax_amount',TRUE);
                $dr_non_tax_amount=$this->input->post('dr_non_tax_amount',TRUE);

                for($i=0;$i<count($prod_id);$i++){

                    $m_dr_items->dr_invoice_id=$dr_invoice_id;
                    $m_dr_items->product_id=$prod_id[$i];
                    $m_dr_items->dr_price=$this->get_numeric_value($dr_price[$i]);
                    $m_dr_items->dr_discount=$this->get_numeric_value($dr_discount[$i]);
                    $m_dr_items->dr_line_total_discount=$this->get_numeric_value($dr_line_total_discount[$i]);
                    $m_dr_items->dr_tax_rate=$this->get_numeric_value($dr_tax_rate[$i]);
                    $m_dr_items->dr_qty=$dr_qty[$i];
                    $m_dr_items->dr_line_total_price=$this->get_numeric_value($dr_line_total_price[$i]);
                    $m_dr_items->dr_tax_amount=$this->get_numeric_value($dr_tax_amount[$i]);
                    $m_dr_items->dr_non_tax_amount=$this->get_numeric_value($dr_non_tax_amount[$i]);

                    $m_dr_items->set('unit_id','(SELECT unit_id FROM products WHERE product_id='.(int)$prod_id[$i].')');
                    $m_dr_items->save();
                }

                $m_delivery_invoice->commit();



                if($m_delivery_invoice->status()===TRUE){
                    $response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Delivery invoice successfully updated.';
                    $response['row_updated']=$this->response_rows($dr_invoice_id);

                    echo json_encode($response);
                }


                break;
        }

    }




    function response_rows($filter_value,$order_by=null){
        return $this->Delivery_invoice_model->get_list(
            $filter_value,
            array(
                'delivery_invoice.*',
                'DATE_FORMAT(delivery_invoice.date_due,"%m/%d/%Y")as date_due',
                'DATE_FORMAT(delivery_invoice.date_received,"%m/%d/%Y")as date_received',
                'CONCAT_WS(" ",CAST(delivery_invoice.terms AS CHAR),delivery_invoice.duration)as term_description',
                'suppliers.supplier_name',
                'tax_types.tax_type'
            ),
            array(
                array('suppliers','suppliers.supplier_id=delivery_invoice.supplier_id','left'),
                array('tax_types','tax_types.tax_type_id=delivery_invoice.tax_type_id','left')
            ),
            $order_by
        );
    }





}
