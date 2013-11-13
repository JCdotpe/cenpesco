<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: HIJOS DE PESCADORES POR SEXO, SEGÚN DEPARTAMENTO, 2013';

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
							echo '<th colspan="4" style="text-align:center">Sexo</th>';
							echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																														
						echo '</tr>';
						echo '<tr>';										
							echo '<th colspan="2" style="text-align:center">Hombre</th>';										
							echo '<th colspan="2" style="text-align:center">Mujer</th>';																					
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
						echo '</tr>';
						$aa = 0;
						$bb = 0;
						$tt = 0;
						foreach($dep->result() as $d){
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $td[$d->CCDD] . '</td>';									
							echo '<td style="text-align:center;color:green">' . ( ($td[$d->CCDD]>0) ? 100 : 0 ) . '</td>';	

								echo '<td style="text-align:center">' . $male[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_1[] = round($male[$d->CCDD]*100/$td[$d->CCDD],2) ) . '</td>';	

								echo '<td style="text-align:center">' . $female[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_2[] = round($female[$d->CCDD]*100/$td[$d->CCDD],2) ) . '</td>';

								echo '<td style="text-align:center">' . $NEP[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie_NEP[] = round($NEP[$d->CCDD]*100/$td[$d->CCDD],2) ) . '</td>';									
							echo '</tr>';

						}			

						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . ($ttt) . '</td>';										
						echo '<td style="text-align:center;color:green">100%</td>';	

								echo '<td style="text-align:center">' . $tm . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tm*100/$ttt,2) . '</td>';	

								echo '<td style="text-align:center">' . $tf . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tf*100/$ttt,2) . '</td>';

								echo '<td style="text-align:center">' . $tNEP . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tNEP*100/$ttt,2) . '</td>';			
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/pescador/includes/text_view.php'); 

			$series = array(
							array("name" => 'Hombre',"data" => $serie_1),
							array("name" => 'Mujer'	,"data" => $serie_2),
							array("name" => 'NEP'	,"data" => $serie_NEP),
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