<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "administracion"; $this->load->view("admin/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Pacientes 
          <!-- page meta -->
          <span class="page-meta">Editar Paciente</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
          
          <?php 
          if (isset($mensaje)) {
            echo "<div class=\"alert alert-success\">
                      Información Actualizada.
                    </div>";
          }
           ?>
        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Modificar Información de Paciente</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                   <div class="padd">
  <?php $create_form = array('id'=>'clients-form','class' => 'form-horizontal'); ?>
<?php echo form_open('clients/update', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $cliente->id; ?>">
<h4>Datos de Contacto</h4>
                      <hr>
                      <div class="row">
                        <div class="span4">
                            <div class="control-group">
                              <label class="control-label" for="contacto">Nombre</label>
                              <div class="controls">
                                <input type="text" id="contacto" name="contacto" value="<?php echo $cliente->nombre_contacto; ?>" class="span3">
                              </div>
                            </div>
                        </div>
                        <div class="span4">

                          <div class="control-group">
                            <label class="control-label" for="apellido_paterno">Apellido Paterno</label>
                            <div class="controls">
                              <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $cliente->apellido_paterno; ?>" class="span3">
                            </div>
                          </div>                          
                        </div>
                        <div class="span4">

                          <div class="control-group">
                            <label class="control-label" for="apellido_materno">Apellido Materno</label>
                            <div class="controls">
                              <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $cliente->apellido_materno; ?>" class="span3">
                            </div>
                          </div>                          
                        </div>                        
                      </div>                      
                      <div class="row">
                        <div class="span4">
                          <div class="control-group">
                            <label class="control-label" for="telefono">Telefono</label>
                            <div class="controls">
                              <input type="text" id="telefono" name="telefono" value="<?php echo $cliente->telefono_contacto; ?>" class="span3">
                            </div>
                          </div>                          
                        </div>
                        <div class="span4">
                          <div class="control-group">
                            <label class="control-label" for="correo">Correo Electronico</label>
                            <div class="controls">
                              <input type="text" id="correo" name="correo" value="<?php echo $cliente->email_contacto; ?>" class="span3">
                            </div>
                          </div>                           
                        </div>
                      </div>


                      <div class="row">
                        <div class="span4">
                          <div class="control-group">
                            <label class="control-label" for="profesion">Profesion</label>
                            <div class="controls">
                              <input type="text" id="profesion" name="profesion" value="<?php echo $cliente->profesion; ?>"  class="span3">
                            </div>
                          </div>                          
                        </div>
                        <div class="span4">
                          <div class="control-group">
                            <label class="control-label" for="recomendacion">Recomendado por:</label>
                            <div class="controls">
                              <input type="text" id="recomendacion" name="recomendacion" value="<?php echo $cliente->recomendacion; ?>" class="span3">
                            </div>
                          </div>                          
                        </div>
                        <div class="span4">
                          <div class="control-group">
                            <label class="control-label" for="genero">Género:</label>
                            <div class="controls">
                                  <div id="switch-gender" class="switcher" data-on-label="<i class='icon-female icon-white'></i>" data-off-label="<i class='icon-male'></i>">
    <input type="checkbox" checked />
    </div>                              
    <input type="hidden" id="sexo" name="sexo" value="<?php echo ($cliente->genero=="" || $cliente->genero=="femenino")?"femenino":"masculino"; ?>">
                            </div>
                          </div>                          
                        </div>
                      </div>
                      


                      <div class="row">
                        <div class="span12">
                          <div class="control-group">
                            <label class="control-label" for="domicilio">Domicilio</label>
                            <div class="controls">
                              <input type="text" id="domicilio" name="domicilio" value="<?php echo $cliente->domicilio; ?>" class="span7">

                            </div>
                          </div>                          
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="span6">
                          <div  class="control-group">
                            <label class="control-label" for="fecha_nacimiento">Fecha Nacimiento</label>
                            <div class="controls">
                           <div id="datetimepicker1" class="input-append">
                        <input readonly data-format="yyyy-MM-dd" type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo (!empty($cliente->fecha_nacimiento))?$cliente->fecha_nacimiento:""; ?>" >
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                      </div>
                            </div>
                          </div>                        
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="fecha_ingreso">Fecha Ingreso</label>
                            <div class="controls">
                              <div id="datetimepicker3" class="input-append">
                        <input readonly data-format="yyyy-MM-dd" type="text" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo (!empty($cliente->fecha_ingreso))?$cliente->fecha_ingreso:""; ?>" >
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                      </div>
                            </div>
                          </div>                           
                        </div>                        
                      </div>
                      <hr>
                      <h4>Archivos</h4>
                      <hr>
 

                      <div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>

<?php echo form_close(); ?>
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




