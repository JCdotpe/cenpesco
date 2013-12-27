<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">

<?php $this->load->view('tabulados/includes/sidebar_view'); ?> <!-- SIDE BAR -->
<div class="row-fluid">


 	<div class="span12" id="ap-content">

		<?php $this->load->view('tabulados/includes/tabs_view.php');?> <!--include tabs y logos	-->
		
		<div class="tab-content" style="clear:both">
		  	<div class="tab-pane active" id="tabulado">
				<!-- INICIO TABULADO -->
			    	<?php
				    	echo form_open("/tabulados/export");
				    			$c_title = 'PERÚ: HIJOS DE PESCADORES POR NIVEL DE ESTUDIOS ALCANZADO, SEGÚN DEPARTAMENTO, 2013';

								$this->load->view('tabulados/includes/tab_logo_view.php');

								echo '<div class="row-fluid" style="overflow:auto;"><table border="1" class="table table-striped box-header" id="tabul" >';
									echo '<caption><h3>
													CUADRO N° '. sprintf("%02d",$opcion) .'
													<br><strong>
													'. $c_title  .' </strong>
									     </h3></caption>';

								echo '<thead>';
									echo '<tr>';
									echo '<th  rowspan="3">Departamento</th>';					
									echo '<th  rowspan="2" colspan="2" style="text-align:center">Total</th>';																																																																																										
									echo '<th colspan="20" style="text-align:center">Nivel de estudios alcanzado</th>';	
									echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">No especificado</th>';																																												
									echo '</tr>';
									echo '<tr>';									
									echo '<th colspan="2" style="text-align:center">' . ($variable_1 = 'Sin nivel') .'</th>';
									echo '<th colspan="2" style="text-align:center">' . ($variable_2 = 'Inicial') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_3 = 'Primaria incompleta') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_4 = 'Primaria completa') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_5 = 'Secundaria incompleta') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_6 = 'Secundaria completa') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_7 = 'Superior no universitaria incompleta') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_8 = 'Superior no universitaria completa') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_9 = 'Superior universitaria incompleta') .'</th>';											
									echo '<th colspan="2" style="text-align:center">' . ($variable_10 = 'Superior universitaria completa') .'</th>';											
									echo '</tr>';

									echo '<tr>';
										echo '<th style="text-align:center">Abs</th>';										
										echo '<th style="text-align:center;">%</th>';	

										echo '<th style="text-align:center">Abs</th>';										
										echo '<th style="text-align:center;">%</th>';	
										echo '<th style="text-align:center">Abs</th>';																															
										echo '<th style="text-align:center;">%</th>';	
										echo '<th style="text-align:center">Abs</th>';										
										echo '<th style="text-align:center;">%</th>';	
										echo '<th style="text-align:center">Abs</th>';																															
										echo '<th style="text-align:center;">%</th>';
										echo '<th style="text-align:center">Abs</th>';										
										echo '<th style="text-align:center;">%</th>';	
										echo '<th style="text-align:center">Abs</th>';																															
										echo '<th style="text-align:center;">%</th>';
										echo '<th style="text-align:center">Abs</th>';										
										echo '<th style="text-align:center;">%</th>';	
										echo '<th style="text-align:center">Abs</th>';																															
										echo '<th style="text-align:center;">%</th>';
										echo '<th style="text-align:center">Abs</th>';										
										echo '<th style="text-align:center;">%</th>';	
										echo '<th style="text-align:center">Abs</th>';																															
										echo '<th style="text-align:center;">%</th>';
										echo '<th style="text-align:center">Abs</th>';																															
										echo '<th style="text-align:center;">%</th>';																									
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';
									foreach($dep->result() as $d){
										echo '<tr>';
										echo '<td>' . $d->DEPARTAMENTO . '</td>';										
										echo '<td style="text-align:center">' . number_format($td[$d->CCDD],0,',',' ') . '</td>';									
										echo '<td style="text-align:center;">' . number_format( ( ($td[$d->CCDD]>0) ? 100 : 0 ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e1[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_1[] = round($e1[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e2[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_2[] = round($e2[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';		

											echo '<td style="text-align:center">' . number_format($e3[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_3[] = round($e3[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e4[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_4[] = round($e4[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';		

											echo '<td style="text-align:center">' . number_format($e5[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_5[] = round($e5[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e6[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_6[] = round($e6[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e7[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_7[] = round($e7[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e8[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_8[] = round($e8[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';		

											echo '<td style="text-align:center">' . number_format($e9[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_9[] = round($e9[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($e10[$d->CCDD],0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format( ( $serie_10[] = round($e10[$d->CCDD]*100/$td[$d->CCDD],1) ),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format(( isset($eNEP[$d->CCDD]) ? $eNEP[$d->CCDD] : 0 ),0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format((  isset($eNEP[$d->CCDD] ) ?  $serie_NEP[] = ( round($eNEP[$d->CCDD]*100/$td[$d->CCDD],1) ) :  $serie_NEP[] = 0 ),1,',',' ') . '</td>';																																			
										echo '</tr>';

									}			

									echo '<tr>';
									echo '<td>Total</td>';										
									echo '<td style="text-align:center">' . number_format($ttt,0,',',' ') . '</td>';										
									echo '<td style="text-align:center;">100,0</td>';	

											echo '<td style="text-align:center">' . number_format($te1,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te1*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te2,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te2*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te3,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te3*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te4,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te4*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te5,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te5*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te6,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te6*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te7,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te3*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te8,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te8*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te9,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te9*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($te10,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format(round($te10*100/$ttt,1),1,',',' ') . '</td>';	

											echo '<td style="text-align:center">' . number_format($teNEP,0,',',' ') . '</td>';										
											echo '<td style="text-align:center;">' . number_format((round($teNEP*100/$ttt,1)),1,',',' ') . '</td>';																																					
									echo '</tr>';

								echo '</tbody>';
							echo '</table></div>';

								$series = array(
												array("name" => $variable_1	,"data" => $serie_1),
												array("name" => $variable_2	,"data" => $serie_2),
												array("name" => $variable_3	,"data" => $serie_3),
												array("name" => $variable_4	,"data" => $serie_4),
												array("name" => $variable_5	,"data" => $serie_5),
												array("name" => $variable_6	,"data" => $serie_6),
												array("name" => $variable_7	,"data" => $serie_7),
												array("name" => $variable_8	,"data" => $serie_8),
												array("name" => $variable_9	,"data" => $serie_9),
												array("name" => $variable_10,"data" => $serie_10),
												array("name" => 'No especificado'	,"data" => $serie_NEP),
												); 
								$data['tipo'] =  'column';// << column >> or << bar >> 
								$data['xx'] =  2030; // ancho
								$data['yy'] =  840; // altura
								$data['series'] =  $series;
								$data['c_title'] = $c_title;
								$this->load->view('tabulados/includes/text_view.php'); 

								$this->load->view('tabulados/includes/metadata_view.php', $data); 

						echo form_close(); 
					?>
		  		<!-- FIN TABULADO -->
		  	</div>
		  
			<div class="tab-pane" id="grafico">
				  	<!-- INICIO GRAFICO -->
							<?php 
								$this->load->view('tabulados/includes/grafico_view.php', $data); 
							?>
							<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
				  	<!-- FIN GRAFICO -->
			</div>

			<div class="tab-pane" id="mapa">
				  	<!-- INICIO MAPA -->
				  			<?php  
				  				$this->load->view('tabulados/includes/mapa_view.php', $data); ?>
				  	<!-- FIN MAPA -->
			</div>

		</div>

	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>


