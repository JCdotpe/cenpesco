
<?php  
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

// A.  UBICACION GEOGRAFICA ----------------------------------

$CCDD = array(
	'name'	=> 'CCDD',
	'id'	=> 'CCDD',
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);


$CCPP = array(
	'name'	=> 'CCPP',
	'id'	=> 'CCPP',
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCDI = array(
	'name'	=> 'CCDI',
	'id'	=> 'CCDI',
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$COD_CCPP = array(
	'name'	=> 'COD_CCPP',
	'id'	=> 'COD_CCPP',
	'maxlength'	=> 4,
	'class' => $span_class,
	'readonly' => 'readonly',
);



	$paisesArray= array(-1 => '-'); 
	foreach ($pais->result() as $filas)
		{
			$paisesArray[$filas->id] = $filas->detalle;
		}
	// CARGAR COMBOS

	//$depaArray = array(-1 =>' -'); 
		$depaArray = NULL;
		foreach($departamentos->result() as $filas)
		{
			$depaArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
		}

		$ubidepaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

	$provArray = array(-1 => '-'); 
	$distArray = array(-1 => '-'); 
	$ccppArray = array(-1 => '-'); 


$attr = array('class' => 'form-vertical form-auth','id' => 'pesca_dor');
echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 
/////////////////////////////////////////////////////////////
//Empadronador_DNI
$NROFORM = array(
	'name'	=> 'NFORM',
	'id'	=> 'NFORM',
	'maxlength'	=> 5,
	'class' => 'offset5 span2',
);



    echo form_hidden('pescador_id', '');
	echo '<div class="well modulo">';
			echo '<div class="control-group">';
              echo '<h4 style="text-align:center">Formulario Censal del Pescador y Embarcaciones Pesqueras</h4>';
        			echo form_label('NRO FORMULARIO','NFORM',$labelnroform);
        				echo '<div class="controls">';	
        					echo form_input($NROFORM); 
        				echo '</div>';
        			echo '</div>';
        	echo '</div>';  

////////////////////////////////SECCION I
	echo '<div class="well modulo">';
		echo '<div class="row-fluid">';
			echo '<h4>SECCIÓN I. LOCALIZACIÓN DEL PUNTO DE CONCENTRACIÓN</h4>';
			echo '<h5>A. UBICACIÓN GEOGRÁFICA</h5>';

			echo '<div class="span12">';	
					echo '<div class="control-group span6">';
							echo '<div class="controls span3">';
								echo form_label('DEPARTAMENTO','NOM_DD',$label1);
							echo '</div>';								
							echo '<div class="controls span1">';
								echo form_input($CCDD); 
							echo '</div>';	
							echo '<div class="controls span6">';
								echo form_dropdown('NOM_DD', $ubidepaArray, FALSE,'class="span12" id="NOM_DD"'); 
							echo '</div>';
					echo '</div>';  


					echo '<div class="control-group span6">';
									echo '<div class="controls span3">';
										echo form_label('DISTRITO','NOM_DI',$label1);
									echo '</div>';	
									echo '<div class="controls span1">';
										echo form_input($CCDI); 
									echo '</div>';	

									echo '<div class="controls span6">';
										echo form_dropdown('NOM_DI', $distArray, FALSE,'class="span12" id="NOM_DI"'); 
									echo '</div>';	
					echo '</div>'; 					
			echo '</div>'; 
			

			echo '<div class="span12">';

					echo '<div class="control-group span6">';
								echo '<div class="controls span3">';
									echo form_label('PROVINCIA','NOM_PP',$label1);
								echo '</div>';		
								echo '<div class="controls span1">';
									echo form_input($CCPP); 
								echo '</div>';	

								echo '<div class="controls span6">';
									echo form_dropdown('NOM_PP', $provArray, FALSE,'class="span12" id="NOM_PP"'); 
								echo '</div>';	

					echo '</div>'; 

					echo '<div class="control-group span6">';
								echo '<div class="controls span3">';
									echo form_label('CENTRO POBLADO','NOM_CCPP',$label1);
								echo '</div>';	
								echo '<div class="controls span2">';
									echo form_input($COD_CCPP); 
								echo '</div>';	
								echo '<div class="controls span6">';
									echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	

					echo '</div>'; 			

			echo '</div>'; 	


            echo '<div class="12">';    
                    echo '<div class="control-group ">';
                            echo '<div class="controls offset3 span2">';
                                echo form_label('TIPO DE ACTIVIDAD','TAC',$label1);
                            echo '</div>';                              
                            echo '<div class="controls span3">';
                                echo form_dropdown('TAC', $tac, FALSE,'class="span12" id="TAC"'); 
                            echo '</div>';
                    echo '</div>';             
            echo '</div>'; 

		echo '</div>'; 	




	echo '</div>'; 				

echo form_submit('consulta', 'Consulta','class="btn btn-primary pull-right"');
echo anchor(site_url('digitacion/pescador'), 'Nuevo Formato','class="btn btn-success pull-left"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 		
?>
<div class="row-fluid hide" id="pesc_tabs" style="margin-top:10px">
	<div class="span12" id="insidetabs" style="text-align:center">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul class="nav nav-tabs" style="text-align:center">
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Sección II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Sección III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Sección IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Sección V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Sección VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Sección VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Sección VIII</a></li>
		    <li id="ctab9"><a href="#tab9" data-toggle="tab">Sección IX</a></li>
		    <li id="cinfo"><a href="#info" data-toggle="tab">Info</a></li>
		  </ul>
		  <div class="tab-content">
		    <div class="tab-pane" id="tab2">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion2_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab3">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion3_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab4">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion4_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab5">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion5_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab6">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion6_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab7">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion7_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab8">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion8_form'); ?></p>
		    </div>    
		    <div class="tab-pane" id="tab9">
		      <p><?php $this->load->view('digitacion/forms/pescador/seccion9_form'); ?></p>
		    </div>          
		    <div class="tab-pane" id="info">
		      <p><?php $this->load->view('digitacion/forms/pescador/info_form'); ?></p>
		    </div>                             
		  </div>
		</div>
	</div>
</div>

<script type="text/javascript">

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------
    // function solo_numeros(e) {

    //     key = e.keyCode || e.which;
    //     tecla = String.fromCharCode(key).toLowerCase();
    //     letras = "0123456789";
    //     especiales = [8, 9, 37, 39, 46];

    //     tecla_especial = false
    //     for(var i in especiales) {
    //         if(key == especiales[i]) {
    //             tecla_especial = true;
    //             break;
    //         }
    //     }
    //     if(letras.indexOf(tecla) == -1 && !tecla_especial)
    //         return false;
    // }

$(function(){

  $('#NFORM').blur(function (){
     n = $(this).val().toString();
     while(n.length < 5) n = "0" + n;
     return $(this).val(n);
  });

  $(window).keydown(function(event){
      if(event.keyCode == 13) {
          event.preventDefault();
          return false;
      }
  });




  $('input,select,textarea').keydown( function(e) {
      var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
      if(key == 13)
      $(this).trigger('change');
   }); 

  $('input,select,textarea').keyup( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    var inputs = $(this).closest('form').find(':input:enabled');
    if(key == 13) {
      inputs.eq( inputs.index(this)+1).focus(); 
      
    }
    else if (key == 27) {
      inputs.eq( inputs.index(this)-1).focus(); 
    }
  });    
// window.clonetabs = $("#insidetabs").clone(true); 


// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

$("#NOM_DD, #NOM_PP, #NOM_DI, #NOM_CCPP").change(function(event) {
        var sel = null;
        var dep = $('#NOM_DD');
        var prov = $('#NOM_PP');
        var dist = $('#NOM_DI');
        var url = null;
        var cod = null;
        var op =null;

        var mivalue = ($(this).val() == -1) ? '-' : $(this).val();
        switch(event.target.id){
            case 'NOM_DD':
                sel     = $("#NOM_PP");
                $('#CCDD').val(mivalue); 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + <?php echo $ubigeo; ?> + '/' + $(this).val();
                op      = 1;
                break;

            case 'NOM_PP':
                sel     = $("#NOM_DI");
                $('#CCPP').val(mivalue);                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + <?php echo $ubigeo; ?> + '/' + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI':
                sel     = $("#NOM_CCPP");
                $("#CCDI").val(mivalue);          
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/" + <?php echo $ubigeo; ?> + '/' + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'NOM_CCPP':
                $("#COD_CCPP").val(mivalue);           
                break;  
        }     
        
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            prov:prov.val(),
            dist:dist.val(),
            ajax:1
        };

        if(event.target.id != 'NOM_CCPP')
        {

        $.ajax({
            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                if (op==3){
                    sel.append('<option value="-1"> - </option>');
                }                
                $.each(json_data, function(i, data){
                    if (op==1){
                        sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.CCDI + '">' + data.DISTRITO + '</option>');
                   }
                    if (op==3){
                        sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                });
               
                if (op==1){
                    $("#NOM_PP").trigger('change');
                    }  
                if (op==2){
                    $("#NOM_DI").trigger('change');
                }
                if (op==3){
                    $("#NOM_CCPP").trigger('change');
                }


            }
        });   
     }
  
}); 

//departamento

 $("#NOM_DD").trigger('change');



$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
     email: "Ingrese un email válido",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
     number: "Solo se permiten números",
     digits: "Solo se permiten números",
    range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
$.validator.addMethod("year", function(value, element, param) {
    return this.optional(element) || ( value > 1950 && value <= CI.year ) ;
}, "Ingrese un año válido");
$.validator.addMethod("valueEquals", function (value, element, param) {
    return param == value;
}, "Acepta la declaración de veracidad?");

$.validator.addMethod("peruDate",function(value, element) {
    return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
}, "Ingrese fecha: dd-mm-yyyy");

 $.validator.addMethod("validName", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/.test(value);
}, "Caracteres no permitidos"); 

 $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo se permiten letras"); 

 $.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
}, jQuery.format("Ingrese {0} caracteres."));

 $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
}, "Seleccione un valor");

 $.validator.addMethod("val3", function(value, element,arg){
    var length = arg.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(arg[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un valor entre {0}, {1} y {2}");

 $.validator.addMethod("valdia", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','99')
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un día válido");


 $.validator.addMethod("valmes", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','99');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido");


 $.validator.addMethod("valmescen", function(value, element){
    var dias = new Array('08','09');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido(08,09)");

$.validator.addMethod("valnone", function(value, element, arg){
    var flag = true;
    if(value == 1){
        for(var i = 0; i<=arg.length; i++){
            if($('#' + arg[i]).val() == 1)
              flag = false;
        }
    }
    return flag;
 }, "Si ya selecciono una alternativa no debe seleccionar este item");  


$.validator.addMethod("valzero", function(value, element, arg){
    flag = false;
    if(value == 0){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() == 1)
               flag = true;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Debe ingresar al menos una opción, no pueden ser 0 todas las opciones.");  


 $.validator.addMethod("valrango", function(value, element,arg){
    var flag = false;
        if(((value >= arg[0] && value<=arg[1]) || value == arg[2]) && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valjango", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2])
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valrucc", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2] || value == arg[3] || value == arg[4] && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}, {3}, {4}");

//validacion
$("#pesca_dor").validate({
    rules: {
        NFORM:{
            required: true,
            exactlength: 5,
			digits: true,
			valueNotEquals: 0,
         }, 
        NOM_DD: {
            required: true,
            valueNotEquals: -1,
         }, 
       NOM_PP: {
            required: true,
           valueNotEquals: -1,
         }, 
       NOM_DI: {
           required: true,
           valueNotEquals: -1,
         },   
       NOM_CCPP: {
           required: true,
           valueNotEquals: -1,
         },  
        TAC: {
           required: true,
           valueNotEquals: -1,
         },                                                                                         
//FIN RULES
    },

    messages: {
    	NFORM:{
    		required: 'Ingrese Nro Formulario',
    		valueNotEquals: 'Ingrese un número válido',
    	},
        NOM_DD: {
            valueNotEquals: 'Seleccione Departamento',
         }, 
       NOM_PP: {
           valueNotEquals:'Seleccione Provincia',
         }, 
       NOM_DI: {
           valueNotEquals: 'Seleccione Distrito',
         },   
       NOM_CCPP: {
           valueNotEquals: 'Seleccione Centro Poblado',
         },  
         TAC: {
           valueNotEquals: 'Seleccione Tipo de Actividad',
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
    	//Consulta de form pescador
        var form_data = {
            csrf_token_c: CI.cct,
            NFORM: $('#NFORM').val(),
            CCDD: $('#NOM_DD').val(),
            NOM_DD: $('#NOM_DD :selected').text(),
            CCPP: $('#NOM_PP').val(),
            NOM_PP : $('#NOM_PP :selected').text(),
            CCDI: $('#NOM_DI').val(),
            NOM_DI : $('#NOM_DI :selected').text(),
            COD_CCPP : $('#NOM_CCPP').val(),
            NOM_CCPP : $('#NOM_CCPP :selected').text(),
            TAC: $('#TAC').val(),
            ajax:1
        };
        var bsub = $( "#pesca_dor :submit" );
        // bsub.attr("disabled", "disabled");
        $.ajax({
            url: CI.base_url + "digitacion/pescador/consulta",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json){
            	//no hay registro form
            	if(json.flag == 0){
				        $.ajax({
				            url: CI.base_url + "digitacion/pescador/insertar",
				            type:'POST',
				            data:form_data,
				            dataType:'json',
				            success:function(json){
				            	$("#pesca_dor :input").attr("disabled", true);
				            	//insercion correcta
				            	if(json.flag == 1){
                                     alert(json.msg);
				            		$('#pesca_dor').trigger('submit');
				            	}else if(json.flag == 2){
				            	     alert(json.msg);   
				            	}else if(json.flag == 0){
                                }
				            }
				        });    
				//form encontrado, ver secciones que faltan               		
            	}else if(json.flag == 1){ 
                    		$("#pesca_dor :input").attr("disabled", true);              
                    		$('#pesc_tabs').removeClass('hide');
                        $("input[name='pescador_id']").val(json.idx);    
        				        var i = 0;
                        var flagi = false;
                        //activar secciones
        					     $.each( json.secciones, function( key, value ) {
                						if(value != 0){
                  								if(key == 10){
                  									// $('#cinfo').remove();
                  									// $('#info').remove();		
                                     $('#cinfo').removeClass('active'); 
                                     $('#info').removeClass('active');                     				
                  								}else{	
                  									// $('#tab'+ key).remove();
                  									// $('#ctab'+ key).remove();
                                     $('#tab'+ key).removeClass('active'); 
                                     $('#ctab'+ key).removeClass('active');                         
                  								}
                								
                						}else{
                                    //activar tab     
                                    if(!flagi){                                  
                                        if(key == 10){
                                              $('#cinfo').addClass('active');
                                              $('#info').addClass('active');                                               
                                        }else{                                 
                                              $('#ctab'+ key).addClass('active');
                                              $('#tab'+ key).addClass('active');
                                        }       
                                    }
                                    flagi = true;                 
                              }
                            i++;

                            var ahuakey = key; 
                            //rellenar secciones
                            // $.each( json.fsecciones[key], function( key, value ) {
                            $.each( json.infosecciones[key], function( fila, valor ) {
                                if(fila != 'pescador_id' && fila != 'user_id' && fila != 'last_ip' && fila != 'user_agent' && fila != 'created' && fila != 'modified'){
                                    switch (ahuakey){
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION II//////////////////////////////////
                                      ////////////////////////////////////////////////////////////////////////////////////
                                        case '2':
                                              //COMBOS Residencia Actual
                                              if(fila == 'S2_9_DD_COD'){
                                                    $('#' + fila).val(valor);
                                                    $('#S2_9_DD_COD').trigger('change');

                                               }else if(fila == 'S2_9_PP_COD'){
                                                    var interval_PP = setInterval(function(){
                                                       if($('#S2_9_PP_COD option:nth-child(2)').length){
                                                            clearInterval(interval_PP);
                                                            $('#S2_9_PP_COD').val(valor);
                                                            $('#S2_9_PP_COD').trigger('change');
                                                        }
                                                    }, 1000); 

                                              }else if(fila == 'S2_9_DI_COD'){
                                                    var interval_DI = setInterval(function(){
                                                        if($('#S2_9_DI_COD option:nth-child(2)').length){
                                                            clearInterval(interval_DI);
                                                            $('#S2_9_DI_COD').val(valor);
                                                            $('#S2_9_DI_COD').trigger('change');
                                                        }
                                                    }, 1000);        

                                              }else if(fila == 'S2_9_CCPP_COD'){
                                                    var interval_CCPP = setInterval(function(){
                                                        if($('#S2_9_CCPP_COD option:nth-child(2)').length){
                                                            clearInterval(interval_CCPP);
                                                            $('#S2_9_CCPP_COD').val(valor);
                                                        }
                                                    }, 1000);                                   
                                               }             
                                              //COMBOS Lugar de Nacimiento 
                                              else if(fila == 'S2_10_PAIS_COD'){
                                                    $('#S2_10_PAIS_COD').val(valor);
                                                    $('#S2_10_PAIS_COD').trigger('change');

                                               }     
                                              else if(fila == 'S2_10_DD_COD'){
                                                    $('#S2_10_DD_COD').val(valor);
                                                    $('#S2_10_DD_COD').trigger('change');

                                               }        
                                              else if(fila == 'S2_10_PP_COD'){
                                                    var interval_PPN = setInterval(function(){
                                                        if($('#S2_10_PP_COD option:nth-child(2)').length){
                                                            clearInterval(interval_PPN);
                                                            $('#S2_10_PP_COD').val(valor);
                                                            $('#S2_10_PP_COD').trigger('change');
                                                            
                                                        }
                                                    }, 1000); 

                                              }    
                                              else if(fila == 'S2_10_DI_COD'){
                                                    var interval_DIN = setInterval(function(){
                                                        if($('#S2_10_DI_COD option:nth-child(2)').length){
                                                            clearInterval(interval_DIN);
                                                            $('#S2_10_DI_COD').val(valor);
                                                            $('#S2_10_DI_COD').trigger('change');
                                                        }
                                                    }, 1000);                                   
                                               }                
                                              //COMBO ola q ase en 2007                                                                                                                      
                                              else if(fila == 'S2_11_PAIS_COD'){
                                                    $('#S2_11_PAIS_COD').val(valor);
                                                    $('#S2_11_PAIS_COD').trigger('change');

                                               }        
                                              else if(fila == 'S2_11_DD_COD'){
                                                    $('#S2_11_DD_COD').val(valor);
                                                    $('#S2_11_DD_COD').trigger('change');

                                               }  
                                              else if(fila == 'S2_11_PP_COD'){
                                                    var interval_PPDONDE = setInterval(function(){
                                                         if($('#S2_11_PP_COD option:nth-child(2)').length){
                                                            clearInterval(interval_PPDONDE);
                                                            $('#S2_11_PP_COD').val(valor);
                                                            $('#S2_11_PP_COD').trigger('change');
                                                        }
                                                    }, 1000); 

                                              }    
                                              else if(fila == 'S2_11_DI_COD'){
                                                    var interval_DIDONDE = setInterval(function(){
                                                        if($('#S2_11_DI_COD option:nth-child(2)').length){
                                                            clearInterval(interval_DIDONDE);
                                                            $('#S2_11_DI_COD').val(valor);
                                                            $('#S2_11_DI_COD').trigger('change');
                                                        }
                                                    }, 1000);                                                                                       
                                               }                                                
                                              //DNI DD 
                                              else if(fila == 'S2_4'){
                                                  $('#S2_4').val(valor);
                                                  $('#S2_4_DD').val(valor);
                                              }     
                                              //RUC
                                              else if(fila == 'S2_5'){
                                                  $('#S2_5').val(valor);
                                                  $('#S2_5_DD').val(valor);
                                              }          
                                              else if(fila == 'S2_12' || fila == 'S2_12G' || fila == 'S2_12A'){
                                                    //combo conviviente
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                               }   
                                              else if(fila == 'S2_14_7'){
                                                    //combo conviviente
                                                    $('#S2_14_7').val(valor);
                                                    $('#S2_14_7').trigger('change');

                                               }                                                 
                                              else if(fila == 'S2_15'){
                                                    $('#S2_15').val(valor);
                                                    $('#S2_15').trigger('change');

                                               }                 
                                              else if(fila == 'S2_17_8'){
                                                    //combo conviviente
                                                    $('#S2_17_8').val(valor);
                                                    $('#S2_17_8').trigger('change');

                                               }                                                                               
                                              else if(fila == 'S2_18'){
                                                    $('#S2_18').val(valor);
                                                    $('#S2_18').trigger('change');

                                               }         
                                              else if(fila == 'S2_19' || fila == 'S2_19G' || fila == 'S2_19A'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                               }       
                                              else if(fila == 'S2_20_9'){
                                                    $('#S2_20_9').val(valor);
                                                    $('#S2_20_9').trigger('change');

                                               }                                                                                               
                                              else if(fila == 'S2_21'){
                                                    $('#S2_21').val(valor);
                                                    $('#S2_21').trigger('change');

                                               }      
                                              else if(fila == 'S2_22'){
                                                    $('#S2_22').val(valor);
                                                    $('#S2_22').trigger('change');

                                               }    
                                               //edad
                                              else if(fila.substring(0,8) == 'S2_23_4_' && fila.substring(9,10) == 'A'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');

                                               }    
                                               //estudia
                                              else if(fila.substring(0,8) == 'S2_23_9_'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');

                                               }          
                                               //actividad
                                              else if(fila.substring(0,9) == 'S2_23_11_'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');

                                               }                                                                                                                                                                                                                                                                     
                                              else{
                                                  $('#' + fila).val(valor);
                                              }

                                              
                                              
                                              break;
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION III//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '3':
                                              if(fila == 'S3_100'|| fila == 'S3_200' || fila == 'S3_300' || fila == 'S3_400' || fila == 'S3_500' || fila == 'S3_600' || fila == 'S3_1100' ){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }
                                              break;            
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION IV//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '4':
                                              $('#' + fila).val(valor);
                                              if(fila == 'S4_1'){
                                                $('#S4_1').val(valor);
                                                $('#S4_1').trigger('change');
                                              }
                                              else if(fila == 'S4_2_1'|| fila == 'S4_2_2' || fila == 'S4_2_3' || fila == 'S4_2_4' || fila == 'S4_3_1' || fila == 'S4_3_2'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }                                              
                                              else if(fila == 'S4_4_1'){
                                                $('#S4_4_1').val(valor);
                                                $('#S4_4_1').trigger('change');
                                              }
                                              else if(fila == 'S4_5_1'){
                                                $('#S4_5_1').val(valor);
                                                $('#S4_5_1').trigger('change');
                                              }else{
                                                $('#' + fila).val(valor);
                                              }
                                              break;  
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION V//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '5':
                                              if(fila == 'S5_2_2'){
                                                  $('#S5_2_2').val(valor);
                                                  $('#S5_2_2').trigger('change');
                                              }
                                              else if(fila == 'S5_1_1'|| fila == 'S5_1_2' || fila == 'S5_1_3' || fila == 'S5_1_4' || fila == 'S5_1_5' || fila == 'S5_1_6' || fila == 'S5_1_7' || fila == 'S5_1_8' || fila == 'S5_1_8_O' || fila == 'S5_6_41' || fila == 'S5_8_4' || fila == 'S5_9_14' || fila == 'S5_5_9' || fila == 'S5_5_14' || fila == 'S5_5_17'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }  
                                              //COMBOS Residencia Actual
                                              else if(fila == 'S5_2_DD_COD'){
                                                    $('#S5_2_DD_COD').val(valor);
                                                    $('#S5_2_DD_COD').trigger('change');

                                               }else if(fila == 'S5_2_PP_COD'){
                                                    var interval_PP = setInterval(function(){
                                                        if($('#S2_9_PP_COD option:nth-child(2)').length){
                                                            clearInterval(interval_PP);
                                                            $('#S5_2_PP_COD').val(valor);
                                                            $('#S5_2_PP_COD').trigger('change');
                                                            
                                                        }
                                                    }, 1000); 

                                              }else if(fila == 'S5_2_DI_COD'){
                                                    var interval_DI = setInterval(function(){
                                                       if($('#S5_2_DI_COD option:nth-child(2)').length){
                                                            clearInterval(interval_DI);
                                                            $('#S5_2_DI_COD').val(valor);
                                                            $('#S5_2_DI_COD').trigger('change');
                                                            
                                                        }
                                                    }, 1000);        

                                              }else if(fila == 'S5_2_CCPP_COD'){
                                                    var interval_CCPPP = setInterval(function(){
                                                        if($('#S5_2_CCPP_COD option:nth-child(2)').length){
                                                            clearInterval(interval_CCPPP);
                                                            $('#S5_2_CCPP_COD').val(valor);
                                                            $('#S5_2_CCPP_COD').trigger('change');
                                                        }else{
                                                            $('#S5_2_CCPP_COD').trigger('change');
                                                        }
                                                    }, 1000);                                   
                                               }  
                                              else if(fila == 'S5_3' || fila == 'S5_4' || fila == 'S5_7' || fila == 'S5_8_1' || fila == 'S5_8_2' || fila == 'S5_8_3' || fila == 'S5_8_4'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');

                                               }    

                                              else if(fila.substring(0,5) == 'S5_5_' && (fila.length == 6 || fila.length == 7 )){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');

                                               }   
                                              else if(fila.substring(0,5) == 'S5_6_' && (fila.length == 6 || fila.length == 7 )){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');

                                               }                                                  
                                              else{
                                                  $('#' + fila).val(valor);
                                              }
                                              break;  
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION VI//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '6':
                                              if(fila == 'S6_1'|| fila == 'S6_3_5' || fila == 'S6_4' ){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }
                                              break;    
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION VII//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '7':
                                              if(fila == 'S7_101'|| fila == 'S7_102' || fila == 'S7_103' || fila == 'S7_104' || fila == 'S7_206' || fila == 'S7_10_4' || fila == 'S7_4_1' || fila == 'S7_4_4' || fila == 'S7_3_1' || fila == 'S7_3_2' || fila == 'S7_3_3' || fila == 'S7_3_4' || fila == 'S7_3_5' || fila == 'S7_3_6' || fila == 'S7_3_7' || fila == 'S7_3_8' || fila == 'S7_3_9' || fila == 'S7_3_10' || fila == 'S7_3_11' || fila == 'S7_3_12' || fila == 'S7_4_1' || fila == 'S7_4_2' || fila == 'S7_4_3' || fila == 'S7_4_4'|| fila == 'S7_5_1' || fila == 'S7_5_2' || fila == 'S7_5_3' || fila == 'S7_5_4' || fila == 'S7_5_5' || fila == 'S7_5_6' || fila == 'S7_5_7' || fila == 'S7_5_8' || fila == 'S7_5_9' || fila == 'S7_5_10' ){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }
                                              break;   
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION VIII//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '8':
                                              if(fila == 'S8_3_10'|| fila == 'S8_4_9' || fila == 'S8_4_1' || fila == 'S8_4_2' || fila == 'S8_4_3' || fila == 'S8_4_4' || fila == 'S8_4_5' || fila == 'S8_4_6' || fila == 'S8_4_7' || fila == 'S8_4_8' || fila == 'S8_2' ){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }
                                              break;       
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION IX//////////////////////////////////
                                      //////////////////////////////////////////////////////////////////////////////////// 
                                        case '9':
                                              if(fila == 'S9_1'|| fila == 'S9_2' ||  fila == 'S9_4_1' || fila == 'S9_4_2' || fila == 'S9_4_3' || fila == 'S9_4_4' || fila == 'S9_4_5' || fila == 'S9_4_6' || fila == 'S9_5_1' || fila == 'S9_5_2' || fila == 'S9_5_3' || fila == 'S9_5_4' || fila == 'S9_5_5' || fila == 'S9_5_6'  || fila == 'S9_6_1' || fila == 'S9_6_2' || fila == 'S9_6_3' || fila == 'S9_6_4' || fila == 'S9_6_5' || fila == 'S9_6_6' || fila == 'S9_13_1' || fila == 'S9_13_2' || fila == 'S9_13_3' || fila == 'S9_13_4' || fila == 'S9_13_5' || fila == 'S9_13_6' || fila == 'S9_15_1' || fila == 'S9_15_2' || fila == 'S9_15_3' || fila == 'S9_15_4' || fila == 'S9_15_5' || fila == 'S9_15_6' || fila == 'S9_20_1_T' || fila == 'S9_20_2_T' || fila == 'S9_20_3_T' || fila == 'S9_20_4_T' || fila == 'S9_20_5_T' || fila == 'S9_20_6_T'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }
                                              break;                                                                                                                                                                                                                                                                                                                                                                    
                                      ////////////////////////////////////////////////////////////////////////////////////
                                      ///////////////////////////SECCION X//////////////////////////////////
                                      ////////////////////////////////////////////////////////////////////////////////////                                 
                                        case '10':
                                              if(fila == 'EMP_DNI'){
                                                    $('#EMPX').val(valor);
                                                     $('#EMPX').trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }     
                                              break                                      
                                        default:
                                          break;
                                    }
                                }
                            });


        					     });



                

        					     if(!flagi){
        						        alert('Formulario completado');
        					     }else{
                            alert('Por favor complete la informacion en las secciones a continuacion');   
                       }




            }else if(json.flag == 2){
                alert('El Nro de formulario no coincide con la UDRA');
                bsub.removeAttr('disabled');    
            }else if(json.flag == 3){
                alert('Debe ingresar la UDRA primero, no puede ingresar el formulario.');
                bsub.removeAttr('disabled');    
            }
            // bsub.removeAttr('disabled');  	
            }
        });     
          	
    }       
});

 }); 


// CARGA COMBOS UBIGEO <-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------

</script>