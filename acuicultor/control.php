<?php  session_start();
@$ide=$_POST['ide'];
@$dni= $_POST['dni'];
@$dia= $_POST['dia'];
@$anio= $_POST['anio'];
//@$tipo_usu= $HTTP_POST_VARS['tipo_usu'];
require("conexion.php");  	

 
@$mysqla="SELECT * FROM regs WHERE dni = '".$dni."'"; 
  	$queryresult=mysql_query($mysqla);
    if($row=@mysql_fetch_array($queryresult))
{
$dni1=$row[1]; 
$dia1=substr($row[19],8,2); 
$anio1=substr($row[19],0,4);
$nombres=$row[10].' '.$row[11].' '.$row[8].' '.$row[9];
$sex=$row[12];
}
	
if ($dni1==$dni and  $dia1==$dia and $anio==$anio1)
{
$_SESSION["autenticado"]="1";
$_SESSION["dni"]=$_POST["dni"];
$_SESSION["nom"]=$nombres;
$_SESSION["sex"]=$sex;
header("location:principal.php");
}
else
{
header("location:index.php?errorusuario=si");
}
?>
