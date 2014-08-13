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
	      <h2 class="pull-left">Usuarios 
          <!-- page meta -->
          <span class="page-meta">Ediatar Usuario</span>
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
                  <div class="pull-left">Modificar Información de Usuario</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'users-form-edit','class' => 'form-horizontal'); ?>

<?php echo form_open('admin/actualizar_usuario', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $usuario->user_id; ?>">
                      <div class="control-group">
                        <label class="control-label" for="username">Usuario</label>
                        <div class="controls">
                          <input type="text" id="username" name="username" value="<?php echo $usuario->username; ?>"  class="span3">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="email">Correo Electrónico</label>
                        <div class="controls">
                          <input type="text" id="email" name="email" value="<?php echo $usuario->email; ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="password">Contraseña</label>
                        <div class="controls">
                          <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="first_name">Nombre</label>
                        <div class="controls">
                          <input type="text" id="first_name" name="first_name" value="<?php echo $usuario->first_name; ?>"  class="span5">
                        </div>
                      </div>

                          <input type="hidden" id="last_name" name="last_name" value="<?php echo $usuario->last_name; ?>"  class="span5">

                      <div class="control-group">
                        <label class="control-label" for="last_name">Tipo de Usuario</label>
                        <div class="controls">
                          <select id="role" name="role">
                            <option value="0">Selecciona</option>
                            <option value="1" <?php echo ($usuario->user_level==1)?"selected":""; ?>>Mesa de Control</option>
                            <option value="2" <?php echo ($usuario->user_level==2)?"selected":""; ?>>Cliente</option>
                            <option value="69" <?php echo ($usuario->user_level==69)?"selected":""; ?>>Administrador</option>
                          </select>
                        </div>
                      </div>
                      <?php 
                      if ($usuario->user_level==2) {
                          $class="show_for_div";
                      }else{
                          $class="hide_for_div";
                      }
                      ?>
                      <div id="clientes-xref-users" class="control-group <?php echo $class; ?>">
                        <label class="control-label" for="last_name">Cliente</label>
                        <div class="controls">
                          <select id="cliente" name="cliente">
                            <option value="0">Selecciona</option>
                            <?php 
                            if (isset($clientes) && !empty($clientes)) {
                              foreach ($clientes as $cliente) {
                                $selected = ($cliente->id==$usuario->client_id)?"selected":"";
                                echo "<option $selected value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                              }
                            }
                            ?>
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




