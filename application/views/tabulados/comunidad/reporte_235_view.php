<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR PROBLEMAS QUE DIFICULTAN EL DESARROLLO DE LA ACTIVIDAD DE PESCA Y/O ACUICULTURA, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="36" style="text-align:center">Problemas que dificultan la actividad de pesca y/o acuicultura</th>';	
						echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Ninguna</th>';
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																																																					
						echo '</tr>';
			
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Cambios climáticos</th>';										
						echo '<th colspan="2" style="text-align:center">Contaminación del agua</th>';						
						echo '<th colspan="2" style="text-align:center">Falta de financiamiento</th>';						
						echo '<th colspan="2" style="text-align:center">Altos costos de equipos, materiales e insumos</th>';						
						echo '<th colspan="2" style="text-align:center">Conflictos por utilización de las fuentes hídricas</th>';						
						echo '<th colspan="2" style="text-align:center">Falta de sistemas de frío para preservar la producción</th>';						
						echo '<th colspan="2" style="text-align:center">Falta de capacitación y asistencia técnica</th>';						
						echo '<th colspan="2" style="text-align:center">Infraestructura inadecuada</th>';										
						echo '<th colspan="2" style="text-align:center">Falta de vías de acceso	</th>';						
						echo '<th colspan="2" style="text-align:center">Pesca indiscriminada</th>';						
						echo '<th colspan="2" style="text-align:center">Inseguridad ciudadana</th>';						
						echo '<th colspan="2" style="text-align:center">Uso de productos tóxicos</th>';						
						echo '<th colspan="2" style="text-align:center">Uso de explosivos</th>';						
						echo '<th colspan="2" style="text-align:center">Altos costos de alimentos</th>';	
						echo '<th colspan="2" style="text-align:center">Altos costos de semilla</th>';										
						echo '<th colspan="2" style="text-align:center">Presencia de enfermedades en peces</th>';						
						echo '<th colspan="2" style="text-align:center">Dificultad para asociarse</th>';																				
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
					// variable
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
						$tot_r = 0;
						$tot_s = 0;
						$tot_t = 0;
					//
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->C_CLIMATICOS;
							$tot_b += $reg->C_AGUA;
							$tot_c += $reg->F_FINANCIAMIENTO;
							$tot_d += $reg->A_COSTOS;
							$tot_e += $reg->CONFLICTOS;
							$tot_f += $reg->F_SISTEMAS;
							$tot_g += $reg->F_CAPACITACION;
							$tot_h += $reg->I_INADECUADA;
							$tot_i += $reg->F_VIAS;
							$tot_j += $reg->P_INDISCRIMINADA;
							$tot_k += $reg->INSEGURIDAD;
							$tot_l += $reg->P_TOXICOS;
							$tot_m += $reg->EXPLOSIVOS;	
							$tot_n += $reg->C_ALIMENTOS;
							$tot_o += $reg->C_SEMILLAS;
							$tot_p += $reg->ENFERMEDADADES;
							$tot_q += $reg->ASOCIARSE;													
							$tot_r += $reg->OTRO;													
							$tot_s += $reg->NINGUNA;													
							$tot_t += $reg->NEP;													
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
							echo '<td style="text-align:center">' . $tot_o. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_o*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_p . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_p*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_q. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_q*100/$tot_tot,2) . '</td>';
							echo '<td style="text-align:center">' . $tot_r. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_r*100/$tot_tot,2) . '</td>';		
							echo '<td style="text-align:center">' . $tot_s. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_s*100/$tot_tot,2) . '</td>';
							echo '<td style="text-align:center">' . $tot_t. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_t*100/$tot_tot,2) . '</td>';																																					
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
							$o = 0;
							$p = 0;
							$q = 0;															
							$r = 0;															
							$s = 0;															
							$t = 0;		

							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->C_CLIMATICOS)*100/$tot,2);
							$serie_2[] = round(($b = $reg->C_AGUA)*100/$tot,2);
							$serie_3[] = round(($c = $reg->F_FINANCIAMIENTO)*100/$tot,2);
							$serie_4[] = round(($d = $reg->A_COSTOS)*100/$tot,2);
							$serie_5[] = round(($e = $reg->CONFLICTOS)*100/$tot,2);
							$serie_6[] = round(($f = $reg->F_SISTEMAS)*100/$tot,2);
							$serie_7[] = round(($g = $reg->F_CAPACITACION)*100/$tot,2);
							$serie_8[] = round(($h = $reg->I_INADECUADA)*100/$tot,2);
							$serie_9[] = round(($i = $reg->F_VIAS)*100/$tot,2);
							$serie_10[] = round(($j   = $reg->P_INDISCRIMINADA)*100/$tot,2);
							$serie_11[] = round(($k   = $reg->INSEGURIDAD)*100/$tot,2);
							$serie_12[] = round(($l   = $reg->P_TOXICOS)*100/$tot,2);
							$serie_13[] = round(($m   = $reg->EXPLOSIVOS)*100/$tot,2);
							$serie_14[] = round(($n   = $reg->C_ALIMENTOS)*100/$tot,2);
							$serie_15[] = round(($o   = $reg->C_SEMILLAS)*100/$tot,2);
							$serie_16[] = round(($p   = $reg->ENFERMEDADADES)*100/$tot,2);
							$serie_17[] = round(($q   = $reg->ASOCIARSE)*100/$tot,2);
							$serie_18[] = round(($r   = $reg->OTRO)*100/$tot,2);
							$serie_19[] = round(($s   = $reg->NINGUNA)*100/$tot,2);								
							$serie_20[] = round(($t   = $reg->NEP)*100/$tot,2);								

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
								echo '<td style="text-align:center">' . $o. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($o*100/$tot,2) . '</td>';		
								echo '<td style="text-align:center">' . $p . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($p*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $q. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($q*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $r. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($r*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $s. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($s*100/$tot,2) . '</td>';
								echo '<td style="text-align:center">' . $t. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($t*100/$tot,2) . '</td>';																																																																													
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad/includes/text_view.php'); 

			$series = array(
							array("name" => 'C. climáticos'				,"data" => $serie_1),
							array("name" => 'C. agua'					,"data" => $serie_2),
							array("name" => 'F. financiamiento'			,"data" => $serie_3),
							array("name" => 'Altos costos'				,"data" => $serie_4),
							array("name" => 'Conflictos'				,"data" => $serie_5),
							array("name" => 'F. sistemas'				,"data" => $serie_6),
							array("name" => 'F. capacitación'			,"data" => $serie_7),
							array("name" => 'I. inadecuada'				,"data" => $serie_8),
							array("name" => 'F. vías'					,"data" => $serie_9),
							array("name" => 'P. indiscriminada'			,"data" => $serie_10),
							array("name" => 'Inseguridad'				,"data" => $serie_11),
							array("name" => 'P. tóxicos'				,"data" => $serie_12),
							array("name" => 'Uso de explosivos'			,"data" => $serie_13),
							array("name" => 'A. C. alimentos'			,"data" => $serie_14),
							array("name" => 'A. C. semillas'			,"data" => $serie_15),
							array("name" => 'Enfermedades en peces'		,"data" => $serie_16),
							array("name" => 'Dificultad a asociarse'	,"data" => $serie_17),
							array("name" => 'Otro'						,"data" => $serie_18),
							array("name" => 'Ninguna'					,"data" => $serie_19),
							array("name" => 'NEP'						,"data" => $serie_20)	);
			$data['xx'] =  9550;
			$data['yy'] =  450;
			$data['series'] =  $series;
			$data['c_title'] = $c_title;
			$this->load->view('tabulados/comunidad/includes/grafico_view.php', $data); 

			echo form_close(); 
		?>

		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>