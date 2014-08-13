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

            <li class="nblue current open"><a href="<?php echo site_url("admin"); ?>"><i class="icon-desktop"></i> Panel</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue">
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
	      <h2 class="pull-left">Espacios en Disponibles 
          <!-- page meta -->
          <span class="page-meta">Camaras</span>
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
                        <span>Ocupación al <?php echo ceil($porcentaje_camara_1); ?></span> 
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
                        <span>Ocupación al <?php echo ceil($porcentaje_camara_2); ?></span> 
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
                        <span>Ocupación al <?php echo ceil($porcentaje_camara_3); ?></span> 
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