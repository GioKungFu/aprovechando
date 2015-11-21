<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Manejador de contenidos de Mundocomputo">
        <meta name="keywords" content="Admin, administrador de contenidos mundocomputo">

        <title>Administrador de contenidos MundoComputo</title>
            
        <!-- CSS -->
        <link href="<?= base_url() ?>resources/panel/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>resources/panel/css/form.css" rel="stylesheet">
        <link href="<?= base_url() ?>resources/panel/css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>resources/panel/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>resources/panel/css/generics.css" rel="stylesheet"> 
        <link href="<?= base_url() ?>resources/panel/css/icons.css" rel="stylesheet"> 

    </head>
    <body id="skin-blur-ocean">
        <section id="login">
            <header>
                <h1>Panel de administración</h1>
                <p> </p>
            </header>
        
            <div class="clearfix"></div>
            
            <!-- Login -->
            <form class="box tile animated active" id="box-login">
                <h2 class="m-t-0 m-b-15">Iniciar sesión</h2>
                <input type="text" id="user" class="login-control m-b-10" placeholder="Email" required >
                <input type="password" class="login-control" placeholder="Contraseña" id="password" required >
                
                <div>&nbsp;</div>
                <!--div class="checkbox m-b-20">
                    <label>
                    </label>
                </div -->
                <span id="login-alert"  style="display:none" >
                    <div class="alert alert-danger alert-icon alert-dismissable fade in"  >
                        <span id="div-alert"></span>
                        <i class="icon">&#61730;</i>
                    </div>
				</span>
                
                <button class="btn btn-sm m-r-5" id="buttonLogin" >Continuar</button>
                
                <small>
                    <!-- a class="box-switcher" data-switch="box-reset" href="">Olvidó su contraseña?</a -->
                </small>
            </form>
            
            
            <!-- Forgot Password -->
            <form class="box animated tile" id="box-reset">
                <h2 class="m-t-0 m-b-15">Reiniciar contraseña</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
                <input type="email" class="login-control m-b-20" placeholder="Email Address">    

                <button class="btn btn-sm m-r-5">Reset Password</button>

                <small><a class="box-switcher" data-switch="box-login" href="">Yá tiene una cuenta?</a></small>
            </form>
        </section>                      
		
        <!-- Javascript variables -->
		<script type="text/javascript">
			var base_url = '<?= base_url() ?>';
        </script>	
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="<?=base_url()?>resources/panel/js/jquery.min.js"></script> <!-- jQuery Library -->
        <!-- Bootstrap -->
        <script src="<?=base_url()?>resources/panel/js/bootstrap.min.js"></script>
        
              
        <script src="<?=base_url()?>resources/panel/js/ingresar.js"></script>
        

    </body>
</html>
