<!-- JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo base_url(); ?>assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-formhelpers-phone.format.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-formhelpers-phone.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

<!-- jQuery Flot -->
<!--<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.stack.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="<?php echo base_url(); ?>assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script> <!-- Date picker -->
<script src="<?php echo base_url(); ?>assets/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo base_url(); ?>assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script> <!-- Custom codes -->
<script src="<?php echo base_url(); ?>assets/js/charts.js"></script> <!-- Custom chart codes -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-combobox.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.delay.min.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrapSwitch.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/date.format.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicEdit.js"></script>

<!-- Script for this page -->
<script type="text/javascript">
$(document).ready(function(){
	$('#quickadd').click(function() {
		var nombre    = $('#nombre').val();
		var apellidos = $('#apellidos').val();
		var motivo    = $('#motivo').val();
		var doctor    = $('#doctor').val();
		var telefono_contacto    = $('#telefono').val();
		$.post( "http://sistema.dermatologica.org/index.php/clients/savequick/", { nombre: nombre, apellidos: apellidos, motivo: motivo, doctor:doctor, telefono_contacto:telefono_contacto }).done(function( data ) {
			var returned = jQuery.parseJSON( data );
			$("#paciente_id").val(returned.id);
			$("#paciente").val(returned.nombre);
			$('#myModal').modal('hide');
			$('#clients-form')[0].reset();
		});
	});

	$('#cita-form').validate({
		rules: {
			asunto: {
				required: true
			},
			paciente: {
				required: true,
				digits: false
			},          
			atiende1: {
				required: true
			},
			fecha_inicio: {
				required: true
			},
			hora_inicio: {
				required: true
			},          
			hora_fin: {
				required: true
			}
		},
		highlight: function(label) {
			$(label).closest('.control-group').addClass('error');
		},
		success: function(label) {
			label
			.text('OK!').addClass('valid')
			.closest('.control-group').addClass('success');
		}
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
			$("#paciente_id").val(selObj.id);
			return selObj.label;
		}
	});  
});


$(function () {

	bkLib.onDomLoaded(function() {
		new nicEditor().panelInstance('comentarios_adicionales');
	});

	$('#data').dataTable({
		"sScrollY": "400px",
		"bProcessing": true,
		"bServerSide": true,
		"sServerMethod": "GET",
		"sAjaxSource": "http://sistema.dermatologica.org/index.php/datax/getTable",
		"oLanguage": {
			"sLengthMenu": "_MENU_ registros por página",
			"sZeroRecords": "No se encontraron registros con esos datos.",
			"sInfoFiltered": "(de un total de _MAX_)"
		},
		"iDisplayLength": 10,
		"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
		"aaSorting": [[0, 'asc']],
		"aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": false, "fnRender": function (oObj) {
				return oObj.aData[1];
				}
			},
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
					return dateFormat(oObj.aData[2], "UTC:dddd d mmm, yyyy");
				}
			},
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
					return oObj.aData[3];
				}
			},
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
					return oObj.aData[5];
				}
			},
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
				return "<a class=\"btn btn-mini btn-warning\" href=\"<?php echo site_url("citas/editar"); ?>" + "/"+oObj.aData[0] + "\" title=\"editar cita\"><i class=\"icon-pencil\"></i></a> "; }
			}

			//<a class=\"btn btn-mini btn-danger confirm-delete\" data-id=\"" + oObj.aData[0] + "\" href=\"clients/eliminar/" + oObj.aData[0] + "\" title=\"eliminar paciente\"><i class=\"icon-remove\"></i>
		],
    "fnInitComplete": function () {
           $('span.bfh-phone').each(function () {
              var $phone = $(this);
              $phone.bfhphone($phone.data());
           });
    },
    "fnDrawCallback": function () {
      
                 $('span.bfh-phone').each(function () {
              var $phone = $(this);
              $phone.bfhphone($phone.data());
           });
    }
        
	}).fnSetFilteringDelay(100);  
	$.fn.sort_select_box = function(){
		var my_options = $("#" + this.attr('id') + ' option');
		my_options.sort(function(a,b) {
			if (a.text > b.text) return 1;
			else if (a.text < b.text) return -1;
			else return 0
	})
	return my_options;
}
   
});


$(function () {
	$('.datetimepicker1').datetimepicker({ pickTime: false });
});

$(function () {
	$('#hora_inicio').timepicker({ minuteStep: 5, showMeridian: false });
//	$('.datetimepicker2').datetimepicker({ pickTime: true, pickDate: false, pick12HourFormat: true });
});

$(function () {
	$('#hora_fin').timepicker({ minuteStep: 5, showMeridian: false });
//	$('.datetimepicker3').datetimepicker({ pickTime: true, pickDate: false, pick12HourFormat: true });
});

$(function () {
	<?php 
	if (isset($cita->tipo) && $cita->tipo!="doctor") { ?>
	$("#doctores-listing").hide();
	<?php } ?>
	
	<?php 
	if (!isset($cita->tipo)) { ?>
	$("#doctores-listing").hide();
	<?php } ?>
	
	$('#switch-atendido').on('switch-change', function (e, data) {
		var $el = $(data.el);
		var value = data.value;
		if (!value){
			$("#tipo").val("doctor");
			$("#cosmetologas-listing").hide();
			$("#doctores-listing").show();
		}else{
			$("#tipo").val("cosmetologa");
			$("#cosmetologas-listing").show();
			$("#doctores-listing").hide();
		}
	});

	$('#no_cliente').keyup(function() {
		var client = $(this).val();
		$('#cliente').val(client);
	});

	$('#asunto').change(function() {
		$("#asunto_text").val($('#asunto').find('option:selected').text());
	});

	$('#paciente').change(function() {
		$("#paciente_text").val($('#paciente').find('option:selected').text());
	});

	$('#tipo').change(function() {
		$("#tipo_text").val($('#tipo').find('option:selected').text());
	});

	$('#atiende1').change(function() {
		$("#atiende_text").val($('#atiende1').find('option:selected').text());
		$("#atendido").val($('#atiende1').val());
	});

	$('#atiende2').change(function() {
		$("#atiende_text").val($('#atiende2').find('option:selected').text());
		$("#atendido").val($('#atiende2').val());
	});

	$('#cliente').change(function() {
		$("#no_cliente").val($(this).val());
	});

});



/* Curve chart ends */


/*
$(function () {
	$('#dataCitas').dataTable({
		"sScrollY": "400px",
		"bProcessing": true,
		"bServerSide": true,
		"sServerMethod": "GET",
		"sAjaxSource": "data/getTable",
		"oLanguage": {
			"sLengthMenu": "_MENU_ registros por página",
			"sZeroRecords": "No se encontraron registros con esos datos.",
			"sInfoFiltered": "(de un total de _MAX_)"
		},
		"iDisplayLength": 10,
		"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
		"aaSorting": [[0, 'asc']],
		"aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			//{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true, "fnRender": function (oObj) {
					return oObj.aData[1] + " " + oObj.aData[2];
				}
			},
			{ "bVisible": true, "bSearchable": true, "bSortable": true, "fnRender": function (oObj) {
					return "<span class=\"bfh-phone\" data-format=\"(ddd) ddd-dddd\" data-number=\""+oObj.aData[3]+"\"></span>";
				}
			},
			{ "sName": "ID", "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
				return "Dr. " + oObj.aData[4]; }
			},
			{ "sName": "ID", "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
				return "<a class=\"btn btn-mini btn-warning\" href=\"clients/editar/" + oObj.aData[0] + "\" title=\"editar paciente\"><i class=\"icon-pencil\"></i></a> <a class=\"btn btn-mini btn-info\" href=\"#\" title=\"ver a detalle\"><i class=\"icon-search\"></i></a>"; }
			}
			//<a class=\"btn btn-mini btn-danger confirm-delete\" data-id=\"" + oObj.aData[0] + "\" href=\"clients/eliminar/" + oObj.aData[0] + "\" title=\"eliminar paciente\"><i class=\"icon-remove\"></i>
		],
		"fnInitComplete": function () {
			$('span.bfh-phone').each(function () {
				var $phone = $(this);
				$phone.bfhphone($phone.data());
			});
		},
		"fnDrawCallback": function () {
			$('span.bfh-phone').each(function () {
				var $phone = $(this);
				$phone.bfhphone($phone.data());
			});
		}
		}).fnSetFilteringDelay(700);  
		$.fn.sort_select_box = function(){
			var my_options = $("#" + this.attr('id') + ' option');
			my_options.sort(function(a,b) {
				if (a.text > b.text) return 1;
				else if (a.text < b.text) return -1;
				else return 0
			});
		}
	return my_options;
});


$(function () {
	$('.datetimepicker1').datetimepicker({ pickTime: false });
});

$(function () {
	$('.datetimepicker2').datetimepicker({ pickTime: true, pickDate: false });
});

$(function () {
	$('.datetimepicker3').datetimepicker({ pickTime: true, pickDate: false });
});

$(function () {
	$("#doctores-listing").hide();
	$('#switch-atendido').on('switch-change', function (e, data) {
		var $el = $(data.el);
		var value = data.value;
		if (!value){
			$("#tipo").val("doctor");
			$("#cosmetologas-listing").hide();
			$("#doctores-listing").show();
		}else{
			$("#tipo").val("cosmetologa");
			$("#cosmetologas-listing").show();
			$("#doctores-listing").hide();
		}
	});

	$('#no_cliente').keyup(function() {
		var client = $(this).val();
		$('#cliente').val(client);
	});

	$('#asunto').change(function() {
		$("#asunto_text").val($('#asunto').find('option:selected').text());
	});

	$('#paciente').change(function() {
		$("#paciente_text").val($('#paciente').find('option:selected').text());
	});

	$('#tipo').change(function() {
		$("#tipo_text").val($('#tipo').find('option:selected').text());
	});

	$('#atiende1').change(function() {
		$("#atiende_text").val($('#atiende1').find('option:selected').text());
		$("#atendido").val($('#atiende1').val());
	});

	$('#atiende2').change(function() {
		$("#atiende_text").val($('#atiende2').find('option:selected').text());
		$("#atendido").val($('#atiende2').val());
	});

	$('#cliente').change(function() {
		$("#no_cliente").val($(this).val());
	});

/*$('#listing-entradas').dataTable( {
      "sDom": "<'row-fluid'<'span6 padding-controls'l><'span6 padding-controls'f>r>t<'row-fluid'<'span6 padding-controls'i><'span6 padding-controls'p>>",
      "sPaginationType": "bootstrap",
      "oLanguage": {
        "sLengthMenu": "_MENU_ entradas por página"
      }
    });*/

</script>

</body>
</html>