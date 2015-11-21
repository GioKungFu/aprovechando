<? $this->load->view('site/includes/tags') ?>


<script type="text/javascript">

jQuery(document).ready(function(){
      jQuery( "#form-validate" ).validate();
});
</script>

</head>
<body>

<? $this->load->view('site/includes/header') ?>

<section id="Guia">
    <div class="areaGuia auto_margin">
        <div class="url"><a href="<?= base_url() ?>main/">Inicio</a>  /  Contáctenos</div>
        <h1>Contáctenos</h1>
    </div>
</section>

<section id="Main">
    <div class="areaContents auto_margin">

        <div class="iContt">

            <p>Aliquam pulvinar cursus sapien, vitae imperdiet ipsum imperdiet a. Sed ornare, nunc a mattis euismod,
                nulla mi dapibus nisi, non lobortis dolor sapien non est. Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Praesent placerat enim urna. Praesent consequat, neque vitae rhoncus rhoncus, mauris
                ligula venenatis
            </p>

            <div class="areaForm">

                <div class="row">
                  
                  <div class="col-md-6">

                     <div class="row">
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
                          <div class="col-xs-12">
                              <span class="ilab">Observaciones:</span>
                              <textarea class="form-control" rows="3"></textarea>
                          </div>
                          <div class="col-xs-12">
                              <span class="btt-label"><button type="button" class="btn btn-default btn-lg">Enviar Formulario</button></span>
                          </div>
                     </div>
                   
                  </div>
                  
                  <div class="col-md-6"  style="padding-left: 50px ">
                     <form name="formulario" id="form-validate" method="post" action="<?= base_url() ?>">
                       <div class="row">
                             <div class="spc">
                              <h3>Datos de <strong>Contactos</strong></h3>
                              <div class="locdata location">
                                  <address>
                                      Calle 26 # 14 - 55<br />
                                      Armenia, Quindío Colombia
                                  </address>
                              </div>

                              <div class="locdata fphone">
                                   6) 7440438 - 3122501173<br> 3217809609 - 3156009339 <br> 
                                      3136684935 - 3127409172 <br>
                                      3147211321
                                  
                              </div>

                              <div class="locdata mail">
                                  <a href="mailto:solucionesvidacolombia@hotmail.com">solucionesvidacolombia@hotmail.com</a><br />
                              </div>
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
