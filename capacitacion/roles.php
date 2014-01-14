<?php
if($_SESSION["tipo"]==1)
{
$companeros="docente.php";	
$calificacion="edit_nota.php";
$examen="examen.php";
$file="archivo.php";
$recurso="recurso.php";
$ayuda="ayuda_det.php";
$calificaciones="edit_calificacion.php";
}

if($_SESSION["tipo"]==2)
{
$companeros="alumno.php";	
$calificacion="nota.php";
$examen="examen.php";
$file="archivo.php";
$recurso="recurso.php";
$ayuda="ayuda.php";
$calificaciones="calificacion.php";

}

if($_SESSION["tipo"]==NULL)
{
$companeros="docente.php";	
$calificacion="adm_nota.php";
$examen="adm_examen.php";
$file="edit_archivo.php";
$recurso="edit_recurso.php";
$ayuda="edit_ayuda.php";
$calificaciones="adm_calificacion.php";

}

?>