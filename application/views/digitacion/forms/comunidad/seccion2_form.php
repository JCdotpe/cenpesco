<?php 



	// CARGAR COMBOS

		$depaxArray = array(-1 =>'-');
		foreach($departamentox->result() as $filas)		{
			$depaxArray[$filas->COD_DD]=strtoupper($filas->DEPARTAMENTO);
		}

$provArray = array(-1 => ' -'); 
$distArray = array(-1 => ' -'); 
$ccppArray = array(-1 => ' -');

$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f preguntas_sub');
$label1=  array('class' => 'preguntas_sub2');
$label_horizontal=  array('class' => 'control-label_left  preguntas_sub');
$label_horizontal2=  array('class' => 'control-label_left span4 preguntas_sub');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//SECCION 2
//ap paterno
$S2_1_AP = array(
	'name'	=> 'S2_1_AP',
	'id'	=> 'S2_1_AP',
	'maxlength'	=> 80,
	'class' => $span_class,
	'onkeypress'=>"return solo_letras(event)",
	//'onkeydown'=>"if (event.keyCode==13) {event.keyCode=9; return event.keyCode }" 
);

//ap materno
$S2_1_AM = array(
	'name'	=> 'S2_1_AM',
	'id'	=> 'S2_1_AM',
	'maxlength'	=> 80,
	'onkeypress'=>"return solo_letras(event)",
	'class' => $span_class,
);

//nombres
$S2_1_NOM = array(
	'name'	=> 'S2_1_NOM',
	'id'	=> 'S2_1_NOM',
	'maxlength'	=> 80,
	'onkeypress'=>"return solo_letras(event)",
	'class' => $span_class,
);
//cargo
$S2_2_CARGO = array(
	'name'	=> 'S2_2_CARGO',
	'id'	=> 'S2_2_CARGO',
	'maxlength'	=> 80,
	'onkeypress'=>"return solo_letras(event)",
	'class' => $span_class,
);
//años
$S2_3_A = array(
	'name'	=> 'S2_3_A',
	'id'	=> 'S2_3_A',
	'maxlength'	=> 2,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);
//meseS
$S2_3_M = array(
	'name'	=> 'S2_3_M',
	'id'	=> 'S2_3_M',
	'maxlength'	=> 2,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);
//sexo
$S2_4 = array(
	'name'	=> 'S2_4',
	'id'	=> 'S2_4',
	'maxlength'	=> 1,
	'onkeypress'=>"return solo_1_to_2(event)",
	'class' => $span_class,
);

//dni
$S2_5 = array(
	'name'	=> 'S2_5',
	'id'	=> 'S2_5',
	'maxlength'	=> 8,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);

//dni DD
$S2_5_DD = array(
	'name'	=> 'S2_5_DD',
	'id'	=> 'S2_5_DD',
	'maxlength'	=> 8,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);

//ruc
$S2_6 = array(
	'name'	=> 'S2_6',
	'id'	=> 'S2_6',
	'maxlength'	=> 11,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);
//ruc DD
$S2_6_DD = array(
	'name'	=> 'S2_6_DD',
	'id'	=> 'S2_6_DD',
	'maxlength'	=> 11,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);

//celular
$S2_7 = array(
	'name'	=> 'S2_7',
	'id'	=> 'S2_7',
	'maxlength'	=> 9,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);

//fijo
$S2_8 = array(
	'name'	=> 'S2_8',
	'id'	=> 'S2_8',
	'maxlength'	=> 7,
	'onkeypress'=>"return solo_numeros(event)",
	'class' => $span_class,
);

//correo
$S2_9 = array(
	'name'	=> 'S2_9',
	'id'	=> 'S2_9',
	'maxlength'	=> 80,
	'class' => $span_class,
);



//////////////////////////////////////////SECCION II
$attr = array('class' => 'form-vertical form-auth','id' => 'seccion2');

echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 

	echo '<div class="well modulo">';
		echo '<div class="row-fluid">';
			echo '<h4>SECCION II. DATOS DEL REPRESENTANTE DE LA COMUNIDAD</h4>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 1
			

	
	echo '<div class="row-fluid preguntas" id="SEC2_1">';

		echo '<div class="row-fluid preguntas_sub">';
				echo '<p>1. Apellidos y Nombres</p>';	
		echo '</div>'; 	

		echo '<div class="row-fluid "  >';
				
				echo '<div class="span4">';
					echo '<div class="control-group">';
						 echo form_label('Ap. Paterno', $S2_1_AP['id'], $label_class);
						 echo '<div class="controls span11">'; 
							echo form_input($S2_1_AP); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_1_AP['name']) . '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>'; 

				echo '<div class="span4">';
					echo '<div class="control-group">';
						 echo form_label('Ap. Materno', $S2_1_AM['id'], $label_class);
						echo '<div class="controls span11">'; 
							echo form_input($S2_1_AM); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_1_AM['name']) . '</div>';

						echo '</div>';
					echo '</div>';
				echo '</div>'; 

				echo '<div class="span4">';
					echo '<div class="control-group">';
						echo form_label('Nombres', $S2_1_NOM['id'], $label_class);
						echo '<div class="controls span11">'; 
							echo form_input($S2_1_NOM); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_1_NOM['name']) . '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>'; 

		echo '</div>';

	echo '</div>'; 				

	


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 2


	echo '<div class="row-fluid">';

			echo '<div class="span6 preguntas" id="SEC2_2">';
					echo '<div class="control-group">';
					echo form_label('2. Cargo', $S2_2_CARGO['id'], $label_class);	
						echo '<div class="controls span11">';
							echo form_input($S2_2_CARGO); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_2_CARGO['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span6 preguntas" id="SEC2_3">';

					echo form_label('3. Tiempo en el cargo',$S2_3_A['id'],$label_horizontal);	


					echo '<div class="row-fluid">';

						echo '<div class="span5">';
							echo '<div class="control-group form-horizontal_left">';
								echo form_label('Años',$S2_3_A['id'],$label_horizontal2);
								echo '<div class="controls span6">';
									echo form_input($S2_3_A); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_3_A['name']) . '</div>';								
								echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

						echo '<div class="offset1 span5">';
							echo '<div class="control-group form-horizontal_left">';
								echo form_label('Meses',$S2_3_M['id'],$label_horizontal2);
								echo '<div class="controls span6">';
									echo form_input($S2_3_M); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_3_M['name']) . '</div>';								
								echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 
	 
					echo '</div>';

			echo '</div>';
			
	echo '</div>';

	echo '<div class="row-fluid">';

			echo '<div class="span4 preguntas" style="padding-bottom: 12px !important" id="SEC2_4">';
					echo '<div class="control-group">';
					echo form_label('4. Sexo', $S2_4['id'], $label_class);	
						echo '<div class="controls offset4 span4">';
							echo form_input($S2_4); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_4['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class=" span4 preguntas" id="SEC2_5">';
					echo '<div class="control-group span6">';
					echo form_label('5. DNI', $S2_5['id'], $label_class);
						echo '<div class="controls span11">';
							echo form_input($S2_5); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_5['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	

			// echo '</div>'; 	

			// echo '<div class="span2">';

					echo '<div class="control-group span6">';
					echo form_label('Verifique DNI', $S2_5_DD['id'], $label_class);
						echo '<div class="controls span11">';
							echo form_input($S2_5_DD); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_5_DD['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	

			echo '</div>'; 	

			echo '<div class="span4 preguntas" id="SEC2_6">';

					echo '<div class="control-group span6">';
					echo form_label('6. RUC', $S2_6['id'], $label_class);
						echo '<div class="controls span11">';
							echo form_input($S2_6); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_6['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	

					echo '<div class="control-group span6">';
					echo form_label('Verifique RUC', $S2_6_DD['id'], $label_class);
						echo '<div class="controls span11">';
							echo form_input($S2_6_DD); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_6_DD['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	

			echo '</div>'; 	
	echo '</div>';

	echo '<div class="row-fluid">';

			echo '<div class="span4 preguntas" id="SEC2_7">';
					echo '<div class="control-group">';
					echo form_label('7. Número teléfono celular', $S2_7['id'], $label_class);	
						echo '<div class="controls span11">';
							echo form_input($S2_7); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_7['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span4 preguntas" id="SEC2_8">';
					echo '<div class="control-group">';
					echo form_label('8. Número teléfono fijo / comunitario', $S2_8['id'], $label_class);
						echo '<div class="controls span11">';
							echo form_input($S2_8); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_8['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span4 preguntas" id="SEC2_9">';
					echo '<div class="control-group">';
					echo form_label('9. Correo Electrónico', $S2_9['id'], $label_class);
						echo '<div class="controls span11">';
							echo form_input($S2_9); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_9['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

	echo '</div>';


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 3
	

	echo '<div class="row-fluid preguntas" id="SEC2_10">';

		echo '<div class="row-fluid preguntas_sub">';
				echo '<p>10. Ubicación de la comunidad a la que representa</p>';	
		echo '</div>'; 	

		echo '<div class="row-fluid preguntas_sub">';
			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('10.1. Departamento', 'S2_10_DD_COD', $label_class);	
						echo '<div class="controls">';
							echo form_dropdown('S2_10_DD_COD', $depaxArray, FALSE,'class=" span12" id="S2_10_DD_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_10_DD_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('10.2. Provincia', 'S2_10_PP_COD', $label_class);
						echo '<div class="controls">';
							echo form_dropdown('S2_10_PP_COD', $provArray, FALSE,'class="span12" id="S2_10_PP_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_10_PP_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('10.3. Distrito', 'S2_10_DI_COD', $label_class);
						echo '<div class="controls">';
								echo form_dropdown('S2_10_DI_COD', $distArray, FALSE,'class="span12" id="S2_10_DI_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_10_DI_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('10.4. Centro Poblado', 'S2_10_CCPP_COD', $label_class);
						echo '<div class="controls">';
								echo form_dropdown('S2_10_CCPP_COD', $ccppArray, FALSE,'class="span12" id="S2_10_CCPP_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_10_CCPP_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

		echo '</div>';

	echo '</div>';


echo '<div class="row-fluid">';

	echo '<div class="span6">';


	echo '</div>';

echo '</div>';





/////////////////////FIN SECCION 2
		echo '</div>'; 			
	echo '</div>'; 		
/////////////////////FIN SECCION 2

echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 		

?>

<script type="text/javascript">


//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){


// ENTER como TAB ----------------------------------->>>>>>>>


// $(":input").on("keydown", function(event) {
//     if (event.which === 13 && !$(this).is("textarea, :button, :submit")) {
//         event.stopPropagation();
//         event.preventDefault();

//         $(this)
//             .nextAll(":input:not(:disabled, [readonly='readonly'])")
//             .first()
//             .focus();
//     }
// });




 // });
/*$('input').live("keypress", function(e) {

            /* ENTER PRESSED
            // if (e.keyCode == 13) {
            //     /* FOCUS ELEMENT */
            //     var inputs = $(this).parents("form").eq(0).find(":input");
            //     var idx = inputs.index(this);

            //     if (idx == inputs.length - 1) {
            //         inputs[0].select()
            //     } else {
            //         inputs[idx + 1].focus(); //  handles submit buttons
            //         inputs[idx + 1].select();
            //     }
            //     return false;
            // }



        //});



// ENTER como TAB <<<<<-----------------------------------


// $.extend(jQuery.validator.messages, {
//      required: "Campo obligatorio",
//     // remote: "Please fix this field.",
//     // email: "Please enter a valid email address.",
//     // url: "Please enter a valid URL.",
//      date: "Ingrese una fecha válida",
//     // dateISO: "Please enter a valid date (ISO).",
//     //number: "Solo se permiten números",
//      digits: "Solo se permiten números",
//     // creditcard: "Please enter a valid credit card number.",
//     // equalTo: "Please enter the same value again.",
//     // accept: "Please enter a value with a valid extension.",
//     // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
//     // minlength: jQuery.validator.format("Please enter at least {0} characters."),
//     // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
//     //range: jQuery.validator.format("Please enter a value between {0} and {1}."),
//     // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
//     // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
// });
// $.validator.addMethod("year", function(value, element, param) {
//     return this.optional(element) || ( value > 1950 && value <= CI.year ) ;
// }, "Ingrese un año válido");
// $.validator.addMethod("valueEquals", function (value, element, param) {
//     return param == value;
// }, "Acepta la declaración de veracidad?");

// $.validator.addMethod("peruDate",function(value, element) {
//     return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
// }, "Ingrese fecha: dd-mm-yyyy");

//  $.validator.addMethod("validName", function(value, element) {
//     return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/.test(value);
// }, "Caracteres no permitidos"); 

//  $.validator.addMethod("lettersonly", function(value, element) {
//     return this.optional(element) || /^[a-z]+$/i.test(value);
// }, "Solo se permiten letras"); 

//  $.validator.addMethod("exactlength", function(value, element, param) {
//     return this.optional(element) || value.length == param;
// }, jQuery.format("Ingrese {0} caracteres."));

//  $.validator.addMethod("valueNotEquals", function(value, element, arg){
//     return arg != value;
// }, "Seleccione un valor");

$("#seccion2").validate({
		    rules: {           
		    	S2_1_AP: {
		            required: true,
		            validName: true,
		         },     
		    	S2_1_AM: {
		            required: true,
		            validName: true,
		         },   
		    	S2_1_NOM: {
		            required: true,
		            validName: true,
		         }, 
		    	S2_2_CARGO: {
		            required: true,
		            validName: true,
		         }, 
		    	S2_3_A: {
		            required: true,
		            number: true,
		            //range:[0,40]
		            maxlength:2,
		            minlength:1,
		         },
		    	S2_3_M: {
		            required: true,
		            number: true,
		            range:[1,12],
		            maxlength:2,
		            minlength:1,
		         }, 		            
		    	S2_4: {
		            //required: true,
		            number: true,
		            //range:[1,2],
		            maxlength:1,
		            minlength:1,
		        }, 	
		    	S2_5: {
		            required: true,
		            number: true,
		            range:[1,99999999],
		            maxlength:8,
		            minlength:8,
		        }, 
		    	S2_5_DD: {
		            required: true,
		            number: true,
		            maxlength:8,
		            minlength:8,
		            equalTo: "#S2_5",
		        }, 			        	
		    	S2_6: {
		            required: true,
		            number: true,
		            range:[10000000001,99999999999],
		            maxlength:11,
		            minlength:11,
		        }, 
		    	S2_6_DD: {
		            required: true,
		            number: true,
		            maxlength:11,
		            minlength:11,
		            equalTo: "#S2_6",
		        }, 			        		 
		    	S2_7: {
		            //required: true,
		            number: true,
		            range:[900000000,999999998],
		            maxlength:9,
		            minlength:9,
		        }, 
		    	S2_8: {
		            //required: true,
		            number: true,
		            range:[200000,8999999],
		            maxlength:7,
		            minlength:6,
		        }, 		
		    	S2_9: {
		            //required: true,
		            email: true,
		        }, 			                			               	         	         		           		           		         		                                                                             
			//FIN RULES
		    },

		    messages: {   
		        S2_1_AP: {
		            required: "Ingrese AP. PATERNO",
		         },   
		    	S2_1_AM: {
		            required: "Ingrese AP. MATERNO",
		         },   
		    	S2_1_NOM: {
		            required: "Ingrese NOMBRE",
		         }, 
		    	S2_2_CARGO: {
		            required: "Ingrese CARGO",
		         }, 
		    	S2_3_A: {
		            required: "Ingrese AÑOS",
		            number: "Sólo números",
		            //range:[0,40]
		            maxlength: "Año no permitido",
		            minlength: "Ingrese AÑOS",
		         },   
		    	S2_3_M: {
		            required: "Ingrese MESES",
		            number: "Sólo números",
		            range: "Ingrese més válido",
		            maxlength: "Ingrese mes válido",
		            minlength: "Ingrese mes válido",
		         },   		         
		    	S2_4: {
		            //required: true,
		            number: "Sólo números",
		            //range: "Dígito no permitido",
		            maxlength:"Ingrese sexo válido",
		            minlength: "Ingrese sexo válido",
		        }, 	
		    	S2_5: {
		            required: "Ingrese DNI",
		            number: "Sólo números",
		            maxlength: "Ingrese DNI válido",
		            minlength: "Ingrese DNI válido",
		            range: "Ingrese DNI válido",
		        }, 
		    	S2_5_DD: {
		            required: "Confirme DNI",
		            number: "Sólo números",
		            maxlength: "Ingrese DNI válido",
		            minlength: "Ingrese DNI válido",
		            equalTo: "DNI no coincide",
		        }, 			        	
		    	S2_6: {
		            required: "Ingrese RUC",
		            number: "Sólo números",
		            maxlength: "Ingrese RUC válido",
		            minlength: "Ingrese RUC válido",
		            range: "Ingrese RUC válido",
		        }, 
		    	S2_6_DD: {
		            required: "Confirme RUC",
		            number: "Sólo números",
		            maxlength: "Ingrese RUC válido",
		            minlength: "Ingrese RUC válido",
		            equalTo: "RUC no coincide",
		        }, 			        		 
		    	S2_7: {
		            //required: true,
		            number: "Sólo números",
		            range: "Ingrese celular válido",
		            maxlength: "Ingrese celular válido",
		            minlength: "Ingrese celular válido",
		        }, 
		    	S2_8: {
		            //required: true,
		            number: "Sólo números",
		            range: "Ingrese fijo válido",
		            maxlength: "Ingrese fijo válido",
		            minlength: "Ingrese fijo válido",
		        }, 		
		    	S2_9: {
		            //required: true,
		            email: "Ingrese e-mail válido",
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

		    	//seccion 2 serial
		    	var seccion2_data = $("#seccion2").serializeArray();
			    seccion2_data.push(
			        {name: 'ajax',value:1},
			        {name: 'S2_10_DD',value:$('#S2_10_DD_COD :selected').text()},
			        {name: 'S2_10_PP',value:$('#S2_10_PP_COD :selected').text()},
			        {name: 'S2_10_DI',value:$('#S2_10_DI_COD :selected').text()},
			        {name: 'S2_10_CCPP',value:$('#S2_10_CCPP_COD :selected').text()},
			        {name: 'comunidad_id',value:$("input[name='comunidad_id']").val()}      
			    );

			    // if($("#S2_10_DD_PAIS").val() == 124 || $("#S2_10_DD_PAIS").val() == -1){
			    // 	seccion2_data.push(
			    //     	{name: 'S2_10_DD',value:$('#S2_10_DD_DEP :selected').text()},
			    //     	{name: 'S2_10_DD_COD',value:$('#S2_10_DD_DEP').val()}
			    // 	);    	
			    // }else{
			    // 	seccion2_data.push(
			    //     	{name: 'S2_10_DD',value:$('#S2_10_DD_PAIS :selected').text()},
			    //     	{name: 'S2_10_DD_COD',value:$('#S2_10_DD_PAIS').val()}
			    // 	);     	
			    // }

			    // if($("#S2_11_DD_PAIS").val() == 124 || $("#S2_10_DD_PAIS").val() == -1){
			    // 	seccion2_data.push(
			    //     	{name: 'S2_11_DD',value:$('#S2_11_DD_DEP :selected').text()},
			    //     	{name: 'S2_11_DD_COD',value:$('#S2_11_DD_DEP').val()}
			    // 	);    	
			    // }else{
			    // 	seccion2_data.push(
			    //     	{name: 'S2_11_DD',value:$('#S2_11_DD_PAIS :selected').text()},
			    //     	{name: 'S2_11_DD_COD',value:$('#S2_11_DD_PAIS').val()}
			    // 	);     	
			    // }
				
		        var bsub2 = $( "#seccion2 :submit" );
		        bsub2.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/comunidad_seccion2",
		            type:'POST',
		            data:seccion2_data,
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



// CARGA COMBOS UBIGEO RESIDENCIA ---------------------------------------------------------------------->
$("#S2_10_DD_COD, #S2_10_PP_COD, #S2_10_DI_COD, #S2_10_CCPP_COD").change(function(event) {
        var sel = null;
        var dep = $('#S2_10_DD_COD');
        var prov = $('#S2_10_PP_COD');
        var dist = $('#S2_10_DI_COD');
        var url = null;
        var cod = null;
        var op =null;

        var mivalue = ($(this).val() == -1) ? '-' : $(this).val();
        switch(event.target.id){
            case 'S2_10_DD_COD':
                sel     = $("#S2_10_PP_COD");
                //$('#CCDD').val(mivalue); 
                url     = CI.base_url + "ajax/ccpp_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;
                break;

            case 'S2_10_PP_COD':
                sel     = $("#S2_10_DI_COD");
                // $('#CCPP').val(mivalue);                 
                url     = CI.base_url + "ajax/ccpp_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'S2_10_DI_COD':
                sel     = $("#S2_10_CCPP_COD");
                // $("#CCDI").val(mivalue);          
                url     = CI.base_url + "ajax/ccpp_ajax/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'S2_10_CCPP_COD':
                // $("#COD_CCPP").val(mivalue);           
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

        if(event.target.id != 'S2_10_CCPP_COD')
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
                        sel.append('<option value="' + data.COD_PP+ '">' + data.PROVINCIA + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.COD_DI+ '">' + data.DISTRITO + '</option>');
                   }
                    if (op==3){
                        sel.append('<option value="' + data.COD_CCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                });
               
                if (op==1){
                    $("#S2_10_PP_COD").trigger('change');
                    }  
                if (op==2){
                    $("#S2_10_DI_COD").trigger('change');
                }
                if (op==3){
                    $("#S2_10_CCPP_COD").trigger('change');
                }


            }
        });   
     }
  
}); 

/*
$('#S2_10_DD_PAIS').change(function() {
    var ug = $('#S2_10_DD_DEP, #S2_10_PP_COD, #S2_10_DI_COD');
    if($(this).val() == 124){
        ug.removeAttr('disabled');
    }else{
        ug.val(-1);
		ug.attr("disabled", "disabled");        
    }
});

$('#S2_11_DD_PAIS').change(function() {
    var ug = $('#S2_11_DD_DEP, #S2_11_PP_COD, #S2_11_DI_COD');
    if($(this).val() == 124){
        ug.removeAttr('disabled');
    }else{
        ug.val(-1);
		ug.attr("disabled", "disabled");        
    }
});


*/

	// $("#seccion2").on("submit", false); 

	// $("#seccion2 :submit").on("click", function(event) {
	// 	$('#seccion6').trigger('validate');
 // 	}); 

	 


		

		
 }); 
</script>