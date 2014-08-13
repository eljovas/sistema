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
                <i class="icon-user"></i> Operaciones 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="<?php echo site_url("almacen/entradas"); ?>">Entradas</a></li>
                  <li><a href="<?php echo site_url("almacen/salidas"); ?>">Salida</a></li>
                  <li><a href="<?php echo site_url("almacen/movimientos"); ?>">Movimientos</a></li>
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
	      <h2 class="pull-left">Editar Salida
          <!-- page meta -->
          <span class="page-meta">Autorización de Salida de Producto</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         

          <div class="row-fluid">
           <!-- Dashboard Graph starts -->

          <div class="row-fluid">

            <div class="span12">

              <div class="widget wlightblue">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Salida # <strong><?php echo "KM-".$salida->folio; ?></strong></div>
                  <div class="pull-right">Fecha: <strong><?php echo $salida->created_date; ?></strong></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                       <div class="padd">
                  <!-- Widget content -->
                  <!-- Task list starts -->
<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>

<?php if (!empty($message)) { echo $message; } ?>

           <div class="widget wlightblue">

                <?php if (!empty($mensaje)) { echo "<div class=\"alert alert-success\">".$mensaje."</div>"; } ?>
          <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

              <?php echo form_open('almacen/actualizar_salida', $create_form); ?>
                      <input type="hidden" id="id" name="id" value="<?php echo $salida->id; ?>">
                      <div class="row-fluid">
    
                          
                          <div  class="control-group span6">
                            <label class="control-label" for="cliente">Cliente</label>
                            <div class="controls">
                              <select id="cliente" name="cliente" class="span9">
                                <option value="0">Selecciona</option>
                                <?php 
                                if (isset($clientes) && !empty($clientes)) {
                                  foreach ($clientes as $cliente) {
                                    if ($salida->cliente==$cliente->id) {
                                      echo "<option selected value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                                    }else{
                                      echo "<option value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                                    }                                    
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                      
                     </div>

                     
                     <h6>Datos Generales</h6>
                     <hr>
                     <div class="row-fluid">
                      <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="email">Fecha de Entrega</label>
                        <div class="controls">
                          <input type="text" id="nombre_recibe" name="fecha" value="<?php echo $salida->created_date; ?>"  class="span4" readonly>
                        </div>
                      </div>
                      </div>
                      <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="destino">Destino de la Mercancía</label>
                        <div class="controls">
                          <input type="text" id="destino" name="destino" value="<?php echo $salida->destino; ?>"  class="span7">
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="row-fluid">
                      <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="recoge">Nombre del que Recoge</label>
                        <div class="controls">
                          <input type="text" id="recoge" name="recoge" value="<?php echo $salida->recoge; ?>"  class="span12">
                        </div>
                      </div>
                      </div>
                      <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="transporte">Línea de Transporte</label>
                        <div class="controls">
                          <input type="text" id="transporte" name="transporte" value="<?php echo $salida->transporte; ?>"  class="span7">
                        </div>
                      </div>                        
                      </div>
                      </div>
                    </div>


                      <h6>Información del Camion Que Recoge La Mercancía</h6>
                      <hr>

                      <div class="row-fluid">
                      <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="placas">Placas Tractor - Caja</label>
                        <div class="controls">
                          <input type="text" id="placas" name="placas" value="<?php echo $salida->placas; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="descripcion">Descripción</label>
                        <div class="controls">
                            <input type="text" id="descripcion" name="descripcion" value="<?php echo $salida->descripcion; ?>" class="span12">
                        </div>
                      </div>
                      </div>
                      </div>
                      <hr>
                      <div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>
                      <?php echo form_close(); ?>
                  <div class="clearfix"></div>  


                </div>

              </div>

            </div>
          </div>
          <!-- Dashboard graph ends -->
                </div>

                <div class="widget-foot">
                    <!-- Footer goes here -->
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