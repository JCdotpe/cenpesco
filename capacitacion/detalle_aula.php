<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<table width="700" border="1" cellpadding="2" cellspacing="0">
  <tr>
    <td width="159" align="center"><strong>DEPARTAMENTO</strong></td>
    <td width="195" align="center"><strong>APELLIDOS Y NOMBRES</strong></td>
    <td width="326" align="center"><strong>AULA 1</strong></td>
  </tr>
  <?php
 include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$mysql = mysql_query("SELECT r.nom_dep, r.ap_paterno, r.ap_materno, r.nombre1, a.id_aula FROM  regs  AS r  INNER JOIN cap_asignacion_alu AS a  ON(r.id=a.id_alumno)");
 $result=mysql_query($mysql) or die ("No se puede hacer consulta");
while ($row = mysql_fetch_row($result))
 {
  
  ?>
  <tr>
    <td><?php  echo $row[0];  ?></td>
    <td><?php  echo $row[1].' '.$row[2].' '.$row[3];  ?></td>
    <td><?php echo $row[4];  ?></td>
  </tr>
  
  <?php
  
 }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>