<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerias extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function agregarGaleria($data)
	{
		
		$response = $this -> db -> insert('galerias',$data);
		
		//----------------------------------------------------
		$id_galeria = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$id_galeria){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_galeria;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarGaleria($id_galeria, $datos)
	{

		$this->db->where('id_galeria',$id_galeria);
	    $this->db->update('galerias', $datos);
	    return ($this->db->affected_rows() > 0);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerGaleria($id_galeria)
	{

		$this->db->from('galerias');
		$this->db->where('id_galeria',$id_galeria);
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
	
	function eliminarGaleria($id_galeria)
	{

		$this->db->where('id_galeria',$id_galeria);
		return $this->db->delete('galerias');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarGalerias()
	{

		$this->db->from('galerias');
		$this->db->order_by("posicion", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtener($id_galeria)
	{
		
		$this->db->from('galerias');
		$this -> db -> where('id_galeria',$id_galeria);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


