<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$coddep=trim($_GET['coddep']);

echo '<select name="s2_10_pp_cod" id="s2_10_pp_cod" onchange="'."carga_rDis1('".$codprov."')".'" class="letra_frm"> 
<option value="" selected="selected">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  marco WHERE CCDD ='".$coddep."' GROUP BY CCPP ORDER BY PROVINCIA ASC");
				   while ($row = mysql_fetch_array($result)){

              if ($s2_10_pp_cod=$row['CCPP']) {  echo '<option value="'.$row['CCPP'].'" >'.utf8_encode($row['PROVINCIA']).'</option>'; } else
                    { echo'<option value="'.$row['CCPP'].'">'.utf8_encode($row['PROVINCIA']).'</option>';  }
					
					 }
             echo '</select>';
			

?>
