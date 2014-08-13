<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

        <?php $data["current"] = "configuracion"; $this->load->view("servicios/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Nuevo Servicio 
          <!-- page meta -->
          <span class="page-meta">Agregar Nuevo Servicio</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
          <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
<?php echo $this->session->flashdata('message'); ?>
<?php if (!empty($message)) { echo $message; } ?>

        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Agregar Nuevo Servicio</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

<?php echo form_open('servicios/grabar', $create_form); ?>

                      <div class="control-group">
                        <label class="control-label" for="rubro">Rubro</label>
                        <div class="controls">
                          <select id="rubro" name="rubro">
                            <option value="">selecciona</option>
                            <option value="maniobras">Maniobras</option>
                            <option value="almacenaje">Almacenaje</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="concepto">Concepto</label>
                        <div class="controls">
                          <input type="text" id="concepto" name="concepto" value="<?php echo set_value('concepto'); ?>"  class="span5">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="descripcion">Descripción</label>
                        <div class="controls">
                          <input type="text" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion'); ?>"  class="span9">
                        </div>
                      </div>

                      <!--div class="control-group">
                        <label class="control-label" for="costo">Costo</label>
                        <div class="controls">
                          <input type="text" id="costo" name="costo" value="<?php echo set_value('costo'); ?>"  class="span3">
                        </div>
                      </div-->

                      <div class="control-group">
                        <label class="control-label" for="first_name">Unidad Aplicable</label>
                        <div class="controls">
                          <input type="checkbox" name="unidad[]" value="kg"> Kg <br>
                          <input type="checkbox" name="unidad[]" value="lb"> Lb <br>
                          <input type="checkbox" name="unidad[]" value="pz"> Pz <br>
                          <input type="checkbox" name="unidad[]" value="cj"> Cj <br>
                          <input type="checkbox" name="unidad[]" value="tar"> Tar <br>
                          <input type="checkbox" name="unidad[]" value="documento"> Documento <br>
                          <input type="checkbox" name="unidad[]" value="evento"> Evento <br>
                          <input type="checkbox" name="unidad[]" value="hora"> Hora <br>
                          <input type="checkbox" name="unidad[]" value="dia"> Día <br>
                          <input type="checkbox" name="unidad[]" value="otro"> Otro
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="username">Status</label>
                        <div class="controls">
                          <select id="status" name="status">
                            <option value="">selecciona</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                          </select>
                        </div>
                      </div>
                          


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




