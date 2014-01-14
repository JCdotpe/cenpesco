<?php include ("seguridad.php");
ini_set('max_execution_time', 300);
if($_SESSION["tipo"]==1)
{
	

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
$id_examen=$_POST['id_examen'];

//guardar notas
if($bandera==1 and $id_examen!=NULL and $cantidad!=NULL)
{
	
//funcion guardar
function insertar($dni,$id_examen,$nota,$peso,$id)
{
$id_modulo=$_SESSION["seccion"];
$sql="INSERT INTO  cap_calificacion (dni,id_modulo,id_examen,nota,peso,id) VALUES ('".$dni."','".$id_modulo."','".$id_examen."','".$nota."','".$peso."','".$id."')";
$result = mysql_query($sql);

}
	
	
for($i=1; $i<=$cantidad; $i++) {

insertar($_POST['dni'][$i],$id_examen,$_POST['nota'][$i],$peso,$_POST['id'][$i]);

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
$result = mysql_query("SELECT * FROM  cap_calificacion WHERE id_examen='".$id_examen."' AND id_modulo='".$_SESSION["seccion"]."'");
while ($row = mysql_fetch_row($result))
{
	
$flag=1;
$men="Ya existen notas registradas para este examen";
}


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
  <p>&nbsp;</p>
  <p><span class="titulo2"> Ingresar notas de evaluaciones | <a href="edit_calificacion.php" class="titulo2">Regresar</a></span><br />
  </p>
  <hr />
  <table width="800" border="0" cellpadding="1" cellspacing="1">
    <tr>
      <td><form id="form2" name="form2" method="post" action="agregar_notas.php">
        <span class="subtitulo1">Seleccionar un examen</span>
        <select name="id_examen" class="texto2" id="id_examen" onchange="this.form.submit()">
          <option value="0" selected="selected">Seleccionar</option>
          <?php

            $result = mysql_query("SELECT * FROM  cap_examen WHERE tipo<>'1' and tipo<>'2' order by fecha  ASC LIMIT 100");
             while ($row = mysql_fetch_row($result))
                {
                   if ($id_examen==$row[0]) 
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
      </form></td>
    </tr>
    <tr>
      <td><form id="form1" name="form1" method="post" action="agregar_notas.php">
        <!-- full-name input-->
       <table width="700" border="0" cellpadding="1" cellspacing="0">
          <tr>
            <td align="left" valign="top"><label class="aviso"> <strong><?php echo $men;?></strong></label></td>
          </tr>
          <?php if($flag==0) {  ?>
          <tr>
            <td height="20" align="left" valign="top" class="texto1"><table width="637" border="0" cellpadding="1" cellspacing="0" style="border:thin;border: 1px solid #99FFCC">
              <tr>
                <td width="418" align="left" class="title">APELLIDOS Y NOMBRES</td>
                <td width="100" align="left" class="title">DNI</td>
                <td width="111" align="center" class="title">CALIFICAR</td>
              </tr>
<?php




if($id_examen!=NULL and $flag==0 and $id_examen!=0)
{ 

$result = mysql_query("SELECT * FROM  cap_examen WHERE id_examen='".$id_examen."'");
 if ($row = mysql_fetch_row($result))
 {
  $peso=$row[6];
  $tipo=$row[5];
 }
				

$c=0;
$sql="SELECT a.id_alumno, r.dni, r.ap_paterno, r.ap_materno, r.nombre1, r.nombre2 FROM cap_asignacion_alu AS a INNER JOIN regs AS r on(a.id_alumno=r.id) WHERE  a.id_aula='".$_SESSION["seccion"]."' ORDER BY r.ap_paterno ASC";  
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
                <td align="left" class="texto1"><?php echo $c.'. '.utf8_encode(strtoupper($row[2].' '.$row[3].' '.$row[4].' '.$row[5])); ?>                  
                  <input name="id[<?php echo $c; ?>]" type="hidden" id="id<?php echo $c; ?>" value="<?php echo $row[0]; ?>" />
                  </td>
                <td align="left" class="texto1"> <?php echo $row[1]; ?>
                  <input name="dni[<?php echo $c; ?>]" type="hidden" id="dni<?php echo $c; ?>" value="<?php echo $row[1]; ?>" /></td>
                <td align="center"><label>
                  <input name="bandera" type="hidden" id="bandera" value="1" />
                  <input name="nota[<?php echo $c; ?>]" type="text" id="nota<?php echo $c; ?>"  size="6" maxlength="5" />
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
            <td height="38" align="center" valign="middle" class="texto1">
            <input name="id_examen" type="hidden" id="id_examen" value="<?php echo $id_examen; ?>" />
             <input name="peso" type="hidden" id="peso" value="<?php echo $peso; ?>" />
              <input name="tipo" type="hidden" id="tipo" value="<?php echo $tipo; ?>" />
               <input name="cantidad" type="hidden" id="cantidad" value="<?php echo $c; ?>" />
            <label>
              <input name="button" type="submit" class="subtitu" id="button" value=" Guardar " />
            </label></td>
          </tr>
          <?php } ?>
          <tr>
            <td height="38" align="left" valign="middle" class="title">&gt;&gt;<a href="editar_notas.php?id_examen=<?php echo $id_examen;  ?>" class="title">Ver notas registradas <?php echo $exam;  ?></a></td>
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
}
?>