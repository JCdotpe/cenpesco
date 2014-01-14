<?php include ("seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);
@$id_sec=$_GET['id_sec'];
@$categoria=$_POST['categoria'];
@$titulo=$_POST['titulo'];
@$mensaje=$_POST['mensaje'];
@$dni=$_SESSION["dni"];
@$id_seccion=$_SESSION["seccion"];
@$bandera=$_POST['bandera'];
$fecha=date("Y-m-d H:i:s");

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

//echo $bandera.' / '.$titulo;
//----------------------------Guardar consulta
if($bandera==1 and $mensaje!=NULL)
{ 
$ide=0;

$sql="INSERT INTO  cap_foro (mensaje,categoria,dni,fecha,ide,id_seccion) VALUES ('".$mensaje."','".$categoria."','".$dni."','".$fecha."','".$ide."','".$id_seccion."')";
$result = mysql_query($sql);
}
?>


<title>Aula Virtual de Capacitaci&oacute;n</title>

<style type="text/css">
@import url("css/estilo.css"); 
</style>
<script>
function formulario()
{
	
	
if(document.form1.categoria.selectedIndex==0)
{
	
alert('Por favor, seleccione una categoria para el examen');
document.form1.categoria.focus();
return false;	
}
else

if (document.form1.mensaje.value== "") 
 {
   alert('Por favor, escriba algún mensaje');
   document.form1.mensaje.focus();
   return false;
} 
    
else
{
 return true;
}	





}
</script>
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

<div class="cabecera"><br /><span class="titulo"> <?php echo $saludo.', '.$_SESSION["nombres"]; ?></span>
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
  <p>&nbsp;</p>
  <p><span class="titulo2">Consultas de ayuda</span><br />
  </p>
  <hr />
<?php
if($_SESSION["tipo"]==2)
{ 
  
?>
  <table width="700" border="0" cellpadding="2" cellspacing="0">
    <tr>
      <td width="736" align="left" valign="middle" class="titulo3">Formulario de Preguntas<span class="aviso"> (Preguntas y respuestas son p&uacute;blicas)</span></td>
      </tr>

    <tr>
      <td align="left" valign="top" class="subtitulo">
      <form id="form1" name="form1" method="post" action="ayuda.php">
        <table width="655" height="157" border="0" cellpadding="2" cellspacing="2">
          <tr>
            <td width="102" align="left" valign="top">Categor&iacute;a</td>
            <td width="551" align="left" valign="top"><label>
              <select name="categoria" class="subtitulo" id="categoria">
                <option selected="selected">Seleccionar</option>
                <option value="1">Registro de pescadores y acuicultores</option>
                <option value="2">Formulario de pescadores</option>
                <option value="3">Formulario de acuicultures</option>
                <option value="4">Formulario de comunidades</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td align="left" valign="top">Consulta</td>
            <td align="left" valign="top"><label>
              <textarea name="mensaje" cols="52" rows="3" class="texto2" id="mensaje"></textarea>
            </label></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left"><label>
              <input name="button" type="submit" class="subtitulo" id="button" value="  Consultar " onclick="return formulario()" />
              <input name="bandera" type="hidden" id="bandera" value="1" />
            </label></td>
          </tr>
        </table>
      </form>
     </td>
      </tr>
    <tr>
      <td height="91" align="left" valign="top" >
<?php
function resp($ide)
{
$result = mysql_query("SELECT * FROM  cap_foro WHERE ide='".$ide."'");
		 if ($row = mysql_fetch_row($result))
			{
			 $rr=$row[1];	
			}
			return $rr;
}

$i=0;
$result = mysql_query("SELECT * FROM  cap_foro WHERE dni='".$_SESSION["dni"]."'");
		 while ($row = mysql_fetch_row($result))
			{
				$i=$i+1;
			}




$result = mysql_query("SELECT * FROM  cap_foro WHERE dni='".$_SESSION["dni"]."' AND id_seccion='".$id_seccion."' ORDER BY fecha DESC");
 while ($row = mysql_fetch_row($result))
{
$re=resp($row[0]);		

switch ($row[2])
{
case 1:
$cat="Registro de pescadores y acuicultores";
break;

case 2:
$cat="Formulario de pescadores";
break;

case 3:
$cat="Formulario de acuicultores";
break;

case 4:
$cat="Formulario de comunidades";
break;

}

if($re==NULL or $re=='')
{
 $respuesta='<i>Aún no hay una respuesta para esta pregunta</i>';
}
else
{
$respuesta=$re;	
}
			
?>
      
      <p><span class="texto2"><strong>Consulta <?php echo $i; ?>: (<?php echo $cat; ?>)</strong></span>
        <br />
        <span class="texto1"><?php echo ($row[1]);  ?></span><br>
        <span class="texto2"> <strong>Respuesta <?php echo $i; ?>:</strong></span><br>
        <span class="aviso"><?php echo ($respuesta);  ?></span></p>
              </p>
        
      <?php
	  $i=$i-1;
	  
			}
	  ?>
         <p><span class="aviso"><strong><a href="ayuda_det.php">&gt;&gt;Ver todas las consultas del Aula</a></strong</span><br>
          <br> 
        </td>
    </tr>
    <tr>
      <td align="left" valign="top" class="subtitulo">&nbsp;</td>
    </tr>

  </table>
  <p>
    <?php
  }
?>
  </p>
  
<?php

if($_SESSION["tipo"]==1)
{ 

function resp($ide)
{
$result = mysql_query("SELECT * FROM  cap_foro WHERE ide='".$ide."'");
		 if ($row = mysql_fetch_row($result))
			{
			 $rr=$row[1];	
			}
			return $rr;
}
?>
  <table width="700" border="0" cellpadding="1" cellspacing="1">
    <tr>
      <td class="titulo3">Preguntas del Aula</td>
    </tr>
    <tr>
      <td>
<?php
$k=0;
$result = mysql_query("SELECT * FROM  cap_foro WHERE dni='".$_SESSION["dni"]."' AND ide='0' ORDER BY fecha DESC");
 while ($row = mysql_fetch_row($result))
{
$k=$k+1;
$re=resp($row[0]);
if($re==NULL or $re=='')
{
 $respuesta='<i>Sin respuesta</i>';
}
else
{
$respuesta='<i>Respondido</i>';
}
?>
<span class="subtitulo1"><?php echo $k.'. '. $row[1]; ?></span><br />  <span class="aviso"><strong><?php echo $respuesta;  ?></strong></span> <span class="texto2">|</span> <span class="title">Contestar</span>
<?php
}
?>
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>
  <tr>
      <td height="35"><br></td>
    </tr>
  </table>
<?php
}
?>
</div >
</div>
</body>


</html>