<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="s2_12_di_cod" id="s2_12_di_cod"  class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  ccpp WHERE COD_PP ='".$codprov."' AND COD_DD='".$coddep."' GROUP BY COD_DI ORDER BY DISTRITO ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($s2_12_di_cod==$row['COD_DI']) {  echo '<option value="'.$row['COD_DI'].'" selected="selected">'.utf8_encode($row['DISTRITO']).'</option>'; } else
                    { echo'<option value="'.$row['COD_DI'].'">'.utf8_encode($row['DISTRITO']).'</option>';  }
					
					 }
             echo '</select>';


?>
