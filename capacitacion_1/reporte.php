<?php

include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

//$mysql="SELECT c.dni,SUM(c.nota*c.peso/100),r.cod_dep FROM cap_calificacion AS c INNER JOIN regs AS r on(c.id=r.id) GROUP BY c.dni ORDER BY r.cod_dep,SUM(c.nota*c.peso/100) DESC";  
 //$result=mysql_query($mysql) or die ("No se puede hacer consulta");

//$mysql="SELECT c.dni,r.cod_dep, a.id_alumno,r.ap_paterno, r.ap_materno FROM cap_calificacion AS c INNER JOIN regs AS r  INNER JOIN  cap_asignacion_alu AS a ON(a.id_alumno=r.id) ORDER BY r.ap_paterno ASC";  


$mysql="SELECT r.id, r.ap_paterno, r.ap_materno, a.id_aula, c.nota, SUM(c.nota) FROM regs AS r INNER JOIN cap_asignacion_alu AS  a  ON(a.id_alumno=r.id) LEFT JOIN cap_calificacion AS c  ON(c.id=r.id)  GROUP BY r.id ORDER BY r.ap_paterno, c.id_modulo DESC";
$result=mysql_query($mysql) or die ("No se puede hacer consulta");
$c=0;
while ($row = mysql_fetch_row($result))

{
$c=$c+1;

if($row[4]!=NULL) { $nota=$row[5]; } else { $nota=0; }
echo $c.'. '.$row[1].' '.$row[2].' = '.$nota.'<br/>';
	
}
?>