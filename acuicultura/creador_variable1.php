
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);




$mysql="SELECT * FROM generatriz WHERE seccion='10'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script='';
 while ($row = mysql_fetch_array($r))
 {
 $c=$c+1;
$variable= $row['variable'];
$var= "if( document.getElementById('".$variable."').value=='') {".'  alert("Verique el campo '.$row[descripcion].'");'."    document.getElementById('".$variable."').focus(); return false; } <br>";

$script=$script.$var;

//$script=$script.'if (empty($'.$variable.')) {$'.$variable."=".$com."NULL".$com.";}<br>";
//$script=$script."".$variable." -> ".$s."<br>";
 }
 echo $script;
 
 echo '';

 echo $c;
 
?>