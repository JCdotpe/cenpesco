<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?php echo base_url('js/vendor/geoxmlv3.js'); ?>"></script>

<?php 

$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');

$span_class =  'span12';

  // CARGAR COMBOS

  //$sedeArray = array(-1 =>' -'); 
    $sedeArray = NULL;
    foreach($sede->result() as $filas)
    {
      $sedeArray[$filas->SEDE_COD]=strtoupper($filas->NOM_SEDE);
    }
  $depaArray =  array(-1 => '-' );
  $equipoArray = array(-1 => '-'); 


?>

<?php

      echo '<div id="map_seg" style="width: 100%; height: 100%"></div>';
    echo '</div>';
    echo '<div class="filtro_map preguntas_sub2 span2">';

          echo '<div class="row-fluid control-group span9">';
                echo form_label('SEDE OPERATIVA','NOM_SEDE',$label1);
              echo '<div class="controls span">';
                echo form_dropdown('NOM_SEDE', $sedeArray, FALSE,'class="span12" id="NOM_SEDE"'); 
              echo '</div>';
          echo '</div>';  

          echo '<div class="row-fluid control-group span9">';
                  echo form_label('DEPARTAMENTO','NOM_DD',$label1);
                  echo '<div class="controls">';
                    echo form_dropdown('NOM_DD', $depaArray, FALSE,'class="span12" id="NOM_DD"'); 
                  echo '</div>';  
          echo '</div>';   

          echo '<div class="row-fluid control-group span9">';
                echo form_label('EQUIPO','EQUIPO',$label1);
                echo '<div class="controls span">';
                  echo form_dropdown('EQUIPO', $equipoArray, FALSE,'class="span12" id="EQUIPO"'); 
                echo '</div>';  
          echo '</div>'; 


?>

<script type="text/javascript">
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
        
          map = new google.maps.Map(document.getElementById("map_seg"), myOptions);

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
// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

  $("#NOM_SEDE, #NOM_DD, #EQUIPO").change(function(event) {
          var sel = null;
          var sede = $('#NOM_SEDE');
          var dep = $('#NOM_DD');
          var url = null;
          var cod = null;
          var op =null;

          switch(event.target.id){
              case 'NOM_SEDE':
                  sel     = $("#NOM_DD");
                  url     = CI.base_url + "ajax/marco_ajax/get_ajax_dep/" + $(this).val();
                  op      = 1;
                  break;
              case 'NOM_DD':
                  sel     = $("#EQUIPO");
                  url     = CI.base_url + "ajax/marco_ajax/get_ajax_equipo/"  + sede.val()  + "/" + $(this).val();
                  op      = 2;
                  break;   
          }     
          
          var form_data = {
              code: $(this).val(),
              csrf_token_c: CI.cct,
              dep: dep.val(),
              ajax:1
          };

          if(event.target.id != 'EQUIPO')
          {

          $.ajax({
              url: url,
              type:'POST',
              data:form_data,
              dataType:'json',
              success:function(json_data){
                  sel.empty();
                    
                  $.each(json_data, function(i, data){
                      if (op==1){
                          sel.append('<option value="' + data.CCDD + '">' + data.DEPARTAMENTO + '</option>');
                      }
                      if (op==2){
                          sel.append('<option value="' + data.CCDD + '">' + data.DEPARTAMENTO + '</option>');
                     }

                  });
                 
                  if (op==1){
                      $("#NOM_DD").trigger('change');
                      }  
              }
          });   
       }
    
  }); 

  //departamento

   $("#NOM_SEDE").trigger('change');




 }); 


  







</script>