<?php

class Tax_model extends CORE_Model {
    protected  $table="tax_types";
    protected  $pk_id="tax_type_id";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    function get_tax_list($brand_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  tax_types as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($tax_type_id==null?"":" AND a.tax_type_id=$tax_type_id")."
            ";
        return $this->db->query($sql)->result();
    }
}
?>