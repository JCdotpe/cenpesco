<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="ccdi" id="ccdi" onchange="'."carga_cepo('".$coddis."')".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$codprov."' AND CCDD='".$coddep."' GROUP BY ccdi ORDER BY distrito ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($ccdi==$row['CCDI']) {  echo '<option value="'.$row['CCDI'].'" selected="selected">'.utf8_encode($row['DISTRITO']).'</option>'; } else
                    { echo'<option value="'.$row['CCDI'].'">'.utf8_encode($row['DISTRITO']).'</option>';  }
					
					 }
             echo '</select>';
			 echo '<input name="nom_di" type="hidden"  id="nom_di" />';

?>
