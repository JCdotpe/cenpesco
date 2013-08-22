<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>DEBE DE HABER ALGUN DATO YA SEA EN PUERTA, BLOCK, INT, MZ, LOTE, SI NO LO HUBIERA COLOCAR EN PUERTA "SN"</h4>
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
						echo '<th>PTANUM</th>';																											
						echo '<th>BLOCK</th>';																											
						echo '<th>INT</th>';																											
						echo '<th>MZ</th>';																											
						echo '<th>LOTE</th>';																											
						echo '<th>KM</th>';																											
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
						echo "<td>". $row->PTANUM ."</td>";																	
						echo "<td>". $row->BLOCK ."</td>";																	
						echo "<td>". $row->INT ."</td>";																	
						echo "<td>". $row->MZ ."</td>";																	
						echo "<td>". $row->LOTE ."</td>";																	
						echo "<td>". $row->KM ."</td>";																	
						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

		?>
	</div>
</div>
