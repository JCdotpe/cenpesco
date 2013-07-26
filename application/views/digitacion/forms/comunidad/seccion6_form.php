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
	$S6_1 = array(
		'name'	=> 'S6_1',
		'id'	=> 'S6_1',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_1_to_2(event)",
		//'onblur' =>'pase_preguntas(6,1,3,false,2,2,false,false,this)',
	);
//pregunta 2
	$S6_2_1_A = array(
		'name'	=> 'S6_2_1_A',
		'id'	=> 'S6_2_1_A',
		'maxlength'	=> 80,
		'class' => $span_class,
		'onkeypress'=>"return solo_letras(event)",
	);	
	$S6_2_2_A = array(
		'name'	=> 'S6_2_2_A',
		'id'	=> 'S6_2_2_A',
		'maxlength'	=> 80,
		'class' => $span_class,
		'onkeypress'=>"return solo_letras(event)",
	);
	$S6_2_3_A = array(
		'name'	=> 'S6_2_3_A',
		'id'	=> 'S6_2_3_A',
		'maxlength'	=> 80,
		'class' => $span_class,
		'onkeypress'=>"return solo_letras(event)",
	);				
//pregunta 3
	$S6_3_1 = array(
		'name'	=> 'S6_3_1',
		'id'	=> 'S6_3_1',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_3_2 = array(
		'name'	=> 'S6_3_2',
		'id'	=> 'S6_3_2',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_3_3 = array(
		'name'	=> 'S6_3_3',
		'id'	=> 'S6_3_3',
		'maxlength'	=> 1,
		'class' => $span_class,
		//'onblur' =>'vacio(this)',
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_3_4 = array(
		'name'	=> 'S6_3_4',
		'id'	=> 'S6_3_4',
		'maxlength'	=> 1,
		'class' => $span_class,
		//'onblur' =>'vacio(this)',
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_3_5 = array(
		'name'	=> 'S6_3_5',
		'id'	=> 'S6_3_5',
		'maxlength'	=> 1,
		'class' => $span_class,
		//'onblur' =>'vacio(this)',
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_3_6 = array(
		'name'	=> 'S6_3_6',
		'id'	=> 'S6_3_6',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_3_6_O = array(
		'name'	=> 'S6_3_6_O',
		'id'	=> 'S6_3_6_O',
		'maxlength'	=> 100,
		'class' => $span_class,
		//'onblur'=> 'especifique(this,S6_3_6,1)',
		'onkeypress'=>"return solo_letras(event)",
	);	
	$S6_3_7 = array(
		'name'	=> 'S6_3_7',
		'id'	=> 'S6_3_7',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
		//'onblur' =>'ningunos(6,3, this)',		
	);
//pregunta 4
	$S6_4_1 = array(
		'name'	=> 'S6_4_1',
		'id'	=> 'S6_4_1',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_2 = array(
		'name'	=> 'S6_4_2',
		'id'	=> 'S6_4_2',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_3 = array(
		'name'	=> 'S6_4_3',
		'id'	=> 'S6_4_3',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_4 = array(
		'name'	=> 'S6_4_4',
		'id'	=> 'S6_4_4',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_5 = array(
		'name'	=> 'S6_4_5',
		'id'	=> 'S6_4_5',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_6 = array(
		'name'	=> 'S6_4_6',
		'id'	=> 'S6_4_6',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_7 = array(
		'name'	=> 'S6_4_7',
		'id'	=> 'S6_4_7',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_8 = array(
		'name'	=> 'S6_4_8',
		'id'	=> 'S6_4_8',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_9 = array(
		'name'	=> 'S6_4_9',
		'id'	=> 'S6_4_9',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_10 = array(
		'name'	=> 'S6_4_10',
		'id'	=> 'S6_4_10',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_11 = array(
		'name'	=> 'S6_4_11',
		'id'	=> 'S6_4_11',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_12 = array(
		'name'	=> 'S6_4_12',
		'id'	=> 'S6_4_12',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_13 = array(
		'name'	=> 'S6_4_13',
		'id'	=> 'S6_4_13',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_14 = array(
		'name'	=> 'S6_4_14',
		'id'	=> 'S6_4_14',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_15 = array(
		'name'	=> 'S6_4_15',
		'id'	=> 'S6_4_15',
		'maxlength'	=> 1,
		'class' => $span_class,
		'onkeypress'=>"return solo_0_to_1(event)",
	);
	$S6_4_15_O = array(
		'name'	=> 'S6_4_15_O',
		'id'	=> 'S6_4_15_O',
		'maxlength'	=> 100,
		'class' => $span_class,
		//'onblur'=> 'especifique(this,S6_4_15,1)',
		'onkeypress'=>"return solo_letras(event)",
	);
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//FIN SECCION 5
$attr = array('class' => 'form-vertical form-auth','id' => 'seccion6', 'name' => 'seccion6');

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
echo '<div class="well modulo" style="padding-bottom: 20px !important; padding-top: 0px !important;">';

	echo '<h4>SECCION VI. ORGANIZACION DE LA COMUNIDAD</h4>';

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
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 0px !important" id="SEC6_1">';
						echo form_label('1.	¿Su comunidad está afiliada a alguna federación u organización Local o Regional?', $S6_1['id'], $label_class);
						echo '<div class="margenes_row row-fluid ">';
							echo '<div class="span12" id="sec_3_1">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S6_1); 
											echo '<div class="help-block error">' . form_error($S6_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////FIN PREGUNTA 1

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 2
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: px !important" id="SEC6_2">';
						echo form_label('2.	¿A cuál o cuáles está afiliada?', $S6_2_1_A['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="offset1 span1">';
										echo form_label('1.	', $S6_2_1_A['id'], $label_class);
									echo '</div>';	
									echo '<div class="control-group-pp span6">';
										echo '<div class="controls-pp">';
												echo  form_input($S6_2_1_A); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_2_1_A['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="offset1 span1">';
										echo form_label('2.	', $S6_2_2_A['id'], $label_class);
									echo '</div>';	
									echo '<div class="control-group-pp span6">';
										echo '<div class="controls-pp">';
												echo  form_input($S6_2_2_A); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_2_2_A['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="offset1 span1">';
										echo form_label('3.	', $S6_2_3_A['id'], $label_class);
									echo '</div>';	
									echo '<div class="control-group-pp span6">';
										echo '<div class="controls-pp">';
												echo form_input($S6_2_3_A); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_2_3_A['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	

				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 2



				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 3
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 89px !important" id="SEC6_3">';
						echo form_label('3.	¿En su comunidad existe: (Ingrese uno o más códigos):', $S6_3_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Club de madres?', $S6_3_1['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Asociación de padres de familia ?', $S6_3_2['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	


							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Comité de autodefensa (Rondas)?', $S6_3_3['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	


							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Asociación de pescadores?', $S6_3_4['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Asociación de acuicultores?', $S6_3_5['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Otro?', $S6_3_6['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	


							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo form_label('Especifique', $S6_3_6_O['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span7">';
										echo '<div class="controls">';
												echo form_input($S6_3_6_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_6_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';							
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Ninguno', $S6_3_7['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_3_7); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_3_7['name']) . '</div>';
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
				///////////////////////////////////////////// PREGUNTA 4
				echo '<div class="preguntas preguntas_sub2" id="SEC6_4">';
						echo form_label('4.	En los últimos 12 meses, ¿La comunidad se ha beneficiado de algún programa social, como: (Ingrese uno o más códigos):', $S6_4_1['id'], $label_class);

						echo '<div class="row-fluid">';
	
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Vaso de leche?', $S6_4_1['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Canasta alimentaria?', $S6_4_2['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	


							echo '</div>';	
						echo '</div>';							
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Comedor popular?', $S6_4_3['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Desayuno o alimentación escolar (Qali Warma)?  ', $S6_4_4['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Textos y útiles escolares?', $S6_4_5['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Seguro Integral de Salud (SIS)?', $S6_4_6['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Programa Nacional de Movilización por la Alfabetización ( PRONAMA)', $S6_4_7['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_7); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_7['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Planificación familiar?', $S6_4_8['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_8); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_8['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label(' tuberculosis y familia (PANTBC)', $S6_4_9['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_9); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_9['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Programa de vacunas (inmunizaciones)?', $S6_4_10['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_10); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_10['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('	Programa Juntos?', $S6_4_11['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_11); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_11['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('	Programa Sembrando?', $S6_4_12['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_12); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_12['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Programa Bono de Gratitud (Pensión 65)?', $S6_4_13['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_13); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_13['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Programa Cuna Más?', $S6_4_14['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_14); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_14['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span7">';	
										echo form_label('Otro?', $S6_4_15['id'], $label_class);
									echo '</div>'; 
									echo '<div class="control-group-pp  span2">';
										echo '<div class="controls-pp">';
												echo form_input($S6_4_15); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_15['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
							echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo form_label('Especifique', $S6_4_15_O['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span7">';
										echo '<div class="controls">';
												echo form_input($S6_4_15_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S6_4_15_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 4

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

	// $("#seccion6").on("submit", function(event) {
	// 	$('#seccion6').trigger('validate');
 // 	});
		$("#seccion6").validate({
		    rules: {           

				S6_1: {
		            required: true,
		            digits: true,
		         },   
				S6_2_1_A: {
		            required: true,
		            validName: true,
		         },   
				S6_2_2_A: {
		            //required: true,
		            validName: true,
		         },   
				S6_2_3_A: {
		            //required: true,
		            validName: true,
		         },   
				S6_3_1: {
		            required: true,
		            digits: true,
		         },   
				S6_3_2: {
		            required: true,
		            digits: true,
		         },   
				S6_3_3: {
		            required: true,
		            digits: true,
		         },   
				S6_3_4: {
		            required: true,
		            digits: true,
		         },   
				S6_3_5: {
		            required: true,
		            digits: true,
		         },   
				S6_3_6: {
		            required: true,
		            digits: true,
		         },   
				S6_3_7: {
		            required: true,
		            digits: true,
		         },   
				S6_3_8: {
		            required: true,
		            digits: true,
		         },   		         		         		         
				S6_3_6_O: {
		            required: false,
		            validName: true,
		         },   
				S6_3_9: {
		            required: true,
		            digits: true,
		         },   		         
				S6_4_1: {
		            required: true,
		            digits: true,
		         },   
				S6_4_2: {
		            required: true,
		            digits: true,
		         },   
				S6_4_3: {
		            required: true,
		            digits: true,
		         },   
				S6_4_4: {
		            required: true,
		            digits: true,
		         },   
				S6_4_5: {
		            required: true,
		            digits: true,
		         },   
				S6_4_6: {
		            required: true,
		            digits: true,
		         },   
				S6_4_7: {
		            required: true,
		            digits: true,
		         },   
				S6_4_8: {
		            required: true,
		            digits: true,
		         },   
				S6_4_9: {
		            required: true,
		            digits: true,
		         },   
				S6_4_10: {
		            required: true,
		            digits: true,
		         },   
				S6_4_11: {
		            required: true,
		            digits: true,
		         },   
				S6_4_12: {
		            required: true,
		            digits: true,
		         },   
				S6_4_13: {
		            required: true,
		            digits: true,
		         },   
				S6_4_14: {
		            required: true,
		            digits: true,
		         },   
				S6_4_15: {
		            required: true,
		            digits: true,
		         },   
				S6_4_16: {
		            required: true,
		            digits: true,
		         },  
				S6_4_15_O: {
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
		    	var seccion4_data = $("#seccion6").serializeArray();
			    seccion4_data.push(
			        {name: 'ajax',value:1},
			        {name: 'comunidad_id',value:$("input[name='comunidad_id']").val()}      
			    );
				
		        var bsub4 = $( "#seccion6 :submit" );
		        bsub4.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/comunidad_seccion6",
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