<?php
include("conexion.php");
ini_set('max_execution_time', 300);
error_reporting(E_ALL ^ E_NOTICE);
$id=$_GET['id'];

function cantidad_dep($ccdd,$n,$s)
{
$result = mysql_query("SELECT COUNT(id1) FROM exportable");
while ($row = mysql_fetch_row($result))
{
$total=$row[0];
}

$result = mysql_query("SELECT COUNT(id1) FROM exportable WHERE 	ccdd='".$ccdd."'");
while ($row = mysql_fetch_row($result))
{
$valor=$row[0];
$valor1=$row[0]*100/$total;
}
// 1. Valores absolutos por departamento
if($n==0 and $s==0)
{
return $valor;
}

// 2. Valores porcentuales por departamento
if($n==1 and $s==0)
{
$valor=number_format($valor1, 2, '.', '');
return $valor;
}


}




///FUNCIONES

///titulos
switch ($id)
{
case 1:
$titulo='CUADRO Nº 100<br>PERÚ: ACUICULTORES POR SEXO, SEGÚN DEPARTAMENTO, 2013';
break;

case 2:
$titulo='CUADRO Nº 101<br>PERÚ: ACUICULTORES POR TIPO DE PERSONA, SEGÚN DEPARTAMENTO, 2013';
break;

case 3:
$titulo='CUADRO Nº 102<br>PERÚ: ACUICULTORES POR LUGAR DE NACIMIENTO, SEGÚN DEPARTAMENTO, 2013';
break;

case 4:
$titulo='CUADRO Nº 103<br>PERÚ: ACUICULTORES POR LUGAR DE RESIDENCIA EN EL AÑO 2007, SEGÚN DEPARTAMENTO, 2013';
break;

case 5:
$titulo='CUADRO Nº 104<br>PERÚ: ACUICULTORES POR NIVEL DE ESTUDIOS ALCANZADO, SEGÚN DEPARTAMENTO, 2013';
break;

case 6:
$titulo='CUADRO Nº 105<br>PERÚ: ACUICULTORES POR TIPO DE ACTIVIDAD, SEGÚN DEPARTAMENTO, 2013';
break;

case 7:
$titulo='CUADRO Nº 106<br>PERÚ: ACUICULTORES POR ACTIVIDAD ADICIONAL QUE REALIZA, SEGÚN DEPARTAMENTO, 2013';
break;

case 8:
$titulo='CUADRO Nº 107<br>PERÚ: ACUICULTORES POR RAZONES POR LA QUE ELIGIÓ DESARROLLAR ESTA ACTIVIDAD, SEGÚN DEPARTAMENTO, 2013';
break;

case 9:
$titulo='CUADRO Nº 108<br>PERÚ: ACUICULTORES POR AÑOS DE DEDICACIÓN A LA ACTIVIDAD DE PESCA, SEGÚN DEPARTAMENTO, 2013';
break;

case 10:
$titulo='CUADRO Nº 109<br>PERÚ: ACUICULTORES POR PROGRAMAS SOCIALES QUE HAN BENEFICIADO SU HOGAR, SEGÚN DEPARTAMENTO, 2013';
break;

case 11:
$titulo='CUADRO Nº 110<br>PERÚ: ACUICULTORES POR ESTADO CIVIL O CONYUGAL, SEGÚN DEPARTAMENTO, 2013';
break;

case 12:
$titulo='CUADRO Nº 111<br>PERÚ: ACUICULTORES POR NIVEL DE ESTUDIOS ALCANZADO POR LA CÓNYUGE O CONVIVIENTE, SEGÚN DEPARTAMENTO, 2013';
break;

case 13:
$titulo='CUADRO Nº 112<br>PERÚ: VERIFICAR EL MATERIAL DE CONSTRUCCION DE LAS PAREDES Y EL MATERIAL DE CONSTRUCCION DE LOS PISOS DE LA VIVIENDA';
break;

case 14:
$titulo='CUADRO Nº 113<br>PERÚ: ACUICULTORES POR TENENCIA DE HIJOS, SEGÚN DEPARTAMENTO, 2013';
break;

case 15:
$titulo='VERIFICAR EL MATERIAL DE CONSTRUCCION DE LOS PISOS Y EL MATERIAL DE CONSTRUCCION DE LOS TECHOS DE LA VIVIENDA';
break;

case 16:
$titulo='VERIFICAR TIENE CONEXIÓN DE CABLE PERO NO CUENTA CON TELEVISOR A COLOR O TIENE CONEXIÓN A INTERNET Y NO CUENTA CON COMPUTADORA';
break;

case 17:
$titulo='VERIFICAR EL NUMERO DE PUERTA DEL CENTRO DE CULTIVO DE NO HABER INFORMACIÓN COLOCAR EN NUMERO DE PUERTA S/N ';
break;

case 18:
$titulo='VERIFICAR LA SUPERFICIE EN HECTAREAS DEL ESPACIO GEOGRAFICO DE LA P2 DE LA SECCION IV MENOR A 1 Y MAYOR A 50';
break;

case 19:
$titulo='VERIFICAR LA SUPERFICIE EN MT2 DE LAS INSTALACIONES UTILIZADAS PARA LA ACTIVIDAD ACUICOLA (P13 DE SECCION V) MENOS DE 10 MT2 Y MAS DE 1000 MT2';
break;

case 20:
$titulo='VERIFICAR EN P13 DE SECCIÓN V EL PRECIO POR KILO DEL EXTRUSADO MENOS DE 1 SOL Y MÁS DE 4 SOLES';
break;

case 21:
$titulo='VERIFICAR EN P1 DE SECCION VII EL TOTAL DE TRABAJADORES REMUNERADOS,PERMANENTES Y EVENTUALES';
break;

case 22:
$titulo='VERIFICAR EN P3 DE SECCION VII EL NUMERO DE TRABAJADORES CON DISCAPACIDAD MAYOR A 10';
break;

case 23:
$titulo='VERIFICAR EN P4 DE SECCION VII EL NUMERO DE PERSONAS DE SU HOGAR SIN RECIBIR REMUNERACION MAYOR A 5';
break;

case 24:
$titulo='VERIFICAR TOTA DE TRABAJADORES REMUNERADOS EN P1 DE SECCION VII MENOR A EL NUMERO DE TRABAJADORES CON ALGUNA DIFICULTAD EN P3  DE SECCION VII';
break;

case 25:
$titulo='VERIFICAR EN P1 DE LA SECCION IX LOS MONTOS DE LOS ITEMS 1 Y 2 MENORES DE 100 SOLES Y MAYORES A 5000 SOLES';
break;

case 26:
$titulo='VERIFICAR EN P6 DE LA SECCION VII QUE LA SUMA DE LOS PORCENTAJES DE 100';
break;

case 27:
$titulo='VERIFICACION DE LOS VOLUMENES DE COSECHA ANUAL DE LA P7 DE LA SECCION VIII MENORES DE 50 KG Y MAYORES DE 500 KILOS';
break;

case 28:
$titulo='VERIFICACION DE LOS VOLUMENES DE COSECHA ANUAL DE LA P7 DE LA SECCION VIII MENORES DE 50 KG Y MAYORES DE 500 KILOS';
break;

case 29:
$titulo='VERIFICACION DEL PRECIO PROMEDIO POR KILO  DE LA P8 DE LA SECCION VIII MENORES 1 SOL Y MAYORES DE 20 SOLES';
break;


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTES  DE  CONSISTENCIA</title>
<script type="text/javascript" src="validacion.js"></script>
<style type="text/css">
@import url("estilos.css"); 
.borde-tabla {
	border-collapse: collapse;
	border: 1px solid #666666;
}
.borde-celda {
	border: 1px solid #666666;
}
</style>
</head>
<?php



?>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#666">
  <tr>
    <td width="134" align="left" valign="top">
    <div class="division" align="left">
      <table width="128" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="20" align="left" valign="middle" class="texto1"><b>OPCIONES</b></td>
        </tr>
        <tr>
          <td id="r1" align="left" valign="middle" class="reporte1" style="cursor:pointer"  onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(1)">Cuadro 100</td>
        </tr>
        <tr>
          <td align="left" valign="middle" id="r2"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(2)" class="reporte1">Cuadro 101</td>
        </tr>
        <tr>
          <td id="r3" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(3)" class="reporte1" >Cuadro 102</td>
        </tr>
        <tr>
          <td id="r4" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(4)" class="reporte1" >Cuadro 103</td>
        </tr>
        <tr>
          <td id="r5" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(5)" class="reporte1" >Cuadro 104</td>
        </tr>
        <tr>
          <td id="r6" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(6)" class="reporte1" >Cuadro 105</td>
        </tr>
        <tr>
          <td id="r7" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(7)" class="reporte1" >Cuadro 106</td>
        </tr>
        <tr>
          <td id="r8" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(8)" class="reporte1" ><p>Cuadro 107</p></td>
        </tr>
        <tr>
          <td id="r9" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(9)" class="reporte1" >Cuadro 108</td>
        </tr>
        <tr>
          <td id="r10" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(10)" class="reporte1" >Cuadro 109</td>
        </tr>
        <tr>
          <td id="r11" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(11)" class="reporte1">Cuadro 110</td>
        </tr>
        <tr>
          <td id="r12" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(12)" class="reporte1">Cuadro 111</td>
        </tr>
        <tr>
          <td id="r13" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(13)" class="reporte1">Cuadro 112</td>
        </tr>
        <tr>
          <td id="r14" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(14)" class="reporte1">Cuadro 113</td>
        </tr>
        <tr>
          <td id="r15" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(15)" class="reporte1">Cuadro 114</td>
        </tr>
        <tr>
          <td id="r16" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(16)" class="reporte1">Cuadro 115</td>
        </tr>
        <tr>
          <td id="r17" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(17)" class="reporte1">Cuadro 116</td>
        </tr>
        <tr>
          <td id="r18" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(18)" class="reporte1">Cuadro 117</td>
        </tr>
        <tr>
          <td id="r19" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"onmouseup="abrir_pagina(19)"  class="reporte1" > Cuadro 118</td>
        </tr>
        <tr>
          <td id="r20" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(20)" class="reporte1">Cuadro 119</td>
        </tr>
        <tr>
          <td id="r21" align="left" valign="middle" style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"  onmouseup="abrir_pagina(21)" class="reporte1">Cuadro 120</td>
        </tr>
        <tr>
          <td id="r22" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(22)" class="reporte1">Cuadro 121</td>
        </tr>
        <tr>
          <td id="r23" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"  onmouseup="abrir_pagina(23)"  class="reporte1">Cuadro 122</td>
        </tr>
        <tr>
          <td id="r24" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"  onmouseup="abrir_pagina(24)"  class="reporte1">Cuadro 123</td>
        </tr>
        <tr>
          <td id="r25" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(25)"  class="reporte1">Cuadro 124</td>
        </tr>
        <tr>
          <td id="r26" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(26)" class="reporte1">Cuadro 125</td>
        </tr>
        <tr>
          <td id="r27" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(27)" class="reporte1">&nbsp;</td>
        </tr>
        <tr>
          <td id="r28" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(28)" class="reporte1">&nbsp;</td>
        </tr>
        <tr>
          <td id="r29" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(29)" class="reporte1">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
      </table>
    </div></td>
    <td width="846" align="left" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td height="29" align="center" class="titulo_mediano"><strong>TABULADOS DEL PRIMER CENSO DE PESCA CONTINENTAL</strong></td>
      </tr>
      <tr>
        <td align="center" class="texto_mediano"><?php if($id==1)
{ echo $titulo; } ?></td>
      </tr>
      <tr>
        <td align="left" valign="top">

<?php
if($id==1)
{
?>
        <table width="780" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="48%" rowspan="3" align="left" valign="middle" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Departamento</td>
    <td colspan="2" rowspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Total</td>
    <td colspan="4" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Sexo</td>
    </tr>
  <tr>
    <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Hombre</td>
    <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Mujer</td>
    </tr>
  <tr class="titulo_mediano1">
    <td width="8%" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
    <td width="9%" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
    <td width="9%" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
    <td width="8%" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
    <td width="10%" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
    <td width="8%" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
  </tr>
  <?php
$total1=0;

$sql="SELECT COUNT(*) FROM exportable";  
$consulta=mysql_query($sql); 
$rcount=mysql_result($consulta,0);  
$total=$rcount;
$i=0;

function hhmm($ccdd,$s)
{
$result = mysql_query("SELECT COUNT(ccdd) FROM exportable WHERE ccdd='".$ccdd."' AND s2_4='".$s."'");
while ($row = mysql_fetch_row($result))
{
$cc=$row[0];
}
return $cc;
}


$th=0;
$tm=0;
$result = mysql_query("SELECT nom_dd, COUNT(nom_dd), ccdd FROM exportable GROUP BY ccdd ORDER BY nom_dd ASC");
while ($row = mysql_fetch_row($result))
{
$total1=$row[1]*100/$total;
//$hombres=$row[3];
$hombre=hhmm($row[2],1);
$th=$th+$hombre;
$mujer=$row[1]-$hombre;
$tm=$tm+$mujer;
//porcentajes
$hombre1=$hombre*100/$total;
$mujer1=$mujer*100/$total;


  ?>
  <tr>
    <td class="texto"><?php echo $row[0];  ?></td>
    <td align="center" class="texto"><?php echo $row[1]; ?></td>
    <td align="center" class="texto"><span class="texto2"><?php echo number_format($total1, 2, '.', ''); ?>%</span></td>
    <td align="center" class="texto"><?php  echo $hombre; ?></td>
    <td align="center" class="texto"><span class="texto2"><?php echo number_format($hombre1, 2, '.', ''); ?>%</span></td>
    <td align="center" class="texto"><?php echo $mujer; ?></td>
    <td align="center" class="texto"><span class="texto2"><?php echo number_format($mujer1, 2, '.', ''); ?>%</span></td>
  </tr>
  <?php
}
$th1=$th;
$tm1=$tm;
$th=$th*100/$total;
$tm=$tm*100/$total;
  ?>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><span class="texto3"><b><?php echo $total; ?></b></span></td>
    <td align="center"><span class="texto2"><b>100%</b></span></td>
    <td align="center"><span class="texto3"><b><?php echo $th1;  ?></b></span></td>
    <td align="center"><span class="texto2"><b><?php echo number_format($th, 2, '.', ''); ?>%</b></span></td>
    <td align="center"><span class="texto3"><b><?php echo $tm1;  ?></b></span></td>
    <td align="center"><span class="texto2"><b><?php echo number_format($tm, 2, '.', ''); ?>%</b></span></td>
  </tr>
  <tr>
    <td colspan="7" align="left" valign="bottom" class="textin" >Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</td>
    </tr>
        </table>
<?php
}
?>
  </td>
      </tr>
    </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td align="center" class="texto_mediano"><?php if($id==2) { echo $titulo; } ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><?php
if($id==2)
{
?>
            <table width="780" border="0" align="center" cellpadding="2" cellspacing="0">
              <tr>
                <td width="48%" rowspan="3" align="left" valign="middle" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Departamento</td>
                <td colspan="2" rowspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Total</td>
                <td colspan="4" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Tipo de persona</td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Natural</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Jurídica</td>
              </tr>
              <tr class="titulo_mediano1">
                <td width="80" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="80" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="80" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="80" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="80" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="80" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
              </tr>
              <?php
$total1=0;

$sql="SELECT COUNT(*) FROM exportable";  
$consulta=mysql_query($sql); 
$rcount=mysql_result($consulta,0);  
$total=$rcount;
$i=0;

function hhmm($ccdd,$s)
{
$result = mysql_query("SELECT COUNT(ccdd) FROM exportable WHERE ccdd='".$ccdd."' AND s2_2='".$s."'");
while ($row = mysql_fetch_row($result))
{
$cc=$row[0];
}
return $cc;
}


$th=0;
$tm=0;
$result = mysql_query("SELECT nom_dd, COUNT(nom_dd), ccdd FROM exportable GROUP BY ccdd ORDER BY nom_dd ASC");
while ($row = mysql_fetch_row($result))
{
$total1=$row[1]*100/$total;
//$hombres=$row[3];
$nat=hhmm($row[2],1);
$th=$th+$nat;
$jur=$row[1]-$nat;
$tm=$tm+$jur;
//porcentajes
$nat1=$nat*100/$total;
$jur1=$jur*100/$total;


  ?>
              <tr>
                <td class="texto"><?php echo $row[0];  ?></td>
                <td align="center" class="texto"><?php echo $row[1]; ?></td>
                <td align="center" class="texto"><span class="texto2"><?php echo number_format($total1, 2, '.', ''); ?>%</span></td>
                <td align="center" class="texto"><?php  echo $nat; ?></td>
                <td align="center" class="texto"><span class="texto2"><?php echo number_format($nat1, 2, '.', ''); ?>%</span></td>
                <td align="center" class="texto"><?php echo $jur; ?></td>
                <td align="center" class="texto"><span class="texto2"><?php echo number_format($jur1, 2, '.', ''); ?>%</span></td>
              </tr>
              <?php
}
$th1=$th;
$tm1=$tm;
$th=$th*100/$total;
$tm=$tm*100/$total;
  ?>
              <tr>
                <td>&nbsp;</td>
                <td align="center"><span class="texto3"><b><?php echo $total; ?></b></span></td>
                <td align="center"><span class="texto2"><b>100%</b></span></td>
                <td align="center"><span class="texto3"><b><?php echo $th1;  ?></b></span></td>
                <td align="center"><span class="texto2"><b><?php echo number_format($th, 2, '.', ''); ?>%</b></span></td>
                <td align="center"><span class="texto3"><b><?php echo $tm1;  ?></b></span></td>
                <td align="center"><span class="texto2"><b><?php echo number_format($tm, 2, '.', ''); ?>%</b></span></td>
              </tr>
              <tr>
                <td colspan="7" align="left" valign="bottom"><span class="textin">Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</span></td>
              </tr>
            </table>
            <?php
}
?></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td align="center" class="texto_mediano"><?php if($id==3) { echo $titulo; } ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><?php
if($id==3)
{
?>
            <table width="3520" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="80" rowspan="3" align="left" valign="middle" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" ><strong>Departamento</strong></td>
                <td colspan="2" rowspan="2" align="center" valign="bottom" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Total</td>
                <td colspan="44" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Lugar de nacimiento</td>
              </tr>
              
              <tr>
<?php
$i=0;
$result = mysql_query("SELECT nom_dd, COUNT(nom_dd), ccdd FROM exportable GROUP BY s2_11_dd ORDER BY  s2_11_dd ASC");
while ($row = mysql_fetch_row($result))
{
$i=$i+1;
?>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" ><?php echo $row[0];   ?></td>

<?php
}
?>
              </tr>
              <tr class="titulo_mediano1">
                <td width="102" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="97" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
<?php
$total=0;
$porcentaje=0;
$result = mysql_query("SELECT nom_dd, COUNT(s2_11_dd_cod), ccdd FROM exportable GROUP BY s2_11_dd ORDER BY  s2_11_dd ASC");
while ($row = mysql_fetch_row($result))
{
$total=$total+$row[1];	
?>
                <td width="94" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="95" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>

<?php
}
?>
              </tr>

              <tr>
                <td class="titulo_mediano1"><strong>Total</strong></td>
                <td align="center" class="texto"><?php echo $total; ?></td>
                <td align="center" class="texto"><span class="texto2">100.00%</span></td>
       <?php
$result = mysql_query("SELECT nom_dd, COUNT(s2_11_dd_cod), ccdd FROM exportable  GROUP BY s2_11_dd ORDER BY  s2_11_dd ASC");
while ($row = mysql_fetch_row($result))
{ 
$porcentaje= $row[1]*100/$total; 
	   ?>
                
                <td align="center" class="texto"><?php echo $row[1]; ?></td>
                <td align="center" class="texto"><span class="texto2"><?php echo number_format($porcentaje, 2, '.', ''); ?>%</span></td>
              
 <?php
}
  ?>
   </tr> 
    </table>
</td>
        </tr>
        <tr>
          <td align="left" valign="bottom"><span class="textin">Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</span></td>
        </tr>
      </table>
<?php
}
?>

      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td align="center" class="texto_mediano"><?php if($id==4) { echo $titulo; } ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><?php
if($id==4)
{
	//lugar de residencia
?>
            <table width="3520" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="80" rowspan="3" align="left" valign="middle" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" ><strong>Departamento</strong></td>
                <td colspan="2" rowspan="2" align="center" valign="bottom" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Total</td>
                <td colspan="44" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Lugar de residencia en el año 2007</td>
              </tr>
              
              <tr>
<?php
$i=0;
$result = mysql_query("SELECT nom_dd, COUNT(nom_dd), ccdd FROM exportable GROUP BY s2_12_dd ORDER BY  s2_12_dd ASC");
while ($row = mysql_fetch_row($result))
{
$i=$i+1;
?>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" ><?php echo $row[0];   ?></td>

<?php
}
?>
              </tr>
              <tr class="titulo_mediano1">
                <td width="102" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="97" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
<?php
$total=0;
$porcentaje=0;
$result = mysql_query("SELECT nom_dd, COUNT(s2_12_dd_cod), ccdd FROM exportable GROUP BY s2_12_dd ORDER BY  s2_12_dd ASC");
while ($row = mysql_fetch_row($result))
{
$total=$total+$row[1];	
?>
                <td width="94" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="95" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>

<?php
}
?>
              </tr>

              <tr>
                <td class="titulo_mediano1"><strong>Total</strong></td>
                <td align="center" class="texto"><?php echo $total; ?></td>
                <td align="center" class="texto"><span class="texto2">100.00%</span></td>
       <?php
$result = mysql_query("SELECT nom_dd, COUNT(s2_12_dd_cod), ccdd FROM exportable  GROUP BY s2_12_dd ORDER BY  s2_12_dd ASC");
while ($row = mysql_fetch_row($result))
{ 
$porcentaje= $row[1]*100/$total; 
	   ?>
                
                <td align="center" class="texto"><?php echo $row[1]; ?></td>
                <td align="center" class="texto"><span class="texto2"><?php echo number_format($porcentaje, 2, '.', ''); ?>%</span></td>
              
 <?php
}
  ?>
   </tr> 
    </table>
</td>
        </tr>
        <tr>
          <td align="left" valign="bottom"><span class="textin">Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</span></td>
        </tr>
      </table>
<?php
}
//fin de residencia
?>


      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td align="center" class="texto_mediano"><?php if($id==5) { echo $titulo; } ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><?php
if($id==5)
{
?>
            <table width="1380" border="0" align="center" cellpadding="2" cellspacing="0">
              <tr>
                <td width="224" rowspan="3" align="left" valign="middle" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Departamento</td>
                <td colspan="2" rowspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Total</td>
                <td colspan="16" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Nivel de estudios alcanzados</td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Sin Nivel</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Inicial</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Primaria</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Secundaria</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Superior no universitaria incompleta</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Superior no universitaria completa</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Superior universitaria incompleta</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Superior universitaria completa</td>
              </tr>
              <tr class="titulo_mediano1">
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
              </tr>
              <?php
$total1=0;

$sql="SELECT COUNT(*) FROM exportable";  
$consulta=mysql_query($sql); 
$rcount=mysql_result($consulta,0);  
$total=$rcount;
$i=0;

function nivel($dep,$niv,$tot)
{
$sin=0;
$ini=0;
$pri=0;
$sec=0;
$sni=0;
$snc=0;
$sui=0;
$suc=0;

$result = mysql_query("SELECT ccdd, s2_13,nom_dd FROM exportable WHERE ccdd='".$dep."'");
while ($row = mysql_fetch_row($result))
{

$i=$i+1;
//sin nivel
if($row[1]==1)
{
$sin=$sin+1;	
}
//inicial
if($row[1]==2)
{
$ini=$ini+1;	
}
//primaria
if($row[1]==3)
{
$pri=$pri+1;	
}
//secundaria
if($row[1]==4)
{
$sec=$sec+1;	
}
//superior no univ. incompleta
if($row[1]==5)
{
$sec=$sec+1;	
}
//superior no univ. completa
if($row[1]==6)
{
$sni=$sni+1;	
}
//superior  univ. incompleta
if($row[1]==7)
{
$sui=$sui+1;	
}
//superior  univ. completa
if($row[1]==8)
{
$suc=$suc+1;	
}
$depa=$row[2];
}

 $subtotal='<td class="texto">'.$depa.'</td><td align="center" class="texto">'.$i.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($i*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$sin.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($sin*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$ini.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($ini*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$pri.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($pri*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$sec.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($sec*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$sni.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($sni*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$snc.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($snc*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$sui.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($sui*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$suc.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($suc*100/$tot), 2, '.', '').'%</span></td>';
 
 



return $subtotal;
}

//------------------------subtoaesls por nivela
$i=0;
function nivel1($dep,$niv,$tot)
{
$sin=0;
$ini=0;
$pri=0;
$sec=0;
$sni=0;
$snc=0;
$sui=0;
$suc=0;

$result = mysql_query("SELECT ccdd, s2_13,nom_dd FROM exportable");
while ($row = mysql_fetch_row($result))
{
$i=$i+1;
//sin nivel
if($row[1]==1)
{
$sin=$sin+1;	
}
//inicial
if($row[1]==2)
{
$ini=$ini+1;	
}
//primaria
if($row[1]==3)
{
$pri=$pri+1;	
}
//secundaria
if($row[1]==4)
{
$sec=$sec+1;	
}
//superior no univ. incompleta
if($row[1]==5)
{
$sec=$sec+1;	
}
//superior no univ. completa
if($row[1]==6)
{
$sni=$sni+1;	
}
//superior  univ. incompleta
if($row[1]==7)
{
$sui=$sui+1;	
}
//superior  univ. completa
if($row[1]==8)
{
$suc=$suc+1;	
}

}

 $subtotal='<td class="texto"><b>Total</b></td><td align="center" class="texto"><b>'.$i.'</b></td><td align="center" class="texto"><span class="texto2"><b>100%</b></span></td><td align="center" class="texto"><b>'.$sin.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($sin*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$ini.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($ini*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$pri.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($pri*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$sec.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($sec*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$sni.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($sni*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$snc.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($snc*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$sui.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($sui*100/$tot), 2, '.', '').'%</b></span></td><td align="center" class="texto"><b>'.$suc.'</b></td><td align="center" class="texto"><span class="texto2"><b>'.number_format(($suc*100/$tot), 2, '.', '').'%</b></span></td>';
 
 



return $subtotal;
}

//-----------------------------------------------------

$result = mysql_query("SELECT ccdd, s2_13 FROM exportable GROUP BY ccdd ORDER BY nom_dd ASC");
while ($row = mysql_fetch_row($result))
{


  ?>
              <tr>
               <?php echo nivel($row[0],$row[1],$total); ?>
               
              </tr>
              <?php
}
?>
<tr> <?php echo nivel1($row[0],$row[1],$total); ?></tr>
              <tr>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="19" align="left" valign="bottom"><span class="textin">Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</span></td>
              </tr>
            </table>
            <?php
}
//fin
?></td>
        </tr>
      </table>   
 
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td align="center" class="texto_mediano"><?php if($id==6) { echo $titulo; } ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><?php
if($id==6)
{
?>
            <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
              <tr>
                <td width="224" rowspan="3" align="left" valign="middle" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Departamento</td>
                <td colspan="2" rowspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Total</td>
                <td colspan="4" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Tipo de actividad</td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Principal</td>
                <td colspan="2" align="center" class="titulo_mediano1" style="border-bottom:solid 1px; border-bottom-color:#999" >Secundaria</td>
              </tr>
              <tr class="titulo_mediano1">
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
                <td width="60" align="center" style="border-bottom:solid 1px; border-bottom-color:#999" >Abs.</td>
                <td width="60" align="center" class="texto2" style="border-bottom:solid 1px; border-bottom-color:#999" >%</td>
              </tr>
              <?php
$total1=0;

$sql="SELECT COUNT(*) FROM exportable";  
$consulta=mysql_query($sql); 
$rcount=mysql_result($consulta,0);  
$total=$rcount;
$i=0;


//------------------------subtoaesls por nivela
$i=0;
function nivel1($dep,$niv,$tot)
{
$pri=0;
$sec=0;
$result = mysql_query("SELECT ccdd, s2_14,nom_dd FROM exportable WHERE ccdd='".$dep."'");
while ($row = mysql_fetch_row($result))
{
$i=$i+1;
//primaria
if($row[1]==1)
{
$pri=$pri+1;	
}
//secundaria
if($row[1]!=1)
{
$sec=$sec+1;	
}
$depa=$row[2];
}

 $subtotal='<td class="texto">'.$depa.'</td><td align="center" class="texto">'.$i.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($i*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto">'.$pri.'</td><td align="center" class="texto"><span class="texto2">'.number_format(($pri*100/$tot), 2, '.', '').'%</span></td><td align="center" class="texto"><b>'.$sec.'</b></td><td align="center" class="texto"><span class="texto2">'.number_format(($sec*100/$tot), 2, '.', '').'%</span></td>';
 
 



return $subtotal;
}

//-----------------------------------------------------

$result = mysql_query("SELECT ccdd, s2_14 FROM exportable GROUP BY ccdd ORDER BY nom_dd ASC");
while ($row = mysql_fetch_row($result))
{


  ?>
  <tr>
               <?php echo nivel1($row[0],$row[1],$total); ?>
    </tr>
 <?php
}
?>
<tr>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="7" align="left" valign="bottom"><span class="textin">Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</span></td>
              </tr>
            </table>
            <?php
}
?></td>
        </tr>
      </table>    
    
    
    </td>
  </tr>
</table>

</body>
</html>