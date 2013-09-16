<?php  session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
//mostar datos
if($_SESSION['id1']!=NULL)
{ 

$mysql="SELECT * FROM acu_seccion6 WHERE id6='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id6=$row['id6'];
$s6_1_1=$row['s6_1_1'];
$s6_1_2=$row['s6_1_2'];
$s6_1_3=$row['s6_1_3'];
$s6_1_4=$row['s6_1_4'];
$s6_1_5=$row['s6_1_5'];
$s6_1_6=$row['s6_1_6'];
$s6_1_7=$row['s6_1_7'];
$s6_1_7_o=$row['s6_1_7_o'];
$s6_1_8=$row['s6_1_8'];
$s6_2_1=$row['s6_2_1'];
$s6_2_2=$row['s6_2_2'];
$s6_2_3=$row['s6_2_3'];
$s6_2_4=$row['s6_2_4'];
$s6_2_5=$row['s6_2_5'];
$s6_2_5_o=$row['s6_2_5_o'];
$s6_2_6=$row['s6_2_6'];	
}
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de registro de CENPESCO</title>
<style type="text/css">
@import url("estilos.css"); 
</style>
<script type="text/javascript" src="validacion_1.js"></script>
</head>

<body>
<form id="form6" name="form6" method="post" action="variables6.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="21" align="left" class="texto_mediano" ><p><strong>SECCIÓN VI: ASOCIATIVIDAD</strong></p></td>
    </tr>
   <tr>
      <td height="21" align="left" class="texto_mediano" ><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto">1. ¿EN QUÉ ORGANIZACIÓN PARTICIPA COMO ACUICULTOR?</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="33%" align="left"><label> Sindicato</label></td>
                  <td width="11%" align="left"><input name="s6_1_1" type="text" id="s6_1_1" onkeypress="return binario(event)" value="<?php echo $s6_1_1; ?>" size="3" maxlength="1"/></td>
                  <td width="56%" align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Gremio</td>
                  <td align="left"><input name="s6_1_2" type="text" id="s6_1_2" onkeypress="return binario(event)" value="<?php echo $s6_1_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Asociación</td>
                  <td align="left"><input name="s6_1_3" type="text" id="s6_1_3" onkeypress="return binario(event)" value="<?php echo $s6_1_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Organización comunitaria</td>
                  <td align="left"><input name="s6_1_4" type="text" id="s6_1_4" onkeypress="return binario(event)" value="<?php echo $s6_1_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Consorcio</td>
                  <td align="left"><input name="s6_1_5" type="text" id="s6_1_5" onkeypress="return binario(event)" value="<?php echo $s6_1_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Cooperativa</td>
                  <td align="left"><input name="s6_1_6" type="text" id="s6_1_6" onkeypress="return binario(event)" value="<?php echo $s6_1_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s6_1_7" type="text" id="s6_1_7" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s6_1_7_o','1')" value="<?php echo $s6_1_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left">Especifique
                    <input name="s6_1_7_o" type="text" id="s6_1_7_o" onkeypress="return letras(event)" value="<?php echo $s6_1_7_o; ?>" size="12" maxlength="100" readonly="readonly" /></td>
                  </tr>
                <tr>
                  <td align="left">Ninguna</td>
                  <td align="left"><input name="s6_1_8" type="text" id="s6_1_8" onkeypress="return binario(event)" value="<?php echo $s6_1_8; ?>" size="3" maxlength="1"  onblur="return nin('s6_1_','7','s6_1_8')" onchange="return sec6('s6_2_','s6_1_8','6')"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
            </table></td>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr id="regla_b0">
              <td height="22" align="left" class="texto">2. ¿QUÉ BENEFICIOS OBTIENE DE SU ORGANIZACIÓN?</td>
            </tr>
            <tr id="regla_b1">
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="33%" align="left">Aumenta los ingresos</td>
                  <td width="10%" align="left"><input name="s6_2_1" type="text" id="s6_2_1" onkeypress="return binario(event)" value="<?php echo $s6_2_1; ?>" size="3" maxlength="1"/></td>
                  <td width="57%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Disminuye los costos</td>
                  <td align="left"><input name="s6_2_2" type="text" id="s6_2_2" onkeypress="return binario(event)" value="<?php echo $s6_2_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Recibe asistencia técnica</td>
                  <td align="left"><input name="s6_2_3" type="text" id="s6_2_3" onkeypress="return binario(event)" value="<?php echo $s6_2_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Mejora posicionamiento en el mercado</td>
                  <td align="left"><input name="s6_2_4" type="text" id="s6_2_4" onkeypress="return binario(event)" value="<?php echo $s6_2_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s6_2_5" type="text" id="s6_2_5" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s6_2_5_o','1')" value="<?php echo $s6_2_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">Especifique
                    <input name="s6_2_5_o" type="text" id="s6_2_5_o" onkeypress="return letras(event)" value="<?php echo $s6_2_5_o; ?>" size="12" maxlength="100" readonly="readonly"/></td>
                </tr>
                <tr>
                  <td align="left">Ninguna</td>
                  <td align="left"><input name="s6_2_6" type="text" id="s6_2_6" onkeypress="return binario(event)" onblur="return nin('s6_2_','5','s6_2_6')" value="<?php echo $s6_2_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p><span class="texto"><strong><strong>
        <input name="frm6" type="hidden" id="frm6" value="1" />
      </strong></strong></span></p></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id6==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion6()"/>
        <strong><strong>
        <input name="opc6" type="hidden" id="opc6" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion6()" />
        <strong><strong>
        <input name="opc6" type="hidden" id="opc6" value="2" />
        <?php
		 }
		 ?>
      </strong></strong></td>
    </tr>
  </table>
  <br />
  <br />
</form>
</body>
</html>