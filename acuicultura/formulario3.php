<?php  session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
///mostrar datos
if($_SESSION['id1']!=NULL)
{ 
$mysql="SELECT * FROM acu_seccion3 WHERE id3='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{
$id3=$row['id3'];
$s3_100=$row['s3_100'];
$s3_100_o=$row['s3_100_o'];
$s3_200=$row['s3_200'];
$s3_200_o=$row['s3_200_o'];
$s3_300=$row['s3_300'];
$s3_300_o=$row['s3_300_o'];
$s3_400=$row['s3_400'];
$s3_400a_o=$row['s3_400a_o'];
$s3_500=$row['s3_500'];
$s3_500_o=$row['s3_500_o'];
$s3_600=$row['s3_600'];
$s3_600a=$row['s3_600a'];
$s3_600b=$row['s3_600b'];
$s3_600c=$row['s3_600c'];
$s3_700=$row['s3_700'];
$s3_800=$row['s3_800'];
$s3_901=$row['s3_901'];
$s3_902=$row['s3_902'];
$s3_903=$row['s3_903'];
$s3_904=$row['s3_904'];
$s3_905=$row['s3_905'];
$s3_906=$row['s3_906'];
$s3_907=$row['s3_907'];
$s3_908=$row['s3_908'];
$s3_909=$row['s3_909'];
$s3_910=$row['s3_910'];
$s3_911=$row['s3_911'];
$s3_1001=$row['s3_1001'];
$s3_1002=$row['s3_1002'];
$s3_1003=$row['s3_1003'];
$s3_1004=$row['s3_1004'];
$s3_1005=$row['s3_1005'];
$s3_1100=$row['s3_1100'];
$s3_1100e=$row['s3_1100e'];
$s3_1100e_cod=$row['s3_1100e_cod'];
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
<?php
  $_SESSION['pj']=1; 	
 $result = mysql_query("SELECT * FROM  acu_seccion2 WHERE id2='".$_SESSION['id1']."'");
while ($row = mysql_fetch_array($result))
{ 
$pj=$row['s2_2'];	
if($pj==2) {  $_SESSION['pj']=2;  } else { $_SESSION['pj']=1;   }
}

if($pj!=2)
{
   
 ?>
<form id="form3" name="form3" method="post" action="variables3.php">
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <td height="35" align="left" class="texto_mediano" ><strong>SECCIÓN III: CARACTERÍSTICAS Y SERVICIOS DE LA VIVIENDA</strong></td>
    </tr>
    <tr>
      <td height="23" align="center" class="texto" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
        <tr>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="letra_frm">1. LA VIVIENDA QUE OCUPA ES:</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="41%" align="left" class="letra_frm">La vivienda que ocupa es:</td>
                  <td width="59%" align="left" class="letra_frm">Otro: Especifique</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    <input name="s3_100" type="text" id="s3_100" onkeypress="return numeros16(event)" onkeyup="return otros(this.name,'s3_100_o','6')" value="<?php echo $s3_100; ?>" size="3" maxlength="1" onchange="return salta_s3(this.name,'6','s3_200')"/>
                  </label></td>
                  <td align="left"><input name="s3_100_o" type="text" id="s3_100_o" onkeypress="return letras(event)" value="<?php echo $s3_100_o; ?>" size="20" maxlength="100" readonly="readonly" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left"><span class="letra_frm">2. EL MATERIAL DE CONSTRUCCIÓN  PREDOMINANTE EN LAS PAREDES EXTERIORES DE SU VIVIENDA ES DE:</span></td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="41%" align="left" class="letra_frm">Tipo de material:</td>
                  <td width="59%" align="left" class="letra_frm">Si es otro, especifique:</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    <input name="s3_200" type="text" id="s3_200"  onkeypress="return numeros18(event)" onkeyup="return otros(this.name,'s3_200_o','8')" value="<?php echo $s3_200; ?>" size="3" maxlength="1" onchange="return salta_s3(this.name,'8','s3_300')"/>
                  </label></td>
                  <td align="left"><input name="s3_200_o" type="text" id="s3_200_o" onkeypress="return letras(event)" value="<?php echo $s3_200_o; ?>" size="20" maxlength="100" readonly="readonly"/></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" class="texto">3. EL MATERIAL DE CONSTRUCCIÓN PREDOMINANTE EN LOS PISOS DE SUS VIVIENDAS ES DE:</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="41%" align="left" class="letra_frm">Tipo de material:</td>
                  <td width="59%" align="left" class="letra_frm">Si es otro, especifique</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    <input name="s3_300" type="text" id="s3_300" onkeypress="return numeros17(event)" onkeyup="return otros(this.name,'s3_300_o','7')" value="<?php echo $s3_300; ?>" size="3" maxlength="1" onchange="return salta_s3(this.name,'7','s3_400')"/>
                  </label></td>
                  <td align="left"><input name="s3_300_o" type="text" id="s3_300_o" onkeypress="return letras(event)" value="<?php echo $s3_300_o; ?>" size="20" maxlength="100" readonly="readonly"/></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="20" align="left" class="texto">4. EL MATERIAL DE CONSTRUCCIÓN PREDOMINANTE EN LOS TECHOS DE SU VIVIENDA ES DE:</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="41%" align="left" class="letra_frm">Tipo de material:</td>
                  <td width="59%" align="left" class="letra_frm">Si es otro, especifique</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    <input name="s3_400" type="text" id="s3_400"  onkeypress="return numeros18(event)" onkeyup="return otros(this.name,'s3_400a_o','8')" value="<?php echo $s3_400; ?>" size="3" maxlength="1" onchange="return salta_s3(this.name,'8','s3_500')"/>
                  </label></td>
                  <td align="left"><input name="s3_400a_o" type="text" id="s3_400a_o" onkeypress="return letras(event)" value="<?php echo $s3_400a_o; ?>" size="20" maxlength="100" readonly="readonly"/></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" class="texto">5. EL  ABASTECIMIENTO DE AGUA EN LA VIVIENDA PROCEDE DE:</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="41%" align="left" class="letra_frm">Procede de:</td>
                  <td width="59%" align="left" class="letra_frm">Si es otro, especifique</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    <input name="s3_500" type="text" id="s3_500"  onkeypress="return numeros18(event)" onblur="return salta_pp(this.name,'s3_600','s3_700','s3_500_o')" value="<?php echo $s3_500; ?>" size="3" maxlength="1" />
                  </label></td>
                  <td align="left"><input name="s3_500_o" type="text" id="s3_500_o" onkeypress="return letras(event)" value="<?php echo $s3_500_o; ?>" size="20" maxlength="100" onchange="return salta_va(this.name,'s3_700')"/></td>
                </tr>
              </table></td>
            </tr>
            <tr id="service1" >
              <td align="left" class="texto" >6. ¿LA VIVIENDA TIENE EL SERVICIO DE AGUA TODOS LOS DÍAS DE LA SEMANA?</td>
            </tr>
            <tr id="service2">
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="50%" height="29">Si/No 
                    <input name="s3_600" type="text" id="s3_600" onkeypress="return numeros12(event)" onkeyup="servicio1('s3_600','s3_600a','s3_600b','s3_600c')" value="<?php echo $s3_600; ?>" size="3" maxlength="1" onchange="return salta_s3(this.name,'1','s3_700')"/></td>
                  <td width="50%" class="letra_frm">¿Cuántas horas al día?
                    <input name="s3_600a" type="text" id="s3_600a" onkeyup="entrada1(this.name,'24','0','99','Ingrese valores entre 0 y 24 para los días de la semana')" value="<?php echo $s3_600a; ?>" size="4" maxlength="2" readonly="readonly"/></td>
                </tr>
                <tr>
                  <td><span class="letra_frm">¿Cuántasdías a la semana tiene este servicio?
                      
                      <input name="s3_600b" type="text" id="s3_600b"  onkeyup="entrada1(this.name,'6','1','9','Ingrese valores entre 1 y 6 para los días de la semana')" value="<?php echo $s3_600b; ?>" size="4" maxlength="1" readonly="readonly"/>
                  </span></td>
                  <td><span class="letra_frm">¿Cuántas horas al día?
                    <input name="s3_600c" type="text" id="s3_600c"  onkeyup="entrada1(this.name,'24','0','99','Ingrese valores entre 0 y 24 para las horas del día')" value="<?php echo $s3_600c; ?>" size="4" maxlength="2" readonly="readonly"/>
                  </span></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" ><span class="texto">7.EL BAÑO O SERVICIO HIGIÉNICO QUE TIENE SU VIVIENDA, ESTÁ CONECTADO A:</span></td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><input name="s3_700" type="text" id="s3_700" onkeypress="return numeros17(event)" value="<?php echo $s3_700; ?>" size="3" maxlength="1"/></td>
            </tr>
          </table></td>
          <td width="50%" align="left" valign="top" style="border:thin;border: 1px solid #B0B5B3"><table width="100%" border="0" cellspacing="1">
            <tr>
              <td align="left" class="texto"> 8. LA VIVIENDA TIENE ALUMBRADO ELÉCTRICO POR RED PÚBLICA?</td>
            </tr>
                        <tr>
              <td align="left" class="letra_frm" style="border:thin; border-bottom:  1px solid #B0B5B3"><span style="border:thin; border-bottom:  1px solid #B0B5B3">
                <input name="s3_800" type="text" id="s3_800"  onkeypress="return numeros12(event)" value="<?php echo $s3_800; ?>" size="3" maxlength="1"/>
              </span></td>
            </tr>
                        <tr>
              <td align="left" class="letra_frm">9. LA VIVIENDA CUENTA CON  (EQUIPOS):</td>
            </tr>
            <tr>
              <td align="left" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="39%" align="left" class="letra_frm">Equipo de sonido?</td>
                  <td width="61%" align="left" class="letra_frm"><input name="s3_901" type="text" id="s3_901" onkeypress="return binario(event)" value="<?php echo $s3_901; ?>" size="3" maxlength="1" /></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Televisor a color?</td>
                  <td align="left"><input name="s3_902" type="text" id="s3_902" onkeypress="return binario(event)" value="<?php echo $s3_902; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">DVD?</td>
                  <td align="left"><input name="s3_903" type="text" id="s3_903" onkeypress="return binario(event)" value="<?php echo $s3_903; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Licuadora?</td>
                  <td align="left"><input name="s3_904" type="text" id="s3_904" onkeypress="return binario(event)" value="<?php echo $s3_904; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Refrigeradora/congeladora?</td>
                  <td align="left"><input name="s3_905" type="text" id="s3_905" onkeypress="return binario(event)" value="<?php echo $s3_905; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Plancha eléctrica?</td>
                  <td align="left"><input name="s3_906" type="text" id="s3_906" onkeypress="return binario(event)" value="<?php echo $s3_906; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Cocina a gas?</td>
                  <td align="left"><input name="s3_907" type="text" id="s3_907" onkeypress="return binario(event)" value="<?php echo $s3_907; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Computadora?</td>
                  <td align="left"><input name="s3_908" type="text" id="s3_908" onkeypress="return binario(event)" value="<?php echo $s3_908; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Lavadora?</td>
                  <td align="left"><input name="s3_909" type="text" id="s3_909" onkeypress="return binario(event)" value="<?php echo $s3_909; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">Horno microondas?</td>
                  <td align="left"><input name="s3_910" type="text" id="s3_910" onkeypress="return binario(event)" value="<?php echo $s3_910; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" class="letra_frm">No tiene ninguno?</td>
                  <td align="left"><input name="s3_911" type="text" id="s3_911" onkeypress="return binario(event)" 
                   onkeyup="return ninguno('s3_911','s3_901','s3_902','s3_903','s3_904','s3_905','s3_906','s3_907','s3_908','s3_909','s3_910','s3_911','','','12','0','s3_911')" value="<?php echo $s3_911; ?>" size="3" maxlength="1"/></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" class="texto" >10.¿ LOS SERVICIOS DE COMUNICACIÓN CON  QUE CUENTA SU VIVIENDA SON:</td>
            </tr>
            <tr>
              <td align="left" valign="top" style="border:thin; border-bottom:  1px solid #B0B5B3"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="36%" align="left" valign="middle" class="letra_frm">Teléfono fijo?</td>
                  <td width="64%" align="left"><input name="s3_1001" type="text" id="s3_1001" onkeypress="return binario(event)" value="<?php echo $s3_1001; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="letra_frm">Teléfono celular?</td>
                  <td align="left"><input name="s3_1002" type="text" id="s3_1002" onkeypress="return binario(event)" value="<?php echo $s3_1002; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="letra_frm">Conexión a internet?</td>
                  <td align="left"><input name="s3_1003" type="text" id="s3_1003" onkeypress="return binario(event)" value="<?php echo $s3_1003; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="letra_frm">Conexión a TV por cable?</td>
                  <td align="left"><input name="s3_1004" type="text" id="s3_1004" onkeypress="return binario(event)" value="<?php echo $s3_1004; ?>" size="3" maxlength="1"/></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="letra_frm">Ninguno</td>
                  <td align="left"><input name="s3_1005" type="text" id="s3_1005" onkeypress="return binario(event)" onkeyup="ninguno('s3_1005','s3_1001','s3_1002','s3_1003','s3_1004','s3_1005','','','','','','','','','5','0','s3_1005')" value="<?php echo $s3_1005; ?>" size="3" maxlength="1"/></td>
                </tr>
              </table></td>
            </tr>,
            <tr>
              <td align="left" valign="top" class="texto" style="border:thin; border-bottom:  1px solid #B0B5B3">11. ¿UTILIZA ALGÚN ESPACIO DE LA VIVIENDA PARA REALIZAR ALGUNA ACTIVIDAD QUE PROPORCIONEN OTROS INGRESOS AL HOGAR?</td>
            </tr>
            <tr>
              <td align="left" valign="top" ><table width="100%" border="0" cellpadding="1" cellspacing="2">
                <tr>
                  <td width="31%" align="left"><label>
                    <input name="s3_1100" type="text" id="s3_1100" onkeypress="return numeros12(event)" onkeyup="return otros(this.name,'s3_1100e','1')" value="<?php echo $s3_1100; ?>" size="3" maxlength="1"/>
                  </label></td>
                  <td width="69%" align="left"><span class="letra_frm">Especifique</span>
                    <input name="s3_1100e" type="text" id="s3_1100e" onkeypress="return letras(event)" value="<?php echo $s3_1100e; ?>" size="20" maxlength="100" readonly="readonly"/></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="29" align="left"><p><strong><strong>
        <input name="frm3" type="hidden" id="frm3" value="1" />
      </strong></strong></p></td>
    </tr>
    <tr>
      <td height="29" align="left"><?php if($id3==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  seccion3()"/>
        <strong><strong>
        <input name="opc3" type="hidden" id="opc3" value="1" />
        <?php
			 }
			 else
			 {
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return seccion3()" />
        <strong><strong>
        <input name="opc3" type="hidden" id="opc3" value="2" />
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

<?php
}
else
{
echo '<center><span class="advertencia" align="center"> Pase a la siguiente ya que el tipo de personeria que ingresó es jurídica</span></center>';
}
 ?>
</body>
</html>