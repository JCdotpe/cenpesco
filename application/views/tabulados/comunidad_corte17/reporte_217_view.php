<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad_corte17/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR CONOCIMIENTO DE LAS CONSECUENCIAS DE LA CONTAMINACIÓN AMBIENTAL QUE EXISTE, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="14" style="text-align:center">Origen de la contaminación ambiental</th>';
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																															
						echo '</tr>';
				
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Deforestación</th>';										
						echo '<th colspan="2" style="text-align:center">Enfermedades</th>';						
						echo '<th colspan="2" style="text-align:center">Mortandad de peces</th>';						
						echo '<th colspan="2" style="text-align:center">Alejamiento de animales</th>';						
						echo '<th colspan="2" style="text-align:center">Pérdida de biodiversidad</th>';						
						echo '<th colspan="2" style="text-align:center">Alteración del ecosistema acuático</th>';						
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
				
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->DEFORESTACION;
							$tot_b += $reg->ENFERMEDADES;
							$tot_c += $reg->MORTANDAD;
							$tot_d += $reg->ALEJAMIENTO;
							$tot_e += $reg->PERDIDA;
							$tot_f += $reg->ALTERACION;
							$tot_g += $reg->OTRO;
							$tot_h += $reg->NEP;
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
							echo '</tr>';		
						//DEPS				
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
											
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->DEFORESTACION)*100/$tot,2);
							$serie_2[] = round(($b = $reg->ENFERMEDADES)*100/$tot,2);
							$serie_3[] = round(($c = $reg->MORTANDAD)*100/$tot,2);
							$serie_4[] = round(($d = $reg->ALEJAMIENTO)*100/$tot,2);
							$serie_5[] = round(($e = $reg->PERDIDA)*100/$tot,2);
							$serie_6[] = round(($f = $reg->ALTERACION)*100/$tot,2);
							$serie_7[] = round(($g = $reg->OTRO)*100/$tot,2);
							$serie_8[] = round(($h = $reg->NEP)*100/$tot,2);							

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . round(100,2) . '</td>';	
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
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad_corte17/includes/text_view.php'); 

			$series = array(
							array("name" => 'DEFORESTACION'	,"data" => $serie_1),
							array("name" => 'ENFERMEDADES'	,"data" => $serie_2),
							array("name" => 'MORTANDAD'		,"data" => $serie_3),
							array("name" => 'ALEJAMIENTO'	,"data" => $serie_4),
							array("name" => 'PERDIDA'		,"data" => $serie_5),
							array("name" => 'ALTERACION'	,"data" => $serie_6),
							array("name" => 'OTRO'			,"data" => $serie_7),
							array("name" => 'NEP'			,"data" => $serie_8)	);
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