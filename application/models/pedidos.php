<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function crearPedido($data)
	{
		
		$response = $this -> db -> insert('pedidos',$data);
		
		//----------------------------------------------------
		$id_pedido = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$response){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_pedido;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarPedido($id_pedido, $datos)
	{

		$this->db->where('id_pedido',$id_pedido);
		return $this->db->update('pedidos', $datos);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerPedido($id_pedido)
	{

		$this->db->from('pedidos');
		$this->db->where('pedidos.id_pedido',$id_pedido);
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			return $result->row_array();
		}else
			return false;
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarPedido($id_pedido)
	{

		$this->db->where('id_pedido',$id_pedido);
		return $this->db->delete('pedidos');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarPedidos()
	{

		$this->db->from('pedidos');
		$this->db->order_by("pedidos.id_pedido", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


