<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "almacenaje"; $this->load->view("admin/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Almacenaje 
          <!-- page meta -->
          <span class="page-meta">Nuevo</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

   <div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left">Agregar Nuevo Almacenaje</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
 <div class="padd">
                   <?php $create_form = array('id'=>'clients-form', 'class' => 'form-horizontal'); ?>

<?php echo form_open('almacenaje/save', $create_form); ?>
 <h6>Datos Generales</h6>
 <hr>
                      <div  class="control-group">
                        <label class="control-label" for="cliente">Cliente</label>
                        <div class="controls">
                          <select id="cliente" name="cliente">
                            <option value="0">Selecciona</option>
                            <?php 
                            if (isset($clientes) && !empty($clientes)) {
                              foreach ($clientes as $cliente) {
                                echo "<option value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>



</div>
                  </div>

                   

                </div>


<div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left">Especificaciones de Almacenaje</div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
 <div class="padd form-horizontal-almacenaje">
                   
                     <h6>Datos Generales</h6>
                     <hr>
                      <div  class="control-group">
                        <label class="control-label" for="codigo_producto">Codigo de Producto</label>
                        <div class="controls">
                          <input type="text" id="codigo_producto" name="codigo_producto" value=""  class="span2">                          
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="descripcion_empaque">Descripcion de empaque</label>
                        <div class="controls">
                          <input type="text" id="descripcion_empaque" name="descripcion_empaque" value=""  class="span5"> 
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="valor_reposicion">Valor de Reposicion</label>
                        <div class="controls">
                          <span class="add-on">$</span>
                          <input type="text" id="valor_reposicion" name="valor_reposicion" value=""  class="span2">
                          <span class="add-on">pesos</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="refri_conge">Refrigerado/<br>Congelado</label>
                        <div class="controls">
                          <select id="refri_conge" name="refri_conge">
                            <option value="">Selecciona</option>
                            <option value="R">Refrigerado</option>
                            <option value="C">Congelado</option>
                            ?>
                          </select>
                        </div>
                      </div>       
                      <div class="control-group">
                        <label class="control-label" for="temperatura_optima">Temperatura Optima</label>
                        <div class="controls">
                          <input type="text" id="temperatura_optima" name="temperatura_optima" value=""  class="span2">
                          <span class="help-inline">C</span>
                        </div>
                      </div>
                      <h6>Caracteristicas del Empaque - Dimensiones</h6>
                      <hr>

                      <div class="control-group">
                        <label class="control-label" for="tipo_empaque">Tipo de Empaque</label>
                        <div class="controls">
                          <input type="text" id="tipo_empaque" name="tipo_empaque" value="" class="span2">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="peso_bruto">Peso Bruto</label>
                        <div class="controls">
                          <input type="text" id="peso_bruto" name="peso_bruto" value="" class="span2">
                          <span class="help-inline">(Kg))</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="peso_neto">Peso Neto</label>
                        <div class="controls">
                          <input type="text" id="peso_neto" name="peso_neto" value="" class="span2">
                          <span class="help-inline">(Kg)</span>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="peso_variable">Peso Variable</label>
                        <div class="controls">
                          <input type="text" id="peso_variable" name="peso_variable" value="" class="span2">
                           <span class="help-inline">(Kg)</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="largo">Largo</label>
                        <div class="controls">
                          <input type="text" id="largo" name="largo" value="" class="span2">
                           <span class="help-inline">(Cm)</span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="alto">Alto</label>
                        <div class="controls">
                          <input type="text" id="alto" name="alto" value="" class="span2">
                           <span class="help-inline">(Cm)</span>
                        </div>
                      </div>    
                      <div class="control-group">
                        <label class="control-label" for="ancho">Ancho</label>
                        <div class="controls">
                          <input type="text" id="ancho" name="ancho" value="" class="span2">
                           <span class="help-inline">(Cm)</span>
                        </div>
                      </div> 
                      <div class="control-group">
                        <label class="control-label" for="diametro">Diametro</label>
                        <div class="controls">
                          <input type="text" id="diametro" name="diametro" value="" class="span2">
                           <span class="help-inline">(Cm)</span>
                        </div>
                      </div> 
                      <h6>Patrones de Estiba</h6>
                      <hr>
                      <div class="control-group">
                        <label class="control-label" for="empaques_por_cama">Empaques por Cama</label>
                        <div class="controls">
                          <input type="text" id="empaques_por_cama" name="empaques_por_cama" value="" class="span2">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="camas_por_pallet">Camas por Pallet</label>
                        <div class="controls">
                          <input type="text" id="camas_por_pallet" name="camas_por_pallet" value="" class="span2">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="empaques_por_pallet">Empaques por Pallet</label>
                        <div class="controls">
                          <input type="text" id="empaques_por_pallet" name="empaques_por_pallet" value="" class="span2">
                        </div>
                      </div>
                      <h6>Vigencia de Caducidad</h6>                      
                      <hr>
                      <div class="control-group">
                        <label class="control-label" for="minima_para_recibo">Mínima para Recibo</label>
                        <div class="controls">
                          <input type="text" id="minima_para_recibo" name="minima_para_recibo" value="" class="span2">
                          <span class="help-inline">(Días)</span>
                        </div>
                      </div>  
                      <div class="control-group">
                        <label class="control-label" for="minima_para_embarque">Mínima para Embarque</label>
                        <div class="controls">
                          <input type="text" id="minima_para_embarque" name="minima_para_embarque" value="" class="span2">
                          <span class="help-inline">(Días)</span>
                        </div>
                      </div>  
                      <h6>Instrucciones Especiales para Manejo y/o Conservación</h6>                      
                      <hr>                      
                      <div class="control-group">

                        <div class="controls">
                            <textarea class="cleditor" name="input" name="instrucciones">
                             
                            </textarea>
                        </div>
                      </div>   
<hr>
<div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>



<?php echo form_close(); ?>
</div>
                  </div>

                   

                </div>


              </div>

          </div>       

              </div>

          </div>       

        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->


 

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 