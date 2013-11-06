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

$mysql="SELECT * FROM acu_seccion8 WHERE id8='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id8=$row['id8'];
$s8_1_1=$row['s8_1_1'];
$s8_1_1a=$row['s8_1_1a'];
$s8_1_2=$row['s8_1_2'];
$s8_1_2a=$row['s8_1_2a'];
$s8_1_3=$row['s8_1_3'];
$s8_1_4=$row['s8_1_4'];
$s8_2_1=$row['s8_2_1'];
$s8_2_2=$row['s8_2_2'];
$s8_2_3=$row['s8_2_3'];
$s8_2_4=$row['s8_2_4'];
$s8_2_5=$row['s8_2_5'];
$s8_2_6=$row['s8_2_6'];
$s8_2_7=$row['s8_2_7'];
$s8_2_8=$row['s8_2_8'];
$s8_2_8_o=$row['s8_2_8_o'];
$s8_3_1=$row['s8_3_1'];
$s8_3_2=$row['s8_3_2'];
$s8_4_1=$row['s8_4_1'];
$s8_4_2=$row['s8_4_2'];
$s8_4_3=$row['s8_4_3'];
$s8_4_4=$row['s8_4_4'];
$s8_4_4_0=$row['s8_4_4_0'];
$s8_5_1=$row['s8_5_1'];
$s8_5_2=$row['s8_5_2'];
$s8_5_3=$row['s8_5_3'];
$s8_5_4=$row['s8_5_4'];
$s8_5_5=$row['s8_5_5'];
$s8_5_6=$row['s8_5_6'];
$s8_5_7=$row['s8_5_7'];
$s8_6_1=$row['s8_6_1'];
$s8_6_1_1=$row['s8_6_1_1'];
$s8_6_2=$row['s8_6_2'];
$s8_6_2_1=$row['s8_6_2_1'];
$s8_6_3=$row['s8_6_3'];
$s8_6_3_1=$row['s8_6_3_1'];
$s8_6_4=$row['s8_6_4'];
$s8_6_4_o=$row['s8_6_4_o'];
$s8_6_4_1=$row['s8_6_4_1'];
$s8_6_t=$row['s8_6_t'];
$s8_7_1=$row['s8_7_1'];
$s8_8_1=$row['s8_8_1'];
$s8_9_1=$row['s8_9_1'];
$s8_7_2=$row['s8_7_2'];
$s8_8_2=$row['s8_8_2'];
$s8_9_2=$row['s8_9_2'];
$s8_7_3=$row['s8_7_3'];
$s8_8_3=$row['s8_8_3'];
$s8_9_3=$row['s8_9_3'];
$s8_7_4=$row['s8_7_4'];
$s8_8_4=$row['s8_8_4'];
$s8_9_4=$row['s8_9_4'];
$s8_7_5=$row['s8_7_5'];
$s8_8_5=$row['s8_8_5'];
$s8_9_5=$row['s8_9_5'];
$s8_7_6=$row['s8_7_6'];
$s8_8_6=$row['s8_8_6'];
$s8_9_6=$row['s8_9_6'];
$s8_7_7=$row['s8_7_7'];
$s8_8_7=$row['s8_8_7'];
$s8_9_7=$row['s8_9_7'];
$s8_7_8=$row['s8_7_8'];
$s8_8_8=$row['s8_8_8'];
$s8_9_8=$row['s8_9_8'];
$s8_7_9=$row['s8_7_9'];
$s8_8_9=$row['s8_8_9'];
$s8_9_9=$row['s8_9_9'];
$s8_7_10=$row['s8_7_10'];
$s8_8_10=$row['s8_8_10'];
$s8_9_10=$row['s8_9_10'];
$s8_7_11=$row['s8_7_11'];
$s8_8_11=$row['s8_8_11'];
$s8_9_11=$row['s8_9_11'];
$s8_7_12=$row['s8_7_12'];
$s8_8_12=$row['s8_8_12'];
$s8_9_12=$row['s8_9_12'];
$s8_7_13=$row['s8_7_13'];
$s8_7_13_o=$row['s8_7_13_o'];
$s8_8_13=$row['s8_8_13'];
$s8_9_13=$row['s8_9_13'];
$s8_7_14=$row['s8_7_14'];
$s8_7_14_o=$row['s8_7_14_o'];
$s8_8_14=$row['s8_8_14'];
$s8_9_14=$row['s8_9_14'];
$s8_10_1=$row['s8_10_1'];
$s8_10_2=$row['s8_10_2'];
$s8_10_3=$row['s8_10_3'];
$s8_11_1=$row['s8_11_1'];
$s8_11_2=$row['s8_11_2'];
$s8_11_3=$row['s8_11_3'];
$s8_11_4=$row['s8_11_4'];
$s8_11_5=$row['s8_11_5'];
$s8_11_6=$row['s8_11_6'];
$s8_12_1=$row['s8_12_1'];
$s8_12_2=$row['s8_12_2'];
$s8_12_3=$row['s8_12_3'];
$s8_12_4=$row['s8_12_4'];
$s8_12_5=$row['s8_12_5'];
$s8_13_1=$row['s8_13_1'];
$s8_13_2=$row['s8_13_2'];
$s8_13_3=$row['s8_13_3'];
$s8_13_4=$row['s8_13_4'];
$s8_13_5=$row['s8_13_5'];
$s8_13_5_o=$row['s8_13_5_o'];
$s8_14_1=$row['s8_14_1'];
$s8_14_2=$row['s8_14_2'];
$s8_14_3=$row['s8_14_3'];
$s8_14_4=$row['s8_14_4'];
$s8_14_5=$row['s8_14_5'];
$s8_14_6=$row['s8_14_6'];
$s8_15=$row['s8_15'];	
//adicionales
$s8_10_4=$row['s8_10_4'];
	
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
<form id="form8" name="form8" method="post" action="variables8.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="21" align="left" class="texto_mediano" ><strong>SECCIÓN VIII</strong><strong>: FINANCIAMIENTO, PRODUCCIÓN Y COMERCIALIZACIÓN</strong></td>
    </tr>
          <tr>
      <td height="23" align="left" class="texto_mediano" >&nbsp;</td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto">1. EN LOS ÚLTIMOS 12 MESES, ¿CÓMO FINANCIÓ SU ACTIVIDAD ACUÍCOLA?</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="99%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="31%" align="left" class="letra_frm">Con dinero de terceros</td>
                  <td width="12%" align="left" class="letra_frm"><input name="s8_1_1" type="text" id="s8_1_1" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s8_1_1a','1')" value="<?php echo $s8_1_1; ?>" size="3" maxlength="1"/></td>
                  <td width="57%" align="left" class="letra_frm">Monto promedio                    
                    <input name="s8_1_1a" type="text" id="s8_1_1a" onkeypress="return numeros(event)" value="<?php echo $s8_1_1a; ?>" size="7" maxlength="7"/></td>
                  </tr>
                <tr >
                  <td align="left">Con dinero propio</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s8_1_2" type="text" id="s8_1_2"  onkeypress="return binario(event)" onkeyup="return otros(this.name,'s8_1_2a','1')" value="<?php echo $s8_1_2; ?>" size="3" maxlength="1"/>
                  </span></td>
                  <td align="left"><span class="letra_frm">
                    Monto promedio 
                        <input name="s8_1_2a" type="text" id="s8_1_2a"  onkeypress="return numeros(event)" value="<?php echo $s8_1_2a; ?>" size="7" maxlength="7"/>
                  </span></td>
                  </tr>
                <tr >
                  <td height="26" align="left">No financia</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s8_1_3" type="text" id="s8_1_3"  onkeypress="return binario(event)" value="<?php echo $s8_1_3; ?>" size="3" maxlength="1"/>
                  </span></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr >
                  <td align="left">No trabajó en los últimos 12 meses</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s8_1_4" type="text" id="s8_1_4"   onkeypress="return binario(event)"  value="<?php echo $s8_1_4; ?>" size="3" maxlength="1" onkeyup="return saltar_f('s8_1_1','s8_1_2','s8_1_3','s8_1_4')"/>
                  </span></td>
                  <td align="left">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr  id="finance_1">
              <td align="left"><span class="texto">2. EL FINANCIAMIENTO LE FUE OTORGADO POR:</span></td>
            </tr>
            <tr id="finance_2">
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="31%" align="left">Fondo nacional de desarrollo pesquero</td>
                  <td width="8%" align="left"><input name="s8_2_1" type="text" id="s8_2_1" onkeypress="return binario(event)" value="<?php echo $s8_2_1; ?>" size="3" maxlength="1"/></td>
                  <td width="61%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Banco</td>
                  <td align="left"><input name="s8_2_2" type="text" id="s8_2_2" onkeypress="return binario(event)" value="<?php echo $s8_2_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Financiera</td>
                  <td align="left"><input name="s8_2_3" type="text" id="s8_2_3" onkeypress="return binario(event)" value="<?php echo $s8_2_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Comerciantes</td>
                  <td align="left"><input name="s8_2_4" type="text" id="s8_2_4" onkeypress="return binario(event)" value="<?php echo $s8_2_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Parientes/amigos</td>
                  <td align="left"><input name="s8_2_5" type="text" id="s8_2_5" onkeypress="return binario(event)" value="<?php echo $s8_2_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Caja rural/municipal</td>
                  <td align="left"><input name="s8_2_6" type="text" id="s8_2_6" onkeypress="return binario(event)" value="<?php echo $s8_2_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Edpyme</td>
                  <td align="left"><input name="s8_2_7" type="text" id="s8_2_7" onkeypress="return binario(event)" value="<?php echo $s8_2_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s8_2_8" type="text" id="s8_2_8"    onchange="return otros(this.name,'s8_2_8_o','1')" onkeypress="return binario(event)" onkeyup="return na2('s8_2_','8','s8_2_8')" value="<?php echo $s8_2_8; ?>" size="3" maxlength="1"/></td>
                  <td align="left">Especifique
                    <input name="s8_2_8_o" type="text" id="s8_2_8_o" onkeypress="return letras(event)" value="<?php echo $s8_2_8_o; ?>" size="14" maxlength="80"/></td>
                </tr>
                </table></td>
            </tr>
            <tr   id="finance_3">
              <td align="left" class="letra_frm">3. EL FINANCIAMIENTO LO RECIBIO EN:</td>
            </tr>
            <tr    id="finance_4">
              <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="28%" align="left" class="letra_frm">Dinero en efectivo</td>
                  <td width="72%" align="left"><input name="s8_3_1" type="text" id="s8_3_1"  onkeypress="return binario(event)" value="<?php echo $s8_3_1; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">En especies</td>
                  <td align="left"><input name="s8_3_2" type="text" id="s8_3_2" onkeypress="return binario(event)" onkeyup="return na2('s8_3_','2','s8_3_2')" value="<?php echo $s8_3_2; ?>" size="3" maxlength="1"  onblur="return saltar(this.name,'s8_5_1','0')"/></td>
                </tr>
                </table></td>
            </tr>
            <tr  id="finance_5">
              <td height="20" align="left" class="texto">4. EL FINANCIAMIENTO EN ESPECIES LO RECIBIO CÓMO:</td>
            </tr>
            <tr   id="finance_6">
              <td align="left"  style="border:thin; border-bottom:  1px solid #B0B5B3"> <table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="31%" align="left" class="letra_frm">Insumos y alimentos</td>
                  <td width="14%" align="left"><input name="s8_4_1" type="text" id="s8_4_1" onkeypress="return binario(event)" value="<?php echo $s8_4_1; ?>" size="3" maxlength="1"/></td>
                  <td width="55%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Maquinaria o equipo</td>
                  <td align="left"><input name="s8_4_2" type="text" id="s5_3_r4" onkeypress="return binario(event)" value="<?php echo $s8_4_2; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Peces (Reproductores, alevinos)</td>
                  <td align="left"><input name="s8_4_3" type="text" id="s5_3_r5" onkeypress="return binario(event)" value="<?php echo $s8_4_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Otros</td>
                  <td align="left"><input name="s8_4_4" type="text" id="s8_4_4" onchange="return otros(this.name,'s8_4_4_o','1')" onkeypress="return binario(event)"  onkeyup="return na2('s8_4_','4','s8_4_4')" value="<?php echo $s8_4_4; ?>" size="3" maxlength="1" /></td>
                  <td align="left"><input name="s8_4_4_o" type="text" id="s8_4_4_o" onkeypress="return letras(event)" onblur="return saltar(this.name,'s8_6_1','')" value="<?php echo $s8_4_4_o; ?>" size="9" readonly="readonly"/></td>
                </tr>
              </table>                <span class="letra_frm">
     </span></td>
            </tr>
            <tr id="finance_7">
              <td align="left" >5. EL FINANCIAMIENTO LO INVIRTIÓ PARA:</td>
            </tr>
            <tr id="finance_8"> 
              <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"  ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="32%" align="left">Insumos y alimentos</td>
                  <td width="14%" align="left"><input name="s8_5_1" type="text" id="s8_5_1"  onkeypress="return binario(event)" value="<?php echo $s8_5_1; ?>" size="3" maxlength="1"/></td>
                  <td width="54%" align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Maquinarias y equipos</td>
                  <td align="left"><input name="s8_5_2" type="text" id="s8_5_2"  onkeypress="return binario(event)" value="<?php echo $s8_5_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Peces (Reproductores, alevinos)</td>
                  <td align="left"><input name="s8_5_3" type="text" id="s8_5_3" onkeypress="return binario(event)" value="<?php echo $s8_5_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Infraestructura acuícola</td>
                  <td align="left"><input name="s8_5_4" type="text" id="s8_5_4" onkeypress="return binario(event)" value="<?php echo $s8_5_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td height="36" align="left">Capacitación</td>
                  <td align="left"><input name="s8_5_5" type="text" id="s8_5_5" onkeypress="return binario(event)" value="<?php echo $s8_5_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Tecnología</td>
                  <td align="left"><input name="s8_5_6" type="text" id="s8_5_6" onkeypress="return binario(event)" value="<?php echo $s8_5_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Promoción comercial</td>
                  <td align="left"><input name="s8_5_7" type="text" id="s8_5_7" onkeypress="return binario(event)" onkeyup="return na2('s8_5_','7','s8_5_7')" value="<?php echo $s8_5_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr id="finance_0">
              <td align="left" >6. DE LA CANTIDAD ANUAL QUE COSECHÓ, QUÉ PORCENTAJE DESTINÓ A:</td>
            </tr>
            <tr id="finance_11">
              <td align="left"  style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                              <tr>
                  <td width="18%" align="left">&nbsp;</td>
                  <td width="14%" align="left"><strong>Destino</strong></td>
                  <td width="24%" align="left"><strong>Porcentaje (%)</strong></td>
                  <td width="44%" align="left">&nbsp;</td>
                      </tr>
                <tr>
                  <td width="18%" align="left">Venta</td>
                  <td width="14%" align="left"><input name="s8_6_1" type="text" id="s8_6_1" onchange="return saltar(this.name,'s8_6_2','0')" onkeypress="return binario(event)" value="<?php echo $s8_6_1; ?>" size="3" maxlength="1"/></td>
                  <td width="24%" align="left"><input name="s8_6_1_1" type="text" id="s8_6_1_1" onkeypress="return numeros(event)" onkeyup="entrada1(this.name,'100','0','999','Ingrese valores entre 0 y 100 para la cantidad la cantidad anual que destinó a venta')" value="<?php echo $s8_6_1_1; ?>" size="3" maxlength="3" onchange="return porcentaje1()"/></td>
                  <td width="44%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Autoconsumo</td>
                  <td align="left"><input name="s8_6_2" type="text" id="s8_6_2" onchange="return saltar(this.name,'s8_6_3','0')" onkeypress="return binario(event)" value="<?php echo $s8_6_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_6_2_1" type="text" id="s8_6_2_1" onkeypress="return numeros(event)" onkeyup="entrada1(this.name,'100','0','999','Ingrese valores entre 0 y 100 para la cantidad la cantidad anual que destinó a autoconsumo')" value="<?php echo $s8_6_2_1; ?>" size="3" maxlength="3" onchange="return porcentaje1()"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Trueque</td>
                  <td align="left"><input name="s8_6_3" type="text" id="s8_6_3" onkeypress="return binario(event) onchange=" value="<?php echo $s8_6_3; ?>" size="3" maxlength="1" onchange="return saltar(this.name,'s8_6_4','0')"/></td>
                  <td align="left"><input name="s8_6_3_1" type="text" id="s8_6_3_1" onkeypress="return numeros(event)" onkeyup="entrada1(this.name,'100','0','999','Ingrese valores entre 0 y 100 para la cantidad la cantidad anual que destinó a trueque')" value="<?php echo $s8_6_3_1; ?>" size="3" maxlength="3" onchange="return porcentaje1()"/></td>
                  <td align="left">Especifique </td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s8_6_4" type="text" id="s8_6_4" onchange="return otros(this.name,'s8_6_4_o','1')" onkeypress="return binario(event)"  onblur="return nino('s8_6_','3','s8_6_4')" value="<?php echo $s8_6_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_6_4_1" type="text" id="s8_6_4_1"  onkeypress="return numeros(event)" onkeyup="entrada1(this.name,'100','0','999','Ingrese valores entre 0 y 100 para la cantidad la cantidad anual que destinó a otros')" value="<?php echo $s8_6_4_1; ?>" size="3" maxlength="3" onchange="return porcentaje1()"/></td>
                  <td align="left"><input name="s8_6_4_o" type="text" id="s8_6_4_o"  onkeypress="return letras(event)" value="<?php echo $s8_6_4_o; ?>" size="12" maxlength="80" readonly="readonly"/></td>
                </tr>
                <tr>
                  <td align="left">Total</td>
                  <td align="left"><?php $tot= intval($s8_6_1_1)+intval($s8_6_2_1)+intval($s8_6_3_1)+intval($s8_6_4_1); ?></td>
                  <td align="left"><input name="s8_6_t_1" type="text" id="s8_6_t_1" onkeypress="return numeros(event)" value="<?php echo $tot.'%'; ?>" size="3" maxlength="3" readonly="readonly" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr id="finance_9">
              <td height="20" align="left" class="texto">7. EN LOS ÚLTIMOS 12 MESES ¿QUÉ ESPECIES COSECHÓ EN SU ACTIVIDAD ACUICOLA?</td>
            </tr>
            <tr id="finance_10">
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="20%" align="left"><strong>Especies</strong></td>
                  <td width="8%" align="left">&nbsp;</td>
                  <td width="19%" align="left"><strong>8. Volumen (Kg)</strong></td>
                  <td width="24%" align="left"><strong>9. Precio promedio (Kg)</strong></td>
                  <td width="29%" align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Trucha</td>
                  <td align="left"><input name="s8_7_1" type="text" id="s8_7_1" onchange="return saltar(this.name,'s8_7_2','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_1; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_1" type="text" id="s8_8_1"  onkeypress="return numeros(event)" value="<?php echo $s8_8_1; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_2','0')"/></td>
                  <td align="left"><input name="s8_9_1" type="text" id="s8_9_1"  onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_1; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Tilapia</td>
                  <td align="left"><input name="s8_7_2" type="text" id="s8_7_2" onchange="return saltar(this.name,'s8_7_3','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_2" type="text" id="s8_8_2"  onkeypress="return numeros(event)" value="<?php echo $s8_8_2; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_3','0')"/></td>
                  <td align="left"><input name="s8_9_2" type="text" id="s8_9_2"  onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_2; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Boquichico</td>
                  <td align="left"><input name="s8_7_3" type="text" id="s8_7_3" onchange="return saltar(this.name,'s8_7_4','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_3" type="text" id="s8_8_3" onkeypress="return numeros(event)" value="<?php echo $s8_8_3; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_4','0')"/></td>
                  <td align="left"><input name="s8_9_3" type="text" id="s8_9_3"  onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_3; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Paiche</td>
                  <td align="left"><input name="s8_7_4" type="text" id="s8_7_4" onchange="return saltar(this.name,'s8_7_5','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_4" type="text" id="s8_8_4" onkeypress="return numeros(event)" value="<?php echo $s8_8_4; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_5','0')"/></td>
                  <td align="left"><input name="s8_9_4" type="text" id="s8_9_4" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_4; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Gamitana</td>
                  <td align="left"><input name="s8_7_5" type="text" id="s8_7_5" onchange="return saltar(this.name,'s8_7_6','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_5" type="text" id="s8_8_5" onkeypress="return numeros(event)" value="<?php echo $s8_8_5; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_6','0')"/></td>
                  <td align="left"><input name="s8_9_5" type="text" id="s8_9_5" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_5; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Paco</td>
                  <td align="left"><input name="s8_7_6" type="text" id="s8_7_6" onchange="return saltar(this.name,'s8_7_7','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_6" type="text" id="s8_8_6" onkeypress="return numeros(event)" value="<?php echo $s8_8_6; ?>" size="5" maxlength="5"/ onchange="return saltar('s8_6_1','s8_7_7','0')"></td>
                  <td align="left"><input name="s8_9_6" type="text" id="s8_9_6" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_6; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Caracol &quot;Churo&quot;</td>
                  <td align="left"><input name="s8_7_7" type="text" id="s8_7_7" onchange="return saltar(this.name,'s8_7_8','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_7" type="text" id="s8_8_7" onkeypress="return numeros(event)" value="<?php echo $s8_8_7; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_8','0')"/></td>
                  <td align="left"><input name="s8_9_7" type="text" id="s8_9_7" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_7; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Camarón gigante</td>
                  <td align="left"><input name="s8_7_8" type="text" id="s8_7_8" onchange="return saltar(this.name,'s8_7_9','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_8; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_8" type="text" id="s8_8_8" onkeypress="return numeros(event)" value="<?php echo $s8_8_8; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_9','0')"/></td>
                  <td align="left"><input name="s8_9_8" type="text" id="s8_9_8" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_8; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Langostino</td>
                  <td align="left"><input name="s8_7_9" type="text" id="s8_7_9" onchange="return saltar(this.name,'s8_7_10','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_9; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_9" type="text" id="s8_8_9" onkeypress="return numeros(event)" value="<?php echo $s8_8_9; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_10','0')"/></td>
                  <td align="left"><input name="s8_9_9" type="text" id="s8_9_9" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_9; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Carpa</td>
                  <td align="left"><input name="s8_7_10" type="text" id="s8_7_10" onchange="return saltar(this.name,'s8_7_11','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_10; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_10" type="text" id="s8_8_10" onkeypress="return numeros(event)" value="<?php echo $s8_8_10; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_11','0')"/></td>
                  <td align="left"><input name="s8_9_10" type="text" id="s8_9_10" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_10; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Carachama</td>
                  <td align="left"><input name="s8_7_11" type="text" id="s8_7_11" onchange="return saltar(this.name,'s8_7_12','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_11; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_11" type="text" id="s8_8_11" onkeypress="return numeros(event)" value="<?php echo $s8_8_11; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_12','0')"/></td>
                  <td align="left"><input name="s8_9_11" type="text" id="s8_9_11" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_11; ?>" size="5" maxlength="5"/></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Sábalo</td>
                  <td align="left"><input name="s8_7_12" type="text" id="s8_7_12" onchange="return saltar(this.name,'s8_7_13','0')" onkeypress="return binario(event)" value="<?php echo $s8_7_12; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s8_8_12" type="text" id="s8_8_12" onkeypress="return numeros(event)" value="<?php echo $s8_8_12; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_13','0')"/></td>
                  <td align="left"><input name="s8_9_12" type="text" id="s8_9_12" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_12; ?>" size="5" maxlength="5"/></td>
                  <td align="left">Especifique</td>
                  </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s8_7_13" type="text" id="s8_7_13" onchange="return saltar(this.name,'s8_7_14','0')" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s8_7_13_o','1')" value="<?php echo $s8_7_13; ?>" size="3" maxlength="1" /></td>
                  <td align="left"><input name="s8_8_13" type="text" id="s8_8_13"  onkeypress="return numeros(event)" value="<?php echo $s8_8_13; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_13_o','0')"/></td>
                  <td align="left"><input name="s8_9_13" type="text" id="s8_9_13" onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_13; ?>" size="5" maxlength="5"/></td>
                  <td align="left"><input name="s8_7_13_o" type="text" id="s8_7_13_o" value="<?php echo $s8_7_13_o; ?>" size="14" maxlength="80" /></td>
                  </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s8_7_14" type="text" id="s8_7_14"  onkeypress="return binario(event)" onkeyup="return na2('s8_7_','14','s8_7_14')"  onchange="return salta_s3(this.name,'1','s8_10_1')" value="<?php echo $s8_7_14; ?>" size="3" maxlength="1" /></td>
                  <td align="left"><input name="s8_8_14" type="text" id="s8_8_14"  onkeypress="return numeros(event)" value="<?php echo $s8_8_14; ?>" size="5" maxlength="5" onchange="return saltar('s8_6_1','s8_7_14_o','0')"/></td>
                  <td align="left"><input name="s8_9_14" type="text" id="s8_9_14"  onkeypress="return numeros_p(event)" onkeyup="entrada1(this.name,'500','0','999','Ingrese un precio  entre 0.10 y 500 nuevos soles')" value="<?php echo $s8_9_14; ?>" size="5" maxlength="5"/></td>
                  <td align="left"><input name="s8_7_14_o" type="text" id="s8_7_14_o" value="<?php echo $s8_7_14_o; ?>" size="14" maxlength="80" /></td>
                  </tr>
                </table>                <span class="letra_frm"> </span></td>
            </tr>
            </table></td>
          <td width="50%" align="left" valign="top" ><table width="100%" border="0" cellspacing="1" id="tabla_1">
            <tr>
              <td height="22" align="left" class="texto">10. EN LOS ÚLTIMOS 12 MESES ¿DÓNDE VENDIÓ SU PRODUCCIÓN?</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="28%" align="left" class="letra_frm">Centro de cultivo</td>
                  <td width="72%" align="left"><input name="s8_10_1" type="text" id="s8_10_1" onkeypress="return binario(event)" value="<?php echo $s8_10_1; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Feria</td>
                  <td align="left"><input name="s8_10_2" type="text" id="s8_10_2" onkeypress="return binario(event)" value="<?php echo $s8_10_2; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Mercado</td>
                  <td align="left"><input name="s8_10_3" type="text" id="s8_10_3" onkeypress="return binario(event)"  value="<?php echo $s8_10_3; ?>" size="3" maxlength="1"/></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Venta por vivienda</td>
                  <td align="left"><input name="s8_10_4" type="text" id="s8_10_4" onkeypress="return binario(event)" onkeyup="return na2('s8_10_','4','s8_10_4')" value="<?php echo $s8_10_4; ?>" size="3" maxlength="1"/></td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="29" align="left"><span class="letra_frm">11. EN LOS ÚLTIMOS 12 MESES ¿A QUIÉN VENDIÓ SU PRODUCCIÓN?</span></td>
            </tr>
            <tr>
              <td height="28" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="36%" align="left" class="letra_frm">Público en general</td>
                  <td width="64%" align="left"><input name="s8_11_1" type="text" id="s8_11_1" onkeypress="return binario(event)" value="<?php echo $s8_11_1; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Comerciante minorista</td>
                  <td align="left"><input name="s8_11_2" type="text" id="s8_11_2" onkeypress="return binario(event)" value="<?php echo $s8_11_2; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Comerciante mayorista</td>
                  <td align="left"><input name="s8_11_3" type="text" id="s8_11_3" onkeypress="return binario(event)" value="<?php echo $s8_11_3; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Intermediario nacional</td>
                  <td align="left"><input name="s8_11_4" type="text" id="s8_11_4" onkeypress="return binario(event)" value="<?php echo $s8_11_4; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Intermediario extranjero</td>
                  <td align="left"><input name="s8_11_5" type="text" id="s8_11_5" onkeypress="return binario(event)" value="<?php echo $s8_11_5; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Hoteles y restaurantes</td>
                  <td align="left"><input name="s8_11_6" type="text" id="s8_11_6" onkeypress="return binario(event)" onkeyup="return na2('s8_11_','6','s8_11_6')" value="<?php echo $s8_11_6; ?>" size="3" maxlength="1"/></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="18" align="left"><span class="texto">12. ¿CUÁL ES EL TIPO DE PRODUCTO QUE OFRECE?</span></td>
            </tr>
            <tr>
              <td height="18" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="36%" align="left" class="letra_frm">Fresco</td>
                  <td width="64%" align="left"><input name="s8_12_1" type="text" id="s8_12_1" onkeypress="return binario(event)" value="<?php echo $s8_12_1; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Refrigerado</td>
                  <td align="left"><input name="s8_12_2" type="text" id="s8_12_2" onkeypress="return binario(event)" value="<?php echo $s8_12_2; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Conserva</td>
                  <td align="left"><input name="s8_12_3" type="text" id="s8_12_3" onkeypress="return binario(event)" value="<?php echo $s8_12_3; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Congelado</td>
                  <td align="left"><input name="s8_12_4" type="text" id="s8_12_4" onkeypress="return binario(event)" value="<?php echo $s8_12_4; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Curado</td>
                  <td align="left"><input name="s8_12_5" type="text" id="s8_12_5" onkeypress="return binario(event)" onkeyup="return na2('s8_12_','5','s8_12_5')" value="<?php echo $s8_12_5; ?>" size="3" maxlength="1"/></td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="28" align="left"  >13. ¿CUÁL ES EL TIPO DE PRESENTACIÓN DE LOS PRODUCTO?</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="33%" align="left">Entero</td>
                  <td width="56%" align="left"><input name="s8_13_1" type="text" id="s8_13_1" onkeypress="return binario(event)" value="<?php echo $s8_13_1; ?>" size="3" maxlength="1"/></td>
                  <td width="11%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Eviscerado</td>
                  <td align="left"><input name="s8_13_2" type="text" id="s8_13_2" onkeypress="return binario(event)" value="<?php echo $s8_13_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Filete</td>
                  <td align="left"><input name="s8_13_3" type="text" id="s8_13_3" onkeypress="return binario(event)" value="<?php echo $s8_13_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Cola</td>
                  <td align="left"><input name="s8_13_4" type="text" id="s8_13_4" onkeypress="return binario(event)" value="<?php echo $s8_13_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s8_13_5" type="text" id="s8_13_5" onchange="return otros(this.name,'s8_12_5_o','1')" onkeypress="return binario(event)" onkeyup="return na2('s8_12_','5','s8_12_5')" value="<?php echo $s8_13_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Especifique si es otro</td>
                  <td align="left"><input name="s8_13_5_o" type="text" id="s8_13_5_o" onkeypress="return letras(event)" value="<?php echo $s8_13_5_o; ?>" size="12" maxlength="80"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="28" align="left" >14. LA PRODUCCIÓN DE SU ACTIVIDAD LA VENDIÓ:</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="57%" align="left">Individualmente</td>
                  <td width="37%" align="left"><input name="s8_14_1" type="text" id="s8_14_1" onkeypress="return binario(event)" value="<?php echo $s8_14_1; ?>" size="3" maxlength="1"/></td>
                  <td width="6%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Eventualmente en asociación con otros acuicultores</td>
                  <td align="left"><input name="s8_14_2" type="text" id="s8_14_2" onkeypress="return binario(event)" value="<?php echo $s8_14_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Por medio de una organización social de acuicultores</td>
                  <td align="left"><input name="s8_14_3" type="text" id="s8_14_3" onkeypress="return binario(event)" value="<?php echo $s8_14_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Por medio de un comité de comercialización</td>
                  <td align="left"><input name="s8_14_4" type="text" id="s8_14_4" onkeypress="return binario(event)" value="<?php echo $s8_14_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Por medio de un consorcio?</td>
                  <td align="left"><input name="s8_14_5" type="text" id="s8_14_5" onkeypress="return binario(event)" value="<?php echo $s8_14_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Por medio de una cooperativa</td>
                  <td align="left"><input name="s8_14_6" type="text" id="s8_14_6" onkeypress="return binario(event)" onkeyup="return na2('s8_14_','6','s8_14_6')" value="<?php echo $s8_14_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="28" align="left" >15. EN LOS 12 ÚLTIMOS MESES ¿CUÁL FUE SU INGRESO PROMEDIO MENSUAL?</td>
            </tr>
            <tr>
              <td height="41" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"   ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="32%" align="left"><input name="s8_15" type="text" id="S2_97" onkeypress="return numeros15(event)" value="<?php echo $s8_15; ?>" size="7" maxlength="5"/></td>
                  <td width="10%" align="left">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p><span class="texto"><strong><strong>
        <input name="frm8" type="hidden" id="frm8" value="1" />
      </strong></strong></span><a name="finish" id="finish"></a></p></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id8==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion8()"/>
        <strong><strong>
        <input name="opc8" type="hidden" id="opc8" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion8()" />
        <strong><strong>
        <input name="opc8" type="hidden" id="opc8" value="2" />
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