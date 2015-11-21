<? $this->load->view('panel/includes/tags') ?>
 
    <link rel="stylesheet" href="<?= base_url() ?>resources/plugins/message/css/jquery.toastmessage.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%;  background-color: #000;}
        #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 354px; height: auto; text-align: center; background: none; }
    </style>

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
                    <li class="active">imágenes Galería principal</li>
                </ol>
                
                <h4 class="page-title">Galería principal</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                <hr class="whiter" />
                                
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    <h3 class="block-title">Lista de imágenes de la galería principal</h3>
                    
                   
                    <div class="box-content nopadding" >                           
 
                        <ul id="sortable">
                         
                         <? for($i=0; $i<6; $i++ ){ ?>
                         <form name="formulario<?= $i ?>" id="formulario<?= $i ?>" enctype="multipart/form-data">
                         <li class="ui-state-default">             
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail form-control" style="width: 350px; height: 135px; padding: 0px;" id="thumb<?= $i ?>"  >
                                    <?= (isset ($slides[$i]['imagen']) )?'<img src="'.base_url().'uploads/slides/s'.$slides[$i]['imagen'].'" />':'' ?>        
                                </div>
                                <div>
                                    <input type="hidden" id="fileId<?= $i ?>" value="<?= (isset ($slides[$i]['id_slide']) )?$slides[$i]['id_slide']:'' ?>" >
                                    <input type="hidden" id="filePos<?= $i ?>" value="<?= (isset($slides[$i]['posicion']))?$slides[$i]['posicion']:$i ?>" >
                                    <span class="btn btn-file btn-alt btn-sm">
                                        <span class="fileupload">Seleccione una Imágen</span>
                                        <input type="file" name='file<?= $i ?>' class='fileup' id='<?= $i ?>'  />
                                    </span>
                                    <span class="btn btn-file btn-alt btn-sm" data-dismiss="fileupload" onClick="eliminar(<?= $i ?>)">Eliminar</span>
                                </div>
                                <div >
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10 m-b-15">                                  
                                            <input type="text" class="input-sm form-control " value=""  name="info1" placeholder="Ingrese el texto principal:"  > 
                                        </div>
                                        <div class="col-md-1 m-b-15">  
                                            <span class="btn btn-file btn-alt btn-sm" data-dismiss="fileupload" onClick="actualizar(<?= $i ?>,'principal')" alt="Actualizar texto">Act</span>
                                        </div>
                                    </div>
                                </div>
                                <div >
                                    <div class="row">
                                        <div class="col-md-10 m-b-15">                                  
                                            <input type="text" class="input-sm form-control " value=""  name="info2" placeholder="Ingrese el texto secundario:"  > 
                                        </div>
                                        <div class="col-md-1 m-b-15">  
                                            <span class="btn btn-file btn-alt btn-sm" data-dismiss="fileupload" onClick="actualizar(<?= $i ?>,'secundario')">Act</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </li>
                         </form>
                         <? } ?>
                                                                           
                        </ul>
                        

                    </div>

                </div>
                            
                <hr class="whiter" />
                
                <!-- Main Widgets -->
               
            </section>

             <? $this->load->view('panel/includes/older_message') ?>

        </section>
        
        <!-- Javascript Libraries -->
        <? $this->load->view('panel/includes/footer') ?>
         <!-- Message -->
        <script src="<?= base_url() ?>resources/plugins/message/jquery.toastmessage.js"></script>
        <!-- Custom file upload 
        <script src="<?=base_url()?>resources/panel/js/bootstrap-fileupload.js"></script> -->

        <script type="text/javascript">


            $(document).ready(function(){

                $( "#sortable" ).sortable({
                    cancel: ".fixed,input"
                });
               // $( "#sortable" ).disableSelection();


            });


             $(function(){

                $(".fileup").on("change", function(){


                    var ruta = "<?= site_url()?>slide/editar";
                    var ruta_img = "<?= site_url()?>uploads/slides/s";
                    var id = "#thumb"+this.id;
                    var fileId = "#fileId"+this.id;
                    var filePos = "#filePos"+this.id;
                    var formulario = "#formulario"+this.id;
                    
                    var formData = new FormData($(formulario)[0]);
                             
                    $(id).html(' <img src="<?= base_url() ?>resources/panel/img/loadinfo.gif"  />');

                    formData.append('name', this.name);
                    formData.append('id', $(fileId).val());
                    formData.append('pos', $(filePos).val());


                    $.ajax({

                        url: ruta,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data)
                        {
                            respuesta = eval('(' +data+ ')');
                            if (respuesta.estado == 'success') 
                            {
                                $(id).html('<img src="'+ruta_img+respuesta.imagen+'" />');
                                $(fileId).val(respuesta.id_imagen);

                            }
                            else if(respuesta.estado == 'nothing')
                            {
                                $(id).html('<img src="'+ruta_img+respuesta.imagen+'" />'); 
                                respuesta.estado = 'error';                               
                            }

                            $().toastmessage('showToast', { text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });
    
                        }

                    });


                });

                

             });

            function eliminar(id){

                var fileId = "#fileId"+id;
                var thumbId = "#thumb"+id;
                
                if(confirm("Está Seguro de eliminar la Imágen?"))
                {
                 
                    $.post('<?= site_url()?>slide/eliminar',{id : $(fileId).val()}, 
                    function(data){
                        
                        respuesta = eval('(' +data+ ')');

                        if (respuesta.estado=="success")
                        {
                            $(thumbId).html('');
                            $(fileId).val('');
                        }

                        $().toastmessage('showToast', {text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });

                    })
                }
                
            }

        

        </script>
   
    </body>
</html>
