<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: PESCADORES POR MATERIAL DE CONSTRUCCIÓN PREDOMINANTE EN LOS TECHOS DE LA VIVIENDA, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="16" style="text-align:center">Material predominante en los techos de la vivienda</th>';
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';
						echo '<tr>';									
						echo '<th colspan="2" style="text-align:center">Concreto armado</th>';										
						echo '<th colspan="2" style="text-align:center">Madera</th>';											
						echo '<th colspan="2" style="text-align:center">Tejas</th>';											
						echo '<th colspan="2" style="text-align:center">Planchas de calamina, fibra de cemento o similares</th>';											
						echo '<th colspan="2" style="text-align:center">Caña o estera con torta de barro</th>';											
						echo '<th colspan="2" style="text-align:center">Estera</th>';											
						echo '<th colspan="2" style="text-align:center">Paja, hojas de palmera, etc.</th>';																																										
						echo '<th colspan="2" style="text-align:center">Otro material</th>';																					
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
						$x = 0; $y = 0;
						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $vt[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . ( ($vt[$d->CCDD]>0) ? 100 : 0 ) . '</td>';	

							for($i=1; $i<=9;$i++){

								$a = (isset($vr[$d->CCDD][$i])) ? $vr[$d->CCDD][$i] : 0;
								$serie[$x][$y] = $ap = ($total!=0) ? round($a*100/$vt[$d->CCDD],2) : 0;
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
							array("name" => 'Concreto armado'										,"data" => $serie[0]),
							array("name" => 'Madera'												,"data" => $serie[1]),
							array("name" => 'Tejas'													,"data" => $serie[2]),
							array("name" => 'Planchas de calamina, fibra de cemento o similares'	,"data" => $serie[3]),
							array("name" => 'Caña o estera con torta de barro'						,"data" => $serie[4]),
							array("name" => 'Estera'												,"data" => $serie[5]),
							array("name" => 'Paja, hojas de palmera, etc.'							,"data" => $serie[6]),
							array("name" => 'Otro material'											,"data" => $serie[7]),
							array("name" => 'NEP'													,"data" => $serie[8]),
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