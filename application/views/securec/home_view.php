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

            <li class="nblue current"><a href="<?php echo site_url("admin"); ?>"><i class="icon-desktop"></i> <?php echo $this->session->userdata('client'); ?></a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-user"></i> Operaciones 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	<li><a href="#">Compras</a></li>
                  <li><a href="#">Reporte de Inventario</a></li>
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
	      <h2 class="pull-left">Resumen del Movimientos 
          <!-- page meta -->
          <span class="page-meta">Actividades Recientes</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         

          <!-- Dashboard Graph starts -->

          <div class="row-fluid">
            <div class="span8">

              <!-- Widget -->
              <div class="widget wlightblue">
                <!-- Widget head -->
                <div class="widget-head">
                  <div class="pull-left">Estadisticas</div>
                  <div class="clearfix"></div>
                </div>             

                <!-- Widget content -->
                <div class="widget-content">
                  <div class="padd">

                    <!-- Bar chart (Blue color). jQuery Flot plugin used. -->
                    <div id="bar-chart"></div>


                  </div>
                </div>
                <!-- Widget ends -->

              </div>
            </div>

            <div class="span4">

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
                        <span>capacidad  al 80%</span> 
                      </p>

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-danger" style="width: 80%;"></div>
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
                        <span>capacidad  al 50%</span> 
                      </p>

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: 50%;"></div>
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
                        <span>capacidad  al 40%</span> 
                      </p>

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: 40%;"></div>
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