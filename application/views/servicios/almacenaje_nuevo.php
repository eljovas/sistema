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
            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-user"></i> Administración 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	<li><a href="<?php echo site_url("admin/usuarios"); ?>">Usuarios</a></li>
                	<li><a href="<?php echo site_url("clients"); ?>">Clientes</a></li>
                </ul>
              </a>
            </li>
            <li class="has_submenu nlightblue current open">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-barcode"></i> Almacenaje 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li class="active"><a href="<?php echo site_url("almacenaje/nuevo"); ?>">Nuevo</a></li>
                  <li><a href="<?php echo site_url("almacenaje/inventario"); ?>">Reporte de Inventario</a></li>
                  <li><a href="<?php echo site_url("almacenaje/movimientos"); ?>">Consulta de movimientos</a></li>
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
	      <h2 class="pull-left">Almacenaje 
          <!-- page meta -->
          <span class="page-meta">Nuevo</span>
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
                  <div class="pull-left">Agregar Nuevo Almacenaje</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
 <div class="padd">
                   <?php $create_form = array('id'=>'clients-form', 'class' => 'form-horizontal'); ?>

<?php echo form_open('clients/save', $create_form); ?>

                      <div  class="control-group">
                        <label class="control-label" for="last_name">Cliente</label>
                        <div class="controls">
                          <select id="cliente" name="cliente">
                            <option value="0">Selecciona</option>
                            <?php 
                            if (isset($clientes) && !empty($clientes)) {
                              foreach ($clientes as $cliente) {
                                echo "<option value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div  class="control-group">
                        <label class="control-label" for="esquema">Esquema de Cobranza</label>
                        <div class="controls">
                          <select id="esquema" name="esquema">
                            <option value="1">Fijo</option>
                            <option value="1">Variable</option>
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Precio por tarima</label>
                        <div class="controls">
                          <span class="add-on">$</span>
                          <input type="text" id="social" name="social" value=""  class="span2">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Tarifa de Almacenamiento</label>
                        <div class="controls">
                            <textarea class="cleditor" name="input">
                             
                            </textarea>
                        </div>
                      </div>                      
                      <h6>Servicios Adicionales</h6>
                      <hr>

                      <div class="control-group">
                        <label class="control-label" for="social">Kilogramo Bruto</label>
                        <div class="controls">
                          <span class="add-on">$</span>
                          <input type="text" id="comercial" name="comercial" value="<?php echo set_value('comercial'); ?>" class="span2">
                          <span class="help-inline">para entrada de producto recibido a granel</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Kilogramo Bruto</label>
                        <div class="controls">
                           <span class="add-on">$</span>
                          <input type="text" id="contacto" name="contacto" value="<?php echo set_value('contacto'); ?>" class="span2">
                          <span class="help-inline">para cruce de anden</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="social">Emplayado de Tarima</label>
                        <div class="controls">
                         <span class="add-on">$</span>
                          <input type="text" id="correo" name="correo" value="" class="span2">

                           <span class="help-inline">para cruce de anden</span>

                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="social">Seguro Mensual</label>
                        <div class="controls">
                          <span class="add-on">%</span>
                          <input type="text" id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>" class="span2">
                           <span class="help-inline">sobre el valor promedio de la mercancia</span>
                        </div>
                      </div>

                      <h6>Adicionamiento de Temperatura</h6>
                      <hr>
                      <div class="control-group">
                        <label class="control-label" for="social">Kilogramo Bruto</label>
                        <div class="controls">
                          <span class="add-on">$</span>
                          <input type="text" id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>" class="span2">
                           <span class="help-inline">en camara de congelación</span>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="social">Observaciones</label>
                        <div class="controls">
                            <textarea class="cleditor" name="input">
                             
                            </textarea>
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