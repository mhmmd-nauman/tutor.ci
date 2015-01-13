<?php
Class Classes_model extends CI_Model
{
  	function class_show_record()
    {
      $query = $this->db->get('pto_class');
      return $query->result();

    }
	function update_class($id, $data)
	{
		$this->db->where('class_id', $id);
		$this->db->update('pto_class', $data);
		
	}
	function delete_class($id)
    {
          $this->db->where('class_id', $id);
          $this->db->delete('pto_class');
		 
    }
	function add_class($data)
	{
	     $this->db->insert('pto_class', $data);
	}
	function class_Type_show_record()
    {
		  $query = $this->db->get('pto_class_types');
		  return $query->result();

    }
	function class_level_show_record()
    {
		  $query = $this->db->get('pto_class_levels');
		  return $query->result();

    }
	function add_class_level( $data)
    {
        $query = null; //emptying in case 

        $id=$this->input->post('class_level_id');
        $query = $this->db->get_where('pto_class_levels', array('class_level_id' => $id));
        $count = $query->num_rows(); //counting result from query

        if ($count === 0) {
             $this->db->insert('pto_class_levels', $data);      
        }
		else
		{
			 $this->session->set_userdata(array(
								        
										'sess_delete_level_id' => "",
					                    'sess_delete_level'    => "",
										'sess_msges_type1'     => "dublicate",
										'sess_msges1'          => "You cannot enter dublicate class level id",
										
										 ));
		   return FALSE;	
		}
				     
			 
    }
    function get_class_level_id() {
        $data_class_level_id = array();
        $query = $this->db->get('pto_tutor_class_levels');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data_class_level_id[] = $row;
                }
        }
        $query->free_result();
        return $data_class_level_id;
    }
	function delete_class_level_id($id)
	{
		 //$tables = array('pto_class_levels');
	   	 $this->db->where('class_level_id', $id);
         $this->db->delete('pto_class_levels');
		 $this->db->where('class_level_id', $id);
         $this->db->delete('pto_tutor_class_levels');
	}
	function update_class_level($id, $data)
	{
		$this->db->where('class_level_id', $id);
		$this->db->update('pto_class_levels', $data);	
	}
	function get_class_type()
	{
		$data_class_type_id = array();
        $query = $this->db->get('pto_booking_orders');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data_class_type_id[] = $row;
                }
        }
        $query->free_result();
        return $data_class_type_id; 
	}
	function add_class_type( $data)
	{
	    $query = null; //emptying in case 

        $id=$this->input->post('class_type_id');
        $query = $this->db->get_where('pto_class_types', array('class_type_id' => $id));
        $count = $query->num_rows(); //counting result from query

        if ($count === 0) {
             $this->db->insert('pto_class_types', $data);      
        }
		else
		{
			 $this->session->set_userdata(array(
								        
										'sess_delete_level_idtype' => "",
					                    'sess_delete_leveltype'    => "",
										'sess_msges_type1type'     => "dublicate",
										'sess_msges1type'          => "You cannot enter dublicate class type id",
										
										 ));
		   return FALSE;	
		}	
	}
	function delete_class_type_id($id)
	{
		 //$tables = array('pto_class_levels');
	   	 $this->db->where('class_type_id', $id);
         $this->db->delete('pto_class_types');
		 $this->db->where('booking_order_id', $id);
         $this->db->delete('pto_booking_orders');
	}
	function update_class_type($id, $data)
	{
		$this->db->where('class_type_id', $id);
		$this->db->update('pto_class_types', $data);	
	}
}
?>