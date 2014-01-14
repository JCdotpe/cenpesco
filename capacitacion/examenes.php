<?php
session_start();
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
include("crud_examen.php"); 

?>

<!DOCTYPE html>
<html lang="sp">
  <head>
        <meta charset="utf-8">
    <title>MÓDULO DE  EXÁMENES</title>
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

   
  <!--/.MENU PRINCIPAL-->
   <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Menú de Acciones</li>
              <li class="active"><a href="index.php">Proyecto Censal</a></li>
              <li><a href="capacitacion.php">+ Módulos de capacitación</a></li>
              <li><a href="examenes.php">+ Evaluación en línea</a></li>
              <li><a href="lista_examenes.php">+ Lista exámenes</a></li>
                <li><a href="archivo.php">+ Publicar archivos</a></li>

        <!--/.CABECERA PRINCIPAL-->
          </div>
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit" style="height:82px">
            <h2>Módulo de Capacitación / Exámenes</h2>
              En este módulo se creará las evaluaciones en línea por tema o sección</div>

        <!--/.AREA DE TRABAJO-->

        <!-- Address form -->

<?php if($mensaje!=1) { ?>

<h4><?php echo $mensaje1;  ?></h4>
<form id="form1" name="form1" method="post" action="examenes.php">
  <!-- full-name input-->

<label class="control-label">Seleccione un módulo</label>
 <div class="controls">
        <select name="id_modulo" id="id_modulo">
           <option value="0" selected="selected">Seleccionar</option>
       <?php

            $result = mysql_query("SELECT * FROM  cap_modulo  order by fecha_ini ASC LIMIT 10");
             while ($row = mysql_fetch_row($result))
                {
                   if ($id_modulo==$row[0]) 
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
 </div>

<label class="control-label">Título del exámen</label>
     <div class="controls">
         <input id="titulo" name="titulo" type="text" value="<?php echo $titulo; ?>" placeholder="Título del módulo" class="input-xlarge">
     </div>

  <label class="control-label">Fecha de exámen </label>
     <div class="calendario">
        <input type="text" id="fecha" name="fecha" value="<?php echo $fecha; ?>" readonly>
    </div>


<label class="control-label">Seleccione hora de inicio</label>
 <div class="controls">
        <select name="hora_ini" id="hora_ini">
           <option value="0" selected="selected">Seleccionar</option>
       <?php
            $result = mysql_query("SELECT * FROM  cap_horario  order by id_horario  ASC");
             while ($row = mysql_fetch_row($result))
                {
                   if ($hora_ini.'hrs.'==$row[1]) 
                       { 
                           echo '<option value="'.$row[1].'" selected="selected">'.$row[1].'</option>'; 
                       }
                       
                        else
                        
                         { 
                            echo'<option value="'.$row[1].'">'.$row[1].'</option>';  
                         }
                }
      ?>


       </select> 


<label class="control-label">Seleccione hora de culminación</label>
 <div class="controls">
        <select name="hora_fin" id="hora_fin">
           <option value="0" selected="selected">Seleccionar</option>
       <?php
            $result = mysql_query("SELECT * FROM  cap_horario  order by id_horario  ASC");
             while ($row = mysql_fetch_row($result))
                {
                   if ($hora_fin.'hrs.'==$row[1]) 
                       { 
                           echo '<option value="'.$row[1].'" selected="selected">'.$row[1].'</option>'; 
                       }
                       
                        else
                        
                         { 
                            echo'<option value="'.$row[1].'">'.$row[1].'</option>';  
                         }
                }
      ?>
       </select> 
 </div>
 <label class="control-label">Peso relativo del exámen en el módulo (Ingrese el valor respecto al 100%)</label>
     <div class="controls">
         <input id="peso" name="peso" type="text" value="<?php echo $peso; ?>" placeholder="Peso relativo" class="input-large" size="8" maxlength="3">&nbsp;%
     </div>
     <div class="controls">
         <input name="tipo" type="checkbox" id="tipo" value="1" />&nbsp;Este exámen no requiere de banco de preguntas
     </div><br/>
<input name="bandera" type="hidden" id="bandera" value="<?php echo $bandera; ?>" />
          <p><input type="submit" name="submit" value="  Guardar  "  onclick="return examen()"/></p>
          <input name="codigo_examen" type="hidden" id="codigo_examen" value="<?php echo $id_examen; ?>" />

 </form>

<?php

 } 
 else
 {
   echo '<br><br><br><br><h4>'.$mensaje2.'</h4>';
 }

 ?>
   <div id="Layer1" style="border-width:1px; border: 1px solid #A4A4A4; position:absolute;width:800px; top:770px; left:378px; height:200px; z-index:1; overflow: auto">
     <table width="780" border="0" align="center" cellpadding="2" cellspacing="1">
 
          <tr>
              <td width="38" height="30" align="left"><b>N°</b></td>
              <td width="351" align="left"><b>Título de exámen</b></td>
              <td width="319" align="left"><b>Fecha / Hora / Duración</b></td>
              <td width="39" align="center"><b>Preg</b></td>
              <td width="39" align="center"><b>Mod</b></td>
              <td width="39" align="center"><b>Elim</b></td>
          </tr>
    </table>
  </div> 
  <div id="Layer2" style="position:absolute;width:788px; top:800px;left:388px; height:166px; z-index:1; overflow: auto;" style="border:thin;border: 1px solid #0099FF"> 
    <table width="780" border="0" align="center" cellpadding="2" cellspacing="2">
      <?php

function modulo($modulo)
{
$mysql="SELECT * FROM cap_modulo WHERE id_modulo='".$modulo."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
$c=0;

if ($row = mysql_fetch_array($r))
 {
  $tit=$row[1];
 }
  return $tit;
}



$mysql="SELECT * FROM cap_examen order by id_examen ASC";  
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

 
    $a=$row[4];
    $b=$row[5];
    $hora= intval(substr($b,0,2)) - intval(substr($a,0,2));
    $minuto=intval(substr($b,3,2)) - intval(substr($a,3,2));
    if($minuto<0)
      {
       $hora=$hora-1; 
       $minuto=30; 
      } 

      if($hora==1) { $duracion=$hora.' hora '.$minuto.' minutos';   }  
       else
       {
        $duracion=$hora.' horas '.$minuto.' minutos';
       }

    
    ?>

          <tr bgcolor="<?php echo $color;  ?>" >
              <td width="35" height="30" align="left"><?php echo $c; ?></td>
              <td width="330" align="left"><?php echo $row[1].' de '.modulo($row[2]).' ('.$row[6].'%)&nbsp;&nbsp;|<a href="programacion.php?id_examen='.$row[0].'&pin=1&titulo='.$row[1].'"> Programación  </a>'; ?></td>
              <td width="310" align="left"><?php echo date("d-m-Y",strtotime($row[3])).'/'.$row[4].' hrs./'.$duracion; ?></td>
              <td width="35" align="center"><b><a href="preguntas.php?examen=<?php echo $row[0]; ?>&idi=1&tit=<?php echo $row[1]; ?>"><img src="fondos/examen.jpg" border="0" width="28px" height="28px"></a></b></td>
              <td width="35" align="center"><a href="examenes.php?id_examen=<?php echo $row[0]; ?>&ide=1"><img src="fondos/editar.jpg" border="0" width="28px" height="28px"></a></td>
              <td width="35" align="center"><a href="examenes.php?codigo=<?php echo $row[0]; ?>" onClick="return pregunta()"><img src="fondos/eliminar.jpg" border="0" width="28px" height="28px"></a></td>
          </tr>
          <?php } ?>
     </table>
   </div>

 

</div><!--/.fluid-container-->



  </body>
</html>


