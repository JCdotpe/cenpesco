<?php include ("seguridad.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);
@$isig=$_GET['isig'];
@$sig=$_GET['sig'];
@$banderin=$_GET['banderin'];
@$bandera=$_POST['bandera'];
@$id=$_POST['id'];
@$codigo_alumno=$_POST['codigo_alumno'];
@$ide=$_GET['ide'];
@$nombre=$_POST['nombre'];
@$sexo=$_POST['sexo'];
@$apellidos=$_POST['apellidos'];
@$dni=$_POST['dni'];
$tipo=$_POST['tipo'];
@$email=$_POST['email'];
@$id_seccion=$_POST['id_seccion'];
@$id_docente=$_GET['id_docente'];

function aula($au)
{
$mysql="SELECT * FROM cap_asignacion_doc WHERE id_docente='".$au."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
$c=0;
if ($row = mysql_fetch_array($r))
{
$aula=$row[2];	
}
return $aula;
}

//---roles   
   
include("roles.php");

//------------------ consultamos si ya existe asignación
$flag=0;
$result = mysql_query("SELECT * FROM  cap_asignacion_alu");
while ($row = mysql_fetch_row($result))
{
$flag=1;
}


//asignamos alumnos
function insertar($id_alumno,$au)
{
 $sql="INSERT INTO  cap_asignacion_alu (id_alumno,id_aula) VALUES ('".$id_alumno."','".$au."')";
 $result = mysql_query($sql);
}	

//-----------------------------------------
$k=0;
if($id==1 and $tipo!=""  and $bandera==NULL and $flag==0)
{
//recorremos alumnos seleccionados	
$result = mysql_query("SELECT * FROM  regs WHERE estado='2' ORDER BY RAND()");
while ($row = mysql_fetch_row($result))
{
$k=$k+1;
if(	$k<=42)  { $au=1;  }
if(	$k>42 and $k<=84)   { $au=2;  }
if(	$k>84 and $k<=126)  { $au=3;  }
if(	$k>126 and $k<=168) { $au=4;  }
if(	$k>168 and $k<=210) { $au=5;  }
if(	$k>210 and $k<=252) { $au=6;  }
if(	$k>252 and $k<=294) { $au=7;  }
if(	$k>294) { $au=8;  }
 $id_alumno=$row[0];
insertar($id_alumno,$au);
	//echo $row[3].'<br/>';
}
	
}

//eliminar
if($isig==1 and $sig==3)
{

 $query="DELETE from cap_asignacion_alu";
 $result=mysql_query($query);
 $query="ALTER TABLE cap_asignacion_doc AUTO_INCREMENT=1";
 $result=mysql_query($query);

}

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script src="src/js/jscal2.js"></script>
    <script src="src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />

<title>Aula Virtual de Capacitaci&oacute;n</title>
<style type="text/css">
@import url("css/estilo.css"); 
@import url("css/letras1.css");
.style2 {	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
</style>
<script language="JavaScript"> 
function pregunta()
{ 
 if (confirm('Realmente desea eliminar este registro')){ 
       document.form2.submit() 
    }  else {   return (false);   }
} 

//---------
function validar()
{
if (document.form1.id_modulo.selectedIndex == 0) 
{
  alert('Por favor, seleccione un módulo');
  document.form1.id_modulo.focus();
  return false;
} 

else

if (document.form1.titulo.value == 0) 
{
  alert('Por favor, escriba un título');
  document.form1.titulo.focus();
  return false;
} 

else

if (document.form1.fecha.value == 0) 
{
  alert('Por favor, seleccione una fecha');
  document.form1.fecha.focus();
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
<br>
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
  <p><span class="titulo2">Asignar alumnos en Aulas</span><br />
  </p>
<hr />
<table width="720" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td><form id="form1" name="form1" method="post" action="cap_aacc.php">
      <!-- full-name input-->
      <table width="720" border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td align="left" valign="top" class="texto2"><strong>Tipo de asignaci&oacute;n</strong></td>
        </tr>
        <tr>
          <td align="left" valign="top"><span class="texto2">
            <label>
              <select name="tipo" class="texto2" id="tipo">
                <option selected="selected">Seleccionar</option>
                <option value="1">Aleatorio</option>
                <option value="2">Ordenado por departamento</option>
              </select>
            </label>
          </span></td>
        </tr>
        <tr>
          <td height="21" align="left" valign="top"><span class="texto2">
            <input name="id" type="hidden" class="style2" id="id" value="1" />
            <input name="bandera" type="hidden" class="style2" id="bandera" value="<?php echo $banderin; ?>" />
          </span></td>
        </tr>
        <tr>
          <td align="left" valign="top"><input type="submit" name="submit" value="  Asignar Aulas "  onclick="return examen()"/></td>
        </tr>
        <tr>
          <td height="21" align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="21" align="left" valign="top"><table width="720" border="0" align="center" cellpadding="1" cellspacing="0" style="border:thin;border: 1px solid #039">
            <tr  >
              <td width="311" height="30" align="left" class="texto1"><strong>Apellidos y Nombres</strong></td>
              <td width="163" align="left" class="texto1"><strong>Departamento</strong></td>
              <td width="28" align="center" class="texto1"><strong>A1</strong></td>
              <td width="28" align="center" class="texto1"><strong>A2</strong></td>
              <td width="28" align="center" class="texto1"><strong>A3</strong></td>
              <td width="28" align="center" class="texto1"><strong>A4</strong></td>
              <td width="28" align="center" class="texto1"><strong>A5</strong></td>
              <td width="28" align="center" class="texto1"><strong>A6</strong></td>
              <td width="28" align="center" class="texto1"><strong>A7</strong></td>
              <td width="28" align="center" class="texto1"><strong>A8</strong></td>
              </tr>
            <?php

$mysql="SELECT a.id_aula, r.nombre1, r.nombre2, r.ap_paterno, r.ap_materno, r.nom_dep, r.cod_dep FROM cap_asignacion_alu AS a INNER JOIN regs AS r on(a.id_alumno=r.id)  ORDER BY r.ap_paterno ASC";  
    $r=mysql_query($mysql) or die ("No se puede hacer consulta");
while ($row = mysql_fetch_array($r))
  
  {
    $c=$c+1;
  
    if($c%2==0) 
      { $color='#E1FFFF'; }
    if($c%2!=0) 
      { $color='#FFFFFF'; }
  
    if($c==1) {    $color='#FFFFCC'; }



    ?>
            <tr bgcolor="<?php echo $color;  ?>" >
              <td height="30" align="left" class="texto1"><?php echo $c.'. '.strtoupper(utf8_encode($row[3].' '.$row[4].' '.$row[1].' '.$row[2])); ?></td>
              <td align="left" class="texto1"><?php echo utf8_encode($row[5]); ?></td>
              <td align="center"><label>
                <input name="aula<?php echo $c;  ?>" type="radio" id="aula<?php echo $c;  ?>" value="1" <?php if($row[0]==1) { ?> checked="checked" <?php } ?> />
                </label></td>
              <td align="center"><label>
                <input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="2" <?php if($row[0]==2) { ?> checked="checked" <?php } ?> />
                </label></td>
              <td align="center"><input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="3" <?php if($row[0]==3) { ?> checked="checked" <?php } ?>/></td>
              <td align="center"><input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="4" <?php if($row[0]==4) { ?> checked="checked" <?php } ?>/></td>
              <td align="center"><input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="5" <?php if($row[0]==5) { ?> checked="checked" <?php } ?>/></td>
              <td align="center"><input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="6" <?php if($row[0]==6) { ?> checked="checked" <?php } ?>/></td>
              <td align="center"><input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="7" <?php if($row[0]==7) { ?> checked="checked" <?php } ?>/></td>
              <td align="center"><input type="radio" name="aula<?php echo $c;  ?>" id="aula<?php echo $c;  ?>" value="8" <?php if($row[0]==8) { ?> checked="checked" <?php } ?>/></td>
              </tr>
            <?php } ?>
            </table></td>
        </tr>
        </table>
   
    </form></td>
  </tr>
  <tr>
    <td align="center" class="title">| <a href="cap_aacc.php?isig=1&amp;sig=3" class="title">Eliminar asignaci&oacute;n</a> |</td>
  </tr>
</table>
</div >
</div>
</body>


</html>
