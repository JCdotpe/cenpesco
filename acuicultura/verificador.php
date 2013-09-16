<?php

function verificador($llave)
{
$a1=0;
$a2=0;
$a3=0;
$a4=0;
$a5=0;
$a6=0;
$a7=0;
$a8=0;
$a9=0;
$a10=0;
$valor=0;
$result = mysql_query("SELECT * FROM  acu_seccion1 WHERE id1='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a1=1;	
}


$result = mysql_query("SELECT * FROM  acu_seccion2 WHERE id2='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a2=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion3 WHERE id3='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a3=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion4 WHERE id4='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a4=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion5 WHERE id5='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a5=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion6 WHERE id6='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a6=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion7 WHERE id7='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a7=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion8 WHERE id8='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a8=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion9 WHERE id9='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a9=1;	
}

$result = mysql_query("SELECT * FROM  acu_seccion10 WHERE id10='".$llave."'");
 while ($row = mysql_fetch_row($result))
{
$a10=1;	
}


if($id1==1 and $id2==1 and $id3==1 and $id4==1 and $id5==1 and $id6==1 and $id7==1 and $id8==1 and $id9==1 and $id10==1)
{
$valor=1;	
}
 return $valor;

}
?>