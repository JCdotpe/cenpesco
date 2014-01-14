<?php  
include ("seguridad.php"); 
header("Cache-control: private");
@$usuario= $_GET['usuario'];
@$id= $_GET['id'];

if($usuario!=NULL)
{
if( $id==0)
{
$anchura=75; 
}
if( $id==1)
{
$anchura=50; 
}
if($id==2)
{
$anchura=120; 
} 
if($id==3)
{
$anchura=160; 
} 
if($id==4)
{
$anchura=200; 
} 

//$nombre=basename($_GET['portada/portada.jpg']);  
$nombre='fotos/'.$usuario.'.jpg';
if( is_file($nombre))
{
$nombre='fotos/'.$usuario.'.jpg';
$_SESSION["image"]=1;
}
else
{
$nombre='fondos/noimagen.jpg';
$_SESSION["image"]=0;
}
$datos = getimagesize($nombre);  
if($datos[2]==1){$img = @imagecreatefromgif($nombre);}  
if($datos[2]==2){$img = @imagecreatefromjpeg($nombre);}  
if($datos[2]==3){$img = @imagecreatefrompng($nombre);}  
$ancho = $datos[0];  
$alto = $datos[1] ;
$dimension= $anchura/$ancho;
 // $altura=(18400/$ancho)*($alto/100);
$altura=$alto*$dimension;
// $anchura=$ancho*$dimension;
$thumb = imagecreatetruecolor($anchura,$altura);  
imagecopyresampled($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);  
if($datos[2]==1){header("Content-type: image/gif"); imagegif($thumb);}  
if($datos[2]==2){header("Content-type: image/jpeg");imagejpeg($thumb);}  
if($datos[2]==3){header("Content-type: image/png");imagepng($thumb); }  
imagedestroy($thumb);  
}
 ?>


