<?php  session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="validacion_1.js"></script>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
//mostar datos
if($_SESSION['id1']!=NULL)
{ 

$mysql="SELECT * FROM acu_seccion7 WHERE id7='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id7=$row['id7'];
$s7_1=$row['s7_1'];
$s7_1_t=$row['s7_1_t'];
$s7_1_h=$row['s7_1_h'];
$s7_1_m=$row['s7_1_m'];
$s7_1_t_p=$row['s7_1_t_p'];
$s7_1_h_p=$row['s7_1_h_p'];
$s7_1_m_p=$row['s7_1_m_p'];
$s7_1_r_p=$row['s7_1_r_p'];
$s7_1_t_e=$row['s7_1_t_e'];
$s7_1_h_e=$row['s7_1_h_e'];
$s7_1_m_e=$row['s7_1_m_e'];
$s7_1_r_e=$row['s7_1_r_e'];
$s7_2=$row['s7_2'];
$s7_3=$row['s7_3'];
$s7_3_c=$row['s7_3_c'];
$s7_4=$row['s7_4'];
$s7_4_c=$row['s7_4_c'];	
}
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de registro de CENPESCO</title>
<style type="text/css">
@import url("estilos.css"); 
</style>

</head>
<?php  
$mysql="SELECT * FROM acu_seccion2 WHERE id2='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

if ($row = mysql_fetch_array($r))
{
$vr13=$row['s2_2'];

}

?>
<body>
<form id="form7" name="form7" method="post" action="variables7.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><p><strong>SECCIÓN VII: EMPLEO</strong></p></td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto">1.EN LOS LOS ÚLTIMOS 12 MESES ¿TUVO USTED TRABAJADORES REMUNERADOS A SU CARGO? </td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="18%" align="left"><label> Si/No</label></td>
                  <td width="14%" align="left">Total</td>
                  <td width="16%" align="left">Hombres</td>
                  <td width="15%" align="left">Mujeres</td>
                  <td width="37%" align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left"><input name="s7_1" type="text" id="s7_1" onchange="return saltar(this.name,'s7_4','2')"  onkeypress="return numeros12(event)"  onkeyup="return remuneracion1()" value="<?php echo $s7_1; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s7_1_t" type="text" id="s7_1_t"  onkeypress="return numeros(event)" value="<?php echo $s7_1_t; ?>" size="3" maxlength="3" readonly="readonly" /></td>
                  <td align="left"><input name="s7_1_h" type="text" id="s7_1_h" onkeypress="return numeros(event)" value="<?php echo $s7_1_h; ?>" size="3" maxlength="3" readonly="readonly"/></td>
                  <td align="left"><input name="s7_1_m" type="text" id="s7_1_m" onchange="return suma1('s7_1_t','s7_1_h','s7_1_m')"  onkeypress="return numeros(event)" value="<?php echo $s7_1_m; ?>" size="3" maxlength="3" readonly="readonly"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td colspan="2" align="left">Permanentes</td>
                  <td align="left">Remuneración promedio</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input name="s7_1_t_p" type="text" id="s7_1_t_p" onkeypress="return numeros(event)" value="<?php echo $s7_1_t_p; ?>" size="3" maxlength="3" readonly="readonly" /></td>
                  <td align="left"><input name="s7_1_h_p" type="text" id="s7_1_h_p"  onkeypress="return numeros(event)" value="<?php echo $s7_1_h_p; ?>" size="3" maxlength="3" readonly="readonly"/></td>
                  <td align="left"><input name="s7_1_m_p" type="text" id="s7_1_m_p" onchange="return suma1('s7_1_t_p','s7_1_h_p','s7_1_m_p')" onkeypress="return numeros(event)" value="<?php echo $s7_1_m_p; ?>" size="3" maxlength="3" readonly="readonly"/></td>
                  <td align="left"><input name="s7_1_r_p" type="text" id="s7_1_r_p" onkeypress="return numeros(event)" value="<?php echo $s7_1_r_p; ?>" size="6" maxlength="5" readonly="readonly"/></td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td colspan="2" align="left">Eventuales</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><input name="s7_1_t_e" type="text" id="s7_1_t_e" onkeypress="return numeros(event)" value="<?php echo $s7_1_t_e; ?>" size="3" maxlength="3" readonly="readonly" onchange="return suma1('s7_1_t','s7_1_t_p','s7_1_t_e')"/></td>
                  <td align="left"><input name="s7_1_h_e" type="text" id="s7_1_h_e" onkeypress="return numeros(event)" value="<?php echo $s7_1_h_e; ?>" size="3" maxlength="3" readonly="readonly" onchange="return suma1('s7_1_h','s7_1_h_e','s7_1_h_p')"/></td>
                  <td align="left"><input name="s7_1_m_e" type="text" id="s7_1_m_e" onchange="return suma1('s7_1_t_e','s7_1_h_e','s7_1_m_e')" onkeypress="return numeros(event)" value="<?php echo $s7_m_e; ?>" size="3" maxlength="3" readonly="readonly" /></td>
                  <td align="left"><input name="s7_1_r_e" type="text" id="s7_1_r_e" onkeypress="return numeros(event)" value="<?php echo $s7_1_r_e; ?>" size="6" maxlength="5" readonly="readonly"/></td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
            </table></td>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td height="22" align="left" class="texto">2. ¿SUS TRABAJADORES CUENTAN CON SEGURO DE SALUD?</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3">Si/No 
                <input name="s7_2" type="text" id="s7_2" onkeypress="return numeros12(event)" value="<?php echo $s7_2; ?>" size="3" maxlength="1"/></td>
            </tr>
            <tr>
              <td height="37" align="left" >3. ¿TIENE USTED TRABAJADORESCON ALGUNA DIFICULTAD O LIMITACIÓN PERMANENTE PARA DESEMPEÑAR SUS LABORES?</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="450" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="114" align="left" scope="col"><span class="texto">Si/No</span>
<input name="s7_3" type="text" id="s7_3" onkeypress="return numeros12(event)" onkeyup="return otros(this.name,'s7_3_c','1')" value="<?php echo $s7_3; ?>" size="3" maxlength="1"/></th>
                  <th width="336" align="left" class="texto" scope="col">¿Cuántos?
                    <input name="s7_3_c" type="text" id="s7_3_c" onkeypress="return numeros(event)" value="<?php echo $s7_3_c; ?>" size="4" maxlength="3"/></th>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="37" align="left" >4. ¿LE AYUDAN? PERSONAS DE SU HOGAR SIN RECIBIR REMUNERACIÓN FIJA</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="450" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="114" align="left" scope="col">Si/No 
                    <input name="s7_4" type="text" <?php if($vr13==2) {  ?> disabled="disabled" <?php }  ?> id="s7_4" onkeypress="return numeros12(event)" onkeyup="return otros(this.name,'s7_4_c','1')" value="<?php echo $s7_4; ?>" size="3" maxlength="1"/></th>
                  <th width="336" align="left" class="texto" scope="col">¿Cuántos?
                    <input name="s7_4_c" type="text" <?php if($vr13==2) {  ?> disabled="disabled" <?php }  ?> id="s7_4_c" onkeypress="return numeros(event)" value="<?php echo $s7_4_c; ?>" size="4" maxlength="3"/></th>
                </tr>
              </table></td>
            </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p><span class="texto"><strong><strong>
        <input name="frm7" type="hidden" id="frm7" value="1" />
      </strong></strong></span></p></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id7==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion7()"/>
        <strong><strong>
        <input name="opc7" type="hidden" id="opc7" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion7()" />
        <strong><strong>
        <input name="opc7" type="hidden" id="opc7" value="2" />
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