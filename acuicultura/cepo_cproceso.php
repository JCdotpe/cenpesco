<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="s4_1_ccpp_cod" id="s4_1_ccpp_cod" onchange="'."carga_rPoblado1()".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  marco WHERE CCPP ='".$codprov."' AND CCDI='".$coddis."' AND CCDD='".$coddep."' GROUP BY CODCCPP ORDER BY CENTRO_POBLADO  ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($s4_1_ccpp_cod==$row['CODCCPP']) {  echo '<option value="'.$row['CODCCPP'].'" selected="selected">'.utf8_encode($row['CENTRO_POBLADO']).'</option>'; } else
                    { echo'<option value="'.$row['CODCCPP'].'">'.utf8_encode($row['CENTRO_POBLADO']).'</option>';  }
					
					 }
             echo '</select>';
			 	

?>
