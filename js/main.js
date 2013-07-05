function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        'slow');
}

//Search json arrays
function getObjects(obj, key, val) {
    var objects = [];
    for (var i in obj) {
        if (!obj.hasOwnProperty(i)) continue;
        if (typeof obj[i] == 'object') {
            objects = objects.concat(getObjects(obj[i], key, val));
        } else if (i == key && obj[key] == val) {
            objects.push(obj);
        }
    }
    return objects;
}

//function in array
function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}



$(function(){
$('a.toggles').click(function(e) {
    e.preventDefault();
    $('a.toggles i').toggleClass('icon-chevron-left icon-chevron-right');

    $('#ap-sidebar').animate({
        width: 'toggle'
    }, 0);
    $('#ap-content').toggleClass('span12 span10');
    $('#ap-content').toggleClass('no-sidebar');
});


//Centros poblados por departamento
$("input:checkbox.seg-cp-checkbox").change(function() {
    if (!$(this).is(':checked')) {
        for (var i=0; i<gmarkers.length; i++) {
            //console.log(gmarkers[i]);
          if (gmarkers[i].mycategory.substring(0, 2) == $(this).attr('value')) {
            gmarkers[i].setVisible(false);
          }
        } 
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
                // $.each(json_data, function(i, data){
                //     $('#example2').append('<tr><td>' + data.CENTRO_POBLADO + '</td><td>' + data.DISTRITO + '</td>'+ '</td><td>' + data.POBLACION + '</td></tr>');
                // }) 
                $.each(json_data, function(i, data){
	                var lat = data.LATITUD;
	                var lng = data.LONGITUD;                
	                var point = new google.maps.LatLng(lat,lng);
	                var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>SITUACIÓN GEOGRÁFICA - " + data.CENTRO_POBLADO + "</h3><p><b>DEPARTAMENTO:</b> "+data.DEPARTAMENTO+"</p><p><b>PROVINCIA:</b> "+data.PROVINCIA+"</p><p><b>DISTRITO:</b> "+data.DISTRITO+"</p></div></div>";     
	                var marker = createMarkerLEN(point, data.CENTRO_POBLADO, html, data.CCPP);
            	});
            }
        });   

    }
});

//Centros poblados prueba piloto
$("input:checkbox.piloto-cp-checkbox").change(function() {
    if (!$(this).is(':checked')) {
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == '1') {
            gmarkers[i].setVisible(false);
          }
        } 
    }else{
        var form_data = {
            csrf_token_c: CI.cct,
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/cp_ajax/get_cp_piloto",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                $.each(json_data, function(i, data){
                    var lat = data.LATITUD;
                    var lng = data.LONGITUD;                
                    var point = new google.maps.LatLng(lat,lng);
                    var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>CCPP - " + data.CENTRO_POBLADO + "</h3><p><b>DEPARTAMENTO:</b> "+data.DEPARTAMENTO+"</p><p><b>PROVINCIA:</b> "+data.PROVINCIA+"</p><p><b>DISTRITO:</b> "+data.DISTRITO+"</p><p><b>POBLACION:</b> "+data.POBLACION+"</p><p><b>AREA:</b> "+data.AREA+"</p></div></div>";     
                    var marker = createMarkerLEN(point, data.CENTRO_POBLADO, html, '1',data.DEPARTAMENTO);
                });
            }
        });   

    }
});





//FORMULARIO DE CONTACTO---------------------------------------------------------------------

$("#form_contacto").validate({
    rules: {
          
        nombres:{
            required: true,
            validName: true,
         },   
        correo:{
            required: true,
            email: true,
         },        
         asunto:{
            required: true,
         },

        mensaje:{
            required: true,
            maxlength: 1000, 
         },
          
                                                            
    //FIN RULES
    },

    messages: {

        nombres:{
            required: 'Ingrese NOMBRES',
            validName: 'Carácteres no permitidos',
         },   
        correo:{
            required: 'Ingrese CORREO',
            email: 'Ingrese correo válido',
         },        
         asunto:{
            required: 'Ingrese ASUNTO',
         },

        mensaje:{
            required: 'Ingrese MENSAJE',
         },
      
                                                      
    //FIN MESSAGES
    },

    errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
    invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
          ? 'Por favor corrige estos errores:\n'
          : 'Por favor corrige los ' + errors + ' errores.\n';
        var errors = "";
        if (validator.errorList.length > 0) {
            for (x=0;x<validator.errorList.length;x++) {
                errors += "\n\u25CF " + validator.errorList[x].message;
            }
        }
        alert(message + errors);
      }
      validator.focusInvalid();
    },
    submitHandler: function(form) {
        reg_form_contacto(); //submit it the form
    }       
}); 

$("#form_contacto").ready(function() {

    $("#nombres").keydown(function(event) 
    {
        // PERMITE: backspace, delete, tab, escape,  enter, space
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 32 ){
                 return;
        }
        // PERMITE: A - Z, Ñ        
        else if ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 164 || event.keyCode == 165) {
                 return;
        }
        else {
            event.preventDefault();
        }
    });
});



});
