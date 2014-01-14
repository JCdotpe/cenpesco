<?php include ("seguridad.php");
@$cid=$_GET['cid'];
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


$tit=$_GET['tit'];
if($tit==NULL)
{
$tit=$_POST['tit'];
}

$id_examen=$_POST['id_examen'];;

if($id_examen!=NULL)
{
$examen1=$id_examen;
}
else
{
$examen1=$_GET['examen'];
}
$pregunta=$_POST['pregunta'];
$id=$_POST['id'];
$r1=$_POST['r1'];
$r2=$_POST['r2'];
$r3=$_POST['r3'];
$r4=$_POST['r4'];
$r5=$_POST['r5'];

$puntaje=$_POST['puntaje'];
$respuesta=$_POST['respuesta'];
$bandera=$_POST['bandera'];

$codigo_pregunta=$_POST['codigo_pregunta'];
$ide=$_GET['ide'];
$id_pregunta=$_GET['id_pregunta'];
$codigo=$_GET['codigo'];

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
//return $ds.' '.$dia.' de '.$m.' de '.$anio;
//return $ds.'  '.$dia.' de '.$m;
}

//  Creamos preguntas
//echo $pregunta.'/'.$r1.'/'.$puntaje.'/'.$respuesta.'/'.$bandera.'/'.$examen1;
if($pregunta!='' and $r1!=NULL and $puntaje!='' and $respuesta!='' and $bandera==4)
{ 


$sql="INSERT INTO  cap_pregunta (pregunta,r1,r2,r3,r4,r5,id_examen,puntaje,respuesta) VALUES ('".$pregunta."','".$r1."','".$r2."','".$r3."','".$r4."','".$r5."','".$examen1."','".$puntaje."','".$respuesta."')";
$result = mysql_query($sql);

$pregunta="";
$r1="";
$r2="";
$r3="";
$r4="";
$r5="";
$puntaje="";
$respuesta="";


$mensaje=1;
$mensaje2='Se ha guardado exitosamente la información | <a href="preguntas.php">Ingresar una nueva pregunta</a>';

}

///--------------------------------------------------------------------
//Mostramos datos CENSO
if($id_pregunta!=NULL and $ide==1)
{

$mensaje1="Editando las preguntas de la evaluación en línea";

$result = mysql_query("SELECT * FROM  cap_pregunta WHERE id_pregunta='".$id_pregunta."'");

		 while ($row = mysql_fetch_row($result))
			{
			    $id_pregunta=$row[0];
			 	$pregunta=$row[1];
				$r1=$row[2]; 
				$r2=$row[3];
				$r3=$row[4];
				$r4=$row[5];
				$r5=$row[6];
				$id_examen=$row[7];
				$puntaje=$row[8];
				$respuesta=$row[9];

		
				          
     		}
  $bandera=1;
}



///ACTUAlizamos datos
//echo $bandera.'/'.$ide.'/'.$codigo_pregunta;
if($bandera==NULL and $ide==NULL and $codigo_pregunta!=NULL)

{

  $sql="UPDATE cap_pregunta SET pregunta='$pregunta', r1='$r1', r2='$r2', r3='$r3', r4='$r4', r5='$r5', puntaje='$puntaje', respuesta='$respuesta'  WHERE id_pregunta='".$codigo_pregunta."'"; 
  mysql_query($sql);
  $mensaje2='Se ha modificado exitosamente la información  | <a href="preguntas.php">Ingresar una nueva pregunta</a>';
  
  $pregunta="";
  $r1="";
  $r2="";
  $r3="";
  $r4="";
  $r5="";
  $puntaje="";

}

// ELIMINAR DATOS
  if($codigo!=NULL)

{ 

   $query="DELETE from cap_pregunta  WHERE id_pregunta='".$codigo."'";
   $result=mysql_query($query);
   $mensaje2='Se ha eliminado exitosamente el registro | <a href="preguntas.php">Ingresar una nueva pregunta</a>';

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
  <p><span class="titulo2"><a href="crea_examen.php" class="titulo2">Lista de exámenes</a> | Lista de preguntas</span><br />
  </p>
<hr />
  <h2 class="subtitu">Banco de preguntas para el exámen de <?php echo $tit; ?> | <a href="adm_preguntas.php?cid=4&examen=<?php echo $examen1; ?>&tit=<?php echo $tit;  ?>">Nueva pregunta</a></h2>


<?php if($mensaje!=1) { ?>

<form action="adm_preguntas.php" method="post" name="form1" class="texto1" id="form1">
      <p>
        <!-- full-name input-->
        <span class="title">
        <?php if($cid==4) { echo "Listo para ingresar una nueva pregunta"; }  ?>
        </span>
      <ul class="preg">
<li class="preg">
 <label >Pregunta</label>
  <input name="pregunta" type="text" id="pregunta" value="<?php echo $pregunta; ?>" size="65" >
</li>
<li class="preg">
 <label > Alternativa A</label>
  <input name="r1" type="text" id="r1" value="<?php echo $r1; ?>" size="50" >
</li>
<li class="preg">
 <label > Alternativa B</label>
 <input name="r2" type="text" id="r2" value="<?php echo $r2; ?>" size="50" />
</li>
<li class="preg">
<label >Alternativa C</label>
 <input name="r3" type="text" id="r3" value="<?php echo $r3; ?>" size="50" >
 </li>
 <li class="preg">
<label > Alternativa D</label>
<input name="r4" type="text" id="r4" value="<?php echo $r4; ?>" size="50" >
</li>
<li class="preg">
 <label >Alternativa E</label>
 <input name="r5" type="text" id="r5" value="<?php echo $r5; ?>" size="50" >
 </li>
 <li class="preg">
 <label >Puntaje</label>
 <input name="puntaje" type="text" id="puntaje" value="<?php echo $puntaje; ?>" size="12" />
 </li>
 <li class="preg">
 <label for="respuesta"></label>
        Respuesta  
        <select name="respuesta" class="preg" id="respuesta">
          <option value="" selected="selected" >Seleccionar</option>
          <option value="A" <?php if($respuesta=='A') {  ?>selected="selected" <?php } ?> >Alternativa A</option>
          <option value="B" <?php if($respuesta=='B') {  ?>selected="selected" <?php } ?> >Alternativa B</option>
          <option value="C" <?php if($respuesta=='C') {  ?>selected="selected" <?php } ?> >Alternativa C</option>
          <option value="D" <?php if($respuesta=='D') {  ?>selected="selected" <?php } ?> >Alternativa D</option>
          <option value="E" <?php if($respuesta=='E') {  ?>selected="selected" <?php } ?> >Alternativa E</option>
        </select>
 </li>
 <li>       
        <input name="bandera" type="hidden" id="bandera" value="<?php echo $cid; ?>" />
      </p><input name="tit" type="hidden" id="tit" value="<?php echo $tit; ?>" />
      <p><input type="submit" name="submit" value="  Guardar  "  onclick="return cap4()"/></p>
          <input name="codigo_pregunta" type="hidden" id="codigo_pregunta" value="<?php echo $id_pregunta; ?>" />
          <input name="id_examen" type="hidden" id="id_examen" value="<?php echo $examen1; ?>" />
</li>
</ul>
 </form>

<?php

 } 
 else
 {
   //echo '<br><br><br><br><h4>'.$mensaje2.'</h4>';
 }

 ?>
<HR width=70% style="color:#F60" align="left"> 
   <div >
   <table width="680" border="0" cellpadding="2" cellspacing="0">
     <tr>
       <td><img src="fondos/preg.jpg">&nbsp;&nbsp;<span class="subtitulo1"><?php // echo $tit.''; ?></span></td>
     </tr>
    <?php
    $mysql="SELECT * FROM cap_pregunta  WHERE id_examen='".$examen1."' ORDER BY id_pregunta  DESC";  
    $r=mysql_query($mysql) or die ("No se puede hacer consulta");
    $c=0;

     while ($row = mysql_fetch_array($r))
     {
      $c=$c+1;

    ?>
    <tr>
       <td><br /><span class="texto1"><b><?php echo $c.'.  '.$row[1].' ('.$row[8].' Ptos.) &nbsp;&nbsp; | <a href="adm_preguntas.php?id_pregunta='.$row[0].'&ide=1&examen='.$examen1.'&tit='.$tit.'">Editar</a> | <a href="adm_preguntas.php?codigo='.$row[0].'&examen='.$examen1.'&tit='.$tit.'" onclick="return pregunta()">Eliminar'; ?></b>
       </span></tr>
    <tr>
       <td><span class="texto1"><?php echo 'A) '.$row[2];  ?></span></td>
    </tr>

    <tr>
       <td><span class="texto1"><?php echo'B) '.$row[3];  ?></span></td>
    </tr>

    <tr>
       <td><span class="texto1"><?php echo'C) '.$row[4];  ?></span></td>
    </tr>

    <tr>
       <td><span class="texto1"><?php echo'D) '.$row[5];  ?></span></td>
    </tr>

    <tr>
       <td><span class="texto1"><?php echo'E) '.$row[6]; ?></span></td>
    </tr>

     <?php
      }

     ?>
   </table>
   </div>

 


</div >
</div>
</body>


</html>
<?php
}
?>