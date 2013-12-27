     
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?php echo base_url('js/vendor/geoxmlv3.js'); ?>"></script>

<?php 

$depArray = array();
    foreach($dptos->result() as $filas)
    {
      $depArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
      echo '<input type="hidden" id="pes_'.$filas->CCDD.'" value ='.$filas->PESCADOR.'>';
      echo '<input type="hidden" id="acu_'.$filas->CCDD.'" value ='.$filas->ACUICULTOR.'>';
      echo '<input type="hidden" id="ambos_'.$filas->CCDD.'" value ='.$filas->AMBOS.'>';
    }
$provArray = array(); 
$distArray = array(); 


 ?>

<div class="row-fluid" style="margin-top:10px;">
    <div style="z-index:2;position:fixed;left:27px;"><button id="btn_geo" >MENU</button></div>
    <div id="geo_menu"class="span2"  style="z-index:2;position:fixed;top:40px;left:-20px; ">
                  <div class="well sidebar-nav cen-sidebar cen-sidebar-fix" style="height: 730px">
                    <ul class="nav nav-list">
                      <li class="nav-header">Departamento</li>

                      <li>
                      	<?php echo form_dropdown('dep', $depArray, FALSE,'class="form-control" id="dep"');  ?>
        				        <br /><div class="row-fluid"><div class="tot_pescadores offset2 span3" id="tot_pes_dep" ></div ><div class="tot_acuicultores span3" id="tot_acu_dep"></div ><div class="tot_pes_acuicultores span3" id="tot_ambos_dep"></div ></div><hr>
                      </li>

                      <li class="nav-header">Provincia</li>
                      <li>
        				        <?php echo form_dropdown('prov', $provArray, FALSE,'class="form-control" id="prov"');  ?>
        				      <br /><div class="row-fluid"><div id="div_provincia"></div><div class="tot_pescadores offset2  span3" id="tot_pes_prov"></div ><div class="tot_acuicultores  span3" id="tot_acu_prov"></div ><div class="tot_pes_acuicultores span3" id="tot_ambos_prov"></div ></div ><hr>
                      </li>

                      <li class="nav-header">Distrito</li>
                      <li>
        				      <?php echo form_dropdown('dis', $distArray, FALSE,'class="form-control" id="dis"');  ?>
                      <br /><div class="row-fluid"><div id="div_distrito"></div><div class="tot_pescadores offset2  span3" id="tot_pes_dist"></div ><div class="tot_acuicultores span3" id="tot_acu_dist"></div ><div class="tot_pes_acuicultores span3" id="tot_ambos_dist"></div ></div ><hr>
                      </li>

        			       <li class="nav-header">Centros Poblados</li>

                      <li>
              			  <div class="form-group" >
              			      <fieldset id="ccpp"> </fieldset>
              			  </div>
                      </li>                            
         

                    </ul>
                  </div><!--/.well -->
    </div><!--/span-->

    <div class="row-fluid" style="width: 100%; height: 1080px">
          <!-- <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.pe/?ie=UTF8&amp;ll=-9.275622,-73.146973&amp;spn=12.273067,21.643066&amp;t=m&amp;z=6&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.pe/?ie=UTF8&amp;ll=-9.275622,-73.146973&amp;spn=12.273067,21.643066&amp;t=m&amp;z=6&amp;source=embed" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small> -->
          <div id="map" style="width: 100%; "></div>
    </div>
  <script type="text/javascript">
   
      var gmarkers = [];
      var map = null;
      var category = "";

      var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(150,50)
        });



      $("#btn_geo").click(function () {
        
            $("#geo_menu").fadeToggle();//show and hide 
      })

      //JSON
      // var json_ccpp = (function () {
      //                 var form_data = {
      //                 csrf_token_c: CI.cct,
      //                 code: $(this).val(),
      //                 ajax:1};
      //                 var jsonss = null;
      //                 $.ajax({
      //                     'async': false,
      //                     'global': false,
      //                     'url': CI.base_url + "ajax/marco_ajax/get_ajax_pes_acu_by_ccpp/",
      //                     //'type':'POST',
      //                     'data':form_data,
      //                     'dataType':'json',
      //                     'success':function(json_data){
      //                       jsonss = json_data;
      //                     }
      //                 });                        
      //                 return jsonss;
      // })();


  

      $("#dep").change(function(event) {
              var sel = $("#prov");
              var urlx = CI.base_url + "ajax/marco_ajax/get_ajax_prov_by_dep/" + $(this).val();


              var form_data = {
                  csrf_token_c: CI.cct,
                  code: $(this).val(),
                  ajax:1
              };

              $.ajax({
                  url: urlx,
                  type:'POST',
                  data:form_data,
                  dataType:'json',
                  success:function(json_data){
                      sel.empty();
                      $("#div_provincia").empty(); 
                      // sel.append('<option value="-1">-</option>');
                      $.each(json_data, function(i, data){
                      		sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');	
                          $("#div_provincia").append('<input type="hidden" id="pes_'+$("#dep").val() + data.CCPP+'" value =' + data.PESCADOR+'>')
                          $("#div_provincia").append('<input type="hidden" id="acu_'+$("#dep").val() + data.CCPP+'" value =' + data.ACUICULTOR+'>')
                          $("#div_provincia").append('<input type="hidden" id="ambos_'+$("#dep").val() + data.CCPP+'" value =' + data.AMBOS+'>')
                      });
                      sel.change();
                  }
              });      

              // $.ajax({
              //     url: CI.base_url + "ajax/marco_ajax/get_ajax_pes_acu_by_dep/" + $(this).val(),
              //     type:'POST',
              //     data:form_data,
              //     dataType:'json',
              //     success:function(json_data){
              //         $.each(json_data, function(i, data){
                            //if (data.CCDD == $("#dep").val() ) { 
                              var depa_cod = $(this).val();
                              $("#tot_pes_dep").empty(); $("#tot_pes_dep").append('<div>'+ $("#pes_"+depa_cod).val() +'</div>'); 
                              $("#tot_acu_dep").empty(); $("#tot_acu_dep").append('<div>'+ $("#acu_"+depa_cod).val() +'</div>'); 
                              $("#tot_ambos_dep").empty(); $("#tot_ambos_dep").append('<div>'+ $("#ambos_"+depa_cod).val() +'</div>'); 
              //               };
                           
              //         });
              //     }
              // });  

            clear_marker();

      });


      $("#prov").change(function(event) {

                var sel = $("#dis");
                var dep = $("#dep");
                var urlx = CI.base_url + "ajax/marco_ajax/get_ajax_dist_by_dep_prov/" + dep.val() + "/" + $(this).val();
                  
                 
              var form_data = {
                  code: $(this).val(),
                  csrf_token_c: CI.cct,
                  dep: dep.val(),
                  ajax:1
              };

              $.ajax({
                  url: urlx,
                  type:'POST',
                  data:form_data,
                  dataType:'json',
                  success:function(json_data){
                      sel.empty();
                      $("#div_distrito").empty(); 
                      // sel.append('<option value="-1">-</option>');
                      $.each(json_data, function(i, data){
                      		sel.append('<option value="' + data.CCDI + '">' + data.DISTRITO + '</option>');
                          $("#div_distrito").append('<input type="hidden" id="pes_'+$("#dep").val() +$("#prov").val() + data.CCDI+'" value =' + data.PESCADOR+'>');
                          $("#div_distrito").append('<input type="hidden" id="acu_'+$("#dep").val() +$("#prov").val() + data.CCDI+'" value =' + data.ACUICULTOR+'>');
                          $("#div_distrito").append('<input type="hidden" id="ambos_'+$("#dep").val() +$("#prov").val() + data.CCDI+'" value =' + data.AMBOS+'>')  ;                        
                      });

                      sel.trigger('change');
           	                
                  }
              });    

              var prov_cod = (""+dep.val()+$(this).val());
              $("#tot_pes_prov").empty(); $("#tot_pes_prov").append('<div>'+ $("#pes_"+prov_cod).val() +'</div>'); 
              $("#tot_acu_prov").empty(); $("#tot_acu_prov").append('<div>'+ $("#acu_"+prov_cod).val() +'</div>'); 
              $("#tot_ambos_prov").empty(); $("#tot_ambos_prov").append('<div>'+ $("#ambos_"+prov_cod).val() +'</div>');    
              // $.ajax({
              //     url: CI.base_url + "ajax/marco_ajax/get_ajax_pes_acu_by_prov/" + dep.val() +'/'+ $(this).val(),
              //     type:'POST',
              //     data:form_data,
              //     cache: false,
              //     dataType:'json',
              //     success:function(json_data){
              //         $.each(json_data, function(i, data){
              //               if (data.CCDD == $("#dep").val()  && data.CCPP == $("#prov").val()) {
              //                 $("#tot_pes_prov").empty(); $("#tot_pes_prov").append('<div>'+data.PESCADOR+'</div>'); 
              //                 $("#tot_acu_prov").empty(); $("#tot_acu_prov").append('<div>'+data.ACUICULTOR+'</div>'); 
              //                 $("#tot_ambos_prov").empty(); $("#tot_ambos_prov").append('<div>'+data.AMBOS+'</div>'); 
              //               };
                           
              //         });
              //     }
              // });  
              clear_marker();

      });

      $("#dis").change(function(event) {
              var sel = $("#ccpp");
              var dep = $("#dep");
              var prov = $("#prov");
              var urlx = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp_by_dep_prov_dist/" + dep.val() + "/" + prov.val() + "/" + $(this).val();

                 
              var form_data = {
                  code: $(this).val(),
                  csrf_token_c: CI.cct,
                  dep: dep.val(),
                  prov: prov.val(),
                  ajax:1
              };

              $.ajax({
                  url: urlx,
                  type:'POST',
                  data:form_data,
                  async:false, 
                  dataType:'json',
                  success:function(json_data){
                      sel.empty();
                      // sel.append('<option value="-1">-</option>');
                        sel.append('<div class="checkbox"><label><input type="checkbox" id="paradigm_all" name="select_todos"  value="select_todos" class="checkall"><strong>TODOS</strong></label></div>')
                      $.each(json_data, function(i, data){
                      	sel.append('<div class="checkbox"><label><input type="checkbox"  class="seg-cp-checkbox" value="' + $('#dep').val() + $('#prov').val() + $('#dis').val() + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</label><input type="hidden" id="pes_'+ data.CCDD + data.CCPP + data.CCDI + data.CODCCPP +'"value='+data.PESCADOR+'><input type="hidden" id="acu_'+ data.CCDD + data.CCPP + data.CCDI + data.CODCCPP +'"value='+data.ACUICULTOR+'><input type="hidden" id="ambos_'+ data.CCDD + data.CCPP + data.CCDI + data.CODCCPP +'"value='+data.AMBOS+'></div>');
                      });
                  }
              });   
              var dist_cod = (""+dep.val()+prov.val()+$(this).val());
              $("#tot_pes_dist").empty(); $("#tot_pes_dist").append('<div>'+ $("#pes_"+dist_cod).val() +'</div>'); 
              $("#tot_acu_dist").empty(); $("#tot_acu_dist").append('<div>'+ $("#acu_"+dist_cod).val() +'</div>'); 
              $("#tot_ambos_dist").empty(); $("#tot_ambos_dist").append('<div>'+ $("#ambos_"+dist_cod).val() +'</div>');    
              // $.ajax({
              //     url: CI.base_url + "ajax/marco_ajax/get_ajax_pes_acu_by_dist/" + dep.val() + "/" + prov.val() + "/" + $(this).val(),
              //     type:'POST',
              //     data:form_data,
              //     async:false, 
              //     dataType:'json',
              //     success:function(json_data){
              //         $.each(json_data, function(i, data){
              //               if (data.CCDD == $("#dep").val()  && data.CCPP == $("#prov").val() && data.CCDI == $("#dis").val() ) { 
              //                 $("#tot_pes_dist").empty(); $("#tot_pes_dist").append('<div>'+data.PESCADOR+'</div>'); 
              //                 $("#tot_acu_dist").empty(); $("#tot_acu_dist").append('<div>'+data.ACUICULTOR+'</div>'); 
              //                 $("#tot_ambos_dist").empty(); $("#tot_ambos_dist").append('<div>'+data.AMBOS+'</div>'); 
              //               };
                           
              //         });
              //     }
              // });  
 
              clear_marker();

      });




      $("#dep").trigger('change');

      //select all checkboxes
      // $("#select_todos input").click(function(){ alert('ok');
      //     var checkboxes = $(this).closest('form').find(':checkbox').not($(this));;
      //     if($(this).is(':checked')) {
      //         checkboxes.attr('checked', 'checked');
      //     } else {
      //         checkboxes.removeAttr('checked');
      //     }
      // });
      

      // A function to create the marker and set up the event window
      function createMarkerLEN(latlng,name,html,category,icon) {
          var contentString = html;
          var color ;
              // if(icon=== 'PIURA')
              //color = CI.base_url + 'img/blank2.png';
              color = "<?php echo  base_url('img/blank1.png'); ?>"
              // else if(icon=== 'LORETO')
              //   color = CI.base_url + 'img/blank1.png';      
              // else if(icon=== 'PUNO')
              //   color = CI.base_url + 'img/blank3.png';               
                   
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
              zoom: 6,
              center: new google.maps.LatLng(-6.9663,-71.455078),
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

      function clear_marker() {
          for (var i=0; i<gmarkers.length; i++) {
              //console.log(gmarkers[i]);
             // gmarkers[i].setVisible(false);
              gmarkers[i].setMap(null);
          }   
      }

$(function(){
    initialize();

    $('.checkall').on('click', function () { alert('ododood');
        $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
    });


  });






//Centros poblados por departamento
$(document).on("change",'.seg-cp-checkbox',function() {


    if (!$(this).is(':checked')) {
        for (var i=0; i<gmarkers.length; i++) {
            //console.log(gmarkers[i]);
          if (gmarkers[i].mycategory == $(this).attr('value')) {
            gmarkers[i].setVisible(false);
          }
        } 
    }else{
        var form_data = {
            csrf_token_c: CI.cct,
            code: $(this).val().substring(6,10),
            dep: $('#dep').val(),
            prov: $('#prov').val(),
            dist: $('#dis').val(),
            ajax:1
        };

        var dep = $("#dep").val();
        var prov = $("#prov").val();  
        var dist = $("#dis").val(); 
        var ccpp = $(this).val().substring(6,10);     

       $.ajax({
          url: CI.base_url + "ajax/marco_ajax/get_ajax_geo_ccpp/"+ dep + "/" + prov + "/" + dist + "/" + ccpp,
          type:'POST',
          cache:false,
          data:form_data,
          dataType:'json',
          success:function(json_data){
              // $.each(json_data, function(i, data){
              //     $('#example2').append('<tr><td>' + data.CENTRO_POBLADO + '</td><td>' + data.DISTRITO + '</td>'+ '</td><td>' + data.POBLACION + '</td></tr>');
              // }) 
              $.each(json_data, function(i, data){
                var lat = data.laty;
                var lng = data.longx;                
                var point = new google.maps.LatLng(lat,lng);
                var rural = (data.area == 1)? 'URBANO' : 'RURAL'; 
                var centro_pp = (""+dep+prov+dist+ccpp);
                //var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>CCPP - " + data.nomccpp + "</h3><p><b>DEPARTAMENTO:</b> "+data.nomb_dep+"</p><p><b>PROVINCIA:</b> "+data.nomb_pro+"</p><p><b>DISTRITO:</b> "+data.nomb_dist+"</p><p><b>CATEGORÍA:</b> "+data.nomcat+"</p><p><b>ALTITUD:</b> "+data.altitud+" msnm</p><p><b>AREA:</b> "+rural+"</p></div></div>";     
                var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>CCPP - " + data.nomccpp + "</h3><p><b>DEPARTAMENTO:</b> "+data.nomb_dep+"</p><p><b>PROVINCIA:</b> "+data.nomb_pro+"</p><p><b>DISTRITO:</b> "+data.nomb_dist+"</p><hr><p><strong>PESCADORES:</strong> "+ $("#pes_"+centro_pp).val() +"</p><p><strong>ACUICULTORES:</strong> "+$("#acu_"+centro_pp).val()+" </p><p><strong>PESCADORES Y ACUICULTORES:</strong> "+$("#ambos_"+centro_pp).val()+"</p></div></div>";     
                var marker = createMarkerLEN(point, data.nomccpp, html, data.ccdd + data.ccpp + data.ccdi + data.codccpp);
            });
          }
      });  


    }
});

</script>
</div>