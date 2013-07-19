<?php 

$paisesArray= array(-1 => '-'); 
	foreach ($pais->result() as $filas)
		{
			$paisesArray[$filas->id] = $filas->detalle;
		}
	// CARGAR COMBOS

		// $depaArray = array(-1 =>'-');
		// foreach($departamentos->result() as $filas)
		// {
		// 	$depaArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
		// }

		$ubidepaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

		$depaxArray = array(-1 =>'-');
		foreach($departamentos->result() as $filas)
		{
			$depaxArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
		}
$provArray = array(-1 => ' -'); 
$distArray = array(-1 => ' -'); 
$ccppArray = array(-1 => ' -');

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
//SECCION 2
//ap paterno
$S2_1_AP = array(
	'name'	=> 'S2_1_AP',
	'id'	=> 'S2_1_AP',
	'maxlength'	=> 80,
	'class' => $span_class,
);

//ap materno
$S2_1_AM = array(
	'name'	=> 'S2_1_AM',
	'id'	=> 'S2_1_AM',
	'maxlength'	=> 80,
	'class' => $span_class,
);

//nombres
$S2_1_NOM = array(
	'name'	=> 'S2_1_NOM',
	'id'	=> 'S2_1_NOM',
	'maxlength'	=> 80,
	'class' => $span_class,
);

//dia
$S2_2D = array(
	'name'	=> 'S2_2D',
	'id'	=> 'S2_2D',
	'maxlength'	=> 2,
	'class' => $span_class,
);

//mes
$S2_2M = array(
	'name'	=> 'S2_2M',
	'id'	=> 'S2_2M',
	'maxlength'	=> 2,
	'class' => $span_class,
);

//año
$S2_2A = array(
	'name'	=> 'S2_2A',
	'id'	=> 'S2_2A',
	'maxlength'	=> 4,
	'class' => $span_class,
);

// //año DD
// $S2_2A_DD = array(
// 	'name'	=> 'S2_2A_DD',
// 	'id'	=> 'S2_2A_DD',
// 	'maxlength'	=> 4,
// 	'class' => $span_class,
// );

//sexo
$S2_3 = array(
	'name'	=> 'S2_3',
	'id'	=> 'S2_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//dni
$S2_4 = array(
	'name'	=> 'S2_4',
	'id'	=> 'S2_4',
	'maxlength'	=> 8,
	'class' => $span_class,
);

//dni DD
$S2_4_DD = array(
	'name'	=> 'S2_4_DD',
	'id'	=> 'S2_4_DD',
	'maxlength'	=> 8,
	'class' => $span_class,
);

//ruc
$S2_5 = array(
	'name'	=> 'S2_5',
	'id'	=> 'S2_5',
	'maxlength'	=> 11,
	'class' => $span_class,
);
//ruc DD
$S2_5_DD = array(
	'name'	=> 'S2_5_DD',
	'id'	=> 'S2_5_DD',
	'maxlength'	=> 11,
	'class' => $span_class,
);

//celular
$S2_6 = array(
	'name'	=> 'S2_6',
	'id'	=> 'S2_6',
	'maxlength'	=> 9,
	'class' => $span_class,
);

//fijo
$S2_7 = array(
	'name'	=> 'S2_7',
	'id'	=> 'S2_7',
	'maxlength'	=> 7,
	'class' => $span_class,
);

//correo
$S2_8 = array(
	'name'	=> 'S2_8',
	'id'	=> 'S2_8',
	'maxlength'	=> 80,
	'class' => $span_class,
);

//tipo via
$TIPVIA = array(
	'name'	=> 'TIPVIA',
	'id'	=> 'TIPVIA',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//nombre via
$NOMVIA = array(
	'name'	=> 'NOMVIA',
	'id'	=> 'NOMVIA',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//num puerta
$PTANUM = array(
	'name'	=> 'PTANUM',
	'id'	=> 'PTANUM',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//block
$BLOCK = array(
	'name'	=> 'BLOCK',
	'id'	=> 'BLOCK',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//Interior
$INT = array(
	'name'	=> 'INT',
	'id'	=> 'INT',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//PISO
$PISO = array(
	'name'	=> 'PISO',
	'id'	=> 'PISO',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//MZ
$MZ = array(
	'name'	=> 'MZ',
	'id'	=> 'MZ',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//LOTE
$LOTE = array(
	'name'	=> 'LOTE',
	'id'	=> 'LOTE',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//km
$KM = array(
	'name'	=> 'KM',
	'id'	=> 'KM',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//nivel
$S2_12 = array(
	'name'	=> 'S2_12',
	'id'	=> 'S2_12',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//grado
$S2_12G = array(
	'name'	=> 'S2_12G',
	'id'	=> 'S2_12G',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//año
$S2_12A = array(
	'name'	=> 'S2_12A',
	'id'	=> 'S2_12A',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//pesca ocupacion?
$S2_13 = array(
	'name'	=> 'S2_13',
	'id'	=> 'S2_13',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// //q actividad
// $S2_14 = array(
// 	'name'	=> 'S2_14',
// 	'id'	=> 'S2_14',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );

// //otra actividad
// $S2_14_O = array(
// 	'name'	=> 'S2_14_O',
// 	'id'	=> 'S2_14_O',
// 	'maxlength'	=> 80,
// 	'class' => $span_class,
// );
//A q actividad se dedica
//agricola
$S2_14_1 = array(
	'name'	=> 'S2_14_1',
	'id'	=> 'S2_14_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//pecuaria
$S2_14_2 = array(
	'name'	=> 'S2_14_2',
	'id'	=> 'S2_14_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//acuicola
$S2_14_3 = array(
	'name'	=> 'S2_14_3',
	'id'	=> 'S2_14_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//caza
$S2_14_4 = array(
	'name'	=> 'S2_14_4',
	'id'	=> 'S2_14_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//construcion
$S2_14_5 = array(
	'name'	=> 'S2_14_5',
	'id'	=> 'S2_14_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//comercio
$S2_14_6 = array(
	'name'	=> 'S2_14_6',
	'id'	=> 'S2_14_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//Otra
$S2_14_7 = array(
	'name'	=> 'S2_14_7',
	'id'	=> 'S2_14_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//especifique
$S2_14_7_O = array(
	'name'	=> 'S2_14_7_O',
	'id'	=> 'S2_14_7_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//notiene
$S2_14_8 = array(
	'name'	=> 'S2_14_8',
	'id'	=> 'S2_14_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);


//A q actividad se dedica

$S2_15 = array(
	'name'	=> 'S2_15',
	'id'	=> 'S2_15',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//especifique
$S2_15_O = array(
	'name'	=> 'S2_15_O',
	'id'	=> 'S2_15_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//tradicion familiar
// $S2_15_1 = array(
// 	'name'	=> 'S2_15_1',
// 	'id'	=> 'S2_15_1',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );

// //Necesidad economica
// $S2_15_2 = array(
// 	'name'	=> 'S2_15_2',
// 	'id'	=> 'S2_15_2',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );

// //Otra
// $S2_15_3 = array(
// 	'name'	=> 'S2_15_3',
// 	'id'	=> 'S2_15_3',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );

// //Otra Especifique
// $S2_15_3_O = array(
// 	'name'	=> 'S2_15_3_O',
// 	'id'	=> 'S2_15_3_O',
// 	'maxlength'	=> 100,
// 	'class' => $span_class,
// );

//años pesca
$S2_16 = array(
	'name'	=> 'S2_16',
	'id'	=> 'S2_16',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// //estado civil
// $S2_17 = array(
// 	'name'	=> 'S2_17',
// 	'id'	=> 'S2_17',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );


//vaso  de leche 
$S2_17_1 = array(
	'name'	=> 'S2_17_1',
	'id'	=> 'S2_17_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// comedor popular
$S2_17_2 = array(
	'name'	=> 'S2_17_2',
	'id'	=> 'S2_17_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//desayuno o alimentacion
$S2_17_3 = array(
	'name'	=> 'S2_17_3',
	'id'	=> 'S2_17_3',
	'maxlength'	=> 100,
	'class' => $span_class,
);

//seguro integral de salud
$S2_17_4 = array(
	'name'	=> 'S2_17_4',
	'id'	=> 'S2_17_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// programa juntos
$S2_17_5 = array(
	'name'	=> 'S2_17_5',
	'id'	=> 'S2_17_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// programa bono de gratitud
$S2_17_6 = array(
	'name'	=> 'S2_17_6',
	'id'	=> 'S2_17_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//programa cuna mas
$S2_17_7 = array(
	'name'	=> 'S2_17_7',
	'id'	=> 'S2_17_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// otro
$S2_17_8 = array(
	'name'	=> 'S2_17_8',
	'id'	=> 'S2_17_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//otro-especifique
$S2_17_8_O = array(
	'name'	=> 'S2_17_8_O',
	'id'	=> 'S2_17_8_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//ninguno
$S2_17_9 = array(
	'name'	=> 'S2_17_9',
	'id'	=> 'S2_17_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);




//nivel conyugue
$S2_19 = array(
	'name'	=> 'S2_19',
	'id'	=> 'S2_19',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//grado conyugue
$S2_19G = array(
	'name'	=> 'S2_19G',
	'id'	=> 'S2_19G',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//año conyugue
$S2_19A = array(
	'name'	=> 'S2_19A',
	'id'	=> 'S2_19A',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Cuidado del hogar
$S2_20_1 = array(
	'name'	=> 'S2_20_1',
	'id'	=> 'S2_20_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Comerciante
$S2_20_2 = array(
	'name'	=> 'S2_20_2',
	'id'	=> 'S2_20_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Pescador
$S2_20_3 = array(
	'name'	=> 'S2_20_3',
	'id'	=> 'S2_20_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Recolector
$S2_20_4 = array(
	'name'	=> 'S2_20_4',
	'id'	=> 'S2_20_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Otro
$S2_20_5 = array(
	'name'	=> 'S2_20_5',
	'id'	=> 'S2_20_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Otro especifique
$S2_20_6 = array(
	'name'	=> 'S2_20_6',
	'id'	=> 'S2_20_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// Otro especifique
$S2_20_7 = array(
	'name'	=> 'S2_20_7',
	'id'	=> 'S2_20_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// Otro especifique
$S2_20_8 = array(
	'name'	=> 'S2_20_8',
	'id'	=> 'S2_20_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// Otro especifique
$S2_20_9 = array(
	'name'	=> 'S2_20_9',
	'id'	=> 'S2_20_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// Otro especifique
$S2_20_9_O = array(
	'name'	=> 'S2_20_9_O',
	'id'	=> 'S2_20_9_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);

// tiene hjos
$S2_21 = array(
	'name'	=> 'S2_21',
	'id'	=> 'S2_21',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// cuantos hijos
$S2_22 = array(
	'name'	=> 'S2_22',
	'id'	=> 'S2_22',
	'maxlength'	=> 2,
	'class' => $span_class,
);


///////////////////////////hijo 1
// nro orden
$S2_23_1_1 = array(
	'name'	=> 'S2_23_1_1',
	'id'	=> 'S2_23_1_1',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_1 = array(
	'name'	=> 'S2_23_2_1',
	'id'	=> 'S2_23_2_1',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_1 = array(
	'name'	=> 'S2_23_3_1',
	'id'	=> 'S2_23_3_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_1A = array(
	'name'	=> 'S2_23_4_1A',
	'id'	=> 'S2_23_4_1A',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad m
$S2_23_4_1M = array(
	'name'	=> 'S2_23_4_1M',
	'id'	=> 'S2_23_4_1M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_1 = array(
	'name'	=> 'S2_23_5_1',
	'id'	=> 'S2_23_5_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_1 = array(
	'name'	=> 'S2_23_6_1',
	'id'	=> 'S2_23_6_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_1 = array(
	'name'	=> 'S2_23_7_1',
	'id'	=> 'S2_23_7_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_1 = array(
	'name'	=> 'S2_23_8_1',
	'id'	=> 'S2_23_8_1',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_1 = array(
	'name'	=> 'S2_23_9_1',
	'id'	=> 'S2_23_9_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//institucion n o p
$S2_23_10_1 = array(
	'name'	=> 'S2_23_10_1',
	'id'	=> 'S2_23_10_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_1_O = array(
	'name'	=> 'S2_23_11_1_O',
	'id'	=> 'S2_23_11_1_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 1
///////////////////////////hijo 2
// nro orden
$S2_23_1_2 = array(
	'name'	=> 'S2_23_1_2',
	'id'	=> 'S2_23_1_2',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_2 = array(
	'name'	=> 'S2_23_2_2',
	'id'	=> 'S2_23_2_2',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_2 = array(
	'name'	=> 'S2_23_3_2',
	'id'	=> 'S2_23_3_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_2A = array(
	'name'	=> 'S2_23_4_2A',
	'id'	=> 'S2_23_4_2A',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad m
$S2_23_4_2M = array(
	'name'	=> 'S2_23_4_2M',
	'id'	=> 'S2_23_4_2M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_2 = array(
	'name'	=> 'S2_23_5_2',
	'id'	=> 'S2_23_5_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_2 = array(
	'name'	=> 'S2_23_6_2',
	'id'	=> 'S2_23_6_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_2 = array(
	'name'	=> 'S2_23_7_2',
	'id'	=> 'S2_23_7_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_2 = array(
	'name'	=> 'S2_23_8_2',
	'id'	=> 'S2_23_8_2',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_2 = array(
	'name'	=> 'S2_23_9_2',
	'id'	=> 'S2_23_9_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//institucion n o p
$S2_23_10_2 = array(
	'name'	=> 'S2_23_10_2',
	'id'	=> 'S2_23_10_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_2_O = array(
	'name'	=> 'S2_23_11_2_O',
	'id'	=> 'S2_23_11_2_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 2
///////////////////////////hijo 3
// nro orden
$S2_23_1_3 = array(
	'name'	=> 'S2_23_1_3',
	'id'	=> 'S2_23_1_3',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_3 = array(
	'name'	=> 'S2_23_2_3',
	'id'	=> 'S2_23_2_3',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_3 = array(
	'name'	=> 'S2_23_3_3',
	'id'	=> 'S2_23_3_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_3A = array(
	'name'	=> 'S2_23_4_3A',
	'id'	=> 'S2_23_4_3A',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad m
$S2_23_4_3M = array(
	'name'	=> 'S2_23_4_3M',
	'id'	=> 'S2_23_4_3M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_3 = array(
	'name'	=> 'S2_23_5_3',
	'id'	=> 'S2_23_5_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_3 = array(
	'name'	=> 'S2_23_6_3',
	'id'	=> 'S2_23_6_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_3 = array(
	'name'	=> 'S2_23_7_3',
	'id'	=> 'S2_23_7_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_3 = array(
	'name'	=> 'S2_23_8_3',
	'id'	=> 'S2_23_8_3',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_3 = array(
	'name'	=> 'S2_23_9_3',
	'id'	=> 'S2_23_9_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_3 = array(
	'name'	=> 'S2_23_10_3',
	'id'	=> 'S2_23_10_3',
	'maxlength'	=> 100,
	'class' => $span_class,
);

// escuela
$S2_23_11_3_O = array(
	'name'	=> 'S2_23_11_3_O',
	'id'	=> 'S2_23_11_3_O',
	'maxlength'	=> 1,
	'class' => $span_class,
);
///////////////////////////fin hijo 3
///////////////////////////hijo 4
// nro orden
$S2_23_1_4 = array(
	'name'	=> 'S2_23_1_4',
	'id'	=> 'S2_23_1_4',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_4 = array(
	'name'	=> 'S2_23_2_4',
	'id'	=> 'S2_23_2_4',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_4 = array(
	'name'	=> 'S2_23_3_4',
	'id'	=> 'S2_23_3_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_4A = array(
	'name'	=> 'S2_23_4_4A',
	'id'	=> 'S2_23_4_4A',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// edad m
$S2_23_4_4M = array(
	'name'	=> 'S2_23_4_4M',
	'id'	=> 'S2_23_4_4M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_4 = array(
	'name'	=> 'S2_23_5_4',
	'id'	=> 'S2_23_5_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_4 = array(
	'name'	=> 'S2_23_6_4',
	'id'	=> 'S2_23_6_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_4 = array(
	'name'	=> 'S2_23_7_4',
	'id'	=> 'S2_23_7_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_4 = array(
	'name'	=> 'S2_23_8_4',
	'id'	=> 'S2_23_8_4',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_4 = array(
	'name'	=> 'S2_23_9_4',
	'id'	=> 'S2_23_9_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_4 = array(
	'name'	=> 'S2_23_10_4',
	'id'	=> 'S2_23_10_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_4_O = array(
	'name'	=> 'S2_23_11_4_O',
	'id'	=> 'S2_23_11_4_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);

///////////////////////////fin hijo 4
///////////////////////////hijo 5
// nro orden
$S2_23_1_5 = array(
	'name'	=> 'S2_23_1_5',
	'id'	=> 'S2_23_1_5',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_5 = array(
	'name'	=> 'S2_23_2_5',
	'id'	=> 'S2_23_2_5',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_5 = array(
	'name'	=> 'S2_23_3_5',
	'id'	=> 'S2_23_3_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_5A = array(
	'name'	=> 'S2_23_4_5A',
	'id'	=> 'S2_23_4_5A',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad m
$S2_23_4_5M = array(
	'name'	=> 'S2_23_4_5M',
	'id'	=> 'S2_23_4_5M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_5 = array(
	'name'	=> 'S2_23_5_5',
	'id'	=> 'S2_23_5_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_5 = array(
	'name'	=> 'S2_23_6_5',
	'id'	=> 'S2_23_6_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_5 = array(
	'name'	=> 'S2_23_7_5',
	'id'	=> 'S2_23_7_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_5 = array(
	'name'	=> 'S2_23_8_5',
	'id'	=> 'S2_23_8_5',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_5 = array(
	'name'	=> 'S2_23_9_5',
	'id'	=> 'S2_23_9_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_5 = array(
	'name'	=> 'S2_23_10_5',
	'id'	=> 'S2_23_10_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_5_O = array(
	'name'	=> 'S2_23_11_5_O',
	'id'	=> 'S2_23_11_5_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 5
///////////////////////////hijo 6
// nro orden
$S2_23_1_6 = array(
	'name'	=> 'S2_23_1_6',
	'id'	=> 'S2_23_1_6',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_6 = array(
	'name'	=> 'S2_23_2_6',
	'id'	=> 'S2_23_2_6',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_6 = array(
	'name'	=> 'S2_23_3_6',
	'id'	=> 'S2_23_3_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_6A = array(
	'name'	=> 'S2_23_4_6A',
	'id'	=> 'S2_23_4_6A',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad m
$S2_23_4_6M = array(
	'name'	=> 'S2_23_4_6M',
	'id'	=> 'S2_23_4_6M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_6 = array(
	'name'	=> 'S2_23_5_6',
	'id'	=> 'S2_23_5_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_6 = array(
	'name'	=> 'S2_23_6_6',
	'id'	=> 'S2_23_6_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_6 = array(
	'name'	=> 'S2_23_7_6',
	'id'	=> 'S2_23_7_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_6 = array(
	'name'	=> 'S2_23_8_6',
	'id'	=> 'S2_23_8_6',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_6 = array(
	'name'	=> 'S2_23_9_6',
	'id'	=> 'S2_23_9_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_6 = array(
	'name'	=> 'S2_23_10_6',
	'id'	=> 'S2_23_10_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_6_O = array(
	'name'	=> 'S2_23_11_6_O',
	'id'	=> 'S2_23_11_6_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 6
///////////////////////////hijo 7
// nro orden
$S2_23_1_7 = array(
	'name'	=> 'S2_23_1_7',
	'id'	=> 'S2_23_1_7',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_7 = array(
	'name'	=> 'S2_23_2_7',
	'id'	=> 'S2_23_2_7',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_7 = array(
	'name'	=> 'S2_23_3_7',
	'id'	=> 'S2_23_3_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_7A = array(
	'name'	=> 'S2_23_4_7A',
	'id'	=> 'S2_23_4_7A',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad m
$S2_23_4_7M = array(
	'name'	=> 'S2_23_4_7M',
	'id'	=> 'S2_23_4_7M',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_7 = array(
	'name'	=> 'S2_23_5_7',
	'id'	=> 'S2_23_5_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_7 = array(
	'name'	=> 'S2_23_6_7',
	'id'	=> 'S2_23_6_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_7 = array(
	'name'	=> 'S2_23_7_7',
	'id'	=> 'S2_23_7_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_7 = array(
	'name'	=> 'S2_23_8_7',
	'id'	=> 'S2_23_8_7',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_7 = array(
	'name'	=> 'S2_23_9_7',
	'id'	=> 'S2_23_9_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_7 = array(
	'name'	=> 'S2_23_10_7',
	'id'	=> 'S2_23_10_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_7_O = array(
	'name'	=> 'S2_23_11_7_O',
	'id'	=> 'S2_23_11_7_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 7
///////////////////////////hijo 8
// nro orden
$S2_23_1_8 = array(
	'name'	=> 'S2_23_1_8',
	'id'	=> 'S2_23_1_8',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_8 = array(
	'name'	=> 'S2_23_2_8',
	'id'	=> 'S2_23_2_8',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_8 = array(
	'name'	=> 'S2_23_3_8',
	'id'	=> 'S2_23_3_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_8A = array(
	'name'	=> 'S2_23_4_8A',
	'id'	=> 'S2_23_4_8A',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// edad m
$S2_23_4_8M = array(
	'name'	=> 'S2_23_4_8M',
	'id'	=> 'S2_23_4_8M',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// vive con usted
$S2_23_5_8 = array(
	'name'	=> 'S2_23_5_8',
	'id'	=> 'S2_23_5_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_8 = array(
	'name'	=> 'S2_23_6_8',
	'id'	=> 'S2_23_6_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_8 = array(
	'name'	=> 'S2_23_7_8',
	'id'	=> 'S2_23_7_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_8 = array(
	'name'	=> 'S2_23_8_8',
	'id'	=> 'S2_23_8_8',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_8 = array(
	'name'	=> 'S2_23_9_8',
	'id'	=> 'S2_23_9_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_8 = array(
	'name'	=> 'S2_23_10_8',
	'id'	=> 'S2_23_10_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_8_O = array(
	'name'	=> 'S2_23_11_8_O',
	'id'	=> 'S2_23_11_8_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 8
///////////////////////////hijo 9
// nro orden
$S2_23_1_9 = array(
	'name'	=> 'S2_23_1_9',
	'id'	=> 'S2_23_1_9',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_9 = array(
	'name'	=> 'S2_23_2_9',
	'id'	=> 'S2_23_2_9',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_9 = array(
	'name'	=> 'S2_23_3_9',
	'id'	=> 'S2_23_3_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_9A = array(
	'name'	=> 'S2_23_4_9A',
	'id'	=> 'S2_23_4_9A',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// edad m
$S2_23_4_9M = array(
	'name'	=> 'S2_23_4_9M',
	'id'	=> 'S2_23_4_9M',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// vive con usted
$S2_23_5_9 = array(
	'name'	=> 'S2_23_5_9',
	'id'	=> 'S2_23_5_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_9 = array(
	'name'	=> 'S2_23_6_9',
	'id'	=> 'S2_23_6_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_9 = array(
	'name'	=> 'S2_23_7_9',
	'id'	=> 'S2_23_7_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_9 = array(
	'name'	=> 'S2_23_8_9',
	'id'	=> 'S2_23_8_9',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_9 = array(
	'name'	=> 'S2_23_9_9',
	'id'	=> 'S2_23_9_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_9 = array(
	'name'	=> 'S2_23_10_9',
	'id'	=> 'S2_23_10_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_9_O = array(
	'name'	=> 'S2_23_11_9_O',
	'id'	=> 'S2_23_11_9_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 9
///////////////////////////hijo 10
// nro orden
$S2_23_1_10 = array(
	'name'	=> 'S2_23_1_10',
	'id'	=> 'S2_23_1_10',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// nombre
$S2_23_2_10 = array(
	'name'	=> 'S2_23_2_10',
	'id'	=> 'S2_23_2_10',
	'maxlength'	=> 100,
	'class' => $span_class,
);
// sexo
$S2_23_3_10 = array(
	'name'	=> 'S2_23_3_10',
	'id'	=> 'S2_23_3_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// edad
$S2_23_4_10A = array(
	'name'	=> 'S2_23_4_1A0',
	'id'	=> 'S2_23_4_1A0',
	'maxlength'	=> 2,
	'class' => $span_class,
);

// edad
$S2_23_4_10M = array(
	'name'	=> 'S2_23_4_1A0',
	'id'	=> 'S2_23_4_1A0',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// vive con usted
$S2_23_5_10 = array(
	'name'	=> 'S2_23_5_10',
	'id'	=> 'S2_23_5_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// depende economicamente
$S2_23_6_10 = array(
	'name'	=> 'S2_23_6_10',
	'id'	=> 'S2_23_6_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// limitacion
$S2_23_7_10 = array(
	'name'	=> 'S2_23_7_10',
	'id'	=> 'S2_23_7_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);
// ultimo nivel
$S2_23_8_10 = array(
	'name'	=> 'S2_23_8_10',
	'id'	=> 'S2_23_8_10',
	'maxlength'	=> 2,
	'class' => $span_class,
);
// ocupacion actual
$S2_23_9_10 = array(
	'name'	=> 'S2_23_9_10',
	'id'	=> 'S2_23_9_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//institucion n o p
$S2_23_10_10 = array(
	'name'	=> 'S2_23_10_10',
	'id'	=> 'S2_23_10_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);

// escuela
$S2_23_11_10_O = array(
	'name'	=> 'S2_23_11_10_O',
	'id'	=> 'S2_23_11_10_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
///////////////////////////fin hijo 10
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//FIN SECCION 2
//////////////////////////////////////////////
//////////////////////////////////////////SECCION II
$attr = array('class' => 'form-vertical form-auth','id' => 'seccion2');

echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 

	echo '<div class="well modulo">';
		echo '<div class="row-fluid">';
			echo '<h4>SECCION II. CARACTERISTICAS DE LA POBLACION</h4>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 1
			

	
	echo '<div class="row-fluid">';

		echo '<div class="span9">';
			echo '<p>1. Apellidos y Nombres</p>';
			echo '<div class="row-fluid">';

				//echo '<div class="span12">';
					
					echo '<div class="span4">';
						echo '<div class="control-group">';
							 echo form_label('Ap. Paterno', $S2_1_AP['id'], $label_class);
							 echo '<div class="controls">'; 
								echo form_input($S2_1_AP); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($S2_1_AP['name']) . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>'; 

					echo '<div class="span4">';
						echo '<div class="control-group">';
							 echo form_label('Ap. Materno', $S2_1_AM['id'], $label_class);
							echo '<div class="controls">'; 
								echo form_input($S2_1_AM); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($S2_1_AM['name']) . '</div>';

							echo '</div>';
						echo '</div>';
					echo '</div>'; 

					echo '<div class="span4">';
						echo '<div class="control-group">';
							echo form_label('Nombres', $S2_1_NOM['id'], $label_class);
							echo '<div class="controls">'; 
								echo form_input($S2_1_NOM); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($S2_1_NOM['name']) . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>'; 

				//echo '</div>'; 

			echo '</div>';

		echo '</div>'; 


		echo '<div class="span3">';

			echo '<p>2. Fecha de nacimiento</p>';		

				echo '<div class="row-fluid">';

										echo '<div class="span3">';
											echo '<div class="control-group">';
												echo form_label('Día', $S2_2D['id'], $label_class);
												echo '<div class="controls">'; 
													echo form_input($S2_2D); 
													echo '<span class="help-inline"></span>';
													echo '<div class="help-block error">' . form_error($S2_2D['name']) . '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>'; 

										echo '<div class="span3">';
											echo '<div class="control-group">';
												echo form_label('Mes', $S2_2M['id'], $label_class);
												echo '<div class="controls">'; 
													echo form_input($S2_2M); 
													echo '<span class="help-inline"></span>';
													echo '<div class="help-block error">' . form_error($S2_2M['name']) . '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>'; 

										echo '<div class="span3">';
											echo '<div class="control-group">';
												echo form_label('Año', $S2_2A['id'], $label_class);
												echo '<div class="controls">'; 
													echo form_input($S2_2A); 
													echo '<span class="help-inline"></span>';
													echo '<div class="help-block error">' . form_error($S2_2A['name']) . '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>'; 

										// echo '<div class="span3">';
										// 	echo '<div class="control-group">';
										// 		echo form_label('Año', $S2_2A_DD['id'], $label_class);
										// 		echo '<div class="controls">'; 
										// 			echo form_input($S2_2A_DD); 
										// 			echo '<span class="help-inline"></span>';
										// 			echo '<div class="help-block error">' . form_error($S2_2A_DD['name']) . '</div>';
										// 		echo '</div>';
										// 	echo '</div>';
										// echo '</div>'; 
				echo '</div>';

			echo '</div>';

	echo '</div>'; 				

	


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 2


	echo '<div class="row-fluid">';

			echo '<div class="span2">';
					echo '<div class="control-group">';
					echo form_label('3. Sexo', $S2_3['id'], $label_class);	
						echo '<div class="controls">';
							echo form_input($S2_3); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_3['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="offset1 span2">';
					echo '<div class="control-group">';
					echo form_label('4. DNI', $S2_4['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($S2_4); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_4['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span2">';
					echo '<div class="control-group">';
					echo form_label('Verifique DNI', $S2_4_DD['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($S2_4_DD); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_4_DD['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span2">';
					echo '<div class="control-group">';
					echo form_label('5. RUC', $S2_5['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($S2_5); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_5['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span2">';
					echo '<div class="control-group">';
					echo form_label('Verifique RUC', $S2_5_DD['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($S2_5_DD); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_5_DD['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	
	echo '</div>';


	echo '<div class="row-fluid">';

			echo '<div class="span4">';
					echo '<div class="control-group">';
					echo form_label('6. Número teléfono celular', $S2_6['id'], $label_class);	
						echo '<div class="controls">';
							echo form_input($S2_6); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_6['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span4">';
					echo '<div class="control-group">';
					echo form_label('7. Número teléfono fijo / comunitario', $S2_7['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($S2_7); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_7['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span4">';
					echo '<div class="control-group">';
					echo form_label('8. Correo Electrónico', $S2_8['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($S2_8); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_8['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

	echo '</div>';


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 3
	echo '<p>9. Domicilio de la Residencia habitual</p>';	

	echo '<div class="row-fluid">';


			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('9.1. Departamento', 'S2_9_DD_COD', $label_class);	
						echo '<div class="controls">';
							echo form_dropdown('S2_9_DD_COD', $depaxArray, FALSE,'class=" span12" id="S2_9_DD_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_9_DD_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('9.2. Provincia', 'S2_9_PP_COD', $label_class);
						echo '<div class="controls">';
							echo form_dropdown('S2_9_PP_COD', $provArray, FALSE,'class="span12" id="S2_9_PP_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_9_PP_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('9.3. Distrito', 'S2_9_DI_COD', $label_class);
						echo '<div class="controls">';
								echo form_dropdown('S2_9_DI_COD', $distArray, FALSE,'class="span12" id="S2_9_DI_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_9_DI_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	


			echo '<div class="span3">';
					echo '<div class="control-group">';
					echo form_label('9.4. Centro Poblado', 'S2_9_CCPP_COD', $label_class);
						echo '<div class="controls">';
								echo form_dropdown('S2_9_CCPP_COD', $ccppArray, FALSE,'class="span12" id="S2_9_CCPP_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S2_9_CCPP_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

	echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Fila 4
	echo '<p>9.5 Dirección (Circule el tipo de vía y anote la dirección donde vive permanentemente el pescador)</p>';	

	echo '<div class="row-fluid">';


			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Tipo de vía', $TIPVIA['id'], $label_class);	
						echo '<div class="controls">';
							echo form_input($TIPVIA); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($TIPVIA['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span4">';
					echo '<div class="control-group">';
					echo form_label('Nombre de vía', $NOMVIA['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($NOMVIA); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($NOMVIA['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Nº de puerta', $PTANUM['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($PTANUM); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($PTANUM['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Block', $BLOCK['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($BLOCK); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($BLOCK['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Interior', $INT['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($INT); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($INT['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Piso', $PISO['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($PISO); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($PISO['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Mz', $MZ['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($MZ); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($MZ['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Lote', $LOTE['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($LOTE); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($LOTE['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span1">';
					echo '<div class="control-group">';
					echo form_label('Km', $KM['id'], $label_class);
						echo '<div class="controls">';
							echo form_input($KM); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($KM['name']) . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	

	echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////



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
//COLUMNAS
echo '<div class="row-fluid">';
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////COLUMNA 1
	echo '<div class="span6">';


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 10
		echo '<div class="question">';
			echo '<p>10. Lugar de Nacimiento</p>';	
				echo '<div class="row-fluid">';
					echo '<div class="span12">';
							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('País', 'S2_10_DD_PAIS', $label_class);
								echo '</div>'; 

								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_DD_PAIS', $paisesArray, FALSE,'class="' . $span_class . '" id="S2_10_DD_PAIS"');			
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_DD_PAIS') . '</div>';
								echo '</div>';	
							echo '</div>'; 		

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Departamento', 'S2_10_DD_DEP', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_DD_DEP', $depaxArray, FALSE,'class=" span12" id="S2_10_DD_DEP"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_DD_DEP') . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Provincia', 'S2_10_PP_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_PP_COD', $provArray, FALSE,'class="span12" id="S2_10_PP_COD"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_PP_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Distrito', 'S2_10_DI_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_DI_COD', $distArray, FALSE,'class="span12" id="S2_10_DI_COD"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_DI_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 


					echo '</div>';		
				echo '</div>';	

		echo '</div>';		

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 10


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 11
		echo '<div class="question">';
			echo '<p>11. ¿En qué departamento, provincia y distrito vivía el año 2007?</p>';	
				echo '<div class="row-fluid">';
					echo '<div class="span12">';
							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('País', 'S2_11_DD_PAIS', $label_class);
								echo '</div>'; 

								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_11_DD_PAIS', $paisesArray, FALSE,'class="' . $span_class . '" id="S2_11_DD_PAIS"');			
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_11_DD_PAIS') . '</div>';
								echo '</div>';	
							echo '</div>'; 		

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Departamento', 'S2_11_DD_DEP', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_11_DD_DEP', $depaxArray, FALSE,'class=" span12" id="S2_11_DD_DEP"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_11_DD_DEP') . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Provincia', 'S2_11_PP_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_11_PP_COD', $provArray, FALSE,'class="span12" id="S2_11_PP_COD"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_11_PP_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Distrito', 'S2_11_DI_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
									echo form_dropdown('S2_11_DI_COD', $distArray, FALSE,'class="span12" id="S2_11_DI_COD"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_11_DI_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 


					echo '</div>';		
				echo '</div>';	

		echo '</div>';	

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 11

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 12

		echo '<div class="question">';
			echo '<p>12. ¿Cuál fue el último nivel, grado o año de estudios que aprobó?</p>';	
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

							echo '<div class="control-group  span1">';	
								echo form_label('Nivel', $S2_12['id'], $label_class);
							echo '</div>'; 	
									
							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_12); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_12['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Grado', $S2_12G['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_12G); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_12G['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Año', $S2_12A['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_12A); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_12A['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	

					echo '</div>';	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 12

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 13

		echo '<div class="question">';
			echo '<p>13. ¿Usted considera la pesca como su ocupación:</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S2_13); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_13['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 13


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 14
		// echo '<div class="question">';
		// 	echo '<p>14. ¿A qué otra actividad se dedica?</p>';	
		// 		echo '<div class="row-fluid">';
		// 			echo '<div class="span12">';
		// 					echo '<div class="control-group offset1 span4">';
		// 						echo '<div class="controls">';
		// 								echo form_input($S2_14); 
		// 							echo '<span class="help-inline"></span>';
		// 							echo '<div class="help-block error">' . form_error($S2_14['name']) . '</div>';
		// 						echo '</div>';	
		// 					echo '</div>'; 	


		// 					echo '<div class="control-group offset2 span1">';	
		// 						echo form_label('Otra', $S2_14_O['id'], $label_class);
		// 					echo '</div>'; 

		// 					echo '<div class="control-group span4">';
		// 						echo '<div class="controls">';
		// 								echo form_input($S2_14_O); 
		// 							echo '<span class="help-inline"></span>';
		// 							echo '<div class="help-block error">' . form_error($S2_14_O['name']) . '</div>';
		// 						echo '</div>';	
		// 					echo '</div>'; 	

		// 			echo '</div>';	
		// 		echo '</div>';	
		// echo '</div>';


echo '<div class="question">';
			echo '<p>14. ¿A qué otra actividad se dedica?</p>';	

				echo '<div class="row-fluid">';
					echo '<div class="span6">';

						echo '<div class="row-fluid">';

							echo '<div class="span4">';

								echo '<p>Agrícola</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_1); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_1['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span4">';

								echo '<p>Pecuaria</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_2); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_2['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span4">';

								echo '<p>Acuicola</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_3); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_3['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span4">';

								echo '<p>Caza</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_4); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_4['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

				echo '</div>'; 			
				echo '<div class="span6">';		
						echo '<div class="row-fluid">';

							echo '<div class="span2">';

								echo '<p>Construcción</p>';

							echo '</div>';	

							echo '<div class="offset2 span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_5); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_5['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span2">';

								echo '<p>Comercio</p>';

							echo '</div>';	

							echo '<div class="offset2 span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_6); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_6['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 						
				echo '</div>'; 			
			echo '</div>'; 	
						echo '<div class="row-fluid">';

							echo '<div class="span2">';

								echo '<p>Otro</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_7); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_7['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							


							echo '<div class="span2">';

								echo '<p><b>Especifique</b></p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_7_O); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_7_O['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';		


						echo '</div>'; 	

						echo '<div class="row-fluid">';

							echo '<div class="span2">';

								echo '<p>No tiene otra actividad</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_14_8); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_14_8['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

		echo '</div>';					
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 14



////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	//fin columna1	
	echo '</div>';














////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////COLUMNA 2
	echo '<div class="span6">';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 15
		echo '<div class="question">';
			echo '<p>15. ¿Cuál es la razón por la que usted eligió ser pescador?</p>';	
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p></p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_15); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_15['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

		// 				echo '<div class="row-fluid">';

		// 					echo '<div class="offset1 span4">';

		// 						echo '<p>Necesidad económica</p>';

		// 					echo '</div>';	

		// 					echo '<div class="span2">';

		// 						echo '<div class="control-group">';
		// 							echo '<div class="controls">';
		// 								echo form_input($S2_15_2); 
		// 								echo '<span class="help-inline"></span>';
		// 								echo '<div class="help-block error">' . form_error($S2_15_2['name']) . '</div>';
		// 							echo '</div>';	
		// 						echo '</div>'; 

		// 					echo '</div>';							

		// 				echo '</div>'; 		

		// 				echo '<div class="row-fluid">';

		// 					echo '<div class="offset1 span4">';

		// 						echo '<p>Otra</p>';

		// 					echo '</div>';	

		// 					echo '<div class="span2">';

		// 						echo '<div class="control-group">';
		// 							echo '<div class="controls">';
		// 								echo form_input($S2_15_3); 
		// 								echo '<span class="help-inline"></span>';
		// 								echo '<div class="help-block error">' . form_error($S2_15_3['name']) . '</div>';
		// 							echo '</div>';	
		// 						echo '</div>'; 

		// 					echo '</div>';							

		// 				echo '</div>'; 						

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Especifique</p>';

							echo '</div>';	

							echo '<div class="span3">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_15_O); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_15_O['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

					echo '</div>';	
				echo '</div>';	
		echo '</div>';
	////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 15

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 16

		echo '<div class="question">';
			echo '<p>16. ¿Cuántos años se dedica a la actividad de pesca?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S2_16); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_16['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 		
				echo '</div>';	
		echo '</div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 16


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 17




echo '<div class="question">';
			echo '<p>17. En los últimos 12 meses, ¿Usted o algún miembro de su hogar ha sido beneficiado de algún programa social, como: (Lea cada alternativa y circule uno o más códigos)</p>';	

				echo '<div class="row-fluid">';
					echo '<div class="span6">';

						echo '<div class="row-fluid">';

							echo '<div class="span6">';

								echo '<p>Vaso de leche</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_1); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_1['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span6">';

								echo '<p>Comedor popular?</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_2); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_2['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span6">';

								echo '<p>Desayuno o alimentación escolar (Qali warma)?</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_3); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_3['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span6">';

								echo '<p>Seguro Integral de Salud (SIS)?</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_4); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_4['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="span6">';

								echo '<p>Programa Juntos?</p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_5); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_5['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 
				echo '</div>'; 			
				echo '<div class="span6">';		


						echo '<div class="row-fluid">';

							echo '<div class="span4">';

								echo '<p>Programa bono de gratitud (Pensión 65)?</p>';

							echo '</div>';	

							echo '<div class="offset1 span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_6); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_6['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

						echo '<div class="row-fluid">';

							echo '<div class="span4">';

								echo '<p>Programa Cuna Más?</p>';

							echo '</div>';	

							echo '<div class="offset1 span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_7); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_7['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

				echo '</div>'; 	
			echo '</div>'; 	

						echo '<div class="row-fluid">';

							echo '<div class="span3">';

								echo '<p>Otro</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_8); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_8['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							


							echo '<div class="span2">';

								echo '<p><b>Especifique</b></p>';

							echo '</div>';	

							echo '<div class="span4">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_8_O); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_8_O['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';		


						echo '</div>'; 	

						echo '<div class="row-fluid">';

							echo '<div class="span3">';

								echo '<p>Ninguno</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_17_9); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_17_9['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

		echo '</div>';					


		// echo '<div class="question">';
		// 	echo '<p>17. En la actualidad, ¿Cuál es su estado civil o conyugal?</p>';	
		// 		echo '<div class="row-fluid">';
		// 					echo '<div class="control-group offset4 span4">';
		// 						echo '<div class="controls">';
		// 								echo form_input($S2_17); 
		// 							echo '<span class="help-inline"></span>';
		// 							echo '<div class="help-block error">' . form_error($S2_17['name']) . '</div>';
		// 						echo '</div>';	
		// 					echo '</div>'; 	
		// 		echo '</div>';	
		// echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 17


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 18

		echo '<div class="question">';
			echo '<p>18. ¿En la actualidad, ¿Cuál es su estado civil o conyugal?</p>';	
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

							echo '<div class="control-group">';
								echo '<div class="controls offset3 span6 ">';
										echo form_dropdown('S2_18', $ecivil, FALSE,'class="span12" id="S2_18"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_18') . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							// echo '<div class="control-group offset1 span1">';	
							// 	echo form_label('Nivel', $S2_18['id'], $label_class);
							// echo '</div>'; 	
									
							// echo '<div class="control-group span2">';
							// 	echo '<div class="controls">';
							// 			echo form_input($S2_18); 
							// 		echo '<span class="help-inline"></span>';
							// 		echo '<div class="help-block error">' . form_error($S2_18['name']) . '</div>';
							// 	echo '</div>';	
							// echo '</div>'; 	


							// echo '<div class="control-group offset1 span1">';	
							// 	echo form_label('Grado', $S2_18A['id'], $label_class);
							// echo '</div>'; 

							// echo '<div class="control-group span2">';
							// 	echo '<div class="controls">';
							// 			echo form_input($S2_18A); 
							// 		echo '<span class="help-inline"></span>';
							// 		echo '<div class="help-block error">' . form_error($S2_18A['name']) . '</div>';
							// 	echo '</div>';	
							// echo '</div>'; 	


							// echo '<div class="control-group offset1 span1">';	
							// 	echo form_label('Año', $S2_18G['id'], $label_class);
							// echo '</div>'; 

							// echo '<div class="control-group span2">';
							// 	echo '<div class="controls">';
							// 			echo form_input($S2_18G); 
							// 		echo '<span class="help-inline"></span>';
							// 		echo '<div class="help-block error">' . form_error($S2_18G['name']) . '</div>';
							// 	echo '</div>';	
							// echo '</div>'; 	



					echo '</div>';	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 18


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 19
		echo '<div class="question">';
			echo '<p>19. ¿Cuál fue el último nivel, grado o año de estudios que aprobó su cónyuge/conviviente? </p>';
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

						    echo '<div class="control-group offset1 span1">';	
								echo form_label('Nivel', $S2_19['id'], $label_class);
							echo '</div>'; 	
									
							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_19); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_19['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Grado', $S2_19A['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_19A); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_19A['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Año', $S2_19G['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_19G); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_19G['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 			
	

					echo '</div>';	
				echo '</div>';	
		echo '</div>';
	////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 19
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 20

		echo '<div class="question">';
			echo '<p>20. ¿A qué actividad se dedica su cónyuge/conviviente?</p>';	
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Al cuidado del hogar</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_1); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_1['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 	

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Agrícola</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_2); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_2['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 		

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Pecuaria(a)</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_3); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_3['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Acuícola</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_4); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_4['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Pesca</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_5); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_5['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Caza</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_6); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_6['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Construcción</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_7); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_7['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 

						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Comercio</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_8); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_8['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 








						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Otra</p>';

							echo '</div>';	

							echo '<div class="span2">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_9); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_9['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 
	


						echo '<div class="row-fluid">';

							echo '<div class="offset1 span4">';

								echo '<p>Especifique</p>';

							echo '</div>';	

							echo '<div class="span3">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($S2_20_9_O); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($S2_20_9_O['name']) . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 



							echo '</div>';							

						echo '</div>'; 

		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 20
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 21

		echo '<div class="question">';
			echo '<p>21. ¿Tiene hijos(as)?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S2_21); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_21['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 21

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 22

		echo '<div class="question">';
			echo '<p>22. ¿Cuántos hijos(as) tiene en total?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S2_22); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_22['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 22

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	//FIN COLUMNA 2
	echo '</div>';



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
	//FIN COLUMNAs
echo '</div>';





////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//TABLA HIJOS
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	//PREGUNTA 23

echo '<div class="row-fluid">';
	echo '<div class="span12">';	
		echo '<div class="question">';
			echo '<p style="text-align:center">23. Información de los hijos(as):</p>';	

			echo '<table class="table table-condensed">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th class="span1">23.1 N° de Orden</th>';
                  echo '<th class="span4">23.2 Nombre</th>';
                  echo '<th class="span1">23.3 Sexo</th>';
                  echo '<th class="span1">23.4 Edad Años</th>';
                  echo '<th class="span1">23.4 Edad Meses</th>';
                  echo '<th class="span1">23.5 ¿Su hijo(a) vive con usted?</th>';
                  echo '<th class="span1">23.6 ¿Su hijo(a) depende económicamente de usted?</th>';
                  echo '<th class="span1">23.7 ¿Su hijo(a) tiene algún tipo de limitación o dificultad para desarrollar sus  actividades diarias?</th>';
                  echo '<th class="span1">23.8 ¿Cuál es el último nivel de estudios aprobado?</th>';
                  echo '<th class="span1">23.9 ¿Actualmente se encuentra estudiando?</th>';
                  echo '<th class="span1">23.10 ¿La institución educativa a la que asiste es:</th>';
                  echo '<th class="span2">23.11 Actualmente ¿A qué actividad se dedica?</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_1) . '</td>';
                  echo '<td>' . form_input($S2_23_2_1) . '</td>';
                  echo '<td>' . form_input($S2_23_3_1) . '</td>';
                  echo '<td>' . form_input($S2_23_4_1A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_1M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_1) . '</td>';
                  echo '<td>' . form_input($S2_23_6_1) . '</td>';
                  echo '<td>' . form_input($S2_23_7_1) . '</td>';
                  echo '<td>' . form_input($S2_23_8_1) . '</td>';
                  echo '<td>' . form_input($S2_23_9_1) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_10_1) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_1_O) . '</td>';                                    
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_2) . '</td>';
                  echo '<td>' . form_input($S2_23_2_2) . '</td>';
                  echo '<td>' . form_input($S2_23_3_2) . '</td>';
                  echo '<td>' . form_input($S2_23_4_2A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_2M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_2) . '</td>';
                  echo '<td>' . form_input($S2_23_6_2) . '</td>';
                  echo '<td>' . form_input($S2_23_7_2) . '</td>';
                  echo '<td>' . form_input($S2_23_8_2) . '</td>';
                  echo '<td>' . form_input($S2_23_9_2) . '</td>';  
                  echo '<td>' . form_input($S2_23_10_2) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_2_O) . '</td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_3) . '</td>';
                  echo '<td>' . form_input($S2_23_2_3) . '</td>';
                  echo '<td>' . form_input($S2_23_3_3) . '</td>';
                  echo '<td>' . form_input($S2_23_4_3A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_3M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_3) . '</td>';
                  echo '<td>' . form_input($S2_23_6_3) . '</td>';
                  echo '<td>' . form_input($S2_23_7_3) . '</td>';
                  echo '<td>' . form_input($S2_23_8_3) . '</td>';
                  echo '<td>' . form_input($S2_23_9_3) . '</td>';      
                  echo '<td>' . form_input($S2_23_10_3) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_3_O) . '</td>';                                                       
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_4) . '</td>';
                  echo '<td>' . form_input($S2_23_2_4) . '</td>';
                  echo '<td>' . form_input($S2_23_3_4) . '</td>';
                  echo '<td>' . form_input($S2_23_4_4A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_4M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_4) . '</td>';
                  echo '<td>' . form_input($S2_23_6_4) . '</td>';
                  echo '<td>' . form_input($S2_23_7_4) . '</td>';
                  echo '<td>' . form_input($S2_23_8_4) . '</td>';
                  echo '<td>' . form_input($S2_23_9_4) . '</td>';   
                  echo '<td>' . form_input($S2_23_10_4) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_4_O) . '</td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_5) . '</td>';
                  echo '<td>' . form_input($S2_23_2_5) . '</td>';
                  echo '<td>' . form_input($S2_23_3_5) . '</td>';
                  echo '<td>' . form_input($S2_23_4_5A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_5M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_5) . '</td>';
                  echo '<td>' . form_input($S2_23_6_5) . '</td>';
                  echo '<td>' . form_input($S2_23_7_5) . '</td>';
                  echo '<td>' . form_input($S2_23_8_5) . '</td>';
                  echo '<td>' . form_input($S2_23_9_5) . '</td>';   
                  echo '<td>' . form_input($S2_23_10_5) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_5_O) . '</td>';                                                      
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_6) . '</td>';
                  echo '<td>' . form_input($S2_23_2_6) . '</td>';
                  echo '<td>' . form_input($S2_23_3_6) . '</td>';
                  echo '<td>' . form_input($S2_23_4_6A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_6M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_6) . '</td>';
                  echo '<td>' . form_input($S2_23_6_6) . '</td>';
                  echo '<td>' . form_input($S2_23_7_6) . '</td>';
                  echo '<td>' . form_input($S2_23_8_6) . '</td>';
                  echo '<td>' . form_input($S2_23_9_6) . '</td>';   
                  echo '<td>' . form_input($S2_23_10_6) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_6_O) . '</td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_7) . '</td>';
                  echo '<td>' . form_input($S2_23_2_7) . '</td>';
                  echo '<td>' . form_input($S2_23_3_7) . '</td>';
                  echo '<td>' . form_input($S2_23_4_7A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_7M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_7) . '</td>';
                  echo '<td>' . form_input($S2_23_6_7) . '</td>';
                  echo '<td>' . form_input($S2_23_7_7) . '</td>';
                  echo '<td>' . form_input($S2_23_8_7) . '</td>';
                  echo '<td>' . form_input($S2_23_9_7) . '</td>';      
                  echo '<td>' . form_input($S2_23_10_7) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_7_O) . '</td>';                                                      
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_8) . '</td>';
                  echo '<td>' . form_input($S2_23_2_8) . '</td>';
                  echo '<td>' . form_input($S2_23_3_8) . '</td>';
                  echo '<td>' . form_input($S2_23_4_8A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_8M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_8) . '</td>';
                  echo '<td>' . form_input($S2_23_6_8) . '</td>';
                  echo '<td>' . form_input($S2_23_7_8) . '</td>';
                  echo '<td>' . form_input($S2_23_8_8) . '</td>';
                  echo '<td>' . form_input($S2_23_9_8) . '</td>';   
                  echo '<td>' . form_input($S2_23_10_8) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_8_O) . '</td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_9) . '</td>';
                  echo '<td>' . form_input($S2_23_2_9) . '</td>';
                  echo '<td>' . form_input($S2_23_3_9) . '</td>';
                  echo '<td>' . form_input($S2_23_4_9A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_9M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_9) . '</td>';
                  echo '<td>' . form_input($S2_23_6_9) . '</td>';
                  echo '<td>' . form_input($S2_23_7_9) . '</td>';
                  echo '<td>' . form_input($S2_23_8_9) . '</td>';
                  echo '<td>' . form_input($S2_23_9_9) . '</td>';       
                  echo '<td>' . form_input($S2_23_10_9) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_9_O) . '</td>';                                                  
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_10) . '</td>';
                  echo '<td>' . form_input($S2_23_2_10) . '</td>';
                  echo '<td>' . form_input($S2_23_3_10) . '</td>';
                  echo '<td>' . form_input($S2_23_4_10A) . '</td>';
                  echo '<td>' . form_input($S2_23_4_10M) . '</td>';
                  echo '<td>' . form_input($S2_23_5_10) . '</td>';
                  echo '<td>' . form_input($S2_23_6_10) . '</td>';
                  echo '<td>' . form_input($S2_23_7_10) . '</td>';
                  echo '<td>' . form_input($S2_23_8_10) . '</td>';
                  echo '<td>' . form_input($S2_23_9_10) . '</td>';  
                  echo '<td>' . form_input($S2_23_10_10) . '</td>';                                    
                  echo '<td>' . form_input($S2_23_11_10_O) . '</td>';                         
                echo '</tr>';                                                
              echo '</tbody>';
            echo '</table>';		



		echo '</div>';
	echo '</div>';
echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//FIN TABLA HIJOS
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	//FIN PREGUNTA 22 

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

// CARGA COMBOS UBIGEO RESIDENCIA ---------------------------------------------------------------------->
$("#S2_9_DD_COD, #S2_9_PP_COD, #S2_9_DI_COD, #S2_9_CCPP_COD").change(function(event) {
        var sel = null;
        var dep = $('#S2_9_DD_COD');
        var prov = $('#S2_9_PP_COD');
        var dist = $('#S2_9_DI_COD');
        var url = null;
        var cod = null;
        var op =null;

        var mivalue = ($(this).val() == -1) ? '-' : $(this).val();
        switch(event.target.id){
            case 'S2_9_DD_COD':
                sel     = $("#S2_9_PP_COD");
                //$('#CCDD').val(mivalue); 
                url     = CI.base_url + "ajax/ubigeo_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;
                break;

            case 'S2_9_PP_COD':
                sel     = $("#S2_9_DI_COD");
                // $('#CCPP').val(mivalue);                 
                url     = CI.base_url + "ajax/ubigeo_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'S2_9_DI_COD':
                sel     = $("#S2_9_CCPP_COD");
                // $("#CCDI").val(mivalue);          
                url     = CI.base_url + "ajax/ubigeo_ajax/get_ajax_ccpp_all/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'S2_9_CCPP_COD':
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

        if(event.target.id != 'S2_9_CCPP_COD')
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
                        sel.append('<option value="' + data.COD_PROVINCIA + '">' + data.DES_DISTRITO + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.COD_DISTRITO + '">' + data.DES_DISTRITO + '</option>');
                   }
                    if (op==3){
                        sel.append('<option value="' + data.CCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                });
               
                if (op==1){
                    $("#S2_9_PP_COD").trigger('change');
                    }  
                if (op==2){
                    $("#S2_9_DI_COD").trigger('change');
                }
                if (op==3){
                    $("#S2_9_CCPP_COD").trigger('change');
                }


            }
        });   
     }
  
}); 

//departamento

 // $("#S2_9_DD_COD").trigger('change');




// CARGA COMBOS UBIGEO RESIDENCIA<-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------
// CARGA COMBOS UBIGEO NACIMIENTO ---------------------------------------------------------------------->
$("#S2_10_DD_DEP, #S2_11_DD_DEP, #departamento3").change(function(event) {
        var sel = null;
        switch(event.target.id){
            case 'S2_10_DD_DEP':
                sel = $("#S2_10_PP_COD");
                break;
            case 'S2_11_DD_DEP':
                sel = $("#S2_11_PP_COD");
                break;
            case 'departamento3':
                sel = $("#provincia3");
                break;                
        }

        var form_data = {
            csrf_token_c: CI.cct,
            code: $(this).val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/ubigeo_ajax/get_ajax_prov/" + $(this).val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1">-</option>');
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.COD_PROVINCIA + '">' + data.DES_DISTRITO + '</option>');
                });
                sel.change();
            }
        });           
});


$("#S2_10_PP_COD, #S2_11_PP_COD, #provincia3").change(function(event) {
        var sel = null;
        var dep = null;
        switch(event.target.id){
            case 'S2_10_PP_COD':
                sel = $("#S2_10_DI_COD");
                dep = $("#S2_10_DD_DEP");
                break;
            case 'S2_11_PP_COD':
                sel = $("#S2_11_DI_COD");
                dep = $("#S2_11_DD_DEP");
                break;
            case 'provincia3':
                sel = $("#distrito3");
                dep = $("#departamento3");
                break;                
        }     
           
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/ubigeo_ajax/get_ajax_dist/" + $(this).val() + "/" + dep.val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1">-</option>');
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.COD_DISTRITO + '">' + data.DES_DISTRITO + '</option>');
                });
            }
        });           
});

// CARGA COMBOS UBIGEO RESIDENCIA<-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------




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




	// $("#seccion2").on("submit", false); 

	// $("#seccion2 :submit").on("click", function(event) {
	// 	$('#seccion6').trigger('validate');
 // 	}); 

	 $("#seccion2").validate({
		    rules: {           
		    	S2_1_AP: {
		            required: true,
		            validName: true,
		         },     
		                                                                             
			//FIN RULES
		    },

		    messages: {   
		        S2_1_AP: {
		            required: "Ingresa Ap. paterno",
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
			        {name: 'S2_9_DD',value:$('#S2_9_DD_COD :selected').text()},
			        {name: 'S2_9_PP',value:$('#S2_9_PP_COD :selected').text()},
			        {name: 'S2_9_DI',value:$('#S2_9_DI_COD :selected').text()},
			        {name: 'S2_9_CCPP',value:$('#S2_9_CCPP_COD :selected').text()},
			        {name: 'S2_10_PP',value:$('#S2_10_PP_COD :selected').text()},
			        {name: 'S2_10_DI',value:$('#S2_10_DI_COD :selected').text()},
			        {name: 'S2_10_CCPP',value:$('#S2_10_CCPP_COD :selected').text()},  
			        {name: 'S2_11_PP',value:$('#S2_11_PP_COD :selected').text()},
			        {name: 'S2_11_DI',value:$('#S2_11_DI_COD :selected').text()},
			        {name: 'S2_11_CCPP',value:$('#S2_11_CCPP_COD :selected').text()},
			        {name: 'pescador_id',value:$("input[name='pescador_id']").val()}      
			    );


			    if($("#S2_10_DD_PAIS").val() == 124 || $("#S2_10_DD_PAIS").val() == -1){
			    	seccion2_data.push(
			        	{name: 'S2_10_DD',value:$('#S2_10_DD_DEP :selected').text()},
			        	{name: 'S2_10_DD_COD',value:$('#S2_10_DD_DEP').val()}
			    	);    	
			    }else{
			    	seccion2_data.push(
			        	{name: 'S2_10_DD',value:$('#S2_10_DD_PAIS :selected').text()},
			        	{name: 'S2_10_DD_COD',value:$('#S2_10_DD_PAIS').val()}
			    	);     	
			    }

			    if($("#S2_11_DD_PAIS").val() == 124 || $("#S2_10_DD_PAIS").val() == -1){
			    	seccion2_data.push(
			        	{name: 'S2_11_DD',value:$('#S2_11_DD_DEP :selected').text()},
			        	{name: 'S2_11_DD_COD',value:$('#S2_11_DD_DEP').val()}
			    	);    	
			    }else{
			    	seccion2_data.push(
			        	{name: 'S2_11_DD',value:$('#S2_11_DD_PAIS :selected').text()},
			        	{name: 'S2_11_DD_COD',value:$('#S2_11_DD_PAIS').val()}
			    	);     	
			    }
				
		        var bsub2 = $( "#seccion2 :submit" );
		        bsub2.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/pesc_seccion2",
		            type:'POST',
		            data:seccion2_data,
		            dataType:'json',
		            success:function(json){
						alert(json.msg);
						// $('#pesc_tabs').empty();
						// $('#pesc_tabs').append(window.clonetabs);
						// $('#pesc_tabs').removeClass('hide');
						$('#pesca_dor').trigger('submit');
		            }
		        });     
		          	
		    }       
		});



		

		
 }); 
</script>