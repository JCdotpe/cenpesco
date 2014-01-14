<?php include ("seguridad.php");
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
$titulo=$_POST['titulo'];
$tipo=$_POST['tipo'];
$id=$_POST['id'];
$fecha=$_POST['fecha'];
$tipo=$_POST['tipo'];
$hora_ini=$_POST['hora_ini'];
$hora_fin=$_POST['hora_fin'];
$id_modulo=$_POST['id_modulo'];
$bandera=$_POST['bandera'];
$peso=$_POST['peso'];
$codigo_examen=$_POST['codigo_examen'];
$ide=$_GET['ide'];
$id_examen=$_GET['id_examen'];
$codigo=$_GET['codigo'];


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
if($g==4) { $ds="Jueves"; } if($g==5) { $ds="Viernes"; }  if($g==6) { $ds="Sabado"; }
return $ds.' '.$dia.' de '.$m.' de '.$anio;
//return $ds.'  '.$dia.' de '.$m;
}

//creamos examen		 
if($titulo!='' and $hora_ini!=NULL and $hora_fin!='' and $hora_ini!='' and $bandera==NULL)
{ 

switch ($tipo)
{
case 1:  $peso=0.2;
break;
case 2: $peso=0.35;
break;
case 3: $peso=0.25;
break;
case 4: $peso=0.2;
break;
}
$sql="INSERT INTO  cap_examen (titulo,fecha,hora_ini,hora_fin,tipo,peso) VALUES ('".$titulo."','".$fecha."','".$hora_ini."','".$hora_fin."','".$tipo."','".$peso."')";
$result = mysql_query($sql);
}


//Mostramos datos CENSO
if($id_examen!=NULL and $ide==1)
{
$mensaje1="Editando módulo de exámenes";
$result = mysql_query("SELECT * FROM  cap_examen WHERE id_examen='".$id_examen."'");
		 while ($row = mysql_fetch_row($result))
			{
			    $id_examen=$row[0];
			 	$titulo=$row[1];
 				$fecha=$row[2];
				$hora_ini=$row[3];
				$hora_fin=$row[4];
				$tipo=$row[5];
      
     		}
  $bandera=1;
}

///ACTUAlizamos datos
if($bandera!='' and $ide==NULL)
{
 $sql="UPDATE cap_examen SET titulo='$titulo', fecha='$fecha', hora_ini='$hora_ini', hora_fin='$hora_fin', tipo='$tipo'  WHERE id_examen='".$codigo_examen."'"; 
mysql_query($sql);
$mensaje2="Se ha modificado exitosamente la información";
}

// ELIMINAR DATOS
if($codigo!=NULL)

{ 
 $query="DELETE from cap_examen  WHERE id_examen='".$codigo."'";
 $result=mysql_query($query);
 $mensaje2="Se ha eliminado exitosamente el registro";
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
  <p>&nbsp;</p>
  <p><span class="titulo2"><a href="adm_examen.php" class="titulo2">Importar banco de preguntas</a> | Crear un nuevo examen</span><br />
  </p>
  <hr />
 <form id="form1" name="form1" method="post" action="crea_examen.php">
  <!-- full-name input-->
  <table width="700" border="0">
    <tr>
      <td align="left" valign="top"><label class="subtitu"> Creación de Exámenes</label></td>
      </tr>
    <tr>
      <td height="20" align="left" valign="top" class="texto1">Típo de examen</td>
      </tr>
    <tr>
      <td align="left" valign="top"><label>
        <select name="tipo" class="texto1" id="tipo">
          <option selected="selected">Seleccionar</option>
          <option value="1" <?php if($tipo==1) { ?>selected="selected"<?php } ?> >Examen parcial</option>
          <option value="2" <?php if($tipo==2) { ?>selected="selected"<?php } ?> >Examen final</option>
          <option value="3" <?php if($tipo==3) { ?>selected="selected"<?php } ?> >Práctica calificada</option>
          <option value="4" <?php if($tipo==4) { ?>selected="selected"<?php } ?> >Simulación</option>
        </select>
      </label></td>
      </tr>
    <tr>
      <td align="left" valign="top"><span class="texto1">Título de examen</span></td>
      </tr>
    <tr>
      <td align="left" valign="top" class="texto2"><span class="texto1">
        <input name="titulo" type="text" class="texto1" id="titulo" value="<?php echo $titulo; ?>" size="40">
      </span></td>
      </tr>
    <tr>
      <td align="left" valign="top"><span class="texto1">
        <label class="texto2">Fecha de publicación</label>
        <input type="text" name="fecha" id="fecha" value="<?php echo $fecha;  ?>" />
        <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "fecha",
        trigger    : "fecha",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d"
      });
    //]]></script>
      </span></td>
      </tr>
    <tr>
      <td height="21" align="left" valign="top"><span class="texto1">Seleccione hora de inicio
        </span>
        <select name="hora_ini" class="texto1" id="hora_ini">
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
          
          
        </select></td>
      </tr>
          <tr>
      <td height="21" align="left" valign="top"><span class="texto1">
        <label >Seleccione hora de culminación</label>
 
        <select name="hora_fin" class="texto1" id="hora_fin">
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
      </span></td>
      </tr>
    <tr>
      <td align="center" valign="top"><input name="bandera" type="hidden" id="bandera" value="<?php echo $bandera; ?>" />&nbsp;<input name="codigo_examen" type="hidden" id="codigo_examen" value="<?php echo $id_examen; ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="top">
      <?php if($bnd==1) {   ?>
      <input type="submit" name="submit" value="  Guardar  "  onclick="return examen()"/>
      <?php  }  else { echo '<span class="aviso">No sepuede  crear un examen porque aún no se ha asignado alumnos en la aula virtual</span>';    } ?>
      </td>
      </tr>
    <tr>
      <td height="21" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="21" align="left" valign="top"><table width="780" border="0" align="center" cellpadding="1" cellspacing="1" style="border:thin;border: 1px solid #039">
      
       <tr bgcolor="#CCCCCC" >
              <td width="31" height="35" align="left" class="texto1"><strong>N°</strong></td>
              <td width="282" align="left" class="texto1"><strong>TITULO</strong></td>
              <td width="190" align="left" class="texto1"><strong>FECHA/HORA/DURACIÓN</strong></td>
              <td width="102" align="center" class="texto1"><strong>PREGUNTAS</strong></td>
              <td width="73" align="center" class="texto1"><strong>EDITAR</strong></td>
              <td width="81" align="center" class="texto1"><strong>ELIMINAR</strong></td>
          </tr>
          
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



$mysql="SELECT * FROM cap_examen order by id_examen DESC";  
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

 
    $a=$row[3];
    $b=$row[4];
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
    
	switch ($row[5])
	{
	case 1:
	$tipo_e="EP";
	break;
	
	case 2:
	$tipo_e="EF";
	break;
	
	case 3:
	$tipo_e="PC";
	break;	
	
		
	case 4:
	$tipo_e="ES";
	break;
	
	}

    ?>

          <tr bgcolor="<?php echo $color;  ?>" >
              <td width="31" height="30" align="left" class="texto1"><?php echo $c; ?></td>
              <td width="282" align="left" class="texto1"><?php echo $row[1].' ('.$tipo_e.')'; ?></td>
              <td width="190" align="left" class="texto1"><?php echo date("d-m-Y",strtotime($row[2])).'/'.$row[3].' hrs./'.$duracion; ?></td>
              <td width="102" align="center"><b><?php if($row[5]==1 or $row[5]==2) {  ?><a href="adm_preguntas.php?examen=<?php echo $row[0]; ?>&idi=1&tit=<?php echo $row[1]; ?>"><img src="fondos/examen.jpg" border="0" width="28px" height="28px"></a><?php } ?></b></td>
              <td width="73" align="center"><a href="crea_examen.php?id_examen=<?php echo $row[0]; ?>&ide=1"><img src="fondos/editar.jpg" border="0" width="28px" height="28px"></a></td>
              <td width="81" align="center"><a href="crea_examen.php?codigo=<?php echo $row[0]; ?>" onClick="return pregunta()"><img src="fondos/eliminar.jpg" border="0" width="28px" height="28px"></a></td>
          </tr>
          <?php } ?>
     </table></td>
    </tr>
  </table>
   <p>&nbsp;</p>
  </form>
</div >
</div>
</body>


</html>
<?php
}
?>