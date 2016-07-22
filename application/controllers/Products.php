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
                $response['data'] = $m_products->get_list(

                    array('products.is_deleted'=>FALSE),

                    'products.product_code,products.product_id,products.product_desc,products.category_id,products.unit_id,categories.category_name,units.unit_name',

                    array(
                        array('categories','categories.category_id=products.category_id','left'),
                        array('units','units.unit_id=products.unit_id','left')
                    )


                );
                echo json_encode($response);
                break;

            case 'create':
                $m_products = $this->Products_model;

                $m_products->product_code = $this->input->post('product_code', TRUE);
                $m_products->product_desc = $this->input->post('product_desc', TRUE);
                $m_products->product_desc1 = $this->input->post('product_desc1', TRUE);
                $m_products->category_id = $this->input->post('category_id', TRUE);
                $m_products->product_dept = $this->input->post('product_dept', TRUE);
                $m_products->unit_id = $this->input->post('unit_id', TRUE);
                $m_products->product_vat = $this->input->post('product_vat', TRUE);
                $m_products->equivalent_points = $this->input->post('equivalent_points', TRUE);
                $m_products->product_warn = $this->input->post('product_warn', TRUE);
                $m_products->product_ideal = $this->input->post('product_ideal', TRUE);

                $m_products->markup_percent = $this->input->post('markup_percent', TRUE);
                $m_products->sale_price = $this->input->post('sale_price', TRUE);
                $m_products->whole_sale = $this->input->post('whole_sale', TRUE);
                $m_products->retailer_price = $this->input->post('retailer_price', TRUE);
                $m_products->special_disc = $this->input->post('special_disc', TRUE);
                $m_products->valued_customer = $this->input->post('valued_customer', TRUE);
                $m_products->save();

                $product_id = $m_products->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'product information successfully created.';

                $response['row_added']= $m_products->get_list();

                $response['row_added'] = $m_products->get_list(

                    $product_id,
                    'products.product_code,products.product_desc,products.category_id,products.unit_id,categories.category_name,units.unit_name',

                    array(
                        array('categories','categories.category_id=products.category_id','left'),
                        array('units','units.unit_id=products.unit_id','left')
                    ));
                echo json_encode($response);

                break;

            case 'delete':
                $m_products=$this->Products_model;

                $product_id=$this->input->post('product_id',TRUE);

                $m_products->is_deleted=1;
                if($m_products->modify($product_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='product information successfully deleted.';

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
                $m_products->product_dept = $this->input->post('product_dept', TRUE);
                $m_products->unit_id = $this->input->post('unit_id', TRUE);
                $m_products->product_vat = $this->input->post('product_vat', TRUE);
                $m_products->equivalent_points = $this->input->post('equivalent_points', TRUE);
                $m_products->product_warn = $this->input->post('product_warn', TRUE);
                $m_products->product_ideal = $this->input->post('product_ideal', TRUE);

                $m_products->markup_percent = $this->input->post('markup_percent', TRUE);
                $m_products->sale_price = $this->input->post('sale_price', TRUE);
                $m_products->whole_sale = $this->input->post('whole_sale', TRUE);
                $m_products->retailer_price = $this->input->post('retailer_price', TRUE);
                $m_products->special_disc = $this->input->post('special_disc', TRUE);
                $m_products->valued_customer = $this->input->post('valued_customer', TRUE);

                $m_products->modify($product_id);

                $response['title']=$product_id;
                $response['stat']='success';
                $response['msg']='product information successfully updated.';
                $response['row_updated']=$m_products->get_list(

                    $product_id,

                    'products.product_code,products.product_id,products.product_desc,products.category_id,products.unit_id,categories.category_name,units.unit_name',

                    array(
                        array('categories','categories.category_id=products.category_id','left'),
                        array('units','units.unit_id=products.unit_id','left')
                    ));
                echo json_encode($response);

                break;
        }
    }
}
