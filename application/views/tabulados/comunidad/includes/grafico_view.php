
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
	                    type: 'column'
	                },
	                subtitle: {
	                    text: '<?php echo $c_title; ?> ',
					    style: {
					        //color: '#000000',
					        //fontWeight: 'bold',
					        fontSize: '20px'
				    	}		                    
	                },			                
	                title: {
	                    text: 'GRÁFICO N° '+ <?php echo $opcion; ?> + '',
					    // style: {
					    //     //color: '#000000',
					    //     //fontWeight: 'bold',
					    //     fontSize: '15px'
				    	// }	                    
	                },
	                xAxis: {
	                    categories: [
	              			'Amazonas','Ancash','Apurimac','Arequipa','Ayacucho','Cajamarca','Cuzco','Huancavelica','Huanuco','Ica','Junin','La Libertad',
	              			'Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martin','Tacna','Tumbes', 'Ucayali'
	                    ],
					    style: {
					        //color: '#000000',
					        //fontWeight: 'bold',
					        fontSize: '16px'
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
	                    layout: 'vertical',
	                    backgroundColor: '#FFFFFF',
	                    align: 'left',
	                    layout: 'horizontal',
	                    verticalAlign: 'top',
	                    x: 30,
	                    y: 0,
	                    floating: true,
	                    shadow: false
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
	                
	                series:
	                	<?php echo json_encode($series); ?> 
	                   
	            });


				chart.setSize( <?php echo $xx; ?>, <?php echo $yy; ?>);

	        });
			
			

	 }); 	




</script>