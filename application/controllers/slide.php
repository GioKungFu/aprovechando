<?php

class Slide extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('slides');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function lista()
	{
		
		if($this->session->userdata('id_usuario')) 
		{
			
			$data['slides'] = $this -> slides ->listarSlides();
			$this->load->view('panel/lista_slides', $data);
		}
		else
		{
	
			redirect('panel');
		}
		
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar()
	{

		if($this->session->userdata('id_usuario')) 
		{
				
			$name = $this->input->post('name');
			//Subir imagen
			//Configuración de la libreria upload
			$config['upload_path'] = './uploads/slides/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '3000000';
			$config['max_width']  = '2048';
			$config['max_height']  = '1536';
			$config['encrypt_name']  = 'TRUE';
	
			$this->load->library('upload', $config);
			
			$this->load->library('thumbs', $config);
	
				
			if ( ! $this->upload->do_upload($name) )
			{
				
				$error = array('error' => $this->upload->display_errors());

				if( $this->input->post('id') == "" )
				{
					$respuesta = array (
					  'upload'=>false,
					  'estado'=>'error',
					  'imagen'=>'',				  
					  'mensaje'=>$error['error']);
				}
				else
				{
					$respuesta = array (
					  'upload'=>false,
					  'estado'=>'nothing',
					  'imagen'=>'',				  
					  'mensaje'=>$error['error']);
				}
			}
			else
			{
				
				$img = $this->upload->data();
				
				$this->thumbs->crear_thumbs('./uploads/slides/',$img['file_name'],'s',350,135);
				$this->thumbs->crear_thumbs('./uploads/slides/',$img['file_name'],'b',880,340);

				$slide['imagen'] = $img['file_name'];

				if( $this->input->post('id') == "" )
				{
					$slide['posicion'] = $this->input->post('pos');
					$id_slide = $this -> slides -> agregarSlide($slide);

					$respuesta = array (
					  'upload'=>true,
					  'id_slide'=>$id_slide,
					  'estado'=>'success',
					  'imagen'=>$img['file_name'],				  
					  'mensaje'=>'Imágen guardada!');
				}
				else
				{
					$temp_slide = $this -> slides -> obtenerSlide($this->input->post('id'));

					if( $this -> slides -> editarSlide( $this->input->post('id'), $slide ) )
					{
						//eliminar imágen
						$absolute_path = FCPATH.'uploads/slides/';
						
						if( file_exists($absolute_path.$temp_slide['imagen']) )
							@unlink($absolute_path.$temp_slide['imagen']);
						if( file_exists($absolute_path.'s'.$temp_slide['imagen']) )
							@unlink($absolute_path.'s'.$temp_slide['imagen']);
						if( file_exists($absolute_path.'b'.$temp_slide['imagen']) )
							@unlink($absolute_path.'b'.$temp_slide['imagen']);

						$respuesta = array (
						  'upload'=>true,
						  'id_slide'=>$this->input->post('id'),
						  'estado'=>'success',
						  'imagen'=>$img['file_name'],				  
						  'mensaje'=>'Imágen actualizada!');
					}
					else
					{

						$respuesta = array (
						  'upload'=>false,
						  'id_slide'=>$this->input->post('id'),
						  'estado'=>'nothing',
						  'imagen'=>$img['file_name'],				  
						  'mensaje'=>'Ups! No es posible editar la imagen. Por favor intente de nuevo');
					}
				}

			}

		}
		else
		{
	
			$respuesta = array (
			  'upload'=>false,
			  'estado'=>'error',
			  'imagen'=>'',				  
			  'mensaje'=>'No tiene permisos para esta acción.');
		}
	
		echo json_encode($respuesta);

	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function eliminar()
	{
		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($slide = $this->slides->obtenerSlide($this->input->post('id')) )
				{
					
					
					if( $this->slides->eliminarSlide($this->input->post('id')) )
					{
						
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/slides/';
						
						if( file_exists($absolute_path.$slide['imagen']) )
							@unlink($absolute_path.$slide['imagen']);
						if( file_exists($absolute_path.'s'.$slide['imagen']) )
							@unlink($absolute_path.'s'.$slide['imagen']);
						if( file_exists($absolute_path.'b'.$slide['imagen']) )
							@unlink($absolute_path.'b'.$slide['imagen']);
						
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Imágen eliminada');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups! hubo un error al eliminar la imágen, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"La imágen no se encuentra en la base de datos. No es posible eliminar.");
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
