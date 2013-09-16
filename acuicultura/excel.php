<?php 
$nnmm=date('dmHis');
header('Content-type: application/vnd.ms-excel') ; //Exporar a Excel 
header('Content-Disposition: attachment; filename=Reporte_'.$nnmm.'.xls'); //Exporar a Excel 
header('Cache-Control: max-age=0');
require("conexion.php"); 
$mysql="SELECT * FROM exportable";  
$query=mysql_query($mysql) or die ("No se puede hacer consulta");
 $queEmp = mysql_query($query); 
 $campos = mysql_num_fields($query) ;  

$i=0; //Exporar a Excel 
echo '<table border="1"><tr>';  
while($i<$campos){  
echo "<td><b>". mysql_field_name ($query, $i) ;  
echo "</b></td>";  
$i++;  
}  
echo "</tr>";  
while($row=mysql_fetch_array($query)){  
echo "<tr>";  
for($j=0; $j<$campos; $j++) {  

if(substr($row[$j],0,1)==0)
{ echo "<td>&nbsp;".$row[$j]."</td>";  }
 else
 { echo "<td>".$row[$j]."</td>";  }

}  
echo "</tr>";  
}  
echo "</table>";  
     

?>