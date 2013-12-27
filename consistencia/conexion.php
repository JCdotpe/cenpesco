<?php 
class conexion
{
var $servidor;
var $usuario;
var $clave;
var $base_datos;
var $base_datos_p;

function enlazar($base_datos_p1)
{
// $servidor="mysql.dontemplates.com";
// $usuario="cenpesco";
// $clave="admin777";
$servidor="localhost";
$usuario="root";
$clave="";
$base_datos=$base_datos_p1;

mysql_connect($servidor,$usuario,$clave) or die("No hay servidor");
mysql_select_db("$base_datos") or die("No hay base de datos");
}
}

$conectar= new conexion;  	
$conectar->enlazar('cenpesco'); 


 ?>