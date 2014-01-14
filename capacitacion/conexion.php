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
$servidor="unsmc001.mysql.guardedhost.com";
$usuario="unsmc001_cenpesc";
$clave="Inei2013az";

$base_datos=$base_datos_p1;

mysql_connect($servidor,$usuario,$clave) or die("No hay servidor");
mysql_select_db("$base_datos") or die("No hay base de datos");
}
}

$conectar= new conexion;
$conectar->enlazar('unsmc001_cenpesco');


 ?>
