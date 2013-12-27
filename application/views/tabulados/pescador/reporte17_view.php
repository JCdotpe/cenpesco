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
				    			$c_title = 'PERÚ: HIJOS DE PESCADORES POR RANGOS DE EDAD, SEGÚN DEPARTAMENTO, 2013';

								$this->load->view('tabulados/includes/tab_logo_view.php');

								echo '<div class="row-fluid" style="overflow:auto;"><table border="1" class="table table-striped box-header" id="tabul" >';
									echo '<caption><h3>
													CUADRO N° '. sprintf("%02d",$opcion) .'
													<br><strong>
													'. $c_title  .' </strong>
									     </h3></caption>';

								echo '<thead>';
									echo '<tr>';
										echo '<th rowspan="3" style="vertical-align:middle">Departamento</th>';					
										echo '<th rowspan="2" colspan="2" style="text-align:center">Total</th>';																																																																																										
										echo '<th colspan="12" style="text-align:center">Rangos de edad</th>';
										//echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">No especificado</th>';																																														
									echo '</tr>';
									echo '<tr>';									
										echo '<th colspan="2" style="text-align:center">Menos de un año</th>';										
										echo '<th colspan="2" style="text-align:center">De 1 a 5 años</th>';																					
										echo '<th colspan="2" style="text-align:center">De 6 a 10 años</th>';																					
										echo '<th colspan="2" style="text-align:center">De 10 a 15 años</th>';																					
										echo '<th colspan="2" style="text-align:center">De 15 a 20 años</th>';																					
										echo '<th colspan="2" style="text-align:center">Más de 20 años</th>';																					
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
										// echo '<th style="text-align:center">Abs</th>';																															
										// echo '<th style="text-align:center;">%</th>';											
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
									echo '</tr>';

								echo '</tbody>';
							echo '</table></div>';

								$series = array(
												array("name" => 'Menos de 1 año'	,"data" => $serie_1),
												array("name" => 'De 1 a 5 años'		,"data" => $serie_2),
												array("name" => 'De 6 a 10 años'	,"data" => $serie_3),
												array("name" => 'De 10 a 15 años'	,"data" => $serie_4),
												array("name" => 'De 15 a 20 años'	,"data" => $serie_5),
												array("name" => 'Más de 20 años'	,"data" => $serie_6),
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


