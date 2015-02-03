 <?php 

class Subdomain extends CI_Controller {
        function __construct() {
        parent::__construct();
        $this->load->library('xmlapi.php');
	   
	   // $objWebSiteServer = new WebSiteServer();
//		if(empty($_SESSION['SiteStatus']))$_SESSION['SiteStatus']="all";
//		if(isset($_REQUEST['ToDate']))$_SESSION['ToDate']=$_REQUEST['ToDate'];
//		if(isset($_REQUEST['FromDate']))$_SESSION['FromDate']=$_REQUEST['FromDate'];
//		if(isset($_REQUEST['SiteStatus']))$_SESSION['SiteStatus']=$_REQUEST['SiteStatus'];
//		if(isset($_REQUEST['SiteStatus1']))$_SESSION['SiteStatus1']=$_REQUEST['SiteStatus1'];
//		if(isset($_REQUEST['sortBy']))$_SESSION['sortBy']=$_REQUEST['sortBy'];
//		if(isset($_REQUEST['sortValue']))$_SESSION['sortValue']=$_REQUEST['sortValue'];
//		extract($_REQUEST);
    }
	
   public function index()
	{
	    $this->load->view('layout/admin_header_internal');
		$this->load->view('admin/subdomain_view');
		$this->load->view('layout/admin_footer');
			
	}
	public function add()
	{
	       	if($_REQUEST['Task']=='add'){
		
			$IP= $_REQUEST['IP'];
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			
			//$objWebSiteServer->InsertWebSiteServer(array(
//										"created"  =>date("Y-m-d h:i:s"),
//									    "ip"       =>$IP,
//										"username" =>$username,
//										"password" =>$password,
//										
//										
//									));
		header("Location:WebSiteServer.php?flag=add_server");
		exit;
		}
	}
	
}