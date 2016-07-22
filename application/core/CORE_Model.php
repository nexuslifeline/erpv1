<?php

class CORE_model extends CI_Model
{
    protected  $table; //table name
    protected  $pk_id; //primary key id
    protected  $fk_id; //foreign key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function set($field,$value,$b=FALSE){ //FALSE will treat the $value as function to be executed on MySQL
        return $this->db->set($field,$value,$b);
    }

    function save(){
        return $this->db->insert($this->table, $this);
    }

    function modify($id){
        $this->db->where($this->pk_id,$id);
        return $this->db->update($this->table, $this);
    }







    function  begin(){
        $this->db->trans_start(); //start transaction
    }

    function  commit(){
        $this->db->trans_complete(); //commit transaction
    }

    function status(){
        return $this->db->trans_status();
    }

    function create($data){
        //array of data to be inserted
        return $this->db->insert($this->table,$data);
    }

    function update($id,$data){
        $this->db->where($this->pk_id,$id);
        return   $this->db->update($this->table,$data);
    }

    function delete($id){
        $this->db->where($this->pk_id,$id);
        return   $this->db->delete($this->table);
    }

    function last_insert_id(){
        return $this->db->insert_id();
    }

    function delete_via_fk($id){
        $this->db->where($this->fk_id,$id);
        return   $this->db->delete($this->table);
    }



    function get_list($where_filter=null,$select_list=null,$join_array=null,$order_by=null){

        $this->db->select(($select_list===null?$this->table.'.*':(is_array($select_list)?join(',',$select_list):$select_list)));
        $this->db->from($this->table);

        //left joins
        if($join_array!=null){
            foreach($join_array as $tbl_join){
                $this->db->join($tbl_join[0],$tbl_join[1],$tbl_join[2]);
            }
        }

        //filter
        if($where_filter!=null&&is_array($where_filter)){$this->db->where($where_filter); } //if the parameter is not null and provided as array then add where filter
        if($where_filter!=null&&!is_array($where_filter)){$this->db->where($this->pk_id,$where_filter); } //if the parameter is not null and provided as value then add where filter on primary key

        $this->db->order_by($order_by==null?$this->pk_id.' ASC':(is_array($order_by)?join(',',$order_by):$order_by));


        $query = $this->db->get();
        return $query->result();
    }







}




?>