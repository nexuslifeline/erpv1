<?php

class Purchases_model extends CORE_Model {
    protected  $table="generics";
    protected  $pk_id="generic_id";

    function __construct() {
        parent::__construct();
    }



    function get_po_list(){
        $sql="SELECT po.*,su.supplier_name FROM purchase_order as po LEFT JOIN suppliers as su ON po.supplier_id=su.supplier_id";
        return $this->db->query($sql)->result();
    }



}
?>