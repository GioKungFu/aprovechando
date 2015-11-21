<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrito extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////


	public $nf;
	public $carro;
	
	var $CI;
	
	function __construct(){
		parent::__construct();

		$this->load->library('session');
		//$this->session->set_userdata('nombre','Israel');

       if( $this->session->userdata('nf') ){

			$this->nf = $this->session->userdata('nf');
			$this->carro = $this->session->userdata('carro');

		}else
			$this->nf = 0;

	}
	
		
	public function addProducto($nombre,$id_producto, $valor, $cantidad, $imagen,$referencia,$tipo){
		
		if($this->nf == 0)
			$key = false;
		elseif($this->carro['producto'] > 0){
			$key = array_search($id_producto, $this->carro['producto']);
			if($key !== false)
				if($this->carro['estado'][$key]==0){
					$this->carro['estado'][$key] = 1;
					$this->carro['cantidad'][$key] = 0;
				}
		}else
			$key = false;
		
		if( $key === false){
			
			$this->carro['nombre'][$this->nf] = $nombre;
			$this->carro['producto'][$this->nf] = $id_producto;
			$this->carro['precio'][$this->nf] = $valor;
			$this->carro['referencia'][$this->nf] = $referencia;
			$this->carro['tipo'][$this->nf] = $tipo;
			$this->carro['cantidad'][$this->nf] = $cantidad;
			$this->carro['imagen'][$this->nf] = $imagen;
			$this->carro['estado'][$this->nf] = 1;
			$this->carro['nf'][$this->nf] = $this->nf;
			$this->nf++;
		}else{
			$this->carro['cantidad'][$key] = $this->carro['cantidad'][$key]+$cantidad;
			$this->carro['valor'][$key] = $valor;
		}
		
		$this->sincronizar();
	}
	
	public function updateProducto( $nf, $cantidad, $estado = 1 ){
		if($cantidad === 0)
			$estado = 0;
			
		if($cantidad !== false) $this->carro['cantidad'][$nf] = $cantidad;
		if($estado !== false) $this->carro['estado'][$nf] = $estado;
		$this->sincronizar();
	}
	
	public function numProductos(){
		$num=0;
		for($p =0; $p<$this->nf; $p++)
				if(nvl($this->carro['estado'][$p]))
					$num++;
		return $num;
	}
	
	
	public function numCompras(){
		return $this->nf;
	}

	
    public function destruirCarrito(){
    	$this->session->unset_userdata(array('carro' => '','nf' => '' ));

	}

	
	public function sincronizar(){
		$this->session->set_userdata(array('carro' => $this->carro,'nf' => $this->nf ));
	}
	
	
/////////////////////////////fin////////////////////////////////////////////////////////

	

	
}


