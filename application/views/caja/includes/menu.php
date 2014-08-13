            <li class="nblue"><a href="<?php echo site_url("recepcionistas"); ?>"><i class="icon-calendar"></i> Calendario</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-group"></i> Pacientes 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	<li><a href="<?php echo site_url("clients"); ?>"><i class="icon-group"></i>Pacientes</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-book"></i> Citas 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	<li><a href="<?php echo site_url("citas/nueva"); ?>"><i class="icon-plus"></i> Agendar</a></li>
                	<li><a href="<?php echo site_url("citas"); ?>"><i class="icon-search"></i> Consultar</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-medkit"></i> Biopsias 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	<li><a href="<?php echo site_url("biopsias/nueva"); ?>"><i class="icon-plus"></i> Registrar nueva</a></li>
                	<li><a href="<?php echo site_url("biopsias"); ?>"><i class="icon-search"></i> Consultar</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-money"></i> Caja 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                    <li><a href="<?php echo site_url("caja/") ?>"><i class="icon-desktop"></i> Panel general</a></li>
                	<li><a href="#<?php //echo site_url("caja/pago") ?>"><i class="icon-usd"></i> Recibir pago</a></li>
                	<li><a href="#<?php //echo site_url("caja/corte") ?>"><i class="icon-hdd"></i> Corte de caja</a></li>
                	<li><a href="#"><i class="icon-search"></i> Historial</a></li>
                </ul>
              </a>
            </li>
