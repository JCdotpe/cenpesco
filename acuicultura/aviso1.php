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
echo '<input name="tac" type="text" id="tac" onkeypress="return numeros13a(event)" value="'.$tac.'" size="5" maxlength="1"/>';
}
if($bandera==0)
{
echo '<input name="tac" type="text" id="tac" onkeypress="return numeros13a(event)" value="'.$tac.'" size="5" maxlength="1"/>';	
}


}

if( $_SESSION['id1']!=NULL)
{
echo '<input name="tac" type="text" id="tac" onkeypress="return numeros13a(event)" value="'.$tac.'" size="5" maxlength="1"/>';		
}

?>


