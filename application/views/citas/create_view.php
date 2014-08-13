<!-- Main content starts -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Nuevo Paciente</h3>
</div>
<div class="modal-body">
<?php $create_form = array('id'=>'clients-form', 'class' => 'form-horizontal'); ?>

<?php echo form_open('clients/save', $create_form); ?>

                  <div class="row">

                        <div class="span4">
                            <div class="control-group">
                              <label class="control-label" for="nombre">Nombre</label>
                              <div class="controls">
                                <input type="text" id="nombre" name="nombre" class="span3" placeholder="Nombre(s)">
                              </div>
                            </div>
                        </div>
                        <div class="span4">

                          <div class="control-group">
                            <label class="control-label" for="apellidos">Apellidos</label>
                            <div class="controls">
                              <input type="text" id="apellidos" name="apellidos" class="span3" placeholder="Apellido(s)">
                            </div>
                          </div>                          
                        </div>
                      <div class="span4">
                        <div class="control-group">
                          <label class="control-label" for="telefono">Tel&eacute;fono</label>
                          <div class="controls">
                            <input type="text" id="telefono" name="telefono" class="span3" placeholder="Tel&eacute;fono">
                          </div>
                        </div>                          
                      </div>

                  </div>                      


          <div class="row">
            <div class="span4">
              <div class="control-group">
                <label class="control-label" for="motivo">Motivo:</label>
                <div class="controls">
                  <select id="motivo" name="motivo">
                    <option value="1">Selecciona Procedimiento</option>
                    
                    <?php 
                    if (isset($procedimientos) && !empty($procedimientos)) {
                      foreach ($procedimientos as $procedimiento) {
                        echo "<option value=\"".$procedimiento->id."\">".$procedimiento->concepto."</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>                          
            </div>
            <div class="span4">
              <div class="control-group">
                <label class="control-label" for="doctor">Doctor:</label>
                <div class="controls">
                  <select id="doctor" name="doctor">
                    <option value="">Selecciona Doctor</option>
                    <?php 
                      if (isset($doctores) && !empty($doctores)) {
                        foreach ($doctores as $doctor) {
                          echo "<option value=\"".$doctor->user_id."\">".$doctor->first_name."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>                          
            </div>
          </div>

          

         
<?php echo form_close(); ?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">cerrar</button>
<button id="quickadd" class="btn btn-primary">Grabar</button>
</div>
</div>
<div class="content">

      <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

			<?php $data["current"] = NULL; $this->load->view("citas/includes/menu",$data); ?>

          </ul>

        </div>

    </div>

    <!-- Sidebar ends -->
  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Citas 
          <!-- page meta -->
          <span class="page-meta">Nueva</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         

          <div class="row-fluid">
           <!-- Dashboard Graph starts -->

          <div class="row-fluid">

            <div class="span12">

              <div class="widget wlightblue">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left"><strong>Nueva Cita</strong></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                       <div class="padd">
                  <!-- Widget content -->
                  <!-- Task list starts -->
<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>

<?php if (!empty($message)) { echo $message; } ?>

           <div class="widget wlightblue">

                
          <?php $create_form = array('id'=>'cita-form','class' => 'form-horizontal'); ?>

              <?php echo form_open('citas/save', $create_form); ?>
                      <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal; ?>">
                      <input type="hidden" id="creada_por" name="creada_por" value="<?php echo $recepcionista; ?>">
                      <input type="hidden" id="asunto_text" name="asunto_text" value="">
                      <input type="hidden" id="atendido" name="atendido" >
                      <input type="hidden" id="paciente_text" name="paciente_text" value="">
                      <input type="hidden" id="tipo_text" name="tipo_text" value="">
                      <input type="hidden" id="atiende_text" name="atiende_text" value="">
                      <input type="hidden" id="paciente_id" name="paciente_id" value="">
                      <div class="row-fluid">
                      <div class="control-group">
                            <label class="control-label" for="asunto">Asunto</label>
                            <div class="controls">
                              <select id="asunto" name="asunto" class="combobox input-large">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($procedimientos) && !empty($procedimientos)) {
                                  foreach ($procedimientos as $procedimiento) {
                                    echo "<option value=\"".$procedimiento->id."\">".$procedimiento->concepto."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                      <div class="row-fluid">
                      <div class="control-group">
                            <label class="control-label" for="paciente">Paciente</label>
                            <div class="controls">
                            <input id="paciente" name="paciente" class="typeahead" type="text" data-provide="typeahead" autocomplete="off" placeholder="Buscar por nombre...">
                            <a href="#myModal" role="button" data-toggle="modal"> <i class="icon-plus"></i> nuevo paciente</a>
                          </div>
                     </div>
                   </div>
                      <div class="row-fluid">
                          <div class="control-group">
                            <label class="control-label" for="genero">Atendido por:</label>
                            <div class="controls">
                              <div id="switch-atendido" class="switcher" data-on-label="<i class='icon-female icon-white'></i>" data-off-label="<i class='icon-stethoscope'></i>">
                                <input type="checkbox" checked />
                              </div>                              
                              <input type="hidden" id="tipo" name="tipo" value="cosmetologa">
                            </div>
                          </div> 
                   </div>
                      <div id="cosmetologas-listing" class="row-fluid">
                      <div class="control-group">
                            <label class="control-label" for="cosmetologa">Cosmetologa</label>
                            <div class="controls">
                              <select id="atiende1" name="atiende" class="combobox input-large">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($cosmetologas) && !empty($cosmetologas)) {
                                  foreach ($cosmetologas as $cosmetologa) {
                                    echo "<option value=\"".$cosmetologa->user_id."\">".$cosmetologa->first_name."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                      <div id="doctores-listing" class="row-fluid">
                      <div class="control-group">
                            <label class="control-label" for="doctor">Doctor</label>
                            <div class="controls">
                              <select id="atiende2" name="atiende" class="combobox input-large">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($doctores) && !empty($doctores)) {
                                  foreach ($doctores as $doctor) {
                                    echo "<option value=\"".$doctor->user_id."\">".$doctor->first_name."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                   <div class="row-fluid">
                    <div class="control-group">
                      <label class="control-label" for="fecha_inicio">Fecha</label>
                      <div class="controls">
                        <div class="input-append datetimepicker1">
                          <input data-format="yyyy-MM-dd" type="text" id="fecha_inicio" name="fecha_inicio" class=" input-small">
                          <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>    
                   </div>
                   <div class="row-fluid">
                   <div class="span3">
                    <div class="control-group">
                      <label class="control-label" for="hora_inicio">Desde</label>
                      <div class="controls">
                        <div class="input-append bootstrap-timepicker1">
                          <input type="text" id="hora_inicio" name="hora_inicio" class=" input-mini">
                          <span class="add-on"><i class="icon-time"></i></span>
                        </div>
                      </div>
                    </div>    
                   </div>
                   <div class="span3">
                    <div class="control-group">
                      <label class="control-label" for="hora_fin">Hasta</label>
                      <div class="controls">
                        <div class="input-append bootstrap-timepicker2">
                          <input type="text" id="hora_fin" name="hora_fin" class=" input-mini">
                          <span class="add-on"><i class="icon-time"></i></span>
                        </div>
                      </div>
                    </div>    
                   </div>
                   </div>

                      <div class="row-fluid">
                      <div class="control-group">
                        <label class="control-label" for="comentarios_adicionales">Comentarios Adicionales</label>
                        <div class="controls">
                            <textarea name="comentarios_adicionales" id="comentarios_adicionales" style="width: 100%;">
								Escribe aqui los comentarios
                            </textarea>
                        </div>
                      </div>  
                      </div>
                      <hr>
                      <div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>
                      <?php echo form_close(); ?>
                  <div class="clearfix"></div>  


                </div>

              </div>

            </div>
          </div>
          <!-- Dashboard graph ends -->
                </div>

                <div class="widget-foot">
                    <!-- Footer goes here -->
                </div>

              </div> 
            </div>            
          </div>  
        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->


 

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 