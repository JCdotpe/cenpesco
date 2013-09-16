<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$id=$_GET['id'];


///titulos
switch ($id)
{
case 1:
$titulo='VERIFICAR EDAD DEL ACUICULTOR MENOR DE 18 AÑOS';
break;

case 2:
$titulo='VERIFICAR DUPLICADO DE DNI A NIVEL DE DEPARTAMENTO';
break;

case 3:
$titulo='VERIFICAR DUPLICADO DE NUMERO DE RUC A NIVEL DE DEPARTAMENTO';
break;

case 4:
$titulo='SI NO EXISTE INFORMACION EN PUERTA, BLOCK, INTERIOR, MANZANA, LOTE Y KM COLOCAR SN EN PUERTA';
break;

case 5:
$titulo='VERIFICAR MAYORES DE 50 AÑOS QUE HAYAN ESTUDIADO INICIAL';
break;

case 6:
$titulo='VERIFICAR MENORES DE 45 AÑOS QUE HAYAN ESTUDIADO PRIMARIA EN AÑOS';
break;

case 7:
$titulo='VERIFICAR NIVEL SECUNDARIO, EL AÑO DE ESTUDIOS CULMINADOS Y LA EDAD DEL ACUICULTOR';
break;

case 8:
$titulo='VERIFICAR NIVEL SUPERIOR Y LA EDAD DEL ACUICULTOR';
break;

case 9:
$titulo='VERIFICAR EN P14 DE SECCION II INDICA OCUPACION SECUNDARIA PERO EN P15 DE LA MISMA SECCION INDICA COMO RESPUESTA QUE NO TIENE OTRA ACTIVIDAD ';
break;

case 10:
$titulo='VERIFICAR LA EDAD DEL ACUICULTOR CON EL NÚMERO DE HIJOS QUE MENCIONA EN P23 DE LA SECCION II';
break;

case 11:
$titulo='VERIFICAR EL GRADO DE INSTRUCCIÓN (P24.8)  Y LA EDAD DE LOS HIJOS DEL ACUICULTOR (P24.4)';
break;

case 12:
$titulo='VERIFICAR LA DIFERENCIA DE EDAD DEL ACUICULTOR Y SUS HIJOS (DIFERENCIA MENOR DE 12 AÑOS)';
break;

case 13:
$titulo='VERIFICAR EL MATERIAL DE CONSTRUCCION DE LAS PAREDES Y EL MATERIAL DE CONSTRUCCION DE LOS PISOS DE LA VIVIENDA';
break;

case 14:
$titulo='VERIFICAR EL MATERIAL DE CONSTRUCCION DE LAS PAREDES Y EL MATERIAL DE CONSTRUCCION DE LOS TECHOS DE LA VIVIENDA';
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
<title>REPORTES DE CONSISTENCIA</title>
<script type="text/javascript" src="validacion.js"></script>
<style type="text/css">
@import url("estilos.css"); 
</style>
</head>
<?php
//REPORTE 1
if($id==1)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="16%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="19%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="9%"><span class="texto"><strong>EDAD</strong></span></td>
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM  exportable WHERE s2_3a>'1997' AND s2_3a<>'9999' ORDER BY ccdd,ccpp,ccdi,cod_ccpp,nform,s2_3a ASC");
while ($row = mysql_fetch_array($result))
{	
$anio_a=date('Y');
$anio=$anio_a-$row['s2_3a'];
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$anio.'</span></td></tr>';
}
}

//REPORTE 2
if($id==2)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="16%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="19%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="9%"><span class="texto"><strong>N° de DNI</strong></span></td>
          </tr>';
$celda='';
	
$result = mysql_query("SELECT * FROM exportable WHERE s2_5<>'88888888' AND s2_5<>'77777777' AND s2_5<>'99999999' AND s2_5 IN ( SELECT s2_5 FROM exportable GROUP BY s2_5 HAVING count(s2_5) > 1 ) ORDER BY s2_5");
while ($row = mysql_fetch_array($result))
{	

$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_5'].'</span></td></tr>';
}

}

//REPORTE 3
if($id==3)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="16%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="19%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="9%"><span class="texto"><strong>N° de RUC</strong></span></td>
          </tr>';
$celda='';
	
$result = mysql_query("SELECT * FROM exportable WHERE s2_6<>'88888888888' AND s2_6<>'77777777777' AND s2_6<>'99999999999' AND s2_6 IN ( SELECT s2_6 FROM exportable GROUP BY s2_6 HAVING count(s2_6) > 1 ) ORDER BY s2_6");
while ($row = mysql_fetch_array($result))
{	

$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_6'].'</span></td></tr>';
}

}


//REPORTE 4
if($id==4)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="15%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="12%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="5%"><span class="texto"><strong>PTANUM</strong></span></td>
			<td width="5%"><span class="texto"><strong>BLOCK</strong></span></td>
			<td width="5%"><span class="texto"><strong>INT</strong></span></td>
			<td width="5%"><span class="texto"><strong>MZ</strong></span></td>
			<td width="5%"><span class="texto"><strong>LOTE</strong></span></td>
			<td width="5%"><span class="texto"><strong>KM</strong></span></td>
			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE ptanum IS NULL AND block IS NULL AND int_1 IS NULL AND mz IS NULL AND lote IS NULL AND km IS NULL");
while ($row = mysql_fetch_array($result))
{	

$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto"> </span></td><td><span class="texto">'.$row['block'].'</span></td><td><span class="texto">'.$row['int_1'].'</span></td><td><span class="texto">'.$row['mz'].'</span></td><td><span class="texto">'.$row['lote'].'</span></td><td><span class="texto">'.$row['km'].'</span></td></tr>';
}

}

//REPORTE 5
if($id==5)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Último nivel, grado o año de estudio que aprobó</strong></span></td>
			<td width="10%"><span class="texto"><strong>Edad</strong></span></td>

			
          </tr>';
$celda='';
$result = mysql_query("SELECT * FROM exportable WHERE s2_13='2' AND (YEAR(CURDATE())-s2_3a)>=50  AND s2_3a<>'9999' ");
while ($row = mysql_fetch_array($result))
{	
$edad=date('Y')-$row['s2_3a'];
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_13'].'</span></td><td><span class="texto">'.$edad.'</span></td></tr>';
}

}


//REPORTE 6
if($id==6)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="13%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="12%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="5%"><span class="texto"><strong>Último nivel, grado o año de estudio que aprobó</strong></span></td>
			  <td width="5%"><span class="texto"><strong>Último nivel, grado o año de estudio que aprobó</strong></span></td>
			<td width="5%"><span class="texto"><strong>Edad</strong></span></td>

			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s2_13='3' AND (YEAR(CURDATE())-s2_3a)<45  AND  s2_13a >= 1 AND s2_3a<>'9999'");
while ($row = mysql_fetch_array($result))
{	
$edad=date('Y')-$row['s2_3a'];
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_13'].'</span></td><td><span class="texto">'.$row['s2_13a'].'</span></td><td><span class="texto">'.$edad.'</span></td></tr>';
}

}


//REPORTE 7
if($id==7)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Último nivel, grado o año de estudio que aprobó</strong></span></td>
			  <td width="10%"><span class="texto"><strong>Último nivel, grado o año de estudio que aprobó</strong></span></td>
			<td width="10%"><span class="texto"><strong>Edad</strong></span></td>

			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s2_3a<>'9999' AND   ((s2_13='4' AND s2_13a='1' AND (YEAR(CURDATE())-s2_3a)<12) OR (s2_13='4' AND s2_13a='2' AND   (YEAR(CURDATE())-s2_3a)<13) OR (s2_13='4' AND s2_13a='3' AND  (YEAR(CURDATE())-s2_3a)<14)  OR (s2_13='4' AND s2_13a='4' AND   (YEAR(CURDATE())-s2_3a)<15) OR (  s2_13='4' AND s2_13a='5' AND   (YEAR(CURDATE())-s2_3a)<16)) ");
while ($row = mysql_fetch_array($result))
{	
$edad=date('Y')-$row['s2_3a'];
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_13'].'</span></td><td><span class="texto">'.$row['s2_13a'].'</span></td><td><span class="texto">'.$edad.'</span></td></tr>';
}

}


//REPORTE 8
if($id==8)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Último nivel, grado o año de estudio que aprobó</strong></span></td>
			  <td width="10%"><span class="texto"><strong>Edad</strong></span></td>


			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s2_3a<>'9999' AND   ((s2_13='5' AND (YEAR(CURDATE())-s2_3a)<16) OR (s2_13='6' AND   (YEAR(CURDATE())-s2_3a)<19) OR (s2_13='7'  AND  (YEAR(CURDATE())-s2_3a)<16)  OR (s2_13='8'  AND   (YEAR(CURDATE())-s2_3a)<22))");
while ($row = mysql_fetch_array($result))
{	
$edad=date('Y')-$row['s2_3a'];
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_13'].'</span></td><td><span class="texto">'.$edad.'</span></td></tr>';
}

}



//REPORTE 9
if($id==9)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>¿Usted considera la pesca como su ocupación?</strong></span></td>
			  <td width="10%"><span class="texto"><strong>No tiene otra actividad</strong></span></td>


			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s2_14='2' AND   s2_15_8='1'");
while ($row = mysql_fetch_array($result))
{	

$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_14'].'</span></td><td><span class="texto">'.$row['s2_15_8'].'</span></td></tr>';
}

}


//REPORTE 10
if($id==10)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Edad</strong></span></td>
			  <td width="10%"><span class="texto"><strong>¿Cuántos hijos(as) tiene en total?</strong></span></td>


			
          </tr>';
$celda='';


$result = mysql_query("SELECT * FROM exportable WHERE s2_3a<>'9999' AND   ((s2_23>2 AND (YEAR(CURDATE())-s2_3a)<18) OR (s2_23>3 AND (YEAR(CURDATE())-s2_3a)<20)  OR (s2_23>4 AND (YEAR(CURDATE())-s2_3a)<22)  OR (s2_23>5 AND (YEAR(CURDATE())-s2_3a)<26)  OR (s2_23>6 AND (YEAR(CURDATE())-s2_3a)<30)  OR (s2_23>7 AND (YEAR(CURDATE())-s2_3a)<35)  OR (s2_23>8 AND (YEAR(CURDATE())-s2_3a)<45)  OR (s2_23>9 AND (YEAR(CURDATE())-s2_3a)<50))");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$edad.'</span></td><td><span class="texto">'.$row['s2_23'].'</span></td></tr>';
}

}


//REPORTE 11
if($id==11)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Número de orden (S2_24_8_1;2;3;
																		 4;5;6;7;8;9;10)</strong></span></td>
			<td width="10%"><span class="texto"><strong>Hijo 01 - ¿Cuál es el último nivel de estudios aprobado? 
			(S2_24_8_1;2;3;4;5;6;7;8;9;10)</strong></span</td>
			<td width="10%"><span class="texto"><strong>Hijo 01 - Edad- Año(S2_24_4_1A;2A;3A;
																			4A;5A;6A;7A;8A;9A; 10A)</strong></span</td></tr>';
$celda='';

//H1
$h1='(s2_24_8_1=2 AND s2_24_4_1a>49) OR (s2_24_8_1=3 AND s2_24_4_1a<6) OR (s2_24_8_1=4 AND s2_24_4_1a<10) OR (s2_24_8_1=5 AND s2_24_4_1a<12) OR (s2_24_8_1=6 AND s2_24_4_1a<16) OR (s2_24_8_1=7 AND s2_24_4_1a<16) OR (s2_24_8_1=8 AND s2_24_4_1a<18) OR (s2_24_8_1=9 AND s2_24_4_1a<16) OR (s2_24_8_1=10 AND s2_24_4_1a<21)';
//H2
$h2='(s2_24_8_2=2 AND s2_24_4_2a>49) OR (s2_24_8_2=3 AND s2_24_4_2a<6) OR (s2_24_8_2=4 AND s2_24_4_2a<10) OR (s2_24_8_2=5 AND s2_24_4_2a<12) OR (s2_24_8_2=6 AND s2_24_4_2a<16) OR (s2_24_8_2=7 AND s2_24_4_2a<16) OR (s2_24_8_2=8 AND s2_24_4_2a<18) OR (s2_24_8_2=9 AND s2_24_4_2a<16) OR (s2_24_8_2=10 AND s2_24_4_2a<21)';
//H3
$h3='(s2_24_8_3=2 AND s2_24_4_3a>49) OR (s2_24_8_3=3 AND s2_24_4_3a<6) OR (s2_24_8_3=4 AND s2_24_4_3a<10) OR (s2_24_8_3=5 AND s2_24_4_3a<12) OR (s2_24_8_3=6 AND s2_24_4_3a<16) OR (s2_24_8_3=7 AND s2_24_4_3a<16) OR (s2_24_8_3=8 AND s2_24_4_3a<18) OR (s2_24_8_3=9 AND s2_24_4_3a<16) OR (s2_24_8_3=10 AND s2_24_4_3a<21)';
//H4
$h4='(s2_24_8_4=2 AND s2_24_4_4a>49) OR (s2_24_8_4=3 AND s2_24_4_4a<6) OR (s2_24_8_4=4 AND s2_24_4_4a<10) OR (s2_24_8_4=5 AND s2_24_4_4a<12) OR (s2_24_8_4=6 AND s2_24_4_4a<16) OR (s2_24_8_4=7 AND s2_24_4_4a<16) OR (s2_24_8_4=8 AND s2_24_4_4a<18) OR (s2_24_8_4=9 AND s2_24_4_4a<16) OR (s2_24_8_4=10 AND s2_24_4_4a<21)';
//H5
$h5='(s2_24_8_5=2 AND s2_24_4_5a>49) OR (s2_24_8_5=3 AND s2_24_4_5a<6) OR (s2_24_8_5=4 AND s2_24_4_5a<10) OR (s2_24_8_5=5 AND s2_24_4_5a<12) OR (s2_24_8_5=6 AND s2_24_4_5a<16) OR (s2_24_8_5=7 AND s2_24_4_5a<16) OR (s2_24_8_5=8 AND s2_24_4_5a<18) OR (s2_24_8_5=9 AND s2_24_4_5a<16) OR (s2_24_8_5=10 AND s2_24_4_5a<21)';
//H6
$h6='(s2_24_8_6=2 AND s2_24_4_6a>49) OR (s2_24_8_6=3 AND s2_24_4_6a<6) OR (s2_24_8_6=4 AND s2_24_4_6a<10) OR (s2_24_8_6=5 AND s2_24_4_6a<12) OR (s2_24_8_6=6 AND s2_24_4_6a<16) OR (s2_24_8_6=7 AND s2_24_4_2a<16) OR (s2_24_8_6=8 AND s2_24_4_6a<18) OR (s2_24_8_6=9 AND s2_24_4_6a<16) OR (s2_24_8_6=10 AND s2_24_4_6a<21)';
//H7
$h7='(s2_24_8_7=2 AND s2_24_4_7a>49) OR (s2_24_8_7=3 AND s2_24_4_7a<6) OR (s2_24_8_7=4 AND s2_24_4_7a<10) OR (s2_24_8_7=5 AND s2_24_4_7a<12) OR (s2_24_8_7=6 AND s2_24_4_7a<16) OR (s2_24_8_7=7 AND s2_24_4_7a<16) OR (s2_24_8_7=8 AND s2_24_4_7a<18) OR (s2_24_8_7=9 AND s2_24_4_7a<16) OR (s2_24_8_7=10 AND s2_24_4_7a<21)';
//H8
$h8='(s2_24_8_8=2 AND s2_24_4_8a>49) OR (s2_24_8_8=3 AND s2_24_4_8a<6) OR (s2_24_8_8=4 AND s2_24_4_8a<10) OR (s2_24_8_8=5 AND s2_24_4_8a<12) OR (s2_24_8_8=6 AND s2_24_4_8a<16) OR (s2_24_8_8=7 AND s2_24_4_8a<16) OR (s2_24_8_8=8 AND s2_24_4_8a<18) OR (s2_24_8_8=9 AND s2_24_4_8a<16) OR (s2_24_8_8=10 AND s2_24_4_8a<21)';
//H9
$h9='(s2_24_8_9=2 AND s2_24_4_9a>49) OR (s2_24_8_9=3 AND s2_24_4_9a<6) OR (s2_24_8_9=4 AND s2_24_4_9a<10) OR (s2_24_8_9=5 AND s2_24_4_9a<12) OR (s2_24_8_9=6 AND s2_24_4_9a<16) OR (s2_24_8_9=7 AND s2_24_4_9a<16) OR (s2_24_8_9=8 AND s2_24_4_9a<18) OR (s2_24_8_9=9 AND s2_24_4_9a<16) OR (s2_24_8_9=10 AND s2_24_4_9a<21)';
//H10
$h10='(s2_24_8_10=2 AND s2_24_4_10a>49) OR (s2_24_8_10=3 AND s2_24_4_10a<6) OR (s2_24_8_10=4 AND s2_24_4_10a<10) OR (s2_24_8_10=5 AND s2_24_4_10a<12) OR (s2_24_8_10=6 AND s2_24_4_10a<16) OR (s2_24_8_10=7 AND s2_24_4_10a<16) OR (s2_24_8_10=8 AND s2_24_4_10a<18) OR (s2_24_8_10=9 AND s2_24_4_10a<16) OR (s2_24_8_10=10 AND s2_24_4_10a<21)';

$result = mysql_query("SELECT * FROM exportable WHERE ".$h1." OR ".$h2." OR ".$h3." OR ".$h4." OR ".$h5." OR ".$h6." OR ".$h7." OR ".$h8." OR ".$h9." OR ".$h10."");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s2_24_8_1'].'</span></td><td><span class="texto">'.$row['s2_24_8_1'].'</span></td><td><span class="texto">'.$row['s2_24_4_1a'].'</span></td></tr>';
}

}


//REPORTE 12
if($id==12)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>N° de orden</strong></span></td>
			<td width="10%"><span class="texto"><strong>Hijo - Edad - Año</strong></span></td>
			<td width="10%"><span class="texto"><strong>Edad</strong></span></td>

			
          </tr>';
$celda='';


$result = mysql_query("SELECT * FROM exportable WHERE s2_3a<>'9999' AND   ((s2_24_4_1a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_1a)<12) OR (s2_24_4_2a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_2a)<12)  OR (s2_24_4_3a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_3a)<12)  OR (s2_24_4_4a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_4a)<12)  OR (s2_24_4_5a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_5a)<12)  OR (s2_24_4_7a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_7a)<12)  OR (s2_24_4_8a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_8a)<12)  OR (s2_24_4_9a<>99 AND ((YEAR(CURDATE())-s2_3a)-s2_24_4_9a)<12))");
while ($row = mysql_fetch_array($result))
{	
if($row['s2_24_4_1a']!=NULL or $row['s2_24_4_1a']!=0)  {  $edad_h=$row['s2_24_4_1a']; }
if($row['s2_24_4_2a']!=NULL or $row['s2_24_4_2a']!=0)  {  $edad_h=$row['s2_24_4_2a']; }
if($row['s2_24_4_3a']!=NULL or $row['s2_24_4_3a']!=0)  {  $edad_h=$row['s2_24_4_3a']; }
if($row['s2_24_4_4a']!=NULL or $row['s2_24_4_4a']!=0)  {  $edad_h=$row['s2_24_4_4a']; }
if($row['s2_24_4_5a']!=NULL or $row['s2_24_4_5a']!=0)  {  $edad_h=$row['s2_24_4_5a']; }
if($row['s2_24_4_6a']!=NULL or $row['s2_24_4_6a']!=0)  {  $edad_h=$row['s2_24_4_6a']; }
if($row['s2_24_4_7a']!=NULL or $row['s2_24_4_7a']!=0)  {  $edad_h=$row['s2_24_4_7a']; }
if($row['s2_24_4_8a']!=NULL or $row['s2_24_4_8a']!=0)  {  $edad_h=$row['s2_24_4_8a']; }
if($row['s2_24_4_9a']!=NULL or $row['s2_24_4_9a']!=0)  {  $edad_h=$row['s2_24_4_9a']; }
if($row['s2_24_4_10a']!=NULL or $row['s2_24_4_10a']!=0)  {  $edad_h=$row['s2_24_4_10a']; }

$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">1</span></td><td><span class="texto">'.$row['s2_24_4_1a'].'</span></td><td><span class="texto">'.$edad.'</span></td></tr>';
}

}


//REPORTE 13
if($id==13)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>El material predominante en las pared es:</strong></span></td>
			  <td width="10%"><span class="texto"><strong>El material predominante en los pisos</strong></span></td>


			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE (s3_200=5 OR s3_200=6 OR s3_200=7 OR s3_200=8) AND (s3_300=1 AND s3_300=2 AND s3_300=3)");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s3_200'].'</span></td><td><span class="texto">'.$row['s3_300'].'</span></td></tr>';
}

}

//REPORTE 14
if($id==14)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>El material predominante en las pared es:</strong></span></td>
			  <td width="10%"><span class="texto"><strong>El material predominante en los techos</strong></span></td>


			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE (s3_200=5 OR s3_200=6 OR s3_200=7 OR s3_200=8) AND s3_400=1");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s3_200'].'</span></td><td><span class="texto">'.$row['s3_400'].'</span></td></tr>';
}

}


//REPORTE 15
if($id==15)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>El material predominante en los pisos es:</strong></span></td>
			  <td width="10%"><span class="texto"><strong>El material predominante en los techos</strong></span></td>


			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE (s3_300=1 OR s3_300=2 OR s3_300=3) AND (s3_400=4 OR s3_400=5 OR s3_400=6 OR s3_400=7 OR s3_400=8)");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s3_300'].'</span></td><td><span class="texto">'.$row['s3_400'].'</span></td></tr>';
}

}


//REPORTE 16
if($id==16)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Su vivienda cuenta con: Televisor a color</strong></span></td>
			<td width="10%"><span class="texto"><strong>Su vivienda cuenta con: Conexión a TV por cable</strong></span></td>
			<td width="10%"><span class="texto"><strong>La vivienda tiene alumbrado eléctrico por red pública?</strong></span></td>
			 <td width="10%"><span class="texto"><strong>El material predominante en los techos</strong></span></td>


			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE (s3_902=0 and s3_1004=1) OR (s3_908=0 and s3_1003=5)");
while ($row = mysql_fetch_array($result))
{	

$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s3_902'].'</span></td><td><span class="texto">'.$row['s3_1004'].'</span></td><td><span class="texto">'.$row['s3_908'].'</span></td><td><span class="texto">'.$row['s3_1003'].'</span></td></tr>';
}

}


//REPORTE 17
if($id==17)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="15%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="7%"><span class="texto"><strong>PTANUM</strong></span></td>
			<td width="7%"><span class="texto"><strong>MZ</strong></span></td>
			<td width="6%"><span class="texto"><strong>LOTE</strong></span></td>
			<td width="5%"><span class="texto"><strong>KM</strong></span></td>
			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s4_ptanum IS NULL AND s4_mz IS NULL AND s4_lote IS NULL AND s4_km IS NULL");
while ($row = mysql_fetch_array($result))
{	

$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">S/N</span></td><td><span class="texto">'.$row['s4_mz'].'</span></td><td><span class="texto">'.$row['s4_lote'].'</span></td><td><span class="texto">'.$row['s4_km'].'</span></td></tr>';
}

}

//REPORTE 18
if($id==18)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="15%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>

			<td width="7%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura?
(S5_2_1)</strong></span></td>
			<td width="6%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura? HECTAREAS
(S5_2_1_H)</strong></span></td>
			<td width="5%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura?
(S5_2_2)</strong></span></td>
			
			<td width="7%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura? HECTAREAS
(S5_2_2_H)</strong></span></td>
			<td width="6%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura?
(S5_2_3)</strong></span></td>
			<td width="5%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura? HECTAREAS
(S5_2_3_H)</strong></span></td>

            <td width="7%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura?
(S5_2_4)</strong></span></td>            
<td width="7%"><span class="texto"><strong>¿Cuál es el regimen de tenencia del espacio de acuicultura? HECTAREAS
(S5_2_4_H)</strong></span></td>
			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE (s5_2_1_h < 1 OR s5_2_1_h > 50 AND s5_2_1_h<>'99999') OR (s5_2_2_h < 1 OR s5_2_2_h > 50 AND s5_2_2_h<>'99999')  OR (s5_2_3_h < 1 OR s5_2_3_h > 50 AND s5_2_3_h<>'99999') OR (s5_2_4_h < 1 OR s5_2_4_h > 50 AND s5_2_4_h<>'99999')");
while ($row = mysql_fetch_array($result))
{	

$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s5_2_1'].'</span></td><td><span class="texto">'.$row['s5_2_1_h'].'</span></td><td><span class="texto">'.$row['s5_2_2'].'</span></td><td><span class="texto">'.$row['s5_2_2_h'].'</span></td><td><span class="texto">'.$row['s5_2_3'].'</span></td><td><span class="texto">'.$row['s5_2_3_h'].'</span></td><td><span class="texto">'.$row['s5_2_4'].'</span></td><td><span class="texto">'.$row['s5_2_4_h'].'</span></td></tr>';
}

}


//REPORTE 19
if($id==19)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>¿Qué tipo de instalaciones utilizan en su actividad? (S5_13_1_MA)</strong></span></td>
			<td width="10%"><span class="texto"><strong>¿Qué tipo de instalaciones utilizan en su actividad? (S5_13_1_ME)</strong></span></td></tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE (s5_13_1_ma<10 OR s5_13_1_ma>1000 AND s5_13_1_ma<>99999.99) OR (s5_13_1_mE<10 OR s5_13_1_mE>1000 AND s5_13_1_me<>99999.99) OR  (s5_13_2_ma<10 OR s5_13_2_ma>1000 AND s5_13_2_ma<>99999.99) OR (s5_13_2_me<10 OR s5_13_2_me>1000 AND s5_13_2_me<>99999.99)  OR  (s5_13_3_ma<10 OR s5_13_3_ma>1000 AND s5_13_3_ma<>99999.99) OR (s5_13_3_me<10 OR s5_13_3_me>1000 AND s5_13_3_me<>99999.99) OR  (s5_13_4_ma<10 OR s5_13_4_ma>1000 AND s5_13_4_ma<>99999.99) OR (s5_13_4_me<10 OR s5_13_4_me>1000 AND s5_13_4_me<>99999.99)  OR  (s5_13_5_ma<10 OR s5_13_5_ma>1000 AND s5_13_5_ma<>99999.99) OR (s5_13_5_me<10 OR s5_13_5_me>1000 AND s5_13_5_me<>99999.99)  OR  (s5_13_6_ma<10 OR s5_13_6_ma>1000 AND s5_13_6_ma<>99999.99) OR (s5_13_6_me<10 OR s5_13_6_me>1000 AND s5_13_6_me<>99999.99)  OR  (s5_13_7_ma<10 OR s5_13_7_ma>1000 AND s5_13_7_ma<>99999.99) OR (s5_13_7_me<10 OR s5_13_7_me>1000 AND s5_13_7_me<>99999.99)  OR  (s5_13_8_ma<10 OR s5_13_8_ma>1000 AND s5_13_8_ma<>99999.99) OR (s5_13_8_me<10 OR s5_13_8_me>1000 AND s5_13_8_me<>99999.99)");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s5_13_1_ma'].'</span></td><td><span class="texto">'.$row['s5_13_1_me'].'</span></td></tr>';
}

}


//REPORTE 20
if($id==20)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>¿Qué tipo de alimentos utiliza en su cultivo?
(S5_16_5_P)</strong></span></td>
			  

			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE  s5_16_5<'1' OR s5_16_5>'4'");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s5_16_5_p'].'</span></td></tr>';
}

}


//REPORTE 21
if($id==21)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="10%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="5%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_T)</strong></span></td>
			<td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_H)</strong></span></td> 
            <td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_M)</strong></span></td>
			<td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_T_P)</strong></span></td>
			<td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_H_P)</strong></span></td>
			
			<td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_M_E)</strong></span></td> 
            <td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_T_E)</strong></span></td>
			<td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_H_E)</strong></span></td>
			<td width="5%"><span class="texto"><strong>Tiene usted trabajadores remunerados a su cargo? Total (S7_1_M_E)</strong></span></td>
			
          </tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE  (s7_1_h + s7_1_m<>s7_1_t) OR (s7_1_h_p+ s7_1_m_p<>s7_1_t_p) OR (s7_1_h_e + s7_1_m_e<>s7_1_t_e) OR (s7_1_t_p + s7_1_t_e<>s7_1_t)");
while ($row = mysql_fetch_array($result))
{	
$edad=intval(date('Y'))-intval($row['s2_3a']);
$celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s7_1_t'].'</span></td><td><span class="texto">'.$row['s7_1_h'].'</span></td><td><span class="texto">'.$row['s7_1_m'].'</span></td><td><span class="texto">'.$row['s7_1_t_p'].'</span></td><td><span class="texto">'.$row['s7_1_h_p'].'</span></td><td><span class="texto">'.$row['s7_1_m_e'].'</span></td><td><span class="texto">'.$row['s7_1_t_e'].'</span></td><td><span class="texto">'.$row['s7_1_h_e'].'</span></td><td><span class="texto">'.$row['s7_1_m_e'].'</span></td></tr>';
}

}


//REPORTE 22
if($id==22)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Tiene usted trabajadores con alguna limitación o dificultad para desempeñar sus labores? Cuántos (S7_3_C)</strong></span></td></tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE  s7_3_c > 10  AND s7_3_c<>'999'");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s7_3_c'].'</span></td></tr>';
}

}


//REPORTE 23
if($id==23)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Le ayudan personas de su hogar sin recibir remuneración fija? Cuantos (S7_4_C)</strong></span></td></tr>';
$celda='';



$result = mysql_query("SELECT * FROM exportable WHERE  s7_4_c > 10  AND s7_4_c<>'999'");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s7_4_c'].'</span></td></tr>';
}

}

//REPORTE 24
if($id==24)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Tiene usted trabajadores con alguna limitación o dificultad para desempeñar sus labores? Cuántos (S7_1_T)            </strong></span></td>
			<td width="10%"><span class="texto"><strong>Le ayudan personas de su hogar sin recibir remuneración fija? Cuantos (S7_4_C)</strong></span></td></tr>';
$celda='';



$result = mysql_query("SELECT * FROM exportable WHERE  s7_1_t <  s7_3_c");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s7_1_t'].'</span></td><td><span class="texto">'.$row['s7_1_t'].'</span></td></tr>';
}

}

//REPORTE 25
if($id==25)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>Tiene usted trabajadores con alguna limitación o dificultad para desempeñar sus labores? Cuántos (S7_1_T)            </strong></span></td>
			<td width="10%"><span class="texto"><strong>Le ayudan personas de su hogar sin recibir remuneración fija? Cuantos (S7_4_C)</strong></span></td></tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE  s8_1_1a <  1000 OR s8_1_1a = '99999'  OR s8_1_1a <  1000 OR s8_1_2a = '99999'");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s7_1_t'].'</span></td><td><span class="texto">'.$row['s7_1_t'].'</span></td></tr>';
}

}

//REPORTE 26
if($id==26)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>De la cantidad anual que cosecha. ¿Qué porcentaje destinó a: VENTA (S8_6_1_1) </strong></span></td>
			<td width="10%"><span class="texto"><strong>De la cantidad anual que cosecha. ¿Qué porcentaje destinó a: AUTOCONSUMO (S8_6_2_1)</strong></span></td>            <td width="10%"><span class="texto"><strong>De la cantidad anual que cosecha. ¿Qué porcentaje destinó a: TRUEQUE (S8_6_3_1)</strong></span></td>
			<td width="10%"><span class="texto"><strong>De la cantidad anual que cosecha. ¿Qué porcentaje destinó a: AUTOCONSUMO (S8_6_2_1)</strong></span></td></tr>';
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE  (s8_6_1_1+S8_6_2_1+S8_6_3_1+S8_6_4_1)<>100");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['S8_6_1_1'].'</span></td><td><span class="texto">'.$row['s8_6_2_1'].'</span></td><td><span class="texto">'.$row['s8_6_3_1'].'</span></td><td><span class="texto">'.$row['s8_6_2_1'].'</span></td></tr>';
}

}

//REPORTE 27
if($id==27)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>En los últimos 12 meses, ¿Qué especies cosechó en su actividad acuícola? (S8_7_1)</strong></span></td>
			<td width="10%"><span class="texto"><strong>¿cual fue volumen anual que cosecha? (S8_8_1)</strong></span></td></tr>';
			
$celda='';


$result = mysql_query("SELECT * FROM exportable WHERE s8_8_1<50 OR s8_8_1>500 OR s8_8_2<50 OR s8_8_2>500  OR s8_8_3<50 OR s8_8_3>500  OR s8_8_4<50 OR s8_8_4>500 OR s8_8_5<50 OR s8_8_5>500 OR s8_8_6<50 OR s8_8_6>500  OR s8_8_7<50  OR  s8_8_7>500  OR s8_8_8<50 OR s8_8_8>500 OR s8_8_9<50 OR s8_8_9>500 OR s8_8_10<50 OR s8_8_10>500 OR s8_8_11<50 OR s8_8_11>500 OR s8_8_12<50 OR s8_8_12>500 OR s8_8_13<50 OR s8_8_13>500 OR s8_8_14<50 OR s8_8_14>500");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s8_7_1'].'</span></td><td><span class="texto">'.$row['s8_8_1'].'</span></td></tr>';
}

}

//REPORTE 28
if($id==28)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>En los últimos 12 meses, ¿Qué especies cosechó en su actividad acuícola? (S8_7_1)</strong></span></td>
			<td width="10%"><span class="texto"><strong>¿Cuál es el precio promedio de venta por kilo? (S8_9_1)</strong></span></td></tr>';
			
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s8_9_1<2 OR s8_1_1>20 OR s8_9_2<2 OR s8_9_2>20  OR s8_9_3<2 OR s8_9_3>20  OR s8_9_4<2 OR s8_9_4>20 OR s8_9_5<2 OR s8_9_5>20 OR s8_9_6<2 OR s8_9_6>20  OR s8_9_7<2  OR  s8_9_7>2  OR s8_9_8<20 OR s8_9_8>20 OR s8_9_9<2 OR s8_9_9>20 OR s8_9_10<2 OR s8_9_10>20 OR s8_9_11<2 OR s8_9_11>20 OR s8_9_12<2 OR s8_9_12>20 OR s8_9_13<2 OR s8_9_13>20 OR s8_9_14<2 OR s8_9_14>20");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s8_7_1'].'</span></td><td><span class="texto">'.$row['s8_9_1'].'</span></td></tr>';
}

}


//REPORTE 29
if($id==29)
{
$cabecera='<tr class="titulo_mediano1">
            <td width="20%" align="center"><span class="texto"><strong>SEDE OPERATIVA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DEPARTAMENTO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>PROVINCIA</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>DISTRITO</strong></span></td>
            <td width="15%" align="center"><span class="texto"><strong>CENTRO POBLADO</strong></span></td>
            <td width="10%" align="center"><span class="texto"><strong>FORMULARIO N°</strong></span></td>
            <td width="10%"><span class="texto"><strong>¿Cuenta con embarcaciones para su actividad? CUANTAS (S10_10_C)</strong></span></td></tr>';
			
$celda='';

$result = mysql_query("SELECT * FROM exportable WHERE s10_10_c>10 AND s10_10_c<>99");
while ($row = mysql_fetch_array($result))
{	
 $edad=intval(date('Y'))-intval($row['s2_3a']);
 $celda=$celda.'<tr><td><span class="texto">'.utf8_encode($row['nom_sede']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_dd']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_pp']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_di']).'</span></td><td><span class="texto">'.utf8_encode($row['nom_ccpp']).'</span></td><td><span class="texto">'.$row['nform'].'</span></td><td><span class="texto">'.$row['s10_10_c'].'</span></td></tr>';
}

}
?>
<body>

<table width="1000" border="0" cellpadding="0" cellspacing="0" style="color:#666">
  <tr>
    <td width="134" align="left" valign="top">
    <div class="division" align="left">
      <table width="128" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="20" align="left" valign="middle" class="texto1"><b>OPCIONES</b></td>
        </tr>
        <tr>
          <td id="r1" align="left" valign="middle" class="reporte1" style="cursor:pointer"  onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(1)">Reporte 1</td>
        </tr>
        <tr>
          <td align="left" valign="middle" id="r2"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(2)" class="reporte1">Reporte 2</td>
        </tr>
        <tr>
          <td id="r3" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(3)" class="reporte1" >Reporte 3</td>
        </tr>
        <tr>
          <td id="r4" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(4)" class="reporte1" >Reporte 4</td>
        </tr>
        <tr>
          <td id="r5" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(5)" class="reporte1" >Reporte 5</td>
        </tr>
        <tr>
          <td id="r6" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(6)" class="reporte1" >Reporte 6</td>
        </tr>
        <tr>
          <td id="r7" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(7)" class="reporte1" >Reporte 7</td>
        </tr>
        <tr>
          <td id="r8" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(8)" class="reporte1" >Reporte 8</td>
        </tr>
        <tr>
          <td id="r9" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(9)" class="reporte1" >Reporte 9</td>
        </tr>
        <tr>
          <td id="r10" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(10)" class="reporte1" >Reporte 10</td>
        </tr>
        <tr>
          <td id="r11" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(11)" class="reporte1">Reporte 11</td>
        </tr>
        <tr>
          <td id="r12" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(12)" class="reporte1">Reporte 12</td>
        </tr>
        <tr>
          <td id="r13" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(13)" class="reporte1">Reporte 13</td>
        </tr>
        <tr>
          <td id="r14" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(14)" class="reporte1">Reporte 14</td>
        </tr>
        <tr>
          <td id="r15" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(15)" class="reporte1">Reporte 15</td>
        </tr>
        <tr>
          <td id="r16" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(16)" class="reporte1">Reporte 16</td>
        </tr>
        <tr>
          <td id="r17" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(17)" class="reporte1">Reporte 17</td>
        </tr>
        <tr>
          <td id="r18" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(18)" class="reporte1">Reporte 18</td>
        </tr>
        <tr>
          <td id="r19" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"onmouseup="abrir_pagina(19)"  class="reporte1" > Reporte 19</td>
        </tr>
        <tr>
          <td id="r20" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)" onmouseup="abrir_pagina(20)" class="reporte1">Reporte 20</td>
        </tr>
        <tr>
          <td id="r21" align="left" valign="middle" style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"  onmouseup="abrir_pagina(21)" class="reporte1">Reporte 21</td>
        </tr>
        <tr>
          <td id="r22" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(22)" class="reporte1">Reporte 22</td>
        </tr>
        <tr>
          <td id="r23" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"  onmouseup="abrir_pagina(23)"  class="reporte1">Reporte 23</td>
        </tr>
        <tr>
          <td id="r24" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"  onmouseup="abrir_pagina(24)"  class="reporte1">Reporte 24</td>
        </tr>
        <tr>
          <td id="r25" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(25)"  class="reporte1">Reporte 25</td>
        </tr>
        <tr>
          <td id="r26" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(26)" class="reporte1">Reporte 26</td>
        </tr>
        <tr>
          <td id="r27" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(27)" class="reporte1">Reporte 27</td>
        </tr>
        <tr>
          <td id="r28" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(28)" class="reporte1">Reporte 28</td>
        </tr>
        <tr>
          <td id="r29" align="left" valign="middle"  style="cursor:pointer" onmousedown="cambiar_color_over(this.id)"   onmouseup="abrir_pagina(29)" class="reporte1">Reporte 29</td>
        </tr>
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
      </table>
    </div></td>
    <td width="846" align="left" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td height="29" align="center" class="titulo_mediano"><strong>REPORTE <?php echo $id; ?> DE CONSISTENCIA DE DATOS DE ACUICULTOR</strong></td>
      </tr>
      <tr>
        <td align="center" class="texto_mediano"><?php echo $titulo; ?></td>
      </tr>
      <tr>
        <td align="left" valign="top">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" class="borde1">
        <?php
		echo $cabecera;
		echo $celda;
		?>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>