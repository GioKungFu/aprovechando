<?php
/**
  * Controlador para las vistas basicas del sitio
  *
 * @package		CodeIgniter
 * @author		Ceron 
 * @copyright	Copyright (c) 2015, MundoComputo
 * @link		http://mundocomputo.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

class Main extends CI_Controller {

	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * index
 *
 * Muestra la vista principal del sitio
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function index() 
	{

		$this->load->model('slides');
		$this->load->model('productos');
		$this->load->model('categorias');
		
		$data['slides'] = $this -> slides ->listarSlides();
		$data['destacados'] = $this -> productos ->listarProductosDestacados();
        $data['categorias'] = $this -> categorias ->listarCategoriasPorPadre(0);

		$this->load->view('site/index', $data);

	}


/////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * contenido
 *
 * Muestra la vista de area de contenidos
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function contenido($id) 
	{
	
		$this->load->model('contenidos');
		$data[] = array();
		
		$data['contenido'] = $this-> contenidos ->obtenerContenido( $id ); 

		$this->load->view('site/contenido', $data);
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * productos
 *
 * Muestra la vista de la lista de produntos
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function productos() 
	{
		
		$this->load->model('productos');
		$this->load->model('imagenes');


	    $data['masvistos'] = $this-> productos ->listarProductosMasVistos(4);
		$data['destacados'] = $this -> productos ->listarProductosActivos();
		
		$this->load->view('site/productos', $data);
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * producto
 *
 * Muestra la vista de un producto en particular
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function producto($id_producto) 
	{
		
		$this->load->model('productos');
		$this->load->model('imagenes');

		$data['producto'] = $this-> productos ->obtenerProducto( $id_producto );

		$producto['visitas'] = $data['producto']['visitas'] + 1;

		$this-> productos -> editarProducto($data['producto']['id_producto'], $producto);

	    $data['imagenes'] = $this-> imagenes ->listarImagenes($data['producto']['id_galeria']);

	    $data['masvistos'] = $this-> productos ->listarProductosMasVistos(4);
		
		$this->load->view('site/producto', $data);
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * contacto
 *
 * Muestra la vista de contacto
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function contactenos() 
	{
		
		$this->load->view('site/contactenos');
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * registro
 *
 * Muestra la vista de area de registro de usuarios del sitio
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function registro() 
	{
		
		$this->load->view('site/registro');
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * carrito
 *
 * Muestra la vista del listado de productos agregados al carrito
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function carrito() 
	{
		$this->load->library('session');
		
		$this->load->model('carrito');
		$this->load->model('productos');
		$this->load->model('imagenes');


		if($this->input->post('id_producto') != false){
			

			$info =  $this-> productos ->obtenerProducto( $this->input->post('id_producto') );
			
			
			$imagen = $info['imagen'];

			$precio = ($info['precio_oferta'] != 0)?$info['precio_oferta']:$info['precio'] ;
			
			$referencia =  $info['referencia'];
						
			$identificador= $this->input->post('id_producto');
			
			$cantidad = 1;//(int)$datos['cantidad'];

			$this -> carrito -> addProducto($info['nombre'], $this->input->post('id_producto') , $precio, $cantidad, $imagen,$referencia,'');
			
		}	

			$data['carrito'] = $this ->carrito ->carro;
			$data['nf'] = $this ->carrito ->nf;

			$data['numProductos'] = $this->carrito->numProductos();

		$this->load->view('site/carrito', $data);
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * obtenerDepartamento
 *
 * recibe el id de un pais y retorna una cadena con un select de los departamentos que pertenecen al pais
 * 
 * @access	public
 * @param	int ($idPais)
 * @return	string (retorna una cadena con un select de departamentos)
 */

	
	function obtenerDepartamentos()
	{
		$this->load->model('ubicaciones');

		$pais = $this->input->post('idPais');
		$cadena = '';
   		if($pais == '52')
		{
			$departamentos = $this -> ubicaciones -> obtenerDepartamentos();
			foreach($departamentos as $d)
			{
				$cadena .= '<option value="'.$d['id_departamento'].'">'.$d['nombre'].'</option>';
			}
		}else
		{
			$cadena .='<select name="departamento" id="departamento">';
			$cadena .= '<option value="999">-No aplica-</option>';
			$cadena .='</select>';
		}
		echo $cadena;
	}

////////////////////////////////////////////////////////////////////////////////////////

/**
 * obtenerMunicipio
 *
 * recibe el id de un depto y retorna una cadena con las opciones de un select de los municipios que pertenecen al depto
 * 
 * @access	public
 * @param	int ($idDepartamento)
 * @return	string (retorna una cadena con un select de municipios)
 */
	
	function obtenerMunicipios()
	{
		$this->load->model('ubicaciones');

		$idDepartamento = $this->input->post('idDepartamento');
		$cadena = '';
		$municipios = $this -> ubicaciones -> obtenerMunicipios($idDepartamento);
		$cadena .='<option value="0" selected="selected">-Seleccione uno-</option>';
		foreach($municipios as $m)
		{
			$cadena .= '<option value="'.$m['id_departamento'].'">'.$m['nombre'].'</option>';
		}
		echo $cadena;
	}

////////////////////////////////////////////////////////////////////////////////////////

	

}
