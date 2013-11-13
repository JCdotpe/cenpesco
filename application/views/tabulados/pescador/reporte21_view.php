<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: HIJOS DE PESCADORES POR NIVEL DE ESTUDIOS ALCANZADO, SEGÚN DEPARTAMENTO, 2013';

					echo '<table border="1" class="table table-hover table-condensed" id="tabul" name="tabul">';
						echo '<caption><h4>
										CUADRO N° '. $opcion .'
										<br><br>
										'. $c_title .'
						     </h4></caption>';

					echo '<thead>';
						echo '<tr>';
						echo '<th  rowspan="3">Departamento</th>';					
						echo '<th  rowspan="2" colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="20" style="text-align:center">Nivel de estudios alcanzado</th>';	
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																												
						echo '</tr>';
						echo '<tr>';									
						echo '<th colspan="2" style="text-align:center">Sin nivel</th>';										
						echo '<th colspan="2" style="text-align:center">Inicial</th>';																					
						echo '<th colspan="2" style="text-align:center">Primaria incompleta</th>';																					
						echo '<th colspan="2" style="text-align:center">Primaria completa</th>';																					
						echo '<th colspan="2" style="text-align:center">Secundaria incompleta</th>';																					
						echo '<th colspan="2" style="text-align:center">Secundaria completa</th>';																					
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
							echo '<th style="text-align:center">Abs</th>';																															
							echo '<th style="text-align:center;color:green">%</th>';
							echo '<th style="text-align:center">Abs</th>';																															
							echo '<th style="text-align:center;color:green">%</th>';																									
						echo '</tr>';

						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $td[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . ( ($td[$d->CCDD]>0) ? 100 : 0 ) . '</td>';	

								echo '<td style="text-align:center">' . $e1[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_1[] = round($e1[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';	

								echo '<td style="text-align:center">' . $e2[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_2[] = round($e2[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';		

								echo '<td style="text-align:center">' . $e3[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_3[] = round($e3[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';	

								echo '<td style="text-align:center">' . $e4[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_4[] = round($e4[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';		

								echo '<td style="text-align:center">' . $e5[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_5[] = round($e5[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';	

								echo '<td style="text-align:center">' . $e6[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_6[] = round($e6[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';

								echo '<td style="text-align:center">' . $e7[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_7[] = round($e7[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';	

								echo '<td style="text-align:center">' . $e8[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_8[] = round($e8[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';		

								echo '<td style="text-align:center">' . $e9[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_9[] = round($e9[$d->CCDD]*100/$td[$d->CCDD],2) ). '</td>';	

								echo '<td style="text-align:center">' . $e10[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_10[] = round($e10[$d->CCDD]*100/$td[$d->CCDD],2) ) . '</td>';	

								echo '<td style="text-align:center">' . $eNEP[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_NEP[] = round($eNEP[$d->CCDD]*100/$td[$d->CCDD],2) ) . '</td>';																																		
							echo '</tr>';

						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . ($ttt) . '</td>';										
						echo '<td style="text-align:center;color:green">100</td>';	

								echo '<td style="text-align:center">' . $te1 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te1*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te2 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te2*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te3 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te3*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te4 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te4*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te5 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te5*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te6 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te6*100/$ttt,2) . '</td>';

								echo '<td style="text-align:center">' . $te7 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te7*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te8 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te8*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te9 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te9*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $te10 . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($te10*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $teNEP . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($teNEP*100/$ttt,2) . '</td>';																																				
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/pescador/includes/text_view.php'); 

			$series = array(
							array("name" => 'Sin Nivel'					,"data" => $serie_1),
							array("name" => 'Inicial'					,"data" => $serie_2),
							array("name" => 'Primaria I.'				,"data" => $serie_3),
							array("name" => 'Primaria C.'				,"data" => $serie_4),
							array("name" => 'Secundaria I.'				,"data" => $serie_5),
							array("name" => 'Secundaria C.'				,"data" => $serie_6),
							array("name" => 'S. No Universitaria I.'	,"data" => $serie_7),
							array("name" => 'S. No Universitaria C.'	,"data" => $serie_8),
							array("name" => 'S. Universitaria I.'		,"data" => $serie_9),
							array("name" => 'S. Universitaria C.'		,"data" => $serie_10),
							array("name" => 'NEP'						,"data" => $serie_NEP),
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