<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="COD_CCPP" id="COD_CCPP" onchange="'."carga_rPoblado()".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$codprov."' AND CCDI='".$coddis."' AND CCDD='".$coddep."' GROUP BY cod_ccpp ORDER BY centro_poblado ASC");
				   while ($row = mysql_fetch_row($result)){

                     
                        if ($COD_CCPP==$row[8]) {  echo '<option value="'.$row[8].'" selected="selected">'.$row[7].'</option>'; } else
                    { echo'<option value="'.$row[8].'">'.$row[7].'</option>';  }
					
					 }
             echo '</select>';

?>
