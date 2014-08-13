<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
    <div class="sidebar-inner">

          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->
			<?php $data["current"] = NULL; $this->load->view("biopsias/includes/menu",$data); ?>

          </ul>

        </div>

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
          <span class="page-meta">Biopsias</span>
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
                  <div class="pull-left">Agregar Nueva Biopsia</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
 <div class="padd">
                   <?php $create_form = array('id'=>'biopsias-form', 'class' => 'form-horizontal'); ?>

<?php echo form_open('biopsias/save', $create_form); ?>

<h4>Datos Personales</h4>
                      <hr>
                      <div class="row">

                        <div class="span4">
                            <div class="control-group">
                              <label class="control-label" for="nombre">Nombre</label>
                              <div class="controls">
                                <input type="text" id="nombre" name="nombre" class="span3" placeholder="Nombre(s)">
                              </div>
                            </div>
                        </div>
                        <div class="span4">

                          <div class="control-group">
                            <label class="control-label" for="apellidos">Apellidos</label>
                            <div class="controls">
                              <input type="text" id="apellidos" name="apellidos" class="span3" placeholder="Apellido(s)">
                            </div>
                          </div>                          
                        </div>
                      </div>                      

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="telefono">Tel&eacute;fono</label>
								<div class="controls">
									<input type="tel" id="telefono" name="telefono" class="span3 bfh-phone" data-format="(ddd) ddd-dddd">
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="correo">Email</label>
								<div class="controls">
									<input type="email" id="correo" name="correo" class="span3">
								</div>
							</div>
						</div>
					</div>

<h4>Informaci&oacute;n de la muestra</h4>
                      <hr>
                      <div class="row">

                        <div class="span12">
                            <div class="control-group">
                              <label class="control-label" for="tipo_biopsia">Tipo</label>
                              <div class="controls">
                                <input type="text" id="tipo_biopsia" name="tipo_biopsia" class="span7" placeholder="Detalle de la biopsia">
                              </div>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="span12">

                          <div class="control-group">
                            <label class="control-label" for="comentarios">Comentarios</label>
                            <div class="controls">
                              <textarea id="comentarios" name="comentarios" class="span7" placeholder="Alg&uacute;n comentario sobre el procedimiento"></textarea>
                            </div>
                          </div>                          
                        </div>
                      </div>                      

					<hr>

					<div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>


<?php echo form_close(); ?>
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