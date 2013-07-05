<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="CCDI" id="CCDI" onchange="'."carga_cepo('".$coddis."')".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$codprov."' AND CCDD='".$coddep."' GROUP BY ccdi ORDER BY distrito ASC");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($CCDI==$row[6]) {  echo '<option value="'.$row[6].'" selected="selected">'.$row[5].'</option>'; } else
                    { echo'<option value="'.$row[6].'">'.$row[5].'</option>';  }
					
					 }
             echo '</select>';

?>
