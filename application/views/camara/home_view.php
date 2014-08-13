<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "camaras"; $this->load->view("camara/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Cámara <?php echo $camara; ?> 
          <!-- page meta -->
          <span class="page-meta">Inventario Cámara <?php echo $camara; ?> </span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

          <!-- Today status. jQuery Sparkline plugin used. -->

          <div class="row-fluid">
           <!-- Dashboard Graph starts -->

          <div class="span12">

              <div class="widget nblue">
                <div class="widget-head">
                  <div class="pull-left">Inventario</div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd statement">
                    
                    <div class="row-fluid">

                      <div class="span4">
                        <div class="well blightblue">
                          <h2><?php echo $total_tarimas; ?></h2>
                          <p>Totales</p>
                        </div>
                      </div>

                      <div class="span4">
                        <div class="well blightblue">
                          <h2><?php echo $total_ocupadas; ?></h2>
                          <p>Ocupado</p>                        
                        </div>
                      </div>

                      <div class="span4">
                        <div class="well blightblue">
                          <h2><?php echo $total_vacias; ?></h2>
                          <p>Vacio</p>
                        </div>
                      </div>

                    </div>

                    <div class="row-fluid">

                      <div class="span12">
                        <hr />
                        <table class="table   table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Bloque</th>
                              <th>Calle</th>
                              <th>Unidad de Carga</th>
                              <th>Medidas</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            if (isset($tarimas) && !empty($tarimas)) {
                              foreach ($tarimas as $tarima) {
                                echo "<tr>";
                                echo "<td>".$tarima->id."</td>";
                                echo "<td>".$tarima->bloque."</td>";
                                echo "<td>".$tarima->calle."</td>";
                                echo "<td>".$tarima->unidad_carga."</td>";
                                echo "<td>".$tarima->largo." x ".$tarima->ancho." x ".$tarima->alto."</td>";
                                echo "<td>".$tarima->status."</td>";
                                echo "<td></td>";
                                echo "</tr>";
                              }
                            }else{
                              echo "<tr><td colspan=\"7\">No hay tarimas registrada<td></tr>";
                            }
                            ?>
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