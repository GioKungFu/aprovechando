<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenidos extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function agregarContenido($data)
	{
		
		$response = $this -> db -> insert('contenidos',$data);
		
		//----------------------------------------------------
		$id_contenido = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$id_contenido){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_contenido;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarContenido($id_contenido, $datos)
	{

		$this->db->where('id_contenido',$id_contenido);
		return $this->db->update('contenidos', $datos);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerContenido($id_contenido)
	{

		$this->db->from('contenidos');
		$this->db->where('id_contenido',$id_contenido);
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			return $result->row_array();
		}else
			return false;
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarContenido($id_contenido)
	{

		$this->db->where('id_contenido',$id_contenido);
		return $this->db->delete('contenidos');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarContenidos()
	{

		$this->db->from('contenidos');
		$this->db->order_by("id_contenido", "desc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtener($id_contenido)
	{
		
		$this->db->from('contenidos');
		$this -> db -> where('id_contenido',$id_contenido);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


