<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>REPORTE DE AVANCE DE DIGITACION GENERAL</h4>
    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>CODIGO</th>';
						echo '<th>ODEI</th>';						
						echo '<th>PEA GENERAL</th>';
						echo '<th>UDRA</th>';
						echo '<th>DIGITACIÓN</th>';
						echo '<th>% AVANCE DE DIGITACION</th>';
						echo '<th>%  COMPARATIVO DE UDRA Y MARCO</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';


					$i = 1;
					$nform_udra_acui = null;
					$nform_udra_pes = null;
					$nform_udra_gen = null;
					$nform_dig_acui = null;
					$nform_dig_pes = null;
					$nform_dig_gen = null;
					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";

						// foreach ($row as  $value) {
						// 	echo "<td>" . $value .'</td>';
						// }
						

						echo "</tr>"; 
					}
					echo '</tbody>';
				echo '</table>';

		// echo '<div class="span3 preguntas titulos">';
		// 	echo '<h5>UDRA TOTAL  : &nbsp;&nbsp;&nbsp;'.$udra_total->row()->FORMULARIOS.'</h5>';
		// echo '</div>';	
		// echo '<div class="offset1 span3 preguntas titulos">';
		// 	echo '<h5>TOTAL REGISTRADOS : &nbsp;&nbsp;&nbsp;'.$registros_total->row()->NFORM.'</h5>';
		// echo '</div>';	
		// echo '<div class="offset1 span2 preguntas titulos">';
		// 	echo '<h5>AVANCE : &nbsp;&nbsp;&nbsp;'.number_format(($registros_total->row()->NFORM*100)/$udra_total->row()->FORMULARIOS).'%</h5>';
		// echo '</div>';	

		?>

    </div>

</div>