<?php 
class Weekly_model extends CI_Model
{
	function add_weekly_calendar_data($start_time, $end_time, $title, $description)
	{
	  if($this->db->select('start_time')->from('weekly_calendar')
	  ->where('start_time', $start_time)->count_all_results())
	  {
		  $this->db->where('start_time', $start_time)
		   ->update('weekly_calendar', array(
		   'start_time'  => date("Y-m-d h:i:s",strtotime($start_time)),
		   'end_time'    => date("Y-m-d h:i:s",strtotime($end_time)),
		   'title'       => $title,
		   'description' => $description,
		  ));
		  
	  }
	  else
	  {
	  $this->db->insert('weekly_calendar', array(
	       'start_time'  => $start_time,
		   'end_time'    =>  $end_time,
		   'title'       => $title,
		   'description' => $description,
	  ));
	  	
	  }
	}
	
}
?>