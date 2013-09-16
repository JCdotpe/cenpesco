<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$coddep=trim($_GET['coddep']);

echo '<select name="ccpp" id="ccpp" onchange="'."cargaDis('".$codprov."')".'" class="letra_frm"> 
<option value="" selected="selected">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCDD ='".$coddep."' GROUP BY CCPP ORDER BY CCPP ASC");
				   while ($row = mysql_fetch_array($result)){

              if ($ccpp=$row['CCPP']) {  echo '<option value="'.$row['CCPP'].'" >'.utf8_encode($row['PROVINCIA']).'</option>'; } else
                    { echo'<option value="'.$row['CCPP'].'">'.utf8_encode($row['PROVINCIA']).'</option>';  }
					
					 }
             echo '</select>';
			echo '<input name="nom_pp" type="hidden"  id="nom_pp" />';

?>
