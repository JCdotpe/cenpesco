<?php 
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';


//Observaciones
	$OBS = array(
		'name'	=> 'OBS',
		'id'	=> 'OBS',
		'maxlength'	=> 1000,
		'class' => $span_class,
		'onkeypress'=>"return solo_letras_2(event)",		
	);

//FECHA DE EMPADRONAMIENTO DIA
	$F_D = array(
		'name'	=> 'F_D',
		'id'	=> 'F_D',
		'maxlength'	=> 2,
		'class' => $span_class,
		'onkeypress'=>"return solo_numeros(event)",
	);

//FECHA DE EMPADRONAMIENTO MES
	$F_M = array(
		'name'	=> 'F_M',
		'id'	=> 'F_M',
		'maxlength'	=> 2,
		'class' => $span_class,
		'onkeypress'=>"return solo_numeros(event)",
	);

//FECHA DE EMPADRONAMIENTO AÑO
	$F_A = array(
		'name'	=> 'F_A',
		'id'	=> 'F_A',
		'value' => 2013,
		'readonly'=>'readonly',
		'maxlength'	=> 4,
		'class' => $span_class,
	);

//RESULTADO
	$RES = array(
		'name'	=> 'RES',
		'id'	=> 'RES',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_1_to_3(event)",
	);
//Empadronador
	$EMP = array(
		'name'	=> 'EMP',
		'id'	=> 'EMP',
		'maxlength'	=> 100,
		'class' => $span_class,
		'onkeypress'=>"return solo_letras(event)",
	);
//Empadronador_DNI
	$EMP_DNI = array(
		'name'	=> 'EMP_DNI',
		'id'	=> 'EMP_DNI',
		'maxlength'	=> 8,
		'class' => $span_class,
		'onkeypress'=>"return solo_numeros(event)",
	);

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////

$attr = array('class' => 'form-vertical form-auth','id' => 'comunidad_info');

echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 



//S E C C I O N    OBSERVACIONES
echo '<div class="well modulo">';

	echo '<div class="row-fluid" >';

		echo '<div class="span12 preguntas" id="SEC9_1">';
			echo '<div class="control-group">';
			echo '<h4> OBSERVACIONES</h4>';
				echo '<div class="controls">'; 
					echo form_textarea($OBS); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($OBS['name']) . '</div>';
				echo '</div>'; 	
			echo '</div>';
		echo '</div>';

	echo '</div>';

echo '</div>'; //S OBS


//S E C C I O N    1. INFORMACION
echo '<div class="well modulo ">';
		
	//cabecera-titulo
	echo '<div class="row-fluid seccion">';
		echo '<h4> INFORMACION PARA CONTROL DEL INEI</h4>';
	echo '</div>';
	
	echo '<div class="row-fluid">';

		echo '<div class="span12">';

			echo '<div class="span7 preguntas"  id="SEC9_2">';
				echo '<div class="control-group">';
					echo form_label('NOMBRES Y APELLIDOS DEL EMPADRONADOR', $EMP['id'], $label_class);

					echo '<div class="controls offset1  span10">'; 
						echo form_input($EMP); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($EMP['name']) . '</div>';
					echo '</div>'; 	
				echo '</div>';
			echo '</div>';

			echo '<div class="span5 preguntas"  id="SEC9_3">';
				echo '<div class="control-group">';
					echo form_label('N° de DNI', $EMP_DNI['id'], $label_class);					
					echo '<div class="controls offset2  span8">'; 
						echo form_input($EMP_DNI); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($EMP_DNI['name']) . '</div>';
					echo '</div>'; 	
				echo '</div>';
			echo '</div>';

		echo '</div>';

	echo '</div>';


	echo '<div class="row-fluid ">';
		
		echo '<div class="span6 preguntas" style="padding-top: 21px !important"   id="SEC9_4">';

		
				echo '<div class="span6 preguntas_n2" style="padding-top: 20px !important">';
					echo '<h5>FECHA DE EMPADRONAMIENTO</h5>';
					//echo form_label('FECHA DE EMPADRONAMIENTO', $F_D['id'], $label_class);	
				echo '</div>';


				echo '<div class=" span6 ">';

					echo '<div class="row-fluid">';

						echo '<div class="span3">';
							echo '<div class="control-group">';
									echo form_label('DÍA', $F_D['id'], $label_class);	
									echo '<div class="controls">';
										echo form_input($F_D); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_D['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

						echo '<div class="span3">';
							echo '<div class="control-group">';
									echo form_label('MES', $F_M['id'], $label_class);	
									echo '<div class="controls">';
										echo form_input($F_M); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_M['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

						echo '<div class="span4">';
							echo '<div class="control-group">';
									echo form_label('AÑO', $F_A['id'], $label_class);	
									echo '<div class="controls">';
										echo form_input($F_A); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_A['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 	

					echo '</div>'; 

				echo '</div>'; 

		echo '</div>';


		echo '<div class="span6 preguntas"  id="SEC9_5">';

			echo '<div class="row-fluid">';

				echo '<div class="span12 preguntas_n">';
					echo '<h5>RESULTADO DEL EMPADRONAMIENTO</h5>';
				echo '</div>'; 

			echo '</div>'; 

			echo '<div class="row-fluid">';

				echo '<div class="offset5 span2">';
					echo '<div class="control-group">';
							echo '<div class="controls">';
								echo form_input($RES); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($RES['name']) . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>'; 

			echo '</div>'; 

		echo '</div>';
	echo '</div>';




echo '</div>';



echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 	
 ?>



<script type="text/javascript">

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){
	// $("#comunidad_info").on("submit", function(event) {
	// 	$('#comunidad_info').trigger('validate');
 // 	}); 
		//validacion
		$("#comunidad_info").validate({
		    rules: {           
		    	F_D: {
		            required: true,
		            number: true,
		         },     
				OBS:{
					//required: true,
				},
				F_D : {
		            required: true,
		            number: true,
		            maxlength:2,
		            exactlength:2,
		            range:[1,31],
		         },     
				F_M : {
		            required: true,
		            number: true,
		            maxlength:2,
		            exactlength:2,	
		            range:[7,8],	            
		         },     
				F_A : {
		            required: true,
		            number: true,
		            range:[2013,2013],
		         },     
				RES : {
		            required: true,
		            number: true,
		         },     
				EMP:{
					required: true,
					validName: true,
				},
				EMP_DNI : {
		            required: true,
		            number: true,
		            exactlength:8,
		         },     
		                                                                             
			//FIN RULES
		    },

		    messages: {   
		    	F_D: {
		            number: true,
		         },     
				F_D : {
		            maxlength:"Día no válido",
		            exactlength:"Día no válido",
		            range:"Día no válido",
		         },     
				F_M : {
		            maxlength:"Mes no válido",
		            exactlength:"Mes no válido",
		            range:"Mes no válido",            
		         },     
				EMP_DNI : {
		            exactlength:"DNI no válido",
		         },                   
			//FIN MESSAGES
		    },
		    errorPlacement: function(error, element) {
		        $(element).next().after(error);
		    },
		    invalidHandler: function(form, validator) {
		      var errors = validator.numberOfInvalids();
		      var errores = new Array();
		      var errores_cant = new Array();
		      
		      if (errors) {
		        var message = errors == 1
		          ? 'Por favor corrige estos errores:\n'
		          : 'Por favor corrige los ' + errors + ' errores.\n';
		        var errors = "";
		        if (validator.errorList.length > 0) {

		            for (x=0;x<validator.errorList.length;x++) {

						if (errores.length == 0) {
							errores[0] = validator.errorList[x].message ;
							errores_cant[0] = 1;
						}else{
							var encontrado = 0;
				            for (z=0;z<errores.length;z++){
				            	if (errores[z] == validator.errorList[x].message){
				            		encontrado = encontrado + 1;
				            		errores_cant[z] = errores_cant[z]+1;
				            	}
				            }
				            if (encontrado == 0) {
				            	errores.push(validator.errorList[x].message);
				            	errores_cant.push(1);
				            } 
						}	            	
		            }
					//alert("solo hay : "+errores.length);
					for (y=0;y<(errores.length);y++){
	            	//if (errores[y]){
	            		errors += "\n\u25CF " + errores[y] + " ("+errores_cant[y]+")";
	            	//}
		        	}
            	}		        		        
		        alert(message + errors);
		     }
		      validator.focusInvalid();
		    },
		    submitHandler: function(form) {

		    	//seccion 2 serial
		    	var seccion_info_data = $("#comunidad_info").serializeArray();
			    seccion_info_data.push(
			        {name: 'ajax',value:1},
			        {name: 'comunidad_id',value:$("input[name='comunidad_id']").val()}      
			    );
				
		        var bsubinfo = $( "#comunidad_info :submit" );
		        bsubinfo.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/comunidad_info",
		            type:'POST',
		            data:seccion_info_data,
		            dataType:'json',
		            success:function(json){
						alert(json.msg);
						// $('#pesc_tabs').empty();
						// $('#pesc_tabs').append(window.clonetabs);
						// $('#pesc_tabs').removeClass('hide');
						$('#frm_comunidad').trigger('submit');
		            }
		        });     
		          	
		    }       
		});
 }); 
</script>