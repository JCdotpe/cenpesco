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
	'class' => $span_class. ' hijo hnro1',
);
// nombre
$S2_23_2_1 = array(
	'name'	=> 'S2_23_2_1',
	'id'	=> 'S2_23_2_1',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro1',
);
// sexo
$S2_23_3_1 = array(
	'name'	=> 'S2_23_3_1',
	'id'	=> 'S2_23_3_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1',
);
// edad
$S2_23_4_1A = array(
	'name'	=> 'S2_23_4_1A',
	'id'	=> 'S2_23_4_1A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro1 hano',
);

// edad m
$S2_23_4_1M = array(
	'name'	=> 'S2_23_4_1M',
	'id'	=> 'S2_23_4_1M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro1',
);
// vive con usted
$S2_23_5_1 = array(
	'name'	=> 'S2_23_5_1',
	'id'	=> 'S2_23_5_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1',
);
// depende economicamente
$S2_23_6_1 = array(
	'name'	=> 'S2_23_6_1',
	'id'	=> 'S2_23_6_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1',
);
// limitacion
$S2_23_7_1 = array(
	'name'	=> 'S2_23_7_1',
	'id'	=> 'S2_23_7_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1',
);
// ultimo nivel
$S2_23_8_1 = array(
	'name'	=> 'S2_23_8_1',
	'id'	=> 'S2_23_8_1',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro1',
);
// ocupacion actual
$S2_23_9_1 = array(
	'name'	=> 'S2_23_9_1',
	'id'	=> 'S2_23_9_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1 estudia',
);

//institucion n o p
$S2_23_10_1 = array(
	'name'	=> 'S2_23_10_1',
	'id'	=> 'S2_23_10_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1',
);
//actividad
$S2_23_11_1 = array(
	'name'	=> 'S2_23_11_1',
	'id'	=> 'S2_23_11_1',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro1 hacti',
);
// especifique
$S2_23_11_1_O = array(
	'name'	=> 'S2_23_11_1_O',
	'id'	=> 'S2_23_11_1_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro1 hespe',
);
///////////////////////////fin hijo 1
///////////////////////////hijo 2
// nro orden
$S2_23_1_2 = array(
	'name'	=> 'S2_23_1_2',
	'id'	=> 'S2_23_1_2',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro2',
);
// nombre
$S2_23_2_2 = array(
	'name'	=> 'S2_23_2_2',
	'id'	=> 'S2_23_2_2',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro2',
);
// sexo
$S2_23_3_2 = array(
	'name'	=> 'S2_23_3_2',
	'id'	=> 'S2_23_3_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2',
);
// edad
$S2_23_4_2A = array(
	'name'	=> 'S2_23_4_2A',
	'id'	=> 'S2_23_4_2A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro2 hano',
);

// edad m
$S2_23_4_2M = array(
	'name'	=> 'S2_23_4_2M',
	'id'	=> 'S2_23_4_2M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro2',
);
// vive con usted
$S2_23_5_2 = array(
	'name'	=> 'S2_23_5_2',
	'id'	=> 'S2_23_5_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2',
);
// depende economicamente
$S2_23_6_2 = array(
	'name'	=> 'S2_23_6_2',
	'id'	=> 'S2_23_6_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2',
);
// limitacion
$S2_23_7_2 = array(
	'name'	=> 'S2_23_7_2',
	'id'	=> 'S2_23_7_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2',
);
// ultimo nivel
$S2_23_8_2 = array(
	'name'	=> 'S2_23_8_2',
	'id'	=> 'S2_23_8_2',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro2',
);
// ocupacion actual
$S2_23_9_2 = array(
	'name'	=> 'S2_23_9_2',
	'id'	=> 'S2_23_9_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2 estudia',
);

//institucion n o p
$S2_23_10_2 = array(
	'name'	=> 'S2_23_10_2',
	'id'	=> 'S2_23_10_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2',
);
//actividad
$S2_23_11_2 = array(
	'name'	=> 'S2_23_11_2',
	'id'	=> 'S2_23_11_2',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro2 hacti',
);
// escuela
$S2_23_11_2_O = array(
	'name'	=> 'S2_23_11_2_O',
	'id'	=> 'S2_23_11_2_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro2 hespe',
);
///////////////////////////fin hijo 2
///////////////////////////hijo 3
// nro orden
$S2_23_1_3 = array(
	'name'	=> 'S2_23_1_3',
	'id'	=> 'S2_23_1_3',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro3',
);
// nombre
$S2_23_2_3 = array(
	'name'	=> 'S2_23_2_3',
	'id'	=> 'S2_23_2_3',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro3',
);
// sexo
$S2_23_3_3 = array(
	'name'	=> 'S2_23_3_3',
	'id'	=> 'S2_23_3_3',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3',
);
// edad
$S2_23_4_3A = array(
	'name'	=> 'S2_23_4_3A',
	'id'	=> 'S2_23_4_3A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro3 hano',
);

// edad m
$S2_23_4_3M = array(
	'name'	=> 'S2_23_4_3M',
	'id'	=> 'S2_23_4_3M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro3',
);
// vive con usted
$S2_23_5_3 = array(
	'name'	=> 'S2_23_5_3',
	'id'	=> 'S2_23_5_3',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3',
);
// depende economicamente
$S2_23_6_3 = array(
	'name'	=> 'S2_23_6_3',
	'id'	=> 'S2_23_6_3',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3',
);
// limitacion
$S2_23_7_3 = array(
	'name'	=> 'S2_23_7_3',
	'id'	=> 'S2_23_7_3',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3',
);
// ultimo nivel
$S2_23_8_3 = array(
	'name'	=> 'S2_23_8_3',
	'id'	=> 'S2_23_8_3',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro3',
);
// ocupacion actual
$S2_23_9_3 = array(
	'name'	=> 'S2_23_9_3',
	'id'	=> 'S2_23_9_3',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3 estudia',
);
//institucion n o p
$S2_23_10_3 = array(
	'name'	=> 'S2_23_10_3',
	'id'	=> 'S2_23_10_3',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro3',
);
//actividad
$S2_23_11_3 = array(
	'name'	=> 'S2_23_11_3',
	'id'	=> 'S2_23_11_3',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3 hacti',
);
// escuela
$S2_23_11_3_O = array(
	'name'	=> 'S2_23_11_3_O',
	'id'	=> 'S2_23_11_3_O',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro3 hespe',
);
///////////////////////////fin hijo 3
///////////////////////////hijo 4
// nro orden
$S2_23_1_4 = array(
	'name'	=> 'S2_23_1_4',
	'id'	=> 'S2_23_1_4',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro4',
);
// nombre
$S2_23_2_4 = array(
	'name'	=> 'S2_23_2_4',
	'id'	=> 'S2_23_2_4',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro4',
);
// sexo
$S2_23_3_4 = array(
	'name'	=> 'S2_23_3_4',
	'id'	=> 'S2_23_3_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4',
);
// edad
$S2_23_4_4A = array(
	'name'	=> 'S2_23_4_4A',
	'id'	=> 'S2_23_4_4A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro4 hano',
);
// edad m
$S2_23_4_4M = array(
	'name'	=> 'S2_23_4_4M',
	'id'	=> 'S2_23_4_4M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro4',
);
// vive con usted
$S2_23_5_4 = array(
	'name'	=> 'S2_23_5_4',
	'id'	=> 'S2_23_5_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4',
);
// depende economicamente
$S2_23_6_4 = array(
	'name'	=> 'S2_23_6_4',
	'id'	=> 'S2_23_6_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4',
);
// limitacion
$S2_23_7_4 = array(
	'name'	=> 'S2_23_7_4',
	'id'	=> 'S2_23_7_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4',
);
// ultimo nivel
$S2_23_8_4 = array(
	'name'	=> 'S2_23_8_4',
	'id'	=> 'S2_23_8_4',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro4',
);
// ocupacion actual
$S2_23_9_4 = array(
	'name'	=> 'S2_23_9_4',
	'id'	=> 'S2_23_9_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4 estudia',
);
//institucion n o p
$S2_23_10_4 = array(
	'name'	=> 'S2_23_10_4',
	'id'	=> 'S2_23_10_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4',
);
$S2_23_11_4 = array(
	'name'	=> 'S2_23_11_4',
	'id'	=> 'S2_23_11_4',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro4 hacti',
);
// escuela
$S2_23_11_4_O = array(
	'name'	=> 'S2_23_11_4_O',
	'id'	=> 'S2_23_11_4_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro4 hespe',
);

///////////////////////////fin hijo 4
///////////////////////////hijo 5
// nro orden
$S2_23_1_5 = array(
	'name'	=> 'S2_23_1_5',
	'id'	=> 'S2_23_1_5',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro5',
);
// nombre
$S2_23_2_5 = array(
	'name'	=> 'S2_23_2_5',
	'id'	=> 'S2_23_2_5',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro5',
);
// sexo
$S2_23_3_5 = array(
	'name'	=> 'S2_23_3_5',
	'id'	=> 'S2_23_3_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5',
);
// edad
$S2_23_4_5A = array(
	'name'	=> 'S2_23_4_5A',
	'id'	=> 'S2_23_4_5A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro5 hano',
);

// edad m
$S2_23_4_5M = array(
	'name'	=> 'S2_23_4_5M',
	'id'	=> 'S2_23_4_5M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro5',
);
// vive con usted
$S2_23_5_5 = array(
	'name'	=> 'S2_23_5_5',
	'id'	=> 'S2_23_5_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5',
);
// depende economicamente
$S2_23_6_5 = array(
	'name'	=> 'S2_23_6_5',
	'id'	=> 'S2_23_6_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5',
);
// limitacion
$S2_23_7_5 = array(
	'name'	=> 'S2_23_7_5',
	'id'	=> 'S2_23_7_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5',
);
// ultimo nivel
$S2_23_8_5 = array(
	'name'	=> 'S2_23_8_5',
	'id'	=> 'S2_23_8_5',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro5',
);
// ocupacion actual
$S2_23_9_5 = array(
	'name'	=> 'S2_23_9_5',
	'id'	=> 'S2_23_9_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5 estudia',
);
//institucion n o p
$S2_23_10_5 = array(
	'name'	=> 'S2_23_10_5',
	'id'	=> 'S2_23_10_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5',
);

$S2_23_11_5 = array(
	'name'	=> 'S2_23_11_5',
	'id'	=> 'S2_23_11_5',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro5 hacti',
);
// escuela
$S2_23_11_5_O = array(
	'name'	=> 'S2_23_11_5_O',
	'id'	=> 'S2_23_11_5_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro5 hespe',
);
///////////////////////////fin hijo 5
///////////////////////////hijo 6
// nro orden
$S2_23_1_6 = array(
	'name'	=> 'S2_23_1_6',
	'id'	=> 'S2_23_1_6',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro6',
);
// nombre
$S2_23_2_6 = array(
	'name'	=> 'S2_23_2_6',
	'id'	=> 'S2_23_2_6',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro6',
);
// sexo
$S2_23_3_6 = array(
	'name'	=> 'S2_23_3_6',
	'id'	=> 'S2_23_3_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6',
);
// edad
$S2_23_4_6A = array(
	'name'	=> 'S2_23_4_6A',
	'id'	=> 'S2_23_4_6A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro6 hano',
);

// edad m
$S2_23_4_6M = array(
	'name'	=> 'S2_23_4_6M',
	'id'	=> 'S2_23_4_6M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro6',
);
// vive con usted
$S2_23_5_6 = array(
	'name'	=> 'S2_23_5_6',
	'id'	=> 'S2_23_5_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6',
);
// depende economicamente
$S2_23_6_6 = array(
	'name'	=> 'S2_23_6_6',
	'id'	=> 'S2_23_6_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6',
);
// limitacion
$S2_23_7_6 = array(
	'name'	=> 'S2_23_7_6',
	'id'	=> 'S2_23_7_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6',
);
// ultimo nivel
$S2_23_8_6 = array(
	'name'	=> 'S2_23_8_6',
	'id'	=> 'S2_23_8_6',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro6',
);
// ocupacion actual
$S2_23_9_6 = array(
	'name'	=> 'S2_23_9_6',
	'id'	=> 'S2_23_9_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6 estudia',
);
//institucion n o p
$S2_23_10_6 = array(
	'name'	=> 'S2_23_10_6',
	'id'	=> 'S2_23_10_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6',
);
$S2_23_11_6 = array(
	'name'	=> 'S2_23_11_6',
	'id'	=> 'S2_23_11_6',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro6 hacti',
);
// escuela
$S2_23_11_6_O = array(
	'name'	=> 'S2_23_11_6_O',
	'id'	=> 'S2_23_11_6_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro6 hespe',
);
///////////////////////////fin hijo 6
///////////////////////////hijo 7
// nro orden
$S2_23_1_7 = array(
	'name'	=> 'S2_23_1_7',
	'id'	=> 'S2_23_1_7',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro7',
);
// nombre
$S2_23_2_7 = array(
	'name'	=> 'S2_23_2_7',
	'id'	=> 'S2_23_2_7',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro7',
);
// sexo
$S2_23_3_7 = array(
	'name'	=> 'S2_23_3_7',
	'id'	=> 'S2_23_3_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7',
);
// edad
$S2_23_4_7A = array(
	'name'	=> 'S2_23_4_7A',
	'id'	=> 'S2_23_4_7A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro7 hano',
);

// edad m
$S2_23_4_7M = array(
	'name'	=> 'S2_23_4_7M',
	'id'	=> 'S2_23_4_7M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro7',
);
// vive con usted
$S2_23_5_7 = array(
	'name'	=> 'S2_23_5_7',
	'id'	=> 'S2_23_5_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7',
);
// depende economicamente
$S2_23_6_7 = array(
	'name'	=> 'S2_23_6_7',
	'id'	=> 'S2_23_6_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7',
);
// limitacion
$S2_23_7_7 = array(
	'name'	=> 'S2_23_7_7',
	'id'	=> 'S2_23_7_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7',
);
// ultimo nivel
$S2_23_8_7 = array(
	'name'	=> 'S2_23_8_7',
	'id'	=> 'S2_23_8_7',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro7',
);
// ocupacion actual
$S2_23_9_7 = array(
	'name'	=> 'S2_23_9_7',
	'id'	=> 'S2_23_9_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7 estudia',
);
//institucion n o p
$S2_23_10_7 = array(
	'name'	=> 'S2_23_10_7',
	'id'	=> 'S2_23_10_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7',
);
$S2_23_11_7 = array(
	'name'	=> 'S2_23_11_7',
	'id'	=> 'S2_23_11_7',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro7 hacti',
);
// escuela
$S2_23_11_7_O = array(
	'name'	=> 'S2_23_11_7_O',
	'id'	=> 'S2_23_11_7_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro7 hespe',
);
///////////////////////////fin hijo 7
///////////////////////////hijo 8
// nro orden
$S2_23_1_8 = array(
	'name'	=> 'S2_23_1_8',
	'id'	=> 'S2_23_1_8',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro8',
);
// nombre
$S2_23_2_8 = array(
	'name'	=> 'S2_23_2_8',
	'id'	=> 'S2_23_2_8',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro8',
);
// sexo
$S2_23_3_8 = array(
	'name'	=> 'S2_23_3_8',
	'id'	=> 'S2_23_3_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8',
);
// edad
$S2_23_4_8A = array(
	'name'	=> 'S2_23_4_8A',
	'id'	=> 'S2_23_4_8A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro8 hano',
);
// edad m
$S2_23_4_8M = array(
	'name'	=> 'S2_23_4_8M',
	'id'	=> 'S2_23_4_8M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro8',
);

// vive con usted
$S2_23_5_8 = array(
	'name'	=> 'S2_23_5_8',
	'id'	=> 'S2_23_5_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8',
);
// depende economicamente
$S2_23_6_8 = array(
	'name'	=> 'S2_23_6_8',
	'id'	=> 'S2_23_6_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8',
);
// limitacion
$S2_23_7_8 = array(
	'name'	=> 'S2_23_7_8',
	'id'	=> 'S2_23_7_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8',
);
// ultimo nivel
$S2_23_8_8 = array(
	'name'	=> 'S2_23_8_8',
	'id'	=> 'S2_23_8_8',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro8',
);
// ocupacion actual
$S2_23_9_8 = array(
	'name'	=> 'S2_23_9_8',
	'id'	=> 'S2_23_9_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8 estudia',
);
//institucion n o p
$S2_23_10_8 = array(
	'name'	=> 'S2_23_10_8',
	'id'	=> 'S2_23_10_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8',
);
$S2_23_11_8 = array(
	'name'	=> 'S2_23_11_8',
	'id'	=> 'S2_23_11_8',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro8 hacti',
);
// escuela
$S2_23_11_8_O = array(
	'name'	=> 'S2_23_11_8_O',
	'id'	=> 'S2_23_11_8_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro8 hespe',
);
///////////////////////////fin hijo 8
///////////////////////////hijo 9
// nro orden
$S2_23_1_9 = array(
	'name'	=> 'S2_23_1_9',
	'id'	=> 'S2_23_1_9',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro9',
);
// nombre
$S2_23_2_9 = array(
	'name'	=> 'S2_23_2_9',
	'id'	=> 'S2_23_2_9',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro9',
);
// sexo
$S2_23_3_9 = array(
	'name'	=> 'S2_23_3_9',
	'id'	=> 'S2_23_3_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9',
);
// edad
$S2_23_4_9A = array(
	'name'	=> 'S2_23_4_9A',
	'id'	=> 'S2_23_4_9A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro9 hano',
);
// edad m
$S2_23_4_9M = array(
	'name'	=> 'S2_23_4_9M',
	'id'	=> 'S2_23_4_9M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro9',
);

// vive con usted
$S2_23_5_9 = array(
	'name'	=> 'S2_23_5_9',
	'id'	=> 'S2_23_5_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9',
);
// depende economicamente
$S2_23_6_9 = array(
	'name'	=> 'S2_23_6_9',
	'id'	=> 'S2_23_6_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9',
);
// limitacion
$S2_23_7_9 = array(
	'name'	=> 'S2_23_7_9',
	'id'	=> 'S2_23_7_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9',
);
// ultimo nivel
$S2_23_8_9 = array(
	'name'	=> 'S2_23_8_9',
	'id'	=> 'S2_23_8_9',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro9',
);
// ocupacion actual
$S2_23_9_9 = array(
	'name'	=> 'S2_23_9_9',
	'id'	=> 'S2_23_9_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9 estudia',
);
//institucion n o p
$S2_23_10_9 = array(
	'name'	=> 'S2_23_10_9',
	'id'	=> 'S2_23_10_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9',
);
$S2_23_11_9 = array(
	'name'	=> 'S2_23_11_9',
	'id'	=> 'S2_23_11_9',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro9 hacti',
);
// escuela
$S2_23_11_9_O = array(
	'name'	=> 'S2_23_11_9_O',
	'id'	=> 'S2_23_11_9_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro9 hespe',
);
///////////////////////////fin hijo 9
///////////////////////////hijo 10
// nro orden
$S2_23_1_10 = array(
	'name'	=> 'S2_23_1_10',
	'id'	=> 'S2_23_1_10',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro10',
);
// nombre
$S2_23_2_10 = array(
	'name'	=> 'S2_23_2_10',
	'id'	=> 'S2_23_2_10',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro10',
);
// sexo
$S2_23_3_10 = array(
	'name'	=> 'S2_23_3_10',
	'id'	=> 'S2_23_3_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10',
);
// edad
$S2_23_4_10A = array(
	'name'	=> 'S2_23_4_10A',
	'id'	=> 'S2_23_4_10A',
	'maxlength'	=> 2,
	'class' => $span_class . ' hijo hnro10 hano',
);

// edad
$S2_23_4_10M = array(
	'name'	=> 'S2_23_4_10M',
	'id'	=> 'S2_23_4_10M',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro10',
);
// vive con usted
$S2_23_5_10 = array(
	'name'	=> 'S2_23_5_10',
	'id'	=> 'S2_23_5_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10',
);
// depende economicamente
$S2_23_6_10 = array(
	'name'	=> 'S2_23_6_10',
	'id'	=> 'S2_23_6_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10',
);
// limitacion
$S2_23_7_10 = array(
	'name'	=> 'S2_23_7_10',
	'id'	=> 'S2_23_7_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10',
);
// ultimo nivel
$S2_23_8_10 = array(
	'name'	=> 'S2_23_8_10',
	'id'	=> 'S2_23_8_10',
	'maxlength'	=> 2,
	'class' => $span_class. ' hijo hnro10',
);
// ocupacion actual
$S2_23_9_10 = array(
	'name'	=> 'S2_23_9_10',
	'id'	=> 'S2_23_9_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10 estudia',
);
//institucion n o p
$S2_23_10_10 = array(
	'name'	=> 'S2_23_10_10',
	'id'	=> 'S2_23_10_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10',
);
$S2_23_11_10 = array(
	'name'	=> 'S2_23_11_10',
	'id'	=> 'S2_23_11_10',
	'maxlength'	=> 1,
	'class' => $span_class. ' hijo hnro10 hacti',
);
// escuela
$S2_23_11_10_O = array(
	'name'	=> 'S2_23_11_10_O',
	'id'	=> 'S2_23_11_10_O',
	'maxlength'	=> 100,
	'class' => $span_class. ' hijo hnro10 hespe',
);





/////////////////////////////////
$S2_10_PP_O = array(
	'name'	=> 'S2_10_PP_O',
	'id'	=> 'S2_10_PP_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S2_10_DI_O = array(
	'name'	=> 'S2_10_DI_O',
	'id'	=> 'S2_10_DI_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);

$S2_11_PP_O = array(
	'name'	=> 'S2_11_PP_O',
	'id'	=> 'S2_11_PP_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);

$S2_11_DI_O = array(
	'name'	=> 'S2_11_DI_O',
	'id'	=> 'S2_11_DI_O',
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
									echo form_label('País', 'S2_10_PAIS_COD', $label_class);
								echo '</div>'; 

								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_PAIS_COD', $paisesArray, FALSE,'class="' . $span_class . '" id="S2_10_PAIS_COD"');			
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_PAIS_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 		

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Departamento', 'S2_10_DD_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_DD_COD', $depaxArray, FALSE,'class=" span12" id="S2_10_DD_COD"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_DD_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Provincia', 'S2_10_PP_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_10_PP_COD', $provArray, FALSE,'class="span12" id="S2_10_PP_COD"'); 
									echo form_input($S2_10_PP_O); 
										
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
										echo form_input($S2_10_DI_O);  
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_10_DI_COD') . '</div>';								echo '</div>';	
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
									echo form_label('País', 'S2_11_PAIS_COD', $label_class);
								echo '</div>'; 

								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_11_PAIS_COD', $paisesArray, FALSE,'class="' . $span_class . '" id="S2_11_PAIS_COD"');			
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_11_PAIS_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 		

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Departamento', 'S2_11_DD_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_11_DD_COD', $depaxArray, FALSE,'class=" span12" id="S2_11_DD_COD"'); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error('S2_11_DD_COD') . '</div>';
								echo '</div>';	
							echo '</div>'; 	

							echo '<div class="control-group">';
								echo '<div class="offset1 span3">';	
									echo form_label('Provincia', 'S2_11_PP_COD', $label_class);
								echo '</div>'; 
								echo '<div class="controls span6 offset1">';
										echo form_dropdown('S2_11_PP_COD', $provArray, FALSE,'class="span12" id="S2_11_PP_COD"');
										echo form_input($S2_11_PP_O);  
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
									echo form_input($S2_11_DI_O); 
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
								echo form_label('Grado', $S2_19G['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_19G); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_19G['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Año', $S2_19A['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S2_19A); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S2_19A['name']) . '</div>';
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
						echo '<table class="table table-condensed" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span8"></th>';
					                  echo '<th class="span4"></th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Al cuidado del hogar</td>';
					                  echo '<td>' . form_input($S2_20_1) . '<div class="help-block error">' . form_error($S2_20_1['name']) . '</div></td>';
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Agrícola</td>';
					                  echo '<td>' . form_input($S2_20_2) . '<div class="help-block error">' . form_error($S2_20_2['name']) . '</div></td>';
					               echo '</tr>';  
					               echo '<tr>';
					                  echo '<td>Pecuaria(a)</td>';
					                  echo '<td>' . form_input($S2_20_3) . '<div class="help-block error">' . form_error($S2_20_3['name']) . '</div></td>';
					               echo '</tr>'; 					                					                						               				               					               
					               echo '<tr>';
					                  echo '<td>Acuícola</td>';
					                  echo '<td>' . form_input($S2_20_4) . '<div class="help-block error">' . form_error($S2_20_4['name']) . '</div></td>';
					               echo '</tr>'; 	
					               echo '<tr>';
					               echo '<td>Pesca</td>';
					                  echo '<td>' . form_input($S2_20_5) . '<div class="help-block error">' . form_error($S2_20_5['name']) . '</div></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					               echo '<td>Caza</td>';
					                  echo '<td>' . form_input($S2_20_6) . '<div class="help-block error">' . form_error($S2_20_6['name']) . '</div></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					               echo '<td>Construcción</td>';
					                  echo '<td>' . form_input($S2_20_7) . '<div class="help-block error">' . form_error($S2_20_7['name']) . '</div></td>';
					               echo '</tr>'; 		
					               echo '<tr>';
					               echo '<td>Comercio</td>';
					                  echo '<td>' . form_input($S2_20_8) . '<div class="help-block error">' . form_error($S2_20_8['name']) . '</div></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					               echo '<td>' . form_input($S2_20_9_O) . '<div class="help-block error">' . form_error($S2_20_9_O['name']) . '</div></td>';
					                  echo '<td>' . form_input($S2_20_9) . '<div class="help-block error">' . form_error($S2_20_9['name']) . '</div></td>';
					               echo '</tr>'; 							               				               					               					               				               					               				               						               			               
			              echo '</tbody>';
			            echo '</table>';	
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
                  echo '<th class="span2" colspan="2">23.11 Actualmente ¿A qué actividad se dedica?</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_1) . '<div class="help-block error">' . form_error($S2_23_1_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_1) . '<div class="help-block error">' . form_error($S2_23_2_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_1) . '<div class="help-block error">' . form_error($S2_23_3_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_1A) . '<div class="help-block error">' . form_error($S2_23_4_1A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_1M) . '<div class="help-block error">' . form_error($S2_23_4_1M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_1) . '<div class="help-block error">' . form_error($S2_23_5_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_1) . '<div class="help-block error">' . form_error($S2_23_6_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_1) . '<div class="help-block error">' . form_error($S2_23_7_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_1) . '<div class="help-block error">' . form_error($S2_23_8_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_1) . '<div class="help-block error">' . form_error($S2_23_9_1['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_10_1) . '<div class="help-block error">' . form_error($S2_23_10_1['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_1) . '<div class="help-block error">' . form_error($S2_23_11_1['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_1_O) . '<div class="help-block error">' . form_error($S2_23_11_1_O['name']) . '</div></td>';                                    
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_2) . '<div class="help-block error">' . form_error($S2_23_1_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_2) . '<div class="help-block error">' . form_error($S2_23_2_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_2) . '<div class="help-block error">' . form_error($S2_23_3_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_2A) . '<div class="help-block error">' . form_error($S2_23_4_2A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_2M) . '<div class="help-block error">' . form_error($S2_23_4_2M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_2) . '<div class="help-block error">' . form_error($S2_23_5_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_2) . '<div class="help-block error">' . form_error($S2_23_6_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_2) . '<div class="help-block error">' . form_error($S2_23_7_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_2) . '<div class="help-block error">' . form_error($S2_23_8_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_2) . '<div class="help-block error">' . form_error($S2_23_9_2['name']) . '</div></td>';  
                  echo '<td>' . form_input($S2_23_10_2) . '<div class="help-block error">' . form_error($S2_23_10_2['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_2) . '<div class="help-block error">' . form_error($S2_23_11_2['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_2_O) . '<div class="help-block error">' . form_error($S2_23_11_2_O['name']) . '</div></td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_3) . '<div class="help-block error">' . form_error($S2_23_1_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_3) . '<div class="help-block error">' . form_error($S2_23_2_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_3) . '<div class="help-block error">' . form_error($S2_23_3_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_3A) . '<div class="help-block error">' . form_error($S2_23_4_3A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_3M) . '<div class="help-block error">' . form_error($S2_23_4_3M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_3) . '<div class="help-block error">' . form_error($S2_23_5_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_3) . '<div class="help-block error">' . form_error($S2_23_6_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_3) . '<div class="help-block error">' . form_error($S2_23_7_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_3) . '<div class="help-block error">' . form_error($S2_23_8_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_3) . '<div class="help-block error">' . form_error($S2_23_9_3['name']) . '</div></td>';      
                  echo '<td>' . form_input($S2_23_10_3) . '<div class="help-block error">' . form_error($S2_23_10_3['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_3) . '<div class="help-block error">' . form_error($S2_23_11_3['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_3_O) . '<div class="help-block error">' . form_error($S2_23_11_3_O['name']) . '</div></td>';                                                       
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_4) . '<div class="help-block error">' . form_error($S2_23_1_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_4) . '<div class="help-block error">' . form_error($S2_23_2_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_4) . '<div class="help-block error">' . form_error($S2_23_3_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_4A) . '<div class="help-block error">' . form_error($S2_23_4_4A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_4M) . '<div class="help-block error">' . form_error($S2_23_4_4M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_4) . '<div class="help-block error">' . form_error($S2_23_5_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_4) . '<div class="help-block error">' . form_error($S2_23_6_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_4) . '<div class="help-block error">' . form_error($S2_23_7_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_4) . '<div class="help-block error">' . form_error($S2_23_8_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_4) . '<div class="help-block error">' . form_error($S2_23_9_4['name']) . '</div></td>';   
                  echo '<td>' . form_input($S2_23_10_4) . '<div class="help-block error">' . form_error($S2_23_10_4['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_4) . '<div class="help-block error">' . form_error($S2_23_11_4['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_4_O) . '<div class="help-block error">' . form_error($S2_23_11_4_O['name']) . '</div></td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_5) . '<div class="help-block error">' . form_error($S2_23_1_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_5) . '<div class="help-block error">' . form_error($S2_23_2_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_5) . '<div class="help-block error">' . form_error($S2_23_3_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_5A) . '<div class="help-block error">' . form_error($S2_23_4_5A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_5M) . '<div class="help-block error">' . form_error($S2_23_4_5M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_5) . '<div class="help-block error">' . form_error($S2_23_5_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_5) . '<div class="help-block error">' . form_error($S2_23_6_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_5) . '<div class="help-block error">' . form_error($S2_23_7_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_5) . '<div class="help-block error">' . form_error($S2_23_8_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_5) . '<div class="help-block error">' . form_error($S2_23_9_5['name']) . '</div></td>';   
                  echo '<td>' . form_input($S2_23_10_5) . '<div class="help-block error">' . form_error($S2_23_10_5['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_5) . '<div class="help-block error">' . form_error($S2_23_11_5['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_5_O) . '<div class="help-block error">' . form_error($S2_23_11_5_O['name']) . '</div></td>';                                                      
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_6) . '<div class="help-block error">' . form_error($S2_23_1_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_6) . '<div class="help-block error">' . form_error($S2_23_2_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_6) . '<div class="help-block error">' . form_error($S2_23_3_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_6A) . '<div class="help-block error">' . form_error($S2_23_4_6A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_6M) . '<div class="help-block error">' . form_error($S2_23_4_6M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_6) . '<div class="help-block error">' . form_error($S2_23_5_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_6) . '<div class="help-block error">' . form_error($S2_23_6_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_6) . '<div class="help-block error">' . form_error($S2_23_7_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_6) . '<div class="help-block error">' . form_error($S2_23_8_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_6) . '<div class="help-block error">' . form_error($S2_23_9_6['name']) . '</div></td>';   
                  echo '<td>' . form_input($S2_23_10_6) . '<div class="help-block error">' . form_error($S2_23_10_6['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_6) . '<div class="help-block error">' . form_error($S2_23_11_6['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_6_O) . '<div class="help-block error">' . form_error($S2_23_11_6_O['name']) . '</div></td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_7) . '<div class="help-block error">' . form_error($S2_23_1_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_7) . '<div class="help-block error">' . form_error($S2_23_2_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_7) . '<div class="help-block error">' . form_error($S2_23_3_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_7A) . '<div class="help-block error">' . form_error($S2_23_4_7A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_7M) . '<div class="help-block error">' . form_error($S2_23_4_7M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_7) . '<div class="help-block error">' . form_error($S2_23_5_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_7) . '<div class="help-block error">' . form_error($S2_23_6_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_7) . '<div class="help-block error">' . form_error($S2_23_7_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_7) . '<div class="help-block error">' . form_error($S2_23_8_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_7) . '<div class="help-block error">' . form_error($S2_23_9_7['name']) . '</div></td>';      
                  echo '<td>' . form_input($S2_23_10_7) . '<div class="help-block error">' . form_error($S2_23_10_7['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_7) . '<div class="help-block error">' . form_error($S2_23_11_7['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_7_O) . '<div class="help-block error">' . form_error($S2_23_11_7_O['name']) . '</div></td>';                                                      
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_8) . '<div class="help-block error">' . form_error($S2_23_1_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_8) . '<div class="help-block error">' . form_error($S2_23_2_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_8) . '<div class="help-block error">' . form_error($S2_23_3_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_8A) . '<div class="help-block error">' . form_error($S2_23_4_8A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_8M) . '<div class="help-block error">' . form_error($S2_23_4_8M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_8) . '<div class="help-block error">' . form_error($S2_23_5_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_8) . '<div class="help-block error">' . form_error($S2_23_6_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_8) . '<div class="help-block error">' . form_error($S2_23_7_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_8) . '<div class="help-block error">' . form_error($S2_23_8_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_8) . '<div class="help-block error">' . form_error($S2_23_9_8['name']) . '</div></td>';   
                  echo '<td>' . form_input($S2_23_10_8) . '<div class="help-block error">' . form_error($S2_23_10_8['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_8) . '<div class="help-block error">' . form_error($S2_23_11_8['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_8_O) . '<div class="help-block error">' . form_error($S2_23_11_8_O['name']) . '</div></td>';                         
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_9) . '<div class="help-block error">' . form_error($S2_23_1_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_9) . '<div class="help-block error">' . form_error($S2_23_2_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_9) . '<div class="help-block error">' . form_error($S2_23_3_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_9A) . '<div class="help-block error">' . form_error($S2_23_4_9A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_9M) . '<div class="help-block error">' . form_error($S2_23_4_9M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_9) . '<div class="help-block error">' . form_error($S2_23_5_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_9) . '<div class="help-block error">' . form_error($S2_23_6_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_9) . '<div class="help-block error">' . form_error($S2_23_7_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_9) . '<div class="help-block error">' . form_error($S2_23_8_9['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_9) . '<div class="help-block error">' . form_error($S2_23_9_9['name']) . '</div></td>';       
                  echo '<td>' . form_input($S2_23_10_9) . '<div class="help-block error">' . form_error($S2_23_10_9['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_9) . '<div class="help-block error">' . form_error($S2_23_11_9['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_9_O) . '<div class="help-block error">' . form_error($S2_23_11_9_O['name']) . '</div></td>';                                                  
                echo '</tr>';
                echo '<tr>';
                  echo '<td>' . form_input($S2_23_1_10) . '<div class="help-block error">' . form_error($S2_23_1_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_2_10) . '<div class="help-block error">' . form_error($S2_23_2_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_3_10) . '<div class="help-block error">' . form_error($S2_23_3_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_10A) . '<div class="help-block error">' . form_error($S2_23_4_10A['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_4_10M) . '<div class="help-block error">' . form_error($S2_23_4_10M['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_5_10) . '<div class="help-block error">' . form_error($S2_23_5_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_6_10) . '<div class="help-block error">' . form_error($S2_23_6_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_7_10) . '<div class="help-block error">' . form_error($S2_23_7_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_8_10) . '<div class="help-block error">' . form_error($S2_23_8_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S2_23_9_10) . '<div class="help-block error">' . form_error($S2_23_9_10['name']) . '</div></td>';  
                  echo '<td>' . form_input($S2_23_10_10) . '<div class="help-block error">' . form_error($S2_23_10_10['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_10) . '<div class="help-block error">' . form_error($S2_23_11_10['name']) . '</div></td>';                                    
                  echo '<td>' . form_input($S2_23_11_10_O) . '<div class="help-block error">' . form_error($S2_23_11_10_O['name']) . '</div></td>';                         
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
$("#S2_10_DD_COD, #S2_11_DD_COD, #departamento3").change(function(event) {
        var sel = null;
        switch(event.target.id){
            case 'S2_10_DD_COD':
                sel = $("#S2_10_PP_COD");
                break;
            case 'S2_11_DD_COD':
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
                dep = $("#S2_10_DD_COD");
                break;
            case 'S2_11_PP_COD':
                sel = $("#S2_11_DI_COD");
                dep = $("#S2_11_DD_COD");
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

//grado 12
$('#S2_12').change(function() {
	var s2p12g = $('#S2_12G');
	var s2p12a = $('#S2_12A');
	var th = $(this).val();
	if( th == 3 ){	
		s2p12g.removeAttr('disabled');
		s2p12a.removeAttr('disabled');
	}else if( th == 4 ){
		s2p12g.val('')
		s2p12g.attr("disabled", "disabled"); 
		s2p12a.removeAttr('disabled');
	}else{
		s2p12g.val('')
		s2p12g.attr("disabled", "disabled"); 	
		s2p12a.val('')
		s2p12a.attr("disabled", "disabled"); 			
	}
});

//especifique 14
$('#S2_14_7').change(function() {
	var s2p14o = $('#S2_14_7_O');
	var th = $(this).val();
	if( th == 1 ){
		s2p14o.removeAttr('disabled');
	}else{
		s2p14o.val('')
		s2p14o.attr("disabled", "disabled"); 
	}	
});


//especifique 17
$('#S2_17_8').change(function() {
	var s2p14o = $('#S2_17_8_O');
	var th = $(this).val();
	if( th == 1 ){
		s2p14o.removeAttr('disabled');
	}else{
		s2p14o.val('')
		s2p14o.attr("disabled", "disabled"); 
	}	
});



//especifique por que pescador
$('#S2_15').change(function() {
	var s2p15o = $('#S2_15_O');
	var th = $(this).val();
	if( th == 4 ){
		s2p15o.removeAttr('disabled');
	}else{
		s2p15o.val('')
		s2p15o.attr("disabled", "disabled"); 
	}	
});

//Desactiva los datos de su conyuge
$('#S2_18').change(function() {
	var preg19 = $('#S2_19, #S2_19G, #S2_19A');
	var preg20 = $('#S2_20_1, #S2_20_2, #S2_20_3, #S2_20_3, #S2_20_4, #S2_20_5, #S2_20_6, #S2_20_7, #S2_20_8, #S2_20_9, #S2_20_9_O');
	var th = $(this).val();
	if( th == 3 || th == 4 || th == 5 || th == 6 || th == 9){
		preg19.val('')
		preg19.attr("disabled", "disabled"); 
		preg20.val('')
		preg20.attr("disabled", "disabled"); 
	}else{
		preg19.removeAttr('disabled');
		preg20.removeAttr('disabled');
	}
});

//grado conyuge
$('#S2_19').change(function() {
	var s2p19g = $('#S2_19G');
	var s2p19a = $('#S2_19A');
	var th = $(this).val();
	if( th == 3 ){	
		s2p19g.removeAttr('disabled');
		s2p19a.removeAttr('disabled');
	}else if( th == 4 ){
		s2p19g.val('')
		s2p19g.attr("disabled", "disabled"); 
		s2p19a.removeAttr('disabled');
	}else{
		s2p19g.val('')
		s2p19g.attr("disabled", "disabled"); 	
		s2p19a.val('')
		s2p19a.attr("disabled", "disabled"); 			
	}
});

//No tiene hijos
$('#S2_21').change(function() {
	var preg22 = $('#S2_22');
	var preg23 = $('.hijo');
	var th = $(this).val();
	if( th == 2 || th == 9){
		preg22.val('')
		preg22.attr("disabled", "disabled"); 
		preg23.val('')
		preg23.attr("disabled", "disabled"); 
	}else{
		preg22.removeAttr('disabled');
		preg23.removeAttr('disabled');
	}
});

//cuantos hijos
$('#S2_22').change(function() {
	$('.hijo').removeAttr('disabled');
	var emp = parseInt($(this).val()) + 1;
	for(var i = emp; i <= 10; i++){
		$('.hnro' + i).val('');
		$('.hnro' + i).attr("disabled", "disabled"); 
	}
	for(var j = 0; j <= $(this).val();j++ ){
		$('#S2_23_4_' + j + 'A').trigger('change');
		$('#S2_23_9_' + j).trigger('change');
	}

});


//año hijos
$('.hano').change(function() {

	var pre = $(this).attr('id');
	var npreg = pre.substring(8,9);
	var at = pre.substring(0,9);

	if($(this).val() == 0 && $(this).val() !=''){
		$('#' + at + 'M').removeAttr('disabled');
	}else{
		$('#' + at + 'M').val('');
		$('#' + at + 'M').attr("disabled", "disabled"); 	
	}


	var pregmayores3 = $('#S2_23_8_' + npreg + ', #S2_23_9_'+ npreg + ', #S2_23_10_' + npreg);
	if($(this).val() >= 3){
		pregmayores3.removeAttr('disabled');
	}else{
		pregmayores3.val('')
		pregmayores3.attr("disabled", "disabled"); 	
	}

	var pregmayores14 = $('#S2_23_11_' + npreg + ', #S2_23_11_'+ npreg + '_O');
	if($(this).val() >= 14){
		pregmayores14.removeAttr('disabled');
	}else{
		pregmayores14.val('')
		pregmayores14.attr("disabled", "disabled"); 	
	}
});


//Estudia hijo?
$('.estudia').change(function() {
	var pre = $(this).attr('id');
	var npreg = pre.substring(8,9);
	if($(this).val() == 1){
		$('#S2_23_10_' + npreg).removeAttr('disabled');
	}else{
		$('#S2_23_10_' + npreg).val('');
		$('#S2_23_10_' + npreg).attr("disabled", "disabled"); 
	}
});

//actividad hijo
$('.hacti').change(function() {
	var pre = $(this).attr('id');
	var npreg = pre.substring(9,10);
	if($(this).val() == 8){
		$('#S2_23_11_' + npreg + '_O').removeAttr('disabled');
	}else{
		$('#S2_23_11_' + npreg + '_O').val('');
		$('#S2_23_11_' + npreg + '_O').attr("disabled", "disabled"); 		
	}
});



$('#S2_10_PAIS_COD').change(function() {
    var ug = $('#S2_10_DD_COD, #S2_10_PP_COD, #S2_10_DI_COD');
    var ugo = $('#S2_10_PP_O, #S2_10_DI_O');
    if($(this).val() == 124){
        ug.removeAttr('disabled');
        ugo.removeAttr('disabled');
    }else{
        ug.val(-1);
		ug.attr("disabled", "disabled");  
		ugo.val('');     
		ugo.attr("disabled", "disabled"); 		      
    }
});

$('#S2_11_PAIS_COD').change(function() {
    var ug = $('#S2_11_DD_COD, #S2_11_PP_COD, #S2_11_DI_COD');
    var ugo = $('#S2_11_PP_O, #S2_11_DI_O'); 
    if($(this).val() == 124){
        ug.removeAttr('disabled');
        ugo.removeAttr('disabled');
    }else{
        ug.val(-1);
		ug.attr("disabled", "disabled");   
		ugo.val('');     
		ugo.attr("disabled", "disabled");  
    }
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//Campos deshabilitados
//COMBOS SECCION 2
 $('#S2_10_DD_COD, #S2_10_PP_COD, #S2_10_DI_COD, #S2_10_PP_O, #S2_10_DI_O').attr("disabled", "disabled");
 $('#S2_11_DD_COD, #S2_11_PP_COD, #S2_11_DI_COD, #S2_11_PP_O, #S2_11_DI_O').attr("disabled", "disabled");

$('#S2_14_7_O').attr("disabled", "disabled");
$('#S2_15_O').attr("disabled", "disabled");
$('#S2_17_8_O').attr("disabled", "disabled");
$('.hespe').attr("disabled", "disabled");

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

	// $("#seccion2").on("submit", false); 

	// $("#seccion2 :submit").on("click", function(event) {
	// 	$('#seccion6').trigger('validate');
 // 	}); 
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
     range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
	 $("#seccion2").validate({
		    rules: {   

			    S2_1_AP: {
			            required: true,
			            validName: true,
			         },     
		        S2_1_AM:{
		            required: true,
		            validName:true,
		            maxlength: 80, 
		         },  	
		        S2_2D:{
		            required: true,
		            exactlength: 2,
		            digits: true, 
		            valdia:true,
		         },  	
		        S2_2M:{
		            required: true,
		            exactlength: 2,
		            digits: true, 
		            valmes:true,
		         },  	
		        S2_2A:{
		            required: true,
		            exactlength: 4,
		            digits: true, 
		            valrango: [1930,2000,9999],
		         },  
		        S2_3:{
		        	required: true,
		            range: [1,2],
		            digits: true, 
		         },  	
		        S2_4:{
		            digits:true,
		            valrango: [1,99999998,99999999],
		            exactlength: 8, 
		         },  
		        S2_4_DD:{
		            digits:true,
		            valrango: [1,99999998,99999999],
		            exactlength: 8, 
		            equalTo: "#S2_4",
		         },  		         
		        S2_5:{
		            digits:true,
		           valrango: [10000000001,20999999999,99999999999],
		            exactlength: 11, 
		         },  	
		        S2_5_DD:{
		            digits:true,
		            valrango: [10000000001,20999999999,99999999999],
		            exactlength: 11, 
		            equalTo: "#S2_5",
		         },  		         
		        S2_6:{
		        	required:true,
		            digits:true,
		            range:[900000000,999999998],
		            exactlength: 9, 
		         },  		         	         
		        S2_7:{
		        	required:true,
		            digits:true,
		            range:[200000,8999999],
		            exactlength: 7, 
		         },  		      
		        S2_8:{
		            email: true,
		         }, 	
		        S2_9_DD_COD:{
           			valueNotEquals: -1,
		         }, 		
		        S2_9_PP_COD:{
           			valueNotEquals: -1,
		         }, 			
		        S2_9_DI_COD:{
           			valueNotEquals: -1,
		         }, 	
		        S2_9_CCPP_COD:{
           			valueNotEquals: -1,
		         }, 	

		        S2_10_PAIS_COD:{
           			valueNotEquals: -1,
		         }, 
		        S2_10_DD_COD:{
           			valueNotEquals: -1,
		         }, 
		        S2_10_PP_COD:{
           			valueNotEquals: -1,
		         }, 
		        S2_10_DI_COD:{
           			valueNotEquals: -1,
		         }, 

		        S2_11_PAIS_COD:{
           			valueNotEquals: -1,
		         }, 
		        S2_11_DD_COD:{
           			valueNotEquals: -1,
		         }, 
		        S2_11_PP_COD:{
           			valueNotEquals: -1,
		         }, 
		        S2_11_DI_COD:{
           			valueNotEquals: -1,
		         }, 


		        TIPVIA:{
		        	required:true,
		            digits:true,
		            range:[1,8],
		         }, 
		        NOMVIA:{
		        	required:true,
		            maxlength: 50, 
		         }, 		
		        PTANUM:{
		            maxlength: 4,
		         },
		        BLOCK:{
		            maxlength: 4, 
		         }, 	
		        INT:{
		            maxlength: 4, 
		         }, 		
		        PISO:{
		            maxlength: 4, 
		         }, 
		        MZ:{
		            maxlength: 4, 
		         }, 
		        LOTE:{
		            maxlength: 4, 
		         }, 		        
		        KM:{
		            digits:true,
		            range:[1,1000],
		            maxlength: 4, 
		         }, 	
		        S2_12:{
		            digits:true,
		            valrango: [1,8,9],
		         }, 	
		        S2_12G:{
		            digits:true,
		            valrango: [1,6,9],
		         }, 	
		        S2_12A:{
		            digits:true,
		            valrango: [0,5,9],
		         }, 
		        S2_13:{
		            digits:true,
		            valrango: [1,2,9],
		         }, 
		        S2_14_1:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 		
		        S2_14_2:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_14_3:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_14_4:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_14_5:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_14_6:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_14_7:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_14_7_O:{
					maxlength: 100, 
		         }, 	
		        S2_14_8:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 		
		        S2_15:{
		            digits:true,
		            valrango: [1,4,9],
		         }, 	
		        S2_15_O:{
					maxlength: 100, 
		         }, 	
		        S2_16:{
		            digits:true,
		            valrango: [1,4,9],
		         }, 	
		        S2_17_1:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_17_2:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_17_3:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_17_4:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_17_5:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 		
		        S2_17_6:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 		

		        S2_17_7:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_17_8:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_17_8_O:{
					maxlength: 100, 
		         },
		        S2_17_9:{
		            digits:true,
		           valrango: [0,1,9],
		         }, 	
		        S2_18:{
		           valueNotEquals:-1,
		           range: [1,6],
		         }, 
		        S2_19:{
		            digits:true,
		            valrango: [1,8,9],
		         }, 	
		        S2_19G:{
		            digits:true,
		            valrango: [1,6,9],
		         }, 
		        S2_19A:{
		            digits:true,
		            valrango: [0,5,9],
		         }, 	
		        S2_20_1:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_20_2:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_20_3:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_20_4:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 		
		        S2_20_5:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_20_6:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_20_7:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 
		        S2_20_8:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_20_9:{
		            digits:true,
		            valrango: [0,1,9],
		         }, 	
		        S2_20_9_O:{
					maxlength: 100, 
		         },		
		        S2_21:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_22:{
		            digits:true,
		            valrango: [1,10,99],
		         },			  
//hijo1
		        S2_23_1_1:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_1:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_1:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_1A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_1M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_1:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_1:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_1:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_1:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_1:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_1:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_1:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_1_O:{
 					maxlength:100,
		         },	
//end hijo1	
//hijo2
		        S2_23_1_2:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_2:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_2:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_2A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_2M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_2:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_2:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_2:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_2:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_2:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_2:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_2:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_2_O:{
 					maxlength:100,
		         },	
//end hijo2
//hijo3
		        S2_23_1_3:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_3:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_3:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_3A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_3M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_3:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_3:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_3:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_3:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_3:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_3:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_3:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_3_O:{
 					maxlength:100,
		         },	
//end hijo3
//hijo4
		        S2_23_1_4:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_4:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_4:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_4A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_4M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_4:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_4:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_4:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_4:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_4:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_4:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_4:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_4_O:{
 					maxlength:100,
		         },	
//end hijo4	   
//hijo5
		        S2_23_1_5:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_5:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_5:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_5A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_5M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_5:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_5:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_5:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_5:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_5:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_5:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_5:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_5_O:{
 					maxlength:100,
		         },	
//end hijo5	 
//hijo6
		        S2_23_1_6:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_6:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_6:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_6A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_6M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_6:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_6:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_6:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_6:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_6:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_6:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_6:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_6_O:{
 					maxlength:100,
		         },	
//end hijo6 
//hijo7
		        S2_23_1_7:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_7:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_7:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_7A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_7M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_7:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_7:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_7:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_7:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_7:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_7:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_7:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_7_O:{
 					maxlength:100,
		         },	
//end hijo7 
//hijo8
		        S2_23_1_8:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_8:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_8:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_8A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_8M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_8:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_8:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_8:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_8:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_8:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_8:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_8:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_8_O:{
 					maxlength:100,
		         },	
//end hijo8 
//hijo9
		        S2_23_1_9:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_9:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_9:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_9A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_9M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_9:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_9:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_9:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_9:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_9:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_9:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_9:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_9_O:{
 					maxlength:100,
		         },	
//end hijo9 
//hijo10
		        S2_23_1_10:{
		            digits:true,
		            valrango: [1,10,99],
		         },	
		        S2_23_2_10:{
		            validName: true,
		            maxlength:100,
		         },	
		        S2_23_3_10:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_4_10A:{
		            number:true,
		            valrango: [0,98,99],
		         },		
		        S2_23_4_10M:{
		            digits:true,
		            valrango: [1,11,99],
		         },		
		        S2_23_5_10:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_6_10:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_7_10:{
		            digits:true,
		           valrango: [1,2,9],
		         },	
		        S2_23_8_10:{
		            digits:true,
		           valrango: [1,10,99],
		         },		
		        S2_23_9_10:{
		            digits:true,
		            valrango: [1,2,9],
		         },		
		        S2_23_10_10:{
		            digits:true,
		            valrango: [1,2,9],
		         },	
		        S2_23_11_10:{
		            digits:true,
		             valrango: [1,8,9],
		         },			         
		        S2_23_11_10_O:{
 					maxlength:100,
		         },	
//end hijo9 	    	         		         		         	         	         		         		         		         	         	         	         
			//FIN RULES
		    },

		    messages: {   
		        S2_1_AP: {
		            required: "Ingresa Ap. paterno",
		         },    
		        S2_1_AM: {
		            required: "Ingresa Ap. materno",
		         },  
		        S2_2D: {
		            required: "Ingresa día",
		         }, 		
		        S2_2M: {
		            required: "Ingresa mes",
		         }, 
		        S2_2A: {
		            required: "Ingresa año",
		         }, 		
		        S2_4_DD:{
		            equalTo: "No coinciden los DNI",
		         },  	
		        S2_5_DD:{
		            equalTo: "No coinciden los RUC",
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
			        {name: 'S2_10_PAIS',value:$('#S2_10_PAIS_COD :selected').text()},	
			        {name: 'S2_10_DD',value:$('#S2_10_DD_COD :selected').text()},		        
			        {name: 'S2_10_PP',value:$('#S2_10_PP_COD :selected').text()},
			        {name: 'S2_10_DI',value:$('#S2_10_DI_COD :selected').text()},
			        {name: 'S2_11_PAIS',value:$('#S2_11_PAIS_COD :selected').text()},	
			        {name: 'S2_11_DD',value:$('#S2_11_DD_COD :selected').text()},		   
			        {name: 'S2_11_PP',value:$('#S2_11_PP_COD :selected').text()},
			        {name: 'S2_11_DI',value:$('#S2_11_DI_COD :selected').text()},
			        {name: 'pescador_id',value:$("input[name='pescador_id']").val()}      
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
		        // bsub2.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/pesc_seccion2",
		            type:'POST',
		            data:seccion2_data,
		            dataType:'json',
		            success:function(json){
						alert(json.msg);
						$('#pesca_dor').trigger('submit');
		            }
		        });     
		          	
		    }       
		});



		

		
 }); 
</script>