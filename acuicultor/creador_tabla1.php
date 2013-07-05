
<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

function crear($cadena)
{
        $tabla="CREATE TABLE IF NOT EXISTS `acuicultura_1` (
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


$mysql="SELECT * FROM maqueta_formulario WHERE seccion='1' OR seccion='2' OR seccion='3'  OR seccion='0' ";  
$r=mysql_query($mysql) or die ("No se puede hacer consulta");
 $c=0;
 $script='';
 while ($row = mysql_fetch_array($r))
 {
 $c=$c+1;
$variable= $row[5];
$tipo=$row[8]; /// "NN" es numerico
$null=$row[13]; /// si y no  SN
$longitud=$row[9];

if($tipo=='NN') { $tipos=' int('; } else { $tipos=' varchar('; }
if($null=='S') { $nulo=' NOT NULL '; } else { $nulo=' NULL '; }

 $script=$script."`".$variable."` ".$tipos.$longitud.') '.$nulo.',';

 }
//crear($script);
 echo $c;
 
?>