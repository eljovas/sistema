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
        <h2 class="pull-left">Salidas
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
                  <div class="pull-left">Salida: <strong>KM-<?php echo $salida->folio; ?></strong></div>
                   <div class="pull-right">Fecha de Salida: <strong><?php echo $salida->created_date; ?></strong></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd invoice">
                    
                    <div class="row-fluid">

                      <div class="span6">
                        <h4>Datos de Revision</h4>
                        <p>
                          <span class="label">Nombre del que Recoge:</span> <?php echo $salida->recoge; ?><br>
                          <span class="label">Destino de Mercancía: </span><?php echo $salida->destino; ?><br>
                          <span class="label">Linea de Transporte:</span><?php echo $salida->transporte; ?><br>
                        </p>
                      </div>

                      <div class="span6">
                        <h4>Cliente</h4>
                        <p>
                          <span class="label">Nombre:</span><?php echo $cliente->razon_comercial; ?><br>
                          <span class="label">Correo:</span> <?php echo $cliente->email_contacto; ?><br>
                          <span class="label">Tel:</span> <?php echo $cliente->telefono_contacto; ?><br>

                        </p>                        
                      </div>



                    <div class="row-fluid">

                      <div class="span12">
                        <hr />
                                          <div class="widget-foot">
          <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

              <?php echo form_open('almacen/grabar_salida_producto', $create_form); ?>                                            
                    
                    <input type="hidden" id="salida" name="salida" value="<?php echo $salida->id; ?>">
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
                    ?> 
                    <input type="text" id="cajas" name="cajas" placeholder="Cajas">
                    <input type="text" id="kilos" name="kilos" placeholder="Kilos" class="span1">
                    
                    <button class="btn btn-success pull-right">Grabar Salida de Producto</button> &nbsp;
                    <input type="text" id="tarima" name="tarima" class="span1" placeholder="tarima">
                    </form>
                    <div class="clearfix"></div>
                  </div>
                  
                      <?php if (isset($message))
                            {
                              echo "<div class=\"alert alert-".$message_type."\">".$message."</div>"; 
                            }
                      ?>
                      <div class="tabbable" style="margin-top:20px;">
                        <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab1">Productos con Salida Registrada</a></li>
                        <li class=""><a data-toggle="tab" href="#tab2">Productos Almacenados</a></li>
                      </ul>
                      
                      <hr>
                      <div class="tab-content">
                        <div id="tab1" class="tab-pane active">
                           <div class="widget-content">
                        <table id="productos-almacenados-salida" class="table table-bordered">
                          
                          <thead>
                            <tr>
                              <th>Codigo Producto</th>
                              <th>kilos</th>
                              <th>cajas</th>
                              <th>Tarima|Camara|Bloque|Calle</th>                              
                              <th>Fecha de Salida</th>                              
                            </tr>
                          </thead>
                          <tbody>
                    <?php 
                    if (isset($tarimas_salida) && !empty($tarimas_salida)) {
                      foreach ($tarimas_salida as $tarima1) {
                        echo "<tr>
                        <td>".$tarima1->codigo_producto."</td>
                        <td>".$tarima1->kilos."</td>
                        <td>".$tarima1->cajas."</td>
                        <td>".$tarima1->tarima."|".$tarima1->camara."|".$tarima1->bloque."|".$tarima1->calle."</td>
                        <td>".$tarima1->created_date."</td>
                        </tr>";
                      }
                    }
                    else{
                      echo "<tr><td colspan=\"5\">No hay tarimas asignadas</td></tr>";
                      echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
                    }
                    ?>
                          </tbody>
                        </table> 
                      </div>
                        </div>
                        <div id="tab2" class="tab-pane">
                           <div class="widget-content">
                        <table id="productos-almacenados" class="table table-bordered">
                          
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
                       echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
                    }
                    ?>
                          </tbody>
                        </table>    
                        </div>                      
                        </div>
                      </div>
                      </div>
                      <!-- /tabbable-->
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