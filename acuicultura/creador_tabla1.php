
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

function crear($cadena)
{
        $tabla="CREATE TABLE IF NOT EXISTS `seccion10` (
                 ".$cadena."
                                 
                )";
            
             $crear_tabla=mysql_query($tabla);
             if(!$crear_tabla){
                 echo 'Error al crear la table en la base de datos';
                 }else{
                     echo 'La tabla se creo correctamente';	
				 }
	echo $tabla;
}


$mysql="SELECT * FROM generatriz WHERE seccion='10'";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script='';
 while ($row = mysql_fetch_array($r))
 {
 $c=$c+1;
$variable= $row['variable'];
$tipo=$row['tipo']; /// "NN" es numerico
$null=$row['omision']; /// si y no  SN
$longitud=$row['longitud'];

if($tipo=='N') { $tipos=' int('; } else { $tipos=' varchar('; }
if($null=='S') { $nulo=' NOT NULL '; } else { $nulo=' NULL '; }

 $script=$script."`".$variable."` ".$tipos.$longitud.') '.$nulo.',';

 }
crear($script);
 echo $c;
 
?>