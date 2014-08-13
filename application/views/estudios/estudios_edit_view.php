<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "administracion"; $this->load->view("estudios/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Editar Estudio 
          <!-- page meta -->
          <span class="page-meta">Modificar Datos de Estudio</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
          <?php //echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
<?php //echo $this->session->flashdata('message'); ?>
<?php //if (!empty($message)) { echo $message; } ?>

          <?php 
          if (isset($mensaje)) {
            echo "<div class=\"alert alert-success\">
                      Información Actualizada.
                    </div>";
          }
           ?>

        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Editar Estudio</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'estudios-form-edit','class' => 'form-horizontal'); ?>

<?php echo form_open('estudios/update', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $estudio->id; ?>">
                      <div class="control-group">
                        <label class="control-label" for="nombre">Nombre</label>
                        <div class="controls">
                          <input type="text" id="nombre" name="nombre" value="<?php echo $estudio->nombre; ?>"  class="span5">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="descripcion">Descripci&oacute;n</label>
                        <div class="controls">
							<textarea id="descripcion" name="descripcion" class="span5"><?php echo $estudio->descripcion; ?></textarea>
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




