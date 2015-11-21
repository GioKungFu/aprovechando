<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Thumbs
{
   protected $ci;
   
   function __construct()
   {
      $this->ci =& get_instance();
   }

   function crear_thumbs( $ruta, $archivo, $prefijo, $w, $h )
   {
      
				//Redimensión de imágenes
				$this->ci->load->library('newupload');
				
				$nomfile = explode('.', $archivo);
				
				$this->ci->newupload->upload($ruta.$archivo);
				
				$this->ci->newupload->file_max_size = '5000000'; // 1KB
				
				$this->ci->newupload->image_max_width = 3970;
				$this->ci->newupload->image_max_height = 2234;
				
				// Tamaño small - Thumb (96px X 72px)
				$this->ci->newupload->file_new_name_body = $nomfile[0];
				$this->ci->newupload->file_name_body_pre = $prefijo;
				$this->ci->newupload->allowed = array('image/*');
				$this->ci->newupload->image_resize = true;
				$this->ci->newupload->image_ratio_fill= true;
				$this->ci->newupload->image_x = $w;
				$this->ci->newupload->image_y = $h;
				$this->ci->newupload->process($ruta);
		
	  
   }

   
   function crear_thumbs_ci( $ruta, $archivo, $prefijo, $w, $h )
   {
      
				//Redimensión de imágenes
				$config = array(
	            'source_image' => $ruta,
	            'new_image' => realpath(APPPATH.'../uploads/servicios'),
	            'maintain_ratio' => false,
	            'thumb_marker' => $prefijo,
	            'width' => $w,
	            'height' => $h
	        );

				$this->ci->load->library('image_lib');

				$this->ci->image_lib->initialize($config);
    			$this->ci->image_lib->resize();
					
	  
   }
}