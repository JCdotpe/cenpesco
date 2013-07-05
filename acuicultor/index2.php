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
<center></center><form action="guardar3.php" method="post" name="form1" id="form1">
<table width="920" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#E2F1E9" style="border:thin;border: 1px solid #B0B5B3">
  <tr>
    <td height="33" align="center" bgcolor="#EFEFEF" ><p><span class="subtitulo"><strong>FORMULARIO CENSAL DE ACUICULTURA</strong></span> <span class="subtitulo"><strong>(Sección VIII, IX X)</strong></span><span class="subtitulo"></span></p></td>
  </tr>
    <tr>
    <td height="36" align="center" valign="middle" bgcolor="#FFFFFF" class="titu" ><div id="ver_aviso"><span class="aviso1"><strong>Registre este formulario</strong></span><span class="aviso1"><strong> con mucha atención, verifique la información antes de enviar.&nbsp;</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#CFD3CB" class="titu" ><strong>Sección VIII: FINANCIAMIENTO, PRODUCCIÓN Y COMERCIALIZACIÓN</strong></td>
  </tr>
  <tr>
    <td height="329" align="left" valign="top" class="letra_frm" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td align="left" class="letra_frm"><strong>1. En los últimos 12 meses, ¿Cómo financió usted el inicio de su producción?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">              <tr>
                <td width="49%" align="left" class="letra_frm">&nbsp;</td>
                <td width="12%" align="left" class="letra_frm">&nbsp;</td>
                <td width="39%" align="left" class="letra_frm">¿Monto?</td>
              </tr>
              <tr>
                <td width="49%" align="left" class="letra_frm">Con dinero de terceros</td>
                <td width="12%" align="left" class="letra_frm"><input name="S8_1_1" type="text" id="S8_1_1" size="3" maxlength="1" /></td>
                <td width="39%" align="left" class="letra_frm"><input name="S8_1_1A" type="text" id="S8_1_1A" size="15" /></td>
              </tr>
              <tr>
                <td align="left">Con dinero propio</td>
                <td align="left"><input name="S8_1_2" type="text" id="S8_1_2" size="3" maxlength="1" /></td>
                <td align="left"><input name="S8_1_2A" type="text" id="S8_1_2A" size="15" /></td>
              </tr>
              <tr>
                <td align="left">No financia</td>
                <td align="left"><input name="S8_1_3" type="text" id="S8_1_3" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td height="24" align="left">No trabajó en los  últimos 12 meses</td>
                <td align="left"><input name="S8_1_4" type="text" id="S8_1_4" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              </table></td>
          </tr>
          <tr>
            <td align="left"><strong>2. El financiamiento le fue otorgado por:</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="36%" align="left" class="letra_frm">Fondo nacional de desarrollo pesquero?</td>
                <td width="12%" align="left" class="letra_frm"><input name="S8_2_1" type="text" id="S8_2_1" size="3" maxlength="1" /></td>
                <td width="52%" align="left" class="letra_frm">&nbsp;</td>
                </tr>
              <tr>
                <td align="left">Banco?</td>
                <td align="left"><input name="S8_2_2" type="text" id="S8_2_2" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left">Comerciantes?</td>
                <td align="left"><input name="S8_2_3" type="text" id="S8_2_3" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left">Pariente/ Amigo?</td>
                <td align="left"><input name="S8_2_4" type="text" id="S8_2_4" size="3" maxlength="1" /></td>
                <td align="left">Especifique</td>
                </tr>
              <tr>
                <td align="left">Otro</td>
                <td align="left"><input name="S8_2_5" type="text" id="S8_2_5" size="3" maxlength="1" /></td>
                <td align="left"><input name="S8_2_5_O" type="text" id="S8_2_5_O" size="15" /></td>
                </tr>
              </table></td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td height="36" align="left" class="letra_frm"><strong>3. El financiamiento solicitado lo utiliza para:</strong></td>
          </tr>
          <tr>
            <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="47%" height="31" align="left" class="letra_frm">Compra de insumos y alimentos?</td>
                <td width="14%" align="left" class="letra_frm"><input name="S8_3_1" type="text" id="S8_3_1" size="3" maxlength="1" /></td>
                <td width="39%" align="left" class="letra_frm">&nbsp;</td>
                </tr>
              <tr>
                <td height="35" align="left" class="letra_frm">Compra de maquinaria o equipo?</td>
                <td align="left"><input name="S8_3_2" type="text" id="S8_3_2" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td height="33" align="left" class="letra_frm">Modernizar instalaciones</td>
                <td align="left"><input name="S8_3_3" type="text" id="S8_3_3" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td height="31" align="left" class="letra_frm">Compra de ovas?</td>
                <td align="left"><input name="S8_3_4" type="text" id="S8_3_4" size="3" maxlength="1" /></td>
                <td align="left">Especifique</td>
              </tr>
              <tr>
                <td height="34" align="left" class="letra_frm">Otro</td>
                <td align="left"><input name="S8_3_5" type="text" id="S8_3_5" size="3" maxlength="1" /></td>
                <td align="left"><input name="S8_3_5_0" type="text" id="S8_3_5_0" size="15" /></td>
              </tr>
              </table></td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td ><table width="99%" border="0" cellpadding="1" cellspacing="1" style="border:thin; border:  1px solid #B0B5B3">
      <tr >
        <td width="23%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>4. En los últimos 12 meses ¿Qué especies cosechó en su actividad acuícola?</strong></td>
        <td height="63" colspan="6" align="center" valign="middle" bgcolor="#99CCFF" class="letra_frm"><strong>6. ¿Cuál fue el volumen mensual que destinó a la:</strong><strong></strong></td>
        </tr>
        
              <tr >
        <td width="8%" height="63" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>( 0 ó 1)</strong></td>
        <td width="13%" height="63" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>5.1 Venta (Kg)</strong></td>
        <td width="14%" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>5.2 Autoconsumo (Kg)</strong></td>
        <td width="14%" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>5.3 Trueque</strong></td>
        <td width="14%" align="center" valign="middle" bgcolor="#CCCCCC" class="letra_frm"><strong>5.4. Pérdida (Kg)</strong></td>
        <td width="14%" align="center" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>5.5 Otro? (Kg)</strong></td>
          </tr>
      <tr>
        <td height="26" align="left" valign="middle" class="letra_frm">Trucha</td>
        <td align="center" valign="middle"><input name="S8_4_1" type="text" id="S8_4_1" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_1" type="text" id="S8_5_1_1" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_1" type="text" id="S8_5_2_1" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_3_1" type="text" id="S8_5_3_1" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_1" type="text" id="S8_5_4_1" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_1" type="text" id="S8_5_5_1" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm">Tilapia</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_2" type="text" id="S8_4_2" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_1_2" type="text" id="S8_5_1_2" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_2_2" type="text" id="S8_5_2_2" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_3_2" type="text" id="S8_5_3_2" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_2" type="text" id="S8_5_4_2" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_5_2" type="text" id="S8_5_5_2" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" class="letra_frm">Boquichico</td>
        <td align="center" valign="middle"><input name="S8_4_3" type="text" id="S8_4_3" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_3" type="text" id="S8_5_1_3" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_3" type="text" id="S8_5_2_3" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_3_3" type="text" id="S8_5_3_3" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_3" type="text" id="S8_5_4_3" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_3" type="text" id="S8_5_5_3" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm">Paiche</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_4" type="text" id="S8_4_4" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_1_4" type="text" id="S8_5_1_4" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_2_4" type="text" id="S8_5_2_4" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_3_4" type="text" id="S8_5_3_4" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_4" type="text" id="S8_5_4_4" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_5_4" type="text" id="S8_5_5_4" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" class="letra_frm">Gamitana</td>
        <td align="center" valign="middle"><input name="S8_4_5" type="text" id="S8_4_5" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_5" type="text" id="S8_5_1_5" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_5" type="text" id="S8_5_2_5" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_5" type="text" id="S8_5_4_5" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_5" type="text" id="S8_5_4_5" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_5" type="text" id="S8_5_5_5" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm">Carachama</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_6" type="text" id="S8_4_6" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_1_6" type="text" id="S8_5_1_6" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_2_6" type="text" id="S8_5_2_6" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_3_6" type="text" id="S8_5_3_6" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_6" type="text" id="S8_5_4_6" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_5_6" type="text" id="S8_5_5_6" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" class="letra_frm">Carpa</td>
        <td align="center" valign="middle"><input name="S8_4_7" type="text" id="S8_4_7" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_7" type="text" id="S8_5_1_7" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_7" type="text" id="S8_5_2_7" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_3_7" type="text" id="S8_5_3_7" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_7" type="text" id="S8_5_4_7" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_7" type="text" id="S8_5_5_7" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm">Paco</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_8" type="text" id="S8_4_8" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_1_8" type="text" id="S8_5_1_8" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_2_8" type="text" id="S8_5_2_8" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_3_8" type="text" id="S8_5_3_8" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_8" type="text" id="S8_5_4_8" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_5_8" type="text" id="S8_5_5_8" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" class="letra_frm">Caracol &quot;Churo&quot;</td>
        <td align="center" valign="middle"><input name="S8_4_9" type="text" id="S8_4_9" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_9" type="text" id="S8_5_1_9" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_9" type="text" id="S8_5_2_9" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_3_9" type="text" id="S8_5_3_9" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_9" type="text" id="S8_5_4_9" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_9" type="text" id="S8_5_5_9" size="10" /></td>
        </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm">Camarón</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_10" type="text" id="S8_4_10" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_1_10" type="text" id="S8_5_1_10" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_2_10" type="text" id="S8_5_2_10" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_3_10" type="text" id="S8_5_3_10" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_10" type="text" id="S8_5_4_10" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_5_10" type="text" id="S8_5_5_10" size="10" /></td>
        </tr>
        
              <tr>
        <td align="left" valign="middle" class="letra_frm">Langostino</td>
        <td align="center" valign="middle"><input name="S8_4_11" type="text" id="S8_4_11" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_11" type="text" id="S8_5_1_11" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_11" type="text" id="S8_5_2_11" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_3_11" type="text" id="S8_5_3_11" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_11" type="text" id="S8_5_4_11" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_11" type="text" id="S8_5_5_11" size="10" /></td>
          </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm">Otro 
          <input name="S8_4_12_O" type="text" id="S8_4_12_O" size="12" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_12" type="text" id="S8_4_12" size="3" maxlength="1" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_1_12" type="text" id="S8_5_1_12" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_2_12" type="text" id="S8_5_2_12" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_3_12" type="text" id="S8_5_3_12" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_12" type="text" id="S8_5_4_12" size="10" /></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_5_4_12" type="text" id="S8_5_4_12" size="10" /></td>
        </tr>
                
              <tr>
        <td align="left" valign="middle" class="letra_frm">Otro 
          <input name="S8_4_13_O" type="text" id="S8_4_13_O" size="12" /></td>
        <td align="center" valign="middle"><input name="S8_4_13" type="text" id="S8_4_13" size="3" maxlength="1" /></td>
        <td align="center" valign="middle"><input name="S8_5_1_13" type="text" id="S8_5_1_13" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_2_13" type="text" id="S8_5_2_13" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_3_13" type="text" id="S8_5_3_13" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_4_13" type="text" id="S8_5_4_13" size="10" /></td>
        <td align="center" valign="middle"><input name="S8_5_5_13" type="text" id="S8_5_5_13" size="10" /></td>
          </tr>
              <tr>
                <td align="left" valign="middle" bgcolor="#FFFFFF" class="letra_frm"><strong>TOTAL</strong></td>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_4_14" type="text" id="S8_4_14" size="3" maxlength="1" /></td>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_TOT_V" type="text" id="S8_TOT_V" size="10" /></td>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_TOT_A" type="text" id="S8_TOT_A" size="10" /></td>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_TOT_T" type="text" id="S8_TOT_T" size="10" /></td>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_TOT_P" type="text" id="S8_TOT_P" size="10" /></td>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="S8_TOT_O" type="text" id="S8_TOT_O" size="10" /></td>
              </tr>
    </table></td>
  </tr>

      <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td align="left" class="letra_frm"><strong>6. En los últimos 12 meses, ¿Generalmente a quien vendió su producción?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="47%" align="left" class="letra_frm">Al público cercano a la instalación</td>
                <td width="13%" align="left"><input name="S8_6_1" type="text" id="S2_" size="3" maxlength="1" /></td>
                <td width="40%" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">A los mercados mayoristas</td>
                <td align="left"><input name="S8_6_2" type="text" id="S2_5" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">A los mercados minoristas</td>
                <td align="left"><input name="S8_6_3" type="text" id="S2_12" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">A los intermediarios</td>
                <td align="left"><input name="S8_6_4" type="text" id="S2_13" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">A restaurantes y hoteles</td>
                <td align="left"><input name="S2_2" type="text" id="S8_6_5" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Otros</td>
                <td align="left"><input name="S8_6_6" type="text" id="S2_15" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm">Especifique</span>                  <input name="S8_6_6_O" type="text" id="S2_12G15" size="12" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><span class="letra_frm"><strong>7. ¿Cuál es el tipo de presentación de los productos?</strong></span></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
              <tr>
                <td width="47%" align="left" class="letra_frm">Entero</td>
                <td width="13%" align="left"><input name="S8_7_1" type="text" id="S2_16" size="3" maxlength="1" /></td>
                <td width="40%" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Eviscerado</td>
                <td align="left"><input name="S8_7_2" type="text" id="S2_17" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Seco o salado</td>
                <td align="left"><input name="S8_7_3" type="text" id="S2_18" size="3" maxlength="1" /></td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Otros</td>
                <td align="left"><input name="S8_7_4" type="text" id="S2_68" size="3" maxlength="1" /></td>
                <td align="left"><span class="letra_frm">Especifique</span>
                  <input name="S8_7_4_O" type="text" id="S2_12G" size="12" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="letra_frm"><strong>3. ¿Qué tipo de instalaciones utiliza en su acividad?</strong></td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" height="342" border="0" cellspacing="1">
          <tr>
            <td height="29" align="left" class="letra_frm"><strong>8. La producción de su actividad la vendió:</strong></td>
          </tr>
          <tr>
            <td height="37" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="72%" align="left" class="letra_frm">Individualmente</td>
                <td width="9%" align="left"><input name="S8_8_1" type="text" id="S2_4" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Eventualemnte en asociación con otros acuicultores</td>
                <td align="left"><input name="S8_8_2" type="text" id="S2_6" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Por medio de una organización social de acuicultores</td>
                <td align="left"><input name="S8_8_3" type="text" id="S2_7" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Por medio de un comité e comercialización</td>
                <td align="left"><input name="S8_8_4" type="text" id="S2_43" size="3" maxlength="1" /></td>
              </tr>
              </table></td>
          </tr>
          <tr>
            <td height="37" align="left"><span class="letra_frm"><strong>9. En los últimos 12 meses, ¿Cuál fue su ganancia neta promedio mensual?</strong></span></td>
          </tr>
          <tr>
            <td height="152" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="72%" align="left" class="letra_frm">Ingrese el número que corresponde al monto</td>
                <td width="9%" align="left"><input name="S9_9" type="text" id="S2_2" size="3" maxlength="1" /></td>
                </tr>
              </table></td>
          </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" align="center" bgcolor="#CFD3CB" class="titu"><strong>Sección IX: SEGURO, SALUD Y DISCAPACIDAD</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="2">
      <tr>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td height="29" align="left" class="letra_frm"><strong>1. ¿Conoce usted algún tipo de seguro de salud?</strong></td>
          </tr>
          <tr>
            <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><span class="letra_frm">Responder</span>              <input name="S9_1" type="text" id="S2_3" size="3" maxlength="1" /></td>
          </tr>
          <tr>
            <td height="37" align="left"><span class="letra_frm"><strong>2. ¿Cuál o cuáles son los tipos de seguro de  salud que usted conoce?</strong></span></td>
          </tr>
          <tr>
            <td height="141" align="left" valign="top" ><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="55%" height="36" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Tipo</strong></td>
                <td width="22%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                <td width="23%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>¿Está afiliado?</strong></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Essalud</td>
                <td align="left"><input name="S9_2_1" type="text" id="S2_10" size="3" maxlength="1" /></td>
                <td align="left"><input name="S9_2_1_1" type="text" id="S2_22" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Sistema integral de salud</td>
                <td align="left"><input name="S9_2_2" type="text" id="S2_107" size="3" maxlength="1" /></td>
                <td align="left"><input name="S9_2_2_1" type="text" id="S2_23" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Entidad prestadora de salud</td>
                <td align="left"><input name="S9_2_3" type="text" id="S2_108" size="3" maxlength="1" /></td>
                <td align="left"><input name="S9_2_3_1" type="text" id="S2_24" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">Otro  (Especifique) 
                  <input name="S9_204_O" type="text" id="S2_9" size="12" /></td>
                <td align="left"><input name="S9_2_4" type="text" id="S2_109" size="3" maxlength="1" /></td>
                <td align="left"><input name="S9_2_4_1" type="text" id="S2_25" size="3" maxlength="1" /></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="33" align="left" class="letra_frm"><strong>3. Está afiliado a algún tipo de seguro:</strong></td>
          </tr>
          <tr>
            <td height="121" align="left" class="letra_frm"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="55%" height="23" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Tipo</strong></td>
                <td width="22%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">De vida</td>
                <td align="left"><input name="S9_3_1" type="text" id="S2_26" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td align="left" class="letra_frm">De pensiones</td>
                <td align="left"><input name="S9_3_2" type="text" id="S2_27" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td height="35" align="left" class="letra_frm">No está afiliado</td>
                <td align="left"><input name="S9_3_3" type="text" id="S2_28" size="3" maxlength="1" /></td>
                </tr>
              </table></td>
          </tr>
          </table></td>
        <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
          <tr>
            <td height="40" align="left" class="letra_frm"><strong>4. ¿En los últimos 12 meses ¿Ha sufrido alguna enfermedad producto de su trabajo?</strong></td>
          </tr>
          <tr>
            <td height="42" align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="14%" height="27" align="left" class="letra_frm">Responder 
                  <input name="S9_4_1" type="text" id="S2_11" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td height="27" align="left" class="letra_frm"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td align="center" bgcolor="#FFFFFF">Ene</td>
                    <td align="center" bgcolor="#CCCCCC">Feb</td>
                    <td align="center" bgcolor="#FFFFFF">Mar</td>
                    <td align="center" bgcolor="#CCCCCC">Abr</td>
                    <td align="center" bgcolor="#FFFFFF">May</td>
                    <td align="center" bgcolor="#CCCCCC">Jun</td>
                  </tr>
                  <tr>
                    <td align="center"><input name="S9_4_1_1" type="text" id="S2_29" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_2" type="text" id="S2_30" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_3" type="text" id="S2_31" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_4" type="text" id="S2_32" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_5" type="text" id="S2_33" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_6" type="text" id="S2_34" size="3" maxlength="1" /></td>
                  </tr>
                  <tr>
                    <td align="center" bgcolor="#CCCCCC">Jul</td>
                    <td align="center" bgcolor="#FFFFFF">Ago</td>
                    <td align="center" bgcolor="#CCCCCC">Set</td>
                    <td align="center" bgcolor="#FFFFFF">Oct</td>
                    <td align="center" bgcolor="#CCCCCC">Nov</td>
                    <td align="center" bgcolor="#FFFFFF">Dic</td>
                  </tr>
                  <tr>
                    <td align="center"><input name="S9_4_1_7" type="text" id="S2_35" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_8" type="text" id="S2_36" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_9" type="text" id="S2_37" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_10" type="text" id="S2_38" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_11" type="text" id="S2_39" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_4_1_12" type="text" id="S2_40" size="3" maxlength="1" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="44" align="left"><span class="letra_frm"><strong>5. ¿En los últimos 12 meses, ha sufrido algún accidente durante su trabajo?</strong></span></td>
          </tr>
          <tr>
            <td height="123" align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="14%" height="27" align="left" class="letra_frm">Responder 
                  <input name="S9_5_1" type="text" id="S2_41" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td height="27" align="left" class="letra_frm"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr>
                    <td align="center" bgcolor="#FFFFFF">Ene</td>
                    <td align="center" bgcolor="#CCCCCC">Feb</td>
                    <td align="center" bgcolor="#FFFFFF">Mar</td>
                    <td align="center" bgcolor="#CCCCCC">Abr</td>
                    <td align="center" bgcolor="#FFFFFF">May</td>
                    <td align="center" bgcolor="#CCCCCC">Jun</td>
                  </tr>
                  <tr>
                    <td align="center"><input name="S9_5_1_1" type="text" id="S2_42" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_2" type="text" id="S2_44" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_3" type="text" id="S2_45" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_4" type="text" id="S2_46" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_5" type="text" id="S2_47" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_6" type="text" id="S2_48" size="3" maxlength="1" /></td>
                  </tr>
                  <tr>
                    <td align="center" bgcolor="#CCCCCC">Jul</td>
                    <td align="center" bgcolor="#FFFFFF">Ago</td>
                    <td align="center" bgcolor="#CCCCCC">Set</td>
                    <td align="center" bgcolor="#FFFFFF">Oct</td>
                    <td align="center" bgcolor="#CCCCCC">Nov</td>
                    <td align="center" bgcolor="#FFFFFF">Dic</td>
                  </tr>
                  <tr>
                    <td align="center"><input name="S9_5_1_7" type="text" id="S2_49" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_8" type="text" id="S2_50" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_9" type="text" id="S2_51" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_10" type="text" id="S2_52" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_11" type="text" id="S2_53" size="3" maxlength="1" /></td>
                    <td align="center"><input name="S9_5_1_12" type="text" id="S2_54" size="3" maxlength="1" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="23" align="left"><span class="letra_frm"><strong>6. Sr(a). Tiene usted alguna dificultad para:</strong></span></td>
          </tr>
          <tr>
            <td height="28" align="left" ><table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="55%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Dificultad</strong></td>
                <td width="22%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Escriba (0 ó 1)</strong></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Para ver, aún usando lentes</td>
                <td align="left"><input name="S9_6_1" type="text" id="S2_55" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Para oír, aún usando audífonos de sordera</td>
                <td align="left"><input name="S9_6_2" type="text" id="S2_56" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Para hablar (entonar/vocalizar)</td>
                <td align="left"><input name="S9_6_3" type="text" id="S2_57" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Para usar brazos y mano/ piernas y pies</td>
                <td align="left"><input name="S9_6_4" type="text" id="S2_58" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Alguna otra dificultad o limitación</td>
                <td align="left"><input name="S9_6_5" type="text" id="S2_59" size="3" maxlength="1" /></td>
              </tr>
              <tr>
                <td align="left" class="letra_frm">Ninguna</td>
                <td align="left"><input name="S9_6_6" type="text" id="S2_60" size="3" maxlength="1" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="68"><table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td width="100%" height="28" colspan="5" align="center" bgcolor="#CFD3CB" class="titu"><strong>Sección X: CAPACITACIÓN Y ASISTENCIA TÉCNICA</strong></td>
      </tr>
      <tr>
        <td height="28" colspan="5" align="center" class="titu"><table width="100%" border="0" cellpadding="1" cellspacing="2">
          <tr>
            <td width="50%" align="left" valign="top"  style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="100%" colspan="2" align="left" class="letra_frm"><strong>1. Usted conoce:</strong></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="47%" align="left" class="letra_frm">Normatividad para la acuicultura</td>
                    <td width="53%" align="left"><input name="S10_1_1" type="text" id="S2_61" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Buenas prácticas</td>
                    <td align="left"><input name="S10_1_2" type="text" id="S2_62" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Normas sanitarias</td>
                    <td align="left"><input name="S10_1_3" type="text" id="S2_63" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Tecnología acuícola</td>
                    <td align="left"><input name="S10_1_4" type="text" id="S2_64" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Cuidado del medio ambiente</td>
                    <td align="left"><input name="S10_1_5" type="text" id="S2_65" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Programa de producción y /o alimentación</td>
                    <td align="left"><input name="S10_1_6" type="text" id="S2_66" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">No conoce</td>
                    <td align="left"><input name="S10_1_7" type="text" id="S2_14" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm"><strong>2. En los últimos 6 meses, ha recibido alguna capacitación relacionada a la acuicultura.</strong></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm">Responder 
                  <input name="S10_2" type="text" id="S2_69" size="3" maxlength="1" /></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm"><strong>3. ¿Quién le brindó la capacitación?</strong></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="58%" align="left" class="letra_frm">Ministerio de producción</td>
                    <td width="42%" align="left"><input name="S10_3_1" type="text" id="S2_70" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Ministerio de ambiente</td>
                    <td align="left"><input name="S10_3_2" type="text" id="S2_71" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Ministerio de agricultura</td>
                    <td align="left"><input name="S10_3_3" type="text" id="S2_72" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Gobierno local</td>
                    <td align="left"><input name="S10_3_4" type="text" id="S2_73" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Gobierno regional</td>
                    <td align="left"><input name="S10_3_5" type="text" id="S2_74" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Organización no gubernamental (ONG)</td>
                    <td align="left"><input name="S10_3_6" type="text" id="S2_75" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Otro (Especifique) 
                      <input name="S10_3_7_O" type="text" id="S2_76" size="12" /></td>
                    <td align="left"><input name="S10_3_7" type="text" id="S2_77" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm"><strong>4. ¿Cuales fueron los cursos o temas de capacitación recibidos?</strong></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="65%" height="36" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Cursos o temas</strong></td>
                    <td width="14%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>0 ó 1</strong></td>
                    <td width="14%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Pagado</strong></td>
                    <td width="21%" align="left" bgcolor="#FFFFFF" class="letra_frm"><strong>Gratuito</strong></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Normas técnicas para la acuicultura</td>
                    <td align="left"><input name="S10_4_1" type="text" id="S2_78" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_1A" type="text" id="S2_78" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_1B" type="text" id="S2_79" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Buenas prácticas en la acuicultura</td>
                    <td align="left"><input name="S10_4_2" type="text" id="S2_80" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_2A" type="text" id="S2_80" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_2B" type="text" id="S2_81" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Normas sanitarias</td>
                    <td align="left"><input name="S10_4_3" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_3A" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_3B" type="text" id="S2_83" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Tecnología</td>
                    <td align="left"><input name="S10_4_4" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_4A" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_4B" type="text" id="S2_83" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Formalización</td>
                    <td align="left"><input name="S10_4_5" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_5A" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_5B" type="text" id="S2_83" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Comercialización</td>
                    <td align="left"><input name="S10_4_6" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_6A" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_6B" type="text" id="S2_83" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Programas de producción y/o alimentación</td>
                    <td align="left"><input name="S10_4_7" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_7A" type="text" id="S2_82" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_7B" type="text" id="S2_83" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Otro  (Especifique)
                      <input name="S10_4_1O" type="text" id="S2_84" size="12" /></td>
                    <td align="left"><input name="S10_4_8" type="text" id="S2_85" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_8A" type="text" id="S2_85" size="3" maxlength="1" /></td>
                    <td align="left"><input name="S10_4_8B" type="text" id="S2_86" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td colspan="2" align="left" class="letra_frm">&nbsp;</td>
                </tr>
              </table></td>
            <td width="50%" align="left" valign="top"  style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td height="52" align="left" class="letra_frm"><strong>5.  En los últimos 6 meses, ha recibido asistencia técnica en su actividad</strong></td>
                </tr>
              <tr>
                <td width="14%" height="31" align="left" valign="top"><span class="letra_frm">Responder</span>                  <input name="S10_5" type="text" id="S10_5" size="4" maxlength="1" /></td>
                </tr>
              <tr>
                <td height="17" align="left" valign="top"><strong class="letra_frm">6. ¿Qué tipo de asistencia técnica recibió?</strong></td>
                </tr>
              <tr>
                <td height="31" align="left" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="58%" align="left" class="letra_frm">Asistencia alimentaria y sanitaria</td>
                    <td width="42%" align="left"><input name="S10_6_1" type="text" id="S2_67" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Asesoramiento financiero</td>
                    <td align="left"><input name="S10_6_2" type="text" id="S2_87" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Asistencia para obtener productos inocuos y de calidad</td>
                    <td align="left"><input name="S10_6_3" type="text" id="S2_88" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Asesoramiento técnico en los procesos de cultivo y/o crianza</td>
                    <td align="left"><input name="S10_6_4" type="text" id="S2_89" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Otro (Especifique)
                      <input name="S10_6_5_O" type="text" id="S2_92" size="12" /></td>
                    <td align="left"><input name="S10_6_5" type="text" id="S2_93" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td height="20" align="left" valign="top"><strong class="letra_frm">7. ¿Quién le brindó la asistencia técnica?</strong></td>
                </tr>
              <tr>
                <td height="31" align="left" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="58%" align="left" class="letra_frm">Ministerio de producción</td>
                    <td width="42%" align="left"><input name="S10_7_1" type="text" id="S2_90" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Ministerio de ambiente</td>
                    <td align="left"><input name="S10_7_2" type="text" id="S2_91" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Ministerio de agricultura</td>
                    <td align="left"><input name="S10_7_3" type="text" id="S2_94" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Gobierno local</td>
                    <td align="left"><input name="S10_7_4" type="text" id="S2_95" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Gobierno regional</td>
                    <td align="left"><input name="S10_7_5" type="text" id="S2_94" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Organización no gubernamental (ONG)</td>
                    <td align="left"><input name="S10_7_6" type="text" id="S2_95" size="3" maxlength="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" class="letra_frm">Otro (Especifique)
                      <input name="S10_7_7_O" type="text" id="S2_96" size="12" /></td>
                    <td align="left"><input name="S10_7_7" type="text" id="S2_97" size="3" maxlength="1" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td height="31" align="left" valign="bottom" class="letra_frm"><strong>OBSERVACIONES</strong></td>
                </tr>
              <tr>
                <td height="31" align="left" valign="top"><textarea name="OBS" cols="48" rows="12" id="S2_98"></textarea></td>
                </tr>
              </table></td>
          </tr>
          </table></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="34" align="center" valign="middle"><table width="642" height="124" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <th width="230" scope="col">&nbsp;</th>
        <th width="80" scope="col"><span class="letra_frm">Día</span></th>
        <th width="87" scope="col"><span class="letra_frm">Mes</span></th>
        <th width="94" scope="col"><span class="letra_frm">Año</span></th>
        <th width="135" scope="col"><span class="letra_frm">Resultado</span></th>
      </tr>
      <tr>
        <td><span class="letra_frm">Fecha del empadronamiento</span></td>
        <td align="center"><input name="F_D" type="text" id="S2_20" size="3" maxlength="2" /></td>
        <td align="center"><input name="F_M" type="text" id="S2_99" size="3" maxlength="2" /></td>
        <td align="center"><input name="F_A" type="text" id="S2_100" size="4" maxlength="4" /></td>
        <td align="center"><input name="RES" type="text" id="S2_101" size="3" maxlength="1" /></td>
      </tr>
      <tr>
        <td class="letra_frm">Nombre del Empadronador</td>
        <td colspan="3" align="center"><input name="EMP" type="text" id="S2_102" size="25" /></td>
        <td align="center"><span class="letra_frm">DNI
          </span>          <input name="EMP_DNI" type="text" id="S2_103" size="10" maxlength="8" /></td>
      </tr>
    </table></td>
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