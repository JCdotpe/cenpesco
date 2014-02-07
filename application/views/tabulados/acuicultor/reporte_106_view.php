<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">

<?php $this->load->view('tabulados/includes/sidebar_view'); ?> <!-- SIDE BAR -->
<div class="row-fluid">


 	<div class="span12" id="ap-content">

		<?php $this->load->view('tabulados/includes/tabs_view.php');?> <!--include tabs y logos	-->
		
		<div class="tab-content" style="clear:both">
		  	<div class="tab-pane active" id="tabulado">
				<!-- INICIO TABULADO -->
					
				    	<?php
				    			//EVALUAR NEP					
									$NEP = 0;
									// foreach ($tables->result() as $value) {
									// 			$NEP += $value->NEP;
									// 	}
									$cant_v = ($NEP == 0) ? 27 : 28; // cantidad de variables (incluir NEP y Total)
								// PREGUNTAS MULTIPLES
									//$respuesta_unica = TRUE;

					    	echo form_open("/tabulados/export");
					    			$c_title = 'PERÚ: ACUICULTORES POR LUGAR DE RESIDENCIA EN EL AÑO 2007, SEGÚN DEPARTAMENTO, 2013';

									$this->load->view('tabulados/includes/tab_logo_view.php');

								echo '<div class="row-fluid" style="overflow:auto;"><table border="1" class="table table-striped box-header" id="tabul" >';
										echo '<caption><h3>
														CUADRO N° '. sprintf("%02d",$opcion) .'
														<br><strong>
														'. $c_title  .' </strong>
										     </h3></caption>';

										echo '<thead>';
											echo '<tr>';
											echo '<th rowspan="3" style="vertical-align:middle;text-align:center">Departamento</th>';					
											echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
											echo '<th colspan="'. ( ($NEP == 0) ? ($cant_v - 1)*2 : ($cant_v - 2)*2 ).'" style="text-align:center">Lugar de residencia en el año 2007</th>';
											//echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																														
											echo '</tr>';
											echo '<tr>';
												echo '<th colspan="2" style="text-align:center">'. ($variable_1 = 'Amazonas') .'</th>';										
												echo '<th colspan="2" style="text-align:center">'. ($variable_2 = 'Ancash' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_3 = 'Apurímac' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_4 = 'Arequipa' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_5 = 'Ayacucho' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_6 = 'Cajamarca' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_7 = 'Callao' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_8 = 'Cusco' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_9 = 'Huancavelica' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_10 = 'Huánuco' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_11 = 'Ica' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_12 = 'Junín' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_13 = 'La Libertad' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_14 = 'Lambayeque' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_15 = 'Lima' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_16 = 'Loreto' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_17 = 'Madre De Dios' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_18 = 'Moquegua' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_19 = 'Pasco' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_20 = 'Piura' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_21 = 'Puno' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_22 = 'San Martín' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_23 = 'Tacna' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_24 = 'Tumbes' ) .'</th>';						
												echo '<th colspan="2" style="text-align:center">'. ($variable_25 = 'Ucayali' ) .'</th>';												
												echo '<th colspan="2" style="text-align:center">'. ($variable_26 = 'Otros paises' ) .'</th>';												
											echo '</tr>';

											echo '<tr>';
												for ($i=1; $i <=$cant_v ; $i++) { 
											echo '<th style="text-align:center">Abs</th>';										
											echo '<th style="text-align:center;">%</th>';					
												}																															
											echo '</tr>';
										echo '</thead>';
										echo '<tbody>';

									$x = 1; $z = 0;  $u = 0;
									$totales = array_fill(1, $cant_v,0); 
									$array_porc=null; $index = null;$diff = 0;
									$array_porc_tot=null; $index_tot = null;$diff_tot = 0;

									foreach($tables->result() as $filas){
										echo '<tr>';
											if($respuesta_unica){// tabular al 100% en respuestas unicas
												foreach ($filas as  $key => $value) {
													if($key == 'CCDD' || $key == 'DEPARTAMENTO' || $key == 'TOTAL' ){}
													else{
														$array_porc[$key]= ( ($filas->TOTAL>0) ? round( ($value*100/ $filas->TOTAL),1)  : 0  ) ; 
													}
												}
												if ( round(array_sum($array_porc),1) > 100 ) {
													$index = array_keys($array_porc,max($array_porc));//echo  $filas->DEPARTAMENTO .   '_mayor_ '.$index[0] . '<br>';
													$diff = round( (100-array_sum($array_porc)),1);
												}else if( round(array_sum($array_porc),1) < 100){
													$diff = round( (100-array_sum($array_porc)),1);
													array_pop($array_porc);//delete NEP
													$array_porc =  array_filter($array_porc); //solo valores no ceros
													$index = (!empty($array_porc)) ? ( array_keys($array_porc,min($array_porc)) ) :  null;//echo $filas->DEPARTAMENTO . '  '. $diff .'_menor_'.  $index[0] . '<br>';
												}
											}
											foreach ($filas as  $key => $value) {
												if($key != 'CCDD'){
														if($key == 'NEP' && $NEP == 0 ){}else{echo '<td style="text-align:'. ( ($key == 'DEPARTAMENTO') ? 'left' : 'right') .'">' . ( ( $key == 'DEPARTAMENTO') ? $value : number_format( $value, 0 ,',',' ') ) . '</td>';}	
													if($key != 'DEPARTAMENTO'){ if(isset($totales[$x])){ $totales[$x]+= $value; $x++; } 
														if($key == 'NEP' && $NEP == 0 ){}else{
															echo '<td style="text-align:right;">' . number_format( ( ($key == 'TOTAL') ? ( ($filas->TOTAL==0) ? 0 : 100 )  :  $datas[$z++][$u] = ( ( ($filas->TOTAL>0) ? round( ($value*100/ $filas->TOTAL),1) : 0 ) +  ( ( $diff<>0 && $key == $index[0] ) ? $diff : 0 ) ) ),1,',',' ' ) .'</td>'; }
													};
													
												}
											} $x = 1; $z = 0; $u++;

											$array_porc=null; $index = null;$diff = 0;
											$total_dep[] = $filas->TOTAL;
										echo '</tr>';
									}	
									//TOTALES
									echo '<tr>';
									echo '<td>Total</td>';						
										if($respuesta_unica){// tabular al 100% en respuestas unicas
											for ($i = 2; $i<=$cant_v ; $i++) {
													$array_porc_tot[$i]=  round( ($totales[$i]*100/$totales[1] ),1); 
											}
											if ( round(array_sum($array_porc_tot),1) > 100 ) {
												$index_tot = array_keys($array_porc_tot,max($array_porc_tot));
												$diff_tot = round( (100-array_sum($array_porc_tot)),1);
											}else if( round(array_sum($array_porc_tot),1) < 100){
												$diff_tot = round( (100-array_sum($array_porc_tot)),1);
												array_pop($array_porc_tot);//delete NEP 
												$array_porc_tot =  array_filter($array_porc_tot);//solo valores no ceros
												$index_tot = ( array_keys($array_porc_tot,min($array_porc_tot)) );
											}
										}							

										for ($i=1; $i <= $cant_v ; $i++) { 
									echo '<td style="text-align:right">' . number_format($totales[$i],0,',',' ') . '</td>';										
									echo '<td style="text-align:right;"> '. number_format($totales_porc[$i] = (round( ( ($i==1) ? ( ($filas->TOTAL==0) ? 0 : 100 ) : $totales[$i]*100/$totales[1] ),1) + ( ($diff_tot<>0 && $i == $index_tot[0]) ? $diff_tot : 0 ) ),1,',', ' ' ).'</td>';	
										}$totales_porc[1] = $totales[1];//guardando nacional (TECHO)
									echo '</tr>';
									echo '</tr>';

										echo '</tbody>';
									echo '</table></div>';

									$series = array(
													array("name" => $variable_1 	,"data" => $datas[0]),
													array("name" => $variable_2 	,"data" => $datas[1]),
													array("name" => $variable_3 	,"data" => $datas[2]),
													array("name" => $variable_4 	,"data" => $datas[3]),
													array("name" => $variable_5 	,"data" => $datas[4]),
													array("name" => $variable_6 	,"data" => $datas[5]),
													array("name" => $variable_7 	,"data" => $datas[6]),
													array("name" => $variable_8 	,"data" => $datas[7]),
													array("name" => $variable_9 	,"data" => $datas[8]),
													array("name" => $variable_10 	,"data" => $datas[9]),
													array("name" => $variable_11 	,"data" => $datas[10]),
													array("name" => $variable_12 	,"data" => $datas[11]),
													array("name" => $variable_13 	,"data" => $datas[12]),
													array("name" => $variable_14 	,"data" => $datas[13]),
													array("name" => $variable_15 	,"data" => $datas[14]),
													array("name" => $variable_16 	,"data" => $datas[15]),
													array("name" => $variable_17 	,"data" => $datas[16]),
													array("name" => $variable_18 	,"data" => $datas[17]),
													array("name" => $variable_19 	,"data" => $datas[18]),
													array("name" => $variable_20 	,"data" => $datas[19]),
													array("name" => $variable_21 	,"data" => $datas[20]),
													array("name" => $variable_22 	,"data" => $datas[21]),
													array("name" => $variable_23 	,"data" => $datas[22]),
													array("name" => $variable_24 	,"data" => $datas[23]),
													array("name" => $variable_25 	,"data" => $datas[24]),
													array("name" => $variable_26 	,"data" => $datas[25]),);
													//array("name" => 'NEP'			,"data" => $datas[25])	
								array_push($series, array("name" => 'TOTAL'	,"data" => $totales_porc));
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