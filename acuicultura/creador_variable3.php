
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$aa='';
$bb='';
$cc='';



$mysql="SELECT * FROM generatriz WHERE seccion='10'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script1='';
  $script2='';
  $script3='';
 while ($row = mysql_fetch_array($r))
 {
 $c=$c+1;
$variable= $row['variable'];
if($row['tipo']!='N')
{
$com="'";
$s='A';
}
else
{
$com="'";
$s='N';
}
//numericValue = %d, description = '%s'




$script1=$script1.$variable.'='.'".sprintf("%s",$'.$variable.').", ';
//$script2=$script2."mysql_real_escape_string($".$variable."), ";
//$script3=$script3." mysql_real_escape_string(".$variable."), ";;

 }
 echo $script1.'<br><br><br><br>';
echo $script2.'<br><br>';
//echo $script3.'<br><br>';
echo $cc.'<br><br>';
 
 echo '';

 echo $c;
 
?>