
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$aa='';
$bb='';
$cc='';



$mysql="SELECT * FROM generatriz WHERE seccion='10'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script='';
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
//$script=$script.$com.'$'.$variable.$com.',';

//$script=$script.'if (empty($'.$variable.')) {$'.$variable."=".$com."NULL".$com.";}<br>";
//$script=$script."".$variable." -> ".$s."<br>";


$script=$script."$".$variable."=("."$"."_POST['".$variable."']=='')?'NULL':'\''."."$"."_POST['".$variable."'].'\'';<br>";
$id6=($_SESSION['id1']=='')?'NULL':'\''.$_SESSION['id1'].'\'';
$aa=$aa."`".$variable."`,";
$bb=$bb."%s,";
$cc=$cc."$".$variable.",";


 }
 echo $script.'<br><br><br><br>';
echo $aa.'<br><br>';
echo $bb.'<br><br>';
echo $cc.'<br><br>';
 
 echo '';

 echo $c;
 
?>