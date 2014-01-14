<?php include ("seguridad.php");
ini_set('max_execution_time', 300);

	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);
$titulo=$_POST['titulo'];
$tipo=$_POST['tipo'];
$id=$_POST['id'];
$fecha=$_POST['fecha'];
$tipo=$_POST['tipo'];


$bandera=$_POST['bandera'];
$cantidad=$_POST['cantidad'];
$peso=$_POST['peso'];
$tipo=$_POST['tipo'];
//----------------------------------------
$id_examen=$_POST['id_examen'];
$cod_dep=$_POST['cod_dep'];


//$id_examen1=$_POST['id_examen'];

//guardar notas
if($bandera==1 and $id_examen!=NULL and $cantidad!=NULL)
{
	
//funcion guardar
function insertar($dni,$id_examen,$nota,$peso,$id,$calificacion)
{
//echo $nota.'/ '.$id_examen1.' /'.$id.' /'.$calificacion.'<br>';
$sql="UPDATE cap_calificacion SET nota='$nota' WHERE id='".$id."' AND id_examen='".$id_examen."' AND id_calificacion='".$calificacion."'"; 
mysql_query($sql);

}
	
	
for($i=1; $i<=$cantidad; $i++) {

insertar($_POST['dni'][$i],$id_examen,$_POST['nota'][$i],$peso,$_POST['id'][$i],$_POST['id_calificacion'][$i]);

}	
}

///--------comprobar alumnos asignado
$bnd=0;
$result = mysql_query("SELECT * FROM  cap_asignacion_alu");
while ($row = mysql_fetch_row($result))
{
$bnd=1;	
}
     
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
if($g==4) { $ds="Jueves"; } if($g==5) { $ds="Viernes"; }  if($g==6) { $ds="Sábado"; }
return $ds.' '.$dia.' de '.$m.' de '.$anio;
//return $ds.'  '.$dia.' de '.$m;
}


//Comprobamos Calificación 
$flag=0;
$men="Ingrese notas para este examen";
$result = mysql_query("SELECT * FROM  cap_calificacion WHERE id_examen='".$id_examen."'");
while ($row = mysql_fetch_row($result))
{
	
$flag=1;
$men="Ya existen notas registradas para este examen";
}

//////

$result = mysql_query("SELECT * FROM  cap_examen WHERE id_examen='".$id_examen."'");
while($row = mysql_fetch_row($result))
{
 $exam=$row[1];	
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
  <div class=panel>
       <table width="800" border="0" cellpadding="1" cellspacing="1">
      <tr>
      <td><form id="form1" name="form1" method="post" action="editar_notas_parcial.php">
        <!-- full-name input-->
        <table width="700" border="0" cellpadding="1" cellspacing="0">
          <tr>
            <td align="left" valign="top"><label class="aviso"> <strong></strong></label></td>
          </tr>
          
          <tr>
            <td height="20" align="left" valign="top" class="texto1"><table width="637" border="0" cellpadding="1" cellspacing="0" style="border:thin;border: 1px solid #99FFCC">
              <tr>
                <td width="418" align="left" class="title">APELLIDOS Y NOMBRES</td>
                <td width="100" align="left" class="title">DNI</td>
                <td width="111" align="center" class="title">NOTA</td>
              </tr>
<?php

function nom($dep)
{
$result = mysql_query("SELECT * FROM  regs WHERE cod_dep='".$dep."'");
 if ($row = mysql_fetch_row($result))
 {
  $nnmm=$row[3];
 }
 return $nnmm;
}
//echo $id_examen;

if($id_examen!=0)
{ 

$result = mysql_query("SELECT * FROM  cap_examen WHERE id_examen='".$id_examen."'");
 if ($row = mysql_fetch_row($result))
 {
  $peso=$row[6];
  $tipo=$row[5];
  $nexam=$row[1];
 }
				
echo 'Ha seleccionado '.$nexam.' del departamento de '.nom($cod_dep);
$c=0;
$sql="SELECT c.nota, c.id_examen, r.id, r.ap_paterno, r.ap_materno, r.nombre1, r.nombre2, r.dni, c.id_calificacion FROM cap_calificacion AS c INNER JOIN regs AS r on(c.id=r.id) WHERE   c.id_examen='".$id_examen."' AND r.cod_dep='".$cod_dep."' ORDER BY r.ap_paterno ASC";  
$result = mysql_query($sql);
while ($row = mysql_fetch_row($result))
 {
   $c=$c+1;
   if($c%2==0)
    {
	$color="#99FFCC";
	}
   else
    {
	$color="#FFFFFF";  
    }
?>
              <tr bgcolor="<?php echo $color; ?>">
                <td align="left" class="texto1"><?php echo $c.'. '.(strtoupper($row[3].' '.$row[4].' '.$row[5].' '.$row[6])); ?>                  
                  <input name="id[<?php echo $c; ?>]" type="hidden" id="id<?php echo $c; ?>" value="<?php echo $row[2]; ?>" />
                  <input name="id_calificacion[<?php echo $c; ?>]" type="hidden" id="id_calificacion<?php echo $c; ?>" value="<?php echo $row[8]; ?>" /></td>
                <td align="left" class="texto1"> <?php echo $row[7]; ?>
                  <input name="dni[<?php echo $c; ?>]" type="hidden" id="dni<?php echo $c; ?>" value="<?php echo $row[7]; ?>" /></td>
                <td align="center"><label>
                  <input name="bandera" type="hidden" id="bandera" value="1" />
                  <input name="nota[<?php echo $c; ?>]" type="text" id="nota<?php echo $c; ?>" value="<?php echo $row[0];  ?>"  size="5" maxlength="5" />
                </label></td>
              </tr>
              
<?php
   }
}
 ?>
            </table>
            
            </td>
          </tr>
          <tr>
            <td height="38" align="center" valign="middle" class="texto1"><input name="cod_dep" type="hidden" id="cod_dep" value="<?php echo $cod_dep; ?>" />
              <input name="id_examen" type="hidden" id="id_examen" value="<?php echo $id_examen; ?>" />
              <input name="cantidad" type="hidden" id="cantidad" value="<?php echo $c; ?>" />
            <label>
              <input name="button" type="submit" class="subtitu" id="button" value=" Guardar  " />
            </label></td>
          </tr>
          
          <tr>
            <td height="38" align="left" valign="middle" class="title">&nbsp;</td>
          </tr>
        </table>
        <table width="700" border="0" cellpadding="1" cellspacing="0">
          <tr> </tr>
          </table>
        <p>&nbsp;</p>
        </form></td>
      </tr>
  </table>
</div >
</div>
</body>


</html>
<?php

?>