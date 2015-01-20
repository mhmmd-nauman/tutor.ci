<?php
Class Gardian_model extends CI_Model
{
    function get_gardian_list() {
        $this->db->where('role_type',"PARENT-GUARDIAN");
        $this->db->from('pto_users');
        
	$this->db->order_by("first_name", "desc");
        $query = $this->db->get(); 
        
        return $query->result();
    }
    function get_gardian_id() {
        $this->db->where('role_type',"PARENT-GUARDIAN");
        $this->db->from('pto_users');
        
	$this->db->order_by("first_name", "desc");
        $query = $this->db->get(); 
        
        return $query->result_array();
    }
    function update_guardian_record($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update('pto_users',$data);
    }
    function do_insert_parent($data)
    {
        $this->db->insert("pto_users",$data);
    }
    function delete_gardian_record($id){
        $this->db->where('user_id', $id);
        $this->db->delete('pto_users');
    }
}
?>