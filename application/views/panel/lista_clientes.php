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
                    <li class="active">Lista de Clientes</li>
                </ol>
   
                <h4 class="page-title">Clientes</h4>
                                
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                <hr class="whiter" />
                
                <!-- Quick Stats -->
                <div class="block-area">
                    
                    <div class="row">

                        <h4 class="page-title">Lista de clientes registrados</h4>
                        <div class="panel panel-default">
                          <!-- Default panel contents -->

                          <!-- Table -->
                          <div class="box-content nopadding" >                           
                              <table class="table table-hover table-nomargin table-bordered" id="clientes">
                                  <thead>
                                      <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                        <th>Email</th>
                                        <th>Opciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <? foreach($clientes as $cliente){ 
                                          $url_calificar= base_url().'cliente/calificar/'.$cliente['id_cliente'];
                                      ?> 
                                        <tr id="row_<?= $cliente['id_cliente'] ?>">
                                          <td><?= $cliente['id_cliente'] ?></th>
                                          <td><?= $cliente['nombres'] ?></th>
                                          <td><?= $cliente['telefono'] ?></td>
                                          <td><?= $cliente['direccion'] ?></td>
                                          <td></td>
                                          <td><?= $cliente['email'] ?></td>
                                          <td style="width:120px"> <a class="delete btn btn-mini btn-danger"  href="javascript:borrar(<?= $cliente['id_cliente'] ?>)" >Eliminar</a></td>
                                       </tr>
                                      <? } ?>
                                  </tbody>
                                </table>
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
        <script src="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/TableTools.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/ColReorder.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/ColVis.min.js"></script>
        <script src="<?= base_url() ?>resources/plugins/datatables/jquery.dataTables.columnFilter.js"></script>

        <script src="<?= base_url() ?>resources/plugins/message/jquery.toastmessage.js"></script>

       <!--  Form Related -->
       <script src="<?= base_url() ?>resources/panel/js/icheck.js"></script> <!-- Custom Checkbox + Radio -->

 

        <script type="text/javascript">

                /* --------------------------------------------------------
                 Checkbox + Radio
                 -----------------------------------------------------------*/
              $(document).ready(function(){


               /* Table initialisation */

                $('#clientes').dataTable( {
                    "aaSorting": [[ 0, "desc" ]],
                    sPaginationType:"full_numbers",
                    "iDisplayLength": 25,
                    oLanguage:{sSearch:"<span>Buscar:</span> ",sInfo:"Mostrando <span>_START_</span> a <span>_END_</span> de <span>_TOTAL_</span> Clientes",sLengthMenu:"_MENU_ <span>Clientes por página</span>",sInfoEmpty: "Mostrando 0 a 0 de 0 Clientes",sInfoFiltered: "(Filtrado de _MAX_ total)",sZeroRecords: "No hay Clientes",oPaginate: {"sFirst": "Primero", "sPrevious":   "Anterior","sNext": "Siguiente", "sLast": "Último"}}} );


                  
                  if($('input:checkbox, input:radio')[0]) {
                    
                    //Checkbox + Radio skin
                    $('input:checkbox:not([data-toggle="buttons"] input, .make-switch input), input:radio:not([data-toggle="buttons"] input)').iCheck({
                          checkboxClass: 'icheckbox_minimal',
                          radioClass: 'iradio_minimal',
                          increaseArea: '20%' // optional
                    });
                  }

              });

              //borra un cliente
              function borrar(id){
                  if(confirm("Está Seguro de eliminar el cliente?")){
                  var nTr = $("#row_"+id)[0];
                   var oTable = $('#clientes').dataTable(); 


                  oTable.fnDeleteRow(nTr, function(){      
                        $.post('<?= site_url()?>cliente/eliminar',{id : id}, 
                        function(data){
                         respuesta = eval('(' +data+ ')');

                         $().toastmessage('showToast', {text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });

                      })
                   })
                  }
              }
   

            $('.check').on('ifChecked', function(e){
 
                jQuery.post('<?= site_url()?>/cliente/cambiarPago', 
                    { id : this.value, pagado : 'Si' }, 
                    function(data){
                         resp = eval('(' +data+ ')');
                         if(resp.estado == 'Success'){
                            alert('El pago del cliente ahora está activo');
                         }else{
                            alert(resp.mensaje);    
                         }
                     })
                     
            });

            $('.check').on('ifUnchecked', function(e){

                jQuery.post('<?= site_url()?>/cliente/cambiarPago', 
                    { id : this.value, pagado : 'No' }, 
                    function(data){
                         resp = eval('(' +data+ ')');
                         if(resp.estado == 'Success'){
                            alert('El pago del cliente ahora está inactivo');
                         }else{
                            alert(resp.mensaje);    
                         }
                     })
            });

 
        </script>

    </body>
</html>
