<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Etc/GMT+5');
include("conexion.php");

$id5=($_SESSION['id1']=='')?'NULL':'\''.$_SESSION['id1'].'\'';
$s5_1_1=($_POST['s5_1_1']=='')?'NULL':'\''.$_POST['s5_1_1'].'\'';
$s5_1_1_f=($_POST['s5_1_1_f']=='')?'NULL':'\''.$_POST['s5_1_1_f'].'\'';
$s5_1_2=($_POST['s5_1_2']=='')?'NULL':'\''.$_POST['s5_1_2'].'\'';
$s5_1_2_f=($_POST['s5_1_2_f']=='')?'NULL':'\''.$_POST['s5_1_2_f'].'\'';
$s5_1_3=($_POST['s5_1_3']=='')?'NULL':'\''.$_POST['s5_1_3'].'\'';
$s5_1_3_f=($_POST['s5_1_3_f']=='')?'NULL':'\''.$_POST['s5_1_3_f'].'\'';
$s5_1_4=($_POST['s5_1_4']=='')?'NULL':'\''.$_POST['s5_1_4'].'\'';
$s5_1_4_f=($_POST['s5_1_4_f']=='')?'NULL':'\''.$_POST['s5_1_4_f'].'\'';
$s5_1_5=($_POST['s5_1_5']=='')?'NULL':'\''.$_POST['s5_1_5'].'\'';
$s5_1_5_o=($_POST['s5_1_5_o']=='')?'NULL':'\''.$_POST['s5_1_5_o'].'\'';
$s5_1_5_f=($_POST['s5_1_5_f']=='')?'NULL':'\''.$_POST['s5_1_5_f'].'\'';
$s5_2_1=($_POST['s5_2_1']=='')?'NULL':'\''.$_POST['s5_2_1'].'\'';
$s5_2_1_h=($_POST['s5_2_1_h']=='')?'NULL':'\''.$_POST['s5_2_1_h'].'\'';
$s5_2_2=($_POST['s5_2_2']=='')?'NULL':'\''.$_POST['s5_2_2'].'\'';
$s5_2_2_h=($_POST['s5_2_2_h']=='')?'NULL':'\''.$_POST['s5_2_2_h'].'\'';
$s5_2_3=($_POST['s5_2_3']=='')?'NULL':'\''.$_POST['s5_2_3'].'\'';
$s5_2_3_h=($_POST['s5_2_3_h']=='')?'NULL':'\''.$_POST['s5_2_3_h'].'\'';
$s5_2_4=($_POST['s5_2_4']=='')?'NULL':'\''.$_POST['s5_2_4'].'\'';
$s5_2_4_o=($_POST['s5_2_4_o']=='')?'NULL':'\''.$_POST['s5_2_4_o'].'\'';
$s5_2_4_h=($_POST['s5_2_4_h']=='')?'NULL':'\''.$_POST['s5_2_4_h'].'\'';
$s5_3=($_POST['s5_3']=='')?'NULL':'\''.$_POST['s5_3'].'\'';
$s5_3_r=($_POST['s5_3_r']=='')?'NULL':'\''.$_POST['s5_3_r'].'\'';
$s5_4=($_POST['s5_4']=='')?'NULL':'\''.$_POST['s5_4'].'\'';
$s5_5_1=($_POST['s5_5_1']=='')?'NULL':'\''.$_POST['s5_5_1'].'\'';
$s5_5_2=($_POST['s5_5_2']=='')?'NULL':'\''.$_POST['s5_5_2'].'\'';
$s5_5_3=($_POST['s5_5_3']=='')?'NULL':'\''.$_POST['s5_5_3'].'\'';
$s5_5_4=($_POST['s5_5_4']=='')?'NULL':'\''.$_POST['s5_5_4'].'\'';
$s5_5_5=($_POST['s5_5_5']=='')?'NULL':'\''.$_POST['s5_5_5'].'\'';
$s5_5_5_o=($_POST['s5_5_5_o']=='')?'NULL':'\''.$_POST['s5_5_5_o'].'\'';
$s5_6=($_POST['s5_6']=='')?'NULL':'\''.$_POST['s5_6'].'\'';
$s5_6_r=($_POST['s5_6_r']=='')?'NULL':'\''.$_POST['s5_6_r'].'\'';
$s5_7=($_POST['s5_7']=='')?'NULL':'\''.$_POST['s5_7'].'\'';
$s5_8=($_POST['s5_8']=='')?'NULL':'\''.$_POST['s5_8'].'\'';
$s5_9_1=($_POST['s5_9_1']=='')?'NULL':'\''.$_POST['s5_9_1'].'\'';
$s5_9_2=($_POST['s5_9_2']=='')?'NULL':'\''.$_POST['s5_9_2'].'\'';
$s5_9_3=($_POST['s5_9_3']=='')?'NULL':'\''.$_POST['s5_9_3'].'\'';
$s5_10_1=($_POST['s5_10_1']=='')?'NULL':'\''.$_POST['s5_10_1'].'\'';
$s5_10_2=($_POST['s5_10_2']=='')?'NULL':'\''.$_POST['s5_10_2'].'\'';
$s5_10_3=($_POST['s5_10_3']=='')?'NULL':'\''.$_POST['s5_10_3'].'\'';
$s5_10_4=($_POST['s5_10_4']=='')?'NULL':'\''.$_POST['s5_10_4'].'\'';
$s5_10_5=($_POST['s5_10_5']=='')?'NULL':'\''.$_POST['s5_10_5'].'\'';
$s5_10_6=($_POST['s5_10_6']=='')?'NULL':'\''.$_POST['s5_10_6'].'\'';
$s5_10_7=($_POST['s5_10_7']=='')?'NULL':'\''.$_POST['s5_10_7'].'\'';
$s5_10_8=($_POST['s5_10_8']=='')?'NULL':'\''.$_POST['s5_10_8'].'\'';
$s5_10_9=($_POST['s5_10_9']=='')?'NULL':'\''.$_POST['s5_10_9'].'\'';
$s5_10_10=($_POST['s5_10_10']=='')?'NULL':'\''.$_POST['s5_10_10'].'\'';
$s5_10_11=($_POST['s5_10_11']=='')?'NULL':'\''.$_POST['s5_10_11'].'\'';
$s5_10_12=($_POST['s5_10_12']=='')?'NULL':'\''.$_POST['s5_10_12'].'\'';
$s5_10_13=($_POST['s5_10_13']=='')?'NULL':'\''.$_POST['s5_10_13'].'\'';
$s5_10_14=($_POST['s5_10_14']=='')?'NULL':'\''.$_POST['s5_10_14'].'\'';
$s5_10_14_o=($_POST['s5_10_14_o']=='')?'NULL':'\''.$_POST['s5_10_14_o'].'\'';
$s5_10_15=($_POST['s5_10_15']=='')?'NULL':'\''.$_POST['s5_10_15'].'\'';
$s5_10_15_o=($_POST['s5_10_15_o']=='')?'NULL':'\''.$_POST['s5_10_15_o'].'\'';
$s5_11_1=($_POST['s5_11_1']=='')?'NULL':'\''.$_POST['s5_11_1'].'\'';
$s5_11_2=($_POST['s5_11_2']=='')?'NULL':'\''.$_POST['s5_11_2'].'\'';
$s5_11_3=($_POST['s5_11_3']=='')?'NULL':'\''.$_POST['s5_11_3'].'\'';
$s5_12=($_POST['s5_12']=='')?'NULL':'\''.$_POST['s5_12'].'\'';
$s5_13_1=($_POST['s5_13_1']=='')?'NULL':'\''.$_POST['s5_13_1'].'\'';
$s5_13_1_c=($_POST['s5_13_1_c']=='')?'NULL':'\''.$_POST['s5_13_1_c'].'\'';
$s5_13_1_u=($_POST['s5_13_1_u']=='')?'NULL':'\''.$_POST['s5_13_1_u'].'\'';
$s5_13_1_u_o=($_POST['s5_13_1_u_o']=='')?'NULL':'\''.$_POST['s5_13_1_u_o'].'\'';
$s5_13_1_ma=($_POST['s5_13_1_ma']=='')?'NULL':'\''.$_POST['s5_13_1_ma'].'\'';
$s5_13_1_me=($_POST['s5_13_1_me']=='')?'NULL':'\''.$_POST['s5_13_1_me'].'\'';
$s5_13_2=($_POST['s5_13_2']=='')?'NULL':'\''.$_POST['s5_13_2'].'\'';
$s5_13_2_c=($_POST['s5_13_2_c']=='')?'NULL':'\''.$_POST['s5_13_2_c'].'\'';
$s5_13_2_u=($_POST['s5_13_2_u']=='')?'NULL':'\''.$_POST['s5_13_2_u'].'\'';
$s5_13_2_u_o=($_POST['s5_13_2_u_o']=='')?'NULL':'\''.$_POST['s5_13_2_u_o'].'\'';
$s5_13_2_ma=($_POST['s5_13_2_ma']=='')?'NULL':'\''.$_POST['s5_13_2_ma'].'\'';
$s5_13_2_me=($_POST['s5_13_2_me']=='')?'NULL':'\''.$_POST['s5_13_2_me'].'\'';
$s5_13_3=($_POST['s5_13_3']=='')?'NULL':'\''.$_POST['s5_13_3'].'\'';
$s5_13_3_c=($_POST['s5_13_3_c']=='')?'NULL':'\''.$_POST['s5_13_3_c'].'\'';
$s5_13_3_u=($_POST['s5_13_3_u']=='')?'NULL':'\''.$_POST['s5_13_3_u'].'\'';
$s5_13_3_u_o=($_POST['s5_13_3_u_o']=='')?'NULL':'\''.$_POST['s5_13_3_u_o'].'\'';
$s5_13_3_ma=($_POST['s5_13_3_ma']=='')?'NULL':'\''.$_POST['s5_13_3_ma'].'\'';
$s5_13_3_me=($_POST['s5_13_3_me']=='')?'NULL':'\''.$_POST['s5_13_3_me'].'\'';
$s5_13_4=($_POST['s5_13_4']=='')?'NULL':'\''.$_POST['s5_13_4'].'\'';
$s5_13_4_c=($_POST['s5_13_4_c']=='')?'NULL':'\''.$_POST['s5_13_4_c'].'\'';
$s5_13_4_u=($_POST['s5_13_4_u']=='')?'NULL':'\''.$_POST['s5_13_4_u'].'\'';
$s5_13_4_u_o=($_POST['s5_13_4_u_o']=='')?'NULL':'\''.$_POST['s5_13_4_u_o'].'\'';
$s5_13_4_ma=($_POST['s5_13_4_ma']=='')?'NULL':'\''.$_POST['s5_13_4_ma'].'\'';
$s5_13_4_me=($_POST['s5_13_4_me']=='')?'NULL':'\''.$_POST['s5_13_4_me'].'\'';
$s5_13_5=($_POST['s5_13_5']=='')?'NULL':'\''.$_POST['s5_13_5'].'\'';
$s5_13_5_c=($_POST['s5_13_5_c']=='')?'NULL':'\''.$_POST['s5_13_5_c'].'\'';
$s5_13_5_u=($_POST['s5_13_5_u']=='')?'NULL':'\''.$_POST['s5_13_5_u'].'\'';
$s5_13_5_u_o=($_POST['s5_13_5_u_o']=='')?'NULL':'\''.$_POST['s5_13_5_u_o'].'\'';
$s5_13_5_ma=($_POST['s5_13_5_ma']=='')?'NULL':'\''.$_POST['s5_13_5_ma'].'\'';
$s5_13_5_me=($_POST['s5_13_5_me']=='')?'NULL':'\''.$_POST['s5_13_5_me'].'\'';
$s5_13_6=($_POST['s5_13_6']=='')?'NULL':'\''.$_POST['s5_13_6'].'\'';
$s5_13_6_c=($_POST['s5_13_6_c']=='')?'NULL':'\''.$_POST['s5_13_6_c'].'\'';
$s5_13_6_u=($_POST['s5_13_6_u']=='')?'NULL':'\''.$_POST['s5_13_6_u'].'\'';
$s5_13_6_u_o=($_POST['s5_13_6_u_o']=='')?'NULL':'\''.$_POST['s5_13_6_u_o'].'\'';
$s5_13_6_ma=($_POST['s5_13_6_ma']=='')?'NULL':'\''.$_POST['s5_13_6_ma'].'\'';
$s5_13_6_me=($_POST['s5_13_6_me']=='')?'NULL':'\''.$_POST['s5_13_6_me'].'\'';
$s5_13_7=($_POST['s5_13_7']=='')?'NULL':'\''.$_POST['s5_13_7'].'\'';
$s5_13_7_c=($_POST['s5_13_7_c']=='')?'NULL':'\''.$_POST['s5_13_7_c'].'\'';
$s5_13_7_u=($_POST['s5_13_7_u']=='')?'NULL':'\''.$_POST['s5_13_7_u'].'\'';
$s5_13_7_u_o=($_POST['s5_13_7_u_o']=='')?'NULL':'\''.$_POST['s5_13_7_u_o'].'\'';
$s5_13_7_ma=($_POST['s5_13_7_ma']=='')?'NULL':'\''.$_POST['s5_13_7_ma'].'\'';
$s5_13_7_me=($_POST['s5_13_7_me']=='')?'NULL':'\''.$_POST['s5_13_7_me'].'\'';
$s5_13_8=($_POST['s5_13_8']=='')?'NULL':'\''.$_POST['s5_13_8'].'\'';
$s5_13_8_e=($_POST['s5_13_8_e']=='')?'NULL':'\''.$_POST['s5_13_8_e'].'\'';
$s5_13_8_c=($_POST['s5_13_8_c']=='')?'NULL':'\''.$_POST['s5_13_8_c'].'\'';
$s5_13_8_u=($_POST['s5_13_8_u']=='')?'NULL':'\''.$_POST['s5_13_8_u'].'\'';
$s5_13_8_u_o=($_POST['s5_13_8_u_o']=='')?'NULL':'\''.$_POST['s5_13_8_u_o'].'\'';
$s5_13_8_ma=($_POST['s5_13_8_ma']=='')?'NULL':'\''.$_POST['s5_13_8_ma'].'\'';
$s5_13_8_me=($_POST['s5_13_8_me']=='')?'NULL':'\''.$_POST['s5_13_8_me'].'\'';
$s5_14_1=($_POST['s5_14_1']=='')?'NULL':'\''.$_POST['s5_14_1'].'\'';
$s5_14_2=($_POST['s5_14_2']=='')?'NULL':'\''.$_POST['s5_14_2'].'\'';
$s5_14_3=($_POST['s5_14_3']=='')?'NULL':'\''.$_POST['s5_14_3'].'\'';
$s5_14_4=($_POST['s5_14_4']=='')?'NULL':'\''.$_POST['s5_14_4'].'\'';
$s5_14_5=($_POST['s5_14_5']=='')?'NULL':'\''.$_POST['s5_14_5'].'\'';
$s5_14_6=($_POST['s5_14_6']=='')?'NULL':'\''.$_POST['s5_14_6'].'\'';
$s5_15_1=($_POST['s5_15_1']=='')?'NULL':'\''.$_POST['s5_15_1'].'\'';
$s5_15_2=($_POST['s5_15_2']=='')?'NULL':'\''.$_POST['s5_15_2'].'\'';
$s5_16_1=($_POST['s5_16_1']=='')?'NULL':'\''.$_POST['s5_16_1'].'\'';
$s5_16_2=($_POST['s5_16_2']=='')?'NULL':'\''.$_POST['s5_16_2'].'\'';
$s5_16_3=($_POST['s5_16_3']=='')?'NULL':'\''.$_POST['s5_16_3'].'\'';
$s5_16_4=($_POST['s5_16_4']=='')?'NULL':'\''.$_POST['s5_16_4'].'\'';
$s5_16_5=($_POST['s5_16_5']=='')?'NULL':'\''.$_POST['s5_16_5'].'\'';
$s5_16_5_m=($_POST['s5_16_5_m']=='')?'NULL':'\''.$_POST['s5_16_5_m'].'\'';
$s5_16_5_p=($_POST['s5_16_5_p']=='')?'NULL':'\''.$_POST['s5_16_5_p'].'\'';
$s5_16_6=($_POST['s5_16_6']=='')?'NULL':'\''.$_POST['s5_16_6'].'\'';
$s5_16_7=($_POST['s5_16_7']=='')?'NULL':'\''.$_POST['s5_16_7'].'\'';
$s5_16_8=($_POST['s5_16_8']=='')?'NULL':'\''.$_POST['s5_16_8'].'\'';
$s5_16_9=($_POST['s5_16_9']=='')?'NULL':'\''.$_POST['s5_16_9'].'\'';
$s5_16_9_o=($_POST['s5_16_9_o']=='')?'NULL':'\''.$_POST['s5_16_9_o'].'\'';
$s5_17_1=($_POST['s5_17_1']=='')?'NULL':'\''.$_POST['s5_17_1'].'\'';
$s5_17_2=($_POST['s5_17_2']=='')?'NULL':'\''.$_POST['s5_17_2'].'\'';
$s5_17_3=($_POST['s5_17_3']=='')?'NULL':'\''.$_POST['s5_17_3'].'\'';
$s5_17_4=($_POST['s5_17_4']=='')?'NULL':'\''.$_POST['s5_17_4'].'\'';
$s5_17_5=($_POST['s5_17_5']=='')?'NULL':'\''.$_POST['s5_17_5'].'\'';
$s5_17_6=($_POST['s5_17_6']=='')?'NULL':'\''.$_POST['s5_17_6'].'\'';
$s5_17_7=($_POST['s5_17_7']=='')?'NULL':'\''.$_POST['s5_17_7'].'\'';
$s5_17_8=($_POST['s5_17_8']=='')?'NULL':'\''.$_POST['s5_17_8'].'\'';
$s5_17_9=($_POST['s5_17_9']=='')?'NULL':'\''.$_POST['s5_17_9'].'\'';
$s5_17_10=($_POST['s5_17_10']=='')?'NULL':'\''.$_POST['s5_17_10'].'\'';
$s5_17_11=($_POST['s5_17_11']=='')?'NULL':'\''.$_POST['s5_17_11'].'\'';
$s5_17_12=($_POST['s5_17_12']=='')?'NULL':'\''.$_POST['s5_17_12'].'\'';
$s5_17_13=($_POST['s5_17_13']=='')?'NULL':'\''.$_POST['s5_17_13'].'\'';
$s5_17_14=($_POST['s5_17_14']=='')?'NULL':'\''.$_POST['s5_17_14'].'\'';
$s5_17_15=($_POST['s5_17_15']=='')?'NULL':'\''.$_POST['s5_17_15'].'\'';
$s5_17_15_o=($_POST['s5_17_15_o']=='')?'NULL':'\''.$_POST['s5_17_15_o'].'\'';
$s5_17_16=($_POST['s5_17_16']=='')?'NULL':'\''.$_POST['s5_17_16'].'\'';

$ff_rr5=date('Y-m-d H:i:s');
$ff_rr5=($ff_rr5=='')?'NULL':'\''.$ff_rr5.'\'';
$user5=($_SESSION['user_id']=='')?'NULL':'\''.$_SESSION['user_id'].'\'';



$frm5=$_POST['frm5'];
$opc5=$_POST['opc5'];
$opc=$_POST['opc'];

if($frm5==1 and $opc5==1)
{

$sql=sprintf("INSERT INTO acu_seccion5 (`id5`,`s5_1_1`,`s5_1_1_f`,`s5_1_2`,`s5_1_2_f`,`s5_1_3`,`s5_1_3_f`,`s5_1_4`,`s5_1_4_f`,`s5_1_5`,`s5_1_5_o`,`s5_1_5_f`,`s5_2_1`,`s5_2_1_h`,`s5_2_2`,`s5_2_2_h`,`s5_2_3`,`s5_2_3_h`,`s5_2_4`,`s5_2_4_o`,`s5_2_4_h`,`s5_3`,`s5_3_r`,`s5_4`,`s5_5_1`,`s5_5_2`,`s5_5_3`,`s5_5_4`,`s5_5_5`,`s5_5_5_o`,`s5_6`,`s5_6_r`,`s5_7`,`s5_8`,`s5_9_1`,`s5_9_2`,`s5_9_3`,`s5_10_1`,`s5_10_2`,`s5_10_3`,`s5_10_4`,`s5_10_5`,`s5_10_6`,`s5_10_7`,`s5_10_8`,`s5_10_9`,`s5_10_10`,`s5_10_11`,`s5_10_12`,`s5_10_13`,`s5_10_14`,`s5_10_14_o`,`s5_10_15`,`s5_10_15_o`,`s5_11_1`,`s5_11_2`,`s5_11_3`,`s5_12`,`s5_13_1`,`s5_13_1_c`,`s5_13_1_u`,`s5_13_1_u_o`,`s5_13_1_ma`,`s5_13_1_me`,`s5_13_2`,`s5_13_2_c`,`s5_13_2_u`,`s5_13_2_u_o`,`s5_13_2_ma`,`s5_13_2_me`,`s5_13_3`,`s5_13_3_c`,`s5_13_3_u`,`s5_13_3_u_o`,`s5_13_3_ma`,`s5_13_3_me`,`s5_13_4`,`s5_13_4_c`,`s5_13_4_u`,`s5_13_4_u_o`,`s5_13_4_ma`,`s5_13_4_me`,`s5_13_5`,`s5_13_5_c`,`s5_13_5_u`,`s5_13_5_u_o`,`s5_13_5_ma`,`s5_13_5_me`,`s5_13_6`,`s5_13_6_c`,`s5_13_6_u`,`s5_13_6_u_o`,`s5_13_6_ma`,`s5_13_6_me`,`s5_13_7`,`s5_13_7_c`,`s5_13_7_u`,`s5_13_7_u_o`,`s5_13_7_ma`,`s5_13_7_me`,`s5_13_8`,`s5_13_8_e`,`s5_13_8_c`,`s5_13_8_u`,`s5_13_8_u_o`,`s5_13_8_ma`,`s5_13_8_me`,`s5_14_1`,`s5_14_2`,`s5_14_3`,`s5_14_4`,`s5_14_5`,`s5_14_6`,`s5_15_1`,`s5_15_2`,`s5_16_1`,`s5_16_2`,`s5_16_3`,`s5_16_4`,`s5_16_5`,`s5_16_5_m`,`s5_16_5_p`,`s5_16_6`,`s5_16_7`,`s5_16_8`,`s5_16_9`,`s5_16_9_o`,`s5_17_1`,`s5_17_2`,`s5_17_3`,`s5_17_4`,`s5_17_5`,`s5_17_6`,`s5_17_7`,`s5_17_8`,`s5_17_9`,`s5_17_10`,`s5_17_11`,`s5_17_12`,`s5_17_13`,`s5_17_14`,`s5_17_15`,`s5_17_15_o`,`s5_17_16`,`ff_rr5`,`user5`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",$id5,$s5_1_1,$s5_1_1_f,$s5_1_2,$s5_1_2_f,$s5_1_3,$s5_1_3_f,$s5_1_4,$s5_1_4_f,$s5_1_5,$s5_1_5_o,$s5_1_5_f,$s5_2_1,$s5_2_1_h,$s5_2_2,$s5_2_2_h,$s5_2_3,$s5_2_3_h,$s5_2_4,$s5_2_4_o,$s5_2_4_h,$s5_3,$s5_3_r,$s5_4,$s5_5_1,$s5_5_2,$s5_5_3,$s5_5_4,$s5_5_5,$s5_5_5_o,$s5_6,$s5_6_r,$s5_7,$s5_8,$s5_9_1,$s5_9_2,$s5_9_3,$s5_10_1,$s5_10_2,$s5_10_3,$s5_10_4,$s5_10_5,$s5_10_6,$s5_10_7,$s5_10_8,$s5_10_9,$s5_10_10,$s5_10_11,$s5_10_12,$s5_10_13,$s5_10_14,$s5_10_14_o,$s5_10_15,$s5_10_15_o,$s5_11_1,$s5_11_2,$s5_11_3,$s5_12,$s5_13_1,$s5_13_1_c,$s5_13_1_u,$s5_13_1_u_o,$s5_13_1_ma,$s5_13_1_me,$s5_13_2,$s5_13_2_c,$s5_13_2_u,$s5_13_2_u_o,$s5_13_2_ma,$s5_13_2_me,$s5_13_3,$s5_13_3_c,$s5_13_3_u,$s5_13_3_u_o,$s5_13_3_ma,$s5_13_3_me,$s5_13_4,$s5_13_4_c,$s5_13_4_u,$s5_13_4_u_o,$s5_13_4_ma,$s5_13_4_me,$s5_13_5,$s5_13_5_c,$s5_13_5_u,$s5_13_5_u_o,$s5_13_5_ma,$s5_13_5_me,$s5_13_6,$s5_13_6_c,$s5_13_6_u,$s5_13_6_u_o,$s5_13_6_ma,$s5_13_6_me,$s5_13_7,$s5_13_7_c,$s5_13_7_u,$s5_13_7_u_o,$s5_13_7_ma,$s5_13_7_me,$s5_13_8,$s5_13_8_e,$s5_13_8_c,$s5_13_8_u,$s5_13_8_u_o,$s5_13_8_ma,$s5_13_8_me,$s5_14_1,$s5_14_2,$s5_14_3,$s5_14_4,$s5_14_5,$s5_14_6,$s5_15_1,$s5_15_2,$s5_16_1,$s5_16_2,$s5_16_3,$s5_16_4,$s5_16_5,$s5_16_5_m,$s5_16_5_p,$s5_16_6,$s5_16_7,$s5_16_8,$s5_16_9,$s5_16_9_o,$s5_17_1,$s5_17_2,$s5_17_3,$s5_17_4,$s5_17_5,$s5_17_6,$s5_17_7,$s5_17_8,$s5_17_9,$s5_17_10,$s5_17_11,$s5_17_12,$s5_17_13,$s5_17_14,$s5_17_15,$s5_17_15_o,$s5_17_16,$ff_rr5,$user5); 

$result = mysql_query($sql);
echo mysql_error ();
$_SESSION['aviso']=utf8_encode("La Secci�n V ha sido guardada");

$formulario=1;
}

//MODIFICAR SECCION V
if($frm5==1 and $opc5==2)
{
$sql= "UPDATE acu_seccion5 SET  s5_1_1=".sprintf("%s",$s5_1_1).", s5_1_1_f=".sprintf("%s",$s5_1_1_f).", s5_1_2=".sprintf("%s",$s5_1_2).", s5_1_2_f=".sprintf("%s",$s5_1_2_f).", s5_1_3=".sprintf("%s",$s5_1_3).", s5_1_3_f=".sprintf("%s",$s5_1_3_f).", s5_1_4=".sprintf("%s",$s5_1_4).", s5_1_4_f=".sprintf("%s",$s5_1_4_f).", s5_1_5=".sprintf("%s",$s5_1_5).", s5_1_5_o=".sprintf("%s",$s5_1_5_o).", s5_1_5_f=".sprintf("%s",$s5_1_5_f).", s5_2_1=".sprintf("%s",$s5_2_1).", s5_2_1_h=".sprintf("%s",$s5_2_1_h).", s5_2_2=".sprintf("%s",$s5_2_2).", s5_2_2_h=".sprintf("%s",$s5_2_2_h).", s5_2_3=".sprintf("%s",$s5_2_3).", s5_2_3_h=".sprintf("%s",$s5_2_3_h).", s5_2_4=".sprintf("%s",$s5_2_4).", s5_2_4_o=".sprintf("%s",$s5_2_4_o).", s5_2_4_h=".sprintf("%s",$s5_2_4_h).", s5_3=".sprintf("%s",$s5_3).", s5_3_r=".sprintf("%s",$s5_3_r).", s5_4=".sprintf("%s",$s5_4).", s5_5_1=".sprintf("%s",$s5_5_1).", s5_5_2=".sprintf("%s",$s5_5_2).", s5_5_3=".sprintf("%s",$s5_5_3).", s5_5_4=".sprintf("%s",$s5_5_4).", s5_5_5=".sprintf("%s",$s5_5_5).", s5_5_5_o=".sprintf("%s",$s5_5_5_o).", s5_6=".sprintf("%s",$s5_6).", s5_6_r=".sprintf("%s",$s5_6_r).", s5_7=".sprintf("%s",$s5_7).", s5_8=".sprintf("%s",$s5_8).", s5_9_1=".sprintf("%s",$s5_9_1).", s5_9_2=".sprintf("%s",$s5_9_2).", s5_9_3=".sprintf("%s",$s5_9_3).", s5_10_1=".sprintf("%s",$s5_10_1).", s5_10_2=".sprintf("%s",$s5_10_2).", s5_10_3=".sprintf("%s",$s5_10_3).", s5_10_4=".sprintf("%s",$s5_10_4).", s5_10_5=".sprintf("%s",$s5_10_5).", s5_10_6=".sprintf("%s",$s5_10_6).", s5_10_7=".sprintf("%s",$s5_10_7).", s5_10_8=".sprintf("%s",$s5_10_8).", s5_10_9=".sprintf("%s",$s5_10_9).", s5_10_10=".sprintf("%s",$s5_10_10).", s5_10_11=".sprintf("%s",$s5_10_11).", s5_10_12=".sprintf("%s",$s5_10_12).", s5_10_13=".sprintf("%s",$s5_10_13).", s5_10_14=".sprintf("%s",$s5_10_14).", s5_10_14_o=".sprintf("%s",$s5_10_14_o).", s5_10_15=".sprintf("%s",$s5_10_15).", s5_10_15_o=".sprintf("%s",$s5_10_15_o).", s5_11_1=".sprintf("%s",$s5_11_1).", s5_11_2=".sprintf("%s",$s5_11_2).", s5_11_3=".sprintf("%s",$s5_11_3).", s5_12=".sprintf("%s",$s5_12).", s5_13_1=".sprintf("%s",$s5_13_1).", s5_13_1_c=".sprintf("%s",$s5_13_1_c).", s5_13_1_u=".sprintf("%s",$s5_13_1_u).", s5_13_1_u_o=".sprintf("%s",$s5_13_1_u_o).", s5_13_1_ma=".sprintf("%s",$s5_13_1_ma).", s5_13_1_me=".sprintf("%s",$s5_13_1_me).", s5_13_2=".sprintf("%s",$s5_13_2).", s5_13_2_c=".sprintf("%s",$s5_13_2_c).", s5_13_2_u=".sprintf("%s",$s5_13_2_u).", s5_13_2_u_o=".sprintf("%s",$s5_13_2_u_o).", s5_13_2_ma=".sprintf("%s",$s5_13_2_ma).", s5_13_2_me=".sprintf("%s",$s5_13_2_me).", s5_13_3=".sprintf("%s",$s5_13_3).", s5_13_3_c=".sprintf("%s",$s5_13_3_c).", s5_13_3_u=".sprintf("%s",$s5_13_3_u).", s5_13_3_u_o=".sprintf("%s",$s5_13_3_u_o).", s5_13_3_ma=".sprintf("%s",$s5_13_3_ma).", s5_13_3_me=".sprintf("%s",$s5_13_3_me).", s5_13_4=".sprintf("%s",$s5_13_4).", s5_13_4_c=".sprintf("%s",$s5_13_4_c).", s5_13_4_u=".sprintf("%s",$s5_13_4_u).", s5_13_4_u_o=".sprintf("%s",$s5_13_4_u_o).", s5_13_4_ma=".sprintf("%s",$s5_13_4_ma).", s5_13_4_me=".sprintf("%s",$s5_13_4_me).", s5_13_5=".sprintf("%s",$s5_13_5).", s5_13_5_c=".sprintf("%s",$s5_13_5_c).", s5_13_5_u=".sprintf("%s",$s5_13_5_u).", s5_13_5_u_o=".sprintf("%s",$s5_13_5_u_o).", s5_13_5_ma=".sprintf("%s",$s5_13_5_ma).", s5_13_5_me=".sprintf("%s",$s5_13_5_me).", s5_13_6=".sprintf("%s",$s5_13_6).", s5_13_6_c=".sprintf("%s",$s5_13_6_c).", s5_13_6_u=".sprintf("%s",$s5_13_6_u).", s5_13_6_u_o=".sprintf("%s",$s5_13_6_u_o).", s5_13_6_ma=".sprintf("%s",$s5_13_6_ma).", s5_13_6_me=".sprintf("%s",$s5_13_6_me).", s5_13_7=".sprintf("%s",$s5_13_7).", s5_13_7_c=".sprintf("%s",$s5_13_7_c).", s5_13_7_u=".sprintf("%s",$s5_13_7_u).", s5_13_7_u_o=".sprintf("%s",$s5_13_7_u_o).", s5_13_7_ma=".sprintf("%s",$s5_13_7_ma).", s5_13_7_me=".sprintf("%s",$s5_13_7_me).", s5_13_8=".sprintf("%s",$s5_13_8).", s5_13_8_e=".sprintf("%s",$s5_13_8_e).", s5_13_8_c=".sprintf("%s",$s5_13_8_c).", s5_13_8_u=".sprintf("%s",$s5_13_8_u).", s5_13_8_u_o=".sprintf("%s",$s5_13_8_u_o).", s5_13_8_ma=".sprintf("%s",$s5_13_8_ma).", s5_13_8_me=".sprintf("%s",$s5_13_8_me).", s5_14_1=".sprintf("%s",$s5_14_1).", s5_14_2=".sprintf("%s",$s5_14_2).", s5_14_3=".sprintf("%s",$s5_14_3).", s5_14_4=".sprintf("%s",$s5_14_4).", s5_14_5=".sprintf("%s",$s5_14_5).", s5_14_6=".sprintf("%s",$s5_14_6).", s5_15_1=".sprintf("%s",$s5_15_1).", s5_15_2=".sprintf("%s",$s5_15_2).", s5_16_1=".sprintf("%s",$s5_16_1).", s5_16_2=".sprintf("%s",$s5_16_2).", s5_16_3=".sprintf("%s",$s5_16_3).", s5_16_4=".sprintf("%s",$s5_16_4).", s5_16_5=".sprintf("%s",$s5_16_5).", s5_16_5_m=".sprintf("%s",$s5_16_5_m).", s5_16_5_p=".sprintf("%s",$s5_16_5_p).", s5_16_6=".sprintf("%s",$s5_16_6).", s5_16_7=".sprintf("%s",$s5_16_7).", s5_16_8=".sprintf("%s",$s5_16_8).", s5_16_9=".sprintf("%s",$s5_16_9).", s5_16_9_o=".sprintf("%s",$s5_16_9_o).", s5_17_1=".sprintf("%s",$s5_17_1).", s5_17_2=".sprintf("%s",$s5_17_2).", s5_17_3=".sprintf("%s",$s5_17_3).", s5_17_4=".sprintf("%s",$s5_17_4).", s5_17_5=".sprintf("%s",$s5_17_5).", s5_17_6=".sprintf("%s",$s5_17_6).", s5_17_7=".sprintf("%s",$s5_17_7).", s5_17_8=".sprintf("%s",$s5_17_8).", s5_17_9=".sprintf("%s",$s5_17_9).", s5_17_10=".sprintf("%s",$s5_17_10).", s5_17_11=".sprintf("%s",$s5_17_11).", s5_17_12=".sprintf("%s",$s5_17_12).", s5_17_13=".sprintf("%s",$s5_17_13).", s5_17_14=".sprintf("%s",$s5_17_14).", s5_17_15=".sprintf("%s",$s5_17_15).", s5_17_15_o=".sprintf("%s",$s5_17_15_o). ", ff_rr5=".sprintf("%s",$ff_rr5). ", user5=".sprintf("%s",$user5)." WHERE id5='".$_SESSION['id1']."'";	


$result = mysql_query($sql);
echo mysql_error ();	
$_SESSION['aviso']=utf8_encode("La Secci�n V ha sido modificada");
$formulario=1;	
}

// validar  un nuevo registro
if($opc==3)
{ 
$_SESSION['id1']=NULL;
$_SESSION['aviso']="Listo para ingresar un nuevo formulario";

}

if($formulario==1)
{
header("location:index.php#indizador");
}

?>