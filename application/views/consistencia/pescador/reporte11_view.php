<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICACION DEL NIVEL EDUCATIVO DE LOS HIJOS DEL PESCADOR SEGÚN EDAD</h4>
    	<?php
    			echo $this->table->generate(); 
		?>
	</div>
</div>