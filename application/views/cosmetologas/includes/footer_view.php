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

<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="<?php echo base_url(); ?>assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="<?php echo base_url(); ?>assets/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo base_url(); ?>assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script> <!-- Custom codes -->

<!-- Script for this page -->
<script type="text/javascript">

$(function () {
	cargaCosmetologas();

    $('#miniCalendario').datepicker({
    	language: "es",
    	onSelect: function(dateText, inst) {
            var d = new Date(dateText);
            $('#calendarCosmetologa').fullCalendar('gotoDate', d);
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
	//lazyFetching: true,
	eventClick: function(calEvent, jsEvent, view) {
		var atiende = calEvent.resource.name;
		var inicio = $.fullCalendar.formatDate(calEvent.start, "dddd, dd 'de' MMMM 'del' yyyy ' - de' h:mmtt 'a' ")+$.fullCalendar.formatDate(calEvent.end, "h:mmtt");
		var url = calEvent.url;
		var chunks = url.split("/"); 
		var id_cita = chunks[6];
		$("#idcita").val(id_cita);
		//$("#tipocita").val(tipo_cita); //ESTE MERO
		$.getJSON( 'http://sistema.dermatologica.org/index.php/citas/getById/'+id_cita, function( json ) {
		$('#myModal').modal();
		$('#botones-cita-actual').show();
		$('#botones-cita-nueva').hide();
		$("#myModalLabel").html(json.concepto);
		var phone_iovas = "<span class='bfh-phone' data-format='(ddd) ddd-dddd' data-number='"+json.telefono_contacto+"'></span>";
		var span = document.createElement("span");       
		span.setAttribute('class', 'bfh-phone');
		span.setAttribute('data-format', '(ddd) ddd-dddd');
		span.setAttribute('data-number', json.telefono_contacto);
		$("#bodymodal").html('<table class="table table-bordered"><tr><th>Paciente:</th><td>'+json.nombre+' '+json.apellido+'</td></tr><tr><th>Atendido por:</th><td>'+atiende+'</td></tr><tr><th>Fecha:</th><td>'+inicio+'</td></tr><tr><th>Telefono:</th><td id="spaniovaslocoshion"></td></tr><tr><th>Comentarios:</th><td>'+json.comentarios+'</td></tr></table>');
		$("#spaniovaslocoshion").html(span);
		$('form input[type="text"].bfh-phone, form input[type="tel"].bfh-phone, span.bfh-phone').each(function () {
			var $phone = $(this);
			$phone.bfhphone($phone.data());
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
	events: 'http://sistema.dermatologica.org/index.php/citas/calendarCosmetologas'
	});
}

</script>

</body>
</html>