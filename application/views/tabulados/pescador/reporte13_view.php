<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
     <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: PESCADORES POR ACTIVIDAD QUE REALIZA LA CÓNYUGE O CONVIVIENTE, SEGÚN DEPARTAMENTO, 2013';

					echo '<table border="1" class="table table-hover table-condensed" id="tabul" name="tabul">';
						echo '<caption><h4>
										CUADRO N° '. $opcion .'
										<br><br>
										'. $c_title .'
						     </h4></caption>';

					echo '<thead>';
						echo '<tr>';
							echo '<th rowspan="3">Departamento</th>';					
							echo '<th rowspan="2"  colspan="2" style="text-align:center">Total</th>';																																																																																										
							echo '<th colspan="18" style="text-align:center">Actividad que realiza la cónyuge o conviviente</th>';
							echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';
						echo '<tr>';
							echo '<th colspan="2" style="text-align:center">Al cuidado del hogar</th>';										
							echo '<th colspan="2" style="text-align:center">Agrícola</th>';										
							echo '<th colspan="2" style="text-align:center">Pecuaria</th>';											
							echo '<th colspan="2" style="text-align:center">Acuícola</th>';											
							echo '<th colspan="2" style="text-align:center">Pesca</th>';											
							echo '<th colspan="2" style="text-align:center">Caza</th>';											
							echo '<th colspan="2" style="text-align:center">Construcción</th>';											
							echo '<th colspan="2" style="text-align:center">Comercio</th>';											
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
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$tt = 0;
						$x = 0; $y = 0;
						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $vt[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . ( ($vt[$d->CCDD]>0) ? 100 : 0 ) . '</td>';	

							for($i=1; $i<=10;$i++){

								$a = (isset($vr[$d->CCDD][$i])) ? $vr[$d->CCDD][$i] : 0;
								$serie[$x][$y] = $ap = ($vt[$d->CCDD]!=0) ? round($a*100/$vt[$d->CCDD],2) : 0;
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . $ap . '</td>';
								$x++;																															
							}
							$x = 0; $y++;
							echo '</tr>';

						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100</td>';	

							for($i=1; $i<=10;$i++){
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
							array("name" => 'Al cuidado del hogar'	,"data" => $serie[0]),
							array("name" => 'Agrícola'				,"data" => $serie[1]),
							array("name" => 'Pecuaria'				,"data" => $serie[2]),
							array("name" => 'Acuícola'				,"data" => $serie[3]),
							array("name" => 'Pesca'					,"data" => $serie[4]),
							array("name" => 'Caza'					,"data" => $serie[5]),
							array("name" => 'Construcción'			,"data" => $serie[6]),
							array("name" => 'Comercio'				,"data" => $serie[7]),
							array("name" => 'Otro'					,"data" => $serie[8]),
							array("name" => 'NEP'					,"data" => $serie[9]),
							); 
			$data['tipo'] =  'column';// << column >> or << bar >> 
			$data['xx'] =  2030; // ancho
			$data['yy'] =  840; // altura
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