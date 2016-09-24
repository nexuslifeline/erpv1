<?php

class Journal_account_model extends CORE_Model{

    protected  $table="journal_accounts"; //table name
    protected  $pk_id="journal_account_id"; //primary key id
    protected  $fk_id="journal_id"; //foreign key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }






}

?>