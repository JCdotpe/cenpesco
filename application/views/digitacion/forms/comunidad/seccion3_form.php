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
	// 
	// 'onkeypress'=>"return solo_numeros(event)",
	// 'onkeypress'=>"return solo_uno_dos(event)",
	//PREGUNTA 1
		//Lengua
		//$rango_1_4 = 1,2,3,4,9;
		$S3_1 = array(
			'name'	=> 'S3_1',
			'id'	=> 'S3_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_4(event)",
		);	
		//otro
		$S3_1_O = array(
			'name'	=> 'S3_1_O',
			'id'	=> 'S3_1_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",
			'onblur'=> 'especifique(this,S3_1,4)',
		);
	//PREGUNTA 2
		//alumbrado electrico
		$S3_2 = array(
			'name'	=> 'S3_2',
			'id'	=> 'S3_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_2(event)",
			'onblur'=> 'pase_preguntas(3,2,5,false,2,2,false,false)',
		);
	//PREGUNTA 3
	 	$S3_3 = array(
			'name'	=> 'S3_3',
			'id'	=> 'S3_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_5(event)",
			'onblur'=> 'pase_preguntas(3,3,5,false,4,5,false,false)',
		);
	// PREGUNTA 4 / razones
		//interrupciones
		$S3_4_1 = array(
			'name'	=> 'S3_4_1',
			'id'	=> 'S3_4_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",

		);
		//restringido
		$S3_4_2 = array(
			'name'	=> 'S3_4_2',
			'id'	=> 'S3_4_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
		);
		//costo elevado
		$S3_4_3 = array(
			'name'	=> 'S3_4_3',
			'id'	=> 'S3_4_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);	
		//otro
		$S3_4_4 = array(
			'name'	=> 'S3_4_4',
			'id'	=> 'S3_4_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
		);	
		//especifique
		$S3_4_4_O = array(
			'name'	=> 'S3_4_4_O',
			'id'	=> 'S3_4_4_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",
			'onblur'=> 'especifique(this,S3_4_4,1)',		
		);	
	// PREGUNTA 5 / existe
		//biodigestor
		$S3_5_1 = array(
			'name'	=> 'S3_5_1',
			'id'	=> 'S3_5_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);
		//panel solar
		$S3_5_2 = array(
			'name'	=> 'S3_5_2',
			'id'	=> 'S3_5_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
		);
		//NINGUNO
		$S3_5_3 = array(
			'name'	=> 'S3_5_3',
			'id'	=> 'S3_5_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);						
	// PREGUNTA 6 / abastecimiento
		//red publica
		$S3_6_1 = array(
			'name'	=> 'S3_6_1',
			'id'	=> 'S3_6_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
		);
		//camion cisterna
		$S3_6_2 = array(
			'name'	=> 'S3_6_2',
			'id'	=> 'S3_6_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
		);
		//pozo
		$S3_6_3 = array(
			'name'	=> 'S3_6_3',
			'id'	=> 'S3_6_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
		);	
		//rio
		$S3_6_4 = array(
			'name'	=> 'S3_6_4',
			'id'	=> 'S3_6_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",
		);		
		//otro
		$S3_6_5 = array(
			'name'	=> 'S3_6_5',
			'id'	=> 'S3_6_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",	
			'onblur'=> 'pase_preguntas(3,5,8,true,2,5,true,false)',			
		);	
		//especifique
		$S3_6_5_O = array(
			'name'	=> 'S3_6_5_O',
			'id'	=> 'S3_6_5_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",
			'onblur'=> 'especifique(this,S3_6_5,1)',
		);	
	// PREGUNTA 7
		//califica servicio
		$S3_7 = array(
			'name'	=> 'S3_7',
			'id'	=> 'S3_7',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onblur'=> 'pase_preguntas(3,6,8,false,4,5,false,false)',			
			'onkeypress'=>"return solo_1_to_5(event)",			
		);
	// PREGUNTA 8
		//interrupciones
		$S3_8_1 = array(
			'name'	=> 'S3_8_1',
			'id'	=> 'S3_8_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",	
		);
		//restringido
		$S3_8_2 = array(
			'name'	=> 'S3_8_2',
			'id'	=> 'S3_8_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//costo elevado
		$S3_8_3 = array(
			'name'	=> 'S3_8_3',
			'id'	=> 'S3_8_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//otro
		$S3_8_4 = array(
			'name'	=> 'S3_8_4',
			'id'	=> 'S3_8_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//especifique
		$S3_8_4_O = array(
			'name'	=> 'S3_8_4_O',
			'id'	=> 'S3_8_4_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_8_4,1)',					
		);	
	// PREGUNTA 9 / servicios higienicos
		//red
		$S3_9_1 = array(
			'name'	=> 'S3_9_1',
			'id'	=> 'S3_9_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//letrina
		$S3_9_2 = array(
			'name'	=> 'S3_9_2',
			'id'	=> 'S3_9_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//pozo
		$S3_9_3 = array(
			'name'	=> 'S3_9_3',
			'id'	=> 'S3_9_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//pozo ciego
		$S3_9_4 = array(
			'name'	=> 'S3_9_4',
			'id'	=> 'S3_9_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//rio
		$S3_9_5 = array(
			'name'	=> 'S3_9_5',
			'id'	=> 'S3_9_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//no tienen
		$S3_9_6 = array(
			'name'	=> 'S3_9_6',
			'id'	=> 'S3_9_6',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",		
			'onblur'=> 'pase_preguntas(3,8,10,true,2,6,false,false)',						
		);	
	// PREGUNTA 10 / destino final
		//rio
		$S3_10_1 = array(
			'name'	=> 'S3_10_1',
			'id'	=> 'S3_10_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//bosque
		$S3_10_2 = array(
			'name'	=> 'S3_10_2',
			'id'	=> 'S3_10_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//laguna
		$S3_10_3 = array(
			'name'	=> 'S3_10_3',
			'id'	=> 'S3_10_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//canal
		$S3_10_4 = array(
			'name'	=> 'S3_10_4',
			'id'	=> 'S3_10_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//otro
		$S3_10_5 = array(
			'name'	=> 'S3_10_5',
			'id'	=> 'S3_10_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//especifique
		$S3_10_5_O = array(
			'name'	=> 'S3_10_5_O',
			'id'	=> 'S3_10_5_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_10_5,1)',					
		);	
	// PREGUNTA 11 / servicio de
		//fija
		$S3_11_1 = array(
			'name'	=> 'S3_11_1',
			'id'	=> 'S3_11_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//publica
		$S3_11_2 = array(
			'name'	=> 'S3_11_2',
			'id'	=> 'S3_11_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//celular
		$S3_11_3 = array(
			'name'	=> 'S3_11_3',
			'id'	=> 'S3_11_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//internet
		$S3_11_4 = array(
			'name'	=> 'S3_11_4',
			'id'	=> 'S3_11_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//tv
		$S3_11_5 = array(
			'name'	=> 'S3_11_5',
			'id'	=> 'S3_11_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//ninguno
		$S3_11_6 = array(
			'name'	=> 'S3_11_6',
			'id'	=> 'S3_11_6',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
	// PREGUNTA 12 / destino final de la basura
		//camion
		$S3_12_1 = array(
			'name'	=> 'S3_12_1',
			'id'	=> 'S3_12_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//rio
		$S3_12_2 = array(
			'name'	=> 'S3_12_2',
			'id'	=> 'S3_12_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//queman
		$S3_12_3 = array(
			'name'	=> 'S3_12_3',
			'id'	=> 'S3_12_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//entierran
		$S3_12_4 = array(
			'name'	=> 'S3_12_4',
			'id'	=> 'S3_12_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//abono
		$S3_12_5 = array(
			'name'	=> 'S3_12_5',
			'id'	=> 'S3_12_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		// //alimentar
		// $S3_12_6 = array(
		// 	'name'	=> 'S3_12_6',
		// 	'id'	=> 'S3_12_6',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_0_to_1(event)",			
		// );	
		// //bosque
		// $S3_12_7 = array(
		// 	'name'	=> 'S3_12_7',
		// 	'id'	=> 'S3_12_7',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_0_to_1(event)",			
		// );	
		// //contenedor
		// $S3_12_8 = array(
		// 	'name'	=> 'S3_12_8',
		// 	'id'	=> 'S3_12_8',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_0_to_1(event)",			
		// );		
		// //botadero
		// $S3_12_9 = array(
		// 	'name'	=> 'S3_12_9',
		// 	'id'	=> 'S3_12_9',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_0_to_1(event)",			
		// );	
		//otro
		$S3_12_6 = array(
			'name'	=> 'S3_12_6',
			'id'	=> 'S3_12_6',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//especifique
		$S3_12_6_O = array(
			'name'	=> 'S3_12_6_O',
			'id'	=> 'S3_12_6_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_12_6,1)',					
		);				
	// PREGUNTA 13 / Minas
		$S3_13 = array(
			'name'	=> 'S3_13',
			'id'	=> 'S3_13',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_2(event)",	
		);	
	// PREGUNTA 14 / hidrocarburos
		$S3_14 = array(
			'name'	=> 'S3_14',
			'id'	=> 'S3_14',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_2(event)",			
		);	
	// PREGUNTA 15 / existe contaminacion
		$S3_15 = array(
			'name'	=> 'S3_15',
			'id'	=> 'S3_15',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_2(event)",	
			'onblur'=> 'pase_preguntas(3,14,18,false,2,3,false,false)',							
		);			
	// PREGUNTA 16 / tipo contaminacion
		//rio
		$S3_16_1 = array(
			'name'	=> 'S3_16_1',
			'id'	=> 'S3_16_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//suelo
		$S3_16_2 = array(
			'name'	=> 'S3_16_2',
			'id'	=> 'S3_16_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//aire
		$S3_16_3 = array(
			'name'	=> 'S3_16_3',
			'id'	=> 'S3_16_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//acustica
		$S3_16_4 = array(
			'name'	=> 'S3_16_4',
			'id'	=> 'S3_16_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		

		//otro
		$S3_16_5 = array(
			'name'	=> 'S3_16_5',
			'id'	=> 'S3_16_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//especifique
		$S3_16_5_O = array(
			'name'	=> 'S3_16_5_O',
			'id'	=> 'S3_16_5_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_16_5,1)',					
		);		
		//no sabe
		// $S3_16_6 = array(
		// 	'name'	=> 'S3_16_6',
		// 	'id'	=> 'S3_16_6',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_0_to_1(event)",			
		// );		
		//ninguno
		// $S3_16_7 = array(
		// 	'name'	=> 'S3_16_7',
		// 	'id'	=> 'S3_16_7',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// );					
	// PREGUNTA 17 / origen contaminacion
		//basura
		$S3_17_1 = array(
			'name'	=> 'S3_17_1',
			'id'	=> 'S3_17_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//desagues
		$S3_17_2 = array(
			'name'	=> 'S3_17_2',
			'id'	=> 'S3_17_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//petroleras
		$S3_17_3 = array(
			'name'	=> 'S3_17_3',
			'id'	=> 'S3_17_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//mineras
		$S3_17_4 = array(
			'name'	=> 'S3_17_4',
			'id'	=> 'S3_17_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//pesqueras
		$S3_17_5 = array(
			'name'	=> 'S3_17_5',
			'id'	=> 'S3_17_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//agricolas
		$S3_17_6 = array(
			'name'	=> 'S3_17_6',
			'id'	=> 'S3_17_6',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//lavado ropa
		$S3_17_7 = array(
			'name'	=> 'S3_17_7',
			'id'	=> 'S3_17_7',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		

		//otro 1
		$S3_17_8 = array(
			'name'	=> 'S3_17_8',
			'id'	=> 'S3_17_8',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//especifique
		$S3_17_8_O = array(
			'name'	=> 'S3_17_8_O',
			'id'	=> 'S3_17_8_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",		
			'onblur'=> 'especifique(this,S3_17_8,1)',				
		);
		//otro 2
		$S3_17_9 = array(
			'name'	=> 'S3_17_9',
			'id'	=> 'S3_17_9',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//especifique
		$S3_17_9_O = array(
			'name'	=> 'S3_17_9_O',
			'id'	=> 'S3_17_9_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_17_9,1)',					
		);		
		//no sabe
		// $S3_17_10 = array(
		// 	'name'	=> 'S3_17_10',
		// 	'id'	=> 'S3_17_10',
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_0_to_1(event)",			
		// );				
	// PREGUNTA 18 / consecuencia contaminacion
		//deforestacion
		$S3_18_1 = array(
			'name'	=> 'S3_18_1',
			'id'	=> 'S3_18_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//enfermedades
		$S3_18_2 = array(
			'name'	=> 'S3_18_2',
			'id'	=> 'S3_18_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//mortandad
		$S3_18_3 = array(
			'name'	=> 'S3_18_3',
			'id'	=> 'S3_18_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//alejamiento
		$S3_18_4 = array(
			'name'	=> 'S3_18_4',
			'id'	=> 'S3_18_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//otro
		$S3_18_5 = array(
			'name'	=> 'S3_18_5',
			'id'	=> 'S3_18_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//especifique
		$S3_18_5_O = array(
			'name'	=> 'S3_18_5_O',
			'id'	=> 'S3_18_5_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_18_5,1)',					
		);
		//otro
		$S3_18_6 = array(
			'name'	=> 'S3_18_6',
			'id'	=> 'S3_18_6',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//especifique
		$S3_18_6_O = array(
			'name'	=> 'S3_18_6_O',
			'id'	=> 'S3_18_6_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_18_6,1)',					
		);					
	// PREGUNTA 19 /  existe violencia
		//domestica
		$S3_19_1 = array(
			'name'	=> 'S3_19_1',
			'id'	=> 'S3_19_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//sexual
		$S3_19_2 = array(
			'name'	=> 'S3_19_2',
			'id'	=> 'S3_19_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//asaltos
		$S3_19_3 = array(
			'name'	=> 'S3_19_3',
			'id'	=> 'S3_19_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//otra
		$S3_19_4 = array(
			'name'	=> 'S3_19_4',
			'id'	=> 'S3_19_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);		
		//especifique
		$S3_19_4_O = array(
			'name'	=> 'S3_19_4_O',
			'id'	=> 'S3_19_4_O',
			'maxlength'	=> 100,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",	
			'onblur'=> 'especifique(this,S3_19_4,1)',					
		);		
		//ninguno
		$S3_19_5 = array(
			'name'	=> 'S3_19_5',
			'id'	=> 'S3_19_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);						
	// PREGUNTA 20
		//pie
		$S3_20_1 = array(
			'name'	=> 'S3_20_1',
			'id'	=> 'S3_20_1',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//acemila
		$S3_20_2 = array(
			'name'	=> 'S3_20_2',
			'id'	=> 'S3_20_2',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);
		//moto
		$S3_20_3 = array(
			'name'	=> 'S3_20_3',
			'id'	=> 'S3_20_3',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//auto
		$S3_20_4 = array(
			'name'	=> 'S3_20_4',
			'id'	=> 'S3_20_4',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);			
		//camioneta
		$S3_20_5 = array(
			'name'	=> 'S3_20_5',
			'id'	=> 'S3_20_5',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//bote
		$S3_20_6 = array(
			'name'	=> 'S3_20_6',
			'id'	=> 'S3_20_6',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//canoa
		$S3_20_7 = array(
			'name'	=> 'S3_20_7',
			'id'	=> 'S3_20_7',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//ferrea
		$S3_20_8 = array(
			'name'	=> 'S3_20_8',
			'id'	=> 'S3_20_8',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);	
		//aerea
		$S3_20_9 = array(
			'name'	=> 'S3_20_9',
			'id'	=> 'S3_20_9',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_0_to_1(event)",			
		);											
	// PREGUNTA 21
		//horas
		$S3_21_1_1_H = array(
			'name'	=> 'S3_21_1_1_H',
			'id'	=> 'S3_21_1_1_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_1_M = array(
			'name'	=> 'S3_21_2_1_M',
			'id'	=> 'S3_21_2_1_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//horas
		$S3_21_1_2_H = array(
			'name'	=> 'S3_21_1_2_H',
			'id'	=> 'S3_21_1_2_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_2_M = array(
			'name'	=> 'S3_21_2_2_M',
			'id'	=> 'S3_21_2_2_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//horas
		$S3_21_1_3_H = array(
			'name'	=> 'S3_21_1_3_H',
			'id'	=> 'S3_21_1_3_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_3_M = array(
			'name'	=> 'S3_21_2_3_M',
			'id'	=> 'S3_21_2_3_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//horas
		$S3_21_1_4_H = array(
			'name'	=> 'S3_21_1_4_H',
			'id'	=> 'S3_21_1_4_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_4_M = array(
			'name'	=> 'S3_21_2_4_M',
			'id'	=> 'S3_21_2_4_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//horas
		$S3_21_1_5_H = array(
			'name'	=> 'S3_21_1_5_H',
			'id'	=> 'S3_21_1_5_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_5_M = array(
			'name'	=> 'S3_21_2_5_M',
			'id'	=> 'S3_21_2_5_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//horas
		$S3_21_1_6_H = array(
			'name'	=> 'S3_21_1_6_H',
			'id'	=> 'S3_21_1_6_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_6_M = array(
			'name'	=> 'S3_21_2_6_M',
			'id'	=> 'S3_21_2_6_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);				
		//horas
		$S3_21_1_7_H = array(
			'name'	=> 'S3_21_1_7_H',
			'id'	=> 'S3_21_1_7_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_7_M = array(
			'name'	=> 'S3_21_2_7_M',
			'id'	=> 'S3_21_2_7_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);		
		//horas
		$S3_21_1_8_H = array(
			'name'	=> 'S3_21_1_8_H',
			'id'	=> 'S3_21_1_8_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_8_M = array(
			'name'	=> 'S3_21_2_8_M',
			'id'	=> 'S3_21_2_8_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);	
		//horas
		$S3_21_1_9_H = array(
			'name'	=> 'S3_21_1_9_H',
			'id'	=> 'S3_21_1_9_H',
			'maxlength'	=> 2,
			'class' => $span_class,
		);
		//minutos
		$S3_21_2_9_M = array(
			'name'	=> 'S3_21_2_9_M',
			'id'	=> 'S3_21_2_9_M',
			'maxlength'	=> 2,
			'class' => $span_class,
		);														
	// PREGUNTA 22
		//via
		$S3_22_1_V = array(
			'name'	=> 'S3_22_1_V',
			'id'	=> 'S3_22_1_V',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_3(event)",			
		);
		//via
		$S3_22_2_V = array(
			'name'	=> 'S3_22_2_V',
			'id'	=> 'S3_22_2_V',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_3(event)",		
		);
		//via
		$S3_22_3_V = array(
			'name'	=> 'S3_22_3_V',
			'id'	=> 'S3_22_3_V',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_3(event)",		
		);	
		//via
		$S3_22_4_V = array(
			'name'	=> 'S3_22_4_V',
			'id'	=> 'S3_22_4_V',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_3(event)",		
		);		
		//via
		$S3_22_5_V = array(
			'name'	=> 'S3_22_5_V',
			'id'	=> 'S3_22_5_V',
			'maxlength'	=> 1,
			'class' => $span_class,
			'onkeypress'=>"return solo_1_to_3(event)",		
		);						

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////



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
//COLUMNAS SECCION III
$attr = array('class' => 'form-vertical form-auth','id' => 'seccion3');

echo '<div class="row-fluid">';
echo '<div class="span12">';
	echo form_open($this->uri->uri_string(),$attr); 

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div class="well modulo" style="padding-bottom: 20px !important; padding-top: 20px !important;">';

	echo '<h4>SECCION III. CARACTERÍSTICAS Y SERVICIOS DE LA COMUNIDAD</h4>';

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
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 40px !important" id="SEC3_1">';
						echo form_label('1. ¿Cuál es la lengua predominante de la comunidad:', $S3_1['id'], $label_class);
						echo '<div class="margenes_row row-fluid ">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_1); 
											echo '<div class="help-block error">' . form_error($S3_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group offset1 span2">';	
										echo form_label('Especifique(otro)', $S3_1_O['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group span5">';
										echo '<div class="controls">';
												echo form_input($S3_1_O); 
											//echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_1_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	
							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////FIN PREGUNTA 1


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////PREGUNTA 2
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 40px !important" id="SEC3_2">';
						echo form_label('2. En la comunidad, ¿Existe alumbrado eléctrico por red pública?', $S3_2['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_2); 
											//echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	
							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////FIN PREGUNTA 2


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 3
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 40px !important" id="SEC3_3">';
						echo form_label('3. ¿Usted califica el servicio de energía eléctrica de la comunidad como:', $S3_3['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_3); 
											//echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 3


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 4
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 66px !important" id="SEC3_4">';
						echo form_label('4. ¿Por qué razones considera ................. el servicio de energía eléctrica de la comunidad? (Ingrese uno o más códigos):', $S3_4_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S3_4_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_4_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span7">';	
										echo form_label('Interrupciones / cortes en el fluido eléctrico', $S3_4_1['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S3_4_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_4_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span7">';	
										echo form_label('Servicio de electricidad restringido o limitado', $S3_4_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S3_4_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_4_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp span7">';	
										echo form_label('Costo elevado del servicio / tarifa elevada', $S3_4_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls-pp">';
												echo form_input($S3_4_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_4_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="control-group-pp  span4">';	
										echo form_label('Otra (Especifique)', $S3_4_4['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls-pp">';
												echo form_input($S3_4_4_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_4_4_O['name']) . '</div>';
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
				///////////////////////////////////////////// PREGUNTA 5
				echo '<div class="preguntas preguntas_sub2" id="SEC3_5">';
						echo form_label('5. En la comunidad existe: (Ingrese uno o más códigos)', $S3_5_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_5_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_5_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Biodigestor?', $S3_5_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_5_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_5_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Panel solar ? ', $S3_5_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_5_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_5_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('NINGUNA', $S3_5_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
														
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 5


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 6
				echo '<div class="preguntas preguntas_sub2" id="SEC3_6">';
						echo form_label('6. En la comunidad, ¿El abastecimiento de agua procede de: (Ingrese uno o más códigos)', $S3_6_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_6_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_6_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Red pública ?', $S3_6_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_6_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_6_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Camión cisterna u otra similar', $S3_6_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_6_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_6_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Pozo', $S3_6_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_6_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_6_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Río, acequia, manantial o similar', $S3_6_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_6_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_6_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_6_5['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_6_5_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_6_5_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';										
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 5


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 7
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 0px !important" id="SEC3_7">';
						echo form_label('7. ¿Usted califica el servicio de agua de la comunidad como:', $S3_7['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_7); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_7['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 7


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 8
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 0px !important" id="SEC3_8">';
						echo form_label('8. ¿Por qué razones considera ................. el servicio de agua de la comunidad? (Ingrese uno o más códigos):', $S3_8_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_8_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_8_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Interrupciones / cortes', $S3_8_1['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_8_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_8_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Servicio de agua restringido o limitado', $S3_8_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_8_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_8_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Costo elevado del servicio / tarifa elevada', $S3_8_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_8_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_8_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_8_4['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_8_4_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_8_4_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';										
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 8



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
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div class="well modulo" style="padding-bottom: 20px !important; padding-top: 20px !important;">';

	echo '<div class="row-fluid">';

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// COLUMNA 1
		echo '<div class="span6">';

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 9
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 0px !important" id="SEC3_9">';
						echo form_label('9. En la comunidad, ¿Los servicios higiénicos de las viviendas estan conectados a: (Ingrese uno o más códigos)', $S3_6_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_9_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_9_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Red pública de desagüe ?', $S3_9_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_9_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_9_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Letrina ?', $S3_9_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_9_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_9_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Pozo séptico ?', $S3_9_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_9_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_9_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Pozo ciego o negro ?', $S3_9_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
											echo form_input($S3_9_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_9_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Río, acequia o canal ?', $S3_9_5['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
											echo form_input($S3_9_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_9_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('NO TIENEN', $S3_9_6['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 9


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 10
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 0px !important" id="SEC3_10">';
						echo form_label('10. ¿Cuál es el destino final de los desagües de la comunidad? (Ingrese uno o más códigos)', $S3_10_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_10_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_10_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Río', $S3_10_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_10_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_10_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Bosque, monte', $S3_10_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_10_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_10_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Laguna de oxidación', $S3_10_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_10_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_10_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Canal, acequia', $S3_10_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_10_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_10_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_10_5['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_10_5_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_10_5_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';										
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 10

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 11
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 0px !important" id="SEC3_10">';
						echo form_label('11. En la comunidad, ¿Existe servicio de: (Ingrese uno o más códigos)', $S3_11_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_11_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_11_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Telefonía fija ?', $S3_11_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
											echo form_input($S3_11_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_11_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Telefonía pública ?', $S3_11_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
											echo form_input($S3_11_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_11_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Telefonía celular ?', $S3_11_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_11_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_11_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Internet ?', $S3_11_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';						
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_11_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_11_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('TV por cable', $S3_11_5['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_11_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_11_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Ninguno', $S3_11_6['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 11


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 12
				echo '<div class="preguntas preguntas_sub2" id="SEC3_12">';
						echo form_label('12. ¿Cuál es el destino final de la basura generada por la comunidad? (Ingrese uno o más códigos)', $S3_12_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_12_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Relleno sanitario', $S3_12_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_12_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Botadero a cielo abierto', $S3_12_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_12_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Vertidos en el río, lago o laguna', $S3_12_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_12_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Reciclaje', $S3_12_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_12_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Quemada / incinerada', $S3_12_5['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						// echo '<div class="row-fluid">';
						// 	echo '<div class="span12">';
						// 			echo '<div class="control-group-pp offset1 span2">';
						// 				echo '<div class="controls">';
						// 						echo form_input($S3_12_6); 
						// 					echo '<span class="help-inline-pp"></span>';
						// 					echo '<div class="help-block error">' . form_error($S3_12_6['name']) . '</div>';
						// 				echo '</div>';	
						// 			echo '</div>'; 	

						// 			echo '<div class="span5">';	
						// 				echo form_label('La usan para alimentan a los animales', $S3_12_6['id'], $label_class);
						// 			echo '</div>'; 

						// 	echo '</div>';	
						// echo '</div>';	
						// echo '<div class="row-fluid">';
						// 	echo '<div class="span12">';
						// 			echo '<div class="control-group-pp offset1 span2">';
						// 				echo '<div class="controls">';
						// 						echo form_input($S3_12_7); 
						// 					echo '<span class="help-inline-pp"></span>';
						// 					echo '<div class="help-block error">' . form_error($S3_12_7['name']) . '</div>';
						// 				echo '</div>';	
						// 			echo '</div>'; 	

						// 			echo '<div class="span5">';	
						// 				echo form_label('Botan al bosque, monte', $S3_12_7['id'], $label_class);
						// 			echo '</div>'; 

						// 	echo '</div>';	
						// echo '</div>';	
						// echo '<div class="row-fluid">';
						// 	echo '<div class="span12">';
						// 			echo '<div class="control-group-pp offset1 span2">';
						// 				echo '<div class="controls">';
						// 						echo form_input($S3_12_8); 
						// 					echo '<span class="help-inline-pp"></span>';
						// 					echo '<div class="help-block error">' . form_error($S3_12_8['name']) . '</div>';
						// 				echo '</div>';	
						// 			echo '</div>'; 	

						// 			echo '<div class="span5">';	
						// 				echo form_label('En un contenedor comunal', $S3_12_8['id'], $label_class);
						// 			echo '</div>'; 

						// 	echo '</div>';	
						// echo '</div>';																									

						// echo '<div class="row-fluid">';
						// 	echo '<div class="span12">';
						// 			echo '<div class="control-group-pp offset1 span2">';
						// 				echo '<div class="controls">';
						// 						echo form_input($S3_12_9); 
						// 					echo '<span class="help-inline-pp"></span>';
						// 					echo '<div class="help-block error">' . form_error($S3_12_9['name']) . '</div>';
						// 				echo '</div>';	
						// 			echo '</div>'; 	

						// 			echo '<div class="span4">';	
						// 				echo form_label('En el botadero comunal', $S3_12_9['id'], $label_class);
						// 			echo '</div>'; 

						// 	echo '</div>';	
						// echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_12_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_12_6['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_12_6_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_12_6_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						
						echo '</div>';	

				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 12


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 13
				echo '<div class="preguntas preguntas_sub2" id="SEC3_13">';
						echo form_label('13. ¿Existen minas en explotación cerca de la comunidad?', $S3_13['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_13); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_13['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 13


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 14
				echo '<div class="preguntas preguntas_sub2" id="SEC3_14">';
						echo form_label('14. ¿Existen empresas que explotan hidrocarburos cerca de la comunidad?', $S3_14['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_14); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_14['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 14


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
		///////////////////////////////////////////// COLUMNA 2
		echo '<div class="span6">';

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 15
				echo '<div class="preguntas preguntas_sub2" id="SEC3_15">';
						echo form_label('15. En la comunidad ¿Existe algún tipo de contaminación ambiental?', $S3_15['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_15); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_15['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	
							echo '</div>';	
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 14


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 16
				echo '<div class="preguntas preguntas_sub2" id="SEC3_16">';
						echo form_label('16. ¿Qué tipo de contaminación ambiental existe? (Ingrese uno o más códigos)', $S3_16_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_16_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_16_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Contaminación del rio, lago, etc', $S3_16_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_16_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_16_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Contaminación del suelo', $S3_16_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_16_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_16_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Contaminación del aire', $S3_16_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_16_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_16_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Contaminación acústica', $S3_16_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_16_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_16_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_16_5['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_16_5_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_16_5_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';								
						// echo '<div class="row-fluid">';
						// 	echo '<div class="span12">';
						// 			echo '<div class="control-group-pp offset1 span2">';
						// 				echo '<div class="controls">';
						// 						echo form_input($S3_16_6); 
						// 					echo '<span class="help-inline-pp"></span>';
						// 					echo '<div class="help-block error">' . form_error($S3_16_6['name']) . '</div>';
						// 				echo '</div>';	
						// 			echo '</div>'; 	

						// 			echo '<div class="span5">';	
						// 				echo form_label('No sabe', $S3_16_6['id'], $label_class);
						// 			echo '</div>'; 

						// 	echo '</div>';	
						// echo '</div>';		

				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 16


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 17
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: px !important" id="SEC3_17">';
						echo form_label('17. ¿Cuál es el origen de esta contaminación? (Ingrese uno o más códigos)', $S3_17_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Basura', $S3_17_1['id'], $label_class);
									echo '</div>'; 


							echo '</div>';	
						echo '</div>';	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Desagües', $S3_17_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Actividades de empresas petroleras', $S3_17_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Actividades de empresas mineras', $S3_17_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Actividades de empresas pesqueras', $S3_17_5['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Uso de productos agrícolas', $S3_17_6['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_7); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_7['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Lavado de ropa (detergentes)', $S3_17_7['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_8); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_8['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_17_8['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_17_8_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_8_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';							
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_17_9); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_9['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_17_9['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_17_9_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_17_9_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						
						echo '</div>';	
						// echo '<div class="row-fluid">';
						// 	echo '<div class="span12">';
						// 			echo '<div class="control-group-pp offset1 span2">';
						// 				echo '<div class="controls">';
						// 						echo form_input($S3_17_10); 
						// 					echo '<span class="help-inline-pp"></span>';
						// 					echo '<div class="help-block error">' . form_error($S3_17_10['name']) . '</div>';
						// 				echo '</div>';	
						// 			echo '</div>'; 	

						// 			echo '<div class="span4">';	
						// 				echo form_label('No sabe', $S3_17_10['id'], $label_class);
						// 			echo '</div>'; 

						// 	echo '</div>';	
						// echo '</div>';							
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 17


				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 18
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 20px !important" id="SEC3_18">';
						echo form_label('18.  Sabe Usted, ¿Cuáles son las consecuencias de esta contaminación? (Ingrese uno o más códigos)', $S3_18_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_18_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Deforestación', $S3_18_1['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_18_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Enfermedades', $S3_18_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_18_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Mortandad de peces', $S3_18_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_18_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Alejamiento de animales', $S3_18_4['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_18_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_18_5['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_18_5_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_5_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';							
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_18_6); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_6['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_18_6['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_18_6_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_18_6_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 18

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// PREGUNTA 19
				echo '<div class="preguntas preguntas_sub2" style="padding-bottom: 11px !important" id="SEC3_19">';
						echo form_label('19.  ¿En la comunidad existen situaciones de violencia? (Ingrese uno o más códigos)', $S3_19_1['id'], $label_class);
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_19_1); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_19_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span7">';	
										echo form_label('Violencia doméstica (contra mujeres, niños)', $S3_19_1['id'], $label_class);
									echo '</div>'; 
							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_19_2); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_19_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Violación sexual', $S3_19_2['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_19_3); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_19_3['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span5">';	
										echo form_label('Asaltos, robos', $S3_19_3['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						echo '</div>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_19_4); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_19_4['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Otra (Especifique)', $S3_19_4['id'], $label_class);
									echo '</div>'; 

									echo '<div class="control-group-pp span5">';
										echo '<div class="controls">';
												echo form_input($S3_19_4_O); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_19_4_O['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	
						echo '</div>';							
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo '<div class="control-group-pp offset1 span2">';
										echo '<div class="controls">';
												echo form_input($S3_19_5); 
											echo '<span class="help-inline-pp"></span>';
											echo '<div class="help-block error">' . form_error($S3_19_5['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

									echo '<div class="span4">';	
										echo form_label('Ninguno', $S3_19_5['id'], $label_class);
									echo '</div>'; 

							echo '</div>';	
						
						echo '</div>';	
				echo '</div>';
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////// FIN PREGUNTA 19

		echo '</div>'; 	
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// FIN COLUMNA 1	

	echo '</div>'; 	

echo '</div>'; 	
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div class="well modulo" style="padding-bottom: 20px !important; padding-top: 20px !important;">';

	echo '<div class="row-fluid">';

		echo '<div class="span12 preguntas" id="SEC3_20">';

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// COLUMNA 1



				echo '<div class="row-fluid" style="padding-bottom: 0px !important; height: 60px !important;">';
					echo '<div class="preguntas_sub2 span6">';
						echo form_label('20.	¿Cuál es el medio de transporte que usan habitualmente para trasladarse desde su comunidad a la capital distrital? (Ingrese uno o más códigos)', $S3_20_1['id'], $label_class);
					echo '</div>'; 

					echo '<div class="preguntas_sub2 span3">';
						echo '<div class="row-fluid">';
							echo form_label('21.	¿Cuánto tiempo demoran?', $S3_21_1_1_H['id'], $label_class);
						echo '</div>';	
						echo '<div class="row-fluid">';
							echo '<div class="offset1 span4">';
								echo form_label('Horas', $S3_21_1_1_H['id'], $label_class);
							echo '</div>'; 	
							echo '<div class="offset1 span4">';
								echo form_label('Minutos', $S3_21_2_1_M['id'], $label_class);
							echo '</div>'; 
						echo '</div>';	

					echo '</div>'; 

					echo '<div class="preguntas_sub2 span3">';	
							echo form_label('22.	¿El tipo de vía que usan es: ', $S3_22_1_V['id'], $label_class);
					echo '</div>'; 	

				echo '</div>'; 

				echo '<div class="row-fluid" style="padding-bottom: 0px !important ;padding-top: 0px !important">';

					echo '<div class="preguntas_sub2 span6">';
	
							echo '<div class="control-group-pp offset1 span2">';
								echo '<div class="controls">';
										echo form_input($S3_20_1); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_20_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="span5">';	
								echo form_label('A pie', $S3_20_1['id'], $label_class);
							echo '</div>'; 

					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_1_1_H); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_1_1_H['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_2_1_M); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_2_1_M['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_22_1_V); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_22_1_V['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
					echo '</div>';

				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';

						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_2); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_2['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span5">';	
							echo form_label('Acémila', $S3_20_2['id'], $label_class);
						echo '</div>'; 

					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';

						echo '<div class="control-group-pp offset1 span4">';
							echo '<div class="controls">';
									echo form_input($S3_21_1_2_H); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_21_1_2_H['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	
						echo '<div class="control-group-pp offset1 span4">';
							echo '<div class="controls">';
									echo form_input($S3_21_2_2_M); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_21_2_2_M['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 
											
					echo '</div>';	
					
					echo '<div class="preguntas_sub2 span3">';
						echo '<div class="control-group-pp offset1 span4">';
							echo '<div class="controls">';
									echo form_input($S3_22_2_V); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_22_2_V['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 		
					echo '</div>';

				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
							echo '<div class="control-group-pp offset1 span2">';
								echo '<div class="controls">';
										echo form_input($S3_20_3); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_20_3['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="span5">';	
								echo form_label('Moto, mototaxi, etc', $S3_20_3['id'], $label_class);
							echo '</div>'; 
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
							echo '<div class="control-group-pp offset1 span4">';
								echo '<div class="controls">';
										echo form_input($S3_21_1_3_H); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_21_1_3_H['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
							echo '<div class="control-group-pp offset1 span4">';
								echo '<div class="controls">';
										echo form_input($S3_21_2_3_M); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_21_2_3_M['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 						
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';
							echo '<div class="control-group-pp offset1 span4">';
								echo '<div class="controls">';
										echo form_input($S3_22_3_V); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_22_3_V['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
					echo '</div>';
					
				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_4); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_4['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span5">';	
							echo form_label('Auto, camioneta, etc', $S3_20_4['id'], $label_class);
						echo '</div>'; 
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
							echo '<div class="control-group-pp offset1 span4">';
								echo '<div class="controls">';
										echo form_input($S3_21_1_4_H); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_21_1_4_H['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
							echo '<div class="control-group-pp offset1 span4">';
								echo '<div class="controls">';
										echo form_input($S3_21_2_4_M); 
									echo '<span class="help-inline-pp"></span>';
									echo '<div class="help-block error">' . form_error($S3_21_2_4_M['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 						
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';
						echo '<div class="control-group-pp offset1 span4">';
							echo '<div class="controls">';
									echo form_input($S3_22_4_V); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_22_4_V['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	
					echo '</div>';
					
				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_5); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_5['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span5">';	
							echo form_label('Camioneta rural, ómnibus, etc', $S3_20_5['id'], $label_class);
						echo '</div>'; 
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_1_5_H); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_1_5_H['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_2_5_M); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_2_5_M['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 						
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_22_5_V); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_22_5_V['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
					echo '</div>';
					
				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_6); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_6['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span5">';	
							echo form_label('Bote, Lancha, etc. (Acuático con motor)', $S3_20_6['id'], $label_class);
						echo '</div>'; 
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_1_6_H); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_1_6_H['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_2_6_M); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_2_6_M['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 					
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';

					echo '</div>';
					
				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_7); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_7['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span5">';	
							echo form_label('Canoa, balsa, etc. (Acuático sin motor)', $S3_20_7['id'], $label_class);
						echo '</div>'; 					
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_1_7_H); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_1_7_H['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_2_7_M); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_2_7_M['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 						
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';

					echo '</div>';
					
				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_8); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_8['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span4">';	
							echo form_label('Vía férrea', $S3_20_8['id'], $label_class);
						echo '</div>'; 					
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_1_8_H); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_1_8_H['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_2_8_M); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_2_8_M['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 						
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';

					echo '</div>';
					
				echo '</div>'; 

				echo '<div class="row-fluid">';

					echo '<div class="preguntas_sub2 span6">';
						echo '<div class="control-group-pp offset1 span2">';
							echo '<div class="controls">';
									echo form_input($S3_20_9); 
								echo '<span class="help-inline-pp"></span>';
								echo '<div class="help-block error">' . form_error($S3_20_9['name']) . '</div>';
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="span4">';	
							echo form_label('Vía aérea', $S3_20_9['id'], $label_class);
						echo '</div>'; 					
					echo '</div>';

					echo '<div class="preguntas_sub2 span3">';
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_1_9_H); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_1_9_H['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 	
										echo '<div class="control-group-pp offset1 span4">';
											echo '<div class="controls">';
													echo form_input($S3_21_2_9_M); 
												echo '<span class="help-inline-pp"></span>';
												echo '<div class="help-block error">' . form_error($S3_21_2_9_M['name']) . '</div>';
											echo '</div>';	
										echo '</div>'; 						
					echo '</div>';
					
					echo '<div class="preguntas_sub2 span3">';

					echo '</div>';
					
				echo '</div>'; 																							


		echo '</div>'; 

	echo '</div>'; 	

echo '</div>'; 	
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div class="well modulo">';

	echo '<div class="row-fluid">';

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// COLUMNA 1
		echo '<div class="span6">';

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
		///////////////////////////////////////////// COLUMNA 1
		echo '<div class="span6">';

		echo '</div>'; 	
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////////////// FIN COLUMNA 1	

	echo '</div>'; 	

echo '</div>'; 	
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
*/



	echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
	echo form_close(); 
echo '</div>'; 			
echo '</div>'; 	
?>

<!-- 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 -->


<script type="text/javascript">




function pase_preguntas_5_to_8(){
	sec_actual = 5;
	sec_pase = 8;
	if($("#S3_6_2").val()==1 || $("#S3_6_3").val()==1 || $("#S3_6_4").val()==1 || $("#S3_6_5").val()==1){
		for (x = sec_actual+1;x<sec_pase;x++){
			$("#SEC3_"+x+' :input').attr('disabled','disabled');
		}
	}else{
		for (x = sec_actual+1;x<sec_pase;x++){
			$("#SEC3_"+x+' :input').removeAttr('disabled','disabled');
		}	
	}
}
	






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

    function enter2tab(e) {
    if (e.keyCode == 13) {
    cb = parseInt($(this).attr('tabindex'));

    if ($(':input[tabindex=\'' + (cb + 1) + '\']') != null) {
    $(':input[tabindex=\'' + (cb + 1) + '\']').focus();
    $(':input[tabindex=\'' + (cb + 1) + '\']').select();
    e.preventDefault();

    return false;}}
	}







//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){



// lets say you bind the event on the whole document...


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
    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});




	// $("#seccion3").on("submit", function(event) {
	// 	$('#seccion3').trigger('validate');
 // 	});
	//validacion
		$("#seccion3").validate({
		    rules: {               
			//PREGUNTA 1
				//Lengua
				S3_1 : {
		    		required: true,					
		            number: true,
		            exactlength: 1,
		         },    	
				//otro
				S3_1_O : {
		    		//required: true,						
		            validName: true,
					maxlength:100,
		         }, 
			//PREGUNTA 2
				//alumbrado electrico
				S3_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },    
			//PREGUNTA 3
				//servicio energia 
				S3_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },    
			//PREGUNTA 4
				//interrupciones
				S3_4_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },    
				//restringido
				S3_4_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },    
				//costo elevado
				S3_4_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },    
				//otro
				S3_4_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },    
				//especifique
				S3_4_4_O :{
		            validName: true,
					maxlength:100,
		         }, 
			//PREGUNTA 5
				//red publica
				S3_6_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         },
		         //camion cisterna
				S3_6_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         }, 
				//pozo
				S3_6_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         }, 
				//rio
				S3_6_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		         }, 
				//otro
				S3_6_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_6_5_O : {
		    		required: true,						
		            validName: true,
					maxlength:100,
				}, 	
			//PREGUNTA 6
				//califica servicio
				S3_7  : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
			//PREGUNTA 7
				//interrupciones
				S3_8_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//restringido
				S3_8_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//costo elevado
				S3_8_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//otro
				S3_8_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_8_4_O: {
		    		//required: true,						
		            validName: true,
					maxlength:100,
		         }, 
			//PREGUNTA 8
				//red
				S3_9_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//letrina
				S3_9_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//pozo
				S3_9_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//pozo ciego
				S3_9_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//rio
				S3_9_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//no tienen
				S3_9_6 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
			//PREGUNTA 9
				//rio
				S3_10_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//bosque
				S3_10_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//laguna
				S3_10_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//canal
				S3_10_4 : {
					required: true,	
		            number: true,
		            exactlength: 1,
		        }, 	
				//otro
				S3_10_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_10_5_O :{
		    		//required: true,						
		            validName: true,
					maxlength:100,
		         }, 
			//PREGUNTA 10
				//fija
				S3_11_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//publica
				S3_11_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//celular
				S3_11_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//internet
				S3_11_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//tv
				S3_11_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//ninguno
				S3_11_6 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
			//PREGUNTA 11
				//camion
				S3_12_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//rio
				S3_12_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//queman
				S3_12_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//entierran
				S3_12_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 	
				//abono
				S3_12_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//alimentar
				S3_12_6 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//bosque
				S3_12_7 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//contenedor
				S3_12_8 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 	
				//botadero
				S3_12_9 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//otro
				S3_12_6 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_12_6_O :{
		            validName: true,
					maxlength:100,
		         }, 			
			//PREGUNTA 12
				//Minas
				S3_13 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
			//PREGUNTA 13
				//hidrocarburos
				S3_14 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
			//PREGUNTA 14
				//contaminacion
				S3_15 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 		
			//PREGUNTA 15
				//rio
				S3_16_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//suelo
				S3_16_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//aire
				S3_16_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//acustica
				S3_16_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//otro
				S3_16_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_16_5_O :{
		            validName: true,
					maxlength:100,
		         }, 	
				//no sabe
				S3_16_6 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
			
			//PREGUNTA 16
				//basura
				S3_17_1 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//desagues
				S3_17_2 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//petroleras
				S3_17_3 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//mineras
				S3_17_4 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//pesqueras
				S3_17_5 : {
		    		required: true,						
		            number: true,
		            exactlength: 1,
		        }, 
				//agricolas
				S3_17_6 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//lavado ropa
				S3_17_7 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//otro 1
				S3_17_8 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_17_8_O :{
		            validName: true,
					maxlength:100,
		         }, 
				//otro 2
				S3_17_9 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 	
				//especifique
				S3_17_9_O :{
		            validName: true,
					maxlength:100,
		         }, 
				//no sabe
				S3_17_10 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 		
			//PREGUNTA 17
				//deforestacion
				S3_18_1 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//enfermedades
				S3_18_2 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//mortandad
				S3_18_3 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//alejamiento
				S3_18_4 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 	
				//otro
				S3_18_5 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//especifique
				S3_18_5_O :{
		            validName: true,
					maxlength:100,
		         }, 
				//otro
				S3_18_6 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 	
				//especifique
				S3_18_6_O :{
		            validName: true,
					maxlength:100,
		         }, 					
			//PREGUNTA 18
				//domestica
				S3_19_1 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//sexual
				S3_19_2 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//asaltos
				S3_19_3 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//otra
				S3_19_4 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 	
				//especifique
				S3_19_4_O : {
		            number: true,
		            exactlength: 1,
		        }, 
				//ninguno
				S3_19_5 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 					
			//PREGUNTA 19
				//pie
				S3_20_1 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//acemila
				S3_20_2 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//moto
				S3_20_3 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//auto
				S3_20_4 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 		
				//camioneta
				S3_20_5 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//bote
				S3_20_6 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//canoa
				S3_20_7 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//ferrea
				S3_20_8 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//aerea
				S3_20_9 : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 									
			//PREGUNTA 20
				//horas
				S3_21_1_1_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_1_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//horas
				S3_21_1_2_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_2_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//horas
				S3_21_1_3_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_3_M: {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//horas
				S3_21_1_4_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_4_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//horas
				S3_21_1_5_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_5_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//horas
				S3_21_1_6_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_6_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 		
				//horas
				S3_21_1_7_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_7_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 	
				//horas
				S3_21_1_8_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_8_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//horas
				S3_21_1_9_H : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 
				//minutos
				S3_21_2_9_M : {
		    		required: true,
		            number: true,
		            maxlength: 2,
		        }, 													
			//PREGUNTA 21
				//via
				S3_22_1_V : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//via
				S3_22_2_V : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//via
				S3_22_3_V : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 
				//via
				S3_22_4_V : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 	
				//via
				S3_22_5_V : {
		    		required: true,
		            number: true,
		            exactlength: 1,
		        }, 					
			//FIN RULES
		    },

		    messages: {   
		    

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

		    submitHandler: function(form) {

		    	//seccion 2 serial
		    	var seccion3_data = $("#seccion3").serializeArray();
			    seccion3_data.push(
			        {name: 'ajax',value:1},
			        {name: 'comunidad_id',value:$("input[name='comunidad_id']").val()}      
			    );
				
		        var bsub3 = $( "#seccion3 :submit" );
		        bsub3.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/comunidad_seccion3",
		            type:'POST',
		            data:seccion3_data,
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