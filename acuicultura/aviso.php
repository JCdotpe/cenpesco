<?php
session_start();
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);
$codcp=trim($_GET['codcp']);
$nform=trim($_GET['nform']);
$bandera=0;
$mensaje1="";


$result = mysql_query("SELECT * FROM  acu_seccion1 WHERE nform ='".$nform."' AND ccdd='".$coddep."' AND ccpp='".$codprov."' AND ccdi='".$coddis."' AND cod_ccpp='".$codcp."'");

while ($row = mysql_fetch_array($result))

{
 
 $bandera=1;
 $ide1=$row['id1'];
 $tac=$row['tac'];
 $mensaje1="Esta ficha ya existe, si desea puede modificarlo";
 $ff_rr1=$row['ff_rr1'];
}


if( $_SESSION['id1']==NULL)
{
if($bandera==1)
{ 
echo '<input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return  frm_s1()" />
        <strong><strong>
        <input name="opc" type="hidden" id="opc" value="2" /><input name="ide1" type="hidden" id="ide1" value="'.$ide1.'" />';	
		
}
else
{
echo '<input name="button" type="submit" class="texto_mediano" id="button" value=" Guardar  "   onclick="return  frm_s1()"/>
        <strong><strong>
        <input name="opc" type="hidden" id="opc" value="1" />';
}


}

if( $_SESSION['id1']!=NULL)
{
echo '<input name="button" type="submit" class="texto_mediano" id="button" value=" Modificar  " onclick="return  frm_s1()" />
        <strong><strong>
        <input name="opc" type="hidden" id="opc" value="2" />';		
}
?>


