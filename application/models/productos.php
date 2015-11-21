<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function agregarProducto($data)
	{
		
		$response = $this -> db -> insert('productos',$data);
		
		//----------------------------------------------------
		$id_producto = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$response){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_producto;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarProducto($id_producto, $datos)
	{

		$this->db->where('id_producto',$id_producto);
		return $this->db->update('productos', $datos);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerProducto($id_producto)
	{

		$this->db->select('p.*, c.nombre as categoria, i.imagen');
		$this->db->from('productos p');
		$this->db->join('categorias c','p.id_categoria = c.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->where('p.id_producto',$id_producto);
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			return $result->row_array();
		}
		else
		{
			return false;
		}

	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarProducto($id_producto)
	{

		$this->db->where('id_producto',$id_producto);
		return $this->db->delete('productos');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarProductos()
	{

		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->order_by("p.id_producto", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}




////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosActivos()
	{

		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->where('p.estado   !=','Inactivo');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->order_by("p.id_producto", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}



////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosDestacados()
	{

		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->where('p.estado','Destacado');
		$this->db->or_where('p.estado','Nuevo y Destacado');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->order_by("p.id_producto", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	 }



////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosMasVistos($limit)
	{

		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->order_by("p.visitas", "desc");			
		$this->db->limit($limit);
		$result = $this->db->get();
		return $result -> result_array();
	 }


////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosImagenes()
	{
		$this->db->select('imagen');
		$this->db->from('imagenes');
		$this->db->where('id_galeria');

		$subquery = $this->db->_compile_select();

		$this->db->select('p.*, c.nombre as categoria');
		$this->db->from('productos p');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria ', 'left');
		$this->db->order_by("p.id_producto", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

////////////////////////////////////////////////////////////////////////////////////////



	function listarEnum( $column_name )
	{

/*
		$query = mysql_query("SHOW COLUMNS FROM productos LIKE 'sistema'");

		// Creamos un Array con el resultado de la consulta
		$result = mysql_fetch_array($query);
		return $result = explode("','",preg_replace("/(enum|set)\\('(.+?)'\\)/","\\\\2",$result[1]));
*/
		$result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
		WHERE TABLE_NAME = 'productos' AND COLUMN_NAME = '$column_name'")
		or die (mysql_error());

		$row = mysql_fetch_array($result);
		$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

		return $enumList;
	}

/////////////////////////////fin////////////////////////////////////////////////////////

	
}


