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
        <h2 class="pull-left">Entradas
          <!-- page meta -->
          
        </h2>



        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



      <!-- Matter -->

      <div class="matter">
        <div class="container-fluid">

          <div class="row-fluid">

            <div class="span12">

              <div class="widget wlightblue">
                <div class="widget-head">
                  <div class="pull-left">Entrada: <strong>KM-<?php echo $entrada->folio; ?></strong></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd invoice">
                    
                    <div class="row-fluid">

                      <div class="span4">
                        <h4>Datos de Revision</h4>
                        <p>
                          <span class="label">Recibio:</span> <?php echo $entrada->nombre_recibe; ?><br>
                          <span class="label">Operador: </span><?php echo $entrada->operador; ?><br>
                          <span class="label">Placas:</span><?php echo $entrada->placas; ?><br>
                        </p>
                      </div>

                      <div class="span4">
                        <h4>Cliente</h4>
                        <p>
                          <span class="label">Nombre:</span><?php echo $cliente->razon_comercial; ?><br>
                          <span class="label">Correo:</span> <?php echo $cliente->email_contacto; ?><br>
                          <span class="label">Tel:</span> <?php echo $cliente->telefono_contacto; ?><br>

                        </p>                        
                      </div>

                      <div class="span4">
                        <h4>Espacios Asignados</h4>
                        <p>
                          <span class="label">No.:</span> <?php echo sizeof($tarimas_total); ?>
                        </p>
                      </div>

                    </div>

                    <div class="row-fluid">

                      <div class="span12">
                        <hr />
                                          <div class="widget-foot">
          <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

              <?php echo form_open('almacen/bloquear_tarima', $create_form); ?>                                            
                    
                    <input type="hidden" id="entrada" name="entrada" value="<?php echo $entrada->id; ?>">
                    <?php 
                    if (isset($productos) && !empty($productos)) {
                      echo "<select id=\"producto\" name=\"producto\" class=\"span3\">";
                       echo "<option value=\"0\">Selecciona Producto</option>";
                      foreach ($productos as $producto) {
                        echo "<option value=\"".$producto->id."\">".$producto->codigo_producto." | ".$producto->nombre_producto." | " .$producto->descripcion_empaque. "</option>";
                      }
                      echo "</select>";
                    }else{
                      echo "<select id=\"producto\" name=\"producto\">";
                      echo "<option value=\"0\">No hay productos registrados</option>";
                      echo "</select>";
                    }
                    ?> <div id="datetimepicker1" class="input-append">
                        <input data-format="yyyy-MM-dd" type="text" id="caducidad" name="caducidad" placeholder="fecha caducidad">
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                      </div>
                    <input type="text" id="lote" name="lote" placeholder="lote" class="span1">
                    <input type="text" id="kilos" name="kilos" placeholder="Kilos" class="span1">
                    
                    <button class="btn btn-success pull-right">Asignar Espacio</button> &nbsp;
                    <input type="text" id="tarima" name="tarima" class="span1" placeholder="espacio">
                    </form>
                    <div class="clearfix"></div>
                  </div>
                  
                      <?php if (isset($message))
                            {
                              echo "<div class=\"alert alert-".$message_type."\">".$message."</div>"; 
                            }
                      ?>
                      <h3>Espacios Asignados</h3>
                      <hr>
                        <table id="tarimas-asigandas" class="table table-bordered">
                          
                          <thead>
                            <tr>
                              <th>Codigo Producto</th>
                              <th>kilos</th>
                              <th>lote</th>
                              <th>Caducidad</th>
                              <th>Tarima|Camara|Bloque|Calle</th>                              
                            </tr>
                          </thead>
                          <tbody>
                    <?php 
                    if (isset($tarimas) && !empty($tarimas)) {
                      foreach ($tarimas as $tarima) {
                        echo "<tr>
                        <td>".$tarima->codigo_producto."</td>
                        <td>".$tarima->kilos."</td>
                        <td>".$tarima->lote."</td>
                        <td>".$tarima->caducidad."</td>
                        <td>".$tarima->tarima."|".$tarima->camara."|".$tarima->bloque."|".$tarima->calle."</td>
                        </tr>";
                      }
                    }
                    else{
                      echo "<tr><td colspan=\"5\">No hay tarimas asignadas</td></tr>";
                    }
                    ?>
                          </tbody>
                        </table>

                      </div>

                    </div>

                  </div>
                </div>
                  <div class="widget-foot">
                
                    <div class="clearfix"></div>
                  </div>
              </div>  
              
            </div>

          </div>

        </div>
      </div>
   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->


 

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 