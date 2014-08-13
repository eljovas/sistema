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
	      <h2 class="pull-left">Almacenaje de Productos 
          <!-- page meta -->
          <span class="page-meta">Listado de Almacenajes de Productos</span>
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
                        <p><a href="<?php echo site_url("almacenaje/nuevo"); ?>" class="btn btn-primary">Nuevo Producto</a></p>
                      </div>
                      <div class="clearfix"></div> 

                    </div>
                <div class="widget-head">
                  <div class="pull-left">Productos</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <table id="listing-almacenaje" class="table table-bordered ">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Cliente</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Fecha Alta</th>
                          <th>Control</th>
                        </tr>
                      </thead>
                      <tbody>

                                            <?php 
                    if (isset($almacenajes) && !empty($almacenajes)) {
                      foreach ($almacenajes as $almacenaje) {

                        echo "<tr>
                        <td>".$almacenaje->codigo_producto."</td>
                        <td>".$almacenaje->cliente1."</td>
                        <td>".$almacenaje->nombre_producto."</td>
                        <td>".$almacenaje->descripcion_empaque."</td>
                        <td>".$almacenaje->created_date."</td>
                        <td>
                              <a target=\"_blank\" class=\"btn btn-mini btn-success\" href=\"".site_url("almacenajes/imprimir/".$almacenaje->id1)."\"><i class=\"icon-print\"></i> </a>                                                
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("almacenajes/editar/".$almacenaje->id1)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" href=\"".site_url("almacenajes/eliminar/".$almacenaje->id1)."\"><i class=\"icon-remove\"></i> </a>                        

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
                      <p><a href="<?php echo site_url("almacenaje/nuevo"); ?>" class="btn btn-primary">Nuevo Producto</a></p>
                      </div>
                      <div class="clearfix"></div> 

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