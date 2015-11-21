<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('pedidos');
		
	}
/////////////////////////////////////////////////////////////////////////////////////////////////


	function lista()
	{
		
		if($this->session->userdata('id_usuario')) 
		{
			
			$data['pedidos'] = $this -> pedidos ->listarPedidos();
			$data['tabla'] = '';
			

			
			$this->load->view('panel/lista_pedidos', $data);

		}
		else{
	
			redirect('panel');
		}
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
	

}
