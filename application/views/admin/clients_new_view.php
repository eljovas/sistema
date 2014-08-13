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
                  <div class="pull-left">Agregar Nuevo Paciente</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
 <div class="padd">
                   <?php $create_form = array('id'=>'clients-form', 'class' => 'form-horizontal'); ?>

<?php echo form_open('clients/save', $create_form); ?>

<h4>Datos Personales</h4>
                      <hr>
                      <div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="genero">Género:</label>
								<div class="controls">
									<div id="switch-gender" class="switcher" data-on-label="<i class='icon-female icon-white'></i>" data-off-label="<i class='icon-male'></i>">
										<input type="checkbox" checked />
									</div>                              
									<input type="hidden" id="sexo" name="sexo" value="femenino">
								</div>
							</div>                          
						</div>

                      </div>
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
								<label class="control-label" for="estado_civil">Estado civil:</label>
								<div class="controls">
									<select id="estado_civil" name="estado_civil">
										<option value="">Elija su estado civil</option>
										<option value="soltero">Soltero(a)</option>
										<option value="union libre">Union libre</option>
										<option value="casado">Casado(a)</option>
										<option value="divorciado">Divorciado(a)</option>
										<option value="viudad">Viudo(a)</option>
										<option value="sin especificar">Sin especificar</option>
									</select>
								</div>
							</div>                          
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="profesion">Profesi&oacute;n</label>
								<div class="controls">
									<input type="text" id="profesion" name="profesion"  class="span3" placeholder="Profesi&oacute;n">
								</div>
							</div>                          
						</div>
					</div>

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="motivo">Motivo:</label>
								<div class="controls">
									<select id="motivo" name="motivo">
										<option value="1">Selecciona Procedimiento</option>
										
										<?php 
										if (isset($procedimientos) && !empty($procedimientos)) {
											foreach ($procedimientos as $procedimiento) {
												echo "<option value=\"".$procedimiento->id."\">".$procedimiento->concepto."</option>";
											}
										}
										?>
									</select>
								</div>
							</div>                          
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="doctor">Doctor:</label>
								<div class="controls">
									<select id="doctor" name="doctor">
										<option value="">Selecciona Doctor</option>
										<?php 
											if (isset($doctores) && !empty($doctores)) {
												foreach ($doctores as $doctor) {
													echo "<option value=\"".$doctor->user_id."\">".$doctor->first_name."</option>";
												}
											}
										?>
									</select>
								</div>
							</div>                          
						</div>
					</div>

					<div class="row">
						<div class="span4">
							<div  class="control-group">
								<label class="control-label" for="fecha_nacimiento">Fecha Nacimiento</label>
								<div class="controls">
									<div id="datetimepicker1" class="input-append readonly">
										<input data-format="yyyy-MM-dd" type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="span2" readonly>
										<span class="add-on">
											<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
										</span>
									</div>
								</div>
							</div>                        
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="fecha_ingreso">Fecha Ingreso</label>
								<div class="controls">
									<div id="datetimepicker3" class="input-append readonly">
										<input data-format="yyyy-MM-dd" type="text" id="fecha_ingreso" name="fecha_ingreso" class="span2" readonly>
										<span class="add-on">
											<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
										</span>
									</div>
								</div>
							</div>                           
						</div>                        
					</div>

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="tipo_consulta">Consulta:</label>
								<div class="controls">
									<select id="tipo_consulta" name="tipo_consulta">
										<option value="">Elija el tipo de consulta</option>
										<option value="particular">Particular</option>
										<option value="empresa">Empresa</option>
									</select>
								</div>
							</div>                          
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="empresa">Empresa</label>
								<div class="controls">
									<input disabled="disabled" type="text" id="empresa" name="empresa" class="span3" placeholder="De que empresa nos visita?">
								</div>
							</div>                          
						</div>
					</div>

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="recomendado">Recomendado por</label>
								<div class="controls">
									<input type="text" id="recomendado" name="recomendado" class="span3" placeholder="Alguien lo recomendo?">
								</div>
							</div>                          
						</div>
					</div>

					<h4>Datos de Contacto</h4>
					<hr>
					<div class="row">
						<div class="span8">
							<div class="control-group">
								<label class="control-label" for="domicilio">Domicilio</label>
								<div class="controls">
									<input type="text" id="domicilio" name="domicilio" class="span7">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="telefono">Tel&eacute;fono</label>
								<div class="controls">
									<input type="tel" id="telefono" name="telefono" class="span3">
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

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="pais">Pa&iacute;s:</label>
								<div class="controls">
									<select id="pais" name="pais" data-provide="typeahead">
										<?php 
										$paises=simplexml_load_file("./paises.xml");
										foreach ($paises as $pais) {
											echo "<option value=\"".$pais->Code."\">".$pais->Name."</option>";
										}
										?>
										
									</select>
								</div>
							</div>                          
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="estado">Estado:</label>
								<div class="controls">
									<select id="estado" name="estado" data-provide="typeahead">
										<option value="">Selecciona Estado</option>
									</select>
								</div>
							</div>                          
						</div>
					</div>

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="ciudad">Ciudad</label>
								<div class="controls">
									<select id="ciudad" name="ciudad">
										<option value="">Selecciona Ciudad</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<h4>Contacto de Emergencia</h4>
					<hr>
					<div class="row">
						<div class="span8">
							<div class="control-group">
								<label class="control-label" for="nombre_emergencia">Nombre</label>
								<div class="controls">
									<input type="text" id="nombre_emergencia" name="nombre_emergencia" class="span7">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="telefono_emergencia">Tel&eacute;fono</label>
								<div class="controls">
									<input type="tel" id="telefono_emergencia" name="telefono_emergencia" class="span3">
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="control-group">
								<label class="control-label" for="celular_emergencia">Celular</label>
								<div class="controls">
									<input type="tel" id="celular_emergencia" name="celular_emergencia" class="span3">
								</div>
							</div>
						</div>
					</div>

					<h4>Historial Cl&iacute;nico</h4>
					<hr>
					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Hace ejercicio en forma regular?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta1" name="hc_pregunta1" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Padece alta o baja presi&oacute;n?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta11" name="hc_pregunta11" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Come en forma adecuada?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta2" name="hc_pregunta2" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Diabetes?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta12" name="hc_pregunta12" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Peso corporal normal?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta3" name="hc_pregunta3" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Colitis?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta13" name="hc_pregunta13" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Una enfermedad seria o incapacidad f&iacute;sica?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta4" name="hc_pregunta4" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Obesidad?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta14" name="hc_pregunta14" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Consume bebidas alcoh&oacute;licas?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta5" name="hc_pregunta5" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Problemas de H&iacute;gado-Ves&iacute;cula?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta15" name="hc_pregunta15" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Problemas en los ri&ntilde;ones (retiene l&iacute;quidos)?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta6" name="hc_pregunta6" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Enfermedades cr&oacute;nicas?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta16" name="hc_pregunta16" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Estre&ntilde;imiento?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta7" name="hc_pregunta7" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Antecedentes quir&uacute;rgicos?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta17" name="hc_pregunta17" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Problemas en la espalda?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta8" name="hc_pregunta8" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Embarazo o lactancia?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta18" name="hc_pregunta18" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Problemas cardiacos?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta9" name="hc_pregunta9" type="checkbox" />
							</div>
							</p>
						</div>
						<div class="span5">
							<p>
							<span class="span3">Venas varicosas?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta19" name="hc_pregunta19" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span5">
							<p>
							<span class="span3">Problemas respiratorios?</span>
							<div class="switcher" data-on-label="SI" data-off-label="NO">
								<input id="hc_pregunta10" name="hc_pregunta10" type="checkbox" />
							</div>
							</p>
						</div>
					</div>

					<h4>Hoja de trabajo</h4>
					<hr>
					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Antecedentes heredofamiliares?</span>
							<input type="text" id="ht_pregunta1" name="ht_pregunta1" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Antecedentes personales NO patol&oacute;gicos?</span>
							<input type="text" id="ht_pregunta2" name="ht_pregunta2" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Antecedentes patol&oacute;gicos?</span>
							<input type="text" id="ht_pregunta3" name="ht_pregunta3" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Antecedentes ginecoobstr&eacute;ticos?</span>
							<input type="text" id="ht_pregunta4" name="ht_pregunta4" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Padecimiento actual?</span>
							<input type="text" id="ht_pregunta5" name="ht_pregunta5" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Sintomas generales?</span>
							<input type="text" id="ht_pregunta6" name="ht_pregunta6" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Aparatos y sistemas?</span>
							<input type="text" id="ht_pregunta7" name="ht_pregunta7" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Signos vitales?</span>
							<input type="text" id="ht_pregunta8" name="ht_pregunta8" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Exploraci&oacute;n f&iacute;sica general?</span>
							<input type="text" id="ht_pregunta9" name="ht_pregunta9" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Cabeza?</span>
							<input type="text" id="ht_pregunta10" name="ht_pregunta10" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Cuello?</span>
							<input type="text" id="ht_pregunta11" name="ht_pregunta12" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">T&oacute;rax?</span>
							<input type="text" id="ht_pregunta13" name="ht_pregunta13" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Abdomen?</span>
							<input type="text" id="ht_pregunta14" name="ht_pregunta14" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Extremidades?</span>
							<input type="text" id="ht_pregunta15" name="ht_pregunta15" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Genitales?</span>
							<input type="text" id="ht_pregunta16" name="ht_pregunta16" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Laboratoriales y de imagen?</span>
							<input type="text" id="ht_pregunta17" name="ht_pregunta17" class="span5">
							</p>
						</div>
					</div>

					<div class="row">
						<div class="span8">
							<p>
							<span class="span3">Impresi&oacute;n diagnostica?</span>
							<input type="text" id="ht_pregunta18" name="ht_pregunta18" class="span5">
							</p>
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