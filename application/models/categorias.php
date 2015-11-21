<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function agregarCategoria($data)
	{
		
		$response = $this -> db -> insert('categorias',$data);
		
		//----------------------------------------------------
		$id_categoria = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$id_categoria){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_categoria;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarCategoria($id_categoria, $datos)
	{

		$this->db->where('id_categoria',$id_categoria);
	    $this->db->update('categorias', $datos);
	    return ($this->db->affected_rows() > 0);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerCategoria($id_categoria)
	{

		$this->db->from('categorias');
		$this->db->where('id_categoria',$id_categoria);
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
	
	function eliminarCategoria($id_categoria)
	{

		$this->db->where('id_categoria',$id_categoria);
		return $this->db->delete('categorias');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarCategorias()
	{

		$this->db->from('categorias');
		$this->db->order_by("posicion", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

////////////////////////////////////////////////////////////////////////////////////////


	function listarCategoriasPorPadre($padre)
	{

		$this->db->from('categorias');
		$this -> db -> where('padre',$padre);
		$this->db->order_by("posicion", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtener($id_categoria)
	{
		
		$this->db->from('categorias');
		$this -> db -> where('id_categoria',$id_categoria);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	

/////////////////////////////fin////////////////////////////////////////////////////////

	
	
    function listboxCategoria($id_categoria,$padre=0,$nivel=1)
    {
      $html ='';	
      $sangria = (18 * $nivel);
 
 	  $this->db->from('categorias');
	  $this -> db -> where('padre',$padre);
 	  $result = $this->db->get();
	  $categorias = $result -> result_array();

	  foreach ($categorias as $out) 
	  {
	  	$selected = '';
	  	if($id_categoria == $out['id_categoria'])
	  	{
	  		$selected = ' selected ';

	  	}
	  	$html .='<option style="padding-left: '.$sangria.'px;font-size:1em;"  value="'.$out['id_categoria'].'" '.$selected.' >'.(($nivel > 1)? ' ├ ':'').$out['nombre'].'</option>';
	  	
	  	if( $this-> numHijos($out['id_categoria']))
	  	{
	  		$nivelnuevo = $nivel + 1;
	  		$html .= $this->listboxCategoria($id_categoria,$out['id_categoria'],$nivelnuevo);	
	  	}

	  }
	              
	  return $html;
     
    }

/////////////////////////////fin////////////////////////////////////////////////////////


    function numHijos($padre)
    {
      
		$this->db->from('categorias');
	  	$this -> db -> where('padre',$padre);
		$result = $this->db->get();
		return $result->num_rows();
   
    }
     

	
/////////////////////////////fin////////////////////////////////////////////////////////

	

	
}


