<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }


////////////////////////////////////////////////////////////////////////////////////////

	function validarNombreUsuario($username)
	{

		$this->db->from('usuarios');
		$this->db->where('_username',$username);
		$this->db->where('estado','Activo');
		$result = $this->db->get();
		$num = $result->num_rows();
		return $num;
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function validarUsuario($username, $pass)
	{

		$pass = md5($pass);
		$this->db->from('usuarios');
		$this->db->where('_username',$username);
		$this->db->where('_password',$pass);
		$this->db->where('estado','Activo');
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			$usr = $result->row();
			$dat['id_usuario'] = $usr->id_usuario;
			$dat['tipo_usuario'] = $usr->tipo;	
			
			return $dat;
		}else
			return false;
	}
	

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtenerDatosUsuario($id_usuario)
	{
		
		$this->db->from('usuarios_perfil');
		$this->db->join('usuarios','usuarios.id_usuario = usuarios_perfil.id_usuario');
		$this -> db -> where('usuarios.id_usuario',$id_usuario);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	function agregar($usr, $perfil)
	{
		$dat = array();
		$dat['error']  = false;
		$insert = array(
		'_username' => $usr['_username'],
		'_password' =>  md5($usr['_password']),);
		$response = $this -> db -> insert('usuarios',$insert);
		if(!$response)
		{
			return $dat['error'] = false;
		}

		$perfil['id_usuario'] = $this->db->insert_id();
		
		$response = $this -> db -> insert('usuarios_perfil',$perfil);
		
		if($response != 1){
			return $dat['error'] = false;
		}

		return $perfil['id_usuario'];

	}
	

	
}


