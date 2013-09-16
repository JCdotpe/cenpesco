<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
//date_default_timezone_set('Etc/GMT+5');
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');

$id4=($_SESSION['id1']=='')?'NULL':'\''.$_SESSION['id1'].'\'';
$s4_1_dd=($_POST['s4_1_dd']=='')?'NULL':'\''.$_POST['s4_1_dd'].'\'';
$s4_1_dd_cod=($_POST['s4_1_dd_cod']=='')?'NULL':'\''.$_POST['s4_1_dd_cod'].'\'';
$s4_1_pp=($_POST['s4_1_pp']=='')?'NULL':'\''.$_POST['s4_1_pp'].'\'';
$s4_1_pp_cod=($_POST['s4_1_pp_cod']=='')?'NULL':'\''.$_POST['s4_1_pp_cod'].'\'';
$s4_1_di=($_POST['s4_1_di']=='')?'NULL':'\''.$_POST['s4_1_di'].'\'';
$s4_1_di_cod=($_POST['s4_1_di_cod']=='')?'NULL':'\''.$_POST['s4_1_di_cod'].'\'';
$s4_1_ccpp=($_POST['s4_1_ccpp']=='')?'NULL':'\''.$_POST['s4_1_ccpp'].'\'';
$s4_1_ccpp_cod=($_POST['s4_1_ccpp_cod']=='')?'NULL':'\''.$_POST['s4_1_ccpp_cod'].'\'';
$s4_tipvia=($_POST['s4_tipvia']=='')?'NULL':'\''.$_POST['s4_tipvia'].'\'';
$s4_nomvia=($_POST['s4_nomvia']=='')?'NULL':'\''.$_POST['s4_nomvia'].'\'';
$s4_ptanum=($_POST['s4_ptanum']=='')?'NULL':'\''.$_POST['s4_ptanum'].'\'';
$s4_mz=($_POST['s4_mz']=='')?'NULL':'\''.$_POST['s4_mz'].'\'';
$s4_lote=($_POST['s4_lote']=='')?'NULL':'\''.$_POST['s4_lote'].'\'';
$s4_km=($_POST['s4_km']=='')?'NULL':'\''.$_POST['s4_km'].'\'';
$s4_ref=($_POST['s4_ref']=='')?'NULL':'\''.$_POST['s4_ref'].'\'';
$s4_2=($_POST['s4_2']=='')?'NULL':'\''.$_POST['s4_2'].'\'';
$s4_3=($_POST['s4_3']=='')?'NULL':'\''.$_POST['s4_3'].'\'';
$ff_rr4=date('Y-m-d H:i:s');
$ff_rr4=($ff_rr4=='')?'NULL':'\''.$ff_rr4.'\'';
$user4=($_SESSION['user_id']=='')?'NULL':'\''.$_SESSION['user_id'].'\'';
$frm4=$_POST['frm4'];
$opc4=$_POST['opc4'];
$opc=$_POST['opc'];

////----- UBICACION DEL CENTRO DE CULTIVO

// 1  DEPA
$ccdd1 = str_replace("'","",$s4_1_dd_cod); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_DD ='".$ccdd1."'");
while ($row = mysql_fetch_array($result))
{
$s4_1_dd=$row['DEPARTAMENTO'];
}
$s4_1_dd=($s4_1_dd=='')?'NULL':'\''.$s4_1_dd.'\'';

//2 PROV
$ccpp1 = str_replace("'","",$s4_1_pp_cod); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$ccpp1."' AND  COD_DD ='".$ccdd1."'");
while ($row = mysql_fetch_array($result))
{
$s4_1_pp=$row['PROVINCIA'];
}
$s4_1_pp=($s4_1_pp=='')?'NULL':'\''.$s4_1_pp.'\'';

//3 DISTRITO
$ccdi1 = str_replace("'","",$s4_1_di_cod); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$ccpp1."' AND  COD_DD ='".$ccdd1."' AND COD_DI='".$ccdi1."'");
while ($row = mysql_fetch_array($result))
{
$s4_1_di=$row['DISTRITO'];
}
$s4_1_di=($s4_1_di=='')?'NULL':'\''.$s4_1_di.'\'';

//4 CENTRO POBLADO
$cod_ccpp1 = str_replace("'","",$s4_1_ccpp_cod); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$ccpp1."' AND  COD_DD ='".$ccdd1."' AND COD_DI='".$ccdi1."' AND COD_CCPP='".$cod_ccpp1."'");
while ($row = mysql_fetch_array($result))
{
$s4_1_ccpp=$row['CENTRO_POBLADO'];
}
$s4_1_ccpp=($s4_1_ccpp=='')?'NULL':'\''.$s4_1_ccpp.'\'';
///-----------fin

//-------

if($frm4==1 and $opc4==1)
{
//echo $s4_1_ccpp_cod;
$sql=sprintf("INSERT INTO acu_seccion4 (`id4`,`s4_1_dd`,`s4_1_dd_cod`,`s4_1_pp`,`s4_1_pp_cod`,`s4_1_di`,`s4_1_di_cod`,`s4_1_ccpp`,`s4_1_ccpp_cod`,`s4_tipvia`,`s4_nomvia`,`s4_ptanum`,`s4_mz`,`s4_lote`,`s4_km`,`s4_ref`,`s4_2`,`s4_3`,`ff_rr4`,`user4`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",$id4,$s4_1_dd,$s4_1_dd_cod,$s4_1_pp,$s4_1_pp_cod,$s4_1_di,$s4_1_di_cod,$s4_1_ccpp,$s4_1_ccpp_cod,$s4_tipvia,$s4_nomvia,$s4_ptanum,$s4_mz,$s4_lote,$s4_km,$s4_ref,$s4_2,$s4_3,$ff_rr4,$user4); 

$result = mysql_query($sql);
echo mysql_error ();
$_SESSION['aviso']=utf8_encode("La Sección IV ha sido guardada");

$formulario=1;

}

if($frm4==1 and $opc4==2)
{
$sql= "UPDATE acu_seccion4 SET s4_1_dd=".sprintf("%s",$s4_1_dd).", s4_1_dd_cod=".sprintf("%s",$s4_1_dd_cod).", s4_1_pp=".sprintf("%s",$s4_1_pp).", s4_1_pp_cod=".sprintf("%s",$s4_1_pp_cod).", s4_1_di=".sprintf("%s",$s4_1_di).", s4_1_di_cod=".sprintf("%s",$s4_1_di_cod).", s4_1_ccpp=".sprintf("%s",$s4_1_ccpp).", s4_1_ccpp_cod=".sprintf("%s",$s4_1_ccpp_cod).", s4_tipvia=".sprintf("%s",$s4_tipvia).", s4_nomvia=".sprintf("%s",$s4_nomvia).", s4_ptanum=".sprintf("%s",$s4_ptanum).", s4_mz=".sprintf("%s",$s4_mz).", s4_lote=".sprintf("%s",$s4_lote).", s4_km=".sprintf("%s",$s4_km).", s4_ref=".sprintf("%s",$s4_ref).", s4_2=".sprintf("%s",$s4_2).", s4_3=".sprintf("%s",$s4_3)." WHERE id4='".$_SESSION['id1']."'";

$result = mysql_query($sql);
echo mysql_error ();	
$_SESSION['aviso']=utf8_encode("La Sección IV ha sido modificada");
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

