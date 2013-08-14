          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
             
<!--               <li <?php echo ($option == 1) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('seguimiento/avance'); ?>">Avance de campo</a></li> 
 -->              <li <?php echo ($option == 2) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('seguimiento/observacion_campo'); ?>">Observación de campo</a></li>               
              <li <?php echo ($option == 3) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('seguimiento/revision'); ?>">Revisión en gabinete</a></li> 
               <li <?php echo ($option == 5) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('seguimiento/avance_empadronador'); ?>">Avance Empadronador</a></li> 
              <?php if($reporte == 99){ ?><li <?php echo ($option == 4) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('seguimiento/reporte_avance'); ?>">Reporte de Avance de Campo</a></li> 
              <?php }?>
           </ul>
          </div><!--/.well -->
