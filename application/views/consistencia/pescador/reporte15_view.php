<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICAR EL MATERIAL DE CONSTRUCCION DE LAS PAREDES Y EL MATERIAL DE CONSTRUCCION DE LOS TECHOS DE LA VIVIENDA</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th></th>';					
						echo '<th>SEDE</th>';					
						echo '<th>DEPARTAMENTO</th>';										
						echo '<th>PROVINCIA</th>';						
						echo '<th>DISTRITO</th>';									
						echo '<th>CENTRO POBLADO</th>';						
						echo '<th>FORMULARIO N°</th>';
						echo '<th>El material predominante en los paredes es:</th>';																											
						echo '<th>El material predominante en los techos:</th>';																											
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$i = 1;

					foreach($tables->result() as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";
						echo "<td>". $row->NOM_SEDE ."</td>";
						echo "<td>". $row->NOM_DD ."</td>";
						echo "<td>". $row->NOM_PP ."</td>";						
						echo "<td>". $row->NOM_DI ."</td>";						
						echo "<td>". $row->NOM_CCPP ."</td>";
						echo "<td>". $row->NFORM ."</td>";
						echo "<td>". $row->S3_200 ."</td>";																	
						echo "<td>". $row->S3_400 ."</td>";																	
						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

		?>
	</div>
</div>
