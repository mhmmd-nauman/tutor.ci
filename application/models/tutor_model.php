<?php
Class Tutor_model extends CI_Model
{
    function get_tutor_list() {
        $this->db->where('role_type',"Tutor");
        $this->db->from('pto_users');
        
	$this->db->order_by("first_name", "desc");
        $query = $this->db->get(); 
        
        return $query->result();
    }
    
    function update_tutor_record($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update('pto_users',$data);
    }
    function do_insert_tutor($data)
    {
        $this->db->insert("pto_users",$data);
    }
    function delete_tutor_record($id){
        $this->db->where('user_id', $id);
        $this->db->delete('pto_users');
    }
}
?>