<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$coddep=trim($_GET['coddep']);

echo '<select name="s2_12_pp_cod" id="s2_12_pp_cod" onchange="'."carga_vDis1('".$codprov."')".'" class="letra_frm"> 
<option value="" selected="selected">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  ccpp WHERE COD_DD ='".$coddep."' GROUP BY PROVINCIA ORDER BY PROVINCIA ASC");
				   while ($row = mysql_fetch_array($result)){

              if ($s2_12_pp_cod=$row['COD_PP']) {  echo '<option value="'.$row['COD_PP'].'" >'.utf8_encode($row['PROVINCIA']).'</option>'; } else
                    { echo'<option value="'.$row['COD_PP'].'">'.utf8_encode($row['PROVINCIA']).'</option>';  }
					
					 }
             echo '</select>';
			

?>
