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
	      <h2 class="pull-left">Servicios 
          <!-- page meta -->
          <span class="page-meta">Editar Servicio</span>
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
                  <div class="pull-left">Modificar Información de Servicio</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                   <div class="padd">
  <?php $create_form = array('id'=>'clients-form','class' => 'form-horizontal'); ?>
<?php echo form_open('servicios/actualizar', $create_form); ?>
<?php 
$unidades = explode(",", $servicio->unida_aplicable);
?>
<input type="hidden" id="id" name="id" value="<?php echo $servicio->id; ?>">
                      <div class="control-group">
                        <label class="control-label" for="rubro">Rubro</label>
                        <div class="controls">
                          <select id="rubro" name="rubro">
                            <option value="maniobras" <?php echo ($servicio->rubro=="maniobras")?"selected":""; ?>>Maniobras</option>
                            <option value="almacenaje" <?php echo ($servicio->rubro=="almacenaje")?"selected":""; ?>>Almacenaje</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="concepto">Concepto</label>
                        <div class="controls">
                          <input type="text" id="concepto" name="concepto" value="<?php echo $servicio->concepto; ?>"  class="span5">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="descripcion">Descripción</label>
                        <div class="controls">
                          <input type="text" id="descripcion" name="descripcion" value="<?php echo $servicio->descripcion; ?>"  class="span9">
                        </div>
                      </div>

                      <!--div class="control-group">
                        <label class="control-label" for="costo">Costo</label>
                        <div class="controls">
                          <input type="text" id="costo" name="costo" value="<?php echo $servicio->costo; ?>"  class="span3">
                        </div>
                      </div-->

                      <div class="control-group">
                        <label class="control-label" for="first_name">Unidad Aplicable</label>
                        <div class="controls">
                          <input type="checkbox" name="unidad[]" value="kg" <?php echo (in_array('kg',$unidades))?"checked":""; ?>> Kg <br>
                          <input type="checkbox" name="unidad[]" value="lb" <?php echo (in_array('lb',$unidades))?"checked":""; ?>> Lb <br>
                          <input type="checkbox" name="unidad[]" value="pz" <?php echo (in_array('pz',$unidades))?"checked":""; ?>> Pz <br>
                          <input type="checkbox" name="unidad[]" value="<?php echo (in_array('cj',$unidades))?"checked":""; ?>"> Cj <br>
                          <input type="checkbox" name="unidad[]" value="tar" <?php echo (in_array('tar',$unidades))?"checked":""; ?>> Tar <br>
                          <input type="checkbox" name="unidad[]" value="documento" <?php echo (in_array('documento',$unidades))?"checked":""; ?>> Documento <br>
                          <input type="checkbox" name="unidad[]" value="evento" <?php echo (in_array('evento',$unidades))?"checked":""; ?>> Evento <br>
                          <input type="checkbox" name="unidad[]" value="hora" <?php echo (in_array('hora',$unidades))?"checked":""; ?>> Hora <br>
                          <input type="checkbox" name="unidad[]" value="dia" <?php echo (in_array('dia',$unidades))?"checked":""; ?>> Día <br>
                          <input type="checkbox" name="unidad[]" value="otro" <?php echo (in_array('otro',$unidades))?"checked":""; ?>> Otro
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="username">Status</label>
                        <div class="controls">
                          <select id="status" name="status">
                            <option value="activo" <?php echo ($servicio->status=="activo")?"selected":""; ?>>Activo</option>
                            <option value="inactivo" <?php echo ($servicio->status=="inactivo")?"selected":""; ?>>Inactivo</option>
                          </select>
                        </div>
                      </div>                      <div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>

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




