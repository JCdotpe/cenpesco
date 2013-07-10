<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?php echo base_url('js/vendor/geoxmlv3.js'); ?>"></script>
<script src="<?php echo base_url('js/vendor/ProjectedOverlay.js'); ?>"></script>
<div class="row-fluid">
  <div id="ap-sidebar" class="span2">
  	<?php $this->load->view('convocatoria/includes/sidebar_view.php'); ?>
  </div>
  <div id="ap-content" class="span10">
<div id="map" style="width: 100%; height: 500px"></div>

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a id="acordion" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Mostrar Datos Consolidados
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
			<table class="table table-hover table-condensed">
			              <thead>
			                <tr>
			                  <th>Departamento</th>
			                  <th>Centros Poblados</th>
                        <th>Coordinador Departamental</th>
                        <th>Asistente de Coordinador</th>
			                  <th>Empadronadores</th>
			                  <th>Total</th>
			                  <th>Inscritos</th>                       
                        <th>Coordinador Departamental</th>
                        <th>Asistente de Coordinador</th>
                        <th>Empadronadores</th>
                        <th>PEA a Capacitar</th>
			                  <th>Seleccionados</th>
			                </tr>
			              </thead>
			              <tbody>

			        <?php $i = 0;foreach($ptsdep->result() as $p){ ?>
			                <tr class="<?= ($i++ % 2 == 0) ? "strip-table" : ""; ?>">
			                  <td><?php echo $p->SEDE; ?></td>
			                  <td><?php echo $p->centro_poblado; ?></td>
                        <td><?php echo $p->coordinador_departamental; ?></td>
                        <td><?php echo $p->asis_coordinador_departamental; ?></td>
			                  <td><?php echo $p->empadronadores; ?></td>
			                  <td><?php echo $p->total_pea; ?></td>
			                  <td style="color:green"><?php echo $nro[$p->SEDE_COD]->numero; ?></td>
                        <?php $class4 = ($nro_4[$p->SEDE_COD]->numero >= $p->coordinador_departamental) ? 'green' : 'red'; ?>
                        <td style="color:<?php echo $class4; ?>"><?php echo $nro_4[$p->SEDE_COD]->numero; ?></td>
                        <?php $class3 = ($nro_3[$p->SEDE_COD]->numero >= $p->asis_coordinador_departamental) ? 'green' : 'red'; ?>
                        <td style="color:<?php echo $class3; ?>"><?php echo $nro_3[$p->SEDE_COD]->numero; ?></td>
                        <?php $class1 = ($nro_1[$p->SEDE_COD]->numero >= $p->empadronadores) ? 'green' : 'red'; ?>
                        <td style="color:<?php echo $class1; ?>"><?php echo $nro_1[$p->SEDE_COD]->numero; ?></td> 
                        <td><?php echo $p->pea_capacitar; ?></td>                      
			                  <td><?php echo $nrocap[$p->SEDE_COD]->numero; ?></td>
			                </tr>                               
			         <?php } 	?>       
			              </tbody>
			</table>
      </div>
    </div>
  </div>
</div>


  </div>
</div>
<?php $this->load->view('convocatoria/includes/footer_view.php'); ?>

<script type="text/javascript">

      var gmarkers = [];
      var map = null;
      var category = "";

      var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(150,50)
        });

      // A function to create the marker and set up the event window
      function createMarkerLEN(latlng,name,html,category) {
          var contentString = html;           
          var marker = new google.maps.Marker({
              position: latlng,
              map: map,
              title: name,
              zIndex: Math.round(latlng.lat()*-100000)<<5
              });
              // === Store the category and name info as a marker properties ===
              marker.mycategory = category;                                 
              marker.myname = name;

              gmarkers.push(marker);

              google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent(contentString); 
              infowindow.open(map,marker);
              });
      }

      function initialize() {
         var infowindow = null;
          var myOptions = {
            zoom: 5,
            center: new google.maps.LatLng(-7.1663,-71.455078),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: true,
            zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.RIGHT_CENTER
            },
            streetViewControl: true,
            streetViewControlOptions:{
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.RIGHT_CENTER 
            } 
        }
        
          map = new google.maps.Map(document.getElementById("map"), myOptions);

          google.maps.event.addListener(map, 'click', function() {
            if (infowindow !== null) {
              google.maps.event.clearInstanceListeners(infowindow); 
              infowindow.close();
              infowindow = null;
            }
              });

          var kmlURL = CI.base_url + "kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          var kmlURL = "http://www.uxglass.com/kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          kmlLayer = new google.maps.KmlLayer(kmlURL, {preserveViewport:true});
          kmlLayer.setMap(map);


          //var myParser = new geoXML3.parser({map: map});
          //myParser.parseKmlString('<?php //echo $dptoskml; ?>');
          }

    $("#acordion").click(function(e) { 
            // Prevent a page reload when a link is pressed
          e.preventDefault(); 
            // Call the scroll function
          goToByScroll($(this).attr("id"));           
      });
    
  	$(function(){
        initialize();

        <?php foreach($ptsdep->result() as $pt){
            $prev = explode(" ", $pt->CENTRO);
            echo 'var lat =' . $prev[1] . ';';
            echo 'var lng =' . $prev[0] . ';';                
            echo 'var point = new google.maps.LatLng(lat,lng);';
            echo 'var html = \'<div class="marker activeMarker"><div class="markerInfo activeInfo" style="display: block"><h3>' . $pt->SEDE . '</h3><p><b>A Capacitar: </b>' . $pt->pea_capacitar . '</p><p><b>Inscritos: </b>' . $nro[$pt->SEDE_COD]->numero . '</p><p style="color:red"><b>Seleccionados: </b>' . $nrocap[$pt->SEDE_COD]->numero . '</p></div></div>\';';     
            echo 'var marker = createMarkerLEN(point, \'' . $pt->SEDE . '\', html);';            
        } ?>      

              

    });
</script>

<?php //print_r($nro); ?>