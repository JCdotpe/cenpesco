<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Etc/GMT+5');
include("conexion.php");

$id6=($_SESSION['id1']=='')?'NULL':'\''.$_SESSION['id1'].'\'';
$s6_1_1=($_POST['s6_1_1']=='')?'NULL':'\''.$_POST['s6_1_1'].'\'';
$s6_1_2=($_POST['s6_1_2']=='')?'NULL':'\''.$_POST['s6_1_2'].'\'';
$s6_1_3=($_POST['s6_1_3']=='')?'NULL':'\''.$_POST['s6_1_3'].'\'';
$s6_1_4=($_POST['s6_1_4']=='')?'NULL':'\''.$_POST['s6_1_4'].'\'';
$s6_1_5=($_POST['s6_1_5']=='')?'NULL':'\''.$_POST['s6_1_5'].'\'';
$s6_1_6=($_POST['s6_1_6']=='')?'NULL':'\''.$_POST['s6_1_6'].'\'';
$s6_1_7=($_POST['s6_1_7']=='')?'NULL':'\''.$_POST['s6_1_7'].'\'';
$s6_1_7_o=($_POST['s6_1_7_o']=='')?'NULL':'\''.$_POST['s6_1_7_o'].'\'';
$s6_1_8=($_POST['s6_1_8']=='')?'NULL':'\''.$_POST['s6_1_8'].'\'';
$s6_2_1=($_POST['s6_2_1']=='')?'NULL':'\''.$_POST['s6_2_1'].'\'';
$s6_2_2=($_POST['s6_2_2']=='')?'NULL':'\''.$_POST['s6_2_2'].'\'';
$s6_2_3=($_POST['s6_2_3']=='')?'NULL':'\''.$_POST['s6_2_3'].'\'';
$s6_2_4=($_POST['s6_2_4']=='')?'NULL':'\''.$_POST['s6_2_4'].'\'';
$s6_2_5=($_POST['s6_2_5']=='')?'NULL':'\''.$_POST['s6_2_5'].'\'';
$s6_2_5_o=($_POST['s6_2_5_o']=='')?'NULL':'\''.$_POST['s6_2_5_o'].'\'';
$s6_2_6=($_POST['s6_2_6']=='')?'NULL':'\''.$_POST['s6_2_6'].'\'';

$ff_rr6=date('Y-m-d H:i:s');
$ff_rr6=($ff_rr6=='')?'NULL':'\''.$ff_rr6.'\'';

$user6=($_SESSION['user_id']=='')?'NULL':'\''.$_SESSION['user_id'].'\'';
$frm6=$_POST['frm6'];
$opc6=$_POST['opc6'];
$opc=$_POST['opc'];

if($frm6==1 and $opc6==1)
{
$sql=sprintf("INSERT INTO acu_seccion6 (`id6`,`s6_1_1`,`s6_1_2`,`s6_1_3`,`s6_1_4`,`s6_1_5`,`s6_1_6`,`s6_1_7`,`s6_1_7_o`,`s6_1_8`,`s6_2_1`,`s6_2_2`,`s6_2_3`,`s6_2_4`,`s6_2_5`,`s6_2_5_o`,`s6_2_6`,`ff_rr6`,`user6`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",$id6,$s6_1_1,$s6_1_2,$s6_1_3,$s6_1_4,$s6_1_5,$s6_1_6,$s6_1_7,$s6_1_7_o,$s6_1_8,$s6_2_1,$s6_2_2,$s6_2_3,$s6_2_4,$s6_2_5,$s6_2_5_o,$s6_2_6,$ff_rr6,$user6); 

$result = mysql_query($sql);
echo mysql_error ();
$_SESSION['aviso']=utf8_encode("La Sección VI ha sido guardada");

$formulario=1;
}

///modificacion de seccion VI

if($frm6==1 and $opc6==2)
{

$sql= "UPDATE acu_seccion6 SET s6_1_1=".sprintf("%s",$s6_1_1).", s6_1_2=".sprintf("%s",$s6_1_2).", s6_1_3=".sprintf("%s",$s6_1_3).", s6_1_4=".sprintf("%s",$s6_1_4).", s6_1_5=".sprintf("%s",$s6_1_5).", s6_1_6=".sprintf("%s",$s6_1_6).", s6_1_7=".sprintf("%s",$s6_1_7).", s6_1_7_o=".sprintf("%s",$s6_1_7_o).", s6_1_8=".sprintf("%s",$s6_1_8).", s6_2_1=".sprintf("%s",$s6_2_1).", s6_2_2=".sprintf("%s",$s6_2_2).", s6_2_3=".sprintf("%s",$s6_2_3).", s6_2_4=".sprintf("%s",$s6_2_4).", s6_2_5=".sprintf("%s",$s6_2_5).", s6_2_5_o=".sprintf("%s",$s6_2_5_o).", s6_2_6=".sprintf("%s",$s6_2_6). ", ff_rr6=".sprintf("%s",$ff_rr6). ", user6=".sprintf("%s",$user6)." WHERE id6='".$_SESSION['id1']."'";

$result = mysql_query($sql);
echo mysql_error ();	
$_SESSION['aviso']=utf8_encode("La Sección VI ha sido modificada");
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