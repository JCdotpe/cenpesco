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
				    			$c_title = 'PERÚ: PESCADORES POR NIVEL DE ESTUDIOS ALCANZADO, SEGÚN DEPARTAMENTO, 2013';

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
									echo '<th colspan="16" style="text-align:center">Nivel de estudios alcanzado</th>';	
									echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">No especificado</th>';																																													
									echo '</tr>';

									echo '<tr>';
										echo '<th colspan="2" style="text-align:center">'. ($variable_1 = 'Sin nivel') .'</th>';										
										echo '<th colspan="2" style="text-align:center">'. ($variable_2 = 'Inicial' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_3 = 'Primaria' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_4 = 'Secundaria' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_5 = 'Superior no universitaria incompleta' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_6 = 'Superior no universitaria completa' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_7 = 'Superior universitaria incompleta' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_8 = 'Superior universitaria completa' ) .'</th>';																							
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
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';									
									$aa = 0;
									$bb = 0;
									$tt = 0;
									$x  = 0; $y = 0;
									foreach($dep->result() as $d){
										echo '<tr>';
										echo '<td>' . $d->DEPARTAMENTO . '</td>';										
										echo '<td style="text-align:center">' . number_format($vt[$d->CCDD],0,',',' ') . '</td>';									
										echo '<td style="text-align:center;">' . number_format( ( ($vt[$d->CCDD]>0) ? 100 : 0 ),1,',',' ') . '</td>';	

										for($i=1; $i<=9;$i++){
											$a = (isset($vr[$d->CCDD][$i])) ? $vr[$d->CCDD][$i] : 0;
											$serie[$x][$y] = $ap = ($vt[$d->CCDD]!=0) ? round($a*100/$vt[$d->CCDD],1) : 0;
											echo '<td style="text-align:center">' . number_format($a,0,',',' ') . '</td>';										
											echo '<td style="text-align:center">' . number_format($ap,1,',',' ') . '</td>';	
											$x++;																															
										}
										echo '</tr>';
										$y++; $x = 0;
									}			
									//totales
									echo '<tr>';
									echo '<td>Total</td>';										
									echo '<td style="text-align:center">' . number_format($total,0,',',' ') . '</td>';										
									echo '<td style="text-align:center;">100,0</td>';	
										for($i=1; $i<=9;$i++){
											$a = (isset($tr[$i])) ? $tr[$i] : 0;
											$ap = ($total!=0) ? round($a*100/$total,1) : 0;
											echo '<td style="text-align:center">' . number_format($a,0,',',' ') . '</td>';										
											echo '<td style="text-align:center">' . number_format($ap,1,',',' ') . '</td>';																														
										}
									echo '</tr>';

								echo '</tbody>';
							echo '</table></div>';

					?>
					<?php 
						$series = array(
										array("name" => $variable_1 	,"data" => $serie[0]),
										array("name" => $variable_2 	,"data" => $serie[1]),
										array("name" => $variable_3 	,"data" => $serie[2]),
										array("name" => $variable_4 	,"data" => $serie[3]),
										array("name" => $variable_5 	,"data" => $serie[4]),
										array("name" => $variable_6 	,"data" => $serie[5]),
										array("name" => $variable_7 	,"data" => $serie[6]),
										array("name" => $variable_8 	,"data" => $serie[7]), 
										array("name" => 'No especificado'	,"data" => $serie[8]),
										);
		
									//ingreso manual de datos
										// $serie['x'][0] = 913;
										// $serie['x'][1] = 0;
										// $serie['x'][2] = 0;
										// $serie['x'][3] = 0;
										// $serie['x'][4] = 0;
										// $serie['x'][5] = 0;
										// $serie['x'][6] = 0;
										// $serie['x'][7] = 0;
										// $serie['x'][8] = 0;
										// $serie['x'][9] = 0;
										// $serie['x'][10] = 0;
										// $serie['x'][11] = 0;
										// $serie['x'][12] = 0;
										// $serie['x'][13] = 0;
										// $serie['x'][14] = 2053;
										// $serie['x'][15] = 248;
										// $serie['x'][16] = 0;
										// $serie['x'][17] = 0;
										// $serie['x'][18] = 261;
										// $serie['x'][19] = 698;
										// $serie['x'][20] = 1145;
										// $serie['x'][21] = 0;
										// $serie['x'][22] = 355;
										// $serie['x'][23] = 660;
										// array_unshift($series, array("name" => 'MANUAL INGRESO'		,"data" => $serie['x']));
										//ingreso manual de datos	
														
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



