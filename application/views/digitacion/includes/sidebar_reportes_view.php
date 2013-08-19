

<div class="well sidebar-nav cen-sidebar">
<ul class="nav nav-list">
  <li class="nav-header">Opciones</li>
  <li <?php echo ($option == 1) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance'); ?>">R. por ODEI</a></li> 
  <li <?php echo ($option == 2) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/provincia'); ?>">R. por Provincia </a></li>                                           
  <li <?php echo ($option == 3) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/distrito'); ?>">R. por Distrito</a></li>                                           
</ul>
</div><!--/.well --> 	
