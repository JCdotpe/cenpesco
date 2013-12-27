<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
//date_default_timezone_set('Etc/GMT+5');
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');

$id3=($_SESSION['id1']=='')?'NULL':'\''.$_SESSION['id1'].'\'';
$s3_100=($_POST['s3_100']=='')?'NULL':'\''.$_POST['s3_100'].'\'';
$s3_100_o=($_POST['s3_100_o']=='')?'NULL':'\''.$_POST['s3_100_o'].'\'';
$s3_200=($_POST['s3_200']=='')?'NULL':'\''.$_POST['s3_200'].'\'';
$s3_200_o=($_POST['s3_200_o']=='')?'NULL':'\''.$_POST['s3_200_o'].'\'';
$s3_300=($_POST['s3_300']=='')?'NULL':'\''.$_POST['s3_300'].'\'';
$s3_300_o=($_POST['s3_300_o']=='')?'NULL':'\''.$_POST['s3_300_o'].'\'';
$s3_400=($_POST['s3_400']=='')?'NULL':'\''.$_POST['s3_400'].'\'';
$s3_400a_o=($_POST['s3_400a_o']=='')?'NULL':'\''.$_POST['s3_400a_o'].'\'';
$s3_500=($_POST['s3_500']=='')?'NULL':'\''.$_POST['s3_500'].'\'';
$s3_500_o=($_POST['s3_500_o']=='')?'NULL':'\''.$_POST['s3_500_o'].'\'';
$s3_600=($_POST['s3_600']=='')?'NULL':'\''.$_POST['s3_600'].'\'';
$s3_600a=($_POST['s3_600a']=='')?'NULL':'\''.$_POST['s3_600a'].'\'';
$s3_600b=($_POST['s3_600b']=='')?'NULL':'\''.$_POST['s3_600b'].'\'';
$s3_600c=($_POST['s3_600c']=='')?'NULL':'\''.$_POST['s3_600c'].'\'';
$s3_700=($_POST['s3_700']=='')?'NULL':'\''.$_POST['s3_700'].'\'';
$s3_800=($_POST['s3_800']=='')?'NULL':'\''.$_POST['s3_800'].'\'';
$s3_901=($_POST['s3_901']=='')?'NULL':'\''.$_POST['s3_901'].'\'';
$s3_902=($_POST['s3_902']=='')?'NULL':'\''.$_POST['s3_902'].'\'';
$s3_903=($_POST['s3_903']=='')?'NULL':'\''.$_POST['s3_903'].'\'';
$s3_904=($_POST['s3_904']=='')?'NULL':'\''.$_POST['s3_904'].'\'';
$s3_905=($_POST['s3_905']=='')?'NULL':'\''.$_POST['s3_905'].'\'';
$s3_906=($_POST['s3_906']=='')?'NULL':'\''.$_POST['s3_906'].'\'';
$s3_907=($_POST['s3_907']=='')?'NULL':'\''.$_POST['s3_907'].'\'';
$s3_908=($_POST['s3_908']=='')?'NULL':'\''.$_POST['s3_908'].'\'';
$s3_909=($_POST['s3_909']=='')?'NULL':'\''.$_POST['s3_909'].'\'';
$s3_910=($_POST['s3_910']=='')?'NULL':'\''.$_POST['s3_910'].'\'';
$s3_911=($_POST['s3_911']=='')?'NULL':'\''.$_POST['s3_911'].'\'';
$s3_1001=($_POST['s3_1001']=='')?'NULL':'\''.$_POST['s3_1001'].'\'';
$s3_1002=($_POST['s3_1002']=='')?'NULL':'\''.$_POST['s3_1002'].'\'';
$s3_1003=($_POST['s3_1003']=='')?'NULL':'\''.$_POST['s3_1003'].'\'';
$s3_1004=($_POST['s3_1004']=='')?'NULL':'\''.$_POST['s3_1004'].'\'';
$s3_1005=($_POST['s3_1005']=='')?'NULL':'\''.$_POST['s3_1005'].'\'';
$s3_1100=($_POST['s3_1100']=='')?'NULL':'\''.$_POST['s3_1100'].'\'';
$s3_1100e=($_POST['s3_1100e']=='')?'NULL':'\''.$_POST['s3_1100e'].'\'';
$s3_1100e_cod=($_POST['s3_1100e_cod']=='')?'NULL':'\''.$_POST['s3_1100e_cod'].'\'';

$ff_rr3=date('Y-m-d H:i:s');
$ff_rr3=($ff_rr3=='')?'NULL':'\''.$ff_rr3.'\'';
$user3=($_SESSION['user_id']=='')?'NULL':'\''.$_SESSION['user_id'].'\'';

$frm3=$_POST['frm3'];
$opc3=$_POST['opc3'];
$opc=$_POST['opc'];

if($frm3==1 and $opc3==1)
{
$sql=sprintf("INSERT INTO acu_seccion3 (`id3`,`s3_100`,`s3_100_o`,`s3_200`,`s3_200_o`,`s3_300`,`s3_300_o`,`s3_400`,`s3_400a_o`,`s3_500`,`s3_500_o`,`s3_600`,`s3_600a`,`s3_600b`,`s3_600c`,`s3_700`,`s3_800`,`s3_901`,`s3_902`,`s3_903`,`s3_904`,`s3_905`,`s3_906`,`s3_907`,`s3_908`,`s3_909`,`s3_910`,`s3_911`,`s3_1001`,`s3_1002`,`s3_1003`,`s3_1004`,`s3_1005`,`s3_1100`,`s3_1100e`,`s3_1100e_cod`,`ff_rr3`,`user3`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",$id3,$s3_100,$s3_100_o,$s3_200,$s3_200_o,$s3_300,$s3_300_o,$s3_400,$s3_400a_o,$s3_500,$s3_500_o,$s3_600,$s3_600a,$s3_600b,$s3_600c,$s3_700,$s3_800,$s3_901,$s3_902,$s3_903,$s3_904,$s3_905,$s3_906,$s3_907,$s3_908,$s3_909,$s3_910,$s3_911,$s3_1001,$s3_1002,$s3_1003,$s3_1004,$s3_1005,$s3_1100,$s3_1100e,$s3_1100e_cod,$ff_rr3,$user3);  

$result = mysql_query($sql);
echo mysql_error ();
$_SESSION['aviso']=utf8_encode("La Sección III ya está guardada");

$formulario=1;

}

//modificAR DATOS
if($frm3==1 and $opc3==2)
{
	
$sql= "UPDATE acu_seccion3 SET s3_100=".sprintf("%s",$s3_100).", s3_100_o=".sprintf("%s",$s3_100_o).", s3_200=".sprintf("%s",$s3_200).", s3_200_o=".sprintf("%s",$s3_200_o).", s3_300=".sprintf("%s",$s3_300).", s3_300_o=".sprintf("%s",$s3_300_o).", s3_400=".sprintf("%s",$s3_400).", s3_400a_o=".sprintf("%s",$s3_400a_o).", s3_500=".sprintf("%s",$s3_500).", s3_500_o=".sprintf("%s",$s3_500_o).", s3_600=".sprintf("%s",$s3_600).", s3_600a=".sprintf("%s",$s3_600a).", s3_600b=".sprintf("%s",$s3_600b).", s3_600c=".sprintf("%s",$s3_600c).", s3_700=".sprintf("%s",$s3_700).", s3_800=".sprintf("%s",$s3_800).", s3_901=".sprintf("%s",$s3_901).", s3_902=".sprintf("%s",$s3_902).", s3_903=".sprintf("%s",$s3_903).", s3_904=".sprintf("%s",$s3_904).", s3_905=".sprintf("%s",$s3_905).", s3_906=".sprintf("%s",$s3_906).", s3_907=".sprintf("%s",$s3_907).", s3_908=".sprintf("%s",$s3_908).", s3_909=".sprintf("%s",$s3_909).", s3_910=".sprintf("%s",$s3_910).", s3_911=".sprintf("%s",$s3_911).", s3_1001=".sprintf("%s",$s3_1001).", s3_1002=".sprintf("%s",$s3_1002).", s3_1003=".sprintf("%s",$s3_1003).", s3_1004=".sprintf("%s",$s3_1004).", s3_1005=".sprintf("%s",$s3_1005).", s3_1100=".sprintf("%s",$s3_1100).", s3_1100e=".sprintf("%s",$s3_1100e).", s3_1100e_cod=".sprintf("%s",$s3_1100e_cod). ", ff_rr3=".sprintf("%s",$ff_rr3). ", user3=".sprintf("%s",$user3)." WHERE id3='".$_SESSION['id1']."'";

$result = mysql_query($sql);
echo mysql_error ();	
$_SESSION['aviso']=utf8_encode("La Sección III ha sido modificada");
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