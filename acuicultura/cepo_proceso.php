<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$codprov=trim($_GET['codprov']);
$coddep=trim($_GET['coddep']);
$coddis=trim($_GET['coddis']);

echo '<select name="cod_ccpp" id="cod_ccpp" onchange="'."carga_rPoblado()".'" class="letra_frm"> <option value="">Seleccionar</option>';
				   $result = mysql_query("SELECT * FROM  udra_acuicultor WHERE CCPP ='".$codprov."' AND CCDI='".$coddis."' AND CCDD='".$coddep."' GROUP BY cod_ccpp ORDER BY centro_poblado ASC");
				   while ($row = mysql_fetch_array($result)){

                     
                        if ($cod_ccpp==$row['COD_CCPP']) {  echo '<option value="'.$row['COD_CCPP'].'" selected="selected">'.utf8_encode($row['CENTRO_POBLADO']).'</option>'; } else
                    { echo'<option value="'.$row['COD_CCPP'].'">'.utf8_encode($row['CENTRO_POBLADO']).'</option>';  }
					
					 }
             echo '</select>';
			 	 echo '<input name="nom_ccpp" type="hidden"  id="nom_ccpp" />';

?>
