<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		//$this->load->helper('cookie');
		$this->load->model('productos');
		$this->load->model('galerias');
		$this->load->model('categorias');
		$this->load->model('imagenes');
		
	}
/////////////////////////////////////////////////////////////////////////////////////////////////

	function agregar()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

				$galeria['tipo']= 'productos';
				$id_galeria = $this -> galerias -> agregarGaleria($galeria);
				
				$producto['nombre'] = 'Nuevo producto';
				$producto['id_galeria'] = $id_galeria;
				$producto['fecha_creacion'] = date("Y-m-d");
				$id_producto = $this -> productos -> agregarProducto($producto);
				redirect('producto/editar/'.$id_producto);


		}
		else{
	
			 redirect('panel');
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar($id_producto)
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{
			
			$data[] = array();
			
			//$data['url'] = '/producto/editar/'.$id_producto;
			
			$data['id_usuario'] = $this->session->userdata('id_usuario');
			//$data['vendedor']= $this->vendedor_model->DatosVendedor($data['id_usuario']);
			
			if( $this->input->post('info') )
			{
				
				$data['producto'] = $this->input->post('info');
								
				$data['producto']['fecha_modificacion'] = date("Y-m-d");
				$id_producto = $this -> productos -> editarProducto($this->input->post('id_producto'), $data['producto'] );
				redirect('producto/lista');

			}
			else
			{
				$data['sistemas'] = $this-> productos ->listarEnum( 'sistema' ); 
				$data['camaras'] = $this-> productos ->listarEnum( 'camara' ); 
				$data['redes'] = $this-> productos ->listarEnum( 'red' ); 
				$data['estado'] = $this-> productos ->listarEnum( 'estado' ); 
				
				$data['producto'] = $this-> productos ->obtenerProducto( $id_producto ); 
				$data['categorias'] =  $this-> categorias ->listboxCategoria($data['producto']['id_categoria']);
				$data['imagenes'] = $this-> imagenes ->listarImagenes($data['producto']['id_galeria']);

			}
			
			$this->load->view('panel/editar_producto', $data);
		}
		else{
	
			 redirect('panel');
		}

	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar_imagen()
	{

		if($this->session->userdata('id_usuario')) 
		{
				
			$name = $this->input->post('name');
			//Subir imagen
			//Configuración de la libreria upload
			$config['upload_path'] = './uploads/productos/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
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
				
				$this->thumbs->crear_thumbs('./uploads/productos/',$img['file_name'],'t',70,70);
				$this->thumbs->crear_thumbs('./uploads/productos/',$img['file_name'],'s',280,280);
				$this->thumbs->crear_thumbs('./uploads/productos/',$img['file_name'],'m',480,480);
				$this->thumbs->crear_thumbs('./uploads/productos/',$img['file_name'],'b',600,600);
				$this->thumbs->crear_thumbs('./uploads/productos/',$img['file_name'],'g',800,800);

				$imagen['imagen'] = $img['file_name'];

				if( $this->input->post('id') == "" )
				{
					$imagen['posicion'] = $this->input->post('pos');
					$imagen['id_galeria'] = $this->input->post('id_galeria');
					$id_imagen = $this -> imagenes -> agregarImagen($imagen);

					$respuesta = array (
					  'upload'=>true,
					  'id_imagen'=>$id_imagen,
					  'estado'=>'success',
					  'imagen'=>$img['file_name'],				  
					  'mensaje'=>'Imágen guardada!');
				}
				else
				{
					$temp_imagen = $this -> imagenes -> obtenerImagen($this->input->post('id'));

					if( $this -> imagenes -> editarImagen( $this->input->post('id'), $imagen ) )
					{
						//eliminar imágen
						$absolute_path = FCPATH.'uploads/imagenes/';

						
						if( file_exists($absolute_path.$imagen['imagen']) )
							@unlink($absolute_path.$imagen['imagen']);
						if( file_exists($absolute_path.'t'.$imagen['imagen']) )
							@unlink($absolute_path.'t'.$imagen['imagen']);
						if( file_exists($absolute_path.'s'.$imagen['imagen']) )
							@unlink($absolute_path.'s'.$imagen['imagen']);
						if( file_exists($absolute_path.'m'.$imagen['imagen']) )
							@unlink($absolute_path.'m'.$imagen['imagen']);
						if( file_exists($absolute_path.'b'.$imagen['imagen']) )
							@unlink($absolute_path.'b'.$imagen['imagen']);
						if( file_exists($absolute_path.'g'.$imagen['imagen']) )
							@unlink($absolute_path.'g'.$imagen['imagen']);

						$respuesta = array (
						  'upload'=>true,
						  'id_imagen'=>$this->input->post('id'),
						  'estado'=>'success',
						  'imagen'=>$img['file_name'],				  
						  'mensaje'=>'Imágen actualizada!');
					}
					else
					{

						$respuesta = array (
						  'upload'=>false,
						  'id_imagen'=>$this->input->post('id'),
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

	function eliminar_imagen()
	{
		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($imagen = $this->imagenes->obtenerImagen($this->input->post('id')) )
				{
					
					
					if( $this->imagenes->eliminarImagen($this->input->post('id')) )
					{
						
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/productos/';
						
						if( file_exists($absolute_path.$imagen['imagen']) )
							@unlink($absolute_path.$imagen['imagen']);
						if( file_exists($absolute_path.'t'.$imagen['imagen']) )
							@unlink($absolute_path.'t'.$imagen['imagen']);
						if( file_exists($absolute_path.'s'.$imagen['imagen']) )
							@unlink($absolute_path.'s'.$imagen['imagen']);
						if( file_exists($absolute_path.'m'.$imagen['imagen']) )
							@unlink($absolute_path.'m'.$imagen['imagen']);
						if( file_exists($absolute_path.'b'.$imagen['imagen']) )
							@unlink($absolute_path.'b'.$imagen['imagen']);
						if( file_exists($absolute_path.'g'.$imagen['imagen']) )
							@unlink($absolute_path.'g'.$imagen['imagen']);
						
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

	function eliminar()
	{
		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($producto = $this->productos->obtenerProducto($this->input->post('id')) )
				{
					
					
					if( $this->productos->eliminarProducto($this->input->post('id')) )
					{
						

						$imagenes = $this->imagenes->listarImagenes($producto['id_galeria']);
						$this->galerias->eliminarGaleria($producto['id_galeria']);
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/productos/';
						
						foreach($imagenes as $imagen)
						{
							if( file_exists($absolute_path.$imagen['imagen']) )
								@unlink($absolute_path.$imagen['imagen']);
							if( file_exists($absolute_path.'t'.$imagen['imagen']) )
								@unlink($absolute_path.'t'.$imagen['imagen']);
							if( file_exists($absolute_path.'s'.$imagen['imagen']) )
								@unlink($absolute_path.'s'.$imagen['imagen']);
							if( file_exists($absolute_path.'m'.$imagen['imagen']) )
								@unlink($absolute_path.'m'.$imagen['imagen']);
							if( file_exists($absolute_path.'b'.$imagen['imagen']) )
								@unlink($absolute_path.'b'.$imagen['imagen']);
							if( file_exists($absolute_path.'g'.$imagen['imagen']) )
								@unlink($absolute_path.'g'.$imagen['imagen']);
						}

						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Producto eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el producto, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El producto no se encuentra en la base de datos. No es posible eliminar.");
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
			
			$data['productos'] = $this -> productos ->listarProductos();
			$data['tabla'] = '';
			

			
			$this->load->view('panel/lista_productos', $data);

		}
		else{
	
			redirect('panel');
		}
	
	}


////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * borrarCarrito
 *
 * borra un producto del carrito de compras
 * @access	public
 * @param	int ($id)
 * @return	boolean
 */

	

	function borrarProductoCarrito()
	{
		
		
		$this->load->model('carrito');
		$this -> carrito -> updateProducto( $this->input->post('id'), 0, 0 );
		 
		echo 1;
	
	}



////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * destruirCarrito
 *
 * borra un producto del carrito de compras
 * @access	public
 * @param	int ($id)
 * @return	boolean
 */

	

	function destruirCarrito()
	{
		
		
		$this->load->model('carrito');
		$this -> carrito -> destruirCarrito( );
		 
		
	
	}


////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * compra
 *
 * vista de confirmacion final de la compra
 * @access	public
 * @param	void
 * @return	view
 */

	

	function compra()
	{
		
		
		$this->load->library('session');
		
		$this->load->model('carrito');
		$this->load->model('productos');
		$this->load->model('imagenes');

        $data['giro']= false;
		$data['consignacion']= false;

		$data['carrito'] = $this ->carrito ->carro;
		$data['nf'] = $this ->carrito ->nf;

		$data['numProductos'] = $this->carrito->numProductos();


        $subtotal = 0;
        $total = 0;

        if($this->carrito->numProductos() ){ 

	  		for($p =0; $p<$this ->carrito ->nf; $p++)
	  		{ 
	  			if($this ->carrito ->carro['estado'][$p])
	  			{
		  			$subtotal = $this ->carrito ->carro['precio'][$p] * $this ->carrito ->carro['cantidad'][$p];	
		  			$total = $total + $subtotal;
		  		}
		  	}
		}
	  			

		if( $this->input->post('tipo_pago') == "pagosonline"){


			$orden= '3442342';
			$llave_encripcion = "1a56a736fbc"; //llave de encripción que se usa para generar la fima
			//$llave_encripcion = "1a56a736fbc"; //llave de encripción que se usa para generar la fima
			
			$usuarioId = "72345"; //código único del cliente
			$refVenta = time(); //referencia que debe ser única para cada transacción
			//$refVenta= $this->input->post('id_pedido');
			
			$iva=0; //impuestos calculados de la transacción
			$baseDevolucionIva=0; //el precio sin iva de los productos que tienen iva
			
			
			$valor= $total; //el valor total
			//$valor= $this->input->post('valor');
			
			$moneda ="COP"; //la moneda con la que se realiza la compra
			$prueba = "1"; //variable para poder utilizar tarjetas de crédito de prueba
			//$descripcion= $this->input->post('descripcion');
			//$descripcion = '[EQUIGRAS X 5 KLS x 1] [ALFOMBRA NAVAJO CON ESTRIBOS x 1] [EQUIGRAS X 5 KLS x 1] ';
			
			//$descripcion = '[RIENDA ALGODON TRENZADA x 1] [APERO NYLON CUERO x 1]';
			//$emailComprador=  $this->input->post('email_comprador');
			//$emailComprador=  'luiceron@hotmail.com';
			$emailComprador=  'giovannybustamante3@gmail.com';
						
			$url_respuesta = "";
			//$emailComprador="luiceron@hotmail.com"; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador
			$firma_cadena = "$llave_encripcion~$usuarioId~$refVenta~$valor~$moneda"; //concatenación para realizar la firma
			$firma = md5($firma_cadena); //creación de la firma con la cadena previamente hecha
			
			
			//https://gateway2.pagosonline.net/apps/gateway/index.html
			$data['form']= '
			<form method="post" action="https://gateway2.pagosonline.net/apps/gateway/index.html" target="_self" id="form_pago">
			<input name="usuarioId" type="hidden" value="'.$usuarioId.'">
			<input name="descripcion" type="hidden" value="" >
			<input name="extra1" type="hidden" value="" >
			<input name="refVenta" type="hidden" value="'.$refVenta.'">
			<input name="valor" type="hidden" value="'.$valor.'">
			<input name="iva" type="hidden" value="'.$iva.'">
			<input name="baseDevolucionIva" type="hidden" value="'.$baseDevolucionIva.'" >
			<input name="firma" type="hidden" value="'.$firma.'">
			<input name="emailComprador" type="hidden" value="'.$emailComprador.'">
			</form>';


		}

		else if ( $this->input->post('tipo_pago') == "giro") 
		{
			$data['giro']= true;
		}

		else if ( $this->input->post('tipo_pago') == "consignacion" ) 
		{
			$data['consignacion']= true;
		}

		$this->load->view('site/compra', $data);
		
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////
	

}
