<?php
date_default_timezone_set('Etc/GMT+5');
$actual=strtotime(date("Y-m-d H:i:s"));
$pasado=strtotime("2013-06-18 15:55:00" ).'<br>';
echo( $actual-$pasado);
//echo $pasado;
?>