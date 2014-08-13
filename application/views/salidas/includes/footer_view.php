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

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
<!-- Script for this page -->
<script type="text/javascript">
$(function () {


$('#datetimepicker1').datetimepicker({ pickTime: false });
$('#no_cliente').keyup(function() {
  var client = $(this).val();
  $('#cliente').val(client);
});  

$('#cliente').change(function() {
  $("#no_cliente").val($(this).val());
});

     /* $('#productos-almacenados-salida').dataTable( {
      "sDom": "<'row-fluid'<'span6 padding-controls'l><'span6 padding-controls'f>r>t<'row-fluid'<'span6 padding-controls'i><'span6 padding-controls'p>>",
      "sPaginationType": "bootstrap",
      "oLanguage": {
        "sLengthMenu": "_MENU_ salidas por página"
      }
    });*/
      $('#listing-salidas').dataTable( {
      "sDom": "<'row-fluid'<'span6 padding-controls'l><'span6 padding-controls'f>r>t<'row-fluid'<'span6 padding-controls'i><'span6 padding-controls'p>>",
      "sPaginationType": "bootstrap",
      "oLanguage": {
        "sLengthMenu": "_MENU_ salidas por página"
      }
    });
/*
      $('#productos-almacenados').dataTable( {
      "sDom": "<'row-fluid'<'span6 padding-controls'l><'span6 padding-controls'f>r>t<'row-fluid'<'span6 padding-controls'i><'span6 padding-controls'p>>",
      "sPaginationType": "bootstrap",
      "oLanguage": {
        "sLengthMenu": "_MENU_ productos por página"
      }
    });
*/
    $("#contenedor_danos").change(function (e) {
        if (this.value=='si') {
            $("#revision_contenedor_danos_obervaciones").attr('disabled',false);
        }else{
            $("#revision_contenedor_danos_obervaciones").attr('disabled',true);    
        }
    });
    $("#sin_danos_limpieza").change(function (e) {
        if (this.value=='si') {
            $("#sin_danos_limpieza_observaciones").attr('disabled',false);
        }else{
            $("#sin_danos_limpieza_observaciones").attr('disabled',true);    
        }
    });    
    $("#acondicionamiento_temperatura").change(function (e) {
        if (this.value=='si') {
            $("#acondicionamiento_temperatura_observaciones").attr('disabled',false);
        }else{
            $("#acondicionamiento_temperatura_observaciones").attr('disabled',true);    
        }
    });   
    $("#cajas_empaques_sin_danos").change(function (e) {
        if (this.value=='si') {
            $("#cajas_empaques_sin_danos_observaciones").attr('disabled',false);
        }else{
            $("#cajas_empaques_sin_danos_observaciones").attr('disabled',true);    
        }
    }); 
    $("#cajas_empaques_sin_danos").change(function (e) {
        if (this.value=='si') {
            $("#cajas_empaques_sin_danos_observaciones").attr('disabled',false);
        }else{
            $("#cajas_empaques_sin_danos_observaciones").attr('disabled',true);    
        }
    }); 
    $("#sellos_cajas_empaques_sin_danos").change(function (e) {
        if (this.value=='si') {
            $("#sellos_cajas_empaques_sin_danos_observaciones").attr('disabled',false);
        }else{
            $("#sellos_cajas_empaques_sin_danos_observaciones").attr('disabled',true);    
        }
    }); 
    $("#sellos_cajas_empaques_sin_danos").change(function (e) {
        if (this.value=='si') {
            $("#sellos_cajas_empaques_sin_danos_observaciones").attr('disabled',false);
        }else{
            $("#sellos_cajas_empaques_sin_danos_observaciones").attr('disabled',true);    
        }
    });
    $("#tarimas_sin_danos").change(function (e) {
        if (this.value=='si') {
            $("#tarimas_sin_danos_observaciones").attr('disabled',false);
        }else{
            $("#tarimas_sin_danos_observaciones").attr('disabled',true);    
        }
    });
    $("#producto_caducado").change(function (e) {
        if (this.value=='si') {
            $("#producto_caducado_observaciones").attr('disabled',false);
        }else{
            $("#producto_caducado_observaciones").attr('disabled',true);    
        }
    });
    $("#producto_coincide").change(function (e) {
        if (this.value=='si') {
            $("#producto_coincide_observaciones").attr('disabled',false);
        }else{
            $("#producto_coincide_observaciones").attr('disabled',true);    
        }
    });
});
$(function () {

    /* Bar Chart starts */

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

    /* Bar chart ends */

});


/* Curve chart starts */

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

/* Curve chart ends */
</script>


</body>

</html>