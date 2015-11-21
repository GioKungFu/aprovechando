<?php

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('usuarios');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
//Solo para el usuario administrador
/////////////////////////////////////////////////////////////////////////////////////////////////

	public function ingresar() 
	{

		if ($this -> input -> post('usuario') != "" && $this -> input -> post('pass') != "") 
		{
			
			$flag = $this->usuarios->validarUsuario(trim($this -> input -> post('usuario')), trim($this -> input -> post('pass')));
			
			if($flag != false )
			{
				$this->session->set_userdata($flag);
				
				die('success');
			}
			else	
				die('failed');
			

		} else 
		{
			die('failed');
		}
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////


	function agregar()
	{

			$response = $this->usuarios->agregar($this->input->post('usr'),$this->input->post('perfil'));
			
			$cookie=$this->session->set_userdata('id_usuario',$response);
			
			print_r($response);		
			
			//redirect('usuario/panel');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function validarNombreUsuario()
	{
	
		if($this->input->post('email'))
		{
			$flag = $this->usuarios->validarNombreUsuario($this->input->post('email'));
			
			if($flag)
				echo 'false';
			else	
				echo 'true';
		}

	}
		

/////////////////////////////////////////////////////////////////////////////////////////////////


	public function login() 
	{

		if ($this -> input -> post('usuario') != "" && $this -> input -> post('pass') != "") 
		{
			
			$flag = $this->usuarios->validarUsuario(trim($this -> input -> post('usuario')), trim($this -> input -> post('pass')));
			
			if($flag != false )
			{
			    
			    $this->session->set_userdata($flag);
				die('success');
			}
			else	
			{
				
				die('failed');
			}
			

		} else 
		{
			die('failed');
		}
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	
	function panel()
	{

		if($this->session->userdata('id_usuario')) {
			
			
			$this->load->view('site/panel_usuario');
		}
		else{
			
			 redirect('main/registro');
		}
	}	
		
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	function salir()
	{
		
		$this -> session -> sess_destroy();
		redirect('core/main');
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	

}
