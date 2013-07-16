          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
              <li <?php echo ($option == 1) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('monitoreo/avance'); ?>">Avance de campo</a></li> 
              <li <?php echo ($option == 2) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('monitoreo/observacion_campo'); ?>">Observación de campo</a></li>               
              <li <?php echo ($option == 3) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('monitoreo/revision'); ?>">Revisión en gabinete</a></li> 
              <!-- <li <?php echo ($option == 11) ? 'class="active"' : ''; ?>><a href="<?php echo base_url('udra/acuicultor_avance'); ?>">R. Avance Acuicultor</a></li> 
              <li <?php echo ($option == 22) ? 'class="active"' : ''; ?>><a href="<?php echo base_url('udra/pescador_avance'); ?>">R. Avance Pescador</a></li>   -->                                         
           </ul>
          </div><!--/.well -->
