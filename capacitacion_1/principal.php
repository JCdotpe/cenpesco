<?php include ("seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);
$id_modulo=$_GET['id_modulo'];
$date=$_GET['date'];
$i=$_GET['i'];

//---roles   
   
include("roles.php");

//------------------


$aleatorio = rand (1,1000000);
//función día

function diasem($fecha)
{
$anio=date("Y",strtotime($fecha));
$mes=date("m",strtotime($fecha));
$dia=date("d",strtotime($fecha));
if (($anio%4 == 0 and $anio%100 != 0) or $anio%400 == 0 )
{
	$bisiesto=1;
}
else
{
 $bisiesto=0;	
}
if($mes=='01') { $b=0; $m='Enero'; }
if($mes=='02') { $b=31; $m='Febrero';  }
if($mes=='03') { $b=59; $m='Marzo';  }
if($mes=='04') { $b=90; $m='Abril';  }
if($mes=='05') { $b=120; $m='Mayo';  }
if($mes=='06') { $b=151; $m='Junio';  }
if($mes=='07') { $b=181; $m='Julio';  }
if($mes=='08') { $b=212; $m='Agosto';  }
if($mes=='09') { $b=243; $m='Septiembre';  }
if($mes=='10') { $b=273; $m='Octubre'; }
if($mes=='11') { $b=304;  $m='Noviembre'; }
if($mes=='12') { $b=334; $m='Diciembre';  }

if($bisiesto==1 and $mes!='01' and $mes!='02')
{
$b=intval($dia)+$b+$bisiesto;
}
else
{
$b=intval($dia)+$b;
}

$a=$anio-1;
$c=floor($a/4);
$d=floor($a/100);
$e=floor($a/400);
$f=$a+$b+$c+$e-$d;
$g=($f%7);
if($g==0) { $ds="Domingo"; } if($g==1) { $ds="Lunes"; }
if($g==2) { $ds="Martes"; } if($g==3) { $ds="Miercoles"; }
if($g==4) { $ds="Jueves"; } if($g==5) { $ds="Viernes"; }  if($g==6) { $ds="Sabado"; }
return $ds.' '.$dia.' de '.$m.' de '.$anio;
//return $ds.'  '.$dia.' de '.$m;
}


//----------------------------Guardar registro
if($i=='i')
{
$_SESSION["flag"]=1;
$fecha=date("Y-m-d H:i:s");
///registramos ingreso al aula virtual
if($_SESSION["tipo"]==2)
{
$sql="INSERT INTO  cap_asistencia (id,dni,id_dep,id_odei,fecha,id_seccion,id_asignacion,tipo) VALUES ('".$_SESSION["id"]."','".$_SESSION["dni"]."','".$_SESSION["cod_dep"]."','".$_SESSION["cod_odei"]."','".$fecha."','".$_SESSION["seccion"]."','".$_SESSION["asignacion"]."','1')";
$result = mysql_query($sql);
}
}
?>

<?php
$hora_a=strtotime(date('H:i:s'));
$hi1=strtotime(date("07:45:00"));
$hi2=strtotime(date("14:45:00"));

if($_SESSION["tipo"]==1)
{
?>
<script type="text/javascript" src="mostrar_pagina.js"></script>
<?php
ob_start(); 
header("refresh: 42; url = examen.php"); 
ob_end_flush();  
$variable='';
$result = mysql_query("SELECT *  FROM  cap_asignacion_alu  WHERE id_aula='".$_SESSION["seccion"]."'");
while($row = mysql_fetch_row($result))
	 {
      $variable=$variable."refreshDivs('lista".$row[1]."',1,'lista.php?ide=".$row[1]."&rdz=".$aleatorio."'); ";
	 }
	 
	 echo '<script language="javascript"> ';
	 echo 'function startrefresh() ';
	 echo ' { ';
	 echo $variable;
	 echo ' } ';
	 echo ' </script> ';
	 
?>

<script type="text/javascript" src="mostrar.js"></script>
<?php
}
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

<div class="cabecera"><br /><span class="titulo"> <?php echo $saludo.', '.($_SESSION["nombres"]); ?></span>
<span class="titulo"><br>
<strong>AULA VIRTUAL DEL PROYECTO DE CENSO DE PESCA CONTINENTAL DEL PER&Uacute;</strong></span><br>
<table width="660" border="0" align="center" cellpadding="2" cellspacing="2">
 <tr>
    <td width="164" height="40"><p class="inicio"><a href="principal.php" ></a></p></td>
    <td width="164" height="40"><p class="perfiles"><a href="<?php echo $companeros;  ?>" ></a></p></td>
    <td width="164" height="40"><p class="calificaciones"><a href="<?php echo $calificaciones;  ?>" ></a></p></td>
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
<p class="cuenta"><a href="cuenta.php"></a></p>
<p class="examen"><a href="<?php echo $examen; ?>"></a></p>
<p class="archivo"><a href="<?php echo $file; ?>"></a></p>
<p class="recurso"><a href="<?php echo $recurso; ?>"></a></p>
<p class="ayuda"><a href="<?php echo $ayuda; ?>"></a></p>
</div>
</div>

<div class=panel>
        <?php
        
         $f_actual=date("Y-m-d");
         $h_actual=date("H:i:s");
		 
		 if($date==NULL)
		 {
		  $date=date('Y-m-d');
		 }


///verificación de cambio de clave  y subida de foto.
$result = mysql_query("SELECT * FROM  regs WHERE clave='".md5($_SESSION["dni"])."' AND estado='2'");
if($row = mysql_fetch_row($result))
	{
	 $men_pass='Por favor, cambie su clave de acceso; no debe mantener la clave inicial que es igual a su n&uacute;mero de DNI. Para cambiar su clave debe ingresar a la secci&oacute;n "Mi cuenta"';
	}
if($_SESSION["image"]==0)  
{  
//$men_foto='Por favor, publique su foto al aula virtual, es indispensable para identificarle en el proceso de capacitación. Para publicar una foto en el Aula Virtual debe ingresar a la sección "Mi cuenta"';
}   

///

//-----------------------------------------------------------------------------------------------------
if($men_pass!=NULL or $men_foto!=NULL)
{
echo '<span class="label_obligatorio">'.$msj.'</span>';
echo '<span class="subtitu"><i>'.$men_pass.'</i></span><br>';
echo '<span class="subtitu"><i>'.$men_foto.'</i></span><br>';
}
        ?>
<br />
<hr />
<?php 
if($_SESSION["tipo"]==1)
{
include("lista_alumnos.php");
}
?>
<?php
$hora_m1=date("07:45:00");
$hora_m2=date("8:45:00");
$hora_t1=date("13:45:00");
$hora_t2=date("14:45:00");

if(((date("H:i:s")>=$hora_m1 and date("H:i:s")<=$hora_m2) or (date("H:i:s")>=$hora_t1 and date("H:i:s")<=$hora_t2))  and ($_SESSION["flag"]==0) and $_SESSION["tipo"]==2)
{
?>
<form id="form1" name="form1" action="principal.php" method="post">
<input name="bandera" type="hidden" class="subtitulo" id="bandera" value="1" />
<span class="aviso"><b>Usted ingres&oacute; al aula virtual a las <?php echo date("H:i:s");  ?>  horas, por favor, haga clic en el bot&oacute;n <i>Registrar Asistencia</i> para confirmar&nbsp;&nbsp;</b></span><br />
<div class="nav">
<p class="hora"><a href="principal.php?i=i" ></a></p>
</div>
</form>
<?php
}
function aula($aula)
{
$result = mysql_query("SELECT * FROM  cap_seccion WHERE id_seccion='".$aula."'");
if($row = mysql_fetch_row($result))
	{
	$sec=$row[1].' y piso N° '.$row[2];
	}
	return $sec;
}
?>
</div >
<?php
if($_SESSION["tipo"]==2)
{
?>
<div class="normal">
<br/>
<p align="left"><img src='vista_foto.php?usuario=<?php echo $_SESSION["dni"]; ?>&amp;id=4&rdz=<?php echo $aleatorio; ?>' border="0" alt="Mi foto" style="border:thin;border: 1px solid #0099FF" /></p>
<br />

<?php
}



?>

<?php
if($_SESSION["tipo"]==NULL)
{
?>
<span class="title"><a href="cap_aadd.php" class="title">Asignaci&oacute;n de Docentes</a> | <a href="cap_aacc.php" class="title">Asignaci&oacute;n de Alumnos</a></span><br /><br />

<?php
}
?><a href="evaluacion.php" target="_blank"><img src="evaluacion.jpg" align="left" /></a>
<p>
<p>
<span class="texto"><a href="publicaciones/Adobe Reader v10.6.1.apk">DESCARGAR LECTOR DE DOCUMENTOS PDF</a></span>
<p>
</div>
</div>

</body>


</html>