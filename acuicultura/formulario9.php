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
$mysql="SELECT * FROM acu_seccion9 WHERE id9='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id9=$row['id9'];
$s9_1=$row['s9_1'];
$s9_2_1=$row['s9_2_1'];
$s9_2_1_a=$row['s9_2_1_a'];
$s9_2_2=$row['s9_2_2'];
$s9_2_2_a=$row['s9_2_2_a'];
$s9_2_3=$row['s9_2_3'];
$s9_2_3_a=$row['s9_2_3_a'];
$s9_2_4=$row['s9_2_4'];
$s9_2_4_o=$row['s9_2_4_o'];
$s9_2_4_a=$row['s9_2_4_a'];
$s9_3_1=$row['s9_3_1'];
$s9_3_1_e=$row['s9_3_1_e'];
$s9_3_2=$row['s9_3_2'];
$s9_3_2_e=$row['s9_3_2_e'];
$s9_3_3=$row['s9_3_3'];
$s9_4_1=$row['s9_4_1'];
$s9_4_1_1=$row['s9_4_1_1'];
$s9_4_1_2=$row['s9_4_1_2'];
$s9_4_1_3=$row['s9_4_1_3'];
$s9_4_1_4=$row['s9_4_1_4'];
$s9_4_1_5=$row['s9_4_1_5'];
$s9_4_1_6=$row['s9_4_1_6'];
$s9_4_1_7=$row['s9_4_1_7'];
$s9_4_1_8=$row['s9_4_1_8'];
$s9_4_1_9=$row['s9_4_1_9'];
$s9_4_1_10=$row['s9_4_1_10'];
$s9_4_1_11=$row['s9_4_1_11'];
$s9_4_1_12=$row['s9_4_1_12'];
$s9_5_1=$row['s9_5_1'];
$s9_5_1_1=$row['s9_5_1_1'];
$s9_5_1_2=$row['s9_5_1_2'];
$s9_5_1_3=$row['s9_5_1_3'];
$s9_5_1_4=$row['s9_5_1_4'];
$s9_5_1_5=$row['s9_5_1_5'];
$s9_5_1_6=$row['s9_5_1_6'];
$s9_5_1_7=$row['s9_5_1_7'];
$s9_5_1_8=$row['s9_5_1_8'];
$s9_5_1_9=$row['s9_5_1_9'];
$s9_5_1_10=$row['s9_5_1_10'];
$s9_5_1_11=$row['s9_5_1_11'];
$s9_5_1_12=$row['s9_5_1_12'];
$s9_6_1=$row['s9_6_1'];
$s9_6_2=$row['s9_6_2'];
$s9_6_3=$row['s9_6_3'];
$s9_6_4=$row['s9_6_4'];
$s9_6_5=$row['s9_6_5'];
$s9_6_6=$row['s9_6_6'];	
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
<form id="form9" name="form9" method="post" action="variables9.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><strong>SECCIÓN IX: SEGURO, SALUD Y DISCAPACIDAD</strong></td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto">1. ¿CONOCE USTED ALGÚN TIPO DE SEGURO DE SALUD?</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><span class="letra_frm">
                <input name="s9_1" type="text" id="s9_1" onchange="return saltar(this.name,'s9_3_1','2')" onkeypress="return numeros12(event)" value="<?php echo $s9_1; ?>" size="3" maxlength="1"/>
              </span></td>
            </tr>
            <tr id="seguro1">
              <td align="left"><span class="texto">2. ¿CUÁL O CUÁLES SON LOS TIPOS DE SEGUROS DE SALUD QUE USTED CONOCE?</span></td>
            </tr>
            <tr id="seguro2">
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                              <tr>
                  <td width="41%" align="left"><strong>Tipos de seguro</strong></td>
                  <td width="11%" align="left">&nbsp;</td>
                  <td width="48%" align="left"><strong>¿Está afiliado?</strong></td>
                </tr>
                <tr>
                  <td width="41%" align="left">EsSalud</td>
                  <td width="11%" align="left"><input name="s9_2_1" type="text" id="s9_2_1" onchange="return saltar(this.name,'s9_2_2','0')" onkeypress="return binario(event)" value="<?php echo $s9_2_1; ?>" size="3" maxlength="1"/></td>
                  <td width="48%" align="left"><input name="s9_2_1_a" type="text" id="s9_2_1_a" onkeypress="return numeros12(event)" value="<?php echo $s9_2_1_a; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left">Seguro integral de salud</td>
                  <td align="left"><input name="s9_2_2" type="text" id="s9_2_2" onchange="return saltar(this.name,'s9_2_3','0')" onkeypress="return binario(event)" value="<?php echo $s9_2_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s9_2_2_a" type="text" id="s9_2_2_a" onkeypress="return numeros12(event)" value="<?php echo $s9_2_2_a; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left">Entidad prestadora de salud</td>
                  <td align="left"><input name="s9_2_3" type="text" id="s9_2_3" onchange="return saltar(this.name,'s9_2_4','0')" onkeypress="return binario(event)" value="<?php echo $s9_2_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s9_2_3_a" type="text" id="s9_2_3_a" onkeypress="return numeros12(event)" value="<?php echo $s9_2_3_a; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s9_2_4" type="text" id="s9_2_4" onchange="return otros(this.name,'s9_2_4_o','1')" onkeypress="return binario(event)" onkeyup="return na2('s9_2_','4','s9_2_4')" value="<?php echo $s9_2_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s9_2_4_a" type="text" id="s9_2_4_a" onkeypress="return numeros12(event)" value="<?php echo $s9_2_4_a; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left">Si es otro, especifique</td>
                  <td colspan="2" align="left"><input name="s9_2_4_o" type="text" id="s9_2_4_o" onkeypress="return letras(event)" value="<?php echo $s9_2_4_o; ?>" size="18" maxlength="80" readonly="readonly"/></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td align="left" class="letra_frm">3. ¿ESTÁ AFILIADO A ALGÚN TIPO DE SEGURO?</td>
            </tr>
            <tr >
              <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="28%" align="left" class="letra_frm"><strong>Tipo de seguro</strong></td>
                  <td width="9%" align="left">&nbsp;</td>
                  <td width="63%" align="left"><strong>Nombre de seguro</strong></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">De vida</td>
                  <td align="left"><input name="s9_3_1" type="text" id="s9_3_1" onchange="return saltar(this.name,'s9_3_2','0')" onkeypress="return binario(event)"  onkeyup="return otros(this.name,'s9_3_2_e2','1')" value="<?php echo $s9_3_1; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s9_3_2_e2" type="text" id="s9_3_2_e2" onkeypress="return letras(event)" value="<?php echo $s9_3_2_e2; ?>" size="22" maxlength="80" readonly="readonly" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">De pensiones</td>
                  <td align="left"><input name="s9_3_2" type="text" id="s9_3_2" onchange="return saltar(this.name,'s9_3_3','0')" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s9_3_2_e','1')" value="<?php echo $s9_3_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s9_3_2_e" type="text" id="s9_3_2_e" onkeypress="return letras(event)" value="<?php echo $s9_3_2_e; ?>" size="22" maxlength="80" readonly="readonly" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">NO ESTÁ AFILIADO</td>
                  <td align="left"><input name="s9_3_3" type="text" id="s9_3_3" onkeypress="return binario(event)" onkeyup="return nin('s9_3_','2','s9_3_3')" value="<?php echo $s9_3_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="20" align="left" class="texto">&nbsp;</td>
            </tr>
            </table></td>
          <td width="50%" align="left" valign="top" ><table width="100%" border="0" cellspacing="1">
            <tr>
              <td height="22" align="left" class="texto">4. EN LOS ÚLTIMOS 12 MESES ¿HA SUFRIDO ALGUNA ENFERMEDAD PRODUCTO DE SU TRABAJO?</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="25%" align="left" class="letra_frm">Si/No
                    <input name="s9_4_1" type="text" id="s9_4_1" onchange="return saltar(this.name,'s9_5_1','2')" onkeypress="return numeros12(event)" value="<?php echo $s9_4_1; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm"><table width="100%" border="0" cellpadding="1" cellspacing="1" id="calendario1">
                    <tr class="textin">
                      <td width="11%" align="center">Ene</td>
                      <td width="9%" align="center">Feb</td>
                      <td width="9%" align="center">Mar</td>
                      <td width="9%" align="center">Abr</td>
                      <td width="8%" align="center">May</td>
                      <td width="8%" align="center">Jun</td>
                      <td width="6%" align="center">Jul</td>
                      <td width="8%" align="center">Ago</td>
                      <td width="7%" align="center">Set</td>
                      <td width="8%" align="center">Oct</td>
                      <td width="8%" align="center">Nov</td>
                      <td width="9%" align="center">Dic</td>
                      </tr>
                    <tr>
                      <td align="center"><input name="s9_4_1_1" type="text" id="s9_4_1_1" onkeypress="return binario(event)" value="<?php echo $s9_4_1_1; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_2" type="text" id="s9_4_1_2" onkeypress="return binario(event)" value="<?php echo $s9_4_1_2; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_3" type="text" id="s9_4_1_3" onkeypress="return binario(event)" value="<?php echo $s9_4_1_3; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_4" type="text" id="s9_4_1_4" onkeypress="return binario(event)" value="<?php echo $s9_4_1_4; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_5" type="text" id="s9_4_1_5" onkeypress="return binario(event)" value="<?php echo $s9_4_1_5; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_6" type="text" id="s9_4_1_6" onkeypress="return binario(event)" value="<?php echo $s9_4_1_6; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_7" type="text" id="s9_4_1_7" onkeypress="return binario(event)" value="<?php echo $s9_4_1_7; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_8" type="text" id="s9_4_1_8" onkeypress="return binario(event)" value="<?php echo $s9_4_1_8; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_9" type="text" id="s9_4_1_9" onkeypress="return binario(event)" value="<?php echo $s9_4_1_9; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_10" type="text" id="s9_4_1_10" onkeypress="return binario(event)" value="<?php echo $s9_4_1_10; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_11" type="text" id="s9_4_1_11" onkeypress="return binario(event)" value="<?php echo $s9_4_1_11; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_4_1_12" type="text" id="s9_4_1_12" onkeypress="return binario(event)" value="<?php echo $s9_4_1_12; ?>" size="2" maxlength="1" onkeyup="return na2('s9_4_1_','12','s9_4_1_12')"/></td>
                      </tr>
                    </table></td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="29" align="left"><span class="letra_frm">5. EN LOS ÚLTIMOS 12 MESES ¿HA SUFRIDO ALGÚN  ACCIDENTE DURANTE SU TRABAJO?</span></td>
            </tr>
            <tr>
              <td height="28" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="25%" align="left" class="letra_frm">Si/No
                    <input name="s9_5_1" type="text" id="s9_5_1"  onchange="return saltar(this.name,'s9_6_1','2')" onkeypress="return numeros12(event)" value="<?php echo $s9_5_1; ?>" size="3" maxlength="1" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm"><table width="100%" border="0" cellpadding="1" cellspacing="1" id="calendario2">
                    <tr class="textin">
                      <td width="11%" align="center">Ene</td>
                      <td width="9%" align="center">Feb</td>
                      <td width="9%" align="center">Mar</td>
                      <td width="9%" align="center">Abr</td>
                      <td width="8%" align="center">May</td>
                      <td width="8%" align="center">Jun</td>
                      <td width="6%" align="center">Jul</td>
                      <td width="8%" align="center">Ago</td>
                      <td width="7%" align="center">Set</td>
                      <td width="8%" align="center">Oct</td>
                      <td width="8%" align="center">Nov</td>
                      <td width="9%" align="center">Dic</td>
                    </tr>
                    <tr>
                      <td align="center"><input name="s9_5_1_1" type="text" id="s9_5_1_1" onkeypress="return binario(event)" value="<?php echo $s9_5_1_1; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_2" type="text" id="s9_5_1_2" onkeypress="return binario(event)" value="<?php echo $s9_5_1_2; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_3" type="text" id="s9_5_1_3" onkeypress="return binario(event)" value="<?php echo $s9_5_1_3; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_4" type="text" id="s9_5_1_4" onkeypress="return binario(event)" value="<?php echo $s9_5_1_4; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_5" type="text" id="s9_5_1_5" onkeypress="return binario(event)" value="<?php echo $s9_5_1_5; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_6" type="text" id="s9_5_1_6" onkeypress="return binario(event)" value="<?php echo $s9_5_1_6; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_7" type="text" id="s9_5_1_7" onkeypress="return binario(event)" value="<?php echo $s9_5_1_7; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_8" type="text" id="s9_5_1_8" onkeypress="return binario(event)" value="<?php echo $s9_5_1_8; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_9" type="text" id="s9_5_1_9" onkeypress="return binario(event)" value="<?php echo $s9_5_1_9; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_10" type="text" id="s9_5_1_10" onkeypress="return binario(event)" value="<?php echo $s9_5_1_10; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_11" type="text" id="s9_5_1_11" onkeypress="return binario(event)" value="<?php echo $s9_5_1_11; ?>" size="2" maxlength="1"/></td>
                      <td align="center"><input name="s9_5_1_12" type="text" id="s9_5_1_12" onkeypress="return binario(event)" value="<?php echo $s9_5_1_12; ?>" size="2" maxlength="1" onkeyup="return na2('s9_5_1_','12','s9_5_1_12')"/></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="18" align="left"><span class="texto">6 SR(A). TIENE USTED ALGUNA DIFICULTAD O LIMITACIÓN PERMANENTE</span></td>
            </tr>
            <tr>
              <td height="18" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="60%" align="left" class="letra_frm">Para ver, aun usando lentes</td>
                  <td width="40%" align="left"><input name="s9_6_1" type="text" id="s9_6_1" onkeypress="return binario(event)" value="<?php echo $s9_6_1; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td height="31" align="left" class="letra_frm">Para oír, aun usando audífonos para sordera</td>
                  <td align="left"><input name="s9_6_2" type="text" id="s9_6_2" onkeypress="return binario(event)" value="<?php echo $s9_6_2; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Para hablar (Entonar/vocalizar)</td>
                  <td align="left"><input name="s9_6_3" type="text" id="s9_6_3" onkeypress="return binario(event)" value="<?php echo $s9_6_3; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Para usar brazos y manos/piernas y pies?</td>
                  <td align="left"><input name="s9_6_4" type="text" id="s9_6_4" onkeypress="return binario(event)" value="<?php echo $s9_6_4; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Alguna otra dificultad o limitación</td>
                  <td align="left"><input name="s9_6_5" type="text" id="s9_6_5" onkeypress="return binario(event)" value="<?php echo $s9_6_5; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">NINGUNA</td>
                  <td align="left"><input name="s9_6_6" type="text" id="s9_6_6" onkeypress="return binario(event)" onkeyup="return nin('s9_6_','5','s9_6_6')" value="<?php echo $s9_6_6; ?>" size="3" maxlength="1"/></td>
                  </tr>
                </table></td>
            </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p><span class="texto"><strong><strong>
        <input name="frm9" type="hidden" id="frm9" value="1" />
      </strong></strong></span></p></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id9==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion9()"/>
        <strong><strong>
        <input name="opc9" type="hidden" id="opc9" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion9()" />
        <strong><strong>
        <input name="opc9" type="hidden" id="opc9" value="2" />
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