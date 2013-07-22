
  

<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?php echo base_url('js/vendor/geoxmlv3.js'); ?>"></script>
<script src="<?php echo base_url('js/vendor/glabel.js'); ?>"></script>
            <style type="text/css">
               .glabels {
  background: none repeat scroll 0 0 transparent;
    border: 0 none;
    color: #000;
    font-family: "Lucida Grande","Arial",sans-serif;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
    white-space: nowrap;
    width: auto;
               }
               
            </style>   
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

          echo '<div class="row-fluid control-group span9">';
                echo '<div class="controls span">';
                echo '<a id="export" class="btn btn-inverse span12" href="#">Exportar a excel</a>';
                echo '</div>';  
          echo '</div>'; 


          // echo '<div class="row-fluid control-group span9">';
          //       echo form_label('RUTA','RUTA',$label1);
          //       echo '<div class="controls span">';
          //         echo form_dropdown('RUTA', $equipoArray, FALSE,'class="span12" id="RUTA"'); 
          //       echo '</div>';  
          // echo '</div>'; 
?>

<script type="text/javascript">
var gmarkers = [];
      var map = null;
      var category = "";

      var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(300,400)
        });

      // A function to create the marker and set up the event window
      function createMarkerLEN(latlng,name,html,category,icon,texto) {
          var contentString = html;
          var color = null;
              if(icon=== 'A')
                color = CI.site_url + 'img/blank1.png';
              else if(icon=== 'B')
                color = CI.site_url + 'img/blank3.png';      
              else if(icon=== 'C')
                color = CI.site_url + 'img/blank2.png';                 
     
          var marker = new MarkerWithLabel({
              draggable: false,
              raiseOnDrag: false,
              position: latlng,
              map: map,
              icon: color,
              title: name,
              zIndex: Math.round(latlng.lat()*-100000)<<5,
              labelContent: texto,
              labelAnchor: new google.maps.Point(22, 0),
              labelClass: "glabels", // the CSS class for the label
              labelStyle: {opacity: 0.75}
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
            zoom: 6,
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

          // var kmlURL = CI.base_url + "kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          // var kmlURL = "http://www.uxglass.com/kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          // kmlLayer = new google.maps.KmlLayer(kmlURL, {preserveViewport:true});
          // kmlLayer.setMap(map);
          }

$(function(){
  initialize();
// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->
          var sede = $('#NOM_SEDE');
          var dep = $('#NOM_DD');
  $("#NOM_SEDE, #NOM_DD, #EQUIPO").change(function(event) {
          var sel = null;

          var url = null;
          var cod = null;
          var op =null;



          switch(event.target.id){
              case 'NOM_SEDE':
                  sel     = $("#NOM_DD");
                  url     = CI.rest_url + "segmentacion/dep/sede/" + $(this).val();
                  op      = 1;
                  break;
              case 'NOM_DD':
                  sel     = $("#EQUIPO");
                  url     = CI.rest_url + "segmentacion/equipo/sede/" + sede.val() + "/dep/" + $(this).val();
                  op      = 2;
                  break;
               // case 'EQUIPO':
               //    sel     = $("#RUTA");
               //    url     = CI.rest_url + "segmentacion/ubigeo/sede/" + sede.val() + "/dep/" + dep.val() + "/equipo/" + $(this).val();
               //    op      = 3;
               //    break;                      
          }     
          
          // var form_data = {
          //     code: $(this).val(),
          //     csrf_token_c: CI.cct,
          //     dep: dep.val(),
          //     ajax:1
          // };

          if(event.target.id != 'EQUIPO')
          {

          $.ajax({
              url: url,
              type:'GET',
              // data:form_data,
              dataType:'json',
              success:function(json_data){
                  sel.empty();
                  $.each(json_data, function(i, data){
                      if (op==1){
                          sel.append('<option value="' + data.CCDD + '">' + data.DEPARTAMENTO + '</option>');
                          
                      }
                      if (op==2){
                          sel.append('<option value="' + data.equipo + '">' + data.equipo + '</option>');
                          // $("#EQUIPO").trigger('change');
                     }
                  });
                 if(op==1){
                    $("#NOM_DD").trigger('change');
                 }

                if(op==2){
                    $("#EQUIPO").trigger('change');
                 }                
              }
          });   
       }
    
  }); 

  //departamento

   $("#NOM_SEDE").trigger('change');



$("#EQUIPO").change(function() {
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == '1') {
            gmarkers[i].setVisible(false);
          }
        } 
        $.ajax({   
            url: CI.rest_url + "segmentacion/mapas/sede/" + sede.val() + "/dep/" + dep.val() + "/equipo/" + $(this).val(),
            type:'GET',
            // data:form_data,
            dataType:'json',
            success:function(json_data){
                $.each(json_data, function(i, data){
                    var lat = data.laty;
                    var lng = data.longx;                
                    var point = new google.maps.LatLng(lat,lng);
                    var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>CCPP - " + data.centro_poblado + "</h3><p><b>DEPARTAMENTO:</b> "+data.departamento+"</p><p><b>PROVINCIA:</b> "+data.provincia+"</p><p><b>DISTRITO:</b> "+data.distrito+"</p><p><b>NUMERACION:</b> "+data.numeracion+"</p></div></div>";     
                    var marker = createMarkerLEN(point, data.centro_poblado, html, '1', data.CONC_CONV,data.centro_poblado + ' [' + data.numeracion+ ']'  + ' - '+data.ccpp_acomp);
                });
            }
        });   
});


 }); 

  







</script>

</div>


<div id="header" style="display: block;">
  <a id="logo" href="#"><img src="http://webinei.inei.gob.pe/convocatorias/cnpc/img/brand.png" alt="I CENPESCO"></a> 
  <div id="oted">Oficina Técnica de Estadísticas Departamentales - OTED</div>
</div>    


<div id="footer">
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span9">
      <p>LEYENDA:  <img src="<?php echo base_url('img/blank1.png') ; ?>" />  Centros poblado de concentración (MET. 1), <img src="<?php echo base_url('img/blank3.png') ; ?>" /> Centros poblados convocados (MET. 1), <img src="<?php echo base_url('img/blank2.png') ; ?>" /> Centro poblado (MET. 2)</p>
    </div>

    <div class="span3">
      <p class="pull-right">JEFE DE BRIGADA</p>
     
    </div>    

 

      <script type="text/javascript">

        $('#export').click(function() {

            window.location = CI.base_url + 'segmentacion/consulta/export_jefe/'+ $("#NOM_SEDE").val()+ '/'+ $("#NOM_DP").val() + '/' +$("#EQUIPO").val();  
  
          } );

      </script>


  </div>
</div>
</div>  