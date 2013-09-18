<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICAR DUPLICADOS DE DNI</h4>
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
						echo '<th>DNI</th>';																											
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$j = 1;
					$i = 0;
					// foreach($tables->result() as $row){
					foreach($all->result() as $a){
						foreach($tables[$i]->result() as $row){
							echo "<tr>";
							echo "<td>". $j++."</td>";
							echo "<td>". $row->NOM_SEDE ."</td>";
							echo "<td>". $row->NOM_DD ."</td>";
							echo "<td>". $row->NOM_PP ."</td>";						
							echo "<td>". $row->NOM_DI ."</td>";						
							echo "<td>". $row->NOM_CCPP ."</td>";
							echo "<td>". $row->NFORM ."</td>";
							echo "<td>". $row->S2_4 ."</td>";																	
							echo "</tr>"; 
						}
						$i++;
					}
					 // }
					echo '</tbody>';
				echo '</table>';

		?>
	</div>
</div>
