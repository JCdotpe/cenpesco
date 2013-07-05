<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="S4_1_CCPP_COD" id="S4_1_CCPP_COD" onchange="'."carga_rPoblado()".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  marco_pesca WHERE SUBSTR(ccpp,1,2)='".$coddep."' AND SUBSTR(ccpp,3,2)='".$codprov."'  AND SUBSTR(ccpp,5,2)='".$coddis."'");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($S2_9_CCPP_COD==substr($row[3],6,4)) {  echo '<option value="'.substr($row[6],4,4).'" selected="selected">'.utf8_decode($row[7]).'</option>'; } else
                    { echo'<option value="'.substr($row[3],6,4).'">'.utf8_decode($row[7]).'</option>';  }
					
					 } 
             echo '</select>';


?>
