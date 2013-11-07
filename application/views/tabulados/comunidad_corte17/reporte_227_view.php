<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad_corte17/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES BENEFICIADAS DE ALGÚN PROGRAMA SOCIAL, POR TIPO, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="30" style="text-align:center">Programa social</th>';		
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';
															
																							
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Vaso de leche</th>';										
						echo '<th colspan="2" style="text-align:center">Canasta alimentaria</th>';						
						echo '<th colspan="2" style="text-align:center">Comedor popular</th>';						
						echo '<th colspan="2" style="text-align:center">Desayuno alimentación escolar (Qali Warma) </th>';						
						echo '<th colspan="2" style="text-align:center">Textos y útiles escolares </th>';						
						echo '<th colspan="2" style="text-align:center">Seguro Integral de Salud (SIS) </th>';						
						echo '<th colspan="2" style="text-align:center">Programa Nacional de Movilización por la alfabetización (PRONAMA) </th>';						
						echo '<th colspan="2" style="text-align:center">Planificación familiar </th>';										
						echo '<th colspan="2" style="text-align:center">Programa de alimentación y nutrición para el paciente ambulatorio con tuberculosis y familia (PANTBC)  </th>';						
						echo '<th colspan="2" style="text-align:center">Programa de vacunas (Inmunizaciones)   </th>';						
						echo '<th colspan="2" style="text-align:center">Programa Juntos </th>';						
						echo '<th colspan="2" style="text-align:center">Programa Sembrando </th>';						
						echo '<th colspan="2" style="text-align:center">Programa Bono de Gratitud (Pensión 65) </th>';						
						echo '<th colspan="2" style="text-align:center">Programa Cuna Más </th>';	
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
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';
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
					
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->V_LECHE;
							$tot_b += $reg->C_ALIMENTARIA;
							$tot_c += $reg->C_POPULAR;
							$tot_d += $reg->Q_WARMA;
							$tot_e += $reg->TEXTOS;
							$tot_f += $reg->SIS;
							$tot_g += $reg->PRONAMA;
							$tot_h += $reg->P_FAMILIAR;
							$tot_i += $reg->PANTBC;
							$tot_j += $reg->INMUNIZACIONES;
							$tot_k += $reg->P_JUNTOS;
							$tot_l += $reg->P_SEMBRANDO;
							$tot_m += $reg->P_65;	
							$tot_n += $reg->CUNAMAS;	
							$tot_o += $reg->OTRO;
							$tot_p += $reg->NEP;
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
							// echo '<td style="text-align:center">' . $tot_q. '</td>';										
							// echo '<td style="text-align:center;color:green">' . round($tot_q*100/$tot_tot,2) . '%</td>';																															
							echo '</tr>';			
						//DEPS			
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

							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->V_LECHE)*100/$tot,2);
							$serie_2[] = round(($b = $reg->C_ALIMENTARIA)*100/$tot,2);
							$serie_3[] = round(($c = $reg->C_POPULAR)*100/$tot,2);
							$serie_4[] = round(($d = $reg->Q_WARMA)*100/$tot,2);
							$serie_5[] = round(($e = $reg->TEXTOS)*100/$tot,2);
							$serie_6[] = round(($f = $reg->SIS)*100/$tot,2);
							$serie_7[] = round(($g = $reg->PRONAMA)*100/$tot,2);
							$serie_8[] = round(($h = $reg->P_FAMILIAR)*100/$tot,2);
							$serie_9[] = round(($i = $reg->PANTBC)*100/$tot,2);
							$serie_10[] = round(($j   = $reg->INMUNIZACIONES)*100/$tot,2);
							$serie_11[] = round(($k   = $reg->P_JUNTOS)*100/$tot,2);
							$serie_12[] = round(($l   = $reg->P_SEMBRANDO)*100/$tot,2);
							$serie_13[] = round(($m   = $reg->P_65)*100/$tot,2);	
							$serie_14[] = round(($n   = $reg->CUNAMAS)*100/$tot,2);	
							$serie_15[] = round(($o   = $reg->OTRO)*100/$tot,2);
							$serie_16[] = round(($p   = $reg->NEP)*100/$tot,2);

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . round(100,2) . '</td>';	
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
							// echo '<td style="text-align:center">' . $q. '</td>';										
							// echo '<td style="text-align:center;color:green">' . round($q*100/$tot_tot,2) . '%</td>';																																																																						
							echo '</tr>';
														
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad_corte17/includes/text_view.php'); 

			$series = array(
							array("name" => 'V. LECHE'		,"data" => $serie_1),
							array("name" => 'C. ALIMENTARIA',"data" => $serie_2),
							array("name" => 'C. POPULAR'	,"data" => $serie_3),
							array("name" => 'Q. WARMA'		,"data" => $serie_4),
							array("name" => 'TEXTOS'		,"data" => $serie_5),
							array("name" => 'SIS'			,"data" => $serie_6),
							array("name" => 'PRONAMA'		,"data" => $serie_7),
							array("name" => 'P. FAMILIAR'	,"data" => $serie_8),
							array("name" => 'PANTBC'		,"data" => $serie_9),
							array("name" => 'INMUNIZACIONES',"data" => $serie_10),
							array("name" => 'P. JUNTOS'		,"data" => $serie_11),
							array("name" => 'P. SEMBRANDO'	,"data" => $serie_12),
							array("name" => 'P. 65'			,"data" => $serie_13),
							array("name" => 'CUNAMAS'		,"data" => $serie_14),
							array("name" => 'OTRO'			,"data" => $serie_15),
							array("name" => 'NEP'			,"data" => $serie_16) );
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