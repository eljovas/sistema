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
			<?php $data["current"] = NULL; $this->load->view("caja/includes/menu",$data); ?>
          </ul>
		<div class="sidebar-widget">
			<!--<div id="miniCalendario"></div>-->
		</div>
    </div>
</div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Panel de Caja
          <!-- page meta -->
          <span class="page-meta">Control de movimientos en caja</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->

	    <!-- Matter -->

		<div class="matter">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12"> 
						<!-- List starts -->
						<ul class="today-datas">
						<!-- List #1 -->
							<li class="bred">
								<!-- Graph -->
								<div class="pull-left"><i class="icon-group"></i></div>
								<!-- Text -->
								<div class="datas-text pull-right"><span class="bold">95</span> Citas hoy</div>

								<div class="clearfix"></div>
							</li>

							<li class="bred">
								<!-- Graph -->
								<div class="pull-left"><i class="icon-group"></i></div>
								<!-- Text -->
								<div class="datas-text pull-right"><span class="bold">29</span> Citas atendidas</div>

								<div class="clearfix"></div>
							</li>

							<li class="bgreen">
								<!-- Graph -->
								<div class="pull-left"><i class="icon-usd"></i></div>
								<!-- Text -->
								<div class="datas-text pull-right"><span class="bold">$13.00</span> Tipo de Cambio</div>

								<div class="clearfix"></div>
							</li> 

							<li class="bviolet">
								<!-- Graph -->
								<div class="pull-left"><i class="icon-usd"></i></div>
								<!-- Text -->
								<div class="datas-text pull-right"><span class="bold">$12,150</span> Ingresos de hoy</div>

								<div class="clearfix"></div>
							</li>

							<li class="bviolet">
								<!-- Graph -->
								<div class="pull-left"><i class="icon-usd"></i></div>
								<!-- Text -->
								<div class="datas-text pull-right"><span class="bold">$228,380</span> Ingresos de la semana</div>

								<div class="clearfix"></div>
							</li> 

						</ul> 
					</div>
				</div>


				<!-- Resumen Inicia -->
				<div class="row-fluid">
						<div class="span6">
							<div class="widget wblue">
								<div class="widget-head">
									<div class="pull-left">Capturar Pago</div>
									<div class="widget-icons pull-right">
										<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
										<!--<a href="#" class="wclose"><i class="icon-remove"></i></a>-->
									</div>  
									<div class="clearfix"></div>
								</div>

								<div class="widget-content">
									<div class="padd">

										<div class="form quick-post">
											<!-- Edit profile form (not working)-->
											<form class="form-horizontal">
												<!-- Title -->
												<div class="control-group">
													<label class="control-label" for="title">Paciente</label>
													<div class="controls">
														<input type="text" class="input-large" id="title">
													</div>
												</div>   
												<!-- Content -->
												<div class="control-group">
													<label class="control-label" for="content">Tratamiento</label>
													<div class="controls">
														<input type="text" class="input-large" id="content">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="content">Sesi&oacute;n</label>
													<div class="controls">
														<input type="text" class="input-small" id="sesion">
													</div>
												</div>
												<!-- Cateogry -->
												<div class="control-group">
													<label class="control-label">Forma de pago</label>
													<div class="controls">                               
														<select>
															<option value="">- Selecciona forma de pago -</option>
															<option value="1">Efectivo</option>
															<!--<option value="2">Efectivo dolar</option>-->
															<option value="3">Tarjeta de Credito</option>
															<!--<option value="4">T.C. Dolar</option>-->
															<option value="5">Cheque</option>
														</select>  
													</div>
												</div>              
												<!-- Tags -->
												<div class="control-group">
													<label class="control-label" for="tags">Cantidad</label>
													<div class="controls">
														<input type="text" class="input-small" id="cantidadpeso" placeholder="pesos">
														<input type="text" class="input-small" id="cantidaddolar" placeholder="dolares">
													</div>
												</div>

												<!-- Buttons -->
												<div class="form-actions">
													<!-- Buttons -->
													<button type="submit" class="btn btn-success">Aceptar</button>
													<button type="reset" class="btn btn-info">Limpiar</button>
												</div>
											</form>
										</div>


									</div>
								</div>

								<!--<div class="widget-foot">
									 Footer goes here 
								</div>-->

							</div> 
						</div>            

					<div class="span6">
						<div class="widget wblue">
							<div class="widget-head">
								<div class="pull-left">Desglose de corte de caja</div>
								<div class="widget-icons pull-right">
									<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
									<!--<a href="#" class="wclose"><i class="icon-remove"></i></a>-->
								</div>
								<div class="clearfix"></div>
							</div>

							<div class="widget-content">

								<table class="table table-bordered ">
									<tr>
										<td><strong>Forma de Pago</strong></td>
										<td><strong>Cantidad</strong></td>
									</tr>
									<tr>
										<td>Efectivo Pesos</td>
										<td>$1,580.00</td>
									</tr>
									<tr>
										<td>Efectivo Dolar</td>
										<td>$650.00</td>
									</tr>
									<tr>
										<td>Tarjeta de Credito Pesos</td>
										<td>$1,580.00</td>
									</tr>
									<tr>
										<td>Tarjeta de Credito Dolar</td>
										<td>$580.00</td>
									</tr>
									<tr>
										<td>Cheque</td>
										<td>$0.00</td>
									</tr>
								</table>


								</div>
								<div class="widget-foot">
									<!-- Footer goes here -->
									<button type="submit" class="btn btn-success">Ver a detalle</button>
									<button type="reset" class="btn btn-info">Generar corte de caja</button>
								</div>
							</div> 
						</div>



					</div>  





				<div class="row-fluid">
					<div class="span6">
						<div class="widget wblue">
							<div class="widget-head">
								<div class="pull-left">Tipo de Cambio</div>
								<div class="widget-icons pull-right">
									<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
									<!--<a href="#" class="wclose"><i class="icon-remove"></i></a>-->
								</div>  
								<div class="clearfix"></div>
							</div>

							<div class="widget-content">
								<div class="padd">

									<div class="form quick-post">
										<!-- Edit profile form (not working)-->
										<form class="form-horizontal">
											<!-- Title -->
											<div class="control-group">
												<label class="control-label" for="title">Actual</label>
												<div class="controls">
													<input type="text" class="input-small" id="tcactual" value="13.00" disabled>
												</div>
											</div>   
											<!-- Content -->
											<div class="control-group">
												<label class="control-label" for="content">Nuevo</label>
												<div class="controls">
													<input type="text" class="input-small" id="tcnuevo">
												</div>
											</div>

											<!-- Buttons -->
											<div class="form-actions">
												<!-- Buttons -->
												<button type="submit" class="btn btn-success">Aceptar</button>
												<button type="reset" class="btn btn-info">Limpiar</button>
											</div>
										</form>
									</div>

								</div>
							</div>

							<!--<div class="widget-foot">
								 Footer goes here 
							</div>-->

						</div> 
					</div>            
				</div>



				</div>
				<!-- Resumen Termina -->


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