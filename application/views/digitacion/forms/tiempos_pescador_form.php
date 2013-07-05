<?php 


$label1=  array('class' => 'preguntas_sub2');
$label_horizontal=  array('class' => 'control-label_left span4 preguntas_sub');
$label_horizontal2=  array('class' => 'control-label_left span4 preguntas_sub');
$span_num =  'span4'; 
$span_class =  'span10';


// A.  UBICACION GEOGRAFICA ----------------------------------

$CCDD = array(
	'name'	=> 'CCDD',
	'id'	=> 'CCDD',
	'value'	=> set_value('CCDD'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCPP = array(
	'name'	=> 'CCPP',
	'id'	=> 'CCPP',
	'value'	=> set_value('CCPP'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCDI = array(
	'name'	=> 'CCDI',
	'id'	=> 'CCDI',
	'value'	=> set_value('CCDI'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$COD_CCPP = array(
	'name'	=> 'COD_CCPP',
	'id'	=> 'COD_CCPP',
	'value'	=> set_value('COD_CCPP'),
	'maxlength'	=> 10,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$N_FORM = array(
	'name'	=> 'N_FORM',
	'id'	=> 'N_FORM',
	'value'	=> set_value('N_FORM'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$NOM_OBS = array(
	'name'	=> 'NOM_OBS',
	'id'	=> 'NOM_OBS',
	'value'	=> set_value('NOM_OBS'),
	'maxlength'	=> 80,
	'class' => $span_class,
	'onkeypress'=>"return soloLetras(event)",
);
$NOM_ENC = array(
	'name'	=> 'NOM_ENC',
	'id'	=> 'NOM_ENC',
	'value'	=> set_value('NOM_ENC'),
	'maxlength'	=> 80,
	'class' => $span_class,
	'onkeypress'=>"return soloLetras(event)",
);
$DIA = array(
	'name'	=> 'DIA',
	'id'	=> 'DIA',
	'value'	=> set_value('DIA'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$MES = array(
	'name'	=> 'MES',
	'id'	=> 'MES',
	'value'	=> set_value('MES'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$RES = array(
	'name'	=> 'RES',
	'id'	=> 'RES',
	'value'	=> set_value('RES'),
	'maxlength'	=> 1,
	'class' => 'span1',
	'onkeypress'=>"return soloNumeros(event)",
);
//-----------------------------
$S1_H_I = array(
	'name'	=> 'S1_H_I',
	'id'	=> 'S1_H_I',
	'value'	=> set_value('S1_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S1_M_I = array(
	'name'	=> 'S1_M_I',
	'id'	=> 'S1_M_I',
	'value'	=> set_value('S1_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S1_H_F = array(
	'name'	=> 'S1_H_F',
	'id'	=> 'S1_H_F',
	'value'	=> set_value('S1_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S1_M_F = array(
	'name'	=> 'S1_M_F',
	'id'	=> 'S1_M_F',
	'value'	=> set_value('S1_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S1_T = array(
	'name'	=> 'S1_T',
	'id'	=> 'S1_T',
	'value'	=> set_value('S1_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//-----------------------------
$S2_H_I = array(
	'name'	=> 'S2_H_I',
	'id'	=> 'S2_H_I',
	'value'	=> set_value('S2_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S2_M_I = array(
	'name'	=> 'S2_M_I',
	'id'	=> 'S2_M_I',
	'value'	=> set_value('S2_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S2_H_F = array(
	'name'	=> 'S2_H_F',
	'id'	=> 'S2_H_F',
	'value'	=> set_value('S2_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S2_M_F = array(
	'name'	=> 'S2_M_F',
	'id'	=> 'S2_M_F',
	'value'	=> set_value('S2_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S2_T = array(
	'name'	=> 'S2_T',
	'id'	=> 'S2_T',
	'value'	=> set_value('S2_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_2_1 = array(
	'name'	=> 'S22_2_1',
	'id'	=> 'S22_2_1',
	'value'	=> set_value('S22_2_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_2_2 = array(
	'name'	=> 'S22_2_2',
	'id'	=> 'S22_2_2',
	'value'	=> set_value('S22_2_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_2_3= array(
	'name'	=> 'S22_2_3',
	'id'	=> 'S22_2_3',
	'value'	=> set_value('S22_2_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_2_4 = array(
	'name'	=> 'S22_2_4',
	'id'	=> 'S22_2_4',
	'value'	=> set_value('S22_2_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_3_1 = array(
	'name'	=> 'S22_3_1',
	'id'	=> 'S22_3_1',
	'value'	=> set_value('S22_3_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_3_2 = array(
	'name'	=> 'S22_3_2',
	'id'	=> 'S22_3_2',
	'value'	=> set_value('S22_3_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_3_3 = array(
	'name'	=> 'S22_3_3',
	'id'	=> 'S22_3_3',
	'value'	=> set_value('S22_3_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_3_4 = array(
	'name'	=> 'S22_3_4',
	'id'	=> 'S22_3_4',
	'value'	=> set_value('S22_3_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_5_1 = array(
	'name'	=> 'S22_5_1',
	'id'	=> 'S22_5_1',
	'value'	=> set_value('S22_5_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_5_2 = array(
	'name'	=> 'S22_5_2',
	'id'	=> 'S22_5_2',
	'value'	=> set_value('S22_5_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_5_3 = array(
	'name'	=> 'S22_5_3',
	'id'	=> 'S22_5_3',
	'value'	=> set_value('S22_5_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_5_4 = array(
	'name'	=> 'S22_5_4',
	'id'	=> 'S22_5_4',
	'value'	=> set_value('S22_5_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_9_1 = array(
	'name'	=> 'S22_9_1',
	'id'	=> 'S22_9_1',
	'value'	=> set_value('S22_9_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_9_2 = array(
	'name'	=> 'S22_9_2',
	'id'	=> 'S22_9_2',
	'value'	=> set_value('S22_9_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_9_3 = array(
	'name'	=> 'S22_9_3',
	'id'	=> 'S22_9_3',
	'value'	=> set_value('S22_9_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S22_9_4 = array(
	'name'	=> 'S22_9_4',
	'id'	=> 'S22_9_4',
	'value'	=> set_value('S22_9_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//------------------------------------------
$S3_H_I = array(
	'name'	=> 'S3_H_I',
	'id'	=> 'S3_H_I',
	'value'	=> set_value('S3_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S3_M_I = array(
	'name'	=> 'S3_M_I',
	'id'	=> 'S3_M_I',
	'value'	=> set_value('S3_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S3_H_F = array(
	'name'	=> 'S3_H_F',
	'id'	=> 'S3_H_F',
	'value'	=> set_value('S3_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S3_M_F = array(
	'name'	=> 'S3_M_F',
	'id'	=> 'S3_M_F',
	'value'	=> set_value('S3_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S3_T = array(
	'name'	=> 'S3_T',
	'id'	=> 'S3_T',
	'value'	=> set_value('S3_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//-----------------------------------------
$S4_H_I = array(
	'name'	=> 'S4_H_I',
	'id'	=> 'S4_H_I',
	'value'	=> set_value('S4_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S4_M_I = array(
	'name'	=> 'S4_M_I',
	'id'	=> 'S4_M_I',
	'value'	=> set_value('S4_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S4_H_F = array(
	'name'	=> 'S4_H_F',
	'id'	=> 'S4_H_F',
	'value'	=> set_value('S4_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S4_M_F = array(
	'name'	=> 'S4_M_F',
	'id'	=> 'S4_M_F',
	'value'	=> set_value('S4_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S4_T = array(
	'name'	=> 'S4_T',
	'id'	=> 'S4_T',
	'value'	=> set_value('S4_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//--------------------------------------
$S5_H_I = array(
	'name'	=> 'S5_H_I',
	'id'	=> 'S5_H_I',
	'value'	=> set_value('S5_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_M_I = array(
	'name'	=> 'S5_M_I',
	'id'	=> 'S5_M_I',
	'value'	=> set_value('S5_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_H_F = array(
	'name'	=> 'S5_H_F',
	'id'	=> 'S5_H_F',
	'value'	=> set_value('S5_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_M_F = array(
	'name'	=> 'S5_M_F',
	'id'	=> 'S5_M_F',
	'value'	=> set_value('S5_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_T = array(
	'name'	=> 'S5_T',
	'id'	=> 'S5_T',
	'value'	=> set_value('S5_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_1_1 = array(
	'name'	=> 'S5_1_1',
	'id'	=> 'S5_1_1',
	'value'	=> set_value('S5_1_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_1_2 = array(
	'name'	=> 'S5_1_2',
	'id'	=> 'S5_1_2',
	'value'	=> set_value('S5_1_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_1_3 = array(
	'name'	=> 'S5_1_3',
	'id'	=> 'S5_1_3',
	'value'	=> set_value('S5_1_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_1_4 = array(
	'name'	=> 'S5_1_4',
	'id'	=> 'S5_1_4',
	'value'	=> set_value('S5_1_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_2_1 = array(
	'name'	=> 'S5_2_1',
	'id'	=> 'S5_2_1',
	'value'	=> set_value('S5_2_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_2_2 = array(
	'name'	=> 'S5_2_2',
	'id'	=> 'S5_2_2',
	'value'	=> set_value('S5_2_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_2_3 = array(
	'name'	=> 'S5_2_3',
	'id'	=> 'S5_2_3',
	'value'	=> set_value('S5_2_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_2_4 = array(
	'name'	=> 'S5_2_4',
	'id'	=> 'S5_2_4',
	'value'	=> set_value('S5_2_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_5_1 = array(
	'name'	=> 'S5_5_1',
	'id'	=> 'S5_5_1',
	'value'	=> set_value('S5_5_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_5_2 = array(
	'name'	=> 'S5_5_2',
	'id'	=> 'S5_5_2',
	'value'	=> set_value('S5_5_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_5_3 = array(
	'name'	=> 'S5_5_3',
	'id'	=> 'S5_5_3',
	'value'	=> set_value('S5_5_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S5_5_4 = array(
	'name'	=> 'S5_5_4',
	'id'	=> 'S5_5_4',
	'value'	=> set_value('S5_5_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//----------------------------------------
$S6_H_I = array(
	'name'	=> 'S6_H_I',
	'id'	=> 'S6_H_I',
	'value'	=> set_value('S6_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S6_M_I = array(
	'name'	=> 'S6_M_I',
	'id'	=> 'S6_M_I',
	'value'	=> set_value('S6_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S6_H_F = array(
	'name'	=> 'S6_H_F',
	'id'	=> 'S6_H_F',
	'value'	=> set_value('S6_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S6_M_F = array(
	'name'	=> 'S6_M_F',
	'id'	=> 'S6_M_F',
	'value'	=> set_value('S6_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S6_T = array(
	'name'	=> 'S6_T',
	'id'	=> 'S6_T',
	'value'	=> set_value('S6_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//----------------------------------------------
$S7_H_I = array(
	'name'	=> 'S7_H_I',
	'id'	=> 'S7_H_I',
	'value'	=> set_value('S7_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_M_I = array(
	'name'	=> 'S7_M_I',
	'id'	=> 'S7_M_I',
	'value'	=> set_value('S7_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);

$S7_H_F = array(
	'name'	=> 'S7_H_F',
	'id'	=> 'S7_H_F',
	'value'	=> set_value('S7_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_M_F = array(
	'name'	=> 'S7_M_F',
	'id'	=> 'S7_M_F',
	'value'	=> set_value('S7_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_T = array(
	'name'	=> 'S7_T',
	'id'	=> 'S7_T',
	'value'	=> set_value('S7_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_3_1 = array(
	'name'	=> 'S7_3_1',
	'id'	=> 'S7_3_1',
	'value'	=> set_value('S7_3_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_3_2 = array(
	'name'	=> 'S7_3_2',
	'id'	=> 'S7_3_2',
	'value'	=> set_value('S7_3_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_3_3 = array(
	'name'	=> 'S7_3_3',
	'id'	=> 'S7_3_3',
	'value'	=> set_value('S7_3_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_3_4 = array(
	'name'	=> 'S7_3_4',
	'id'	=> 'S7_3_4',
	'value'	=> set_value('S7_3_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_4_1 = array(
	'name'	=> 'S7_4_1',
	'id'	=> 'S7_4_1',
	'value'	=> set_value('S7_4_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_4_2 = array(
	'name'	=> 'S7_4_2',
	'id'	=> 'S7_4_2',
	'value'	=> set_value('S7_4_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_4_3 = array(
	'name'	=> 'S7_4_3',
	'id'	=> 'S7_4_3',
	'value'	=> set_value('S7_4_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_4_4 = array(
	'name'	=> 'S7_4_4',
	'id'	=> 'S7_4_4',
	'value'	=> set_value('S7_4_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_5_1 = array(
	'name'	=> 'S7_5_1',
	'id'	=> 'S7_5_1',
	'value'	=> set_value('S7_5_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_5_2 = array(
	'name'	=> 'S7_5_2',
	'id'	=> 'S7_5_2',
	'value'	=> set_value('S7_5_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_5_3 = array(
	'name'	=> 'S7_5_3',
	'id'	=> 'S7_5_3',
	'value'	=> set_value('S7_5_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S7_5_4 = array(
	'name'	=> 'S7_5_4',
	'id'	=> 'S7_5_4',
	'value'	=> set_value('S7_5_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//--------------------------------------------
$S8_H_I = array(
	'name'	=> 'S8_H_I',
	'id'	=> 'S8_H_I',
	'value'	=> set_value('S8_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S8_M_I = array(
	'name'	=> 'S8_M_I',
	'id'	=> 'S8_M_I',
	'value'	=> set_value('S8_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S8_H_F = array(
	'name'	=> 'S8_H_F',
	'id'	=> 'S8_H_F',
	'value'	=> set_value('S8_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S8_M_F = array(
	'name'	=> 'S8_M_F',
	'id'	=> 'S8_M_F',
	'value'	=> set_value('S8_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S8_T = array(
	'name'	=> 'S8_T',
	'id'	=> 'S8_T',
	'value'	=> set_value('S8_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//------------------------------------------
$S9_H_I = array(
	'name'	=> 'S9_H_I',
	'id'	=> 'S9_H_I',
	'value'	=> set_value('S9_H_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_M_I = array(
	'name'	=> 'S9_M_I',
	'id'	=> 'S9_M_I',
	'value'	=> set_value('S9_M_I'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_H_F = array(
	'name'	=> 'S9_H_F',
	'id'	=> 'S9_H_F',
	'value'	=> set_value('S9_H_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_M_F = array(
	'name'	=> 'S9_M_F',
	'id'	=> 'S9_M_F',
	'value'	=> set_value('S9_M_F'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_T = array(
	'name'	=> 'S9_T',
	'id'	=> 'S9_T',
	'value'	=> set_value('S9_T'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_7_1 = array(
	'name'	=> 'S9_7_1',
	'id'	=> 'S9_7_1',
	'value'	=> set_value('S9_7_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_7_2 = array(
	'name'	=> 'S9_7_2',
	'id'	=> 'S9_7_2',
	'value'	=> set_value('S9_7_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_7_3 = array(
	'name'	=> 'S9_7_3',
	'id'	=> 'S9_7_3',
	'value'	=> set_value('S9_7_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_7_4 = array(
	'name'	=> 'S9_7_4',
	'id'	=> 'S9_7_4',
	'value'	=> set_value('S9_7_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_10_1 = array(
	'name'	=> 'S9_10_1',
	'id'	=> 'S9_10_1',
	'value'	=> set_value('S9_10_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_10_2 = array(
	'name'	=> 'S9_10_2',
	'id'	=> 'S9_10_2',
	'value'	=> set_value('S9_10_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_10_3 = array(
	'name'	=> 'S9_10_3',
	'id'	=> 'S9_10_3',
	'value'	=> set_value('S9_10_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_10_4 = array(
	'name'	=> 'S9_10_4',
	'id'	=> 'S9_10_4',
	'value'	=> set_value('S9_10_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_11_1 = array(
	'name'	=> 'S9_11_1',
	'id'	=> 'S9_11_1',
	'value'	=> set_value('S9_11_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_11_2 = array(
	'name'	=> 'S9_11_2',
	'id'	=> 'S9_11_2',
	'value'	=> set_value('S9_11_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_11_3 = array(
	'name'	=> 'S9_11_3',
	'id'	=> 'S9_11_3',
	'value'	=> set_value('S9_11_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_11_4 = array(
	'name'	=> 'S9_11_4',
	'id'	=> 'S9_11_4',
	'value'	=> set_value('S9_11_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_12_1 = array(
	'name'	=> 'S9_12_1',
	'id'	=> 'S9_12_1',
	'value'	=> set_value('S9_12_1'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_12_2 = array(
	'name'	=> 'S9_12_2',
	'id'	=> 'S9_12_2',
	'value'	=> set_value('S9_12_2'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_12_3 = array(
	'name'	=> 'S9_12_3',
	'id'	=> 'S9_12_3',
	'value'	=> set_value('S9_12_3'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
$S9_12_4 = array(
	'name'	=> 'S9_12_4',
	'id'	=> 'S9_12_4',
	'value'	=> set_value('S9_12_4'),
	'maxlength'	=> 1,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);
//------------------------------------
$T_ENT = array(
	'name'	=> 'T_ENT',
	'id'	=> 'T_ENT',
	'value'	=> set_value('T_ENT'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'onkeypress'=>"return soloNumeros(event)",
);

$OBS = array(
	'name'	=> 'OBS',
	'id'	=> 'OBS',
	'value'	=> set_value('OBS'),
	'maxlength'	=> 1000,
	'class' => $span_class,
	'rows'	=> 3,
	'onkeypress'=>"return soloAlfanumericos(event)",
);

// CARGAR COMBOS

	$depaArray = NULL; 

	$selected_NOM_DD = (set_value('NOM_DD_f')) ?  set_value('NOM_DD_f') : '';

		foreach($departamento->result() as $filas)
		{
			//$depaArray[substr(($filas->UBIGEO),0,2)]=strtoupper($filas->DEPARTAMENTO);
            $depaArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);		}

	$provArray = array(-1 => '-'); 
	$selected_NOM_PP = (set_value('NOM_PP_f')) ?  set_value('NOM_PP_f') : '';

	$distArray = array(-1 => '-'); 
	$selected_NOM_DI = (set_value('NOM_DI_f')) ?  set_value('NOM_DI_f') : '';

	$ccppArray = array(-1 => '-');

	$selected_NOM_CCPP = (set_value('NOM_CCPP_f')) ?  set_value('NOM_CCPP_f') : '';

// FORM 1 --------------------------------------------------------------------------------------------->
$attr = array('class' => 'form-val','id' => 'tiempos_form_pescador', 'style' => 'overflow: auto;');
echo form_open($this->uri->uri_string(),$attr); 

	if ($this->session->flashdata('msgbox')===1){
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-success">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>EXITOSO! </strong>';
			    echo ' El registro fue guardado satisfactoriamente';
		    echo '</div>';
	    echo '</div>';
	} elseif ($this->session->flashdata('msgbox')===2) {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' Inesperado, no se pudo actualizar';
		    echo '</div>';
	    echo '</div>';
	} elseif ($this->session->flashdata('msgbox')===3) {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' El centro poblado ya fue registrado';
		    echo '</div>';
	    echo '</div>';
	}

	echo '<div class="row-fluid ">';
		echo '<div class="span12 preguntas_n">';
			echo '<h3>FORMULARIO DE PESCADORES Y EMBARCACIONES  PESQUERAS</h3>';
			echo '<h4>FORMATO DE EVALUACIÓN DE TIEMPOS Y PREGUNTAS</h4>';
		echo '</div>';	
	echo '</div>'; 

	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

			echo '<div class="span12 titulos">';
				echo '<h5>A. UBICACION GEOGRAFICA</h5>';
			echo '</div>';							
	
			echo '<div class="row-fluid">';

				echo '<div class="control-group grupos span6">';
					echo form_label('1. DEPARTAMENTO','NOM_DD_f',$label1);
					echo '<fieldset>';
						echo '<div class="controls span2 grupos">';
							echo form_input($CCDD); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($CCDD['name']) . '</div>';
						echo '</div>';	
						echo '<div class="controls span8 grupos">';
							echo form_dropdown('NOM_DD_f', $depaArray, $selected_NOM_DD,'class=" span12" id="NOM_DD_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_DD_f') . '</div>';
							echo '<input type="hidden" name="NOM_DD" id="NOM_DD" />';

						echo '</div>';
					echo '</fieldset>';
				echo '</div>';

				echo '<div class="control-group grupos span6">';

					echo form_label('2. PROVINCIA','NOM_PP_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span2">';
							echo form_input($CCPP); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($CCPP['name']) . '</div>';
						echo '</div>';	

						echo '<div class="controls span8">';
							echo form_dropdown('NOM_PP_f', $provArray, $selected_NOM_PP,'class="span12" id="NOM_PP_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_PP_f') . '</div>';
							echo '<input type="hidden" name="NOM_PP" id="NOM_PP" />';
						echo '</div>';	

					echo '</fieldset>';

				echo '</div>'; 

			echo '</div>'; 	

			echo '<div class="row-fluid">';

				echo '<div class="control-group grupos span6">';

					echo form_label('3. DISTRITO','NOM_DI_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span2">';
							echo form_input($CCDI); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($CCDI['name']) . '</div>';
						echo '</div>';	

						echo '<div class="controls span8">';
							echo form_dropdown('NOM_DI_f', $distArray, $selected_NOM_DI,'class="span12" id="NOM_DI_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_DI_f') . '</div>';
							echo '<input type="hidden" name="NOM_DI" id="NOM_DI" />';
						echo '</div>';	

					echo '</fieldset>';

				echo '</div>'; 

				echo '<div class="control-group grupos span6">';

					echo form_label('4. CENTRO POBLADO','NOM_CCPP_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span2">';
							echo form_input($COD_CCPP); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($COD_CCPP['name']) . '</div>';
						echo '</div>';	
						echo '<div class="controls span8">';
							echo form_dropdown('NOM_CCPP_f', $ccppArray, $selected_NOM_CCPP,'class="span12" id="NOM_CCPP_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_CCPP_f') . '</div>';
							echo '<input type="hidden" name="NOM_CCPP" id="NOM_CCPP" />';
						echo '</div>';	
					echo '</fieldset>';

				echo '</div>'; 	

			echo '</div>'; 

			echo '<div class="row-fluid ">';	

				echo '<div class="control-group grupos span3">';
					echo form_label('5. NUMERO FORMULARIO',$N_FORM['id'],$label1);
					echo '<fieldset>';
						echo '<div class="controls grupos span5">';
							echo form_input($N_FORM); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($N_FORM['name']) . '</div>';
						echo '</div>';
					echo '</fieldset>';	
				echo '</div>';	

			echo '</div>'; 

		echo '</div>'; // A

	echo '</div>'; 


	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

			echo '<div class="span12 titulos">';
				echo '<h5>B. FUNCIONARIOS DEL CENSO</h5>';
			echo '</div>';	

		echo '</div>'; 

		echo '<div class="row-fluid">';

			echo '<div class="control-group form-horizontal">';
				echo form_label('NOMBRE DEL OBSERVADOR(A)',$NOM_OBS['id'],$label_horizontal);
				echo '<div class="controls">';
					echo form_input($NOM_OBS); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($NOM_OBS['name']) . '</div>';								
				echo '</div>';	
			echo '</div>'; 

			echo '<div class="control-group form-horizontal">';
				echo form_label('NOMBRE DE LA ENCUESTADORA',$NOM_ENC['id'],$label_horizontal);
				echo '<div class="controls">';
					echo form_input($NOM_ENC); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($NOM_ENC['name']) . '</div>';								
				echo '</div>';	
			echo '</div>'; 

		echo '</div>';
	
	echo '</div>';  //

	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

			echo '<div class="span12 titulos">';
				echo '<h5>C. FECHA Y RESULTADO DE LA ENTREVISTA</h5>';
			echo '</div>';	

		echo '</div>'; 

		echo '<div class="row-fluid">';

			echo form_label('FECHA DE LA ENTREVISTA',$DIA['id'],$label_horizontal);

			echo '<div class="span2">';
				echo '<div class="control-group form-horizontal_left">';
					echo form_label('DIA',$DIA['id'],$label_horizontal2);
					echo '<div class="controls span6">';
						echo form_input($DIA); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($DIA['name']) . '</div>';								
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span2">';
				echo '<div class="control-group form-horizontal_left">';
					echo form_label('MES',$MES['id'],$label_horizontal2);
					echo '<div class="controls span6">';
						echo form_input($MES); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($MES['name']) . '</div>';								
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

		echo '</div>';

		echo '<div class="row-fluid">';

		echo '<div class="control-group form-horizontal">';
			echo form_label('RESULTADO DE LA ENTREVISTA',$RES['id'],$label_horizontal);
			echo '<div class="controls">';
				echo form_input($RES); 
				echo '<span class="help-inline"></span>';
				echo '<div class="help-block error">' . form_error($RES['name']) . '</div>';								
			echo '</div>';	
		echo '</div>'; 

		echo '</div>';

	echo '</div>';  //

	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

			echo '<div class="span12 titulos">';
				echo '<h5>D. EVALUACIÓN DE LAS PREGUNTAS DEL FORMULARIO</h5>';
			echo '</div>';	

		echo '</div>'; 
	echo '</div>'; 

	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 1</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S1_H_I['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S1_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S1_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S1_M_I['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S1_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S1_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S1_H_F['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S1_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S1_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S1_M_F['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S1_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S1_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S1_T['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S1_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S1_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';

	echo '</div>'; 
	//seccion 2
	echo '<div class="well modulo">';

		echo '<div class="row-fluid" style="margin-top: 20px">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 2</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S2_H_I['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S2_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S2_M_I['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S2_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S2_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S2_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S2_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S2_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S2_T['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S2_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S2_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';	

		echo '<div class="row-fluid" style="margin-top: 20px";>';		

			echo '<div class="span4">';
				echo '<p>INFORMACION DE LOS HIJOS</p>';
			echo '</div>';	

			echo '<div class="span2">';
				echo '<p>LECTURA DE LA PREGUNTA</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>COMPRENSION DEL INFORMANTE</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>RESPUESTA DEL INFORMANTE</p>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<p>DELINGENCIAMIENTO</p>';
			echo '</div>';	

		echo '</div>';		

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('22.2 Nombre',$S22_2_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_2_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_2_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_2_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_2_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_2_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_2_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_2_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_2_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('22.3 Sexo',$S22_3_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_3_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_3_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_3_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_3_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_3_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_3_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_3_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_3_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('22.5 ¿Su hijo(a) vive con usted?',$S22_5_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_5_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_5_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_5_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_5_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_5_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_5_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_5_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_5_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('22.9 ¿Cuál es su ocupación actual?',$S22_9_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_9_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_9_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_9_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_9_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_9_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_9_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S22_9_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S22_9_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

	echo '</div>';  // S 2

	//seccion 3
	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 3</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S3_H_I['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S3_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S3_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S3_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S3_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S3_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S3_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S3_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S3_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S3_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S3_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S3_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S3_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S3_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S3_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';

	echo '</div>'; //S 3

	//seccion 4
	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 4</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S4_H_I['id'],$label1);
						echo '<div class="controls grupos span5">';
							echo form_input($S4_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S4_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S4_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S4_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S4_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S4_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S4_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S4_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S4_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S4_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S4_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S4_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S4_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S4_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';

	echo '</div>'; // S 4

	//seccion 5
	echo '<div class="well modulo">';

		echo '<div class="row-fluid" style="margin-top: 20px">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 5</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S5_H_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S5_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S5_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S5_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S5_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S5_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S5_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S5_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S5_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S5_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S5_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S5_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S5_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S5_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S5_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';	

		echo '<div class="row-fluid" style="margin-top: 20px";>';		

			echo '<div class="offset4 span2">';
				echo '<p>LECTURA DE LA PREGUNTA</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>COMPRENSION DEL INFORMANTE</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>RESPUESTA DEL INFORMANTE</p>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<p>DELINGENCIAMIENTO</p>';
			echo '</div>';	

		echo '</div>';		

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('1. ¿La actividad de pesca la realiza en:',$S5_1_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_1_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_1_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_1_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_1_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_1_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_1_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_1_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_1_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('2. ¿Qué factores dificultan su actividad de pesca?',$S5_2_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_2_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_2_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_2_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_2_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_2_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_2_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_2_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_2_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('5. ¿Cuál es el destino de su producción?',$S5_5_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_5_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_5_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_5_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_5_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_5_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_5_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S5_5_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S5_5_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

	echo '</div>';  // S 5

	//seccion 6
	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 6</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S6_H_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S6_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S6_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S6_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S6_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S6_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S6_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S6_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S6_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S6_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S6_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S6_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S6_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S6_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S6_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';

	echo '</div>';  // S 6

	//seccion 7
	echo '<div class="well modulo">';

		echo '<div class="row-fluid" style="margin-top: 20px">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 7</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S7_H_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S7_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S7_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S7_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S7_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S7_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S7_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S7_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S7_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S7_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S7_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S7_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S7_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S7_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S7_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';	

		echo '<div class="row-fluid" style="margin-top: 20px";>';		

			echo '<div class="offset4 span2">';
				echo '<p>LECTURA DE LA PREGUNTA</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>COMPRENSION DEL INFORMANTE</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>RESPUESTA DEL INFORMANTE</p>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<p>DELINGENCIAMIENTO</p>';
			echo '</div>';	

		echo '</div>';		

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('3. ¿En qué meses del año realiza su actividad de pesca?',$S7_3_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_3_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_3_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_3_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_3_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_3_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_3_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_3_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_3_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('4. ¿Cuál fue el volumen de:',$S7_4_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_4_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_4_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_4_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_4_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_4_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_4_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_4_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_4_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('5. ¿Cuál fue su ganancia aproximada?',$S7_5_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_5_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_5_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_5_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_5_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_5_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_5_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S7_5_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S7_5_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

	echo '</div>';  // S 7

	//seccion 8
	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 8</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S8_H_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S8_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S8_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S8_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S8_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S8_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S8_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S8_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S8_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S8_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S8_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S8_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S8_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S8_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S8_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';

	echo '</div>';  // S 8

	//seccion 9
	echo '<div class="well modulo">';

		echo '<div class="row-fluid" style="margin-top: 20px">';

				echo '<div class="span2 preguntas_n" >';
					echo '<h3>SECCION 9</h3>';
				echo '</div>';

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA INICIO',$S9_H_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S9_H_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S9_H_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN INICIO',$S9_M_I['id'],$label1);
						echo '<div class="controls span5">';
							echo form_input($S9_M_I); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S9_M_I['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('HORA FINAL',$S9_H_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S9_H_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S9_H_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('MIN FINAL',$S9_M_F['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S9_M_F); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S9_M_F['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

				echo '<div class="control-group grupos span2">';
					echo form_label('TIEMPO TOTAL (min)',$S9_T['id'],$label1);
						echo '<div class="controls  span5">';
							echo form_input($S9_T); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($S9_T['name']) . '</div>';
						echo '</div>';
				echo '</div>';	

		echo '</div>';	

		echo '<div class="row-fluid" style="margin-top: 20px";>';		

			echo '<div class="offset4 span2">';
				echo '<p>LECTURA DE LA PREGUNTA</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>COMPRENSION DEL INFORMANTE</p>';
			echo '</div>';	
			echo '<div class="span2">';
				echo '<p>RESPUESTA DEL INFORMANTE</p>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<p>DELINGENCIAMIENTO</p>';
			echo '</div>';	

		echo '</div>';		

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('7. ¿Su embarcación se encuentra:',$S9_7_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_7_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_7_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_7_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_7_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_7_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_7_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_7_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_7_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('10. ¿Cada tiempo le brinda mantenimiento a su embarcación?',$S9_10_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_10_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_10_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_10_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_10_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_10_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_10_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_10_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_10_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('11. ¿Cuáles son las medidas de su embarcación?',$S9_11_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_11_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_11_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_11_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_11_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_11_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_11_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_11_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_11_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';		

			echo '<div class="span4">';
				echo form_label('12. ¿Cuáles son las medidas de la bodega de su embarcación?',$S9_12_1['id'],$label1);
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_12_1); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_12_1['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';	

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_12_2); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_12_2['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_12_3); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_12_3['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group grupos">';
					echo '<div class="controls span5">';
						echo form_input($S9_12_4); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($S9_12_4['name']) . '</div>';
					echo '</div>';
				echo '</div>';	
			echo '</div>';

		echo '</div>';
	echo '</div>';  // S 9

	echo '<div class="well modulo">';

		echo '<div class="span12 titulos">';
			echo '<h5>TIEMPO TOTAL DE ENTREVISTA</h5>';
		echo '</div>';	

		echo '<div class="row-fluid ">';	

			echo '<div class="control-group span3">';
				echo form_label('(En minutos)',$T_ENT['id'],$label1);
				echo '<div class="controls  span5">';
					echo form_input($T_ENT); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($T_ENT['name']) . '</div>';
				echo '</div>';
			echo '</div>';	

		echo '</div>'; 
	echo '</div>';	

	echo '<div class="well modulo">';

		echo '<div class="row-fluid ">';	

			echo '<div class="control-group">';
				echo form_label('<h4>OBSERVACIONES</h4>',$OBS['id'],'titulos');
				echo '<div class="controls">';
					echo form_textarea($OBS); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($OBS['name']) . '</div>';
				echo '</div>';
			echo '</div>';	

		echo '</div>'; 
	echo '</div>';	

	echo form_submit('send', 'Enviar','class="btn btn-primary pull-right"');  


echo form_close();
// FORM 1 <---------------------------------



?>


<script type="text/javascript">

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

function soloAlfanumericos(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz123456789.,";
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

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}
//<=====================




$(function(){

// CARGA COMBOS UBIGEO =================================================================================>

$("#NOM_DD_f, #NOM_PP_f, #NOM_DI_f, #NOM_CCPP_f").change(function(event) {
        var sel = null;
        var dep = $('#NOM_DD_f');
        var prov = $('#NOM_PP_f');
        var dist = $('#NOM_DI_f');
        var url = null;
        var cod = null;
        var op =null;

        switch(event.target.id){
            case 'NOM_DD_f':
                sel     = $("#NOM_PP_f");
                $('#CCDD').val($(this).val()); 
                url     = CI.base_url + "ajax/ubigeo_ajax_piloto/get_ajax_prov/" + $(this).val();
                op      = 1;
  
               $('#NOM_DD').val($('#NOM_DD_f option:selected').text());   

                break;

            case 'NOM_PP_f':
                sel     = $("#NOM_DI_f");
                $('#CCPP').val($(this).val()); 
                $('#NOM_PP').val($('#NOM_PP_f option:selected').text());                 
                url     = CI.base_url + "ajax/ubigeo_ajax_piloto/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI_f':
                sel     = $("#NOM_CCPP_f");
                $("#CCDI").val($(this).val());  
                $('#NOM_DI').val($('#NOM_DI_f option:selected').text());                 
                url     = CI.base_url + "ajax/ubigeo_ajax_piloto/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'NOM_CCPP_f':
                $("#COD_CCPP").val($(this).val());  
                $('#NOM_CCPP').val($('#NOM_CCPP_f option:selected').text());                 
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

        if(event.target.id != 'NOM_CCPP_f')
        {

        $.ajax({
            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
            
                sel.empty();
                if (op==3){
                    sel.append('<option value=" -"> - </option>');
                }                
                $.each(json_data, function(i, data){
                    if (op==1){
                        sel.append('<option value="' + data.COD_PROVINCIA + '">' + data.DES_DISTRITO + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.COD_DISTRITO + '">' + data.DES_DISTRITO + '</option>');
                   }
                    if (op==3){
                        sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                });
               
                if (op==1){
                    $("#NOM_PP_f").trigger('change');
                    }  
                if (op==2){
                    $("#NOM_DI_f").trigger('change');
                }
                if (op==3){
                    $("#NOM_CCPP_f").trigger('change');
                }


            }
        });   
     }
  
}); 

// CARGA COMBOS UBIGEO <-----------------------------


// ENTER como TAB =======================================================================================>
	$('#tiempos_form_pescador').ready(function() {
	   $('#N_FORM').focus();
	       
	   $('input:text').bind("keydown", function(e) {
	      var n = $("input:text").length;
	      if (e.which == 13)
	      { //Enter key
	        e.preventDefault(); //Skip default behavior of the enter key
	        var nextIndex = $('input:text').index(this) + 1;
	        if(nextIndex < n)
	          $('input:text')[nextIndex].focus();
	        else
	        {
	          $('input:text')[nextIndex-1].blur();
	          $('#send').click();
	        }
	      }
	    });
	});

// ENTER como TAB ------------------------------------


// Validaciones =======================================================================================>

	$("#tiempos_form_pescador").validate({
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
	            maxlength:10,
	        }, 
			N_FORM:{
	            number: true,
	            maxlength: 2, 
	         },               
			NOM_OBS:{
	            validName:true,
	            maxlength: 80, 
	         },               
			NOM_ENC:{
	            validName:true,
	            maxlength: 80, 
	         },               	
			DIA:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         },         
			MES:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			RES:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S1_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S1_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S1_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S1_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S1_T:{
	            number: true,
	            maxlength: 2,
	         }, 
			S2_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         },                   		
			S2_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         },           
			S2_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S2_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S2_T:{
	            number: true,
	            maxlength: 2,
	         }, 
			S22_2_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_2_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_2_3	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_2_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 		
			S22_3_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 		
			S22_3_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_3_3	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_3_4	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_5_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 		
			S22_5_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_5_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 		
			S22_5_4	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_9_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 		
			S22_9_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_9_3	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 	
			S22_9_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 		

			S3_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 	
			S3_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S3_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S3_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S3_T:{
	            number: true,
	            maxlength: 2,
	         }, 

			S4_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S4_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S4_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S4_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S4_T:{
	            number: true,
	            maxlength: 2,
	         }, 

			S5_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S5_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S5_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S5_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S5_T:{
	            number: true,
	            maxlength: 2,
	         }, 
			S5_1_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_1_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_1_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_1_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_2_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_2_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_2_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_2_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_5_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_5_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_5_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S5_5_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 

			S6_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S6_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S6_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S6_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S6_T:{
	            number: true,
	            maxlength: 2,
	         }, 

			S7_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S7_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S7_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S7_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S7_T:{
	            number: true,
	            maxlength: 2,
	            // range: [0-24],
	         }, 
			S7_3_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_3_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_3_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_3_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_4_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_4_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_4_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_4_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_5_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_5_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_5_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S7_5_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 

			S8_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S8_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S8_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S8_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S8_T:{
	            number: true,
	            maxlength: 2,
	         }, 

			S9_H_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S9_M_I:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S9_H_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S9_M_F:{
	            number: true,
	            maxlength: 2,
	            exactlength: 2,
	         }, 
			S9_T:{
	            number: true,
	            maxlength: 2,
	         }, 
			S9_7_1:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         }, 
			S9_7_2:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_7_3:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_7_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_10_1	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_10_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_10_3	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_10_4:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },	
			S9_11_1	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_11_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_11_3	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_11_4	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_12_1	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_12_2	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_12_3	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },
			S9_12_4	:{
	            number: true,
	            maxlength: 1,
	            exactlength: 1,
	         },

			T_ENT:{
	            number: true,
	            maxlength: 2,
	         },	
			OBS:{
	            maxlength: 1000,
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

			N_FORM:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (2)', 
	         },               
			NOM_OBS:{
	            validName:'Carácteres no permitidos',
	            maxlength: 'Longitud máxima (80)', 
	         },               
			NOM_ENC:{
	            validName:'Carácteres no permitidos',
	            maxlength: 'Longitud máxima (80)', 
	         },                	
			DIA:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese día válido',
	            exactlength: 'Ingrese día válido',
	         },         
			MES:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese mes válido',
	            exactlength: 'Ingrese mes válido',
	         }, 
			RES:{
	            number: 'Sólo números',
	         },  
			S1_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S1_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S1_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S1_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S1_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         },  
			S2_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         },                  		
			S2_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S2_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         },          
			S2_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S2_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 
			S22_2_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_2_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_2_3	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_2_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 		
			S22_3_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 		
			S22_3_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_3_3	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_3_4	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_5_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 		
			S22_5_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_5_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 		
			S22_5_4	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_9_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 		
			S22_9_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_9_3	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 	
			S22_9_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 		

			S3_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 	
			S3_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S3_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S3_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S3_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 

			S4_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S4_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S4_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S4_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S4_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 

			S5_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S5_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S5_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S5_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S5_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 
			S5_1_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_1_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_1_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_1_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_2_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_2_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_2_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_2_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_5_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_5_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_5_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S5_5_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 

			S6_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S6_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S6_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S6_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S6_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 

			S7_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S7_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S7_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S7_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S7_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 
			S7_3_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_3_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_3_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_3_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_4_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_4_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_4_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_4_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_5_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_5_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_5_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S7_5_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 

			S8_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S8_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S8_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S8_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S8_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 

			S9_H_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S9_M_I:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S9_H_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese hora válida',
	            exactlength: 'Ingrese hora válida',
	         }, 
			S9_M_F:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	            exactlength: 'Ingrese minuto válido',
	         }, 
			S9_T:{
	            number: 'Sólo números',
	            maxlength: 'Ingrese minuto válido',
	         }, 
			S9_7_1:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         }, 
			S9_7_2:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_7_3:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_7_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_10_1	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_10_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_10_3	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_10_4:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },	
			S9_11_1	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_11_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_11_3	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_11_4	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_12_1	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_12_2	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_12_3	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },
			S9_12_4	:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (1)',
	            exactlength: 'Longitud máxima (1)',
	         },

			T_ENT:{
	            number: 'Sólo números',
	            maxlength: 'Longitud máxima (2)',
	         },	
			OBS:{
	            maxlength: 'Longitud máxima (1000)',
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
	    //     ('#form_registro').submit(); //submit it the form

	    // }       
	});

// Validaciones <=================


$('#tiempos_form_acuicultor').submit( function () {
$(this).unbind();
$(this).submit();
$(this).click(function () {
return false;
});
});





//ARRANCA ni bien carga el formulario
$("#NOM_DD_f").trigger('change');


});

</script>
