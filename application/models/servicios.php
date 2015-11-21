<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function crearServicio($data)
	{
		
		$response = $this -> db -> insert('servicios',$data);
		
		//----------------------------------------------------
		$id_servicio = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$response){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_servicio;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarServicio($id_servicio, $datos)
	{

		$this->db->where('id_servicio',$id_servicio);
		return $this->db->update('servicios', $datos);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerServicio($id_servicio)
	{

		$this->db->from('servicios');
		$this->db->where('servicios.id_servicio',$id_servicio);
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			return $result->row_array();
		}else
			return false;
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarServicio($id_servicio)
	{

		$this->db->where('id_servicio',$id_servicio);
		return $this->db->delete('servicios');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarServicios()
	{

		$this->db->from('servicios');
		$this->db->order_by("servicios.id_servicio", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


