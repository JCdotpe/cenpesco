<?php include ("seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);

?>

<title>Aula Virtual de Capacitaci&oacute;n</title>
<style type="text/css">
@import url("css/estilo.css"); 
</style>
</head>

<body>
<?php

if($_SESSION["sexo"]=='F') { $saludo='Bienvenida'; }
if($_SESSION["sexo"]=='M') { $saludo='Bienvenido'; }
$cad='';
$result = mysql_query("SELECT * FROM  cap_modulo WHERE estado='1'");
		 while ($row = mysql_fetch_row($result))
			{
              $cad=$cad.' | <a href="principal.php?id_modulo='.$row[0].'">'.$row[1].'</a>';
			}

?>
<div class="cuerpo">

<div class="cabecera"><br /><span class="titulo"> <?php echo $saludo.', '.utf8_decode($_SESSION["nombres"]); ?></span>
<span class="titulo"><br>
<strong>AULA VIRTUAL DEL PROYECTO DE CENSO DE PESCA CONTINENTAL DEL PER&Uacute;</strong></span><br>
<table width="342" border="0" align="center" cellpadding="2" cellspacing="2">
 <tr>
    <td width="164" height="40"><p class="inicio"><a href="usuario.php" ></a></p></td>
    <td width="164" height="40"><p class="salir"><a href="salir.php" ></a></p></td>
  </tr>
</table>
</div>

<div id="menuv">
<ul>
<li >
 <span class="subtitulo" ><center><br>
 <strong class="title">SECCIONES DEL AULA VIRTUAL</strong><br>
 <br></center></span>
 </li>
 <li>

 </li>
</ul>
<div class="navegador">
<p class="cuenta"><a href="cuenta1.php"></a></p>
</div>
</div>

<div class=panel>
        
<br />
<hr />
<p><span class="titulo2">LISTA DE MANUALES</span></p>
<p><br />
  <span class="subtitulo1">1<a href="archivos/MANUAL_DE_COORDINADOR_DEPARTAMENTAL_FINAL.pdf" target="_blank" class="subtitulo1">.MANUAL DE COORDINADOR DEPARTAMENTAL FINAL</a></span></p>
<p class="subtitulo1">2. <a href="archivos/MANUAL_DE_DIGITACION.pdf" target="_blank" class="subtitulo1">MANUAL DE DIGITACION CENPESCO</a></p>
<p class="subtitulo1"><a href="archivos/MANUAL_DE_CONSISTENCIA_BASICA_CENPESCO.pdf" target="_blank" class="subtitulo1">3. MANUAL DE CONSISTENCIA BASICA CENPESCO</a></p>
<p class="subtitulo1"><a href="archivos/MANUAL_DE_SUPERVISOR_FINAL.pdf" target="_blank" class="subtitulo1">4. MANUAL DE SUPERVISOR FINAL</a></p>
<p class="subtitulo1"><a href="archivos/MANUAL_DE_JEFE_DE_BRIGADA_FINAL.pdf" target="_blank" class="subtitulo1">5. MANUAL DE JEFE DE BRIGADA FINAL</a></p>
<p class="subtitulo1"><a href="archivos/MANUAL_DEL_ASISTENTE_DE_COORDINADOR_DEPARTAMENTAL.pdf" target="_blank" class="subtitulo1">6. MANUAL DEL ASISTENTE DE COORDINADOR DEPARTAMENTAL</a></p>
<p><br />
</p>
</div >
</div>

</body>


</html>