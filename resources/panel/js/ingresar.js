       
jQuery(document).ready(function(){
	
});


jQuery('#box-login').submit(function(event){
  
  event.preventDefault();
  
  if( jQuery('#user').val() != '' &&  jQuery('#password').val() != '')
  {
	
	jQuery('#login-alert').show();
	jQuery('#div-alert').html('Verificando ....');	
	jQuery.post(base_url + 'usuario/ingresar', 
	{ usuario : jQuery('#user').val(), pass : jQuery('#password').val() }, 
	function(data){
		 if(data == 'success')
		 {
			
			window.location = base_url + 'producto/lista';
		 }else
		 {
			
			jQuery('#div-alert').html('¡Nombre de usuario y/o contraseña incorrectos!. Por favor intente nuevamente.');
		 }
	 
	 })
	  
  }else
  {
	jQuery('#login-alert').show();
	jQuery('#div-alert').html('El nombre de usuario y/o contraseña no deben estar vacios.');	
   		  
  }
  
})		



function validar(){
	 
}

 