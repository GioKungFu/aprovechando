<? $this->load->view('panel/includes/tags') ?>

    </head>
    <body id="skin-blur-ocean">
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Side Menu -->
                <? $this->load->view('panel/includes/menu') ?>

            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
            
                <!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="<?= base_url() ?>panel/panel">Inicio</a></li>
                    <li><a href="<?= base_url() ?>servicio/lista" >Lista de Servicios</a></li>
                    <li class="active">Lista de Servicios</a></li>
                </ol>
                
                <h4 class="page-title">Servicios</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                
                <hr class="whiter" />
                
                
                <!-- Input Masking -->
                <div class="block-area" id="input-masking">
                    
                    <h3 class="block-title">Agregar Servicio</h3>
                    
                    <br/>
                    
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content">
                    <div class="row">
                        <div class="col-md-12 m-b-15">
                            <label>Titulo del servicio:</label>
                            <input type="text" class="input-sm form-control "  name="info[titulo]" placeholder="Titulo" required >
                        </div>

                        <div class="col-md-12 m-b-15">
                            <label>Descripción corta:</label>
                            <input type="text" class="input-sm form-control "  name="info[descripcion]" placeholder="Descripción" required >
                        </div>
                       
                        <div class="col-md-4 m-b-15">
                            <label>Imágen para los listados:</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                
                                <div class="fileupload-new thumbnail" style="width: 170px; height: 170px;">
                                </div>
             <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 170px; max-height: 170px; line-width: 20px; line-height: 20px;">
                                </div>                   
                                <div>
                                     <span class="btn btn-file btn-alt btn-sm">
                                        <span class="fileupload-new">Seleccione una Imágen</span>
                                        <span class="fileupload-exists">Cambiar</span>
                                        <input type="file" name='userfile'  />
                                    </span>
                                    <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Eliminar</a>
                                </div>
                                                        
                          </div>

                        </div>
                        
                        <div class="col-md-4 m-b-15">                    
                            <div class="alert alert-info alert-icon">
                                Esta imagen aparecerá en los listados, su formato debe ser PNG o  JPG, su tamaño recomendado es de 285px de ancho por 285px de alto. Despues de subir la imágen, por favor verifique que se visualice correctamente en la página web.
                                <i class="icon">&#61770;</i>
                            </div>
                        </div>

                        <div class="col-md-12 m-b-15">
                            <label>Descripción completa del servicio:</label>
                            <textarea  placeholder="Servicio:" name="info[contenido]" class='span12 ckeditor'  id="ck" ></textarea>
                        </div>
           
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5">Guardar</button>
                        </div>
            
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5"  onclick="location = '<?= base_url() ?>servicio/lista' " >Cancelar</button>
                        </div>
            
                    </div>
                    </form>

                </div>
                

                <hr class="whiter" />
                
                 
             </section>

            <!-- Older IE Message -->
             <? $this->load->view('panel/includes/older_message') ?>

        </section>
        
        <!-- Javascript Libraries -->

        <script src="<?= base_url() ?>resources/plugins/ckeditor/ckeditor.js"></script>
       <!-- Javascript Libraries -->
        <? $this->load->view('panel/includes/footer') ?>
        <!-- Custom file upload -->
        <script src="<?=base_url()?>resources/panel/js/bootstrap-fileupload.js"></script>



     </body>
</html>
