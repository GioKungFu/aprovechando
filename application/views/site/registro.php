<? $this->load->view('site/includes/tags') ?>
   
   </head>
   <body class="catalog-category-view categorypath-furniture-html category-furniture adapt-3">
      <div class="wrapper ">
         <div class="page two-columns-right">

          <? $this->load->view('site/includes/header') ?>

          <? $this->load->view('site/includes/menu') ?>

            
        
            <div class="wrapper_content">
               <div class="container_24 ">
				   <div class="grid_24 em-breadcrumbs">
					  <div class="breadcrumbs">
						 <ul>
							<li class="home">
							   <a href="<?= base_url() ?>" title="Home">Inicio</a>
							   <span class="separator">/ </span>
							</li>
							<li class="register">
							   <strong>Registro</strong>
							</li>
						 </ul>
					  </div>
				   </div>
				   
				   <div class="grid_12 em-main-wrapper">
					  <div class="account-create">
						 <div class="page-title">
							<h1>Crear una nueva cuenta</h1>
						 </div>
						 <div class="content">
							 <h2>Nuevos Clientes</h2>
							 <p>Creando una nueva cuenta en nuestra tienda, usted puede hacer el proceso de compra de una manera mas rápida.</p>
						 </div>
						 <form action="<?= base_url() ?>cliente/agregar" method="post" id="form-validate">
							
							<div class="fieldset">
							   <h2 class="legend">Información de la cuenta</h2>
							   <ul class="form-list">
								  <li>
									 <label for="email_address" class="required"><em>*</em>Email (Será su nombre de usuario)</label>
									 <div class="input-box">
										<input type="text" name="usr[_username]" id="usuario" value="" title="Email Address" class="input-text validate-email required-entry">
									 </div>
								  </li>

								  <li class="fields">
									 <div class="field">
										<label for="password" class="required"><em>*</em>Contraseña</label>
										<div class="input-box">
										   <input type="password" name="usr[_password]" id="pass" title="Password" class="input-text required-entry validate-password">
										</div>
									 </div>
									 <div class="field">
										<label for="confirmation" class="required"><em>*</em>Confirmar Contraseña</label>
										<div class="input-box">
										   <input type="password" name="confirmation" title="Confirm Password" id="confirmation" class="input-text required-entry validate-cpass">
										</div>
									 </div>
								  </li>
							   </ul>
							</div>

							<div class="fieldset">
							   <div class="input-box">
							   	<p><br></p>
							   </div>
							   <h2 class="legend">Información Personal</h2>
							   <ul class="form-list">
								  
								  <li class="fields">
									 <div class="customer-name">
										<div class="field name-firstname">
										   <label for="firstname" class="required"><em>*</em>Nombres y Apellidos</label>
										   <div class="input-box">
											  <input type="text" id="nombres" name="perfil[nombres]" value="" title="Nombres" maxlength="255" class="input-text required-entry">
										   </div>
										</div>

										<div class="field name-telefono">
										   <label for="telefono" class="required"><em>*</em>Teléfono</label>
										   <div class="input-box">
											  <input type="text" id="telefono" name="perfil[telefono]" value="" title="Telefono" maxlength="255" class="input-text required-entry">
										   </div>
										</div>
									 </div>
								  </li>

								  <li class="fields">
									 <div class="field">
										 <label  class="required"><em>*</em>País</label>
										 <div class="input-box">
											<select  name="perfil[id_pais]"  id="pais" value="" title="Pais" class="input-select">
				                             	<option value="52">Colombia</option>
				                            </select>
										 </div>
									</div>
									<div class="field">
										 <label  class="required"><em>*</em>Departamento</label>
										 <div class="input-box">
											<select  name="perfil[id_departamento]"  id="departamento" value="" title="Depto" class="input-select required-entry">
				                            </select>
										 </div>
									</div>
								  </li>

								  <li class="fields">
									 <div class="field">
										 <label  class="required"><em>*</em>Ciudad</label>
										 <div class="input-box">
											<select  name="perfil[id_municipio]"  id="municipio" value="" title="Ciudad" class="input-select">
				                            </select>
										 </div>
									</div>
									<div class="field">
										 <label  class="required"><em>*</em>Dirección</label>
										 <div class="input-box">
											  <input type="text" id="direccion" name="perfil[direccion]" value="" title="direccion" maxlength="255" class="input-text required-entry">
										 </div>
									</div>
								  </li>

							   </ul>
							</div>


							<div class="buttons-set">
							   <p class="required">* Campos requeridos</p>
							   <button type="submit" title="Submit" class="button"><span><span>Registrar</span></span></button>
							   <p class="back-link"><a href="<?= base_url() ?>" class="back-link"><small>« </small>Cancelar</a></p>
							</div>
						 </form>
						 <script type="text/javascript">
							//<![CDATA[
								var dataForm = new VarienForm('form-validate', true);
									//]]>
						 </script>
					  </div>
				   </div>

				   <div class="grid_12 em-col-right em-sidebar">
					  <div class="account-create">
						 <div class="page-title">
							<h1>Iniciar sesión</h1>
						 </div>
						 <div class="content">
							 <h2>Clientes registrados</h2>
							 <p>Si usted ya tiene una cuenta, por favor ingrese su usuario y contraseña.</p>
						 </div>
						 
						 
							
							<div class="fieldset">
							   <h2 class="legend"></h2>
							   <ul class="form-list">
								  <li class="fields">
									 <div class="field">
										<label for="usuario" class="required"><em>*</em>Usuario</label>
										<div class="input-box">
										   <input type="text" name="user" id="user" title="Usuario" class="input-text required-entry">
										</div>
									 </div>
									 <div class="field">
										<label for="password" class="required"><em>*</em>Contraseña</label>
										<div class="input-box">
										   <input type="password" name="confirmation" title="Contraseña" id="password" class="input-text required-entry">
										</div>
									 </div>
								  </li>
							   </ul>
							</div>
						 	<div class="content">
							   <p id="div-alert"></p>
						 	</div>

							<div class="buttons-set">
							   <p class="required">* Campos requeridos</p>
							   <button type="button" title="Enviar"  onClick="validar()" class="button"><span><span>Ingresar</span></span></button>
							   <p class="back-link"><a href="<?= base_url() ?>" class="back-link"><small>« </small>Cancelar</a></p>
							</div>

					  </div>
				   </div>
				   <div class="clear"></div>
				</div>
            </div>
            
            
            
            <? $this->load->view('site/includes/footer') ?>


            
            </div>
         </div>
      </div>


<script type="text/javascript">

	jQuery(document).ready(function(){

	  	
	    // utilizamos la función post, para hacer una llamada AJAX
	    jQuery.post("<?=site_url()?>main/obtenerDepartamentos", { idPais:52 }, 
	    function(html){ jQuery('#departamento').append(html); } );
	    
	    jQuery("#departamento").change(function() {
	        //Limpiamos el select de municipios
	        jQuery('#municipio').html('');
	        // utilizamos la función post, para hacer una llamada AJAX
	        jQuery.post("<?=site_url()?>main/obtenerMunicipios", { idDepartamento : jQuery(this).val() }, 
	        function(html){ jQuery('#municipio').append(html); } );

	    });
	      
	    jQuery('#password').keypress(function(e) {
	        if(e.keyCode == 13) {
	            validar();
	        }
	    });
	 
	});


	function validar(){
	  
	  jQuery('#login-alert').show();
	  jQuery('#div-alert').html('Verificando ....');  
	  jQuery.post('<?= site_url()?>/main/carrito', 
	  { usuario : jQuery('#user').val(), pass : jQuery('#password').val() }, 
	  function(data){
	     if(data == 'success'){
	      window.location = '<?= site_url()?>';
	     }else{
	      jQuery('#div-alert').html('<span style="color:#FF0000"> <br>Nombre de usuario y/o contraseña incorrectos. Por favor intente nuevamente. </span>');
	     }
	   })
	   
	}

</script>

   </body>
</html>