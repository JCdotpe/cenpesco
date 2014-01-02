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

$mysql="SELECT * FROM acu_seccion5 WHERE id5='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id5=$row['id5'];
$s5_1_1=$row['s5_1_1'];
$s5_1_1_f=$row['s5_1_1_f'];
$s5_1_2=$row['s5_1_2'];
$s5_1_2_f=$row['s5_1_2_f'];
$s5_1_3=$row['s5_1_3'];
$s5_1_3_f=$row['s5_1_3_f'];
$s5_1_4=$row['s5_1_4'];
$s5_1_4_f=$row['s5_1_4_f'];
$s5_1_5=$row['s5_1_5'];
$s5_1_5_o=$row['s5_1_5_o'];
$s5_1_5_f=$row['s5_1_5_f'];
$s5_2_1=$row['s5_2_1'];
$s5_2_1_h=$row['s5_2_1_h'];
$s5_2_2=$row['s5_2_2'];
$s5_2_2_h=$row['s5_2_2_h'];
$s5_2_3=$row['s5_2_3'];
$s5_2_3_h=$row['s5_2_3_h'];
$s5_2_4=$row['s5_2_4'];
$s5_2_4_o=$row['s5_2_4_o'];
$s5_2_4_h=$row['s5_2_4_h'];
$s5_3=$row['s5_3'];
$s5_3_r=$row['s5_3_r'];
$s5_4=$row['s5_4'];
$s5_5_1=$row['s5_5_1'];
$s5_5_2=$row['s5_5_2'];
$s5_5_3=$row['s5_5_3'];
$s5_5_4=$row['s5_5_4'];
$s5_5_5=$row['s5_5_5'];
$s5_5_5_o=$row['s5_5_5_o'];
$s5_6=$row['s5_6'];
$s5_6_r=$row['s5_6_r'];
$s5_7=$row['s5_7'];
$s5_8=$row['s5_8'];
$s5_9_1=$row['s5_9_1'];
$s5_9_2=$row['s5_9_2'];
$s5_9_3=$row['s5_9_3'];
$s5_10_1=$row['s5_10_1'];
$s5_10_2=$row['s5_10_2'];
$s5_10_3=$row['s5_10_3'];
$s5_10_4=$row['s5_10_4'];
$s5_10_5=$row['s5_10_5'];
$s5_10_6=$row['s5_10_6'];
$s5_10_7=$row['s5_10_7'];
$s5_10_8=$row['s5_10_8'];
$s5_10_9=$row['s5_10_9'];
$s5_10_10=$row['s5_10_10'];
$s5_10_11=$row['s5_10_11'];
$s5_10_12=$row['s5_10_12'];
$s5_10_13=$row['s5_10_13'];
$s5_10_14=$row['s5_10_14'];
$s5_10_14_o=$row['s5_10_14_o'];
$s5_10_15=$row['s5_10_15'];
$s5_10_15_o=$row['s5_10_15_o'];
$s5_11_1=$row['s5_11_1'];
$s5_11_2=$row['s5_11_2'];
$s5_11_3=$row['s5_11_3'];
$s5_12=$row['s5_12'];
$s5_13_1=$row['s5_13_1'];
$s5_13_1_c=$row['s5_13_1_c'];
$s5_13_1_u=$row['s5_13_1_u'];
$s5_13_1_u_o=$row['s5_13_1_u_o'];
$s5_13_1_ma=$row['s5_13_1_ma'];
$s5_13_1_me=$row['s5_13_1_me'];
$s5_13_2=$row['s5_13_2'];
$s5_13_2_c=$row['s5_13_2_c'];
$s5_13_2_u=$row['s5_13_2_u'];
$s5_13_2_u_o=$row['s5_13_2_u_o'];
$s5_13_2_ma=$row['s5_13_2_ma'];
$s5_13_2_me=$row['s5_13_2_me'];
$s5_13_3=$row['s5_13_3'];
$s5_13_3_c=$row['s5_13_3_c'];
$s5_13_3_u=$row['s5_13_3_u'];
$s5_13_3_u_o=$row['s5_13_3_u_o'];
$s5_13_3_ma=$row['s5_13_3_ma'];
$s5_13_3_me=$row['s5_13_3_me'];
$s5_13_4=$row['s5_13_4'];
$s5_13_4_c=$row['s5_13_4_c'];
$s5_13_4_u=$row['s5_13_4_u'];
$s5_13_4_u_o=$row['s5_13_4_u_o'];
$s5_13_4_ma=$row['s5_13_4_ma'];
$s5_13_4_me=$row['s5_13_4_me'];
$s5_13_5=$row['s5_13_5'];
$s5_13_5_c=$row['s5_13_5_c'];
$s5_13_5_u=$row['s5_13_5_u'];
$s5_13_5_u_o=$row['s5_13_5_u_o'];
$s5_13_5_ma=$row['s5_13_5_ma'];
$s5_13_5_me=$row['s5_13_5_me'];
$s5_13_6=$row['s5_13_6'];
$s5_13_6_c=$row['s5_13_6_c'];
$s5_13_6_u=$row['s5_13_6_u'];
$s5_13_6_u_o=$row['s5_13_6_u_o'];
$s5_13_6_ma=$row['s5_13_6_ma'];
$s5_13_6_me=$row['s5_13_6_me'];
$s5_13_7=$row['s5_13_7'];
$s5_13_7_c=$row['s5_13_7_c'];
$s5_13_7_u=$row['s5_13_7_u'];
$s5_13_7_u_o=$row['s5_13_7_u_o'];
$s5_13_7_ma=$row['s5_13_7_ma'];
$s5_13_7_me=$row['s5_13_7_me'];
$s5_13_8=$row['s5_13_8'];
$s5_13_8_e=$row['s5_13_8_e'];
$s5_13_8_c=$row['s5_13_8_c'];
$s5_13_8_u=$row['s5_13_8_u'];
$s5_13_8_u_o=$row['s5_13_8_u_o'];
$s5_13_8_ma=$row['s5_13_8_ma'];
$s5_13_8_me=$row['s5_13_8_me'];
$s5_14_1=$row['s5_14_1'];
$s5_14_2=$row['s5_14_2'];
$s5_14_3=$row['s5_14_3'];
$s5_14_4=$row['s5_14_4'];
$s5_14_5=$row['s5_14_5'];
$s5_14_6=$row['s5_14_6'];
$s5_15_1=$row['s5_15_1'];
$s5_15_2=$row['s5_15_2'];
$s5_16_1=$row['s5_16_1'];
$s5_16_2=$row['s5_16_2'];
$s5_16_3=$row['s5_16_3'];
$s5_16_4=$row['s5_16_4'];
$s5_16_5=$row['s5_16_5'];
$s5_16_5_m=$row['s5_16_5_m'];
$s5_16_5_p=$row['s5_16_5_p'];
$s5_16_6=$row['s5_16_6'];
$s5_16_7=$row['s5_16_7'];
$s5_16_8=$row['s5_16_8'];
$s5_16_9=$row['s5_16_9'];
$s5_16_9_o=$row['s5_16_9_o'];
$s5_17_1=$row['s5_17_1'];
$s5_17_2=$row['s5_17_2'];
$s5_17_3=$row['s5_17_3'];
$s5_17_4=$row['s5_17_4'];
$s5_17_5=$row['s5_17_5'];
$s5_17_6=$row['s5_17_6'];
$s5_17_7=$row['s5_17_7'];
$s5_17_8=$row['s5_17_8'];
$s5_17_9=$row['s5_17_9'];
$s5_17_10=$row['s5_17_10'];
$s5_17_11=$row['s5_17_11'];
$s5_17_12=$row['s5_17_12'];
$s5_17_13=$row['s5_17_13'];
$s5_17_14=$row['s5_17_14'];
$s5_17_15=$row['s5_17_15'];
$s5_17_15_o=$row['s5_17_15_o'];
$s5_17_16=$row['s5_17_16'];

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
<form id="form5" name="form5" method="post" action="variables5.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><strong>SECCIÓN V: CARACTERÍSTICAS DE LA ACTIVIDAD ACUÍCOLA</strong></td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto">1. ¿CUÁL ES EL ORIGEN DEL AGUA UTILIZADA EN SU ACTIVIDAD DE ACUICULTURA?</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="99%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="15%" align="left" class="letra_frm">Lago</td>
                  <td width="11%" align="left" class="letra_frm"><input name="s5_1_1" type="text" id="s5_1_1" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s5_1_1_f','1')" value="<?php echo $s5_1_1; ?>" size="3" maxlength="1"/></td>
                  <td width="26%" align="left" class="letra_frm">Nombre Fuente</td>
                  <td width="48%" align="left" class="letra_frm"><input name="s5_1_1_f" type="text" id="s5_1_1_f" value="<?php echo $s5_1_1_f; ?>" size="25" maxlength="100" readonly="readonly" /></td>
                  </tr>
                <tr>
                  <td align="left">Río</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_2" type="text" id="s5_1_2" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s5_1_2_f','1')" value="<?php echo $s5_1_2; ?>" size="3" maxlength="1"/>
                  </span></td>
                  <td align="left"><span class="letra_frm">Nombre Fuente</span></td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_2_f" type="text" id="s5_1_2_f" value="<?php echo $s5_1_2_f; ?>" size="25" maxlength="100" readonly="readonly" />
                  </span></td>
                  </tr>
                <tr>
                  <td align="left">Manantial</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_3" type="text" id="s5_1_3" onkeypress="return binario(event)"  onkeyup="return otros(this.name,'s5_1_3_f','1')" value="<?php echo $s5_1_3; ?>" size="3" maxlength="1"/>
                  </span></td>
                  <td align="left"><span class="letra_frm">Nombre Fuente</span></td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_3_f" type="text" id="s5_1_3_f" value="<?php echo $s5_1_3_f; ?>" size="25" maxlength="100" readonly="readonly" />
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Estero</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_4" type="text" id="s5_1_4"  onkeypress="return binario(event)" onkeyup="return otros(this.name,'s5_1_4_f','1')" value="<?php echo $s5_1_4; ?>" size="3" maxlength="1"/>
                  </span></td>
                  <td align="left"><span class="letra_frm">Nombre Fuente</span></td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_4_f" type="text" id="s5_1_4_f" value="<?php echo $s5_1_4_f; ?>" size="25" maxlength="100" readonly="readonly" />
                  </span></td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_5" type="text" id="s5_1_5"   onchange="return otros(this.name,'s5_1_5_o','1')" onkeypress="return binario(event)"  onkeyup="return na2('s5_1_','4','s5_1_5')" value="<?php echo $s5_1_5; ?>" size="3" maxlength="1" />
                  </span></td>
                  <td align="left">Especifique</td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_5_o" type="text" id="s5_1_5_o" onkeyup="return otros('s5_1_5','s5_1_5_f','1')" value="<?php echo $s5_1_5_o; ?>" size="25" maxlength="100" readonly="readonly"  />
                  </span></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center"><span class="letra_frm">Nombre Fuente</span></td>
                  <td align="left"><span class="letra_frm">
                    <input name="s5_1_5_f" type="text" id="s5_1_5_f" value="<?php echo $s5_1_5_f; ?>" size="25" maxlength="100" readonly="readonly" />
                  </span></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left"><span class="texto">2. ¿CUAL ES EL RÉGIMEN DE TENENCIA DEL ESPACIO GEOGRÁFICO QUE UTILIZA PARA DESARROLLAR SU ACTIVIDAD?</span></td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="23%" align="left" class="letra_frm"><strong>Régimen </strong></td>
                  <td width="10%" align="left" class="letra_frm">&nbsp;</td>
                  <td width="20%" align="left" class="letra_frm"><strong>N° de Hectáreas</strong></td>
                  <td width="47%" align="left" class="letra_frm">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    Concesión
                    
                  </label></td>
                  <td align="left"><input name="s5_2_1" type="text" id="s5_2_1" onkeypress="return binario(event)"  onkeyup="return otros(this.name,'s5_2_1_h','1')" value="<?php echo $s5_2_1; ?>" size="3" maxlength="1" onchange="return saltar(this.name,'s5_2_2','0')"/></td>
                  <td align="left"><input name="s5_2_1_h" type="text" id="s5_2_1_h" onkeypress="return numeros_p(event)" value="<?php echo $s5_2_1_h; ?>" size="7" maxlength="7" readonly="readonly"  /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Arrendamiento</td>
                  <td align="left"><input name="s5_2_2" type="text" id="s5_2_2" onkeypress="return binario(event)"  onkeyup="return otros(this.name,'s5_2_2_h','1')" value="<?php echo $s5_2_2; ?>" size="3" maxlength="1" onchange="return saltar(this.name,'s5_2_3','0')"/></td>
                  <td align="left"><input name="s5_2_2_h" type="text" id="s5_2_2_h" onkeypress="return numeros_p(event)" value="<?php echo $s5_2_2_h; ?>" size="7" maxlength="7" readonly="readonly"  /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Propio</td>
                  <td align="left"><input name="s5_2_3" type="text" id="s5_2_3" onkeypress="return binario(event)"  onkeyup="return otros(this.name,'s5_2_3_h','1')" value="<?php echo $s5_2_3; ?>" size="3" maxlength="1" onchange="return saltar(this.name,'s5_2_4','0')"/></td>
                  <td align="left"><input name="s5_2_3_h" type="text" id="s5_2_3_h" onkeypress="return numeros_p(event)" value="<?php echo $s5_2_3_h; ?>" size="7" maxlength="7" readonly="readonly"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s5_2_4" type="text" id="s5_2_4"  onkeypress="return binario(event)" onblur="saltarin1('s5_2_1','s5_2_4','s5_3','s5_6','0')" onchange="nino('s5_2_','3',this.name)" value="<?php echo $s5_2_4; ?>" size="3" maxlength="1" /></td>
                  <td align="left"><input name="s5_2_4_h" type="text" id="s5_2_4_h" onkeypress="return numeros_p(event)"  onkeyup="return otros('s5_2_4','s5_2_4_o','1')" value="<?php echo $s5_2_4_h; ?>" size="7" maxlength="7"/></td>
                  <td align="left">Especifique
                    <input name="s5_2_4_o" type="text" id="s5_2_4_o" onkeypress="return letras(event)" value="<?php echo $s5_2_4_o; ?>" size="12" maxlength="100" onblur="saltarin1('s5_2_1','s5_2_4','s5_3','s5_6','1')"/></td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td align="left" class="letra_frm">3. ¿CUENTA USTED CON PERMISO DE CONCESIÓN PARA SU ACTIVIDAD?</td>
            </tr>
            <tr>
              <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="46%" align="left" class="letra_frm">Si/No 
                    <input name="s5_3" type="text" id="s5_3" onblur="return saltar(this.name,'s5_5_1','2')" onkeypress="return numeros12(event)" value="<?php echo $s5_3; ?>" size="3" maxlength="1"  onkeyup="return otros(this.name,'s5_3_r','1')" /></td>
                  <td width="54%" align="left">N° de registro 
                    <input name="s5_3_r" type="text" id="s5_3_r" value="<?php echo $s5_3_r; ?>" size="15" maxlength="100" /></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="20" align="left" class="texto">4. ¿CUÁNTO TIEMPO DURÓ EL TRÁMITE PARA OBTENER EL PERMISO?</td>
            </tr>
            <tr>
              <td align="left" > <span class="letra_frm">
&nbsp;&nbsp;&nbsp;
<input name="s5_4" type="text" id="s5_4" onchange="return saltar(this.name,'s5_6','')" onkeypress="return numeros14(event)" value="<?php echo $s5_4; ?>" size="3" maxlength="1" />
              </span></td>
            </tr>
            <tr>
              <td align="left" >5. ¿POR QUÉ NO CUENTA CON EL PERMISO?</td>
            </tr>
            <tr>
              <td align="left" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="29%" align="left">No tiene interés</td>
                  <td width="12%" align="left"><input name="s5_5_1" type="text" id="s5_5_1" onkeypress="return binario(event)" value="<?php echo $s5_5_1; ?>" size="3" maxlength="1"  /></td>
                  <td width="59%" align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Razones económicas</td>
                  <td align="left"><input name="s5_5_2" type="text" id="s5_5_2" onkeypress="return binario(event)" value="<?php echo $s5_5_2; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Trámites engorrosos</td>
                  <td align="left"><input name="s5_5_3" type="text" id="s5_5_3" onkeypress="return binario(event)" value="<?php echo $s5_5_3; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">No conoce el trámite</td>
                  <td align="left"><input name="s5_5_4" type="text" id="s5_5_4" onkeypress="return binario(event)" value="<?php echo $s5_5_4; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s5_5_5" type="text" id="s5_5_5" onchange="return otros(this.name,'s5_5_5_o','1')" onkeypress="return binario(event)" onkeyup="return todos1(this.name,'s5_5_1','s5_5_2','s5_5_3','s5_5_4','s5_5_5','','','','','','','','','5','s5_5_5_o')" value="<?php echo $s5_5_5; ?>" size="3" maxlength="1"  /></td>
                  <td align="left">Especifique
                    <input name="s5_5_5_o" type="text" id="s5_5_5_o" onkeypress="return letras(event)" value="<?php echo $s5_5_o; ?>" size="5" maxlength="80" readonly="readonly"/></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" >6. ¿CUENTA USTED CON AUTORIZACIÓN PARA DESARROLLAR SU ACTIVIDAD?</td>
            </tr>
            <tr>
              <td align="left" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="46%" align="left" class="letra_frm">Si/No
                    <input name="s5_6" type="text" id="s5_6"  onchange="return saltar(this.name,'s5_8','2')" onkeypress="return numeros12(event)" onkeyup="return otros(this.name,'s5_6_r','1')" value="<?php echo $s5_6; ?>" size="3" maxlength="2"/></td>
                  <td width="54%" align="left">N° de registro
                    <input name="s5_6_r" type="text" id="s5_6_r" value="<?php echo $s5_6_r; ?>" size="6" readonly="readonly" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="20" align="left" class="texto">7. ¿CUÁNTO TIEMPO DURÓ EL TRÁMITE PARA OBTENER LA AUTORIZACIÓN?</td>
            </tr>
            <tr>
              <td align="left" ><span class="letra_frm"> &nbsp;&nbsp;&nbsp;
                <input name="s5_7" type="text" id="s5_7" onkeypress="return numeros14(event)" value="<?php echo $s5_7; ?>" size="3" maxlength="1"/>
              </span></td>
            </tr>
            <tr>
              <td height="20" align="left" class="texto">8. ¿CUÁNTAS SIEMBRAS ANUALES REALIZA?</td>
            </tr>
            <tr>
              <td align="left" ><span class="letra_frm"> &nbsp;&nbsp;&nbsp;
                <input name="s5_8" type="text" id="s5_8" onkeypress="return numeros(event)" onkeyup="return entrada1('s5_8','20','0','99','Ingrese valores entre 1 y 20 para las siembras anuales')" value="<?php echo $s5_8; ?>" size="3" maxlength="2"/>
              </span></td>
            </tr>
            <tr>
              <td height="20" align="left" class="texto">9. SEGÚN EL TIPO DE MANEJO ¿EL CULTIVO QUE REALIZA ES?</td>
            </tr>
            <tr>
              <td align="left" ><table width="83%" border="0" cellpadding="1" cellspacing="2">
                  <tr>
                    <td width="28%" align="left">Extensivo</td>
                    <td width="72%" align="left"><input name="s5_9_1" type="text" id="s5_9_1"  onkeypress="return binario(event)" value="<?php echo $s5_9_1; ?>" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left">Semi-intensivo</td>
                    <td align="left"><input name="s5_9_2" type="text" id="s5_9_2" onkeypress="return binario(event)" value="<?php echo $s5_9_2; ?>" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left">Intensivo</td>
                    <td align="left"><input name="s5_9_3" type="text" id="s5_9_3" onkeypress="return binario(event)" onkeyup="return na1('s5_9_1','s5_9_2','s5_9_3','3')" value="<?php echo $s5_9_3; ?>" size="3" maxlength="1" /></td>
                  </tr>
                  </table></td>
            </tr>
            <tr>
              <td align="left" >10. ¿QUÉ ESPECIES CULTIVA?</td>
            </tr>
            <tr>
              <td align="left" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="31%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Especie</strong></td>
                  <td width="32%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                  <td width="37%" align="left" bgcolor="#FFFFFF" class="letra_frm">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Trucha </td>
                  <td align="left"><input name="s5_10_1" type="text" id="s5_10_1" onkeypress="return binario(event)" value="<?php echo $s5_10_1; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Tilapia</td>
                  <td align="left"><input name="s5_10_2" type="text" id="s5_10_2" onkeypress="return binario(event)" value="<?php echo $s5_10_2; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Boquichico</td>
                  <td align="left"><input name="s5_10_3" type="text" id="s5_10_3" onkeypress="return binario(event)" value="<?php echo $s5_10_3; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Paiche</td>
                  <td align="left"><input name="s5_10_4" type="text" id="s5_10_4" onkeypress="return binario(event)" value="<?php echo $s5_10_4; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Gamitana</td>
                  <td align="left"><input name="s5_10_5" type="text" id="s5_10_5" onkeypress="return binario(event)" value="<?php echo $s5_10_5; ?>" size="3" maxlength="1"  /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Paco</td>
                  <td align="left"><input name="s5_10_6" type="text" id="s5_10_6" onkeypress="return binario(event)" value="<?php echo $s5_10_6; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Caracol &quot;Churo&quot;</td>
                  <td align="left"><input name="s5_10_7" type="text" id="s5_10_7" onkeypress="return binario(event)" value="<?php echo $s5_10_7; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Camarón gigante</td>
                  <td align="left"><input name="s5_10_8" type="text" id="s5_10_8" onkeypress="return binario(event)" value="<?php echo $s5_10_8; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Langostino</td>
                  <td colspan="2" align="left"><input name="s5_10_9" type="text" id="s5_10_9" onkeypress="return binario(event)" value="<?php echo $s5_10_9; ?>" size="3" maxlength="1" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Carpa</td>
                  <td colspan="2" align="left"><input name="s5_10_10" type="text" id="s5_10_10" onkeypress="return binario(event)" value="<?php echo $s5_10_10; ?>" size="3" maxlength="1" /></td>
                </tr>
                                <tr>
                  <td align="left" class="letra_frm">Carachama</td>
                  <td colspan="2" align="left"><input name="s5_10_11" type="text" id="s5_10_11" onkeypress="return binario(event)" value="<?php echo $s5_10_11; ?>" size="3" maxlength="1" /></td>
                </tr>
                 <tr>
                   <td align="left" class="letra_frm">Sabalo</td>
                   <td colspan="2" align="left"><input name="s5_10_12" type="text" id="s5_10_12" onkeypress="return binario(event)" value="<?php echo $s5_10_12; ?>" size="3" maxlength="1" /></td>
                 </tr>
                <tr>
                  <td align="left" class="letra_frm">Peces ornamentales</td>
                  <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="0">
                    <tr>
                      <td width="27%" class="letra_frm"><input name="s5_10_13" type="text" id="s5_10_13" onkeypress="return binario(event)" value="<?php echo $s5_10_13; ?>" size="3" maxlength="1" /></td>
                      <td width="42%">&nbsp;</td>
                      <td width="31%" class="letra_frm">&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Otro</td>
                  <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr>
                      <td width="20%" align="left" class="letra_frm"><input name="s5_10_14" type="text" id="s5_10_14" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s5_10_14_o','1')" value="<?php echo $s5_10_14; ?>" size="3" maxlength="1"/></td>
                      <td width="30%" align="left"><span class="letra_frm">
                      Especifique</span></td>
                      <td width="50%" align="left" class="letra_frm"><input name="s5_10_14_o" type="text" id="s5_10_14_o"  onkeypress="return letras(event)" value="<?php echo $s5_10_14_o; ?>" size="14"/></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Otro</td>
                  <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr>
                      <td width="20%" align="left" class="letra_frm"><input name="s5_10_15" type="text" id="s5_10_15" onchange="return otros(this.name,'s5_10_15_o','1')" onkeypress="return binario(event)" onkeyup="return na2('s5_10_','14','s5_10_15')" value="<?php echo $s5_10_15; ?>" size="3" maxlength="1"/></td>
                      <td width="30%" align="left"><span class="letra_frm">
                      Especifique</span></td>
                      <td width="50%" align="left" class="letra_frm"><input name="s5_10_15_o" type="text" id="s5_10_15_o"  onkeypress="return letras(event)" value="<?php echo $s5_10_15_o; ?>" size="14" readonly="readonly"/></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td height="22" align="left" class="texto">11. SEGÚN EL NÚMERO DE ESPECIES ¿EL TIPO DE CULTIVO QUE REALIZA ES?</td>
            </tr>
            <tr>
              <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="37%" align="left" class="letra_frm">Monocultivo</td>
                  <td width="40%" align="left"><input name="s5_11_1" type="text" id="s5_11_1" onkeypress="return binario(event)" value="<?php echo $s5_11_1; ?>" size="3" maxlength="1" /></td>
                  <td width="23%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Policultivo</td>
                  <td align="left"><input name="s5_11_2" type="text" id="s5_11_2" onkeypress="return binario(event)" value="<?php echo $s5_11_2; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Cultivo asociado</td>
                  <td align="left"><input name="s5_11_3" type="text" id="s5_11_3" onkeypress="return binario(event)"  onkeyup="return nino('s5_11_','3',this.name)" value="<?php echo $s5_11_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="29" align="left"><span class="letra_frm">12. ¿SU NIVEL DE PRODUCCIÓNA ANUAL ES DE?</span></td>
            </tr>
            <tr>
              <td height="28" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="93%" border="0" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="33%" align="left" class="letra_frm"><input name="s5_12" type="text" id="S2_8" onkeypress="return numeros13(event)" value="<?php echo $s5_12; ?>" size="3" maxlength="1"  /></td>
                  <td width="44%" align="left">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="18" align="left"><span class="texto">13. QUÉ TIPO DE INSTALACIONES UTILIZA EN SU ACTIVIDAD</span></td>
            </tr>
            <tr>
              <td height="321" align="left" ><table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="20%" align="left" class="letra_frm">Tipo de Inst.</td>
                  <td width="11%" align="left">Opción</td>
                  <td width="12%" align="left">Cantidad</td>
                  <td width="10%" align="left">Unidad</td>
                  <td width="19%" align="left">Otra Unidad</td>
                  <td width="14%" align="left">Mayor Extensión</td>
                  <td width="14%" align="left">Menor Extensión</td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Estanques naturales</td>
                  <td align="left"><input name="s5_13_1" type="text" id="s5_13_1" onchange="return saltar(this.name,'s5_13_2','0')" value="<?php echo $s5_13_1; ?>" size="2" maxlength="1"  onkeypress="return binario(event)"/></td>
                  <td align="left"><input name="s5_13_1_c" type="text" id="s5_13_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_1_c; ?>" size="4" maxlength="4" /></td>
                  <td align="left"><input name="s5_13_1_u" type="text" id="s5_13_1_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_1_u; ?>" size="2" maxlength="1"  onkeyup="return saltar_b(this.name,'s5_13_1_ma','s5_13_1_u_o')"/></td>
                  <td align="left"><input name="s5_13_1_u_o" type="text" id="s5_13_1_u_o" value="<?php echo $s5_13_1_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_1_ma" type="text" id="s5_13_1_ma" value="<?php echo $s5_13_1_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_1_me" type="text" id="s5_13_1_me" value="<?php echo $s5_13_1_me; ?>" size="5" maxlength="9" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Estanques artificiales</td>
                  <td align="left"><input name="s5_13_2" type="text" id="s5_13_2" onchange="return saltar(this.name,'s5_13_3','0')" onkeypress="return binario(event)" value="<?php echo $s5_13_2; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_2_c" type="text" id="s5_13_2_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_2_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_2_u" type="text" id="s5_13_2_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_2_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_2_ma','s5_13_2_u_o')"/></td>
                  <td align="left"><input name="s5_13_2_u_o" type="text" id="s5_13_2_u_o" value="<?php echo $s5_13_2_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_2_ma" type="text" id="s5_13_2_ma" value="<?php echo $s5_13_2_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_2_me" type="text" id="s5_13_2_me" value="<?php echo $s5_13_2_me; ?>" size="5" maxlength="9" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Jaulas flotantes artesanales</td>
                  <td align="left"><input name="s5_13_3" type="text" id="s5_13_3"  onchange="return saltar(this.name,'s5_13_4','0')"  onkeypress="return binario(event)" value="<?php echo $s5_13_3; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_3_c" type="text" id="s5_13_3_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_3_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_3_u" type="text" id="s5_13_3_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_3_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_3_ma','s5_13_3_u_o')"/></td>
                  <td align="left"><input name="s5_13_3_u_o" type="text" id="s5_13_3_u_o" value="<?php echo $s5_13_3_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_3_ma" type="text" id="s5_13_3_ma" value="<?php echo $s5_13_3_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_3_me" type="text" id="s5_13_3_me" value="<?php echo $s5_13_3_me; ?>" size="5" maxlength="9" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Jaulas flotantes metálicas</td>
                  <td align="left"><input name="s5_13_4" type="text" id="s5_13_4" onchange="return saltar(this.name,'s5_13_5','0')" onkeypress="return binario(event)" value="<?php echo $s5_13_4; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_4_c" type="text" id="s5_13_4_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_4_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_4_u" type="text" id="s5_13_4_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_4_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_4_ma','s5_13_4_u_o')"/></td>
                  <td align="left"><input name="s5_13_4_u_o" type="text" id="s5_13_4_u_o" value="<?php echo $s5_13_4_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_4_ma" type="text" id="s5_13_4_ma" value="<?php echo $s5_13_4_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_4_me" type="text" id="s5_13_4_me" value="<?php echo $s5_13_4_me; ?>" size="5" maxlength="9" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Tanques</td>
                  <td align="left"><input name="s5_13_5" type="text" id="s5_13_5" onchange="return saltar(this.name,'s5_13_6','0')" onkeypress="return binario(event)" value="<?php echo $s5_13_5; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_5_c" type="text" id="s5_13_5_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_5_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_5_u" type="text" id="s5_13_5_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_5_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_5_ma','s5_13_5_u_o')" /></td>
                  <td align="left"><input name="s5_13_5_u_o" type="text" id="s5_13_5_u_o" value="<?php echo $s5_13_5_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_5_ma" type="text" id="s5_13_5_ma" value="<?php echo $s5_13_5_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_5_me" type="text" id="s5_13_5_me" value="<?php echo $s5_13_5_me; ?>" size="5" maxlength="9" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Artesas</td>
                  <td align="left"><input name="s5_13_6" type="text" id="s5_13_6" onchange="return saltar(this.name,'s5_13_7','0')"  onkeypress="return binario(event)" value="<?php echo $s5_13_6; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_6_c" type="text" id="s5_13_6_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_6_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_6_u" type="text" id="s5_13_6_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_6_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_6_ma','s5_13_6_u_o')"/></td>
                  <td align="left"><input name="s5_13_6_u_o" type="text" id="s5_13_6_u_o" value="<?php echo $s5_13_6_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_6_ma" type="text" id="s5_13_6_ma" value="<?php echo $s5_13_6_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_6_me" type="text" id="s5_13_6_me" value="<?php echo $s5_13_6_me; ?>" size="5" maxlength="9" /></td>
                  </tr>
                <tr>
                  <td align="left" class="letra_frm">Incubadoras</td>
                  <td align="left"><input name="s5_13_7" type="text" id="s5_13_7" onchange="return saltar(this.name,'s5_13_8','0')"  onkeypress="return binario(event)" value="<?php echo $s5_13_7; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_7_c" type="text" id="s5_13_7_c" onkeypress="return numeros(event)" value="<?php echo $s5_13_7_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_7_u" type="text" id="s5_13_7_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_7_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_7_ma','s5_13_7_u_o')"/></td>
                  <td align="left"><input name="s5_13_7_u_o" type="text" id="s5_13_7_u_o" value="<?php echo $s5_13_7_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_7_ma" type="text" id="s5_13_7_ma" value="<?php echo $s5_13_7_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_7_me" type="text" id="s5_13_7_me" value="<?php echo $s5_13_7_me; ?>" size="5" maxlength="9" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Otros</td>
                  <td align="left"><input name="s5_13_8" type="text" id="s5_13_8" onchange="return na2('s5_13_','7','s5_13_8')"  onkeypress="return binario(event)" onblur="return saltar_b(this.name,'s5_13_8_e','s5_14_1')" value="<?php echo $s5_13_8; ?>" size="2" maxlength="1"/></td>
                  <td align="left"><input name="s5_13_8_c" type="text" id="s5_13_8_c" onkeypress="return numeros(event)" onkeyup="return otros('s5_13_8','s5_13_8_e','1')" value="<?php echo $s5_13_8_c; ?>" size="4" maxlength="4"/></td>
                  <td align="left"><input name="s5_13_8_u" type="text" id="s5_13_8_u" onkeypress="return numeros12(event)" value="<?php echo $s5_13_8_u; ?>" size="2" maxlength="1" onkeyup="return saltar_b(this.name,'s5_13_8_ma','s5_13_8_u_o')"/></td>
                  <td align="left"><input name="s5_13_8_u_o" type="text" id="s5_13_8_u_o" value="<?php echo $s5_13_8_u_o; ?>" size="6" /></td>
                  <td align="left"><input name="s5_13_8_ma" type="text" id="s5_13_8_ma" value="<?php echo $s5_13_8_ma; ?>" size="5" maxlength="9" /></td>
                  <td align="left"><input name="s5_13_8_me" type="text" id="s5_13_8_me" value="<?php echo $s5_13_8_me; ?>" size="5" maxlength="9" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Especifique </td>
                  <td colspan="2" align="left"><input name="s5_13_8_e" type="text" id="s5_13_8_e" value="<?php echo $s5_13_8_e; ?>" size="8" maxlength="80" onchange="return salton(this.name,'s5_13_8_c')"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="28" align="left"  >14. CUENTA USTED CON UN ÁREA DE:</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="36%" align="left">Reproductores</td>
                  <td width="41%" align="left"><input name="s5_14_1" type="text" id="s5_14_1" onkeypress="return binario(event)" value="<?php echo $s5_14_1; ?>" size="3" maxlength="1"/></td>
                  <td width="23%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Incubación (Ovas)</td>
                  <td align="left"><input name="s5_14_2" type="text" id="s5_14_2" onkeypress="return binario(event)" value="<?php echo $s5_14_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Alevinos</td>
                  <td align="left"><input name="s5_14_3" type="text" id="s5_14_3" onkeypress="return binario(event)" value="<?php echo $s5_14_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Juveniles</td>
                  <td align="left"><input name="s5_14_4" type="text" id="s5_14_4" onkeypress="return binario(event)" value="<?php echo $s5_14_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Cultivo o engorde</td>
                  <td align="left"><input name="s5_14_5" type="text" id="s5_14_5" onkeypress="return binario(event)" value="<?php echo $s5_14_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Procesamiento primario</td>
                  <td align="left"><input name="s5_14_6" type="text" id="s5_14_6" onkeypress="return binario(event)" onkeyup="return na2('s5_14_','5','s5_14_6')" value="<?php echo $s5_14_6; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="28" align="left" >15. CUÁL ES EL ORIGEN DE LA SEMILLA</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="19%" align="left">Nacional</td>
                  <td width="58%" align="left"><input name="s5_15_1" type="text" id="s5_15_1"  onkeypress="return binario(event)" value="<?php echo $s5_15_1; ?>" size="3" maxlength="1"/></td>
                  <td width="23%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Extranjero</td>
                  <td align="left"><input name="s5_15_2" type="text" id="s5_15_2" onkeypress="return binario(event)"  onkeyup="return na2('s5_15_','1','s5_15_2')" value="<?php echo $s5_15_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr>
              <td height="28" align="left" >16. QUÉ TIPO DE ALIMENTOS UTILIZA EN SU CULTIVO</td>
            </tr>
            <tr>
              <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"   ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="32%" align="left">Plancton</td>
                  <td width="10%" align="left"><input name="s5_16_1" type="text" id="s5_16_1" onkeypress="return binario(event)" value="<?php echo $s5_16_1; ?>" size="3" maxlength="1"/></td>
                  <td width="24%" align="left">&nbsp;</td>
                  <td width="26%" align="left">&nbsp;</td>
                  <td width="8%" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Alevinos</td>
                  <td align="left"><input name="s5_16_2" type="text" id="s5_16_2" onkeypress="return binario(event)" value="<?php echo $s5_16_2; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Hojuelas</td>
                  <td align="left"><input name="s5_16_3" type="text" id="s5_16_3" onkeypress="return binario(event)" value="<?php echo $s5_16_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Pellet</td>
                  <td align="left"><input name="s5_16_4" type="text" id="s5_16_4" onkeypress="return binario(event)" value="<?php echo $s5_16_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">Marca</td>
                  <td align="left">Precio</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" bgcolor="#CCCCCC">Extrusado</td>
                  <td align="left" bgcolor="#CCCCCC"><input name="s5_16_5" type="text" id="s5_16_5" onchange="return saltar(this.name,'s5_16_6','0')" onkeypress="return binario(event)" value="<?php echo $s5_16_5; ?>" size="3" maxlength="1" onkeydown="return saltar(this.name,'s5_16_6','9')"/></td>
                  <td align="left" bgcolor="#CCCCCC"><input name="s5_16_5_m" type="text" id="s5_16_5_m"  onchange="return otros('s5_16_5','s5_16_5_p','1')" value="<?php echo $s5_16_5_m; ?>" size="8" /></td>
                  <td align="left" bgcolor="#CCCCCC"><input name="s5_16_5_p" type="text" id="s5_16_5_p" value="<?php echo $s5_16_5_p; ?>" size="8" onblur="return preciov('s5_16_5','s5_16_5_p')" /></td>
                  <td align="left" bgcolor="#CCCCCC">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Pre-mezclas vitamínicas</td>
                  <td align="left"><input name="s5_16_6" type="text" id="s5_16_6" onkeypress="return binario(event)" value="<?php echo $s5_16_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Biofloc</td>
                  <td align="left"><input name="s5_16_7" type="text" id="s5_16_7" onkeypress="return binario(event)" value="<?php echo $s5_16_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Prebióticos</td>
                  <td align="left"><input name="s5_16_8" type="text" id="s5_16_8" onkeypress="return binario(event)" value="<?php echo $s5_16_8; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otros</td>
                  <td align="left"><input name="s5_16_9" type="text" id="s5_16_9" onchange="return otros(this.name,'s5_16_9_o','1')" onkeypress="return binario(event)"  onkeyup="return na2('s5_16_','8','s5_16_9')" value="<?php echo $s5_16_9; ?>" size="3" maxlength="1"/></td>
                  <td align="left">Especifique</td>
                  <td align="left"><input name="s5_16_9_o" type="text" id="s5_16_9_o" value="<?php echo $s5_16_9_o; ?>" size="8" maxlength="80" readonly="readonly" /></td>
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
            <tr>
              <td height="28" align="left"  >17. QUÉ PROBLEMAS ENCUENTRA EN SU ACTIVIDAD ACUÍCOLA</td>
            </tr>
            <tr>
              <td height="28" align="left"  ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="40%" align="left">Cambios climáticos</td>
                  <td width="9%" align="left"><input name="s5_17_1" type="text" id="s5_17_1" onkeypress="return binario(event)" value="<?php echo $s5_17_1; ?>" size="3" maxlength="1"/></td>
                  <td width="18%" align="left">&nbsp;</td>
                  <td width="33%" align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Contaminación del agua</td>
                  <td align="left"><input name="s5_17_2" type="text" id="s5_17_2" onkeypress="return binario(event)" value="<?php echo $s5_17_1; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Falta de financimientos</td>
                  <td align="left"><input name="s5_17_3" type="text" id="s5_17_3" onkeypress="return binario(event)" value="<?php echo $s5_17_3; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td height="26" align="left">Altos costos de equipos, materiales</td>
                  <td align="left"><input name="s5_17_4" type="text" id="s5_17_4" onkeypress="return binario(event)" value="<?php echo $s5_17_4; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Falta de mecanismos que ayuden a preservar la calidad de su producción</td>
                  <td align="left"><input name="s5_17_5" type="text" id="s5_17_5" onkeypress="return binario(event)" value="<?php echo $s5_17_5; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Falta de capacitación y asistencia técnica</td>
                  <td align="left"><input name="s5_17_6" type="text" id="s5_17_6" onkeypress="return binario(event)" value="<?php echo $s5_17_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Infraestructura inadecuada</td>
                  <td align="left"><input name="s5_17_7" type="text" id="s5_17_7" onkeypress="return binario(event)" value="<?php echo $s5_17_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Falta de vías de acceso</td>
                  <td align="left"><input name="s5_17_8" type="text" id="s5_17_8" onkeypress="return binario(event)" value="<?php echo $s5_17_8; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Inseguridad ciudadana</td>
                  <td align="left"><input name="s5_17_9" type="text" id="s5_17_9" onkeypress="return binario(event)" value="<?php echo $s5_17_9; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left">Altos costos de alimentos</td>
                  <td align="left"><input name="s5_17_10" type="text" id="s5_17_10" onkeypress="return binario(event)" value="<?php echo $s5_17_10; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Altos costos de semillas</td>
                  <td align="left"><input name="s5_17_11" type="text" id="s5_17_11" onkeypress="return binario(event)" value="<?php echo $s5_17_11; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Presencia de enfermedades en peces</td>
                  <td align="left"><input name="s5_17_12" type="text" id="s5_17_12" onkeypress="return binario(event)" value="<?php echo $s5_17_12; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Dificultad para asociarse</td>
                  <td align="left"><input name="s5_17_13" type="text" id="s5_17_13" onkeypress="return binario(event)" value="<?php echo $s5_17_13; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Falta de promoción de mercado</td>
                  <td align="left"><input name="s5_17_14" type="text" id="s5_17_14" onkeypress="return binario(event)" value="<?php echo $s5_17_14; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">Otro</td>
                  <td align="left"><input name="s5_17_15" type="text" id="s5_17_15"  onkeypress="return binario(event)"  onkeyup="return otros(this.name,'s5_17_15_o','1')" value="<?php echo $s5_17_15; ?>" size="3" maxlength="1" /></td>
                  <td align="left">Especifique</td>
                  <td align="left"><input name="s5_17_15_o" type="text" id="s5_17_15_o" value="<?php echo $s5_17_15_o; ?>" size="14" maxlength="80" readonly="readonly" /></td>
                </tr>
                <tr>
                  <td align="left">Ninguno</td>
                  <td align="left"><input name="s5_17_16" type="text" id="s5_17_16" onkeypress="return binario(event)" onblur="return nin('s5_17_','15','s5_17_16')" value="<?php echo $s5_17_16; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><strong><strong><strong>
                    <input name="frm5" type="hidden" id="frm5" value="1" />
                  </strong></strong></strong></td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p>
        <?php if($id5==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion5()"/>
        <strong><strong>
        <input name="opc5" type="hidden" id="opc5" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion5()" />
        <strong><strong>
        <input name="opc5" type="hidden" id="opc5" value="2" />
        <?php
		 }
		 ?>
      </strong></strong></p></td>
    </tr>
    <tr>
      <td height="29" align="left">&nbsp;</td>
    </tr>
  </table>
  <br />
  <br />
</form>
</body>
</html>