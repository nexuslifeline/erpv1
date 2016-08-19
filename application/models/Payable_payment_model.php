<?php

class Payable_payment_model extends CORE_Model
{
    protected $table = "payable_payments";
    protected $pk_id = "payment_id";

    function __construct()
    {
        parent::__construct();
    }


}



?>