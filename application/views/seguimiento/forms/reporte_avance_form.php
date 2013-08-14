
<?php  




		echo '<div class="row-fluid">';

			echo '<div class="span12">';

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>CCDD</th>';
						echo '<th>DEPARTAMENTO</th>';
						echo '<th>PEA MARCO</th>';
						echo '<th>PEA CAMPO</th>';
						echo '<th>% COMPARACION</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
						echo "<tr>";
						echo "<td>&nbsp;&nbsp;&nbsp; </td>";
						echo "<td><strong>TOTAL NACIONAL</strong></td>";
						$total = 0;
						foreach($pea_marco->result() as $row){
							$total = $total + $row->PEA_MARCO;
						}
						echo "<td><strong>". $total ."</strong></td>";
						$total_campo = 0;
						foreach($avance_campo->result() as $row){
							$total_campo = $total_campo + $row->PEA_CAMPO;
						}
						echo "<td><strong>". $total_campo ."</strong></td>";	
						echo "<td><strong>". number_format((($total_campo * 100 )/$total), 1, '.',' ')."%</strong></td>";						
						echo "</tr>";


					$pea = null;
					foreach($pea_marco->result() as $row){
						echo "<tr>";
						echo "<td>". $row->CCDD ."</td>";
						echo "<td>". $row->DEPARTAMENTO ."</td>";
						echo "<td>". $row->PEA_MARCO ."</td>";
						foreach ($avance_campo->result() as  $value) {
							if ($row->CCDD == $value->CCDD){
								$pea = $value->PEA_CAMPO  ; break;
							}
						}
						if (is_numeric($pea)){
							echo "<td>". $pea ."</td>";
							echo "<td><strong>". number_format(((($pea)*100)/($row->PEA_MARCO )) ,1,'.',' ')."%</strong></td>";
						}else{
							echo "<td>". 0 ."</td>";
							echo "<td>". 0 ."%</td>";
						}
						$pea = null;
						echo "</tr>";  }
					echo '</tbody>';
				echo '</table>';

			echo '</div>'; 	

		echo '</div>'; 

?>

<div class="row-fluid" style="padding-bottom: 20px !important">
	<div class="btn btn-success pull-left"><?php echo anchor('seguimiento/reporte_avance/export','Exportar Excel'); ?></div>
</div>





