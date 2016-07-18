<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();

        $this->load->model('Purchases_model');
        $this->load->model('Suppliers_model');
        $this->load->model('Tax_types_model');
        $this->load->model('Products_model');
        $this->load->model('Purchase_items_model');

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
                       'products.product_id as id',
                       'products.product_code as plu',
                       'products.product_desc as description1',
                       'products.product_desc1 as description2',
                       'FORMAT(products.sale_price,2)as srp',
                       'products.unit_id',
                       'units.unit_name'
                ),
                array(
                    // parameter (table to join(left) , the reference field)
                    array('units','units.unit_id=products.unit_id','left'),
                    array('categories','categories.category_id=products.category_id','left')

                )

            );

        $data['title'] = 'Purchase Order';
        $this->load->view('po_view', $data);


    }

    function transaction($txn = null) {
            switch ($txn){
                case 'list':
                    $m_purchases=$this->Purchases_model;
                    $response['data']=$m_purchases->get_list(
                            null,
                            array(
                                'purchase_order.po_no',
                                'purchase_order.terms',
                                'purchase_order.duration',
                                'purchase_order.deliver_to_address',
                                'purchase_order.contact_person',
                                'purchase_order.remarks',
                                'purchase_order.total_discount',
                                'purchase_order.total_before_tax',
                                'suppliers.supplier_name',
                                'tax_types.tax_type'
                            ),
                            array(
                                array('suppliers','suppliers.supplier_id=purchase_order.supplier_id','left'),
                                array('tax_types','tax_types.tax_type_id=purchase_order.tax_type_id','left')
                            )
                    );


                    echo json_encode($response);
                    break;

                case 'create':
                    $m_purchases=$this->Purchases_model;

                    $m_purchases->begin();

                    $m_purchases->set('date_created','NOW()'); //treat NOW() as function and not string
                    $m_purchases->po_no=$this->input->post('po_no',TRUE);
                    $m_purchases->terms=$this->input->post('terms',TRUE);
                    $m_purchases->duration=$this->input->post('duration',TRUE);
                    $m_purchases->deliver_to_address=$this->input->post('deliver_to_address',TRUE);
                    $m_purchases->contact_person=$this->input->post('contact_person',TRUE);
                    $m_purchases->supplier_id=$this->input->post('supplier',TRUE);
                    $m_purchases->remarks=$this->input->post('remarks',TRUE);
                    $m_purchases->tax_type_id=$this->input->post('tax_type',TRUE);
                    $m_purchases->posted_by_user=$this->session->user_id;
                    $m_purchases->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                    $m_purchases->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                    $m_purchases->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                    $m_purchases->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));

                    $m_purchases->save();

                    $po_id=$m_purchases->last_insert_id();
                    $m_po_items=$this->Purchase_items_model;

                    $prod_id=$this->input->post('product_id',TRUE);
                    $po_qty=$this->input->post('po_qty',TRUE);
                    $po_price=$this->input->post('po_price',TRUE);
                    $po_discount=$this->input->post('po_discount',TRUE);
                    $po_tax_rate=$this->input->post('po_tax_rate',TRUE);
                    $po_line_total=$this->input->post('po_line_total',TRUE);
                    $tax_amount=$this->input->post('tax_amount',TRUE);
                    $non_tax_amount=$this->input->post('non_tax_amount',TRUE);

                    for($i=0;$i<count($prod_id);$i++){

                        $m_po_items->purchase_order_id=$po_id;
                        $m_po_items->product_id=$prod_id[$i];
                        $m_po_items->po_price=$this->get_numeric_value($po_price[$i]);
                        $m_po_items->po_discount=$this->get_numeric_value($po_discount[$i]);
                        $m_po_items->po_tax_rate=$this->get_numeric_value($po_tax_rate[$i]);
                        $m_po_items->po_line_total=$this->get_numeric_value($po_line_total[$i]);
                        $m_po_items->tax_amount=$this->get_numeric_value($tax_amount[$i]);
                        $m_po_items->non_tax_amount=$this->get_numeric_value($non_tax_amount[$i]);

                        $m_po_items->set('unit_id','(SELECT unit_id FROM products WHERE product_id='.(int)$prod_id[$i].')');
                        $m_po_items->save();
                    }

                    $m_purchases->commit();



                    if($m_purchases->status()===TRUE){
                        $response['title'] = 'Success!';
                        $response['stat'] = 'success';
                        $response['msg'] = 'Purchase order successfully created.';

                        echo json_encode($response);
                    }


                    break;
            }

    }
}
