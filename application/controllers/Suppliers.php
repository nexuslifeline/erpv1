<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CORE_Controller {

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Suppliers_model');
        $this->load->model('Supplier_photos_model');
    }

    public function index() {
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
        $data['title']='Supplier Management';

        $this->load->view('suppliers_view',$data);
    }


    function transaction($txn=null) {
        switch($txn) {
            case 'list':
                $m_suppliers=$this->Suppliers_model;
                $response['data']=$m_suppliers->get_supplier_list();
                echo json_encode($response);

                break;

            case 'create':
                $m_suppliers=$this->Suppliers_model;
                $m_photos=$this->Supplier_photos_model;

                $m_suppliers->supplier_name=$this->input->post('supplier_name',TRUE);
                $m_suppliers->address=$this->input->post('address',TRUE);
                $m_suppliers->email_address=$this->input->post('email_address',TRUE);
                $m_suppliers->landline=$this->input->post('landline',TRUE);
                $m_suppliers->mobile_no=$this->input->post('mobile_no',TRUE);
                $m_suppliers->save();

                $supplier_id=$m_suppliers->last_insert_id();

                $m_photos->supplier_id=$supplier_id;
                $m_photos->photo_path=$this->input->post('photo_path',TRUE);
                $m_photos->save();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='supplier information successfully created.';
                $response['row_added']=$m_suppliers->get_supplier_list($supplier_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_suppliers=$this->Suppliers_model;
                $m_photos=$this->Supplier_photos_model;
                $supplier_id=$this->input->post('supplier_id',TRUE);

                $m_suppliers->is_deleted=1;
                if($m_suppliers->modify($supplier_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='supplier information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_suppliers=$this->Suppliers_model;
                $m_photos=$this->Supplier_photos_model;

                $supplier_id=$this->input->post('supplier_id',TRUE);
                $m_suppliers->supplier_name=$this->input->post('supplier_name',TRUE);
                $m_suppliers->address=$this->input->post('address',TRUE);
                $m_suppliers->email_address=$this->input->post('email_address',TRUE);
                $m_suppliers->landline=$this->input->post('landline',TRUE);
                $m_suppliers->mobile_no=$this->input->post('mobile_no',TRUE);
                $m_suppliers->modify($supplier_id);

                $m_photos->delete_via_fk($supplier_id);
                $m_photos->supplier_id=$supplier_id;
                $m_photos->photo_path=$this->input->post('photo_path',TRUE);
                $m_photos->save();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='supplier information successfully updated.';
                $response['row_updated']=$m_suppliers->get_supplier_list($supplier_id);
                echo json_encode($response);

                break;

            case 'upload':
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/img/supplier/';

                foreach($_FILES as $file){

                    $server_file_name=uniqid('');
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_path=$directory.$server_file_name.'.'.$extension;
                    $orig_file_name=$file['name'];

                    if(!in_array(strtolower($extension), $allowed)){
                        $response['title']='Invalid!';
                        $response['stat']='error';
                        $response['msg']='Image is invalid. Please select a valid photo!';
                        die(json_encode($response));
                    }

                    if(move_uploaded_file($file['tmp_name'],$file_path)){
                        $response['title']='Success!';
                        $response['stat']='success';
                        $response['msg']='Image successfully uploaded.';
                        $response['path']=$file_path;
                        echo json_encode($response);
                    }
                }
                break;
        }
    }
}
