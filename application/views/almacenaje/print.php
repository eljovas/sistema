<?php $this->load->view('clientes/includes/header_view'); ?>

<div class="container">
	<h1 align="center">FRIGOMAR </h1>
	<hr>
	
	<h3>Cliente</h3>
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
	<h3>Almacenaje</h3>
	<table class="table table-condensed">
		
		<tbody>
			
			<tr>
				<th width="200" align="right">Fecha de Registro</th>
				<td><?php echo $almacenaje->created_date; ?></td>
			</tr>			
			<tr>
				<th width="200" align="right">Folio</th>
				<td><?php echo $almacenaje->id; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Codigo de Producto</th>
				<td><?php echo $almacenaje->codigo_producto; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Nombre de Producto</th>
				<td><?php echo $almacenaje->nombre_producto; ?></td>
			</tr>

			<tr>
				<th width="200" align="right">Descripción de Producto</th>
				<td><?php echo $almacenaje->descripcion_empaque; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Valor de Reposición</th>
				<td><?php echo $almacenaje->valor_reposicion; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Refrigerado ó Congelado</th>
				<td><?php echo $almacenaje->refrigerado_congelado; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Temperatura Optima</th>
				<td><?php echo $almacenaje->temperatura_optima; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Tipo de Empaque</th>
				<td><?php echo $almacenaje->tipo_empaque; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Peso Bruto</th>
				<td><?php echo $almacenaje->peso_bruto; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Peso Neto</th>
				<td><?php echo $almacenaje->peso_neto; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Peso Variable</th>
				<td><?php echo $almacenaje->peso_variable; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Largo</th>
				<td><?php echo $almacenaje->largo; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Alto</th>
				<td><?php echo $almacenaje->alto; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Ancho</th>
				<td><?php echo $almacenaje->ancho; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Diametro</th>
				<td><?php echo $almacenaje->diametro; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Empaques Por Cama</th>
				<td><?php echo $almacenaje->empaques_por_cama; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Camas Por Pallet</th>
				<td><?php echo $almacenaje->camas_por_pallet; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Vigencia de Caducidad Minimo de Dias</th>
				<td><?php echo $almacenaje->minima_recibo; ?></td>
			</tr>
			<tr>
				<th width="200" align="right">Vigencia de Caducidad Minimo de Embarque</th>
				<td><?php echo $almacenaje->minima_embarque; ?></td>
			</tr>

			<tr>
				<th width="200" align="right">Instrucciones</th>
				<td><?php echo $almacenaje->instrucciones; ?></td>
			</tr>
		</tbody>
	</table>

	
</div>

<?php $this->load->view('clientes/includes/footer_view'); ?>