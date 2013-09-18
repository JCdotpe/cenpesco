<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
   <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4>PERÚ: PESCADORES POR LUGAR DE NACIMIENTO, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="48" style="text-align:center">Lugar de nacimiento</th>';																																														
						echo '</tr>';


						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';		
						foreach($dep->result() as $d){								
							echo '<th colspan="2" style="text-align:center">' . $d->DEPARTAMENTO . '</th>';																				
						}
						echo '</tr>';



						echo '<tr>';
						echo '<th></th>';										
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	

						foreach($dep->result() as $d){	
							echo '<th style="text-align:center">Abs</th>';										
							echo '<th style="text-align:center;color:green">%</th>';	
						}

						echo '</tr>';

						foreach($dep->result() as $d){	
							$t = null;
							foreach($dep->result() as $id){	
								$t += $deps[$d->CCDD][$id->CCDD];
							}

							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($t*100/$totald,2) . '%</d>';	

							$vertical = null;
							foreach($dep->result() as $xd){	
								echo '<td style="text-align:center">' . $deps[$d->CCDD][$xd->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($deps[$d->CCDD][$xd->CCDD]*100/$totald,2) . '%</td>';	
							}

							echo '</tr>';
						}


							echo '<tr>';
							echo '<th>Total</th>';										
							echo '<td style="text-align:center">' . $totald . '</td>';										
							echo '<td style="text-align:center;color:green">100%</d>';	

							foreach($dep->result() as $d){	
								echo '<td style="text-align:center">' . $tdeps[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tdeps[$d->CCDD]*100/$totald,2) . '%</td>';	
							}

							echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';
		?>
		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>
 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>