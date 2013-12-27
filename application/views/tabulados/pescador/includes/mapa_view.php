			<div style="text-align: center">

			</div>

        <div class="tab-content inei">
          			<div> 
          				<select id="combo_map">
          					<?php $v=0;
          						foreach ($series as  $y) {
          							foreach ($y as $i => $k) {
          								echo ( ($i == 'name') ? '<option value='.$v.'>'. $k.'</option>' :'' );
          							}
          							$v++;
          						}
          				 	?>
          				</select>
          			</div >     	
          <div id="feature_map" class="hidden-phone tab-pane active" >


					<div id="map-tematico" class="hidden-phone" style="height:1052px; width:810px; margin: 0 auto !important"> 

							<!-- <div>
								<div style="position:absolute;">   
									<div id="title"></div> 
								</div>
								<div id="porcentaje"> <strong>PORCENTAJE</strong> </div> 
								<div id="cuadro_uno"><div class="cuadro_porc" id="cuadro_num1"></div> </div> 
								<div id="cuadro_dos"><div class="cuadro_porc" id="cuadro_num2"></div> </div>  
								<div id="cuadro_tres"><div class="cuadro_porc" id="cuadro_num3"></div> </div>  
							</div> -->

					</div> 

          </div>
        </div>
			<script src="http://cdnjs.cloudflare.com/ajax/libs/openlayers/2.12/OpenLayers.js"></script>
			<!--<script type="text/javascript"  src="<?php echo base_url('js/openlayers/OpenLayers.js'); ?>"></script>-->
			<!--<script type="text/javascript"  src="cenpesco/js/openlayers/OpenLayers.js"></script>-->

			<script type="text/javascript">

				var mi_json = (function () {
				    var json = null;
				    $.ajax({
				        'async': false,
				        'global': false,
				        'url': '/cenpesco/json/mapa.json',
				        'dataType': "json",
				        'success': function (data) {
				            json = data;
				        }
				    });
				    return json;
				})(); 


				//guardando en ARRAY JS los valores de $series
				<?php 
					$k = 0;
					echo 'var valor_dep'.' = new Array();';
					foreach ($series  as $index => $filas) { 
						echo '  valor_dep['.$index.'] =  new Array();';
							foreach ($series[$index]['data'] as $key => $value) {
							echo 'valor_dep['.$index.']['.$k.'] = ' . $value.';' ;$k++;
						}$k = 0;
					}
				?>

				//guardando los nombres
				<?php 
  						$v=0;
  						echo 'var name_var = new Array();';
  						foreach ($series as  $y) {
  							foreach ($y as $i => $k) {
  								echo ( ($i == 'name') ? 'name_var['.$v.'] = "'. $k . '";' :'' );
  							}
  							$v++;
  						}
				?>


				function init_tematico(var_num){
						$("#map-tematico").empty();
					    var valor_min = 100;
					    var valor_medio = 0;
					    var valor_max = 0;
					    var valor_acu = 0;

					    for (var i = 0; i < 24; i++) {
					    	if (valor_dep[var_num][i] > valor_max) {
					    		valor_max = valor_dep[var_num][i];
					    	} 
					    	if (valor_dep[var_num][i] < valor_min) {
					    		valor_min = valor_dep[var_num][i];
					    	}
					    };
					    valor_min =  Math.floor(valor_min);
					    valor_acu = Math.round(((valor_max-valor_min)/3));

					    //if(valor_acu % 3 == 0){
						    valor_medio = valor_min + valor_acu;
						    valor_max = valor_medio+valor_acu; 					    	
					    // }else {
					    // 	valor_medio = valor_min + valor_acu + 1;
						   //  valor_max = valor_medio+valor_acu; 	
					    // }

					    $("#map-tematico").html('<div><div style="position:absolute;">  <div id="title"></div> 	</div>	<div id="porcentaje"> <strong>PORCENTAJE</strong> </div> 	<div id="cuadro_uno"><div class="cuadro_porc" id="cuadro_num1"></div> </div> <div id="cuadro_dos"><div class="cuadro_porc" id="cuadro_num2"></div> </div>  <div id="cuadro_tres"><div class="cuadro_porc" id="cuadro_num3"></div> </div>  </div>');

					    $("#title").html("<h3>MAPA TEMÁTICO N° <?php echo sprintf('%03d', $opcion); ?> </h3><h2> <?php echo $c_title; ?></h2> <h4> "+ name_var[var_num]+"</h4>");
					    $("#cuadro_num1").html("<strong>De "+valor_min+" - "+ (valor_medio-0.1)+" </strong>");
					    $("#cuadro_num2").html("<strong>De "+valor_medio+" - "+ (valor_max-0.1)+" </strong>");
					    $("#cuadro_num3").html("<strong>De "+valor_max+" a más </strong>");


					    map_thematic = new OpenLayers.Map('map-tematico', {controls:[]});
					    var vectors = new OpenLayers.Layer.Vector("vector", {isBaseLayer: true});
					    map_thematic.addLayers([vectors]);
					
							    	$.each(mi_json, function(index) {
							    		var geo = mi_json[index].geo;
							    		var cen = mi_json[index].cen;
							    		var nom = mi_json[index].nom;
							    		var ubi = mi_json[index].ubi;
							    		var valor = valor_dep[var_num][index];

							    		var format = new OpenLayers.Format.WKT();
							    		var createPOLYGON = format.read("POLYGON(("+geo+"))");
							    		
							    		createPOLYGON.attributes = {cen: cen, nom: nom, ubi: ubi, valor: valor};
							    		
							            var m1 = "#A1F3DD";
							            var m2 = "#AED8FF";
							            var m3 = "#FFCCCC";

							            // porcentaje
								            if(valor < valor_medio){
								                thematic = m1;
								            }else if(valor < valor_max){
								                thematic = m2;
								            }else if(valor > valor_max){
								                thematic = m3;
								            }
								        //    
							    		

							    		//createPOLYGON.style = {fill: true, fillColor: thematic, strokeWidth: "1", strokeColor: "#e1e1e1", label:nom};
							    		createPOLYGON.style = {fill: true, fillColor: thematic, strokeWidth: "1", strokeColor: "#006699", label:nom};

							    		vectors.addFeatures(createPOLYGON);

							        });// end each data


					    // Map Center 
					    var lon = -75.056629714081; 
					    var lat = -9.06036873877975;
					    var zoom = 6;
					   
					    map_thematic.setCenter(new OpenLayers.LonLat(lon, lat), zoom);
					    
					} // end init



				$("#combo_map").change(function(){

					init_tematico($(this).val());

				})



				$(function(){
					$("#combo_map").trigger('change');
				})	
					



			</script>