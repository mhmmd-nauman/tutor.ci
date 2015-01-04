<?php
Class student_model extends CI_Model
{
    
    
    function insert_student($data){
        $this->db->insert('pto_students', $data); 
        return $this->db->insert_id();
    }
    function get_student_list() {
        $this->db->select('*');
        $this->db->from('pto_students');
        //$this->db->where('status','1');
	$this->db->order_by("first_name", "desc");
        $query = $this->db->get(); 
        
        return $query->result();
    }
    
    function view_student_record()
    {
        $query = $this -> db -> get('pto_students');
        return $query->result();
    }
    function add_student_record($data)
    {
        $query=  $this->db->insert("pto_students",$data);
    }
    function delete_student_record($id){
        $this->db->where('student_id', $id);
        $this->db->delete('pto_students');
    }
    function update_student_record($id,$data){
        $this->db->where('student_id', $id);
        $this->db->update('pto_students',$data);
    }
    
}
?>