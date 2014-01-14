<?php include ("seguridad.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>REPORTE GENERAL</title>
</head>
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$dep=$_GET['dep'];

date_default_timezone_set('Etc/GMT+5');
///HORARIOS PROGRAMADOS.
$sa=$_GET['sa'];
$sec=$_GET['sec'];
$fecha=date("Y-m-d H:i:s");
$hora=time() +313;
$hora=date("H:i:s",$hora);

//--------------------------------------------------------------------------------

$col=0;
$result = mysql_query("SELECT DISTINCT(id_examen) FROM  cap_calificacion");
 while ($row = mysql_fetch_row($result))
 {
    $col=$col+1;
 }

//Función mostrar nombre de capcitado

function regs($dni,$opcion)
{

$result = mysql_query("SELECT * FROM  regs WHERE dni='".$dni."'");
if ($row = mysql_fetch_row($result))
 {

  if($opcion==1)
    {
     $nombres=strtoupper($row[9].' '.$row[10].' '.$row[11].' '.$row[12]);
    }
  if($opcion==2)
    {
     $nombres=$row[3];
    }  

 }
 return utf8_encode($nombres);
}

//Función mostrar nombre de examen

function examen($id_examen)
{

$result = mysql_query("SELECT * FROM  cap_examen WHERE id_examen='".$id_examen."'");
if ($row = mysql_fetch_row($result))
 {

  $nombre=$row[1]. '('.$row[6].'%)';
 }
 return $nombre;
}

//Función mostrar nota de examen

function notas1($id_modulo,$dni)
{
$nombre='';
$ti=0;
$result = mysql_query("SELECT nota FROM  cap_calificacion WHERE   dni='".$dni."' ORDER BY id_examen ASC");


while ($row = mysql_fetch_row($result))
 {
  $ti=1;
  $nombre=$nombre.' <td align="center">'.$row[0].'</td>';
 }
 if($ti==0)
 {
 }
  return $nombre;
}

///-------------------FMN
function valor($d,$e)
{
$ti=0;
$result = mysql_query("SELECT * FROM cap_calificacion  WHERE dni='".$d."' AND  id_examen='".$e."'");
if($row = mysql_fetch_array($result))
 {	
 $ti=1;
 $nota=$row["nota"];
 }
 return $nota;
 
}

function notas($id_modulo,$dni)
{
$nombre='';
$result = mysql_query("SELECT * FROM cap_examen  ORDER BY id_examen ASC");
while ($row = mysql_fetch_row($result))
 {

  $valor=valor($dni,$row[0]);
  if($valor!=NULL)
 { 
  $n=' <td align="center">'.$valor.'</td>';
 } 
 else
 {
	$n='<td align="center">0</td>';	 
 }
 
 $nombre=$nombre.$n;
 
}

  return $nombre;
}


?>

<!DOCTYPE html>
<html lang="sp">
  <head>
        <meta charset="utf-8">
    <title><?php echo $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<!-- Le styles -->

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 10px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 0px;
          padding-right: 0px;
        }
      }


input.text { border-width:1px; } 
input.radio { border-width:0; } 


#gaia1{
      
     background-color:#CEE3F6; 
      margin-left:auto;
     margin-right:auto; 
     margin-right: 5px;
     margin-bottom: 5px;
     position:relative;
     height: 80px;
      width: 98%;
      padding: 10px;
      /*para Firefox*/
      margin:4px;
      text-align:center;

    }

    #tabla {
       margin-left:10px;
       margin-right:10px;
       text-align: left;
       font-family: Arial;
       font-size: 12;

    }



 </style>
 <link href="css/bootstrap-responsive.css" rel="stylesheet">
 <link href="css/bootstrap.spacelab.css" rel="stylesheet">
    
  <link  href="css/jquery.ui.all.css" rel="stylesheet">

<script src="js/jquery-1.6.2.js"></script>
<script src="js/jquery.ui.core.js"></script>
<script src="js/jquery.ui.widget.js"></script>
<script src="js/jquery.ui.datepicker.js"></script>
<script src="js/formularios.js"></script>
 
<script>

  $(function() 
  {
    $( "#fecha" ).datepicker();

  });

</script>

<body>


<!--/.CABECERA PRINCIPAL-->
<div id="tabla">
  <table width="1200" border="1" cellpadding="2" cellspacing="0">
<?php
 
?>

  <tr>
   <td width="40" align="left"><strong> N° </strong></td>
    <td width="220" align="left"><strong>Apellidos y Nombres</strong></td>
    <td width="180" align="center"><strong> Departamento</strong></td>
<?php

   // $result = mysql_query("SELECT DISTINCT(id_examen) FROM  cap_calificacion ORDER BY id_examen ASC");
     $result = mysql_query("SELECT * FROM  cap_examen ORDER BY id_examen ASC");
	 
     while ($row = mysql_fetch_array($result))
    {
?>
    <td width="180" align="center"><strong><?php echo utf8_decode($row["titulo"]); ?></strong></td>
<?php
     }
?>

    <td width="140" align="center"><strong>Promedio</strong></td>
  </tr>

<?php

//seccion
if($sec!=NULL)
{ 
$result = mysql_query ("SELECT dni,SUM(nota*peso),id_examen FROM  cap_calificacion WHERE id_modulo='".$sec."'  GROUP BY dni ORDER BY SUM(nota*peso) DESC");
}

$in=0;
$c=0;
while ($row = mysql_fetch_row($result))

{

$col=$col+1;

if($in!=$row[2])
{
$in=$row[2];
$color="#F2F9F7";
}
else
{
 $color="#FFFFFF"; 
}
$c=$c+1;

?>
  <tr bgcolor="<?php echo $color; ?>">
  <td><?php echo $c; ?></td>
    <td align="left"><?php echo utf8_decode(regs($row[0],1)); ?></td>
     <td align="center"><?php echo utf8_decode(regs($row[0],2)); ?></td>
    <?php echo notas($id_modulo,$row[0]);  ?>
    <td align="center"><?php echo number_format($row[1],2);  ?></td>
  </tr>
<?php

}


?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table></div>
<div>
<br/>
<strong>|<a href="report3_excel.php?sec=<?php echo $sec; ?>&nb=<?php echo $sec; ?>" target="_blank"> Reporte Excel</a> |</strong><br/>
</div>

 <!--/.AREA DE TRABAJO-->

 





  </body>
</html>


