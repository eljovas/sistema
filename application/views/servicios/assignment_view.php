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
	      <h2 class="pull-left">Servicios Contratados  
          <!-- page meta -->
          <span class="page-meta">por cliente </span>
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
              <?php $create_form = array('id'=>'clients-form','class' => 'form-horizontal'); ?>
<?php echo form_open('grabar-servicios-cliente', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $cliente->id; ?>">
              <div class="widget nblue">
                <div class="widget-head">
                  <div class="pull-left"><?php echo $cliente->razon_comercial; ?> <input type="submit" class="btn btn-inverse" value="Grabar"></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd statement">
                    
                    
                    <div class="row-fluid">
                      <div class="span12">
                        <hr />

                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Activado</th>
                              <th>Concepto</th>
                              <th>Costo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 

                            if (isset($servicios) && !empty($servicios)) {
                              foreach ($servicios as $servicio) {
                                if (isset($servicios_contratados) && !empty($servicios_contratados)) {
                                  foreach ($servicios_contratados as $contratado) {
                                    if ($servicio->id == $contratado->id_servicio) {
                                     $costo = $contratado->costo;
                                     $status_check = 'checked';
                                     $status_input = NULL;
                                     break;
                                    }else{
                                       $costo = NULL;
                                       $status_check = NULL ;
                                       $status_input = 'disabled';                                      
                                    }
                                  }
                                }else{
                                     $costo = NULL;
                                     $status_check = NULL ;
                                     $status_input = 'disabled';                                      
                                }
                                echo "<tr>";
                                echo "<td><input ".$status_check." class=\"service_activated\" type=\"checkbox\" name=\"servicio[]\" value=\"".$servicio->id."\"></td>";
                                echo "<td>".$servicio->rubro." - <strong>".$servicio->concepto."</strong></td>";
                                echo "<td><input ".$status_input." type=\"text\" id=\"servicio".$servicio->id."\" name=\"servicio".$servicio->id."\" value=\"".$costo."\"></td>";
                                echo "</tr>";
                              }
                            }else{
                              echo "<tr><td colspan=\"7\">No hay servicios registrados<td></tr>";
                            }
                            ?>
                          </tbody>
                        </table>
                        <?php echo form_close(); ?>
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