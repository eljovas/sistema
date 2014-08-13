<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

         <?php $data["current"] = "administracion"; $this->load->view("admin/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Administración 
          <!-- page meta -->
          <span class="page-meta">Usuarios</span>
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
                        <p><a href="<?php echo site_url("admin/panel/create"); ?>" class="btn btn-primary">Nuevo Usuario</a></p>
                      </div>
                      <div class="clearfix"></div> 

                    </div>
                <div class="widget-head">
                  <div class="pull-left">Usuarios</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <table class="table  table-bordered ">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Correo</th>
                          <th>Tipo</th>
                          <th>Control</th>
                        </tr>
                      </thead>
                      <tbody>

                                            <?php 
                    if (isset($usuarios) && !empty($usuarios)) {
                      foreach ($usuarios as $usuario) {
                        switch ($usuario->user_level) {
                          case 1: $tipo = "mesa de control"; break;
                          case 2: $tipo = "cliente"; break;
                          case 69: $tipo = "administrador"; break;
                        }
                        echo "<tr>
                        <td>".$usuario->user_id."</td>
                        <td>".$usuario->first_name."</td>
                        <td>".$usuario->email."</td>
                        <td>".$tipo."</td>
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("admin/editar_usuario/".$usuario->user_id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" href=\"".site_url("admin/eliminar_usuario/".$usuario->user_id)."\"><i class=\"icon-remove\"></i> </a>                        
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
                      <p><a href="<?php echo site_url("admin/panel/create"); ?>" class="btn btn-primary">Nuevo Usuario</a></p>
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