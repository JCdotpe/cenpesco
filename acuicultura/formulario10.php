<?php  session_start();
//$ubigeo=$_SESSION['ubigeo'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
$cod_odei='11';
//mostar datos
if($_SESSION['id1']!=NULL)
{ 
$mysql="SELECT * FROM acu_seccion10 WHERE id10='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
	
$id10=$row['id10'];
$s10_1_1=$row['s10_1_1'];
$s10_1_2=$row['s10_1_2'];
$s10_1_3=$row['s10_1_3'];
$s10_1_4=$row['s10_1_4'];
$s10_1_5=$row['s10_1_5'];
$s10_1_6=$row['s10_1_6'];
$s10_1_7=$row['s10_1_7'];
$s10_1_8=$row['s10_1_8'];
$s10_1_9=$row['s10_1_9'];
$s10_1_10=$row['s10_1_10'];
$s10_1_11=$row['s10_1_11'];
$s10_2=$row['s10_2'];
$s10_3_1=$row['s10_3_1'];
$s10_3_2=$row['s10_3_2'];
$s10_3_3=$row['s10_3_3'];
$s10_3_4=$row['s10_3_4'];
$s10_3_5=$row['s10_3_5'];
$s10_3_6=$row['s10_3_6'];
$s10_3_7=$row['s10_3_7'];
$s10_3_8=$row['s10_3_8'];
$s10_3_9=$row['s10_3_9'];
$s10_3_10=$row['s10_3_10'];
$s10_3_10_o=$row['s10_3_10_o'];
$s10_4_1=$row['s10_4_1'];
$s10_4_1p=$row['s10_4_1p'];
$s10_4_1g=$row['s10_4_1g'];
$s10_4_1u=$row['s10_4_1u'];
$s10_4_2=$row['s10_4_2'];
$s10_4_2p=$row['s10_4_2p'];
$s10_4_2g=$row['s10_4_2g'];
$s10_4_2u=$row['s10_4_2u'];
$s10_4_3=$row['s10_4_3'];
$s10_4_3p=$row['s10_4_3p'];
$s10_4_3g=$row['s10_4_3g'];
$s10_4_3u=$row['s10_4_3u'];
$s10_4_4=$row['s10_4_4'];
$s10_4_4p=$row['s10_4_4p'];
$s10_4_4g=$row['s10_4_4g'];
$s10_4_4u=$row['s10_4_4u'];
$s10_4_5=$row['s10_4_5'];
$s10_4_5p=$row['s10_4_5p'];
$s10_4_5g=$row['s10_4_5g'];
$s10_4_5u=$row['s10_4_5u'];
$s10_4_6=$row['s10_4_6'];
$s10_4_6p=$row['s10_4_6p'];
$s10_4_6g=$row['s10_4_6g'];
$s10_4_6u=$row['s10_4_6u'];
$s10_4_7=$row['s10_4_7'];
$s10_4_7p=$row['s10_4_7p'];
$s10_4_7g=$row['s10_4_7g'];
$s10_4_7u=$row['s10_4_7u'];
$s10_4_8=$row['s10_4_8'];
$s10_4_8p=$row['s10_4_8p'];
$s10_4_8g=$row['s10_4_8g'];
$s10_4_8u=$row['s10_4_8u'];
$s10_4_9=$row['s10_4_9'];
$s10_4_9p=$row['s10_4_9p'];
$s10_4_9g=$row['s10_4_9g'];
$s10_4_9u=$row['s10_4_9u'];
$s10_4_10=$row['s10_4_10'];
$s10_4_10p=$row['s10_4_10p'];
$s10_4_10g=$row['s10_4_10g'];
$s10_4_10u=$row['s10_4_10u'];
$s10_4_11=$row['s10_4_11'];
$s10_4_11_o=$row['s10_4_11_o'];
$s10_4_11p=$row['s10_4_11p'];
$s10_4_11g=$row['s10_4_11g'];
$s10_4_11u=$row['s10_4_11u'];
$s10_5_1=$row['s10_5_1'];
$s10_5_2=$row['s10_5_2'];
$s10_5_3=$row['s10_5_3'];
$s10_6=$row['s10_6'];
$s10_7_1=$row['s10_7_1'];
$s10_7_1_u=$row['s10_7_1_u'];
$s10_7_2=$row['s10_7_2'];
$s10_7_2_u=$row['s10_7_2_u'];
$s10_7_3=$row['s10_7_3'];
$s10_7_3_u=$row['s10_7_3_u'];
$s10_7_4=$row['s10_7_4'];
$s10_7_4_u=$row['s10_7_4_u'];
$s10_7_5=$row['s10_7_5'];
$s10_7_5_u=$row['s10_7_5_u'];
$s10_7_6=$row['s10_7_6'];
$s10_7_6_u=$row['s10_7_6_u'];
$s10_7_7=$row['s10_7_7'];
$s10_7_7_u=$row['s10_7_7_u'];
$s10_7_8=$row['s10_7_8'];
$s10_7_8_o=$row['s10_7_8_o'];
$s10_7_8_u=$row['s10_7_8_u'];
$s10_8_1=$row['s10_8_1'];
$s10_8_2=$row['s10_8_2'];
$s10_8_3=$row['s10_8_3'];
$s10_8_4=$row['s10_8_4'];
$s10_8_5=$row['s10_8_5'];
$s10_8_6=$row['s10_8_6'];
$s10_8_7=$row['s10_8_7'];
$s10_8_8=$row['s10_8_8'];
$s10_8_9=$row['s10_8_9'];
$s10_8_10=$row['s10_8_10'];
$s10_8_10_o=$row['s10_8_10_o'];
$s10_9_1=$row['s10_9_1'];
$s10_9_2=$row['s10_9_2'];
$s10_9_3=$row['s10_9_3'];
$s10_9_4=$row['s10_9_4'];
$s10_9_5=$row['s10_9_5'];
$s10_10=$row['s10_10'];
$s10_10_c=$row['s10_10_c'];
$s10_11_1=$row['s10_11_1'];
$s10_11_2=$row['s10_11_2'];
$s10_11_3=$row['s10_11_3'];
$s10_11_4=$row['s10_11_4'];
$s10_11_5=$row['s10_11_5'];
$s10_11_6=$row['s10_11_6'];
$obs=$row['obs'];
$f_d=$row['f_d'];
$f_m=$row['f_m'];
$f_a=$row['f_a'];
$res=$row['res'];
$emp=$row['emp'];
$emp_dni=$row['emp_dni'];
$ff_rr3=$row['ff_rr3'];
$user10=$row['user10'];	
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
<form id="form10" name="form10" method="post" action="variables10.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><strong>SECCIÓN X: CAPACITACIÓN Y ASISTENCIA TÉCNICA</strong></td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto">1. USTED CONOCE DE:</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="99%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="65%" align="left" class="letra_frm">Normatividad para la acuicultura</td>
                  <td width="35%" align="left" class="letra_frm"><input name="s10_1_1" type="text" id="s10_1_1" onkeypress="return binario(event)" value="<?php echo $s10_1_1;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Normas sanitarias acuícolas</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_2" type="text" id="s10_1_2"  onkeypress="return binario(event)" value="<?php  echo $s10_1_2;  ?>" size="3" maxlength="1"/>
                  </span></td>
                  </tr>
                <tr>
                  <td height="26" align="left">Tecnología acuícola</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_3" type="text" id="s10_1_3" onkeypress="return binario(event)" value="<?php echo $s10_1_3;  ?>" size="3" maxlength="1"/>
                  </span></td>
                  </tr>
                <tr>
                  <td align="left">Manejo ambiental en granjas</td>
                  <td align="left"><span class="letra_frm" id="s5_1_4">
                    <input name="s10_1_4" type="text" id="s10_1_4"  onkeypress="return binario(event)" value="<?php echo $s10_1_4;  ?>" size="3" maxlength="1"/>
                  </span></td>
                  </tr>
                <tr>
                  <td align="left">Programas de producción y/o alimentación</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_5" type="text" id="s10_1_5"  onkeypress="return binario(event)" value="<?php echo $s10_1_5;  ?>" size="3" maxlength="1"/>
                  </span></td>
                  </tr>
                <tr>
                  <td align="left">Manejo de residuos sólidos</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_6" type="text" id="s10_1_6" onkeypress="return binario(event)" value="<?php echo $s10_1_6;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Formalización</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_7" type="text" id="s10_1_7"  onkeypress="return binario(event)" value="<?php echo $s10_1_7;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Comercialización</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_8" type="text" id="s10_1_8" onkeypress="return binario(event)" value="<?php echo $s10_1_8;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Gestión empresarial</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_9" type="text" id="s10_1_9"  onkeypress="return binario(event)" value="<?php echo $s10_1_9;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Biocomercio, acuicultura orgánica, comercio justo</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_10" type="text" id="s10_1_10" onkeypress="return binario(event)" value="<?php echo $s10_1_10;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">NO CONOCE</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_1_11" type="text" id="s10_1_11" onkeypress="return binario(event)"  onblur="return nin('s10_1_','10','s10_1_11')" value="<?php echo $s10_1_11;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left"><span class="texto">2. EN LOS ÚLTIMOS 12 MESES ¿HA RECIBIDO ALGUNA CAPACITACIÓN RELACIONADA A LA ACUICULTURA?</span></td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3">No/Si  <span class="letra_frm">
                <input name="s10_2" type="text" id="s10_2" onkeyup="return saltar(this.name,'s10_5_1','2')" onkeypress="return numeros12(event)" value="<?php echo $s10_2;  ?>" size="3" maxlength="1"/>
              </span></td>
            </tr>
            <tr id="capa1">
              <td align="left" class="letra_frm">3.   ¿QUIÉN BRINDÓ ESA CAPACITACIÓN?</td>
            </tr>
            <tr id="capa2">
              <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="99%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="55%" align="left" class="letra_frm">Ministerio de Producción (PRODUCE).</td>
                  <td width="45%" align="left" class="letra_frm"><input name="s10_3_1" type="text" id="s10_3_1" onkeypress="return binario(event)" value="<?php echo $s10_3_1;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left">Fondo Nacional de Desarrollo Pesquero (FONDEPES)</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_2" type="text" id="s10_3_2"  onkeypress="return binario(event)" value="<?php echo $s10_3_2;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td height="26" align="left">Instituto de Investigación de la Amazonía Peruana (IIAP) </td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_3" type="text" id="s10_3_3" onkeypress="return binario(event)" value="<?php echo $s10_3_3;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Ministerio del Ambiente (MINAM)</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_4" type="text" id="s10_3_4"  onkeypress="return binario(event)" value="<?php echo $s10_3_4;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Servicio Nacional de Sanidad Pesquera (SANIPES)</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_5" type="text" id="s10_3_5"  onkeypress="return binario(event)" value="<?php echo $s10_3_5;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Instituto del Mar del Perú (IMARPE) </td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_6" type="text" id="s10_3_6"  onkeypress="return binario(event)" value="<?php echo $s10_3_6;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Dirección Regional de la Producción (DIREPRO)</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_7" type="text" id="s10_3_7"  onkeypress="return binario(event)" value="<?php echo $s10_3_7;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                 <tr>
                  <td align="left">Gobierno regional</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_8" type="text" id="s10_3_8"  onkeypress="return binario(event)" value="<?php echo $s10_3_8;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Organización No Gubernamental (ONG) </td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_9" type="text" id="s10_3_9"  onkeypress="return binario(event)" value="<?php echo $s10_3_9;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_10" type="text" id="s10_3_10" onchange="return otros(this.name,'s10_3_10_o','1')" onkeypress="return binario(event)"  onblur="return nino('s10_3_','9','s10_3_10')" value="<?php echo $s10_3_10;  ?>" size="3" maxlength="1"/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Especifique si es otro</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s10_3_10_o" type="text" id="s10_3_10_o" onkeypress="return letras(event)" value="<?php echo $s10_3_10_o;  ?>" size="14" maxlength="80" readonly="readonly"/>
                    </span></td>
                </tr>
                </table></td>
            </tr>
            <tr id="capa3">
              <td height="20" align="left" class="texto">4.¿CUALES FUERON LOS CURSOS O TEMAS DE CAPACITACIÓN RECIBIDAS?</td>
            </tr>
            <tr id="capa4">
              <td align="left"  style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="42%" align="left"><strong>Cursos o temas</strong></td>
                  <td width="12%" align="left">&nbsp;</td>
                  <td width="21%" align="left"><strong>Pagado ó Gratuito</strong></td>
                  <td width="25%" align="left"><p><strong>¿Lo aplica?</strong></p>
                    <p><strong> SI ó NO</strong></p></td>
                  </tr>
                <tr>
                  <td align="left">Normatividad para la acuicultura.</td>
                  <td align="left"><input name="s10_4_1" type="text" id="s10_4_1" onblur="return saltar(this.name,'s10_4_2','0')"   onkeypress="return binario(event)" value="<?php echo $s10_4_1;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_1p" type="text" id="s10_4_1p"   onkeypress="return numeros12(event)" value="<?php echo $s10_4_1p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_1u" type="text" id="s10_4_1u"  onkeypress="return numeros12(event)" value="<?php echo $s10_4_1u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Normas sanitarias acuícolas</td>
                  <td align="left"><input name="s10_4_2" type="text" id="s10_4_2"   onkeypress="return binario(event)" value="<?php echo $s10_4_2;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_3','0')"/></td>
                  <td align="left"><input name="s10_4_2p" type="text" id="s10_4_2p"  onkeypress="return numeros12(event)" value="<?php echo $s10_4_2p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_2u" type="text" id="s10_4_2u"  onkeypress="return numeros12(event)" value="<?php echo $s10_4_2u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Tecnología acuícola </td>
                  <td align="left"><input name="s10_4_3" type="text" id="s10_4_3"  onkeypress="return binario(event)" value="<?php echo $s10_4_3;  ?>" size="3" maxlength="1"  onblur="return saltar(this.name,'s10_4_4','0')"/></td>
                  <td align="left"><input name="s10_4_3p" type="text" id="s10_4_3p"  onkeypress="return numeros12(event)" value="<?php echo $s10_4_3p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_3u" type="text" id="s10_4_3u"  onkeypress="return numeros12(event)" value="<?php echo $s10_4_3u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Manejo ambiental en granjas</td>
                  <td align="left"><input name="s10_4_4" type="text" id="s10_4_4" onkeypress="return binario(event)" value="<?php echo $s10_4_4;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_5','0')"/></td>
                  <td align="left"><input name="s10_4_4p" type="text" id="s10_4_4p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_4p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_4u" type="text" id="s10_4_4u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_4u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Programas de producción y/o alimentación</td>
                  <td align="left"><input name="s10_4_5" type="text" id="s10_4_5" onkeypress="return binario(event)" value="<?php echo $s10_4_5;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_6','0')"/></td>
                  <td align="left"><input name="s10_4_5p" type="text" id="s10_4_5p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_5p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_5u" type="text" id="s10_4_5u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_5u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Manejo de residuos sólidos</td>
                  <td align="left"><input name="s10_4_6" type="text" id="s10_4_6" onkeypress="return binario(event)" value="<?php echo $s10_4_6;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_7','0')"/></td>
                  <td align="left"><input name="s10_4_6p" type="text" id="s10_4_6p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_6p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_6u" type="text" id="s10_4_6u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_6u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Formalización</td>
                  <td align="left"><input name="s10_4_7" type="text" id="s10_4_7" onkeypress="return binario(event)" value="<?php echo $s10_4_7;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_8','0')"/></td>
                  <td align="left"><input name="s10_4_7p" type="text" id="s10_4_7p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_7p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_7u" type="text" id="s10_4_7u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_7u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Comercialización</td>
                  <td align="left"><input name="s10_4_8" type="text" id="s10_4_8" onkeypress="return binario(event)" value="<?php echo $s10_4_8;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_9','0')"/></td>
                  <td align="left"><input name="s10_4_8p" type="text" id="s10_4_8p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_8p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_8u" type="text" id="s10_4_8u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_8u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Gestión empresarial</td>
                  <td align="left"><input name="s10_4_9" type="text" id="s10_4_9" onkeypress="return binario(event)" value="<?php echo $s10_4_9;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_10','0')"/></td>
                  <td align="left"><input name="s10_4_9p" type="text" id="s10_4_9p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_9p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_9u" type="text" id="s10_4_9u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_9u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Biocomercio/acuicultura orgánica/comercio <br />
                    justo</td>
                  <td align="left"><input name="s10_4_10" type="text" id="s10_4_10" onkeypress="return binario(event)" value="<?php echo $s10_4_10;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_4_11','0')"/></td>
                  <td align="left"><input name="s10_4_10p" type="text" id="s10_4_10p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_10p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_10u" type="text" id="s10_4_10u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_10u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s10_4_11" type="text" id="s10_4_11" onblur="return salta_s3(this.name,'1','s10_5_1')" onkeypress="return binario(event)" onkeyup="return na2('s10_4_','11','s10_4_10')" value="<?php echo $s10_4_11;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_11p" type="text" id="s10_4_11p" onkeypress="return numeros12(event)" value="<?php echo $s10_4_11p;  ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s10_4_11u" type="text" id="s10_4_11u" onkeypress="return numeros12(event)" value="<?php echo $s10_4_11u;  ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left">Especifique</td>
                  <td colspan="3" align="left"><input name="s10_4_11_o" type="text" id="s10_4_11_o" " onkeypress="return letras(event)" value="<?php echo $s10_4_11_o;  ?>" size="14" maxlength="100"/></td>
                  </tr>
                </table>                <span class="letra_frm">
                  </span></td>
            </tr>
            </table></td>
          <td width="50%" align="left" valign="top" ><table width="100%" border="0" cellspacing="1">
            <tr>
              <td height="22" align="left" class="texto">5. EN QUÉ TEMAS NECESITA CAPACITARSE</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="6%" align="left" class="letra_frm">1</td>
                  <td width="94%" align="left"><input name="s10_5_1" type="text" id="s10_5_1" onkeypress="return letras(event)" value="<?php echo $s10_5_1;  ?>" size="42" maxlength="120"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">2</td>
                  <td align="left"><input name="s10_5_2" type="text" id="s10_5_2" onkeypress="return letras(event)" value="<?php echo $s10_5_2;  ?>" size="42" maxlength="120" onkeyup="return aviso('s10_5_1','Debe ingresar al menos un tema')" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">3</td>
                  <td align="left"><input name="s10_5_3" type="text" id="s10_5_3" onkeypress="return letras(event)" value="<?php echo $s10_5_3;  ?>" size="42" maxlength="142"/></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="29" align="left"><span class="letra_frm">6. EN LOS ÚLTIMOS 12 MESES ¿HA RECIBIDO ASISTENCIA TÉCNICA EN SU ACTIVIDAD?</span></td>
            </tr>
            <tr>
              <td height="28" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="s10_6" type="text" id="s10_6" onchange="return saltar(this.name,'s10_9_1','2')"  onkeypress="return numeros12(event)" value="<?php echo $s10_6;  ?>" size="3" maxlength="1"/></td>
            </tr>
            <tr id="asistencia1">
              <td height="18" align="left"><span class="texto">7. ¿QUÉ TIPO DE ASISTENCIA TÉCNICA RECIBIÓ?</span></td>
            </tr>
            <tr id="asistencia2">
              <td height="18" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                              <tr>
                  <td width="42%" align="left" class="letra_frm"><strong>Asistencia</strong></td>
                  <td width="18%" align="left">&nbsp;</td>
                  <td width="40%" align="left"><strong>¿Lo aplica? Sí o No</strong></td>
                </tr>
                <tr>
                  <td width="42%" align="left" class="letra_frm">Asistencia en sanidad acuícola</td>
                  <td width="18%" align="left"><input name="s10_7_1" type="text" id="s10_7_1" onkeypress="return binario(event)" value="<?php echo $s10_7_1;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_7_2','0')"/></td>
                  <td width="40%" align="left"><input name="s10_7_1_u" type="text" id="s10_7_1_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_1_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Asesoramiento financiero</td>
                  <td align="left"><input name="s10_7_2" type="text" id="s10_7_2" onkeypress="return binario(event)" value="<?php echo $s10_7_2;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_7_3','0')"/></td>
                  <td align="left"><input name="s10_7_2_u" type="text" id="s10_7_2_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_2_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Asistencia para obtener productos inocuos y de calidad</td>
                  <td align="left"><input name="s10_7_3" type="text" id="s10_7_3" onkeypress="return binario(event)" value="<?php echo $s10_7_3;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_7_4','0')"//></td>
                  <td align="left"><input name="s10_7_3_u" type="text" id="s10_7_3_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_3_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Asesoramiento técnico en los procesos de cultivo</td>
                  <td align="left"><input name="s10_7_4" type="text" id="s10_7_4" onkeypress="return binario(event)" value="<?php echo $s10_7_4;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_7_5','0')"/></td>
                  <td align="left"><input name="s10_7_4_u" type="text" id="s10_7_4_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_4_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Asesoramiento en Asociatividad.</td>
                  <td align="left"><input name="s10_7_5" type="text" id="s10_7_5" onkeypress="return binario(event)" value="<?php echo $s10_7_5;  ?>" size="3" maxlength="1"  onblur="return saltar(this.name,'s10_7_6','0')"/></td>
                  <td align="left"><input name="s10_7_5_u" type="text" id="s10_7_5_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_5_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Asesoramiento en formalización.</td>
                  <td align="left"><input name="s10_7_6" type="text" id="s10_7_6" onkeypress="return binario(event)" value="<?php echo $s10_7_6;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_7_7','0')"/></td>
                  <td align="left"><input name="s10_7_6_u" type="text" id="s10_7_6_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_6_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Asesoramiento en comercialización</td>
                  <td align="left"><input name="s10_7_7" type="text" id="s10_7_7" onkeypress="return binario(event)" value="<?php echo $s10_7_7;  ?>" size="3" maxlength="1" onblur="return saltar(this.name,'s10_7_8','0')"//></td>
                  <td align="left"><input name="s10_7_7_u" type="text" id="s10_7_7_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_7_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Otro</td>
                  <td align="left"><input name="s10_7_8" type="text" id="s10_7_8" onchange="otros_b(this.name,'s10_7_8_u','s10_8_1')" onkeypress="return binario(event)" onblur="return nino('s10_7_','7','s10_7_8')"  value="<?php echo $s10_7_8;  ?>" size="3" maxlength="1" /></td>
                  <td align="left" ><input name="s10_7_8_u" type="text" id="s10_7_8_u" onkeypress="return numeros12(event)" value="<?php echo $s10_7_8_u;  ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Si es otro, especifique</td>
                  <td colspan="2" align="left"><input name="s10_7_8_o" type="text" id="s10_7_8_o"  onkeypress="return letras(event)" value="<?php echo $s10_7_8_o;  ?>" size="14" maxlength="80"  /></td>
                  </tr>
                </table></td>
            </tr>
            <tr id="asistencia3">
              <td height="28" align="left"  >8. ¿QUIEN BRINDÓ LA ASISTENCIA TÉCNICA?</td>
            </tr>
            <tr id="asistencia4">
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="62%" align="left">Ministerio de Producción (PRODUCE).</td>
                  <td width="35%" align="left"><input name="s10_8_1" type="text" id="s10_8_1" value="<?php echo $s10_8_1;  ?>" size="3" maxlength="1" /></td>
                  <td width="3%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Fondo Nacional de Desarrollo Pesquero (FONDEPES)</td>
                  <td align="left"><input name="s10_8_2" type="text" id="s10_8_2" value="<?php echo $s10_8_2;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Instituto de Investigación de la Amazonía Peruana (IIAP)</td>
                  <td align="left"><input name="s10_8_3" type="text" id="s10_8_3" value="<?php echo $s10_8_3;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Ministerio del Ambiente (MINAM)</td>
                  <td align="left"><input name="s10_8_4" type="text" id="s10_8_4" value="<?php echo $s10_8_4;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Servicio Nacional de Sanidad Pesquera (SANIPES)</td>
                  <td align="left"><input name="s10_8_5" type="text" id="S2_78" value="<?php echo $s10_8_5;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Instituto del Mar del Perú (IMARPE)</td>
                  <td align="left"><input name="s10_8_6" type="text" id="s10_8_6" value="<?php echo $s10_8_6;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Dirección Regional de la Producción (DIREPRO).</td>
                  <td align="left"><input name="s10_8_7" type="text" id="s10_8_7" value="<?php echo $s10_8_7;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Gobierno Regional </td>
                  <td align="left"><input name="s10_8_8" type="text" id="s10_8_8" value="<?php echo $s10_8_8;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Organización No Gubernamental (ONG) </td>
                  <td align="left"><input name="s10_8_9" type="text" id="s10_8_9" value="<?php echo $s10_8_9;  ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s10_8_10" type="text" id="s10_8_10" onchange="return otros(this.name,'s10_8_10_o','1')"   value="<?php echo $s10_8_10;?>"  onblur="return salta_s3(this.name,'1','s10_9_1')" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Especifique si es otro</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table>
                <input name="s10_8_10_o" type="text" id="s10_8_10_o"  onkeypress="return letras(event)" value="<?php echo $s10_8_10_o;  ?>" size="11" readonly="readonly"/></td>
            </tr>
            <tr>
              <td height="28" align="left" >9. ¿EN QUÉ TEMAS NECESITA ASISTENCIA TÉCNICA?</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="7%" align="left">1</td>
                  <td width="87%" align="left"><input name="s10_9_1" type="text" id="s10_9_1"  onkeypress="return letras(event)" value="<?php echo $s10_9_1;  ?>" size="42" maxlength="100"/></td>
                  <td width="6%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">2</td>
                  <td align="left"><input name="s10_9_2" type="text" id="s10_9_2"  onkeypress="return letras(event)" value="<?php echo $s10_9_2;  ?>" size="42" maxlength="120" onkeyup="return aviso('s10_9_1','Debe ingresar al menos un tema')"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">3</td>
                  <td align="left"><input name="s10_9_3" type="text" id="s10_9_3"  onkeypress="return letras(event)" value="<?php echo $s10_9_3;  ?>" size="42" maxlength="100"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">4</td>
                  <td align="left"><input name="s10_9_4" type="text" id="s10_9_4"  onkeypress="return letras(event)" value="<?php echo $s10_9_4;  ?>" size="42" maxlength="100"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">5</td>
                  <td align="left"><input name="s10_9_5" type="text" id="s10_9_5"  onkeypress="return letras(event)" value="<?php echo $s10_9_5;  ?>" size="42" maxlength="100"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="28" align="left" >10. ¿CUENTA CON EMBARCACIONES PARA SU ACTIVIDAD</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"   ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="51%" align="left">Si/No 
                    <input name="s10_10" type="text" id="s10_10" onkeypress="return numeros12(event)" value="<?php echo $s10_10;  ?>" size="4" maxlength="1" onblur="return salta_s3(this.name,'1','s10_11_1')"/></td>
                  <td width="49%" align="left">¿Cuántas? 
                    <input name="s10_10_c" type="text" id="s10_10_c" onkeypress="return numeros(event)" value="<?php echo $s10_10_c;  ?>" size="5" maxlength="2"/></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="28" align="left"  >11. ¿CÓMO? CALIFICARÍA EL APOYO AL SECTOR PESQUERO DEL:</td>
            </tr>
            <tr>
              <td height="28" align="left"  style="border:thin; border-bottom:  1px solid #B0B5B3"  ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="71%" align="left">Ministerio de la Producción?</td>
                  <td width="28%" align="left"><input name="s10_11_1" type="text" id="s10_11_1" onkeypress="return numeros16(event)" value="<?php echo $s10_11_1;  ?>" size="3" maxlength="1"/></td>
                  <td width="1%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Fondo Nacional de Desarrollo 
                    Pesquero (FONDEPES)?</td>
                  <td align="left"><input name="s10_11_2" type="text" id="s10_11_2" onkeypress="return numeros16(event)" value="<?php echo $s10_11_2;  ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Instituto Tecnológico Pesquero <br />
                    (ITP)?</td>
                  <td align="left"><input name="s10_11_3" type="text" id="s10_11_3" onkeypress="return numeros16(event)" value="<?php echo $s10_11_3;  ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Instituto del Mar del Perú <br />
                    (IMARPE)?</td>
                  <td align="left"><input name="s10_11_4" type="text" id="s10_11_4" onkeypress="return numeros16(event)" value="<?php echo $s10_11_4;  ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Ministerio del Ambiente <br />
                    (MINAM)?</td>
                  <td align="left"><input name="s10_11_5" type="text" id="s10_11_5" onkeypress="return numeros16(event)" value="<?php echo $s10_11_5;  ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Servicio Nacional de Sanidad <br />
                    Pesquera (SANIPES)? </td>
                  <td align="left"><input name="s10_11_6" type="text" id="s10_11_6" onkeypress="return numeros16(event)"  onkeyup="return na2('s10_11_','6','s10_11_6')" value="<?php echo $s10_11_6;  ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left" valign="middle"><p class="texto"><strong>Observaciones</strong></p>
        <p>
          <label>
            <textarea name="obs" cols="66" rows="4" id="obs"><?php echo utf8_encode($obs);  ?></textarea>
          </label>
      </p></td>
    </tr>
    <tr>
      <td height="29" align="left"><table width="960" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td colspan="6" align="center" class="texto_mediano">INFORMACIÓN PARA EL CONTROL DEL INEI</td>
          </tr>
        <tr>
          <td width="60" align="left" class="texto">Día</td>
          <td width="50" align="left" class="texto">Mes</td>
          <td width="47" align="left" class="texto">Año</td>
          <td width="97">&nbsp;</td>
          <td width="280" align="left" class="texto">Resultados del empadronamiento</td>
          <td width="407">&nbsp;</td>
        </tr>
        <tr>
          <td><input name="f_d" type="text" id="f_d"  onchange="return dia2(this,this.value)" onkeypress="return numeros(event)" value="<?php echo $f_d;  ?>" size="2" maxlength="2"/></td>
          <td><input name="f_m" type="text" id="f_m"  onchange="return mes2(this,this.value)" onkeypress="return numeros(event)" value="<?php echo $f_m;  ?>" size="2" maxlength="2"/></td>
          <td align="left"><input name="f_a" type="text" id="f_a" onchange="return anio2(this,this.value)" onkeypress="return numeros(event)" value="2013" size="2" maxlength="4"/></td>
          <td>&nbsp;</td>
          <td><input name="res" type="text" id="res" onkeypress="return numeros13(event)" value="<?php echo $res;  ?>" size="3" maxlength="1"/></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  <tr>
      <td height="29" align="left"><table width="857" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="205" class="texto">Seleccionar Empadronador</td>
          <td width="645"><table width="600" border="0" cellpadding="1" cellspacing="1">
            <tr class="texto">
                <td width="68">&nbsp;DNI</td>
                <td width="525">&nbsp;Nombre</td>
              </tr>
              <tr>
                <td colspan="2" align="left"><span class="letra_frm">
                  <select name="emp_dni" class="texto" id="emp_dni" >
                    <option>Seleccionar</option>
                    <?php
				  
				   $result = mysql_query("SELECT * FROM  empadronador_jefe WHERE ODEI_COD='".$_SESSION['user_ubigeo']."' ORDER BY NOMBRE ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($emp_dni==$row['DNI']) 
						{  echo '<option value="'.$row['DNI'].'" selected="selected">'.$row['DNI'].'&nbsp;&nbsp;&nbsp;&nbsp;'.utf8_encode($row['NOMBRE']).'</option>'; } 
						else
                         { echo'<option value="'.$row['DNI'].'">'.utf8_encode($row['NOMBRE']).'</option>';  }
					
					 }
				  
				  ?>
                  </select>
                </span></td>
                </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
      <tr>
      <td height="29" align="left"><span class="texto"><strong><strong>
        <input name="frm10" type="hidden" id="frm10" value="1" />
      </strong></strong></span></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id10==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion10()"/>
        <strong><strong>
        <input name="opc10" type="hidden" id="opc10" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion10()" />
        <strong><strong>
        <input name="opc10" type="hidden" id="opc10" value="2" />
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