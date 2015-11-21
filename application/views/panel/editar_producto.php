<? $this->load->view('panel/includes/tags') ?>

 
<link rel="stylesheet" href="<?= base_url() ?>resources/plugins/message/css/jquery.toastmessage.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%;  background-color: #000;}
        #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 284px; height: auto; text-align: center; background: none; }
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
                    <li><a href="<?= base_url() ?>producto/lista" >Lista de Productos</a></li>
                    <li class="active">Editar producto</li>
                </ol>
                
                <h4 class="page-title">Productos</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                
                <hr class="whiter" />
                
                
                <!-- Input Masking -->
                <div class="block-area" id="input-masking">
                    
                    <h3 class="block-title">Editar Producto</h3>
                    
                    <br/>
                    
                    
                    <div class="row">
                        
                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content">
                        <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                        <input type="hidden" name="id_galeria" value="<?= $producto['id_galeria'] ?>" id="id_galeria" />

                        <div class="col-md-6 m-b-15">
                            <label>Nombre del producto:</label>
                            <input type="text" class="input-sm form-control " value="<?= $producto['nombre'] ?>"  name="info[nombre]" placeholder="Nombre del producto:" required >
                        </div>

                        <div class="col-md-6 m-b-15">
                            <label>Categoria:</label>
                            <select  id="id_categoria" name=info[id_categoria] class="input-sm form-control "  >
                                <option value="0" >Seleccione una Categoría</option>
                                <?= $categorias ?>
                            </select>
                        </div>

                        <div class="col-md-12 m-b-15">
                            <label>Descripción corta:</label>
                            <input type="text" class="input-sm form-control " value="<?= $producto['entradilla'] ?>"  name="info[entradilla]" placeholder="Descripción corta:"  >
                        </div>

                        <div class="col-md-6 m-b-15">
                            <label>Precio Normal:</label>
                            <input type="number" class="input-sm form-control " value="<?= $producto['precio'] ?>"  name="info[precio]" placeholder="Precio:"  >
                        </div>

                        <div class="col-md-6 m-b-15">
                            <label>Precio de Oferta:</label>
                            <input type="number" class="input-sm form-control " value="<?= $producto['precio_oferta'] ?>"  name="info[precio_oferta]" placeholder="Precio de Oferta:"  >
                        </div>

                        <div class="col-md-6 m-b-15">
                            <label>Cantidad:</label>
                            <input type="number" class="input-sm form-control " value="<?= $producto['cantidad'] ?>"  name="info[cantidad]" placeholder="Cantidad:"  >
                        </div>

                        <div class="col-md-6 m-b-15">
                            <label>Referencia:</label>
                            <input type="text" class="input-sm form-control " value="<?= $producto['referencia'] ?>"  name="info[referencia]" placeholder="Referencia:"  >
                        </div>

                        <div class="col-md-6 m-b-15">
                            <label>Sistema Operativo:</label>
                            <select  id="sistema" name=info[sistema] class="input-sm form-control "  >
                              <?   foreach ($sistemas AS $key){ ?>
                                <option value="<?= $key ?>" <?= ($key == $producto['sistema'])?'selected': '' ?> ><?= $key ?></option> 
                              <? } ?>  
                            </select>
                        </div>
 
                        <div class="col-md-6 m-b-15">
                            <label>Camara:</label>
                            <select  id="camara" name=info[camara] class="input-sm form-control "  >
                              <?   foreach ($camaras AS $key){ ?>
                                <option value="<?= $key ?>" <?= ($key == $producto['camara'])?'selected': '' ?> ><?= $key ?></option> 
                              <? } ?>  
                            </select>
                        </div>
 
                        <div class="col-md-6 m-b-15">
                            <label>Red:</label>
                            <select  id="red" name=info[red] class="input-sm form-control "  >
                              <?   foreach ($redes AS $key){ ?>
                                <option value="<?= $key ?>" <?= ($key == $producto['red'])?'selected': '' ?> ><?= $key ?></option> 
                              <? } ?>  
                            </select>
                        </div>
 
                        <div class="col-md-6 m-b-15">
                            <label>Estado:</label>
                            <select  id="estado" name=info[estado] class="input-sm form-control "  >
                              <?   foreach ($estado AS $key){ ?>
                                <option value="<?= $key ?>" <?= ($key == $producto['estado'])?'selected': '' ?> ><?= $key ?></option> 
                              <? } ?>  
                            </select>
                        </div>
                        
                        <!--div class="col-md-4 m-b-15">
             
                            <label>Imágen para los listados:</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail form-control"style="max-width: 170px; max-height: 170px;" ><?= ($producto['imagen']!= '')?'<img src="'.base_url().'uploads/productos/s'.$producto['imagen'].'" />':'' ?></div>
                                
                                <div>
                                    <span class="btn btn-file btn-alt btn-sm">
                                        <span class="fileupload-new">Seleccione una Imágen</span>
                                        <span class="fileupload-exists">Cambiar</span>
                                        <input type="file" name='userfile'  />
                                    </span>
                                    <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Eliminar</a>
                                </div>
                            </div>
                            
                        </div >
                        
                        <div class="col-md-4 m-b-15">                    
                            <div class="alert alert-info alert-icon">
                                Esta imagen aparecerá en los listados, su formato debe ser PNG o  JPG, su tamaño recomendado es de 285px de ancho por 285px de alto. Despues de subir la imágen, por favor verifique que se visualice correctamente en la página web.
                                <i class="icon">&#61770;</i>
                            </div>
                        </div -->
 
                        <div class="col-md-12 m-b-15">
                            <label>Descripción completa del producto:</label>
                            <textarea  placeholder="Producto:" name="info[descripcion]" class='span12 ckeditor'  id="ck" ><?= $producto['descripcion'] ?></textarea>
                        </div>


                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5">Guardar</button>
                        </div>
            
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5"  onclick="location = '<?= base_url() ?>producto/lista' " >Cancelar</button>
                        </div>
                        </form>
                        
                        <div class="col-md-12 m-b-15">
                        <h3 class="block-title">Agrega Imágenes del Producto</h3>
                        
                        <ul id="sortable">
                         
                         <? for($i=0; $i<6; $i++ ){ ?>
                         
                         <form name="formulario<?= $i ?>" id="formulario<?= $i ?>" enctype="multipart/form-data">
                         <li class="ui-state-default">             
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail form-control" style="width: 280px; height: 280px; padding: 0px;" id="thumb<?= $i ?>"  >
                                    <?= (isset ($imagenes[$i]['imagen']) )?'<img src="'.base_url().'uploads/productos/s'.$imagenes[$i]['imagen'].'" />':'' ?>        
                                </div>
                                <div>
                                    <input type="hidden" id="fileId<?= $i ?>" value="<?= (isset ($imagenes[$i]['id_imagen']) )?$imagenes[$i]['id_imagen']:'' ?>" >
                                    <input type="hidden" id="filePos<?= $i ?>" value="<?= (isset($imagenes[$i]['posicion']))?$imagenes[$i]['posicion']:$i ?>" >
                                    <span class="btn btn-file btn-alt btn-sm">
                                        <span class="fileupload">Seleccione una Imágen</span>
                                        <input type="file" name='file<?= $i ?>' class='fileup' id='<?= $i ?>'  />
                                    </span>
                                    <span class="btn btn-file btn-alt btn-sm" data-dismiss="fileupload" onClick="eliminar(<?= $i ?>)">Eliminar</span>
                                </div>
                            </div>
                         </li>
                         </form>

                         <? } ?>
                                                                           
                        </ul>

                        </div>
          

                    </div>
            

                </div>
                

                <hr class="whiter" />
                
                 
             </section>

            <!-- Older IE Message -->
         </section>
        
        <!-- Javascript Libraries -->

        <script src="<?= base_url() ?>resources/plugins/ckeditor/ckeditor.js"></script>
        <!-- Javascript Libraries -->
        <? $this->load->view('panel/includes/footer') ?>
         <!-- Message -->
        <script src="<?= base_url() ?>resources/plugins/message/jquery.toastmessage.js"></script>



        <script type="text/javascript">


            $(document).ready(function(){

                $( "#sortable" ).sortable({
                    cancel: ".fixed,input"
                });
               // $( "#sortable" ).disableSelection();


            });


             $(function(){

                $(".fileup").on("change", function(){


                    var ruta = "<?= site_url()?>producto/editar_imagen";
                    var ruta_img = "<?= site_url()?>uploads/productos/s";
                    var id = "#thumb"+this.id;
                    var fileId = "#fileId"+this.id;
                    var filePos = "#filePos"+this.id;
                    var formulario = "#formulario"+this.id;
                    
                    var formData = new FormData($(formulario)[0]);
                             
                    $(id).html(' <img src="<?= base_url() ?>resources/panel/img/loadinfo.gif"  />');

                    formData.append('name', this.name);
                    formData.append('id', $(fileId).val());
                    formData.append('pos', $(filePos).val());
                    formData.append('id_galeria', $('#id_galeria').val());


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
                                $(fileId).val(respuesta.id_slide);

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
                 
                    $.post('<?= site_url()?>producto/eliminar_imagen',{id : $(fileId).val()}, 
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
