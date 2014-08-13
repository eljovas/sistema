<!-- Main content starts -->

<div class="content">
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Modal header</h3>
		</div>
		<div id="bodymodal" class="modal-body">
			<p>cargando…</p>
		</div>
		<div id="botones-cita-actual" class="modal-footer">
			<span id="listener_cancel"><img src="<?php echo base_url(); ?>assets/img/loading.gif"> cancelando</span>
			<button class="btn" data-dismiss="modal" aria-hidden="true">cerrar</button>
			<input type="hidden" id="idcita" value="">
		</div>
		<div id="botones-cita-nueva" class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">cerrar</button>
			<button id="grabarcita" class="btn btn-success">grabar</button>
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
			<?php $data["current"] = NULL; $this->load->view("cosmetologas/includes/menu",$data); ?>

          </ul>

		  <div class="sidebar-widget">
			<div id="miniCalendario"></div>
		  </div>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Calendario de citas
          <!-- page meta -->
          
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         

          <div class="row-fluid">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#cosmetologas" data-toggle="tab">Cosmetologas</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="cosmetologas">
						<div id="calendarCosmetologa"></div>
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