<?php

class Sales_order_model extends CORE_Model
{
    protected $table = "sales_order";
    protected $pk_id = "sales_order_id";

    function __construct()
    {
        parent::__construct();
    }
}


?>