<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);
$ccpp=trim($_GET['ccpp']);
$nfrm=trim($_GET['nfrm']);
 
	
$result = mysql_query("SELECT count(nform) FROM  acuicultura_1 WHERE ccdd='".$coddep."' AND ccpp='".$codprov."'  AND ccdi='".$coddis."' AND cod_ccpp='".$ccpp."'");
				   while ($row = mysql_fetch_row($result))
				   
				   {
                                $total_f=$row[0];
								
				   }
	
	
				   
$result = mysql_query("SELECT * FROM  udra_acuicultor WHERE ccdd='".$coddep."' AND ccpp='".$codprov."'  AND ccdi='".$coddis."' AND cod_ccpp='".$ccpp."'");
				   while ($row = mysql_fetch_row($result))
				   
				   {
                                $total_u=$row[9];
								$cp=$row[7];
								
								
				   }



echo utf8_decode('<span class="aviso1"><strong>Centro Poblado: '.$cp.'</strong></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="aviso1"><strong>Cantidad de Formularios Registrados: '.$total_f.' &nbsp;</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="aviso1"><strong>Total: '.$total_u.'</strong></span>');

?>
