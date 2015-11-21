<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');/**
  * Modelo para acceder a paises, deptos y ciudades de la BD
  *
 * @package		CodeIgniter
 * @author		Ceron 
 * @copyright	Copyright (c) 2015, MundoComputo
 * @link		http://mundocomputo.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

class Ubicaciones extends CI_Model 
{

//////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerPais()
	{
		$result = $this -> db ->get('ubicacion_pais');
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerDepartamentos()
	{
		$this -> db -> order_by('nombre');
		$result = $this -> db ->get('ubicacion_departamentos');
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerMunicipios($id_departamento)
	{
		$this -> db -> where('id_departamento',$id_departamento);
		$result = $this -> db ->get('ubicacion_municipios');
		return $result -> result_array();
	}


//////////////////////////////////////////////////////////////////////////////////////////////////////////	

}