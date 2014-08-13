<!-- JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo base_url(); ?>assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

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
<script src="<?php echo base_url(); ?>assets/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo base_url(); ?>assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script> <!-- Custom codes -->
<script src="<?php echo base_url(); ?>assets/js/charts.js"></script> <!-- Custom chart codes -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap-formhelpers-phone.format.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap-formhelpers-phone.js"></script> 

<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.delay.min.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrapSwitch.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
    
<!-- Script for this page -->
<script type="text/javascript">

$(function () {


	$('#data').dataTable({
		"sScrollY": "400px",
		"bProcessing": true,
		"bServerSide": true,
		"sServerMethod": "GET",
		"sAjaxSource": "dataBiop/getTable",
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
			{ "bVisible": true, "bSearchable": true, "bSortable": true, "fnRender": function (oObj) {
					return oObj.aData[1];
				}
			},
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
					return "<span class=\"bfh-phone\" data-format=\"(ddd) ddd-dddd\" data-number=\""+oObj.aData[2]+"\"></span>";
				}
			},
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
				return oObj.aData[3]; }
			},
      { "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj) {
        return oObj.aData[4]; }
      },
			{ "bVisible": true, "bSearchable": false, "bSortable": false, "fnRender": function (oObj)  {
				return "<a class=\"btn btn-mini btn-warning\" href=\"biopsias/editar/" + oObj.aData[0] + "\" title=\"editar biopsia\"><i class=\"icon-pencil\"></i></a> <a class=\"btn btn-mini btn-info\" href=\"#\" title=\"ver a detalle\"><i class=\"icon-search\"></i></a> <a class=\"btn btn-mini btn-danger confirm-delete\" data-id=\"" + oObj.aData[0] + "\" href=\"biopsias/eliminar/" + oObj.aData[0] + "\" title=\"eliminar biopsia\"><i class=\"icon-remove\"></i>"; }
			}
			
		],
    "fnInitComplete": function () {
           $('span.bfh-phone').each(function () {
              var $phone = $(this);
              $phone.bfhphone($phone.data());
           });
          $('.confirm-delete').on('click', function(e) {
              e.preventDefault();

              var id = $(this).data('id');
              
              $('#myModal').data('id', id).modal('show');
          });   
          $('#btnYes').click(function() {
              // handle deletion here
              var id = $('#myModal').data('id');
              
              $('[data-id='+id+']').remove();
              $('#listing-cliente-'+id).remove();
              var domain = '<?php echo site_url("clients/eliminar"); ?>';
              var url = domain+"/"+id;
              $.ajax({type: "GET",url: url});    
              $('#myModal').modal('hide');
              window.location = window.location;
          });        
    },
    "fnDrawCallback": function () {
      
           $('span.bfh-phone').each(function () {
              var $phone = $(this);
              $phone.bfhphone($phone.data());
           });
          $('.confirm-delete').on('click', function(e) {
              e.preventDefault();

              var id = $(this).data('id');
              
              $('#myModal').data('id', id).modal('show');
          });           
          $('#btnYes').click(function() {
              // handle deletion here
              var id = $('#myModal').data('id');
              
              $('[data-id='+id+']').remove();
              $('#listing-cliente-'+id).remove();
              var domain = '<?php echo site_url("clients/eliminar"); ?>';
              var url = domain+"/"+id;
              $.ajax({type: "GET",url: url});    
              $('#myModal').modal('hide');
          });         
    }
        
	}).fnSetFilteringDelay(700);  
	$.fn.sort_select_box = function(){
		var my_options = $("#" + this.attr('id') + ' option');
		my_options.sort(function(a,b) {
			if (a.text > b.text) return 1;
			else if (a.text < b.text) return -1;
			else return 0
	})
	return my_options;
}
  var sexo = $("#sexo").val();
  if (sexo=="masculino"){
    $('#switch-gender').bootstrapSwitch('setState', false);
  }else{
    $('#switch-gender').bootstrapSwitch('setState', true);
  }
  
    $('#switch-gender').on('switch-change', function (e, data) {
    var $el = $(data.el);
    var value = data.value;
    if (!value){
       $("#sexo").val("masculino");
    }else{
$("#sexo").val("femenino");
    }
    console.log($("#sexo").val());
    });

$('#myModal').on('show', function() {
    var id = $(this).data('id'),
        removeBtn = $(this).find('.danger');
})

$('.confirm-delete').on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    
    $('#myModal').data('id', id).modal('show');
});

$('#btnYes').click(function() {
    // handle deletion here
    var id = $('#myModal').data('id');
    
    $('[data-id='+id+']').remove();
    $('#listing-biopsia-'+id).remove();
    var domain = '<?php echo site_url("biopsias/eliminar"); ?>';
    var url = domain+"/"+id;
    $.ajax({type: "GET",url: url});    
    $('#myModal').modal('hide');
});

  $('#pacientes-listing').dataTable( {
    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ registros"
    }
  } );  
$('#datetimepicker1').datetimepicker({ pickTime: false }); 
$('#datetimepicker3').datetimepicker({ pickTime: false }); 

$('#no_cliente').keyup(function() {
  var client = $(this).val();
  $('#cliente').val(client);
});  

$('#cliente').change(function() {
  $("#no_cliente").val($(this).val());
});
 
  
$('#biopsias-form').validate({
        rules: {
          comercial: {
            minlength: 2,
            required: true,
          },
          nombre: {
            minlength: 3,
            required: true,
          },     
          apellidos: {
            minlength: 3,
            required: true,
          },    
          contacto: {
            minlength: 2,
            required: true,
            digits: false
          },          
          telefono: {
            required: true
          },    
          doctor: {
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

$('#users-form-edit').validate({
        rules: {
          username: {
            minlength: 2,
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          first_name: {
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

$('#users-form').validate({
        rules: {
          username: {
            minlength: 2,
            required: true,
          },
          password: {
            minlength: 2,
            required: true
          },      
          confirm_password: {
            minlength: 2,
            required: true
          },  
          email: {
            required: true,
            email: true
          },
          first_name: {
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
    
});

/* Curve chart ends */
</script>

</body>
</html>