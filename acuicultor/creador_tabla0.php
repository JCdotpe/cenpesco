
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

function crear($cadena)
{
        $tabla="CREATE TABLE IF NOT EXISTS `acuicultor_4` (
                 ".$cadena."
                  `usuario` varchar(50) NOT NULL
                 
                )";
            
             $crear_tabla=mysql_query($tabla);
             if(!$crear_tabla){
                 echo 'Error al crear la table en la base de datos';
                 }else{
                     echo 'La tabla se creo correctamente';	
				 }
	echo $tabla;
}


$mysql="SELECT * FROM maqueta_formulario WHERE seccion='8' OR seccion='9' OR seccion='10'  OR seccion='0' ";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script='';
 while ($row = mysql_fetch_array($r))
 {
 $c=$c+1;
$variable= $row[5];

 $script=$script."'$".$variable."', ";
 


 }
 echo $script;
 echo '<br>';
 echo $c;
 
?>