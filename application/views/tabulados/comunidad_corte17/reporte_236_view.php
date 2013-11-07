<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad_corte17/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR ESTRATEGIAS QUE SE HAN IMPLEMENTADO PARA AFRONTAR LOS PROBLEMAS QUE DIFICULTAN EL DESARROLLO DE LA ACTIVIDAD DE PESCA Y/O ACUICULTURA, SEGÚN DEPARTAMENTO, 2013';

					echo '<table border="1" class="table table-hover table-condensed" id="tablet" name="tablet">';
						echo '<caption><h4>
										CUADRO N° '. $opcion .'
										<br><br>
										'. $c_title .'
						     </h4></caption>';

					echo '<thead>';
						echo '<tr>';
						echo '<th rowspan="3" style="vertical-align:middle">Departamento</th>';					
						echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
						echo '<th colspan="30" style="text-align:center">Estrategias que se han implementado para afrontar los problemas que dificultan el desarrollo de la actividad de pesca y/o acuicultura</th>';																																														
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';
						echo '</tr>';
																									
																							
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Convenios con institucione, organizaciones,etc.</th>';										
						echo '<th colspan="2" style="text-align:center">Creación de gremios</th>';						
						echo '<th colspan="2" style="text-align:center">Prohibiciónde uso de productos Tóxicos</th>';						
						echo '<th colspan="2" style="text-align:center">Prohibición de uso de explosivos</th>';						
						echo '<th colspan="2" style="text-align:center">Control de artes de pesca</th>';						
						echo '<th colspan="2" style="text-align:center">Resétar las tallas mínimas</th>';						
						echo '<th colspan="2" style="text-align:center">Respetar las vedas</th>';						
						echo '<th colspan="2" style="text-align:center">Vigilancia de fuentes hídricas</th>';										
						echo '<th colspan="2" style="text-align:center">Uso compartido de fuentes hídricas entre comunidades</th>';						
						echo '<th colspan="2" style="text-align:center">Gestionar equipos que ayuden a preservar los productos hidrobiológicos</th>';						
						echo '<th colspan="2" style="text-align:center">Reciclaje de residuos sólidos</th>';						
						echo '<th colspan="2" style="text-align:center">Proyeccción de relleno sanitario</th>';						
						echo '<th colspan="2" style="text-align:center">Otro</th>';														
						echo '</tr>';

						echo '<tr>';
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
					echo '</thead>';

					echo '<tbody>';
					// variables
						$tot_tot = 0;
						$tot_a = 0;
						$tot_b = 0;
						$tot_c = 0;
						$tot_d = 0;
						$tot_e = 0;
						$tot_f = 0;
						$tot_g = 0;
						$tot_h = 0;
						$tot_i = 0;
						$tot_j = 0;
						$tot_k = 0;
						$tot_l = 0;
						$tot_m = 0;
						$tot_n = 0;
						$tot_o = 0;
						$tot_p = 0;
						$tot_q = 0;
					//
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->CONVENIOS;
							$tot_b += $reg->GREMIOS;
							$tot_c += $reg->P_TOXICOS;
							$tot_d += $reg->P_EXPLOSIVOS;
							$tot_e += $reg->CONTROL;
							$tot_f += $reg->R_TALLAS;
							$tot_g += $reg->R_VEDAS;
							$tot_h += $reg->VIGILANCIA;
							$tot_i += $reg->F_HIDRICAS;
							$tot_j += $reg->EQUIPOS;
							$tot_k += $reg->RECICLAJE;
							$tot_l += $reg->R_SANITARIO;
							$tot_m += $reg->OTRO;														
							$tot_n += $reg->NEP;														
						}
							echo '<tr>';
							echo '<td> TOTAL</td>';										
							echo '<td style="text-align:center">' . $tot_tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
							echo '<td style="text-align:center">' . $tot_a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_a*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_b*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_c*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_d. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_d*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_e . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_e*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_f. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_f*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_g . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_g*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_h. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_h*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_i. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_i*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_j . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_j*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_k. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_k*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_l . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_l*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_m. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_m*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_n . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_n*100/$tot_tot,2) . '</td>';																																
							echo '</tr>';
						//deps						
						foreach($tables->result() as $reg){
							//reiniciadores
							$dep = NULL;
							$tot = 0;
							$a = 0;
							$b = 0;
							$c = 0;
							$d = 0;
							$e = 0;
							$f = 0;
							$g = 0;
							$h = 0;
							$i = 0;
							$j = 0;
							$k = 0;
							$l = 0;
							$m = 0;	
							$n = 0;
												
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->CONVENIOS)*100/$tot,2);
							$serie_2[] = round(($b = $reg->GREMIOS)*100/$tot,2);
							$serie_3[] = round(($c = $reg->P_TOXICOS)*100/$tot,2);
							$serie_4[] = round(($d = $reg->P_EXPLOSIVOS)*100/$tot,2);
							$serie_5[] = round(($e = $reg->CONTROL)*100/$tot,2);
							$serie_6[] = round(($f = $reg->R_TALLAS)*100/$tot,2);
							$serie_7[] = round(($g = $reg->R_VEDAS)*100/$tot,2);
							$serie_8[] = round(($h = $reg->VIGILANCIA)*100/$tot,2);
							$serie_9[] = round(($i = $reg->F_HIDRICAS)*100/$tot,2);
							$serie_10[] = round(($j   = $reg->EQUIPOS)*100/$tot,2);
							$serie_11[] = round(($k   = $reg->RECICLAJE)*100/$tot,2);
							$serie_12[] = round(($l   = $reg->R_SANITARIO)*100/$tot,2);
							$serie_13[] = round(($m   = $reg->OTRO)*100/$tot,2);	
							$serie_14[] = round(($n   = $reg->NEP)*100/$tot,2);	

							echo '<tr>';
								echo '<td>' . $dep . '</td>';										
								echo '<td style="text-align:center">' . $tot . '</td>';										
								echo '<td style="text-align:center;color:green">' . round(100,2) .'</td>';	
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($a*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $b. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($b*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $c . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($c*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $d. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($d*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $e . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $f. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($f*100/$tot,2) . '</td>';		
								echo '<td style="text-align:center">' . $g . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($g*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $h. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($h*100/$tot,2) . '</td>';
								echo '<td style="text-align:center">' . $i. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($i*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $j . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($j*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $k. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($k*100/$tot,2) . '</td>';		
								echo '<td style="text-align:center">' . $l . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($l*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $m. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($m*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $n . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($n*100/$tot,2) . '</td>';																																																																						
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad_corte17/includes/text_view.php'); 

			$series = array(
							array("name" => 'Convenios'				,"data" => $serie_1),
							array("name" => 'C. gremios'			,"data" => $serie_2),
							array("name" => 'Prohibición Tóxicos'	,"data" => $serie_3),
							array("name" => 'Prohibición explosivos',"data" => $serie_4),
							array("name" => 'Control pesca'			,"data" => $serie_5),
							array("name" => 'Respetar tallas'		,"data" => $serie_6),
							array("name" => 'Respetar vedas'		,"data" => $serie_7),
							array("name" => 'Vigilancia fuentes'	,"data" => $serie_8),
							array("name" => 'Fuentes hídricas'		,"data" => $serie_9),
							array("name" => 'Equipos'				,"data" => $serie_10),
							array("name" => 'Reciclaje residuos'	,"data" => $serie_11),
							array("name" => 'Proyeccción R. sanitario',"data" => $serie_12),
							array("name" => 'Otro'					,"data" => $serie_13),
							array("name" => 'NEP'					,"data" => $serie_14)	);
			$data['tipo'] =  'column';// << column >> or << bar >> 
			$data['xx'] =  2030; // ancho
			$data['yy'] =  840; // altura
			$data['series'] =  $series;
			$data['c_title'] = $c_title;
			$this->load->view('tabulados/comunidad_corte17/includes/grafico_view.php', $data); 

			echo form_close(); 
		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>