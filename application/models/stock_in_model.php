<?php

class stock_in_model extends CI_Model {
    private $table = 'stock_in';
    
    function create($stock_inRecord){
        $this->db->insert($this->table, $stock_inRecord);
    }
    
    function read($condition=null){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(isset($condition))
            $this->db->where($condition);
        
        $query = $this->db->get();
        
        if($query->num_rows()>0)
            return $query->result_array();
        else
            return false;
        
    }
    
    function update($newRecord){
        $this->db->replace($this->table,$newRecord);
    }
    
    function del($where_array){
        $this->db->delete($this->table,$where_array);
    }

    function count(){
    $this->db->select('*');
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->num_rows();
    }
}
?>