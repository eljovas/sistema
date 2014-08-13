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
	      <h2 class="pull-left">Clientes 
          <!-- page meta -->
          <span class="page-meta">Editar Cliente</span>
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
                  <div class="pull-left">Modificar Información de Cliente</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                   <div class="padd">
  <?php $create_form = array('id'=>'clients-form','class' => 'form-horizontal'); ?>
<?php echo form_open('clients/update', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $cliente->id; ?>">

                      <div class="control-group">
                        <label class="control-label" for="social">Razon Social</label>
                        <div class="controls">
                          <input type="text" id="social" name="social" value="<?php echo $cliente->razon_social; ?>" class="span5">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Razon Comercial</label>
                        <div class="controls">
                          <input type="text" id="comercial" name="comercial" value="<?php echo $cliente->razon_comercial; ?>" class="span3">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Nombre de Contacto</label>
                        <div class="controls">
                          <input type="text" id="contacto" name="contacto" value="<?php echo $cliente->nombre_contacto; ?>" class="span3">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Correo Electronico</label>
                        <div class="controls">
                          <input type="text" id="correo" name="correo" value="<?php echo $cliente->email_contacto; ?>" class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="social">Telefono</label>
                        <div class="controls">
                          <input type="text" id="telefono" name="telefono" value="<?php echo $cliente->telefono_contacto; ?>" class="span3">
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




