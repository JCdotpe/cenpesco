<?php
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
include("variables_1.php");

$USER='1';
//Para formaulario N° 01
if($formulario==1)
{
	
	
$sql="INSERT INTO `acuicultura_1` (`NFORM`, `CCDD`, `NOM_DD`, `CCPP`, `NOM_PP`, `CCDI`, `NOM_DI`, `COD_CCPP`, `NOM_CCPP`, `S2_1_AP`, `S2_1_AM`, `S2_1_NOM`, `S2_2D`, `S2_2M`, `S2_2A`, `S2_3`, `S2_4`, `S2_5`, `S2_6`, `S2_7`, `S2_8`, `S2_9_DD`, `S2_9_DD_COD`, `S2_9_PP`, `S2_9_PP_COD`, `S2_9_DI`, `S2_9_DI_COD`, `S2_9_CCPP`, `S2_9_CCPP_COD`, `TIPVIA`, `NOMVIA`, `PTANUM`, `BLOCK`, `INT`, `PISO`, `MZ`, `LOTE`, `KM`, `S2_10_DD`, `S2_10_DD_COD`, `S2_10_PP`, `S2_10_PP_COD`, `S2_10_DI`, `S2_10_DI_COD`, `S2_11_DD`, `S2_11_DD_COD`, `S2_11_PP`, `S2_11_PP_COD`, `S2_11_DI`, `S2_11_DI_COD`, `S2_12`, `S2_12G`, `S2_12A`, `S2_13`, `S2_14`, `S2_14_O`, `S2_15_1`, `S2_15_2`, `S2_15_3`, `S2_15_4`, `S2_15_4_O`, `S2_16`, `S2_17`, `S2_18`, `S2_18G`, `S2_18A`, `S2_19`, `S2_19_1`, `S2_19_2`, `S2_19_3`, `S2_19_4`, `S2_19_5`, `S2_19_5_O`, `S2_20`, `S2_21`, `S2_22_1_1`, `S2_22_2_1`, `S2_22_3_1`, `S2_22_4_1`, `S2_22_5_1`, `S2_22_6_1`, `S2_22_7_1`, `S2_22_8_1`, `S2_22_9_1`, `S2_22_1_2`, `S2_22_2_2`, `S2_22_3_2`, `S2_22_4_2`, `S2_22_5_2`, `S2_22_6_2`, `S2_22_7_2`, `S2_22_8_2`, `S2_22_9_2`, `S2_22_1_3`, `S2_22_2_3`, `S2_22_3_3`, `S2_22_4_3`, `S2_22_5_3`, `S2_22_6_3`, `S2_22_7_3`, `S2_22_8_3`, `S2_22_9_3`, `S2_22_1_4`, `S2_22_2_4`, `S2_22_3_4`, `S2_22_4_4`, `S2_22_5_4`, `S2_22_6_4`, `S2_22_7_4`, `S2_22_8_4`, `S2_22_9_4`, `S2_22_1_5`, `S2_22_2_5`, `S2_22_3_5`, `S2_22_4_5`, `S2_22_5_5`, `S2_22_6_5`, `S2_22_7_5`, `S2_22_8_5`, `S2_22_9_5`, `S2_22_1_6`, `S2_22_2_6`, `S2_22_3_6`, `S2_22_4_6`, `S2_22_5_6`, `S2_22_6_6`, `S2_22_7_6`, `S2_22_8_6`, `S2_22_9_6`, `S2_22_1_7`, `S2_22_2_7`, `S2_22_3_7`, `S2_22_4_7`, `S2_22_5_7`, `S2_22_6_7`, `S2_22_7_7`, `S2_22_8_7`, `S2_22_9_7`, `S2_22_1_8`, `S2_22_2_8`, `S2_22_3_8`, `S2_22_4_8`, `S2_22_5_8`, `S2_22_6_8`, `S2_22_7_8`, `S2_22_8_8`, `S2_22_9_8`, `S2_22_1_9`, `S2_22_2_9`, `S2_22_3_9`, `S2_22_4_9`, `S2_22_5_9`, `S2_22_6_9`, `S2_22_7_9`, `S2_22_8_9`, `S2_22_9_9`, `S2_22_1_10`, `S2_22_2_10`, `S2_22_3_10`, `S2_22_4_10`, `S2_22_5_10`, `S2_22_6_10`, `S2_22_7_10`, `S2_22_8_10`, `S2_22_9_10`, `S3_100`, `S3_100_O`, `S3_200`, `S3_200_O`, `S3_300`, `S3_300_O`, `S3_300A`, `S3_300A_O`, `S3_400`, `S3_400_O`, `S3_500`, `S3_500A`, `S3_500B`, `S3_500C`, `S3_600`, `S3_701`, `S3_702`, `S3_703`, `S3_704`, `S3_705`, `S3_706`, `S3_707`, `S3_708`, `S3_709`, `S3_710`, `S3_711`, `S3_801`, `S3_802`, `S3_803`, `S3_804`, `S3_805`, `S3_900`, `S3_900E`, `USER`) VALUES 
(69, '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', 2, '2', 2, 2, 2, '2', '2', '2', '2', '2', '2', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

$result = mysql_query($sql);
}
	
?>