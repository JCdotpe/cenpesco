<?php
include ("seguridad.php");
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
$fecha=date("Y-m-d H:i:s");
///registramos ingreso al aula virtual
if($_SESSION["tipo"]==2)
{
$sql="INSERT INTO  cap_asistencia (id,dni,id_dep,id_odei,fecha,id_seccion,id_asignacion,tipo) VALUES ('".$_SESSION["id"]."','".$_SESSION["dni"]."','".$_SESSION["cod_dep"]."','".$_SESSION["cod_odei"]."','".$fecha."','".$_SESSION["seccion"]."','".$_SESSION["asignacion"]."','2')";
$result = mysql_query($sql);
}

session_destroy();
header("Location: index.php");

?>