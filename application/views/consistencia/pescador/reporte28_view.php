<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICAR LAS DIMENSIONES DE LA BODEGA DE LA EMBARCACION</h4>
    	<?php
    		echo $this->table->generate(); 
		?>
	</div>
</div>
