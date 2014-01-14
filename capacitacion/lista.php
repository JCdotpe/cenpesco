<?php
include ("seguridad.php");
include("conexion.php");
@$ide=$_GET['ide'];

$veces = rand(1,20);

$dia=date("d");
$mes=date("m");
$anio=date("Y");

//----------------------------
$hora='<em>No registrado</em>';
$estado='<span class="titulo3"><b>&iexcl;Ausente&iexcl;</b></span><br> <span class="texto2">'.$hora.' </span><br><span class="titulo4">[ <a href="asistencia.php?ide=2&id_asistencia=0&id_alu='.$ide.'" target="_top" class="titulo4">CAMBIAR ESTADO</a> ]</span>';

//----------------------
@$mysqla="SELECT * FROM cap_asistencia WHERE id='".$ide."' AND YEAR(fecha)='".$anio."' AND MONTH(fecha)='".$mes."' AND DAY(fecha)='".$dia."' AND tipo='1' GROUP BY tipo"; 
$queryresult=mysql_query($mysqla);
while($row=@mysql_fetch_array($queryresult))
{
	
	date_default_timezone_set('Etc/GMT+5');
	
	 ///comprobar estado
     $hora_entrada1=strtotime(date("08:15:00"));
	 $hora_entrada2=strtotime(date("13:50:00"));
	 $hora_lim1=strtotime(date("12:45:00"));
	 $hora_lim2=strtotime(date("15:00:00"));
     $hora_registro=strtotime(substr($row[5],10,9));
	 $hour=strtotime(date(substr($row[5],10,9)));
		 					   
	 if(($hour>= $hora_entrada1 and $hour<=$hora_lim1) or ($hour>= $hora_entrada2 and $hour<=$hora_lim2))
	  {  	
     $hora='<em>Registro: '.substr($row[5],10,9).' Horas </em>';
	$estado='<span class="titulo2"><b>&iexcl;Presente&iexcl;</b></span><br> <span class="texto2">'.$hora.'</span><br><span class="titulo4">[ <a href="asistencia.php?ide=1&id_asistencia='.$row[0].'&id_alu='.$ide.'" target="_top" class="titulo4">CAMBIAR ESTADO</a> ]</span>';		 
	  }
	  else
	  { 
	$hora='<em>No registrado</em>';
	 $estado='<span class="titulo3"><b>&iexcl;Ausente&iexcl;</b></span><br> <span class="texto2">'.$hora.' </span><br><span class="titulo4">[ <a href="asistencia.php?ide=2&id_asistencia='.$row[0].'&id_alu='.$ide.'" target="_top"  class="titulo4">CAMBIAR ESTADO</a> ]</span>';
		 
	  }
}
echo $estado;

?>
 </tr>
</table>
