<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Products_model');
        $this->load->model('Categories_model');
        $this->load->model('Units_model');
    }

    public function index() {
        $data['product_code'] = $this->Products_model->getCode();
        $data['product_cat'] = $this->Categories_model->get_list(null,'category_id,category_name');
        $data['product_dept'] = $this->Products_model->getDepartment();
        $data['product_unit'] = $this->Units_model->get_list(null,'unit_id,unit_name');
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Product Management';

        $this->load->view('products_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_products = $this->Products_model;
                $response['data']=$this->response_rows(array('products.is_deleted'=>FALSE));
                echo json_encode($response);
                break;

            case 'create':
                $m_products = $this->Products_model;

                $m_products->product_code = $this->input->post('product_code', TRUE);
                $m_products->product_desc = $this->input->post('product_desc', TRUE);
                $m_products->product_desc1 = $this->input->post('product_desc1', TRUE);
                $m_products->category_id = $this->input->post('category_id', TRUE);

                $m_products->unit_id = $this->input->post('unit_id', TRUE);
                $m_products->is_inventory = $this->input->post('inventory',TRUE);
                $m_products->is_tax_exempt =$this->input->post('tax_exempt',TRUE)?1:0;

                $m_products->equivalent_points = $this->get_numeric_value($this->input->post('equivalent_points', TRUE));
                $m_products->product_warn =$this->get_numeric_value( $this->input->post('product_warn', TRUE));
                $m_products->product_ideal =$this->get_numeric_value( $this->input->post('product_ideal', TRUE));
                $m_products->markup_percent = $this->input->post('markup_percent', TRUE);
                $m_products->sale_price =$this->get_numeric_value($this->input->post('sale_price', TRUE));
                $m_products->purchase_cost =$this->get_numeric_value($this->input->post('purchase_cost', TRUE));
                $m_products->whole_sale = $this->get_numeric_value($this->input->post('whole_sale', TRUE));
                $m_products->retailer_price =$this->get_numeric_value( $this->input->post('retailer_price', TRUE));
                $m_products->special_disc = $this->get_numeric_value($this->input->post('special_disc', TRUE));
                $m_products->valued_customer =$this->get_numeric_value( $this->input->post('valued_customer', TRUE));

                $m_products->save();

                $product_id = $m_products->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'product information successfully created.';

                $response['row_added'] = $this->response_rows($product_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_products=$this->Products_model;

                $product_id=$this->input->post('product_id',TRUE);

                $m_products->is_deleted=1;
                if($m_products->modify($product_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Product information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_products=$this->Products_model;

                $product_id=$this->input->post('product_id',TRUE);
                $m_products->product_code = $this->input->post('product_code', TRUE);
                $m_products->product_desc = $this->input->post('product_desc', TRUE);
                $m_products->product_desc1 = $this->input->post('product_desc1', TRUE);
                $m_products->category_id = $this->input->post('category_id', TRUE);

                $m_products->unit_id = $this->input->post('unit_id', TRUE);
                $m_products->is_inventory = $this->input->post('inventory',TRUE);
                $m_products->is_tax_exempt =$this->input->post('tax_exempt',TRUE)?1:0;


                $m_products->equivalent_points = $this->get_numeric_value($this->input->post('equivalent_points', TRUE));
                $m_products->product_warn =$this->get_numeric_value( $this->input->post('product_warn', TRUE));
                $m_products->product_ideal =$this->get_numeric_value( $this->input->post('product_ideal', TRUE));
                $m_products->markup_percent = $this->input->post('markup_percent', TRUE);
                $m_products->sale_price =$this->get_numeric_value($this->input->post('sale_price', TRUE));
                $m_products->purchase_cost =$this->get_numeric_value($this->input->post('purchase_cost', TRUE));
                $m_products->whole_sale = $this->get_numeric_value($this->input->post('whole_sale', TRUE));
                $m_products->retailer_price =$this->get_numeric_value( $this->input->post('retailer_price', TRUE));
                $m_products->special_disc = $this->get_numeric_value($this->input->post('special_disc', TRUE));
                $m_products->valued_customer =$this->get_numeric_value( $this->input->post('valued_customer', TRUE));

                $m_products->modify($product_id);

                $response['title']=$product_id;
                $response['stat']='success';
                $response['msg']='Product information successfully updated.';
                $response['row_updated']=$this->response_rows($product_id);
                echo json_encode($response);

                break;
        }
    }





    function response_rows($filter){
        return $this->Products_model->get_list(
            $filter,

            'products.*,categories.category_name,units.unit_name,0 as on_hand',

            array(
                array('categories','categories.category_id=products.category_id','left'),
                array('units','units.unit_id=products.unit_id','left')
            )
        );
    }







}
