<?php

class Journal_info_model extends CORE_Model{

    protected  $table="journal_info"; //table name
    protected  $pk_id="journal_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_account_balance($type_id){
        $sql="SELECT main.*,att.account_title FROM(SELECT ji.journal_id,
            at.account_no,at.grand_parent_id,ac.account_type_id,ac.account_class_id,
            IF(
                ac.account_type_id=1 OR ac.account_type_id=5,
                SUM(ja.dr_amount)-SUM(ja.cr_amount),
                SUM(ja.cr_amount)-SUM(ja.dr_amount)

            )as account_balance


            FROM journal_info as ji

            INNER JOIN (journal_accounts as ja INNER JOIN
            (account_titles as at
            INNER JOIN account_classes as ac ON at.account_class_id=ac.account_class_id)
            ON ja.account_id=at.account_id)
            ON ji.journal_id=ja.journal_id

            WHERE ji.is_active=TRUE AND ji.is_deleted=FALSE
            AND ac.account_type_id=$type_id

            GROUP BY at.grand_parent_id)as main LEFT JOIN account_titles as att ON main.grand_parent_id=att.account_id";
            return $this->db->query($sql)->result();

    }




}

?>