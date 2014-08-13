<!-- Main content starts -->

<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">x</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando paciente del sistema.</p>
        <p>Estas seguro?</p>
    </div>
    <div class="modal-footer">
      <a href="#" id="btnYes" class="btn danger">Si</a>
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
    </div>
</div>
  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

    <div class="sidebar-inner">

          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

			<?php $data["current"] = NULL; $this->load->view("clientes/includes/menu",$data); ?>

          </ul>

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
          <span class="page-meta">Pacientes</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

   <div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left">Pacientes</div>
                       <div class="pull-right">
                        <p><a href="<?php echo site_url("clients/nuevo"); ?>" class="btn btn-primary">Nuevo Paciente</a></p>
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
<table cellpadding="0" cellspacing="0" border="0" id="data" width="100%" class="table  table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Doctor</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody></tbody>
    <tfoot></tfoot>
</table>
                    <!--table class="table  table-bordered " id="pacientes-listing">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Telefono</th>
                          
                          <th>Control</th>
                        </tr>
                      </thead>
                      <tbody>

                                            <?php 
                    /*if (isset($clientes) && !empty($clientes)) {
                      foreach ($clientes as $cliente) {
                        echo "<tr id=\"listing-cliente-".$cliente->id."\">
                        <td>".$cliente->id."</td>
                        <td><strong>".$cliente->nombre." ".$cliente->apellido."</strong></td>
                        <td><span class=\"bfh-phone\" data-format=\"(ddd) ddd-dddd\" data-number=\"".$cliente->telefono_contacto."\"></span></td>
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("clients/editar/".$cliente->id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger confirm-delete\" data-id=\"".$cliente->id."\" href=\"".site_url("clients/eliminar/".$cliente->id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }*/
                    ?>
                      </tbody>
                    </table-->

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