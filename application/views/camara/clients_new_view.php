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
                	<li><a href="<?php echo site_url("admin/usuarios"); ?>">Usuarios</a></li>
                	<li class="active"><a href="<?php echo site_url("clients"); ?>">Clientes</a></li>
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
	      <h2 class="pull-left">Administración 
          <!-- page meta -->
          <span class="page-meta">Clientes</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

   <div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left">Agregar Nuevo Cliente</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
 <div class="padd">
                   <?php $create_form = array('id'=>'clients-form', 'class' => 'form-horizontal'); ?>

<?php echo form_open('clients/save', $create_form); ?>


                      <div class="control-group">
                        <label class="control-label" for="social">Razon Social</label>
                        <div class="controls">
                          <input type="text" id="social" name="social" value="<?php echo set_value('social'); ?>"  class="span5">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Razon Comercial</label>
                        <div class="controls">
                          <input type="text" id="comercial" name="comercial" value="<?php echo set_value('comercial'); ?>" class="span3">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Nombre de Contacto</label>
                        <div class="controls">
                          <input type="text" id="contacto" name="contacto" value="<?php echo set_value('contacto'); ?>" class="span3">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Correo Electronico</label>
                        <div class="controls">
                          <input type="text" id="correo" name="correo" value="<?php echo set_value('correo'); ?>" class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="social">Telefono</label>
                        <div class="controls">
                          <input type="text" id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>" class="span3">
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