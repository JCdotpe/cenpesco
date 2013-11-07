<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad_corte17/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES QUE SU POBLACIÓN RECIBIÓ CAPACITACIÓN, POR CURSOS O TEMAS RECIBIDOS, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="24" style="text-align:center">Cursos o temas recibidos</th>';
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																														
						echo '</tr>';
															
						echo '<tr>';																							
						echo '<th colspan="2" style="text-align:center">Pesca sostenible</th>';										
						echo '<th colspan="2" style="text-align:center">Normatividad</th>';						
						echo '<th colspan="2" style="text-align:center">Normas sanitarias</th>';						
						echo '<th colspan="2" style="text-align:center">Tecnología</th>';						
						echo '<th colspan="2" style="text-align:center">Manejo ambiental</th>';						
						echo '<th colspan="2" style="text-align:center">Programas de producción y/o alimentación</th>';						
						echo '<th colspan="2" style="text-align:center">Manejo de residuos sólidos</th>';						
						echo '<th colspan="2" style="text-align:center">Formalización</th>';						
						echo '<th colspan="2" style="text-align:center">Comercialización</th>';						
						echo '<th colspan="2" style="text-align:center">Gestión empresarial</th>';						
						echo '<th colspan="2" style="text-align:center">Biocomercio, comercio justo, acuicultura orgánica</th>';						
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
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';							
						echo '</tr>';
					echo '</thead>';

					echo '<tbody>';
					// variable
						$tot_tot = 0;
						$tot_a = 0;
						$tot_b = 0;
						$tot_c = 0;
						$tot_d = 0;
						$tot_e = 0;
						$tot_f = 0;
						$tot_g = 0;
						$tot_h = 0;
						$tot_i = 0;
						$tot_j = 0;
						$tot_k = 0;
						$tot_l = 0;
						$tot_m = 0;				
					//	
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->P_SOSTENIBLE;
							$tot_b += $reg->NORMATIVIDAD;
							$tot_c += $reg->N_SANITARIAS;
							$tot_d += $reg->TECNOLOGIA;
							$tot_e += $reg->M_AMBIENTAL;
							$tot_f += $reg->P_PRODUCCION;
							$tot_g += $reg->M_RESIDUOS;
							$tot_h += $reg->FORMALIZACION;
							$tot_i += $reg->COMERCIALIZACION;
							$tot_j += $reg->G_EMPRESARIAL;
							$tot_k += $reg->BIOCOMERCIO;
							$tot_l += $reg->OTRO;
							$tot_m += $reg->NEP;
						}
							echo '<tr>';
								echo '<td> TOTAL</td>';										
								echo '<td style="text-align:center">' . $tot_tot . '</td>';										
								echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
								echo '<td style="text-align:center">' . $tot_a . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_a*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_b. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_b*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_c . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_c*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_d. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_d*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_e . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_e*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_f. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_f*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_g . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_g*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_h. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_h*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_i. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_i*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_j . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_j*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_k. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_k*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_l . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_l*100/$tot_tot,2) : 0 ). '</td>';	
								echo '<td style="text-align:center">' . $tot_m. '</td>';										
								echo '<td style="text-align:center;color:green">' . ( ($tot_tot>0) ? round($tot_m*100/$tot_tot,2) : 0 ). '</td>';																										
							echo '</tr>';	

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
							$i = 0;
							$j = 0;
							$k = 0;
							$l = 0;
							$m = 0;		
													
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->P_SOSTENIBLE)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_2[] = round(($b = $reg->NORMATIVIDAD)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_3[] = round(($c = $reg->N_SANITARIAS)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_4[] = round(($d = $reg->TECNOLOGIA)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_5[] = round(($e = $reg->M_AMBIENTAL)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_6[] = round(($f = $reg->P_PRODUCCION)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_7[] = round(($g = $reg->M_RESIDUOS)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_8[] = round(($h = $reg->FORMALIZACION)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_9[] = round(($i = $reg->COMERCIALIZACION)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_10[] = round(($j   = $reg->G_EMPRESARIAL)*100/( ($tot>0) ? $tot : 1 ),2);
							$serie_11[] = round(($k   = $reg->BIOCOMERCIO)*100/( ($tot>0) ? $tot : 1 ),2);
							$serie_12[] = round(($l   = $reg->OTRO)*100/( ($tot>0) ? $tot : 1 ),2);	
							$serie_13[] = round(($m   = $reg->NEP)*100/( ($tot>0) ? $tot : 1 ),2);	

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? 100 : 0 ) .'</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($a*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($b*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $c . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($c*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $d. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($d*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $e . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($e*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $f. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($f*100/$tot,2) : 0 ) . '</td>';		
							echo '<td style="text-align:center">' . $g . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($g*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $h. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($h*100/$tot,2) : 0 ) . '</td>';
							echo '<td style="text-align:center">' . $i. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($i*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $j . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($j*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $k. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($k*100/$tot,2) : 0 ) . '</td>';		
							echo '<td style="text-align:center">' . $l . '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($l*100/$tot,2) : 0 ) . '</td>';	
							echo '<td style="text-align:center">' . $m. '</td>';										
							echo '<td style="text-align:center;color:green">' . ( ($tot>0) ? round($m*100/$tot,2) : 0 ) . '</td>';																																																																
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad_corte17/includes/text_view.php'); 

			$series = array(
							array("name" => 'P. sostenible'		,"data" => $serie_1),
							array("name" => 'Normatividad'		,"data" => $serie_2),
							array("name" => 'N. sanitarias'		,"data" => $serie_3),
							array("name" => 'Tecnología'		,"data" => $serie_4),
							array("name" => 'M. ambiental'		,"data" => $serie_5),
							array("name" => 'P. producción'		,"data" => $serie_6),
							array("name" => 'M. residuos'		,"data" => $serie_7),
							array("name" => 'Formalización'		,"data" => $serie_8),
							array("name" => 'Comercialización'	,"data" => $serie_9),
							array("name" => 'G. empresarial'	,"data" => $serie_10),
							array("name" => 'Biocomercio'		,"data" => $serie_11),
							array("name" => 'Otro'				,"data" => $serie_12),
							array("name" => 'NEP'				,"data" => $serie_13)	);
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