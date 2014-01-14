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
@$banderin=$_GET['banderin'];
@$bandera=$_POST['bandera'];
@$codigo_examen=$_POST['codigo_examen'];
@$id_examen=$_POST['id_examen'];
@$ide=$_GET['ide'];
@$id=$_POST['id'];
@$id_banco=$_GET['id_banco'];
@$id_banco=$_GET['id_banco'];
@$usi= $_GET["usi"];
@$exam= $_GET["exam"];
@$path1= $_GET["path1"];
@$estado= $_GET["estado"];
@$can= $_GET["can"];
@$titulo=$_POST['titulo'];
@$fecha=date('Y-m-d');
@$pather= $_POST['pather'];
@$cantidad= $_POST['cantidad'];
@$path= $_POST['path'];
@$archivo= $_POST['archivo'];
@$tamanio= $_POST['tamanio'];
@$valor0= $_GET['valor0'];
$date=$_GET['date'];
$i=$_GET['i'];

//generar preguntas
if($id_banco!=NULL and $usi==1 and $estado==1)
{
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Reader/Excel2007.php');
$pos=strrpos($path1,'.');
$pos=$pos-1;
	//$archivo=substr($path1,0,$pos);
	$archivo=$path1;
//echo $id_banco.'/'.$archivo.'/'.$path1,'/'.$can.'/'.$exam;

// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load($archivo);
$objFecha = new PHPExcel_Shared_Date();       

// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);

// Llenamos el arreglo con los datos  del archivo xlsx
for ($i=2;$i<=intval($can+1);$i++){
	$_DATOS_EXCEL[$i]['pregunta'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['r1'] = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['r2']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['r3']= $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['r4'] = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['r5']= $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['id_examen'] = $exam;
	$_DATOS_EXCEL[$i]['puntaje'] = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['respuesta'] = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
}		

$errores=0;
$k=0;
$j=0;
$cn='';
$ca='';
$cx='';
$cad='';
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD
$sql1="INSERT INTO cap_pregunta (pregunta,r1,r2,r3,r4,r5,id_examen,puntaje,respuesta) VALUES ";
foreach($_DATOS_EXCEL as $campo => $valor)

{
	
$k=$k+1;
if($k==1) { $ca='(';  
					  }
if($k>1) { $ca='),(';  }
$j=0;	
$cn=$cn.$ca;
foreach ($valor as $campo2 => $valor2)

{
	
		$j=$j+1;
     if($j==1) {   $cn=$cn. "'".$valor2."'";  }
     if($j>1) { $cn=$cn. ",'".$valor2."'";  }
		
}


}	
$sql=$sql1.$cn.')';

$result = mysql_query($sql);

//cambiamos el estado de Banco
$sql="UPDATE banco SET estado='0'  WHERE id_banco='".$id_banco."'"; 
mysql_query($sql);
$estado=0;
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


if($id==1 and  $bandera==NULL)
{

$path="publicaciones/"; 

if (isset($_FILES['archivo']['name'])){ // si estoy subiendo el archivo o es la primera carga de la
$extensiones=array("csv","CSV","zip","ZIP","rar","RAR","xls","XLS","XLSX","xlsx");
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
	$opcion=0;
	  //guardamos datos
$sql="Insert into banco values ('','".$titulo."','".$fecha."','".$path."','".$id_examen."','".$cantidad."','1')";
$result = mysql_query($sql);
 // $result = mysql_query($sql);
 
  	if (@$admitido){

       $lastid=mysql_insert_id();
	  
       $path.='ex201365'.$lastid.'987364.'.$var[1]; 
        echo $path;
    	$sql="UPDATE banco SET path='".$path."' WHERE id_banco='".$lastid."'";
		$result = mysql_query($sql);	
		
		}

		$path=''.$path;

		///////

		if (is_uploaded_file($_FILES['archivo']['tmp_name']) )

		 {

			  copy($_FILES['archivo']['tmp_name'], "$path"); //	

			} 
			
	
	$titulo="";

	$cantidad="";
	$id_examen=0;
	 }
	 
	 // fin de guardado

if($ide==4 and $id_banco!=NULL )
{
 $query="DELETE  FROM banco WHERE id_banco='".($id_banco)."'";
	  $result=mysql_query($query);
	 @$file0_delete=$valor0;

      if(unlink(@$file0_delete)) 
	  {

    
	 }
	
$query="DELETE  FROM cap_pregunta WHERE id_examen='".($exam)."'";
 $result=mysql_query($query);
 
	
	 }	 
	///Fin de eilimar
	
//Listamos  While para editar
if($ide==3)
{

$result = mysql_query("SELECT * FROM  banco WHERE id_banco='".$id_banco."'");
		 while ($row = mysql_fetch_row($result))
			{
			    $id_banco=$row[0];
			 	$titulo=$row[1];
				$fecha=$row[2];
				$pather=$row[3];
				$id_examen=$row[4];
				$descripcion=$row[5];
				       
     		}
			
		}
			
/// Editamos+
if($bandera==1)

{
  $sql="UPDATE banco SET titulo='$titulo',fecha='$fecha',cantidad='$cantidad' WHERE id_examen='".$codigo_banco."'"; 
  mysql_query($sql);	
     $tipo=0;
//---------------edit archi

if (isset($_FILES['archivo']['name'])){ // si estoy subiendo el archivo o es la primera carga de la
$extensiones=array("csv","CSV","zip","ZIP","rar","RAR","xls","XLS","XLSX","xlsx");
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
	if($tamanio<=19000) {

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
	
	  
		$path='publicaciones/ex201365'.$codigo_archivo.'987364.'.$var[1]; 

    	$sql="Update banco set path='$path' WHERE id_banco='".($codigo_banco)."'";
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
if (document.form1.titulo.value == "") 
{
  alert('Por favor, seleccione un exámen');
  document.form1.titulo.focus();
  return false;
} 

else

if (document.form1.cantidad.value =="") 
{
  alert('Por favor, ingrese la cantidad de preguntas');
  document.form1.cantidad.focus();
  return false;
} 

else

if (document.form1.archivo.value == "") 
{
  alert('Por favor, debe cargar un archivo excel');
  document.form1.archivo.focus();
  return false;
} 


else

 {
  return true;
 }	

}

///------------------------
function llenar()
{
var ti;
ti=document.getElementById("id_examen").options[document.getElementById("id_examen").selectedIndex].text;
document.getElementById("titulo").value=ti;

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
  <p><span class="titulo2">Importar banco de preguntas | <a href="crea_examen.php" class="titulo2">Crear un nuevo examen</a></span><br />
  </p>
  <hr />
  <form id="form1" name="form1" method="post" action="adm_examen.php"  enctype="multipart/form-data">
  <!-- full-name input-->
  <table width="700" border="0">
    <tr>
      <td align="left" valign="top"><label class="texto2">        Seleccione examen</label></td>
      </tr>
    <tr>
      <td align="left" valign="top">
        <select name="id_examen" class="texto2" id="id_examen" onchange="llenar()">
          <option value="0" selected="selected">Seleccionar</option>
          <?php

            $result = mysql_query("SELECT * FROM  cap_examen WHERE tipo='1' OR tipo='2' order by fecha  ASC LIMIT 100");
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
      </span></td>
      </tr>
    <tr>
      <td align="left" valign="top"><label class="texto2">Escriba el título del archivo de examen que se va a publicar</label></td>
      </tr>
    <tr>
      <td align="left" valign="top"><input name="titulo" type="text" class="texto2" id="titulo" style="font-size:13px; height:26px" value="<?php echo $titulo; ?>" size="35" /></td>
      </tr>
    <tr>
      <td align="left" valign="top" class="texto2">Cantidad de preguntas</td>
      </tr>
    <tr>
      <td align="left" valign="top"><span>
        <input name="cantidad" type="text" class="texto2" id="cantidad" value="<?php echo $cantidad; ?>" size="12" />
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
      <td height="33" align="left" valign="top" class="title"><?php if($id==1 and  $bandera==NULL) { ?>&gt;&gt; <a href="adm_examen.php" class="title">Importar Nuevo Banco de Preguntas</a><?php }  ?></td>
      </tr>
    <tr>
      <td align="center" valign="top"><input name="bandera" type="hidden" class="style2" id="bandera" value="<?php echo $banderin; ?>" />
        <input name="codigo_banco" type="hidden" class="style2" id="codigo_banco" value="<?php echo $id_banco; ?>" />
        <input name="id" type="hidden" class="style2" id="id" value="1" />
        <input name="pather" type="hidden" class="style2" id="pather" value="<?php echo $pather; ?>" />
        <input name="submit" type="submit" class="texto2"  onclick="return validar()" value="  Guardar  "/></td>
      </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      </tr>
    <tr>
      <td align="left" valign="top">
      
      <table width="690" border="0" align="center" cellpadding="1" cellspacing="1" style="border:thin;border: 1px solid #039">
      
 <tr bgcolor="#CCCCCC" >
              <td width="30" height="35" align="left" class="texto1"><strong>N°</strong></td>
              <td width="319" align="left" class="texto1"><strong>TITULO</strong></td>
              <td width="120" align="left" class="texto1"><strong>FECHA</strong></td>
              <td width="116" align="center" class="texto1"><strong>GENERAR BANCO DE PREGUNTAS</strong></td>
              <td width="87" align="center" class="texto1"><strong>ELIMINAR</strong></td>
          </tr>
      <?php

function exam($exam)
{
$mysql="SELECT * FROM cap_examen WHERE id_examen='".$exam."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
$c=0;
if ($row = mysql_fetch_array($r))
 {
  $tit=$row[1];
 }
  return $tit;
}

$mysql="SELECT * FROM banco order by fecha DESC";  
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
    $tit=exam($row[4]);
    ?>

        <tr bgcolor="<?php echo $color;  ?>" >
              <td width="30" height="30" align="left" class="texto2"><?php echo $c; ?></td>
              <td width="319" align="left" class="texto2"><?php echo $row[1]; ?></td>
              <td width="120" align="left" class="texto2"><?php echo $row[2]; ?></td>
              <td width="116" align="center"><a href="adm_examen.php?usi=1&amp;id_banco=<?php echo $row[0];  ?>&amp;banderin=1&exam=<?php echo $row[4];  ?>&can=<?php echo $row[5];  ?>&path1=<?php echo $row[3];  ?>&estado=<?php echo $row[6];  ?>"><img src="fondos/hoy.png" border="0" width="26" height="21"></a></td>
              <td width="87" align="center"><a href="adm_examen.php?ide=4&amp;id_banco=<?php echo $row[0];  ?>&valor0=<?php echo $row[3]; ?>&exam=<?php echo $row[4];  ?>"  onClick="return pregunta()"><img src="fondos/eliminar.jpg" border="0" width="28px" height="28px"></a></td>
          </tr>
          <?php } ?>
     </table>
      
      </td>
    </tr>
  </table>
   <p>&nbsp;</p>
   <table width="700" border="0" cellpadding="2" cellspacing="2">
      <tr>
       <td><img src="fondos/preg.jpg">&nbsp;&nbsp;<span class="subtitulo"><?php echo $tit.''; ?></span></td>
     </tr>
    <?php
    $mysql="SELECT * FROM cap_pregunta  WHERE id_examen='".$exam."'";  
    $r=mysql_query($mysql) or die ("No se puede hacer consulta");
    $c=0;

     while ($row = mysql_fetch_array($r))
     {
      $c=$c+1;

    ?>
    <tr>
       <td><span class="texto1"><b><?php echo $c.'.  '.$row[1].' ('.$row[8].' Ptos.) &nbsp;&nbsp;&nbsp;&nbsp; | <a href="adm_preguntas.php?id_pregunta='.$row[0].'&ide=1&tit='.$tit.'&examen='.$exam.'">Editar</a> | <a href="adm_preguntas.php?codigo='.$row[0].'&tit='.$tit.'&examen='.$exam.'" onclick="return pregunta()">Eliminar'; ?>
    </tr>
    <tr>
       <td class="texto1"><?php echo 'A) '.$row[2];  ?></td>
    </tr>

    <tr>
       <td class="texto1"><?php echo'B) '.$row[3];  ?></td>
    </tr>

    <tr>
       <td class="texto1"><?php echo'C) '.$row[4];  ?></td>
    </tr>

    <tr>
       <td class="texto1"><?php echo'D) '.$row[5];  ?></td>
    </tr>

    <tr>
       <td class="texto1"><?php echo'E) '.$row[6]; ?></td>
    </tr>

     <?php
      }
	  
	  
     ?>
   </table>


 </form>
</div >
</div>
</body>
<?php
}

?>


</html>