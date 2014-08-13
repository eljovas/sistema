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
                	<li><a href="<?php echo site_url("admin/usuarios"); ?>">Usuarios</a></li>
                	<li><a href="<?php echo site_url("clients"); ?>">Clientes</a></li>
                </ul>
              </a>
            </li>
            <li class="has_submenu nlightblue <?php echo ($current=="almacenaje")?"current open":""; ?>">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-barcode"></i> Almacenaje 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="<?php echo site_url("almacenajes"); ?>">Productos</a></li>
                  <li><a href="<?php echo site_url("almacenaje/inventario"); ?>">Reporte de Inventario</a></li>
                  <li><a href="<?php echo site_url("almacenaje/movimientos"); ?>">Consulta de movimientos</a></li>
                </ul>
              </a>

            </li>
            <li class="has_submenu nlightblue <?php echo ($current=="camaras")?"current open":""; ?>">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-th"></i> Cámaras 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="<?php echo site_url("camara/index/1"); ?>">Cámara 1</a></li>
                  <li><a href="<?php echo site_url("camara/index/2"); ?>">Cámara 2</a></li>
                  <li><a href="<?php echo site_url("camara/index/3"); ?>">Cámara 3</a></li>
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
                  <li><a href="<?php echo site_url("servicios"); ?>">Servicios</a></li>
                  <li><a href="#">Notificaciones</a></li>
                </ul>
              </a>
            </li>

          </ul>
