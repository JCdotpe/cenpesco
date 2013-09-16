<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="s2_10_di_cod" id="s2_10_di_cod" onchange="'."carga_rCepo1('".$coddis."')".'"  class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  marco WHERE CCPP ='".$codprov."' AND CCDD='".$coddep."' GROUP BY CCDI ORDER BY DISTRITO ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($s2_10_di_cod==$row['CCDI']) {  echo '<option value="'.$row['CCDI'].'" selected="selected">'.utf8_encode($row['DISTRITO']).'</option>'; } else
                    { echo'<option value="'.$row['CCDI'].'">'.utf8_encode($row['DISTRITO']).'</option>';  }
					
					 }
             echo '</select>';


?>
