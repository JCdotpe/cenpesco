<?php
//include ("seguridad.php");
//include("conexion.php");
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<?php
$veces = rand(1,20);

function asistencia($id)
{
date_default_timezone_set('Etc/GMT+5');
$dia=date("d");
$mes=date("m");
$anio=date("Y");

//----------------------------
$hora='<em>No registrado</em>';
$estado='<div id="lista'.$id.'"><span class="titulo3"><b>&iexcl;Ausente&iexcl;</b></span><br> <span class="texto2">'.$hora.' </span><br><span class="titulo4">[ <a href="asistencia.php?ide=2&id_asistencia=0&id_alu='.$id.'" target="_top" class="titulo4">CAMBIAR ESTADO</a> ]</span></div>';

//----------------------
@$mysqla="SELECT * FROM cap_asistencia WHERE id='".$id."' AND YEAR(fecha)='".$anio."' AND MONTH(fecha)='".$mes."' AND DAY(fecha)='".$dia."' AND tipo='1' GROUP BY tipo"; 
$queryresult=mysql_query($mysqla);
while($row=@mysql_fetch_array($queryresult))
{
	

	
	 ///comprobar estado
     $hora_entrada1=strtotime(date("07:45:00"));
	 $hora_entrada2=strtotime(date("08:45:00"));
	 $hora_lim1=strtotime(date("13:45:00"));
	 $hora_lim2=strtotime(date("14:45:00"));
     $hora_registro=strtotime(substr($row[5],10,9));
	 $hour=strtotime(date(substr($row[5],10,9)));
		 					   
	 if(($hour>= $hora_entrada1 and $hour<=$hora_lim1) or ($hour>= $hora_entrada2 and $hour<=$hora_lim2))
	  {  	
     $hora='<em>Registro: '.substr($row[5],10,9).' Horas </em>';
	$estado='<div id="lista'.$id.'"><span class="titulo2"><b>&iexcl;Presente&iexcl;</b></span><br> <span class="texto2">'.$hora.'</span><br><span class="titulo4">[ <a href="asistencia.php?ide=1&id_asistencia='.$row[0].'&id_alu='.$id.'" target="_top"  class="titulo4">CAMBIAR ESTADO</a> ]</span></div>';		 
	  }
	  else
	  { 
	$hora='<em>No registrado</em>';
	 $estado='<div id="lista'.$id.'"><span class="titulo3"><b>&iexcl;Ausente&iexcl;</b></span><br> <span class="texto2">'.$hora.' </span><br><span class="titulo4">[ <a href="asistencia.php?ide=2&id_asistencia='.$row[0].'&id_alu='.$id.'" target="_top"  class="titulo4">CAMBIAR ESTADO</a> ]</span></div>';
		 
	  }
}
return $estado;
}



$aleatorio = rand (1,1000000);
$cad='';
$c=0;
$result = mysql_query("SELECT a.id_alumno, r.dni, r.ap_paterno, r.ap_materno, r.nombre1, r.nombre2  FROM  cap_asignacion_alu AS a INNER JOIN regs AS r ON (a.id_alumno=r.id) WHERE a.id_aula='".$_SESSION["seccion"]."' ORDER BY r.ap_paterno ASC");
while($row = mysql_fetch_row($result))
	 {
	 $nombres=utf8_encode(strtoupper($row[2].' '.$row[3].' '.$row[4].' '.$row[5]));
     $c=$c+1;
	 if($c<=4) 
	 { 
	 $division='';
	 } 
	 else 
	 { 
	 $division='<tr>'; 
	 $c=0;
	 }
	 $estado1=asistencia($row[0]);
	  $hora=substr($row[2],10,8);
	  $dni=$row[1];
      
	 
	 echo '<td width="25%" align="center"><span class="subtitulo"><b>'.strtoupper($nombres).'</b></span><br><span class="texto2"><b>DNI: '.$dni.'</b></span><br><img src="vista_foto.php?usuario='.$row[1].'&amp;id=4&rdz='.$aleatorio.'" border="0"  style="border:thin;border: 1px solid #0099FF"/><br />'.$estado1.'</td>'.$division.'';
		
	}
?>
 </tr>
</table>
