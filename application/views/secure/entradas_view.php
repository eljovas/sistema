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
          <span class="page-meta">Entradas</span>
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
                        <p><a href="<?php echo site_url("almacen/entrada"); ?>" class="btn btn-primary">Nueva Entrada</a></p>
                      </div>
                      <div class="clearfix"></div> 

                    </div>
                <div class="widget-head">
                  <div class="pull-left">Entradas</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <table id="listing-entradas" class="table  table-bordered ">
                      <thead>
                        <tr>
                          <th># Entrada</th>
                          <th>Cliente</th>
                          <th>Espacio</th>
                          <th>Recibio</th>
                          <th>Operador</th>
                          <th>Fecha de Entrada</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>

                    <?php 
                    if (isset($entradas) && !empty($entradas)) {
                      foreach ($entradas as $entrada) {
                        echo "<tr>
                        <td>KM-".$entrada->folio."</td>
                        <td>".$entrada->cliente."</td>
                        <td><a class=\"btn btn-mini btn-info\" href=\"".site_url("almacen/asignar/".$entrada->entrada_id)."\">Asignar Espacios</a></td>
                        <td>".$entrada->nombre_recibe."</td>
                        <td>".$entrada->operador."</td>
                        <td>".$entrada->created_date."</td>
                        <td>
                              <a target=\"_blank\" class=\"btn btn-mini btn-success\" href=\"".site_url("almacen/imprimir/".$entrada->entrada_id)."\"><i class=\"icon-print\"></i> </a> 
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("almacen/editar/".$entrada->entrada_id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" href=\"".site_url("almacen/eliminar/".$entrada->entrada_id)."\"><i class=\"icon-remove\"></i> </a>                        
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
                      <p><a href="<?php echo site_url("almacen/entrada"); ?>" class="btn btn-primary">Nuevo Entrada</a></p>
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