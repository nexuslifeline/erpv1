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



    function get_list($where_array=null){
        $this->db->select('*');
        $this->db->from($this->table);
        if($where_array!=null){$this->db->where($where_array); }
        $query = $this->db->get();
        return $query->result();
    }





}




?>