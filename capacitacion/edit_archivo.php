<?php include ("seguridad.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
error_reporting(E_ALL ^ E_NOTICE);
@$banderin=$_GET['banderin'];
@$bandera=$_POST['bandera'];
@$codigo_arhivo=$_POST['codigo_archivo'];
@$id_modulo=1;
@$ide=$_GET['ide'];
@$id=$_POST['id'];
@$id_archivo=$_GET['id_archivo'];
@$id_docente= $_SESSION["user"];
@$titulo=$_POST['titulo'];
@$fecha=$_POST['fecha'];
@$pather= $_POST['pather'];
@$descripcion= $_POST['descripcion'];
@$path= $_POST['path'];
@$archivo= $_POST['archivo'];
@$tamanio= $_POST['tamanio'];
@$valor0= $_GET['valor0'];
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


if($id==1 and  $bandera==NULL)
{

$path="publicaciones/"; 

if (isset($_FILES['archivo']['name'])){ // si estoy subiendo el archivo o es la primera carga de la
$extensiones=array("pdf","PDF","zip","ZIP","rar","RAR","xls","XLS","XLSX","xlsx","jpg","JPG","GIF","gif","png","PNG","doc","DOC","docx","DOCX","pps","PPS");
// path adonde la voy a guardar, en este caso mi_ubicacion_actual/imagenes
	$nombre1=$_FILES['archivo']['name'];
	$tamanio=$_FILES['archivo']['size'];
	$tipo=$_FILES['archivo']['type'];
	$var = explode(".","$nombre1");
	$num = count($extensiones);
	$valor = $num-1;
	//$admitido=false;
	//echo $path;

	$tamanio=round($tamanio/1024,0); 
	} //redondeo y paso a kb 

	if ( $tamanio!="" or $tamanio!=NULL) {
	if($tamanio<=19000000000) {

	for($i=0; $i<=$valor; $i++) {
	    if($extensiones[$i] == $var[1]) {        
			$admitido=true;//es una extension valida
			break;

			}

	    }

	}
	}
	$opcion=0;
	  //guardamos datos
$sql="Insert into archivo values ('','".$titulo."','".$fecha."','".$path."','".$id_modulo."','".$descripcion."')";
$result = mysql_query($sql);
 // $result = mysql_query($sql);
 
  	if (@$admitido){

       $lastid=mysql_insert_id();
       $path.='archivo'.$lastid.'_2013.'.$var[1]; 
        //echo $path.'/ '.$lastid;
    	$sql="UPDATE archivo SET path='".$path."' WHERE id_archivo='".$lastid."'";
		$result = mysql_query($sql);	
		
		}

		$path=''.$path;

		///////

		if (is_uploaded_file($_FILES['archivo']['tmp_name']) )

		 {

			  copy($_FILES['archivo']['tmp_name'], "$path"); //	

			} 
			
	$id_archivo=0;
	$titulo="";
	$fecha="";
	$descripcion="";
	 }
	 
	 // fin de guardado

if($ide==4 and $id_archivo!=NULL ) {
 $query="DELETE  FROM archivo WHERE id_archivo='".($id_archivo)."'";
	  $result=mysql_query($query);
	 @$file0_delete=$valor0;

      if(unlink(@$file0_delete)) {

    
	 }
	
	 }	 
	///Fin de eilimar
	
//Listamos  While para editar
if($ide==3)
{

$result = mysql_query("SELECT * FROM  archivo WHERE id_archivo='".$id_archivo."'");
		 while ($row = mysql_fetch_row($result))
			{
			    $id_archivo=$row[0];
			 	$titulo=$row[1];
				$fecha=$row[2];
				$pather=$row[3];
				$id_modulo=$row[4];
				$descripcion=$row[5];
				       
     		}
			
		}
			
/// Editamos+
if($bandera==1)

{
  $sql="UPDATE archivo SET titulo='$titulo',fecha='$fecha',descripcion='$descripcion' WHERE id_archivo='".$codigo_archivo."'"; 
  mysql_query($sql);	
     $tipo=0;
//---------------edit archi

if (isset($_FILES['archivo']['name'])){ // si estoy subiendo el archivo o es la primera carga de la
$extensiones=array("pdf","PDF","zip","ZIP","rar","RAR","xls","XLS","XLSX","xlsx","jpg","JPG","GIF","gif","png","PNG","doc","DOC","DOCX","docx","pps","PPS","pptx","PPTX");
// path adonde la voy a guardar, en este caso mi_ubicacion_actual/imagenes
	$nombre1=$_FILES['archivo']['name'];
	$tamanio=$_FILES['archivo']['size'];
	$tipo=$_FILES['archivo']['type'];
	$var = explode(".","$nombre1");
	$num = count($extensiones);
	$valor = $num-1;
	//$admitido=false;
	//echo $path;

	$tamanio=round($tamanio/1024,0); 
	} //redondeo y paso a kb 

	if ( $tamanio!="" or $tamanio!=NULL) {
	if($tamanio<=190000000) {

	for($i=0; $i<=$valor; $i++) {
	    if($extensiones[$i] == $var[1]) {        
			$admitido=true;//es una extension valida
			break;

			}

	    }

	}
	}
	
	if (@$admitido){
     // echo $pather.'==';
      //$lastid=mysql_insert_id();
	  if(unlink($pather)) 
	  {	 
	  }
	  
		$path='publicaciones/archivo'.$codigo_archivo.'.'.$var[1]; 

    	$sql="Update archivo set path='$path' WHERE id_archivo='".($codigo_archivo)."'";
		$result = mysql_query($sql);	
		
		}

		$path=''.$path;

		///////

		if (is_uploaded_file($_FILES['archivo']['tmp_name']) )

		 {

			  copy($_FILES['archivo']['tmp_name'], "$path"); //	

			} 
			
		 $tipo=0;
   $titulo="";

//----edit archi	 
	 
     echo  '<script> alert("Datos Actualizados con Exito"); </script>';
}


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<strong>AULA VIRTUAL DEL PROYECTO DE CENSO DE PESCA CONTINENTAL DEL PER&Uacute;</strong></span><br><table width="660" border="0" align="center" cellpadding="2" cellspacing="2">
 <tr>
    <td width="164" height="40"><p class="inicio"><a href="principal.php" ></a></p></td>
    <td width="164" height="40"><p class="perfiles"><a href="<?php echo $companeros;  ?>" ></a></p></td>
    <td width="164" height="40"><p class="calificaciones"><a href="<?php echo $calificaciones;  ?>" ></a></p></td>
    <td width="164" height="40"><p class="salir"><a href="salir.php" ></a></p></td>
  </tr>
</table></span></div>

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
  <p><span class="titulo2">Lista de manuales, gu&iacute;as y documentos de aprendizaje para el Censo de Pesquer&iacute;a</span><br />
  </p>
  <hr />
  <form id="form1" name="form1" method="post" action="edit_archivo.php"  enctype="multipart/form-data">
  <!-- full-name input-->
  <table width="700" border="0">
    <tr>
      <td align="left" valign="top"><label class="texto2">Escriba el título del archivo que se va a publicar</label></td>
    </tr>
    <tr>
      <td align="left" valign="top"><input name="titulo" type="text" class="texto2" id="titulo" style="font-size:13px; height:26px" value="<?php echo $titulo; ?>" size="35" /></td>
      </tr>
    <tr>
      <td align="left" valign="top" class="texto2">Descripción del archivo</td>
      </tr>
    <tr>
      <td align="left" valign="top"><span>
        <textarea name="descripcion" cols="60" rows="3" class="texto2" id="descripcion"><?php echo $descripcion; ?></textarea>
      </span></td>
      </tr>
    <tr>
      <td height="30" align="left" valign="top"><label class="texto2">Fecha de publicación</label>
  <span class="texto2">
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
      <td height="33" align="left" valign="top"><input name="archivo" type="file" class="texto2" id="archivo" /></td>
      </tr>
    <tr>
      <td align="center" valign="top"><input name="bandera" type="hidden" class="style2" id="bandera" value="<?php echo $banderin; ?>" />
        <input name="codigo_archivo" type="hidden" class="style2" id="codigo_archivo" value="<?php echo $id_archivo; ?>" />
        <input name="id" type="hidden" class="style2" id="id" value="1" />
        <input name="pather" type="hidden" class="style2" id="pather" value="<?php echo $pather; ?>" />
        <input name="submit" type="submit" class="texto2"  onclick="return validar()" value="  Guardar  "/></td>
      </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      </tr>
    <tr>
      <td align="left" valign="top">
      
      <table width="690" border="0" align="center" cellpadding="1" cellspacing="1">
      
        <tr bgcolor="#CCCCCC" class="texto1" >
              <td width="33" height="30" align="left" class="texto2"><strong>N&deg;</strong></td>
              <td width="321" align="left" class="texto2"><strong>Descripci&oacute;n</strong></td>
              <td width="179" align="left"><strong>Fecha</strong></td>
              <td width="69" align="center"><strong>Editar</strong></td>
           <td width="72" align="center"><strong>Eliminar</strong></td>
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

$mysql="SELECT * FROM archivo order by id_archivo DESC";  
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
    
    ?>

        <tr bgcolor="<?php echo $color;  ?>" >
              <td width="33" height="30" align="left" class="texto2"><?php echo $c; ?></td>
              <td width="321" align="left" class="texto2"><a href="<?php echo $row[3]; ?>" target="_blank"><?php echo $row[1]; ?></a></td>
              <td width="179" align="left" class="texto2"><?php echo $row[2]; ?></td>
              <td width="69" align="center"><a href="edit_archivo.php?ide=3&amp;id_archivo=<?php echo $row[0];  ?>&amp;banderin=1"><img src="fondos/editar.jpg" border="0" width="28px" height="28px"></a></td>
              <td width="72" align="center"><a href="edit_archivo.php?ide=4&amp;id_archivo=<?php echo $row[0];  ?>&valor0=<?php echo $row[3]; ?>"  onClick="return pregunta()"><img src="fondos/eliminar.jpg" border="0" width="28px" height="28px"></a></td>
          </tr>
          <?php } ?>
     </table>
      
      </td>
    </tr>
  </table>
  
 <p>&nbsp;</p>


 </form>
</div >
</div>
</body>


</html>