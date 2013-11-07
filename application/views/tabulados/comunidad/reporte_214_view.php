<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR EXISTENCIA DE CONTAMINACIÓN AMBIENTAL, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="4" style="text-align:center">Existe contaminación ambiental</th>';	
						echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';

						echo '<tr>';
						echo '<th colspan="2" style="text-align:center">SI</th>';										
						echo '<th colspan="2" style="text-align:center">NO</th>';						
						
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
					echo '</thead>';

					echo '<tbody>';
						$tot_tot = 0;
						$tot_a = 0;
						$tot_b = 0;
						$tot_c = 0;
					
							
						// TOTALES
						foreach($tables->result() as $reg){
							$tot_tot += $reg->TOTAL;
							$tot_a += $reg->SI;
							$tot_b += $reg->NO;
							$tot_c += $reg->NEP;
						}
							echo '<tr>';
							echo '<td> TOTAL</td>';										
							echo '<td style="text-align:center">' . $tot_tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
							echo '<td style="text-align:center">' . $tot_a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_a*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_b*100/$tot_tot,2) . '</td>';
							echo '<td style="text-align:center">' . $tot_c. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_c*100/$tot_tot,2) . '</td>';	
							echo '</tr>';

						// DEPARTAMENTALES						
						foreach($tables->result() as $reg){
							//reiniciadores
							$dep = NULL;
							$tot = 0;
							$a = 0;
							$b = 0;
							$c = 0;

							$dep = $reg->DEPARTAMENTO;
							$tot = $reg->TOTAL;
							$serie_1[] = round(($a = $reg->SI)*100/$tot,2);
							$serie_2[] = round(($b = $reg->NO)*100/$tot,2);
							$serie_3[] = round(($c = $reg->NEP)*100/$tot,2);

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . round(100,2) . '</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($a*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($b*100/$tot,2) . '</td>';
							echo '<td style="text-align:center">' . $c. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($c*100/$tot,2) . '</td>';																																						
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';			
			
		?>
		<?php 
			$this->load->view('tabulados/comunidad/includes/text_view.php'); 

			$series = array(
							array("name" => 'SI'	,"data" => $serie_1),
							array("name" => 'NO'	,"data" => $serie_2),
							array("name" => 'NEP'	,"data" => $serie_3)	);
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