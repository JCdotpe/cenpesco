<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
 		<h4 style="text-align:center">CUADRO N° 200</h4>
    	<h4 style="text-align:center">PERÚ: COMUNIDADES POR LENGUA PREDOMINANTE, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th rowspan="3" style="vertical-align:middle">Departamento</th>';					
						echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
						echo '<th colspan="8" style="text-align:center">Lengua Predominante</th>';																																														
						echo '</tr>';

						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Castellano</th>';										
						echo '<th colspan="2" style="text-align:center">Quechua</th>';						
						echo '<th colspan="2" style="text-align:center">Aymara</th>';						
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
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';
						$tot_tot = 0;
						$tot_a = 0;
						$tot_b = 0;
						$tot_c = 0;
						$tot_d = 0;
						$dep = NULL;
						$tot = 0;
						$a = 0;
						$b = 0;
						$c = 0;
						$d = 0;						
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->CASTELLANO;
							$tot_b += $reg->QUECHUA;
							$tot_c += $reg->AYMARA;
							$tot_d += $reg->OTRO;							
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
							echo '<td style="text-align:center;color:green">' . round($tot_c*100/$tot_tot,2). '%</td>';
							echo '<td style="text-align:center">' . $tot_d . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_d*100/$tot_tot,2). '%</td>';																																						
							echo '</tr>';						
						foreach($tables->result() as $reg){
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$a = $reg->CASTELLANO;
							$b = $reg->QUECHUA;
							$c = $reg->AYMARA;
							$d = $reg->OTRO;

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($a*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($b*100/$tot_tot,2) . '%</td>';	
							echo '<td style="text-align:center">' . $c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($c*100/$tot_tot,2). '%</td>';	
							echo '<td style="text-align:center">' . $d . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($d*100/$tot_tot,2). '%</td>';																																						
							echo '</tr>';
							//reiniciadores
							$dep = NULL;
							$tot = 0;
							$a = 0;
							$b = 0;
							$c = 0;
							$d = 0;
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>