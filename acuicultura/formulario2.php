<?php  session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");

//---------------------------------------------
//llenamos ubigeos
function provincia($cd,$cp)
{
	

$result = mysql_query("SELECT * FROM ccpp WHERE COD_PP='".$cp."' AND COD_DD='".$cd."' GROUP BY COD_PP ORDER BY PROVINCIA ASC");
while ($row = mysql_fetch_array($result))
{	
if ($cp==$row['COD_PP']) 
{  
echo '<option value="'.$row['COD_PP'].'" selected="selected">'.utf8_encode($row['PROVINCIA']).'</option>'; 
}

else

 { echo'<option value="'.$row['COD_PP'].'">'.utf8_encode($row['PROVINCIA']).'</option>';  }

	
}



}

//distritos
function distrito($cd,$cp,$ccdi)
{
	
	 
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$cp."' AND COD_DD='".$cd."' AND COD_DI='".$ccdi."' GROUP BY COD_DI ORDER BY DISTRITO ASC");
while ($row = mysql_fetch_array($result))
{	
if ($ccdi==$row['COD_DI']) 
{  
echo '<option value="'.$row['COD_DI'].'" selected="selected">'.utf8_encode($row['DISTRITO']).'</option>'; 
}

else

 { echo'<option value="'.$row['COD_DI'].'">'.utf8_encode($row['DISTRITO']).'</option>';  }

	
}

}

//distritos
function centro_pob($cd,$cp,$ccdi,$cod_ccpp)
{
	
$result = mysql_query("SELECT * FROM  marco WHERE CCPP='".$cp."' AND CCDD='".$cd."' AND CCDI='".$ccdi."' AND CODCCPP='".$cod_ccpp."' GROUP BY CODCCPP ORDER BY CENTRO_POBLADO ASC");
while ($row = mysql_fetch_array($result))
{	
if ($cod_ccpp==$row['COD_CCPP']) 
{  
echo '<option value="'.$row['COD_CCPP'].'" selected="selected">'.utf8_encode($row['CENTRO_POBLADO']).'</option>'; 
}

else

 { echo'<option value="'.$row['COD_CCPP'].'">'.utf8_encode($row['CENTRO_POBLADO']).'</option>';  }

}

}

//-------------------------------------------------------------------------------------------------------------


///mostrar datos
if($_SESSION['id1']!=NULL)
{ 
$mysql="SELECT * FROM acu_seccion2 WHERE id2='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{	
$id2=$row['id2'];
$s2_1_ap=$row['s2_1_ap'];
$s2_1_am=$row['s2_1_am'];
$s2_1_nom=$row['s2_1_nom'];
$s2_2=$row['s2_2'];
$s2_3d=$row['s2_3d'];
$s2_3m=$row['s2_3m'];
$s2_3a=$row['s2_3a'];
$s2_4=$row['s2_4'];
$s2_5=$row['s2_5'];
$s2_6=$row['s2_6'];
$s2_7=$row['s2_7'];
$s2_8=$row['s2_8'];
$s2_9=$row['s2_9'];
$s2_10_dd=$row['s2_10_dd'];
$s2_10_dd_cod=$row['s2_10_dd_cod'];
$s2_10_pp=$row['s2_10_pp'];
$s2_10_pp_cod=$row['s2_10_pp_cod'];
$s2_10_di=$row['s2_10_di'];
$s2_10_di_cod=$row['s2_10_di_cod'];
$s2_10_ccpp=$row['s2_10_ccpp'];
$s2_10_ccpp_cod=$row['s2_10_ccpp_cod'];
$tipvia=$row['tipvia'];
$nomvia=$row['nomvia'];
$ptanum=$row['ptanum'];
$block=$row['block'];
$int_1=$row['int_1'];
$piso=$row['piso'];
$mz=$row['mz'];
$lote=$row['lote'];
$km=$row['km'];
$s2_11_dd=$row['s2_11_dd'];
$s2_11_dd_cod=$row['s2_11_dd_cod'];
$s2_11_pp=$row['s2_11_pp'];
$s2_11_pp_cod=$row['s2_11_pp_cod'];
$s2_11_di=$row['s2_11_di'];
$s2_11_di_cod=$row['s2_11_di_cod'];
$s2_12_dd=$row['s2_12_dd'];
$s2_12_dd_cod=$row['s2_12_dd_cod'];
$s2_12_pp=$row['s2_12_pp'];
$s2_12_pp_cod=$row['s2_12_pp_cod'];
$s2_12_di=$row['s2_12_di'];
$s2_12_di_cod=$row['s2_12_di_cod'];
$s2_13=$row['s2_13'];
$s2_13g=$row['s2_13g'];
$s2_13a=$row['s2_13a'];
$s2_14=$row['s2_14'];
$s2_15_1=$row['s2_15_1'];
$s2_15_2=$row['s2_15_2'];
$s2_15_3=$row['s2_15_3'];
$s2_15_4=$row['s2_15_4'];
$s2_15_5=$row['s2_15_5'];
$s2_15_6=$row['s2_15_6'];
$s2_15_7=$row['s2_15_7'];
$s2_15_7_o=$row['s2_15_7_o'];
$s2_15_8=$row['s2_15_8'];
$s2_16=$row['s2_16'];
$s2_16_o=$row['s2_16_o'];
$s2_17=$row['s2_17'];
$s2_18_1=$row['s2_18_1'];
$s2_18_2=$row['s2_18_2'];
$s2_18_3=$row['s2_18_3'];
$s2_18_4=$row['s2_18_4'];
$s2_18_5=$row['s2_18_5'];
$s2_18_6=$row['s2_18_6'];
$s2_18_7=$row['s2_18_7'];
$s2_18_8=$row['s2_18_8'];
$s2_18_8_o=$row['s2_18_8_o'];
$s2_18_9=$row['s2_18_9'];
$s2_19=$row['s2_19'];
$s2_20=$row['s2_20'];
$s2_20g=$row['s2_20g'];
$s2_20a=$row['s2_20a'];
$s2_21_1=$row['s2_21_1'];
$s2_21_2=$row['s2_21_2'];
$s2_21_3=$row['s2_21_3'];
$s2_21_4=$row['s2_21_4'];
$s2_21_5=$row['s2_21_5'];
$s2_21_6=$row['s2_21_6'];
$s2_21_7=$row['s2_21_7'];
$s2_21_8=$row['s2_21_8'];
$s2_21_9=$row['s2_21_9'];
$s2_21_9_o=$row['s2_21_9_o'];
$s2_22=$row['s2_22'];
$s2_23=$row['s2_23'];
$s2_24_1_1=$row['s2_24_1_1'];
$s2_24_2_1=$row['s2_24_2_1'];
$s2_24_3_1=$row['s2_24_3_1'];
$s2_24_4_1a=$row['s2_24_4_1a'];
$s2_24_4_1m=$row['s2_24_4_1m'];
$s2_24_5_1=$row['s2_24_5_1'];
$s2_24_6_1=$row['s2_24_6_1'];
$s2_24_7_1=$row['s2_24_7_1'];
$s2_24_8_1=$row['s2_24_8_1'];
$s2_24_9_1=$row['s2_24_9_1'];
$s2_24_10_1=$row['s2_24_10_1'];
$s2_24_11_1=$row['s2_24_11_1'];
$s2_24_11_1_o=$row['s2_24_11_1_o'];
$s2_24_1_2=$row['s2_24_1_2'];
$s2_24_2_2=$row['s2_24_2_2'];
$s2_24_3_2=$row['s2_24_3_2'];
$s2_24_4_2a=$row['s2_24_4_2a'];
$s2_24_4_2m=$row['s2_24_4_2m'];
$s2_24_5_2=$row['s2_24_5_2'];
$s2_24_6_2=$row['s2_24_6_2'];
$s2_24_7_2=$row['s2_24_7_2'];
$s2_24_8_2=$row['s2_24_8_2'];
$s2_24_9_2=$row['s2_24_9_2'];
$s2_24_10_2=$row['s2_24_10_2'];
$s2_24_11_2=$row['s2_24_11_2'];
$s2_24_11_2_o=$row['s2_24_11_2_o'];
$s2_24_1_3=$row['s2_24_1_3'];
$s2_24_2_3=$row['s2_24_2_3'];
$s2_24_3_3=$row['s2_24_3_3'];
$s2_24_4_3a=$row['s2_24_4_3a'];
$s2_24_4_3m=$row['s2_24_4_3m'];
$s2_24_5_3=$row['s2_24_5_3'];
$s2_24_6_3=$row['s2_24_6_3'];
$s2_24_7_3=$row['s2_24_7_3'];
$s2_24_8_3=$row['s2_24_8_3'];
$s2_24_9_3=$row['s2_24_9_3'];
$s2_24_10_3=$row['s2_24_10_3'];
$s2_24_11_3=$row['s2_24_11_3'];
$s2_24_11_3_o=$row['s2_24_11_3_o'];
$s2_24_1_4=$row['s2_24_1_4'];
$s2_24_2_4=$row['s2_24_2_4'];
$s2_24_3_4=$row['s2_24_3_4'];
$s2_24_4_4a=$row['s2_24_4_4a'];
$s2_24_4_4m=$row['s2_24_4_4m'];
$s2_24_5_4=$row['s2_24_5_4'];
$s2_24_6_4=$row['s2_24_6_4'];
$s2_24_7_4=$row['s2_24_7_4'];
$s2_24_8_4=$row['s2_24_8_4'];
$s2_24_9_4=$row['s2_24_9_4'];
$s2_24_10_4=$row['s2_24_10_4'];
$s2_24_11_4=$row['s2_24_11_4'];
$s2_24_11_4_o=$row['s2_24_11_4_o'];
$s2_24_1_5=$row['s2_24_1_5'];
$s2_24_2_5=$row['s2_24_2_5'];
$s2_24_3_5=$row['s2_24_3_5'];
$s2_24_4_5a=$row['s2_24_4_5a'];
$s2_24_4_5m=$row['s2_24_4_5m'];
$s2_24_5_5=$row['s2_24_5_5'];
$s2_24_6_5=$row['s2_24_6_5'];
$s2_24_7_5=$row['s2_24_7_5'];
$s2_24_8_5=$row['s2_24_8_5'];
$s2_24_9_5=$row['s2_24_9_5'];
$s2_24_10_5=$row['s2_24_10_5'];
$s2_24_11_5=$row['s2_24_11_5'];
$s2_24_11_5_o=$row['s2_24_11_5_o'];
$s2_24_1_6=$row['s2_24_1_6'];
$s2_24_2_6=$row['s2_24_2_6'];
$s2_24_3_6=$row['s2_24_3_6'];
$s2_24_4_6a=$row['s2_24_4_6a'];
$s2_24_4_5m=$row['s2_24_4_6m'];
$s2_24_5_6=$row['s2_24_5_6'];
$s2_24_6_6=$row['s2_24_6_6'];
$s2_24_7_6=$row['s2_24_7_6'];
$s2_24_8_6=$row['s2_24_8_6'];
$s2_24_9_6=$row['s2_24_9_6'];
$s2_24_10_6=$row['s2_24_10_6'];
$s2_24_11_6=$row['s2_24_11_6'];
$s2_24_11_6_o=$row['s2_24_11_6_o'];
$s2_24_1_7=$row['s2_24_1_7'];
$s2_24_2_7=$row['s2_24_2_7'];
$s2_24_3_7=$row['s2_24_3_7'];
$s2_24_4_7a=$row['s2_24_4_7a'];
$s2_24_4_7m=$row['s2_24_4_7m'];
$s2_24_5_7=$row['s2_24_5_7'];
$s2_24_6_7=$row['s2_24_6_7'];
$s2_24_7_7=$row['s2_24_7_7'];
$s2_24_8_7=$row['s2_24_8_7'];
$s2_24_9_7=$row['s2_24_9_7'];
$s2_24_10_7=$row['s2_24_10_7'];
$s2_24_11_7=$row['s2_24_11_7'];
$s2_24_11_7_o=$row['s2_24_11_7_o'];
$s2_24_1_8=$row['s2_24_1_8'];
$s2_24_2_8=$row['s2_24_2_8'];
$s2_24_3_8=$row['s2_24_3_8'];
$s2_24_4_8a=$row['s2_24_4_8a'];
$s2_24_4_8m=$row['s2_24_4_8m'];
$s2_24_5_8=$row['s2_24_5_8'];
$s2_24_6_8=$row['s2_24_6_8'];
$s2_24_7_8=$row['s2_24_7_8'];
$s2_24_8_8=$row['s2_24_8_8'];
$s2_24_9_8=$row['s2_24_9_8'];
$s2_24_10_8=$row['s2_24_10_8'];
$s2_24_11_8=$row['s2_24_11_8'];
$s2_24_11_8_o=$row['s2_24_11_8_o'];
$s2_24_1_9=$row['s2_24_1_9'];
$s2_24_2_9=$row['s2_24_2_9'];
$s2_24_3_9=$row['s2_24_3_9'];
$s2_24_4_9a=$row['s2_24_4_9a'];
$s2_24_4_9m=$row['s2_24_4_9m'];
$s2_24_5_9=$row['s2_24_5_9'];
$s2_24_6_9=$row['s2_24_6_9'];
$s2_24_7_9=$row['s2_24_7_9'];
$s2_24_8_9=$row['s2_24_8_9'];
$s2_24_9_9=$row['s2_24_9_9'];
$s2_24_10_9=$row['s2_24_10_9'];
$s2_24_11_9=$row['s2_24_11_9'];
$s2_24_11_9_o=$row['s2_24_11_9_o'];
$s2_24_1_10=$row['s2_24_1_10'];
$s2_24_2_10=$row['s2_24_2_10'];
$s2_24_3_10=$row['s2_24_3_10'];
$s2_24_4_10a=$row['s2_24_4_10a'];
$s2_24_4_10m=$row['s2_24_4_10m'];
$s2_24_5_10=$row['s2_24_5_10'];
$s2_24_6_10=$row['s2_24_6_10'];
$s2_24_7_10=$row['s2_24_7_10'];
$s2_24_8_10=$row['s2_24_8_10'];
$s2_24_9_10=$row['s2_24_9_10'];
$s2_24_10_10=$row['s2_24_10_10'];
$s2_24_11_10=$row['s2_24_11_10'];
$s2_24_11_10_o=$row['s2_24_11_10_o'];
$pro_nac=$row['pro_nac'];
$dis_nac=$row['dis_nac'];
$pro_viv=$row['pro_viv'];
$dis_viv=$row['dis_viv'];
}

}
///---------------------------------------

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de registro de CENPESCO</title>
<style type="text/css">
@import url("estilos.css"); 
</style>
<script type="text/javascript" src="ingreso_ubigeo.js"></script>
<script type="text/javascript" src="ingreso_ubigeo1.js"></script>
<script type="text/javascript" src="ingreso_ubigeo2.js"></script>
<script type="text/javascript" src="validacion_1.js"></script>

</head>

<body >
<form id="form2" name="form2" method="post" action="variables2.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><strong>SECCIÓN II: CARACTERÍSTICAS DE LA POBLACIÓN</strong></td>
    </tr>
    <tr>
      <td height="35" align="center" class="texto" >&nbsp;</td>
    </tr>

    <tr>
      <td><table width="960" border="0" cellpadding="1" cellspacing="0">
        <tr>
          <td><table width="940" border="0" cellpadding="2" cellspacing="2">
            <tr>
              <td height="20" colspan="3" align="left" class="texto_mediano" >1. Apellidos y nombres del acuicultor</td>
              <td height="20" align="left" class="texto_mediano">&nbsp;</td>
              <td height="20" align="left" class="texto_mediano">&nbsp;</td>
              <td height="20" align="left" class="texto_mediano">&nbsp;</td>
              <td height="20" align="left" class="texto_mediano">&nbsp;</td>
              </tr>
            <tr>
              <td width="17%" height="22" align="left" valign="bottom" class="letra_frm"><span class="texto">APELLIDO PATERNO</span></td>
              <td width="19%" align="left" valign="bottom" class="letra_frm"><span class="texto">APELLIDO MATERNO</span></td>
              <td width="18%" align="left" valign="bottom" class="letra_frm"><span class="texto">NOMBRES</span></td>
              <td width="21%" align="left" valign="bottom" class="letra_frm" ><span class="texto" >2. PERSONA</span></td>
              <td colspan="3" align="left" valign="bottom" bgcolor="#FFFFFF" class="letra_frm" ><span class="texto"> 3. FECHA DE NACIMIENTO</span></td>
              </tr>
            <tr>
              <td align="left"><span class="letra_frm"><span class="texto">
                <input name="s2_1_ap" type="text" id="s2_1_ap" tabindex="1" onkeypress="return letras(event)" value="<?php echo utf8_encode($s2_1_ap); ?>" maxlength="100"/>
              </span></span></td>
              <td align="left"><span class="texto">
                <input name="s2_1_am" type="text" id="s2_1_am" tabindex="2" onkeypress="return letras(event)" value="<?php echo utf8_encode($s2_1_am); ?>" maxlength="100"/>
              </span></td>
              <td align="left"><span class="texto">
                <input name="s2_1_nom" type="text" id="s2_1_nom" tabindex="3"  onkeypress="return letras(event)" value="<?php echo utf8_encode($s2_1_nom); ?>" maxlength="100"/>
              </span></td>
              <td align="left"><span class="texto">Natural/Juridica</span> <input name="s2_2" type="text" id="s2_2" tabindex="4" onchange="regla1()"  onkeypress="return numeros_12(event)" value="<?php echo $s2_2; ?>" size="3" maxlength="1"/></td>
              <td width="4%" align="left" class="texto">DIA</td>
              <td width="4%" align="left" class="texto">MES</td>
              <td width="17%" align="left" class="texto">AÑO</td>
            </tr>
            <tr>
              <td align="left" valign="bottom" ><span class="texto_mediano"><span class="texto" >4. SEXO</span></span></td>
              <td align="left" valign="bottom"><span class="texto">5. N°  DNI</span></td>
              <td align="left" valign="bottom" class="texto">Reingrese su DNI</td>
              <td align="left" valign="bottom">&nbsp;</td>
              <td align="left"><span class="texto">
                <input name="s2_3d" type="text" id="s2_3d" tabindex="5" onchange="return dia1(this,this.value)"  onkeypress="return numeros(event)" value="<?php echo $s2_3d; ?>" size="3" maxlength="2"/>
              </span></td>
              <td align="left"><span class="texto">
                <input name="s2_3m" type="text" id="s2_3m" tabindex="6" onchange="return mes1(this,this.value)" onkeypress="return numeros(event)" value="<?php echo $s2_3m; ?>" size="3" maxlength="2"/>
              </span></td>
              <td align="left"><span class="texto">
                <input name="s2_3a" type="text" id="s2_3a" tabindex="7"  onkeypress="return numeros(event)" value="<?php echo $s2_3a; ?>" size="4" maxlength="4" onchange="return anio1(this,this.value)"/>
              </span></td>
            </tr>
            <tr>
              <td align="left" class="texto_mediano"><input name="s2_4" type="text" id="s2_4" onkeypress="return numeros12(event)" value="<?php echo $s2_4; ?>" size="5" maxlength="1"/></td>
              <td align="left" class="texto"><input name="s2_5" type="text" id="s2_5" onkeypress="return numeros(event)" value="<?php echo $s2_5; ?>" size="12" maxlength="8" /></td>
              <td align="left" class="texto" ><input name="s2_5r" type="text" id="s2_5r"   onkeypress="return numeros(event)" value="<?php echo $s2_5; ?>" size="12" maxlength="8" onblur="return dnis(this,this.name)" /></td>
              <td align="left" class="texto">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
              </tr>
            <tr>
              <td align="left" valign="bottom"><span class="texto">6. N°  RUC</span></td>
              <td align="left" valign="bottom" class="texto">Reingrese N° RUC</td>
              <td align="left" valign="bottom" class="texto">7. N°  TELF. CELULAR</td>
              <td align="left"><span class="texto">8. N°  TELF. FIJO/COMUNITARIO</span></td>
              <td colspan="3" align="left"><span class="texto">9. CORREO ELECTRÓNICO</span></td>
              </tr>
            <tr>
              <td align="left"><span class="texto">
                <input name="s2_6" type="text" id="s2_6"  onkeypress="return numeros(event)" value="<?php echo $s2_6; ?>" size="12" maxlength="11"/>
              </span></td>
              <td align="left"><span class="texto">
                <input name="s2_6r" type="text" id="s2_6r" onblur="return rucs(this,this.name)"  onkeypress="return numeros(event)" value="<?php echo $s2_6; ?>" size="12" maxlength="11"/>
              </span></td>
              <td align="left"><span class="texto">
                <input name="s2_7" type="text" id="s2_7" onkeypress="return numeros(event)" value="<?php echo $s2_7; ?>" size="12" maxlength="9"/>
              </span></td>
              <td align="left"><span class="texto">
                <input name="s2_8" type="text" id="s2_8" onkeypress="return numeros(event)" value="<?php echo $s2_8; ?>" size="12" maxlength="7"/>
              </span></td>
              <td colspan="3" align="left"><span class="texto">
                <input name="s2_9" type="text" id="s2_9" value="<?php echo $s2_9; ?>"  size="30" maxlength="80"/>
              </span></td>
              </tr>
            <tr>
              <td colspan="3" align="left"><span class="texto_mediano">10. Domicilio de la residencia habitual</span></td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="bottom" class="texto">10.1 DEPARTAMENTO</td>
              <td align="left" valign="bottom"><span class="texto">10.2 PROVINCIA</span></td>
              <td align="left" valign="bottom"><span class="texto">10.3 DISTRITO</span></td>
              <td align="left" valign="bottom"><span class="texto">10.4 CENTRO POBLADO/COMUNIDAD</span></td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="left"><span class="letra_frm">
                <select name="s2_10_dd_cod" class="letra_frm" id="s2_10_dd_cod" onchange="carga_rProv1()">
                  <option value="0">Seleccionar</option>
                  <?php
				  
				   $result = mysql_query("SELECT * FROM  marco GROUP BY CCDD ORDER BY DEPARTAMENTO ASC ");
				   while ($row = mysql_fetch_array($result)){

                
                        if ($s2_10_dd_cod==$row['CCDD']) {  echo '<option value="'.$row['CCDD'].'" selected="selected">'.$row['DEPARTAMENTO'].'</option>'; } else
                    { echo'<option value="'.$row['CCDD'].'">'.$row['DEPARTAMENTO'].'</option>';  }
					
					 }
				  
				  ?>
                </select>
              </span></td>
              <td align="left"><div id="ver_rProvincia" >
                <label>
                  <select name="s2_10_pp_cod" class="letra_frm" id="s2_10_pp_cod">
                  <?php  provincia($s2_10_dd_cod,$s2_10_pp_cod);  ?>
                  </select>
                </label>
              </div></td>
              <td><div id="ver_rDistrito" >
                <label>
                  <select name="s2_10_di_cod" class="letra_frm" id="s2_10_di_cod">
                  <?php distrito($s2_10_dd_cod,$s2_10_pp_cod,$s2_10_di_cod);  ?>
                  </select>
                </label>
                
              </div></td>
              <td align="left"><div id="ver_rCepo" >
                <label>
                  <select name="s2_10_ccpp_cod" class="letra_frm" id="s2_10_ccpp_cod">
                    <?php  centro_pob($s2_10_dd_cod,$s2_10_pp_cod,$s2_10_di_cod,$s2_10_ccpp_cod);  ?>
                  </select>
                </label>
              </div></td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            </table></td>
        </tr>
        <tr>
          <td align="left"><table width="940" border="0" cellpadding="1" cellspacing="0">
            <tr>
              <td height="20" colspan="9" align="left" bgcolor="#FFFFFF" class="letra_frm"><span class="texto_mediano">10.5 Dirección (Circule el tipo de vía y anote la dirección donde vive permanentemente el acuicultor)</span></td>
            </tr>
            <tr class="texto">
              <td width="7%" align="left" class="letra_frm">TIPO VÍA</td>
              <td width="33%" align="left" class="letra_frm">NOMBRE VÍA</td>
              <td width="13%" align="left" class="letra_frm">N° PUERTA</td>
              <td width="9%" align="left" class="letra_frm">BLOCK</td>
              <td width="8%" align="left" class="letra_frm">INTERIOR</td>
              <td width="8%" align="left" class="letra_frm">PISO</td>
              <td width="7%" align="left" class="letra_frm">MZ</td>
              <td width="7%" align="left" class="letra_frm">LOTE</td>
              <td width="8%" align="left" class="letra_frm">KM</td>
            </tr>
            <tr>
              <td><label>
                <input name="tipvia" type="text" class="texto" id="tipvia" onkeypress="return numeros18(event)" value="<?php echo $tipvia; ?>" size="4" maxlength="1" />
              </label></td>
              <td><label>
                <input name="nomvia" type="text" class="texto" id="nomvia" value="<?php echo $nomvia; ?>" size="30" maxlength="50" />
              </label></td>
              <td><input name="ptanum" type="text" id="ptanum"  value="<?php echo $ptanum; ?>" size="5" maxlength="4"/></td>
              <td align="left"><input name="block" type="text" id="block"   value="<?php echo $block; ?>" size="5" maxlength="4" /></td>
              <td align="left"><em>
                <input name="int_1" type="text" id="int_1"   value="<?php echo $int_1; ?>" size="5" maxlength="4"/>
              </em></td>
              <td align="left"><input name="piso" type="text" id="piso"  value="<?php echo $piso; ?>" size="5" maxlength="4"/></td>
              <td align="left"><input name="mz" type="text" id="mz"  value="<?php echo $mz; ?>" size="4" maxlength="4"/></td>
              <td align="left"><input name="lote" type="text" id="lote"  value="<?php echo $lote; ?>" size="4" maxlength="4"/></td>
              <td align="left"><input name="km" type="text" id="km" onkeypress="return numeros(event)" value="<?php echo $km; ?>" size="4" maxlength="4"/></td>
            </tr>
          </table></td>
        </tr>
                  
       
        <tr id="sec2_1">
          <td><table width="940" border="0" cellpadding="1" cellspacing="2">
            <tr>
              <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
                <tr>
                  <td align="left" class="texto">11. LUGAR DE NACIMIENTO</td>
                </tr>
                <tr>
                  <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                    <tr>
                      <td width="29%" class="texto">PAIS</td>
                      <td width="71%" align="left"><span class="letra_frm">
                        <select name="cod_pais"  class="letra_frm" id="cod_pais" onchange="mostrar_dep()">
                          <option value="4028">PERÚ</option>
                          <?php
				  
				   $result = mysql_query("SELECT * FROM  pais ORDER BY detalle ASC ");
				   while ($row = mysql_fetch_array($result)){

                
                        if ($s2_9_dd_co==$row['codigo']) {  echo '<option value="'.$row['codigo'].'" selected="selected">'.utf8_encode($row['detalle']).'</option>'; } else
                    { echo'<option value="'.$row['codigo'].'">'.utf8_encode($row['detalle']).'</option>';  }
					
					 }
				  
				  ?>
                        </select>
                      </span></td>
                    </tr>
                    <tr id="depa">
                      <td class="texto">DEPARTAMENTO<strong><strong>
                        <input name="s2_11_dd" type="hidden" id="s2_11_dd" />
                      </strong></strong></td>
                      <td align="left"><span class="letra_frm">
                        <select name="s2_11_dd_cod" class="texto" id="s2_11_dd_cod" onchange="carga_nProv1()">
                          <option value="0">Seleccionar</option>
                          <?php
				  
				   $result = mysql_query("SELECT * FROM  ccpp 	GROUP BY COD_DD ORDER BY DEPARTAMENTO ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($s2_11_dd_cod==$row['COD_DD']) {  echo '<option value="'.$row['COD_DD'].'" selected="selected">'.$row['DEPARTAMENTO'].'</option>'; } else
                    { echo'<option value="'.$row['COD_DD'].'">'.$row['DEPARTAMENTO'].'</option>';  }
					
					 }
				  
				  ?>
                        </select>
                      </span></td>
                    </tr>
                    
                  
                    
                    <tr id="provi">
                      <td class="texto"><span class="letra_frm">PROVINCIA<strong>
                      <input name="s2_11_pp" type="hidden" id="s2_11_pp" />
                      </strong></span></td>
                      <td align="left"><div id="ver_nProvincia" >
                        <label>
                          <select name="s2_11_pp_cod" class="texto" id="s2_11_pp_cod">
                           <?php  provincia($s2_11_dd_cod,$s2_11_pp_cod);  ?>
                          </select>
                        </label>
                      </div></td>
                    </tr>
                    <tr id="distri">
                      <td class="texto">&nbsp;</td>
                      <td align="left"><span class="texto">
                        <input name="pro_nac" type="text" id="pro_nac" value="<?php echo $pro_nac; ?>" />
                      </span></td>
                    </tr>
                    <tr>
                      <td class="texto">DISTRITO<strong>
                      <input name="s2_11_di" type="hidden" id="s2_11_di" value="" />
                      </strong></td>
                      <td align="left"><div id="ver_nDistrito" >
                        <label>
                          <select name="s2_11_di_cod" class="texto" id="s2_11_di_cod">
                             <?php distrito($s2_11_dd_cod,$s2_11_pp_cod,$s2_11_di_cod);  ?>
                          </select>
                        </label>
                      </div></td>
                    </tr>
                    <tr>
                      <td class="texto">&nbsp;</td>
                      <td align="left"><span class="texto">
                        <input name="dis_nac" type="text" id="dis_nac" value="<?php echo $dis_nac; ?>" />
                      </span></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="left"><span class="texto">12. ¿EN QUE DEPARTAMENTO, PROVINCIA Y DISTRITO VIVÍA EN EL AÑO 2007</span></td>
                </tr>
                <tr>
                  <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2" class="texto">
                                      <tr>
                      <td width="25%" align="left" class="letra_frm">PAIS</td>
                      <td width="75%" class="texto"><span class="letra_frm">
                        <select name="cod_paisv"  class="letra_frm" id="cod_paisv" onchange="mostrar_dep1()">
                          <option value="4028">PERÚ</option>
                          <?php
				  
				   $result = mysql_query("SELECT * FROM  pais ORDER BY detalle ASC ");
				   while ($row = mysql_fetch_array($result)){

                
                        if ($s2_9_dd_cod==$row['codigo']) {  echo '<option value="'.$row['codigo'].'" selected="selected">'.utf8_encode($row['detalle']).'</option>'; } else
                    { echo'<option value="'.$row['codigo'].'">'.utf8_encode($row['detalle']).'</option>';  }
					
					 }
				  
				  ?>
                        </select>
                      </span></td>
                    </tr>
                    <tr id="depa1">
                      <td width="25%" align="left" class="letra_frm">DEPARTAMENTO<strong>
                        <input name="s2_12_dd" type="hidden" id="s2_12_dd" />
                      </strong></td>
                      <td width="75%" class="texto"><span class="letra_frm">
                        <select name="s2_12_dd_cod" class="texto" id="s2_12_dd_cod" onchange="carga_vProv1()">
                          <option value="0">Seleccionar</option>
                          <?php
				  
				   $result = mysql_query("SELECT * FROM  ccpp  GROUP BY COD_DD ORDER BY DEPARTAMENTO ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($s2_12_dd_cod==$row['COD_DD']) {  echo '<option value="'.$row['COD_DD'].'" selected="selected">'.$row['DEPARTAMENTO'].'</option>'; } else
                    { echo'<option value="'.$row['COD_DD'].'">'.$row['DEPARTAMENTO'].'</option>';  }
					
					 }
				  
				  ?>
                        </select>
                        </span></td>
                    </tr>
                    <tr id="provi1">
                      <td><span class="letra_frm">PROVINCIA<strong>
                        <input name="s2_12_pp" type="hidden" id="s2_12_pp" />
                      </strong></span></td>
                      <td class="texto"><div id="ver_vProvincia" >
                        <label>
                          <select name="s2_12_pp_cod" class="texto" id="s2_12_pp_cod">
                            <?php  provincia($s2_12_dd_cod,$s2_12_pp_cod);  ?>
                          </select>
                        </label>
                      </div></td>
                    </tr>
                    <tr id="ditri1">
                      <td class="letra_frm">&nbsp;</td>
                      <td align="left" class="texto"><input name="pro_viv" type="text" id="pro_viv" value="<?php echo $pro_viv; ?>" /></td>
                    </tr>
                    <tr>
                      <td class="letra_frm">DISTRITO<strong>
                      <input name="s2_12_di" type="hidden" id="s2_12_di" value="" />
                      </strong></td>
                      <td class="texto"><div id="ver_vDistrito" >
                        <label>
                          <select name="s2_12_di_cod" class="texto" id="s2_12_di_cod">
                           <?php distrito($s2_12_dd_cod,$s2_12_pp_cod,$s2_12_di_cod);  ?>
                          </select>
                        </label>
                      </div></td>
                    </tr>
                    <tr>
                      <td class="letra_frm">&nbsp;</td>
                      <td align="left" class="texto"><label>
                        <input name="dis_viv" type="text" id="dis_viv" value="<?php echo $dis_viv; ?>" />
                      </label></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="left" class="texto">13. ¿CUÁL FUE EL ÚLTIMO NIVEL, GRADO O AÑOS DE ESTUDIO QUE APROBÓ?</td>
                </tr>
                <tr>
                  <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                    <tr class="texto">
                      <td width="46%" align="left" class="letra_frm">NIVEL</td>
                      <td width="25%" align="left" class="letra_frm">GRADO</td>
                      <td width="29%" align="left" class="letra_frm">AÑO</td>
                    </tr>
                    <tr>
                      <td align="left"><input name="s2_13" type="text" id="s2_13"  onkeypress="return numeros18(event)" onblur="return grado1('s2_14')" value="<?php echo $s2_13; ?>" size="3" maxlength="1"/></td>
                      <td align="left"><input name="s2_13g" type="text" id="s2_13g"  onkeypress="return numeros16(event)" onkeyup="return vgrado1('s2_13a','s2_13g','s2_13')" value="<?php echo $s2_13g; ?>" size="3" maxlength="1" readonly="readonly" onchange="salto(this.name,'s2_14')" /></td>
                      <td align="left"><input name="s2_13a" type="text" id="s2_13a"  onkeypress="return numeros05(event)"  onkeyup="return vgrado1('s2_13g','s2_13a','s12_13')" value="<?php echo $s2_13a; ?>" size="3" maxlength="1" readonly="readonly" onchange="salto(this.name,'s2_14')"/></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="20" align="left" class="texto">14. USTED CONSIDERA A LA ACUICULTURA COMO SU ACTIVIDAD:</td>
                </tr>
                <tr>
                  <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="s2_14" type="text" id="s2_14" onkeypress="return numeros12(event)" value="<?php echo $s2_14; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="texto">15. ¿A QUÉ OTRA ACTIVIDAD SE DEDICA?</td>
                </tr>
                <tr>
                  <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="382" border="0" cellpadding="1" cellspacing="2">
                    <tr>
                      <td width="31%" align="left" class="texto">AGRÍCOLA</td>
                      <td width="14%" align="left" class="letra_frm"><span class="texto">
                        <input name="s2_15_1" type="text" id="s2_15_1" onkeypress="return binario(event)" value="<?php echo $s2_15_1; ?>" size="3" maxlength="1" />
                      </span></td>
                      <td width="55%" align="left" class="letra_frm">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">PECUARIA</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_2" type="text" id="s2_15_2" onkeypress="return binario(event)" value="<?php echo $s2_15_2; ?>" size="3" maxlength="1" />
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">PESCA</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_3" type="text" id="s2_15_3" onkeypress="return binario(event)" value="<?php echo $s2_15_3; ?>" size="3" maxlength="1" />
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">CAZA</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_4" type="text" id="s2_15_4" onkeypress="return binario(event)" value="<?php echo $s2_15_4; ?>" size="3" maxlength="1" />
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">CONSTRUCCIÓN</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_5" type="text" id="s2_15_5" onkeypress="return binario(event)" value="<?php echo $s2_15_5; ?>" size="3" maxlength="1" />
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">COMERCIO</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_6" type="text" id="s2_15_6" onkeypress="return binario(event)" value="<?php echo $s2_15_6; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left"><span class="letra_frm"><span class="texto">Otro: Especifique</span></span></td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">OTRO</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_7" type="text" id="s2_15_7"  onkeypress="return binario(event)" onkeyup="return otros(this.name,'s2_15_7_o','1')" value="<?php echo $s2_15_7; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left"><span class="texto">
                      <input name="s2_15_7_o" type="text" id="s2_15_7_o" onkeypress="return letras(event)" value="<?php echo $s2_15_7_o; ?>" size="20" maxlength="100" readonly="readonly" />
                      </span></td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">NO TIENE</td>
                      <td align="left"><span class="texto">
                        <input name="s2_15_8" type="text" id="s2_15_8" onkeypress="return binario(event)" onkeyup="ninguno('s2_15_8','s2_15_1','s2_15_2','s2_15_3','s2_15_4','s2_15_5','s2_15_6','s2_15_7','s2_15_8','','','','','','8','1','s2_15_8')" value="<?php echo $s2_15_8; ?>" size="3" maxlength="1" />
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
                <tr>
                  <td height="22" align="left" class="texto">16. ¿CUÁL ES LA RAZÓN POR LA QUE USTED ELIGIÓ SER ACUICULTOR?</td>
                </tr>
                <tr>
                  <td height="37" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="400" border="0" cellpadding="1" cellspacing="2">
                    <tr>
                      <td width="18%" align="left" class="texto"> <input name="s2_16" type="text" id="s2_16"  onkeypress="return numeros14(event)" value="<?php echo $s2_16; ?>" size="3" maxlength="1"  onkeyup="return otros(this.name,'s2_16_o','4')"/></td>
                      <td width="40%" align="left"><span class="texto">Si es otro, especifique</span></td>
                      <td width="42%" align="left"><span class="texto">
                        <input name="s2_16_o" type="text" id="s2_16_o" onkeypress="return letras(event)" value="<?php echo $s2_16_o; ?>" size="20" maxlength="100" />
                        </span></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="23" align="left"><span class="texto">17. ¿CUÁNTOS AÑOS SE DEDICA A LA ACTIVIDAD ACUICOLA?</span></td>
                </tr>
                <tr>
                  <td height="28" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="s2_17" type="text" id="s2_17" onkeypress="return numeros14(event)" value="<?php echo $s2_17; ?>" size="5" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="texto">18. EN LOS ÚLTIMOS 12 MESES, ¿USTED O ALGÚN MIEMBRO DE SU HOGAR HA SIDO BENEFICIADO DE ALGÚN PROGRAMA SOCIAL? COMO:</td>
                </tr>
                <tr>
                  <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="440" border="0" cellpadding="1" cellspacing="2">
                    <tr>
                      <td width="56%" align="left" class="texto">VASO DE LECHE</td>
                      <td width="11%" align="left" class="letra_frm"><span class="texto">
                        <input name="s2_18_1" type="text" id="s2_18_1" onkeypress="return binario(event)" value="<?php echo $s2_18_1; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td width="33%" align="left" class="letra_frm">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">COMEDOR POPULAR</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_2" type="text" id="s2_18_2" onkeypress="return binario(event)" value="<?php echo $s2_18_2; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">DESAYUNO O ALIMENTACIÓN ESCOLAR</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_3" type="text" id="s2_18_3" onkeypress="return binario(event)" value="<?php echo $s2_18_3; ?>" size="3" maxlength="1"/>
                        </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">SEGURO INTEGRAL DE SALUD (SIS)</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_4" type="text" id="s2_18_4" onkeypress="return binario(event)" value="<?php echo $s2_18_4; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">PROGRAMA JUNTOS</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_5" type="text" id="s2_18_5" onkeypress="return binario(event)" value="<?php echo $s2_18_5; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">PROGRAMA BONO DE GRATITUD (PENSIÓN 65)</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_6" type="text" id="s2_18_6" onkeypress="return binario(event)" value="<?php echo $s2_18_6; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">PROGRAMA CUNA MÁS</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_7" type="text" id="s2_18_7"  onkeypress="return binario(event)" value="<?php echo $s2_18_7; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left"><span class="letra_frm"><span class="texto">Otro: Especifique</span></span></td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">OTRO</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_8" type="text" id="s2_18_8" onkeypress="return binario(event)" onkeyup="return otros(this.name,'s2_18_8_o','1')" value="<?php echo $s2_18_8; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_8_o" type="text" id="s2_18_8_o" onkeypress="return letras(event)" value="<?php echo $s2_18_8_o; ?>" size="20" maxlength="100" readonly="readonly" />
                      </span></td>
                    </tr>
                    <tr>
                      <td align="left" class="texto">NINGUNO</td>
                      <td align="left"><span class="texto">
                        <input name="s2_18_9" type="text" id="s2_18_9" onkeypress="return binario(event)" onkeyup="ninguno('s2_18_9','s2_18_1','s2_18_2','s2_18_3','s2_18_4','s2_18_5','s2_18_6','s2_18_7','s2_18_8','s2_18_9','','','','','9','0','s2_18_9')" value="<?php echo $s2_18_9; ?>" size="3" maxlength="1"/>
                      </span></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="left" class="texto" >19. EN LA ACTUALIDAD ¿CUÁL ES SU ESTADO CIVIL O CONYUGAL?</td>
                </tr>
                <tr>
                  <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="s2_19" type="text" id="s2_19" onkeypress="return numeros16(event)" onblur="return conyuge(this.name)" value="<?php echo $s2_19; ?>" size="5" maxlength="1"/></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr id="sec2_2">
      <td height="38" align="left" valign="top" class="texto"><table width="960" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td align="left" valign="top" class="texto_mediano">CARACTERÍSTICA DE LOS MIEMBROS DEL HOGAR</td>
        </tr>
        <tr>
          <td><table width="960" border="0" cellpadding="1" cellspacing="1" id="ec1">
            <tr>
              <td align="left">20.¿CUÁL FUE EL ÚLTIMO NIVEL, GRADO O AÑO DE ESTUDIOS QUE APROBÓ SU CÓNYUGE/CONVIVIENTE?</td>
              <td valign="top">21. ¿A QUÉ ACTIVIDAD SE DEDICA SU CÓNYUGE/CONVIVIENTE?</td>
            </tr>
            <tr>
              <td align="left" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr class="texto">
                  <td width="51%" align="left" class="letra_frm">NIVEL</td>
                  <td width="23%" align="left" class="letra_frm">GRADO</td>
                  <td width="26%" align="left" class="letra_frm">AÑO</td>
                </tr>
                <tr>
                  <td align="left"><input name="s2_20" type="text" id="s2_20" onblur="return grado2('s2_21_1')" onkeypress="return numeros18(event)" value="<?php echo $s2_20; ?>" size="5" maxlength="1"/></td>
                  <td align="left"><input name="s2_20g" type="text" id="s2_20g"  onkeypress="return numeros16(event)" value="<?php echo $s2_20g; ?>" size="3" maxlength="1" readonly="readonly" onchange="salto(this.name,'s2_21_1')"/></td>
                  <td align="left"><input name="s2_20a" type="text" id="s2_20a" onkeypress="return numeros05(event)" value="<?php echo $s2_20a; ?>" size="3" maxlength="1" readonly="readonly" onchange="salto(this.name,'s2_21_1')"/></td>
                </tr>
              </table></td>
              <td align="left"><table width="440" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="56%" align="left" class="texto">AL CUIDADO DEL HOGAR</td>
                  <td width="11%" align="left" class="letra_frm"><input name="s2_21_1" type="text" id="s2_21_1"  onkeypress="return binario(event)" value="<?php echo $s2_21_1; ?>" size="3" maxlength="1"/></td>
                  <td width="33%" align="left" class="letra_frm">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">AGRÍCOLA</td>
                  <td align="left"><input name="s2_21_2" type="text" id="s2_21_2" onkeypress="return binario(event)" value="<?php echo $s2_21_2; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">PECUARIA</td>
                  <td align="left"><input name="s2_21_3" type="text" id="s2_21_3" onkeypress="return binario(event)" value="<?php echo $s2_21_3; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">ACUÍCOLA</td>
                  <td align="left"><input name="s2_21_4" type="text" id="s2_21_4" onkeypress="return binario(event)" value="<?php echo $s2_21_4; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">PESCA</td>
                  <td align="left"><input name="s2_21_5" type="text" id="s2_21_5" onkeypress="return binario(event)" value="<?php echo $s2_21_5; ?>" size="3" maxlength="1" /></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">CAZA</td>
                  <td align="left"><input name="s2_21_6" type="text" id="s2_21_6" onkeypress="return binario(event)" value="<?php echo $s2_21_6; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">CONSTRUCCIÓN</td>
                  <td align="left"><input name="s2_21_7" type="text" id="s2_21_7" onkeypress="return binario(event)" value="<?php echo $s2_21_7; ?>" size="3" maxlength="1"/></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="texto">COMERCIO</td>
                  <td align="left"><input name="s2_21_8" type="text" id="s2_21_8" onkeypress="return binario(event)" value="<?php echo $s2_21_8; ?>" size="3" maxlength="1" /></td>
                  <td align="left"><span class="letra_frm">Otro: Especifique</span></td>
                </tr>
                <tr>
                  <td align="left" class="texto">OTRO</td>
                  <td align="left"><input name="s2_21_9" type="text" id="s2_21_9"  onkeypress="return binario(event)" onkeyup="return otros_v(this.name,'s2_21_9_o','1','s2_21_1','s2_21_2','s2_21_3','s2_21_4','s2_21_5','s2_21_6','s2_21_7','s2_21_8','s2_21_9','','9')" value="<?php echo $s2_21_9; ?>" size="3" maxlength="1"/></td>
                  <td align="left"><input name="s2_21_9_o" type="text" id="s2_21_9_o"  onkeypress="return letras(event)" value="<?php echo $s2_21_9_o; ?>" size="20" maxlength="100" readonly="readonly"/></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="960" border="0">
            <tr>
              <td width="432" align="left">22. ¿TIENE HIJOS(AS)?</td>
              <td width="518" align="left">23. ¿CUÁNTOS HIJOS(AS) TIENE EN TOTAL?</td>
            </tr>
            <tr>
              <td align="left"><input name="s2_22" type="text" id="s2_22" onkeypress="return numeros12(event)" onkeyup="return regla2()" value="<?php echo $s2_22; ?>" size="5" maxlength="1"/></td>
              <td align="left"><input name="s2_23" type="text" id="s2_23" onkeypress="return numeros(event)" value="<?php echo $s2_23; ?>" size="12" maxlength="2" onchange="return hijos(this.name)" /></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr id="sec2_3">
      <td align="left"><table width="960" border="0">
        <tr id="regla2_0">
          <td align="left" class="texto">24. INFORMACIÓN DE LOS HIJOS/AS (Registra la información de los hijos de mayor a menor)</td>
          </tr>
        <tr id="regla2_1">
          <td align="left"><table width="960" border="0" cellpadding="1" cellspacing="0" >
            <tr>
              <td width="16" rowspan="3" align="left" class="textin" style="border:thin;border: 1px solid #9DD6E1">24.1 N°</td>
              <td width="144" rowspan="3" align="center" valign="middle" class="textin" style="border:thin;border: 1px solid #9DD6E1">24.2 NOMBRE</td>
              <td width="41" rowspan="3" align="center" valign="middle" class="textin" style="border:thin;border: 1px solid #9DD6E1">24.3 SEXO</td>
              <td colspan="2" rowspan="2" align="center" valign="middle" class="textin" style="border:thin;border: 1px solid #9DD6E1"><strong>24.4 Edad</strong></td>
              <td width="48" rowspan="3" align="center" valign="middle" class="textin" style="border:thin;border: 1px solid #9DD6E1">24.5 ¿Su hijo vive con Ud?</td>
              <td width="61" rowspan="3" align="center" valign="middle" style="border:thin;border: 1px solid #9DD6E1"><span class="textin" >24.6 ¿Su hijo depende econ. de Ud?</span></td>
              <td width="67" rowspan="3" align="center" valign="middle" style="border:thin;border: 1px solid #9DD6E1"><span class="textin" >24.7 ¿Su hijo tiene algún tipo de dificultad o limitación permanente?</span></td>
              <td height="26" colspan="3" align="center" valign="middle" class="textin"><strong>Para 3 y más años de edad</strong></td>
              <td width="98" align="center" valign="middle" class="textin"><strong>Para 14 años y más</strong></td>
              <td width="102" align="center" valign="middle" class="textin">&nbsp;</td>
              </tr>
            <tr>
              <td width="73" rowspan="2" align="center" valign="middle" bgcolor="#CCFFFF" style="border:thin;border: 1px solid #9DD6E1"><span class="textin">24.8 ¿Cual es el último nivel de estudios alcanzados?</span></td>
              <td width="95" rowspan="2" align="center" valign="middle" bgcolor="#F0F0F0" style="border:thin;border: 1px solid #9DD6E1"><span class="textin">24.9 ¿Actualmente se encuentra estudiando?</span></td>
              <td width="99" height="25" bgcolor="#FFFFCC">&nbsp;</td>
              <td width="98" rowspan="2" align="center" valign="middle" style="border:thin;border: 1px solid #9DD6E1"><span class="textin">24.11 ¿Actualmente a qué actividad se dedica?</span></td>
              <td width="102" rowspan="2" align="center" valign="middle" class="textin" style="border:thin;border: 1px solid #9DD6E1">Si es otra, especifique</td>
              </tr>
            <tr>
              <td width="43" height="25" align="center" bgcolor="#99CCFF" class="textin">Años</td>
              <td width="47" align="center" bgcolor="#99FFFF" class="textin">Meses</td>
              <td align="center" bgcolor="#FFFFCC" style="border:thin;border: 1px solid #9DD6E1"><span class="textin" >24.10 La institución educativa que asiste es:</span></td>
              </tr>
            <tr id="hijo1">
              <td height="28" align="center" valign="middle" class="textin">1</td>
              <td align="center" valign="middle" class="textin"><input name="s2_24_1_1" type="hidden" id="s2_24_1_1" value="1" />
                <input name="s2_24_2_1" type="text" id="s2_24_2_1"  onkeypress="return letras(event)" value="<?php echo $s2_24_2_1; ?>" size="20" maxlength="100"/></td>
              <td align="center" valign="middle"><input name="s2_24_3_1" type="text" id="s2_24_3_1"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_1; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_1a" type="text" id="s2_24_4_1a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_1a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_1m',this.name)" onkeydown="return mayores(this.name,'1')" onchange="return saltar_edad(this.name,'1')"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_1m" type="text" id="s2_24_4_1m" value="<?php echo $s2_24_4_1m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para meses')" /></td>
              <td align="center" valign="middle"><input name="s2_24_5_1" type="text" id="s2_24_5_1"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_1; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_6_1" type="text" id="s2_24_6_1" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_1; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_7_1" type="text" id="s2_24_7_1" onkeypress="return numeros12(event)" value="<?php echo $s2_24_7_1; ?>" size="3" maxlength="1" onkeyup="return saltin('s2_24_4_1a','s2_24_2_2','2',this.name)"/></td>
              <td align="center" valign="middle"><input name="s2_24_8_1" type="text" id="s2_24_8_1" value="<?php echo $s2_24_8_1; ?>" size="3" maxlength="2"  onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')"/></td>
              <td align="center" valign="middle"><input name="s2_24_9_1" type="text" id="s2_24_9_1" onkeypress="return duo(event)" value="<?php echo $s2_24_9_1; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_1',this.name)" onchange="return salta_ie('s2_24_4_1a',this.name,'s2_24_10_1','s2_24_11_1','s2_24_2_2')" /></td>
              <td align="center" valign="middle"><input name="s2_24_10_1" type="text" id="s2_24_10_1" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_1; ?>" size="3" maxlength="1"/></td>
              <td align="center"><input name="s2_24_11_1" type="text" id="s2_24_11_1" onchange="return noventinueve(this.name)"  onkeypress="return numeros19(event)" value="<?php echo $s2_24_11_1; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_1_o','8')"/></td>
              <td align="center"><input name="s2_24_11_1_o" type="text" id="s2_24_11_1_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_1_o; ?>" size="12" maxlength="100"/></td> 
              </tr>
            <tr id="hijo2">
              <td height="29" align="center" valign="middle" bgcolor="#FFFFFF" class="textin">2</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="textin"><input name="s2_24_1_2" type="hidden" id="s2_24_1_2" value="2" />
                <input name="s2_24_2_2" type="text" id="s2_24_2_2" onkeypress="return letras(event)" value="<?php echo $s2_24_2_2; ?>" size="20" maxlength="100"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_3_2" type="text" id="s2_24_3_2"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_2; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_2a" type="text" id="s2_24_4_2a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_2a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_2m',this.name)" onkeydown="return mayores(this.name,'2')" onchange="return saltar_edad(this.name,'2')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_2m" type="text" id="s2_24_4_2m" value="<?php echo $s2_24_4_2m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_5_2" type="text" id="s2_24_5_2" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_2; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_6_2" type="text" id="s2_24_6_2" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_2; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_7_2" type="text" id="s2_24_7_2"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_7_2; ?>" size="3" maxlength="1" onkeyup="return saltin('s2_24_4_2a','s2_24_2_3','2',this.name)"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_8_2" type="text" id="s2_24_8_2" value="<?php echo $s2_24_8_2; ?>" size="3" maxlength="2"  onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_9_2" type="text" id="s2_24_9_2" onkeypress="return duo(event)" value="<?php echo $s2_24_9_2; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_2',this.name)" onchange="return salta_ie('s2_24_4_2a',this.name,'s2_24_10_2','s2_24_11_2','s2_24_2_3')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_10_2" type="text" id="s2_24_10_2" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_2; ?>" size="3" maxlength="1"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_2" type="text" id="s2_24_11_2" onchange="return noventinueve(this.name)"  onkeypress="return numeros19(event)" value="<?php echo $s2_24_11_2; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_2_o','8')" /></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_2_o" type="text" id="s2_24_11_2_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_2_o; ?>" size="12" maxlength="100" /></td>
              </tr>
            <tr id="hijo3">
              <td height="29" align="center" valign="middle" class="textin">3</td>
              <td align="center" valign="middle" class="textin"><input name="s2_24_1_3" type="hidden" id="s2_24_1_3" value="3" />
                <input name="s2_24_2_3" type="text" id="s2_24_2_3" onkeypress="return letras(event)" value="<?php echo $s2_24_2_3; ?>" size="20" maxlength="100" /></td>
              <td align="center" valign="middle"><input name="s2_24_3_3" type="text" id="s2_24_3_3"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_3; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_3a" type="text" id="s2_24_4_3a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_3a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_3m',this.name)" onkeydown="return mayores(this.name,'3')" onchange="return saltar_edad(this.name,'3')"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_3m" type="text" id="s2_24_4_3m" value="<?php echo $s2_24_4_3m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle"><input name="s2_24_5_3" type="text" id="s2_24_5_3" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_3; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_6_3" type="text" id="s2_24_6_3" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_3; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_7_3" type="text" id="s2_24_7_3" onkeypress="return numeros12(event)" value="<?php echo $s2_24_7_3; ?>" size="3" maxlength="1" onkeyup="return saltin('s2_24_4_3a','s2_24_2_4','2',this.name)"/></td>
              <td align="center" valign="middle"><input name="s2_24_8_3" type="text" id="s2_24_8_3" value="<?php echo $s2_24_8_3; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')" /></td>
              <td align="center" valign="middle"><input name="s2_24_9_3" type="text" id="s2_24_9_3" value="<?php echo $s2_24_9_3; ?>" size="3" maxlength="1" 
               onkeyup="return edad_n('s2_24_10_3',this.name)" onkeypress="return numeros12(event)"  onchange="return salta_ie('s2_24_4_3a',this.name,'s2_24_10_3','s2_24_11_3','s2_24_2_4')"/></td>
              <td align="center" valign="middle"><input name="s2_24_10_3" type="text" id="s2_24_10_3" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_3; ?>" size="3" maxlength="1" /></td>
              <td align="center"><input name="s2_24_11_3" type="text" id="s2_24_11_3" onchange="return noventinueve(this.name)"  onkeypress="return numeros19(event)" value="<?php echo $s2_24_11_3; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_3_o','8')"/></td>
              <td align="center"><input name="s2_24_11_3_o" type="text" id="s2_24_11_3_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_3_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            <tr id="hijo4">
              <td height="30" align="center" valign="middle" bgcolor="#FFFFFF" class="textin">4</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="textin"><input name="s2_24_1_4" type="hidden" id="s2_24_1_4" value="4" />
                <input name="s2_24_2_4" type="text" id="s2_24_2_4" onkeypress="return letras(event)" value="<?php echo $s2_24_2_4; ?>" size="20" maxlength="100"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_3_4" type="text" id="s2_24_3_4"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_4; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_4a" type="text" id="s2_24_4_4a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_4a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_4m',this.name)" onkeydown="return mayores(this.name,'4')" onchange="return saltar_edad(this.name,'4')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_4m" type="text" id="s2_24_4_4m" value="<?php echo $s2_24_4_4m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_5_4" type="text" id="s2_24_5_4"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_4; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_6_4" type="text" id="s2_24_6_4" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_4; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_7_4" type="text" id="s2_24_7_4" onkeypress="return numeros12(event)" value="<?php echo $s2_24_7_4; ?>" size="3" maxlength="1"  onkeyup="return saltin('s2_24_4_4a','s2_24_2_5','2',this.name)"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_8_4" type="text" id="s2_24_8_4" value="<?php echo $s2_24_8_4; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_9_4" type="text" id="s2_24_9_4" onkeypress="return duo(event)" value="<?php echo $s2_24_9_4; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_4',this.name)"  onchange="return salta_ie('s2_24_4_4a',this.name,'s2_24_10_4','s2_24_11_4','s2_24_2_5')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_10_4" type="text" id="s2_24_10_4"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_4; ?>" size="3" maxlength="1"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_4" type="text" id="s2_24_11_4" onchange="return noventinueve(this.name)" onkeyup="return otros(this.name,'s2_24_11_4_o','8')" value="<?php echo $s2_24_11_4; ?>" size="3" maxlength="2"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_4_o" type="text" id="s2_24_11_4_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_4_o; ?>" size="12" maxlength="100" /></td>
              </tr>
            <tr id="hijo5">
              <td height="28" align="center" valign="middle" class="textin">5</td>
              <td align="center" valign="middle" class="textin"><input name="s2_24_1_5" type="hidden" id="s2_24_1_5" value="5" />
                <input name="s2_24_2_5" type="text" id="s2_24_2_5" onkeypress="return letras(event)" value="<?php echo $s2_24_2_5; ?>" size="20" maxlength="100" /></td>
              <td align="center" valign="middle"><input name="s2_24_3_5" type="text" id="s2_24_3_5" onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_5; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_5a" type="text" id="s2_24_4_5a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_5a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_5m',this.name)" onkeydown="return mayores(this.name,'5')" onchange="return saltar_edad(this.name,'5')"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_5m" type="text" id="s2_24_4_5m" value="<?php echo $s2_24_4_5m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')" /></td>
              <td align="center" valign="middle"><input name="s2_24_5_5" type="text" id="s2_24_5_5"  onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_5; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_6_5" type="text" id="s2_24_6_5" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_5; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_7_5" type="text" id="s2_24_7_5" value="<?php echo $s2_24_7_5; ?>" size="3" maxlength="1"  onkeyup="return saltin('s2_24_4_5a','s2_24_2_6','2',this.name)"/></td>
              <td align="center" valign="middle"><input name="s2_24_8_5" type="text" id="s2_24_8_5" value="<?php echo $s2_24_8_5; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')" /></td>
              <td align="center" valign="middle"><input name="s2_24_9_5" type="text" id="s2_24_9_5" value="<?php echo $s2_24_9_5; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_5',this.name)" onchange="return salta_ie('s2_24_4_5a',this.name,'s2_24_10_5','s2_24_11_5','s2_24_2_6')"/></td>
              <td align="center" valign="middle"><input name="s2_24_10_5" type="text" id="s2_24_10_5" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_5; ?>" size="3" maxlength="1"/></td>
              <td align="center"><input name="s2_24_11_5" type="text" id="s2_24_11_5" onchange="return noventinueve(this.name)" value="<?php echo $s2_24_11_5; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_5_o','8')"/></td>
              <td align="center"><input name="s2_24_11_5_o" type="text" id="s2_24_11_5_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_5_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            <tr id="hijo6">
              <td height="30" align="center" valign="middle" bgcolor="#FFFFFF" class="textin">6</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="textin"><input name="s2_24_1_6" type="hidden" id="s2_24_1_6" value="6" />
                <input name="s2_24_2_6" type="text" id="s2_24_2_6"  onkeypress="return letras(event)" value="<?php echo $s2_24_2_6; ?>" size="20" maxlength="100"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_3_6" type="text" id="s2_24_3_6" onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_6; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_6a" type="text" id="s2_24_4_6a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_6a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_6m',this.name)" onkeydown="return mayores(this.name,'6')" onchange="return saltar_edad(this.name,'6')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_6m" type="text" id="s2_24_4_6m" value="<?php echo $s2_24_4_6m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_5_6" type="text" id="s2_24_5_6" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_6; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_6_6" type="text" id="s2_24_6_6" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_6; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_7_6" type="text" id="s2_24_7_6" value="<?php echo $s2_24_7_6; ?>" size="3" maxlength="1" onkeyup="return saltin('s2_24_4_6a','s2_24_2_7','2',this.name)"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_8_6" type="text" id="s2_24_8_6" value="<?php echo $s2_24_8_6; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_9_6" type="text" id="s2_24_9_6" value="<?php echo $s2_24_9_6; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_6',this.name)" onchange="return salta_ie('s2_24_4_6a',this.name,'s2_24_10_6','s2_24_11_6','s2_24_2_7')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_10_6" type="text" id="s2_24_10_6" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_6; ?>" size="3" maxlength="1"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_6" type="text" id="s2_24_11_6" onchange="return noventinueve(this.name)" value="<?php echo $s2_24_11_6; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_6_o','8')"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_6_o" type="text" id="s2_24_11_6_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_6_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            <tr id="hijo7">
              <td height="30" align="center" valign="middle" class="textin">7</td>
              <td align="center" valign="middle" class="textin"><input name="s2_24_1_7" type="hidden" id="s2_24_1_7" value="7" />
                <input name="s2_24_2_7" type="text" id="s2_24_2_7" onkeypress="return letras(event)" value="<?php echo $s2_24_2_7; ?>" size="20" maxlength="100" /></td>
              <td align="center" valign="middle"><input name="s2_24_3_7" type="text" id="s2_24_3_7" onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_7; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_7a" type="text" id="s2_24_4_7a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_7a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_7m',this.name)" onkeydown="return mayores(this.name,'7')" onchange="return saltar_edad(this.name,'7')"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_7m" type="text" id="s2_24_4_7m" value="<?php echo $s2_24_4_7m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle"><input name="s2_24_5_7" type="text" id="s2_24_5_7" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_7; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_6_7" type="text" id="s2_24_6_7" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_7; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_7_7" type="text" id="s2_24_7_7" value="<?php echo $s2_24_7_7; ?>" size="3" maxlength="1" onkeyup="return saltin('s2_24_4_7a','s2_24_2_8','2',this.name)"/></td>
              <td align="center" valign="middle"><input name="s2_24_8_7" type="text" id="s2_24_8_7" value="<?php echo $s2_24_8_7; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')" /></td>
              <td align="center" valign="middle"><input name="s2_24_9_7" type="text" id="s2_24_9_7" value="<?php echo $s2_24_9_7; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_7',this.name)" onchange="return salta_ie('s2_24_4_7a',this.name,'s2_24_10_7','s2_24_11_7','s2_24_2_8')"/></td>
              <td align="center" valign="middle"><input name="s2_24_10_7" type="text" id="s2_24_10_7" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_7; ?>" size="3" maxlength="1"/></td>
              <td align="center"><input name="s2_24_11_7" type="text" id="s2_24_11_7" onchange="return noventinueve(this.name)" value="<?php echo $s2_24_11_7; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_7_o','8')"/></td>
              <td align="center"><input name="s2_24_11_7_o" type="text" id="s2_24_11_7_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_7_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            <tr id="hijo8">
              <td height="28" align="center" valign="middle" bgcolor="#FFFFFF" class="textin">8</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="textin"><input name="s2_24_1_8" type="hidden" id="s2_24_1_8" value="8" />
                <input name="s2_24_2_8" type="text" id="s2_24_2_8" onkeypress="return letras(event)" value="<?php echo $s2_24_2_8; ?>" size="20"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_3_8" type="text" id="s2_24_3_8" onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_8; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_8a" type="text" id="s2_24_4_8a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_8a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_8m',this.name)" onkeydown="return mayores(this.name,'8')" onchange="return saltar_edad(this.name,'8')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_8m" type="text" id="s2_24_4_8m" value="<?php echo $s2_24_4_8m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_5_8" type="text" id="s2_24_5_8" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_8; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_6_8" type="text" id="s2_24_6_8" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_8; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_7_8" type="text" id="s2_24_7_8" value="<?php echo $s2_24_7_8; ?>" size="3" maxlength="1"  onkeyup="return saltin('s2_24_4_8a','s2_24_2_9','2',this.name)"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_8_8" type="text" id="s2_24_8_8" value="<?php echo $s2_24_8_8; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_9_8" type="text" id="s2_24_9_8" value="<?php echo $s2_24_9_8; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_8',this.name)" onchange="return salta_ie('s2_24_4_8a',this.name,'s2_24_10_8','s2_24_11_8','s2_24_2_9')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_10_8" type="text" id="s2_24_10_8" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_8; ?>" size="3" maxlength="1" /></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_8" type="text" id="s2_24_11_8" onchange="return noventinueve(this.name)" value="<?php echo $s2_24_11_8; ?>" size="3" maxlength="1" onkeyup="return otros(this.name,'s2_24_11_8_o','8')"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_8_o" type="text" id="s2_24_11_8_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_8_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            <tr id="hijo9" >
              <td height="28" align="center" valign="middle" class="textin">9</td>
              <td align="center" valign="middle" class="textin"><input name="s2_24_1_9" type="hidden" id="s2_24_1_9" value="9" />
                <input name="s2_24_2_9" type="text" id="s2_24_2_9" onkeypress="return letras(event)" value="<?php echo $s2_24_2_9; ?>" size="20" maxlength="100"/></td>
              <td align="center" valign="middle"><input name="s2_24_3_9" type="text" id="s2_24_3_9" onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_9; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_4_9a" type="text" id="s2_24_4_9a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_9a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_9m',this.name)" onkeydown="return mayores(this.name,'9')" onchange="return saltar_edad(this.name,'9')"></td>
              <td align="center" valign="middle"><input name="s2_24_4_9m" type="text" id="s2_24_4_9m" value="<?php echo $s2_24_4_9m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle"><input name="s2_24_5_9" type="text" id="s2_24_5_9" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_9; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_6_9" type="text" id="s2_24_6_9" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_9; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle"><input name="s2_24_7_9" type="text" id="s2_24_7_9" value="<?php echo $s2_24_7_9; ?>" size="3" maxlength="1" onkeyup="return saltin('s2_24_4_9a','s2_24_2_10','2',this.name)"/></td>
              <td align="center" valign="middle"><input name="s2_24_8_9" type="text" id="s2_24_8_9" value="<?php echo $s2_24_8_9; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')" /></td>
              <td align="center" valign="middle"><input name="s2_24_9_9" type="text" id="s2_24_9_9" value="<?php echo $s2_24_9_9; ?>" size="3" maxlength="1"  onkeyup="return edad_n('s2_24_10_9',this.name)" onchange="return salta_ie('s2_24_4_9a',this.name,'s2_24_10_9','s2_24_11_8','s2_24_2_10')"/></td>
              <td align="center" valign="middle"><input name="s2_24_10_9" type="text" id="s2_24_10_9" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_9; ?>" size="3" maxlength="1"/></td>
              <td align="center"><input name="s2_24_11_9" type="text" id="s2_24_11_9" onchange="return noventinueve(this.name)" onkeypress="return numeros(event)" value="<?php echo $s2_24_11_9; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_9_o','8')"/></td>
              <td align="center"><input name="s2_24_11_9_o" type="text" id="s2_24_11_9_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_9_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            <tr id="hijo10">
              <td height="27" align="center" valign="middle" bgcolor="#FFFFFF" class="textin">10</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" class="textin"><input name="s2_24_1_10" type="hidden" id="s2_24_1_10" value="10" />
                <input name="s2_24_2_10" type="text" id="s2_24_2_10" onkeypress="return letras(event)" value="<?php echo $s2_24_2_10; ?>" size="20" maxlength="100"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_3_10" type="text" id="s2_24_3_10" onkeypress="return numeros12(event)" value="<?php echo $s2_24_3_10; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_10a" type="text" id="s2_24_4_10a" onkeypress="return numeros(event)" value="<?php echo $s2_24_4_10a; ?>" size="3" maxlength="2" onkeyup="return edad_m('s2_24_4_10m',this.name)"
              onkeydown="return mayores(this.name,'10')" onchange="return saltar_edad(this.name,'10')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_4_10m" type="text" id="s2_24_4_10m" value="<?php echo $s2_24_4_10m; ?>" size="3" maxlength="2" onchange="entrada1(this.name,'11','0','99','Ingrese valores entre 0 y 11 para mesess')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_5_10" type="text" id="s2_24_5_10" onkeypress="return numeros12(event)" value="<?php echo $s2_24_5_10; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_6_10" type="text" id="s2_24_6_10" onkeypress="return numeros12(event)" value="<?php echo $s2_24_6_10; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_7_10" type="text" id="s2_22_7_10" onkeypress="return numeros12(event)" value="<?php echo $s2_24_7_10; ?>" size="3" maxlength="1"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_8_10" type="text" id="s2_24_8_10" value="<?php echo $s2_24_8_10; ?>" size="3" maxlength="2" onkeyup="entrada1(this.name,'10','1','99','Ingrese valores entre 1 y 10 para el nivel alcanzado')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_9_10" type="text" id="s2_24_9_10" value="<?php echo $s2_24_9_10; ?>" size="3" maxlength="1" onkeyup="return edad_n('s2_24_10_10',this.name)" onchange="return salta_ie('s2_24_4_10a',this.name,'s2_24_10_10','s2_24_11_10','s2_24_9_10')"/></td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="s2_24_10_10" type="text" id="s2_24_10_10" onkeypress="return numeros12(event)" value="<?php echo $s2_24_10_10; ?>" size="3" maxlength="1"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_10" type="text" id="s2_24_11_10" onchange="return noventinueve(this.name)"   onkeypress="return numeros19(event)" value="<?php echo $s2_24_11_10; ?>" size="3" maxlength="2" onkeyup="return otros(this.name,'s2_24_11_10_o','8')"/></td>
              <td align="center" bgcolor="#FFFFFF"><input name="s2_24_11_10_o" type="text" id="s2_24_11_10_o" onkeypress="return letras(event)" value="<?php echo $s2_24_11_10_o; ?>" size="12" maxlength="100"/></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p><strong><strong>
        <input name="frm2" type="hidden" id="frm2" value="1" />
      </strong></strong></p></td>
    </tr>
    

    
    
    
    <tr>
      <td height="29" align="left"><?php if($id2==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion2()"/>
        <strong><strong>
        <input name="opc2" type="hidden" id="opc2" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion2()" />
        <strong><strong>
        <input name="opc2" type="hidden" id="opc2" value="2" />
        <?php
		 }
		 ?>
      </strong></strong></td>
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