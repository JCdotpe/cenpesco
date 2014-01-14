<?php include ("seguridad.php");
include("conexion.php");
$dni=$_SESSION['dni'];


$docente=$_POST['docente'];

$p1=$_POST['p1'];
$p2=$_POST['p2'];
$p3=$_POST['p3'];
$p4=$_POST['p4'];
$p5=$_POST['p5'];
$p6=$_POST['p6'];
$p7=$_POST['p7'];
$p8=$_POST['p8'];
$p9=$_POST['p9'];
$p10=$_POST['p10'];
$p11=$_POST['p11'];
$p12=$_POST['p12'];
$p13=$_POST['p13'];


if($docente!=NULL)
{

$sql="INSERT INTO  cap_percepcion (docente,dni,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13) VALUES ('".$docente."','".$dni."','".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p10."','".$p11."','".$p12."','".$p13."')";
$result = mysql_query($sql);
echo '<br><br><span class="subtitulo">Gracias por contestar este formulario, por favor cierre esta ventana</span>';
}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
@import url("css/estilo.css"); 
</style>
<title>Encuesta</title>
</head>

<body>
<?php
if($docente==NULL)
{
?>
<form id="form1" name="form1" method="post" action="evaluacion.php">
  <table width="800" border="0" cellpadding="3" cellspacing="0" style="border:thin;border: 1px solid #0099FF">
    <tr>
      <td colspan="6" align="center" valign="middle" class="titulo1">FICHA DE EVALUACIÓN DEL CURSO</td>
    </tr>
    <tr>
      <td colspan="6" class="title">Esta ficha de evaluación es anónima y tiene por finalidad evaluar aspectos importantes de este curso, le sugerimos reponder todas las preguntas y con absoluta verdad.</td>
    </tr>
        <tr>
      <td width="38">&nbsp;</td>
      <td width="418" align="left" valign="middle" class="subtitulo">¿Cuál es el nombre y apellidos de su capacitador?</td>
      <td colspan="4" align="left" valign="middle"><label>
        <input name="docente" type="text" class="subtitulo" id="docente" size="25" />
      </label></td>
    </tr>
    <tr class="subtitulo">
      <td align="left" valign="middle"><strong>N°</strong></td>
      <td align="left" valign="middle"><strong>Pregunta</strong></td>
      <td width="95" align="center" valign="middle" bgcolor="#00CCFF"><strong>Excelente</strong></td>
      <td width="78" align="center" valign="middle" bgcolor="#99FFCC"><strong>Bueno </strong></td>
      <td width="76" align="center" valign="middle" bgcolor="#FFFF99"><strong>Regular</strong></td>
      <td width="59" align="center" valign="middle" bgcolor="#FFCCFF"><strong>Malo</strong></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">1</td>
      <td valign="middle" class="subtitulo">¿Cuál es el nivel de conocimiento de los temas tratados por el instructor?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p1" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p1" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p1" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p1" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">2</td>
      <td valign="middle" class="subtitulo">¿Cómo fue el grado de motivación al aprendizaje que inspiró el instructor?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p2" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p2" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p2" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p2" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">3</td>
      <td valign="middle" class="subtitulo">¿De qué forma considera Ud. que el instructor utilizó el material didáctico?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p3" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p3" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p3" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p3" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
        <tr>
      <td align="left" valign="middle" class="subtitulo">4</td>
      <td valign="middle" class="subtitulo">¿Con qué claridad y precisión expuso los temas el instructor?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p4" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p4" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p4" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p4" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
            <tr>
      <td align="left" valign="middle" class="subtitulo">5</td>
      <td valign="middle" class="subtitulo">¿Cómo fue el grado de absolución de consultas del instructor?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p5" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p5" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p5" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p5" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">6</td>
      <td valign="middle" class="subtitulo">¿Cómo fue la puntualidad del instructor para el desarrollo de las clases?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p6" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p6" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p6" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p6" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">7</td>
      <td valign="middle" class="subtitulo">¿Cómo fue el trato que le brindó el instructor durante la capacitación?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p7" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p7" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p7" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p7" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">8</td>
      <td valign="middle" class="subtitulo">¿Qué le pareció la infraestructura  del local de capacitación?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p8" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p8" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p8" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p8" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">9</td>
      <td valign="middle" class="subtitulo">¿Qué tan útil fue la utilización del sistema virtual?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p9" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p9" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p9" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p9" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">10</td>
      <td valign="middle" class="subtitulo">¿Qué le pareció los materiales provistos para el desarrollo del curso?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p10" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p10" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p10" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p10" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">11</td>
      <td valign="middle" class="subtitulo">¿Qué le pareció la utilización de la tablet en el curso?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p11" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p11" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p11" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p11" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">12</td>
      <td valign="middle" class="subtitulo">¿Cómo fue la iluminación y ventilación de las aulas de capacitación?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p12" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p12" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p12" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p12" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">13</td>
      <td valign="middle" class="subtitulo">¿Cómo fue la calidad de los contenido de manuales usados para el curso?</td>
      <td align="center" valign="middle" bgcolor="#00CCFF"><label>
        <input type="radio" name="p13" id="radio" value="4" style="width:35px;height:35px;border: 2px solid #b71;" />
      </label></td>
      <td align="center" valign="middle" bgcolor="#99FFCC"><input type="radio" name="p13" id="radio2" value="3" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFFF99"><input type="radio" name="p13" id="radio3" value="2" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
      <td align="center" valign="middle" bgcolor="#FFCCFF"><input type="radio" name="p13" id="radio4" value="1" style="width:35px;height:35px;border: 2px solid #b71;" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle" class="subtitulo">&nbsp;</td>
      <td valign="middle" class="subtitulo">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#00CCFF">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#99FFCC">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#FFFF99">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#FFCCFF">&nbsp;</td>
    </tr>
    <tr>
      <td height="90" align="left" valign="middle" class="subtitulo">&nbsp;</td>
      <td valign="middle" class="subtitulo">&nbsp;</td>
      <td colspan="4" align="left" valign="top" bgcolor="#00CCFF"><label>
        <input name="button" type="submit" class="subtitulo" id="button" value="    ENVIAR   " />
      </label>
        <label>
          <input name="dni" type="hidden" id="dni" value="<?php echo $dni; ?>" />
      </label></td>
    </tr>
  </table>
</form>
<?php
}
?>
</body>
</html>