<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Etc/GMT+5');
include("conexion.php");
date_default_timezone_set('Etc/GMT+5');
$id7=($_SESSION['id1']=='')?'NULL':'\''.$_SESSION['id1'].'\'';
$s7_1=($_POST['s7_1']=='')?'NULL':'\''.$_POST['s7_1'].'\'';
$s7_1_t=($_POST['s7_1_t']=='')?'NULL':'\''.$_POST['s7_1_t'].'\'';
$s7_1_h=($_POST['s7_1_h']=='')?'NULL':'\''.$_POST['s7_1_h'].'\'';
$s7_1_m=($_POST['s7_1_m']=='')?'NULL':'\''.$_POST['s7_1_m'].'\'';
$s7_1_t_p=($_POST['s7_1_t_p']=='')?'NULL':'\''.$_POST['s7_1_t_p'].'\'';
$s7_1_h_p=($_POST['s7_1_h_p']=='')?'NULL':'\''.$_POST['s7_1_h_p'].'\'';
$s7_1_m_p=($_POST['s7_1_m_p']=='')?'NULL':'\''.$_POST['s7_1_m_p'].'\'';
$s7_1_r_p=($_POST['s7_1_r_p']=='')?'NULL':'\''.$_POST['s7_1_r_p'].'\'';
$s7_1_t_e=($_POST['s7_1_t_e']=='')?'NULL':'\''.$_POST['s7_1_t_e'].'\'';
$s7_1_h_e=($_POST['s7_1_h_e']=='')?'NULL':'\''.$_POST['s7_1_h_e'].'\'';
$s7_1_m_e=($_POST['s7_1_m_e']=='')?'NULL':'\''.$_POST['s7_1_m_e'].'\'';
$s7_1_r_e=($_POST['s7_1_r_e']=='')?'NULL':'\''.$_POST['s7_1_r_e'].'\'';
$s7_2=($_POST['s7_2']=='')?'NULL':'\''.$_POST['s7_2'].'\'';
$s7_3=($_POST['s7_3']=='')?'NULL':'\''.$_POST['s7_3'].'\'';
$s7_3_c=($_POST['s7_3_c']=='')?'NULL':'\''.$_POST['s7_3_c'].'\'';
$s7_4=($_POST['s7_4']=='')?'NULL':'\''.$_POST['s7_4'].'\'';
$s7_4_c=($_POST['s7_4_c']=='')?'NULL':'\''.$_POST['s7_4_c'].'\'';

$ff_rr7=date('Y-m-d H:i:s');
$ff_rr7=($ff_rr7=='')?'NULL':'\''.$ff_rr7.'\'';
$user7=($_SESSION['user_id']=='')?'NULL':'\''.$_SESSION['user_id'].'\'';

$frm7=$_POST['frm7'];
$opc7=$_POST['opc7'];
$opc=$_POST['opc'];

if($frm7==1 and $opc7==1)
{
$sql=sprintf("INSERT INTO acu_seccion7 (`id7`,`s7_1`,`s7_1_t`,`s7_1_h`,`s7_1_m`,`s7_1_t_p`,`s7_1_h_p`,`s7_1_m_p`,`s7_1_r_p`,`s7_1_t_e`,`s7_1_h_e`,`s7_1_m_e`,`s7_1_r_e`,`s7_2`,`s7_3`,`s7_3_c`,`s7_4`,`s7_4_c`,`ff_rr7`,`user7`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",$id7,$s7_1,$s7_1_t,$s7_1_h,$s7_1_m,$s7_1_t_p,$s7_1_h_p,$s7_1_m_p,$s7_1_r_p,$s7_1_t_e,$s7_1_h_e,$s7_1_m_e,$s7_1_r_e,$s7_2,$s7_3,$s7_3_c,$s7_4,$s7_4_c,$ff_rr7,$user7); 
	
$result = mysql_query($sql);
echo mysql_error ();
$_SESSION['aviso']=utf8_encode("La Sección VII ha sido guardada");

$formulario=1;

}

///actualizar datos
if($frm7==1 and $opc7==2)
{
$sql= "UPDATE acu_seccion7 SET s7_1=".sprintf("%s",$s7_1).", s7_1_t=".sprintf("%s",$s7_1_t).", s7_1_h=".sprintf("%s",$s7_1_h).", s7_1_m=".sprintf("%s",$s7_1_m).", s7_1_t_p=".sprintf("%s",$s7_1_t_p).", s7_1_h_p=".sprintf("%s",$s7_1_h_p).", s7_1_m_p=".sprintf("%s",$s7_1_m_p).", s7_1_r_p=".sprintf("%s",$s7_1_r_p).", s7_1_t_e=".sprintf("%s",$s7_1_t_e).", s7_1_h_e=".sprintf("%s",$s7_1_h_e).", s7_1_m_e=".sprintf("%s",$s7_1_m_e).", s7_1_r_e=".sprintf("%s",$s7_1_r_e).", s7_2=".sprintf("%s",$s7_2).", s7_3=".sprintf("%s",$s7_3).", s7_3_c=".sprintf("%s",$s7_3_c).", s7_4=".sprintf("%s",$s7_4).", s7_4_c=".sprintf("%s",$s7_4_c). ", ff_rr7=".sprintf("%s",$ff_rr7). ", user7=".sprintf("%s",$user7)." WHERE id7='".$_SESSION['id1']."'";

$result = mysql_query($sql);
echo mysql_error ();	
$_SESSION['aviso']=utf8_encode("La Sección VII ha sido modificada");
$formulario=1;	
}



// validar  un nuevo registro
if($opc==3)
{ 
$_SESSION['id1']=NULL;
$_SESSION['aviso']="Listo para ingresar un nuevo formulario";

}

if($formulario==1)
{
header("location:index.php#indizador");
}

?>