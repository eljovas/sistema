<!-- JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-modalmanager.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-modal.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo base_url(); ?>assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-formhelpers-phone.format.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-formhelpers-phone.js"></script>

<!-- jQuery Flot -->
<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.stack.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="<?php echo base_url(); ?>assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<!-- <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>--> <!-- Date picker -->
<!-- <script src="<?php echo base_url(); ?>assets/js/locales/bootstrap-datepicker.es.js"></script>--> <!-- Date picker -->
<script src="<?php echo base_url(); ?>assets/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo base_url(); ?>assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script> <!-- Custom codes -->
<script src="<?php echo base_url(); ?>assets/js/charts.js"></script> <!-- Custom chart codes -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-editable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-combobox.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>

<!-- Script for this page -->
<script type="text/javascript">

$(function () {

	$('#quickadd').click(function() {
		$('#myModal').modal();
		$("#myModalLabel").html("Nuevo Paciente");
		$("#bodymodal").html('<table class="table table-bordered"><tr><th>Nombre:</th><td><input type="text" id="nombre" name="nombre" class="span3" placeholder="Nombre(s)"></td></tr><tr><th>Apellidos:</th><td><input type="text" id="apellidos" name="apellidos" class="span3" placeholder="Apellido(s)"></td></tr><tr><th>Telefono:</th><td><input type="text" id="telefono" name="telefono" class="span3" placeholder="Tel&eacute;fono"></td></tr><tr><th>Motivo:</th><td><select id="motivo" name="motivo"><option value="1">Selecciona Procedimiento</option><?php if (isset($procedimientos) && !empty($procedimientos)) { foreach ($procedimientos as $procedimiento) { echo "<option value=".$procedimiento->id.">".$procedimiento->concepto."</option>"; } } ?></select></td></tr><tr><th>Doctor:</th><td id="eldoctor"><select id="doctor" name="doctor"><option value="">Selecciona Doctor</option><?php if (isset($doctores) && !empty($doctores)) { foreach ($doctores as $doctor) { echo "<option value=".$doctor->user_id.">".$doctor->first_name."</option>"; } } ?></select></td></tr></table>');
		$('#botones-cita-actual').hide();
		$('#botones-cita-nueva').hide();
		$('#botones-nuevo-paciente').show();
	});

	$('#grabarpaciente').click(function() {
		var nombre    = $('#nombre').val();
		var apellidos = $('#apellidos').val();
		var motivo    = $('#motivo').val();
		var doctor    = $('#doctor').val();
		var telefono_contacto = $('#telefono').val();
		$.post( "<?php echo base_url(); ?>index.php/clients/savequickrecepcion/", { nombre: nombre, apellidos: apellidos, motivo: motivo, doctor:doctor, telefono_contacto:telefono_contacto }).done(function( data ) {
			var returned = jQuery.parseJSON( data );
			//$("#paciente_id").val(returned.id);
			//$("#paciente").val(returned.nombre);
			$('#myModal').modal('hide');
			//$('#clients-form')[0].reset();
		});
	});

	$('#grabarcita').click(function() {
		var tratamiento = $("#motivo").val();
		var asunto = $("#asunto_text").val();
		var paciente = $("#paciente_id").val();
		var pacienten = $("#paciente").val();
		var atendido = $("#atendido").val();

		var tipo = $("#tipo").val();

		if(tipo == "1") {
			var destino = 'quicksavedoctores';
			var cualcalendario = '#calendarDoctor';
		}
		if(tipo == "2") {
			var destino = 'quicksavecosmetologas';
			var cualcalendario = '#calendarCosmetologa';
		}

//		alert(tipo+" "+destino+" "+cualcalendario);

		var fecha = $("#fecha").val();
		var start = $("#hora1").val();
		var end = $("#hora2").val();
		var comentarios = $("#comentarios").val();
		var label = pacienten + " " + asunto;

		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/citas/"+destino,
			data: { tratamiento: tratamiento, paciente: paciente, atendido:atendido,fecha:fecha,start:start,end:end,comentarios:comentarios,label:label }
		})
		.done(function(  ) {
			$(cualcalendario).fullCalendar('refetchEvents');
			$('#myModal').modal('hide');
		});
	});

$('.combobox').combobox();
    var labels  , mapped;
    $('input.typeahead').typeahead({
        items:20,
        source: function (query, process) {
            $.ajax({
                url: '<?php echo base_url(); ?>/data.php',
                type: 'POST',
                dataType: 'JSON',
                data: 'query=' + query+'&sucursal='+<?php echo $sucursal; ?>,
                success: function(data) {
                    labels = [];
                    mapped = {};
                    $.each(data, function (i, item) {
                        mapped[item.name+' ']  = { id: item.id, label: item.name+' ' };
                        labels.push(item.name+' ')
                    });
                    process(labels);
                }
            });
        },updater: function (item) {
            var selObj = mapped[item];
            //$("#paciente_id").val(selObj.id);
            return selObj.label;
        }
    });  
	cargaCosmetologas();
	$('#cancelandocita').click(function() {
		console.log("cancelando");
		$("#listener_cancel").show();
		$(this).attr("disabled",true);
		var id = $("#idcita").val();
		$.get( "<?php echo base_url(); ?>index.php/citas/cancelar/"+id);
		$("#listener_cancel").hide();
		$(this).attr("disabled",false);
    
		$('#calendarCosmetologa').fullCalendar('refetchEvents');
		$('#calendarDoctor').fullCalendar('refetchEvents');
		$('#myModal').modal('hide');
	});

	$('#editarcita').click(function() {
		console.log("editando");
		var id = $("#idcita").val();
		document.location.href='<?php echo base_url(); ?>index.php/citas/editar/'+id;
	});

	$('#datetimepicker1').datetimepicker({ pickTime: false });

    $('#miniCalendario').datepicker({
    	language: "es",
    	onSelect: function(dateText, inst) {
            var d = new Date(dateText);
            $('#calendarCosmetologa').fullCalendar('gotoDate', d);
            $('#calendarDoctor').fullCalendar('gotoDate', d);
        }
    });

	$('#no_cliente').keyup(function() {
		var client = $(this).val();
		$('#cliente').val(client);
	});  

	$('#cliente').change(function() {
		$("#no_cliente").val($(this).val());
	});

	$('#listing-entradas').dataTable( {
		"sDom": "<'row-fluid'<'span6 padding-controls'l><'span6 padding-controls'f>r>t<'row-fluid'<'span6 padding-controls'i><'span6 padding-controls'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ entradas por pagina"
		}
	});

});


/* Calendario Cosmetologas */

function cargaCosmetologas(){

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

	var calendar = $('#calendarCosmetologa').fullCalendar({
	header: {
		left: 'prev,next,today',
		center: 'title',
		right: 'resourceDay'
	},
	defaultView: 'resourceDay',
	editable: false,
	allDaySlot: false,
	slotMinutes: 15,
	minTime: 9,
	maxTime: 20,
	timeFormat: 'h:mm{ - h:mm}',
	contentHeight: 1850,
	aspectRatio: 1,
	selectable: true,
	selectHelper: true,
	select: function(start, end, allDay, event, resourceId) {
		$('#myModal').modal();
		$("#myModalLabel").html("Nueva Cita");
		$('#botones-cita-actual').hide();
		$('#botones-nuevo-paciente').hide();
		$('#botones-cita-nueva').show();
		$.get( "<?php echo base_url(); ?>index.php/cosmetologas/getById/"+resourceId, function( data ) {
			var mes= parseInt(start.getMonth())+1;
			var fecha_chunks = start.getFullYear()+"-"+mes + "-" + start.getDate();
			var hora1_chunks = start.getHours()+":"+start.getMinutes() + ":" + "00";
			var hora2_chunks = end.getHours()+":"+end.getMinutes() + ":" + "00";
			var paciente_id = '  <input id="paciente_id" name="paciente_id" type="hidden" value="">';
			var asunto = '  <input id="asunto_text" name="asunto_text" type="hidden" value="">';
			var atendido = '<input id="atendido" name="atendido" type="hidden" value="'+resourceId+'">';

			var elusuario = data.split("/");
			var quienatiende = elusuario[0];

			var deltipo = '  <input type="hidden" id="tipo" name="tipo" value="'+elusuario[1]+'">';

			var fecha = '  <input id="fecha" name="fecha" type="hidden" value="'+fecha_chunks+'">';
			var hora1 = '  <input id="hora1" name="hora1" type="hidden" value="'+hora1_chunks+'">';
			var hora2 = '  <input id="hora2" name="hora2" type="hidden" value="'+hora2_chunks+'">';
			var paciente = '  <input id="paciente" name="paciente" class="typeahead" type="text" data-provide="typeahead" autocomplete="off" placeholder="Buscar por nombre...">';
			var tratamientos = '<select id="motivo" name="motivo" class="combobox"><option value="">Selecciona Procedimiento</option>                        <?php                         if(isset($procedimientos) && !empty($procedimientos)){                            foreach($procedimientos as $procedimiento){        echo "<option value=\"".$procedimiento->id."\">".$procedimiento->concepto."</option>"; }                        }                        ?>
			</select>';

			$("#bodymodal").html(deltipo+atendido+asunto+fecha+hora1+hora2+paciente_id+'<table class="table table-bordered"><tr><th>Tratamiento:</th><td>'+tratamientos+'</td></tr><tr><th>Paciente:</th><td>'+paciente+'</td></tr><tr><th>Atendido por:</th><td>'+quienatiende+'</td></tr><tr><th>Fecha:</th><td>'+start.toDateString()+'</td></tr><tr><th>Hora Inicio:</th><td>'+start.toTimeString()+'</td></tr><tr><th>Hora Fin:</th><td>'+end.toTimeString()+'</td></tr><tr><th>Comentarios:</th><td><textarea id="comentarios"></textarea></td></tr></table>');
			$('.combobox').combobox(); 
			$('#motivo').change(function() {
				$("#asunto_text").val($('#motivo').find('option:selected').text());
			});
		var labels  , mapped;
		$('input.typeahead').typeahead({
			items:20,
			source: function (query, process) {
				$.ajax({
					url: '<?php echo base_url(); ?>/data.php',
					type: 'POST',
					dataType: 'JSON',
					data: 'query=' + query+'&sucursal='+<?php echo $sucursal; ?>,
					success: function(data) {
						labels = [];
						mapped = {};
						$.each(data, function (i, item) {
							mapped[item.name+' ']  = { id: item.id, label: item.name+' ' };
							labels.push(item.name+' ')
						});
						process(labels);
					}
				});
			},updater: function (item) {
				var selObj = mapped[item];
				$("#paciente_id").val(selObj.id);
				return selObj.label;
			}
		});         
	});
                        
	calendar.fullCalendar("unselect");
	},
	eventResize: function(event, dayDelta, minuteDelta) {
		console.log("@@ resize event " + event.title + ", start " + event.start + ", end " + event.end + ", resource " + event.resourceId);
	},
	eventDrop: function( event, dayDelta, minuteDelta, allDay) {
		console.log("@@ drag/drop event " + event.title + ", start " + event.start + ", end " + event.end + ", resource " + event.resourceId);
	},

	eventClick: function(calEvent, jsEvent, view) {
		var atiende = calEvent.resource.name;
		var inicio = $.fullCalendar.formatDate(calEvent.start, "dddd, dd 'de' MMMM 'del' yyyy ' - de' h:mmtt 'a' ")+$.fullCalendar.formatDate(calEvent.end, "h:mmtt");
		var url = calEvent.url;
		var chunks = url.split("/"); 
		var id_cita = chunks[6];
		$("#idcita").val(id_cita);
		//$("#tipocita").val(tipo_cita); //ESTE MERO
		$.getJSON( '<?php echo base_url(); ?>index.php/citas/getById/'+id_cita, function( json ) {
		$('#myModal').modal();
		$('#botones-cita-actual').show();
		$('#botones-cita-nueva').hide();
		$('#botones-nuevo-paciente').hide();
		$('#myModal').on('shown', function() {
			$('#fecha').editable({
				format: 'yyyy-mm-dd hh:ii',
				viewformat: 'dd/mm/yyyy hh:ii',
				datetimepicker: { weekStart: 1   }
			});
		});
		$("#myModalLabel").html(json.concepto);
		var phone_iovas = "<span class='bfh-phone' data-format='(ddd) ddd-dddd' data-number='"+json.telefono_contacto+"'></span>";
		var span = document.createElement("span");
		span.setAttribute('class', 'bfh-phone');
		span.setAttribute('data-format', '(ddd) ddd-dddd');
		span.setAttribute('data-number', json.telefono_contacto);

		var cel_iovas = "<span class='bfh-cel' data-format='(ddd) ddd-dddd' data-number='"+json.emergencia_celular+"'></span>";
		var spanCel = document.createElement("span");       
		spanCel.setAttribute('class', 'bfh-cel');
		spanCel.setAttribute('data-format', '(ddd) ddd-dddd');
		spanCel.setAttribute('data-number', json.emergencia_celular);

		$("#bodymodal").html('<table class="table table-bordered"><tr><th>Paciente:</th><td>'+json.nombre+' '+json.apellido+' <a href="../index.php/clients/editar/'+json.id_cliente+'" title="editar paciente"><i class="icon-pencil"></i></a></td></tr><tr><th>Atendido por:</th><td>'+atiende+'</td></tr></tr><tr><th>Doctor:</th><td>'+json.first_name+'</td></tr><tr><th>Fecha:</th><td>'+inicio+'</td></tr><tr><th>Telefono:</th><td id="telefonoPaciente"></td></tr><tr><th>Celular:</th><td id="celularPaciente"></td></tr><tr><th>Email:</th><td>'+json.email_contacto+'</td></tr><tr><th>Comentarios:</th><td>'+json.comentarios+'</td></tr></table>');
		$("#telefonoPaciente").html(span);
		$('form input[type="text"].bfh-phone, form input[type="tel"].bfh-phone, span.bfh-phone').each(function () {
			var $phone = $(this);
			$phone.bfhphone($phone.data());
		});
		$("#celularPaciente").html(spanCel);
		$('form input[type="text"].bfh-cel, form input[type="tel"].bfh-cel, span.bfh-cel').each(function () {
			var $cel = $(this);
			$cel.bfhphone($cel.data());
		});
	});
	return false;
	},
	resources: [
		<?php 
		if (isset($cosmetologas) && !empty($cosmetologas)) {
			foreach ($cosmetologas as $cosmetologa) {
				echo "
				{
				name: '".$cosmetologa->first_name."',
				id: '".$cosmetologa->user_id."'
				},";
			}
		}
		?>
	],
	dayClick: function(date, allDay, jsEvent, view) {
		console.log(view.name);
		if (view.name === "month" || view.name === "agendaWeek") {
			$('#calendarCosmetologa').fullCalendar('gotoDate', date);
			$('#calendarCosmetologa').fullCalendar('changeView', 'resourceDay');
		}
	},
	events: '<?php echo base_url(); ?>index.php/citas/calendarCosmetologas'
	});
}

/* Calendario Doctores */

function cargaDoctores() {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	$('#calendarDoctor').fullCalendar({
		header: {
			left: 'prev,next,today',
			center: 'title',
			right: 'resourceDay'
		},
		defaultView: 'resourceDay',
		editable: false,
		allDaySlot: false,
		slotMinutes: 15,
		minTime: 9,
		maxTime: 20,
		timeFormat: 'h:mm{ - h:mm}',
		contentHeight: 1850,
		aspectRatio: 1,
	selectable: true,
	selectHelper: true,
	select: function(start, end, allDay, event, resourceId) {
		$('#myModal').modal();
		$("#myModalLabel").html("Nueva Cita");
		$('#botones-cita-actual').hide();
		$('#botones-nuevo-paciente').hide();
		$('#botones-cita-nueva').show();
		$.get( "<?php echo base_url(); ?>index.php/cosmetologas/getById/"+resourceId, function( data ) {
			var mes= parseInt(start.getMonth())+1;
			var fecha_chunks = start.getFullYear()+"-"+mes + "-" + start.getDate();
			var hora1_chunks = start.getHours()+":"+start.getMinutes() + ":" + "00";
			var hora2_chunks = end.getHours()+":"+end.getMinutes() + ":" + "00";
			var paciente_id = '  <input id="paciente_id" name="paciente_id" type="hidden" value="">';
			var asunto = '  <input id="asunto_text" name="asunto_text" type="hidden" value="">';
			var atendido = '<input id="atendido" name="atendido" type="hidden" value="'+resourceId+'">';

			var elusuario = data.split("/");
			var quienatiende = elusuario[0];

			var deltipo = '  <input type="hidden" id="tipo" name="tipo" value="'+elusuario[1]+'">';

			var fecha = '  <input id="fecha" name="fecha" type="hidden" value="'+fecha_chunks+'">';
			var hora1 = '  <input id="hora1" name="hora1" type="hidden" value="'+hora1_chunks+'">';
			var hora2 = '  <input id="hora2" name="hora2" type="hidden" value="'+hora2_chunks+'">';
			var paciente = '  <input id="paciente" name="paciente" class="typeahead" type="text" data-provide="typeahead" autocomplete="off" placeholder="Buscar por nombre...">';
			var tratamientos = '<select id="motivo" name="motivo" class="combobox"><option value="">Selecciona Procedimiento</option>                        <?php                         if(isset($procedimientos) && !empty($procedimientos)){                            foreach($procedimientos as $procedimiento){        echo "<option value=\"".$procedimiento->id."\">".$procedimiento->concepto."</option>"; }                        }                        ?>
			</select>';

			$("#bodymodal").html(deltipo+atendido+asunto+fecha+hora1+hora2+paciente_id+'<table class="table table-bordered"><tr><th>Tratamiento:</th><td>'+tratamientos+'</td></tr><tr><th>Paciente:</th><td>'+paciente+'</td></tr><tr><th>Atendido por:</th><td>'+quienatiende+'</td></tr><tr><th>Fecha:</th><td>'+start.toDateString()+'</td></tr><tr><th>Hora Inicio:</th><td>'+start.toTimeString()+'</td></tr><tr><th>Hora Fin:</th><td>'+end.toTimeString()+'</td></tr><tr><th>Comentarios:</th><td><textarea id="comentarios"></textarea></td></tr></table>');
			$('.combobox').combobox(); 
			$('#motivo').change(function() {
								
			$("#asunto_text").val($('#motivo').find('option:selected').text());
		});						 
		var labels  , mapped;
		$('input.typeahead').typeahead({
			items:20,
			source: function (query, process) {
				$.ajax({
					url: '<?php echo base_url(); ?>/data.php',
					type: 'POST',
					dataType: 'JSON',
					data: 'query=' + query+'&sucursal='+<?php echo $sucursal; ?>,
					success: function(data) {
						labels = [];
						mapped = {};
						$.each(data, function (i, item) {
							mapped[item.name+' ']  = { id: item.id, label: item.name+' ' };
							labels.push(item.name+' ')
						});
						process(labels);
					}
				});
			},updater: function (item) {
				var selObj = mapped[item];
				$("#paciente_id").val(selObj.id);
				return selObj.label;
			}
		});         
	});
                        
	calendar.fullCalendar("unselect");
	},
	eventResize: function(event, dayDelta, minuteDelta) {
		console.log("@@ resize event " + event.title + ", start " + event.start + ", end " + event.end + ", resource " + event.resourceId);
	},
	eventDrop: function( event, dayDelta, minuteDelta, allDay) {
		console.log("@@ drag/drop event " + event.title + ", start " + event.start + ", end " + event.end + ", resource " + event.resourceId);
	},

		eventClick: function(calEvent, jsEvent, view) {
			var atiende = calEvent.resource.name;
			var inicio = $.fullCalendar.formatDate(calEvent.start, "dddd, dd 'de' MMMM 'del' yyyy ' - de' h:mmtt 'a' ")+$.fullCalendar.formatDate(calEvent.end, "h:mmtt");
			var url = calEvent.url;
			var chunks = url.split("/"); 
			var id_cita = chunks[6];
			$("#idcita").val(id_cita);
			$.getJSON( '<?php echo base_url(); ?>index.php/citas/getById/'+id_cita, function( json ) {

				$('#myModal').modal();
				$('#botones-cita-actual').show();
				$('#botones-cita-nueva').hide();
				$('#botones-nuevo-paciente').hide();
				$('#myModal').on('shown', function() {
					$('#fecha').editable({
						format: 'yyyy-mm-dd hh:ii',
						viewformat: 'dd/mm/yyyy hh:ii',
						datetimepicker: { weekStart: 1   }
					});
				});

				$("#myModalLabel").html(json.concepto);
				var phone_iovas = "<span class='bfh-phone' data-format='(ddd) ddd-dddd' data-number='"+json.telefono_contacto+"'></span>";
				var span = document.createElement("span");
				span.setAttribute('class', 'bfh-phone');
				span.setAttribute('data-format', '(ddd) ddd-dddd');
				span.setAttribute('data-number', json.telefono_contacto);

				var cel_iovas = "<span class='bfh-cel' data-format='(ddd) ddd-dddd' data-number='"+json.emergencia_celular+"'></span>";
				var spanCel = document.createElement("span");       
				spanCel.setAttribute('class', 'bfh-cel');
				spanCel.setAttribute('data-format', '(ddd) ddd-dddd');
				spanCel.setAttribute('data-number', json.emergencia_celular);

				$("#bodymodal").html('<table class="table table-bordered"><tr><th>Paciente:</th><td>'+json.nombre+' '+json.apellido+' <a href="../index.php/clients/editar/'+json.id_cliente+'" title="editar paciente"><i class="icon-pencil"></i></a></td></tr><tr><th>Atendido por:</th><td>'+atiende+'</td></tr></tr><tr><th>Doctor:</th><td>'+json.first_name+'</td></tr><tr><th>Fecha:</th><td>'+inicio+'</td></tr><tr><th>Telefono:</th><td id="telefonoPaciente"></td></tr><tr><th>Celular:</th><td id="celularPaciente"></td></tr><tr><th>Email:</th><td>'+json.email_contacto+'</td></tr><tr><th>Comentarios:</th><td>'+json.comentarios+'</td></tr></table>');
				$("#telefonoPaciente").html(span);
				$('form input[type="text"].bfh-phone, form input[type="tel"].bfh-phone, span.bfh-phone').each(function () {
					var $phone = $(this);
					$phone.bfhphone($phone.data());
				});
				$("#celularPaciente").html(spanCel);
				$('form input[type="text"].bfh-cel, form input[type="tel"].bfh-cel, span.bfh-cel').each(function () {
					var $cel = $(this);
					$cel.bfhphone($cel.data());
				});
			});
			return false;
		},    
		resources: [
<?php 
if (isset($doctores) && !empty($doctores)) {
  foreach ($doctores as $doctor) {
    echo "
      {
        name: '".$doctor->first_name."',
        id: '".$doctor->user_id."'
      },";
  }
}
?>

	  ],
	  dayClick: function(date, allDay, jsEvent, view) {
            console.log(view.name);
            if (view.name === "month" || view.name === "agendaWeek") {
                $('#calendarDoctor').fullCalendar('gotoDate', date);
                $('#calendarDoctor').fullCalendar('changeView', 'resourceDay');
            }
        },
     events: '<?php echo base_url(); ?>index.php/citas/calendarDoctores'
    });

  };


$(function () {

	$('a[data-toggle="tab"]').on('shown', function (e) {
		if($(e.target).attr('href')=="#doctores") {
			if ($('#calendarDoctor').children().length == 0 ) {
				cargaDoctores();
			} /*else {
				alert("calendario existe!!");
			}*/
		}
	})

    /* Bar Chart starts */
/*
    var d1 = [];
    for (var i = 0; i <= 30; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 30; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#52b9e9", "#0aa4eb"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });
*/
    /* Bar chart ends */

});


/* Curve chart starts */
/*
$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, 
                            fill: true,
                            fillColor: {
                              colors: [{
                                opacity: 0.05
                              }, {
                                opacity: 0.01
                              }]
                          }
                  },
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#fa3031", "#43c83c"]
             });


    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            width: 100,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});
*/
/* Curve chart ends */
</script>

</body>

</html>
