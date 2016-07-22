<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CORE_Controller {
    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Purchases_model');
        $this->load->model('Purchase_items_model');
    }

    public function index() {

    }

    //layout = po,
    //$type = pdf,preview
    //$filter_value=criteria
    function layout($layout=null,$type=null,$filter_value=null){
        switch($layout){
            case 'po' :
                $m_purchases=$this->Purchases_model;
                $m_po_items=$this->Purchase_items_model;

                //load mPDF library
                $dl=0;
                $pdfFilePath = $filter_value.".pdf"; //generate filename base on id

                $this->load->library('m_pdf');
                $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class

                $info=$m_purchases->get_list(
                    $filter_value,
                    'purchase_order.*,suppliers.supplier_name,suppliers.address,suppliers.email_address,suppliers.landline',
                    array(
                        array('suppliers','suppliers.supplier_id=purchase_order.supplier_id','left')
                    )
                );

                $data['purchase_info']=$info[0];

                $data['po_items']=$m_po_items->get_list(
                    array('purchase_order_id'=>$filter_value),
                    'purchase_order_items.*,products.product_desc,units.unit_name',
                    array(
                        array('products','products.product_id=purchase_order_items.product_id','left'),
                        array('units','units.unit_id=purchase_order_items.unit_id','left')
                    )
                );

                $content=$this->load->view('template/po_content',$data,TRUE); //load the template
                $pdf->setFooter('{PAGENO}');


                $pdf->WriteHTML($content);

                if($type=='pdf'){
                    //download it.
                    $pdf->Output($pdfFilePath,"D");
                }else{
                    //just output it on browser
                    $pdf->Output();
                }

                break;
        }
    }


}
