 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
 <link rel="stylesheet" href="<?php echo base_url('css/leaflet.css'); ?>">
<!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php echo base_url('css/leaflet.ie.css'); ?>">
<![endif]-->


<script src="<?php echo base_url('js/vendor/leaflet.js'); ?>"></script>
<script src="<?php echo base_url('js/vendor/Scale.js'); ?>"></script>
<script src="<?php echo base_url('js/vendor/Google.js'); ?>"></script>
<div class="row-fluid">
  <div class="span3">
          <div class="well sidebar-nav cen-sidebar cen-sidebar-fix">
            <ul class="nav nav-list">
              <li class="nav-header">Opcionesppp</li>
              <li><a href="<?php echo base_url('convocatoria/consulta'); ?>" target="_blank">Módulo de consulta</a></li>
              <li>
                  <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                      <div class="accordion-heading">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                         Departamentos
                        </a>
                      </div>
                      <div id="collapseTwo" class="accordion-body collapse in">
                        <div class="accordion-inner">
                          <?php 
                          foreach ($dptos->result() as $dpto) {
                          ?>
                            <label class="checkbox">
                            <?php 
                                echo form_checkbox($dpto->DES_DISTRITO, $dpto->COD_DEPARTAMENTO, FALSE, 'class="seg-cp-checkbox" autocomplete="off"');
                                echo $dpto->DES_DISTRITO;
                            ?>
                            </label>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
            </ul>
          </div><!--/.well -->
</div><!--/span-->

  <div class="span9">

<div id="map"></div>
  </div>
  </div>
  <script type="text/javascript">

	$(function(){
		var map = L.map('map').setView(new L.LatLng(-9.06036873877975, -75.056629714081), 5);
		var mpn = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
		var goo = new L.Google();
		map.addLayer(goo);
		map.addControl(new L.Control.Layers({'Google':goo,'OSM':mpn} ));
		map.addControl(new L.Control.Scale({width: 100, position: 'bottomleft'}));

		L.marker([-9.06036873877975, -75.056629714081]).addTo(map)
		 	.bindPopup("<b>Hello world!</b><br />I am a popup.");

		$("input:checkbox.seg-cp-checkbox").change(function() {
		    if (!$(this).is(':checked')) {

		    }else{
		        var form_data = {
		            csrf_token_c: CI.cct,
		            code: $(this).val(),
		            ajax:1
		        };

		        $.ajax({
		            url: CI.base_url + "ajax/cp_ajax/get_cp/"+$(this).val(),
		            type:'POST',
		            data:form_data,
		            dataType:'json',
		            success:function(json_data){
		                $.each(json_data, function(i, data){
			                var lat = data.LATITUD;
			                var lng = data.LONGITUD;                
			                // var point = new google.maps.LatLng(lat,lng);
			                // var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>SITUACIÓN GEOGRÁFICA</h3><p><b>DEPARTAMENTO:</b> "+data.DEPARTAMENTO+"</p><p><b>PROVINCIA:</b> "+data.PROVINCIA+"</p><p><b>DISTRITO:</b> "+data.DISTRITO+"</p></div></div>";     
			                // var marker = createMarkerLEN(point, data.CENTRO_POBLADO, html, data.CCPP);
							L.marker([lat, lng]).addTo(map)
							 	.bindPopup("<b>Hello world!</b><br />" + data.CENTRO_POBLADO);

		            	});
		            }
		        });   

		    }
		});


		// L.circle([51.508, -0.11], 500, {
		// 	color: 'red',
		// 	fillColor: '#f03',
		// 	fillOpacity: 0.5
		// }).addTo(map).bindPopup("I am a circle.");

		// L.polygon([
		// 	[51.509, -0.08],
		// 	[51.503, -0.06],
		// 	[51.51, -0.047]
		// ]).addTo(map).bindPopup("I am a polygon.");


		//var popup = L.popup();

		// function onMapClick(e) {
		// 	popup
		// 		.setLatLng(e.latlng)
		// 		.setContent("You clicked the map at " + e.latlng.toString())
		// 		.openOn(map);
		// }

		// map.on('click', onMapClick);

	});
  </script>