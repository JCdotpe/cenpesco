<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICAR LOS MAXIMOS Y MINIMOS DE LA CANTIDAD DE PESCA EN KILOS PREGUNTA 3 SECCION VII</h4>
    	<?php
    		echo $this->table->generate(); 
		?>
	</div>
</div>
