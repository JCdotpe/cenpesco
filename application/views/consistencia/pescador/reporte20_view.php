<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICAR LAS CANTIDADES MAXIMAS Y MINIMAS DE LA PREGUNTA 1 DE LA SECCION VII</h4>
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
						echo '<th>En los ultimos 12 meses, como financio su actividad de pesca?</th>';																											
						echo '<th>En los ultimos 12 meses, como financio su actividad de pesca?</th>';																																																					
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
							echo "<td>". $row->S7_101A ."</td>";																	
							echo "<td>". $row->S7_102A ."</td>";																																	
						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

		?>
	</div>
</div>
