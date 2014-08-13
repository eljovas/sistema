<?php $this->load->view('clientes/includes/header_view'); ?>

<div class="container">
	<h1 align="center">FRIGOMAR</h1>
	<hr>
	<h3>Perfil de Cliente</h3>
	<table class="table table-condensed">
		
		<tbody>
			<tr>
				<th width="200" align="right">Razon Social</th>
				<td><?php echo $cliente->razon_social; ?></td>
			</tr>
			<tr>
				<th>Razon Comercial</th>
				<td><?php echo $cliente->razon_comercial; ?></td>
			</tr>			
			<tr>
				<th>Nombre</th>
				<td><?php echo $cliente->nombre_contacto . " " . $cliente->apellido_paterno . " " . $cliente->apellido_materno; ?></td>
			</tr>			
			<tr>
				<th>Correo</th>
				<td><?php echo $cliente->email_contacto; ?></td>
			</tr>			
			<tr>
				<th>Teléfono</th>
				<td><?php echo $cliente->telefono_contacto; ?></td>
			</tr>			
			<tr>
				<th>Domicilio</th>
				<td><?php echo $cliente->domicilio; ?></td>
			</tr>
			<tr>
				<th>Codigo Postal</th>
				<td><?php echo $cliente->codigo_postal; ?></td>
			</tr>			

		</tbody>
	</table>
	<hr>
	<h3>Tarifa Almacenaje <?php echo $cliente->esquema_cobranza; ?></h3>	
	<?php if ($cliente->esquema_cobranza=="variable"): ?>
		<table class="table table-condensed">
			<tbody>
				<tr>
					<th>Tarimas</th>
					<?php 
					if (isset($tarifas)) {
						echo "
						<td>".$tarifas->tarimasmin1."-".$tarifas->tarimasmax1."</td>
						<td>".$tarifas->tarimasmin2."-".$tarifas->tarimasmax2."</td>
						<td>".$tarifas->tarimasmin3."-".$tarifas->tarimasmax3."</td>
						<td>".$tarifas->tarimasmin4."-".$tarifas->tarimasmax4."</td>
						<td>".$tarifas->tarimasmin5."-".$tarifas->tarimasmax5."</td>
						<td>".$tarifas->tarimasmin6."-".$tarifas->tarimasmax6."</td>
						<td>".$tarifas->tarimasmin7."-".$tarifas->tarimasmax7."</td>
						<td>".$tarifas->tarimasmin8."-".$tarifas->tarimasmax8."</td>
						<td>".$tarifas->tarimasmin9."-".$tarifas->tarimasmax9."</td>
						<td>".$tarifas->tarimasmin10."-".$tarifas->tarimasmax10."</td>
						";	
					}
					?>					
				</tr>
				<tr>
					<th>Precios</th>
					<?php 
					if (isset($tarifas)) {
						echo "
						<td>$".number_format($tarifas->tarifa1,2)."</td>
						<td>$".number_format($tarifas->tarifa2,2)."</td>
						<td>$".number_format($tarifas->tarifa3,2)."</td>
						<td>$".number_format($tarifas->tarifa4,2)."</td>
						<td>$".number_format($tarifas->tarifa5,2)."</td>
						<td>$".number_format($tarifas->tarifa6,2)."</td>
						<td>$".number_format($tarifas->tarifa7,2)."</td>
						<td>$".number_format($tarifas->tarifa8,2)."</td>
						<td>$".number_format($tarifas->tarifa9,2)."</td>
						<td>$".number_format($tarifas->tarifa10,2)."</td>
						";	
					}
					?>					
				</tr>
			</tbody>
		</table>
	<?php endif ?>
	<?php if ($cliente->esquema_cobranza=="fijo"): ?>
		<table class="table table-condensed">
			<tr>
				<td width="200" align="right"><strong>Precio</strong></td>
				<td><?php echo "$".number_format($cliente->precio_tarima,2); ?></td>
			</tr>
		</table>
	<?php endif ?>
	<hr>
	<h3>Servicios Contratados</h3>
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Concepto</th>
				<th>Costo</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($servicios) && !empty($servicios)) {
					foreach ($servicios as $servicio) {
			?>

			<tr>
				<td><?php echo $servicio->rubro; ?></td>
				<td><?php echo $servicio->concepto; ?></td>
				<td>$<?php echo number_format($servicio->costo,2); ?></td>
			</tr>
				<?php } ?>
			<?php }else{ ?>
			<tr>
				<td colspan="3">Sin servicios contratados</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	

	<hr>
	<h3>Almacenajes</h3>
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Descripción</th>
				<th>Empaque</th>
				<th>Fecha Contratacion</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($almacenajes) && !empty($almacenajes)) {
					foreach ($almacenajes as $almacenaje) {
			?>

			<tr>
				<td><?php echo $almacenaje->codigo_producto; ?></td>
				<td><?php echo $almacenaje->descripcion_empaque; ?></td>
				<td><?php echo $almacenaje->tipo_empaque; ?></td>
				<td><?php echo $almacenaje->created_date; ?></td>
			</tr>
				<?php } ?>
			<?php }else{ ?>
			<tr>
				<td colspan="5">Sin almacenajes contratados</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	
	<hr>
	<h3>Espacios Ocupados</h3>
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Folio</th>
				<th>Camara</th>
				<th>Bloque</th>
				<th>Calle</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($tarimas) && !empty($tarimas)) {
					foreach ($tarimas as $tarima) {
			?>

			<tr>
				<td><?php echo $tarima->id; ?></td>
				<td><?php echo $tarima->camara; ?></td>
				<td><?php echo $tarima->bloque; ?></td>
				<td><?php echo $tarima->calle; ?></td>
			</tr>
				<?php } ?>
			<?php }else{ ?>
			<tr>
				<td colspan="5">Sin espacios registrados</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php $this->load->view('clientes/includes/footer_view'); ?>