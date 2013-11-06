
<div class="span12" style="overflow:auto;">
	
	    <div class="chart-wrapper"><div class="chart-inner" id="chart_div" ></div></div>

		<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script> -->
	    <script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts-more.js'); ?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('js/highcharts/modules/exporting.js'); ?>"></script>

</div>


<script type="text/javascript">




	$(function(){

			//***************************************************************************************************
	        var chart;
	        
	        $(document).ready(function() {
	            chart = new Highcharts.Chart({
	                credits: {
	                    text: 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.'
	                },
	                chart: {
	                    renderTo: 'chart_div',
	                    type: '<?php echo $tipo; ?>',
	                    marginRight: <?php echo ($tipo == 'bar') ? 210 : 0 ; ?>,
	                    marginBottom: <?php echo ($tipo == 'column') ? 100 : 50 ; ?>,

	                },
	                subtitle: {
	                    text: '<?php echo $c_title; ?> ',
					    style: {
					        //color: '#000000',
					        //fontWeight: 'bold',
					        fontSize: '18px'
				    	}		                    
	                },			                
	                title: {
	                    text: 'GRÁFICO N° '+ <?php echo $opcion; ?> + '',                    
	                },
	                xAxis: {
	                    categories: [
	              			'Amazonas','Ancash','Apurimac','Arequipa','Ayacucho','Cajamarca','Cuzco','Huancavelica','Huanuco','Ica','Junin','La Libertad',
	              			'Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martin','Tacna','Tumbes', 'Ucayali'
	                    ],
	                    tickLength: 25,
	                    tickWidth: 3,
					    style: {
					        //fontSize: '16px'
				    	}		                    
					},
	                yAxis: {
	                    min: 0,
	                    max:100,
	                    gridLineWidth: 1,
	                    title: {
	                        text: ' Porcentaje %'
	                    }
	                },
	                legend: {
	                    backgroundColor: '#FFFFFF',
	                    align:  "<?php echo ($tipo == 'column') ? 'center' : 'right' ; ?>" ,
	                    layout: "<?php echo ($tipo == 'column') ? 'horizontal' : 'vertical' ; ?>" ,
	                    verticalAlign: "<?php echo ($tipo == 'column') ? 'bottom' : 'middle' ; ?>" ,
	                    //x: 0,
	                   // y: 100,
	                    floating: true,
	                    shadow: false,
			            navigation: {
			            	activeColor: '#3E576F',
							animation: true,
							arrowSize: 12,
							inactiveColor: '#CCC',
							style: {
								fontWeight: 'bold',
								color: '#333',
								fontSize: '12px'	
							}
						},
	                },
	                tooltip: {
	                    formatter: function() {//console.log(this);
	                        return ''+
	                            '<strong>' + this.series.name + ': </strong>' + this.y + '%';
	                    }
	                },
	                plotOptions: {
	                    column: {
	                        pointPadding: 0.1,
	                        borderWidth: 0
	                    }
	                },
	                exporting: {
	                	//scale: 3500,
	                	filename: 'cenpesco_' + <?php echo $opcion; ?> ,
	                	sourceHeight: <?php echo $yy; ?>,
	                	sourceWidth: <?php echo $xx; ?>,
	                },
	                
	                series:
	                	<?php echo json_encode($series); ?> 
	            });

				//tamaño especifico
				chart.setSize( <?php echo $xx; ?>, <?php echo $yy; ?>);

	        });
			
			

	 }); 	




</script>