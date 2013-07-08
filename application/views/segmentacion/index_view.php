     

<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?php echo base_url('js/vendor/geoxmlv3.js'); ?>"></script>
<div class="row-fluid">
  <div class="span3">
          <div class="well sidebar-nav cen-sidebar cen-sidebar-fix">
            <ul class="nav nav-list">
              <li class="nav-header">Opcionesxxx</li>

              <li><a href="<?php echo base_url('convocatoria/consulta'); ?>" target="_blank">Módulo de consulta</a></li>
            
              <li>
                  <div class="accordion" id="accordion3">
                    <div class="accordion-group">
                      <div class="accordion-heading">
                        <a data-toggle="collapse" data-parent="#accordion3" href="#collapseThree">
                         Prueba Piloto
                        </a>
                      </div>
                      <div id="collapseThree" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <label class="checkbox">
                            <?php 
                                echo form_checkbox('piloto', 'piloto', FALSE, 'class="piloto-cp-checkbox"');
                                echo 'Centros Poblados';
                            ?>
                            </label>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>   

              <li>
                  <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                      <div class="accordion-heading">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                         Departamentos Caletas
                        </a>
                      </div>
                      <div id="collapseTwo" class="accordion-body collapse">
                        <div class="accordion-inner">
                          <?php 
                          foreach ($dptos->result() as $dpto) {
                          ?>
                            <label class="checkbox">
                            <?php 
                                echo form_checkbox($dpto->DES_DISTRITO, $dpto->COD_DEPARTAMENTO, FALSE, 'class="seg-cp-checkbox"');
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
<!-- <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.pe/?ie=UTF8&amp;ll=-9.275622,-73.146973&amp;spn=12.273067,21.643066&amp;t=m&amp;z=6&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.pe/?ie=UTF8&amp;ll=-9.275622,-73.146973&amp;spn=12.273067,21.643066&amp;t=m&amp;z=6&amp;source=embed" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small> -->
<div id="map" style="width: 100%; height: 500px"></div>
  </div>
    <script type="text/javascript">
    //<![CDATA[

      var gmarkers = [];
      var map = null;
      var category = "";

      var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(150,50)
        });

      // A function to create the marker and set up the event window
      function createMarkerLEN(latlng,name,html,category,icon) {
          var contentString = html;
          var color = null;
              if(icon=== 'PIURA')
                color = CI.base_url + 'img/blank2.png';
              else if(icon=== 'LORETO')
                color = CI.base_url + 'img/blank1.png';      
              else if(icon=== 'PUNO')
                color = CI.base_url + 'img/blank3.png';               
                   
          var marker = new google.maps.Marker({
              position: latlng,
              map: map,
              icon: color,
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
              infowindow.close();
              });

          var kmlURL = CI.base_url + "kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          var kmlURL = "http://www.uxglass.com/kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          kmlLayer = new google.maps.KmlLayer(kmlURL, {preserveViewport:true});
          kmlLayer.setMap(map);
          }
          $(function(){
              initialize();
            });
    //]]>

</script>
</div>