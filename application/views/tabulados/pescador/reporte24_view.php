<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4>PERÚ: HIJOS DE PESCADORES POR ACTIVIDAD QUE REALIZAN, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="18" style="text-align:center">Actividad que realizan</th>';																																														
						echo '</tr>';
						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th colspan="2" style="text-align:center">Agrícola</th>';										
						echo '<th colspan="2" style="text-align:center">Pecuaria</th>';																					
						echo '<th colspan="2" style="text-align:center">Acuícola</th>';																					
						echo '<th colspan="2" style="text-align:center">Pesca</th>';																					
						echo '<th colspan="2" style="text-align:center">Caza</th>';																					
						echo '<th colspan="2" style="text-align:center">Construcción</th>';																					
						echo '<th colspan="2" style="text-align:center">Comercio</th>';																					
						echo '<th colspan="2" style="text-align:center">Otro</th>';																					
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

								echo '<td style="text-align:center">' . $e5[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e5[$d->CCDD]*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $e6[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e6[$d->CCDD]*100/$ttt,2) . '%</td>';

								echo '<td style="text-align:center">' . $e7[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e7[$d->CCDD]*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $e8[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e8[$d->CCDD]*100/$ttt,2) . '%</td>';		

								echo '<td style="text-align:center">' . $e9[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e9[$d->CCDD]*100/$ttt,2) . '%</td>';	
																									
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

								echo '<td style="text-align:center">' . $te5 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te5*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $te6 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te6*100/$ttt,2) . '%</td>';

								echo '<td style="text-align:center">' . $te7 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te7*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $te8 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te8*100/$ttt,2) . '%</td>';	

								echo '<td style="text-align:center">' . $te9 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te9*100/$ttt,2) . '%</td>';																													
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