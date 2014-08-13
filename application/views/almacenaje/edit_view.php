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
          <span class="page-meta">Editar Almacenaje</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
          
          <?php 
          if (isset($mensaje)) {
            echo "<div class=\"alert alert-success\">
                      Información Actualizada.
                    </div>";
          }
           ?>
        	 <div class="widget wlightblue">
              <div class="widget-head">
                  <div class="pull-left">Modificar Información de Almacenaje</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <?php $create_form = array('id'=>'users-form-edit','class' => 'form-horizontal'); ?>
                    <?php echo form_open('almacenajes/actualizar', $create_form); ?>
                      <input type="hidden" id="id" name="id" value="<?php echo $almacenaje->id; ?>">
                      <div class="row">
                          <div class="control-group span5">
                            <label class="control-label" for="no_cliente"># Cliente</label>
                            <div class="controls">
                              <input type="text" id="no_cliente" name="no_cliente" class="span2" value="<?php echo $almacenaje->cliente; ?>">                          
                            </div>
                          </div>     
                          <div class="span1"><strong>ó</strong></div>    
                        <div class="span6">
                          <div  class="control-group">
                            <label class="control-label" for="cliente">Cliente</label>
                            <div class="controls">
                              <select id="cliente" name="cliente">
                                <option value="0">Selecciona</option>
                                <?php 
                                if (isset($clientes) && !empty($clientes)) {
                                  foreach ($clientes as $cliente) {
                                    if ($cliente->id==$almacenaje->cliente) {
                                      echo "<option selected value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                                    }else{
                                      echo "<option value=\"".$cliente->id."\">".$cliente->razon_comercial."</option>";
                                    }
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
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
                   
                     <h4>Datos Generales</h4>
                     <hr>
                      <div class="row">
                        <div  class="control-group span4">
                          <label class="control-label" for="codigo_producto">Codigo de Producto</label>
                          <div class="controls">
                            <input type="text" id="codigo_producto" name="codigo_producto" class="span2" value="<?php echo $almacenaje->codigo_producto; ?>">                          
                          </div>
                        </div>
                        <div class="span4">
                          <div  class="control-group">
                            <label class="control-label" for="nombre_producto">Nombre de Producto</label>
                            <div class="controls">
                              <input type="text" id="nombre_producto" name="nombre_producto" class="span3" value="<?php echo $almacenaje->nombre_producto; ?>">                          
                            </div>
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="descripcion_empaque">Descripcion de Producto</label>
                          <div class="controls">
                            <input type="text" id="descripcion_empaque" name="descripcion_empaque" class="span5" value="<?php echo $almacenaje->descripcion_empaque; ?>"> 
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="control-group span4">
                          <label class="control-label" for="valor_reposicion">Valor de Reposicion</label>
                          <div class="controls">
                            <input type="text" id="valor_reposicion" name="valor_reposicion" class="span2" value="<?php echo $almacenaje->valor_reposicion; ?>">
                            <span class="add-on">pesos</span>
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="refri_conge">Refrigerado/Congelado</label>
                          <div class="controls">
                            <select id="refri_conge" name="refri_conge">
                              <option value="">Selecciona</option>
                              <option value="R"  <?php echo ($almacenaje->refrigerado_congelado=="refrigerado")?"selected":""; ?>>Refrigerado</option>
                              <option value="C"  <?php echo ($almacenaje->refrigerado_congelado=="congelado")?"selected":""; ?>>Congelado</option>
                              ?>
                            </select>
                          </div>
                        </div>       
                        <div class="control-group span4">
                          <label class="control-label" for="temperatura_optima">Temperatura Optima</label>
                          <div class="controls">
                            <input type="text" id="temperatura_optima" name="temperatura_optima"  class="span2" value="<?php echo $almacenaje->temperatura_optima; ?>">
                            <span class="help-inline">C</span>
                          </div>
                        </div>
                      </div>
                      <h4>Caracteristicas del Empaque - Dimensiones</h4>
                      <hr>
                      <div class="row">
                        <div class="control-group span4"> 
                          <label class="control-label" for="tipo_empaque">Tipo de Empaque</label>
                          <div class="controls">
                            <input type="text" id="tipo_empaque" name="tipo_empaque" class="span2" value="<?php echo $almacenaje->tipo_empaque; ?>">
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="peso_bruto">Peso Bruto</label>
                          <div class="controls">
                            <input type="text" id="peso_bruto" name="peso_bruto" class="span2" value="<?php echo $almacenaje->peso_bruto; ?>">
                            <span class="help-inline">(Kg))</span>
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="peso_neto">Peso Neto</label>
                          <div class="controls">
                            <input type="text" id="peso_neto" name="peso_neto" class="span2" value="<?php echo $almacenaje->peso_neto; ?>">
                            <span class="help-inline">(Kg)</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="control-group span4">
                          <label class="control-label" for="peso_variable">Peso Variable</label>
                          <div class="controls">
                            <input type="text" id="peso_variable" name="peso_variable" class="span2" value="<?php echo $almacenaje->peso_variable; ?>">
                             <span class="help-inline">(Kg)</span>
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="largo">Largo</label>
                          <div class="controls">
                            <input type="text" id="largo" name="largo" class="span2" value="<?php echo $almacenaje->largo; ?>">
                             <span class="help-inline">(Cm)</span>
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="alto">Alto</label>
                          <div class="controls">
                            <input type="text" id="alto" name="alto" class="span2" value="<?php echo $almacenaje->alto; ?>">
                             <span class="help-inline">(Cm)</span>
                          </div>
                        </div>   
                      </div> 
                      <div class="row">
                        <div class="control-group span4">
                          <label class="control-label" for="ancho">Ancho</label>
                          <div class="controls">
                            <input type="text" id="ancho" name="ancho" class="span2" value="<?php echo $almacenaje->ancho; ?>">
                             <span class="help-inline">(Cm)</span>
                          </div>
                        </div> 
                        <div class="control-group span4">
                          <label class="control-label" for="diametro">Diametro</label>
                          <div class="controls">
                            <input type="text" id="diametro" name="diametro" class="span2" value="<?php echo $almacenaje->diametro; ?>">
                             <span class="help-inline">(Cm)</span>
                          </div>
                        </div> 
                      </div>
                      <h4>Patrones de Estiba</h4>
                      <hr>
                      <div class="row">
                        <div class="control-group span4">
                          <label class="control-label" for="empaques_por_cama">Empaques por Cama</label>
                          <div class="controls">
                            <input type="text" id="empaques_por_cama" name="empaques_por_cama" class="span2" value="<?php echo $almacenaje->empaques_por_cama; ?>">
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="camas_por_pallet">Camas por Pallet</label>
                          <div class="controls">
                            <input type="text" id="camas_por_pallet" name="camas_por_pallet"  class="span2" value="<?php echo $almacenaje->camas_por_pallet; ?>">
                          </div>
                        </div>
                        <div class="control-group span4">
                          <label class="control-label" for="empaques_por_pallet">Empaques por Pallet</label>
                          <div class="controls">
                            <input type="text" id="empaques_por_pallet" name="empaques_por_pallet" class="span2" value="<?php echo $almacenaje->empaques_por_pallet; ?>">
                          </div>
                        </div>
                      </div>
                      <h4>Vigencia de Caducidad</h4>                      
                      <hr>
                      <div class="row">
                        <div class="control-group span4">
                          <label class="control-label" for="minima_para_recibo">Mínima para Recibo</label>
                          <div class="controls">
                            <input type="text" id="minima_para_recibo" name="minima_para_recibo" class="span2" value="<?php echo $almacenaje->minima_recibo; ?>">
                            <span class="help-inline">(Días)</span>
                          </div>
                        </div>  
                        <div class="control-group span4">
                          <label class="control-label" for="minima_para_embarque">Mínima para Embarque</label>
                          <div class="controls">
                            <input type="text" id="minima_para_embarque" name="minima_para_embarque" class="span2" value="<?php echo $almacenaje->minima_embarque; ?>">
                            <span class="help-inline">(Días)</span>
                          </div>
                        </div>  
                      </div>
                      <h4>Instrucciones Especiales para Manejo y/o Conservación</h4>                      
                      <hr>                      
                      <div class="control-group">

                        <div class="controls">
                            <textarea class="cleditor" name="input" name="instrucciones">
                             <?php echo $almacenaje->instrucciones; ?>
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

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->


 

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 




