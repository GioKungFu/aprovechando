<?php

class Panel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function index()
	{
		$this->load->view('panel/ingresar');
		
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function main()
	{

		if($this->session->userdata('id_usuario')) 
		{
			
			$this->load->view('panel/main');
		}
		else
		{
	
			 redirect('panel');
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////


	

}
