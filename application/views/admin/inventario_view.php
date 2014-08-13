<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
            <?php $data["current"] = "almacenaje"; $this->load->view("admin/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Reporte de Inventario
          <!-- page meta -->
          <span class="page-meta">Resumen de espacios disponibles y ocupados</span>
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

          <div class="row-fluid">

            <div class="span12">

              <div class="widget wlightblue">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Cámaras</div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <!-- Widget content -->
                  <!-- Task list starts -->
                  <ul class="project">

                    <li>
                      <p>
                        <!-- Checkbox -->
                         
                        <!-- Name -->
                        Cámara 1
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Ocupación al <?php echo $porcentaje_camara_1; ?></span> 
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios totales: <?php echo $total_tarimas_camara_1; ?></span> 
                      </p>                      
                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios Disponibles: <?php echo $total_vacias_camara_1; ?></span> 
                      </p>                      
                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios Ocupados: <?php echo $total_ocupadas_camara_1; ?></span> 
                      </p>                      

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: <?php echo $porcentaje_camara_1+1; ?>%;"></div>
                      </div>
                    </li>


                    <li>
                      <p>
                        <!-- Checkbox -->
                         
                        <!-- Name -->
                        Cámara 2
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Ocupación al <?php echo $porcentaje_camara_2; ?></span> 
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios totales: <?php echo $total_tarimas_camara_2; ?></span> 
                      </p>                      
                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios Disponibles: <?php echo $total_vacias_camara_2; ?></span> 
                      </p>                      
                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios Ocupados: <?php echo $total_ocupadas_camara_2; ?></span> 
                      </p>                      

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: <?php echo $porcentaje_camara_2+1; ?>%;"></div>
                      </div>
                    </li>

                    <li>
                      <p>
                        <!-- Checkbox -->
                         
                        <!-- Name -->
                        Cámara 3
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Ocupación al <?php echo $porcentaje_camara_3; ?></span> 
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios totales: <?php echo $total_tarimas_camara_3; ?></span> 
                      </p>                      
                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios Disponibles: <?php echo $total_vacias_camara_3; ?></span> 
                      </p>                      
                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Espacios Ocupados: <?php echo $total_ocupadas_camara_3; ?></span> 
                      </p>                      

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: <?php echo $porcentaje_camara_3+1; ?>%;"></div>
                      </div>
                    </li>                                                            

                  </ul>
                  <div class="clearfix"></div>  


                </div>
                <div class="widget-foot">

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