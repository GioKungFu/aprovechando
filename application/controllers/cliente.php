<?php

class Cliente extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('clientes');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	public function ingresar() 
	{

		if ($this -> input -> post('cliente') != "" && $this -> input -> post('pass') != "") 
		{
			
			$flag = $this->cliente_model->validarCliente(trim($this -> input -> post('cliente')), trim($this -> input -> post('pass')));
			
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


	function agregar()
	{

		$response = $this->clientes->agregar($this->input->post('usr'),$this->input->post('perfil'));
		
		$cookie=$this->session->set_userdata('id_cliente',$response);
					

	    $usr = $this->clientes->obtenerDatosCliente($response);

		$this->load->model('myemail');
		
		$this->myemail->mailRegistro($usr);
		$this->myemail->mailRegistroUsuario($usr);

		redirect('/main/carrito');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function eliminar()
	{

		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($servicio = $this -> clientes->obtenerDatosCliente($this->input->post('id')) )
				{
					
					
					if( $this -> clientes->eliminarCliente($this->input->post('id')) )
					{
						
						
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Cliente eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el cliente, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El cliente no se encuentra en la base de datos. No es posible eliminar.");
				}
			}
			else
			{
		
				$respuesta = array (
				  'eliminado'=>false,
				  'estado'=>'error',
				  'mensaje'=>"No tiene permisos para esta acción");
			}

		}
		else
		{
	
			$respuesta = array (
			  'eliminado'=>false,
			  'estado'=>'error',
			  'mensaje'=>"No tiene permisos para esta acción");
		}
		echo json_encode($respuesta);
		
	}
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	function validarNombreCliente()
	{
	
		if($this->input->post('email'))
		{
			$flag = $this->clientes->validarNombreCliente($this->input->post('email'));
			
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
			
			$flag = $this->clientes->validarCliente(trim($this -> input -> post('usuario')), trim($this -> input -> post('pass')));
			
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

		if($this->session->userdata('id_cliente')) 
		{
			
			$data['usr'] = $this-> clientes ->obtenerDatosCliente($this->session->userdata('id_cliente'));



			$this->load->view('site/panel_cliente', $data);

		}
		else{
			
			 redirect('/main/registro');
		}
		
	}	
		
	
/////////////////////////////////////////////////////////////////////////////////////////////////

	function salir()
	{
		
		$this -> session -> sess_destroy();
		redirect('main/index');
	}

	
/////////////////////////////////////////////////////////////////////////////////////////////////


	
	function lista()
	{
			
		if($this->session->userdata('id_usuario')) 
		{

			$data['clientes'] = $this -> clientes ->listarClientes();
			$this->load->view('panel/lista_clientes', $data);
		}
		else{
			
			 redirect('panel');
		}

	}	
		
	
/////////////////////////////////////////////////////////////////////////////////////////////////


	function cambiarEstado()
	{
		if( $this->session->userdata('id_usuario') ) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($cliente = $this->clientes->obtenerDatosCliente($this->input->post('id')) )
				{
					
					$estado['pagado'] = $this->input->post('pagado'); 
					if( $this->clientes->cambiarEstado( $this->input->post('id'), $estado ) )
					{
						
						
						$respuesta = array (
						  'editado'=>true,
						  'estado'=>'Success',
						  'mensaje'=>'El estado del cliente ha sido modificado');
					
					}
					else
					{

						$respuesta = array (
						  'editado'=>false,
						  'estado'=>'Error',
						  'mensaje'=>"Ups, hubo un error al eliminar el cliente, por favor contáctese con soporte.");
					} 
					
				}
				else
				{
					$respuesta = array (
					  'editado'=>false,
					  'estado'=>'Error',
					  'mensaje'=>"El cliente no se encuentra en la base de datos. No es posible eliminar.");
				}
			}
			else
			{
		
				$respuesta = array (
				  'editado'=>false,
				  'estado'=>'Error',
				  'mensaje'=>"No tiene permisos para esta acción");
			}

		}
		else
		{
	
			$respuesta = array (
			  'editado'=>false,
			  'estado'=>'Error',
			  'mensaje'=>"No tiene permisos para esta acción");
		}
		echo json_encode($respuesta);
		
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////

	function comprobarSesion()
	{
		
		if( $this->session->userdata('id_cliente') ) 
		{
			exit('1');
		}
		else
		{
			exit('0');
		}
	}

	
/////////////////////////////////////////////////////////////////////////////////////////////////


}
