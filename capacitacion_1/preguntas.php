<?php
session_start();
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$idi=$_GET['idi']; 


if($idi!=NULL)
  {

  $_SESSION["examen"]=$_GET['examen'];
  $_SESSION["tit"]=$_GET['tit'];

  }
 
include("crud_preguntas.php"); 

?>

<!DOCTYPE html>
<html lang="sp">
  <head>
        <meta charset="utf-8">
    <title>PREGUNTAS DE  EXÁMENES</title>
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
              <li><a href="examenes.php">+ Evaluacion en Línea</a></li>
              <li><a href="lista_examenes.php">+ Lista exámenes</a></li>
                <li><a href="arhivo.php">+ Publicar archivos</a></li>


        <!--/.CABECERA PRINCIPAL-->
          </div>
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit" style="height:82px">
            <h2>Banco de preguntas para el exámen</h2>
                    En este módulo se creará el banco de preguntas para cada evaluación en línea</div>


        <!--/.AREA DE TRABAJO-->

        <!-- Address form -->

<?php if($mensaje!=1) { ?>

<h4><?php echo $mensaje1;  ?></h4>
<form id="form1" name="form1" method="post" action="preguntas.php">
  <!-- full-name input-->
<label class="control-label">Pregunta</label>
     <div class="controls">
         <input id="pregunta" name="pregunta" type="text" value="<?php echo $pregunta; ?>" placeholder="Título de la pregunta" class="input-xlarge">
     </div>

<label class="control-label">Alternativa A</label>
     <div class="controls">
         <input id="r1" name="r1" type="text" value="<?php echo $r1; ?>" class="input-xlarge">
     </div>

<label class="control-label">Alternativa B</label>
     <div class="controls">
         <input id="r2" name="r2" type="text" value="<?php echo $r2; ?>" class="input-xlarge">
     </div>

<label class="control-label">Alternativa C</label>
     <div class="controls">
         <input id="r3" name="r3" type="text" value="<?php echo $r3; ?>" class="input-xlarge">
     </div>
     
<label class="control-label">Alternativa D</label>
     <div class="controls">
         <input id="r4" name="r4" type="text" value="<?php echo $r4; ?>" class="input-xlarge">
     </div>

<label class="control-label">Alternativa E</label>
     <div class="controls">
         <input id="r5" name="r5" type="text" value="<?php echo $r5; ?>" class="input-xlarge">
     </div>

<label class="control-label">Puntaje</label>
     <div class="controls">
         <input id="puntaje" name="puntaje" type="text" value="<?php echo $puntaje; ?>" class="input-slarge">
     </div>

<label for="respuesta"></label>
<select name="respuesta" id="respuesta">
  <option value="" selected="selected" >Seleccionar</option>
  <option value="A" <?php if($respuesta=='A') {  ?>selected="selected" <?php } ?> >Alternativa A</option>
  <option value="B" <?php if($respuesta=='B') {  ?>selected="selected" <?php } ?> >Alternativa B</option>
  <option value="C" <?php if($respuesta=='C') {  ?>selected="selected" <?php } ?> >Alternativa C</option>
  <option value="D" <?php if($respuesta=='D') {  ?>selected="selected" <?php } ?> >Alternativa D</option>
  <option value="E" <?php if($respuesta=='E') {  ?>selected="selected" <?php } ?> >Alternativa E</option>
</select>

      <input name="bandera" type="hidden" id="bandera" value="<?php echo $bandera; ?>" />
          <p><input type="submit" name="submit" value="  Guardar  "  onclick="return cap4()"/></p>
          <input name="codigo_pregunta" type="hidden" id="codigo_pregunta" value="<?php echo $id_pregunta; ?>" />

 </form>

<?php

 } 
 else
 {
   echo '<br><br><br><br><h4>'.$mensaje2.'</h4>';
 }

 ?>
<HR width=70% style="color:#F60" align="left"> 
   <div >
   <table width="680" border="0" cellpadding="2" cellspacing="0">
     <tr>
       <td><img src="fondos/preg.jpg">&nbsp;&nbsp;<?php echo $_SESSION["tit"].''; ?></td>
     </tr>
    <?php
    $mysql="SELECT * FROM cap_pregunta  WHERE id_examen='".$_SESSION["examen"]."'";  
    $r=mysql_query($mysql) or die ("No se puede hacer consulta");
    $c=0;

     while ($row = mysql_fetch_array($r))
     {
      $c=$c+1;

    ?>
    <tr>
       <td><b><?php echo $c.'.  '.$row[1].' ('.$row[8].' Ptos.) &nbsp;&nbsp;&nbsp;&nbsp; | <a href="preguntas.php?id_pregunta='.$row[0].'&ide=1">Editar</a> | <a href="preguntas.php?codigo='.$row[0].'" onclick="return pregunta()">Eliminar'; ?>
    </tr>
    <tr>
       <td><?php echo 'A) '.$row[2];  ?></td>
    </tr>

    <tr>
       <td><?php echo'B) '.$row[3];  ?></td>
    </tr>

    <tr>
       <td><?php echo'C) '.$row[4];  ?></td>
    </tr>

    <tr>
       <td height="23"><?php echo'D) '.$row[5];  ?></td>
    </tr>

    <tr>
       <td><?php echo'E) '.$row[6]; ?></td>
    </tr>

     <?php
      }
     ?>
   </table>
   </div>

 

</div><!--/.fluid-container-->



  </body>
</html>


