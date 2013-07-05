
<div class="row-fluid">
  <div class="span2">
          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
              <li <?php echo ($option == 1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url('digitacion/tiempos_acuicultor'); ?>">Acuicultor</a></li>
              <li <?php echo ($option == 2) ? 'class="active"' : ''; ?>><a href="<?php echo base_url('digitacion/tiempos_pescador'); ?>">Pescador</a></li>
            </ul>
          </div><!--/.well -->
</div><!--/span-->




  <div class="span10">
    <?php $this->load->view('digitacion/forms/tiempos_pescador_form'); ?>
  </div>
</div>
