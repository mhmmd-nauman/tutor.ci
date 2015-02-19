<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservice_con extends CI_Controller {
    public function __construct()
	{
            parent::__construct();
            $this->load->model('Webservice_model');
	}
	public function index()
	{
			$post= $this->Webservice_model->getdata();
			$this->load->view('webservice_view', array('post'=>$post));
	}
}
