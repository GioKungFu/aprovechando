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
                    <li><a href="<?= base_url() ?>estudiante/lista" >Estudiantes</a></li>
                    <li class="active">Calificar estudiante</a></li>
                </ol>
                
                <h4 class="page-title">Estudiantes</h4>
                                                               
                <!-- Shortcuts -->
                <? $this->load->view('panel/includes/shortcuts') ?>
                
                
                <hr class="whiter" />
                
                
                <!-- Input Masking -->
                <div class="block-area" id="input-masking">
                    
                    <h3 class="block-title">Calificar estudiante ( <?= $usr['nombres'] ?> )</h3>
                    
                    <br/>
                    
                    <form action="" method="post" id="form_content">
                    <div class="row">
                        
                        <h3 class="block-title">Taller 1</h3>
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[0]['numero'] ?></span> <?= $preguntas[0]['pregunta'] ?></h4>
                        </div>

                        <div class="col-md-11 m-b-15">
                            <input type="text" class="form-control"  name="respuestas[0][respuesta]"  value="<?= $respuestas[0]['respuesta'] ?>" required="required">
                            <input type="hidden" name="respuestas[0][id_respuesta]"  value="<?= $respuestas[0]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[0][calificacion]"  >
                                <option data-icon="fa fa-check" value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" <?= ($respuestas[0]['calificacion'] == 'Correcta')?'selected':'' ?> >Correcta</option>
                                <option  <?= ($respuestas[0]['calificacion'] == 'Incorrecta')?'selected':'' ?>  value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>"   >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[0][observaciones]" > <?= $respuestas[0]['observaciones'] ?> </textarea>
                         </div>

                        <p>&nbsp;</p>
                        <hr>
     
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[1]['numero'] ?></span>  <?= $preguntas[1]['pregunta'] ?></h4>
                        </div>                    
                        <div class="col-xs-2">
                          <span class="ilab"><strong>Concepto</strong></span>
                        </div>
                         <div class="col-xs-1">
                          <span class="ilab"><strong>Número</strong></span>
                        </div>
                        <div class="col-xs-8">
                          <span class="ilab"><strong>Concepto</strong></span>
                        </div>
                        <div class="col-xs-1">
                          <span class="ilab">&nbsp;</span>
                        </div>
        
                        
                        <div class="col-xs-2">
                          <span class="ilab">1. Alimento</span>
                        </div>
                         <div class="col-xs-1">
                           <input type="text"  class="form-control" name="respuestas[1][respuesta]"  value="<?= $respuestas[1]['respuesta'] ?>" maxlength="255"  required="required"  > 
                            <input type="hidden" name="respuestas[1][id_respuesta]"  value="<?= $respuestas[1]['id_respuesta'] ?>">
                        </div>
                        <div class="col-xs-8">
                            <input type="text"  class="form-control" value="Enfermedades Transmitidas por Alimentos." disabled="disabled" > 
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[1][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[1]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[1]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        
                        <div class="col-xs-2">
                          <span class="ilab">2. ETA</span>
                        </div>
                         <div class="col-xs-1">
                           <input type="text"  class="form-control" name="respuestas[2][respuesta]"  value="<?= $respuestas[2]['respuesta'] ?>" maxlength="1"   required="required" > 
                            <input type="hidden" name="respuestas[2][id_respuesta]"  value="<?= $respuestas[2]['id_respuesta'] ?>">
                        </div>
                        <div class="col-xs-8">
                            <input type="text"  class="form-control" value="Sustancia destinada al consumo humano." disabled="disabled"  > 
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[2][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[2]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[2]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                  
                         <div class="col-xs-2">
                          <span class="ilab">3. Intoxicación alimentaria</span>
                        </div>
                         <div class="col-xs-1">
                           <input type="text"  class="form-control" name="respuestas[3][respuesta]"   value="<?= $respuestas[3]['respuesta'] ?>" maxlength="1"  required="required" > 
                            <input type="hidden" name="respuestas[3][id_respuesta]"  value="<?= $respuestas[3]['id_respuesta'] ?>">
                        </div>
                        <div class="col-xs-8">
                            <input type="text"  class="form-control" value="Alimento que no representa riesgo para la salud del consumidor." disabled="disabled"  > 
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[3][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[3]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[3]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                 
                        <div class="col-xs-2">
                          <span class="ilab">4. Alimento contaminado</span>
                        </div>
                         <div class="col-xs-1">
                           <input type="text"  class="form-control" name="respuestas[4][respuesta]"   value="<?= $respuestas[4]['respuesta'] ?>" maxlength="1"  required="required" > 
                            <input type="hidden" name="respuestas[4][id_respuesta]"  value="<?= $respuestas[4]['id_respuesta'] ?>">                   </div>
                        <div class="col-xs-8">
                            <input type="text"  class="form-control" value="Enfermedades causadas por microorganismos o químicos." disabled="disabled"  > 
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[4][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[4]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[4]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>

                        <div class="col-xs-2">
                          <span class="ilab">5. Inocuo</span>
                        </div>
                         <div class="col-xs-1">
                           <input type="text"  class="form-control" name="respuestas[5][respuesta]" value="<?= $respuestas[5]['respuesta'] ?>" maxlength="1"  required="required" > 
                            <input type="hidden" name="respuestas[5][id_respuesta]"  value="<?= $respuestas[5]['id_respuesta'] ?>">
                        </div>
                        <div class="col-xs-8">
                            <input type="text"  class="form-control" value="Contiene agentes o sustancias extrañas de cualquier naturaleza en cantidades superiores a las permitidas en las normas." disabled="disabled"  > 
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[5][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[5]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[5]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                         <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[5][observaciones]"  >  <?= $respuestas[5]['observaciones'] ?>  </textarea>
                        </div>

                        <p>&nbsp;</p>
                        <hr>
                    

                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[2]['numero'] ?></span> <?= $preguntas[2]['pregunta'] ?></h4>
                        </div>
                         <div class="col-xs-4">
                          <span class="ilab"><strong>Biológicas</strong></span>
                        </div>
                        <div class="col-xs-4">
                          <span class="ilab"><strong>Químicas</strong></span>
                        </div>
                        <div class="col-xs-4">
                          <span class="ilab"><strong>Físicas</strong></span>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[6][respuesta]" value="<?= $respuestas[6]['respuesta'] ?>" placeholder="1."  required="required" > 
                            <input type="hidden" name="respuestas[6][id_respuesta]"  value="<?= $respuestas[6]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[6][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[6]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[6]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[7][respuesta]" value="<?= $respuestas[7]['respuesta'] ?>" placeholder="1."  > 
                             <input type="hidden" name="respuestas[7][id_respuesta]"  value="<?= $respuestas[7]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[7][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[7]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[7]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[8][respuesta]"   value="<?= $respuestas[8]['respuesta'] ?>" placeholder="1."  > 
                            <input type="hidden" name="respuestas[8][id_respuesta]"  value="<?= $respuestas[8]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[8][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[8]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[8]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>

                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[9][respuesta]" value="<?= $respuestas[9]['respuesta'] ?>" placeholder="2."  > 
                            <input type="hidden" name="respuestas[9][id_respuesta]"  value="<?= $respuestas[9]['id_respuesta'] ?>">
                        </div>                    
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[9][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[9]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[9]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[10][respuesta]"  value="<?= $respuestas[10]['respuesta'] ?>" placeholder="2."  > 
                            <input type="hidden" name="respuestas[10][id_respuesta]"  value="<?= $respuestas[10]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[10][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[10]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[10]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[11][respuesta]"  value="<?= $respuestas[11]['respuesta'] ?>" placeholder="2."  > 
                            <input type="hidden" name="respuestas[11][id_respuesta]"  value="<?= $respuestas[11]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[11][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[11]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[11]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>

                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[12][respuesta]"  value="<?= $respuestas[12]['respuesta'] ?>" placeholder="3."  > 
                            <input type="hidden" name="respuestas[12][id_respuesta]"  value="<?= $respuestas[12]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[12][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[12]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[12]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[13][respuesta]"  value="<?= $respuestas[13]['respuesta'] ?>" placeholder="3."  > 
                            <input type="hidden" name="respuestas[13][id_respuesta]"  value="<?= $respuestas[13]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[13][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[13]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[13]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[14][respuesta]"  value="<?= $respuestas[14]['respuesta'] ?>" placeholder="3."  > 
                            <input type="hidden" name="respuestas[14][id_respuesta]"  value="<?= $respuestas[14]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[14][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[14]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[14]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>

                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[15][respuesta]"  value="<?= $respuestas[15]['respuesta'] ?>" placeholder="4."  > 
                            <input type="hidden" name="respuestas[15][id_respuesta]"  value="<?= $respuestas[15]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[15][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[15]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[15]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[16][respuesta]"  value="<?= $respuestas[16]['respuesta'] ?>" placeholder="4."  > 
                            <input type="hidden" name="respuestas[16][id_respuesta]"  value="<?= $respuestas[16]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[16][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[16]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[16]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[17][respuesta]"  value="<?= $respuestas[17]['respuesta'] ?>" placeholder="4."  > 
                            <input type="hidden" name="respuestas[17][id_respuesta]"  value="<?= $respuestas[17]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[17][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[17]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[17]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>

                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[18][respuesta]"  value="<?= $respuestas[18]['respuesta'] ?>" placeholder="5."  > 
                            <input type="hidden" name="respuestas[18][id_respuesta]"  value="<?= $respuestas[18]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[18][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[18]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[18]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                           <input type="text" class="form-control" name="respuestas[19][respuesta]" value="<?= $respuestas[19]['respuesta'] ?>" placeholder="5."  > 
                            <input type="hidden" name="respuestas[19][id_respuesta]"  value="<?= $respuestas[19]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[19][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[19]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[19]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="respuestas[20][respuesta]"  value="<?= $respuestas[20]['respuesta'] ?>" placeholder="5."  > 
                            <input type="hidden" name="respuestas[20][id_respuesta]"  value="<?= $respuestas[20]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[20][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[20]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[20]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[20][observaciones]" > <?= $respuestas[20]['observaciones'] ?>  </textarea>
                        </div>

                    
                        <p>&nbsp;</p>
                        <hr>
                        
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[3]['numero'] ?></span> <?= $preguntas[3]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>a)</strong> La cadena de frío es un aseguramiento de la calidad controlando la temperatura de los alimentos.</span>                        
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[21][respuesta]"  value="<?= $respuestas[21]['respuesta'] ?>"  required="required" > 
                            <input type="hidden" name="respuestas[21][id_respuesta]"  value="<?= $respuestas[21]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[20][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[20]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[20]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>b)</strong> El control de la temperatura solo se hace en algunas fases de los alimentos.</span>                        
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[22][respuesta]"  value="<?= $respuestas[22]['respuesta'] ?>" required="required"> 
                            <input type="hidden" name="respuestas[22][id_respuesta]"  value="<?= $respuestas[22]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[22][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[22]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[22]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>c)</strong> Las bajas temperaturas permiten el crecimiento de microorganismos.</span>                        
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[23][respuesta]"   value="<?= $respuestas[23]['respuesta'] ?>"> 
                            <input type="hidden" name="respuestas[23][id_respuesta]"  value="<?= $respuestas[23]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[23][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[23]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[23]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                       <div class="col-xs-10">
                            <span class="ilab"><strong>d)</strong>  La zona de peligro, donde las bacterias se reproducen rápidamente, se encuentra entre 5°C y 60°C.</span>                        
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[24][respuesta]"  value="<?= $respuestas[24]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[24][id_respuesta]"  value="<?= $respuestas[24]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[24][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[24]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[24]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[24][observaciones]" > <?= $respuestas[24]['observaciones'] ?> </textarea>
                         </div>
                        
                        <p>&nbsp;</p>
                        <hr>

     
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[4]['numero'] ?></span>  <?= $preguntas[4]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[25][respuesta]" > <?= $respuestas[25]['respuesta'] ?> </textarea>
                            <input type="hidden" name="respuestas[25][id_respuesta]"  value="<?= $respuestas[25]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[25][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[25]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[25]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[25][observaciones]" > <?= $respuestas[25]['observaciones'] ?> </textarea>
                         </div>
                        
                        <p>&nbsp;</p>
                        <hr>
      
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[5]['numero'] ?></span> <?= $preguntas[5]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[26][respuesta]" > <?= $respuestas[26]['respuesta'] ?> </textarea>
                            <input type="hidden" name="respuestas[26][id_respuesta]"  value="<?= $respuestas[26]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[26][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[26]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[26]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[26][observaciones]" > <?= $respuestas[26]['observaciones'] ?> </textarea>
                         </div>
      
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[6]['numero'] ?></span> <?= $preguntas[6]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos1.png" alt=""  width="99px"  height="95px"  class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos2.png" alt=""  width="135px"  height="110px"  class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos3.png" alt=""  width="119px"  height="94px"  class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos4.png" alt=""   width="145px" height="90px"  class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos5.png" alt=""  width="135px"  height="110px"   class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos6.png" alt=""   width="135px" height="110px"  class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[27][respuesta]" value="<?= $respuestas[27]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[27][id_respuesta]"  value="<?= $respuestas[27]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[27][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[27]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[27]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[28][respuesta]"  value="<?= $respuestas[28]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[28][id_respuesta]"  value="<?= $respuestas[28]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[28][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[28]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[28]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[29][respuesta]"  value="<?= $respuestas[29]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[29][id_respuesta]"  value="<?= $respuestas[29]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[29][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[29]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[29]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[30][respuesta]"  value="<?= $respuestas[30]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[30][id_respuesta]"  value="<?= $respuestas[30]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[30][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[30]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[30]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[31][respuesta]"  value="<?= $respuestas[31]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[31][id_respuesta]"  value="<?= $respuestas[31]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[31][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[31]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[31]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[32][respuesta]"  value="<?= $respuestas[32]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[32][id_respuesta]"  value="<?= $respuestas[32]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[32][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[32]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[32]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos7.png" alt=""   width="100px" height="90px"    class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos8.png" alt=""   width="125px" height="90px"    class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos9.png" alt=""    width="110px" height="90px"   class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos10.png" alt=""   width="135px" height="90px"  class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos11.png" alt=""  width="135px"  height="110px"   class="img-responsive img-rounded"/></figure>                    
                        </div>
                        <div class="col-xs-2">
                            <figure><img src="<?= base_url() ?>resources/site/images/manos12.png" alt=""   width="135px" height="110px"  class="img-responsive img-rounded"/></figure>                    
                        </div>

                        <div class="col-xs-1">
                             <input type="text" class="form-control" name="respuestas[33][respuesta]"  value="<?= $respuestas[33]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[33][id_respuesta]"  value="<?= $respuestas[33]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[33][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[33]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[33]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[34][respuesta]"  value="<?= $respuestas[34]['respuesta'] ?>" > 
                             <input type="hidden" name="respuestas[34][id_respuesta]"  value="<?= $respuestas[34]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[34][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[34]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[34]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[35][respuesta]"  value="<?= $respuestas[35]['respuesta'] ?>" > 
                             <input type="hidden" name="respuestas[35][id_respuesta]"  value="<?= $respuestas[35]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[35][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[35]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[35]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[36][respuesta]"  value="<?= $respuestas[36]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[36][id_respuesta]"  value="<?= $respuestas[36]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[36][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[36]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[36]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                             <input type="text" class="form-control" name="respuestas[37][respuesta]"  value="<?= $respuestas[37]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[37][id_respuesta]"  value="<?= $respuestas[37]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[37][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[37]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[37]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-1">
                            <input type="text" class="form-control" name="respuestas[38][respuesta]"  value="<?= $respuestas[38]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[38][id_respuesta]"  value="<?= $respuestas[38]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[38][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[38]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[38]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[38][observaciones]" > <?= $respuestas[38]['observaciones'] ?> </textarea>
                         </div>
                    
                        <p>&nbsp;</p>
                        <hr>
                        

                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[7]['numero'] ?></span> <?= $preguntas[7]['pregunta'] ?> </h4>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[39][respuesta]"  value="<?= $respuestas[39]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[39][id_respuesta]"  value="<?= $respuestas[39]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[39][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[39]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[39]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[40][respuesta]"  value="<?= $respuestas[40]['respuesta'] ?>"   > 
                            <input type="hidden" name="respuestas[40][id_respuesta]"  value="<?= $respuestas[40]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[40][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[40]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[40]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[41][respuesta]"  value="<?= $respuestas[41]['respuesta'] ?>"   > 
                            <input type="hidden" name="respuestas[41][id_respuesta]"  value="<?= $respuestas[41]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[41][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[41]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[41]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[42][respuesta]"  value="<?= $respuestas[42]['respuesta'] ?>"   > 
                            <input type="hidden" name="respuestas[42][id_respuesta]"  value="<?= $respuestas[42]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[42][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[42]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[42]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[43][respuesta]"  value="<?= $respuestas[43]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[43][id_respuesta]"  value="<?= $respuestas[43]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[43][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[43]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[43]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[44][respuesta]"  value="<?= $respuestas[44]['respuesta'] ?>"   > 
                            <input type="hidden" name="respuestas[44][id_respuesta]"  value="<?= $respuestas[44]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[44][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[44]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[44]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[44][observaciones]" > <?= $respuestas[44]['observaciones'] ?> </textarea>
                         </div>
                      
                        <p>&nbsp;</p>
                        <hr>

                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[8]['numero'] ?></span> <?= $preguntas[8]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>a)</strong> Las manos solo se lavan al entrar al área de trabajo.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[45][respuesta]"  value="<?= $respuestas[45]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[45][id_respuesta]"  value="<?= $respuestas[45]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[45][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[45]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[45]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>b)</strong> El manipulador no debe conversar sobre los alimentos.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[46][respuesta]"  value="<?= $respuestas[46]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[46][id_respuesta]"  value="<?= $respuestas[46]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[46][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[46]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[46]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>c)</strong>  Se permite el uso de adornos en las manos y de maquillaje.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[47][respuesta]" value="<?= $respuestas[47]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[47][id_respuesta]"  value="<?= $respuestas[47]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[47][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[47]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[47]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>d)</strong>   Los alimentos que al llegar al área de recibo no tengan la temperatura correcta, se deben rechazar.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[48][respuesta]"  value="<?= $respuestas[48]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[48][id_respuesta]"  value="<?= $respuestas[48]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[48][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[48]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[48]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[48][observaciones]" > <?= $respuestas[48]['observaciones'] ?> </textarea>
                         </div>
                        
                        <p>&nbsp;</p>
                        <hr>


                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[9]['numero'] ?></span> <?= $preguntas[9]['pregunta'] ?> </h4>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[49][respuesta]"  value="<?= $respuestas[49]['respuesta'] ?>"   > 
                            <input type="hidden" name="respuestas[49][id_respuesta]"  value="<?= $respuestas[49]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[49][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[49]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[49]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[50][respuesta]"  value="<?= $respuestas[50]['respuesta'] ?>"   > 
                            <input type="hidden" name="respuestas[50][id_respuesta]"  value="<?= $respuestas[50]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[50][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[50]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[50]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[51][respuesta]"  value="<?= $respuestas[51]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[51][id_respuesta]"  value="<?= $respuestas[51]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[51][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[51]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[51]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[52][respuesta]"  value="<?= $respuestas[52]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[52][id_respuesta]"  value="<?= $respuestas[52]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[52][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[52]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[52]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[52][observaciones]" > <?= $respuestas[52]['observaciones'] ?> </textarea>
                         </div>
                       
                        <p>&nbsp;</p>
                        <hr>



                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[10]['numero'] ?></span> <?= $preguntas[10]['pregunta'] ?> </h4>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[53][respuesta]"  value="<?= $respuestas[53]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[53][id_respuesta]"  value="<?= $respuestas[53]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[53][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[53]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[53]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[54][respuesta]"  value="<?= $respuestas[54]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[54][id_respuesta]"  value="<?= $respuestas[54]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[54][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[54]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[54]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[55][respuesta]"  value="<?= $respuestas[55]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[55][id_respuesta]"  value="<?= $respuestas[55]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[55][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[55]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[55]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[56][respuesta]"  value="<?= $respuestas[56]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[56][id_respuesta]"  value="<?= $respuestas[56]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[56][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[56]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[56]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[57][respuesta]"  value="<?= $respuestas[57]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[57][id_respuesta]"  value="<?= $respuestas[57]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[57][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[57]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[57]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[58][respuesta]"  value="<?= $respuestas[58]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[58][id_respuesta]"  value="<?= $respuestas[58]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[58][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[58]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[58]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[59][respuesta]"  value="<?= $respuestas[59]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[59][id_respuesta]"  value="<?= $respuestas[59]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[59][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[59]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[59]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[60][respuesta]"  value="<?= $respuestas[60]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[60][id_respuesta]"  value="<?= $respuestas[60]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[60][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[60]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[60]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[61][respuesta]"  value="<?= $respuestas[61]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[61][id_respuesta]"  value="<?= $respuestas[61]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[61][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[61]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[61]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[62][respuesta]"  value="<?= $respuestas[62]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[62][id_respuesta]"  value="<?= $respuestas[62]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[62][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[62]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[62]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[62][observaciones]" > <?= $respuestas[62]['observaciones'] ?> </textarea>
                         </div>
                       
                        <p>&nbsp;</p>
                        <hr>


                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[11]['numero'] ?></span> <?= $preguntas[11]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[63][respuesta]"  value="<?= $respuestas[63]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[63][id_respuesta]"  value="<?= $respuestas[63]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[63][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[63]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[63]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[64][respuesta]"  value="<?= $respuestas[64]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[64][id_respuesta]"  value="<?= $respuestas[64]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[64][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[64]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[64]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[65][respuesta]"  value="<?= $respuestas[65]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[65][id_respuesta]"  value="<?= $respuestas[65]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[65][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[65]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[65]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[66][respuesta]"  value="<?= $respuestas[66]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[66][id_respuesta]"  value="<?= $respuestas[66]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[66][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[66]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[66]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[67][respuesta]"  value="<?= $respuestas[67]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[67][id_respuesta]"  value="<?= $respuestas[67]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[67][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[67]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[67]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[68][respuesta]"  value="<?= $respuestas[68]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[68][id_respuesta]"  value="<?= $respuestas[68]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[68][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[68]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[68]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[69][respuesta]"  value="<?= $respuestas[69]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[69][id_respuesta]"  value="<?= $respuestas[69]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[69][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[69]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[69]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[69][observaciones]" > <?= $respuestas[69]['observaciones'] ?> </textarea>
                         </div>
                       
                        <p>&nbsp;</p>
                        <hr>

                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[12]['numero'] ?></span> <?= $preguntas[12]['pregunta'] ?></h4>
                        </div>

                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[70][respuesta]"  value="<?= $respuestas[70]['respuesta'] ?>"  required="required" > 
                            <input type="hidden" name="respuestas[70][id_respuesta]"  value="<?= $respuestas[70]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[70][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[70]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[70]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[71][respuesta]"  value="<?= $respuestas[71]['respuesta'] ?>"  required="required" > 
                            <input type="hidden" name="respuestas[71][id_respuesta]"  value="<?= $respuestas[71]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[71][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[71]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[71]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[72][respuesta]"   value="<?= $respuestas[72]['respuesta'] ?>"  required="required" > 
                            <input type="hidden" name="respuestas[72][id_respuesta]"  value="<?= $respuestas[72]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[72][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[72]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[72]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[73][respuesta]"  value="<?= $respuestas[73]['respuesta'] ?>"  required="required" > 
                            <input type="hidden" name="respuestas[73][id_respuesta]"  value="<?= $respuestas[73]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[73][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[73]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[73]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[74][respuesta]"  value="<?= $respuestas[74]['respuesta'] ?>"  required="required" > 
                            <input type="hidden" name="respuestas[74][id_respuesta]"  value="<?= $respuestas[74]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[74][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[74]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[74]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[74][observaciones]" > <?= $respuestas[74]['observaciones'] ?> </textarea>
                         </div>
                       
                        <p>&nbsp;</p>
                        <hr>

                        <h3 class="block-title">Taller 2</h3>
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[14]['numero'] ?></span> <?= $preguntas[14]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-11">
                            <span class="ilab">Limpieza:</span>
                            <textarea class="form-control" rows="3" name="respuestas[75][respuesta]" ><?= $respuestas[75]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[75][id_respuesta]"  value="<?= $respuestas[75]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[75][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[75]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[75]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                    
                        <div class="col-xs-11">
                            <span class="ilab">Desinfección:</span>
                            <textarea class="form-control" rows="3" name="respuestas[76][respuesta]" ><?= $respuestas[76]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[76][id_respuesta]"  value="<?= $respuestas[76]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[76][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[76]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[76]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[76][observaciones]" > <?= $respuestas[76]['observaciones'] ?> </textarea>
                         </div>

                        <p>&nbsp;</p>
                        <hr>
                        
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[15]['numero'] ?></span> <?= $preguntas[15]['pregunta'] ?></h4>
                        </div>
                        <div class="col-xs-10">
                            <span class="ilab"><strong>a)</strong> Las prácticas higiénicas de L & D permiten espacios limpios aptos para la manipulacion de alimentos</span>
                         </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[77][respuesta]" value="<?= $respuestas[77]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[77][id_respuesta]"  value="<?= $respuestas[76]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[77][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[77]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[77]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                       <div class="col-xs-10">
                            <span class="ilab"><strong>b)</strong> Con las prácticas higiénicas no se pueden reducir los riesgos de presencia de plagas.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[78][respuesta]" value="<?= $respuestas[78]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[78][id_respuesta]"  value="<?= $respuestas[76]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[78][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[78]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[78]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                       <div class="col-xs-10">
                            <span class="ilab"><strong>c)</strong> Las prácticas higiénicas reducen las ETA.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[79][respuesta]" value="<?= $respuestas[79]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[79][id_respuesta]"  value="<?= $respuestas[79]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[79][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[79]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[79]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                       <div class="col-xs-10">
                            <span class="ilab"><strong>d)</strong> Las prácticas higiénicas aumenta la contaminación en los alimentos.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[80][respuesta]" value="<?= $respuestas[80]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[80][id_respuesta]"  value="<?= $respuestas[80]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[80][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[80]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[80]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                       <div class="col-xs-10">
                            <span class="ilab"><strong>e)</strong> Puedo desinfectar un área sucia.</span>
                            
                        </div>
                        <div class="col-xs-1">                       
                            <input type="text" class="form-control" name="respuestas[81][respuesta]" value="<?= $respuestas[81]['respuesta'] ?>"  > 
                            <input type="hidden" name="respuestas[81][id_respuesta]"  value="<?= $respuestas[81]['id_respuesta'] ?>">
                       </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[81][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[81]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[81]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[81][observaciones]" > <?= $respuestas[81]['observaciones'] ?> </textarea>
                         </div>
                        
                        <p>&nbsp;</p>
                        <hr>

                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[16]['numero'] ?></span>  <?= $preguntas[16]['pregunta'] ?></h4>
                        </div>

                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[82][respuesta]"   value="<?= $respuestas[82]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[82][id_respuesta]"  value="<?= $respuestas[82]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[82][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[82]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[82]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[83][respuesta]"   value="<?= $respuestas[83]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[83][id_respuesta]"  value="<?= $respuestas[83]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[83][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[83]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[83]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[84][respuesta]"  value="<?= $respuestas[84]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[84][id_respuesta]"  value="<?= $respuestas[84]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[84][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[84]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[84]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[85][respuesta]"  value="<?= $respuestas[85]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[85][id_respuesta]"  value="<?= $respuestas[85]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[85][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[85]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[85]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" name="respuestas[86][respuesta]"  value="<?= $respuestas[86]['respuesta'] ?>" > 
                            <input type="hidden" name="respuestas[86][id_respuesta]"  value="<?= $respuestas[86]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[86][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[86]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[86]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[86][observaciones]" > <?= $respuestas[86]['observaciones'] ?> </textarea>
                         </div>
                      
                        <p>&nbsp;</p>
                        <hr>

                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[17]['numero'] ?></span>  <?= $preguntas[17]['pregunta'] ?></h4>
                        </div>

                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[87][respuesta]"  ><?= $respuestas[87]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[87][id_respuesta]"  value="<?= $respuestas[87]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[87][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[87]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[87]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[88][respuesta]" ><?= $respuestas[88]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[88][id_respuesta]"  value="<?= $respuestas[88]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[88][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[88]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[88]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[89][respuesta]"  ><?= $respuestas[89]['respuesta'] ?></textarea>
                                <input type="hidden" name="respuestas[89][id_respuesta]"  value="<?= $respuestas[89]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[89][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[89]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[89]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[90][respuesta]"  ><?= $respuestas[90]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[90][id_respuesta]"  value="<?= $respuestas[90]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[90][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[90]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[90]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <textarea class="form-control" rows="3" name="respuestas[91][respuesta]"  ><?= $respuestas[91]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[91][id_respuesta]"  value="<?= $respuestas[91]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <select autocomplete="off"  class="select" name="respuestas[91][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[91]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[91]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[91][observaciones]" > <?= $respuestas[91]['observaciones'] ?> </textarea>
                         </div>
                     
                        <p>&nbsp;</p>
                        <hr>

 
                        <div class="col-md-12 m-b-15">
                            <h4><span class="badge"><?= $preguntas[18]['numero'] ?></span>  <?= $preguntas[18]['pregunta'] ?></h4>
                        </div>

                        <div class="col-xs-11">
                            <label> ¿Qué implicaciones  y consecuencias legales trae la presencia de plagas o alimentos en mal estado potencialme peligrosos para el consumo humano en los sitios donde se producen o almacenan alimentos?  :</label>
                            <textarea class="form-control" rows="3" name="respuestas[92][respuesta]" ><?= $respuestas[92]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[92][id_respuesta]"  value="<?= $respuestas[92]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[92][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[92]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[92]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <span class="ilab"> De algunos ejemplos reales de establecimientos que hayan presentado contaminacion de los alimentos o intoxicaciones a consumidores :</span>
                            <textarea class="form-control" rows="3" name="respuestas[93][respuesta]" ><?= $respuestas[93]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[93][id_respuesta]"  value="<?= $respuestas[93]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[93][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[93]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[93]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <span class="ilab"> De qué se trata el sistema PEPS o FIFO y explique su importancia a la hora de almacenar alimentos.   :</span>
                            <textarea class="form-control" rows="3" name="respuestas[94][respuesta]" ><?= $respuestas[94]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[94][id_respuesta]"  value="<?= $respuestas[94]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[94][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[94]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[94]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <span class="ilab"> .Qué ETA son transmitidas por insectos y roedores al tener estos contacto con los alimentos y explique de que forma afectan nuestra salud. De algunos ejemplos y casos reales.</span>
                            <textarea class="form-control" rows="3" name="respuestas[95][respuesta]" ><?= $respuestas[95]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[95][id_respuesta]"  value="<?= $respuestas[95]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[95][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[95]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[95]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <label></label>
                            <span class="ilab"> ¿Qué ventajas trae realizar las pruebas de laboratorio a los productos comestibles? </span>
                            <textarea class="form-control" rows="3" name="respuestas[96][respuesta]" ><?= $respuestas[96]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[96][id_respuesta]"  value="<?= $respuestas[96]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[96][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[96]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[96]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <span class="ilab">  Para mantener productos comestibles inocuo los procesadores de alimentos debemos: </span>
                            <textarea class="form-control" rows="3" name="respuestas[97][respuesta]" ><?= $respuestas[97]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[97][id_respuesta]"  value="<?= $respuestas[97]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[97][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[97]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[97]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-xs-11">
                            <span class="ilab"> ¿Qué factores incrementan los microorganismos en los alimentos?</span>
                            <textarea class="form-control" rows="3" name="respuestas[98][respuesta]" ><?= $respuestas[98]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[98][id_respuesta]"  value="<?= $respuestas[98]['id_respuesta'] ?>">
                        </div>                  
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[98][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[98]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[98]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                        <div class="col-md-11 m-b-15">
                            <span class="ilab"> ¿Cómo se puede prevenir la contaminación en los alimentos vendidos en la calle?</span>
                            <textarea class="form-control" rows="3" name="respuestas[99][respuesta]" ><?= $respuestas[99]['respuesta'] ?></textarea>
                            <input type="hidden" name="respuestas[99][id_respuesta]"  value="<?= $respuestas[99]['id_respuesta'] ?>">
                        </div>
                        <div class="col-md-1 m-b-15">
                            <label></label>
                            <select autocomplete="off"  class="select" name="respuestas[99][calificacion]"  >
                                <option data-icon="fa fa-check"  <?= ($respuestas[99]['calificacion'] == 'Correcta')?'selected':'' ?>  value="Correcta"  data-content="<span class='label label-success'>Correcta&nbsp;&nbsp;&nbsp;</span>" >Correcta</option>
                                <option  <?= ($respuestas[99]['calificacion'] == 'Incorrecta')?'selected':'' ?> value="Incorrecta"  data-content="<span class='label label-danger'>Incorrecta</span>" >Incorrecta</option>
                            </select>
                        </div>
                         <div class="col-md-12 m-b-15">
                            <label>Observaciones:</label>
                            <textarea class="form-control" rows="2" name="respuestas[99][observaciones]" > <?= $respuestas[99]['observaciones'] ?> </textarea>
                         </div>
                            
                     
                        <p>&nbsp;</p>
                        <hr>

                        <div class="col-md-12 m-b-15">
                            <h4>Estado del taller:</h4>
                        </div>
                        <div class="col-md-12 m-b-15">
                            <select autocomplete="off"  class="select" name="estado_examen"  >
                                <option  value="Pendiente de calificacion"   <?= ($usr['estado_examen'] == 'Pendiente de calificacion')?'selected':'' ?>  >Pendiente de calificación</option>
                                <option  value="Pendiente de rectificacion"   <?= ($usr['estado_examen'] == 'Pendiente de rectificacion')?'selected':'' ?>  >Pendiente de rectificación (El estudiante debe corregir preguntas)</option>
                                <option  data-icon="fa fa-check"   value="Aprobado"  <?= ($usr['estado_examen'] == 'Aprobado')?'selected':'' ?> >Aprobado (El estudiante puede recibir el certificado)</option>
                            </select>
                        </div>
                        <p>&nbsp;</p>
          
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5">Guardar</button>
                        </div>
                        <p>&nbsp;</p>
            
                        <div class="col-md-1 m-b-15">
                            <button class="btn btn-lg m-r-5"  onclick="location = '<?= base_url() ?>estudiante/lista' " >Cancelar</button>
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
        <? $this->load->view('panel/includes/footer') ?>
        <script src="<?= base_url() ?>resources/panel/js/select.min.js"></script> <!-- Custom Select -->

        <script type="text/javascript">

            /* --------------------------------------------------------
             Checkbox + Radio
            -----------------------------------------------------------*/
            $(document).ready(function(){
              
                //Select
                if($('.select')[0]) {
                    $('.select').selectpicker();
                }

            });

        </script>


     </body>
</html>
