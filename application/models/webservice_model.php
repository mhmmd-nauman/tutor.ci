<?php 
class Webservice_model extends CI_Model{

	public function getdata()
	{
		
		$this->db->select('post_title, guide');
		$this->db->from('wp_posts')->where('post_author =', '1')->where('post_status =', 'publish');
		$query=$this->db->get();
		$posts = array();
		 if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $posts[] = $row;
                }
        }
        $query->free_result();
        return $posts;
	
	}
}