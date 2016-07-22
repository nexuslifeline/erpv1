<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CORE_Controller {
    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Purchases_model');
        $this->load->model('Purchase_items_model');
    }

    public function index() {

    }


    function layout($layout=null,$filter_value=null,$type=null){
        switch($layout){
            case 'po':
                $m_purchases=$this->Purchases_model;
                $m_po_items=$this->Purchase_items_model;

                $temp=$m_purchases->get_list(
                        $filter_value,
                        'purchase_order.*,CONCAT_WS(" ",purchase_order.terms,purchase_order.duration)as term_description,suppliers.supplier_name,suppliers.address,suppliers.email_address,suppliers.landline',
                        array(
                            array('suppliers','suppliers.supplier_id=purchase_order.supplier_id','left')
                        )
                    );
                $data['purchase_info']=$temp[0];

                $data['po_items']=$m_po_items->get_list(
                        array('purchase_order_id'=>$filter_value),
                        'purchase_order_items.*,products.product_desc,units.unit_name',
                        array(
                            array('products','products.product_id=purchase_order_items.product_id','left'),
                            array('units','units.unit_id=purchase_order_items.unit_id','left')
                        )
                    );


                echo $this->load->view('template/po_content',$data,TRUE);
                echo $this->load->view('template/po_content_menus','',TRUE);



                break;
        }
    }


}
