<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4>PERÚ: EMBARCACIONES PESQUERAS PROPIAS O AUTOCONSTRUIDAS, POR ESTADO DE LA EMBARCACIÓN, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="10" style="text-align:center">Estado de la embarcación</th>';																																														
						echo '</tr>';
						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th colspan="2" style="text-align:center">Operativa</th>';																					
						echo '<th colspan="2" style="text-align:center">En reparación</th>';																					
						echo '<th colspan="2" style="text-align:center">En abandono</th>';																					
						echo '<th colspan="2" style="text-align:center">En construcción o reconstrucción</th>';																																																																																																																																																															
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
						echo '</tr>';

						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $td[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . round($td[$d->CCDD]*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $e1[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e1[$d->CCDD]*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $e2[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e2[$d->CCDD]*100/$ttt,2) . '%</td>';		

								echo '<td style="text-align:center">' . $e3[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e3[$d->CCDD]*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $e4[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e4[$d->CCDD]*100/$ttt,2) . '%</td>';																									
							echo '</tr>';

						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . ($ttt) . '</td>';										
						echo '<td style="text-align:center;color:green">100%</td>';	

								echo '<td style="text-align:center">' . $te1 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te1*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $te2 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te2*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $te3 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te3*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $te4 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te4*100/$ttt,2) . '%</td>';	

						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
		<?php $this->load->view('tabulados/pescador/includes/text_view.php'); ?>
	</div>
	<?php //print_r($dep); ?>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>