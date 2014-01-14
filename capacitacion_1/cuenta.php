<?php include ("seguridad.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("conexion.php");

//---roles   
   
include("roles.php");

//------------------


 
error_reporting(E_ALL ^ E_NOTICE);
$id_modulo=$_GET['id_modulo'];

$clave=$_POST['clave'];
@$descripcion=$_POST['descripcion'];
@$banderin= $_POST['banderin'];
@$archivo=$_POST['archivo'];
@$tamanio= $_POST['tamanio'];
$date=$_GET['date'];
date_default_timezone_set('Etc/GMT+5');
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

//7actualizar
if( $banderin==1)
{
	 ///borra imagen
if ($archivo!=NULL) 
{
	@$valor="fotos/".$_SESSION["dni"].".jpg";

	 @$file0_delete=$valor;

      if(unlink(@$file0_delete)) 
	 {
	 }
	 }
	
$path="fotos/"; 

if (isset($_FILES['archivo']['name']))
{ // si estoy subiendo el archivo o es la primera carga de la
$extensiones=array("JPG","jpg","JPEG","jpeg","npg","NPG"."GIF","gif");
// path adonde la voy a guardar, en este caso mi_ubicacion_actual/imagenes
	$nombre1=$_FILES['archivo']['name'];
	$tamanio=$_FILES['archivo']['size'];
	$tipo=$_FILES['archivo']['type'];
	$var = explode(".","$nombre1");
	$num = count($extensiones);
	$valor = $num-1;
	//$admitido=false;
	//echo $path;

	$tamanio=round($tamanio/1024,0); 
	} //redondeo y paso a kb 

	if ( $tamanio!="" or $tamanio!=NULL) {
	if($tamanio<=100000) {

	for($i=0; $i<=$valor; $i++) {
	    if($extensiones[$i] == $var[1]) {        
			$admitido=true;//es una extension valida
			break;

			}

	    }

	}
	}
//guardamos datos
if($descripcion!='' and $_SESSION["tipo"]==NULL)
{
$sql="UPDATE cap_administrador SET descripcion='$descripcion' WHERE dni = '".$_SESSION["dni"]."'"; 	
	
}

if($descripcion!='' and $_SESSION["tipo"]==1)
{
$sql="UPDATE cap_docente SET descripcion='$descripcion' WHERE dni = '".$_SESSION["dni"]."'"; 	
	
}
if($clave!='')
{
$pass=$clave;
$clave=md5($clave);

if($_SESSION["tipo"]==2)
{
$sql="UPDATE regs SET clave='$clave' WHERE dni = '".$_SESSION["dni"]."'"; 
}

if($_SESSION["tipo"]==1)
{
$sql="UPDATE cap_docente SET clave='$clave' WHERE dni = '".$_SESSION["dni"]."'"; 
}

if($_SESSION["tipo"]==NULL)
{
$sql="UPDATE cap_administrador SET clave='$clave' WHERE dni = '".$_SESSION["dni"]."'"; 
}
//---------------------
$email='no-reply@inei.gob.pe';
$titu="Censo Nacional de Pesca Continental - Actualización de su información";
$asunto="Cambio de clave";
//$asunto="Consulta de ".$nombre;
$headers= "MIME-Version: 1.0\r\n";
$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.= "From: " .$titu. " <" .$email. ">\r\n";
$headers.= "Reply-To: " .$email. "\r\n";
$headers.= "Return-path: " .$email. "\r\n"; 

$message="Estimado ".$_SESSION["nombres"].",<br><br>Se ha actualizado información de su cuenta en el Aula Virtual del Proyecto de Censo Nacional de Pesca Continental<br><br> <b>Información sobre el acceso al Aula virtual:</b> <br><br>N° de DNI: ".$_SESSION["dni"]." <br><br>Clave: ".$pass."<br><br>Fecha y hora: ". diasem(date("Y-m-d")).' '.date("H:m.s").'Horas.<br><br><a href="http://cenpesco.e-proyectos.org">Censo Nacional de Pesca Continental</a><br><br><img src="http://iinei.inei.gob.pe/iinei/microdatos/imagenes/LogoIneiD.gif" width="260" height="162">';
 //mail("lunamor_87z@hotmail.com",$asunto,$message,$headers);
/// mail($_SESSION["email"],$asunto,$message,$headers);
}
 


$result = mysql_query($sql);

 // $result = mysql_query($sql);
 if (@$admitido){

       //$lastid=mysql_insert_id();

		$path.=$_SESSION["dni"].".jpg"; 

		///////

		if (is_uploaded_file($_FILES['archivo']['tmp_name']) )

		 {

			  copy($_FILES['archivo']['tmp_name'], "$path"); //	
echo $path;
			} 

 }
 

	 
	 }

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aula Virtual de Capacitaci&oacute;n</title>
<style type="text/css">
@import url("css/estilo.css"); 
</style>

</head>

<body>
<script>
function formulario()
{
	
if(document.form1.clave.value != "" )
{
if(document.form1.clave.value != document.form1.clave1.value)
{
 alert("La clave  no coincide, escriba correctamente la clave en los dos campos");
 document.form1.clave1.focus();
 return false;
}
}
else
{
 return true;	
}
}
</script>
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

<div class="cabecera"><span class="titulo"><br /> <?php echo $saludo.', '.($_SESSION["nombres"]); ?></span>
<span class="titulo"><br>
<strong>AULA VIRTUAL DEL PROYECTO DE CENSO DE PESCA CONTINENTAL DEL PERÚ</strong></span><br>
<table width="660" border="0" align="center" cellpadding="2" cellspacing="2">
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
  <p>
  <?php
 date_default_timezone_set('Etc/GMT+5');
$f_actual=date("Y-m-d");
$h_actual=date("H:i:s");
		 
//------------------mostrar datos

if($_SESSION["tipo"]==NULL)
{
$result = mysql_query("SELECT * FROM  cap_administrador WHERE dni='".$_SESSION["dni"]."'");
while ($row = mysql_fetch_row($result))
{
$nombres=$row[2];
$apellidos=$row[3];
$dni=$row[1];
$email=$row[4];
$descripcion=$row[6];
$clave=$row[5];
}
}

if($_SESSION["tipo"]==1)
{
$result = mysql_query("SELECT * FROM  cap_docente WHERE dni='".$_SESSION["dni"]."'");
while ($row = mysql_fetch_row($result))
{
$nombres=$row[2];
$apellidos=$row[3];
$dni=$row[1];
$email=$row[4];
$descripcion=$row[6];
$clave=$row[5];
}
}

if($_SESSION["tipo"]==2)
{
$result = mysql_query("SELECT * FROM  regs WHERE id='".$_SESSION["id"]."'");
while ($row = mysql_fetch_row($result))
{
$nombres=$row[12].' '.$row[13];
$apellidos=$row[10].' '.$row[11];
$dni=$row[1];
$sexo=$row[14];
$email=$row[26];
$departamento=$row[3];
$provincia=$row[7];
$distrito=$row[9];
$clave=$row[81];
}
}

        ?>
  <span class="subtitulo"><i><?php if(($archivo!=NULL or $clave!=NULL) and $banderin!=NULL) { echo "¡Su información se ha actualizado con éxito!"; } ?></i></span></p>
<form class="form1" name="form1" id="form1" action="cuenta.php" method="post" enctype="multipart/form-data">
    <ul>
       <li>
            <h2>Cuenta personal</h2>
       </li>
   <li class="texto2">
  <strong><span>Aviso:</span></strong><span style="width:500px"> La clave asignada inicialmente es su N&deg; de DNI, &eacute;sta debe cambiarlo por una clave personal, si a&uacute;n no lo ha hecho, </span>
   escriba una nueva clave en los campos &quot;Cambiar clave&quot; y &quot;Repetir clave&quot;; tambi&eacute;n, debe subir su foto para que pueda ser identificado f&aacute;cilmente. Para subir una foto haga clic en el bot&oacute;n &quot;Seleccionar un archivo&quot; en el campo &quot;Buscar foto&quot; (El tama&ntilde;o de la imagen no debe exceder 1Mb)</li>
       <li>
          <label for="name">Nombres:</label>
          <input name="nombres" type="text" class="texto1" id="nombres" value="<?php echo utf8_encode($nombres); ?>" size="40" readonly="readonly"   />
       </li>
       <li>
          <label for="name">Apellidos:</label>
           <input name="apellidos" type="text" class="texto1" id="apellidos" value="<?php echo utf8_encode($apellidos); ?>" size="45" readonly="readonly"   />
       </li>
        <li>
          <label for="name">DNI:</label>
          <input name="dni" type="text" class="texto1" id="dni" value="<?php echo $dni; ?>" size="15" readonly="readonly"  />
        </li>
        <?php  if($_SESSION["tipo"]==2) { ?>
        <li>
          <label for="name">Sexo:</label>
          <input name="sexo" type="text" class="texto1" id="sexo" value="<?php  if($sexo=='M') { echo "MASCULINO";} else { echo "FEMENINO"; } ?>" size="15" readonly="readonly"   />
        </li>       
       <li>
          <label for="name">Departamento:</label>
           <input name="departamento" type="text" class="texto1" id="departamento" value="<?php  echo utf8_encode($departamento); ?>" size="30" readonly="readonly"  />
       </li>
      <li>
          <label for="name">Provincia:</label>
           <input name="provincia" type="text" class="texto1" id="provincia" value="<?php  echo  utf8_encode($provincia); ?>" size="35" readonly="readonly"    />
       </li>
       <li>
          <label for="name">Distrito:</label>
           <input name="distrito" type="text" class="texto1" id="distrito" value="<?php echo   utf8_encode($distrito); ?>" size="35" readonly="readonly"   />
       </li>
    <?php  } ?>
       <li>
           <label for="email" > Correo electr&oacute;nico: </span></label>
          <input name="email" type="text" class="texto1" value="<?php  echo $email; ?>" size="40" readonly="readonly"  /><input name="banderin" type="hidden" class="style13" id="banderin" value="1" />
          <input name="usuario" type="hidden" id="usuario" value="<?php  echo $usuario; ?>" />
       </li>
 <?php  if($_SESSION["tipo"]==1) { ?>
        <li>
          <label for="name">Descripci&oacute;n:</label>
          <textarea name="descripcion" cols="50" rows="2" class="texto1" id="descripcion"><?php echo $descripcion; ?></textarea>
        </li>
   <?php  } ?>
       <li>
           <label for="website"><span class="label_obligatorio">  Cambiar clave:</span></label>
           <input name="clave" id="clave" type="password" class="texto1"  size="30" />
       </li>
     
     <li>
          <label for="email1"><span class="label_obligatorio">  Repetir clave: </span></label>
           <input name="clave1" id="clave1" type="password" class="texto1"  size="30" />
       </li>
       <li>
        <label for="website"><span class="label_obligatorio">  Buscar foto:</span></label>
        <input name="archivo" type="file" class="texto1" id="archivo"   />
        </li>
          <li>
          <button class="texto1" type="submit" onclick="return formulario()"><strong>Actualizar Informaci&oacute;n</strong></button>
        </li>
        <li> 
        <p align="left"><a href="vista_foto.php?usuario=<?php echo $_SESSION["dni"]; ?>&amp;id=2" target="_blank"><img src='vista_foto.php?usuario=<?php echo $_SESSION["dni"]; ?>&amp;id=3&rdz=<?php echo $aleatorio; ?>' border="0" alt="Mi foto" style="border:thin;border: 1px solid #0099FF"/></a></p></li>

    </ul>
</form>
</div >

</div>

</body>


</html>