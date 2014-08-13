<?php $this->load->view('secure/includes/header_view_print'); ?>

<div class="container">
	<div class="row">
		<div class="span2"><img src="http://frigomar.com.mx/frio/wp-content/uploads/2013/01/logoweb.png"></div>
		<div class="span10">
			<h3>FRIGORIFICO BAJO CERO K&amp;M S. DE R.L. DE C.V.</h3>
			<h4>Acta de Revisión en Recibo de Producto</h4>
			<p>Fecha Recepción: <strong><?php echo $entrada->created_date; ?></strong></p>
			<p># Entrada: <strong>KM-<?php echo $entrada->folio; ?></strong></p>
		</div>
	</div>
	<hr>
	<h3>Datos Generales</h3>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Nombre Recibe</th>
				<th>Operador</th>
				<th>Placas Vehiculo</th>
				<th>Placas Caja/Contenedor</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $cliente->razon_comercial; ?></td>
				<td><?php echo $entrada->nombre_recibe; ?></td>
				<td><?php echo $entrada->operador; ?></td>
				<td><?php echo $entrada->placas; ?></td>
				<td><?php echo $entrada->placas_contenedor; ?></td>
			</tr>
		</tbody>	
	</table>
	<hr>
<h3>Producto</h3>
                      <hr>
                        <table id="tarimas-asigandas" class="table table-bordered">
                          
                          <thead>
                            <tr>
                              <th>Codigo Producto</th>
                              <th>kilos</th>
                              <th>lote</th>
                              <th>Caducidad</th>
                              <th>Tarima|Camara|Bloque|Calle</th>                              
                            </tr>
                          </thead>
                          <tbody>
                    <?php 
                    if (isset($tarimas) && !empty($tarimas)) {
                      foreach ($tarimas as $tarima) {
                        echo "<tr>
                        <td>".$tarima->codigo_producto."</td>
                        <td>".$tarima->kilos."</td>
                        <td>".$tarima->lote."</td>
                        <td>".$tarima->caducidad."</td>
                        <td>".$tarima->tarima."|".$tarima->camara."|".$tarima->bloque."|".$tarima->calle."</td>
                        </tr>";
                      }
                    }
                    else{
                      echo "<tr><td colspan=\"5\">No hay tarimas asignadas</td></tr>";
                    }
                    ?>
                          </tbody>
                        </table>	
	
	<h3>Conceptos de Revision</h3>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Concepto</th>
				<th>SI</th>
				<th>NO</th>
				<th>N/A</th>
				<th>Obervaciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Sellos caja/contenedor sin daños</td>
				<td><?php echo ($entrada->contenedor_danos=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->contenedor_danos=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->contenedor_danos=="na")?"x":""; ?></td>
				<td><?php echo $entrada->revision_contenedor_danos_obervaciones; ?></td>
			</tr>
			<tr>
				<td>Caja/contenedor sin daños y limpieza adecuada</td>
				<td><?php echo ($entrada->sin_danos_limpieza=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->sin_danos_limpieza=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->sin_danos_limpieza=="na")?"x":""; ?></td>
				<td><?php echo $entrada->sin_danos_limpieza_observaciones; ?></td>
			</tr>			
			<tr>
				<td>Temperatura Adecuada</td>
				<td colspan="3"><?php echo $entrada->temperatura_adecuada; ?>&ordm;C</td>
				<td><?php echo $entrada->temperatura_adecuada_observaciones; ?></td>
			</tr>
			<tr>
				<td>Ocupa acondicionamiento de temperatura</td>
				<td><?php echo ($entrada->acondicionamiento_temperatura=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->acondicionamiento_temperatura=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->acondicionamiento_temperatura=="na")?"x":""; ?></td>
				<td><?php echo $entrada->acondicionamiento_temperatura_observaciones; ?></td>
			</tr>			
			<tr>
				<td>Descarga de Producto Agranel</td>
				<td colspan="4"><?php echo $entrada->descarga_producto_agranel; ?></td>
			</tr>		
			<tr>
				<td>Descaga de Producto en Tarima</td>
				<td colspan="4"><?php echo $entrada->descarga_producto_agranel; ?></td>
			</tr>						
			<tr>
				<td>Cajas o empaques sin daños</td>
				<td><?php echo ($entrada->cajas_empaques_sin_danos=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->cajas_empaques_sin_danos=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->cajas_empaques_sin_danos=="na")?"x":""; ?></td>
				<td><?php echo $entrada->cajas_empaques_sin_danos_observaciones; ?></td>
			</tr>			
			<tr>
				<td>Sellos de Cajas o empaques sin daños</td>
				<td><?php echo ($entrada->sellos_cajas_empaques_sin_danos=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->sellos_cajas_empaques_sin_danos=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->sellos_cajas_empaques_sin_danos=="na")?"x":""; ?></td>
				<td><?php echo $entrada->sellos_cajas_empaques_sin_danos_observaciones; ?></td>
			</tr>			
			<tr>
				<td>Tarimas sin daños</td>
				<td><?php echo ($entrada->tarimas_sin_danos=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->tarimas_sin_danos=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->tarimas_sin_danos=="na")?"x":""; ?></td>
				<td><?php echo $entrada->tarimas_sin_danos_observaciones; ?></td>
			</tr>			
			<tr>
				<td>Producto Caducado</td>
				<td><?php echo ($entrada->producto_caducado=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->producto_caducado=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->producto_caducado=="na")?"x":""; ?></td>
				<td><?php echo $entrada->producto_caducado_observaciones; ?></td>
			</tr>
			<tr>
				<td>Productos y cantidades coinciden con la autorización de entrada del cliente</td>
				<td><?php echo ($entrada->producto_coincide=="si")?"x":""; ?></td>
				<td><?php echo ($entrada->producto_coincide=="no")?"x":""; ?></td>
				<td><?php echo ($entrada->producto_coincide=="na")?"x":""; ?></td>
				<td><?php echo $entrada->producto_coincide_observaciones; ?></td>
			</tr>			
			<tr>
				<td>Comentarios Adicionales</td>
				<td colspan="4"><?php echo $entrada->comentarios_adicionales; ?></td>
			</tr>			
		</tbody>
	</table>
	<hr>
	<h4>Importante</h4>
	<ol>
		<li>Frigomar no es responsable por ningun daño de origen detectado al momento de recibo.</li>
		<li>Si para una entrada se detecta uno ó mas daños durante el muestreo, Frigomar se exime de toda responsabilidad por daños de origen ocultos que se hallen posteriormente en los lotes de productos incluidos en dicha entrada correspondiente a este reporte.</li>
	</ol>
	
	<div class="row" align="center">
		<div class="span4">
			<h5>ELABORO</h5>
			<br><br><br><br>
			<hr>
			<p>Nombre y Firma Recibe</p>
		</div>
		<div class="span4">
			<h5>REVISO</h5>
			<br><br><br><br>
			<hr>
			<p>Nombre y Firma Supervisor</p>
		</div>
		<div class="span4">
			<h5>ENTERADO</h5>
			<br><br><br><br>
			<hr>
			<p>Nombre y Firma Cliente/Responsable</p>
		</div>
	</div>
</div>

<?php $this->load->view('secure/includes/footer_view_print'); ?>