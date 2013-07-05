<?php
header('Content-Type: charset=iso-8859-1');
error_reporting(E_ALL ^ E_NOTICE);
header('Content-type: application/vnd.ms-excel');
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$id_modulo=$_GET['id_modulo'];
$date=date('d-m-y');
$id_modulo=$_GET['id_modulo'];
$date=date('d-m-y');
date_default_timezone_set('Etc/GMT+5');
header("Content-Disposition: attachment; filename=Reporte-".$date.".xls");
header("Pragma: no-cache");
header("Expires: 0");

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
?>
<style>
.cuerpo
{
width:100%;height:100%;background-color:#F5F5F5; border-style:solid;border-width:1px; border-color:#C9C9C9; margin:0;padding:0;display:table; padding:1px;     text-align:center;
}
.cabecera
{
width: 100%; height:110px; background-color:#84B5DD;  text-align:center; 
}

.cabecera1
{
width: 100%; height:182px; background-color:#0C2158;  text-align:center; 
}
.panel
{
float:left; width: 78%; text-align:left; padding:2px; margin:4px;
}


.acceso
{
 moz-border-radius: 15px 15px 15px 15px;
      /*para Safari y Chrome*/
 webkit-border-radius: 15px 15px 10px 15px;
      /*para IE */
behavior:url(border.htc);
      /* para Opera */
 border-radius: 15px 15px 15px 15px;

text-align:center;
	  
height: 450px;
margin-top: 20px;
width: 80%;
margin-right: auto;
margin-left: auto;
background-color:#CDD5E0;

}

/* CSS  para Enlaces   */

.enlace
{
font-family:13px;
color:#0054A8;
	
}

#menuv {
float:left; 
width: 20%; 
border-width: 1px 1px 0 1px;
border: 1px solid #ACCFE8;
text-align:left;


font: 13px "Geneva", Arial, Helvetica, sans-serif;
}
#menuv ul, li {
list-style-type: none;

}

#menuv ul {
margin: 0;
padding: 0;

}

#menuv li {
border-bottom: 1px solid #ACCFE8;
}

#menuv a {
text-decoration: none;
color:#069;
background:#CFE9F1;
display: block;
padding: 14px 28px;

}

#menuv a:hover {
background:#96C6E2;
font: 14px "Geneva", Arial, Helvetica, sans-serif;
}

#menuv a:active {
background:#B9D7EE;
font: 12px "Geneva", Arial, Helvetica, sans-serif;
}


/* CSS  parafuentes   */

.linked
{
font: 18px "Geneva", Arial, Helvetica, sans-serif;
border-bottom: 1px solid #F9C;
background:#CC3
}

.titulo
{
font: 20px "Geneva", Arial, Helvetica, sans-serif;
color:#FFF;	
}

.titulo1
{
font: 20px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}

.subtitulo
{
font: 18px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}

.titu
{
font: 16px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}
.titu1
{
font: 14px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}
.titu2
{
font: 14px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}

.letra_frm
{
font: 12px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}

.tit_frm
{
font: 11px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}

.subtitulo1
{
font: 18px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}

.aviso
{
font: 16px "Geneva", Arial, Helvetica, sans-serif;
color:#F00;
}

.title
{
font: 18px "Geneva", Arial, Helvetica, sans-serif;
color:#06C;
}

.title1
{
font: 12px "Geneva", Arial, Helvetica, sans-serif;
color:#06C;
}
.letra
{
font: 12px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}
.letra_min
{
font: 10px "Geneva", Arial, Helvetica, sans-serif;
color:#000;
}
</style>
<?php

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
$result = mysql_query("SELECT * FROM acuicultura_1 AS a1 INNER JOIN acuicultura_2 AS a2 ON (a1.id=a2.id) INNER JOIN acuicultura_3 AS a3 ON (a2.id=a3.id)");

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
$result = mysql_query("SELECT * FROM acuicultura_1 AS a1  INNER JOIN acuicultura_2 AS a2 ON (a1.id=a2.id) INNER JOIN acuicultura_3 AS a3 ON (a2.id=a3.id)");

echo '<tr bgcolor="#FFFFCC">';
if($row = mysql_fetch_assoc($result)) 
{

   foreach($row as $key => $value)
   {
    echo '<td class="titu2">'.$key.' </td>'; 
   }
}



echo '</tr>';
//datos
$result = mysql_query("SELECT * FROM acuicultura_1 AS a1 INNER JOIN acuicultura_2  AS a2 ON (a1.id=a2.id) INNER JOIN acuicultura_3 AS a3 ON (a2.id=a3.id) ORDER BY ccdd, ccpp, ccdi, cod_ccpp ASC");

$c=0;
while($row = mysql_fetch_assoc($result)) 
{
	$c=$c+1;
if($c%2==0) { $color='#EEEEEE'; } else { $color='#FFFFFF'; }
 echo '<tr bgcolor="'.$color.'">';
   foreach($row as $key => $value)
   {
    echo '<td  class="letra">'.$value.' </td>'; 
   }
   echo '</tr>';
}

echo '</table>';
?>
