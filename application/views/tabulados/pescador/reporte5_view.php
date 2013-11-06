<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4></h4>
    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: PESCADORES POR NIVEL DE ESTUDIOS ALCANZADO, SEGÚN DEPARTAMENTO, 2013';

					echo '<table border="1" class="table table-hover table-condensed" id="tabul" name="tabul">';
						echo '<caption><h4>
										CUADRO N° '. $opcion .'
										<br><br>
										'. $c_title .'
						     </h4></caption>';

					echo '<thead>';
						echo '<tr>';
						echo '<th rowspan="3">Departamento</th>';					
						echo '<th rowspan="2" colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="16" style="text-align:center">Nivel de estudios alcanzado</th>';	
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';
						echo '<tr>';
												
						echo '<th colspan="2" style="text-align:center">Sin Nivel</th>';										
						echo '<th colspan="2" style="text-align:center">Inicial</th>';											
						echo '<th colspan="2" style="text-align:center">Primaria</th>';											
						echo '<th colspan="2" style="text-align:center">Secundaria</th>';											
						echo '<th colspan="2" style="text-align:center">Superior no universitaria incompleta</th>';											
						echo '<th colspan="2" style="text-align:center">Superior no universitaria completa</th>';											
						echo '<th colspan="2" style="text-align:center">Superior universitaria incompleta</th>';											
						echo '<th colspan="2" style="text-align:center">Superior universitaria completa</th>';											
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
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$tt = 0;
						$x  = 0; $y = 0;
						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $vt[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	

							for($i=1; $i<=9;$i++){
								$a = (isset($vr[$d->CCDD][$i])) ? $vr[$d->CCDD][$i] : 0;
								$serie[$x][$y] = $ap = ($vt[$d->CCDD]!=0) ? round($a*100/$vt[$d->CCDD],2) : 0;
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . $ap . '</td>';	
								$x++;																															
							}
							echo '</tr>';
							$y++; $x = 0;
						}			
						//totales
						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100</td>';	
							for($i=1; $i<=9;$i++){
								$a = (isset($tr[$i])) ? $tr[$i] : 0;
								$ap = ($total!=0) ? round($a*100/$total,2) : 0;
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . $ap . '</td>';																														
							}
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/pescador/includes/text_view.php'); 

			$series = array(
							array("name" => 'Sin Nivel'						,"data" => $serie[0]),
							array("name" => 'Inicial'						,"data" => $serie[1]),
							array("name" => 'Primaria'						,"data" => $serie[2]),
							array("name" => 'Secundaria'					,"data" => $serie[3]),
							array("name" => 'Superior no universitaria i.'	,"data" => $serie[4]),
							array("name" => 'Superior no universitaria c.'	,"data" => $serie[5]),
							array("name" => 'Superior universitaria i.'		,"data" => $serie[6]),
							array("name" => 'Superior universitaria c.'		,"data" => $serie[7]),
							array("name" => 'NEP'							,"data" => $serie[8]),
							); 
			$data['tipo'] =  'column';// << column >> or << bar >> 
			$data['xx'] =  6300;
			$data['yy'] =  700;
			$data['series'] =  $series;
			$data['c_title'] = $c_title;
			$this->load->view('tabulados/pescador/includes/grafico_view.php', $data); 

			echo form_close(); 
		?>

		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
	<?php //print_r($dep); ?>
</div>
 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>