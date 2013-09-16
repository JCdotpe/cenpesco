<?php  session_start();
error_reporting(E_ALL ^ E_NOTICE);
$user1=$_SESSION['user_id'];
$cod_sede=$_SESSION['user_ubigeo'];

//$cod_sede='09';
date_default_timezone_set('Etc/GMT+5');
$ff_rr1=date('Y-m-d H:i:s');
//echo $_SESSION['user_id'].'<br/>';
//echo $_SESSION['user_ubigeo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php

include("conexion.php");
if($_SESSION['id1']!=NULL)
{ 
$mysql="SELECT * FROM acu_seccion1 WHERE id1='".$_SESSION['id1']."'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");

while ($row = mysql_fetch_array($r))
{	

$nform=$row['nform'];
$ccdd=$row['ccdd'];
$nom_dd=$row['nom_dd'];
$ccpp=$row['ccpp'];
$nom_pp=$row['nom_pp'];
$ccdi=$row['ccdi'];
$nom_di=$row['nom_di'];
$cod_ccpp=$row['cod_ccpp'];
$nom_ccpp=$row['nom_ccpp'];
$ff_rr1=$row['ff_rr1'];
$tac=$row['tac'];

}

}

//llenamos ubigeos
function provincia($cd,$cp)
{
	

$result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$cp."' AND CCDD='".$cd."' GROUP BY CCPP ORDER BY PROVINCIA ASC");
while ($row = mysql_fetch_array($result))
{	
if ($cp==$row['CCPP']) 
{  
echo '<option value="'.$row['CCPP'].'" selected="selected">'.utf8_encode($row['PROVINCIA']).'</option>'; 
}

else

 { echo'<option value="'.$row['CCPP'].'">'.utf8_encode($row['PROVINCIA']).'</option>';  }

	
}



}

//distritos
function distrito($cd,$cp,$ccdi)
{
	
$result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$cp."' AND CCDD='".$cd."' AND CCDI='".$ccdi."' GROUP BY CCDI ORDER BY DISTRITO ASC");
while ($row = mysql_fetch_array($result))
{	
if ($ccdi==$row['CCDI']) 
{  
echo '<option value="'.$row['CCDI'].'" selected="selected">'.utf8_encode($row['DISTRITO']).'</option>'; 
}

else

 { echo'<option value="'.$row['CCDI'].'">'.utf8_encode($row['DISTRITO']).'</option>';  }

	
}

}

//distritos
function centro_pob($cd,$cp,$ccdi,$cod_ccpp)
{
	
$result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$cp."' AND CCDD='".$cd."' AND CCDI='".$ccdi."' AND COD_CCPP='".$cod_ccpp."' GROUP BY cod_ccpp ORDER BY CENTRO_POBLADO ASC");
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


/////consulta de formularios.....
function cantidad($cd,$cp,$ccdi,$cod_ccpp)
{
$result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$cp."' AND CCDD='".$cd."' AND CCDI='".$ccdi."' AND COD_CCPP='".$cod_ccpp."'");
if ($row = mysql_fetch_array($result))
{	
$frm_asig=$row['FORMULARIOS'];
if($frm_asig==1) { $ff1='formulario'; } else {  $ff1='formularios';  }
}

$result = mysql_query("SELECT COUNT(id1) FROM  acu_seccion1 WHERE ccpp ='".$cp."' AND ccdd='".$cd."' AND ccdi='".$ccdi."' AND cod_ccpp='".$cod_ccpp."'");
if ($row = mysql_fetch_row($result))
{	
$frm_reg=$row[0];
if($frm_reg==1) { $ff2='formulario'; } else {  $ff2='formularios';  }
}
$rest=$frm_asig-$frm_reg;
if($frm_asig==0 and $frm_reg==0) 
{ $mm=''; } 
else 
{     
$mm='<tr><td align="center" bgcolor="#CCFFFF" class="texto" style="border:thin;border: 1px solid #000">Se han registrado '.$frm_reg.' '.$ff1.' en este punto de concentración y faltan registrar '.$rest.' '.$ff2.'</td></tr>';
}
return  $mm;
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
<script type="text/javascript" src="validacion_1.js"></script>



</head>


<body>

<form id="form1" name="form1" method="post" action="variables1.php" >
  <table width="960" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
      <td height="21" align="left" class="texto_mediano" ><strong>SECCIÓN I: LOCALIZACIÓN DEL PUNTO DE CONCENTRACIÓN</strong></td>
    </tr>
        <?php if($_SESSION['aviso']!='' or $_SESSION['aviso']!=NULL) { echo '<tr><td height="23" align="center" bgcolor="#CAEAFF" class="aviso" style="border:thin;border: 1px solid #000" >'.$_SESSION['aviso'].' </tr><tr>'; } ?></td>

      <td height="26" align="center" class="texto" >N° DE FORMULARIO
        <label>
          <input name="nform" type="text" id="nform" tabindex="1" onchange="rellenar(this,this.value)" onkeypress="return numeros(event)" value="<?php echo $nform; ?>" size="5" maxlength="5" <?php  if($_SESSION['id1']!=NULL) { ?>readonly="readonly"<?php } ?> />
        </label></td>
    </tr>
    <tr>
      <td width="467" align="left" class="texto_mediano" >A. UBICACIÓN GEOGRÁFICA </td>
    </tr>
    <tr>
      <td><table width="900" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="130" class="texto">1.DEPARTAMENTO</td>
          <td width="33"><input name="cd"  type="text" class="letra_frm" id="cd" value="<?php echo $ccdd; ?>" size="2" maxlength="2" readonly="readonly" /></td>
          <td width="248" align="left" class="texto"><span class="letra_frm">
            <select name="ccdd" class="texto" id="ccdd" onchange="cargaProv()" tabindex="2">
              <option>Seleccionar</option>
              <?php
				  if($cod_sede!='99')
				  {
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE SEDE_COD='".$cod_sede."' GROUP BY CCDD ORDER BY DEPARTAMENTO ASC");
				  }
				   else
				   {
					$result = mysql_query("SELECT * FROM  udra_acuicultor  GROUP BY CCDD ORDER BY DEPARTAMENTO ASC");   
				   }
				   while ($row = mysql_fetch_array($result))
				   
				   {

                     
                        if ($ccdd==$row['CCDD']) 
						{  echo '<option value="'.$row['CCDD'].'" selected="selected">'.utf8_encode($row['DEPARTAMENTO']).'</option>'; } 
						else
                         { echo'<option value="'.$row['CCDD'].'">'.utf8_encode($row['DEPARTAMENTO']).'</option>';  }
					
					 }
				  
				  ?>
            </select>
            <strong><strong>
              <input name="nom_dd" type="hidden" id="nom_dd" value="" />
            </strong></strong></span></td>
          <td width="128" align="left"><span class="texto">2. PROVINCIA</span></td>
          <td width="36"><span class="letra_frm">
            <input name="cp" type="text" class="letra_frm" id="cp" value="<?php echo $ccpp; ?>" size="3" maxlength="3" readonly="readonly" />
          </span></td>
          <td width="306" align="left"><div id="ver_provincia" >
            <label>
            <select name="ccpp" class="letra_frm" id="ccpp" tabindex="3"> 
			<?php  provincia($ccdd,$ccpp);  ?>
           </select>
             
           
            </label>
            <strong><span class="letra_frm">
              <input name="nom_pp" type="hidden" id="nom_pp" value="" />
            </span></strong></div></td>
        </tr>
        <tr>
          <td align="left" class="texto">3. DISTRITO</td>
          <td><span class="letra_frm">
            <input name="cdis" type="text" class="letra_frm" id="cdis" value="<?php echo $ccdi; ?>" size="2" maxlength="2" readonly="readonly" />
          </span></td>
          <td align="left" class="texto"><div id="ver_distrito" >
            <label>
            <select name="ccdi" class="letra_frm" id="ccdi">
                <?php  distrito($ccdd,$ccpp,$ccdi);  ?>
              </select>
            </label>
            <input name="nom_di" type="hidden" id="nom_di" value="" />
          </div></td>
          <td align="left"><span class="texto">4 CENTRO POBLADO</span></td>
          <td align="left"><span class="letra_frm">
            <input name="cep" type="text" class="letra_frm" id="cep" value="<?php echo $cod_ccpp; ?>" size="4" maxlength="4" readonly="readonly" />
          </span></td>
          <td align="left"><div id="ver_cepo" >
            <label>
              <select name="cod_ccpp" class="letra_frm" id="cod_ccpp">
               <?php  centro_pob($ccdd,$ccpp,$ccdi,$cod_ccpp);  ?>
              </select>
            </label>
            <input name="nom_ccpp" type="hidden" id="nom_ccpp" value="" />
          </div></td>
        </tr>
      </table></td>
    </tr >
      <tr >
      <td height="26" align="left" class="texto">TIPO DE ACTIVIDAD&nbsp;&nbsp;
      <div id="vista_s2">
      <input name="tac" type="text" id="tac" onkeypress="return numeros13a(event)" value="<?php echo $tac; ?>" size="5" maxlength="1"/>
      </div>
      <strong><strong>
      <input name="frm" type="hidden" id="frm" value="1" />
      <strong>
      <input name="ff_rr1" type="hidden" id="ff_rr1" value="<?php  echo $ff_rr1; ?>" />
      </strong></strong></strong></td>
    </tr>
 <?php echo cantidad($ccdd,$ccpp,$ccdi,$cod_ccpp); ?>
    <tr>
      <td height="29" align="left">
      <div id="vista_s1">
       <?php if($_SESSION['id1']==NULL)
             { 
		?>
        <input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  frm_s1()"/>
       
        <input name="opc" type="hidden" id="opc" value="1" />
        <?php
			 }
			 else
			 {
		?>
       <input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return  frm_s1()" />
        <strong><strong>
        <input name="opc" type="hidden" id="opc" value="2" />      
        
        <?php
		 }
		 ?>
    </div> </td>
    </tr>
     </table>
</form>

  

    
    
</body>
</html>