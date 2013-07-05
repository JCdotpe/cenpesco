<?php include ("seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$id_modulo=$_GET['id_modulo'];
$date=$_GET['date'];


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

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aula Virtual de Capacitación</title>
<style type="text/css">
@import url("css/estilo.css"); 
</style>
</head>

<body>
<?php

if($_SESSION["sex"]=='F') { $saludo='Bienvenida'; }
if($_SESSION["sex"]=='M') { $saludo='Bienvenido'; }
$cad='';
$result = mysql_query("SELECT * FROM  cap_modulo WHERE estado='1'");
		 while ($row = mysql_fetch_row($result))
			{
              $cad=$cad.' | <a href="principal.php?id_modulo='.$row[0].'">'.$row[1].'</a>';
			}

?>
<div class="cuerpo">

<div class="cabecera"><br /><span class="titulo1"> <?php echo $saludo.', '.$_SESSION["nom"]; ?> </span>
<span class="titulo"><br>AULA VIRTUAL DEL PROYECTO DE CENSO DE PESCA CONTINENTAL DEL PERÚ</span><span class="subtitulo"><br><br>
<b>Seleccione Módulo: <?php echo $cad; ?></b></span> | </span><span class="subtitulo"><a href="salir.php" class="subtitulo"><b> Salir </b></a></span></div>

<div id="menuv">
<ul>
	<li ><span class="subtitulo" ><center><br>
	      <strong>Actividades en los días de capacitación</strong><br><br></center></span></li>
	<?php

	
    $result = mysql_query("SELECT * FROM  cap_modulo WHERE id_modulo='".$id_modulo."'");
		if ($row = mysql_fetch_row($result))
			{
              $fecha=$row[3];
              $fecha_fin=$row[4];
			}

$fecha_actual = date('Y-m-d'); 

while($fecha<=$fecha_fin)
{

if($fecha_actual!=$fecha)
{
echo '<li><a href="principal.php?id_modulo='.$id_modulo.'&date='.$fecha.'">'.diasem($fecha).'</a></li>';
}
else
{
echo '<li><span class="linked"><a href="principal.php?id_modulo='.$id_modulo.'&date='.$fecha.'"><b>'.diasem($fecha).'</b></a></span></li>';	
}

$fecha= date("Y-m-d", strtotime("$fecha +1 day"));

}

?>
</ul>
	
</div>

<div class=panel>
        <?php
          date_default_timezone_set('Etc/GMT+5');
         $f_actual=date("Y-m-d");
         $h_actual=date("H:i:s");
		 
		 if($date==NULL)
		 {
		  $date=date('Y-m-d');
		 }
          $mysql="SELECT * FROM cap_examen  WHERE fecha='".$date."' ORDER BY fecha ASC";  
          $r=mysql_query($mysql) or die ("No se puede hacer consulta");
          $c=0;

         echo '<br/>';
          while ($row = mysql_fetch_array($r))
                
                {
                 $titulo=$row[3];
                $fecha=$row[3];
                $horario=$row[4];
                $anio=substr($fecha,0,4);
                $mes=substr($fecha,5,2);
                $dia=substr($fecha,8,2);
                $hora=substr($horario,0,2);
                $minuto=substr($horario,3,2);

                   if($row[3]>=$f_actual)
                      {
                        $fecha=$row[3];
                            if($fecha==date("Y-m-d"))
                              {
                                $fecha="hoy";
								
								 $hh_aa=date($row[4].':00');
								 $hh_aa= date("H:i:s", strtotime("$hh_aa +15 minutes"));
								 
                                 if($h_actual<$hh_aa)
                                   {
                                    $c=$c+1;
                                  echo  '<span class="subtitulo" ><a href="responder.php?id_examen='.$row[0].'&anio='.$anio.'&mes='.$mes.'&dia='.$dia.'&hora='.$hora.'&minuto='.$minuto.'&titulo='.$titulo.'" class="subtitulo" ><b>'.$c.'. ACTIVIDAD PENDIENTE: '.$row[1].', '.$fecha.' a las '.$row[4].' hrs.</b></span><br/><br/>';  
                                   }
                              }
                             
                              else

                              {
                                $c=$c+1;
                                echo  '<span class="subtitulo" ><a href="responder.php?id_examen='.$row[0].'&anio='.$anio.'&mes='.$mes.'&dia='.$dia.'&hora='.$hora.'&minuto='.$minuto.'" class="subtitulo" ><b>'.$c.'. ACTIVIDAD PENDIENTE: '.$row[1].', '.$fecha.' a las '.$row[4].' hrs.</b></span><br/><br/>';  
                              }



                        }


                    }

  if($c==0) { echo '<br/><span class="subtitulo" style="margin-top:18px"><b>¡ No hay examen pendiente para este día !</b></span>'; }

        ?>
<br />
<hr />
<span class="title"><strong>Lista de manuales, formularios, presentaciones y otros documentos de capacitación: </strong></span>
<br />
	<ul>
    <?php
	$mysql="SELECT * FROM archivo   ORDER BY id_archivo ASC";  
    $r=mysql_query($mysql) or die ("No se puede hacer consulta");
    $c=0;
     while ($row = mysql_fetch_array($r))
      {
		  
	$tam=strlen($row[3]);
	$file=substr($row[3],($tam-3),3);
	if($file=="zip")  { $img="fondos/zip.png";  }
	if($file=="pdf")  { $img="fondos/pdf.png";  }
     if($file!="zip"  and $file!="pdf" )  { $img="fondos/file.png";  }
	?>
    <li>
     <a href="../sistema/<?php echo $row[3]; ?> " target="_blank"><img src="<?php echo $img; ?>" border="0" /></a> &nbsp;<span class="subtitulo"><strong><a href="../sistema/<?php echo $row[3]; ?> " target="_blank"><?php echo $row[1].'</a></strong><i> Fecha: '.$row[2].'</i>'; ?></span>
    </li>
    
    <?php
	
	  }
	 ?>
    </ul>

</div >

</div>

</body>


</html>