<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts-more.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/modules/exporting.js'); ?>"></script>

<!-- <div class="row-fluid"  style="width:100%; height: 100%; margin: 0 auto !important; position:relative;"> -->
	<br>
	<div class="span2">
		<div class="btn-group">
		    <button class="btn  btn-warning">Variables del tabulado</button>
		    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span></button>
		    <ul id="combo-graf" class=" dropdown-menu">
					<?php $v=0;
						// foreach ($series as  $y) {
						// 	foreach ($y as $i => $k) {
						// 		echo ( ($k == 'NEP') ? '<li  class="divider"></li>' : '');
						// 		echo ( ($i == 'name') ? ( ($k <> 'TOTAL') ? '<li value='. $v.'><a >'. $k.'</a></li>' :'' ) : '' );
						// 	}
						// 	$v++;
						// }

						// echo ( ( count($series)<=8 ) ?'<li  class="divider"></li><li  value=99><a >TODOS</a></li>' : '' );
				 	?>

  					<?php $v=0;
  						foreach ($series as  $y) {
  							foreach ($y as $i => $k) {
  								echo ( ($k == 'NEP') ? '<li  class="divider"></li>' : '');
  								echo ( ($i == 'name' && $k != 'TOTAL') ? '<li value='.$v.'><a >'. $k.'</a></li>' :'' );
  								echo ( ($k == 'TOTAL') ? '<li  class="divider"></li>' : '');
  							}
  							$v++;
  						}
  				 	?>

		    </ul>
		</div>
		<input type="hidden" id="hd_variable" name="hd_variable" value="0" >
	</div>
	<div class="span2" style="margin:0px;">
		<div class="styled-select">
		   <select id="cbo_type_graph">
		      <option value="0">Gráfico barras</option>
		      <option value="1">Gráfico de líneas</option>
		      <option value="2">Gráfico de líneas curveadas</option>
		      <option value="3">Gráfico de áreas</option>
		      <option value="4">Gráfico de áreas curveadas</option>
		      <option value="5">Gráfico Scatter</option>
		      <!--<option value="6">Gráfico de barras</option>-->
		   </select>
		</div>
	</div>
	<hr>

 <div class="row-fluid" style="overflow:auto;" id="chart_parent">
	    <!-- <div class="chart-wrapper"><div class="chart-inner" id="chart_div"  ></div></div> -->
    <!-- <div class="chart-wrapper"style="width:1400px; height: 780px;"> -->
    	<div class="chart-inner" id="chart_div" style=" height: 890px; margin: 0 auto;"></div>
    	<!-- <div class= id="chart_div"  ></div> -->
    <!-- </div> -->
 
</div>



<script type="text/javascript">



	$(function(){

			//***************************************************************************************************
	        var chart;

			var cant_variables = <?php echo count($series);?>;
			var valor_max_tab = 0; // max value del tab
			var json_dep = <?php echo json_encode($series); ?>;  
			for (var k =  0; k < valor_dep.length; k++) { // VALOR_DEP arreglo creado en mapa_view.php, contiene arreglos del php

			    for (var i = 0; i < 24; i++) {
			    	if (valor_dep[k][i] > valor_max_tab) {
			    		valor_max_tab = valor_dep[k][i];
			    	} 

			    };	
			};			

	            chart = new Highcharts.Chart({
	            //$('#container').highcharts({
		                chart: {
		                    renderTo: 'chart_div',
		                    type: '<?php echo $tipo; ?>',
		                    plotBorderWidth: 0,
		                    marginRight: <?php echo (string) ($tipo == 'bar') ? 210 : 10 ; ?>,
		                    marginBottom: <?php echo ($tipo == 'column') ? 150 : 50 ; ?>,
		                    marginTop:160,
		                    paddingTop:20,

		                },
		                title: {
		                    text: 'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + '', 
		                    style: {
								//color: '#3E576F',
								fontSize: '28px',
								padding:'12', 
							},  
							marginTop:'60',         
		                },	                
		                subtitle: {
		                    text: "<?php echo $c_title; ?>",
						    style: {
						        //color: '#000000',
						        //fontWeight: 'bold',
						        fontSize:  "<?php echo ( ( strlen($c_title)<94) ? '32px' : '23px' ) ; ?>" , 
					    	}		                    
		                },			                
		                xAxis: {
		                    categories: [
		              			'Amazonas','Ancash','Apurímac','Arequipa','Ayacucho','Cajamarca','Cuzco','Huancavelica','Huánuco','Ica','Junín','La Libertad',
		              			'Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martín','Tacna','Tumbes', 'Ucayali'
		                    ],
		                    tickLength: 15,
		                    tickWidth: 3,
						    style: {
						        fontSize: '22px',
					    	},
					    	labels: {
					    		rotation:310,
					    	}	                    
						},
		                yAxis: {
		                    min: 0,
		                    max:100,
		                    gridLineWidth: 1.5,
		                    title: {
		                        text: ' Porcentaje %',
			                    style: {
									//color: '#3E576F',
									fontSize: '18px'
								},	                        
		                    },
		                    labels:{
			                    style: {
									fontSize: '16px'
								},	
		                    },
		                },
		                legend: {
		                	enabled:false,
		                    backgroundColor: '#FFFFFF',
		                    align:  "<?php echo ($tipo == 'column') ? 'center' : 'right' ; ?>" ,
		                    layout: "<?php echo ($tipo == 'column') ? 'horizontal' : 'vertical' ; ?>" ,
		                    verticalAlign: "<?php echo ($tipo == 'column') ? 'bottom' : 'middle' ; ?>" ,
		                    //x: 0,
		                   	y: -10,
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
									fontSize: '18px'	
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
		                        pointWidth: 40,
		                        borderWidth: 1,
					            events: {
						            legendItemClick: function () {
						                return false; 
						            }
						        },
		                    },
				            allowPointSelect: true, 		                    
				            series: {
				                groupPadding: 0,
				                //pointWidth: max_ancho,
				                animation: 4000,
				                dataLabels: {
				                    enabled: true,			                	
				                    //borderRadius: 1,
				                    //color:'black',
				                    overflow: 'none',
				                    //backgroundColor: 'rgba(252, 255, 255,255)',
				                    padding: 1,
					                animation: {
					                    duration: 4000,
					                },			                    
				                    //borderWidth: 2,
				                    //borderColor: 'rgba(252, 255, 0, 0)',
				                    //y: 30,
				                    x: 1,		                	
				                    //shadow: true,
				                    //inside: true,
				                    style: {
				                        fontName:'arial narrow',
				                    },
				                    formatter: function() {
				                    	if (this.y > 0 && this.y < 1) { return Highcharts.numberFormat(this.y, 1);};
				                    	if (this.y > 1 ) { return Highcharts.numberFormat(this.y, 1);};
				                        
				                    },		                    		                    
				                }			                
				            },
		                },
		                exporting: {
		                	scale: 2000,
		                	filename: 'cenpesco_' + <?php echo $opcion; ?> ,
		                	sourceHeight: <?php echo $yy; ?>,
		                	sourceWidth: <?php echo $xx; ?>,
		                },
		                series: <?php echo json_encode($series); ?> ,
		                //series: json_dep,
		                credits: {
		                    text: "<?php echo ($tipo == 'column') ? 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.' : 'I CENPESCO-2013' ; ?>",
						    style: {
						        fontSize: '13px'
					    	}		                    
		                }              	
	           		} 
				);
				//end chart
			    // var renderer = new Highcharts.Renderer(
			    //     $('#chart_div')[0], 
			    //     400,
			    //     100
			    // );
			    
			    // renderer.image('http://highcharts.com/demo/gfx/sun.png', 100, 100, 30, 30)
			    //     .add();



				//******************************************************************************************************************************************************************************************
				//******************************************************************************************************************************************************************************************



				function set_max_y_value(var_num) {
						if (var_num<99) {//el maximo de variable seleccionada
							var valor_max = 0;
						    for (var i = 0; i < 24; i++) {
						    	if (valor_dep[var_num][i] > valor_max) {
						    		valor_max = valor_dep[var_num][i];
						    	} 
						    };	
						    if (valor_max<5) {
						    	chart.yAxis[0].setExtremes(0,5);
						    }else if (valor_max<10) {
						    	chart.yAxis[0].setExtremes(0,10);
						    }else if (valor_max<20) {
						    	chart.yAxis[0].setExtremes(0,20);
						    }else if (valor_max<30) {
						    	chart.yAxis[0].setExtremes(0,30);
						    }else if (valor_max<40) {
						    	chart.yAxis[0].setExtremes(0,40);
						    }else if (valor_max<50) {
						    	chart.yAxis[0].setExtremes(0,50);
						    }else if (valor_max<60) {
						    	chart.yAxis[0].setExtremes(0,60);
						    }else if (valor_max<70) {
						    	chart.yAxis[0].setExtremes(0,70);
						    }else if (valor_max<80) {
						    	chart.yAxis[0].setExtremes(0,80);
						    }else if (valor_max<90) {
						    	chart.yAxis[0].setExtremes(0,90);
						    }else if (valor_max<=100) {
						    	chart.yAxis[0].setExtremes(0,100);
						    };	
						}else{// maximo de todas las variables

						    if (valor_max_tab<5) {
						    	chart.yAxis[0].setExtremes(0,5);
						    }else if (valor_max_tab<10) {
						    	chart.yAxis[0].setExtremes(0,10);
						    }else if (valor_max_tab<20) {
						    	chart.yAxis[0].setExtremes(0,20);
						    }else if (valor_max_tab<30) {
						    	chart.yAxis[0].setExtremes(0,30);
						    }else if (valor_max_tab<40) {
						    	chart.yAxis[0].setExtremes(0,40);
						    }else if (valor_max_tab<50) {
						    	chart.yAxis[0].setExtremes(0,50);
						    }else if (valor_max_tab<60) {
						    	chart.yAxis[0].setExtremes(0,60);
						    }else if (valor_max_tab<70) {
						    	chart.yAxis[0].setExtremes(0,70);
						    }else if (valor_max_tab<80) {
						    	chart.yAxis[0].setExtremes(0,80);
						    }else if (valor_max_tab<90) {
						    	chart.yAxis[0].setExtremes(0,90);
						    }else if (valor_max_tab<=100) {
						    	chart.yAxis[0].setExtremes(0,100);
						    };
						}

				}

				if ( cant_variables>=1 ) {//muestra la primera serie
						$(chart.series).each(function(){
						    this.setVisible(false, false);
						});
						chart.setTitle({text:'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + ''} ,{text:"<?php  echo $c_title; ?><br>[ " + name_var[0] + " ]"}  );
						chart.redraw(); 				
						chart.series[0].show();	
						set_max_y_value(0);
				            //chart.legend.group.hide();// hide legend
				            //chart.legend.box.hide();						
						$("#hd_variable").val(0);
				}else {
					set_max_y_value(99);
					$("#hd_variable").val(99);
				};

				$("ul li").click(function(e) {
					if( $(this).parent().attr('id') == "combo-graf"){
						if( $(this).val() < 99 ){
							var var_num = $(this).val();
							$("#hd_variable").val(var_num);							
							// $(chart.series).each(function(){
							//     this.setVisible(false, false);
							// });
							//chart.series[var_num].show();	// show 1 variable
							chart.setTitle({text:'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + ''} ,{text:"<?php  echo $c_title; ?><br>[ " + name_var[var_num] + " ]"} );	
							set_max_y_value(var_num);
	
				            //chart.legend.group.hide();// hide legend
				            //chart.legend.box.hide();
				       
				            $(chart.series).each(function(){
				            	//this.remove(true);
				            	this.setVisible(false, false);
				            	chart.redraw(); 
				            })
				            chart.series[var_num].show();	
				            //chart.addSeries(json_dep[var_num],true);
				            $("#cbo_type_graph").trigger('change');
							chart.redraw(); 

						}else{
							$(chart.series).each(function(){
							    //this.setVisible(true, true); // show all variables, < 8
							    //this.remove(true); // show all variables, < 8
							    //chart.redraw();
							    this.setVisible(true, true);chart.redraw();
							});
							chart.setTitle({text:'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + ''} ,{text:"<?php  echo $c_title; ?><br>" } );
							set_max_y_value(99);
							$("#hd_variable").val(99);
							// for (var i = 0; i < json_dep.length; i++) {
							// 	chart.addSeries(json_dep[i]);chart.redraw();
							// };

							$("#cbo_type_graph").trigger('change');
				            // chart.legend.group.show(); // show legend
				            // chart.legend.box.show();
							chart.redraw();
			        	}

					}
				});

				$("#cbo_type_graph").change(function(){ // cambia el tipo de grafico
					var var_num = $("#hd_variable").val(); // num variable
					//var var_num = 0; // num variable
					if (var_num < 99) { // solo para una variables
						var graph_num = $(this).val();
						
						if (graph_num == 0) {
							chart.series[var_num].update({type:'column'});
						}else if(graph_num == 1){
							chart.series[var_num].update({type:'line'});
						}else if(graph_num == 2){
							chart.series[var_num].update({type:'spline'});
						}else if(graph_num == 3){
							chart.series[var_num].update({type:'area'});
						}else if(graph_num == 4){
							chart.series[var_num].update({type:'areaspline'});
						}else if(graph_num == 5){
							chart.series[var_num].update({type:'scatter'});
						}else if(graph_num == 6){
							$("#chart_div").css('width:800px;height:2000px;');
					        chart.inverted = true;
					        chart.xAxis[0].update({}, false); set_max_y_value(var_num);
					        chart.yAxis[0].update({}, false);							
							chart.series[var_num].update({type:'bar'});
							chart.redraw(); 
						}
			            //chart.legend.group.hide();// hide legend
			            //chart.legend.box.hide();
			            chart.redraw(); 
					}else{
						
						$(chart.series).each(function(){
							this.update({type:'column'});
						});
						chart.redraw(); 
					}
				})




		


			


	}); 	
				




</script>