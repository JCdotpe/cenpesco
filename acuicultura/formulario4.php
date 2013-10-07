<?php  session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
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
	
$result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$cp."' AND COD_DD='".$cd."' AND COD_DI='".$ccdi."' AND COD_CCPP='".$cod_ccpp."' GROUP BY COD_CCPP ORDER BY CENTRO_POBLADO ASC");
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

//mostar datos
if($_SESSION['id1']!=NULL)
{ 
$mysql="SELECT * FROM acu_seccion4 WHERE id4='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id4=$row['id4'];
$s4_1_dd=$row['s4_1_dd'];
$s4_1_dd_cod=$row['s4_1_dd_cod'];
$s4_1_pp=$row['s4_1_pp'];
$s4_1_pp_cod=$row['s4_1_pp_cod'];
$s4_1_di=$row['s4_1_di'];
$s4_1_di_cod=$row['s4_1_di_cod'];
$s4_1_ccpp=$row['s4_1_ccpp'];
$s4_1_ccpp_cod=$row['s4_1_ccpp_cod'];
$s4_tipvia=$row['s4_tipvia'];
$s4_nomvia=$row['s4_nomvia'];
$s4_ptanum=$row['s4_ptanum'];
$s4_mz=$row['s4_mz'];
$s4_lote=$row['s4_lote'];
$s4_km=$row['s4_km'];
$s4_ref=$row['s4_ref'];
$s4_2=$row['s4_2'];
$s4_3=$row['s4_3'];
	
}
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de registro de CENPESCO</title>
<style type="text/css">
@import url("estilos.css"); 
</style>
<script type="text/javascript" src="ingreso_ubigeo.js"></script>
<script type="text/javascript" src="ingreso_ubigeo1.js"></script>
<script type="text/javascript" src="ingreso_ubigeo2.js"></script>
<script type="text/javascript" src="ingreso_ubicacion.js"></script>
<script type="text/javascript" src="ingreso_ubicacion1.js"></script>
<script type="text/javascript" src="ingreso_ubicacion2.js"></script>
<script type="text/javascript" src="validacion_1.js"></script>
</head>

<body>
<form id="form4" name="form4" method="post" action="variables4.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><strong>SECCIÓN IV: UBICACIÓN DEL CENTRO DE CULTIVO</strong></td>
    </tr>
    <tr>
      <td height="23" align="left" class="texto_mediano" >1. ¿Dónde está ubicado su centro de cultivo?</td>
    </tr>
    <tr>
      <td height="29" align="left"><table width="690" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="209" align="left" valign="bottom" class="texto">1.1 DEPARTAMENTO</td>
          <td width="123" align="left" valign="bottom"><span class="texto"> 1.2 PROVINCIA</span></td>
          <td width="106" align="left" valign="bottom"><span class="texto"> 1.3 DISTRITO</span></td>
          <td width="239" align="left" valign="bottom"><span class="texto">1.4 CENTRO POBLADO/COMUNIDAD</span></td>
        </tr>
        <tr>
          <td align="left"><span class="letra_frm">
            <select name="s4_1_dd_cod" class="letra_frm" id="s4_1_dd_cod" onchange="carga_cProv1()">
              <option value="0">Seleccionar</option>
              <?php
				  
				   $result = mysql_query("SELECT * FROM  ccpp GROUP BY COD_DD ORDER BY DEPARTAMENTO ASC ");
				   while ($row = mysql_fetch_array($result)){

                
                        if ($s4_1_dd_cod==$row['COD_DD']) {  echo '<option value="'.$row['COD_DD'].'" selected="selected">'.$row['DEPARTAMENTO'].'</option>'; } else
                    { echo'<option value="'.$row['COD_DD'].'">'.$row['DEPARTAMENTO'].'</option>';  }
					
					 }
				  
				  ?>
            </select>
          </span></td>
          <td align="left"><div id="ver_cProvincia1" >
            <label>
              <select name="s4_1_pp_cod" class="letra_frm" id="s4_1_pp_cod">
              <?php  provincia($s4_1_dd_cod,$s4_1_pp_cod);  ?>
              </select>
            </label>
          </div></td>
          <td><div id="ver_cDistrito" >
            <label>
              <select name="s4_1_di_cod" class="letra_frm" id="s4_1_di_cod">
               <?php distrito($s4_1_dd_cod,$s4_1_pp_cod,$s4_1_di_cod);  ?>
              </select>
            </label>
          </div></td>
          <td align="left"><div id="ver_cCepo" >
            <label>
              <select name="s4_1_ccpp_cod" class="letra_frm" id="s4_1_ccpp_cod">
               <?php  centro_pob($s4_1_dd_cod,$s4_1_pp_cod,$s4_1_di_cod,$s4_1_ccpp_cod);  ?>
              </select>
            </label>
          </div></td>
        </tr>
      </table> </td>
    </tr>
    <tr>
      <td height="29" align="left"><table width="940" border="0" cellpadding="1" cellspacing="0">
        <tr>
          <td height="20" colspan="9" align="left" bgcolor="#FFFFFF" class="letra_frm"><span class="texto_mediano">1.5 Dirección (Circule el tipo de vía y anote la dirección donde vive permanentemente el acuicultor)</span></td>
        </tr>
        <tr class="texto">
          <td width="7%" align="left" class="letra_frm">TIPO VÍA</td>
          <td width="33%" align="left" class="letra_frm">NOMBRE VÍA</td>
          <td width="13%" align="left" class="letra_frm">N° PUERTA</td>
          <td width="9%" align="left" class="letra_frm">MZ</td>
          <td width="8%" align="left" class="letra_frm">LOTE</td>
          <td width="8%" align="left" class="letra_frm">KM</td>
          <td width="7%" align="left" class="letra_frm">&nbsp;</td>
          <td width="7%" align="left" class="letra_frm">&nbsp;</td>
          <td width="8%" align="left" class="letra_frm">&nbsp;</td>
        </tr>
        <tr>
          <td><label>
            <input name="s4_tipvia" type="text" class="texto" id="s4_tipvia"  onkeypress="return numeros18(event)" value="<?php echo $s4_tipvia; ?>" size="4" maxlength="1" />
          </label></td>
          <td><label>
            <input name="s4_nomvia" type="text" class="texto" id="s4_nomvia" value="<?php echo $s4_nomvia; ?>" size="30" maxlength="100" />
          </label></td>
          <td><input name="s4_ptanum" type="text" id="s4_ptanum" value="<?php echo $s4_ptanum; ?>" size="5" maxlength="4" /></td>
          <td align="left"><input name="s4_mz" type="text" id="s4_mz" value="<?php echo $s4_mz; ?>" size="4" maxlength="4" /></td>
          <td align="left"><input name="s4_lote" type="text" id="s4_lote" value="<?php echo $s4_lote; ?>" size="4" maxlength="4" /></td>
          <td align="left"><input name="s4_km" type="text" id="s4_km"  onkeypress="return numeros(event)" value="<?php echo $s4_km; ?>" size="4" maxlength="4"/></td>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="98" align="left" valign="top"><table width="817" height="94" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="522" align="left" class="texto">1.6 REFERENCIA ( Zona, sector, paraje, etc.):</td>
          <td width="287" align="left"><input name="s4_ref" type="text" class="texto" id="s4_ref" value="<?php echo $s4_ref; ?>" size="30" maxlength="120" /></td>
        </tr>
        <tr>
          <td align="left" class="texto">2. GENERALMENTE, ¿Qué medio de transporte utiliza para llegar a su centro de cultivo? </td>
          <td align="left"><input name="s4_2" type="text" class="texto" id="s4_2"  onkeypress="return numeros18(event)" value="<?php echo $s4_2; ?>" size="3" maxlength="1" /></td>
        </tr>
<?php  
$mysql="SELECT * FROM acu_seccion2 WHERE id2='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

if ($row = mysql_fetch_array($r))
{
$vr13=$row['s2_2'];

}

?>
        <tr>
          <td align="left" class="texto">3. ¿CUÁL ES EL NOMBRE DE LA EMPRESA?</td>
          <td align="left"><input name="s4_3" type="text" <?php if($vr13!=2) {  ?> disabled="disabled" <?php }  ?> class="texto" id="s4_3" value="<?php echo $s4_3; ?>" size="40" maxlength="120" /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="23" align="left"><strong><strong>
        <input name="frm4" type="hidden" id="frm4" value="1" />
      </strong></strong></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id4==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion4()"/>
        <strong><strong>
        <input name="opc4" type="hidden" id="opc4" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion4()" />
        <strong><strong>
        <input name="opc4" type="hidden" id="opc4" value="2" />
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