<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>REPORTE GENERAL</title>
<style type="text/css">
@import url("css/estilo.css"); 
</style>
</head>
<body>
<p class="title">REPORTE GENERAL  DE CENSO DE ACUICULTORES (Para exportar a excel desplácese hacia abajo)</p>
<p>
  <?php 
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$id_modulo=$_GET['id_modulo'];
$date=date('d-m-y');
date_default_timezone_set('Etc/GMT+5');

function desc($variable)
{
$result = mysql_query("SELECT * FROM  maqueta_formulario WHERE variable='".$variable."'");
 if ($row = mysql_fetch_row($result))
 {	
   $descripcion=$row[7];
   $longitud=$row[9];
   }
   if($longitud<8 and $longitud>=1)  { $ancho=$longitud*5; }
   if($longitud<25 and $longitud>=8)  { $ancho=$longitud*4; }
    if($longitud>=25)  { $ancho=$longitud*4; }
	if($descripcion=='' or $descripcion==NULL) { $descripcion='Sin descripci&oacute;n'; }
	
	$dd='<td width="'.$ancho.'px" class="letra_min">'.utf8_encode($descripcion).'</td>';
    return $dd;
 
 
}

//cabecera_descripcion
$result = mysql_query("SELECT * FROM acuicultura_1  AS a1 INNER JOIN acuicultura_2 AS a2 ON (a1.id=a2.id) INNER JOIN acuicultura_3 AS a3 ON (a2.id=a3.id)");

echo '<table  border="1" cellpadding="2" cellspacing="0" width="44000"><tr bgcolor="#CCFFFF">';
if($row = mysql_fetch_assoc($result)) 
{

   foreach($row as $key => $value)
   {
	
    echo desc($key);
   }
}



echo '</tr>';

//cabecera
$result = mysql_query("SELECT * FROM acuicultura_1 AS a1 INNER JOIN acuicultura_2 AS a2 ON (a1.id=a2.id) INNER JOIN acuicultura_3 AS a3 ON (a2.id=a3.id)");

echo '<tr bgcolor="#FFFFCC">';
if($row = mysql_fetch_assoc($result)) 
{

   foreach($row as $key => $value)
   {
    echo '<td class="titu2"><b>'.$key.'</b> </td>'; 
   }
}



echo '</tr>';
//datos
$result = mysql_query("SELECT * FROM acuicultura_1  AS a1 INNER JOIN acuicultura_2 AS a2 ON (a1.id=a2.id) INNER JOIN acuicultura_3 AS a3 ON (a2.id=a3.id) ORDER BY ccdd, ccpp, ccdi, cod_ccpp ASC");

$c=0;
while($row = mysql_fetch_assoc($result)) 
{
	$c=$c+1;
if($c%2==0) { $color='#EEEEEE'; } else { $color='#FFFFFF'; }
 echo '<tr bgcolor="'.$color.'">';
   foreach($row as $key => $value)
   {
    echo '<td  class="letra">'.utf8_encode($value).' </td>'; 
   }
   echo '</tr>';
}

echo '</table>';
?>
</p>
<p>&nbsp;</p>
<p><a href="export_excel.php" target="_blank"><img src="logo_excel.png" width="100" height="100" border="0" /> <span class="title">Exportar a archivo excel</span></a><span class="title"></span></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>