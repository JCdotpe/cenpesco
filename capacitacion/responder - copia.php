<?php
include ("seguridad.php"); 
include("conexion.php");
$dni=$_SESSION["dni"];
error_reporting(E_ALL ^ E_NOTICE);
$id_examen=$_GET['id_examen'];
$titulo=$_GET['titulo'];

$id=$_POST['id'];
include("crud_respuesta.php"); 
 date_default_timezone_set('Etc/GMT+5');

 ///HORARIOS PROGRAMADOS.
 $anio=$_GET['anio'];
$mes=$_GET['mes'];
$dia=$_GET['dia'];
$hora=$_GET['hora'];
$minuto=$_GET['minuto'];

 $fecha=date("Y-m-d");
 $hora=time() +413;
 $hora=date("H:i:s",$hora);
 
$fecha_actual=date("Y-m-d H:i:s");
$fecha_futura=$anio.'-'.$mes.'-'.$dia.' '.$hora.':'.$minuto.':'.'00';
$tiempo=strtotime($fecha_futura) -strtotime($fecha_actual);

////----------------------------------------------------------------------
$mysql="SELECT * FROM cap_examen  WHERE id_examen='".$id_examen."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
if ($row = mysql_fetch_array($r))

{
$duracion=strtotime(date("Y-m-d").' '.$row[5].':00');
$titulo=$row[1];
$id_modulo=$row[2];
$id_examen=$row[0];
$hh_ini=$row[4];
$hh_fin=$row[5];

}

$autorizado=0;
//--------------------------------horarios de acceso
$inis=date($hh_ini.':00');
$finis=date($hh_fin.':00');

$inis= date("H:i:s", strtotime("$inis -6 minutes"));
$finis= date("H:i:s", strtotime("$finis +7 minutes"));
//echo 'fecha:'.$fecha.'=='.date($anio.'-'.$mes.'-'.$dia);
//echo ' hora_ini:'.$hora.'>='.$inis.' //  hora_fin:'.$hora.'<='.$finis;
if(date($fecha)==date($anio.'-'.$mes.'-'.$dia) and   $hora>=$inis   and  $hora<=$finis)
{
$autorizado=1;
}


//--------------------------------------------------
$fecha_ff=$anio.'-'.$mes.'-'.$dia.' '.$hh_fin.':00';
$fecha_aa=date("Y-m-d H:i:s");
$tiempo_examen=strtotime($fecha_ff) -strtotime($fecha_aa);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?php echo $titulo; ?></title>

<style type="text/css">

@import url("css/estilo.css"); 

	
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
     height: 100px;
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
	  font-family: Arial;

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

 <?php


$result = mysql_query("SELECT * FROM  regs WHERE dni='".$dni."' AND  estado='2'");
 while ($row = mysql_fetch_row($result))
{
 $id=$row[0];
 //$autorizado=1;
 $nombre=$row[10].' '.$row[8].' '.$row[9];

}

///acceso a preguntas

 ?>
<!--/.CABECERA PRINCIPAL-->
<div id="gaia1"><span class="titulo1"><b><?php echo $titulo;  ?></b></span><br/>
<div id="reloj1" class="titulo1"> </div>
 <br/><span class="subtitulo"><b> <?php echo $nombre;  ?></b></span>
</div>

<div id="tabla">

<?php

    
if($autorizado==1)
 {
?>

<form action="recepcion.php" name="form1" id="form1" method="post">
   <table width="680" border="0" cellpadding="3" cellspacing="1">
    <?php
    
     $mysql="SELECT e.id_examen, e.titulo, e.fecha, e.hora_ini, e.hora_fin, p.id_pregunta, p.pregunta, p.r1, p.r2, p.r3, p.r4, p.r5, p.puntaje, p.respuesta FROM cap_examen AS e INNER JOIN cap_pregunta AS p on(e.id_examen=p.id_examen) WHERE  p.id_examen='".$id_examen."' ORDER BY RAND()";  
    $r=mysql_query($mysql) or die ("No se puede hacer consulta");
    $c=0;

     while ($row = mysql_fetch_array($r))
     {
      $c=$c+1;

    ?>
    <tr>
       <td align="left"><b><?php echo $c.'.  '.$row[6]; ?>
    </tr>
    <tr>
       <td align="left" valign="middle" class="subtitulo1"><?php echo 'A) '.$row[7];  ?>&nbsp;<input type="radio" name="re[<?php echo $c; ?>]" id="re<?php echo $c; ?>" value="A" style="width:45px;height:45px;border: 2px solid #b71;"/></td>
    </tr>

    <tr>
       <td align="left" valign="middle" class="subtitulo1"><?php echo'B) '.$row[8];  ?>&nbsp;<input type="radio" name="re[<?php echo $c; ?>]" id="re<?php echo $c; ?>" value="B" style="width:45px;height:45px;border: 2px solid #b71;"/></td>
    </tr>

    <tr>
       <td align="left" valign="middle" class="subtitulo1"><?php echo'C) '.$row[9];  ?>&nbsp;<input type="radio" name="re[<?php echo $c; ?>]" id="re<?php echo $c; ?>" value="C" style="width:45px;height:45px;border: 2px solid #b71;"/></td>
    </tr>

    <tr>
       <td align="left" valign="middle" class="subtitulo1"><?php echo'D) '.$row[10];  ?>&nbsp;<input type="radio" name="re[<?php echo $c; ?>]" id="re<?php echo $c; ?>" value="D" style="width:45px;height:45px;border: 2px solid #b71;"/></td>
    </tr>

    <tr>
       <td align="left" valign="middle" class="subtitulo1"><?php echo'E) '.$row[11]; ?>&nbsp;<input type="radio" name="re[<?php echo $c; ?>]" id="re<?php echo $c; ?>" value="E" style="width:45px;height:45px;border: 2px solid #b71;"/></td>
    </tr>
    <input name="pe[<?php echo $c; ?>]" type="hidden"  id="pe<?php echo $c; ?>" value="<?php echo $row[5]; ?>" />
    <input name="pu[<?php echo $c; ?>]" type="hidden"  id="pu<?php echo $c; ?>" value="<?php echo $row[12]; ?>" />
    <input name="rc[<?php echo $c; ?>]" type="hidden"  id="rc<?php echo $c; ?>" value="<?php echo $row[13]; ?>" />
   <?php
      }

    if($c>0) 
    {
   ?>
    <input name="id_examen" type="hidden"  id="id_examen" value="<?php echo $id_examen; ?>" />
    <input name="dni" type="hidden"  id="dni" value="<?php echo $dni; ?>" />
        <input name="id" type="hidden"  id="id" value="<?php echo $id; ?>" />
     <input name="cantidad" type="hidden"  id="cantidad" value="<?php echo $c; ?>" />
      <input name="nombre" type="hidden"  id="nombre" value="<?php echo $nombre; ?>" />
      
   </table>
   <br><input name="submit" id="sa" type="submit" class="titulo1" value="  Guardar  " />
 
 </form> 
 <script language="javascript">
			
function formulario()
{
document.getElementById("form1").submit();
}

</script>
 
   <a href="javascript:formulario();" >sxasadsa</a>
 <?php
}
  }
  else
  {

  echo ' <br/><br/><span class="subtitulo1">Acceso restringido a cuestionarios de examenes. <a href="principal.php?id_modulo='.$id_modulo.'" class="subtitulo1">Haga clic aquí para regresar al Aula Virtual.</span>';
  }
 ?>
</div>

 <!--/.AREA DE TRABAJO-->
<script type="text/javascript" language="JavaScript"> 



            var contador=0;
			
            var actualiza = 1000;  
            var contador1=0;

            var capa = document.getElementById("reloj1");  

            var tempo="<?php echo $tiempo;  ?>";
            var tiempo="<?php echo $tiempo;  ?>";
           var tiempo_examen="<?php echo $tiempo_examen;  ?>";
		    var tempo_examen="<?php echo $tiempo_examen;  ?>";
            var duracion="<?php echo $duracion; ?>";
            var inicio="<?php echo strtotime($fecha_futura); ?>";




            function faltan()



              { 


        if (tempo> 0)

               { 
            
                //document.formulario.reloj.value= dias + " dias : " + horas_s + " horas : " + minu + " minu : " + seg + " seg" ; 
                contador=contador+1;
                tempo=tiempo-contador
                tempore=tiempo-contador;

                var mes=Math.floor(tempore/2592000);
                 tempore= tempore-(mes*2592000);

                var dia=Math.floor(tempore/86400);
                  tempore=tempore-(dia*86400);

                var hora=Math.floor(tempore/3600);
                  tempore=tempore-(hora*3600);

                var minuto=Math.floor(tempore/60);
                    tempore=tempore-(minuto*60);

                var segundo=Math.floor(tempore/3600);



                  capa.innerHTML=mes+" meses "+dia+" dias "+hora+" horas "+minuto+" minutos "+tempore+" segundos"; 
                  
               }
               else
               
               { 

                contador=contador+1;
                tempo_examen=tiempo_examen-contador
                tempore=tiempo_examen-contador;

                var mes=Math.floor(tempore/2592000);
                 tempore= tempore-(mes*2592000);

                var dia=Math.floor(tempore/86400);
                  tempore=tempore-(dia*86400);

                var hora=Math.floor(tempore/3600);
                  tempore=tempore-(hora*3600);

                var minuto=Math.floor(tempore/60);
                    tempore=tempore-(minuto*60);

                var segundo=Math.floor(tempore/3600);



               capa.innerHTML="El examen culmina en "+hora+" horas "+minuto+" minutos "+tempore+" segundos"; 
			   
			  if(mes==0 && dia==0 && hora==0 && minuto==5 && tempore==0)
			     {
				   alert("Por favor envie su exámen, su tiempo está a punto de culminar");
			     }
			   
	          
	          if(mes==0 && dia==0 && hora==0 && minuto==0 && tempore==45)
			     {
				  
				 		    
				 }
				  
              // capa.innerHTML="Tiempo de espera agotado "+contador; 
               var cap1;
               //cap1=document.getElementById("cap");
              // cap1.style.display = "none";
               var cap2;
              // cap2=document.getElementById("acc");
              // cap2.style.display = "block";                            
               } 

             setTimeout("faltan()",actualiza);
             
            } 

            faltan();

  
</script>



 






  </body>
</html>


