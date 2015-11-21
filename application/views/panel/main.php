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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
                
                <h4 class="page-title">Inicio</h4>
                                
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
              
                <hr class="whiter" />
                
                <!-- Quick Stats -->
                <div class="block-area">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="tile quick-stats">
                                <div id="stats-line-2" class="pull-left"></div>
                                <div class="data">
                                    <h2 data-value="98">0</h2>
                                    <small>Tickets Today</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="tile quick-stats media">
                                <div id="stats-line-3" class="pull-left"></div>
                                <div class="media-body">
                                    <h2 data-value="1452">0</h2>
                                    <small>Shipments today</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="tile quick-stats media">

                                <div id="stats-line-4" class="pull-left"></div>

                                <div class="media-body">
                                    <h2 data-value="4896">0</h2>
                                    <small>Orders today</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="tile quick-stats media">
                                <div id="stats-line" class="pull-left"></div>
                                <div class="media-body">
                                    <h2 data-value="29356">0</h2>
                                    <small>Site visits today</small>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <hr class="whiter" />
                
                <!-- Main Widgets -->
               
            </section>

            <!-- Older IE Message -->
             <? $this->load->view('panel/includes/older_message') ?>

        </section>
        
        <!-- Javascript Libraries -->
        <? $this->load->view('panel/includes/footer') ?>

        <!-- Charts -->
        <script src="<?= base_url() ?>resources/panel/js/jquery.easing.1.3.js"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <script src="<?= base_url() ?>resources/panel/js/charts/jquery.flot.js"></script> <!-- Flot Main -->
        <script src="<?= base_url() ?>resources/panel/js/charts/jquery.flot.time.js"></script> <!-- Flot sub -->
        <script src="<?= base_url() ?>resources/panel/js/charts/jquery.flot.animator.min.js"></script> <!-- Flot sub -->
        <script src="<?= base_url() ?>resources/panel/js/charts/jquery.flot.resize.min.js"></script> <!-- Flot sub - for repaint when resizing the screen -->

        <script src="<?= base_url() ?>resources/panel/js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
        <script src="<?= base_url() ?>resources/panel/js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="<?= base_url() ?>resources/panel/js/charts.js"></script> <!-- All the above chart related functions -->


    </body>
</html>
