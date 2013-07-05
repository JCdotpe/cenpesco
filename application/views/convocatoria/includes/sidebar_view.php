
          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
              <li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo site_url('convocatoria'); ?>">Inicio</a></li> 
              <li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo site_url('convocatoria/registrados'); ?>">Registrados</a></li> 
              <li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo site_url('convocatoria/seleccion'); ?>">Selección</a></li> 
              <li <?php echo ($option == 4) ? 'class="active"' : ''; ?> ><a href="<?php echo site_url('convocatoria/capacitar'); ?>">A capacitar</a></li> 
              <li><a href="<?php echo site_url('convocatoria/registro'); ?>" target="_blank">Formulario</a></li> 
              <li><a href="<?php echo site_url('convocatoria/consulta'); ?>" target="_blank">Módulo de consulta</a></li>             
            </ul>
          </div><!--/.well -->

