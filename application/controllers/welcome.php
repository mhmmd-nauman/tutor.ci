<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('layout/admin_header_internal');
                //$this->load->view('front_view/home_page');
                //$this->load->view('layout/admin_footer');
                $this->load->dbutil();

                $query = $this->db->query("SELECT * FROM pto_users");
                $prefs = array(
                'tables'      => array('pto_users'),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'xlsx',             // gzip, zip, txt
                'filename'    => 'mybackup.xlsx',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

                $this->dbutil->backup($prefs); 
                /*$config = array (
                                  'root'    => 'c://',
                                  'element' => 'element',
                                  'newline' => "\n",
                                  'tab'    => "\t"
                                );

                echo $this->dbutil->xml_from_result($query, $config); */ 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */