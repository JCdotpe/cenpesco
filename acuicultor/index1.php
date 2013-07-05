<?php  session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORMULARIO DEL ACUICULTOR</title>
<style type="text/css">

@import url("css/estilo.css"); 
body {
	margin-left: 0px;
	margin-top: 2px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script type="text/javascript" src="validacion_1.js"></script>
<script type="text/javascript" src="ingreso_ubicacion_a.js"></script>
<script type="text/javascript" src="ingreso_ubicacion1_a.js"></script>
<script type="text/javascript" src="ingreso_ubicacion2_a.js"></script>
</head>
<?php 
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$errorusuario=$_GET['errorusuario'];

if($errorusuario=='si')
{
$mensaje="Sus datos ingresados son incorrectos";
}

 ?>
<body>
<center></center><form action="guardar2.php" method="post" name="form1" id="form1">
<table width="920" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#E2F1E9" style="border:thin;border: 1px solid #B0B5B3">
  <tr>
    <td height="33" align="center" bgcolor="#EFEFEF" ><p><span class="subtitulo"><strong>FORMULARIO CENSAL DE ACUICULTURA</strong></span> <span class="subtitulo"><strong>(Sección IV,V , VI y VII)</strong></span><span class="subtitulo"></span></p></td>
  </tr>
    <tr>
    <td height="36" align="center" valign="middle" bgcolor="#FFFFFF" class="aviso" ><strong>Las Secciones I, II y III se han registrado, continue con estas secciones...</strong></td>
  </tr>
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#CFD3CB" class="titu" ><strong>Sección IV: UBICACIÓN DEL CENTRO DE PRODUCCIÓN</strong></td>
  </tr>
  <tr>
    <td height="23" align="left" valign="top" class="letra_frm" ><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td height="20" colspan="4" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>1. ¿Dónde está ubicado el lugar donde desarrolla su acuicultura?</strong><strong></strong></td>
      </tr>
      <tr>
        <td width="25%" align="left" class="letra_frm">1.1 Departamento<strong>
          <input name="S4_1_DD" type="hidden" id="S4_1_DD" />
        </strong></td>
        <td width="28%" align="left" class="letra_frm">1.2 Provincia<strong>
          <input name="S4_1_PP" type="hidden" id="S4_1_PP" />
        </strong></td>
        <td width="22%" align="left" class="letra_frm">1.3 Distrito<strong>
          <input name="S4_1_DI" type="hidden" id="S4_1_DI" />
        </strong></td>
        <td width="25%" align="left" class="letra_frm">1.4 Centro poblado<strong><strong>
          <input name="S4_1_CCPP" type="hidden" id="S4_1_CCPP" />
        </strong></strong></td>
      </tr>
      <tr>
        <td height="27" align="left"><select name="S4_1_DD_COD" class="letra_frm" id="S4_1_DD_COD" onchange="carga_rProv()">
          <option value="0">Seleccionar</option>
          <?php
				  
				   $result = mysql_query("SELECT * FROM  marco_pesca GROUP BY departamento");
				   while ($row = mysql_fetch_row($result)){

                
                        if ($S2_9_DD_COD==$row[3]) {  echo '<option value="'.substr($row[3],0,2).'" selected="selected">'.utf8_encode($row[4]).'</option>'; } else
                    { echo'<option value="'.substr($row[3],0,2).'">'.utf8_encode($row[4]).'</option>';  }
					
					 }
				  
				  ?>
        </select></td>
        <td><div id="ver_rProvincia" >
          <label>
            <select name="S4_1_PP_COD" class="letra_frm" id="S4_1_PP_COD">
            </select>
          </label>
        </div></td>
        <td><div id="ver_rDistrito" >
          <label>
            <select name="S4_1_DI_COD" class="letra_frm" id="S4_1_DI_COD">
            </select>
          </label>
        </div></td>
        <td align="left"><div id="ver_rCepo" >
          <label>
            <select name="S4_1_CCPP_COD" class="letra_frm" id="S4_1_CCPP_COD">
            </select>
          </label>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td ><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td height="20" colspan="9" align="center" bgcolor="#FFFFFF" class="letra_frm"><strong>1.5 Dirección</strong></td>
      </tr>
      <tr>
        <td width="7%" align="left" class="letra_frm">Tipo vía</td>
        <td width="37%" align="left" class="letra_frm">Nombre vía</td>
        <td width="9%" align="left" class="letra_frm">N° de puerta</td>
        <td width="9%" align="left" class="letra_frm">Block</td>
        <td width="8%" align="left" class="letra_frm">Interior</td>
        <td width="8%" align="left" class="letra_frm">Piso</td>
        <td width="7%" align="left" class="letra_frm">Mz</td>
        <td width="7%" align="left" class="letra_frm">Lote</td>
        <td width="8%" align="left" class="letra_frm">Km</td>
      </tr>
      <tr>
        <td><label>
          <input name="S4_TIPVIA" type="text" id="S4_TIPVIA" size="4" maxlength="1" />
        </label></td>
        <td><label>
          <input name="S4_NOMVIA" type="text" id="S4_NOMVIA" size="30" />
        </label></td>
        <td><input name="S4_PTANUM" type="text" id="S4_PTANUM" size="5" maxlength="5" /></td>
        <td align="left"><input name="S4_BLOCK" type="text" id="S4_BLOCK" size="5" maxlength="5" /></td>
        <td align="left"><em>
          <input name="S4_INT" type="text" id="S4_INT" size="5" maxlength="5" />
        </em></td>
        <td align="left"><input name="S4_PISO" type="text" id="S4_PISO" size="5" maxlength="5" /></td>
        <td align="left"><input name="S4_MZ" type="text" id="S4_MZ" size="4" maxlength="4" /></td>
        <td align="left"><input name="S4_LOTE" type="text" id="S4_LOTE" size="4" maxlength="4" /></td>
        <td align="left"><input name="S4_KM" type="text" id="S4_KM" size="4" maxlength="4" /></td>
      </tr>
    </table></td>
  </tr>
    <tr>
    <td height="19" align="left" class="letra_frm" ><table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
          <td width="10%" height="26"><strong>1.6 Referencia</strong></td>
          <td width="90%" align="left"><strong>
            <input name="S4_REF" type="text" id="S4_REF" size="50" />
          </strong></td>
          </tr>
        </table></td>
  </tr>
      <tr>
    <td ><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="7%" align="left" class="letra_frm">Distancia</td>
        <td width="16%" align="left"><label>
          <input name="S4_2" type="text" id="S4_2" size="8" maxlength="5" />
        </label></td>
        <td width="6%" align="left" class="letra_frm">Unidad</td>
        <td width="71%" align="left"><input name="S4_2_1" type="text" id="S4_2_1" size="4" maxlength="1" /> 
          <span class="letra_frm">(Km ó metros)</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#CFD3CB" class="titu" ><strong>Sección V: CARACTERÍSTICAS DE LA ACTIVIDAD ACUICOLA</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td align="left" class="letra_frm"><strong>1. ¿Cuál es el origen del agua utilizada en su actividad de acuicultura?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="13%" align="left" class="letra_frm">Origen</td>
                <td width="45%" align="left" class="letra_frm">Nombre otro origen</td>
                <td width="42%" align="left" class="letra_frm">Nombre de la fuente</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S5_1" type="text" id="S2_15" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S5_1_O" type="text" id="S5_1_O" size="15" /></td>
                <td align="left"><input name="S5_1A" type="text" id="S5_1A" size="15" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><span class="letra_frm"><strong>2. ¿Cuál es el régimen de tenencia del espacio geográfico que utiliza para desarrollar su actividad?</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="33%" align="left" class="letra_frm">Régimen de tenencia</td>
                <td width="44%" align="left" class="letra_frm">Otro régimen de tenencia</td>
                <td width="23%" align="left" class="letra_frm">Superficie(m2)</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S5_2" type="text" id="S2_18" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S5_2_O" type="text" id="S5_2_O" size="20" /></td>
                <td align="left"><input name="S5_2_1" type="text" id="S2_14_E6" size="8" maxlength="5" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm"><strong>3. ¿Qué tipo de instalaciones utiliza en su acividad?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="27%" align="left" class="letra_frm"><strong>Tipo de instalación</strong></td>
                <td width="26%" align="left" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="47%" align="left" class="letra_frm"><strong>¿Cuántos?</strong></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Estanques</td>
                <td align="left"><input name="S5_3_1" type="text" id="S2_2" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_1_1" type="text" id="S5_3_1_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Jaulas flotantes</td>
                <td align="left"><input name="S5_3_2" type="text" id="S2_19" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_2_1" type="text" id="S5_3_2_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Jaulas sumergidas</td>
                <td align="left"><input name="S5_3_3" type="text" id="S2_22" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_3_1" type="text" id="S5_3_3_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Tanques</td>
                <td align="left"><input name="S5_3_4" type="text" id="S2_23" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_4_1" type="text" id="S5_3_4_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Corrales</td>
                <td align="left"><input name="S5_3_5" type="text" id="S2_24" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_5_1" type="text" id="S5_3_5_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Granjas</td>
                <td align="left"><input name="S5_3_6" type="text" id="S2_25" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_6_1" type="text" id="S5_3_6_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Bateas flotantes</td>
                <td align="left"><input name="S5_3_7" type="text" id="S2_26" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_7_1" type="text" id="S5_3_7_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Bateas fijas</td>
                <td align="left"><input name="S5_3_8" type="text" id="S2_27" size="3" maxlength="1" /></td>
                <td align="left"><input name="S5_3_8_1" type="text" id="S5_3_8_1" size="3" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="letra_frm">Otros </td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="24%" class="letra_frm"><input name="S5_3_9" type="text" id="S2_" size="3" maxlength="1" /></td>
                    <td width="36%"><span class="letra_frm">Especifique</span></td>
                    <td width="24%" class="letra_frm">¿Cuántos?</td>
                    <td width="16%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="letra_frm">&nbsp;</td>
                    <td><input name="S5_3_9_O" type="text" id="S2_28" size="10" /></td>
                    <td class="letra_frm"><input name="S5_3_9_1" type="text" id="S5_3_9_1" size="3" /></td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="20" align="left" class="letra_frm"><strong>4. ¿Qué especies cría?</strong></td>
          </tr>
          <tr>
            <td align="left" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="26%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Especie</strong></td>
                <td width="37%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="37%" align="left" bgcolor="#FFFFFF" class="letra_frm">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Trucha </td>
                <td align="left"><input name="S5_4_1" type="text" id="S2_3" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Tilapia</td>
                <td align="left"><input name="S5_4_2" type="text" id="S2_29" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Boquichico</td>
                <td align="left"><input name="S5_4_3" type="text" id="S2_30" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Paiche</td>
                <td align="left"><input name="S5_4_4" type="text" id="S2_31" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Gamitana</td>
                <td align="left"><input name="S5_4_5" type="text" id="S2_32" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Carachama</td>
                <td align="left"><input name="S5_4_6" type="text" id="S2_33" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Carpa</td>
                <td align="left"><input name="S5_4_7" type="text" id="S2_34" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Paco</td>
                <td align="left"><input name="S5_4_8" type="text" id="S2_35" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Caracol &quot;Churo&quot;</td>
                <td colspan="2" align="left"><input name="S5_4_9" type="text" id="S2_38" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Camarón</td>
                <td colspan="2" align="left"><input name="S5_4_10" type="text" id="S2_39" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Langostino</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="0">
                  <tr>
                    <td width="27%" class="letra_frm"><input name="S5_4_11" type="text" id="S2_41" size="3" maxlength="1" /></td>
                    <td width="42%">&nbsp;</td>
                    <td width="31%" class="letra_frm"><strong class="letra_frm">Escriba (0 ó 1)</strong></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" class="letra_frm">Especifique</td>
                    <td width="41%"><span class="letra_frm">
                      <input name="S5_4_12_O" type="text" id="S2_36" size="8" />
                      </span></td>
                    <td width="31%" class="letra_frm"><input name="S5_4_12" type="text" id="S2_40" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" class="letra_frm">Especifique</td>
                    <td width="41%"><span class="letra_frm">
                      <input name="S5_4_13_O" type="text" id="S2_37" size="8" />
                      </span></td>
                    <td width="31%" class="letra_frm"><input name="S5_4_13" type="text" id="S2_42" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td height="22" align="left" class="letra_frm"><strong>5. Cuenta usted con:</strong></td>
          </tr>
          <tr>
            <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="37%" height="27" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Áreas</strong></td>
                <td width="40%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="23%" align="left" bgcolor="#FFFFFF" class="letra_frm">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Área de reproductores?</td>
                <td align="left"><input name="S5_5_1" type="text" id="S2_4" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Área de incubación (ovas)?</td>
                <td align="left"><input name="S5_5_2" type="text" id="S2_6" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Área de alevines?</td>
                <td align="left"><input name="S5_5_3" type="text" id="S2_7" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Área de juveniles</td>
                <td align="left"><input name="S5_5_4" type="text" id="S2_43" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Área de crianza o engorde</td>
                <td align="left"><input name="S5_5_5" type="text" id="S2_44" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm"><strong class="letra_frm">Escriba (0 ó 1)</strong></span></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Otra</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" class="letra_frm">Especifique</td>
                    <td width="36%"><span class="letra_frm">
                      <input name="S5_5_6_O" type="text" id="S2_45" size="10" />
                    </span></td>
                    <td width="36%" class="letra_frm"><input name="S5_5_6" type="text" id="S2_46" size="3" maxlength="1" /></td>
                  </tr>
                </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="29" align="left"><span class="letra_frm"><strong>6. ¿Qué tipo de alimentos nutricionales utiliza en su crianza?</strong></span></td>
          </tr>
          <tr>
            <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="33%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Alimentos </strong></td>
                <td width="44%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="23%" align="left" bgcolor="#FFFFFF" class="letra_frm">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Plancton</td>
                <td align="left"><input name="S5_6_1" type="text" id="S2_8" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Alevines</td>
                <td align="left"><input name="S5_6_2" type="text" id="S2_47" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Hojuelas</td>
                <td align="left"><input name="S5_6_3" type="text" id="S2_48" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Pellet</td>
                <td align="left"><input name="S5_6_4" type="text" id="S2_49" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
                            <tr>
                <td align="left" class="letra_frm">Extrusado</td>
                <td align="left"><input name="S5_6_5" type="text" id="S2_49" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
                            <tr>
                <td align="left" class="letra_frm">Pre mezclas vitamínicas</td>
                <td align="left"><input name="S5_6_6" type="text" id="S2_49" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
                            <tr>
                <td align="left" class="letra_frm">Alimentos balanceados</td>
                <td align="left"><input name="S5_6_7" type="text" id="S2_49" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Prebióticos</td>
                <td align="left"><input name="S5_6_8" type="text" id="S2_50" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm"><strong class="letra_frm">Escriba (0 ó 1)</strong></span></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" class="letra_frm">Especifique</td>
                    <td width="36%"><span class="letra_frm">
                      <input name="S5_6_9_O" type="text" id="S2_51" size="8" />
                    </span></td>
                    <td width="36%" class="letra_frm"><input name="S5_6_9" type="text" id="S2_52" size="3" maxlength="1" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
                  <tr>
            <td height="39" align="left"><span class="letra_frm"><strong>7.¿Qué factores dificulta su actividad acuícola?</strong></span></td>
          </tr>
          <tr>
            <td height="28" align="left" ><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="39%" align="left" class="letra_frm">Cambios climáticos</td>
                <td width="38%" align="left"><input name="S5_7_1" type="text" id="S2_53" size="3" maxlength="1" /></td>
                <td width="23%" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Contaminación del agua</td>
                <td align="left"><input name="S5_7_2" type="text" id="S2_54" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Dificultad de financiamiento</td>
                <td align="left"><input name="S5_7_3" type="text" id="S2_55" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Falta de políticas adecuadas</td>
                <td align="left"><input name="S5_7_4" type="text" id="S2_56" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Inseguridad ciudadana</td>
                <td align="left"><input name="S5_7_5" type="text" id="S2_56" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Infraestructura inadecuada</td>
                <td align="left"><input name="S5_7_6" type="text" id="S2_56" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Vías de accesibilidad</td>
                <td align="left"><input name="S5_7_7" type="text" id="S2_56" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm"><strong class="letra_frm">Escriba (0 ó 1)</strong></span></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" class="letra_frm">Especifique</td>
                    <td width="36%"><span class="letra_frm">
                      <input name="S5_7_8_O" type="text" id="S2_58" size="10" />
                      </span></td>
                    <td width="36%" class="letra_frm"><input name="S5_7_8" type="text" id="S2_59" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Ninguno</td>
                <td colspan="2" align="left"><input name="S5_7_9" type="text" id="S2_57" size="3" maxlength="1" /></td>
                </tr>
              </table></td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" align="center" bgcolor="#CFD3CB" class="titu"><strong>Sección VI: ASOCIATIVIDAD Y FORMALIZACIÓN</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td align="left" class="letra_frm"><strong>1. ¿En qué organización participa como acuicultor?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="39%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Organización</strong></td>
                <td width="38%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="23%" align="left" bgcolor="#FFFFFF" class="letra_frm">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Sindicato</td>
                <td align="left"><input name="S6_1_1" type="text" id="S2_9" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Gremio</td>
                <td align="left"><input name="S6_1_2" type="text" id="S2_104" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Asociación</td>
                <td align="left"><input name="S6_1_3" type="text" id="S2_105" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Organización comunitaria</td>
                <td align="left"><input name="S6_1_4" type="text" id="S2_111" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm"><strong class="letra_frm">Escriba (0 ó 1)</strong></span></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" align="left" class="letra_frm">Especifique</td>
                    <td width="35%" align="left"><span class="letra_frm">
                      <input name="S6_5_O" type="text" id="S2_112" size="10" />
                    </span></td>
                    <td width="37%" align="left" class="letra_frm"><input name="S6_1_5" type="text" id="S2_113" size="3" maxlength="1" /></td>
                  </tr>
                </table></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Ninguna</td>
                <td align="left"><input name="S6_1_6" type="text" id="S2_106" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><span class="letra_frm"><strong>2. ¿Qué beneficios obtine de su(s) organización(es)?</strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top" ><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="39%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Beneficios</strong></td>
                <td width="38%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="23%" align="left" bgcolor="#FFFFFF" class="letra_frm">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Aumenta los ingresos</td>
                <td align="left"><input name="S6_2_1" type="text" id="S2_10" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Disminuye los costos</td>
                <td align="left"><input name="S6_2_2" type="text" id="S2_107" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Recibe asistencia técnica</td>
                <td align="left"><input name="S6_2_3" type="text" id="S2_108" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Mejora posicionamiento en el mercado</td>
                <td align="left"><input name="S6_2_4" type="text" id="S2_109" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm"><strong class="letra_frm">Escriba (0 ó 1)</strong></span></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="28%" align="left" class="letra_frm">Especifique</td>
                    <td width="35%" align="left"><span class="letra_frm">
                      <input name="S6_2_5_O" type="text" id="S2_110" size="8" />
                    </span></td>
                    <td width="37%" align="left" class="letra_frm"><input name="S6_2_5" type="text" id="S2_114" size="3" maxlength="1" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Ninguna</td>
                <td align="left"><input name="S6_2_6" type="text" id="S2_115" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="21" align="left" class="letra_frm">&nbsp;</td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td height="40" align="left" class="letra_frm"><strong>3. ¿Cuenta usted con permiso de concesión para su actividad?</strong></td>
          </tr>
          <tr>
            <td height="42" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="14%" height="27" align="left" class="letra_frm">Permiso</td>
                <td width="16%" align="left" class="letra_frm"><input name="S6_3" type="text" id="S2_11" size="3" maxlength="1" /></td>
                <td width="21%" align="left" class="letra_frm">N° de registro</td>
                <td width="49%" align="left" class="letra_frm"><input name="S6_3_1" type="text" id="S2_88" size="8" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="44" align="left"><span class="letra_frm"><strong>4. ¿Por qué no cuenta con el permiso?</strong></span></td>
          </tr>
          <tr>
            <td height="165" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="33%" height="30" align="left" class="letra_frm">No tiene interés</td>
                <td width="42%" align="left"><input name="S6_4_1" type="text" id="S2_90" size="3" maxlength="1" /></td>
                <td width="25%" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="left" class="letra_frm">Razones económicas</td>
                <td align="left"><input name="S6_4_2" type="text" id="S2_91" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="left" class="letra_frm">Trámites engorrosos</td>
                <td align="left"><input name="S6_4_3" type="text" id="S2_92" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="left" class="letra_frm">No conoce el trámite</td>
                <td align="left"><input name="S6_4_4" type="text" id="S2_93" size="3" maxlength="1" /></td>
                <td align="left" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
              </tr>
              <tr>
                <td height="36" align="left" class="letra_frm">Otro</td>
                <td colspan="2" align="left"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                      <td width="28%" class="letra_frm">Especifique</td>
                      <td width="35%"><span class="letra_frm">
                        <input name="S6_4_5_O" type="text" id="S2_60" size="10" />
                      </span></td>
                      <td width="37%" class="letra_frm"><input name="S6_4_5" type="text" id="S2_61" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="42" align="left"><span class="letra_frm"><strong>5.¿Está interesado en constituirse como empresa?</strong></span></td>
          </tr>
          <tr>
            <td height="28" align="left" ><span class="letra_frm" style="border:thin; border-bottom:  1px solid #B0B5B3">
              <input name="S6_5" type="text" id="S2_62" size="8" />
            </span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="68"><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="100%" height="28" colspan="5" align="center" bgcolor="#CFD3CB" class="titu"><strong>Sección VII: EMPLEO</strong></td>
      </tr>
      <tr>
        <td height="28" colspan="5" align="center" class="titu"><table width="100%" border="0" cellpadding="1" cellspacing="2">
          <tr>
            <td width="50%"  style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td colspan="2" align="left" class="letra_frm"><strong>1. ¿La ayudan personas de su hogar sin recibir remuneración fija?</strong></td>
                </tr>
              <tr>
                <td width="14%" align="left" valign="top"><input name="S7_1" type="text" id="S7_1" size="4" maxlength="1" /></td>
                <td width="86%" align="left" valign="top"><span class="letra_frm">¿Cuántos?</span> <span class="letra_frm">
                  <input name="S7_1_1" type="text" id="S2_63" size="10" />
                </span></td>
              </tr>
              <tr>
                <td colspan="2" class="letra_frm"><strong>2. Tiene usted trabajadores remunerados a su cargo?</strong></td>
                </tr>
              <tr>
                <td align="left" valign="top"><input name="S7_2" type="text" id="S7_2" size="4" maxlength="1" /></td>
                <td><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr class="letra_frm">
                    <td align="left">Total</td>
                    <td align="left">Hombres</td>
                    <td align="left">Mujeres</td>
                  </tr>
                  <tr>
                    <td align="left"><span class="letra_frm">
                      <input name="S7_2_1" type="text" id="S2_64" size="10" />
                    </span></td>
                    <td align="left"><span class="letra_frm">
                      <input name="S7_2_2" type="text" id="S2_65" size="10" />
                    </span></td>
                    <td align="left"><span class="letra_frm">
                      <input name="S7_2_3" type="text" id="S2_66" size="10" />
                    </span></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="50%" align="left" valign="top"  style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td height="52" colspan="2" align="left" class="letra_frm"><strong>3.  ¿Tiene usted trabajadores con alguna limitación o dificultad para desempeñar sus labores?</strong></td>
              </tr>
              <tr>
                <td width="14%" height="31" align="left" valign="top"><input name="S7_3" type="text" id="S7_3" size="4" maxlength="1" /></td>
                <td width="86%" align="left" valign="top"><span class="letra_frm">¿Cuántos?</span> <span class="letra_frm">
                  <input name="S7_3_1" type="text" id="S2_67" size="10" />
                </span></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="71">&nbsp;</td>
  </tr>
  <tr>
    <td height="162" align="center" valign="middle"><label>
      <input name="button" type="submit" class="subtitulo" id="button" value="  Guardar y continuar con las demás secciones  " />
      <strong>
        <input name="FORM" type="hidden" id="FORM" value="1" />
      </strong></label></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>