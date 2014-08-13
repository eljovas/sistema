<?php $this->load->view('secure/includes/header_view_print'); ?>

<div class="container">
	<div class="row">
		<div class="span2"><img src="http://frigomar.com.mx/frio/wp-content/uploads/2013/01/logoweb.png"></div>
		<div class="span10">
			<h3>FRIGORIFICO BAJO CERO K&amp;M S. DE R.L. DE C.V.</h3>
			<h4>Autorización de Salida de Producto</h4>
			<p>Fecha de Salida: <strong><?php echo $salida->created_date; ?></strong></p>
			<p># Salida: <strong>KM-<?php echo $salida->folio; ?></strong></p>
		</div>
	</div>
	<hr>
	<h3>Datos Generales</h3>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Destino de la Mercancia</th>
				<th>Nombre del que Recoge</th>
				<th>Linea de Transporte</th>
				<th>Placas Tractor/Caja</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $cliente->razon_comercial; ?></td>
				<td><?php echo $salida->destino; ?></td>
				<td><?php echo $salida->recoge; ?></td>
				<td><?php echo $salida->transporte; ?></td>
				<td><?php echo $salida->placas; ?></td>
				<td><?php echo $salida->descripcion; ?></td>
			</tr>
		</tbody>	
	</table>
	<hr>
<h3>Producto</h3>
<h4>Agradecemos proceder a entregar el siguiente producto</h4>
                      <hr>
                        <table id="tarimas-asigandas" class="table table-bordered">
                          
                          <thead>
                            <tr>
                              <th>Codigo Producto</th>
                              <th>Cajas</th>
                              <th>Kilos</th>
                              <th>Tarima|Camara|Bloque|Calle</th>                              
                            </tr>
                          </thead>
                          <tbody>
                    <?php 
                    if (isset($tarimas) && !empty($tarimas)) {
                      foreach ($tarimas as $tarima) {
                        echo "<tr>
                        <td>".$tarima->codigo_producto."</td>
                        <td>".$tarima->cajas."</td>
                        <td>".$tarima->kilos."</td>
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
	
	
	<hr>
	
	<div class="row" align="center">
		<div class="span4">
			
			<br><br><br><br>
			<hr>
			<p>Autoriza</p>
		</div>
		<div class="span4">
			
			<br><br><br><br>
			<hr>
			<p>Recoge</p>
		</div>
		<div class="span4">
			
			<br><br><br><br>
			<hr>
			<p>Cliente recibe de conformidad</p>
		</div>
	</div>
</div>

<?php $this->load->view('secure/includes/footer_view_print'); ?>