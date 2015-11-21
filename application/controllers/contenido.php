<?php

class Contenido extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('contenidos');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function lista()
	{
		if( $this->session->userdata('id_usuario') ) 
		{
		
			$data['contenidos'] = $this->contenidos->listarContenidos();
			$this->load->view('panel/lista_contenidos', $data);

		}
		else
		{
	
			 redirect('panel');
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/*
  Muesta la vista del contenido
*/
/////////////////////////////////////////////////////////////////////////////////////////////////
	function agregar_contenido()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

			if( $this->input->post('info') )
			{
				
				$data['contenido'] = $this->input->post('info');
				
				$id_contenido = $this -> contenidos -> agregarContenido($data['contenido']);
				redirect('contenido/lista');

			}
			
			$this->load->view('panel/agregar_contenido');
		}
		else
		{
	
			 redirect('panel');
		}

	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/*
  Agrega el contenido
*/
/////////////////////////////////////////////////////////////////////////////////////////////////

	function agregar()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

			if( $this->input->post('info') )
			{
				
				$data['contenido'] = $this->input->post('info');
				
				$id_contenido = $this -> contenidos -> agregarContenido($data['contenido']);
				redirect('contenido/lista');

			}
			
			$this->load->view('panel/agregar_contenido');
		}
		else
		{
	
			 redirect('panel');
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar($id)
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{
			
			$data[] = array();
			
			
			if( $this->input->post('info') )
			{
				
				$data['contenido'] = $this->input->post('info');
				
				$id_contenido = $this -> contenidos -> editarContenido($this->input->post('id_contenido'), $data['contenido'] );
				redirect('contenido/lista');

			}
			else
			{
				
				$data['contenido'] = $this-> contenidos ->obtenerContenido( $id ); 

			}
			
			$this->load->view('panel/editar_contenido', $data);
		}
		else{
	
			 redirect('panel');
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function eliminar()
	{
		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($contenido = $this-> contenidos ->obtenerContenido($this->input->post('id')) )
				{
					
					
					if( $this-> contenidos-> eliminarContenido($this->input->post('id')) )
					{
												
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Contenido eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el contenido, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El contenido no se encuentra en la base de datos. No es posible eliminar.");
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


	

}
