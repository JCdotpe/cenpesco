          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
              <li <?php echo ($option == 0) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('udra'); ?>">Inicio</a></li> 
              <li <?php echo ($option == 4) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('udra/registro'); ?>">Registro de pescadores y acuicultores</a></li> 
              <li <?php echo ($option == 2) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('udra/pescador'); ?>">Pescador</a></li>               
              <li <?php echo ($option == 1) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('udra/acuicultor'); ?>">Acuicultor</a></li> 
              <li <?php echo ($option == 3) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('udra/comunidad'); ?>">Comunidad</a></li> 
              <!-- <li <?php echo ($option == 11) ? 'class="active"' : ''; ?>><a href="<?php echo base_url('udra/acuicultor_avance'); ?>">R. Avance Acuicultor</a></li> 
              <li <?php echo ($option == 22) ? 'class="active"' : ''; ?>><a href="<?php echo base_url('udra/pescador_avance'); ?>">R. Avance Pescador</a></li>   -->                                         
           </ul>
          </div><!--/.well -->
