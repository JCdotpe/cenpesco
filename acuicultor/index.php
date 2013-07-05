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
<script type="text/javascript" src="ingreso_ubigeo.js"></script>
<script type="text/javascript" src="ingreso_ubigeo1.js"></script>
<script type="text/javascript" src="ingreso_ubigeo2.js"></script>
<script type="text/javascript" src="ingreso_ubicacion.js"></script>
<script type="text/javascript" src="ingreso_ubicacion1.js"></script>
<script type="text/javascript" src="ingreso_ubicacion2.js"></script>

<script language="JavaScript"> 

function submit_frm()
{
///primer formulario
  if (document.form1.NFORM.value == "") {
        alert('¡Por favor, ingrese el número de formulario');
        document.form1.NFORM.focus();
        return false;
    } else   if (document.form1.CCDD.selectedIndex == 0) {
        alert('¡Por favor, seleccione un departamento!');
        document.form1.CCDD.focus();
        return false;
	} else   if (document.form1.CCPP.selectedIndex == 0) {
        alert('¡Por favor, seleccione una provincia!');
        document.form1.CCPP.focus();
        return false;
	 } else   if (document.form1.CCDI.selectedIndex == 0) {
        alert('¡Por favor, seleccione un distrito!');
        document.form1.CCDI.focus();
        return false;
    } else  if (document.form1.COD_CCPP.selectedIndex == 0) {
        alert('¡Por favor, seleccione un centro poblado!');
        document.form1.COD_CCPP.focus();
        return false;
    } else 
	 
	 {
	      return true;
	 	}

}
</script> 
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
<center></center><form action="guardar1.php" method="post" name="form1" id="form1">
<table width="920" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#E2F1E9" style="border:thin;border: 1px solid #B0B5B3">
  <tr>
    <td height="33" align="center" bgcolor="#EFEFEF" ><p><span class="subtitulo"><strong>FORMULARIO CENSAL DE ACUICULTURA</strong></span><span class="subtitulo"> <strong>(Sección I, II y III)</strong></span></p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span class="letra_frm">N° Formulario 
            <label>
              <input name="NFORM" type="text" id="NFORM" size="7" maxlength="5" onkeypress="return numeros(event)"/>
            </label>
    </span></strong></p></td>
  </tr>
    <tr>
    <td height="36" align="center" valign="middle" bgcolor="#FFFFFF" class="titu" ><div id="ver_aviso"><span class="aviso1"><strong>Registre este formulario</strong></span><span class="aviso1"><strong> con mucha atención, verifique la información antes de enviar.&nbsp;</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#CFD3CB" class="titu" ><strong>Sección I: LOCALIZACIÓN DEL PUNTO DE CONCENTRACIÓN </strong></td>
  </tr>
  <tr>
    <td height="23" align="center" class="titu1" ><strong>A: UBICACIÓN GEOGRÁFICA</strong></td>
  </tr>
  <tr>
    <td ><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="14%" align="left" class="letra_frm">1. DEPARTAMENTO</td>
        <td width="5%" align="left" class="letra_frm"><label>
          <input name="CD" type="text" class="letra_frm" id="CD" size="3" maxlength="3" readonly="readonly" />
        </label></td>
        <td width="31%" align="left" class="letra_frm"><select name="CCDD" class="letra_frm" id="CCDD" onchange="cargaProv()">
          <option value="0">Seleccionar</option>
          <?php
				  
				   $result = mysql_query("SELECT * FROM  udra_acuicultor GROUP BY CCDD ORDER BY departamento ASC");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($CCDD==$row[2]) {  echo '<option value="'.$row[2].'" selected="selected">'.$row[5].'</option>'; } else
                    { echo'<option value="'.$row[2].'">'.$row[1].'</option>';  }
					
					 }
				  
				  ?>
        </select></td>
        <td width="15%" class="letra_frm">3. DISTRITO</td>
        <td width="5%"><span class="letra_frm">
          <input name="CDIS" type="text" class="letra_frm" id="CDIS" size="5" maxlength="5" readonly="readonly" />
        </span></td>
        <td width="30%"><div id="ver_distrito" >
          <label>
            <select name="CCDI" class="letra_frm" id="CCDI">
            </select>
          </label>
          <input name="NOM_DI" type="hidden" id="NOM_DI" />
        </div></td>
      </tr>
      <tr>
        <td align="left" class="letra_frm">2. PROVINCIA</td>
        <td class="letra_frm"><input name="CP" type="text" class="letra_frm" id="CP" size="3" maxlength="3" readonly="readonly" /></td>
        <td align="left" class="letra_frm"><div id="ver_provincia" >
                                    <label>
                                    <select name="CCPP" class="letra_frm" id="CCPP">
                                    </select>
                                    </label>
        </div></td>
        <td class="letra_frm">4. CENTRO POBLADO</td>
        <td><span class="letra_frm">
          <input name="CEP" type="text" class="letra_frm" id="CEP" size="5" maxlength="5" readonly="readonly" />
        </span></td>
        <td align="left"><div id="ver_cepo" >
          <label>
            <select name="COD_CCPP" class="letra_frm" id="COD_CCPP">
            </select>
          </label>
          
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#CFD3CB" class="titu" ><strong><span class="letra_frm">
      <input name="NOM_PP" type="hidden" id="NOM_PP" value="" />
      <input name="NOM_DD" type="hidden" id="NOM_DD" value="" />
    </span>Sección II: CARACTERÍSTICAS DE LA POBLACIÓN<span class="letra_frm">
    <input name="NOM_DI" type="hidden" id="NOM_DI" value="" />
    </span><span class="letra_frm">
  
    <input name="NOM_CCPP" type="hidden" id="NOM_CCPP" />
    </span></strong></td>
  </tr>
  <tr>
    <td ><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td height="20" colspan="3" align="center" bgcolor="#FFFFFF" class="letra_frm"><strong>1. Apellidos y nombres del acuicultor</strong></td>
        <td colspan="3" align="center" bgcolor="#FFFFFF" class="letra_frm"><strong>2. Fecha de nacimiento</strong></td>
        </tr>
      <tr>
        <td width="28%" align="left" class="letra_frm">Apellido Paterno</td>
        <td width="24%" align="left" class="letra_frm">Apellido materno</td>
        <td width="25%" align="left" class="letra_frm">Nombres</td>
        <td width="8%" align="center" class="letra_frm">Día</td>
        <td width="7%" align="center" class="letra_frm">Mes</td>
        <td width="8%" align="center" class="letra_frm">Año</td>
      </tr>
      <tr>
        <td><label>
          <input name="S2_1_AP" type="text" id="S2_1_AP" onkeypress="return letras(event)" maxlength="80"/>
        </label></td>
        <td><label>
          <input name="S2_1_AM" type="text" id="S2_1_AM" maxlength="80" onkeypress="return letras(event)"/>
        </label></td>
        <td><label>
          <input name="S2_1_NOM" type="text" id="S2_1_NOM" maxlength="80"  onkeypress="return letras(event)"/>
        </label></td>
        <td align="center"><label>
          <input name="S2_2D" type="text" id="S2_2D" size="4" maxlength="2" onkeypress="return numeros(event)"/>
        </label></td>
        <td align="center"><input name="S2_2M" type="text" id="S2_2M" size="4" maxlength="2" onkeypress="return numeros(event)"/></td>
        <td align="center"><input name="S2_2A" type="text" id="S2_2A" size="4" maxlength="4"  onkeypress="return numeros(event)"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="28%" height="26" align="left" class="letra_frm">3. Sexo</td>
        <td width="24%" align="left" class="letra_frm">4. N° de DNI</td>
        <td width="48%" align="left" class="letra_frm">5. N° de RUC</td>
      </tr>
      <tr>
        <td><label>
          <input name="S2_3" type="text" id="S2_3" size="5" maxlength="1" onkeypress="return duo(event)"/>
        </label></td>
        <td><label>
          <input name="S2_4" type="text" id="S2_4" size="20" maxlength="8" onkeypress="return numeros(event)" />
        </label></td>
        <td><label>
          <input name="S2_5" type="text" id="S2_5" size="20" maxlength="11"  onkeypress="return numeros(event)"/>
        </label></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="28%" height="26" align="left" class="letra_frm">6. Número de teléfono celular</td>
        <td width="40%" align="left" class="letra_frm">7. Número de teléfono fijo/comunitario</td>
        <td width="32%" align="left" class="letra_frm">8. Correo electrónico</td>
      </tr>
      <tr>
        <td height="29"><label>
          <input name="S2_6" type="text" id="S2_6" onkeypress="return numeros(event)" size="22" maxlength="9"/>
        </label></td>
        <td><label>
          <input name="S2_7" type="text" id="S2_7"  onkeypress="return numeros(event)" size="22" maxlength="7"/>
        </label></td>
        <td><label>
          <input name="S2_8" type="text" id="S2_8" size="35" maxlength="80" />
        </label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="68"><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td height="20" colspan="4" align="center" bgcolor="#FFFFFF" class="letra_frm"><strong>9. Domicilio de la residencial habitual</strong><strong></strong></td>
        </tr>
      <tr>
        <td width="25%" align="left" class="letra_frm">9.1 Departamento<strong>
          <input name="S2_9_DD" type="hidden" id="S2_9_DD" />
        </strong></td>
        <td width="28%" align="left" class="letra_frm">9.2 Provincia<strong>
          <input name="S2_9_PP" type="hidden" id="S2_9_PP" />
        </strong></td>
        <td width="22%" align="left" class="letra_frm">9.3 Distrito<strong>
          <input name="S2_9_DI" type="hidden" id="S2_9_DI" value="" />
        </strong></td>
        <td width="25%" align="left" class="letra_frm">9.4 Centro poblado<strong><strong>
          <input name="S2_9_CCPP" type="hidden" id="S2_9_CCPP" value="" />
        </strong></strong></td>
        </tr>
      <tr>
        <td height="27" align="left"><span class="letra_frm">
          <select name="S2_9_DD_COD" class="letra_frm" id="S2_9_DD_COD" onchange="carga_rProv()">
            <option value="0">Seleccionar</option>
            <?php
				  
				   $result = mysql_query("SELECT * FROM  marco_pesca GROUP BY departamento");
				   while ($row = mysql_fetch_row($result)){

                
                        if ($S2_9_DD_COD==$row[3]) {  echo '<option value="'.substr($row[3],0,2).'" selected="selected">'.utf8_encode($row[4]).'</option>'; } else
                    { echo'<option value="'.substr($row[3],0,2).'">'.utf8_encode($row[4]).'</option>';  }
					
					 }
				  
				  ?>
          </select>
        </span></td>
        <td><div id="ver_rProvincia" >
          <label>
            <select name="S2_9_PP_COD" class="letra_frm" id="S2_9_PP_COD">
            </select>
          </label>
        </div></td>
        <td><div id="ver_rDistrito" >
          <label>
            <select name="S2_9_DI_COD" class="letra_frm" id="S2_9_DI_COD">
            </select>
          </label>
        </div></td>
        <td align="left"><div id="ver_rCepo" >
          <label>
            <select name="S2_9_CCPP_COD" class="letra_frm" id="S2_9_CCPP_COD">
            </select>
          </label>
        </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="71"><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td height="20" colspan="9" align="center" bgcolor="#FFFFFF" class="letra_frm"><strong>9.5 Dirección</strong></td>
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
          <input name="TIPVIA" type="text" id="TIPVIA" size="4" maxlength="1" />
        </label></td>
        <td><label>
          <input name="NOMVIA" type="text" id="NOMVIA" size="30" />
        </label></td>
        <td><input name="PTANUM" type="text" id="PTANUM" size="5" maxlength="5" /></td>
        <td align="left"><input name="BLOCK" type="text" id="BLOCK" size="5" maxlength="5" /></td>
        <td align="left"><em>
          <input name="INT" type="text" id="INT" size="5" maxlength="5" />
        </em></td>
        <td align="left"><input name="PISO" type="text" id="PISO" size="5" maxlength="5" /></td>
        <td align="left"><input name="MZ" type="text" id="MZ" size="4" maxlength="4" /></td>
        <td align="left"><input name="LOTE" type="text" id="LOTE" size="4" maxlength="4" /></td>
        <td align="left"><input name="KM" type="text" id="KM" size="4" maxlength="4" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td align="left" class="letra_frm"><span class="letra_frm"><strong>10. Lugar de nacimiento</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="24%" class="letra_frm">Departamento<strong>
                    <input name="S2_10_DD" type="hidden" id="S2_10_DD" />
                </strong></td>
                <td width="76%" align="left"><span class="letra_frm">
                  <select name="S2_10_DD_COD" class="letra_frm" id="S2_10_DD_COD" onchange="carga_nProv()">
                    <option value="0">Seleccionar</option>
                    <?php
				  
				   $result = mysql_query("SELECT * FROM  ubigeo WHERE cod_provincia='00' AND cod_distrito='00' ORDER BY des_distrito ASC");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($S2_10_DD_COD==$row[3]) {  echo '<option value="'.$row[3].'" selected="selected">'.utf8_encode($row[6]).'</option>'; } else
                    { echo'<option value="'.$row[3].'">'.utf8_encode($row[6]).'</option>';  }
					
					 }
				  
				  ?>
                  </select>
                </span></td>
                </tr>
              <tr>
                <td><span class="letra_frm">Provincia<strong>
                  <input name="S2_10_PP" type="hidden" id="S2_10_PP" />
                </strong></span></td>
                <td align="left"><div id="ver_nProvincia" >
                  <label>
                    <select name="S2_10_PP_COD" class="letra_frm" id="S2_10_PP_COD">
                    </select>
                  </label>
                </div></td>
                </tr>
              <tr>
                <td class="letra_frm">Distrito<strong>
                  <input name="S2_10_DI" type="hidden" id="S2_10_DI" value="" />
                </strong></td>
                <td align="left"><div id="ver_nDistrito" >
                  <label>
                    <select name="S2_10_DI_COD" class="letra_frm" id="S2_10_DI_COD">
                    </select>
                  </label>
                </div></td>
              </tr>
              </table></td>
          </tr>
          <tr>
            <td align="left"><span class="letra_frm"><strong>11. ¿En qué departamento, provincia y distrito vivía en el año 2007?</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="25%" class="letra_frm">Departamento<strong>
                  <input name="S2_11_DD" type="hidden" id="S2_11_DD" />
                </strong></td>
                <td width="75%"><span class="letra_frm">
                  <select name="S2_11_DD_COD" class="letra_frm" id="S2_11_DD_COD" onchange="carga_vProv()">
                    <option value="0">Seleccionar</option>
                    <?php
				  
				   $result = mysql_query("SELECT * FROM  ubigeo WHERE cod_provincia='00' AND cod_distrito='00' ORDER BY des_distrito ASC");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($S2_11_DD_COD==$row[3]) {  echo '<option value="'.$row[3].'" selected="selected">'.utf8_encode($row[6]).'</option>'; } else
                    { echo'<option value="'.$row[3].'">'.utf8_encode($row[6]).'</option>';  }
					
					 }
				  
				  ?>
                  </select>
                </span></td>
              </tr>
              <tr>
                <td><span class="letra_frm">Provincia<strong>
                  <input name="S2_11_PP" type="hidden" id="S2_11_PP" />
                </strong></span></td>
                <td><div id="ver_vProvincia" >
                  <label>
                    <select name="S2_11_PP_COD" class="letra_frm" id="S2_11_PP_COD">
                    </select>
                  </label>
                </div></td>
              </tr>
              <tr>
                <td class="letra_frm">Distrito<strong>
                  <input name="S2_11_DI" type="hidden" id="S2_11_DI" value="" />
                </strong></td>
                <td><div id="ver_vDistrito" >
                  <label>
                    <select name="S2_11_DI_COD" class="letra_frm" id="S2_11_DI_COD">
                    </select>
                  </label>
                </div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm"><strong>12. ¿Cuál fue el último nivel, grado o año de estudios que aprobó?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="37%" align="left" class="letra_frm">Nivel</td>
                <td width="31%" align="left" class="letra_frm">Grado</td>
                <td width="32%" align="left" class="letra_frm">Año</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S2_12" type="text" id="S2_12" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S2_12G" type="text" id="S2_12G" size="3" maxlength="1" /></td>
                <td align="left"><input name="S2_12A" type="text" id="S2_12A" size="3" maxlength="1" /></td>
              </tr>
              </table></td>
          </tr>
          <tr>
            <td height="20" align="left" class="letra_frm"><span class="letra_frm"><strong>13. Usted considera la acuicultura como ocupación:</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><label>
              <input name="S2_13" type="text" id="S2_13" size="4" maxlength="1" />
            </label></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm"><span class="letra_frm"><strong>14. ¿A qué otra actividad se dedica?</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="19%" align="left" class="letra_frm">Actividad</td>
                <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S2_14" type="text" id="S2_14" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S2_14_E" type="text" id="S2_14_E" size="20" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm" ><span class="letra_frm"><strong>15. ¿Cuál es la razón por la que usted eligió ser acuicultor?</strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="34%" align="left" valign="middle" class="letra_frm">Tradición familiar</td>
                <td width="66%" align="left"><input name="S2_15_1" type="text" id="S2_15_1" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Posibilidad de desarrollo</td>
                <td align="left"><input name="S2_15_2" type="text" id="S2_15_2" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Necesidad económica</td>
                <td align="left"><input name="S2_15_3" type="text" id="S2_15_3" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Otra</td>
                <td align="left"><input name="S2_15_4" type="text" id="S2_5" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Especifique</td>
                <td align="left"><input name="S2_15_4O" type="text" id="S2_15_4O" size="25" /></td>
              </tr>
            </table></td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td height="22" align="left" class="letra_frm"><strong>16. ¿Cuántos años se dedica a la actividad acuícola?</strong></td>
          </tr>
          <tr>
            <td height="37" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="S2_16" type="text" id="S2_16" size="4" maxlength="1" /></td>
          </tr>
          <tr>
            <td height="23" align="left"><span class="letra_frm"><strong>17. En la actualidad, ¿Cuál es su estado civil o conyugal?</strong></span></td>
          </tr>
          <tr>
            <td height="28" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="S2_17" type="text" id="S2_17" size="4" maxlength="1" /></td>
          </tr>

    
          <tr>
            <td height="25" align="center" valign="middle" bgcolor="#CFD3CB" class="letra_frm"><strong>CARACTERÍSTICAS DE LOS MIEMBROS DEL HOGAR</strong></td>
          </tr>

          <tr>
            <td align="left" class="letra_frm"><strong>18. ¿Cuál fue el último nivel, grado o año de estudios que aprobó su cónyuge?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="37%" align="left" class="letra_frm">Nivel</td>
                <td width="31%" align="left" class="letra_frm">Grado</td>
                <td width="32%" align="left" class="letra_frm">Año</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S2_18" type="text" id="S2_" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S2_18G" type="text" id="S2_18G" size="3" maxlength="1" /></td>
                <td align="left"><input name="S2_18A" type="text" id="S2_18A" size="3" maxlength="1" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm" ><strong>19. ¿A qué se dedica su cónyuge?</strong></td>
          </tr>
          <tr>
            <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="34%" align="left" valign="middle" class="letra_frm">Cuidado del hogar</td>
                <td width="66%" align="left"><input name="S2_19_1" type="text" id="S2_19_1" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Comerciante</td>
                <td align="left"><input name="S2_19_2" type="text" id="S2_19_2" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Pescador(a)</td>
                <td align="left"><input name="S2_19_3" type="text" id="S2_19_3" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Recolector(a)</td>
                <td align="left"><input name="S2_19_4" type="text" id="S2_19_4" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Otro</td>
                <td align="left"><input name="S2_19_5" type="text" id="S2_19_5" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td height="35" align="left" valign="middle" class="letra_frm">Especifique</td>
                <td align="left"><input name="S2_19_5O" type="text" id="S2_19_5O" size="25" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="letra_frm"><strong>20. ¿Tiene hijos(as)?</strong></td>
          </tr>
          <tr>
            <td height="38" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="S2_20" type="text" id="S2_20" size="3" maxlength="1" /></td>
          </tr>
          <tr>
            <td height="25" align="left" valign="top" class="letra_frm"><strong>21. ¿Cuántos hijos tiene en total?</strong></td>
          </tr>
          <tr>
            <td align="left" valign="top" ><input name="S2_21" type="text" id="S2_21" size="4" maxlength="2" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27" align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>22. Información de los hijos(as):</strong></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="99%" border="0" cellpadding="1" cellspacing="1" style="border:thin; border:  1px solid #B0B5B3">
      <tr >
        <td width="5%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>N° Orden</strong></td>
        <td width="23%" rowspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>Nombre</strong></td>
        <td width="6%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>Sexo</strong></td>
        <td width="6%" rowspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>Edad</strong></td>
        <td width="11%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>¿Su hijo(a) vive con usted?</strong></td>
        <td width="12%" rowspan="2" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>¿Su hijo(a) depende económicamente de usted?</strong></td>
        <td width="13%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>¿Su hijo(a) tiene algún tipo de limitación o dificultad para desarrollar sus activiades?</strong></td>
        <td width="13%" align="center" valign="middle" bgcolor="#FFFFCC" class="tit_frm" ><strong>PARA 3 Y MÁS AÑOS DE EDAD</strong></td>
        <td width="11%" align="center" valign="middle" bgcolor="#FFFFFF" class="tit_frm"><strong>PARA 14 Y MÁS AÑOS DE EDAD</strong></td>
      </tr>
      <tr>
        <td height="63" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>¿Cuál es el último nivel de estudios aprobado?</strong></td>
        <td align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>¿Cuál es su ocupación actual?</strong></td>
      </tr>
      <tr>
        <td height="26" align="center" valign="middle" class="letra_frm">1</td>
        <td align="center" valign="middle"><input name="S2_22_1_1" type="hidden" id="S2_22_1_1" value="1" />          <input name="S2_22_2_1" type="text" id="S2_22_2_1" size="25" /></td>
        <td align="center" valign="middle"><input name="S2_22_3_1" type="text" id="S2_22_3_1" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_4_1" type="text" id="S2_22_4_1" size="3" maxlength="2" /></td>
        <td align="center" valign="middle"><input name="S2_22_5_1" type="text" id="S2_22_5_1" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_6_1" type="text" id="S2_22_6_1" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_7_1" type="text" id="S2_22_7_1" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_8_1" type="text" id="S2_22_8_1" size="3" maxlength="1" /></td>
        <td align="center"><input name="S2_22_9_1" type="text" id="S2_22_9_1" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm">2</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_1_2" type="hidden" id="S2_22_1_2" value="2" />          <input name="S2_22_2_2" type="text" id="S2_22_2_2" size="25" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_3_2" type="text" id="S2_22_3_2" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_4_2" type="text" id="S2_22_4_2" size="3" maxlength="2" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_5_2" type="text" id="S2_22_5_2" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_6_2" type="text" id="S2_22_6_2" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_7_2" type="text" id="S2_22_7_2" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_8_2" type="text" id="S2_22_8_2" size="3" maxlength="1" /></td>
        <td align="center" bgcolor="#FFFFFF"><input name="S2_22_9_2" type="text" id="S2_22_9_2" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="letra_frm">3</td>
        <td align="center" valign="middle"><input name="S2_22_1_3" type="hidden" id="S2_22_1_3" value="3" />          <input name="S2_22_2_3" type="text" id="S2_22_2_3" size="25" /></td>
        <td align="center" valign="middle"><input name="S2_22_3_3" type="text" id="S2_22_3_3" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_4_3" type="text" id="S2_22_4_3" size="3" maxlength="2" /></td>
        <td align="center" valign="middle"><input name="S2_22_5_3" type="text" id="S2_22_5_3" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_6_3" type="text" id="S2_22_6_3" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_7_3" type="text" id="S2_22_7_3" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_8_3" type="text" id="S2_22_8_3" size="3" maxlength="1" /></td>
        <td align="center"><input name="S2_22_9_3" type="text" id="S2_22_9_3" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm">4</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_1_4" type="hidden" id="S2_22_1_4" value="4" />          <input name="S2_22_2_4" type="text" id="S2_22_2_4" size="25" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_3_4" type="text" id="S2_22_3_4" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_4_4" type="text" id="S2_22_4_4" size="3" maxlength="2" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_5_4" type="text" id="S2_22_5_4" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_6_4" type="text" id="S2_22_6_4" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_7_4" type="text" id="S2_22_7_4" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_8_4" type="text" id="S2_22_8_4" size="3" maxlength="1" /></td>
        <td align="center" bgcolor="#FFFFFF"><input name="S2_22_9_4" type="text" id="S2_22_9_4" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="letra_frm">5</td>
        <td align="center" valign="middle"><input name="S2_22_1_5" type="hidden" id="S2_22_1_5" value="5" />          <input name="S2_22_2_5" type="text" id="S2_22_2_5" size="25" /></td>
        <td align="center" valign="middle"><input name="S2_22_3_5" type="text" id="S2_22_3_5" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_4_5" type="text" id="S2_22_4_5" size="3" maxlength="2" /></td>
        <td align="center" valign="middle"><input name="S2_22_5_5" type="text" id="S2_22_5_5" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_6_5" type="text" id="S2_22_6_5" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_7_5" type="text" id="S2_22_7_5" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_8_5" type="text" id="S2_22_8_5" size="3" maxlength="1" /></td>
        <td align="center"><input name="S2_22_9_5" type="text" id="S2_22_9_5" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm">6</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_1_6" type="hidden" id="S2_22_1_6" value="6" />          <input name="S2_22_2_6" type="text" id="S2_22_2_6" size="25" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_3_6" type="text" id="S2_22_3_6" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_4_6" type="text" id="S2_22_4_6" size="3" maxlength="2" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_5_6" type="text" id="S2_22_5_6" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_6_6" type="text" id="S2_22_6_6" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_7_6" type="text" id="S2_22_7_6" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_8_6" type="text" id="S2_22_8_6" size="3" maxlength="1" /></td>
        <td align="center" bgcolor="#FFFFFF"><input name="S2_22_9_6" type="text" id="S2_22_9_6" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="letra_frm">7</td>
        <td align="center" valign="middle"><input name="S2_22_1_7" type="hidden" id="S2_22_1_7" value="7" />          <input name="S2_22_2_7" type="text" id="S2_22_2_7" size="25" /></td>
        <td align="center" valign="middle"><input name="S2_22_3_7" type="text" id="S2_22_3_7" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_4_7" type="text" id="S2_22_4_7" size="3" maxlength="2" /></td>
        <td align="center" valign="middle"><input name="S2_22_5_7" type="text" id="S2_22_5_7" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_6_7" type="text" id="S2_22_6_7" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_7_7" type="text" id="S2_22_7_7" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_8_7" type="text" id="S2_22_8_7" size="3" maxlength="1" /></td>
        <td align="center"><input name="S2_22_9_7" type="text" id="S2_22_9_7" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm">8</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_1_8" type="hidden" id="S2_22_1_8" value="8" />          <input name="S2_22_2_8" type="text" id="S2_22_2_8" size="25" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_3_8" type="text" id="S2_22_3_8" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_4_8" type="text" id="S2_22_4_8" size="3" maxlength="2" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_5_8" type="text" id="S2_22_5_8" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_6_8" type="text" id="S2_22_6_8" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_7_8" type="text" id="S2_22_7_8" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_8_8" type="text" id="S2_22_8_8" size="3" maxlength="1" /></td>
        <td align="center" bgcolor="#FFFFFF"><input name="S2_22_9_8" type="text" id="S2_22_9_8" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="letra_frm">9</td>
        <td align="center" valign="middle"><input name="S2_22_1_9" type="hidden" id="S2_22_1_9" value="9" />          <input name="S2_22_2_9" type="text" id="S2_22_2_9" size="25" /></td>
        <td align="center" valign="middle"><input name="S2_22_3_9" type="text" id="S2_22_3_9" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_4_9" type="text" id="S2_22_4_9" size="3" maxlength="2" /></td>
        <td align="center" valign="middle"><input name="S2_22_5_9" type="text" id="S2_22_5_9" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_6_9" type="text" id="S2_22_6_9" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_7_9" type="text" id="S2_22_7_9" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S2_22_8_9" type="text" id="S2_22_8_9" size="3" maxlength="1" /></td>
        <td align="center"><input name="S2_22_9_9" type="text" id="S2_22_9_9" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm">10</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_1_10" type="hidden" id="S2_22_1_10" value="10" />          <input name="S2_22_2_10" type="text" id="S2_22_2_10" size="25" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_3_10" type="text" id="S2_22_3_10" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_4_10" type="text" id="S2_22_4_10" size="3" maxlength="2" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_5_10" type="text" id="S2_22_5_10" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_6_10" type="text" id="S2_22_6_10" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_74" type="text" id="S2_22_7_10" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S2_22_8_10" type="text" id="S2_22_8_10" size="3" maxlength="1" /></td>
        <td align="center" bgcolor="#FFFFFF"><input name="S2_22_9_10" type="text" id="S2_22_9_10" size="3" maxlength="1" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#CFD3CB"><strong class="titu">Sección III: CARACTERÍSTICAS Y SERVICIOS DE LA VIVIENDA</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td align="left" class="letra_frm"><strong>1. La vivienda que ocupa es:</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="41%" align="left" class="letra_frm">La vivienda que ocupa es:</td>
                <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S3_100" type="text" id="S3_100" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S3_100_O" type="text" id="S3_100_O" size="20" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><span class="letra_frm"><strong>2. El material de construcción predominante en las paredes exteriores  de su vivienda es de:</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="41%" align="left" class="letra_frm">Tipo de material:</td>
                <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S3_200" type="text" id="S3_200" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S3_200_O" type="text" id="S3_200_O" size="20" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm"><strong>3. El material de construcción predominante en los pisos de sus vivienda es de:</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="41%" align="left" class="letra_frm">Tipo de material:</td>
                <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S3_300" type="text" id="S3_300" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S3_300_O" type="text" id="S3_300_O" size="20" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="20" align="left" class="letra_frm"><strong>3A. El material de construcción predominante en los techos de sus vivienda es de:</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="41%" align="left" class="letra_frm">Tipo de material:</td>
                <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
                </tr>
              <tr>
                <td align="left"><label>
                  <input name="S3_300A" type="text" id="S3_300A" size="3" maxlength="1" />
                  </label></td>
                <td align="left"><input name="S3_300A_O" type="text" id="S3_300A_O" size="20" /></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="left"><strong class="letra_frm">4. El abastecimiento de agua en la vivienda, procede de:</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="41%" align="left" class="letra_frm">Procede del:</td>
                <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
              </tr>
              <tr>
                <td align="left"><label>
                  <input name="S3_400" type="text" id="S3_400" size="3" maxlength="1" />
                </label></td>
                <td align="left"><input name="S3_400_O" type="text" id="S3_400_O" size="20" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" ><strong class="letra_frm">5. ¿La vivienda tiene el servicio de agua todos los días de la semana?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="50%" height="29"><input name="S3_500" type="text" id="S3_500" size="3" maxlength="1" /></td>
                <td width="50%" class="letra_frm">¿Cuántas horas al día?
                  <input name="S3_500A" type="text" id="S3_500A" size="4" maxlength="2" /></td>
              </tr>
              <tr>
                <td><span class="letra_frm">¿Cuántasdías a la semana tiene servicio?
                  <input name="S3_500B" type="text" id="S3_500B" size="4" maxlength="1" />
                </span></td>
                <td><span class="letra_frm">¿Cuántas horas al día?
                  <input name="S3_500C" type="text" id="S3_500C" size="4" maxlength="2" />
                </span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" ><span class="letra_frm"><strong>6. ¿La vivienda tiene alumbrado eléctrico por red pública?</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="S3_600" type="text" id="S3_600" size="4" maxlength="1" /></td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">

          <tr>
            <td align="left" class="letra_frm"><strong>7. Su vivienda cuenta con <strong> (EQUIPOS)</strong>:</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="39%" align="left" class="letra_frm">Equipo de sonido?</td>
                <td width="61%" align="left" class="letra_frm"><input name="S3_701" type="text" id="S3_701" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Televisor a color?</td>
                <td align="left"><input name="S3_702" type="text" id="S3_702" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">DVD?</td>
                <td align="left"><input name="S3_703" type="text" id="S3_703" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Licuadora?</td>
                <td align="left"><input name="S3_704" type="text" id="S3_704" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Refrigeradora/congeladora?</td>
                <td align="left"><input name="S3_705" type="text" id="S3_705" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Plancha eléctrica?</td>
                <td align="left"><input name="S3_706" type="text" id="S3_706" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Cocina a gas?</td>
                <td align="left"><input name="S3_707" type="text" id="S3_707" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Computadora?</td>
                <td align="left"><input name="S3_708" type="text" id="S3_708" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Lavadora?</td>
                <td align="left"><input name="S3_709" type="text" id="S3_709" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Horno microondas?</td>
                <td align="left"><input name="S3_710" type="text" id="S3_710" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">No tiene ninguno?</td>
                <td align="left"><input name="S3_711" type="text" id="S3_711" size="3" maxlength="1" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm" ><strong>8.  Su vivienda cuenta con (<strong>SERVICIOS DE COMUNICACIÓN)</strong>:</strong></td>
          </tr>
          <tr>
            <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="34%" align="left" valign="middle" class="letra_frm">Teléfono fijo</td>
                <td width="66%" align="left"><input name="S3_801" type="text" id="S3_801" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Teléfono celular?</td>
                <td align="left"><input name="S3_802" type="text" id="S3_802" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Conexión a internet?</td>
                <td align="left"><input name="S3_803" type="text" id="S3_803" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Conexión a TV por cable?</td>
                <td align="left"><input name="S3_804" type="text" id="S3_804" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" valign="middle" class="letra_frm">Ninguno</td>
                <td align="left"><input name="S3_805" type="text" id="S3_805" size="3" maxlength="1" /></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="letra_frm" style="border:thin; border-bottom:  1px solid #B0B5B3"><strong>9. ¿Utiliza algún espacio de la vivienda para realizar alguna actividad que proporcione otros ingresos al hogar:</strong></td>
          </tr>
          <tr>
            <td align="left" valign="top" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="31%" align="left"><label>
                  <input name="S3_900" type="text" id="S3_900" size="3" maxlength="1" />
                  </label></td>
                <td width="69%" align="left"><span class="letra_frm">Especifique</span>                  <input name="S3_900E" type="text" id="S3_900E" size="20" /></td>
              </tr>
            </table></td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="162" align="center" valign="middle"><label>
      <input name="button" type="submit" class="subtitulo" id="button" value="  Guardar y continuar con las demás secciones  " onclick="return submit_frm()"/>
      <strong>
      <input name="FORM" type="hidden" id="FORM" value="1" />
      </strong></label></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>