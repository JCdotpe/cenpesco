<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->


 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR INSTITUCIÓN U ORGANIZACIÓN QUE ADMINISTRA LA OFICINA ADMINISTRATIVA DEL PUNTO DE DESEMBARQUE, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="12" style="text-align:center">Institución u organización que administra la oficina administrativa del punto de desembarque</th>';
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';
									
						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">Organización Social de Pescadores Artesanales (OSPA)</th>';										
						echo '<th colspan="2" style="text-align:center">Dirección Regional de Producción (DIREPRO)</th>';						
						echo '<th colspan="2" style="text-align:center">Ministerio de la Producción (PRODUCE)</th>';						
						echo '<th colspan="2" style="text-align:center">Fondo Nacional de Desarrollo Pesquero (FONDEPES)</th>';						
						echo '<th colspan="2" style="text-align:center">Particular o privada</th>';						
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

						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->OSPA;
							$tot_b += $reg->DIREPRO;
							$tot_c += $reg->PRODUCE;
							$tot_d += $reg->FONDEPES;
							$tot_e += $reg->PARTICULAR;
							$tot_f += $reg->OTRO;
							$tot_g += $reg->NEP;
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
							echo '</tr>';	
						//deps					
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
												
							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->OSPA)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_2[] = round(($b = $reg->DIREPRO)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_3[] = round(($c = $reg->PRODUCE)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_4[] = round(($d = $reg->FONDEPES)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_5[] = round(($e = $reg->PARTICULAR)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_6[] = round(($f = $reg->OTRO)*100/( ($tot>0) ? $tot : 1 ),2 );
							$serie_7[] = round(($g = $reg->NEP)*100/( ($tot>0) ? $tot : 1 ),2 );

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
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad/includes/text_view.php'); 

			$series = array(
							array("name" => 'OSPA'				,"data" => $serie_1),
							array("name" => 'DIREPRO'			,"data" => $serie_2),
							array("name" => 'PRODUCE'			,"data" => $serie_3),
							array("name" => 'FONDEPES'			,"data" => $serie_4),
							array("name" => 'PARTICULAR'		,"data" => $serie_5),
							array("name" => 'OTRO'				,"data" => $serie_6),
							array("name" => 'NEP'				,"data" => $serie_7)	);
			$data['tipo'] =  'column';// << column >> or << bar >> 
			$data['xx'] =  2030; // ancho
			$data['yy'] =  840; // altura
			$data['series'] =  $series;
			$data['c_title'] = $c_title;
			$this->load->view('tabulados/comunidad/includes/grafico_view.php', $data); 

			echo form_close(); 
		?>

		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>