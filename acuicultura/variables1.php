<?php  session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
//---------------------------------------------------
$user1=$_SESSION['user_id'];
$ubigeo=$_SESSION['user_ubigeo'];
//$ubigeo=11;
$frm=$_POST['frm'];
$opc=$_POST['opc'];
$ide1=$_POST['ide1'];

//-------------------------------------------------

$id1=($_POST['id1']=='')?'NULL':'\''.$_POST['id1'].'\'';
$nform=($_POST['nform']=='')?'NULL':'\''.$_POST['nform'].'\'';
$ccdd=($_POST['ccdd']=='')?'NULL':'\''.$_POST['ccdd'].'\'';
$nom_dd=($_POST['nom_dd']=='')?'NULL':'\''.$_POST['nom_dd'].'\'';
$ccpp=($_POST['ccpp']=='')?'NULL':'\''.$_POST['ccpp'].'\'';
$nom_pp=($_POST['nom_pp']=='')?'NULL':'\''.$_POST['nom_pp'].'\'';
$ccdi=($_POST['ccdi']=='')?'NULL':'\''.$_POST['ccdi'].'\'';
$nom_di=($_POST['nom_di']=='')?'NULL':'\''.$_POST['nom_di'].'\'';
$cod_ccpp=($_POST['cod_ccpp']=='')?'NULL':'\''.$_POST['cod_ccpp'].'\'';
$tac=($_POST['tac']=='')?'NULL':'\''.$_POST['tac'].'\'';
$nom_ccpp=($_POST['nom_ccpp']=='')?'NULL':'\''.$_POST['nom_ccpp'].'\'';

$ff_rr1=($_POST['ff_rr1']=='')?'NULL':'\''.$_POST['ff_rr1'].'\'';

///-----------cabecera
$sede_cod=($_SESSION['user_ubigeo']=='')?'NULL':'\''.$_SESSION['user_ubigeo'].'\'';


///buscamos  nombre sede y cod_odei   ODEI
$result = mysql_query("SELECT DISTINCT(odei_cod), nom_odei, nom_sede FROM marco WHERE sede_cod='".$_SESSION['user_ubigeo']."' AND ccdd='".str_replace("'","",$ccdd)."'");
while ($row = mysql_fetch_array($result))
{
$odei_cod=$row['odei_cod'];
$nom_odei=$row['nom_odei'];
$nom_sede=$row['nom_sede'];
}
$odei_cod=($odei_cod=='')?'NULL':'\''.$odei_cod.'\'';
$nom_odei=($nom_odei=='')?'NULL':'\''.$nom_odei.'\'';
$nom_sede=($nom_sede=='')?'NULL':'\''.$nom_sede.'\'';

//$user1=($_POST['user1']=='')?'NULL':'\''.$_POST['user1'].'\'';

date_default_timezone_set('Etc/GMT+5');
 

///contamos de udra
function udra($dep,$pro,$dis,$cep)
{
/////-------------------------------UDRA
$result = mysql_query("SELECT * FROM udra_acuicultor WHERE CCDD ='".$dep."' AND  CCPP='".$pro."' AND  CCDI='".$dis."' AND  COD_CCPP='".$cep."'");
while ($row = mysql_fetch_array($result))
{
$nf1=$row['FORMULARIOS'];	
}
///FORMULARIOS LLENADOS
$result = mysql_query("SELECT COUNT(id1) FROM acu_seccion1 WHERE ccdd ='".$dep."' AND  ccpp='".$pro."' AND  ccdi='".$dis."' AND  cod_ccpp='".$cep."'");
while ($row = mysql_fetch_row($result))
{
$nf2=$row[0];	
}

if($nf2<$nf1) { $valor=1; } else { $valor=0; $_SESSION['aviso']=utf8_encode("No puede registrar este formulario porque no está registrado en UDRA");}

return $valor;
}

//Jalamos  codigos CCPP,DIST, PROV y DEP.
// 1  DEPA
$ccdd1 = str_replace("'","",$ccdd); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_DD ='".$ccdd1."'");
while ($row = mysql_fetch_array($result))
{
$nom_dd=$row['DEPARTAMENTO'];
}
$nom_dd=($nom_dd=='')?'NULL':'\''.$nom_dd.'\'';

//2 PROV
$ccpp1 = str_replace("'","",$ccpp); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$ccpp1."' AND  COD_DD ='".$ccdd1."'");
while ($row = mysql_fetch_array($result))
{
$nom_pp=$row['PROVINCIA'];
}
$nom_pp=($nom_pp=='')?'NULL':'\''.$nom_pp.'\'';

//3 DISTRITO
$ccdi1 = str_replace("'","",$ccdi); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$ccpp1."' AND  COD_DD ='".$ccdd1."' AND COD_DI='".$ccdi1."'");
while ($row = mysql_fetch_array($result))
{
$nom_di=$row['DISTRITO'];
}
$nom_di=($nom_di=='')?'NULL':'\''.$nom_di.'\'';

//4 CENTRO POBLADO
$cod_ccpp1 = str_replace("'","",$cod_ccpp); 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$ccpp1."' AND  COD_DD ='".$ccdd1."' AND COD_DI='".$ccdi1."' AND COD_CCPP='".$cod_ccpp1."'");
while ($row = mysql_fetch_array($result))
{
$nom_ccpp=$row['CENTRO_POBLADO'];
}
$nom_ccpp=($nom_ccpp=='')?'NULL':'\''.$nom_ccpp.'\'';
///-----------fin


$flag=0;
//--------------- VALIDATOR apara que no se repita
$result = mysql_query("SELECT * FROM  acu_seccion1 WHERE nform ='".str_replace("'","",$nform)."' AND ccdd='".str_replace("'","",$ccdd)."' AND ccpp='".str_replace("'","",$ccpp)."' AND ccdi='".str_replace("'","",$ccdi)."' AND cod_ccpp='".str_replace("'","",$cod_ccpp)."'");

while ($row = mysql_fetch_array($result))

{
$flag=1;
$_SESSION['aviso']=utf8_encode("Este punto de concentración ya fue registrado");

}

///Guardar  SECCION I
$banda=udra($ccdd1,$ccpp1,$ccdi1,$cod_ccpp1);

if($frm==1 and $opc==1 and $flag==0 and $_SESSION['user_ubigeo']!='99' and $banda==1)
{
	$id1=0;
      $result = mysql_query("SELECT MAX(id1) FROM  acu_seccion1");
		 while ($row = mysql_fetch_row($result))
			{
			 $id1=$row[0];	
			}
	       $id1=$id1+1;
  	


$sql="INSERT INTO  acu_seccion1 (id1,nform,ccdd,nom_dd,ccpp,nom_pp,ccdi,nom_di,cod_ccpp,tac,nom_ccpp,ff_rr1,user1) VALUES ('".$id1."','".$nform."','".$ccdd."','".$nom_dd."','".$ccpp."','".$nom_pp."','".$ccdi."','".$nom_di."','".$cod_ccpp."','".$tac."','".$nom_ccpp."','".$ff_rr1."','".$user1."')";

$sql=sprintf("INSERT INTO acu_seccion1 (`id1`,`nform`,`ccdd`,`nom_dd`,`ccpp`,`nom_pp`,`ccdi`,`nom_di`,`cod_ccpp`,`tac`,`nom_ccpp`,`ff_rr1`,`user1`,`sede_cod`,`nom_sede`,`odei_cod`,`nom_odei`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",$id1,$nform,$ccdd,$nom_dd,$ccpp,$nom_pp,$ccdi,$nom_di,$cod_ccpp,$tac,$nom_ccpp,$ff_rr1,$user1,$sede_cod,$nom_sede,$odei_cod,$nom_odei);  

$result = mysql_query($sql);
echo mysql_error ();


$_SESSION['id1']=$id1;
$_SESSION['aviso']=utf8_encode("La Sección I y esta guardada");
$formulario=1;
}

//Modificar seccion I

if($frm==1 and $opc==2)
{ 
if($ide1!=NULL)
{
$_SESSION['id1']=$ide1;
}
$sql= "UPDATE acu_seccion1 SET ccdd=".sprintf("%s",$ccdd).", nom_dd=".sprintf("%s",$nom_dd).", ccpp=".sprintf("%s",$ccpp).", nom_pp=".sprintf("%s",$nom_pp).", ccdi=".sprintf("%s",$ccdi).", nom_di=".sprintf("%s",$nom_di).", cod_ccpp=".sprintf("%s",$cod_ccpp).", tac=".sprintf("%s",$tac).", nom_ccpp=".sprintf("%s",$nom_ccpp)." WHERE id1='".$_SESSION['id1']."'";

$result = mysql_query($sql);
echo mysql_error ();

$_SESSION['aviso']=utf8_encode("La Sección I ya modificó");
$formulario=1;
}

// validar  un nuevo registro
if($opc==3 and $frm==13)
{ 
$_SESSION['id1']=NULL;
$_SESSION['aviso']="Listo para ingresar un nuevo formulario";
$_SESSION['pj']=NULL;
header("location:index.php");
}
if($formulario==1)
{
header("location:index.php#indizador");


//echo '<script>';
//echo 'window.open("index.php#indizador", "frame");'; 
//
}
?>