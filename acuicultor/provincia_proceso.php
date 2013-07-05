<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$coddep=trim($_GET['coddep']);

echo '<select name="CCPP" id="CCPP" onchange="'."cargaDis('".$codprov."')".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCDD ='".$coddep."' GROUP BY ccpp ORDER BY ccpp ASC");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($CCPP=$row[4]) {  echo '<option value="'.$row[4].'" selected="selected">'.$row[3].'</option>'; } else
                    { echo'<option value="'.$row[4].'">'.$row[3].'</option>';  }
					
					 }
             echo '</select>';

?>
