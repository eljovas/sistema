<ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nblue <?php echo ($current=="administracion")?"current":""; ?>"><a href="<?php echo site_url("admin"); ?>"><i class="icon-desktop"></i> Panel</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue <?php echo ($current=="administracion")?"current open":""; ?>">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-user"></i> Administración 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                	
                  <li><a href="<?php echo site_url("admin/usuarios"); ?>"><i class="icon-user-md"></i>Personal</a></li>
                  <li><a href="<?php echo site_url("clients"); ?>"><i class="icon-group"></i>Pacientes</a></li>
                	<li><a href="<?php echo site_url("medicamentos"); ?>"><i class="icon-medkit"></i>Medicamentos</a></li>
                  <li><a href="<?php echo site_url("procedimientos"); ?>"><i class="icon-stethoscope"></i>Procedimientos</a></li>
                  <li><a href="<?php echo site_url("estudios"); ?>"><i class="icon-ambulance"></i>Estudios</a></li>
                  <li><a href="<?php echo site_url("ventas"); ?>"><i class="icon-shopping-cart"></i>Ventas</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue <?php echo ($current=="configuracion")?"current open":""; ?>">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-wrench"></i> Configuración 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Notificaciones</a></li>
                </ul>
              </a>
            </li>

          </ul>
