<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>PERÚ: PESCADORES POR TIPO DE DIFICULTAD O LIMITACIÓN PERMANENTE, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="12" style="text-align:center">Tipo de dificultad o limitación permanente</th>';																																														
						echo '</tr>';
						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th colspan="2" style="text-align:center">Para ver, aún usando lentes</th>';										
						echo '<th colspan="2" style="text-align:center">Para oír, aún usando audífonos para sordera</th>';																																																																																																																																																																																																																																															
						echo '<th colspan="2" style="text-align:center">Para hablar (entonar / vocalizar)</th>';																																																																																																																																																																																																																																															
						echo '<th colspan="2" style="text-align:center">Para usar brazos y manos / piernas y pies</th>';																																																																																																																																																																																																																																															
						echo '<th colspan="2" style="text-align:center">Alguna otra dificultad o limitación</th>';																																																																																																																																																																																																																																															
						echo '<th colspan="2" style="text-align:center">Ninguna</th>';																																																																																																																																																																																																																																															
						echo '</tr>';

						echo '<tr>';
						echo '<th></th>';										
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';

						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';		
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';																																																									
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$tt = 0;
						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $vt[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . round($vt[$d->CCDD]*100/$total,2) . '%</td>';	

							for($i=1; $i<=6;$i++){

								$a = (isset($vr[$d->CCDD][$i])) ? $vr[$d->CCDD][$i] : 0;
								$ap = ($total!=0) ? round($a*100/$total,2) : 0;
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . $ap . '%</td>';																																
							}

							echo '</tr>';

						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100%</td>';	

							for($i=1; $i<=6;$i++){
								$a = (isset($tr[$i])) ? $tr[$i] : 0;
								$ap = ($total!=0) ? round($a*100/$total,2) : 0;
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . $ap . '%</td>';																														
							}

						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
	<?php //print_r($dep); ?>
</div>
