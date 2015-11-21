<? $this->load->view('site/includes/tags') ?>

<script type="text/javascript">

jQuery(document).ready(function(){

  
    jQuery( "#form-validate" ).validate({
         
         rules:{
          'usr[_username]':{ required: true,email: true, "remote":{url: '<?= site_url()?>estudiante/validarNombreEstudiante',
                                       type: "post",
                                       data:{
                                         email: function(){
                                           return jQuery('#form-validate :input[name="usr[_username]"]').val();
                                          }
                                        }
                                      }
                   },
          'usr[_password]': {required: true,minlength: 5},
          'contra': {required: true, equalTo: "#pass"},
         },
         messages:{
           'usr[_username]': {remote: jQuery.validator.format("{0} ya está registrado.")},
           'usr[_password]': {minlength: "Debe contener mínimo 5 caracteres"},
           'contra': {equalTo: "Los campos no coinciden"}
         }

    });
    

    // utilizamos la función post, para hacer una llamada AJAX
    $.post("<?=site_url()?>main/obtenerDepartamentos", { idPais:52 }, 
    function(html){ $('#departamento').append(html); } );
    
    $("#departamento").change(function() {
        //Limpiamos el select de municipios
        $('#municipio').html('');
        // utilizamos la función post, para hacer una llamada AJAX
        $.post("<?=site_url()?>main/obtenerMunicipios", { idDepartamento : $(this).val() }, 
        function(html){ $('#municipio').append(html); } );

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
  jQuery.post('<?= site_url()?>/estudiante/login', 
  { usuario : jQuery('#user').val(), pass : jQuery('#password').val() }, 
  function(data){
     if(data == 'success'){
      window.location = '<?= site_url()?>estudiante/panel';
     }else{
      jQuery('#div-alert').html('Nombre de usuario y/o contraseña incorrectos. Por favor intente nuevamente.');
     }
   })
   
}

</script>

</head>
<body>

<? $this->load->view('site/includes/header') ?>


<section id="Guia">
    <div class="areaGuia auto_margin">
        <div class="url"><a href="<?= base_url() ?>main/">Inicio</a>  /  Listados</div>
        <h1>Curso de higiene y manipulación de alimentos </h1>
    </div>
</section>

<section id="Main">
    <div class="areaContents auto_margin">

        <div class="iContt">

            <p>Bienvenido(a) al curso de certificación en higiene y manipulación de alimentos, esperamos ofrecer lo necesario para su formación y proyección laboral, cumpliendo siempre con nuestro principal objetivo que es proteger la salud del consumidor.</p>


            <hr>

            <p style="font-size:18px"><strong>Para iniciar el curso usted debe completar estos pasos:</strong></p>
            <ul style="font-size:18px">
                <li>Registrarse en nuestro portal en el formulario que se encuentra a continuación. Si ya se está registrado, proceda a iniciar sesión con su usuario y contraseña.<br><br></li>
                <li>Realizar el proceso de pago. Se debe hacer una consignación en efecty de $20.000 mas valor del envío a nombre de Jose Elber Garzon, Cédula Número 93.290.131 a la ciudad de Armenia.<br><br></li>
                <li>Enviar el comprobante de pago al correo electrónico solucionesvidacolombia@hotmail.com</li>
            </ul>

            <div class="areaForm">

                <div class="row">
                  
                  <div class="col-md-6">

                     <div class="row">
                          <blockquote>
                          <h2>Ingreso</h2>
                          <p class="text-warning"> Si ya se encuentra registrado en el portal, por favor escriba su usuario y contraseña para ingresar.</p>
                          </blockquote>
                          <div class="col-xs-12">
                              <span class="ilab">Correo electrónico:</span>
                              <input type="text" class="form-control" id="user" >
                          </div>
                          <div class="col-xs-12">
                              <span class="ilab">Contraseña:</span>
                              <input type="password" class="form-control" id="password" >
                          </div>
                          <div class="col-xs-12">
                              <span class="btt-label">
                              <button type="button" class="btn btn-default btn-lg active" onClick="validar()">Ingresar</button>
                              </span>
                          </div>
                          <span id="login-alert" style="display:none"><div class="alert alert-danger alert-dismissible" role="alert" id="div-alert"></div></span>
                     </div>
                   
                  </div>
                  
                  <div class="col-md-6"  style="border-left: 1px solid #EDEDED;">
                     <form name="formulario" id="form-validate" method="post" action="<?= base_url() ?>estudiante/agregar">
                     <div class="row">
                          <blockquote>
                          <h2>Registro</h2>
                          <p class="text-warning"> Para presentar el examen debe registrarse en el portal, su email será su nombre de usuario.</p>
                          </blockquote>
                          <div class="col-xs-12">
                            <span class="ilab">Correo electrónico (será su nombre de usuario):</span>
                            <input type="text" class="form-control" placeholder="Email" name="usr[_username]" id="usuario" required>
                          </div>
                          <div class="col-xs-12">
                            <span class="ilab">Contraseña:</span>
                            <input type="password" class="form-control" placeholder="Contraseña" name="usr[_password]" id="pass" required>
                          </div>
                          <div class="col-xs-12">
                            <span class="ilab">Repetir Contraseña:</span>
                            <input type="password" class="form-control" name="contra" id="contra" placeholder="" required >
                          </div>
                          <div class="col-xs-12">
                            <span class="ilab">Nombres:</span>
                            <input type="text" class="form-control" name="perfil[nombres]" placeholder="Nombres" required > 
                          </div>                  
                          <div class="col-xs-12">
                            <span class="ilab">Empresa:</span>
                            <input type="text" class="form-control" name="perfil[empresa]" placeholder="" required > 
                          </div>
                          <div class="col-xs-6">
                            <span class="ilab">Teléfono fijo:</span>
                            <input type="text" class="form-control" name="perfil[telefono]" placeholder="">
                          </div>
                          <div class="col-xs-6">
                            <span class="ilab">Teléfono celular:</span>
                            <input type="text" class="form-control"  name="perfil[movil]"  placeholder="">
                          </div>
                          
                          <div class="col-xs-4">
                            <span class="ilab">País:</span>
                            <select name="perfil[id_pais]" id="pais"  class="form-control">
                             <option value="52">Colombia</option>
                            </select>
                          </div>
                          
                          <div class="col-xs-4">
                            <span class="ilab">Departamento:</span>
                           <div id="div_lista_departamentos"></div>
                            <select name="perfil[id_departamento]" id="departamento" class="form-control" required >
                                <option value="0" selected="selected" >-Seleccione uno-</option>
                            </select>
                          </div>
                          
                          <div class="col-xs-4">
                            <span class="ilab">Ciudad:</span>
                            <select name="perfil[id_municipio]" class="form-control" id="municipio" placeholder="" required >
                            </select>
                          </div>
                          
                          <div class="col-xs-12">
                            <span class="ilab"> Dirección:</span>
                            <input type="text" class="form-control" name="perfil[direccion]" placeholder="Dirección" > 
                          </div>
                              
                          <div class="col-xs-12">
                            <span class="btt-label">
                            <button type="submit" class="btn btn-default btn-lg active">Registrarse</button>
                            </span>
                          </div>
 
                     </div>
                     </form>
                  </div>

                </div>

            </div>
        </div>
        <p class="clear"></p>
    </div>
</section>

<div class="mtop" style="margin-top: -16px;"></div>


<? $this->load->view('site/includes/footer') ?>

<script src="<?=base_url()?>resources/site/js/jquery.validate.min.js"></script>
  
</body>
</html>
