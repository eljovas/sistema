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
	      <h2 class="pull-left">Revision y Entrada 
          <!-- page meta -->
          <span class="page-meta">Entrada</span>
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
                  <div class="pull-left">Editar Entrada # <strong>KM-<?php echo $entrada->folio; ?></strong></div>
                   <div class="pull-right">Fecha de Entrada: <strong><?php echo $entrada->created_date; ?></strong></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                       <div class="padd">
                  <!-- Widget content -->
                  <!-- Task list starts -->
          <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
          <?php echo $this->session->flashdata('message'); ?>
          <?php if (!empty($mensaje)) { echo "<div class=\"alert alert-success\">".$mensaje."</div>"; } ?>

           <div class="widget wlightblue">

                
          <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

              <?php echo form_open('almacen/actualizar', $create_form); ?>
                      <input type="hidden" id="id" name="id" value="<?php echo $entrada->id; ?>">
                      <div class="row-fluid">
                      <div  class="control-group">
                        <label class="control-label" for="cliente">Cliente</label>
                        <div class="controls">
                          <select id="cliente" name="cliente">
                            <option value="0">Selecciona</option>
                            <?php 
                            if (isset($clientes) && !empty($clientes)) {
                              foreach ($clientes as $cliente) {
                                if ($entrada->cliente==$cliente->id) {
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
                      <div class="row-fluid">
                      <div class="control-group span3">
                        <label class="control-label" for="email">Nombre recibe</label>
                        <div class="controls">
                          <input type="text" id="nombre_recibe" name="nombre_recibe" value="<?php echo $entrada->nombre_recibe; ?>"  class="span12">
                        </div>
                      </div>
                      <div class="control-group span3">
                        <label class="control-label" for="operador">Operador</label>
                        <div class="controls">
                          <input type="text" id="operador" name="operador" value="<?php echo $entrada->operador; ?>"  class="12">
                        </div>
                      </div>
                      
                      <div class="control-group span3">
                        <label class="control-label" for="placas">Placas Vehiculo</label>
                        <div class="controls">
                          <input type="text" id="placas" name="placas" value="<?php echo $entrada->placas; ?>"  class="span7">
                        </div>
                      </div>

                      <div class="control-group span3">
                        <label class="control-label" for="placas_contenedor">Placas Caja Contenedor</label>
                        <div class="controls">
                          <input type="text" id="placas_contenedor" name="placas_contenedor" value="<?php echo $entrada->placas_contenedor; ?>"  class="span7">
                        </div>
                      </div>
                      </div>
                      <h6>Conceptos de Revision</h6>
                      <hr>
                      <div class="row-fluid">
                      <div class="control-group span6">
                        <label class="control-label" for="contenedor_danos">Sellos caja/ contenedor sin daños</label>
                        <div class="controls">
                          <select id="contenedor_danos" name="contenedor_danos">
                            <option value="na" <?php echo ($entrada->contenedor_danos=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->contenedor_danos=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->contenedor_danos=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group span6">
                        <label class="control-label" for="revision_contenedor_danos_obervaciones">Observaciones</label>
                        <div class="controls">
                            <input  type="text" id="revision_contenedor_danos_obervaciones" name="revision_contenedor_danos_obervaciones" class="span6" value="<?php echo $entrada->revision_contenedor_danos_obervaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">

                      <div class="control-group span6">
                        <label class="control-label" for="sin_danos_limpieza">Caja contenedor sin daños y limpieza adecuada</label>
                        <div class="controls">
                          <select id="sin_danos_limpieza" name="sin_danos_limpieza">
                            <option value="na" <?php echo ($entrada->sin_danos_limpieza=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->sin_danos_limpieza=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->sin_danos_limpieza=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group span6">
                        <label class="control-label" for="sin_danos_limpieza_observaciones">Observaciones</label>
                        <div class="controls">
                            <input  type="text" id="sin_danos_limpieza_observaciones" name="sin_danos_limpieza_observaciones" class="span6" value="<?php echo $entrada->sin_danos_limpieza_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">
                      <div class="control-group span6">
                        <label class="control-label" for="temperatura_adecuada">Temperatura Adecuada</label>
                        <div class="controls">
                           <input  type="text" id="temperatura_adecuada" name="temperatura_adecuada" class="span3" value="<?php echo $entrada->temperatura_adecuada; ?>">
                        </div>
                      </div>        
                      <div class="control-group span6">
                        <label class="control-label" for="temperatura_adecuada_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="temperatura_adecuada_observaciones" name="temperatura_adecuada_observaciones" class="span6" value="<?php echo $entrada->temperatura_adecuada_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">
                      <div class="control-group span6">
                        <label class="control-label" for="acondicionamiento_temperatura">Ocupa Acondicionamiento de Temperatura</label>
                        <div class="controls">
                          <select id="acondicionamiento_temperatura" name="acondicionamiento_temperatura">
                            <option value="na" <?php echo ($entrada->acondicionamiento_temperatura=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->acondicionamiento_temperatura=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->acondicionamiento_temperatura=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>  
                      <div class="control-group span6">
                        <label class="control-label" for="acondicionamiento_temperatura_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="acondicionamiento_temperatura_observaciones" name="acondicionamiento_temperatura_observaciones" class="span6" value="<?php echo $entrada->acondicionamiento_temperatura_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">
                      <div class="control-group span6">
                        <label class="control-label" for="descarga_producto_agranel">Descarga Producto a granel</label>
                        <div class="controls">
                           <input  type="text" id="descarga_producto_agranel" name="descarga_producto_agranel" class="span3" value="<?php echo $entrada->descarga_producto_agranel; ?>">
                        </div>
                      </div>
                      
                      <div class="control-group span6">
                        <label class="control-label" for="descarga_producto_tarima">Descarga Producto en Tarima</label>
                        <div class="controls">
                           <input  type="text" id="descarga_producto_tarima" name="descarga_producto_tarima" class="span3" value="<?php echo $entrada->descarga_producto_tarima; ?>">
                        </div>
                      </div>        
                      </div>              
                      <div class="row-fluid">

                      <div class="control-group span6">
                        <label class="control-label" for="cajas_empaques_sin_danos">Cajas o Empaques sin Daños</label>
                        <div class="controls">
                          <select id="cajas_empaques_sin_danos" name="cajas_empaques_sin_danos">
                            <option value="na" <?php echo ($entrada->cajas_empaques_sin_danos=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->cajas_empaques_sin_danos=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->cajas_empaques_sin_danos=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>  
                      <div class="control-group span6">
                        <label class="control-label" for="cajas_empaques_sin_danos_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="cajas_empaques_sin_danos_observaciones" name="cajas_empaques_sin_danos_observaciones" class="span6" value="<?php echo $entrada->cajas_empaques_sin_danos_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">

                      <div class="control-group span6">
                        <label class="control-label" for="sellos_cajas_empaques_sin_danos">Sellos de cajas o Empaques sin Daños</label>
                        <div class="controls">
                          <select id="sellos_cajas_empaques_sin_danos" name="sellos_cajas_empaques_sin_danos">
                            <option value="na" <?php echo ($entrada->sellos_cajas_empaques_sin_danos=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->sellos_cajas_empaques_sin_danos=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->sellos_cajas_empaques_sin_danos=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>  
                      <div class="control-group span6">
                        <label class="control-label" for="sellos_cajas_empaques_sin_danos_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="sellos_cajas_empaques_sin_danos_observaciones" name="sellos_cajas_empaques_sin_danos_observaciones" class="span6" value="<?php echo $entrada->sellos_cajas_empaques_sin_danos_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">


                      <div class="control-group span6">
                        <label class="control-label" for="tarimas_sin_danos">Tarimas sin daños</label>
                        <div class="controls">
                          <select id="tarimas_sin_danos" name="tarimas_sin_danos">
                            <option value="na" <?php echo ($entrada->tarimas_sin_danos=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->tarimas_sin_danos=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->tarimas_sin_danos=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>  
                      <div class="control-group span6">
                        <label class="control-label" for="tarimas_sin_danos_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="tarimas_sin_danos_observaciones" name="tarimas_sin_danos_observaciones" class="span6" value="<?php echo $entrada->tarimas_sin_danos_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">


                      <div class="control-group span6">
                        <label class="control-label" for="producto_caducado">Producto Caducado</label>
                        <div class="controls">
                          <select id="producto_caducado" name="producto_caducado">
                            <option value="na" <?php echo ($entrada->producto_caducado=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->producto_caducado=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->producto_caducado=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>  
                      <div class="control-group span6">
                        <label class="control-label" for="producto_caducado_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="producto_caducado_observaciones" name="tarimas_sin_danos_observaciones" class="span6"  value="<?php echo $entrada->tarimas_sin_danos_observaciones; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row-fluid">

                      <div class="control-group span6">
                        <label class="control-label" for="producto_coincide">Productos y Cantidades Coinciden?</label>
                        <div class="controls">
                          <select id="producto_coincide" name="producto_coincide">
                            <option value="na" <?php echo ($entrada->producto_coincide=="na")?"selected":""; ?>>No Aplica</option>
                            <option value="si" <?php echo ($entrada->producto_coincide=="si")?"selected":""; ?>>Si</option>
                            <option value="no" <?php echo ($entrada->producto_coincide=="no")?"selected":""; ?>>No</option>
                          </select>
                        </div>
                      </div>  
                      <div class="control-group span6">
                        <label class="control-label" for="producto_coincide_observaciones">Observaciones</label>
                        <div class="controls">
                           <input  type="text" id="producto_coincide_observaciones" name="producto_coincide_observaciones" class="span6" value="<?php echo $entrada->producto_coincide_observaciones; ?>" >
                        </div>
                      </div>
                    </div>
                      <div class="row-fluid">

                      <div class="control-group span12">
                        <label class="control-label" for="comentarios_adicionales">Comentarios Adicionales</label>
                        <div class="controls">
                            <textarea class="cleditor" name="input" name="comentarios_adicionales" id="comentarios_adicionales" >
                             <?php echo $entrada->comentarios_adicionales;  ?>
                            </textarea>
                        </div>
                      </div>  
                      </div>
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