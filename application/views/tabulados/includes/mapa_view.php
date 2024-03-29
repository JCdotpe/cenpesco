<script src="http://cdnjs.cloudflare.com/ajax/libs/openlayers/2.12/OpenLayers.js"></script>
<!-- <script src="<?php echo base_url('js/vendor/jquery.printElement.min.js'); ?>"></script>-->
<script src="<?php echo base_url('js/vendor/jquery.printElement.js'); ?>"></script>

<link rel="stylesheet"   media="all" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
<link rel="stylesheet"  type="text/css" media="print,screen" href="<?php echo base_url('css/main.css'); ?>">

<!--<script type="text/javascript"  src="<?php echo base_url('js/openlayers/OpenLayers.js'); ?>"></script>-->
<!--<script type="text/javascript"  src="cenpesco/js/openlayers/OpenLayers.js"></script>-->


	<div style="text-align: center">

	</div>

    <div class="tab-content inei">

          <div id="feature_map" class="hidden-phone tab-pane active" >
          		<div class="row-fluid">
          				<div class="span2" style="position:relative;top:210px;">
			          			<div> 
								    <div class="btn-group">
								        <button class="btn btn-warning">Variables del tabulado</button>
								        <button data-toggle="dropdown" class="btn-warning btn dropdown-toggle"><span class="caret"></span></button>
								        <ul id="combo-map" class="dropdown-menu">
				          					<?php $v=0;
				          						foreach ($series as  $y) {
				          							foreach ($y as $i => $k) {
				          								echo (  ($i == 'name' &&  $k != 'No especificado' && $k != 'TOTAL' ) ? '<li value='.$v.'><a >'. $k.'</a></li>' :'' );
				          							}
				          							$v++;
				          						}
				          				 	?>
								        </ul>
								    </div>
			          			</div >
			          			<hr>
          				</div>
						<div class="span7">	<div id="map-tematico" class="hidden-phone" style="height:1052px; width:910px; margin: 0 auto !important;"> </div> </div>
						<div class="span3" ><input class="btn-warning btn" type="button" value="IMPRIMIR" id="btn_imprimir" /><div id="image_var" style="position:relative;top:550px;"></div></div>
				</div>
          </div>

    </div>

 




	<script type="text/javascript">
		var mi_json;

		$(function(){ // carga al inicio		

			var mi_json = (function () {
		
			    var json = null;
			    $.ajax({
			        'async': false,
			        'global': false,
			        'url': CI.site_url + 'json/mapa.json',
			        'dataType': "json",
			        'success': function(data) {
			            json = data;
			        }
			    });
			    return json;
			})(); 



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
			    if (valor_acu ==0) {valor_acu = 0.5;};
			    valor_medio = valor_min + valor_acu;
			    //valor_medio = 248;
			    valor_max = valor_medio+valor_acu; 					    	

			    var tipo_dato = 'PORCENTAJE %'; var resto = 0.1;
			    if(valor_max>100){tipo_dato = 'ABSOLUTO'; resto = 1;};

			    //$("#map-tematico").html('<div><div style="position:absolute;"><div id="img_mapa"style="position:absolute;" class="row-fluid"> </div>  <div id="title"></div> 	</div>	<div id="porcentaje"> <strong>' + tipo_dato + '</strong> </div> 	<div id="cuadro_uno"><div class="cuadro_porc" id="cuadro_num1"></div> </div> <div id="cuadro_dos"><div class="cuadro_porc" id="cuadro_num2"></div> </div>  <div id="cuadro_tres"><div class="cuadro_porc" id="cuadro_num3"></div> </div>  </div>');
			    $("#map-tematico").html('<div style="position:relative;"><div ><div id="img_mapa"style="position:absolute;" class="span12"> </div>  </div>	<div id="porcentaje"> <strong>' + tipo_dato + '</strong> </div> 	<div id="cuadro_uno"><div class="cuadro_porc" id="cuadro_num1"></div> </div> <div id="cuadro_dos"><div class="cuadro_porc" id="cuadro_num2"></div> </div>  <div id="cuadro_tres"><div class="cuadro_porc" id="cuadro_num3"></div> </div>  </div>');
			    $("#img_mapa").append('<div class = "span2" style = "position:relative"><img style="margin-top: 2.5px;height: 90px;" src="<?php echo  base_url('img/inei.gif'); ?>"/>');
			    $("#img_mapa").append("<div id='title' class='span8' style='margin:0px;'><h3> "+ name_mapa[var_num] + "</h3></div>");			    
			    $("#img_mapa").append('<div id="img_mapa_left" class="span2" ><img style="margin-top: 2.5px;height: 90px;width: 82px;" src="<?php echo  base_url('img/cenpesco.png'); ?>"/></div>');
			    //$("#img_mapa").append('<div id="img_mapa_left" class = "span2" ></div>');

			 	// var imagen = new Image();
			 	// imagen.src = "<?php echo  base_url('img/tabulados/cuadro'.$opcion.'.jpg'); ?>";
				// imagen.onload = function(){
				// if (imagen.width >0 ) { $("#img_mapa").html("<img style='margin-top: 2.5px;height: 168px;' src='<?php echo  base_url('img/tabulados/cuadro'.$opcion.'.jpg'); ?>'  />");  }; //CHECK EXIST

				// }

			    //$("#title").html("<h3>MAPA TEMÁTICO N° <?php echo sprintf('%02d', $opcion); ?> </h3><h3><strong> "+ name_mapa[var_num] + "</strong></h3>");
			    $("#cuadro_num1").html("<strong>De "+valor_min+" - "+ (valor_medio-resto)+" </strong>");
			    $("#cuadro_num2").html("<strong>De "+valor_medio+" - "+ (valor_max-resto)+" </strong>");
			    $("#cuadro_num3").html("<strong>De "+valor_max+" a más </strong>");

    var options = { 

                  };
			    map_thematic = new OpenLayers.Map('map-tematico',{
			    	    controls: [
				    ]},
    			options);
			    var vectors = new OpenLayers.Layer.Vector("vector", {isBaseLayer: true});
			    map_thematic.addLayers([vectors]);

					    	$.each(mi_json, function(index) {
					    		var geo = mi_json[index].geo;
					    		var cen = mi_json[index].cen;
					    		var ubi = mi_json[index].ubi;
					    		var valor = (valor_dep[var_num][index]).toFixed(1);							    		
					    		var nom = mi_json[index].nom;
					    		if (index == 4 || index == 5) { nom = '\n'+ nom };//<br> a CAJAMARCA Y AYACUCHO
					    		nom = nom +'\n' + ((valor.toString()).replace(".",","));
					    		nom = nom + '\n' + '[' + valor_dep_abs[var_num][index] + ']'; 

					    		var format = new OpenLayers.Format.WKT();
					    		var createPOLYGON = format.read("POLYGON(("+geo+"))");
					    		
					    		createPOLYGON.attributes = {cen: cen, nom: nom, ubi: ubi, valor: valor};
					    		
					            var m1 = "#D8E4BC";
					            var m2 = "#95B3D7";
					            var m3 = "#E26B0A";

					            // porcentaje
						            if(valor < valor_medio){
						                thematic = m1;
						            }else if(valor < valor_max){
						                thematic = m2;
						            }else if(valor >= valor_max){
						                thematic = m3;
						            }else{
						            	alert('medio: '+valor_medio + ', max: ' + valor_max + ', valor: ' + valor);
						            }
						        //    
					    		
					    		//createPOLYGON.style = {fill: true, fillColor: thematic, strokeWidth: "1", strokeColor: "#e1e1e1", label:nom};
					    		createPOLYGON.style = {fill: true, fillColor: thematic, strokeWidth: "1", strokeColor: "#F3C768", label:nom, fontSize:"14"};

					    		vectors.addFeatures(createPOLYGON);

					        });// end each data


			    // Map Center 
			    var lon = -75.240009714081; 
			    var lat = -9.050000000075;
			    var zoom = 6;
			    map_thematic.setCenter(new OpenLayers.LonLat(lon, lat), zoom);
			   //map_thematic.size.h = 300;
			    
			} // end init


			$("ul li").click(function(e) {
				if( $(this).parent().attr('id') == "combo-map"){
					init_tematico($(this).val()); 
					$("#image_var").empty();
					var url = "<?php echo  base_url('img/tabulados/cuadro'.$opcion); ?>" + "-" + (parseInt($(this).val()) + 1) + ".png";
					$.ajax({	
							url:url,
							type:'HEAD',
							error:function() { console.log('error de imagen al cargar') }, 
							success: function(){ $("#image_var").html("<img style='margin-top: 2.5px;height: 168px;' src='"+ url +"'  /><hr size='3'>") },
					});						
				}
			});



			//$("#combo_map").trigger('change');
			init_tematico(0);
			var url = "<?php echo  base_url('img/tabulados/cuadro'.$opcion); ?>" + "-1.png";
			$.ajax({	
					url:url,
					type:'HEAD',
					error:function(){console.log('error de imagen al cargar')}, 
					success: function(){ $("#image_var").html("<img style='margin-top: 2.5px;height: 168px;' src='"+ url +"'  /><hr size='3'>") },
			});







		

		    $("#btn_imprimir").click(function () {

		    	$("#map-tematico").printElement({printMode:'popup'});

				// $("#map-tematico").printElement(
				//             {printMode:'popup',
				//             overrideElementCSS:[
				// 		"<?php echo base_url('css/bootstrap.min.css'); ?>",
				// 		{ href:"<?php echo base_url('css/main.css'); ?>",media:'print'}]
				//             });


		    })
		    
		    // function Popup(data) 
		    // {
		    //     var mywindow = window.open('', 'my div', 'height=1160,width=928');
		    //     mywindow.document.write('<html><head><title>my div</title>');
		    //     /*optional stylesheet*/ //
		    //     mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>" type="text/css" />');
		    //     mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />');
		    //     mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.spacelab.css'); ?>" />');
		    //     mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>" />');
		    //     mywindow.document.write('</head><body >');
		    //     mywindow.document.write(data);
		    //     mywindow.document.write('</body></html>');

		    //     mywindow.print();
		    //     mywindow.close();

		    //     return true;
		    // }

		})	
	</script>
