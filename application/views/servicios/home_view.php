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
	      <h2 class="pull-left">Configuración
          <!-- page meta -->
          <span class="page-meta">Servicios </span>
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
                        <p><a href="<?php echo site_url("servicios/nuevo"); ?>" class="btn btn-primary">Nuevo Servicio</a></p>
                      </div>
                      <div class="clearfix"></div> 

                    </div>
                <div class="widget-head">
                  <div class="pull-left">Servicios</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <table class="table  table-bordered ">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Rubro</th>
                          <th>Concepto</th>
                          <th>Control</th>
                        </tr>
                      </thead>
                      <tbody>

                                            <?php 
                    if (isset($servicios) && !empty($servicios)) {
                      foreach ($servicios as $servicio) {

                        echo "<tr>
                        <td>".$servicio->id."</td>
                        <td>".$servicio->rubro."</td>
                        <td>".$servicio->concepto."</td>
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("servicios/editar/".$servicio->id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" href=\"".site_url("servicios/eliminar/".$servicio->id)."\"><i class=\"icon-remove\"></i> </a>                        
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
                      <p><a href="<?php echo site_url("servicios/nuevo"); ?>" class="btn btn-primary">Nuevo Servicio</a></p>
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