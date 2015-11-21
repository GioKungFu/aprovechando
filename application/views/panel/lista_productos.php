<? $this->load->view('panel/includes/tags') ?>
<!-- dataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>resources/plugins/datatables/TableTools.css">
    <link rel="stylesheet" href="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.css">
 
    <link rel="stylesheet" href="<?= base_url() ?>resources/plugins/message/css/jquery.toastmessage.css">

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
                    <li class="active">Lista de productos</li>
                </ol>
                
                <h4 class="page-title">Productos</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                <hr class="whiter" />
                                
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    <h3 class="block-title">Lista de productos</h3>
                    <a href="<?= base_url() ?>producto/agregar"><button type="button" class="btn btn-primary">Agregar producto</button></a>
                   
                    <div class="box-content nopadding" >                           
                        <table class="table table-hover table-nomargin table-bordered" id="productos">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                <? foreach($productos as $producto) { ?>
                                <tr id="row_<?= $producto['id_producto'] ?>" style="width:50px">
                                  <td><?= $producto['id_producto'] ?></td>
                                  <td><a href="<?= site_url()?>producto/editar/<?= $producto['id_producto'] ?>"><?= $producto['nombre'] ?></a></td>
                                  <td><?= $producto['categoria'] ?></td>
                                  <td>$<?= number_format($producto['precio'], 0, ',', '.') ?></td>
                                  <td><?= $producto['cantidad'] ?></td>
                                  <td><?= $producto['estado'] ?></td>
                                  <td style="width:200px"><a class="btn btn-mini" href="<?= base_url() ?>producto/editar/<?= $producto['id_producto']  ?>">Editar</a> <a class="delete btn btn-mini btn-danger"  href="javascript:borrar(<?= $producto['id_producto'] ?>)" >Eliminar</a></td>
                                </tr>
                                <? } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                            
                <hr class="whiter" />
                
                <!-- Main Widgets -->
               
            </section>

             <? $this->load->view('panel/includes/older_message') ?>

        </section>
        
        <!-- Javascript Libraries -->
        <? $this->load->view('panel/includes/footer') ?>
        <script src="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/TableTools.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/ColReorder.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/ColVis.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.columnFilter.js"></script>

        <script src="<?= base_url() ?>resources/plugins/message/jquery.toastmessage.js"></script>

        <script type="text/javascript">


            $(document).ready(function(){

                /* Table initialisation */

                $('#productos').dataTable( {
                    sPaginationType:"full_numbers",
                    "iDisplayLength": 30,
                    oLanguage:{sSearch:"<span>Buscar:</span> ",sInfo:"Mostrando <span>_START_</span> a <span>_END_</span> de <span>_TOTAL_</span> Productos",sLengthMenu:"_MENU_ <span>Productos por página</span>",sInfoEmpty: "Mostrando 0 a 0 de 0 productos",sInfoFiltered: "(Filtrado de _MAX_ total)",sZeroRecords: "No hay productos",oPaginate: {"sFirst": "Primero", "sPrevious":   "Anterior","sNext": "Siguiente", "sLast": "Último"}}} );


            });


            function borrar(id){
                if(confirm("Está Seguro de eliminar el producto?")){
                var nTr = $("#row_"+id)[0];
                 var oTable = $('#productos').dataTable(); 


                oTable.fnDeleteRow(nTr, function(){      
                      $.post('<?= site_url()?>producto/eliminar',{id : id}, 
                      function(data){
                       respuesta = eval('(' +data+ ')');

                       $().toastmessage('showToast', {text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });

                    })
                 })
                }
            }

        </script>
   
    </body>
</html>
