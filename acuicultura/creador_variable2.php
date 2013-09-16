
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$aa='';
$bb='';
$cc='';



$mysql="SELECT * FROM generatriz WHERE seccion='2'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script='';
 while ($row = mysql_fetch_array($r))
 {
 $c=$c+1;
$variable= $row['variable'];
$script=$script."$".$variable."="."$"."row['".$variable."'];<br>";


 }
 echo $script;

 
 echo '';

 echo $c;
 
?>