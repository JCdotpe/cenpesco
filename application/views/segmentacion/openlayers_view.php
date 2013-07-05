
 <script src="http://openlayers.org/dev/OpenLayers.js"></script>

<div class="row-fluid">
  <div class="span3">
          <div class="well sidebar-nav cen-sidebar cen-sidebar-fix">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
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

<div id="map-canvas" class="span9"  style="height: 500px"></div>


</div>
    <script type="text/javascript">

$(function() {

   init();
});

// OpenLayers
var map, controls;

OpenLayers.Feature.Vector.style['default']['fillColor'] = '#f5f5f5';
OpenLayers.Feature.Vector.style['default']['strokeWidth'] = '1';
OpenLayers.Feature.Vector.style['default']['strokeColor'] = '#dddddd';

OpenLayers.Feature.Vector.style['temporary']['fillColor'] = '#e2e2e2';
OpenLayers.Feature.Vector.style['temporary']['strokeWidth'] = '2';
OpenLayers.Feature.Vector.style['temporary']['strokeColor'] = '#c0c0c0';

OpenLayers.Feature.Vector.style['select']['fillColor'] = '#bbbbbb';
OpenLayers.Feature.Vector.style['select']['strokeWidth'] = '1';
OpenLayers.Feature.Vector.style['select']['strokeColor'] = '#c7c7c7';

/////////////////////////////////////////////////////////////////////////////////////
OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
    defaultHandlerOptions: {
        'single': true,
        'double': true,
        'pixelTolerance': 0,
        'stopSingle': false,
        'stopDouble': false
    },

    initialize: function(options) {
        this.handlerOptions = OpenLayers.Util.extend(
            {}, this.defaultHandlerOptions
        );
        OpenLayers.Control.prototype.initialize.apply(
            this, arguments
        ); 
        this.handler = new OpenLayers.Handler.Click(
            this, {
                'click': this.onClick,
                'dblclick': this.onDblclick 
            }, this.handlerOptions
        );
    }, 

    onClick: function(evt) {
        alert("One Click");
    },

    onDblclick: function(evt) {  
        alert("Doble Click");
        
        var features = vectors.getFeatureBy('scientific_name', 'Amazonas'); 
        alert(features);
        
        
    }   

});
/////////////////////////////////////////////////////////////////////////////////////

function init(){
    map = new OpenLayers.Map('map-canvas');
    var vectors = new OpenLayers.Layer.Vector("vector", {isBaseLayer: true});
    map.addLayers([vectors]);
    
////////////////////////////////////////////////////////////////////////////////////
    eventosLayers = {
            "both": new OpenLayers.Control.Click({
                handlerOptions: {
                    "single": true,
                    "double": true
                }
            })
        };
    var control;
    for(var key in eventosLayers) {
        control = eventosLayers[key];
        control.key = key;
        map.addControl(control);
    }
    control.activate();
///////////////////////////////////////////////////////////////////////////////////    
    
    // Activate Hover and Select 
    var hoverControl = new OpenLayers.Control.SelectFeature(vectors, {
        hover: true,
        highlightOnly: true,
        renderIntent: "temporary",
    });
    map.addControl(hoverControl);
    hoverControl.activate();

    var selectControl = new OpenLayers.Control.SelectFeature(vectors,
               {
                    clickout: false, // Click afuera 
                    toggle: true, // Otro click para deseleccionar
                    multiple: true, // Seleccionar varios 
                    hover: false, // No hover
                    toggleKey: "ctrlKey", // ctrl key remover seleccion
                    multipleKey: "shiftKey" // shift key agregar seleccion
               }
    );
    map.addControl(selectControl);
    selectControl.activate();
    // end Activate Hover and Select
    
/*
--  Departamentos del Perú
    http://webinei.inei.gob.pe:8080/WS_REST/series/json/mapa/consulta2/tipo/departamento/ubigeo/99999

--  Provincias de la Libertad
    http://webinei.inei.gob.pe:8080/WS_REST/series/json/mapa/consulta2/tipo/provincia/ubigeo/13

--  Distritos de Trujillo
    http://webinei.inei.gob.pe:8080/WS_REST/series/json/mapa/consulta2/tipo/distrito/ubigeo/113
*/    
    
    $.getJSON(CI.base_url + 'extra/mapa.json', function(data) {
        $.each(data, function(index) {
            
            
            var nomVariable = String(data[index].nom);
            var geo = data[index].geo;
            
            var createPOLYGON = new OpenLayers.Feature.Vector(
                    OpenLayers.Geometry.fromWKT(
                        "POLYGON(("+geo+"))"
                    )
                );
            
            vectors.addFeatures([createPOLYGON]);

        });// end each data
    });// end getJSON
    
    // Map Center 
    var lon = -75.056629714081; 
    var lat = -9.06036873877975;
    var zoom = 5;
    map.setCenter(new OpenLayers.LonLat(lon, lat), zoom);

}



</script>



