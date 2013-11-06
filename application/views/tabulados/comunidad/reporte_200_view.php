<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->

 	<div class="span10" id="ap-content">

 		<div class="row-fluid">
	 		<!-- <h4 style="text-align:center">CUADRO N° </h4>
	    	<h4 style="text-align:center"></h4> -->
	    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR LENGUA PREDOMINANTE, SEGÚN DEPARTAMENTO, 2013';

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
							echo '<th colspan="8" style="text-align:center">Lengua Predominante</th>';																																														
							echo '<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">NEP</th>';																																														
							echo '</tr>';

							echo '<tr>';
							echo '<th colspan="2" style="text-align:center">Castellano</th>';										
							echo '<th colspan="2" style="text-align:center">Quechua</th>';						
							echo '<th colspan="2" style="text-align:center">Aymara</th>';						
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
							echo '</tr>';
						echo '</thead>';

						echo '<tbody>';
							$tot_tot = 0;
							$tot_a = 0;
							$tot_b = 0;
							$tot_c = 0;
							$tot_d = 0;
							$tot_e = 0;
							$dep = NULL;
							$tot = 0;
							$a = 0;
							$b = 0;
							$c = 0;
							$d = 0;		
							$e = 0;		
							$serie_1 = array();				
							$serie_2 = array();				
							$serie_3 = array();				
							$serie_4 = array();				
							$serie_5 = array();				
							// TOTALES
							foreach($tables->result() as $reg){
								$tot_tot += $reg->TOTAL;
								$tot_a += $reg->CASTELLANO;
								$tot_b += $reg->QUECHUA;
								$tot_c += $reg->AYMARA;
								$tot_d += $reg->OTRO;							
								$tot_e += $reg->NEP;							
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
								echo '<td style="text-align:center;color:green">' . round($tot_c*100/$tot_tot,2). '</td>';
								echo '<td style="text-align:center">' . $tot_d . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tot_d*100/$tot_tot,2). '</td>';
								echo '<td style="text-align:center">' . $tot_e . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($tot_e*100/$tot_tot,2). '</td>';																																							
								echo '</tr>';						
							foreach($tables->result() as $reg){
								$dep = $reg->DEPARTAMENTO;
								$tot = $reg->TOTAL;
								$serie_1[] = round(($a = $reg->CASTELLANO)*100/$tot,2);
								$serie_2[] = round(($b = $reg->QUECHUA)*100/$tot,2);
								$serie_3[] = round(($c = $reg->AYMARA)*100/$tot,2);
								$serie_4[] = round(($d = $reg->OTRO)*100/$tot,2);
								$serie_5[] = round(($e = $reg->NEP)*100/$tot,2);

								echo '<tr>';
								echo '<td>' . $dep . '</td>';										
								echo '<td style="text-align:center">' . $tot . '</td>';										
								//echo '<td style="text-align:center;color:green">' . round($tot*100/$tot_tot,2) . '%</td>';	
								echo '<td style="text-align:center;color:green">' . round(100,2) . '</td>';	
								echo '<td style="text-align:center">' . $a . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($a*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $b. '</td>';										
								echo '<td style="text-align:center;color:green">' . round($b*100/$tot,2) . '</td>';	
								echo '<td style="text-align:center">' . $c . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($c*100/$tot,2). '</td>';	
								echo '<td style="text-align:center">' . $d . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($d*100/$tot,2). '</td>';		
								echo '<td style="text-align:center">' . $e . '</td>';										
								echo '<td style="text-align:center;color:green">' . round($e*100/$tot,2). '</td>';																																					
								echo '</tr>';
								//reiniciadores
								$dep = NULL;
								$tot = 0;
								$a = 0;
								$b = 0;
								$c = 0;
								$d = 0;
								$e = 0;
							}
						echo '</tbody>';
					echo '</table>'; //var_dump($serie_1);

				?>
		</div>
		<?php 
			$this->load->view('tabulados/comunidad/includes/text_view.php'); 

			$series = array(
				array("name" => 'Catellano'	,"data" => $serie_1),
				array("name" => 'Quechua'	,"data" => $serie_2),
				array("name" => 'Aymara'	,"data" => $serie_3),
				array("name" => 'Otro'		,"data" => $serie_4),
				array("name" => 'NEP'		,"data" => $serie_5),
				);

			//$serie1 =  array("name" => 'Catellano'	,"data" => $serie_1);
			// $serie2 =  array("name" => 'Quechua'	,"data" => $serie_2);
			// $serie3 =  array("name" => 'Aymara'		,"data" => $serie_3);
			// $serie4 =  array("name" => 'Otro'		,"data" => $serie_4);
			// $series =  array();
			// array_push($series , $serie1);
			// array_push($series , $serie2);
			// array_push($series , $serie3);
			// array_push($series , $serie4);
			//var_dump(json_encode($series) );
			//var_dump(json_encode($serie1) );
			$data['xx'] =  2500;
			$data['yy'] =  450;
			$data['series'] =  $series;
			$data['c_title'] = $c_title;

			$this->load->view('tabulados/comunidad/includes/grafico_view.php', $data); 
			echo form_close(); 
		?>

		<!-- *********************************
		              GRAFICO DE BARRAS	 
		     *********************************	-->		
<!-- 		<div class="row-fluid" style="overflow:auto;">
			
			    <div id="chart_div" style="width:160%;padding-top:20px;" ></div>

			    <script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
			    <script type="text/javascript" src="<?php echo base_url('js/highcharts/exporting.js'); ?>"></script>

			    <script type="text/javascript">
			      $(function () {

			        var chart;
			        //array_1 = JSON.parse(<?php echo json_encode($serie_1); ?>);
			        //array_1 = new Array(<?php echo json_encode($serie_1); ?>);
			        $(document).ready(function() {
			            chart = new Highcharts.Chart({
			                credits: {
			                    text: 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.'
			                },
			                chart: {
			                    renderTo: 'chart_div',
			                    type: 'column'
			                },
			                subtitle: {
			                    text: '<?php echo $c_title;?>'
			                },			                
			                title: {
			                    text: 'GRÁFICO N° '+ <?php echo $opcion; ?>
			                },
			                xAxis: {
			                    categories: [
			              			'Amazonas','Ancash','Apurimac','Arequipa','Ayacucho','Cajamarca','Cuzco','Huancavelica','Huanuco','Ica','Junin','La Libertad',
			              			'Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martin','Tacna','Tumbes', 'Ucayali'
			                    ]
			                },
			                yAxis: {
			                    min: 0,
			                    title: {
			                        text: 'Numero'
			                    }
			                },
			                legend: {
			                    layout: 'vertical',
			                    backgroundColor: '#FFFFFF',
			                    align: 'left',
			                    verticalAlign: 'top',
			                    x:100,
			                    y: 50,
			                    floating: true,
			                    shadow: false
			                },
			                tooltip: {
			                    formatter: function() {
			                        return ''+
			                            this.x +': '+ this.y;
			                    }
			                },
			                plotOptions: {
			                    column: {
			                        pointPadding: 0.1,
			                        borderWidth: 0
			                    }
			                },
			                
			                series: [
			              			{name: 'Castellano',data: [<?php echo join($serie_1,','); ?> ]},              
			              			{name: 'Quechua',data:[<?php echo join($serie_2,','); ?> ]},
			              			{name: 'Aymara',data: [<?php echo join($serie_3,','); ?> ]},        
			              			{name: 'Otro',data: [<?php echo join($serie_4,','); ?> ]},        
			              			{name: 'NEP',data: [<?php echo join($serie_5,','); ?> ]},        
			              			]
			            });

			        });


			    });

			    </script>	

		</div> -->
		
		<?php //$this->load->view('tabulados/comunidad/includes/grafico_barras.php'); ?>

		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>

	</div>

</div>



 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>