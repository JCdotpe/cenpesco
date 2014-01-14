<?php
include ("seguridad.php"); 
ini_set('max_execution_time', 300);
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$id_examen=$_POST['id_examen'];
$titulo=$_POST['titulo'];
$dni=$_POST['dni'];
$cantidad=$_POST['cantidad'];
$id=$_POST['id'];
$nombre=$_POST['nombre'];


//include("crud_respuesta.php"); 
date_default_timezone_set('Etc/GMT+5');
///HORARIOS PROGRAMADOS.

$fecha=date("Y-m-d H:i:s");
$hora=time() +313;
$hora=date("H:i:s",$hora);

//datos de examen------------------------------------------------------------------------------------------
  $result = mysql_query("SELECT * FROM  cap_examen WHERE id_examen='".$id_examen."'");
  while ($row = mysql_fetch_row($result))
  {
    $id_modulo=$_SESSION["seccion"];
    $peso=$row[6];

  }
 
  //-----------------------------------------------------------------

///----------------------------Guardando  resultados del examen
// foreach($_GET as $k => $v) $arraypost[]="$k='$v'"; 
//}
//$sql="INSERT INTO $tabla SET ".implode(', ',$arraypost); 
////-------------------------Fin de guardado de resultados
function insertar($id_examen,$dni,$respuesta,$pregunta,$puntaje,$correcta,$fecha,$id,$cantidad,$sec)
{
  $n=0;
  $result = mysql_query("SELECT COUNT(id_resultado) FROM  cap_resultado WHERE id_examen='".$id_examen."' AND  dni='".$dni."'");
  while ($row = mysql_fetch_row($result))
  {
    $contador=$row[0];
  }

if($contador<$cantidad)

{
$sql="INSERT INTO  cap_resultado (id_examen,id_pregunta,dni,respuesta_r,respuesta_c,puntaje,fecha,id,id_seccion) VALUES ('".$id_examen."','".$pregunta."','".$dni."','".$respuesta."','".$correcta."','".$puntaje."','".$fecha."','".$id."','".$sec."')";
$result = mysql_query($sql);
}


}

//foreach ($_POST['re'] as $respuesta, $_POST['pe'] as $pregunta, $_POST['pu'] as $puntaje, $_POST['rc'] as $correcta)
//{ 
   // echo $respuesta.'/'.$pregunta.'/'.$puntaje.'/'.$correcta."<br>"; 
//}  
for($i=1; $i<=$cantidad; $i++) {


insertar($id_examen,$dni,$_POST['re'][$i],$_POST['pe'][$i],$_POST['pu'][$i],$_POST['rc'][$i],$fecha,$id,$cantidad,$_SESSION["seccion"]);
// echo $id_examen.'/'.$dni.'/'.$_POST['re'][$i].'/'.$_POST['pe'][$i].'/'.$_POST['pu'][$i].'/'.$_POST['rc'][$i]."<br>"; 
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
          padding-left: 5px;
          padding-right: 5px;
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

      moz-border-radius: 10px 10px 10px 10px;
      /*para Safari y Chrome*/
      webkit-border-radius: 10px 10px 10px 10px;
      /*para IE */
      behavior:url(border.htc);
      /* para Opera */
      border-radius: 10px 10px 10px 10px;
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

<body>


<!--/.CABECERA PRINCIPAL-->

<div id="gaia1"> 
<h3> 
<?php echo $titulo;  ?>
</h3>
<h4> 
  <?php echo $nombre.',  tu examen ha sido enviado exitosamente, para ver el resultado diríjase a la sección calificación -  <a href="principal.php">Volver a la página principal</a>';  ?>
</h4>
</div>

<div id="tabla">
  

</div>

<?php

function calificar($id_modulo,$id_examen,$dni,$peso,$p,$id)

{
  
  $n=0;
  $result = mysql_query("SELECT * FROM  cap_calificacion WHERE id_examen='".$id_examen."' AND  dni='".$dni."'");
  while ($row = mysql_fetch_row($result))
  {
    $n=1;
  }


if($n==0)
{
//echo $id_modulo.' / '.$id_examen.' / '.$dni.' / '.$peso.' / '.$p.' / '.$id;
$sql="INSERT INTO  cap_calificacion (dni,id_modulo,id_examen,nota,peso,id) VALUES ('".$dni."','".$_SESSION["seccion"]."','".$id_examen."','".$p."','".$peso."','".$id."')";
$result = mysql_query($sql);

}

}


//-------------------------------------------------------------------------- - - - - - - - - - -- - - - - - - -
 $p=0;

 $result = mysql_query("SELECT * FROM  cap_resultado WHERE id='".$id."' AND id_examen='".$id_examen."'");
 while ($row = mysql_fetch_row($result))
  {
 
  if($row[4]==$row[5])
  {
   $p=$p+$row[6];
  }

  
  }
  
 calificar($_SESSION["seccion"],$id_examen,$dni,$peso,$p,$id);

 ?>

 <!--/.AREA DE TRABAJO-->

 





  </body>
</html>


