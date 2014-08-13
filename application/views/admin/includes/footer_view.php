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

    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrapSwitch.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/tinycolor-0.9.15.min.js"></script>    
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/pick-a-color-1.1.7.min.js"></script>    

    
<!-- Script for this page -->
<script type="text/javascript">

$(function () {
  $(".pick-a-color").pickAColor({showSpectrum : false, showSavedColors : false,showAdvanced:false});
$.fn.sort_select_box = function(){
    var my_options = $("#" + this.attr('id') + ' option');
    my_options.sort(function(a,b) {
        if (a.text > b.text) return 1;
        else if (a.text < b.text) return -1;
        else return 0
    })
   return my_options;
}
$('#pais').sort_select_box();  
$('#pais').change(function() {
  $('#estado').children().remove().attr('disabled',true).end().append('<option selected value="0">Cargando</option>');
  $('#ciudad').children().remove().attr('disabled',true).end().append('<option selected value="0">Selecciona Estado</option>');
    $.get("<?php echo base_url(); ?>estados.xml",{},function(xml){
      $('#estado').children().remove();
          var elem = new Option("Selecciona Estado","0");
          $('#estado').append(elem);      
      $('RECORD',xml).each(function(i) {
        estadoName = $(this).find("Name").text();
        estadoCountry = $(this).find("Country").text();
        if (estadoCountry == $("#pais").val()) {
          var elem = new Option(estadoName, estadoName);
          $('#estado').append(elem);
        }
      });    
  });
});
$('#estado').change(function() {
  $('#ciudad').children().remove().attr('disabled',true).end().append('<option selected value="0">Cargando</option>');
    $.get("<?php echo base_url(); ?>ciudades.xml",{},function(xml){
      $('#ciudad').children().remove();
          var elem = new Option("Selecciona Ciudad","0");
          $('#ciudad').append(elem);      
      $('RECORD',xml).each(function(i) {
        ciudad = $(this).find("Name").text();
        estado = $(this).find("Province").text();
        if (estado == $("#estado").val()) {
          var elem = new Option(ciudad, ciudad);
          $('#ciudad').append(elem);
        }
      });    
  });
});
  $('#tipo_consulta').change(function() {
  if ($(this).val()=="empresa") {
    $("#empresa").attr('disabled',false);
  }else{
    $("#empresa").val("");
    $("#empresa").attr('disabled',true);

  }
});
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
    $('#listing-cliente-'+id).remove();
    var domain = '<?php echo site_url("clients/eliminar"); ?>';
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
$('#esquema').change(function() {
if ($(this).val()=="variable") {
  $("#container-tarifa-fija").hide();
  $("#container-tarifa-fija").val("");
  $("#container-tarifa-almacenamiento").show();
}else{
  $("#container-tarifa-fija").show();
  $("#container-tarifa-almacenamiento").hide();
  for (var i = 1; i <= 10; i++) {
    $("#tarimas"+i).val("");
    $("#tarifa"+i).val("");
  }
}
});  

 
  
$('#clients-form').validate({
        rules: {
          comercial: {
            minlength: 2,
            required: true,
          },
          contacto: {
            minlength: 2,
            required: true,
            digits: false
          },          
          correo: {
            required: true,
            email: true
          },
          telefono: {
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