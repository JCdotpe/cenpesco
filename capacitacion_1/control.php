<?php  session_start();
error_reporting(E_ALL ^ E_NOTICE);
@$usuario=$_POST['usuario'];
@$tipo_usuario=$_POST['tipo_usuario'];
@$clave= $_POST['clave'];
require("conexion.php");
date_default_timezone_set('Etc/GMT+5');
if($tipo_usuario==1)
{
	
@$mysqla="SELECT * FROM cap_docente WHERE dni='".$usuario."'"; 
  	$queryresult=mysql_query($mysqla);
    if($row=@mysql_fetch_array($queryresult))
{
$id=$row[0];
$dni=$row[1]; 
$nombres=$row[2].' '.$row[3]; 
$clave1=$row[5]; 
$estado=2;
$email=$row[4];
$sexo=$row[8];
}
}
///-----------------------------------------------------------------
if($tipo_usuario==2)
{
@$mysqla="SELECT * FROM regs WHERE dni='".$usuario."'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
	
$id=$row[0];
//$dni=$row[1]; 
$nombres=$row[11].' '.$row[12].' '.$row[10].' '.$row[11]; 
//$clave1=$row[81]; 	
$estado=$row[78];
$email=$row[26];
$sexo=$row[14];
$cod_odei=$row[4];
$cod_dep=$row[2];
}
}

if($tipo_usuario==3)
{
	
@$mysqla="SELECT * FROM cap_docente WHERE dni='".$usuario."'"; 
  	$queryresult=mysql_query($mysqla);
    if($row=@mysql_fetch_array($queryresult))
{
$id=$row[0];
$dni=$row[1]; 
$nombres=$row[2].' '.$row[3]; 
$clave1=$row[5]; 
$estado=2;
$email=$row[4];
$sexo=$row[8];
}
}
///---------------
///-----------------------------------------------------------------
if($tipo_usuario==NULL)
{
@$mysqla="SELECT * FROM cap_administrador WHERE dni='".$usuario."'"; 
  	$queryresult=mysql_query($mysqla);
    if($row=@mysql_fetch_array($queryresult))
{
$id=$row[0];
$dni=$row[1]; 
$nombres=$row[2].' '.$row[3]; 
$clave1=$row[5]; 
$estado=2;
$email=$row[4];
$sexo=$row[8];
}
}


//------------------------------------------NUMERO DE SECCION
function seccion($id,$asig)
{
if($asig==2)
{
@$mysqla="SELECT * FROM cap_asignacion_alu WHERE id_alumno='".$id."'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
$sec=$row[2];	
}
}
//-----------------------
if($asig==1)
{
@$mysqla="SELECT * FROM cap_asignacion_doc WHERE id_docente='".$id."'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
$sec=$row[2];	
}
}

return $sec;
}


//------------------------------------------ CODIGO DE ASIGNACION
function asignacion($id,$asig)
{
if($asig==2)
{
@$mysqla="SELECT * FROM cap_asignacion_alu WHERE id_alumno='".$id."'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
$as=$row[0];	
}
}
//-----------------
if($asig==1)
{
@$mysqla="SELECT * FROM cap_asignacion_doc WHERE id_docente='".$id."'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
$as=$row[0];	
}
}

return $as;
}

if ($dni==$usuario and  md5($clave)==$clave1 and $estado==2)
{
$_SESSION["tipo"]=$tipo_usuario;
$_SESSION["autenticado"]="1";
$_SESSION["dni"]=$dni;
$_SESSION["nombres"]=$nombres;
$_SESSION["id"]=$id;
$_SESSION["email"]=$email;
$_SESSION["sexo"]=$sexo;

$fecha=date("Y-m-d H:i:s");
@$seccion=seccion($_SESSION["id"]);

$_SESSION["seccion"]=seccion($id,$_SESSION["tipo"]);
$_SESSION["asignacion"]=asignacion($id,$_SESSION["tipo"]);

$_SESSION["cod_dep"]=$cod_dep;
$_SESSION["cod_odei"]=$cod_odei;

///registramos ingreso al aula virtual
if($_SESSION["tipo"]==2)
{ header("location:index.php?errorusuario=si");
}

///---------------------------------
if($_SESSION["tipo"]==3) 
{ header("location:usuario.php");	
}
else
{ header("location:principal.php");
}
}
else
{ header("location:index.php?errorusuario=si");
}
?>