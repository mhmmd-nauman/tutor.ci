<?php
Class tutor_model extends CI_Model
{
    
    
    function insert_tutor($data){
        $this->db->insert('pto_students', $data); 
        return $this->db->insert_id();
    }
    function get_tutor_list() {
        $this->db->select('*');
        $this->db->from('pto_students');
        //$this->db->where('status','1');
	$this->db->order_by("first_name", "desc");
        $query = $this->db->get(); 
        
        return $query->result();
    }
}
?>