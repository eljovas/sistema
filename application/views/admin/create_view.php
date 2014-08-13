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
	      <h2 class="pull-left">Nuevo Usuario 
          <!-- page meta -->
          <span class="page-meta">Agregar Nuevo Usuario</span>
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
                  <div class="pull-left">Agregar Nuevo Usuario</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

<?php echo form_open('admin/panel/create', $create_form); ?>
                      <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $this->session->userdata('sucursal')->id; ?>"> 
                      <div class="control-group">
                        <label class="control-label" for="username">Usuario</label>
                        <div class="controls">
                          <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>"  class="span3">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="email">Correo Electrónico</label>
                        <div class="controls">
                          <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="password">Contraseña</label>
                        <div class="controls">
                          <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="confirm_password">Confirmar Contraseña</label>
                        <div class="controls">
                          <input type="password" id="confirm_password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="first_name">Nombre</label>
                        <div class="controls">
                          <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>"  class="span5">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="last_name">Tipo de Usuario</label>
                        <div class="controls">
                          <select id="role" name="role">
                            <option value="0">Selecciona</option>
                            <option value="1">Doctor</option>
                            <option value="2">Cosmetóloga</option>
                            <option value="3">Recepcionista</option>
                            <option value="4">Contabilidad</option>
                            <option value="69">Administrador</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="color">Color</label>
                        <div class="controls">
                          <input type="text" id="color" name="color" value="<?php echo set_value('color'); ?>"  class="pick-a-color">
                        </div>
                      </div>

                          <input type="hidden" id="last_name" name="last_name" value="apellido"  class="span5">


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




