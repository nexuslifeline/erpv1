<?php

class Account_class_model extends CORE_Model{

    protected  $table="account_classes"; //table name
    protected  $pk_id="account_class_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function create_default_account_classes(){
        //return;
        $sql="INSERT IGNORE INTO account_classes
                  (account_class_id,account_class,account_type_id,description)
              VALUES
                  (1,'Current Assets',1,''),
                  (2,'Non-Current Assets',1,''),
                  (3,'Current Liabilities',2,''),
                  (4,'Long-term Liabilities',2,''),
                  (5,'Owners Equity',3,''),
                  (6,'Operating Expense',5,''),
                  (6,'Non-Operating Expense',5,''),
                  (7,'Income',4,'')
        ";
        $this->db->query($sql);
    }




}




?>