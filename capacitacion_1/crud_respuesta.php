<?php
/// GUARDAMOS FORMULARIO DE NOMBRE DEL PROYECTO
$titulo=$_POST['titulo'];
$id=$_POST['id'];
$fecha_ini=$_POST['fecha_ini'];
$fecha_fin=$_POST['fecha_fin'];
$descripcion=$_POST['descripcion'];
$bandera=$_POST['bandera'];
$codigo_modulo=$_POST['codigo_modulo'];
$ide=$_GET['ide'];
$id_modulo=$_GET['id_modulo'];
$codigo=$_GET['codigo'];

$mensaje1="Registrar módulo de capacitación";
if($titulo!='' and $fecha_ini!=NULL and $fecha_fin!='' and $fecha_ini!=NULL and $bandera==NULL)

{ 
 
//$fecha_ini=date("Y-m-d", strtotime($fecha_ini));
//$fecha_fin=date("Y-m-d", strtotime($fecha_fin));
$fecha_ini=substr(trim($fecha_ini),6,4).'-'.substr(trim($fecha_ini),3,2).'-'.substr(trim($fecha_ini),0,2);
$fecha_fin=substr(trim($fecha_fin),6,4).'-'.substr(trim($fecha_fin),3,2).'-'.substr(trim($fecha_fin),0,2);

$sql="INSERT INTO  cap_modulo (titulo,id,fecha_ini,fecha_fin,descripcion) VALUES ('".$titulo."','".$_SESSION["id"]."','".$fecha_ini."','".$fecha_fin."','".$descripcion."')";
$result = mysql_query($sql);

$titulo="";
$fecha_ini="";
$fecha_fin="";
$descripcion="";

$mensaje=1;
$mensaje2="Se ha guardado exitosamente la información";
}

///Mostramos datos CENSO
if($id_modulo!=NULL and $ide=1)
{
$mensaje1="Editando módulo de capacitaciónb censal";
$result = mysql_query("SELECT * FROM  cap_modulo WHERE id_modulo='".$id_modulo."'");
		 while ($row = mysql_fetch_row($result))
			{
			    $id_modulo=$row[0];
			 	$titulo=$row[1];
				$fecha_ini=substr($row[3],8,2).'/'.substr($row[3],5,2).'/'.substr($row[3],0,4);
				$fecha_fin=substr($row[4],8,2).'/'.substr($row[4],5,2).'/'.substr($row[4],0,4);
				$descripcion=$row[5];
		
				            
     		}
  $bandera=1;
}



///ACTUAlizamos datos
if($bandera!='' and $ide==NULL)

{ 
 $fecha1_ini=substr($fecha_ini,6,4).'-'.substr($fecha_ini,3,2).'-'.substr($fecha_ini,0,2);
 $fecha1_fin=substr($fecha_fin,6,4).'-'.substr($fecha_fin,3,2).'-'.substr($fecha_fin,0,2);
 $sql="UPDATE cap_modulo SET titulo='$titulo', fecha_ini='$fecha1_ini', fecha_fin='$fecha1_fin', descripcion='$descripcion'  WHERE id_modulo='".$codigo_modulo."'"; 
mysql_query($sql);
$mensaje2="Se ha modificado exitosamente la información";
}

// ELIMINAR DATOS
if($codigo!=NULL)

{ 
 $query="DELETE from cap_modulo  WHERE id_modulo='".$codigo."'";
 $result=mysql_query($query);
 $mensaje2="Se ha eliminado exitosamente el registro";
}
?>