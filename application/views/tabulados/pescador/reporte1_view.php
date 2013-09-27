<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4>PERÚ: POBLACIÓN PESQUERA POR ACTIVIDAD, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed" id="tabul">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="6" style="text-align:center">Actividad</th>';																																														
						echo '</tr>';
						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th colspan="2" style="text-align:center">Pesca</th>';										
						echo '<th colspan="2" style="text-align:center">Acuicultura</th>';						
						echo '<th colspan="2" style="text-align:center">Pesca y Acuicultura</th>';						
						echo '</tr>';

						echo '<tr>';
						echo '<th></th>';										
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';																																	
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$cc = 0;
						$tt = 0;
						foreach($dep->result() as $d){
							$a = (isset($apesc[$d->CCDD])) ? $apesc[$d->CCDD] : 0;
							$b = (isset($aacu[$d->CCDD])) ? $aacu[$d->CCDD] : 0;
							$c = (isset($apc[$d->CCDD])) ? $apc[$d->CCDD] : 0;
							$t = $a + $b + $c;
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($t*100/$total,2) . '%</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($a*100/$total,2) . '%</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($b*100/$total,2) . '%</td>';	
							echo '<td style="text-align:center">' . $c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($c*100/$total,2). '%</td>';																																	
							echo '</tr>';
							$aa += $a;
							$bb += $b;
							$cc += $c;
						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100%</td>';	
						echo '<td style="text-align:center">' . $aa . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($aa*100/$total,2) . '%</td>';	
						echo '<td style="text-align:center">' . $bb . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($bb*100/$total,2) . '%</td>';	
						echo '<td style="text-align:center">' . $cc . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($cc*100/$total,2) . '%</td>';																																	
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
		<?php $this->load->view('tabulados/pescador/includes/text_view.php'); ?>

	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>