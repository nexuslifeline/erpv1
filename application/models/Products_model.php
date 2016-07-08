<?php

class Products_model extends CORE_Model {
    protected  $table="products";
    protected  $pk_id="product_id";

    function __construct() {
        parent::__construct();
    }

    function get_product_list($product_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  products as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($product_id==null?"":" AND a.product_id=$product_id")."
            ";
        return $this->db->query($sql)->result();
    }

    function getCategory()
    {
        $query = $this->db->query('SELECT category_name FROM categories');
        return $query->result();
    }

    function getDepartment()
    {
        $query = $this->db->query('SELECT department_name FROM departments');
        return $query->result();
    }

    function getUnit()
    {
        $query = $this->db->query('SELECT unit_name FROM units');
        return $query->result();
    }

    function getCode() {
        $query = $this->db->query('SELECT product_code FROM products');
        return $query->result();
    }
}
?>