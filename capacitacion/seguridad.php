<?php
ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 
session_start();
session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); 
if ( $_SESSION["autenticado"]!="1" )  
{ header("location:index.php");
exit();
}

?>