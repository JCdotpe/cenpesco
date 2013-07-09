<?php 

$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//SECCION 5

//pregunta 1

	$S5_1 = array(
		'name'	=> 'S5_1',
		'id'	=> 'S5_1',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_1_to_2(event)",
		'onblur' =>'pase_preguntas(5,1,3,false,2,2,false,false)',
	);
//pregunta 2
	$S5_2_1 = array(
		'name'	=> 'S5_2_1',
		'id'	=> 'S5_2_1',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_2 = array(
		'name'	=> 'S5_2_2',
		'id'	=> 'S5_2_2',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_3 = array(
		'name'	=> 'S5_2_3',
		'id'	=> 'S5_2_3',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_4 = array(
		'name'	=> 'S5_2_4',
		'id'	=> 'S5_2_4',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_5 = array(
		'name'	=> 'S5_2_5',
		'id'	=> 'S5_2_5',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_6 = array(
		'name'	=> 'S5_2_6',
		'id'	=> 'S5_2_6',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_7 = array(
		'name'	=> 'S5_2_7',
		'id'	=> 'S5_2_7',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_2_7_O = array(
		'name'	=> 'S5_2_7_O',
		'id'	=> 'S5_2_7_O',
		'maxlength'	=> 100,
		'class' => $span_class,
		'onblur'=> 'especifique(this,S5_2_7,1)',
		'onkeypress'=>"return solo_letras(event)",
	);
//pregunta 3
	$S5_3_1 = array(
		'name'	=> 'S5_3_1',
		'id'	=> 'S5_3_1',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_2 = array(
		'name'	=> 'S5_3_2',
		'id'	=> 'S5_3_2',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_3 = array(
		'name'	=> 'S5_3_3',
		'id'	=> 'S5_3_3',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_4 = array(
		'name'	=> 'S5_3_4',
		'id'	=> 'S5_3_4',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_5 = array(
		'name'	=> 'S5_3_5',
		'id'	=> 'S5_3_5',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_6 = array(
		'name'	=> 'S5_3_6',
		'id'	=> 'S5_3_6',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_7 = array(
		'name'	=> 'S5_3_7',
		'id'	=> 'S5_3_7',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_8 = array(
		'name'	=> 'S5_3_8',
		'id'	=> 'S5_3_8',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_9 = array(
		'name'	=> 'S5_3_9',
		'id'	=> 'S5_3_9',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_10 = array(
		'name'	=> 'S5_3_10',
		'id'	=> 'S5_3_10',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_11 = array(
		'name'	=> 'S5_3_11',
		'id'	=> 'S5_3_11',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_12 = array(
		'name'	=> 'S5_3_12',
		'id'	=> 'S5_3_12',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_13 = array(
		'name'	=> 'S5_3_13',
		'id'	=> 'S5_3_13',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_14 = array(
		'name'	=> 'S5_3_14',
		'id'	=> 'S5_3_14',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_15 = array(
		'name'	=> 'S5_3_15',
		'id'	=> 'S5_3_15',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_16 = array(
		'name'	=> 'S5_3_16',
		'id'	=> 'S5_3_16',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_17 = array(
		'name'	=> 'S5_3_17',
		'id'	=> 'S5_3_17',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S5_3_17_O = array(
		'name'	=> 'S5_3_17_O',
		'id'	=> 'S5_3_17_O',
		'maxlength'	=> 100,
		'class' => $span_class,
		'onblur'=> 'especifique(this,S5_3_17,1)',
		'onkeypress'=>"return solo_letras(event)",
	);
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//FIN SECCION 5
$attr = array('class' => 'form-vertical form-auth','id' => 'seccion5');

echo '<div class="row-fluid">';
echo '<div class="span12">';
	echo form_open($this->uri->uri_string(),$attr); 


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//COLUMNAS SECCION V

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div class="well modulo" style="padding-bottom: 20px !important; padding-top: 20px !important;">';

	echo '<h4>SECCION V. SALUD</h4>';

	echo '<div class="row-fluid">';
		////////////////////////////////////////////////////////////////////////////////////////////////////////


		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// COLUMNA 1
		echo '<div class="span6">';

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////PREGUNTA 1
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 100px !important" id="SEC5_1">';
						echo form_label('1.	En la comunidad, ¿Existen locales de salud en funcionamiento?', $S5_1['id'], $label_class);
						echo '<div class="margenes_row row-fluid ">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S5_1); 
											echo '<div class="help-block error">' . form_error($S5_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////FIN PREGUNTA 1


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 2
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 194px !important" id="SEC5_2">';
						echo form_label('2.	¿Los locales de salud que existen son: (Ingrese uno o más códigos):', $S5_2_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span5">';	
										echo form_label('Centro de salud?', $S5_2_1['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Puesto de salud?', $S5_2_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Consultorio médico?', $S5_2_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Farmacia?', $S5_2_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Botica?', $S5_2_5['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Botiquín comunal?', $S5_2_6['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	


						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_2_7); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_7['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Otro?', $S5_2_7_O['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S5_2_7_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_7_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	

				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 2


		echo '</div>'; 	
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// FIN COLUMNA 1			
			

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// COLUMNA 2
		echo '<div class="span6">';

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 3
				echo '<div class="preguntas preguntas_sub2" id="SEC5_3">';
						echo form_label('3.	En la comunidad, ¿Se presentan casos de enfermedades y/o accidentes, como: (Ingrese uno o más códigos):', $S5_3_1['id'], $label_class);

						echo '<div class="row-fluid">';
	
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span5">';	
										echo form_label('Tuberculosis?', $S5_3_1['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Neumonía?', $S5_3_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';							
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span5">';	
										echo form_label('Cólera?', $S5_3_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Vómitos, diarrea?', $S5_3_4['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Desnutrición, anemia?', $S5_3_5['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Parasitosis?', $S5_3_6['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_7); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_7['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Uta?', $S5_3_7['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_8); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_8['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Chupos, granos?', $S5_3_8['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_9); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_9['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Malaria, paludismo?', $S5_3_9['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_10); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_10['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Fiebre amarilla?', $S5_3_10['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_11); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_11['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('	Hepatitis?', $S5_3_11['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_12); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_12['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('	Tifoidea?', $S5_3_12['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_13); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_13['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('	Sarampión?', $S5_3_13['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_14); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_14['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span5">';	
										echo form_label('	Enfermedades de Transmisión sexual?', $S5_3_14['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_15); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_15['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span5">';	
										echo form_label('	Mordeduras de Serpientes,  picaduras?', $S5_3_15['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_16); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_16['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('	Fracturas, golpes?', $S5_3_16['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S5_3_17); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_17['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Otro?', $S5_3_17['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S5_3_17_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S5_3_17_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	

				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 3

		echo '</div>'; 	
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// FIN COLUMNA 2

	echo '</div>'; 			
echo '</div>'; 	
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////////////


	echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
	echo form_close(); 
echo '</div>'; 			
echo '</div>'; 	

 ?>



<script type="text/javascript">

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){

	// $("#seccion5").on("submit", function(event) {
	// 	$('#seccion5').trigger('validate');
 // 	});
		$("#seccion5").validate({
		    rules: {           

				S5_1: {
		            required: true,
		            digits: true,
		         },   
				S4_1_1: {
		            required: false,
		            digits: true,
		         },   
				S5_2_1: {
		            required: true,
		            digits: true,
		         },   
				S5_2_2: {
		            required: true,
		            digits: true,
		         },   
				S5_2_3: {
		            required: true,
		            digits: true,
		         },   
				S5_2_4: {
		            required: true,
		            digits: true,
		         },   
				S5_2_5: {
		            required: true,
		            digits: true,
		         },   
				S5_2_6: {
		            required: true,
		            digits: true,
		         },   
				S5_2_7: {
		            required: true,
		            digits: true,
		         },   		         		         
				S5_2_7_O: {
		            required: false,
		            validName: true,
		         },   
				S5_3_1: {
		            required: true,
		            digits: true,
		         },   
				S5_3_2: {
		            required: true,
		            digits: true,
		         },   
				S5_3_3: {
		            required: true,
		            digits: true,
		         },   
				S5_3_4: {
		            required: true,
		            digits: true,
		         },   
				S5_3_5: {
		            required: true,
		            digits: true,
		         },   
				S5_3_6: {
		            required: true,
		            digits: true,
		         },   
				S5_3_7: {
		            required: true,
		            digits: true,
		         },   
				S5_3_8: {
		            required: true,
		            digits: true,
		         },   
				S5_3_9: {
		            required: true,
		            digits: true,
		         },   
				S5_3_10: {
		            required: true,
		            digits: true,
		         },   
				S5_3_11: {
		            required: true,
		            digits: true,
		         },   
				S5_3_12: {
		            required: true,
		            digits: true,
		         },   
				S5_3_13: {
		            required: true,
		            digits: true,
		         },   
				S5_3_14: {
		            required: true,
		            digits: true,
		         },   
				S5_3_15: {
		            required: true,
		            digits: true,
		         },   
				S5_3_16: {
		            required: true,
		            digits: true,
		         },   
				S5_3_17: {
		            required: true,
		            digits: true,
		         },  
				S5_3_17_O: {
		            required: false,
		            validName: true,
		         },  		         
			//FIN RULES
		    },

		    messages: {   
		                    
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

		    	//seccion 5 serial
		    	var seccion4_data = $("#seccion5").serializeArray();
			    seccion4_data.push(
			        {name: 'ajax',value:1},
			        {name: 'comunidad_id',value:$("input[name='comunidad_id']").val()}      
			    );
				
		        var bsub4 = $( "#seccion5 :submit" );
		        bsub4.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/comunidad_seccion5",
		            type:'POST',
		            data:seccion4_data,
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