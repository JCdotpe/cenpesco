<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4 style="text-align:center">CUADRO N° 242</h4>
    	<h4 style="text-align:center">PERÚ: COMUNIDADES POR INSTITUCIÓN U ORGANIZACIÓN QUE ADMINISTRA LA OFICINA ADMINISTRATIVA DEL PUNTO DE DESEMBARQUE, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th rowspan="3" style="vertical-align:middle">Departamento</th>';					
						echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
						echo '<th colspan="12" style="text-align:center">Institución u organización que administra la oficina administrativa del punto de desembarque</th>';																																														
						echo '</tr>';
									
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Organización Social de Pescadores Artesanales (OSPA)</th>';										
						echo '<th colspan="2" style="text-align:center">Dirección Regional de Producción (DIREPRO)</th>';						
						echo '<th colspan="2" style="text-align:center">Ministerio de la Producción (PRODUCE)</th>';						
						echo '<th colspan="2" style="text-align:center">Fondo Nacional de Desarrollo Pesquero (FONDEPES)</th>';						
						echo '<th colspan="2" style="text-align:center">Particular o privada</th>';						
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
					
						$dep = NULL;
						$tot = 0;
						$a = 0;
						$b = 0;
						$c = 0;
						$d = 0;
						$e = 0;
						$f = 0;
								
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->OSPA;
							$tot_b += $reg->DIREPRO;
							$tot_c += $reg->PRODUCE;
							$tot_d += $reg->FONDEPES;
							$tot_e += $reg->PARTICULAR;
							$tot_f += $reg->OTRO;
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
							echo '</tr>';						
						foreach($tables->result() as $reg){
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$a 	 = $reg->OSPA;
							$b 	 = $reg->DIREPRO;
							$c 	 = $reg->PRODUCE;
							$d 	 = $reg->FONDEPES;
							$e 	 = $reg->PARTICULAR;
							$f 	 = $reg->OTRO;

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
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php $this->load->view('tabulados/comunidad/includes/text_view.php'); ?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>