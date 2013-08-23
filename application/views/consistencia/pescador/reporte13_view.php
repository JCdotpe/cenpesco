<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICACIÓN DE LA EDAD DE LOS HIJOS Y SU DEPENDENCIA CON EL PESCADOR</h4>
    	<?php
    			echo $this->table->generate(); 
		?>
	</div>
</div>
