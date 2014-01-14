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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
if($_SESSION["tipo"]==1)
{
?>

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
//$result = mysql_query("SELECT * FROM  cap_modulo WHERE estado='1'");
		// while ($row = mysql_fetch_row($result))
			//{
             // $cad=$cad.' | <a href="principal.php?id_modulo='.$row[0].'">'.$row[1].'</a>';
			//}

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
  <p>&nbsp;</p>
  <p><span class="titulo2">Aula Virtual<a href="agregar_notas.php" class="titulo2"></a></span><br />
  </p>
  <hr />
  <table width="708" border="0" cellpadding="6" cellspacing="0">
    <tr>
      <td width="696" align="left" valign="middle" ><span class="titulo3">1. Reporte de Notas General: </span><span class="title"><a href="report1.php" target="_blank" class="title">Ver</a> | <a href="report1_excel.php">Descargar</a></span></td>
      </tr>
      <?php  

			
	  
	  ?>
    <tr>
      <td align="left" valign="middle" class="subtitulo"><form action="report2.php" method="get" name="form1" target="_blank" id="form1">
        <span class="titulo3">2. Reporte de Notas por Departamento:</span><span class="titulo3"> </span><span class="controls">
        <select name="cod_dep" id="cod_dep">
          <option value="0" selected="selected">Seleccionar</option>
          <?php

            $result = mysql_query("SELECT * FROM  regs GROUP BY nom_dep DESC");
             while ($row = mysql_fetch_array($result))
                {
                   if ($cod_dep==$row[0]) 
                       { 
                           echo '<option value="'.$row['cod_dep'].'" selected="selected">'.$row['nom_dep'].'</option>'; 
                       }
                       
                        else
                        
                         { 
                            echo '<option value="'.$row['cod_dep'].'" selected="selected">'.$row['nom_dep'].'</option>'; 
                         }
                }

          date_default_timezone_set('Etc/GMT+5');
         // $hora = getdate(time());
         // $hora1=  date($hora["hours"] . ":" . $hora["minutes"]); 
          //$hora2= date(($hora["hours"]+1) . ":" . ($hora["minutes"]-4)); 
          $hora1=date("HH:MM");
        ?>
        </select>
        </span>
        <label>
          <input type="submit" name="button" id="button" value="GENERAR" />
        </label>
        <label>
          <input name="dep" type="hidden" id="dep" value="1" />
        </label>
      </form></td>
      </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo"><form action="report3.php" method="get" name="form2" target="_blank" id="form2">
        <span class="titulo3">3. Reporte de Notas por Aulas:</span>
        <label>
          <select name="sec" id="sec">
            <option>Seleccionar</option>
            <option value="1">Aula 1</option>
            <option value="2">Aula 2</option>
            <option value="3">Aula 3</option>
            <option value="4">Aula 4</option>
            <option value="5">Aula 5</option>
            <option value="6">Aula 6</option>
            <option value="7">Aula 7</option>
            <option value="8">Aula 8</option>
          </select>
        </label>
        <input type="submit" name="button2" id="button2" value="GENERAR" />
        <input name="dep" type="hidden" id="dep" value="1" />
      </form></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo"><form action="report4.php" method="get" name="form1" target="_blank" id="form3">
        <span class="titulo3">4. Reporte de Notas por ODEI:</span><span class="titulo3"> </span><span class="controls">
        <select name="cod_odei" id="cod_odei">
          <option value="0" selected="selected">Seleccionar</option>
          <?php

            $result = mysql_query("SELECT * FROM  regs GROUP BY nom_odei ASC");
             while ($row = mysql_fetch_array($result))
                {
                   if ($cod_dep==$row[0]) 
                       { 
                          echo '<option value="'.$row['cod_odei'].'" selected="selected">'.$row['nom_odei'].'</option>'; 
                       }
                       
                        else
                        
                         { 
                             echo '<option value="'.$row['cod_odei'].'" selected="selected">'.$row['nom_odei'].'</option>'; 
                         }
                }

          date_default_timezone_set('Etc/GMT+5');
         // $hora = getdate(time());
         // $hora1=  date($hora["hours"] . ":" . $hora["minutes"]); 
          //$hora2= date(($hora["hours"]+1) . ":" . ($hora["minutes"]-4)); 
          $hora1=date("HH:MM");
        ?>
        </select>
        </span>
        <label>
          <input type="submit" name="button3" id="button3" value="GENERAR" />
        </label>
        <label>
          <input name="dep" type="hidden" id="dep" value="1" />
        </label>
      </form></td>
    </tr>
      
      <?php
	 
	  ?>
  </table>
</div >
</div>
</body>


</html>