<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4>PERÚ: PESCADORES POR SEXO, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed" id="tabul">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="4" style="text-align:center">Sexo</th>';																																														
						echo '</tr>';
						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th colspan="2" style="text-align:center">Hombre</th>';										
						echo '<th colspan="2" style="text-align:center">Mujer</th>';											
						echo '</tr>';

						echo '<tr>';
						echo '<th></th>';										
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';																																		
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$tt = 0;
						foreach($dep->result() as $d){
							$a = (isset($h[$d->CCDD])) ? $h[$d->CCDD] : 0;
							$b = (isset($m[$d->CCDD])) ? $m[$d->CCDD] : 0;
							$t = $a + $b;

							$ap = ($t!=0) ? round($a*100/$total,2) : 0;
							$bp = ($t!=0) ? round($b*100/$total,2) : 0;
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($t*100/$total,2) . '%</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . $ap . '%</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . $bp . '%</td>';																																	
							echo '</tr>';
							$aa += $a;
							$bb += $b;
						}			

						$tta = ($t!=0) ? round($aa*100/$total,2) : 0;
						$ttb = ($t!=0) ? round($bb*100/$total,2) : 0;
						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100%</td>';	
						echo '<td style="text-align:center">' . $aa . '</td>';										
						echo '<td style="text-align:center;color:green">' . $tta . '%</td>';	
						echo '<td style="text-align:center">' . $bb . '</td>';										
						echo '<td style="text-align:center;color:green">' . $ttb . '%</td>';																																
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
		<?php $this->load->view('tabulados/pescador/includes/text_view.php'); ?>
	</div>
	<?php //print_r($dep); ?>
</div>
 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>