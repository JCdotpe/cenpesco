<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$coddep=trim($_GET['coddep']);

echo '<select name="S2_9_PP_COD" id="S2_9_PP_COD" onchange="'."carga_rDis('".$codprov."')".'" class="letra_frm"> <option value="">Seleccionar</option>';

				   $result = mysql_query("SELECT * FROM  marco_pesca WHERE SUBSTR(ccpp,1,2)='".$coddep."' GROUP BY SUBSTR(ccpp,3,2)");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($S2_9_PP_COD==substr($row[3],2,2)) {  echo '<option value="'.substr($row[3],2,2).'" selected="selected">'.$row[5].'</option>'; } else
                    { echo'<option value="'.substr($row[3],2,2).'">'.$row[5].'</option>';  }
					
					 }
             echo '</select>'; 

?>
