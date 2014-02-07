<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad_corte17/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR TIPO DE ENFERMEDADES Y/O ACCIDENTES, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="34" style="text-align:center">Enfermedades y/o accidentes</th>';		
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																												
						echo '</tr>';																								
															
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Tuberculosis</th>';										
						echo '<th colspan="2" style="text-align:center">Neumonía</th>';						
						echo '<th colspan="2" style="text-align:center">Cólera</th>';						
						echo '<th colspan="2" style="text-align:center">Vómitos, diarrea</th>';						
						echo '<th colspan="2" style="text-align:center">Desnutrición, anemia</th>';						
						echo '<th colspan="2" style="text-align:center">Parasitosis</th>';						
						echo '<th colspan="2" style="text-align:center">Uta</th>';						
						echo '<th colspan="2" style="text-align:center">Chupos, granos</th>';										
						echo '<th colspan="2" style="text-align:center">Malaria, paludismo</th>';						
						echo '<th colspan="2" style="text-align:center">Fiebre amarilla</th>';						
						echo '<th colspan="2" style="text-align:center">Hepatitis</th>';						
						echo '<th colspan="2" style="text-align:center">Tifoidea</th>';						
						echo '<th colspan="2" style="text-align:center">Sarampión</th>';						
						echo '<th colspan="2" style="text-align:center">Enfermedades de transmisíon  sexual</th>';	
						echo '<th colspan="2" style="text-align:center">Mordeduras de serpientes, picaduras</th>';										
						echo '<th colspan="2" style="text-align:center">Fracturas, golpes</th>';						
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
						$tot_q = 0;
						$tot_r = 0;
			
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->TUBERCULOSIS;
							$tot_b += $reg->NEUMONIA;
							$tot_c += $reg->COLERA;
							$tot_d += $reg->VOMITOS;
							$tot_e += $reg->DESNUTRICION;
							$tot_f += $reg->PARASITOSIS;
							$tot_g += $reg->UTA;
							$tot_h += $reg->CHUPOS;
							$tot_i += $reg->MALARIA;
							$tot_j += $reg->FIEBRE;
							$tot_k += $reg->HEPATITIS;
							$tot_l += $reg->TIFOIDEA;
							$tot_m += $reg->SARAMPION;	
							$tot_n += $reg->ETS;
							$tot_o += $reg->MORDEDURAS;
							$tot_p += $reg->FRACTURAS;
							$tot_q += $reg->OTRO;													
							$tot_r += $reg->NEP;													
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

							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->TUBERCULOSIS)*100/$tot,2);
							$serie_2[] = round(($b = $reg->NEUMONIA)*100/$tot,2);
							$serie_3[] = round(($c = $reg->COLERA)*100/$tot,2);
							$serie_4[] = round(($d = $reg->VOMITOS)*100/$tot,2);
							$serie_5[] = round(($e = $reg->DESNUTRICION)*100/$tot,2);
							$serie_6[] = round(($f = $reg->PARASITOSIS)*100/$tot,2);
							$serie_7[] = round(($g = $reg->UTA)*100/$tot,2);
							$serie_8[] = round(($h = $reg->CHUPOS)*100/$tot,2);
							$serie_9[] = round(($i = $reg->MALARIA)*100/$tot,2);
							$serie_10[] = round(($j   = $reg->FIEBRE)*100/$tot,2);
							$serie_11[] = round(($k   = $reg->HEPATITIS)*100/$tot,2);
							$serie_12[] = round(($l   = $reg->TIFOIDEA)*100/$tot,2);
							$serie_13[] = round(($m   = $reg->SARAMPION)*100/$tot,2);	
							$serie_14[] = round(($n   = $reg->ETS)*100/$tot,2);
							$serie_15[] = round(($o   = $reg->MORDEDURAS)*100/$tot,2);
							$serie_16[] = round(($p   = $reg->FRACTURAS)*100/$tot,2);
							$serie_17[] = round(($q   = $reg->OTRO)*100/$tot,2);	
							$serie_18[] = round(($r   = $reg->NEP)*100/$tot,2);	

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
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad_corte17/includes/text_view.php'); 

			$series = array(
							array("name" => 'TUBERCULOSIS'	,"data" => $serie_1),
							array("name" => 'NEUMONIA'		,"data" => $serie_2),
							array("name" => 'COLERA'		,"data" => $serie_3),
							array("name" => 'VOMITOS'		,"data" => $serie_4),
							array("name" => 'DESNUTRICION'	,"data" => $serie_5),
							array("name" => 'PARASITOSIS'	,"data" => $serie_6),
							array("name" => 'UTA'			,"data" => $serie_7),
							array("name" => 'CHUPOS'		,"data" => $serie_8),
							array("name" => 'MALARIA'		,"data" => $serie_9),
							array("name" => 'FIEBRE'		,"data" => $serie_10),
							array("name" => 'HEPATITIS'		,"data" => $serie_11),
							array("name" => 'TIFOIDEA'		,"data" => $serie_12),
							array("name" => 'SARAMPION'		,"data" => $serie_13),
							array("name" => 'ETS'			,"data" => $serie_14),
							array("name" => 'MORDEDURAS'	,"data" => $serie_15),
							array("name" => 'FRACTURAS'		,"data" => $serie_16),
							array("name" => 'OTRO'			,"data" => $serie_17),
							array("name" => 'NEP'			,"data" => $serie_18)	);
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