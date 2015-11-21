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
                    <li class="active">Lista de pedidos</li>
                </ol>
                
                <h4 class="page-title">Pedidos</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                <hr class="whiter" />
                                
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    <h3 class="block-title">Lista de pedidos</h3>
                    <a href="<?= base_url() ?>pedido/agregar"><button type="button" class="btn btn-primary">Agregar pedido</button></a>
                   
                    <div class="box-content nopadding" >                           
                        <table class="table table-hover table-nomargin table-bordered" id="pedidos">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                <? foreach($pedidos as $pedido) { ?>
                                <tr id="row_<?= $pedido['id_pedido'] ?>">
                                  <td><?= $pedido['id_pedido'] ?></td>
                                  <td></td>
                                  <td></td>
                                  <td style="width:200px"><a class="btn btn-mini" href="<?= base_url() ?>pedido/editar/<?= $pedido['id_pedido']  ?>">Editar</a> <a class="delete btn btn-mini btn-danger"  href="javascript:borrar(<?= $pedido['id_pedido'] ?>)" >Eliminar</a></td>
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

                $('#pedidos').dataTable( {
                    sPaginationType:"full_numbers",
                    "iDisplayLength": 25,
                    oLanguage:{sSearch:"<span>Buscar:</span> ",sInfo:"Mostrando <span>_START_</span> a <span>_END_</span> de <span>_TOTAL_</span> Pedidos",sLengthMenu:"_MENU_ <span>Pedidos por página</span>",sInfoEmpty: "Mostrando 0 a 0 de 0 pedidos",sInfoFiltered: "(Filtrado de _MAX_ total)",sZeroRecords: "No hay pedidos",oPaginate: {"sFirst": "Primero", "sPrevious":   "Anterior","sNext": "Siguiente", "sLast": "Último"}}} );


            });


            function borrar(id){
                if(confirm("Está Seguro de eliminar el pedido?")){
                var nTr = $("#row_"+id)[0];
                 var oTable = $('#pedidos').dataTable(); 


                oTable.fnDeleteRow(nTr, function(){      
                      $.post('<?= site_url()?>pedido/eliminar',{id : id}, 
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
