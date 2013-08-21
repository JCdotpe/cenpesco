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

		$depaxArray = array(-1 =>'-');
		foreach($departamentos->result() as $filas)
		{
			$depaxArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
		}
		$ubidepaArray = array(-1 => ' -');
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}		
$provArray = array(-1 => ' -'); 
$distArray = array(-1 => ' -'); 
$ccppArray = array(-1 => ' -');

$S5_2_PP_O = array(
	'name'	=> 'S5_2_PP_O',
	'id'	=> 'S5_2_PP_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_2_DI_O = array(
	'name'	=> 'S5_2_DI_O',
	'id'	=> 'S5_2_DI_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_2_CCPP_O = array(
	'name'	=> 'S5_2_CCPP_O',
	'id'	=> 'S5_2_CCPP_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//SECCION 5
//rio
$S5_1_1 = array(
	'name'	=> 'S5_1_1',
	'id'	=> 'S5_1_1',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//q rio
$S5_1_1_1 = array(
	'name'	=> 'S5_1_1_1',
	'id'	=> 'S5_1_1_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);
//lago
$S5_1_2 = array(
	'name'	=> 'S5_1_2',
	'id'	=> 'S5_1_2',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//q lago
$S5_1_2_1 = array(
	'name'	=> 'S5_1_2_1',
	'id'	=> 'S5_1_2_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//laguna
$S5_1_3 = array(
	'name'	=> 'S5_1_3',
	'id'	=> 'S5_1_3',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//qlaguna
$S5_1_3_1 = array(
	'name'	=> 'S5_1_3_1',
	'id'	=> 'S5_1_3_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);

// //aguas sub
// $S5_1_4 = array(
// 	'name'	=> 'S5_1_4',
// 	'id'	=> 'S5_1_4',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );
// //qaguas sub
// $S5_1_4_1 = array(
// 	'name'	=> 'S5_1_4_1',
// 	'id'	=> 'S5_1_4_1',
// 	'maxlength'	=> 50,
// 	'class' => $span_class,
// );

//marisma
$S5_1_4 = array(
	'name'	=> 'S5_1_4',
	'id'	=> 'S5_1_4',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//qmarisma
$S5_1_4_1 = array(
	'name'	=> 'S5_1_4_1',
	'id'	=> 'S5_1_4_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//quebrada
$S5_1_5 = array(
	'name'	=> 'S5_1_5',
	'id'	=> 'S5_1_5',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//qquebrada
$S5_1_5_1 = array(
	'name'	=> 'S5_1_5_1',
	'id'	=> 'S5_1_5_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);

// //desh
// $S5_1_6 = array(
// 	'name'	=> 'S5_1_7',
// 	'id'	=> 'S5_1_7',
// 	'maxlength'	=> 1,
// 	'class' => $span_class,
// );
// //qdesh
// $S5_1_6_1 = array(
// 	'name'	=> 'S5_1_7_1',
// 	'id'	=> 'S5_1_7_1',
// 	'maxlength'	=> 50,
// 	'class' => $span_class,
// );

//cocha
$S5_1_6 = array(
	'name'	=> 'S5_1_6',
	'id'	=> 'S5_1_6',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//qcocha
$S5_1_6_1 = array(
	'name'	=> 'S5_1_6_1',
	'id'	=> 'S5_1_6_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//reserv
$S5_1_7 = array(
	'name'	=> 'S5_1_7',
	'id'	=> 'S5_1_7',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);
//reserv
$S5_1_7_1 = array(
	'name'	=> 'S5_1_7_1',
	'id'	=> 'S5_1_7_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//otro
$S5_1_8 = array(
	'name'	=> 'S5_1_8',
	'id'	=> 'S5_1_8',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg1',
);

//otro especifique
$S5_1_8_O = array(
	'name'	=> 'S5_1_8_O',
	'id'	=> 'S5_1_8_O',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//nombre otro
$S5_1_8_1 = array(
	'name'	=> 'S5_1_8_1',
	'id'	=> 'S5_1_8_1',
	'maxlength'	=> 50,
	'class' => $span_class,
);


//agallera
$S5_2_1 = array(
	'name'	=> 'S5_2_1',
	'id'	=> 'S5_2_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//trasma
$S5_2_2 = array(
	'name'	=> 'S5_2_2',
	'id'	=> 'S5_2_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Paichetera
$S5_2_3 = array(
	'name'	=> 'S5_2_3',
	'id'	=> 'S5_2_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Gamitanera
$S5_2_4 = array(
	'name'	=> 'S5_2_4',
	'id'	=> 'S5_2_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Otro
$S5_2_5 = array(
	'name'	=> 'S5_2_5',
	'id'	=> 'S5_2_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Otro especifique
$S5_2_5_O = array(
	'name'	=> 'S5_2_5_O',
	'id'	=> 'S5_2_5_O',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//Hondera
$S5_2_6 = array(
	'name'	=> 'S5_2_6',
	'id'	=> 'S5_2_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//Tarrafa
$S5_2_7 = array(
	'name'	=> 'S5_2_7',
	'id'	=> 'S5_2_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Arrastradora
$S5_2_8 = array(
	'name'	=> 'S5_2_8',
	'id'	=> 'S5_2_8',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Capiccahuana
$S5_2_9 = array(
	'name'	=> 'S5_2_9',
	'id'	=> 'S5_2_9',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Chinchorros
$S5_2_10 = array(
	'name'	=> 'S5_2_10',
	'id'	=> 'S5_2_10',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Aissaccahuana
$S5_2_11 = array(
	'name'	=> 'S5_2_11',
	'id'	=> 'S5_2_11',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//otro
$S5_2_12 = array(
	'name'	=> 'S5_2_12',
	'id'	=> 'S5_2_12',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//otro especifique
$S5_2_12_O = array(
	'name'	=> 'S5_2_12_O',
	'id'	=> 'S5_2_12_O',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//Lineas de anzuelos
$S5_2_13 = array(
	'name'	=> 'S5_2_13',
	'id'	=> 'S5_2_13',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Lineas de anzuelos
$S5_2_14 = array(
	'name'	=> 'S5_2_14',
	'id'	=> 'S5_2_14',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Farfa
$S5_2_15 = array(
	'name'	=> 'S5_2_15',
	'id'	=> 'S5_2_15',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Espineles
$S5_2_16 = array(
	'name'	=> 'S5_2_16',
	'id'	=> 'S5_2_16',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//otro
$S5_2_17 = array(
	'name'	=> 'S5_2_17',
	'id'	=> 'S5_2_17',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//otro espec
$S5_2_17_O = array(
	'name'	=> 'S5_2_17_O',
	'id'	=> 'S5_2_17_O',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//Nasas
$S5_2_18 = array(
	'name'	=> 'S5_2_18',
	'id'	=> 'S5_2_18',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//Tapajes
$S5_2_19 = array(
	'name'	=> 'S5_2_19',
	'id'	=> 'S5_2_19',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Tramperos
$S5_2_20 = array(
	'name'	=> 'S5_2_20',
	'id'	=> 'S5_2_20',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Otro
$S5_2_21 = array(
	'name'	=> 'S5_2_21',
	'id'	=> 'S5_2_21',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Otro especifique
$S5_2_21_O = array(
	'name'	=> 'S5_2_21_O',
	'id'	=> 'S5_2_21_O',
	'maxlength'	=> 50,
	'class' => $span_class,
);

//
$S5_3 = array(
	'name'	=> 'S5_3',
	'id'	=> 'S5_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//horas
$S5_3_H = array(
	'name'	=> 'S5_3_H',
	'id'	=> 'S5_3_H',
	'maxlength'	=> 2,
	'class' => $span_class,
);
//minitos
$S5_3_M = array(
	'name'	=> 'S5_3_M',
	'id'	=> 'S5_3_M',
	'maxlength'	=> 2,
	'class' => $span_class,
);


//
$S5_4 = array(
	'name'	=> 'S5_4',
	'id'	=> 'S5_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//horas
$S5_4_H = array(
	'name'	=> 'S5_4_H',
	'id'	=> 'S5_4_H',
	'maxlength'	=> 2,
	'class' => $span_class,
);
//minutos
$S5_4_M = array(
	'name'	=> 'S5_4_M',
	'id'	=> 'S5_4_M',
	'maxlength'	=> 2,
	'class' => $span_class,
);



/////////////////////////////////////
//agallera
$S5_5_1 = array(
	'name'	=> 'S5_5_1',
	'id'	=> 'S5_5_1',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//agallera c
$S5_5_1_C = array(
	'name'	=> 'S5_5_1_C',
	'id'	=> 'S5_5_1_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//agallera 1
$S5_5_1_1 = array(
	'name'	=> 'S5_5_1_1',
	'id'	=> 'S5_5_1_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//agallera 2
$S5_5_1_2 = array(
	'name'	=> 'S5_5_1_2',
	'id'	=> 'S5_5_1_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//agallera 3
$S5_5_1_3 = array(
	'name'	=> 'S5_5_1_3',
	'id'	=> 'S5_5_1_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//agallera 4
$S5_5_1_4 = array(
	'name'	=> 'S5_5_1_4',
	'id'	=> 'S5_5_1_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//agallera 4
$S5_5_1_5 = array(
	'name'	=> 'S5_5_1_5',
	'id'	=> 'S5_5_1_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);
/////////////////////////////////////////
//Trasmallo
$S5_5_2 = array(
	'name'	=> 'S5_5_2',
	'id'	=> 'S5_5_2',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Trasmallo c
$S5_5_2_C = array(
	'name'	=> 'S5_5_2_C',
	'id'	=> 'S5_5_2_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Trasmallo 1
$S5_5_2_1 = array(
	'name'	=> 'S5_5_2_1',
	'id'	=> 'S5_5_2_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Trasmallo 2
$S5_5_2_2 = array(
	'name'	=> 'S5_5_2_2',
	'id'	=> 'S5_5_2_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Trasmallo 3
$S5_5_2_3 = array(
	'name'	=> 'S5_5_2_3',
	'id'	=> 'S5_5_2_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Trasmallo 4
$S5_5_2_4 = array(
	'name'	=> 'S5_5_2_4',
	'id'	=> 'S5_5_2_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Trasmallo 4
$S5_5_2_5 = array(
	'name'	=> 'S5_5_2_5',
	'id'	=> 'S5_5_2_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);

/////////////////////////////////////////
//Hondera
$S5_5_3 = array(
	'name'	=> 'S5_5_3',
	'id'	=> 'S5_5_3',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Hondera c
$S5_5_3_C = array(
	'name'	=> 'S5_5_3_C',
	'id'	=> 'S5_5_3_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Hondera 1
$S5_5_3_1 = array(
	'name'	=> 'S5_5_3_1',
	'id'	=> 'S5_5_3_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Hondera 2
$S5_5_3_2 = array(
	'name'	=> 'S5_5_3_2',
	'id'	=> 'S5_5_3_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Hondera 3
$S5_5_3_3 = array(
	'name'	=> 'S5_5_3_3',
	'id'	=> 'S5_5_3_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Hondera 4
$S5_5_3_4 = array(
	'name'	=> 'S5_5_3_4',
	'id'	=> 'S5_5_3_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Hondera 4
$S5_5_3_5 = array(
	'name'	=> 'S5_5_3_5',
	'id'	=> 'S5_5_3_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);
/////////////////////////////////////////
//Tarrafa
$S5_5_4 = array(
	'name'	=> 'S5_5_4',
	'id'	=> 'S5_5_4',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Tarrafa c
$S5_5_4_C = array(
	'name'	=> 'S5_5_4_C',
	'id'	=> 'S5_5_4_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Tarrafa 1
$S5_5_4_1 = array(
	'name'	=> 'S5_5_4_1',
	'id'	=> 'S5_5_4_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Tarrafa 2
$S5_5_4_2 = array(
	'name'	=> 'S5_5_4_2',
	'id'	=> 'S5_5_4_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Tarrafa 3
$S5_5_4_3 = array(
	'name'	=> 'S5_5_4_3',
	'id'	=> 'S5_5_4_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Tarrafa 4
$S5_5_4_4 = array(
	'name'	=> 'S5_5_4_4',
	'id'	=> 'S5_5_4_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Tarrafa 5
$S5_5_4_5 = array(
	'name'	=> 'S5_5_4_5',
	'id'	=> 'S5_5_4_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);

/////////////////////////////////////////
//Arrastradora
$S5_5_5 = array(
	'name'	=> 'S5_5_5',
	'id'	=> 'S5_5_5',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Arrastradora c
$S5_5_5_C = array(
	'name'	=> 'S5_5_5_C',
	'id'	=> 'S5_5_5_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Arrastradora 1
$S5_5_5_1 = array(
	'name'	=> 'S5_5_5_1',
	'id'	=> 'S5_5_5_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Arrastradora 2
$S5_5_5_2 = array(
	'name'	=> 'S5_5_5_2',
	'id'	=> 'S5_5_5_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Arrastradora 3
$S5_5_5_3 = array(
	'name'	=> 'S5_5_5_3',
	'id'	=> 'S5_5_5_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Arrastradora 4
$S5_5_5_4 = array(
	'name'	=> 'S5_5_5_4',
	'id'	=> 'S5_5_5_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Arrastradora 5
$S5_5_5_5 = array(
	'name'	=> 'S5_5_5_5',
	'id'	=> 'S5_5_5_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);

/////////////////////////////////////////
//Capiccuhuana
$S5_5_6 = array(
	'name'	=> 'S5_5_6',
	'id'	=> 'S5_5_6',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Capiccuhuana c
$S5_5_6_C = array(
	'name'	=> 'S5_5_6_C',
	'id'	=> 'S5_5_6_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Capiccuhuana 1
$S5_5_6_1 = array(
	'name'	=> 'S5_5_6_1',
	'id'	=> 'S5_5_6_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Capiccuhuana 2
$S5_5_6_2 = array(
	'name'	=> 'S5_5_6_2',
	'id'	=> 'S5_5_6_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Capiccuhuana 3
$S5_5_6_3 = array(
	'name'	=> 'S5_5_6_3',
	'id'	=> 'S5_5_6_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Capiccuhuana 4
$S5_5_6_4 = array(
	'name'	=> 'S5_5_6_4',
	'id'	=> 'S5_5_6_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Capiccuhuana 5
$S5_5_6_5 = array(
	'name'	=> 'S5_5_6_5',
	'id'	=> 'S5_5_6_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);

/////////////////////////////////////////
//Chinchorro
$S5_5_7 = array(
	'name'	=> 'S5_5_7',
	'id'	=> 'S5_5_7',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Chinchorro c
$S5_5_7_C = array(
	'name'	=> 'S5_5_7_C',
	'id'	=> 'S5_5_7_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Chinchorro 1
$S5_5_7_1 = array(
	'name'	=> 'S5_5_7_1',
	'id'	=> 'S5_5_7_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Chinchorro 2
$S5_5_7_2 = array(
	'name'	=> 'S5_5_7_2',
	'id'	=> 'S5_5_7_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Chinchorro 3
$S5_5_7_3 = array(
	'name'	=> 'S5_5_7_3',
	'id'	=> 'S5_5_7_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Chinchorro 4
$S5_5_7_4 = array(
	'name'	=> 'S5_5_7_4',
	'id'	=> 'S5_5_7_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Chinchorro 5
$S5_5_7_5 = array(
	'name'	=> 'S5_5_7_5',
	'id'	=> 'S5_5_7_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);
/////////////////////////////////////////
//Aissaccahuanna
$S5_5_8 = array(
	'name'	=> 'S5_5_8',
	'id'	=> 'S5_5_8',
	'maxlength'	=> 2,
	'class' => $span_class . ' red5',
);
//Aissaccahuanna c
$S5_5_8_C = array(
	'name'	=> 'S5_5_8_C',
	'id'	=> 'S5_5_8_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);
//Aissaccahuanna 1
$S5_5_8_1 = array(
	'name'	=> 'S5_5_8_1',
	'id'	=> 'S5_5_8_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Aissaccahuanna 2
$S5_5_8_2 = array(
	'name'	=> 'S5_5_8_2',
	'id'	=> 'S5_5_8_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Aissaccahuanna 3
$S5_5_8_3 = array(
	'name'	=> 'S5_5_8_3',
	'id'	=> 'S5_5_8_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Aissaccahuanna 4
$S5_5_8_4 = array(
	'name'	=> 'S5_5_8_4',
	'id'	=> 'S5_5_8_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//Aissaccahuanna 5
$S5_5_8_5 = array(
	'name'	=> 'S5_5_8_5',
	'id'	=> 'S5_5_8_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);

/////////////////////////////////////
//Otro
$S5_5_9 = array(
	'name'	=> 'S5_5_9',
	'id'	=> 'S5_5_9',
	'maxlength'	=> 1,
	'class' => $span_class . ' red5',
);
//Otro e
$S5_5_9_O = array(
	'name'	=> 'S5_5_9_O',
	'id'	=> 'S5_5_9_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);

//Otro c
$S5_5_9_C = array(
	'name'	=> 'S5_5_9_C',
	'id'	=> 'S5_5_9_C',
	'maxlength'	=> 3,
	'class' => $span_class,
);

//otro 1
$S5_5_9_1 = array(
	'name'	=> 'S5_5_9_1',
	'id'	=> 'S5_5_9_1',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//otro 2
$S5_5_9_2 = array(
	'name'	=> 'S5_5_9_2',
	'id'	=> 'S5_5_9_2',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//otro 3
$S5_5_9_3 = array(
	'name'	=> 'S5_5_9_3',
	'id'	=> 'S5_5_9_3',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//otro 4
$S5_5_9_4 = array(
	'name'	=> 'S5_5_9_4',
	'id'	=> 'S5_5_9_4',
	'maxlength'	=> 5,
	'class' => $span_class,
);
//otro 5
$S5_5_9_5 = array(
	'name'	=> 'S5_5_9_5',
	'id'	=> 'S5_5_9_5',
	'maxlength'	=> 5,
	'class' => $span_class,
);

/////////////////////////////////////
//Aparejos - Lineas y anzuelos
$S5_5_10 = array(
	'name'	=> 'S5_5_10',
	'id'	=> 'S5_5_10',
	'maxlength'	=> 1,
	'class' => $span_class . ' aparejo5',
);
//Aparejos - Lineas y anzuelos c
$S5_5_10_C = array(
	'name'	=> 'S5_5_10_C',
	'id'	=> 'S5_5_10_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Aparejos -Arpon
$S5_5_11 = array(
	'name'	=> 'S5_5_11',
	'id'	=> 'S5_5_11',
	'maxlength'	=> 1,
	'class' => $span_class . ' aparejo5',
);
//Aparejos -Arpon c
$S5_5_11_C = array(
	'name'	=> 'S5_5_11_C',
	'id'	=> 'S5_5_11_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Aparejos -Farpa
$S5_5_12 = array(
	'name'	=> 'S5_5_12',
	'id'	=> 'S5_5_12',
	'maxlength'	=> 1,
	'class' => $span_class . ' aparejo5',
);
//Aparejos -Farpa c
$S5_5_12_C = array(
	'name'	=> 'S5_5_12_C',
	'id'	=> 'S5_5_12_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Aparejos -Espineles
$S5_5_13 = array(
	'name'	=> 'S5_5_13',
	'id'	=> 'S5_5_13',
	'maxlength'	=> 1,
	'class' => $span_class . ' aparejo5',
);
//Aparejos -Espineles c
$S5_5_13_C = array(
	'name'	=> 'S5_5_13_C',
	'id'	=> 'S5_5_13_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Aparejos -Otro
$S5_5_14 = array(
	'name'	=> 'S5_5_14',
	'id'	=> 'S5_5_14',
	'maxlength'	=> 1,
	'class' => $span_class  . ' aparejo5',
);
//Aparejos -Otro e
$S5_5_14_O = array(
	'name'	=> 'S5_5_14_O',
	'id'	=> 'S5_5_14_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//Aparejos -Otro c
$S5_5_14_C = array(
	'name'	=> 'S5_5_14_C',
	'id'	=> 'S5_5_14_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Trampa-Nasa
$S5_5_15 = array(
	'name'	=> 'S5_5_15',
	'id'	=> 'S5_5_15',
	'maxlength'	=> 1,
	'class' => $span_class  . ' aparejo5',
);
/////////////////////////////////////
//Trampa-Tapaje
$S5_5_16 = array(
	'name'	=> 'S5_5_16',
	'id'	=> 'S5_5_16',
	'maxlength'	=> 1,
	'class' => $span_class,
);
/////////////////////////////////////
//Trampa-Otro
$S5_5_17 = array(
	'name'	=> 'S5_5_17',
	'id'	=> 'S5_5_17',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//Trampa-Otro e
$S5_5_17_O = array(
	'name'	=> 'S5_5_17_O',
	'id'	=> 'S5_5_17_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);


/////////////////////////////////////
//Especies hidrobiológicas que extrae - Acarahuazu
$S5_6_1 = array(
	'name'	=> 'S5_6_1',
	'id'	=> 'S5_6_1',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_1_C = array(
	'name'	=> 'S5_6_1_C',
	'id'	=> 'S5_6_1_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Bagre
$S5_6_2 = array(
	'name'	=> 'S5_6_2',
	'id'	=> 'S5_6_2',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_2_C = array(
	'name'	=> 'S5_6_2_C',
	'id'	=> 'S5_6_2_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Bocón
$S5_6_3 = array(
	'name'	=> 'S5_6_3',
	'id'	=> 'S5_6_3',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_3_C = array(
	'name'	=> 'S5_6_3_C',
	'id'	=> 'S5_6_3_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Boquichico
$S5_6_4 = array(
	'name'	=> 'S5_6_4',
	'id'	=> 'S5_6_4',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_4_C = array(
	'name'	=> 'S5_6_4_C',
	'id'	=> 'S5_6_4_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Bujurqui
$S5_6_5 = array(
	'name'	=> 'S5_6_5',
	'id'	=> 'S5_6_5',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_5_C = array(
	'name'	=> 'S5_6_5_C',
	'id'	=> 'S5_6_5_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Camarón de río
$S5_6_6 = array(
	'name'	=> 'S5_6_6',
	'id'	=> 'S5_6_6',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_6_C = array(
	'name'	=> 'S5_6_6_C',
	'id'	=> 'S5_6_6_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Carachama
$S5_6_7 = array(
	'name'	=> 'S5_6_7',
	'id'	=> 'S5_6_7',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_7_C = array(
	'name'	=> 'S5_6_7_C',
	'id'	=> 'S5_6_7_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Carachi amarillo
$S5_6_8 = array(
	'name'	=> 'S5_6_8',
	'id'	=> 'S5_6_8',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_8_C = array(
	'name'	=> 'S5_6_8_C',
	'id'	=> 'S5_6_8_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Carachi negro
$S5_6_9 = array(
	'name'	=> 'S5_6_9',
	'id'	=> 'S5_6_9',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_9_C = array(
	'name'	=> 'S5_6_9_C',
	'id'	=> 'S5_6_9_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Chambira
$S5_6_10 = array(
	'name'	=> 'S5_6_10',
	'id'	=> 'S5_6_10',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_10_C = array(
	'name'	=> 'S5_6_10_C',
	'id'	=> 'S5_6_10_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Chiochio
$S5_6_11 = array(
	'name'	=> 'S5_6_11',
	'id'	=> 'S5_6_11',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_11_C = array(
	'name'	=> 'S5_6_11_C',
	'id'	=> 'S5_6_11_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Corvina
$S5_6_12 = array(
	'name'	=> 'S5_6_12',
	'id'	=> 'S5_6_12',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_12_C = array(
	'name'	=> 'S5_6_12_C',
	'id'	=> 'S5_6_12_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Dentón
$S5_6_13 = array(
	'name'	=> 'S5_6_13',
	'id'	=> 'S5_6_13',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_13_C = array(
	'name'	=> 'S5_6_13_C',
	'id'	=> 'S5_6_13_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Doncella
$S5_6_14 = array(
	'name'	=> 'S5_6_14',
	'id'	=> 'S5_6_14',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_14_C = array(
	'name'	=> 'S5_6_14_C',
	'id'	=> 'S5_6_14_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Dorado
$S5_6_15 = array(
	'name'	=> 'S5_6_15',
	'id'	=> 'S5_6_15',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_15_C = array(
	'name'	=> 'S5_6_15_C',
	'id'	=> 'S5_6_15_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Fasaco
$S5_6_16 = array(
	'name'	=> 'S5_6_16',
	'id'	=> 'S5_6_16',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_16_C = array(
	'name'	=> 'S5_6_16_C',
	'id'	=> 'S5_6_16_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Ispi
$S5_6_17 = array(
	'name'	=> 'S5_6_17',
	'id'	=> 'S5_6_17',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_17_C = array(
	'name'	=> 'S5_6_17_C',
	'id'	=> 'S5_6_17_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Langostino
$S5_6_18 = array(
	'name'	=> 'S5_6_18',
	'id'	=> 'S5_6_18',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_18_C = array(
	'name'	=> 'S5_6_18_C',
	'id'	=> 'S5_6_18_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Lisa
$S5_6_19 = array(
	'name'	=> 'S5_6_19',
	'id'	=> 'S5_6_19',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_19_C = array(
	'name'	=> 'S5_6_19_C',
	'id'	=> 'S5_6_19_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Llambina
$S5_6_20 = array(
	'name'	=> 'S5_6_20',
	'id'	=> 'S5_6_20',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_20_C = array(
	'name'	=> 'S5_6_20_C',
	'id'	=> 'S5_6_20_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Manitoa
$S5_6_21 = array(
	'name'	=> 'S5_6_21',
	'id'	=> 'S5_6_21',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_21_C = array(
	'name'	=> 'S5_6_21_C',
	'id'	=> 'S5_6_21_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Maparate
$S5_6_22 = array(
	'name'	=> 'S5_6_22',
	'id'	=> 'S5_6_22',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_22_C = array(
	'name'	=> 'S5_6_22_C',
	'id'	=> 'S5_6_22_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Mauri
$S5_6_23 = array(
	'name'	=> 'S5_6_23',
	'id'	=> 'S5_6_23',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_23_C = array(
	'name'	=> 'S5_6_23_C',
	'id'	=> 'S5_6_23_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Mota
$S5_6_24 = array(
	'name'	=> 'S5_6_24',
	'id'	=> 'S5_6_24',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_24_C = array(
	'name'	=> 'S5_6_24_C',
	'id'	=> 'S5_6_24_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Novia
$S5_6_25 = array(
	'name'	=> 'S5_6_25',
	'id'	=> 'S5_6_25',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_25_C = array(
	'name'	=> 'S5_6_25_C',
	'id'	=> 'S5_6_25_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Paco
$S5_6_26 = array(
	'name'	=> 'S5_6_26',
	'id'	=> 'S5_6_26',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_26_C = array(
	'name'	=> 'S5_6_26_C',
	'id'	=> 'S5_6_26_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Palometa
$S5_6_27 = array(
	'name'	=> 'S5_6_27',
	'id'	=> 'S5_6_27',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_27_C = array(
	'name'	=> 'S5_6_27_C',
	'id'	=> 'S5_6_27_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Paña, piraña
$S5_6_28 = array(
	'name'	=> 'S5_6_28',
	'id'	=> 'S5_6_28',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_28_C = array(
	'name'	=> 'S5_6_28_C',
	'id'	=> 'S5_6_28_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Pejerrey
$S5_6_29 = array(
	'name'	=> 'S5_6_29',
	'id'	=> 'S5_6_29',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_29_C = array(
	'name'	=> 'S5_6_29_C',
	'id'	=> 'S5_6_29_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Ractacara
$S5_6_30 = array(
	'name'	=> 'S5_6_30',
	'id'	=> 'S5_6_30',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_30_C = array(
	'name'	=> 'S5_6_30_C',
	'id'	=> 'S5_6_30_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Sabalo
$S5_6_31 = array(
	'name'	=> 'S5_6_31',
	'id'	=> 'S5_6_31',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_31_C = array(
	'name'	=> 'S5_6_31_C',
	'id'	=> 'S5_6_31_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Sardina
$S5_6_32 = array(
	'name'	=> 'S5_6_32',
	'id'	=> 'S5_6_32',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_32_C = array(
	'name'	=> 'S5_6_32_C',
	'id'	=> 'S5_6_32_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Shiripira
$S5_6_33 = array(
	'name'	=> 'S5_6_33',
	'id'	=> 'S5_6_33',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_33_C = array(
	'name'	=> 'S5_6_33_C',
	'id'	=> 'S5_6_33_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Shuyo
$S5_6_34 = array(
	'name'	=> 'S5_6_34',
	'id'	=> 'S5_6_34',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_34_C = array(
	'name'	=> 'S5_6_34_C',
	'id'	=> 'S5_6_34_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Tilapia
$S5_6_35 = array(
	'name'	=> 'S5_6_35',
	'id'	=> 'S5_6_35',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_35_C = array(
	'name'	=> 'S5_6_35_C',
	'id'	=> 'S5_6_35_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Trucha
$S5_6_36 = array(
	'name'	=> 'S5_6_36',
	'id'	=> 'S5_6_36',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_36_C = array(
	'name'	=> 'S5_6_36_C',
	'id'	=> 'S5_6_36_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Trucha
$S5_6_37 = array(
	'name'	=> 'S5_6_37',
	'id'	=> 'S5_6_37',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_37_C = array(
	'name'	=> 'S5_6_37_C',
	'id'	=> 'S5_6_37_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Yaraqui
$S5_6_38 = array(
	'name'	=> 'S5_6_38',
	'id'	=> 'S5_6_38',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_38_C = array(
	'name'	=> 'S5_6_38_C',
	'id'	=> 'S5_6_38_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Yulilla
$S5_6_39 = array(
	'name'	=> 'S5_6_39',
	'id'	=> 'S5_6_39',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_39_C = array(
	'name'	=> 'S5_6_39_C',
	'id'	=> 'S5_6_39_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Especies hidrobiológicas que extrae - Zungaro
$S5_6_40 = array(
	'name'	=> 'S5_6_40',
	'id'	=> 'S5_6_40',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_40_C = array(
	'name'	=> 'S5_6_40_C',
	'id'	=> 'S5_6_40_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////
//Especies hidrobiológicas que extrae - Otro
$S5_6_41 = array(
	'name'	=> 'S5_6_41',
	'id'	=> 'S5_6_41',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6e',
);
$S5_6_41_O = array(
	'name'	=> 'S5_6_41_O',
	'id'	=> 'S5_6_41_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_41_C = array(
	'name'	=> 'S5_6_41_C',
	'id'	=> 'S5_6_41_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Anguila eléctrica
$S5_6_42 = array(
	'name'	=> 'S5_6_42',
	'id'	=> 'S5_6_42',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_42_C = array(
	'name'	=> 'S5_6_42_C',
	'id'	=> 'S5_6_42_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Arahuana
$S5_6_43 = array(
	'name'	=> 'S5_6_43',
	'id'	=> 'S5_6_43',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_43_C = array(
	'name'	=> 'S5_6_43_C',
	'id'	=> 'S5_6_43_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Coydoras jumbo
$S5_6_44 = array(
	'name'	=> 'S5_6_44',
	'id'	=> 'S5_6_44',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_44_C = array(
	'name'	=> 'S5_6_44_C',
	'id'	=> 'S5_6_44_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales -  Escalar amazónico
$S5_6_45 = array(
	'name'	=> 'S5_6_45',
	'id'	=> 'S5_6_45',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_45_C = array(
	'name'	=> 'S5_6_45_C',
	'id'	=> 'S5_6_45_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales -  Neón tetra
$S5_6_46 = array(
	'name'	=> 'S5_6_46',
	'id'	=> 'S5_6_46',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_46_C = array(
	'name'	=> 'S5_6_46_C',
	'id'	=> 'S5_6_46_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales -  Pez disco
$S5_6_47 = array(
	'name'	=> 'S5_6_47',
	'id'	=> 'S5_6_47',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_47_C = array(
	'name'	=> 'S5_6_47_C',
	'id'	=> 'S5_6_47_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales -  Tucunare
$S5_6_48 = array(
	'name'	=> 'S5_6_48',
	'id'	=> 'S5_6_48',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_48_C = array(
	'name'	=> 'S5_6_48_C',
	'id'	=> 'S5_6_48_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_49 = array(
	'name'	=> 'S5_6_49',
	'id'	=> 'S5_6_49',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_49_O = array(
	'name'	=> 'S5_6_49_O',
	'id'	=> 'S5_6_49_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_49_C = array(
	'name'	=> 'S5_6_49_C',
	'id'	=> 'S5_6_49_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_50 = array(
	'name'	=> 'S5_6_50',
	'id'	=> 'S5_6_50',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_50_O = array(
	'name'	=> 'S5_6_50_O',
	'id'	=> 'S5_6_50_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_50_C = array(
	'name'	=> 'S5_6_50_C',
	'id'	=> 'S5_6_50_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_51 = array(
	'name'	=> 'S5_6_51',
	'id'	=> 'S5_6_51',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_51_O = array(
	'name'	=> 'S5_6_51_O',
	'id'	=> 'S5_6_51_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_51_C = array(
	'name'	=> 'S5_6_51_C',
	'id'	=> 'S5_6_51_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_52 = array(
	'name'	=> 'S5_6_52',
	'id'	=> 'S5_6_52',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_52_O = array(
	'name'	=> 'S5_6_52_O',
	'id'	=> 'S5_6_52_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_52_C = array(
	'name'	=> 'S5_6_52_C',
	'id'	=> 'S5_6_52_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_53 = array(
	'name'	=> 'S5_6_53',
	'id'	=> 'S5_6_53',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_53_O = array(
	'name'	=> 'S5_6_53_O',
	'id'	=> 'S5_6_53_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_53_C = array(
	'name'	=> 'S5_6_53_C',
	'id'	=> 'S5_6_53_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_54 = array(
	'name'	=> 'S5_6_54',
	'id'	=> 'S5_6_54',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_54_O = array(
	'name'	=> 'S5_6_54_O',
	'id'	=> 'S5_6_54_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_54_C = array(
	'name'	=> 'S5_6_54_C',
	'id'	=> 'S5_6_54_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_55 = array(
	'name'	=> 'S5_6_55',
	'id'	=> 'S5_6_55',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_55_O = array(
	'name'	=> 'S5_6_55_O',
	'id'	=> 'S5_6_55_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_55_C = array(
	'name'	=> 'S5_6_55_C',
	'id'	=> 'S5_6_55_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_56 = array(
	'name'	=> 'S5_6_56',
	'id'	=> 'S5_6_56',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_56_O = array(
	'name'	=> 'S5_6_56_O',
	'id'	=> 'S5_6_56_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_56_C = array(
	'name'	=> 'S5_6_56_C',
	'id'	=> 'S5_6_56_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_57 = array(
	'name'	=> 'S5_6_57',
	'id'	=> 'S5_6_57',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_57_O = array(
	'name'	=> 'S5_6_57_O',
	'id'	=> 'S5_6_57_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_57_C = array(
	'name'	=> 'S5_6_57_C',
	'id'	=> 'S5_6_57_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_58 = array(
	'name'	=> 'S5_6_58',
	'id'	=> 'S5_6_58',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_58_O = array(
	'name'	=> 'S5_6_58_O',
	'id'	=> 'S5_6_58_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_58_C = array(
	'name'	=> 'S5_6_58_C',
	'id'	=> 'S5_6_58_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);
/////////////////////////////////////
//Peces Ornamenatales - Otro
$S5_6_59 = array(
	'name'	=> 'S5_6_59',
	'id'	=> 'S5_6_59',
	'maxlength'	=> 1,
	'class' => $span_class . ' especie s5preg6p',
);
$S5_6_59_O = array(
	'name'	=> 'S5_6_59_O',
	'id'	=> 'S5_6_59_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_6_59_C = array(
	'name'	=> 'S5_6_59_C',
	'id'	=> 'S5_6_59_C',
	'maxlength'	=> 2,
	'class' => $span_class,
);




//////////////////////////////////////////
$S5_7 = array(
	'name'	=> 'S5_7',
	'id'	=> 'S5_7',
	'maxlength'	=> 1,
	'class' => $span_class,
);


//Cual es el lugar de desembarque : Puerto
//////////////////////////////////////////
$S5_8_1 = array(
	'name'	=> 'S5_8_1',
	'id'	=> 'S5_8_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S5_8_1_1 = array(
	'name'	=> 'S5_8_1_1',
	'id'	=> 'S5_8_1_1',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//Cual es el lugar de desembarque : Playa
//////////////////////////////////////////
$S5_8_2 = array(
	'name'	=> 'S5_8_2',
	'id'	=> 'S5_8_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S5_8_2_1 = array(
	'name'	=> 'S5_8_2_1',
	'id'	=> 'S5_8_2_1',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//Cual es el lugar de desembarque : Desembarcadero pesquero artesanal 
//////////////////////////////////////////
$S5_8_3 = array(
	'name'	=> 'S5_8_3',
	'id'	=> 'S5_8_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S5_8_3_1 = array(
	'name'	=> 'S5_8_3_1',
	'id'	=> 'S5_8_3_1',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//Cual es el lugar de desembarque : Otro
//////////////////////////////////////////
$S5_8_4 = array(
	'name'	=> 'S5_8_4',
	'id'	=> 'S5_8_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S5_8_4_1 = array(
	'name'	=> 'S5_8_4_1',
	'id'	=> 'S5_8_4_1',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_8_4_O = array(
	'name'	=> 'S5_8_4_O',
	'id'	=> 'S5_8_4_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);


/////////////////////////////////////////////
//Cual es el lugar de desembarque : Otro
//////////////////////////////////////////
$S5_9_1 = array(
	'name'	=> 'S5_9_1',
	'id'	=> 'S5_9_1',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_2 = array(
	'name'	=> 'S5_9_2',
	'id'	=> 'S5_9_2',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_3 = array(
	'name'	=> 'S5_9_3',
	'id'	=> 'S5_9_3',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_4 = array(
	'name'	=> 'S5_9_4',
	'id'	=> 'S5_9_4',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);
$S5_9_5 = array(
	'name'	=> 'S5_9_5',
	'id'	=> 'S5_9_5',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_6 = array(
	'name'	=> 'S5_9_6',
	'id'	=> 'S5_9_6',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_7 = array(
	'name'	=> 'S5_9_7',
	'id'	=> 'S5_9_7',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);
$S5_9_8 = array(
	'name'	=> 'S5_9_8',
	'id'	=> 'S5_9_8',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_9 = array(
	'name'	=> 'S5_9_9',
	'id'	=> 'S5_9_9',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_10 = array(
	'name'	=> 'S5_9_10',
	'id'	=> 'S5_9_10',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);
$S5_9_11 = array(
	'name'	=> 'S5_9_11',
	'id'	=> 'S5_9_11',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);
$S5_9_12 = array(
	'name'	=> 'S5_9_12',
	'id'	=> 'S5_9_12',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_13 = array(
	'name'	=> 'S5_9_13',
	'id'	=> 'S5_9_13',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

$S5_9_14 = array(
	'name'	=> 'S5_9_14',
	'id'	=> 'S5_9_14',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);
$S5_9_14_O = array(
	'name'	=> 'S5_9_14_O',
	'id'	=> 'S5_9_14_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);
$S5_9_15 = array(
	'name'	=> 'S5_9_15',
	'id'	=> 'S5_9_15',
	'maxlength'	=> 1,
	'class' => $span_class . ' s5preg9',
);

///////////////////////////////////////////////

$S5_10_1 = array(
	'name'	=> 'S5_10_1',
	'id'	=> 'S5_10_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S5_10_2 = array(
	'name'	=> 'S5_10_2',
	'id'	=> 'S5_10_2',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S5_10_3 = array(
	'name'	=> 'S5_10_3',
	'id'	=> 'S5_10_3',
	'maxlength'	=> 1,
	'class' => $span_class,
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
echo '<div class="well modulo">';
	echo '<h4>SECCIÓN V. FAENAS DE PESCA</h4>';
	echo '<div class="row-fluid">';
////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////COLUMNA 1
	echo '<div class="span6">';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 1

		echo '<div class="question">';
			echo '<p>1. ¿La actividad de pesca la realiza en:</p>';	
					
				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Río?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_1); 
									echo '<div class="help-block error">' . form_error($S5_1_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_1_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_1_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';


				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Lago?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_2); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_2['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_2_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_2_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';				

				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Laguna?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_3); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_3['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_3_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_3_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';	

				// echo '<div class="row-fluid">';		

				// 		echo '<div class="offset1 span2">';

				// 			echo '<p>Aguas subterráneas?</p>';

				// 		echo '</div>';	

				// 		echo '<div class="span2">';
				// 			echo '<div class="control-group">';
				// 				echo '<div class="controls">';
				// 					echo form_input($S5_1_4); 
				// 					echo '<span class="help-inline"></span>';
				// 					echo '<div class="help-block error">' . form_error($S5_1_4['name']) . '</div>';
				// 				echo '</div>';	
				// 			echo '</div>'; 

				// 		echo '</div>';

				// 		echo '<div class="span3">';

				// 			echo '<p>Nombre de la fuente</p>';

				// 		echo '</div>';	

				// 		echo '<div class="span4">';
				// 			echo '<div class="control-group">';
				// 				echo '<div class="controls">';
				// 					echo form_input($S5_1_4_1); 
				// 					echo '<span class="help-inline"></span>';
				// 					echo '<div class="help-block error">' . form_error($S5_1_4_1['name']) . '</div>';
				// 				echo '</div>';	
				// 			echo '</div>'; 

				// 		echo '</div>';

				// echo '</div>';	


				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Marisma?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_4); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_4['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_4_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_4_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';	

				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Quebrada?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_5); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_5['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_5_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_5_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';	



				// echo '<div class="row-fluid">';		

				// 		echo '<div class="offset1 span2">';

				// 			echo '<p>Deshielo?</p>';

				// 		echo '</div>';	

				// 		echo '<div class="span2">';
				// 			echo '<div class="control-group">';
				// 				echo '<div class="controls">';
				// 					echo form_input($S5_1_7); 
				// 					echo '<span class="help-inline"></span>';
				// 					echo '<div class="help-block error">' . form_error($S5_1_7['name']) . '</div>';
				// 				echo '</div>';	
				// 			echo '</div>'; 

				// 		echo '</div>';

				// 		echo '<div class="span3">';

				// 			echo '<p>Nombre de la fuente</p>';

				// 		echo '</div>';	

				// 		echo '<div class="span4">';
				// 			echo '<div class="control-group">';
				// 				echo '<div class="controls">';
				// 					echo form_input($S5_1_7_1); 
				// 					echo '<span class="help-inline"></span>';
				// 					echo '<div class="help-block error">' . form_error($S5_1_7_1['name']) . '</div>';
				// 				echo '</div>';	
				// 			echo '</div>'; 

				// 		echo '</div>';

				// echo '</div>';	



				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Cocha?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_6); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_6['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_6_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_6_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';





				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Reservorio?</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_7); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_7['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_7_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_7_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';

				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Otro</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_8); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_8['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';


				echo '</div>';

				echo '<div class="row-fluid">';		

						echo '<div class="offset1 span2">';

							echo '<p>Especifique</p>';

						echo '</div>';	

						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_8_O); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_8_O['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

						echo '<div class="span3">';

							echo '<p>Nombre de la fuente</p>';

						echo '</div>';	

						echo '<div class="span4">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($S5_1_8_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_1_8_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 

						echo '</div>';

				echo '</div>';


		echo '</div>'; 


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 1






////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 2

		echo '<div class="question">';
			echo '<p>2. ¿La zona donde pesca se encuentra en:</p>';	


				echo '<div class="row-fluid">';		


							echo '<div class="span6">';

									echo '<div class="control-group span5">';	
										echo form_label('Su comunidad', $S5_2_1['id'], $label_class);
									echo '</div>'; 	
											
									echo '<div class="control-group span5">';
										echo '<div class="controls">';
												echo form_input($S5_2_1); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_1['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	

							echo '<div class="span6">';

									echo '<div class="control-group span5">';	
										echo form_label('Otra comunidad', $S5_2_2['id'], $label_class);
									echo '</div>'; 	
											
									echo '<div class="control-group span5">';
										echo '<div class="controls">';
												echo form_input($S5_2_2); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error($S5_2_2['name']) . '</div>';
										echo '</div>';	
									echo '</div>'; 	

							echo '</div>';	

			echo '</div>'; 

		echo '<div class="row-fluid">';		
			echo '<div class="offset2 span8">';
					echo '<div class="control-group">';
					echo form_label('Departamento', 'S5_2_DD_COD', $label_class);	
						echo '<div class="controls">';
							echo form_dropdown('S5_2_DD_COD', $depaxArray, FALSE,'class=" span12" id="S5_2_DD_COD"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S5_2_DD_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	

					echo '<div class="control-group">';
					echo form_label('Provincia', 'S5_2_PP_COD', $label_class);
						echo '<div class="controls">';
							echo form_dropdown('S5_2_PP_COD', $provArray, FALSE,'class="span12" id="S5_2_PP_COD"'); 
							echo form_input($S5_2_PP_O);  
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S5_2_PP_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	

					echo '<div class="control-group">';
					echo form_label('Distrito', 'S5_2_DI_COD', $label_class);
						echo '<div class="controls">';
								echo form_dropdown('S5_2_DI_COD', $distArray, FALSE,'class="span12" id="S5_2_DI_COD"'); 
								echo form_input($S5_2_DI_O);  
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S5_2_DI_COD') . '</div>';
						echo '</div>';	
					echo '</div>';

					echo '<div class="control-group">';
					echo form_label('Centro Poblado', 'S5_2_CCPP_COD', $label_class);
						echo '<div class="controls">';
								echo form_dropdown('S5_2_CCPP_COD', $ccppArray, FALSE,'class="span12" id="S5_2_CCPP_COD"'); 
								echo form_input($S5_2_CCPP_O);  
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('S5_2_CCPP_COD') . '</div>';
						echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 
		echo '</div>'; 	
echo '</div>';					
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 2

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 3
		echo '<div class="question">';
			echo '<p>3. Generalmente , ¿Qué tiempo demora en desplazarse a su zona de pesca?</p>';
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

						    echo '<div class="control-group span1">';	
								echo form_label('', $S5_3['id'], $label_class);
							echo '</div>'; 	
									
							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S5_3); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_3['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Horas', $S5_3_H['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S5_3_H); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_3_H['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Minutos', $S5_3_M['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S5_3_M); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_3_M['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 			
	

					echo '</div>';	
				echo '</div>';	
		echo '</div>';
	////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 3

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 4
		echo '<div class="question">';
			echo '<p>4.Generalmente , ¿Cuánto dura su faena de pesca?</p>';
				echo '<div class="row-fluid">';
					echo '<div class="span12">';

						    echo '<div class="control-group span1">';	
								echo form_label('', $S5_4['id'], $label_class);
							echo '</div>'; 	
									
							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S5_4); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_4['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Horas', $S5_4_H['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S5_4_H); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_4_H['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	


							echo '<div class="control-group offset1 span1">';	
								echo form_label('Minutos', $S5_4_M['id'], $label_class);
							echo '</div>'; 

							echo '<div class="control-group span2">';
								echo '<div class="controls">';
										echo form_input($S5_4_M); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S5_4_M['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 			
	

					echo '</div>';	
				echo '</div>';	
		echo '</div>';
	////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 4

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 5
		echo '<div class="question">';
			echo '<p>5. ¿Cuáles son las artes o aparejos de pesca que usted utiliza?</p>';
				echo '<div class="row-fluid">';



			echo '<table class="table table-condensed" id="emb_table">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th class="span1"></th>';
                   echo '<th class="span1"></th>';
                  echo '<th class="span1"></th>';
                  echo '<th class="span9 center" colspan="5">Longitud de malla (Pulgadas)</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
               echo '<tr>';
               	 echo '<td><b>REDES<b/></td>';
                  echo '<td></td>';
                  echo '<td>¿Cuántas?</td>';
                  echo '<td style="text-align:center">1</td>';
                  echo '<td style="text-align:center">2</td>';
                  echo '<td style="text-align:center">3</td>';
                  echo '<td style="text-align:center">4</td>';       
                  echo '<td style="text-align:center">5</td>';
               echo '</tr>';              
               echo '<tr>';
                  echo '<td>Agallera</td>';
                  echo '<td>' . form_input($S5_5_1) . '<div class="help-block error">' . form_error($S5_5_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_1_C) . '<div class="help-block error">' . form_error($S5_5_1_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_1_1) . '<div class="help-block error">' . form_error($S5_5_1_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_1_2) . '<div class="help-block error">' . form_error($S5_5_1_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_1_3) . '<div class="help-block error">' . form_error($S5_5_1_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_1_4) . '<div class="help-block error">' . form_error($S5_5_1_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_1_5) . '<div class="help-block error">' . form_error($S5_5_1_5['name']) . '</div></td>';                                                 
                echo '</tr>';
               echo '<tr>';
                  echo '<td>Trasmallo</td>';
                  echo '<td>' . form_input($S5_5_2) . '<div class="help-block error">' . form_error($S5_5_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_2_C) . '<div class="help-block error">' . form_error($S5_5_2_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_2_1) . '<div class="help-block error">' . form_error($S5_5_2_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_2_2) . '<div class="help-block error">' . form_error($S5_5_2_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_2_3) . '<div class="help-block error">' . form_error($S5_5_2_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_2_4) . '<div class="help-block error">' . form_error($S5_5_2_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_2_5) . '<div class="help-block error">' . form_error($S5_5_2_5['name']) . '</div></td>';                                                 
                echo '</tr>'; 
                echo '<tr>';
                  echo '<td>Hondera</td>';
                  echo '<td>' . form_input($S5_5_3) . '<div class="help-block error">' . form_error($S5_5_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_3_C) . '<div class="help-block error">' . form_error($S5_5_3_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_3_1) . '<div class="help-block error">' . form_error($S5_5_3_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_3_2) . '<div class="help-block error">' . form_error($S5_5_3_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_3_3) . '<div class="help-block error">' . form_error($S5_5_3_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_3_4) . '<div class="help-block error">' . form_error($S5_5_3_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_3_5) . '<div class="help-block error">' . form_error($S5_5_3_5['name']) . '</div></td>';                                                 
                echo '</tr>';         
                echo '<tr>';
                  echo '<td>Tarrafa/Atarraya</td>';
                  echo '<td>' . form_input($S5_5_4) . '<div class="help-block error">' . form_error($S5_5_4['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_4_C) . '<div class="help-block error">' . form_error($S5_5_4_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_4_1) . '<div class="help-block error">' . form_error($S5_5_4_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_4_2) . '<div class="help-block error">' . form_error($S5_5_4_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_4_3) . '<div class="help-block error">' . form_error($S5_5_4_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_4_4) . '<div class="help-block error">' . form_error($S5_5_4_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_4_5) . '<div class="help-block error">' . form_error($S5_5_4_5['name']) . '</div></td>';                                                 
                echo '</tr>';            
                echo '<tr>';
                  echo '<td>Arrastradora</td>';
                  echo '<td>' . form_input($S5_5_5) . '<div class="help-block error">' . form_error($S5_5_5['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_5_C) . '<div class="help-block error">' . form_error($S5_5_5_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_5_1) . '<div class="help-block error">' . form_error($S5_5_5_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_5_2) . '<div class="help-block error">' . form_error($S5_5_5_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_5_3) . '<div class="help-block error">' . form_error($S5_5_5_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_5_4) . '<div class="help-block error">' . form_error($S5_5_5_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_5_5) . '<div class="help-block error">' . form_error($S5_5_5_5['name']) . '</div></td>';                                                 
                echo '</tr>';   
                echo '<tr>';
                  echo '<td>Capiccahuana</td>';
                  echo '<td>' . form_input($S5_5_6) . '<div class="help-block error">' . form_error($S5_5_6['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_6_C) . '<div class="help-block error">' . form_error($S5_5_6_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_6_1) . '<div class="help-block error">' . form_error($S5_5_6_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_6_2) . '<div class="help-block error">' . form_error($S5_5_6_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_6_3) . '<div class="help-block error">' . form_error($S5_5_6_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_6_4) . '<div class="help-block error">' . form_error($S5_5_6_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_6_5) . '<div class="help-block error">' . form_error($S5_5_6_5['name']) . '</div></td>';                                                 
                echo '</tr>';       
                echo '<tr>';
                  echo '<td>Chinchorro</td>';
                  echo '<td>' . form_input($S5_5_7) . '<div class="help-block error">' . form_error($S5_5_7['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_7_C) . '<div class="help-block error">' . form_error($S5_5_7_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_7_1) . '<div class="help-block error">' . form_error($S5_5_7_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_7_2) . '<div class="help-block error">' . form_error($S5_5_7_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_7_3) . '<div class="help-block error">' . form_error($S5_5_7_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_7_4) . '<div class="help-block error">' . form_error($S5_5_7_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_7_5) . '<div class="help-block error">' . form_error($S5_5_7_5['name']) . '</div></td>';                                                 
                echo '</tr>';          
                echo '<tr>';
                  echo '<td>Aissaccahuanna</td>';
                  echo '<td>' . form_input($S5_5_8) . '<div class="help-block error">' . form_error($S5_5_8['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_8_C) . '<div class="help-block error">' . form_error($S5_5_8_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_8_1) . '<div class="help-block error">' . form_error($S5_5_8_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_8_2) . '<div class="help-block error">' . form_error($S5_5_8_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_8_3) . '<div class="help-block error">' . form_error($S5_5_8_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_8_4) . '<div class="help-block error">' . form_error($S5_5_8_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_8_5) . '<div class="help-block error">' . form_error($S5_5_8_5['name']) . '</div></td>';                                                 
                echo '</tr>';     
                 echo '<tr>';
                  echo '<td>Otro</td>';
                  echo '<td>' . form_input($S5_5_9) . '<div class="help-block error">' . form_error($S5_5_9['name']) . '</div></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';       
                  echo '<td></div></td>';                                                 
                echo '</tr>';   
                echo '<tr>';
                  echo '<td>' . form_input($S5_5_9_O) . '<div class="help-block error">' . form_error($S5_5_9_O['name']) . '</div>Especifique</td>';
                  echo '<td></td>';
                  echo '<td>' . form_input($S5_5_9_C) . '<div class="help-block error">' . form_error($S5_5_9_C['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_9_1) . '<div class="help-block error">' . form_error($S5_5_9_1['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_9_2) . '<div class="help-block error">' . form_error($S5_5_9_2['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_9_3) . '<div class="help-block error">' . form_error($S5_5_9_3['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_9_4) . '<div class="help-block error">' . form_error($S5_5_9_4['name']) . '</div></td>';       
                  echo '<td>' . form_input($S5_5_9_5) . '<div class="help-block error">' . form_error($S5_5_9_5['name']) . '</div></td>';                                                 
                echo '</tr>';       

               	echo '<td><b>APAREJOS<b/></td>';
                  echo '<td></td>';
                  echo '<td>¿Cuántas?</td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';       
                  echo '<td></td>';  
                echo '</tr>';  

                echo '<tr>';
                  echo '<td>Lineas y anzuelos</td>';
                  echo '<td>' . form_input($S5_5_10) . '<div class="help-block error">' . form_error($S5_5_10['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_10_C) . '<div class="help-block error">' . form_error($S5_5_10_C['name']) . '</div></td>';                                              
                echo '</tr>';   
                echo '<tr>';
                  echo '<td>Arpón</td>';
                  echo '<td>' . form_input($S5_5_11) . '<div class="help-block error">' . form_error($S5_5_11['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_11_C) . '<div class="help-block error">' . form_error($S5_5_11_C['name']) . '</div></td>';                                              
                echo '</tr>';   
                echo '<tr>';
                  echo '<td>Farpa</td>';
                  echo '<td>' . form_input($S5_5_12) . '<div class="help-block error">' . form_error($S5_5_12['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_12_C) . '<div class="help-block error">' . form_error($S5_5_12_C['name']) . '</div></td>';                                              
                echo '</tr>';   
                echo '<tr>';
                  echo '<td>Espineles</td>';
                  echo '<td>' . form_input($S5_5_13) . '<div class="help-block error">' . form_error($S5_5_13['name']) . '</div></td>';
                  echo '<td>' . form_input($S5_5_13_C) . '<div class="help-block error">' . form_error($S5_5_13_C['name']) . '</div></td>';                                              
                echo '</tr>';   
                echo '<tr>';
                  echo '<td>Otro</td>';
                  echo '<td>' . form_input($S5_5_14) . '<div class="help-block error">' . form_error($S5_5_14['name']) . '</div></td>';
                  echo '<td></td>';                                              
                echo '</tr>';             
                echo '<tr>';
                  echo '<td>' . form_input($S5_5_14_O) . '<div class="help-block error">' . form_error($S5_5_14_O['name']) . '</div>Especifique</td>';
                  echo '<td></td>';
                  echo '<td>' . form_input($S5_5_14_C) . '<div class="help-block error">' . form_error($S5_5_14_C['name']) . '</div></td>';                                              
                echo '</tr>';  


               	echo '<td><b>TRAMPA<b/></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';       
                  echo '<td></td>';  
                echo '</tr>';  
                echo '<tr>';
                  echo '<td>Trampa</td>';
                  echo '<td>' . form_input($S5_5_15) . '<div class="help-block error">' . form_error($S5_5_15['name']) . '</div></td>';                                         
                echo '</tr>';  
                echo '<tr>';
                  echo '<td>Tapaje</td>';
                  echo '<td>' . form_input($S5_5_16) . '<div class="help-block error">' . form_error($S5_5_16['name']) . '</div></td>';                                         
                echo '</tr>';  
                echo '<tr>';
                  echo '<td>Otro</td>';
                  echo '<td>' . form_input($S5_5_17) . '<div class="help-block error">' . form_error($S5_5_17['name']) . '</div></td>';                                         
                echo '</tr>';                 
                echo '<tr>';
                  echo '<td>' . form_input($S5_5_17_O) . '<div class="help-block error">' . form_error($S5_5_17_O['name']) . '</div>Especifique</td>';
                  echo '<td></div></td>';                                         
                echo '</tr>';  
              echo '</tbody>';
            echo '</table>';		





				echo '</div>';	
		echo '</div>';				
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 5







////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN COLUMNA 1
	echo '</div>'; 	


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////COLUMNA 2
	echo '<div class="span6">';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 6
			echo '<div class="question">';
			echo '<p>6. ¿Qué especies extrae mayormente durante su faena de pesca?</p>';
				echo '<div class="row-fluid">';
					echo '<table class="table table-condensed span6" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span1 center">Tipo de Redes</th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Acarahuazu</td>';
					                  echo '<td>' . form_input($S5_6_1) . '<div class="help-block error">' . form_error($S5_6_1['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_1_C) . '<div class="help-block error">' . form_error($S5_6_1_C['name']) . '</div></td>'; 
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Bagre</td>';
					                  echo '<td>' . form_input($S5_6_2) . '<div class="help-block error">' . form_error($S5_6_2['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_2_C) . '<div class="help-block error">' . form_error($S5_6_2_C['name']) . '</div></td>'; 
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Bocón</td>';
					                  echo '<td>' . form_input($S5_6_3) . '<div class="help-block error">' . form_error($S5_6_3['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_3_C) . '<div class="help-block error">' . form_error($S5_6_3_C['name']) . '</div></td>';    
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Boquichico</td>';
					                  echo '<td>' . form_input($S5_6_4) . '<div class="help-block error">' . form_error($S5_6_4['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_4_C) . '<div class="help-block error">' . form_error($S5_6_4_C['name']) . '</div></td>';
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Bujurqui</td>';
					                  echo '<td>' . form_input($S5_6_5) . '<div class="help-block error">' . form_error($S5_6_5['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_5_C) . '<div class="help-block error">' . form_error($S5_6_5_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Camaron de rio</td>';
					                  echo '<td>' . form_input($S5_6_6) . '<div class="help-block error">' . form_error($S5_6_6['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_6_C) . '<div class="help-block error">' . form_error($S5_6_6_C['name']) . '</div></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Carachama</td>';
					                  echo '<td>' . form_input($S5_6_7) . '<div class="help-block error">' . form_error($S5_6_7['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_7_C) . '<div class="help-block error">' . form_error($S5_6_7_C['name']) . '</div></td>';
					               echo '</tr>'; 			
					               echo '<tr>';
					                  echo '<td>Carachi amarillo</td>';
					                  echo '<td>' . form_input($S5_6_8) . '<div class="help-block error">' . form_error($S5_6_8['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_8_C) . '<div class="help-block error">' . form_error($S5_6_8_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Carachi negro</td>';
					                  echo '<td>' . form_input($S5_6_9) . '<div class="help-block error">' . form_error($S5_6_9['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_9_C) . '<div class="help-block error">' . form_error($S5_6_9_C['name']) . '</div></td>';    
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Chambira</td>';
					                  echo '<td>' . form_input($S5_6_10) . '<div class="help-block error">' . form_error($S5_6_10['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_10_C) . '<div class="help-block error">' . form_error($S5_6_10_C['name']) . '</div></td>';      
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Chiochio</td>';
					                  echo '<td>' . form_input($S5_6_11) . '<div class="help-block error">' . form_error($S5_6_11['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_11_C) . '<div class="help-block error">' . form_error($S5_6_11_C['name']) . '</div></td>';     
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Corvina</td>';
					                  echo '<td>' . form_input($S5_6_12) . '<div class="help-block error">' . form_error($S5_6_12['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_12_C) . '<div class="help-block error">' . form_error($S5_6_12_C['name']) . '</div></td>';     
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Dentón</td>';
					                  echo '<td>' . form_input($S5_6_13) . '<div class="help-block error">' . form_error($S5_6_13['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_13_C) . '<div class="help-block error">' . form_error($S5_6_13_C['name']) . '</div></td>';    
					               echo '</tr>'; 		
					               echo '<tr>';
					                  echo '<td>Doncella</td>';
					                  echo '<td>' . form_input($S5_6_14) . '<div class="help-block error">' . form_error($S5_6_14['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_14_C) . '<div class="help-block error">' . form_error($S5_6_14_C['name']) . '</div></td>';       
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Dorado</td>';
					                  echo '<td>' . form_input($S5_6_15) . '<div class="help-block error">' . form_error($S5_6_15['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_15_C) . '<div class="help-block error">' . form_error($S5_6_15_C['name']) . '</div></td>';       
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Fasaco</td>';
					                  echo '<td>' . form_input($S5_6_16) . '<div class="help-block error">' . form_error($S5_6_16['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_16_C) . '<div class="help-block error">' . form_error($S5_6_16_C['name']) . '</div></td>';    
					               echo '</tr>'; 		
					               echo '<tr>';
					                  echo '<td>Ispi</td>';
					                  echo '<td>' . form_input($S5_6_17) . '<div class="help-block error">' . form_error($S5_6_17['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_17_C) . '<div class="help-block error">' . form_error($S5_6_17_C['name']) . '</div></td>';    
					               echo '</tr>'; 				
					               echo '<tr>';
					                  echo '<td>Langostino</td>';
					                  echo '<td>' . form_input($S5_6_18) . '<div class="help-block error">' . form_error($S5_6_18['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_18_C) . '<div class="help-block error">' . form_error($S5_6_18_C['name']) . '</div></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Lisa</td>';
					                  echo '<td>' . form_input($S5_6_19) . '<div class="help-block error">' . form_error($S5_6_19['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_19_C) . '<div class="help-block error">' . form_error($S5_6_19_C['name']) . '</div></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Llambina</td>';
					                  echo '<td>' . form_input($S5_6_20) . '<div class="help-block error">' . form_error($S5_6_20['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_20_C) . '<div class="help-block error">' . form_error($S5_6_20_C['name']) . '</div></td>'; 
					               echo '</tr>'; 		
					               echo '<tr>';
					                  echo '<td>Manitoa</td>';
					                  echo '<td>' . form_input($S5_6_21) . '<div class="help-block error">' . form_error($S5_6_21['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_21_C) . '<div class="help-block error">' . form_error($S5_6_21_C['name']) . '</div></td>';   
					               echo '</tr>'; 		
					               echo '<tr>';
					                  echo '<td>Maparate</td>';
					                  echo '<td>' . form_input($S5_6_22) . '<div class="help-block error">' . form_error($S5_6_22['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_22_C) . '<div class="help-block error">' . form_error($S5_6_22_C['name']) . '</div></td>'; 
					               echo '</tr>'; 					               			               			               					               						               		               			               				               					               			               					               					               						               				               					               		               					               					               					               					               					                          
			              echo '</tbody>';
			            echo '</table>';	

						echo '<table class="table table-condensed span6" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span1 center">Tipo de Redes</th>';
					                echo '</tr>';
					              echo '</thead>';		
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Mauri</td>';
					                  echo '<td>' . form_input($S5_6_23) . '<div class="help-block error">' . form_error($S5_6_23['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_23_C) . '<div class="help-block error">' . form_error($S5_6_23_C['name']) . '</div></td>';     
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Mota</td>';
					                  echo '<td>' . form_input($S5_6_24) . '<div class="help-block error">' . form_error($S5_6_24['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_24_C) . '<div class="help-block error">' . form_error($S5_6_24_C['name']) . '</div></td>';    
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Novia</td>';
					                  echo '<td>' . form_input($S5_6_25) . '<div class="help-block error">' . form_error($S5_6_25['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_25_C) . '<div class="help-block error">' . form_error($S5_6_25_C['name']) . '</div></td>';    
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Paco</td>';
					                  echo '<td>' . form_input($S5_6_26) . '<div class="help-block error">' . form_error($S5_6_26['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_26_C) . '<div class="help-block error">' . form_error($S5_6_26_C['name']) . '</div></td>';  
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Palometa</td>';
					                  echo '<td>' . form_input($S5_6_27) . '<div class="help-block error">' . form_error($S5_6_27['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_27_C) . '<div class="help-block error">' . form_error($S5_6_27_C['name']) . '</div></td>';    
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Paña, piraña</td>';
					                  echo '<td>' . form_input($S5_6_28) . '<div class="help-block error">' . form_error($S5_6_28['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_28_C) . '<div class="help-block error">' . form_error($S5_6_28_C['name']) . '</div></td>'; 
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Pejerrey</td>';
					                  echo '<td>' . form_input($S5_6_29) . '<div class="help-block error">' . form_error($S5_6_29['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_29_C) . '<div class="help-block error">' . form_error($S5_6_29_C['name']) . '</div></td>'; 
					               echo '</tr>'; 			
					               echo '<tr>';
					                  echo '<td>Ractacara</td>';
					                  echo '<td>' . form_input($S5_6_30) . '<div class="help-block error">' . form_error($S5_6_30['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_30_C) . '<div class="help-block error">' . form_error($S5_6_30_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Sabalo</td>';
					                  echo '<td>' . form_input($S5_6_31) . '<div class="help-block error">' . form_error($S5_6_31['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_31_C) . '<div class="help-block error">' . form_error($S5_6_31_C['name']) . '</div></td>';    
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Sardina</td>';
					                  echo '<td>' . form_input($S5_6_32) . '<div class="help-block error">' . form_error($S5_6_32['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_32_C) . '<div class="help-block error">' . form_error($S5_6_32_C['name']) . '</div></td>';      
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Shiripira</td>';
					                  echo '<td>' . form_input($S5_6_33) . '<div class="help-block error">' . form_error($S5_6_33['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_33_C) . '<div class="help-block error">' . form_error($S5_6_33_C['name']) . '</div></td>';     
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Shuyo</td>';
					                  echo '<td>' . form_input($S5_6_34) . '<div class="help-block error">' . form_error($S5_6_34['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_34_C) . '<div class="help-block error">' . form_error($S5_6_34_C['name']) . '</div></td>';     
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Tilapia</td>';
					                  echo '<td>' . form_input($S5_6_35) . '<div class="help-block error">' . form_error($S5_6_35['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_35_C) . '<div class="help-block error">' . form_error($S5_6_35_C['name']) . '</div></td>';     
					               echo '</tr>'; 		
					               echo '<tr>';
					                  echo '<td>Trucha</td>';
					                  echo '<td>' . form_input($S5_6_36) . '<div class="help-block error">' . form_error($S5_6_36['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_36_C) . '<div class="help-block error">' . form_error($S5_6_36_C['name']) . '</div></td>';       
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Yahuarachi</td>';
					                  echo '<td>' . form_input($S5_6_37) . '<div class="help-block error">' . form_error($S5_6_37['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_37_C) . '<div class="help-block error">' . form_error($S5_6_37_C['name']) . '</div></td>';         
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>Yaraqui</td>';
					                  echo '<td>' . form_input($S5_6_38) . '<div class="help-block error">' . form_error($S5_6_38['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_38_C) . '<div class="help-block error">' . form_error($S5_6_38_C['name']) . '</div></td>';     
					               echo '</tr>'; 		
					               echo '<tr>';
					                  echo '<td>Yulilla</td>';
					                  echo '<td>' . form_input($S5_6_39) . '<div class="help-block error">' . form_error($S5_6_39['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_39_C) . '<div class="help-block error">' . form_error($S5_6_39_C['name']) . '</div></td>';    
					               echo '</tr>'; 				
					               echo '<tr>';
					                  echo '<td>Zungaro</td>';
					                  echo '<td>' . form_input($S5_6_40) . '<div class="help-block error">' . form_error($S5_6_40['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_40_C) . '<div class="help-block error">' . form_error($S5_6_40_C['name']) . '</div></td>';   
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_41) . '<div class="help-block error">' . form_error($S5_6_41['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>'; 

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_41_O) . '<div class="help-block error">' . form_error($S5_6_41_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_41_C) . '<div class="help-block error">' . form_error($S5_6_41_C['name']) . '</div></td>'; 
					               echo '</tr>'; 				               			               			               					               						               		               			               				               					               			               					               					               						               				               					               		               					               					               					               					               					                          
			              echo '</tbody>';					              				
						echo '</table>';
					echo '</div>';		
					echo '<h4>Peces Ornamentales</h4>';
					echo '<div class="row-fluid">';
						echo '<table class="table table-condensed span6" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span1 center">Tipo de Redes</th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Anguila eléctrica</td>';
					                  echo '<td>' . form_input($S5_6_42) . '<div class="help-block error">' . form_error($S5_6_42['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_42_C) . '<div class="help-block error">' . form_error($S5_6_42_C['name']) . '</div></td>';     
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Arahuana</td>';
					                  echo '<td>' . form_input($S5_6_43) . '<div class="help-block error">' . form_error($S5_6_43['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_43_C) . '<div class="help-block error">' . form_error($S5_6_43_C['name']) . '</div></td>';     
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Coydoras jumbo</td>';
					                  echo '<td>' . form_input($S5_6_44) . '<div class="help-block error">' . form_error($S5_6_44['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_44_C) . '<div class="help-block error">' . form_error($S5_6_44_C['name']) . '</div></td>';
					               echo '</tr>';  	
					               echo '<tr>';
					                  echo '<td>Escalar amazónico</td>';
					                  echo '<td>' . form_input($S5_6_45) . '<div class="help-block error">' . form_error($S5_6_45['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_45_C) . '<div class="help-block error">' . form_error($S5_6_45_C['name']) . '</div></td>';  
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Neón tetra</td>';
					                  echo '<td>' . form_input($S5_6_46) . '<div class="help-block error">' . form_error($S5_6_46['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_6_46_C) . '<div class="help-block error">' . form_error($S5_6_46_C['name']) . '</div></td>'; 
					               echo '</tr>';  					                						               				               					               
			              echo '</tbody>';
			            echo '</table>';	

						echo '<table class="table table-condensed span6" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span1 center">Tipo de Redes</th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Pez disco</td>';
					                  echo '<td>' . form_input($S5_6_47) . '<div class="help-block error">' . form_error($S5_6_47['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_47_C) . '<div class="help-block error">' . form_error($S5_6_47_C['name']) . '</div></td>';     
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Tucunare</td>';
					                  echo '<td>' . form_input($S5_6_48) . '<div class="help-block error">' . form_error($S5_6_48['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_48_C) . '<div class="help-block error">' . form_error($S5_6_48_C['name']) . '</div></td>';     
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_49) . '<div class="help-block error">' . form_error($S5_6_49['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_49_O) . '<div class="help-block error">' . form_error($S5_6_49_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_49_C) . '<div class="help-block error">' . form_error($S5_6_49_C['name']) . '</div></td>'; 
					               echo '</tr>';

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_50) . '<div class="help-block error">' . form_error($S5_6_50['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_50_O) . '<div class="help-block error">' . form_error($S5_6_50_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_50_C) . '<div class="help-block error">' . form_error($S5_6_50_C['name']) . '</div></td>'; 
					               echo '</tr>'; 

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_51) . '<div class="help-block error">' . form_error($S5_6_51['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_51_O) . '<div class="help-block error">' . form_error($S5_6_51_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_51_C) . '<div class="help-block error">' . form_error($S5_6_51_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_52) . '<div class="help-block error">' . form_error($S5_6_52['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_52_O) . '<div class="help-block error">' . form_error($S5_6_52_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_52_C) . '<div class="help-block error">' . form_error($S5_6_52_C['name']) . '</div></td>'; 
					               echo '</tr>'; 

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_53) . '<div class="help-block error">' . form_error($S5_6_53['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_53_O) . '<div class="help-block error">' . form_error($S5_6_53_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_53_C) . '<div class="help-block error">' . form_error($S5_6_53_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_54) . '<div class="help-block error">' . form_error($S5_6_54['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_54_O) . '<div class="help-block error">' . form_error($S5_6_54_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_54_C) . '<div class="help-block error">' . form_error($S5_6_54_C['name']) . '</div></td>'; 
					               echo '</tr>'; 

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_55) . '<div class="help-block error">' . form_error($S5_6_55['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_55_O) . '<div class="help-block error">' . form_error($S5_6_55_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_55_C) . '<div class="help-block error">' . form_error($S5_6_55_C['name']) . '</div></td>'; 
					               echo '</tr>'; 

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_56) . '<div class="help-block error">' . form_error($S5_6_56['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_56_O) . '<div class="help-block error">' . form_error($S5_6_56_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_56_C) . '<div class="help-block error">' . form_error($S5_6_56_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_57) . '<div class="help-block error">' . form_error($S5_6_57['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_57_O) . '<div class="help-block error">' . form_error($S5_6_57_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_57_C) . '<div class="help-block error">' . form_error($S5_6_57_C['name']) . '</div></td>'; 
					               echo '</tr>'; 	

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_58) . '<div class="help-block error">' . form_error($S5_6_58['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_58_O) . '<div class="help-block error">' . form_error($S5_6_58_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_58_C) . '<div class="help-block error">' . form_error($S5_6_58_C['name']) . '</div></td>'; 
					               echo '</tr>'; 

					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_6_59) . '<div class="help-block error">' . form_error($S5_6_59['name']) . '</div></td>';   
					                  echo '<td></td>'; 
					               echo '</tr>';  	

					               echo '<tr>';
					                  echo '<td>Especifique</td>';
					                  echo '<td>' . form_input($S5_6_59_O) . '<div class="help-block error">' . form_error($S5_6_59_O['name']) . '</div></td>';   
					                  echo '<td>' . form_input($S5_6_59_C) . '<div class="help-block error">' . form_error($S5_6_59_C['name']) . '</div></td>'; 
					               echo '</tr>'; 
			              echo '</tbody>';
			            echo '</table>';

				echo '</div>';	
		echo '</div>';						               
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 6		


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 7
		echo '<div class="question">';
			echo '<p>7. ¿Su condición de pescador es:</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S5_7); 
									echo '<div class="help-block error">' . form_error($S5_7['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';							
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 7

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 8
		echo '<div class="question">';
			echo '<p>8. ¿Cuál es el lugar de desembarque?</p>';	
				echo '<div class="row-fluid">';
						echo '<table class="table table-condensed" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span5"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span5 center">Nombre</th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Puerto</td>';
					                  echo '<td>' . form_input($S5_8_1) . '<div class="help-block error">' . form_error($S5_8_1['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_8_1_1) . '<div class="help-block error">' . form_error($S5_8_1_1['name']) . '</div></td>'; 
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Playa</td>';
					                  echo '<td>' . form_input($S5_8_2) . '<div class="help-block error">' . form_error($S5_8_2['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_8_2_1) . '<div class="help-block error">' . form_error($S5_8_2_1['name']) . '</div></td>'; 
					               echo '</tr>';  
					               echo '<tr>';
					                  echo '<td>Desembarcadero pesquero artesanal</td>';
					                  echo '<td>' . form_input($S5_8_3) . '<div class="help-block error">' . form_error($S5_8_3['name']) . '</div></td>';
					                  echo '<td>' . form_input($S5_8_3_1) . '<div class="help-block error">' . form_error($S5_8_3_1['name']) . '</div></td>'; 
					               echo '</tr>'; 					                					                						               				               					               
					               echo '<tr>';
					                  echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_8_4) . '<div class="help-block error">' . form_error($S5_8_4['name']) . '</div></td>';
					                  echo '<td></td>'; 
					               echo '</tr>'; 	
					               echo '<tr>';
					                  echo '<td>' . form_input($S5_8_4_O) . '<div class="help-block error">' . form_error($S5_8_4_O['name']) . '</div>Especifique</td>';
					                  echo '<td></td>';
					                  echo '<td>' . form_input($S5_8_4_1) . '<div class="help-block error">' . form_error($S5_8_4_1['name']) . '</div></td>'; 
					               echo '</tr>'; 					               					               
			              echo '</tbody>';
			            echo '</table>';	
				echo '</div>';	
		echo '</div>';				            
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 8

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 9
		echo '<div class="question">';
			echo '<p>9. ¿Qué problemas encuentra en su actividad de pesca?</p>';	
				echo '<div class="row-fluid">';
						echo '<table class="table table-condensed" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span4"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span2"></th>';
					                  echo '<th class="span4"></th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Cambios climáticos</td>';
					                  echo '<td>' . form_input($S5_9_1) . '<div class="help-block error">' . form_error($S5_9_1['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Contaminación del agua</td>';
					                  echo '<td>' . form_input($S5_9_2) . '<div class="help-block error">' . form_error($S5_9_2['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>';  
					               echo '<tr>';
					                  echo '<td>Falta de financiamiento</td>';
					                  echo '<td>' . form_input($S5_9_3) . '<div class="help-block error">' . form_error($S5_9_3['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 					                					                						               				               					               
					               echo '<tr>';
					                  echo '<td>Altos costos de equipos, materiales e insumos</td>';
					                  echo '<td>' . form_input($S5_9_4) . '<div class="help-block error">' . form_error($S5_9_4['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 	
					               echo '<tr>';
					               		echo '<td>Conflictos por utilización de las fuentes hídricas</td>';
					                  	echo '<td>' . form_input($S5_9_5) . '<div class="help-block error">' . form_error($S5_9_5['name']) . '</div></td>';
					               	  	echo '<td></td>'; 
					               	 	echo '<td></td>';					               
					               echo '</tr>'; 
					               echo '<tr>';
					               	  echo '<td>Falta de sistemas de frio para preservar la producción</td>';
					                  echo '<td>' . form_input($S5_9_6) . '<div class="help-block error">' . form_error($S5_9_6['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 
					               echo '<tr>';
					               		echo '<td>Falta de capacitación y asistencia técnica</td>';
					                  echo '<td>' . form_input($S5_9_7) . '<div class="help-block error">' . form_error($S5_9_7['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					              
					               echo '</tr>'; 		
					               echo '<tr>';
					               		echo '<td>Infraestructura inadecuada</td>';
					                  echo '<td>' . form_input($S5_9_8) . '<div class="help-block error">' . form_error($S5_9_8['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					              
					               echo '</tr>'; 
					               echo '<tr>';
					               		echo '<td>Falta de vías de acceso</td>';
					                  echo '<td>' . form_input($S5_9_9) . '<div class="help-block error">' . form_error($S5_9_9['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 	
					               echo '<tr>';
					               		echo '<td>Pesca indiscriminada</td>';
					                  echo '<td>' . form_input($S5_9_10) . '<div class="help-block error">' . form_error($S5_9_10['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 
					               echo '<tr>';
					               		echo '<td>Inseguridad ciudadana</td>';
					                  echo '<td>' . form_input($S5_9_11) . '<div class="help-block error">' . form_error($S5_9_11['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 	
					               echo '<tr>';
					               		echo '<td>Uso de productos tóxicos</td>';
					                  echo '<td>' . form_input($S5_9_12) . '<div class="help-block error">' . form_error($S5_9_12['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 
					               echo '<tr>';
					               		echo '<td>Uso de explosivos</td>';
					                  echo '<td>' . form_input($S5_9_13) . '<div class="help-block error">' . form_error($S5_9_13['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';					               
					               echo '</tr>'; 
					               echo '<tr>';
					              		 echo '<td>Otro</td>';
					                  echo '<td>' . form_input($S5_9_14) . '<div class="help-block error">' . form_error($S5_9_14['name']) . '</div></td>';
					               	  echo '<td>Especifique</td>'; 
					               	  echo '<td>' . form_input($S5_9_14_O) . '<div class="help-block error">' . form_error($S5_9_14_O['name']) . '</div></td>';					              
					               echo '</tr>'; 					               
					               echo '<tr>';
					               		echo '<td>NINGUNO</td>';
					                  echo '<td>' . form_input($S5_9_15) . '<div class="help-block error">' . form_error($S5_9_15['name']) . '</div></td>';
					               	  echo '<td></td>'; 
					               	  echo '<td></td>';						              
					               echo '</tr>'; 						               				               					               					               				               					               				               						               			               
			              echo '</tbody>';
			            echo '</table>';	
				echo '</div>';	
		echo '</div>';	
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 9

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 10
				echo '<div class="question">';
			echo '<p>10. En los últimos 5 años, ¿Cree usted que:</p>';	
				echo '<div class="row-fluid">';
						echo '<table class="table table-condensed" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span5"></th>';
					                  echo '<th class="span2"></th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>1. La cantidad de peces</td>';
					                  echo '<td>' . form_input($S5_10_1) . '<div class="help-block error">' . form_error($S5_10_1['name']) . '</div></td>';
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>2. La variedad de peces</td>';
					                  echo '<td>' . form_input($S5_10_2) . '<div class="help-block error">' . form_error($S5_10_2['name']) . '</div></td>';
					               echo '</tr>';  
					               echo '<tr>';
					                  echo '<td>3. El tamaño de peces</td>';
					                  echo '<td>' . form_input($S5_10_3) . '<div class="help-block error">' . form_error($S5_10_3['name']) . '</div></td>';
					               echo '</tr>'; 					                					                						               				               					               					               
			              echo '</tbody>';
			            echo '</table>';	
				echo '</div>';	
		echo '</div>';		
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 10

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN COLUMNA 2
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
//FIN COLUMNAS SECCION V
	echo '</div>'; 
echo '</div>'; 
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 	

 ?>


<script type="text/javascript">

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){
// $("#S5_2_DD_COD, #S5_2_PP_COD, #S5_2_DI_COD, #S5_2_CCPP_COD").change(function(event) {
//         var sel = null;
//         var dep = $('#S5_2_DD_COD');
//         var prov = $('#S5_2_PP_COD');
//         var dist = $('#S5_2_DI_COD');
//         var url = null;
//         var cod = null;
//         var op =null;

//         var mivalue = ($(this).val() == -1) ? '-' : $(this).val();
//         switch(event.target.id){
//             case 'S5_2_DD_COD':
//                 sel     = $("#S5_2_PP_COD");
//                 //$('#CCDD').val(mivalue); 
//                 url     = CI.base_url + "ajax/ubigeo_ajax/get_ajax_prov/" + $(this).val();
//                 op      = 1;
//                 break;

//             case 'S5_2_PP_COD':
//                 sel     = $("#S5_2_DI_COD");
//                 // $('#CCPP').val(mivalue);                 
//                 url     = CI.base_url + "ajax/ubigeo_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
//                 op      = 2;
//                 break;

//             case 'S5_2_DI_COD':
//                 sel     = $("#S5_2_CCPP_COD");
//                 // $("#CCDI").val(mivalue);          
//                 url     = CI.base_url + "ajax/ubigeo_ajax/get_ajax_ccpp_all/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
//                 op      = 3;
//                 break;  

//             case 'S5_2_CCPP_COD':
//                 // $("#COD_CCPP").val(mivalue);           
//                 break;  
//         }     
        
//         var form_data = {
//             code: $(this).val(),
//             csrf_token_c: CI.cct,
//             dep: dep.val(),
//             prov:prov.val(),
//             dist:dist.val(),
//             ajax:1
//         };

//         if(event.target.id != 'S5_2_CCPP_COD')
//         {

//         $.ajax({
//             url: url,
//             type:'POST',
//             data:form_data,
//             dataType:'json',
//             success:function(json_data){
//                 sel.empty();
//                 sel.append('<option value="-1"> - </option>');
//                 // if (op==3){
//                 //     sel.append('<option value="-1"> - </option>');
//                 // }                
//                 $.each(json_data, function(i, data){
//                     if (op==1){
//                         sel.append('<option value="' + data.COD_PROVINCIA + '">' + data.DES_DISTRITO + '</option>');
//                     }
//                     if (op==2){
//                         sel.append('<option value="' + data.COD_DISTRITO + '">' + data.DES_DISTRITO + '</option>');
//                    }
//                     if (op==3){
//                         sel.append('<option value="' + data.CCPP + '">' + data.CENTRO_POBLADO + '</option>');}
//                 });
               
//                 if (op==1){
//                     $("#S5_2_PP_COD").trigger('change');
//                     }  
//                 if (op==2){
//                     $("#S5_2_DI_COD").trigger('change');
//                 }
//                 if (op==3){
//                     $("#S5_2_CCPP_COD").trigger('change');
//                 }


//             }
//         });   
//      }
  
// }); 


$("#S5_2_DD_COD").change(function(event) {
        var sel = null;
        var urlx = null;
        switch(event.target.id){
            case 'S5_2_DD_COD':
                sel = $("#S5_2_PP_COD");
                urlx = CI.base_url + "ajax/ubigeo_ajax/get_ajax_prov/" + $(this).val();
                break;                
        }

        var form_data = {
            csrf_token_c: CI.cct,
            code: $(this).val(),
            ajax:1
        };

        $.ajax({
            url: urlx,
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

$("#S5_2_PP_COD").change(function(event) {
        var sel = null;
        var dep = null;
        var urlx = null;
        switch(event.target.id){
            case 'S5_2_PP_COD':
                sel = $("#S5_2_DI_COD");
                dep = $("#S5_2_DD_COD");
                urlx = CI.base_url + "ajax/ubigeo_ajax/get_ajax_dist/" + $(this).val() + "/" + dep.val();
                break;                
        }     
           
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            ajax:1
        };

        $.ajax({
            url: urlx,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1">-</option>');
                $.each(json_data, function(i, data){
                	sel.append('<option value="' + data.COD_DISTRITO + '">' + data.DES_DISTRITO + '</option>');
                });
                if(event.target.id == 'S5_2_PP_COD')
                	sel.change();
            }
        });           
});

$("#S5_2_DI_COD").change(function(event) {
        var sel = null;
        var dep = null;
        var prov = null;
        var urlx = null;
        switch(event.target.id){
            case 'S5_2_DI_COD':
                sel = $("#S5_2_CCPP_COD");
                dep = $("#S5_2_DD_COD");
                prov = $("#S5_2_PP_COD");
                urlx = CI.base_url + "ajax/ccpp_ajax/get_ajax_ccpp/" + dep.val() + "/" + prov.val() + "/" + $(this).val();
                break;                
        }     
           
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            prov: prov.val(),
            ajax:1
        };

        $.ajax({
            url: urlx,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1">-</option>');
                $.each(json_data, function(i, data){
                	sel.append('<option value="' + data.COD_CCPP + '">' + data.CENTRO_POBLADO + '</option>');
                });
            }
        });           
});

$('#S5_2_2').change(function() {
	var s5p2 = $('#S5_2_DD_COD, #S5_2_PP_COD, #S5_2_DI_COD, #S5_2_CCPP_COD');
	var th = $(this).val();
	if( th == 0 || th == 9){	
		s5p2.val('')
		s5p2.attr("disabled", "disabled"); 
	}else{
		s5p2.removeAttr('disabled');
	}	
});

$('#S5_3').change(function() {
	var s5p3 = $('#S5_3_H, #S5_3_M');
	var th = $(this).val();
	if( th == 1 ){	
		s5p3.removeAttr('disabled');	
	}else{
		s5p3.val('')
		s5p3.attr("disabled", "disabled"); 			
	}		
});

$('#S5_4').change(function() {
	var s5p4 = $('#S5_4_H, #S5_4_M');
	var th = $(this).val();
	if( th == 1 ){	
		s5p4.removeAttr('disabled');	
	}else{
		s5p4.val('')
		s5p4.attr("disabled", "disabled"); 			
	}		
});


$('#S5_7').change(function() {
	var s5p7 = $('#S5_8_1, #S5_8_1_1, #S5_8_2, #S5_8_2, #S5_8_2_1, #S5_8_3, #S5_8_3_1, #S5_8_4, #S5_8_4_O, #S5_8_4_1');
	var th = $(this).val();
	if( th == 2 ){	
		s5p7.val('')
		s5p7.attr("disabled", "disabled"); 		
	}else{
		s5p7.removeAttr('disabled');
		$('#S5_8_4_O, #S5_8_4_1').val('');
		$('#S5_8_4_O, #S5_8_4_1').attr("disabled", "disabled"); 	
	}		
});



//Estudia hijo?
$('.red5').change(function() {
	var pre = $(this).attr('id');
	var npreg = pre.substring(5,6);

	if($(this).val() == 0){
		$('#S5_5_' + npreg + '_C').val('');
		$('#S5_5_' + npreg + '_C').attr("disabled", "disabled"); 
		$('#S5_5_' + npreg + '_1').val('');
		$('#S5_5_' + npreg + '_1').attr("disabled", "disabled"); 
		$('#S5_5_' + npreg + '_2').val('');
		$('#S5_5_' + npreg + '_2').attr("disabled", "disabled"); 
		$('#S5_5_' + npreg + '_3').val('');
		$('#S5_5_' + npreg + '_3').attr("disabled", "disabled"); 
		$('#S5_5_' + npreg + '_4').val('');
		$('#S5_5_' + npreg + '_4').attr("disabled", "disabled"); 
		$('#S5_5_' + npreg + '_5').val('');
		$('#S5_5_' + npreg + '_5').attr("disabled", "disabled"); 	
	}else{
		$('#S5_5_' + npreg + '_C' ).removeAttr('disabled');
		$('#S5_5_' + npreg + '_1' ).removeAttr('disabled');
		$('#S5_5_' + npreg + '_2' ).removeAttr('disabled');
		$('#S5_5_' + npreg + '_3' ).removeAttr('disabled');
		$('#S5_5_' + npreg + '_4' ).removeAttr('disabled');
		$('#S5_5_' + npreg + '_5' ).removeAttr('disabled');
	}
});


$('.aparejo5').change(function() {
	var pre = $(this).attr('id');
	var npreg = pre.substring(5,7);

	if($(this).val() == 0){
		$('#S5_5_' + npreg + '_C').val('');
		$('#S5_5_' + npreg + '_C').attr("disabled", "disabled"); 
	}else{
		$('#S5_5_' + npreg + '_C' ).removeAttr('disabled');
	}
});

$('.especie').change(function() {
	var pre = $(this).attr('id');
	var npreg = pre.substring(5,7);

	if($(this).val() == 0 || $(this).val() == 9){
		$('#S5_6_' + npreg + '_C').val('');
		$('#S5_6_' + npreg + '_C').attr("disabled", "disabled"); 
	}else{
		$('#S5_6_' + npreg + '_C' ).removeAttr('disabled');
	}
});

$('#S5_1_1, #S5_1_2, #S5_1_3, #S5_1_4, #S5_1_5, #S5_1_6, #S5_1_7, #S5_8_1, #S5_8_2, #S5_8_3, #S5_8_4').change(function() {
	var th = $(this).val();
	var des = $('#' + $(this).attr('id') + '_1');
	if(th == 1){
		des.removeAttr('disabled');
	}else{
		des.val('')
		des.attr("disabled", "disabled"); 
	}
});


$('#S5_1_8').change(function() {
	var th = $(this).val();
	var des = $('#S5_1_8_O, #S5_1_8_1');
	if(th == 1){
		des.removeAttr('disabled');
	}else{
		des.val('')
		des.attr("disabled", "disabled"); 
	}
});


$('#S5_6_41, #S5_6_49, #S5_6_50, #S5_6_51, #S5_6_52, #S5_6_53, #S5_6_54, #S5_6_55, #S5_6_56, #S5_6_57, #S5_6_58, #S5_6_59, #S5_9_14,#S5_5_9, #S5_5_14, #S5_5_17').change(function() {
	var th = $(this).val();
	var des = $('#' + $(this).attr('id') + '_O');
	if(th == 1){
		des.removeAttr('disabled');
	}else{
		des.val('')
		des.attr("disabled", "disabled"); 
	}
});


$('#S5_8_4').change(function() {
	var th = $(this).val();
	var des = $('#S5_8_4_O, #S5_8_4_1');
	if(th == 1){
		des.removeAttr('disabled');
	}else{
		des.val('')
		des.attr("disabled", "disabled"); 
	}
});


$('#S5_2_PP_COD').change(function() {
    var ugo = $('#S5_2_PP_O');
    if($(this).val() == -1){
		ugo.removeAttr('disabled');
    }else{
 		ugo.val('');     
		ugo.attr("disabled", "disabled"); 
    }
   
});

$('#S5_2_DI_COD').change(function() {
    var ugo = $('#S5_2_DI_O');
    if($(this).val() == -1){
		ugo.removeAttr('disabled');
    }else{
 		ugo.val('');     
		ugo.attr("disabled", "disabled"); 
    }
   
});

$('#S5_2_CCPP_COD').change(function() {
    var ugo = $('#S5_2_CCPP_O');
    if($(this).val() == -1){
		ugo.removeAttr('disabled');
    }else{
 		ugo.val('');     
		ugo.attr("disabled", "disabled"); 
    }
   
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//Campos deshabilitados
 $('#S5_1_1_1, #S5_1_2_1, #S5_1_3_1, #S5_1_4_1, #S5_1_5_1, #S5_1_6_1, #S5_1_7_1, #S5_1_8_O, #S5_1_8_1, #S5_6_41_O, #S5_6_49_O, #S5_6_50_O, #S5_6_51_O, #S5_6_52_O, #S5_6_53_O, #S5_6_54_O, #S5_6_55_O, #S5_6_56_O, #S5_6_57_O, #S5_6_58_O, #S5_6_59_O, #S5_8_4_O ,#S5_8_4_1, #S5_9_14_O, #S5_5_9_O, #S5_8_1_1, #S5_8_2_1, #S5_8_3_1, #S5_2_PP_O, #S5_2_DI_O, #S5_2_CCPP_O').attr("disabled", "disabled");
$('#S5_2_DD_COD').trigger("change");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

	// $("#seccion5").on("submit", function(event) {
	// 	$('#seccion5').trigger('validate');
 // 	});
		//validacion
		$("#seccion5").validate({
		    rules: {           
		    	S5_1_1: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_1_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 
		    	S5_1_2: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_2_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 
		    	S5_1_3: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_3_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 	
		    	S5_1_4: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_4_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 
		    	S5_1_5: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_5_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 
		    	S5_1_6: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_6_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 	
		    	S5_1_7: {
		            digits: true,
		            valrango: [0,1,9],
		         },     
		    	S5_1_7_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 	
		    	S5_1_8: {
		            digits: true,
		            valrango: [0,1,9],
		            valzero: ['S5_1_1','S5_1_2','S5_1_3','S5_1_4','S5_1_5','S5_1_6','S5_1_7'],
		         },     
		    	S5_1_8_O: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 		         
		    	S5_1_8_1: {
		    		required:true,
					maxlength: 50,
					validName:true,
		         }, 
		    	S5_2_1: {
		            digits: true,
		            valrango: [0,1,9],
		         }, 
		    	S5_2_2: {
		            digits: true,
		            valrango: [0,1,9],
		            valzero: ['S5_2_1'],
		         }, 	

		        S5_2_DD_COD:{
           			valueNotEquals: -1,
		         }, 		
		        // S5_2_PP_COD:{
          //  			valueNotEquals: -1,
		        //  }, 			
		        // S5_2_DI_COD:{
          //  			valueNotEquals: -1,
		        //  }, 	
		        // S5_2_CCPP_COD:{
          //  			valueNotEquals: -1,
		        //  }, 
		        S5_2_PP_O:{
		        	required:true,
           			validName: true,
		         }, 			
		        S5_2_DI_O:{
		        	required:true,
           			validName: true,
		         }, 	
		        S5_2_CCPP_O:{
		        	required:true,
           			validName: true,
		         }, 
		    	S5_3: {
		            digits: true,
		            valrango: [1,4,9],
		         }, 
		    	S5_3_H: {
		            digits: true,
		            valrango: [0,23,99],
		         }, 
		    	S5_3_M: {
		            digits: true,
		            valrango: [0,59,99],
		         }, 	
		    	S5_4: {
		            digits: true,
		            valrango: [1,4,9],
		         }, 
		    	S5_4_H: {
		            digits: true,
		            valrango: [0,23,99],
		         }, 
		    	S5_4_M: {
		            digits: true,
		            valrango: [0,59,99],
		         }, 
//redes
//red1
		    	S5_5_1: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_1_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_1_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_1_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_1_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_1_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_1_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	
//red1
		    	S5_5_2: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_2_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_2_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_2_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_2_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_2_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_2_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	
//red1
		    	S5_5_3: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_3_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_3_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_3_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_3_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_3_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_3_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1		
//red1
		    	S5_5_4: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_4_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_4_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_4_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_4_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_4_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_4_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	        
//red1
		    	S5_5_5: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_5_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_5_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_5_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_5_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_5_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		

		    	S5_5_5_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	  	      
//red1
		    	S5_5_6: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_6_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_6_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_6_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_6_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_6_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_6_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	  
//red1
		    	S5_5_7: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_7_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_7_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_7_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_7_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_7_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_7_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	 	
//red1
		    	S5_5_8: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_8_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_8_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_8_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_8_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_8_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_8_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	 	
//red1
		    	S5_5_9: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_9_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },			         
		    	S5_5_9_C: {
		            digits: true,
		            valrango: [0,100,999],
		         },		
		    	S5_5_9_1: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_9_2: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_9_3: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },	
		    	S5_5_9_4: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
		    	S5_5_9_5: {
		            number: true,
		            valrango: [0,20.00,99.99],
		         },		
//end red1	 	    


//aparejo
		    	S5_5_10: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_10_C: {
		            digits: true,
		            valrango: [1,20,99],
		         },	
//aparejo
//aparejo
		    	S5_5_11: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_11_C: {
		            digits: true,
		            valrango: [1,20,99],
		         },	
//aparejo
//aparejo
		    	S5_5_12: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_12_C: {
		            digits: true,
		           valrango: [1,20,99],
		         },	
//aparejo

//aparejo
		    	S5_5_13: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_13_C: {
		            digits: true,
		            valrango: [1,20,99],
		         },	
//aparejo
//aparejo
		    	S5_5_14: {
		    		required:true,
		            digits: true,
		            range:[0,1],
		         },	
		    	S5_5_14_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },			         
		    	S5_5_14_C: {
		            digits: true,
		            valrango: [1,20,99],
		         },	
//aparejo
//trampa
		    	S5_5_15: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
//trampa
//trampa
		    	S5_5_16: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
//trampa
//trampa
		    	S5_5_17: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_5_17_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },			         
//trampa
//especie
		    	S5_6_1: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_1_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_2: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_2_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_3: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_3_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_4: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_4_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_5: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_5_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_6: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_6_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_7: {
		            digits: true,
		             valrango: [0,1,9],
		         },	
		    	S5_6_7_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_8: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_8_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_9: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_9_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_10: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_10_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_11: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_11_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_12: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_12_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie

//especie
		    	S5_6_13: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_13_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_14: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_14_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_15: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_15_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_16: {
		            digits: true,
		             valrango: [0,1,9],
		         },	
		    	S5_6_16_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_17: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_17_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_18: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_18_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_19: {
		            digits: true,
		           valrango: [0,1,9],
		         },	
		    	S5_6_19_C: {
		            digits: true,
		             valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_20: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_20_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_21: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_21_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_22: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_22_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_23: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_23_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_24: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_24_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_25: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_25_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_26: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_26_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_27: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_27_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_28: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_28_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_29: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_29_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_30: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_30_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_31: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_31_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_32: {
		            digits: true,
		             valrango: [0,1,9],
		         },	
		    	S5_6_32_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_33: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_33_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_34: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_34_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_35: {
		            digits: true,
		             valrango: [0,1,9],
		         },	
		    	S5_6_35_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_36: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_36_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_37: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_37_C: {
		            digits: true,
		           valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_38: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_38_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_39: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_39_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_40: {
		            digits: true,
		           valrango: [0,1,9],
		         },	
		    	S5_6_40_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_41: {
		            digits: true,
		            valrango: [0,1,9],
		            // valzero: ['S5_6_1','S5_6_2','S5_6_3','S5_6_4','S5_6_5','S5_6_6','S5_6_7','S5_6_8','S5_6_9','S5_6_10','S5_6_11','S5_6_12','S5_6_13','S5_6_14','S5_6_15','S5_6_16','S5_6_17','S5_6_18','S5_6_19','S5_6_20','S5_6_21','S5_6_22','S5_6_23','S5_6_24','S5_6_25','S5_6_26','S5_6_27','S5_6_28','S5_6_29','S5_6_30','S5_6_31','S5_6_32','S5_6_33','S5_6_34','S5_6_35','S5_6_36','S5_6_37','S5_6_38','S5_6_39','S5_6_40'],
		         },	
		    	S5_6_41_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },				         
		    	S5_6_41_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_42: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_42_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_43: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_43_C: {
		            digits: true,
		             valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_44: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_44_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_45: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_45_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_46: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_46_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_47: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_47_C: {
		            digits: true,
		             valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_48: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_48_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
//especie
//especie
		    	S5_6_49: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_49_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_49_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },		
		    	S5_6_50: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_50_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_50_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },	
		    	S5_6_51: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_51_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_51_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },		
		    	S5_6_52: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_52_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_52_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			
		    	S5_6_53: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_53_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_53_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },		
		    	S5_6_54: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_54_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_54_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         		                  	         		         	         
		    	S5_6_55: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_55_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_55_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			         
		    	S5_6_56: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_56_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_56_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },		
		    	S5_6_57: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_57_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_57_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },			   
		    	S5_6_58: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_6_58_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_58_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },	
		    	S5_6_59: {
		            digits: true,
		            valrango: [0,1,9],
		            valzero: ['S5_6_1','S5_6_2','S5_6_3','S5_6_4','S5_6_5','S5_6_6','S5_6_7','S5_6_8','S5_6_9','S5_6_10','S5_6_11','S5_6_12','S5_6_13','S5_6_14','S5_6_15','S5_6_16','S5_6_17','S5_6_18','S5_6_19','S5_6_20','S5_6_21','S5_6_22','S5_6_23','S5_6_24','S5_6_25','S5_6_26','S5_6_27','S5_6_28','S5_6_29','S5_6_30','S5_6_31','S5_6_32','S5_6_33','S5_6_34','S5_6_35','S5_6_36','S5_6_37','S5_6_38','S5_6_39','S5_6_40','S5_6_41','S5_6_42','S5_6_43','S5_6_44','S5_6_45','S5_6_46','S5_6_47','S5_6_48','S5_6_49','S5_6_50','S5_6_51','S5_6_52','S5_6_53','S5_6_54','S5_6_55','S5_6_56','S5_6_57','S5_6_58'],
		         },	
		    	S5_6_59_O: {
		    		required:true,
					maxlength: 100,
					validName: true,
		         },			         
		    	S5_6_59_C: {
		            digits: true,
		            valrango: [0,9,99],
		         },					                  		               	         
//especie

		    	S5_7: {
		            digits: true,
		            valrango: [1,2,9],
		         },	

		    	S5_8_1: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_8_1_1: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },	

		    	S5_8_2: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_8_2_1: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },	

		    	S5_8_3: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_8_3_1: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },	

		    	S5_8_4: {
		            digits: true,
		            valrango: [0,1,9],
		            valzero: ['S5_8_1','S5_8_2','S5_8_3'],
		         },	
		    	S5_8_4_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },			         
		    	S5_8_4_1: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },		



		    	S5_9_1: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_2: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_3: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_4: {
		            digits: true,
		            valrango: [0,1,9],
		         },	

		    	S5_9_5: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_6: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_7: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_8: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_9: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_10: {
		            digits: true,
		            valrango: [0,1,9],
		         },	

		    	S5_9_11: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_12: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_13: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_14: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S5_9_14_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },			         
		    	S5_9_15: {
		            digits: true,
		            valrango: [0,1,9],
		            valzero:['S5_9_1','S5_9_2','S5_9_3','S5_9_4','S5_9_5','S5_9_6','S5_9_7','S5_9_8','S5_9_9','S5_9_10','S5_9_11','S5_9_12','S5_9_13','S5_9_14'],
		            valnone:['S5_9_1','S5_9_2','S5_9_3','S5_9_4','S5_9_5','S5_9_6','S5_9_7','S5_9_8','S5_9_9','S5_9_10','S5_9_11','S5_9_12','S5_9_13','S5_9_14'],
		         },	


		    	S5_10_1: {
		            digits: true,
		            valrango: [1,3,9],
		         },	
		    	S5_10_2: {
		            digits: true,
		            valrango: [1,3,9],
		         },	
		    	S5_10_3: {
		            digits: true,
		            valrango: [1,3,9],
		         },	

			//FIN RULES
		    },

		    messages: {   
		        S5_1_1: {
		            required: "Rio?",
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

				// var s5p1_sum = 0;
				// $('.s5preg1').each(function(){
				//     s5p1_sum += parseInt(this.value);
				// });	

				// var s5p9_sum = 0;
				// $('.s5preg9').each(function(){
				//     s5p9_sum += parseInt(this.value);
				// });	

				// var s5p6e_sum = 0;
				// $('.s5preg6e').each(function(){
				//     s5p6e_sum += parseInt(this.value);
				// });			

				// var s5p6p_sum = 0;
				// $('.s5preg6p').each(function(){
				//     s5p6p_sum += parseInt(this.value);
				// });								
				// if(s5p1_sum != 0){	
				// 	if(s5p6e_sum != 0){	
				// 		  if(s5p6p_sum != 0){	
				// 				if(s5p9_sum != 0){				
							    	//seccion 2 serial
							    	var seccion5_data = $("#seccion5").serializeArray();
								    seccion5_data.push(
								        {name: 'ajax',value:1},
								        {name: 'pescador_id',value:$("input[name='pescador_id']").val()}, 
								        {name: 'S5_2_DD',value:$('#S5_2_DD_COD :selected').text()},
										{name: 'S5_2_PP',value:$('#S5_2_PP_COD :selected').text()},    
										{name: 'S5_2_DI',value:$('#S5_2_DI_COD :selected').text()},    
										{name: 'S5_2_CCPP',value:$('#S5_2_CCPP_COD :selected').text()}			           
								    );
									
							        var bsub5 = $( "#seccion5 :submit" );
							        // bsub5.attr("disabled", "disabled");
							        $.ajax({
							            url: CI.base_url + "digitacion/pesc_seccion5",
							            type:'POST',
							            data:seccion5_data,
							            dataType:'json',
							            success:function(json){
											alert(json.msg);
											// $('#pesc_tabs').empty();
											// $('#pesc_tabs').append(window.clonetabs);
											// $('#pesc_tabs').removeClass('hide');
											$('#pesca_dor').trigger('submit');
							            }
							        });     
					// 	   		 }else{
					// 	    		alert('Debe ingresar al menos una opción, no pueden ser 0 todas las opciones..');
					// 	    		$('input.s5preg9:first').focus();
					// 	    	} 
					// 	   }else{
					// 	    	alert('Debe ingresar al menos una opción, no pueden ser 0 todas las opciones..');
					// 	    	$('input.s5preg6p:first').focus();
					// 	   } 						    	
					// }else{
					// 	 alert('Debe ingresar al menos una opción, no pueden ser 0 todas las opciones..');
					// 	 $('input.s5preg6e:first').focus();
					// } 						    	
			  //  	}else{
			  //   	alert('Debe ingresar al menos una opción, no pueden ser 0 todas las opciones..');
			  //   	$('input.s5preg1:first').focus();
			  //   } 		          	
		    }       
		});
 }); 
</script>