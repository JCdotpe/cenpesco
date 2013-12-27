<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">

<?php $this->load->view('tabulados/includes/sidebar_view'); ?> <!-- SIDE BAR -->
<div class="row-fluid">


 	<div class="span12" id="ap-content">

		<?php $this->load->view('tabulados/includes/tabs_view.php');?> <!--include tabs y logos	-->
		
		<div class="tab-content" style="clear:both">
		  	<div class="tab-pane active" id="tabulado">
				<!-- INICIO TABULADO -->
		    	<?php
			    		echo form_open("/tabulados/export");
			    			$c_title = 'PERÚ: PESCADORES POR TIPO DE ABASTECIMIENTO DE AGUA EN LA VIVIENDA, SEGÚN DEPARTAMENTO, 2013';

							$this->load->view('tabulados/includes/tab_logo_view.php');

								echo '<div class="row-fluid" style="overflow:auto;"><table border="1" class="table table-striped box-header" id="tabul" >';
								echo '<caption><h3>
												CUADRO N° '. sprintf("%02d",$opcion) .'
												<br><strong>
												'. $c_title  .' </strong>
								     </h3></caption>';

							echo '<thead>';
								echo '<tr>';
								echo '<th rowspan="3" style="vertical-align:middle">Departamento</th>';					
								echo '<th rowspan="2" colspan="2" style="text-align:center">Total</th>';																																																																																										
								echo '<th colspan="16" style="text-align:center">Tipo de abastecimiento de agua en la vivienda</th>';
								echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">No especificado</th>';																																														
								echo '</tr>';
								echo '<tr>';									
								echo '<th colspan="2" style="text-align:center">Red pública dentro de la vivienda (agua potable)</th>';										
								echo '<th colspan="2" style="text-align:center">Red pública fuera de la vivienda, pero dentro de la edificación (agua potable)</th>';											
								echo '<th colspan="2" style="text-align:center">Pilón de uso público (agua potable)</th>';											
								echo '<th colspan="2" style="text-align:center">Camión cisterna u otra similar</th>';											
								echo '<th colspan="2" style="text-align:center">Pozo</th>';											
								echo '<th colspan="2" style="text-align:center">Rio, acequia, manantial, ojo de agua o similar</th>';																																										
								echo '<th colspan="2" style="text-align:center">Vecino</th>';																					
								echo '<th colspan="2" style="text-align:center">Otro</th>';																					
								echo '</tr>';

								echo '<tr>';
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';	
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';	
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';	
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';	
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';																																														
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';	
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';																			
								echo '</tr>';
							echo '</thead>';
							echo '<tbody>';								
								$aa = 0;
								$bb = 0;
								$tt = 0;
								$x = 0; $y = 0;
								foreach($dep->result() as $d){
									echo '<tr>';
									echo '<td>' . $d->DEPARTAMENTO . '</td>';										
									echo '<td style="text-align:center">' . number_format($vt[$d->CCDD],0,',',' ') . '</td>';									
									echo '<td style="text-align:center;">' . number_format( ( ($vt[$d->CCDD]>0) ? 100 : 0 ),1,',',' ') . '</td>';	

									for($i=1; $i<=9;$i++){

										$a = (isset($vr[$d->CCDD][$i])) ? $vr[$d->CCDD][$i] : 0;
										$serie[$x][$y] = $ap = ($total!=0) ? round($a*100/$vt[$d->CCDD],1) : 0;
										echo '<td style="text-align:center">' . number_format($a,0,',',' ') . '</td>';										
										echo '<td style="text-align:center">' . number_format($ap,1,',',' ') . '</td>';	
										$x++;																															
									}
									echo '</tr>';
									$x = 0; $y++;
								}			

								echo '<tr>';
								echo '<td>Total</td>';										
								echo '<td style="text-align:center">' . number_format($total,0,',',' ') . '</td>';										
								echo '<td style="text-align:center;">100,0</td>';	

									for($i=1; $i<=9;$i++){
										$a = (isset($tr[$i])) ? $tr[$i] : 0;
										$ap = ($total!=0) ? round($a*100/$total,1) : 0;
										echo '<td style="text-align:center">' . number_format($a,0,',',' ') . '</td>';										
										echo '<td style="text-align:center">' . number_format($ap,1,',',' ') . '</td>';																														
									}

								echo '</tr>';

							echo '</tbody>';
						echo '</table></div>';

					

					$series = array(
									array("name" => 'Red pública dentro de la vivienda (agua potable)'								,"data" => $serie[0]),
									array("name" => 'Red pública fuera de la vivienda, pero dentro de la edificación (agua potable)',"data" => $serie[1]),
									array("name" => 'Pilón de uso público (agua potable)'											,"data" => $serie[2]),
									array("name" => 'Camión cisterna u otra similar'												,"data" => $serie[3]),
									array("name" => 'Pozo'																			,"data" => $serie[4]),
									array("name" => 'Rio, acequia, manantial, ojo de agua o similar'								,"data" => $serie[5]),
									array("name" => 'Vecino'																		,"data" => $serie[6]),
									array("name" => 'Otro'																			,"data" => $serie[7]),
									array("name" => 'No especificado'																			,"data" => $serie[8]),
									); 
					$data['tipo'] =  'column';// << column >> or << bar >> 
					$data['xx'] =  2030; // ancho
					$data['yy'] =  840; // altura
					$data['series'] =  $series;
					$data['c_title'] = $c_title;
					$this->load->view('tabulados/includes/text_view.php');  

					$this->load->view('tabulados/includes/metadata_view.php', $data); 

					echo form_close(); 
				?>

		  		<!-- FIN TABULADO -->
		  	</div>
		  
			<div class="tab-pane" id="grafico">
				  	<!-- INICIO GRAFICO -->
							<?php 
								$this->load->view('tabulados/includes/grafico_view.php', $data); 
							?>
							<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
				  	<!-- FIN GRAFICO -->
			</div>

			<div class="tab-pane" id="mapa">
				  	<!-- INICIO MAPA -->
				  			<?php  
				  				$this->load->view('tabulados/includes/mapa_view.php', $data); ?>
				  	<!-- FIN MAPA -->
			</div>

		</div>

	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>

