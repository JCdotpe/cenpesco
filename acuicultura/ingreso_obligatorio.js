//seccion 2

function  seccion2()
{

if( document.getElementById('s2_1_ap').value=='') { alert("Verique el campo Apellido paterno acuicultor"); document.getElementById('s2_1_ap').focus();  return false; }
if( document.getElementById('s2_1_am').value=='') { alert("Verique el campo Apellido materno acuicultor"); document.getElementById('s2_1_am').focus();  return false; }
if( document.getElementById('s2_1_nom').value=='') { alert("Verique el campo Nombres de acuicultor"); document.getElementById('s2_1_nom').focus();  return false; }

if( document.getElementById('s2_2').value=='') { alert("Verique el campo Persona Juridica"); document.getElementById('s2_2').focus;  return false; }
if( document.getElementById('s2_3d').value=='') { alert("Verique el campo Fecha de nacimiento - día"); document.getElementById('s2_3d').focus();  return false; } 
if( document.getElementById('s2_3m').value=='') { alert("Verique el campo Fecha de nacimiento - mes"); document.getElementById('s2_3m').focus();  return false; } 
if( document.getElementById('s2_3a').value=='') { alert("Verique el campo Fecha de nacimiento - año"); document.getElementById('s2_3a').focus();  return false; }
//if( document.getElementById('s2_4').value=='') { alert("Verique el campo Sexo"); document.getElementById('s2_4').focus(); return false; } 
if( document.getElementById('s2_5').value=='') { alert("Verique el campo Nº de DNI"); document.getElementById('s2_5').focus(); return false; } 



if( document.getElementById('s2_2').value!=2)
{
if( document.getElementById('tipvia').value=='') { alert("Verique el campo Tipo de vía"); document.getElementById('tipvia').focus();  return false; }
if( document.getElementById('nomvia').value=='') { alert("Verique el campo Nombre de la vía"); document.getElementById('nomvia').focus();  return false; }

if( document.getElementById('s2_14').value=='') { alert("Verique el campo ¿Usted considera la acuicultura como su ocupación:"); document.getElementById('s2_14').focus();  return false; } 
if( document.getElementById('s2_15_1').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? Agricola"); document.getElementById('s2_15_1').focus();  return false; } 
if( document.getElementById('s2_15_2').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? Pecuaria"); document.getElementById('s2_15_2').focus();  return false; } 
if( document.getElementById('s2_15_3').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? Pesca"); document.getElementById('s2_15_3').focus(); return false; } 
if( document.getElementById('s2_15_4').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? Caza"); document.getElementById('s2_15_4').focus();  return false; } 
if( document.getElementById('s2_15_5').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? Construccion"); document.getElementById('s2_15_5').focus();  return false; } 
if( document.getElementById('s2_15_6').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? Comercio"); document.getElementById('s2_15_6').focus;  return false; } 
if( document.getElementById('s2_15_7').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? otro"); document.getElementById('s2_15_7').focus;  return false; }
if( document.getElementById('s2_15_8').value=='') { alert("Verique el campo ¿A qué otra actividad se dedica? No tiene otra actividad"); document.getElementById('s2_15_8').focus();  return false; }
if( document.getElementById('s2_16').value=='') { alert("Verique el campo ¿Cuál es la razón por la que usted eligió ser acuicultor? "); document.getElementById('s2_16').focus();  return false; } 

if( document.getElementById('s2_17').value=='') { alert("Verique el campo ¿Cuántos años se dedica a la actividad de pesca?"); document.getElementById('s2_17').focus;  return false; } 
if( document.getElementById('s2_18_1').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: vaso de leche"); document.getElementById('s2_18_1').focus;  return false; } 
if( document.getElementById('s2_18_2').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: comedor popular"); document.getElementById('s2_18_2').focus;  return false; } 
if( document.getElementById('s2_18_3').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: desayuno o alimentacion"); document.getElementById('s2_18_3').focus;  return false; } 
if( document.getElementById('s2_18_4').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: seguro integral de salud"); document.getElementById('s2_18_4').focus;  return false; }
if( document.getElementById('s2_18_5').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: programa juntos"); document.getElementById('s2_18_5').focus;  return false; } 
if( document.getElementById('s2_18_6').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: probrama bono de gratitud"); document.getElementById('s2_18_6').focus;  return false; } 
if( document.getElementById('s2_18_7').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: cuna mas"); document.getElementById('s2_18_7').focus();  return false; } 
if( document.getElementById('s2_18_8').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: otro"); document.getElementById('s2_18_8').focus();  return false; }

if( document.getElementById('s2_18_9').value=='') { alert("Verique el campo En los ultimos 12 meses, se ha beneficiado ud. O algun miembro de su hogar con un programa social: NINGUNO"); document.getElementById('s2_18_9').focus();  return false; }

}
}

// seccion 3


function seccion3()
{
if( document.getElementById('s3_100').value=='') { alert("Verique el campo La vivienda que ocupa es:"); document.getElementById('s3_100').focus(); return false; } 

if( document.getElementById('s3_200').value=='') { alert("Verique el campo El material predominante en las paredes es:"); document.getElementById('s3_200').focus(); return false; } 

if( document.getElementById('s3_300').value=='') { alert("Verique el campo El material predominante en los pisos es:"); document.getElementById('s3_300').focus(); return false; } 

if( document.getElementById('s3_400').value=='') { alert("Verique el campo El material predominante en los techos"); document.getElementById('s3_400').focus(); return false; } 

if( document.getElementById('s3_500').value=='') { alert("Verique el campo El abastecimiento de agua procede de:"); document.getElementById('s3_500').focus(); return false; } 


if( document.getElementById('s3_700').value=='') { alert("Verique el campo El baño o servicio higiénico que tiene su vivienda, est conectado a:"); document.getElementById('s3_700').focus(); return false; } 
if( document.getElementById('s3_800').value=='') { alert("Verique el campo La vivienda tiene alumbrado eléctrico por red pública?"); document.getElementById('s3_800').focus(); return false; } 
if( document.getElementById('s3_901').value=='') { alert("Verique el campo Su vivienda cuenta con: Equipo de sonido"); document.getElementById('s3_901').focus(); return false; } 
if( document.getElementById('s3_902').value=='') { alert("Verique el campo Su vivienda cuenta con: Televisor a color"); document.getElementById('s3_902').focus(); return false; } 
if( document.getElementById('s3_903').value=='') { alert("Verique el campo Su vivienda cuenta con: DVD"); document.getElementById('s3_903').focus; return false; } 
if( document.getElementById('s3_904').value=='') { alert("Verique el campo Su vivienda cuenta con: Licuadora"); document.getElementById('s3_904').focus(); return false; } 
if( document.getElementById('s3_905').value=='') { alert("Verique el campo Su vivienda cuenta con: Refrigeradora o congeladora"); document.getElementById('s3_905').focus; return false; } 
if( document.getElementById('s3_906').value=='') { alert("Verique el campo Su vivienda cuenta con: Plancha electrica"); document.getElementById('s3_906').focus(); return false; } 
if( document.getElementById('s3_907').value=='') { alert("Verique el campo Su vivienda cuenta con: Cocina a gas"); document.getElementById('s3_907').focus(); return false; } 
if( document.getElementById('s3_908').value=='') { alert("Verique el campo Su vivienda cuenta con: Computadora"); document.getElementById('s3_908').focus(); return false; } 
if( document.getElementById('s3_909').value=='') { alert("Verique el campo Su vivienda cuenta con: Lavadora"); document.getElementById('s3_909').focus(); return false; } 
if( document.getElementById('s3_910').value=='') { alert("Verique el campo Su vivienda cuenta con: Horno microondas"); document.getElementById('s3_910').focus(); return false; } 
if( document.getElementById('s3_911').value=='') { alert("Verique el campo Su vivienda cuenta con: Ninguno"); document.getElementById('s3_911').focus(); return false; } 
if( document.getElementById('s3_1001').value=='') { alert("Verique el campo Su vivienda cuenta con: teléfono fijo"); document.getElementById('s3_1001').focus(); return false; } 
if( document.getElementById('s3_1002').value=='') { alert("Verique el campo Su vivienda cuenta con: Teléfono celular"); document.getElementById('s3_1002').focus(); return false; } 
if( document.getElementById('s3_1003').value=='') { alert("Verique el campo Su vivienda cuenta con: Conexión a internet"); document.getElementById('s3_1003').focus(); return false; } 
if( document.getElementById('s3_1004').value=='') { alert("Verique el campo Su vivienda cuenta con: Conexión a TV por cable"); document.getElementById('s3_1004').focus(); return false; } 
if( document.getElementById('s3_1005').value=='') { alert("Verique el campo Su vivienda cuenta con: Ninguno"); document.getElementById('s3_1005').focus(); return false; } 
if( document.getElementById('s3_1100').value=='') { alert("Verique el campo Utiliza algún espacio de la vivienda para realizar alguna actividad que le proporcione ingresos"); document.getElementById('s3_1100').focus(); return false; } 

}


function seccion4()
{

if( document.getElementById('s4_1_dd_cod').value=='') { alert("Verique el campo ¿Dónde está ubicado el lugar donde desarrolla su acuicultura? DEPARTAMENTO"); document.getElementById('s4_1_dd_cod').focus; return false; } 

if( document.getElementById('s4_1_pp_cod').value=='') { alert("Verique el campo ¿Dónde está ubicado el lugar donde desarrolla su acuicultura? PROVINCIA"); document.getElementById('s4_1_pp_cod').focus; return false; } 

if( document.getElementById('s4_1_di_cod').value=='') { alert("Verique el campo ¿Dónde está ubicado el lugar donde desarrolla su acuicultura? DISTRITO"); document.getElementById('s4_1_di_cod').focus; return false; } 

if( document.getElementById('s4_1_ccpp_cod').value=='') { alert("Verique el campo ¿Dónde está ubicado el lugar donde desarrolla su acuicultura? CENTRO POBLADO"); document.getElementById('s4_1_ccpp_cod').focus; return false; } 

if( document.getElementById('s4_tipvia').value=='') { alert("Verique el campo Tipo de vía centro de produccion"); document.getElementById('s4_tipvia').focus; return false; } 
if( document.getElementById('s4_nomvia').value=='') { alert("Verique el campo Nombre de la vía centro de produccion"); document.getElementById('s4_nomvia').focus; return false; } 
 

}

//SEC 5

function seccion5()
{

if( document.getElementById('s5_1_1').value=='') { alert("Verique el campo ¿Cuál es el origen del agua utilizada en su actividad de acuicultura? Lago"); document.getElementById('s5_1_1').focus; return false; } 

if( document.getElementById('s5_1_2').value=='') { alert("Verique el campo ¿Cuál es el origen del agua utilizada en su actividad de acuicultura? Rio"); document.getElementById('s5_1_2').focus; return false; } 


if( document.getElementById('s5_1_3').value=='') { alert("Verique el campo ¿Cuál es el origen del agua utilizada en su actividad de acuicultura? Manantial"); document.getElementById('s5_1_3').focus; return false; } 


if( document.getElementById('s5_1_4').value=='') { alert("Verique el campo ¿Cuál es el origen del agua utilizada en su actividad de acuicultura? Estero"); document.getElementById('s5_1_4').focus; return false; } 


if( document.getElementById('s5_1_5').value=='') { alert("Verique el campo ¿Cuál es el origen del agua utilizada en su actividad de acuicultura? Otro"); document.getElementById('s5_1_5').focus; return false; } 



if( document.getElementById('s5_9_1').value=='') { alert("Verique el campo Según el tipo de manejo, ¿El cultivo que realiza es: Extensiva"); document.getElementById('s5_9_1').focus; return false; } 

if( document.getElementById('s5_9_2').value=='') { alert("Verique el campo Según el tipo de manejo, ¿El cultivo que realiza es: Semi -itensiva"); document.getElementById('s5_9_2').focus; return false; } 

if( document.getElementById('s5_9_3').value=='') { alert("Verique el campo Según el tipo de manejo, ¿El cultivo que realiza es: Intensiva"); document.getElementById('s5_9_3').focus; return false; } 


if( document.getElementById('s5_11_1').value=='') { alert("Verique el campo Según el número de especies, ¿El tipo de cultivo que realiza es: Monocultivo"); document.getElementById('s5_11_1').focus; return false; } 
if( document.getElementById('s5_11_2').value=='') { alert("Verique el campo Según el número de especies, ¿El tipo de cultivo que realiza es: Policultivo"); document.getElementById('s5_11_2').focus; return false; } 
if( document.getElementById('s5_11_3').value=='') { alert("Verique el campo Según el número de especies, ¿El tipo de cultivo que realiza es: Cultivo asociado"); document.getElementById('s5_11_3').focus; return false; } 

 
}

function seccion6()
{

if( document.getElementById('s6_1_1').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Sindicato"); document.getElementById('s6_1_1').focus; return false; } 
if( document.getElementById('s6_1_2').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Gremio"); document.getElementById('s6_1_2').focus; return false; } 
if( document.getElementById('s6_1_3').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Asociación"); document.getElementById('s6_1_3').focus; return false; } 
if( document.getElementById('s6_1_4').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Organización comunitaria"); document.getElementById('s6_1_4').focus; return false; } 
if( document.getElementById('s6_1_5').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Consorcio"); document.getElementById('s6_1_5').focus; return false; } 
if( document.getElementById('s6_1_6').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Cooperativa"); document.getElementById('s6_1_6').focus; return false; } 
if( document.getElementById('s6_1_7').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? Otro"); document.getElementById('s6_1_7').focus; return false; } 

if( document.getElementById('s6_1_8').value=='') { alert("Verique el campo En qué organizacion participa como acuicultor? NINGUNA"); document.getElementById('s6_1_8').focus; return false; } 

if(document.getElementById('s6_1_8').value==0)
{
if( document.getElementById('s6_2_1').value=='') { alert("Verique el campo Qué beneficios obtiene de su organización? Aumenta los ingresos"); document.getElementById('s6_2_1').focus; return false; } 
if( document.getElementById('s6_2_2').value=='') { alert("Verique el campo Qué beneficios obtiene de su organización? Disminuye los costos "); document.getElementById('s6_2_2').focus; return false; } 
if( document.getElementById('s6_2_3').value=='') { alert("Verique el campo Qué beneficios obtiene de su organización? Recibe asistencia técnica"); document.getElementById('s6_2_3').focus; return false; } 
if( document.getElementById('s6_2_4').value=='') { alert("Verique el campo Qué beneficios obtiene de su organización? Mejora posicionamiento en el mercado"); document.getElementById('s6_2_4').focus; return false; } 


if( document.getElementById('s6_2_6').value=='') { alert("Verique el campo Qué beneficios obtiene de su organización? NINGUNO"); document.getElementById('s6_2_6').focus; return false; } 
}

}

////seccion 7

function seccion7()

{

//if( document.getElementById('s7_1').value=='') { alert("Verique el campo Tuvo usted trabajadores remunerados a su cargo?"); document.getElementById('s7_1').focus(); return false; } 



}

///seccion 8
function seccion8()
{

if( document.getElementById('s8_1_1').value=='') { alert("Verique el campo En los últimos 12 meses, ¿Cómo financio su actividad acuícola? Dinero de terceros"); document.getElementById('s8_1_1').focus(); return false; } 

if( document.getElementById('s8_1_2').value=='') { alert("Verique el campo En los últimos 12 meses, ¿Cómo financio su actividad acuícola? Dinero propio"); document.getElementById('s8_1_2').focus(); return false; } 

if( document.getElementById('s8_1_3').value=='') { alert("Verique el campo En los últimos 12 meses, ¿Cómo financio su actividad acuícola? No financia"); document.getElementById('s8_1_3').focus(); return false; } 

if( document.getElementById('s8_1_4').value=='') { alert("Verique el campo En los últimos 12 meses, ¿Cómo financio su actividad acuícola? No trabajo los últimos 12 meses"); document.getElementById('s8_1_4').focus(); return false; } 

}

////seccion 9

function seccion9()
{

if( document.getElementById('s9_1').value=='') { alert("Verique el campo ¿Conoce usted algún tipo de seguro de salud?"); document.getElementById('s9_1').focus(); return false; } 



}


//seccion 10
function seccion10()
{
	
if( document.getElementById('s10_1_1').value=='') { alert("Verique el campo Conoce Ud. de: - Normatividad para la acuicultura"); document.getElementById('s10_1_1').focus(); return false; } 
if( document.getElementById('s10_1_2').value=='') { alert("Verique el campo Conoce Ud. de: - Normas sanitarias acuícolas"); document.getElementById('s10_1_2').focus(); return false; } 
if( document.getElementById('s10_1_3').value=='') { alert("Verique el campo Conoce Ud. de: - Tecnología acuícola"); document.getElementById('s10_1_3').focus(); return false; } 
if( document.getElementById('s10_1_4').value=='') { alert("Verique el campo Conoce Ud. de: - Manejo ambiental en granjas"); document.getElementById('s10_1_4').focus(); return false; } 
if( document.getElementById('s10_1_5').value=='') { alert("Verique el campo Conoce Ud. de: - Programas de producción y/o alimentación"); document.getElementById('s10_1_5').focus(); return false; } 
if( document.getElementById('s10_1_6').value=='') { alert("Verique el campo Conoce Ud. de: - Manejo de residuos sólidos"); document.getElementById('s10_1_6').focus(); return false; } 
if( document.getElementById('s10_1_7').value=='') { alert("Verique el campo Conoce Ud. de: - Formalización"); document.getElementById('s10_1_7').focus(); return false; } 
if( document.getElementById('s10_1_8').value=='') { alert("Verique el campo Conoce Ud. de: - Comercialización"); document.getElementById('s10_1_8').focus(); return false; } 
if( document.getElementById('s10_1_9').value=='') { alert("Verique el campo Conoce Ud. de: - Gestión empresarial"); document.getElementById('s10_1_9').focus(); return false; } 
if( document.getElementById('s10_1_10').value=='') { alert("Verique el campo Conoce Ud. de: - Biocomercio"); document.getElementById('s10_1_10').focus(); return false; } 
if( document.getElementById('s10_1_11').value=='') { alert("Verique el campo Conoce Ud. de: - NO CONOCE"); document.getElementById('s10_1_11').focus(); return false; } 
if( document.getElementById('s10_2').value=='') { alert("Verique el campo En los últimos 12 meses, ¿Ha recibido alguna capacitación relacionada a la acuicultura?"); document.getElementById('s10_2').focus(); return false; } 


if( document.getElementById('s10_6').value=='') { alert("Verique el campo En los últimos 12 meses ¿Ha recibido asistencia técnica en su actividad? "); document.getElementById('s10_6').focus(); return false; } 


if( document.getElementById('s10_10').value=='') { alert("Verique el campo ¿Cuenta con embarcaciones para su actividad?"); document.getElementById('s10_10').focus(); return false; } 
 
if( document.getElementById('s10_11_1').value=='') { alert("Verique el campo ¿Cómo calificaría el apoyo al sector pesquero del: Ministerio de la Producción (PRODUCE)"); document.getElementById('s10_11_1').focus(); return false; } 
if( document.getElementById('s10_11_2').value=='') { alert("Verique el campo ¿Cómo calificaría el apoyo al sector pesquero del: Fondo Nacional de Desarrollo Pesquero (FONDEPES)"); document.getElementById('s10_11_2').focus(); return false; } 
if( document.getElementById('s10_11_3').value=='') { alert("Verique el campo ¿Cómo calificaría el apoyo al sector pesquero del: Instituto Tecnológico Pesquero (ITP)"); document.getElementById('s10_11_3').focus(); return false; } 
if( document.getElementById('s10_11_4').value=='') { alert("Verique el campo ¿Cómo calificaría el apoyo al sector pesquero del: Instituto del Mar Perú (IMAPRE)"); document.getElementById('s10_11_4').focus(); return false; } 
if( document.getElementById('s10_11_5').value=='') { alert("Verique el campo ¿Cómo calificaría el apoyo al sector pesquero del: Ministerio del Ambiente (MINAM)"); document.getElementById('s10_11_5').focus(); return false; } 
if( document.getElementById('s10_11_6').value=='') { alert("Verique el campo ¿Cómo calificaría el apoyo al sector pesquero del: Servicio Nacional de Sanidad Pesquera (SANIPES)"); document.getElementById('s10_11_6').focus(); return false; } 


	
}