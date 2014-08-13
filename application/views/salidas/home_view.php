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
	      <h2 class="pull-left">Salida de Producto 
          <!-- page meta -->
          <span class="page-meta">Salidas</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         
<div class="widget wlightblue">
    
<div class="widget-foot">

                      <div class="pull-right">
                        <p><a href="<?php echo site_url("almacen/salida"); ?>" class="btn btn-primary">Nueva Salida</a></p>
                      </div>
                      <div class="clearfix"></div> 

                    </div>
                <div class="widget-head">
                  <div class="pull-left">Salidas</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <table id="listing-salidas" class="table  table-bordered ">
                      <thead>
                        <tr>
                          <th># Salida</th>
                          <th>Cliente</th>
                          <th>Especificar Productos</th>
                          <th>Nombre del que recoge</th>
                          <th>Fecha de Salida</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>

                    <?php 
                    if (isset($salidas) && !empty($salidas)) {
                      foreach ($salidas as $salida) {
                        echo "<tr>
                        <td>KM-".$salida->folio."</td>
                        <td>".$salida->cliente."</td>
                        <td><a class=\"btn btn-mini btn-info\" href=\"".site_url("almacen/salida_producto/".$salida->salida_id)."\">Especificar Productos</a></td>
                        <td>".$salida->recoge."</td>
                        <td>".$salida->created_date."</td>
                        <td>
                              <a target=\"_blank\" class=\"btn btn-mini btn-success\" href=\"".site_url("almacen/imprimir_salida/".$salida->salida_id)."\"><i class=\"icon-print\"></i> </a> 
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("almacen/editar_salida/".$salida->salida_id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" href=\"".site_url("almacen/eliminar_salida/".$salida->salida_id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }
                    ?>
                      </tbody>
                    </table>

                  </div>

                    <div class="widget-foot">

                      <div class="pull-right">
                      <p><a href="<?php echo site_url("almacen/salida"); ?>" class="btn btn-primary">Nuevo Salida</a></p>
                      </div>
                      <div class="clearfix"></div> 

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