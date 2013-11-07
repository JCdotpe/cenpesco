<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
   <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">

    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: PESCADORES POR LUGAR DE NACIMIENTO, SEGÚN DEPARTAMENTO, 2013';

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
						echo '<th colspan="48" style="text-align:center">Lugar de nacimiento</th>';																																														
						echo '</tr>';


						echo '<tr>';
						echo '<th></th>';										
						echo '<th></th>';										
						echo '<th></th>';		
						foreach($dep->result() as $d){								
							echo '<th colspan="2" style="text-align:center">' . $d->DEPARTAMENTO . '</th>';																				
						}
						echo '</tr>';

						echo '<tr>';
						echo '<th></th>';										
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						foreach($dep->result() as $d){	
							echo '<th style="text-align:center">Abs</th>';										
							echo '<th style="text-align:center;color:green">%</th>';	
						}

						echo '</tr>';
						$x = 0; $y = 0;
						foreach($dep->result() as $d){	
							$t = null;
							foreach($dep->result() as $id){	
								$t += $deps[$d->CCDD][$id->CCDD];
							}

							echo '<tr>';
							echo '<td>' . $d->DEPARTAMENTO . '</td>';										
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</d>';	

							$vertical = null;
							foreach($dep->result() as $xd){	
								echo '<td style="text-align:center">' . $deps[$d->CCDD][$xd->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . ( $serie[$y][$x] = round($deps[$d->CCDD][$xd->CCDD]*100/$t,2) ). '</td>';	
								$y++;
							}
							echo '</tr>';
							$x++; $y = 0;
						}
							echo '<tr>';
							echo '<th>Total</th>';										
							echo '<td style="text-align:center">' . $totald . '</td>';										
							echo '<td style="text-align:center;color:green">100</d>';	

							foreach($dep->result() as $d){	
								echo '<td style="text-align:center">' . $tdeps[$d->CCDD] . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tdeps[$d->CCDD]*100/$totald,2) . '%</td>';	
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
							array("name" => 'Amazonas'		,"data" => $serie[0]),
							array("name" => 'Ancash'		,"data" => $serie[1]),
							array("name" => 'Apurimac'		,"data" => $serie[2]),
							array("name" => 'Arequipa'		,"data" => $serie[3]),
							array("name" => 'Ayacucho'		,"data" => $serie[4]),
							array("name" => 'Cajamarca'		,"data" => $serie[5]),
							array("name" => 'Cusco'			,"data" => $serie[6]),
							array("name" => 'Huancavelica'	,"data" => $serie[7]),
							array("name" => 'Huanuco'		,"data" => $serie[8]),
							array("name" => 'Ica'			,"data" => $serie[9]),
							array("name" => 'Junin'			,"data" => $serie[10]),
							array("name" => 'La Libertad'	,"data" => $serie[11]),
							array("name" => 'Lambayeque'	,"data" => $serie[12]),
							array("name" => 'Lima'			,"data" => $serie[13]),
							array("name" => 'Loreto'		,"data" => $serie[14]),
							array("name" => 'Madre de Dios'	,"data" => $serie[15]),
							array("name" => 'Moquegua'		,"data" => $serie[16]),
							array("name" => 'Pasco'			,"data" => $serie[17]),
							array("name" => 'Piura'			,"data" => $serie[18]),
							array("name" => 'Puno'			,"data" => $serie[19]),
							array("name" => 'San Martin'	,"data" => $serie[20]),
							array("name" => 'Tacna'			,"data" => $serie[21]),
							array("name" => 'Tumbes'		,"data" => $serie[22]),
							array("name" => 'Ucayali'		,"data" => $serie[23]),
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
</div>
 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>