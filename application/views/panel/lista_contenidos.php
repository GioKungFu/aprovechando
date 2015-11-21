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
                    <li class="active">Lista de Contenidos</li>
                </ol>
                
                <h4 class="page-title">Contenidos</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                <hr class="whiter" />
                                
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    <h3 class="block-title">Lista de contenidos</h3>
                    <a href="<?= base_url() ?>contenido/agregar_contenido"><button type="button" class="btn btn-primary">Agregar Contenido</button></a>
                   
                    <div class="box-content nopadding" >                           
                        <table class="table table-hover table-nomargin table-bordered" id="contenidos">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                <? foreach($contenidos as $contenido) { ?>
                                <tr id="row_<?= $contenido['id_contenido'] ?>">
                                  <td><?= $contenido['id_contenido'] ?></td>
                                  <td><?= $contenido['titulo'] ?></td>
                                  <td style="width:200px"><a class="btn btn-mini" href="<?= base_url() ?>contenido/editar/<?= $contenido['id_contenido']  ?>">Editar</a> <a class="delete btn btn-mini btn-danger"  href="javascript:borrar(<?= $contenido['id_contenido'] ?>)" >Eliminar</a></td>
                                </tr>
                                <? } ?>
                            </tbody>
                        </table>
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
        
        <!-- dataTables -->
        <script src="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/TableTools.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/ColReorder.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/ColVis.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.columnFilter.js"></script>

        <script src="<?= base_url() ?>resources/plugins/message/jquery.toastmessage.js"></script>

        <script type="text/javascript">


            $(document).ready(function(){

                /* Table initialisation */

                $('#contenidos').dataTable( {
                    "aaSorting": [[ 0, "desc" ]],
                    sPaginationType:"full_numbers",
                    oLanguage:{sSearch:"<span>Buscar:</span> ",sInfo:"Mostrando <span>_START_</span> a <span>_END_</span> de <span>_TOTAL_</span> Pedidos",sLengthMenu:"_MENU_ <span>Pedidos por página</span>",sInfoEmpty: "Mostrando 0 a 0 de 0 pedidos",sInfoFiltered: "(Filtrado de _MAX_ total)",sZeroRecords: "No hay pedidos",oPaginate: {"sFirst": "Primero", "sPrevious":   "Anterior","sNext": "Siguiente", "sLast": "Último"}}} );

     
            });



            function borrar(id){
                if(confirm("Está Seguro de eliminar el contenido?")){
                var nTr = $("#row_"+id)[0];
                 var oTable = $('#contenidos').dataTable(); 


                oTable.fnDeleteRow(nTr, function(){      
                      $.post('<?= site_url()?>/contenido/eliminar',{id : id}, 
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
