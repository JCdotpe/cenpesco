
<?php  
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

	// A. UBICACION GEOGRAFICA ----------------------------------
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
	// B. FECHA
		$F_D =array(
			'name'	=> 'F_D',
			'id'	=> 'F_D',
			//'value'	=> $F_D,
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",

		);
		$F_M =array(
			'name'	=> 'F_M',
			'id'	=> 'F_M',
			//'value'	=> $F_M,
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
	// C. FUNCIONARIO
		$NOM =array(
			'name'	=> 'NOM',
			'id'	=> 'NOM',
			//'value'	=> $NOM,
			'maxlength'	=> 80,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",

		);
		// $CARGO =array(
		// 	'name'	=> 'CARGO',
		// 	'id'	=> 'CARGO',
		// 	//'value'	=> $CARGO,
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_1_to_3(event)",
		// );
	// D. FORMULARIOS

		$F_PES =array(
			'name'	=> 'F_PES',
			'id'	=> 'F_PES',
			//'value'	=> $F_PES,
			'maxlength'	=> 5,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$F_ACU =array(
			'name'	=> 'F_ACU',
			'id'	=> 'F_ACU',
			//'value'	=> $F_ACU,
			'maxlength'	=> 5,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$F_COM =array(
			'name'	=> 'F_COM',
			'id'	=> 'F_COM',
			//'value'	=> $F_COM,
			'maxlength'	=> 5,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);		

		$SEC =array(
			'name'	=> 'SEC',
			'id'	=> 'SEC',
			//'value'	=> $SEC,
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$PREG_N =array(
			'name'	=> 'PREG_N',
			'id'	=> 'PREG_N',
			//'value'	=> $PREG_N,
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
	// E. ERRORES - OBSERVACIONES
		$E_CONC =array(
			'name'	=> 'E_CONC',
			'id'	=> 'E_CONC',
			//'value'	=> $E_CONC,
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);
		$E_DILIG =array(
			'name'	=> 'E_DILIG',
			'id'	=> 'E_DILIG',
			//'value'	=> $E_DILIG,
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);
		$E_PREG =array(
			'name'	=> 'E_PREG',
			'id'	=> 'E_PREG',
			//'value'	=> $E_PREG,
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);
		$E_SOND =array(
			'name'	=> 'E_SOND',
			'id'	=> 'E_SOND',
			//'value'	=> $E_SOND,
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);
		$E_OMI =array(
			'name'	=> 'E_OMI',
			'id'	=> 'E_OMI',
			//'value'	=> $E_OMI,
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);				
		$DES_E =array(
			'name'	=> 'DES_E',
			'id'	=> 'DES_E',
			//'value'	=> $DES_E,
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return alfa_numericos(event)",
			'rows' => 3,
		);


		$depaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$depaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

		$ubidepaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

	$iniciar = array(-1 => '-'); 
	$provArray = array(-1 => '-'); 
	$distArray = array(-1 => '-'); 
	$ccppArray = array(-1 => '-'); 


$attr = array('class' => 'form-vertical form-auth','id' => 'frm_observacion_campo');
echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 
/////////////////////////////////////////////////////////////
//Empadronador_DNI


 

////////////////////////////////SECCION I
	echo '<div class="well modulo">';
		echo '<div class="row-fluid">';

			echo '<h4>OBSERVACION DE CAMPO</h4>';

			echo '<h5>A. UBICACION GEOGRAFICA</h5>';

			echo '<div class="row-fluid">';	
					echo '<div class="control-group span3">';

							echo form_label('DEPARTAMENTO','NOM_DD',$label1);
							echo '<div class="controls span3">';
								echo form_input($CCDD); 
							echo '</div>';	
							echo '<div class="controls span8">';
								echo form_dropdown('NOM_DD', $ubidepaArray, FALSE,'class="span12" id="NOM_DD"'); 
							echo '</div>';
					echo '</div>';  

					echo '<div class="control-group span3">';
									echo form_label('PROVINCIA','NOM_PP',$label1);
								echo '<div class="controls span3">';
									echo form_input($CCPP); 
								echo '</div>';	

								echo '<div class="controls span8">';
									echo form_dropdown('NOM_PP', $provArray, FALSE,'class="span12" id="NOM_PP"'); 
								echo '</div>';	

					echo '</div>'; 

					echo '<div class="control-group span3">';
							echo form_label('DISTRITO','NOM_DI',$label1);
							echo '<div class="controls span3">';
								echo form_input($CCDI); 
							echo '</div>';	

							echo '<div class="controls span8">';
								echo form_dropdown('NOM_DI', $distArray, FALSE,'class="span12" id="NOM_DI"'); 
							echo '</div>';	
					echo '</div>'; 	

					echo '<div class="control-group span3">';
								echo form_label('CENTRO POBLADO','NOM_CCPP',$label1);
								echo '<div class="controls span4">';
									echo form_input($COD_CCPP); 
								echo '</div>';	
								echo '<div class="controls span7">';
									echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
									echo '<div class="help-block error">' . form_error('NOM_CCPP') . '</div>';	
								echo '</div>';	

					echo '</div>'; 		

			echo '</div>'; 

			echo '<div class="row-fluid">';	

				// FECHA
					echo '<div class="span3 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> FECHA</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group span3">';

								echo form_label('DIA','F_D',$label1);
								echo '<div class="controls span12">';
									echo form_input($F_D); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_D['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group  offset2 span3">';

								echo form_label('MES','F_M',$label1);
								echo '<div class="controls span12">';
									echo form_input($F_M); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_M['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 
						
						echo '</div>';

					echo '</div>';
				// FECHA

				// FUNCIONARIO	
					echo '<div class="span9 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> DATOS DEL FUNCIONARIO</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group grupos span7">';

								echo form_label('Nombre  y apellidos','NOM',$label1);

								echo '<div class="controls">';
									echo form_input($NOM); 
									echo '<span class="help-inline"></span>';
									//echo '<div class="help-block error">' . form_error($NOM['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span5">';

								echo form_label('Cargo','CARGO',$label1);

								echo '<div class="controls">';
									echo form_dropdown('CARGO', $cargos, FALSE,'class="span12" id="CARGO"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('CARGO') . '</div>';
								echo '</div>';	

							echo '</div>'; 
						
						echo '</div>';

					echo '</div>';
				// FUNCIONARIO



			echo '</div>'; 

			echo '<div class="row-fluid">';	


				// TIPO FORMULARIO	
					echo '<div class="span6 titulos">';

						echo '<div class=" span11 titulos">';
							echo '<h5>N° DE FORMULARIO</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							// echo '<div class="control-group offset1 grupos span10">';

							// 	echo form_label('Formulario','T_FORM',$label1);
							// 	echo '<div class="controls  span12">';
							// 		echo form_dropdown('T_FORM', $formularios, FALSE,'class="span12" id="T_FORM"'); 
							// 		echo '<span class="help-inline"></span>';
							// 		echo '<div class="help-block error">' . form_error('T_FORM') . '</div>';
							// 	echo '</div>';	

							// echo '</div>'; 

							echo '<div class="control-group grupos  span2">';

								echo form_label('Pescador','F_PES',$label1);
								echo '<div class="controls  span12">';
									echo form_input($F_PES); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_PES['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span2">';

								echo form_label('Acuicultor','F_ACU',$label1);
								echo '<div class="controls  span12">';
									echo form_input($F_ACU); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_ACU['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span2">';

								echo form_label('Comunidades','F_COM',$label1);
								echo '<div class="controls  span12">';
									echo form_input($F_COM); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_COM['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos offset1 span2">';

								echo form_label('Seccion','SEC',$label1);
								// echo '<div class="controls span12">';
								// 	echo form_input($SEC); 
								// 	echo '<span class="help-inline"></span>';
								// 	echo '<div class="help-block error">' . form_error($SEC['name']) . '</div>';
								// echo '</div>';	
								echo '<div class="controls">';
									echo form_dropdown('Seccion', $iniciar, FALSE,'class="span12" id="SEC"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('SEC') . '</div>';
								echo '</div>';	


							echo '</div>'; 

							echo '<div class="control-group grupos  span2">';

								echo form_label('Pregunta','PREG_N',$label1);
								// echo '<div class="controls  span12">';
								// 	echo form_input($PREG_N); 
								// 	echo '<span class="help-inline"></span>';
								// 	echo '<div class="help-block error">' . form_error($PREG_N['name']) . '</div>';
								// echo '</div>';	
								echo '<div class="controls">';
									echo form_dropdown('Pregunta', $iniciar, FALSE,'class="span12" id="PREG_N"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('PREG_N') . '</div>';
								echo '</div>';	
							echo '</div>'; 
						
						echo '</div>';

					echo '</div>';
				// TIPO FORMULARIO	


				// TIPO DE ERROR	
					echo '<div class="span6 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> TIPO DE ERROR</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="span12">';

								echo '<div class="control-group grupos span2">';

									echo form_label('Concepto','E_CONC',$label1);
									echo '<div class="controls offset1 span9">';
										echo form_input($E_CONC); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($E_CONC['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

								echo '<div class="control-group grupos  span3">';

									echo form_label('Diligenciamiento','E_DILIG',$label1);
									echo '<div class="controls offset1 span6">';
										echo form_input($E_DILIG); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($E_DILIG['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

								echo '<div class="control-group grupos  span2">';

									echo form_label('Pregunta','E_PREG',$label1);
									echo '<div class="controls offset1 span9">';
										echo form_input($E_PREG); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($E_PREG['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

								echo '<div class="control-group grupos  span2">';

									echo form_label('Sondeo','E_SOND',$label1);
									echo '<div class="controls offset1 span9">';
										echo form_input($E_SOND); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($E_SOND['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

								echo '<div class="control-group grupos  span2">';

									echo form_label('Omision','E_OMI',$label1);
									echo '<div class="controls offset1 span9">';
										echo form_input($E_OMI); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($E_OMI['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

							echo '</div>'; 

												
						echo '</div>';

					echo '</div>';

				// TIPO DE ERROR
			
			echo '</div>'; 

			echo '<div class="row-fluid">';	
				echo '<div class="control-group grupos  span12">';
					echo '<div class="span2">';
						echo form_label('Descripccion del error:','DES_E',$label1);
					echo '</div>'; 	
					echo '<div class="controls span10">';
						echo form_textarea($DES_E); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($DES_E['name']) . '</div>';
					echo '</div>';	
				echo '</div>'; 	

			echo '</div>'; 

		echo '</div>'; 			
	echo '</div>'; 		

		echo '<div class="row-fluid">';

			echo '<div class="span6">';
				//echo anchor(base_url('digitacion/revision'), 'Visualizar','class="btn btn-success pull-left"');
				echo '<a href="'. site_url('monitoreo/observacion_campo/get_todo') . '" class="btn btn-success pull-left" target="_blank">Visualizar</a>';
		   	echo '</div>';

			echo '<div class="extra span5">';
		    echo '</div>';
			echo '<div >';
						echo form_submit('Enviar', 'Enviar','class="btn btn-primary pull-right"');
		   echo '</div>';
	    echo '</div>';

	echo form_close(); 
	echo '</div>'; 			
echo '</div>'; 	



?>







<!-- 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   /////////////            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ///////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////  ///////   ///////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////  ///////   ///////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////           /////////////             ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 -->

<script type="text/javascript">

var opcion = 0;

///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////  D I V     S E L E C C I O N A D O   \\\\\\\\\\\\\\\\\\\\\
    $(document).ready(function(){
        for ( s = 2; s < 14; s++) {
            for (p = 1; p < 25; p++) {
              $("#SEC"+s+"_"+p).focusin(function(){
                //$(this).css("background-color","#A9D0F5");
                $(this).css("border","3px solid #ff9900");
              });
              $("#SEC"+s+"_"+p).focusout(function(){
                $(this).css("border","1px solid #989898");
              });
            };
        };
    });
//\\\\\\\\\\\\\\\\\\  D I V     S E L E C C I O N A D O   /////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
// <<=================== E N T E R   L I K E  T A B  ======================>>//
    $('input,select, textarea').keydown( function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;

            if(key == 13) {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:enabled:visible');
                $(this).blur();  
                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                    if ( $(this).attr('id') == "E_OMI" ) {// CAMPO ESPECIAL: 
                    	var sum = parseInt(inputs.eq( inputs.index(this)-1).val()) + parseInt(inputs.eq( inputs.index(this)-2).val())+ parseInt(inputs.eq( inputs.index(this)-3).val())+ parseInt(inputs.eq( inputs.index(this)-4).val())+ parseInt($(this).val()) ;  
                        if (sum == 0 ) {
                        	alert("Debe seleccionar al menos un error");
                            inputs.eq( inputs.index(this)-4).focus();  
                            inputs.eq( inputs.index(this)-4).select();  
                        } else{
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                             
                        }
                    }else if ( $(this).attr('id') == "F_PES" ) {// CAMPO ESPECIAL: 
                        if ($(this).val() > 0 ) {
                            inputs.eq( inputs.index(this)+1).val(0);  
                            inputs.eq( inputs.index(this)+2).val(0);  
                            inputs.eq( inputs.index(this)+3).focus();  
    						cargar(true,1); //llama funcion para cargar secciones
                        } else{
                      		cargar(false,1); // borrar contenido combos
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                             
                        }
                    }else if ( $(this).attr('id') == "F_ACU" ) {// CAMPO ESPECIAL: 
                        if ( ($(this).val()  > 0 ) && (inputs.eq( inputs.index(this)-1).val() > 0 ) ) {
                        	alert('Ingrese en un solo formulario');
                            inputs.eq( inputs.index(this)-1).focus();  
                            inputs.eq( inputs.index(this)-1).select();  
                        } else if ($(this).val() > 0) {
                            inputs.eq( inputs.index(this)+ 1 ).val(0);                             
                            inputs.eq( inputs.index(this)+ 2 ).focus(); 
                            inputs.eq( inputs.index(this)+ 2 ).select();     
			                cargar(true,2); //llama funcion para cargar secciones   2                                   
                        }else{
                        	cargar(false,2);// borrar contenido combos
                            inputs.eq( inputs.index(this)+ 1 ).focus(); 
                            inputs.eq( inputs.index(this)+ 1 ).select();                             
                        }
                    }else if ( $(this).attr('id') == "F_COM" ) {// CAMPO ESPECIAL: 
                        if ( ($(this).val()  > 0 ) && (inputs.eq( inputs.index(this)-1).val() > 0 ) && (inputs.eq( inputs.index(this)-2).val() > 0 ) ) {
                        	alert('Sólo puede ingresar en un solo formulario');
                            inputs.eq( inputs.index(this)-2).focus();  
                            inputs.eq( inputs.index(this)-2).select();  
                        } else if (($(this).val()  == 0 ) && (inputs.eq( inputs.index(this)-1).val() == 0 ) && (inputs.eq( inputs.index(this)-2).val() == 0 )) {
                        	alert('Debe ingresar en un formulario');
                            inputs.eq( inputs.index(this)- 2 ).focus(); 
                            inputs.eq( inputs.index(this)- 2 ).select();                             
                        }else{
                            inputs.eq( inputs.index(this)+ 1 ).focus(); 
                            inputs.eq( inputs.index(this)+ 1 ).select(); 
		                  	cargar(true,3); //llama funcion para cargar secciones  3                                        
                        }
                    }else{
                        inputs.eq( inputs.index(this)+ 1 ).focus(); 
                        inputs.eq( inputs.index(this)+ 1 ).select(); 
                   }                         
                }
            }else if (key == 27) {
                var inputs = $(this).closest('form').find(':input:enabled');
                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                    inputs.eq( inputs.index(this)- 1).focus();  
                    inputs.eq( inputs.index(this)- 1).select();                  	
                }

            }
            else if(key == 9){
                return false;
            }
        });

// <<=================== E N T E R   L I K E  T A B  ======================>>//
///////////////////////////////////////////////////////////////////////////////

$("#SEC").focus(function() {
	if ( ($("#F_PES").val() > 0 &&  $("#F_ACU").val() > 0 && $("#F_COM").val() > 0 ) || ($("#F_PES").val() +  $("#F_ACU").val() +  $("#F_COM").val() == 0 ) ||
		 ($("#F_PES").val() > 0 &&  $("#F_ACU").val() > 0) ||( $("#F_ACU").val() > 0 && $("#F_COM").val() > 0 )  || ($("#F_PES").val() > 0 &&  $("#F_COM").val() > 0 )){
		cargar(false,0); alert('Sólo puede ingresar en un solo formulario');
	}else if ( $("#F_PES").val() >=1 && ( $("#F_ACU").val() + $("#F_COM").val() == 0) ){
		cargar(true,1);
	}else if ($("#F_ACU").val() >=1 && ( $("#F_COM").val() + $("#F_PES").val() == 0)){
		cargar(true,2);
	}else if ($("#F_COM").val() >=1 && ( $("#F_PES").val() + $("#F_ACU").val() == 0)){
		cargar(true,3);
	}
})

function cargar(bol, sec) {
	if (bol) {
        $.ajax({
            url: CI.base_url + "monitoreo/observacion_campo/secciones/" + sec,
            type:'POST',
            data:{csrf_token_c: CI.cct,},
            dataType:'json',
            success:function(json){
            		$("#SEC").empty();
	                $.each(json.secciones, function(i, data){
	                        $("#SEC").append('<option value="'+sec + data + '">' + data + '</option>');
	                });		
	                $("#SEC").trigger('change');				            	
            }
        }); 
	}else{
        	$("#SEC").empty();
        	$("#SEC").append('<option value=" -"> - </option>');
        	$("#PREG_N").empty();
        	$("#PREG_N").append('<option value=" -"> - </option>');  
	}
}

$("#SEC").change(function (){
    $.ajax({
        url: CI.base_url + "monitoreo/observacion_campo/preguntas/",
        type:'POST',
        data:{csrf_token_c: CI.cct,seccion:$("#SEC").val()},
        dataType:'json',
        success:function(json){
        		$("#PREG_N").empty();
                $.each(json.preguntas, function(i, data){
                        $("#PREG_N").append('<option value="' + data + '">' + data + '</option>');
                });						            	
        }
    });  
});




///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//////////////////////  P A S E     P R E G U N T A S   \\\\\\\\\\\\\\\\\\\\\\\
    // PARAMETROS 
    //s = seccion // pi =pregunta actual//pf =pregunta a pasar// //vc = boolean de pregunta de un solo codigo
    //si =sub pregunta inicial// sf =sub pregunta final // e = boolean para especificar //ts = boolean si termina la seccion
    function pase_preguntas(s,pi,pf,vc,si,sf,e,ts){
       // var obj = input;
        //var e = even;
        var sc = s;
        var p_actual = pi;
        var p_pase = pf;
        var sub_ini = si;
        var sub_fin = sf;
        var esp = e;
        var code = vc;
        var cont =0;
        var p_focus =0;
        var termina_s = ts;


                if (code){ //valida si son de varios codigos

                    for (y = sub_ini; y <= sub_fin; y++){
                        if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){
                            cont++;
                        }
                    }
                    if(cont >= 1){// valida si se encontro al menos un codigo en el rango
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').attr('disabled','disabled');
                        }
                        if (termina_s) {// verifica si termina la seccion
                            alert("Finalice esta sección");
                            document.blur();
                            $(":submit").focus();
                            return;
                        }                
                        if (!esp){//verifica si el input es seguido de ESPECIFIQUE
                            $("#S"+sc+"_"+p_pase+"_1").focus();
                            $("#S"+sc+"_"+p_pase).focus();      
                        }
                    }else if(cont <= 0){
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled');
                        }

                        if (!esp) {
                            p_focus = p_actual+1;
                            $("#S"+sc+"_"+p_focus).focus();
                            $("#S"+sc+"_"+p_focus+"_1").focus();
                        }
                    }
                } else{
                    for (y = sub_ini; y <= sub_fin; y++){
                        if ($("#S"+sc+"_"+p_actual).val() == y){
                            cont++;
                        }
                    }

                    if(cont >= 1){// valida si se encontro al menos un codigo en el rango
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').attr('disabled',true);
                        }
                        if (termina_s) {// verifica si termina la seccion
                            //document.getElementById('seccion3').blur();
                            alert("Finalice esta sección");
                            $(":submit").focus();
                            return;
                        }
                        if(!esp){//verifica si el input es seguido de ESPECIFIQUE
                            $("#S"+sc+"_"+p_pase+"_1").focus();
                            $("#S"+sc+"_"+p_pase).focus();                     
                        };
                    }else if(cont <= 0){
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled');
                        }   
                        if (!esp) {
                            p_focus = p_actual+1;
                            $("#S"+sc+"_"+p_focus).focus();
                            $("#S"+sc+"_"+p_focus+"_1").focus();                 
                        } 
                    }
                }
    }
//\\\\\\\\\\\\\\\\\\\\  P A S E     P R E G U N T A S   ///////////////////////      
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////



///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//////////////////////// E S P E C I F I C A R   O T R O  \\\\\\\\\\\\\\\\\\\\\ 
    function especifique(uno,dos,otro){
        var x = uno;
        var y = dos;
        if ((y.value ==otro) && (x.value =="")){
            alert('seleccionó OTRO, especifique');          
            $(dos).focus();
        }
    }
//\\\\\\\\\\\\\\\\\\\\\\ E S P E C I F I C A R   O T R O  /////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////



///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////// S O L O     L  E T R A S  \\\\\\\\\\\\\\\\\\\\\\\\\\
    function solo_letras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 9,37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
//\\\\\\\\\\\\\\\\\\\\\\\\ S O L O     L  E T R A S  //////////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////

///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
///////////////////// S O L O     A L F A N U M E R I C O  \\\\\\\\\\\\\\\\\\\\
	function alfa_numericos(e) {
	    key = e.keyCode || e.which;
	    tecla = String.fromCharCode(key).toLowerCase();
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz123456789.;,";
	    especiales = [8, 37, 39];

	    tecla_especial = false
	    for(var i in especiales) {
	        if(key == especiales[i]) {
	            tecla_especial = true;
	            break;
	        }
	    }

	    if(letras.indexOf(tecla) == -1 && !tecla_especial)
	        return false;
	}
//\\\\\\\\\\\\\\\\\\\ S O L O     A L F A N U M E R I C O  ////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////


// <<================== L I M P I A  ==================>>//
    function limpia() {
        var val = document.getElementById("miInput").value;
        var tam = val.length;
        for(i = 0; i < tam; i++) {
            if(!isNaN(val[i]))
                document.getElementById("miInput").value = '';
        }
    }
// ==================>> L I M P I A  <<==================//


// <<========= S O L O   N U M E R O S  ===============>>//
    function solo_numeros(e) {

        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789";
        especiales = [8, 9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =========>> S O L O   N U M E R O S  <<===============//

// <<======= S O L O   N U M E R O S  0 - 1 ===========>>//
    function solo_0_to_1(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "01";
        especiales = [8, 9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  0 - 1 <<===========//


// <<======= S O L O   N U M E R O S  1 - 2 ===========>>//
    function solo_1_to_2(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "129";
        especiales = [8,9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 2 <<===========//


// <<======= S O L O   N U M E R O S  1 - 3 ===========>>//
    function solo_1_to_3(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "123";
        especiales = [8,9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 3 <<===========//


// <<======= S O L O   N U M E R O S  1 - 4 ===========>>//
    function solo_1_to_4(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "012349";
        especiales = [8, 9, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 4 <<===========//

// <<======= S O L O   N U M E R O S  1 - 5 ===========>>//   
    function solo_1_to_5(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123459";
        especiales = [8, 9, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 5 <<===========//   

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){

      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
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
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;
                break;

            case 'NOM_PP':
                sel     = $("#NOM_DI");
                $('#CCPP').val(mivalue);                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI':
                sel     = $("#NOM_CCPP");
                $("#CCDI").val(mivalue);          
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
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
     required: "Requerido",
    // remote: "Please fix this field.",
    // email: "Please enter a valid email address.",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
    number: "Solo se permiten números",
     digits: "Solo se permiten números",
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Solo numeros entre {0} y {1}."),
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

//validacion
$("#frm_observacion_campo").validate({
    rules: {

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
       F_D: {
           required: true,
           number: true,
           range: [1,31],
           maxlength: 2,
           exactlength:2,           
         },  
       F_M: {
           required: true,
           number: true,
           range: [5,8],
           maxlength: 2,
           exactlength:2,
         },  
		NOM :{
           validName:true,
           required: true,
		},
		CARGO :{
           required: true,
           valueNotEquals: -1,           
		},
		F_PES :{
           required: true,
           number: true,
           range: [0,9999],    
		},
		F_ACU :{
           required: true,
           number: true,
           range: [0,9999],    
		},
		F_COM :{
           required: true,
           number: true,
           range: [0,9999],    
		},				
		SEC :{
           required: true,
           number: true,
           range: [1,10],     
		},
		PREG_N :{
           required: true,
           number: true,
           range: [1,30],     
		},
		E_CONC :{
           required: true,
           number: true,
           range: [0,1],     
		},
		E_DILIG :{
           required: true,
           number: true,
           range: [0,1],     
		},
		E_PREG :{
           required: true,
           number: true,
           range: [0,1],     
		},
		E_SOND :{
           required: true,
           number: true,
           range: [0,1],     
		},		
		E_OMI :{
           required: true,
           number: true,
           range: [0,1],     
		},				
		DES_E :{
           required: true,
           maxlength:100,
		},

//FIN RULES
    },

    messages: {
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
       F_D: {
           range: 'Día no válido',
           maxlength: 'Día no válido',
           exactlength: 'Día no válido',           
         },  
       F_M: {
           range: 'Mes no válido',
           maxlength: 'Mes no válido',
           exactlength: 'Mes no válido',  
         },  
                                      
//FIN MESSAGES
    },
    errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
    /*invalidHandler: function(form, validator) {
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
    },*/

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


	if (($("#F_PES").val()  == 0 ) && ($("#F_ACU").val() == 0 ) && ($("#F_COM").val() == 0 )) {
		alert("Tiene que ingresar en un formulario");
		$("#F_PES").focus();
	}else if (( ($("#F_ACU").val() > 0 ) && ($("#F_COM").val() > 0 )) || ( ($("#F_PES").val()  > 0 ) && ($("#F_ACU").val() > 0 ) ) || ( ($("#F_PES").val()  > 0 ) && ($("#F_COM").val() > 0 ) ) )  {
		alert("Sólo puede ingresar en un formulario");
		$("#F_PES").focus();
	}else{


    	//Consulta de form pescador
        var form_data = {
            csrf_token_c: CI.cct,
            CCDD: $('#NOM_DD').val(),
            NOM_DD: $('#NOM_DD :selected').text(),
            CCPP: $('#NOM_PP').val(),
            NOM_PP : $('#NOM_PP :selected').text(),
            CCDI: $('#NOM_DI').val(),
            NOM_DI : $('#NOM_DI :selected').text(),
            COD_CCPP : $('#NOM_CCPP').val(),
            NOM_CCPP : $('#NOM_CCPP :selected').text(),
            F_D :$("#F_D").val(),
			F_M :$("#F_M").val(),
			NOM :$("#NOM").val(),
			CARGO :$("#CARGO").val(),
			F_PES :$("#F_PES").val(),
			F_ACU :$("#F_ACU").val(),
			F_COM :$("#F_COM").val(),
			SECC :$("#SEC").val(),
			PREG_N :$("#PREG_N").val(),
			E_CONC :$("#E_CONC").val(),
			E_DILIG :$("#E_DILIG").val(),
			E_PREG :$("#E_PREG").val(),
			E_SOND :$("#E_SOND").val(),
			E_OMI :$("#E_OMI").val(),
			DES_E :$("#DES_E").val(),
            ajax:1
        };
        var bsub = $( "#frm_observacion_campo :submit" );
        //bsub.attr("disabled", "disabled");
        $.ajax({
            url: CI.base_url + "monitoreo/observacion_campo/grabar",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json){
            	var mensaje;
            	if(json.operacion == 0){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ADVERTENCIA! </strong>El centro poblado ya está registrado</div>')
            	}else if(json.operacion == 1){    
		    		mensaje = $('<div />').html('<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">×</button><strong>EXITOSO! </strong>El registro fue guardado satisfactoriamente</div>')
			   			$('input:text').val("");
			   			$('textarea').val("");
			   			$('select').val(-1);
			   			$('#NOM_DD').trigger('change');
			   			$("#SEC").append('<option value=" -"> - </option>');  
			   			$("#PREG_N").append('<option value=" -"> - </option>');  

            	}else if(json.operacion == 7){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ERROR! </strong>Inesperado, DOBLE o NINGUN ODEI AL MOMENTO DE GUARDAR</div>')         		
            	}else if(json.operacion == 8){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ERROR! </strong>Inesperado, no se pudo registrar</div>')         		
            	}else if(json.operacion == 99){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ADVERTENCIA! </strong>Usuario PILOTO no esta permitido guardar</div>')
            	}

        		$('.extra').empty();
        		$('.extra').hide().append(mensaje);              	
        		$('.extra').show('slow');              	
            

            }
        });     
     
	}


    }       
});

 }); 


// CARGA COMBOS UBIGEO <-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------

</script>