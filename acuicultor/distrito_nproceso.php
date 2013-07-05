<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="S2_10_DI_COD" id="S2_10_DI_COD" onchange="'."carga_nCepo()".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  marco_pesca WHERE SUBSTR(ccpp,1,2)='".$coddep."' AND SUBSTR(ccpp,3,2)='".$codprov."'  GROUP BY SUBSTR(ccpp,5,2)");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($S2_10_DI_COD==substr($row[3],4,2)) {  echo '<option value="'.substr($row[3],4,2).'" selected="selected">'.utf8_decode($row[6]).'</option>'; } else
                    { echo'<option value="'.substr($row[3],4,2).'">'.utf8_decode($row[6]).'</option>';  }
					
					 }
             echo '</select>';

?>
