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
                    
                    <h3 class="block-title">Editar Contenido</h3>
                    
                    <br/>
                    
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content">
                    <input type="hidden" name="id_contenido" value="<?= $contenido['id_contenido'] ?>" />
                    <div class="row">
                        <div class="col-md-12 m-b-15">
                            <label>Titulo del contenido</label>
                            <input type="text" class="input-sm form-control "  name="info[titulo]" value="<?= $contenido['titulo'] ?>" placeholder="Titulo" required >
                        </div>

                        <div class="col-md-12 m-b-15">
                            <label>Palabras clave del contenido</label>
                            <input type="text" class="input-sm form-control "  name="info[keywords_meta]"  value="<?= $contenido['keywords_meta'] ?>"  placeholder="Keywords">
                        </div>
                        <div class="col-md-12 m-b-15">                    
                            <div class="alert alert-info alert-icon">
                                Atención! Las palabras clave son importantes para posicionar tu contenido en los buscadores. Usa una serie de palabras separadas por coma que estén acordes con el tema de tu contenido.
                                <i class="icon">&#61770;</i>
                            </div>
                        </div>
                       
                         
                        <div class="col-md-12 m-b-15">
                            <label>Contenido</label>
                            <textarea  placeholder="Contenido:" name="info[contenido]" class='span12 ckeditor'  id="ck" ><?= $contenido['contenido'] ?></textarea>
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
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Mozilla Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="img/browsers/ie.png" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->

        <script src="<?= base_url() ?>resources/plugins/ckeditor/ckeditor.js"></script>

       <!-- Javascript Libraries -->
        <? $this->load->view('panel/includes/footer') ?>

     </body>
</html>
