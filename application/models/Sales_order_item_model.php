<?php

class Sales_order_item_model extends CORE_Model
{
    protected $table = "sales_order_items";
    protected $pk_id = "sales_order_item_id";
    protected $fk_id = "sales_order_id";

    function __construct()
    {
        parent::__construct();
    }
}


?>