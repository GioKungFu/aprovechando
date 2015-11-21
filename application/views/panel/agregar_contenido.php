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
                    <li><a href="<?= base_url() ?>contenido/lista" >Lista de Contenidos</a></li>
                    <li class="active">Lista de Contenidos</a></li>
                </ol>
                
                <h4 class="page-title">Contenidos</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                
                <hr class="whiter" />
                
                
                <!-- Input Masking -->
                <div class="block-area" id="input-masking">
                    
                    <h3 class="block-title">Agregar Contenido</h3>
                    
                    <br/>
                    
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content">
                    <div class="row">
                        <div class="col-md-12 m-b-15">
                            <label>Titulo del contenido</label>
                            <input type="text" class="input-sm form-control "  name="info[titulo]" placeholder="Titulo" required >
                        </div>

                        <div class="col-md-12 m-b-15">
                            <label>Palabras clave del contenido</label>
                            <input type="text" class="input-sm form-control "  name="info[keywords_meta]" placeholder="Keywords">
                        </div>
                        <div class="col-md-12 m-b-15">                    
                            <div class="alert alert-info alert-icon">
                                Atención! Las palabras clave son importantes para posicionar tu contenido en los buscadores. Usa una serie de palabras separadas por coma que estén acordes con el tema de tu contenido.
                                <i class="icon">&#61770;</i>
                            </div>
                        </div>
                       
                         
                        <div class="col-md-12 m-b-15">
                            <label>Contenido</label>
                            <textarea  placeholder="Contenido:" name="info[contenido]" class='span12 ckeditor'  id="ck" ></textarea>
                        </div>
           
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5">Guardar</button>
                        </div>
            
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5"  onclick="location = '<?= base_url() ?>contenido/lista' " >Cancelar</button>
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

       <script type="text/javascript">

            $(document).ready(function(){

                editor = CKEDITOR.replace('editor',{
                    height : 600
                });

            });
       
       </script>  

     </body>
</html>
