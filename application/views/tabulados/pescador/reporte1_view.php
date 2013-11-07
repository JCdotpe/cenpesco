<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4></h4>
    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: POBLACIÓN PESQUERA POR ACTIVIDAD, SEGÚN DEPARTAMENTO, 2013';

					echo '<table border="1" class="table table-hover table-condensed" id="tabul" name="tabul">';
						echo '<caption><h4>
										CUADRO N° '. $opcion .'
										<br><br>
										'. $c_title .'
						     </h4></caption>';

					echo '<thead>';
						echo '<tr>';
						echo '<th>Departamento</th>';					
						echo '<th colspan="2" style="text-align:center">Total</th>';																																																																																										
						echo '<th colspan="6" style="text-align:center">Actividad</th>';
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																														
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
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';																																
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$cc = 0;
						$nn = 0;
						$tt = 0;
						foreach($dep->result() as $d){
							$a = (isset($apesc[$d->CCDD])) ? $apesc[$d->CCDD] : 0;
							$b = (isset($aacu[$d->CCDD])) ? $aacu[$d->CCDD] : 0;
							$c = (isset($apc[$d->CCDD])) ? $apc[$d->CCDD] : 0;
							$n = (isset($NEP[$d->CCDD])) ? $NEP[$d->CCDD] : 0;
							$t = $a + $b + $c +$n;
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . $serie_1[] = ( ($t>0) ? round($a*100/$t,2) : 0 ) ; echo  '</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . $serie_2[] = ( ($t>0) ? round($b*100/$t,2) : 0 ) ; echo '</td>';	
							echo '<td style="text-align:center">' . $c . '</td>';										
							echo '<td style="text-align:center;color:green">' . $serie_3[] = ( ($t>0) ? round($c*100/$t,2) : 0 ) ; echo '</td>';
							echo '<td style="text-align:center">' . $n . '</td>';										
							echo '<td style="text-align:center;color:green">' . $serie_4[] = ( ($t>0) ? round($n*100/$t,2) : 0 ) ; echo '</td>';																																								
							echo '</tr>';
							$aa += $a;
							$bb += $b;
							$cc += $c;
							$nn += $n;
						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100%</td>';	
						echo '<td style="text-align:center">' . $aa . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($aa*100/$total,2) . '</td>';	
						echo '<td style="text-align:center">' . $bb . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($bb*100/$total,2) . '</td>';	
						echo '<td style="text-align:center">' . $cc . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($cc*100/$total,2) . '</td>';		
						echo '<td style="text-align:center">' . $nn . '</td>';										
						echo '<td style="text-align:center;color:green">' . round($nn*100/$total,2) . '</td>';																																
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';
		?>
		<?php 
			$this->load->view('tabulados/pescador/includes/text_view.php'); 

			$series = array(
							array("name" => 'Pesca'					,"data" => $serie_1),
							array("name" => 'Acuicultura'			,"data" => $serie_2),
							array("name" => 'Pesca y Acuicultura'	,"data" => $serie_3),
							array("name" => 'NEP'					,"data" => $serie_4)	);
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
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>