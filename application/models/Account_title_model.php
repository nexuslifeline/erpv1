<?php

class Account_title_model extends CORE_Model{

    protected  $table="account_titles"; //table name
    protected  $pk_id="account_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function create_default_account_title(){
        //return;
        $sql="INSERT IGNORE INTO account_titles
                  (account_id,account_no,account_title,account_class_id,parent_account_id,grand_parent_id)
              VALUES
                  (1,'101','Cash',1,0,1),
                  (2,'120','Account Receivable',1,0,2),
                  (3,'140','Inventory',1,0,3),
                  (10,'150','Input Tax',1,0,10),

                  (4,'210','Accounts Payable',3,0,4),
                  (11,'220','Output Tax',3,0,4),

                  (5,'300','Capital',5,0,5),

                  (6,'400','Sales Income',7,0,6),
                  (7,'410','Service Income',7,0,7),


                  (8,'500','Salaries Expense',6,0,8),
                  (9,'510','Supplies Expense',6,0,9),
                  (12,'510','Miscellaneous Expense',6,0,12)
        ";
        $this->db->query($sql);
    }




}




?>