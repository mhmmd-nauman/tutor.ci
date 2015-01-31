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
    
    function get_gardian($email) {
        $this->db->where('email',$email);
        $this->db->from('pto_users');
        
        $query = $this->db->get(); 
        
        return $query->result();
    }
    function get_gardian_id() {
        $this->db->where('role_type',"PARENT-GUARDIAN");
        $this->db->from('pto_users');
        
	$this->db->order_by("first_name", "desc");
        $result = $this->db->get(); 
        $return = array();
        if($result->num_rows() > 0) {
          foreach($result->result_array() as $row) {
            $return[$row['user_id']] = $row['first_name']."  ".$row['last_name'];
          }
        }
        
        return $return;
    }
    function update_guardian_record($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update('pto_users',$data);
    }
    function do_insert_parent($data)
    {
        $this->db->insert("pto_users",$data);
    }
    function delete_gardian_record($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update('pto_users',$data);
        //delete related student record
        //$this->db->where('parent_id', $id);
        //$this->db->delete('pto_students');
    }
    function update_password($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update('pto_users',$data);
    }
    
}
?>