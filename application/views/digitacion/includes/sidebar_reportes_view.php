

<div class="well sidebar-nav cen-sidebar">
<ul class="nav nav-list">
  <li class="nav-header">Opciones</li>
  	<?php if( $option >= 1 && $option <= 10){ ?>
	  <li <?php echo ($option == 1) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance'); ?>">R. por ODEI</a></li> 
	  <li <?php echo ($option == 2) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/provincia'); ?>">R. por Provincia </a></li>                                           
	  <li <?php echo ($option == 3) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/distrito'); ?>">R. por Distrito</a></li>                                           
	  <li <?php echo ($option == 4) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/centro_poblado'); ?>">R. por centro Poblado</a></li>                                           
	<?php }elseif ( $option >= 11 && $option <= 20 ) { ?>
	  <li <?php echo ($option == 11) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance'); ?>">R. por ODEI</a></li> 
	  <li <?php echo ($option == 12) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/provincia'); ?>">R. por Provincia </a></li>                                           
	  <li <?php echo ($option == 13) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/distrito'); ?>">R. por Distrito</a></li>                                           
	  <li <?php echo ($option == 14) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/pescador_avance/centro_poblado'); ?>">R. por centro Poblado</a></li>   
	<?php }elseif ( $option >= 21 && $option <= 30 ) { ?>
	  <li <?php echo ($option == 21) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/comunidad_avance'); ?>">R. por ODEI</a></li> 
	  <li <?php echo ($option == 22) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/comunidad_avance/provincia'); ?>">R. por Provincia </a></li>                                           
	  <li <?php echo ($option == 23) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/comunidad_avance/distrito'); ?>">R. por Distrito</a></li>                                           
	  <li <?php echo ($option == 24) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/comunidad_avance/centro_poblado'); ?>">R. por centro Poblado</a></li>   
	<?php }elseif ( $option >= 31 && $option <= 40 ) { ?>
	  <li <?php echo ($option == 31) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/registro_avance'); ?>">R. por ODEI</a></li> 
	  <li <?php echo ($option == 32) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/registro_avance/provincia'); ?>">R. por Provincia </a></li>                                           
	  <li <?php echo ($option == 33) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/registro_avance/distrito'); ?>">R. por Distrito</a></li>                                           
	  <li <?php echo ($option == 34) ? 'class="active"' : ''; ?>><a href="<?php echo site_url('digitacion/registro_avance/centro_poblado'); ?>">R. por centro Poblado</a></li>   
	<?php }?>
</ul>
</div><!--/.well --> 	
