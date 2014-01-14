<?php include ("seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);
$id_modulo=$_GET['id_modulo'];
$date=$_GET['date'];
date_default_timezone_set('Etc/GMT+5');
$i=$_GET['i'];
///datos de asistencia
$id_alu=$_GET['id_alu'];
$ide=$_GET['ide'];
$id_asistencia=$_GET['id_asistencia'];

//---roles   
   
include("roles.php");

//------------------


if($_SESSION["tipo"]==1 and $ide!=NULL and $id_asistencia!=NULL)
{
$fecha=date("Y-m-d H:i:s");
if($ide==1 and $id_asistencia!=0)
{
$sql="UPDATE cap_asistencia SET tipo='0'  WHERE id_asistencia='".$id_asistencia."' AND  id='".$id_alu."'"; 
mysql_query($sql);		
}

if($ide==2 and $id_asistencia==0)
{

function asignacion($id_alu)
{

@$mysqla="SELECT * FROM cap_asignacion_alu WHERE id_alumno='".$id_alu."'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
$as=$row[0];	
}
return $as;
}


@$mysqla="SELECT * FROM regs WHERE id='".$id_alu."' AND estado='2'"; 
$queryresult=mysql_query($mysqla);
if($row=@mysql_fetch_array($queryresult))
{
$dni1=$row[1];
$cod_dep1=$row[2];
$cod_odei1=$row[4];
}
$asignacion1=asignacion($id_alu);
$sql="INSERT INTO  cap_asistencia (id,dni,id_dep,id_odei,fecha,id_seccion,id_asignacion,tipo) VALUES ('".$id_alu."','".$dni1."','".$cod_dep1."','".$cod_odei1."','".$fecha."','".$_SESSION["seccion"]."','".$asignacion1."','1')";
$result = mysql_query($sql);		
}

///
$id_alu=NULL;
$ide=NULL;
$id_asistencia=NULL;
	
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

<div class="cabecera"><br /><span class="titulo"> <?php echo $saludo.', '.$_SESSION["nombres"]; ?></span>
<span class="titulo"><br>
<strong>AULA VIRTUAL DEL PROYECTO DE CENSO DE PESCA CONTINENTAL DEL PER&Uacute;</strong></span><br><table width="660" border="0" align="center" cellpadding="2" cellspacing="2">
 <tr>
    <td width="164" height="40"><p class="inicio"><a href="principal.php" ></a></p></td>
    <td width="164" height="40"><p class="perfiles"><a href="<?php echo $companeros;  ?>" ></a></p></td>
    <td width="164" height="40"><p class="calificaciones"><a href="<?php echo $calificaciones;  ?>" ></a></p></td>
    <td width="164" height="40"><p class="salir"><a href="salir.php" ></a></p></td>
  </tr>
</table></div>

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

        ?>
<br />
<hr />
<p>
  <?php 

?>
  <em><span class="titulo4">&iexcl;Estado de asistencia cambiado!</span></em></p>
<p><a href="principal.php" class="titulo2">Regresar a p&aacute;gina de control de asistencia</a></p>
</div >

<div class="normal">

</div >

<?php



?>

</div>
</div>

</body>


</html>