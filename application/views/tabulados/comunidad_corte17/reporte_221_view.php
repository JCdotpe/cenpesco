<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad_corte17/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR SERVICIOS QUE DISPONEN LAS INSTITUCIONES EDUCATIVAS, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="26" style="text-align:center">Servicios que disponen las instituciones educativas</th>';	
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';

						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Agua por red pública</th>';										
						echo '<th colspan="2" style="text-align:center">Pozo</th>';						
						echo '<th colspan="2" style="text-align:center">Alumbrado eléctrico</th>';						
						echo '<th colspan="2" style="text-align:center">Panel Solar</th>';						
						echo '<th colspan="2" style="text-align:center">Generador eléctrico</th>';						
						echo '<th colspan="2" style="text-align:center">Servicio higiénico conectado a red pública</th>';						
						echo '<th colspan="2" style="text-align:center">Letrina</th>';						
						echo '<th colspan="2" style="text-align:center">Pozo séptico</th>';						
						echo '<th colspan="2" style="text-align:center">Pozo ciego</th>';						
						echo '<th colspan="2" style="text-align:center">Computadora</th>';						
						echo '<th colspan="2" style="text-align:center">Televisor</th>';						
						echo '<th colspan="2" style="text-align:center">DVD</th>';						
						echo '<th colspan="2" style="text-align:center">Pizarra acrílica</th>';						
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
					
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->AGUA;
							$tot_b += $reg->POZO;
							$tot_c += $reg->ALUMBRADO;
							$tot_d += $reg->PANEL;
							$tot_e += $reg->GENERADOR;
							$tot_f += $reg->SERVICIO;
							$tot_g += $reg->LETRINA;
							$tot_h += $reg->P_SEPTICO;
							$tot_i += $reg->P_CIEGO;
							$tot_j += $reg->COMPUTADORA;
							$tot_k += $reg->TELEVISOR;
							$tot_l += $reg->DVD;
							$tot_m += $reg->PIZARRA;							
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
							echo '<td style="text-align:center">' . $tot_n. '</td>';										
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
							$serie_1[] = round(($a = $reg->AGUA)*100/$tot,2);
							$serie_2[] = round(($b = $reg->POZO)*100/$tot,2);
							$serie_3[] = round(($c = $reg->ALUMBRADO)*100/$tot,2);
							$serie_4[] = round(($d = $reg->PANEL)*100/$tot,2);
							$serie_5[] = round(($e = $reg->GENERADOR)*100/$tot,2);
							$serie_6[] = round(($f = $reg->SERVICIO)*100/$tot,2);
							$serie_7[] = round(($g = $reg->LETRINA)*100/$tot,2);
							$serie_8[] = round(($h = $reg->P_SEPTICO)*100/$tot,2);
							$serie_9[] = round(($i = $reg->P_CIEGO)*100/$tot,2);
							$serie_10[] = round(($j = $reg->COMPUTADORA)*100/$tot,2);
							$serie_11[] = round(($k = $reg->TELEVISOR)*100/$tot,2);
							$serie_12[] = round(($l = $reg->DVD)*100/$tot,2);
							$serie_13[] = round(($m = $reg->PIZARRA)*100/$tot,2);	
							$serie_14[] = round(($n = $reg->NEP)*100/$tot,2);	

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
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
							echo '<td style="text-align:center">' . $n. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($n*100/$tot,2) . '</td>';																																																																						
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad_corte17/includes/text_view.php'); 

			$series = array(
							array("name" => 'AGUA'			,"data" => $serie_1),
							array("name" => 'POZO'			,"data" => $serie_2),
							array("name" => 'ALUMBRADO'		,"data" => $serie_3),
							array("name" => 'PANEL'			,"data" => $serie_4),
							array("name" => 'GENERADOR'		,"data" => $serie_5),
							array("name" => 'SERVICIO'		,"data" => $serie_6),
							array("name" => 'LETRINA'		,"data" => $serie_7),
							array("name" => 'P. SEPTICO'	,"data" => $serie_8),
							array("name" => 'P. CIEGO'		,"data" => $serie_9),
							array("name" => 'COMPUTADORA'	,"data" => $serie_10),
							array("name" => 'TELEVISOR'		,"data" => $serie_11),
							array("name" => 'DVD'			,"data" => $serie_12),
							array("name" => 'PIZARRA'		,"data" => $serie_13),
							array("name" => 'NEP'			,"data" => $serie_14)	);
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