<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('servicios');
		
	}
/////////////////////////////////////////////////////////////////////////////////////////////////

	function agregar()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

			$data['url'] = '/servicio/agregar/';

		
			if( $this->input->post('info') )
			{
				
				$data['servicio'] = $this->input->post('info');
				
				//Subir imagen
				//Configuración de la libreria upload
				$config['upload_path'] = './uploads/servicios/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000000';
				$config['max_width']  = '3970';
				$config['max_height']  = '2234';
				$config['encrypt_name']  = 'TRUE';
				
		
				$this->load->library('upload', $config);
				
				$this->load->library('thumbs', $config);
		
				if ( ! $this->upload->do_upload('userfile') )
				{
					
					$error = array('error' => $this->upload->display_errors());
					//pendiente validar error
				}
				else
				{
	
					$res = $this->upload->data();
					$data['servicio']['imagen'] = $res['file_name'];
					$this->thumbs->crear_thumbs('./uploads/servicios/',$res['file_name'],'s',170,170);
					$this->thumbs->crear_thumbs('./uploads/servicios/',$res['file_name'],'m',285,285);
				}
				
				//$data['servicio']['fecha_registro'] = date("Y-m-d");
				$id_servicio = $this -> servicios -> crearServicio($data['servicio']);
				redirect('servicio/lista');

			}
			
			$this->load->view('panel/agregar_servicio', $data);
		}
		else{
	
			 redirect('panel');
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar($id_servicio)
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{
			
			$data[] = array();
			
			$data['url'] = '/servicio/editar/'.$id_servicio;
			
			$data['id_usuario'] = $this->session->userdata('id_usuario');
			//$data['vendedor']= $this->vendedor_model->DatosVendedor($data['id_usuario']);
			
			if( $this->input->post('info') )
			{
				
				$data['servicio'] = $this->input->post('info');
				//$data['servicio']['id_usuario'] = $this->session->userdata('id_usuario');
				
				
				//Subir imagen
				//Configuración de la libreria upload
				$config['upload_path'] = './uploads/servicios/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000000';
				$config['max_width']  = '3970';
				$config['max_height']  = '2234';
				$config['encrypt_name']  = 'TRUE';
				
		
				$this->load->library('upload', $config);
				
		
				if ( ! $this->upload->do_upload('userfile') )
				{
					
					$error = array('error' => $this->upload->display_errors());
					//pendiente validar error
				}
				else
				{
					
					$servicio = $this-> servicios ->obtenerServicio( $this->input->post('id_servicio') );					
					//eliminar imágen
					$absolute_path = FCPATH.'uploads/servicios/';
					
					if( file_exists($absolute_path.$servicio['imagen']) )
						@unlink($absolute_path.$servicio['imagen']);
					if( file_exists($absolute_path.'s'.$servicio['imagen']) )
						@unlink($absolute_path.'s'.$servicio['imagen']);
					if( file_exists($absolute_path.'m'.$servicio['imagen']) )
						@unlink($absolute_path.'m'.$servicio['imagen']);
					if( file_exists($absolute_path.'b'.$servicio['imagen']) )
						@unlink($absolute_path.'b'.$servicio['imagen']);

					$this->load->library('thumbs', $config);
	
					$img = $this->upload->data();
					$data['servicio']['imagen'] = $img['file_name'];
					$this->thumbs->crear_thumbs('./uploads/servicios/',$img['file_name'],'s',170,170);
//					$this->thumbs->crear_thumbs_ci($img['full_path'],$img['file_name'],'m',285,285);
					$this->thumbs->crear_thumbs('./uploads/servicios/',$img['file_name'],'m',285,285);
				}
				
				
				//$data['servicio']['fecha_registro'] = date("Y-m-d");
				$id_servicio = $this -> servicios -> editarServicio($this->input->post('id_servicio'), $data['servicio'] );
				redirect('servicio/lista');

			}
			else
			{
				
				$data['servicio'] = $this->servicios->obtenerServicio( $id_servicio ); 

			}
			
			$this->load->view('panel/editar_servicio', $data);
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
		    	
				if($servicio = $this->servicios->obtenerServicio($this->input->post('id')) )
				{
					
					
					if( $this->servicios->eliminarServicio($this->input->post('id')) )
					{
						
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/servicios/';
						
						if( file_exists($absolute_path.$servicio['imagen']) )
							@unlink($absolute_path.$servicio['imagen']);
						if( file_exists($absolute_path.'s'.$servicio['imagen']) )
							@unlink($absolute_path.'s'.$servicio['imagen']);
						if( file_exists($absolute_path.'m'.$servicio['imagen']) )
							@unlink($absolute_path.'m'.$servicio['imagen']);
						
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Servicio eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el servicio, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El servicio no se encuentra en la base de datos. No es posible eliminar.");
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

	function lista()
	{
		
		if($this->session->userdata('id_usuario')) 
		{
			
			$data['servicios'] = $this -> servicios ->listarServicios();
			$data['tabla'] = '';
			

			
			$this->load->view('panel/lista_servicios', $data);

		}
		else{
	
			redirect('panel');
		}
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
	

}
