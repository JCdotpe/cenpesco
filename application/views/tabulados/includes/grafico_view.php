<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts-more.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/modules/exporting.js'); ?>"></script>

<!-- <div class="row-fluid"  style="width:100%; height: 100%; margin: 0 auto !important; position:relative;"> -->

<div class="row-fluid" style="height:60px;">
	<div class="span2"><!-- <input id="R1" type="range" min="0" max="90" value="30" /> -->
		<div class="styled-select" style="height:40px;border-radius: 6px;"> <select id="cbo_nac_dep" style="font-size: 20px !important;"><option value="0">NACIONAL</option><option value="1">DEPARTAMENTAL</option> </select> </div>
	</div>
	<div class="span7" style="margin:0px;">
		<div class="span3" style="margin:0px;">
			<div id ="div-graph" class="btn-group">
			    <button class="btn  btn-warning">Variables del tabulado</button>
			    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span></button>
			    <ul id="combo-graf" class=" dropdown-menu">
	  					<?php $v=0;
	  						foreach ($series as  $y) {
	  							foreach ($y as $i => $k) {
	  								echo ( ($i == 'name' &&  $k != 'No especificado' && $k != 'TOTAL' ) ? '<li value='.$v.'><a >'. $k.'</a></li>' :'' );
	  							}
	  							$v++;
	  						}
	  				 	?>
			    </ul>
			</div>
			<input type="hidden" id="hd_variable" name="hd_variable" value="0" >
		</div>
		<div class="span3 " id="div-cbo-graph"  style="margin:0px;">
			<div class="styled-select">
			   <select id="cbo_type_graph">
			      <option value="0">Gráfico de barras</option>
			      <option value="1">Gráfico de líneas</option>
			      <option value="2">Gráfico de líneas curveadas</option>
			      <option value="3">Gráfico de áreas</option>
			      <option value="4">Gráfico de áreas curveadas</option>
			      <option value="5">Gráfico Scatter</option>
			      <!-- <option value="6">Gráfico de barras</option> -->
			   </select>
			</div>
		</div>	
		<div class="span3 " id="div-cbo-graph_nac"  style="margin:0px;">
			<div class="styled-select">
			   <select id="cbo_type_graph_nac">
			      <option value="0">Gráfico de barras</option>
			      <?php if($respuesta_unica){echo '<option value="1">Gráfico circular</option>'; } ?>
			   </select>
			</div>
		</div>		
		<div class="span6" style="margin:0px;">	<button class="button-styles-graficos" id="data-labels">Mostrar etiquetas</button>
												<!---<button class="button-styles-graficos" id="data-puntos">Mostrar Puntos de quiebre</button>-->
												<button class="button-styles-graficos" id="btn_plot-line">Mostrar nacional</button>
												<button class="button-styles-graficos" id="data-max-value">+</button>
												<button class="button-styles-graficos" id="data-min-value">-</button></div>
	</div>
	<div class="span3">
		<div class="span3" style="margin:0px;">	<button class="button-styles-graficos" id="btn_data-color">Color</button></div>
		<div class="span7" style="margin:0px 0px 0px 20px;">	
			<button class="button-styles-graficos" id="btn_data-print">Imprimir</button><!-- <button class="button-styles-graficos" id="data-download">Descargar</button> -->
		</div>	
	</div>
</div>
<div  class="row-fluid" style="overflow:auto;" id="chart_parent">

    	<div class="chart-inner" id="chart_div" style=" height:720px; margin: 0 auto;"></div>
    	<div class="chart-inner" id="chart_div_nac" style="width:1200px;"></div><!--margin-left:260px;-->

</div>

<script  type="text/javascript">


	// variables declarados para MAPA y GRAFICOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

		var cant_variables 	= <?php echo ( ($opcion==1) ? count($series) : count($series)-1 ) ;?>;
		var tipo_graph_nac = 'column';
		var num_tabulado = <?php echo $opcion;?>;
		var name_dep = ['Amazonas','Ancash','Apurímac','Arequipa','Ayacucho','Cajamarca','Cusco','Huancavelica','Huánuco','Ica','Junín','La Libertad','Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martín','Tacna','Tumbes', 'Ucayali'];
		var name_dep_sorter = new Array();
		var num_color = 1; // num de colores
		var enableDataLabels = true; // labels	

		var valor_nac 		= []; // arreglo de valores nacionales
		var valor_nac_sorter 		= []; // arreglo de valores nacionales
		var data_pie_valor_nac = [];
		var valor_nac_abs 	= new Array(); // arreglo de valores nacionales
		var valor_nac_abs_sorter 	= new Array(); // arreglo de valores nacionales
		var valor_dep  = new Array();			
		var valor_dep_sorter  = new Array();			
		var valor_dep_abs 	= new Array(); // arreglo de valores departamentales absolutos	
		var valor_dep_abs_sorter 	= new Array(); // arreglo de valores departamentales absolutos	
		var name_mapa = new Array();			
		var name_var = new Array();			
		var name_var_sorter = new Array();		// la variales ordenadas, para nacional.	
		var current_var = 0; // variable actual usada
		var nacional = true;
		var plotline = true;
		var total_nacional = 0;
		var size_nacional = [1200,0];
	// variables declarados para MAPA y GRAFICOS <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	$(function(){
			if (cant_variables>7){
				tipo_graph_nac = 'bar';
			}
	        var chart;
	        var chart_nac;
			
			<?php 

				//GUARDANDO LOS NOMBRES VARIABLES DEPARTAMENTALES --------------------------------------------------
				$v=0;
				if (isset($nombres_mapa)) {// titulos de los nombres de mapas, en la base de datos
					foreach ($nombres_mapa->result() as $key => $value) {
						echo 'name_mapa['.$key.'] = "'. $value->nombre . '";';
					}
				}
				foreach ($series as  $y) {// nombres del array PHP
					foreach ($y as $i => $f) {
						echo ( ($i == 'name' && $f != 'TOTAL') ? 'name_var['.$v.'] = "'. $f . '";' :'' );
					}
					$v++;
				}						
				
				// GUARDANDO ABSOLUTO Y PORCENTUAL NACIONALES  ----------------------------------------------------
				$cant_variables = count($series);
				if($opcion >1){
				$a = 3; 
				$p = 4;
				$cant_variables-=1;}// << no contar los totales
				else{// totales especiales solo TAB N°1
				$a = 1; 
				$p = 2;}
				
				for ($i=0; $i < $cant_variables; $i++) {
					$a = 1 + $a; 
					$p = 1 + $p;
					echo 'valor_nac_abs['.$i.']  =  ($("#tabul tbody tr:first-child td:nth-child('.$a.')").html()).replace(" ","");';
					echo 'valor_nac['.$i.']  = parseFloat((($("#tabul tbody tr:first-child td:nth-child('.$p.')").html()).replace(",",".") ).replace(" ",""));';
					echo 'data_pie_valor_nac['.$i.'] = [name_var['. $i .'],valor_nac['. $i .']];';
					$a++;
					$p++;
				}					


				// GUARDANDO LOS VALORES NACIONALES Y NOMBRES VARIABLES,  EN SORTER
				if($opcion >1 ){
					$cant_variables = count($series);
					arsort($series[$cant_variables-1]['data']);
					$cc = 0;
					foreach ($series[$cant_variables-1]['data'] as $key => $value) {
						if ($key == 1){
							echo 'total_nacional = '. $value . ';';
						}else{
							echo 'valor_nac_sorter['. $cc .'] = '. $value . ';';
							echo 'valor_nac_abs_sorter['. $cc .'] = valor_nac_abs[ '. ($key-2). '];';
							echo 'name_var_sorter['. $cc .'] = name_var['. ($key-2) . '];';$cc++;
							//echo 'data_pie_valor_nac['.$cc.'] = [name_var_sorter['. $cc .'],valor_nac_sorter['. $cc .']];';
						}
					}
					array_pop($series);// QUITANDO LOS TOTALES
				}else{
					echo 	'name_var_sorter = name_var;';
					echo 	'valor_nac_abs_sorter = valor_nac_abs;';
					echo 	'var sum_nac = 0;var sum_nac_2 = 0;';
					echo 	'for(var i = 0; i < valor_nac_abs.length; i++) {
							    sum_nac += parseInt(valor_nac_abs[i]);
							}';					
					echo 	'for(var i = 0; i < valor_nac_abs.length; i++) {
							    valor_nac_sorter[i] = parseFloat(((parseInt(valor_nac_abs[i])*100)/sum_nac).toFixed(1));
							}';
					echo 	'for(var i = 0; i < valor_nac_sorter.length; i++) {
							    sum_nac_2 += parseFloat(valor_nac_sorter[i]);
							}';	
					echo 	'var nac_diff = (100-sum_nac_2).toFixed(1);';
					echo 	'if(nac_diff>0){valor_nac_sorter[valor_nac_sorter.length-1] += parseFloat(nac_diff);alert(nac_diff);}
							else if(nac_diff<0){valor_nac_sorter[0] += parseFloat(nac_diff); }';

					echo 	'for(var i = 0; i < valor_nac_sorter.length; i++) {
							    data_pie_valor_nac[i] = [name_var_sorter[i],valor_nac_sorter[i]];
							}';	
				}

				// GUARDANDO ABSOLUTO DE LOS DEPARTAMENTALES -----------------------------------------------------
				if($opcion >1){ $d = 3; }// totales especiales solo TAB N°1
				else{ $d = 1; ;}	

				for ($k = 0; $k < count($series); $k++) {
					echo 'var hpd_1 = new Array();';
					$d = 1 + $d;
					for ($i = 0; $i < 24; $i++) {
						echo 'hpd_1['.$i.'] = ($("#tabul tbody tr:nth-child('.($i+2).') td:nth-child('.$d.')").html());';
					};	
					$d++;
					echo 'valor_dep_abs['.$k.'] = hpd_1;';
					//if($opcion >1){ $d = 3; }// reiniciando, totales especiales solo TAB N°1
					//else{ $d = 1; ;}
				};		

				// GUARDANDO PORCENTUAL Y ABSOLUTO DE LOS DEPARTAMENTALES EN SORTER -----------------------------------------------------
				$kk = 0; 
				foreach ($series  as $index => $filas){
					echo 'valor_dep['.$index.'] =  new Array();';//alert(valor_dep['.$index.']['.$key.']);
					echo 'valor_dep['.$index.'] = ' . json_encode(array_values($series[$index]['data'])) . ';'; 

					arsort($series[$index]['data']);
					echo 'valor_dep_sorter['.$index.'] =  new Array();';//alert(valor_dep['.$index.']['.$key.']);
					echo 'valor_dep_sorter['.$index.'] = ' . json_encode(array_values($series[$index]['data'])) . ';';	

					echo 'name_dep_sorter['.$index.'] =  new Array();';
					echo 'valor_dep_abs_sorter['.$index.'] =  new Array();';
					foreach ($series[$index]['data'] as $key => $value) {//alert(name_dep_sorter['.$index.']['.$kk.']);//alert(valor_dep_abs_sorter['.$index.']['.$kk.']);
						echo 'name_dep_sorter['.$index.']['.$kk.'] = name_dep['.$key.'];';
						echo 'valor_dep_abs_sorter['.$index.']['.$kk.'] = valor_dep_abs['.$index.']['.$key.'];';$kk++;
					}$kk = 0;
				}
				
			?>
				//
			var valor_max_tab 	= 0; // max value del tab
			for (var k =  0; k < valor_dep.length; k++) { // VALOR_DEP arreglo creado en mapa_view.php, contiene arreglos del php
			    for (var i = 0; i < 24; i++) {
			    	if (valor_dep[k][i] > valor_max_tab) {
			    		valor_max_tab = valor_dep[k][i];
			    	} 
			    };	
			};	
			//console.log(valor_nac_sorter);

			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************		
			//START chart DEPARTAMENTAL
	            chart = new Highcharts.Chart({

		                chart: {
		                    renderTo: 'chart_div',
		                    type: '<?php echo $tipo; ?>',
		                    plotBorderWidth: 0,
		                    marginRight: <?php echo (string) ($tipo == 'bar') ? 210 : 10 ; ?>,
		                    marginLeft:80,
		                    marginBottom:  120,
		                    marginTop:150,
		                    paddingTop:20,
		                },
		                title: {
		                	useHTML: true,
		                	y:30,
		                	x:0,
		                	text: '<h3><center>' + name_mapa[0] + '</center></h3>' ,
		                    //text: 'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + '', 
		                    style: {
				                //'white-space': 'normal',
				                //position: 'absolute',			                    	
								fontSize:  "<?php echo ( ( strlen($c_title)<94) ? '26px' : '22px' ) ; ?>" ,
								color: '#000000',
								width:'1700px',
							},  
							//marginTop:'60',         
		                },	                		                
		                xAxis: {
		                   	lineWidth:1,
		                    lineColor:'black',	
						    title: {
						        //text: 'DEPARTAMENTOS',
			                    style: {
									fontSize: '20px',
									fontName:'Arial Narrow',
									padding:'12', 
								},  
								marginBottom:'60',   						        
						    },		                	
		                    categories: name_dep_sorter[0],
					    	labels: {
					    		rotation:330,
						        style: {
						            fontSize: '13px',
						            color: '#000000',
						        }					    		
					    	},	
		                    tickLength: 1,
		                    tickWidth: 1,					    				    	                    
						},
		                yAxis: {
		                	allowDecimals: false,
		                	tickInterval: 10,
		                    min: 0,
		                    max:100,
		                    gridLineWidth: 0,
		                   	lineWidth:1,
		                    lineColor:'black',	
		                    title: {
		                        text: false,
			                    style: {
									//color: '#3E576F',
									fontSize: '20px'
								},	                        
		                    },
		                    labels:{
			                    style: {
									fontSize: '16px',
									color: '#000000',
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
		                            '<strong>' + this.x + ': </strong>' + Highcharts.numberFormat(this.y, 1,',',' ') + '%';
		                    }
		                },
		                plotOptions: {
		                    column: {
		                        //pointWidth: 65,
		                        allowPointSelect: true,
		                        borderWidth: 0,
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
				                    //enabled: true,			                	
				                    borderRadius: 5,
				                    //color:'black',
				                    crop:false,//labels overflow, lo muestra 
				                    overflow: 'none',//labels overflow, lo muestra 
				                    backgroundColor: 'rgba(252, 255, 255,255)',
				                    padding: 0,
					                animation: {
					                    duration: 4000,
					                },			                    
				                    //borderWidth: 2,
				                    //borderColor: 'rgba(252, 255, 0, 0)',
				                    y: -8,
				                    x: 1,		                	
				                    //shadow: true,
				                    //inside: true,
				                    style: {
				                        fontName:'arial narrow',
				                        //fontWeight:'bold',
				                        fontSize:'14px',
				                        color: '#000000',
				                    },
				                    formatter: function() {
				                    	 return Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  + valor_dep_abs_sorter[this.series.index][this.point.x] + ']';
				                    },		                    		                    
				                },
				            },
		                },
		                exporting: {
		                	scale: 2000,
		                	filename: 'CENPESCO_' + num_tabulado ,
		                	sourceHeight: <?php echo $yy; ?>,
		                	sourceWidth: <?php echo $xx; ?>,
		                },
				        navigation: {
				            buttonOptions: {
				                enabled: false
				            }
				        },	                
	                
		                series: [{data: <?php echo json_encode(array_values($series[0]['data'])); ?> } ] ,// por defecto cogera el primer arreglo de SERIES, array_values: para hacer json de solo values sin indices.
		                //series: json_dep,
		                credits: {
		                    text: 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.',
						    style: {
						        fontSize: '14px',
					    	},
							position: {
								align: 'right',
								x: -10,
								verticalAlign: 'bottom',
								y: -25
							},				    	
							href:'http://www.inei.gob.pe',		                    
		                },            	
	           		}, function(chart) { // on complete
					        chart.renderer.image(CI.site_url + 'img/inei.gif', 5, 5, 130, 90)
					            .add();  
					        chart.renderer.image(CI.site_url + 'img/cenpesco.png', 1800, 5, 80, 90)
					            .add();         
    				}
	           	);
				
			    // var renderer = new Highcharts.Renderer(
			    //     $('#chart_div')[0], 
			    //     400,
			    //     100
			    // );
			    
			    // renderer.image('http://highcharts.com/demo/gfx/sun.png', 100, 100, 30, 30)
			    //     .add();
			//end chart DEPARTAMENTAL
			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************

			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************
			//end chart


	    	// Radialize the colors
					Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
					    return {
					        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
					        stops: [
					            [0, color],
					            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
					        ]
					    };
					});

			//*****
				var chart_nac_margin = {'right':60,'top':130,'left':200,'bottom':135 };// margenes del CHART nacional
				if (tipo_graph_nac == 'bar' ){
					size_nacional[0] = 1200; //ancho
					size_nacional[1] = valor_nac.length*80 + chart_nac_margin.right + chart_nac_margin.bottom; // alto
					if(size_nacional[1] > 1600){ size_nacional[1] = 1600;} 					
				}else{ // column
					//size_nacional[0] = valor_nac.length*80 +  chart_nac_margin.left  +  chart_nac_margin.right  + 40;// ancho
					size_nacional[0] = 950;// ancho
					size_nacional[1] = 720; //alto
					//if(size_nacional[0] < 880){ size_nacional[0] = 900;} // ancho limite min 					
					//else if(size_nacional[0] > 2100){ size_nacional[0] = 2100;} //ancho limite max
				}			
			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************				
			//START chart	NACIONAL

	            chart_nac = new Highcharts.Chart({
	            //$('#container').highcharts({
		                chart: {		                	
		                    renderTo: 'chart_div_nac',
		                    //type: tipo_graph_nac,
		                    marginRight:chart_nac_margin.right,
		                    marginTop:chart_nac_margin.top,
		                    marginLeft:chart_nac_margin.left,
		                    marginBottom:chart_nac_margin.bottom,
			                plotBackgroundColor: null,
			                plotBorderWidth: null,
			                plotShadow: false,		                    
		                    //plotShadow: true,
			                  events: {
			                    load: function(event) {
			                        $('.highcharts-legend-item').last().append('<br/><div style="width:200px"><hr/> <span style="float:left"> Total </span><span style="float:right"> ' + 100 + '</span> </div>')
			                    }
			                  },                   
		                },
		                title: {
		                	text: "<h3><center><?php echo str_replace('SEGÚN DEPARTAMENTO,','',$c_title) ?></center></h3>",
		                	//width:(size_nacional[0] - 200),
		                    //text: 'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + '', 
		                    useHTML: true,
		                    style: {marginTop: 100, 
								//color: '#3E576F',
								fontSize:  "<?php echo ( ( strlen($c_title)<90) ? '24px' : '21px' ) ; ?>" ,
								padding:'12', 
								color: '#000000',
								//align:'center',
								width: "700px",
							},  	
		                	y:30,
		                	x:0,						    
		                },	                		                
		                xAxis: {
		                    tickLength: 1,
		                    tickWidth: 2,
		                   	lineWidth:1,
		                    lineColor:'black',	
					    	labels: {
							    //step: 2,
							    // formatter: function () {
							    //     return this.value.replace(/ /g, '<br />');
							    // },				    		
						        style: {
						        	'white-space': 'normal',
						            //fontSize: '16px Helvetica',
						            fontSize: '13px',
						            //font: 'Trebuchet MS, Verdana, sans-serif',
					                left: '0px',
					                top: '0px',
					                position: 'absolute',	
									color: '#000000',													                					            
						        }	
					    	}	                    
						},
		                yAxis: {
		                	allowDecimals: false,
		                	tickInterval: 10,
		                    min: 0,
		                    //max:100,
		                   	lineWidth:1,
		                    lineColor:'black',		                   	
		                    gridLineWidth: 0,
		                    title: {
		                        text: false,

			                  	style: {
									fontSize: '18px'
								},	                        
		                    },
		                    labels:{
		                    	y:20,
			                    style: {
									fontSize: '16px',
									color: '#000000',									
								},	
		                    },
		                },
		                plotOptions: {
		                	bar:{
		                		allowPointSelect: true,
		                		//pointWidth: 30,
		                		borderWidth: 0,
		                		showInLegend: false,
		                		grouping: false,
		                	},		                	
		                	column:{
		                		allowPointSelect: true,
		                		//pointWidth: 30,
		                		borderWidth: 0,
		                		showInLegend: false,
		                		grouping: false,
				                dataLabels: {
						            // crop:true,
						            // overflow:'justify',	
						            //y:5,			                	
				                },		                		
		                	},
					        pie: {
					        	//grouping: true,
					        	//cursor: 'pointer',
					        	allowPointSelect: true,
					            size:500,
					            dataLabels: {
					                fontSize: '22px',
				                    style: {
				                        width: '250px',
				                    },					                
					            },				            
					            showInLegend: false,
						        states: {
									select:{
										color:'gray' ,
									},
						        },					            
					        },	                	
				            series: {
				                groupPadding: 0,
				                animation: 4000,
					           // innerSize: 200,
				                dataLabels: {
						            crop:false,
						            overflow:'none',					                	
				                	enabled:true,
				                    //borderRadius: 1,
				                    //color:'black',
				                    //backgroundColor: 'rgba(252, 255, 255,255)',
				                    //padding: 2,
					                animation: {
					                    duration: 4000,
					                },			                    
				                    //borderWidth: 2,
				                    //borderColor: 'rgba(252, 255, 0, 0)',
				                    y: -8,
				                    x: 1,		                	
				                    style: {
				                        fontName:'arial narrow',
				                        //fontWeight:'bold',
				                        fontSize:'14px',
				                        color: '#000000',
				                    },
				                    formatter: function() {
				                    	 return  Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  + valor_dep_abs_sorter[this.series.index][this.point.x] + ']';
				                    },		                    		                    
				                },
				            },		                	
		                },
		                tooltip: {
		                    formatter: function() {//console.log(this);
		                        return  '<strong>' +  chart_nac.xAxis[0].categories[this.point.x] +'</strong>:<br>'+  this.y + '%';
		                    }
		                },
		                series: [{type:tipo_graph_nac,name: 'Browser share',data:data_pie_valor_nac}],
		                //series: [{type:'bar',name: 'Browser share',data:data_pie_valor_nac}],
		                credits: {
		                    text: '<?php if(!$respuesta_unica){echo "Nota: La suma de los porcentajes no totaliza el 100%, debido a que la información analizada corresponde a respuesta MÚLTIPLE.<br>";}; ?> Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.',
						    style: {
						        fontSize: '14px',
					    	},
							position: {
								align: 'right',
								x: -10,
								verticalAlign: 'bottom',
								y: -38
							},				    	
							href:'http://www.inei.gob.pe',		                    
		                },
				        navigation: {
				            buttonOptions: {
				                enabled: false,
				            }
				        },		
		                legend: {
		                    backgroundColor: '#FFFFFF',
		                    align:   'left',
		                    layout: 'vertical',
		                    verticalAlign: 'middle',
		                    //x: 0,
		                   	x: 30,
		                    floating: true,
		                    shadow: false,
				            itemStyle: {
				                paddingBottom: '10px',
				                fontSize:'15px',
				            },	
							labelFormatter: function() {
							    var words = this.name.split(/[\s]+/);
							    var numWordsPerLine = 4;
							    var str = [];

							    for (var word in words) {
							        if (word > 0 && word % numWordsPerLine == 0)
							            str.push('<br>');

							        str.push(words[word]);
							    }

							    return  '['+ this.y + '%] '+ str.join(' ') ;
							},	   
							// labelFormatter: function() {
			    //                 //total += this.y;
							// 	return '<div style="width:200px"><span style="float:left">' + this.name + '</span><span style="float:right">' + this.y + '%</span></div>';
							// },								                 
		                },				        	                
		                                
	           		}, function(chart_nac) { // on complete
					        chart_nac.renderer.image(CI.site_url + 'img/inei.gif', 2, 5, 130, 90)
					            .add();  

					        chart_nac.renderer.image(CI.site_url + 'img/cenpesco.png', (size_nacional[0] - 95), 5, 80, 90)
					            .add();         
    				}
				);
			//end chart nac
			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************

				// Verificando el maximo valor de Y
					if(chart_nac.yAxis[0].getExtremes().dataMax>90 && chart_nac.yAxis[0].getExtremes().dataMax<=100){// si el max pasa 100, ajusta
						chart_nac.yAxis[0].setExtremes(0,100);
					}
				// configurando el rango de intervalo del nacional
					if(valor_nac_sorter[0]>60){
						chart_nac.yAxis[0].options.tickInterval = 20;
					}
				//

					var valor_max = chart.yAxis[0].getExtremes().dataMax;
					function set_max_y_value(var_num) {
							if (var_num<99) {//el maximo de variable seleccionada
								valor_max = 0;
							    for (var i = 0; i < 24; i++) {
							    	if (valor_dep[var_num][i] > valor_max) {
							    		valor_max = valor_dep[var_num][i];
							    	} 
							    };	
							    if (valor_max<3) {
							    	valor_max = 5;
							    	chart.yAxis[0].setExtremes(0,3); chart.yAxis[0].options.tickInterval = 1; 
							    }else if (valor_max<6) {
							    	valor_max = 5;
							    	chart.yAxis[0].setExtremes(0,6); chart.yAxis[0].options.tickInterval = 2; 
							    }else if (valor_max<10) {
							    	valor_max = 10;
							    	chart.yAxis[0].setExtremes(0,10); chart.yAxis[0].options.tickInterval = 2; 
							    }else if (valor_max<20) {
							    	valor_max = 20;
							    	chart.yAxis[0].setExtremes(0,20); chart.yAxis[0].options.tickInterval = 5; 
							    }else if (valor_max<30) {
							    	valor_max = 30;
							    	chart.yAxis[0].setExtremes(0,30); chart.yAxis[0].options.tickInterval = 5; 
							    }else if (valor_max<40) {
							    	valor_max = 40;
							    	chart.yAxis[0].setExtremes(0,40); chart.yAxis[0].options.tickInterval = 5; 
							    }else if (valor_max<50) {
							    	valor_max = 50;
							    	chart.yAxis[0].setExtremes(0,50); chart.yAxis[0].options.tickInterval = 10; 
							    }else if (valor_max<60) {
							    	valor_max = 60;
							    	chart.yAxis[0].setExtremes(0,60); chart.yAxis[0].options.tickInterval = 10; 
							    }else if (valor_max<70) {
							    	valor_max = 70;
							    	chart.yAxis[0].setExtremes(0,70); chart.yAxis[0].options.tickInterval = 20; 
							    }else if (valor_max<80) {
							    	valor_max = 80;
							    	chart.yAxis[0].setExtremes(0,80); chart.yAxis[0].options.tickInterval = 20;
							    }else if (valor_max<90) {
							    	valor_max = 90;
							    	chart.yAxis[0].setExtremes(0,90); chart.yAxis[0].options.tickInterval = 20;
							    }else if (valor_max<=100) {
							    	valor_max = 100;
							    	chart.yAxis[0].setExtremes(0,100); chart.yAxis[0].options.tickInterval = 20;
							    };	
							}
					}

				    // TTipo de grafico NAC / DEP	
				    $('#cbo_nac_dep').change(function() {
				    	chart_nac.redraw();					    	
				    	if($(this).val() == 0 ){
				    		$("#chart_div").hide('slow');
				    		$("#div-graph").hide();
				    		$("#div-cbo-graph").hide();
				    		$("#btn_plot-line").hide();
				    		$("#data-max-value").hide();
				    		$("#data-min-value").hide();
				    		$("#chart_div_nac").show('slow');
				    		$("#div-cbo-graph_nac").show('slow');
				    		$("#cbo_type_graph_nac").trigger('change');
				    	}else{
				    		$("#cbo_type_graph").trigger('change');
				    		$("#div-cbo-graph_nac").hide('slow');
				    		$("#chart_div_nac").hide();
				    		$("#chart_div").show('slow');
				    		$("#div-graph").show('slow');
				    		$("#div-cbo-graph").show('slow');
				    		$("#btn_plot-line").show('slow');
				    		$("#data-max-value").show('slow');
				    		$("#data-min-value").show('slow');
				    		$("#cbo_type_graph").trigger('change');				    		
				    	}
				    	num_color = 0; $('#btn_data-color').trigger('click');
				    });			

					$("ul li").click(function(e) {//SELECT por variable
						if( $(this).parent().attr('id') == "combo-graf"){
							if( $(this).val() < 99 ){
								var var_num = $(this).val();
								$("#hd_variable").val(var_num);	

								chart.setTitle({text: '<h3><center>' + name_mapa[var_num] +'</center></h3>' });	
								set_max_y_value(var_num);
					       
					            $(chart.series).each(function(){
					            	this.remove(true);
					            	//this.setVisible(false, false);
					            	chart.redraw(); 
					            });
					            chart.addSeries({data: valor_dep_sorter[var_num] });
					            chart.xAxis[0].setCategories(name_dep_sorter[var_num]);
					            $("#cbo_type_graph").trigger('change');
						        chart.series[0].update({// asignar el primer color por defecto
						            color:  Highcharts.getOptions().colors[0]
						        });				            
								
								//TRIGGERS para mantener  la seleccion actual
								plotline = true; $("#btn_plot-line").trigger('click');
								enableDataLabels = true; $("#data-labels").trigger('click');
								chart.redraw(); 
							}
						}
					});

					$("#cbo_type_graph").change(function(){ // cambia el tipo de grafico DEPARTAMENTAL
						var var_num = 0; // num variable
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
							}
							enableDataLabels = true; $("#data-labels").trigger('click');
							plotline = true;  $("#btn_plot-line").trigger('click');
				            chart.redraw(); 
						}
					})

					$("#cbo_type_graph_nac").change(function(){ // cambia el tipo de grafico del NACIONAL
						//var var_num = 0; // num variable
							var graph_num = $(this).val();
				            $(chart_nac.series).each(function(){
				            	this.remove(true);
				            	chart_nac.redraw(); 
				            });	

							if (graph_num == 0) {// bar || column
					            chart_nac.addSeries({type:tipo_graph_nac,name: 'CENPESCO',data:valor_nac_sorter});
					            chart_nac.xAxis[0].setCategories(name_var_sorter);
								chart_nac.margin[0] = 140; // margen TOP del chart
								if(tipo_graph_nac == 'bar'){// bar
									//chart_nac.margin[0] = 120; // margen TOP del chart
									chart_nac.margin[3] = 170; // margen LEFT del chart
									chart_nac.margin[2] = 90; // margen BOTTOM del chart
									chart_nac.setSize(size_nacional[0],size_nacional[1]);	chart_nac.redraw();
								}else{// column
									chart_nac.margin[3] = 80; // margen LEFT del chart	
									chart_nac.margin[1] = 80;// margen RIGHT del chart								
									if(valor_nac.length<4){
										chart_nac.margin[3] = 180;
										chart_nac.margin[1] = 180;
									}else if(valor_nac.length<=5){
										chart_nac.margin[3] = 150;
										chart_nac.margin[1] = 150;
									}else if(valor_nac.length==6){
										chart_nac.margin[3] = 100;
										chart_nac.margin[1] = 100;
									}
									chart_nac.setSize(size_nacional[0],size_nacional[1]);	chart_nac.redraw(); 
									$("#chart_div_nac").css("width",size_nacional[0]);
								}
								
							}else if(graph_num == 1){ // pie
								chart_nac.xAxis[0].setCategories(name_var);
					            chart_nac.addSeries({type:'pie',data:data_pie_valor_nac,startAngle: 90});								
								chart_nac.margin[0] = 155; // margen TOP del chart
								chart_nac.margin[3] = 100; // margen LEFT del chart
								chart_nac.setSize(1200,800);
								$("#chart_div_nac").css("width",1200);
							}
				            enableDataLabels = true; $('#data-labels').trigger('click') ;
				            num_color = 0; $('#btn_data-color').trigger('click');
				            chart_nac.redraw();
					})
				    // etiquetas de valores
				    $('#data-labels').click(function() {
				        	if(enableDataLabels){ $(this).html('Quitar  etiquetas '); } else{ $(this).html('Mostrar etiquetas');}					        	
							if($("#cbo_nac_dep").val()== 0){
								var fontsize_esp = '17px';
								if($("#cbo_type_graph_nac").val()==0){ 
									//chart_nac.yAxis[0].options.title.text = "PORCENTAJE  %";
									chart_nac.yAxis[0].options.lineWidth = 2;
									chart_nac.xAxis[0].options.lineWidth = 2;
									//chart_nac.yAxis[0].update({title:'PORCENTAJE %',});
							        chart_nac.series[0].update({
							            dataLabels: {
							            	enabled: enableDataLabels,
							            	//align: 'center',
							                distance: 50, // distancias del label
						                    formatter: function() {					                    	
						                    	 	return '<center>'+ Highcharts.numberFormat(this.y, 1,',',' ') +'%</center>' + '<br><center>['  + Highcharts.numberFormat(valor_nac_abs_sorter[this.point.x], 0,',',' ') + ']</center>'; 
						                    },			                
							            }
							        });	
								}else{
									chart_nac.xAxis[0].update({lineWidth:0,});
									chart_nac.yAxis[0].update({lineWidth:0,});	
							        chart_nac.series[0].update({
							            dataLabels: {
							            	enabled: enableDataLabels,
							            	style:{
							            		fontSize: '16px',
							            	},
							                distance: 50, // distancias del label
						                    formatter: function() {					                    	
						                    		return chart_nac.xAxis[0].categories[this.point.x] + '<br>'+ Highcharts.numberFormat(this.y, 1,',',' ') + '% ['  + Highcharts.numberFormat(valor_nac_abs[this.point.x], 0,',',' ') + ']';
						                    },			                
							            }
							        });	
								}

							}else{
						        chart.series[0].update({
						            dataLabels: {
						                enabled: enableDataLabels,
					                    formatter: function() {
					                    	var x=0;
					                    	 return Highcharts.numberFormat(this.y, 1,',',' ') + '%<br>[' + valor_dep_abs_sorter[$("#hd_variable").val()][this.point.x] + ']';
					                    },			                
						            }
						        });	
							}	
							chart_nac.redraw();
							enableDataLabels = !enableDataLabels; 
				    });

				    //nuevos maximo rango
				    $('#data-max-value').click(function() {
				    	if (valor_max<100) {
				    		++valor_max ;
				    		chart.yAxis[0].setExtremes(0,valor_max);
				    	}
				    });		

				    //nuevos minimo rango
				    $('#data-min-value').click(function() {
				    	if (valor_max>1) {
							--valor_max ;
				    		chart.yAxis[0].setExtremes(0,valor_max); 
				    	}
				    });	

				    // Toggle point markers
				    var enableMarkers = false;
				    $('#data-puntos').click(function() {
				        chart.series[$("#hd_variable").val()].update({
				            marker: {
				                enabled: enableMarkers
				            }
				        });
				        enableMarkers = !enableMarkers;
				    });		
				    // Toggle point markers	

				    $('#btn_data-color').click(function() {
				        if($("#cbo_nac_dep").val()== 0){ chart_nac.series[0].update({ color:  Highcharts.getOptions().colors[num_color] }); }else{ chart.series[0].update({ color:  Highcharts.getOptions().colors[num_color] });}
				        num_color++; if (num_color ==11){num_color = 1; };
				    });

				    $('#btn_data-print').click(function() {
				    	if($("#cbo_nac_dep").val()== 0){chart_nac.print();}else{chart.print(); }
				    });

				    $('#data-download').click(function() {
				    	if($("#cbo_nac_dep").val()== 0){// grafico nacional
				    			chart_nac.exportChart({
				    				type: "image/png",
				                	sourceHeight:chart_nac.chartHeight,
				                	sourceWidth:chart_nac.chartWidth,				    			
				                	scale:2000,	
				                	filename: 'CENPESCO-'+ num_tabulado ,
				                	useHTML: true,			    			
				                }); 

				    		// if ($("#cbo_type_graph_nac").val()== 0) {

				    		// }else{
				    		// 	chart_nac.exportChart({
				    		// 		type: "image/png",
				      //           	sourceHeight:1000,
				      //           	sourceWidth:1200,				    			
				      //           	scale:2000,	
				      //           	filename: 'CENPESCO-'+ num_tabulado ,			    			
				      //           }); 
				    		// }	
				    	}else{
							chart.exportChart({
								type: "image/png",
								filename: 'CENPESCO_' + num_tabulado + '-' + $("#hd_variable").val(),
							});
						}
				    });

				    //Plot line
				    $("#btn_plot-line").click(function() {
				    	chart.yAxis[0].removePlotLine();
				    	var valor_plot = valor_nac[$("#hd_variable").val()];
				        if (plotline) {
				            chart.yAxis[0].addPlotLine({
					            value: valor_plot,
					            color: 'red',
					            width: 2,
					            label: {
					                text: 'Perú: ' + (valor_plot).toString().replace('.',',') +'%',						                
					                style: {
					                    color: 'red',
					                    fontSize:'20px',
					                    fontWeight: 'bold',
					                },
					                align: 'right',					                
					            },
					             zIndex: 5,
					             dashStyle: 'longdashdot',
					             //id: 'plot-line-1'
				            });
				            $(this).html('Quitar nacional');
				        } else {
				            $(this).html('Mostrar nacional');
				        }
				        plotline = !plotline;
				    });

				    /* eventos inicializadores ---------------------------------------------------------------------- */
						set_max_y_value(0);// iniciando MAX VALOR con la primera variables
						$('#cbo_nac_dep').trigger('change');

				    /* eventos inicializadores ---------------------------------------------------------------------- */

			//*****		
				

		//});

	}); 	
				

</script>