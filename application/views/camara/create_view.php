<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nblue"><a href="<?php echo site_url("admin"); ?>"><i class="icon-desktop"></i> Panel</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue current open">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-user"></i> Administración 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	<li class="active"><a href="<?php echo site_url("admin/usuarios"); ?>">Usuarios</a></li>
                	<li><a href="<?php echo site_url("clients"); ?>">Clientes</a></li>
                </ul>
              </a>
            </li>

          </ul>

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




