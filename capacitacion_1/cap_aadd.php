<?php include ("seguridad.php");
if($_SESSION["tipo"]==NULL)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);

@$banderin=$_GET['banderin'];
@$bandera=$_POST['bandera'];
@$id=$_POST['id'];
@$codigo_docente=$_POST['codigo_docente'];
@$ide=$_GET['ide'];
@$nombre=$_POST['nombre'];
@$sexo=$_POST['sexo'];
@$apellidos=$_POST['apellidos'];
@$dni=$_POST['dni'];
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

//------------------


if($id==1 and $nombre!=""  and $bandera==NULL)
{
//Datos personales
$sql="INSERT INTO  cap_docente (dni,nombre,apellidos,email,clave,descripcion,mensaje,sexo,tipo) VALUES ('".$dni."','".$nombre."','".$apellidos."','".$email."','".md5($dni)."','','','".$sexo."','0')";
$result = mysql_query($sql);
$lastid=mysql_insert_id();
//asignacion
$sql="INSERT INTO  cap_asignacion_doc (id_docente,id_aula) VALUES ('".$lastid."','".$id_seccion."')";
$result = mysql_query($sql);
$nombre="";
$apellidos="";
$dni="";
$email="";
}

//Listamos  While para editar
if($ide==3)
{

$result = mysql_query("SELECT * FROM  cap_docente WHERE id_docente='".$id_docente."'");
		 while ($row = mysql_fetch_row($result))
			{
			  $id_docente=$row[0];
			 	$dni=$row[1];
				$nombre=$row[2];
				$apellidos=$row[3];
				$email=$row[4];
				$sexo=$row[8];
				$id_seccion=aula($row[0]); 
				
     		}

}
/// Editamos+
if($bandera==1)

{

$sql="UPDATE cap_docente SET dni='$dni', nombre='$nombre', apellidos='$apellidos', email='$email', sexo='$sexo' WHERE id_docente='".$codigo_docente."'"; 
  mysql_query($sql);	
  
  $nombre="";
  $apellidos="";

$sql="UPDATE cap_asignacion_doc SET id_aula='$id_seccion' WHERE id_docente='".$codigo_docente."'"; 
  mysql_query($sql);	
   echo  '<script> alert("Datos Actualizados con Exito"); </script>';
}


//eliminar
if($ide==4 and $id_docente!=NULL)
{
$query="DELETE from cap_asignacion_doc WHERE id_docente='".$id_docente."'";
 $result=mysql_query($query);
 
$query="DELETE from cap_docente WHERE id_docente='".$id_docente."'";
 $result=mysql_query($query);

}

?>

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

<div class="cabecera"><br /><span class="titulo"> <?php echo $saludo.', '.utf8_encode($_SESSION["nombres"]); ?></span>
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
  <p><span class="titulo2">Docente -Secci&oacute;n</span><br />
  </p>
<hr />
 <form id="form1" name="form1" method="post" action="cap_aadd.php">
  <!-- full-name input-->
  <table width="700" border="0" cellpadding="2" cellspacing="2">
    <tr>
      <td align="left" valign="top"><label class="subtitu"> Asignaci&oacute;n de Docente</label></td>
      </tr>
    <tr>
      <td align="left" valign="top"><span class="texto1">Nombres&nbsp;&nbsp;<span class="texto2">
        <input name="nombre" type="text" class="texto1" id="nombre" value="<?php echo $nombre; ?>" size="40" />
      </span></span></td>
    </tr>
    <tr>
      <td align="left" valign="top"><span class="texto2">Apellidos&nbsp;&nbsp;
        <input name="apellidos" type="text" class="texto1" id="apellidos" value="<?php echo $apellidos; ?>" size="45" />
        <input name="id" type="hidden" class="style2" id="id" value="1" />
        <input name="bandera" type="hidden" class="style2" id="bandera" value="<?php echo $banderin; ?>" />
        <input name="codigo_docente" type="hidden" class="style2" id="codigo_docente" value="<?php echo $id_docente; ?>" />
      </span></td>
      </tr>
    <tr>
      <td align="left" valign="top" class="texto2">DNI&nbsp;&nbsp;
        <input name="dni" type="text" class="texto1" id="dni" value="<?php echo $dni; ?>" size="12" maxlength="8" /></td>
      </tr>
          <tr>
      <td align="left" valign="top" class="texto2">Email&nbsp;&nbsp;
        <input name="email" type="text" class="texto1" id="email" value="<?php echo $email; ?>" size="40" /></td>
      </tr>
    <tr>
      <td align="left" valign="top"><span class="texto2">Sexo&nbsp;&nbsp;
        <label>
          <select name="sexo" class="texto2" id="sexo">
            <option selected="selected">Seleccionar</option>
            <option value="M" <?php if($sexo=='M') { ?>selected="selected"<?php } ?> >Masculino</option>
             <option value="F" <?php if($sexo=='F') { ?>selected="selected"<?php } ?> >Femenino</option>
          </select>
        </label>
      </span></td>
      </tr>
    <tr>
      <td height="21" align="left" valign="top"><span class="texto1">Aula&nbsp;Asignada&nbsp;
          <select name="id_seccion" class="texto2" id="id_seccion">
          <option value="0" selected="selected">Seleccionar</option>
          <?php

            $result = mysql_query("SELECT * FROM  cap_seccion  order by id_seccion ASC LIMIT 32");
             while ($row = mysql_fetch_row($result))
                {
                   if ($id_seccion==$row[0]) 
                       { 
                           echo '<option value="'.$row[0].'" selected="selected">'.$row[1].'</option>'; 
                       }
                       
                        else
                        
                         { 
                            echo'<option value="'.$row[0].'">'.$row[1].'</option>';  
                         }
                }

          date_default_timezone_set('Etc/GMT+5');
         // $hora = getdate(time());
         // $hora1=  date($hora["hours"] . ":" . $hora["minutes"]); 
          //$hora2= date(($hora["hours"]+1) . ":" . ($hora["minutes"]-4)); 
          $hora1=date("HH:MM");
        ?>
        </select>
      </span></td>
      </tr>
          <tr>
      <td height="21" align="left" valign="top">&nbsp;</td>
      </tr>
    <tr>
      <td align="left" valign="top"><input type="submit" name="submit" value="  Guardar  "  onclick="return examen()"/></td>
    </tr>
    <tr>
      <td height="21" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="21" align="left" valign="top"><table width="720" border="0" align="center" cellpadding="1" cellspacing="1" style="border:thin;border: 1px solid #039">
       <tr bgcolor="#CCCCCC" >
              <td width="30" height="35" align="left" class="texto1"><strong>N°</strong></td>
              <td width="319" align="left" class="texto1"><strong>Nombre</strong></td>
              <td width="120" align="left" class="texto1">&nbsp;</td>
              <td width="116" align="center" class="texto1"><strong>Editar</strong></td>
              <td width="87" align="center" class="texto1"><strong>Eliminar</strong></td>
          </tr>
      <?php



$mysql="SELECT * FROM cap_docente order by id_docente DESC";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
$c=0;

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
              <td width="36" height="30" align="left" class="texto1"><?php echo $c; ?></td>
              <td width="472" align="left" class="texto1"><?php echo $row[2].' '.$row[3].' (Aula N° '.aula($row[0]).')'; ?></td>
              <td width="85" align="center">&nbsp;</td>
              <td width="72" align="center"><a href="cap_aadd.php?id_docente=<?php echo $row[0]; ?>&ide=3&banderin=1"><img src="fondos/editar.jpg" border="0" width="28px" height="28px"></a></td>
              <td width="52" align="center"><a href="cap_aadd.php?ide=4&id_docente=<?php echo $row[0];  ?>" onClick="return pregunta()"><img src="fondos/eliminar.jpg" border="0" width="28px" height="28px"></a></td>
          </tr>
<?php } ?>
     </table></td>
    </tr>
  </table>
   <p>&nbsp;</p>
  </form>
</div >
</div>
</body>


</html>
<?php
}
?>