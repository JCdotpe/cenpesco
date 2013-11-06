<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: PESCADORES POR SEXO, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="4" style="text-align:center">Sexo</th>';																																														
						echo '</tr>';
						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th colspan="2" style="text-align:center">Hombre</th>';										
						echo '<th colspan="2" style="text-align:center">Mujer</th>';											
						echo '</tr>';

						echo '<tr>';
						echo '<th></th>';										
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
							$a = (isset($h[$d->CCDD])) ? $h[$d->CCDD] : 0;
							$b = (isset($m[$d->CCDD])) ? $m[$d->CCDD] : 0;
							$t = $a + $b;

							$serie_1[] = $ap = ($t!=0) ? round($a*100/$t,2) : 0;
							$serie_2[] = $bp = ($t!=0) ? round($b*100/$t,2) : 0;
							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . $ap . '</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . $bp . '</td>';																																	
							echo '</tr>';
							$aa += $a;
							$bb += $b;
						}

						$tta = ($total!=0) ? round($aa*100/$total,2) : 0;
						$ttb = ($total!=0) ? round($bb*100/$total,2) : 0;
						echo '<tr>';
						echo '<td>Total</td>';										
						echo '<td style="text-align:center">' . $total . '</td>';										
						echo '<td style="text-align:center;color:green">100</td>';	
						echo '<td style="text-align:center">' . $aa . '</td>';										
						echo '<td style="text-align:center;color:green">' . $tta . '</td>';	
						echo '<td style="text-align:center">' . $bb . '</td>';										
						echo '<td style="text-align:center;color:green">' . $ttb . '</td>';																																
						echo '</tr>';

					echo '</thead>';
					echo '<tbody>';

					echo '</tbody>';
				echo '</table>';
		?>
		<?php 
			$this->load->view('tabulados/pescador/includes/text_view.php'); 

			$series = array(
							array("name" => 'Hombres'	,"data" => $serie_1),
							array("name" => 'Mujeres'	,"data" => $serie_2)	);
			$data['xx'] =  3550;
			$data['yy'] =  450;
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