<?php  session_start(); 
include("conexion.php");

@$ID=$_SESSION["ide"];
@$S3_900E_COD=strtoupper($_POST['S3_900E_COD']);
@$S4_1_DD=strtoupper($_POST['S4_1_DD']);
@$S4_1_DD_COD=strtoupper($_POST['S4_1_DD_COD']);
@$S4_1_PP=strtoupper($_POST['S4_1_PP']);
@$S4_1_PP_COD=strtoupper($_POST['S4_1_PP_COD']);
@$S4_1_DI=strtoupper($_POST['S4_1_DI']);
@$S4_1_DI_COD=strtoupper($_POST['S4_1_DI_COD']);
@$S4_1_CCPP=strtoupper($_POST['S4_1_CCPP']);
@$S4_1_CCPP_COD=strtoupper($_POST['S4_1_CCPP_COD']);
@$S4_TIPVIA=strtoupper($_POST['S4_TIPVIA']);
@$S4_NOMVIA=strtoupper($_POST['S4_NOMVIA']);
@$S4_PTANUM=strtoupper($_POST['S4_PTANUM']);
@$S4_BLOCK=strtoupper($_POST['S4_BLOCK']);
@$S4_INT=strtoupper($_POST['S4_INT']);
@$S4_PISO=strtoupper($_POST['S4_PISO']);
@$S4_MZ=strtoupper($_POST['S4_MZ']);
@$S4_LOTE=strtoupper($_POST['S4_LOTE']);
@$S4_KM=strtoupper($_POST['S4_KM']);
@$S4_REF=strtoupper($_POST['S4_REF']);
@$S4_2=strtoupper($_POST['S4_2']);
@$S4_2_1=strtoupper($_POST['S4_2_1']);
@$S5_1=strtoupper($_POST['S5_1']);
@$S5_1_O=strtoupper($_POST['S5_1_O']);
@$S5_1A=strtoupper($_POST['S5_1A']);
@$S5_2=strtoupper($_POST['S5_2']);
@$S5_2_O=strtoupper($_POST['S5_2_O']);
@$S5_2_1=strtoupper($_POST['S5_2_1']);
@$S5_3_1=strtoupper($_POST['S5_3_1']);
@$S5_3_1_1=strtoupper($_POST['S5_3_1_1']);
@$S5_3_2=strtoupper($_POST['S5_3_2']);
@$S5_3_2_1=strtoupper($_POST['S5_3_2_1']);
@$S5_3_3=strtoupper($_POST['S5_3_3']);
@$S5_3_3_1=strtoupper($_POST['S5_3_3_1']);
@$S5_3_4=strtoupper($_POST['S5_3_4']);
@$S5_3_4_1=strtoupper($_POST['S5_3_4_1']);
@$S5_3_5=strtoupper($_POST['S5_3_5']);
@$S5_3_5_1=strtoupper($_POST['S5_3_5_1']);
@$S5_3_6=strtoupper($_POST['S5_3_6']);
@$S5_3_6_1=strtoupper($_POST['S5_3_6_1']);
@$S5_3_7=strtoupper($_POST['S5_3_7']);
@$S5_3_7_1=strtoupper($_POST['S5_3_7_1']);
@$S5_3_8=strtoupper($_POST['S5_3_8']);
@$S5_3_8_1=strtoupper($_POST['S5_3_8_1']);
@$S5_3_9=strtoupper($_POST['S5_3_9']);
@$S5_3_9_O=strtoupper($_POST['S5_3_9_O']);
@$S5_3_9_1=strtoupper($_POST['S5_3_9_1']);
@$S5_4_1=strtoupper($_POST['S5_4_1']);
@$S5_4_2=strtoupper($_POST['S5_4_2']);
@$S5_4_3=strtoupper($_POST['S5_4_3']);
@$S5_4_4=strtoupper($_POST['S5_4_4']);
@$S5_4_5=strtoupper($_POST['S5_4_5']);
@$S5_4_6=strtoupper($_POST['S5_4_6']);
@$S5_4_7=strtoupper($_POST['S5_4_7']);
@$S5_4_8=strtoupper($_POST['S5_4_8']);
@$S5_4_9=strtoupper($_POST['S5_4_9']);
@$S5_4_10=strtoupper($_POST['S5_4_10']);
@$S5_4_11=strtoupper($_POST['S5_4_11']);
@$S5_4_12=strtoupper($_POST['S5_4_12']);
@$S5_4_12_O=strtoupper($_POST['S5_4_12_O']);
@$S5_4_13=strtoupper($_POST['S5_4_13']);
@$S5_4_13_O=strtoupper($_POST['S5_4_13_O']);
@$S5_5_1=strtoupper($_POST['S5_5_1']);
@$S5_5_2=strtoupper($_POST['S5_5_2']);
@$S5_5_3=strtoupper($_POST['S5_5_3']);
@$S5_5_4=strtoupper($_POST['S5_5_4']);
@$S5_5_5=strtoupper($_POST['S5_5_5']);
@$S5_5_6=strtoupper($_POST['S5_5_6']);
@$S5_5_6_O=strtoupper($_POST['S5_5_6_O']);
@$S5_6_1=strtoupper($_POST['S5_6_1']);
@$S5_6_2=strtoupper($_POST['S5_6_2']);
@$S5_6_3=strtoupper($_POST['S5_6_3']);
@$S5_6_4=strtoupper($_POST['S5_6_4']);
@$S5_6_5=strtoupper($_POST['S5_6_5']);
@$S5_6_6=strtoupper($_POST['S5_6_6']);
@$S5_6_7=strtoupper($_POST['S5_6_7']);
@$S5_6_8=strtoupper($_POST['S5_6_8']);
@$S5_6_9=strtoupper($_POST['S5_6_9']);
@$S5_6_9_O=strtoupper($_POST['S5_6_9_O']);
@$S5_7_1=strtoupper($_POST['S5_7_1']);
@$S5_7_2=strtoupper($_POST['S5_7_2']);
@$S5_7_3=strtoupper($_POST['S5_7_3']);
@$S5_7_4=strtoupper($_POST['S5_7_4']);
@$S5_7_5=strtoupper($_POST['S5_7_5']);
@$S5_7_6=strtoupper($_POST['S5_7_6']);
@$S5_7_7=strtoupper($_POST['S5_7_7']);
@$S5_7_8=strtoupper($_POST['S5_7_8']);
@$S5_7_8_O=strtoupper($_POST['S5_7_8_O']);
@$S5_7_9=strtoupper($_POST['S5_7_9']);
@$S6_1_1=strtoupper($_POST['S6_1_1']);
@$S6_1_2=strtoupper($_POST['S6_1_2']);
@$S6_1_3=strtoupper($_POST['S6_1_3']);
@$S6_1_4=strtoupper($_POST['S6_1_4']);
@$S6_1_5=strtoupper($_POST['S6_1_5']);
@$S6_5_O=strtoupper($_POST['S6_5_O']);
@$S6_1_6=strtoupper($_POST['S6_1_6']);
@$S6_2_1=strtoupper($_POST['S6_2_1']);
@$S6_2_2=strtoupper($_POST['S6_2_2']);
@$S6_2_3=strtoupper($_POST['S6_2_3']);
@$S6_2_4=strtoupper($_POST['S6_2_4']);
@$S6_2_5=strtoupper($_POST['S6_2_5']);
@$S6_2_5_O=strtoupper($_POST['S6_2_5_O']);
@$S6_2_6=strtoupper($_POST['S6_2_6']);
@$S6_3=strtoupper($_POST['S6_3']);
@$S6_3_1=strtoupper($_POST['S6_3_1']);
@$S6_4_1=strtoupper($_POST['S6_4_1']);
@$S6_4_2=strtoupper($_POST['S6_4_2']);
@$S6_4_3=strtoupper($_POST['S6_4_3']);
@$S6_4_4=strtoupper($_POST['S6_4_4']);
@$S6_4_5=strtoupper($_POST['S6_4_5']);
@$S6_4_5_O=strtoupper($_POST['S6_4_5_O']);
@$S6_5=strtoupper($_POST['S6_5']);
@$S7_1=strtoupper($_POST['S7_1']);
@$S7_1_1=strtoupper($_POST['S7_1_1']);
@$S7_2=strtoupper($_POST['S7_2']);
@$S7_2_1=strtoupper($_POST['S7_2_1']);
@$S7_2_2=strtoupper($_POST['S7_2_2']);
@$S7_2_3=strtoupper($_POST['S7_2_3']);
@$S7_3=strtoupper($_POST['S7_3']);
@$S7_3_1=strtoupper($_POST['S7_3_1']);
@$USER=$_POST['USER'];
@$FORM=$_POST['FORM'];
//Para formaulario N° 01
if($FORM==1)
{
	
	
$sql="INSERT INTO `acuicultura_2` (`ID`, `S3_900E_COD`, `S4_1_DD`, `S4_1_DD_COD`, `S4_1_PP`, `S4_1_PP_COD`, `S4_1_DI`, `S4_1_DI_COD`, `S4_1_CCPP`, `S4_1_CCPP_COD`, `S4_TIPVIA`, `S4_NOMVIA`, `S4_PTANUM`, `S4_BLOCK`, `S4_INT`, `S4_PISO`, `S4_MZ`, `S4_LOTE`, `S4_KM`, `S4_REF`, `S4_2`, `S4_2_1`, `S5_1`, `S5_1_O`, `S5_1A`, `S5_2`, `S5_2_O`, `S5_2_1`, `S5_3_1`, `S5_3_1_1`, `S5_3_2`, `S5_3_2_1`, `S5_3_3`, `S5_3_3_1`, `S5_3_4`, `S5_3_4_1`, `S5_3_5`, `S5_3_5_1`, `S5_3_6`, `S5_3_6_1`, `S5_3_7`, `S5_3_7_1`, `S5_3_8`, `S5_3_8_1`, `S5_3_9`, `S5_3_9_O`, `S5_3_9_1`, `S5_4_1`, `S5_4_2`, `S5_4_3`, `S5_4_4`, `S5_4_5`, `S5_4_6`, `S5_4_7`, `S5_4_8`, `S5_4_9`, `S5_4_10`, `S5_4_11`, `S5_4_12`, `S5_4_12_O`, `S5_4_13`, `S5_4_13_O`, `S5_5_1`, `S5_5_2`, `S5_5_3`, `S5_5_4`, `S5_5_5`, `S5_5_6`, `S5_5_6_O`, `S5_6_1`, `S5_6_2`, `S5_6_3`, `S5_6_4`, `S5_6_5`, `S5_6_6`, `S5_6_7`, `S5_6_8`, `S5_6_9`, `S5_6_9_O`, `S5_7_1`, `S5_7_2`, `S5_7_3`, `S5_7_4`, `S5_7_5`, `S5_7_6`, `S5_7_7`, `S5_7_8`, `S5_7_8_O`, `S5_7_9`, `S6_1_1`, `S6_1_2`, `S6_1_3`, `S6_1_4`, `S6_1_5`, `S6_5_O`, `S6_1_6`, `S6_2_1`, `S6_2_2`, `S6_2_3`, `S6_2_4`, `S6_2_5`, `S6_2_5_O`, `S6_2_6`, `S6_3`, `S6_3_1`, `S6_4_1`, `S6_4_2`, `S6_4_3`, `S6_4_4`, `S6_4_5`, `S6_4_5_O`, `S6_5`, `S7_1`, `S7_1_1`, `S7_2`, `S7_2_1`, `S7_2_2`, `S7_2_3`, `S7_3`, `S7_3_1`, `USER`) VALUES 
('$ID', '$S3_900E_COD', '$S4_1_DD', '$S4_1_DD_COD', '$S4_1_PP', '$S4_1_PP_COD', '$S4_1_DI', '$S4_1_DI_COD', '$S4_1_CCPP', '$S4_1_CCPP_COD', '$S4_TIPVIA', '$S4_NOMVIA', '$S4_PTANUM', '$S4_BLOCK', '$S4_INT', '$S4_PISO', '$S4_MZ', '$S4_LOTE', '$S4_KM', '$S4_REF', '$S4_2', '$S4_2_1', '$S5_1', '$S5_1_O', '$S5_1A', '$S5_2', '$S5_2_O', '$S5_2_1', '$S5_3_1', '$S5_3_1_1', '$S5_3_2', '$S5_3_2_1', '$S5_3_3', '$S5_3_3_1', '$S5_3_4', '$S5_3_4_1', '$S5_3_5', '$S5_3_5_1', '$S5_3_6', '$S5_3_6_1', '$S5_3_7', '$S5_3_7_1', '$S5_3_8', '$S5_3_8_1', '$S5_3_9', '$S5_3_9_O', '$S5_3_9_1', '$S5_4_1', '$S5_4_2', '$S5_4_3', '$S5_4_4', '$S5_4_5', '$S5_4_6', '$S5_4_7', '$S5_4_8', '$S5_4_9', '$S5_4_10', '$S5_4_11', '$S5_4_12', '$S5_4_12_O', '$S5_4_13', '$S5_4_13_O', '$S5_5_1', '$S5_5_2', '$S5_5_3', '$S5_5_4', '$S5_5_5', '$S5_5_6', '$S5_5_6_O', '$S5_6_1', '$S5_6_2', '$S5_6_3', '$S5_6_4', '$S5_6_5', '$S5_6_6', '$S5_6_7', '$S5_6_8', '$S5_6_9', '$S5_6_9_O', '$S5_7_1', '$S5_7_2', '$S5_7_3', '$S5_7_4', '$S5_7_5', '$S5_7_6', '$S5_7_7', '$S5_7_8', '$S5_7_8_O', '$S5_7_9', '$S6_1_1', '$S6_1_2', '$S6_1_3', '$S6_1_4', '$S6_1_5', '$S6_5_O', '$S6_1_6', '$S6_2_1', '$S6_2_2', '$S6_2_3', '$S6_2_4', '$S6_2_5', '$S6_2_5_O', '$S6_2_6', '$S6_3', '$S6_3_1', '$S6_4_1', '$S6_4_2', '$S6_4_3', '$S6_4_4', '$S6_4_5', '$S6_4_5_O', '$S6_5', '$S7_1', '$S7_1_1', '$S7_2', '$S7_2_1', '$S7_2_2', '$S7_2_3', '$S7_3', '$S7_3_1', '$USER')";

$result = mysql_query($sql);


header("location:index2.php");
echo '<br><br><a href="index2.php">Haga click en este enlace para continuar con el registro</a>';
}
	
?>