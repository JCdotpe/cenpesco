<?php 


$label1=  array('class' => 'preguntas_sub2');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class =  'span11';

//$NOM_DDi ='';
$filas_i = array(
	'name'	=> 'filas_i',
	'id'	=> 'filas_i',
	'value'	=> $num_filas +1,
	'maxlength'	=> 4,
	'class' => $span_class,
	'readonly' => 'readonly',
);
$filas_t = array(
	'name'	=> 'filas_t',
	'id'	=> 'filas_t',
	'value'	=> $num_filas_t,
	'maxlength'	=> 4,
	'class' => $span_class,
	'readonly' => 'readonly',
);

// A.  UBICACION GEOGRAFICA ----------------------------------

$CCDD = array(
	'name'	=> 'CCDD',
	'id'	=> 'CCDD',
	'value'	=> $CCDD,
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCPP = array(
	'name'	=> 'CCPP',
	'id'	=> 'CCPP',
	'value'	=> $CCPP,
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCDI = array(
	'name'	=> 'CCDI',
	'id'	=> 'CCDI',
	'value'	=> $CCDI,
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$COD_CCPP = array(
	'name'	=> 'COD_CCPP',
	'id'	=> 'COD_CCPP',
	'value'	=> $COD_CCPP,
	'maxlength'	=> 10,
	'class' => $span_class,
	'readonly' => 'readonly',
);

//B.  CENTRO POBLADO ---------------------------------------

$CCPP_CODPROC = array(
	'name'	=> 'CCPP_CODPROC',
	'id'	=> 'CCPP_CODPROC',
	'value'	=> $CCPP_CODPROC,
	'maxlength'	=> 10,
	'class' => $span_class,
	'readonly' => 'readonly',
);

//C.  AUTORIDAD RESPONSABLE ---------------------------------
$NOM_AUT = array(
	'name'	=> 'NOM_AUT',
	'id'	=> 'NOM_AUT',
	'value'	=> $NOM_AUT,
	'maxlength'	=> 80,
	'class' => $span_class,
	'onkeypress'=>"return soloLetras(event)",
);

$DNI_AUT = array(
	'name'	=> 'DNI_AUT',
	'id'	=> 'DNI_AUT',
	'value'	=> $DNI_AUT,
	'maxlength'	=> 8,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",

);

//.  DATOS DEL PESCADOR ---------------------------------
$F_D =array(
	'name'	=> 'F_D',
	'id'	=> 'F_D',
	'value'	=> $F_D,
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",

);
$F_M =array(
	'name'	=> 'F_M',
	'id'	=> 'F_M',
	'value'	=> $F_M,
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$F_A =array(
	'name'	=> 'F_A',
	'id'	=> 'F_A',
	'value'	=> 2013,
	'maxlength'	=> 4,
	'class' => $span_class,
	'readonly' => 'readonly',
);
$T_F_D =array(
	'name'	=> 'T_F_D',
	'id'	=> 'T_F_D',
	'value'	=> $T_F_D ,
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",

);
$T_PES =array(
	'name'	=> 'T_PES',
	'id'	=> 'T_PES',
	'value'	=> $T_PES,
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);

$T_ACUI =array(
	'name'	=> 'T_ACUI',
	'id'	=> 'T_ACUI',
	'value'	=> $T_ACUI,
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);

$T_PES_ACUI =array(
	'name'	=> 'T_PES_ACUI',
	'id'	=> 'T_PES_ACUI',
	'value'	=> $T_PES_ACUI,
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);

$T_EMB =array(
	'name'	=> 'T_EMB',
	'id'	=> 'T_EMB',
	'value'	=> $T_EMB,
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",

);
$NOM_EMP =array(
	'name'	=> 'NOM_EMP',
	'id'	=> 'NOM_EMP',
	'value'	=> $NOM_EMP,
	'maxlength'	=> 80,
	'class' => $span_class,
	'onkeypress'=>"return soloLetras(event)",	
);
$DNI_EMP =array(
	'name'	=> 'DNI_EMP',
	'id'	=> 'DNI_EMP',
	'value'	=> $DNI_EMP,
	'maxlength'	=> 8,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//DETALLE --------------------------------------------------------------

$P2 =array(
	'name'	=> 'P2',
	'id'	=> 'P2',
	'value'	=> set_value('P2'),
	'maxlength'	=> 80,
	'class' => $span_class,
	'onkeypress'=>"return soloLetras(event)",	
);
$P3 =array(
	'name'	=> 'P3',
	'id'	=> 'P3',
	'value'	=> set_value('P3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return solo_1_to_2(event)",		
);
$P4 =array(
	'name'	=> 'P4',
	'id'	=> 'P4',
	'value'	=> set_value('P4'),
	'maxlength'	=> 8,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",		
);

$P5 =array(
	'name'	=> 'P5',
	'id'	=> 'P5',
	'value'	=> set_value('P5'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return solo_1_to_3(event)",	
);
$P6 =array(
	'name'	=> 'P6',
	'id'	=> 'P6',
	'value'	=> set_value('P6'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return solo_1_to_9(event)",	

);

$P7 =array(
	'name'	=> 'P7',
	'id'	=> 'P7',
	'value'	=> set_value('P7'),
	'maxlength'	=> 100,
	'class' => $span_class,
	'onkeypress'=>"return alfa_numericos(event)",	
);
$P8 =array(
	'name'	=> 'P8',
	'id'	=> 'P8',
	'value'	=> set_value('P8'),
	'maxlength'	=> 10,
	'class' => $span_class,
	'onkeypress'=>"return alfa_numericos(event)",		
);
$P9 =array(
	'name'	=> 'P9',
	'id'	=> 'P9',
	'value'	=> set_value('P9'),
	'maxlength'	=> 10,
	'class' => $span_class,
	'onkeypress'=>"return alfa_numericos(event)",		
);
$P10 =array(
	'name'	=> 'P10',
	'id'	=> 'P10',
	'value'	=> set_value('P10'),
	'maxlength'	=> 10,
	'class' => $span_class,
	'onkeypress'=>"return alfa_numericos(event)",		
);
$P11 =array(
	'name'	=> 'P11',
	'id'	=> 'P11',
	'value'	=> set_value('P11'),
	'maxlength'	=> 3,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$P12 =array(
	'name'	=> 'P12',
	'id'	=> 'P12',
	'value'	=> set_value('P12'),
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return alfa_numericos(event)",	
);
$P13 = array(
	'name'	=> 'P13',
	'id'	=> 'P13',
	'value'	=> set_value('P13'),
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return alfa_numericos(event)",	
);
$P14 =array(
	'name'	=> 'P14',
	'id'	=> 'P14',
	'value'	=> set_value('P14'),
	'maxlength'	=> 5,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",

);
$P15 = array(
	'name'	=> 'P15',
	'id'	=> 'P15',
	'value'	=> set_value('P15'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$T_F_D_m =array(
	'name'	=> 'T_F_D_m',
	'id'	=> 'T_F_D_m',
	'value'	=> $T_F_D['value'],
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",		
);
$T_PES_m =array(
	'name'	=> 'T_PES_m',
	'id'	=> 'T_PES_m',
	'value'	=> $T_PES['value'],
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",		
);
$T_ACUI_m =array(
	'name'	=> 'T_ACUI_m',
	'id'	=> 'T_ACUI_m',
	'value'	=> $T_ACUI['value'],
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",		
);
$T_PES_ACUI_m =array(
	'name'	=> 'T_PES_ACUI_m',
	'id'	=> 'T_PES_ACUI_m',
	'value'	=> $T_PES_ACUI['value'],
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",		
);
$T_EMB_m =array(
	'name'	=> 'T_EMB_m',
	'id'	=> 'T_EMB_m',
	'value'	=> $T_EMB['value'],
	'maxlength'	=> 4,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",	
);

$OBS =array(
	'name'	=> 'OBS',
	'id'	=> 'OBS',
	'value'	=> $OBS,
	'maxlength'	=> 1000,
	'class' => $span_class,
	'rows'	=> 3,
	'cols'	=> 10,
	'onkeypress'=>"return alfa_numericos(event)",	
);


// CARGAR COMBOS

	$depaArray = NULL; 
	if (!$detalle){
		foreach($departamento->result() as $filas) {
	        $depaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);		}
	}else {
		foreach($departamento->result() as $filas) {
	        $depaArray[$filas->CCDD]=strtoupper($filas->NOM_DD);				
	}
}

	$selected_NOM_DD = (set_value('NOM_DD_f')) ?  set_value('NOM_DD_f') : '';

	$provArray = array(-1 => $NOM_PP_c); 
	$selected_NOM_PP = (set_value('NOM_PP_f')) ?  set_value('NOM_PP_f') : '';

	$distArray = array(-1 => $NOM_DI_c); 
	$selected_NOM_DI = (set_value('NOM_DI_f')) ?  set_value('NOM_DI_f') : '';

	$ccppArray = array(-1 =>$NOM_CCPP_c);
	$selected_NOM_CCPP = (set_value('NOM_CCPP_f')) ?  set_value('NOM_CCPP_f') : '';

	$ccppArray_proc = array(-1 =>$CCPP_PROC_c);
	$selected_NOM_CCPP_proc = (set_value('CCPP_PROC_f')) ?  set_value('CCPP_PROC_f') : '';	

// FORM 1 --------------------------------------------------------------------------------------------->
$attr = array('class' => 'form-val','id' => 'frm_reg_pesc' ,'name' => 'frm_reg_pesc', 'style' => 'overflow: auto;');
echo form_open($this->uri->uri_string(),$attr); 

	if ($this->session->flashdata('msgbox')==='busca'){
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ADVERTENCIA! </strong>';
			    echo ' No existe registro con el ubigeo ingresado';
		    echo '</div>';
	    echo '</div>';
	} elseif ($this->session->flashdata('msgbox')==='actualiza_resumen') {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' Inesperado, no se pudo actualizar';
		    echo '</div>';
	    echo '</div>';
	}elseif($this->session->flashdata('msgbox')==='CCPP'){
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ADVERTENCIA! </strong>';
			    echo ' El centro poblado ya está registrado';
		    echo '</div>';
	    echo '</div>';
	}elseif ($this->session->flashdata('msgbox')==='guardado') {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-success">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>EXITOSO! </strong>';
			    echo ' El registro fue guardado satisfactoriamente';
		    echo '</div>';
	    echo '</div>';
	}elseif ($this->session->flashdata('msgbox')==='error') {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' Inesperado, no se pudo actualizar';
		    echo '</div>';
	    echo '</div>';
	}elseif ($this->session->flashdata('msgbox')==='error_odei') {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' Inesperado, DOBLE o NINGUN ODEI AL MOMENTO DE GUARDAR';
		    echo '</div>';
	    echo '</div>';
	}elseif ($this->session->flashdata('msgbox')==='no_piloto') {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' Usuario PILOTO no esta permitido guardar';
		    echo '</div>';
	    echo '</div>';
	}elseif($this->session->flashdata('msgbox')==='UDRA'){
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ADVERTENCIA! </strong>';
			    echo ' El centro poblado no está registrado en UDRA';
		    echo '</div>';
	    echo '</div>';
	}

	echo '<div class="row-fluid ">';
		echo '<div class="span12 preguntas_n">';
			echo '<h3>REGISTRO DE PESCADORES Y ACUICULTORES</h3>';
		echo '</div>';	
	echo '</div>'; 

	echo '<div class="well modulo" id="div_registro_pes">';

		echo '<div class="row-fluid">';

			//FILA 1
			echo '<div class="row-fluid" id="reg_ubicacion">'; 

				//A.-----------------------------------------
				echo '<div class="span4 preguntas" style="padding-bottom: 23px !important" id="SEC1">';

					echo '<div class="span12 titulos">';
						echo '<h5>A. UBICACION GEOGRAFICA</h5>';
					echo '</div>';							
			
					echo '<div class="row-fluid">';

						echo '<div class="control-group grupos">';
							echo form_label('DEPARTAMENTO','NOM_DD_f',$label1);
							echo '<fieldset>';
								echo '<div class="controls span2 grupos">';
									echo form_input($CCDD); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($CCDD['name']) . '</div>';
								echo '</div>';	
								echo '<div class="controls span10 grupos">';
									echo form_dropdown('NOM_DD_f', $depaArray, $selected_NOM_DD,'class=" span12" id="NOM_DD_f"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('NOM_DD_f') . '</div>';
									echo '<input type="hidden" name="NOM_DD" id="NOM_DD" />';
									echo '<input type="hidden" name="ODEI_COD" id="ODEI_COD" />';
									echo '<input type="hidden" name="NOM_ODEI" id="NOM_ODEI" />';
									echo '<input type="hidden" name="SEDE_COD" id="SEDE_COD" />';
									echo '<input type="hidden" name="NOM_SEDE" id="NOM_SEDE" />';									
								echo '</div>';
							echo '</fieldset>';
						echo '</div>'; 

					echo '</div>'; 

					echo '<div class="row-fluid">';

						echo '<div class="control-group grupos">';

							echo form_label('PROVINCIA','NOM_PP_f',$label1);

							echo '<fieldset>';
								echo '<div class="controls span2">';
									echo form_input($CCPP); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($CCPP['name']) . '</div>';
								echo '</div>';	

								echo '<div class="controls span10">';
									echo form_dropdown('NOM_PP_f', $provArray, $selected_NOM_PP,'class="span12" id="NOM_PP_f"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('NOM_PP_f') . '</div>';
									echo '<input type="hidden" name="NOM_PP" id="NOM_PP" />';
								echo '</div>';	

							echo '</fieldset>';

						echo '</div>'; 

					echo '</div>'; 	

					echo '<div class="row-fluid">';

						echo '<div class="control-group grupos">';

							echo form_label('DISTRITO','NOM_DI_f',$label1);

							echo '<fieldset>';
								echo '<div class="controls span2">';
									echo form_input($CCDI); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($CCDI['name']) . '</div>';
								echo '</div>';	

								echo '<div class="controls span10">';
									echo form_dropdown('NOM_DI_f', $distArray, $selected_NOM_DI,'class="span12" id="NOM_DI_f"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('NOM_DI_f') . '</div>';
									echo '<input type="hidden" name="NOM_DI" id="NOM_DI" />';
								echo '</div>';	

							echo '</fieldset>';

						echo '</div>'; 
				
					echo '</div>';

					echo '<div class="row-fluid">';

						echo '<div class="control-group grupos">';

							echo form_label('CENTRO POBLADO','NOM_CCPP_f',$label1);

							echo '<fieldset>';
								echo '<div class="controls span3">';
									echo form_input($COD_CCPP); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($COD_CCPP['name']) . '</div>';
								echo '</div>';	
								echo '<div class="controls span9">';
									echo form_dropdown('NOM_CCPP_f', $ccppArray, $selected_NOM_CCPP,'class="span12" id="NOM_CCPP_f"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('NOM_CCPP_f') . '</div>';
									echo '<input type="hidden" name="NOM_CCPP" id="NOM_CCPP" />';
								echo '</div>';	

							echo '</fieldset>';

						echo '</div>'; 
	
					echo '</div>'; 					
					//echo '</fieldset>';

				echo '</div>'; // A

				//B.-----------------------------------------
				echo '<div class="span8">';

					echo '<div class="row-fluid ">';

						echo '<div class="span6 preguntas" id="SEC2">';

							echo '<div class="span12 titulos">';
								echo '<h5>B. PROCEDENCIA</h5>';
							echo '</div>';	

							echo '<div class="row-fluid">';

								echo '<div class="control-group grupos">';

									echo form_label('CENTRO POBLADO','CCPP_PROC_f',$label1);

									echo '<fieldset>';
										echo '<div class="controls span3">';
											echo form_input($CCPP_CODPROC); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($CCPP_CODPROC['name']) . '</div>';
										echo '</div>';	
										echo '<div class="controls span9">';
											echo form_dropdown('CCPP_PROC_f', $ccppArray_proc, $selected_NOM_CCPP_proc,'class="span12" id="CCPP_PROC_f"'); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error('CCPP_PROC_f') . '</div>';
											echo '<input type="hidden" name="CCPP_PROC" id="CCPP_PROC" />';
										echo '</div>';	
									echo '</fieldset>';

								echo '</div>'; 

							echo '</div>'; 

						echo '</div>'; 

						echo '<div class="span6 preguntas" id="SEC3">';

							echo '<div class="span12 titulos">';
								echo '<h5>C. FECHA</h5>';
							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="control-group grupos span3">';

									echo form_label('DIA','F_D',$label1);

									echo '<div class="controls">';
										echo form_input($F_D); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_D['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

								echo '<div class="control-group grupos offset1 span3">';

									echo form_label('MES','F_M',$label1);

									echo '<div class="controls">';
										echo form_input($F_M); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_M['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 

								echo '<div class="control-group grupos offset1 span3">';

									echo form_label('AÑO','F_A',$label1);

									echo '<div class="controls">';
										echo form_input($F_A); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_A['name']) . '</div>';
									echo '</div>';	

								echo '</div>'; 						

							echo '</div>';

						echo '</div>'; 

					echo '</div>'; 

					echo '<div class="row-fluid ">';

						echo '<div class="span6">';

							echo '<div class="row-fluid ">';
								//D.-----------------------------------------
								echo '<div class="preguntas" id="SEC4">';

									echo '<div class="row-fluid">';

										echo '<div class="span12 titulos">';
											echo '<h5>D. AUTORIDAD</h5>';
										echo '</div>';	

									echo '</div>'; 

									echo '<div class="row-fluid">';

										echo '<div class="control-group grupos span8">';
											echo form_label('APELLIDOS Y NOMBRES',$NOM_AUT['id'],$label1);
											echo '<div class="controls">';
												echo form_input($NOM_AUT); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($NOM_AUT['name']) . '</div>';								
											echo '</div>';	
										echo '</div>'; 

										echo '<div class="control-group grupos span4">';
											echo form_label('DNI',$DNI_AUT['id'],$label1);
											echo '<div class="controls">';
												echo form_input($DNI_AUT); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($DNI_AUT['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 
										
									echo '</div>';
								
								echo '</div>';  //D
							echo '</div>';

							echo '<div class="row-fluid ">';
								// E -------------------------
								echo '<div class="preguntas" style="padding-bottom: 17px !important" id="SEC5">';

									echo '<div class="row-fluid">';

										echo '<div class="span12 titulos">';
											echo '<h5>E. DATOS DEL EMPADRONADOR/JEFE DE BRIGADA</h5>';
										echo '</div>';

									echo '</div>';

									echo '<div class="row-fluid">';

										echo '<div class="control-group grupos span8">';
											echo form_label('APELLIDOS Y NOMBRES',$NOM_EMP['id'],$label1);
											echo '<div class="controls">';
												echo form_input($NOM_EMP); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($NOM_EMP['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 

										echo '<div class="control-group grupos span4">';
											echo form_label('DNI',$DNI_EMP['id'],$label1);
											echo '<div class="controls">';
												echo form_input($DNI_EMP); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($DNI_EMP['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 

									echo '</div>';

								echo '</div>'; 	// E
							echo '</div>';

						echo '</div>';

						echo '<div class="span6">';
							// F -----------------------
							echo '<div class="preguntas" id="SEC6">';

								echo '<div class="row-fluid" >';

									echo '<div class="span12 titulos">';
										echo '<h5>F.  RESUMEN DEL REGISTRO</h5>';
									echo '</div>';

								echo '</div>';

								echo '<div class="row-fluid">';

									echo '<div class="control-group span6 grupos_span3">';
										echo form_label('Filas',$T_F_D['id'],$label1);
										echo '<div class="controls">';
											echo form_input($T_F_D); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($T_F_D['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 

									echo '<div class="control-group span6 grupos_span3">';
										echo form_label('Pescadores',$T_PES['id'],$label1);
										echo '<div class="controls">';
											echo form_input($T_PES); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($T_PES['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 

								echo '</div>';

								echo '<div class="row-fluid">';

									echo '<div class="control-group span6 grupos_span3">';
										echo form_label('Acuicultores',$T_ACUI['id'],$label1);
										echo '<div class="controls">';
											echo form_input($T_ACUI); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($T_ACUI['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 

									echo '<div class="control-group span6 grupos_span3">';
										echo form_label('Pescadores y Acuicultores',$T_PES_ACUI['id'],$label1);
										echo '<div class="controls">';
											echo form_input($T_PES_ACUI); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($T_PES_ACUI['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 

								echo '</div>';

								echo '<div class="row-fluid">';

									echo '<div class="control-group offset3 span6 grupos_span3">';
										echo form_label('Embarcaciones',$T_EMB['id'],$label1);
										echo '<div class="controls">';
											echo form_input($T_EMB); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($T_EMB['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 

								echo '</div>';

							echo '</div>'; 	//F	

						echo '</div>';

					echo '</div>'; 



				echo '</div>';  // B-------------------------

			echo '</div>';   //A - B - C

	
		echo '</div>'; 

	echo '</div>'; 

	//HABILITA BOTONES
	if ($num_filas === 0 && $num_filas_t===0){
		echo '<a href="#form_busca" role="button" class="btn btn-primary" data-toggle="modal">Buscar</a>';
		echo form_submit('send', 'Registrar','class="btn btn-primary pull-right"');  
	}else{
		echo '<a href="#form_reg_pes_mod" role="button" class="btn btn-primary pull-right" data-toggle="modal">Modificar</a>';
	}

echo form_close();
// FORM 1 <---------------------------------

if($detalle){
	// FORM 2 --------------------------------------------------------------------------------------------->
	$attr = array('class' => 'form-val','id' => 'form_registro_dat', 'style' => 'overflow: auto;');
	echo form_open($this->uri->uri_string(),$attr); 
		

		echo '<div class="well modulo">';
			
			if ($num_filas<$num_filas_t){ //
				echo '<div class="row-fluid">';

					echo '<div class="offset1 span2">';
						echo '<h5>REGISTRANDO </h5>';
					echo '</div>';

					echo '<div class="span1">';
						echo form_input($filas_i); 
					echo '</div>';

					echo '<div class="span1">';
						echo '<h5>DE </h5>';
					echo '</div>';

					echo '<div class="span1">';
						echo form_input($filas_t); 
					echo '</div>';

				echo '</div>';
			}

			//Fila 1
			echo '<div class="row-fluid ">';

				echo '<div class="span12 preguntas" id="SEC7">';

					echo '<div class="row-fluid">';

						echo '<div class="span11 preguntas_n">';

							echo '<h4>H. DATOS DEL PESCADOR / ACUICULTOR</h4>';

						echo '</div>';

					echo '</div>';					

					echo '<div class="row-fluid">';

						echo '<div class="span7">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Apellidos y Nombres del Pescador / Acuicultor</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P2); 
												echo '<span class="help-inline">*</span>';
												echo '<div class="help-block error">' . form_error($P2['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Sexo</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P3); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P3['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span3">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>DNI</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P4); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P4['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	
						
						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Ocupación</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P5); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P5['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	


					echo '</div>';	

				echo '</div>';	
					
			echo '</div>'; //1


			//fila 2
			echo '<div class="row-fluid ">';

				echo '<div class="span10 preguntas" id="SEC8">';

					echo '<div class="row-fluid">';

						echo '<div class="span11 preguntas_n">';

							echo '<h4>Tipo y Nombre de vía</h4>';

						echo '</div>';

					echo '</div>';			

					echo '<div class="row-fluid">';

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Tipo via</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P6); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P6['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span4">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Nombre de Vía</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P7); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P7['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>N° Puerta</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P8); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P8['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Block</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P9); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P9['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	
						
						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Interior</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
										echo '<div class="controls">';
											echo form_input($P10); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($P10['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Piso N°</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P11); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P11['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Manz. N°</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P12); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P12['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>Lote</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P13); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P13['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';	

						echo '<div class="span1">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>KM</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12 preguntas_n2">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_input($P14); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error($P14['name']) . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>';	

							echo '</div>';	

						echo '</div>';					

					echo '</div>';	

				echo '</div>';	
					

				echo '<div class="span2 preguntas" style="padding-bottom: 28px !important" id="SEC9">';

					echo '<div class="row-fluid">';

						echo '<div class="span10 preguntas_sub">';

							echo '<h5>N° de Embarcaciones</h5>';

						echo '</div>';	

					echo '</div>';	

					echo '<div class="row-fluid">';
					
						echo '<div class="span12">';

							echo '<div class="span12 preguntas_n2">';
								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($P15); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($P15['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 
							echo '</div>';	
						
						echo '</div>';	

					echo '</div>';

				echo '</div>';	

			echo '</div>'; 

		echo '</div>'; 	

		if ($num_filas < $num_filas_t){ //si hay filas para ingresar

			echo '<div class="row-fluid">';
				echo form_submit('send', 'Ingresar','class="btn btn-primary pull-right"');  
			echo '</div>';
		}

	echo form_close();
	// FORM 2 <---------------------------------

	// MENSAJES ERRORES ------------------------------------------------------------------------------->
	echo '<div class="row-fluid">';
		if ($error===1){
		    echo '<div class="alert alert-error">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR 1! </strong>';
			    echo ' El N° de filas declaradas no coincide con la cantidad declaradas en el resumen de registro.';
		    echo '</div>';
		}elseif ($error===2){
			// mensaje ERROR 2
		    echo '<div class="alert alert-error">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR 2! </strong>';
			    echo ' El N° de pescadores declaradas no coincide con la cantidad declaradas en el resumen de registro.';
		    echo '</div>';
		} elseif ($error===3) {
		    echo '<div class="alert alert-error">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>Error 3! </strong>';
			    echo ' El N° de acuicultores declaradas no coincide con la cantidad declaradas en el resumen de registro.';
		    echo '</div>';	
		}elseif ($error===4) {
		    echo '<div class="alert alert-error">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>Error 4! </strong>';
			    echo ' El N° de pescadores-acuicultores declaradas no coincide con la cantidad declaradas en el resumen de registro.';						    
			    echo '</div>';							
		}elseif ($error===5) {
		    echo '<div class="alert alert-error">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>Error 5! </strong>';
			    echo ' El N° de embarcaciones declaradas no coincide con la cantidad declaradas en el resumen de registro.';						    
			    echo '</div>';							
		}
	echo '</div>'; 	
	// MENSAJES ERRORES <-----------------------

	// TABLA DETALLE --------------------------------------------------------------------------------->
	if ($num_filas>= 1 && $num_filas_t >= 0 ){
		
		echo '<div class="row-fluid">';

			echo '<div class="span12">';

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>Apellidos y Nombres</th>';
						echo '<th>Sexo</th>';
						echo '<th>DNI N°</th>';
						echo '<th>Ocupación</th>';
						echo '<th>Tipo de vía</th>';
						echo '<th>Nombre de Vía</th>';
						echo '<th>N° de Puerta</th>';
						echo '<th>Block</th>';
						echo '<th>Interior N°</th>';
						echo '<th>Piso N°</th>';
						echo '<th>Mz</th>';
						echo '<th>Lote</th>';
						echo '<th>Km</th>';
						echo '<th>N° Embarcaciones</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $row->P1 ."</td>";
						echo "<td>". $row->P2 ."</td>";
						echo "<td>". $row->P3 ."</td>";
						echo "<td>". $row->P4 ."</td>";
						echo "<td>". $row->P5 ."</td>";
						echo "<td>". $row->P6 ."</td>";
						echo "<td>". $row->P7 ."</td>";
						echo "<td>". $row->P8 ."</td>";
						echo "<td>". $row->P9 ."</td>";
						echo "<td>". $row->P10 ."</td>";
						echo "<td>". $row->P11 ."</td>";
						echo "<td>". $row->P12 ."</td>";
						echo "<td>". $row->P13 ."</td>";
						echo "<td>". $row->P14 ."</td>";
						echo "<td>". $row->P15 ."</td>";
						echo "</tr>";  }
					echo '</tbody>';
				echo '</table>';

			echo '</div>'; 	

		echo '</div>'; 
	}		
	// TABLA DETALLE <---------------------------

	echo '<div class="row-fluid">';

		echo '<div class="span12">';
			$attr = array('class' => 'form-val','id' => 'guarda', 'style' => 'overflow: auto;');
			echo form_open($this->uri->uri_string(),$attr); 

				if (($num_filas == $num_filas_t) && is_numeric($opx))
					{ 
						echo '<div class="row-fluid">';
							echo form_textarea ($OBS);
						echo '</div>';
						echo '<div class="row-fluid">';
						echo form_submit('send','Guardar','class="btn btn-primary pull-center"');
						echo '</div>';
					}
			echo form_close();
		echo '</div>'; 	

	echo '</div>'; 
}

// FORM POPUP FILTRAR ------------------------------------------------------------------------------------>

echo '<div id="form_busca" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
	echo '<div class="modal-header">';
		echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
		echo '<h3 id="myModalLabel">Buscar</h3>';
	echo '</div>';

	echo '<div class="modal-body">';

		$attr = array('class' => 'form-val','id' => 'frm_buscar_reg', 'style' => 'overflow: auto;');
		echo form_open($this->uri->uri_string(),$attr); 

		echo '<div class="well modulo">';

			echo '<div class="row-fluid">';
	
				//A.-----------------------------------------
				echo '<div class="row-fluid">';
					
					echo '<div class="row-fluid">';

						echo '<div class="span12 titulos">';
							echo '<h5>UBICACION GEOGRAFICA</h5>';
						echo '</div>';	

					echo '</div>'; 

					echo '<div class="row-fluid">';

						echo '<div class="span6">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>DEPARTAMENTO</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';


								echo '<div class="span12">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_dropdown('NOM_DD_2', $depaArray, $selected_NOM_DD,'class="' . $span_class . '" id="NOM_DD_2"'); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('NOM_DD_2') . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>'; 

							echo '</div>';

						echo '</div>'; 

						echo '<div class="span6">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>PROVINCIA</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_dropdown('NOM_PP_2', $provArray, $selected_NOM_PP,'class="' . $span_class . '" id="NOM_PP_2"'); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('NOM_PP_2') . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>'; 

							echo '</div>';

						echo '</div>'; 

					echo '</div>'; 

					echo '<div class="row-fluid">';

						echo '<div class="span6">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>DISTRITO</p>';
								echo '</div>';

							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_dropdown('NOM_DI_2', $distArray, $selected_NOM_DI,'class="' . $span_class . '" id="NOM_DI_2"'); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('NOM_DI_2') . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>'; 

							echo '</div>';

						echo '</div>';	

						echo '<div class="span6">';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<p>CENTRO POBLADO</p>';
								echo '</div>';
								
							echo '</div>';

							echo '<div class="row-fluid">';

								echo '<div class="span12">';
									echo '<div class="control-group">';
											echo '<div class="controls">';
												echo form_dropdown('NOM_CCPP_2', $ccppArray, $selected_NOM_CCPP,'class="' . $span_class . '" id="NOM_CCPP_2"'); 
												echo '<span class="help-inline">*</span>';
												echo '<div class="help-block error">' . form_error('NOM_CCPP_2') . '</div>';
											echo '</div>';	
									echo '</div>'; 
								echo '</div>'; 

							echo '</div>';

						echo '</div>';

					echo '</div>';

				echo '</div>'; // A
			
			echo '</div>'; 

			echo '<div class="row-fluid">';

				echo '<div class="row-fluid">';

					echo '<div class="span12 titulos">';
						echo '<h5>UBICACION CENSAL</h5>';
					echo '</div>';	

				echo '</div>'; 

				echo '<div class="row-fluid">';
					echo form_label('CENTRO POBLADO DE PROCEDENCIA','CCPP_PROC_2',$label1);
				echo '</div>';

				echo '<div class="row-fluid">';
					echo '<div class="control-group span6">';
							echo '<div class="controls">';
								echo form_dropdown('CCPP_PROC_2', $ccppArray, $selected_NOM_CCPP,'class="' . $span_class . '" id="CCPP_PROC_2"'); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error('CCPP_PROC_2') . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>'; 

			echo '</div>';


		echo '</div>'; 

		echo form_submit('send', 'Filtrar','class="btn btn-primary pull-right"');  

		echo form_close();


	echo '</div>';

	echo '<div class="modal-footer">';

	echo '</div>';

echo '</div>';

// FORM POPUP <-----------------------------

// FORM POPUP MODIFICAR ---------------------------------------------------------------------------------->

echo '<div id="form_reg_pes_mod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
	echo '<div class="modal-header">';
		echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
		echo '<h3 id="myModalLabel">Buscar</h3>';
	echo '</div>';

	echo '<div class="modal-body">';

		$attr = array('class' => 'form-val','id' => 'frm_reg_mod', 'style' => 'overflow: auto;');
		echo form_open($this->uri->uri_string(),$attr); 

		echo '<div class="well modulo">';

			echo '<div class="row-fluid">';

		
					echo '<div class="span12 preguntas">';


						echo '<div class="row-fluid">';

							echo '<div class="span12 titulos">';
								echo '<h5>F.  RESUMEN DEL REGISTRO</h5>';
							echo '</div>';

						echo '</div>';

						echo '<div class="row-fluid">';
	
							echo '<div class="control-group span6">';
								echo form_label('Filas',$T_F_D_m['id'],$label1);
								echo '<div class="controls">';
									echo form_input($T_F_D_m); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($T_F_D_m['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

							echo '<div class="control-group span6">';
								echo form_label('Pescadores',$T_PES_m['id'],$label1);
								echo '<div class="controls">';
									echo form_input($T_PES_m); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($T_PES_m['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="row-fluid">';
	
							echo '<div class="control-group span6">';
								echo form_label('Acuicultores',$T_ACUI_m['id'],$label1);
								echo '<div class="controls">';
									echo form_input($T_ACUI_m); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($T_ACUI_m['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

							echo '<div class="control-group span6">';
								echo form_label('Pescadores y Acuicultores',$T_PES_ACUI_m['id'],$label1);
								echo '<div class="controls">';
									echo form_input($T_PES_ACUI_m); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($T_PES_ACUI_m['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group offset3 span6">';
								echo form_label('Embarcaciones',$T_EMB_m['id'],$label1);
								echo '<div class="controls">';
									echo form_input($T_EMB_m); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($T_EMB_m['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';
					echo '</div>'; 
			
			echo '</div>'; 

		echo '</div>'; 

		echo form_submit('send', 'Modificar','class="btn btn-primary pull-right"');  

		echo form_close();


	echo '</div>';

	echo '<div class="modal-footer">';

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

///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////  D I V     S E L E C C I O N A D O   \\\\\\\\\\\\\\\\\\\\\
    $(document).ready(function(){
        for ( s = 1; s < 10; s++) {
              $("#SEC"+s).focusin(function(){
                //$(this).css("background-color","#A9D0F5");
                $(this).css("border","3px solid #ff9900");
              });   
              $("#SEC"+s).focusout(function(){
                $(this).css("border","1px solid #989898");
              });              
                   	
        };
    });
//\\\\\\\\\\\\\\\\\\  D I V     S E L E C C I O N A D O   /////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////
// <<=================== E N T E R   L I K E  T A B  ======================>>//
    $('input').keydown( function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
            var array_otros = ['S3_4_4','S3_5_5','S3_7_4','S3_9_5','S3_11_10','S3_15_5','S3_16_8','S3_16_9','S3_17_5','S3_17_6','S3_18_4', //SECCCION 3
                                'S5_2_7','S5_3_17', // SECCION 5
                                'S6_3_6','S6_4_15']; // SECCION 6
            var array_libres = ['P8','P9','P10','P11','P12','P13'];
	  	 	var array_ninguno = ['S3_8_6','S3_8_10','S3_18_5','S6_3_7','S7_2_10','S7_6_4','S7_8_20','S7_16_5']; // NINGUNOS

            if(key == 13) {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:enabled:visible');
                $(this).blur();  
                if ( inArray($(this).attr('id'), array_libres )) {// CAMPOS LIBRES: no requieren ingreso obligatorio
                    inputs.eq( inputs.index(this)+ 1 ).focus(); 
                    return;
                }else if($(this).attr('id') == 'P14'){
                	var conx = 0;
                	$.each(array_libres, function(key , value)  {
                		if ($("#" + value).val() =="" ){
                			conx++;
                		}
                	})
                	if($(this).val()=="" && conx == 6){
                    	alert("Debe ingresar al menos un dato en N° Puerta, Block, Interior, N° Piso, KM, Lote");
                        inputs.eq( inputs.index(this) - 6 ).focus(); 
                	}else{
                		inputs.eq( inputs.index(this) + 1 ).focus(); 
                	}
                                            
                }else if ($(this).val()==""){
                // NO VACIOS
                    // if( $(this).attr('id') == 'P4' ){// PREGUNTA CON OTRO Y UN SOLO INGRESO
                    //     if (inArray($(this).attr('id'),array_libres) ) {
                    //     	var inp = this;
                    //     	var con = 0;
                    //     	if ($(inp).val() == ""){
                    //     		con++;
                    //     	}
                    //     	if (con => 1) {
                    //     		alert("Debe ingresar al menos uno de los datos de direccion");
                        		
                    //     	} else{};
                    //         inputs.eq( inputs.index(this)+ 1 ).focus();                              
                    //     } else{
                    //         inputs.eq( inputs.index(this)+ 2 ).focus();                             
                    //     }
                    // }                
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                        inputs.eq( inputs.index(this)+ 1 ).focus(); 
                                            
                }
            }else if (key == 37) {
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






// VALIDA TECLAS =========================================================================>

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
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
// <<======= S O L O   D E C I M A L ES ===========>>//
    function solo_1_to_9(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789.";
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
// <<======= S O L O   D E C I M A L ES ===========>>//

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
        letras = "1239";
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

// <<======= S O L O   N U M E R O S  1 - 9 ===========>>//
    function solo_1_to_9(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "123456789";
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
// =======>> S O L O   N U M E R O S  1 - 9 <<===========//

//<=====================

$(function(){

$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
    // email: "Please enter a valid email address.",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
    //number: "Solo se permiten números",
     digits: "Solo se permiten números",
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


///////////////////////////////////////////
	$("#P2").focus();
///////////////////////////////////////////
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
// window.clo


// R E G I S T R O    D E P E S C A D O R E S ------------------------------------------------------------------>
$("#frm_reg_pesc").validate({
    rules: {

        NOM_DD_f:{
            valueNotEquals: -1,
        },
        CCDD:{
            required: true,
            number: true,
            maxlength:2,
        },
        NOM_PP_f:{
            valueNotEquals: -1,
        },
        CCPP:{
            required: true,
            number: true,
            maxlength:2,
        },        
        NOM_DI_f:{
            valueNotEquals: -1,
        },
        CCDI:{
            required: true,
            number: true,
            maxlength:2,
        },        
        NOM_CCPP_f:{
            valueNotEquals: -1,
        },
        COD_CCPP:{
            required: true,
            number: true,
            maxlength:4,
        },  
        CCPP_PROC_f:{
            valueNotEquals: -1,
        },
        CCPP_CODPROC:{
            required: true,
            number: true,
            maxlength:4,
        },               
        CAT:{
            required: false,
            validName: true,
            maxlength: 80, 
         }, 
        NOM_AUT:{
            required: true,
            validName:true,
            maxlength: 80, 
         },           
        DNI_AUT:{
            required: true,
            number:true,
            maxlength: 8, 
            exactlength: 8, 
         },
        F_D:{
            required: true,
            number: true,
            exactlength: 2, 
            range: [1,31],            
         },          
        F_M:{
            required: true,
            number: true,
            exactlength: 2, 
            range: [8,9],            
        },   
        F_A:{
            required: true,
            number: true,
            exactlength: 4,
            valueEquals :2013,         
         },            
        T_F_D:{
            required: true,
            number: true,
            maxlength: 4,  
            range: [0,9998],           
         },   
        T_PES:{
            required: true,
            number: true,
            maxlength: 4, 
            range: [0,9998],              
         },   
        T_ACUI:{
            required: true,
            number: true,
            maxlength: 4, 
            range: [0,9998],             
         },   
        T_PES_ACUI:{
            required: true,
            number: true,
            maxlength: 4, 
            range: [0,9998],             
         },   
        T_EMB:{
            required: true,
            number: true,
            maxlength: 4,     
            range: [0,9998],         
         },   
        NOM_EMP:{
            required: true,
            validName: true,
            maxlength: 80,            
         },   
        DNI_EMP:{
            required: true,
            number: true,
            maxlength: 8, 
            exactlength: 8,           
         },                 
                                                            
    //FIN RULES
    },

    messages: {

        NOM_DD_f:{
            valueNotEquals: "Ingrese DEPARTAMENTO",
        },
        CCDD:{
            required: "Ingrese codigo",
            number: "Solo números",
            maxlength:"Longitud maxima (02)",
        },        
        NOM_PP_f:{
            valueNotEquals: "Ingrese PROVINCIA",
        },
        CCPP:{
            required: "Ingrese codigo",
            number: "Solo números",
            maxlength:"Longitud maxima (02)",
        },         
        NOM_DI_f:{
            valueNotEquals: "Ingrese DISTRITO",
        },
        CCDI:{
            required: "Ingrese codigo",
            number: "Solo números",
            maxlength:"Longitud maxima (02)",
        },     
        NOM_CCPP_f:{
            valueNotEquals: "Ingrese CENTRO POBLADO",
        },   
        COD_CCPP:{
            required: "Ingrese codigo",
            number: "Solo números",
            maxlength:"Longitud maxima (10)",
        },    
        CCPP_PROC_f:{
            valueNotEquals: "Ingrese CENTRO POBLADO",
        },   
        CCPP_CODPROC:{
            required: "Ingrese CÓDIGO",
            number: "Solo números",
            maxlength:"Longitud maxima (10)",
        },   
        NOM_AUT:{
            required: "Ingrese NOMBRE AUTORIDAD",
         },                               
        DNI_AUT:{
            required: "Ingrese DNI AUTORIDAD",
            number:'Sólo números',
            exactlength: 'Ingrese DNI válido', 
         },
        F_D:{
            required: "Ingrese DIA",
            number: "Solo números",
            exactlength: "Ingrese dia válido",  
            range: "Ingrese dia válido",            
         },                             
        F_M:{
            required: "Ingrese MES",
            number: "Solo números",
            exactlength: "Ingrese mes válido", 
            range: "Ingrese meses entre 08  y 09",              
         },   
        F_A:{
            required: "Ingrese AÑO",
            number: "Solo números",
            exactlength: "Ingrese año válido", 
            valueEquals :"Año invalido",              
         },            
        T_F_D:{
            required: "Ingrese N° FILAS",
            number: "Solo números",
            range: "Ingrese numeros entre 1  y 9998",
           
         },   
        T_PES:{
            required: "Ingrese N° PESCADORES",
            number: "Solo números",
            range: "Ingrese numeros entre 0  y 9998",
         },   
        T_ACUI:{
            required: "Ingrese N° ACUICULTORES",
            number: "Solo números", 
            range: "Ingrese numeros entre 0  y 9998",          
         },   
        T_PES_ACUI:{
            required: "Ingrese N° ACUICULTORES",
            number: "Solo números", 
            range: "Ingrese numeros entre 0  y 9998",          
         },            
        T_EMB:{
            required: "Ingrese TOTAL EMBARCACIONES",
            number: "Solo números",
            range: "Ingrese numeros entre 0  y 9998",
         },
        NOM_EMP:{
            required: 'Ingrese NOMBRE EMPADRONADOR',
         },               
        DNI_EMP:{
            required: 'Ingrese DNI',
            number: "Solo números",
            maxlength: 'Ingrese DNI válido', 
            exactlength: "Ingrese DNI válido",           
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
    // submitHandler: function(form) {
    //     //('#frm_reg_pesc').submit(); //submit it the form

    // }       
});


//FORM DE REGISTRO PESCADORES DETALLE ---------------------------------------->

$("#form_registro_dat").validate({
    rules: {
          
        P2:{
            required: true,
            validName: true,
            maxlength: 80,            
         },   
        P3:{
            required: true,
            number: true,
            exactlength: 1,
            range: [1,2], 
         },        
         P4:{
            required: true,
            number: true,
            exactlength: 8, 
            range: [1,99999998],
         },

        P5:{
            required: true,
            number: true,
            exactlength: 1, 
            //match:"[1,7,9]",
         },
        P6:{
            required: true,
            number: true,
            exactlength: 1, 
            //match: [1,7,9],
         },
        P7:{
            required: true,
            //alphanumeric: true,
            maxlength: 100, 
         },
        P8:{
            required: false,
            alphanumeric: true,
            maxlength: 10, 
         },
        P9:{
            required: false,
            alphanumeric: true,
            maxlength: 10, 
         },
        P10:{
            required: false,
            alphanumeric: true,
            maxlength: 10, 
         },
        P11:{
            required: true,
            maxlength: 3,
            number: true,
            range: [1,20],
         },
        P12:{
            required: false,
            maxlength: 4,
            alphanumeric:true,
         },
        P13:{
            required: false,
            maxlength: 4,
            alphanumeric: true,
         },
        P14:{
            required: false,
            maxlength: 5,
         },         
        P15:{
            number: true,
            required: true,
            range: [0,20],
            maxlength: 2,
         },                 
                                                            
    //FIN RULES
    },

    messages: {

        P2:{
            required: "Ingrese NOMBRES Y APELLIDOS",
         
         },   
        P3:{
            required: "Ingrese SEXO",
            number: "Solo números",
         },
        P4:{
            required: "Ingrese DNI",
            number: "Solo números",
            exactlength: "Ingrese DNI válido", 
         },
        P5:{
            required: "Ingrese OCUPACIÓN",
            number: "Solo números", 
         },
        P6:{
            required: "Ingerse TIPO DE VÍA",
            number: "Solo números",
         },
        P7:{
            required: "Ingrese NOMBRE DE VIA",
            number: "Solo números", 
         },         
        P11:{
        	required: "Ingrese PISO",
			range: "Ingrese numeros entre 0  y 20",
            number: "Solo números",
         },         
        P15:{
            number: "Solo números",
            required: "Ingrese N° EMBARCACIONES",
            range: "Ingrese numeros entre 0  y 20",
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


    // submitHandler: function(form) {

    // var bsub = $( ":submit" );
    // bsub.attr("disabled", "disabled");

    // }       
}); 

    // $("#P2").keydown(function(event) {
    //     // PERMITE: backspace, delete, tab, escape,  enter, space
    //     if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 32 ){
    //              return;
    //     }
    //     // PERMITE: A - Z, Ñ        
    //     else if ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 164 || event.keyCode == 165) {
    //              return;
    //     }
    //     else {
    //         event.preventDefault();
    //     }
    // });

    // $("#P3").keydown(function(event) {
    //     // PERMITE: backspace, delete, tab, escape,  enter
    //     if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ) {
    //         return;
    //     }
    //     // PERMITE: 1 - 2
    //     else if( event.keyCode == 97 || event.keyCode == 98 || event.keyCode == 49 || event.keyCode == 50) {
    //         return;
    //     }
    //     else {
    //         event.preventDefault(); 
    //     }
    // });





// ENTER como TAB -----------------------------------
	// $('#frm_reg_pesc').ready(function() {
	//    //$('#CAT').focus();
	       
	//    $('input:text').bind("keydown", function(e) {
	//       var n = $("input:text").length;
	//       if (e.which == 13)
	//       { //Enter key
	//         e.preventDefault(); //Skip default behavior of the enter key
	//         var nextIndex = $('input:text').index(this) + 1;
	//         if(nextIndex < n)
	//           $('input:text')[nextIndex].focus();
	//         else
	//         {
	//           $('input:text')[nextIndex-1].blur();
	//           $('#send').click();
	//         }
	//       }
	//     });
	//   });

	// $('#form_registro_dt').ready(function() {
	//   // $('input:text:first').focus();
	       
	//    $('input:text').bind("keydown", function(e) {
	//       var n = $("input:text").length;
	//       if (e.which == 13)
	//       { //Enter key
	//         e.preventDefault(); //Skip default behavior of the enter key
	//         var nextIndex = $('input:text').index(this) + 1;
	//         if(nextIndex < n)
	//           $('input:text')[nextIndex].focus();
	//         else
	//         {
	//           $('input:text')[nextIndex-1].blur();
	//           $('#send').click();
	//         }
	//       }
	//     });
	   
	//     $('#send').click(function() {
	//        alert('Form Submitted');
	//     });
	//   });

//$('#T_EMB_m').bind('click', function(){alert('probando');});
//$('#CAT').keypress(function(){alert('probando');});
//$('#CAT').hover(function(){alert('probando');});

// ENTER como TAB -----------------------------------




// F O R M    B U S C A R ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::>> 

// FORM BUSCAR FILAS ----------------------------------------------->
$("#frm_buscar_reg").validate({

    rules: {
        NOM_DD_2: {
            valueNotEquals: -1,
        },
        NOM_PP_2: {
            valueNotEquals: -1,
        },
        NOM_DI_2: {
            valueNotEquals: -1,
        },
        NOM_CCPP_2: {
            valueNotEquals: -1,
        },  
        CCPP_PROC_2: {
            valueNotEquals: -1,
        },                
    },
    messages: {
        NOM_DD_2: {
            valueNotEquals: 'Seleccione DEPARTAMENTO',
        },
        NOM_PP_2: {
            valueNotEquals: 'Seleccione PROVINCIA',
        },
        NOM_DI_2: {
            valueNotEquals: 'Seleccione DISTRITO',
        },
        NOM_CCPP_2: {
            valueNotEquals: 'Seleccione CENTRO POBLADO',
        },  
        CCPP_PROC_2: {
            valueNotEquals: 'Seleccione CENTRO POBLADO ',
        },          
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

});
// FORM BUSCAR FILAS <---------------------------------



//CARGA COMBOS SOLO PARA BUSCAR CCPP --------------------------------------------

$("#NOM_DD_2, #NOM_PP_2, #NOM_DI_2, #NOM_CCPP_2").change(function(event) {
        var sel = null;
        var sel2 = $('#CCPP_PROC_2');
        var dep = $('#NOM_DD_2');
        var prov = $('#NOM_PP_2');
        var dist = $('#NOM_DI_2');
        var url = null;
        var cod = null;
        var op =null;

        switch(event.target.id){
            case 'NOM_DD_2':
                sel     = $("#NOM_PP_2");
                //$('#CCDD').val($(this).val());                  
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;

                break;

            case 'NOM_PP_2':
                sel     = $("#NOM_DI_2");
                //$('#CCPP').val($(this).val()); 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI_2':
                sel     = $("#NOM_CCPP_2");
               // $("#CCDI").val($(this).val());  
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'NOM_CCPP_2':
                //$("#COD_CCPP").val($(this).val());  
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

        if((event.target.id != 'NOM_CCPP_2') && (event.target.id != 'CCPP_PROC_2'))
        {

        $.ajax({

            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
            

                sel.empty();
                if (op==3){
                	sel2.empty();
                    sel.append('<option value=" -"> - </option>');
                    sel2.append('<option value=" -"> - </option>');
                }                
                $.each(json_data, function(i, data){
                    if (op==1){
                        sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.CCDI + '">' + data.DISTRITO + '</option>');
                   }
	                    if (op==3){
	                    	//if (data.PUNTO_CONC == 1){
	                    		sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    		sel2.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    	
	                    	//}else if (data.PUNTO_CONC == 0){
	                    		//sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    		//sel2.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    	//}	
	                    }  
                });

               
                if (op==1){
                    $("#NOM_PP_2").trigger('change');
                    }  
                if (op==2){
                    $("#NOM_DI_2").trigger('change');
                }
                if (op==3){
                    $("#NOM_CCPP_2").trigger('change');
                }

            }
        });   
     }
  
}); 
//CARGA COMBOS SOLO PARA BUSCAR CCPP <----------------------------------

// F O R M    B U S C A R << ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


// FORM MODIFICAR FILAS ----------------------------------------------->
$("#frm_reg_mod").validate({
    rules: {
        T_F_D_m: {
            required: true,
            numeric: true,
        },
        T_PES_m: {
            required:true,
            numeric:true,
        },
        T_ACUI_m: {
            required: true,
            numeric: true,
        },
        T_PES_aCUI_m: {
            required: true,
            numeric: true,
        },        
        T_EMB_m: {
            required:true,
            numeric:true,
        },        
    },
    messages: {
        T_F_D_m: {
            required: "Ingrese FILAS",
            numeric: "sólo números",
        },
        T_PES_m: {
            required: "Ingrese FILAS",
            numeric: "sólo números",
        },
        T_ACUI_m: {
            required: "Ingrese FILAS",
            numeric: "sólo números",
        },
        T_PES_ACUI_m: {
            required: "Ingrese FILAS",
            numeric: "sólo números",
        },
        T_EMB_m: {
            required: "Ingrese FILAS",
            numeric: "sólo números",
        },            
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

});
// FORM MODIFICAR FILAS <---------------------------------

// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

$("#NOM_DD_f, #NOM_PP_f, #NOM_DI_f, #NOM_CCPP_f, #CCPP_PROC_f").change(function(event) {
        var sel = null;
        var sel2 = $("#CCPP_PROC_f");
        var dep = $('#NOM_DD_f');
        var prov = $('#NOM_PP_f');
        var dist = $('#NOM_DI_f');
        var url = null;
        var cod = null;
        var op = null;

        switch(event.target.id){
            case 'NOM_DD_f':
                sel     = $("#NOM_PP_f");
                $('#CCDD').val($(this).val()); 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;
               $('#NOM_DD').val($('#NOM_DD_f option:selected').text());   
                break;

            case 'NOM_PP_f':
                sel     = $("#NOM_DI_f");
                $('#CCPP').val($(this).val()); 
                $('#NOM_PP').val($('#NOM_PP_f option:selected').text());                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI_f':
                sel     = $("#NOM_CCPP_f");
                sel2    = $("#CCPP_PROC_f");
                $("#CCDI").val($(this).val());  
                $('#NOM_DI').val($('#NOM_DI_f option:selected').text());                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'NOM_CCPP_f':
                $("#COD_CCPP").val($(this).val());  
                $('#NOM_CCPP').val($('#NOM_CCPP_f option:selected').text());                 
                break;  

            case 'CCPP_PROC_f':
                $("#CCPP_CODPROC").val($(this).val());                  
                $('#CCPP_PROC').val($('#CCPP_PROC_f option:selected').text());    
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

        if((event.target.id != 'NOM_CCPP_f') && (event.target.id != 'CCPP_PROC_f'))
        {

	        $.ajax({
	            url: url,
	            type:'POST',
	            data:form_data,
	            dataType:'json',
	            success:function(json_data){
	            
	                sel.empty();
	               
	                if (op==3){
	                	sel2.empty();
	                    sel.append('<option value=" -"> - </option>');
	                    sel2.append('<option value=" -"> - </option>');
	                }                
	                $.each(json_data, function(i, data){
	                    if (op==1){
	                    	//$('#SEDE_COD').val(data.SEDE_COD); 
	                    	//alert(data.SEDE_COD+' '+ data.NOM_SEDE);
							//$('#NOM_SEDE').val(data.NOM_SEDE); 
	                        sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');
	                    }
	                    if (op==2){
	                        sel.append('<option value="' + data.CCDI + '">' + data.DISTRITO + '</option>');
	                   }
	                    if (op==3){
	                    	//if (data.PUNTO_CONC == 1){
	                    		sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    		sel2.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    	
	                    	//}else if (data.PUNTO_CONC == 0){
	                    		//sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    		//sel2.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
	                    	//}	
	                    }                    	
	                });
	               
	                if (op==1){
	                    $("#NOM_PP_f").trigger('change');
	                    }  
	                if (op==2){
	                    $("#NOM_DI_f").trigger('change');
	                }
	                if (op==3){
	                    $("#NOM_CCPP_f").trigger('change');
	                    $("#CCPP_PROC_f").trigger('change');
	                }

	            }
	        });   
    	}
  
}); 

// CARGA COMBOS UBIGEO <-----------------------------

// R E G I S T R O    D E P E S C A D O R E S <-----------------------------------------------------
<?php 
if (!$detalle) { ?>;

$("#NOM_DD_f").trigger('change');
$("#NOM_DD_2").trigger('change');

	<?php }else {  ?>
$('#div_registro_pes input').attr('readonly', 'readonly');
$('#div_registro_pes select').attr('readonly', 'readonly');


<?php 
} ?>;

});


</script>
