<?php

class Receivable_payment_model extends CORE_Model
{
    protected $table = "receivable_payments";
    protected $pk_id = "payment_id";

    function __construct()
    {
        parent::__construct();
    }


}



?>