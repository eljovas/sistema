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
	      <h2 class="pull-left">Movimientos de Producto 
          <!-- page meta -->
          <span class="page-meta">Movimientos</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         
                <div class="widget wlightblue">
                <div class="row-fluid">
                  <div class="span6">
                    <div class="widget-head">
                      Espacio Origen
                    </div>
                    <div class="widget-content">
                      <div class="padd">
                        <h5># de Espacio</h5>
                        <div class="row-fluid">
                          <div class="span6"><input type="text" id="espacio-origen" name="espacio-origen" class="input-xlarge"></div>
                          <div class="span6"><p><button id="buscarajaxtarima" class="btn btn-info" type="submit">Buscar</button></p></div>
                        </div>
                        <hr>
                        
                        <table class="table table-bordered">
                          <thead>
                            <th>Codigo Producto</th>
                            <th>Kilos</th>
                          </thead>
                          <tbody id="resumen-tarima">
                            <tr>
                              <td colspan="3">
                                <em>buscar no. de espacio</em>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="span6">
                    <div class="widget-head">
                      Espacio Destino
                    </div>
                    <div class="widget-content">
                      <div class="padd">
                        <h5># de Espacio</h5>
                        <div class="row-fluid">
                          <div class="span6"><input type="text" id="espacio-destino" name="espacio-destino" class="input-xlarge" disabled></div>
                          <div class="span6"><p><button id="" class="btn btn-info" type="submit">Aplicar</button></p></div>
                        </div>
                        <hr>
                        
                        <table class="table table-bordered">
                          <thead>
                            <th>Codigo Producto</th>
                            <th>Kilos</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="text" id="codigo_producto_mov" name="codigo_producto_mov"  disabled></td>
                              <td><input type="text" id="kilos_mov" name="kilos_mov"  disabled></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
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