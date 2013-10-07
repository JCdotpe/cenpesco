<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4 style="text-align:center">CUADRO N° 234</h4>
    	<h4 style="text-align:center">PERÚ: COMUNIDADES QUE REALIZAN LA PESCA Y/O ACUICULTURA, POR ESPECIES QUE COSECHÓ, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th rowspan="3" style="vertical-align:middle">Departamento</th>';					
						echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
						echo '<th colspan="28" style="text-align:center">Especies</th>';				
						echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">No cultivan</th>';																																												
						echo '</tr>';
																																															
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Trucha</th>';										
						echo '<th colspan="2" style="text-align:center">Tilapia</th>';						
						echo '<th colspan="2" style="text-align:center">Boquichico</th>';						
						echo '<th colspan="2" style="text-align:center">Paiche</th>';						
						echo '<th colspan="2" style="text-align:center">Gamitana</th>';						
						echo '<th colspan="2" style="text-align:center">Paco</th>';						
						echo '<th colspan="2" style="text-align:center">Caracol "Churo"</th>';						
						echo '<th colspan="2" style="text-align:center">Camarón gigante</th>';										
						echo '<th colspan="2" style="text-align:center">Langostino</th>';						
						echo '<th colspan="2" style="text-align:center">Carpa</th>';						
						echo '<th colspan="2" style="text-align:center">Carachama</th>';						
						echo '<th colspan="2" style="text-align:center">Sabalo</th>';						
						echo '<th colspan="2" style="text-align:center">Peces Ornamentales</th>';						
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
					//
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->TRUCHA;
							$tot_b += $reg->TILAPIA;
							$tot_c += $reg->BOQUICHICO;
							$tot_d += $reg->PAICHE;
							$tot_e += $reg->GAMITANA;
							$tot_f += $reg->PACO;
							$tot_g += $reg->C_CHURRO;
							$tot_h += $reg->C_GIGANTE;
							$tot_i += $reg->LANGOSTINO;
							$tot_j += $reg->CARPA;
							$tot_k += $reg->CARACHAMA;
							$tot_l += $reg->SABALO;
							$tot_m += $reg->P_ORNAMENTALES;	
							$tot_n += $reg->OTRO;
							$tot_o += $reg->NO_CULTIVAN;
						}
							echo '<tr>';
							echo '<td> TOTAL</td>';										
							echo '<td style="text-align:center">' . $tot_tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '%</td>';	
							echo '<td style="text-align:center">' . $tot_a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_a*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_b*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_c*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_d. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_d*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_e . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_e*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_f. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_f*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_g . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_g*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_h. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_h*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_i. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_i*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_j . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_j*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_k. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_k*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_l . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_l*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_m. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_m*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_n . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_n*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $tot_o. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_o*100/$tot_tot,2) . '%</td>';	
																															
							echo '</tr>';						
						foreach($tables->result() as $reg){
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$a 	 = $reg->TRUCHA;
							$b 	 = $reg->TILAPIA;
							$c 	 = $reg->BOQUICHICO;
							$d 	 = $reg->PAICHE;
							$e 	 = $reg->GAMITANA;
							$f 	 = $reg->PACO;
							$g 	 = $reg->C_CHURRO;
							$h 	 = $reg->C_GIGANTE;
							$i 	 = $reg->LANGOSTINO;
							$j 	 = $reg->CARPA;
							$k 	 = $reg->CARACHAMA;
							$l 	 = $reg->SABALO;
							$m 	 = $reg->P_ORNAMENTALES;	
							$n 	 = $reg->OTRO;
							$o 	 = $reg->NO_CULTIVAN;							

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($a*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($b*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($c*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $d. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($d*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $e . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($e*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $f. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($f*100/$tot_tot,2) . '%</td>';		
							echo '<td style="text-align:center">' . $g . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($g*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $h. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($h*100/$tot_tot,2) . '%</td>';
							echo '<td style="text-align:center">' . $i. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($i*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $j . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($j*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $k. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($k*100/$tot_tot,2) . '%</td>';		
							echo '<td style="text-align:center">' . $l . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($l*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $m. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($m*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $n . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($n*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $o. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($o*100/$tot_tot,2) . '%</td>';																																																																								
							echo '</tr>';

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
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php $this->load->view('tabulados/comunidad/includes/text_view.php'); ?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>