function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false; 
	try 
	{ 
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// Creacion del objeto AJAX para IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
} 
///carga dist
function carga_rDis()
{
	
codprov=document.getElementById("S4_1_PP_COD").value;
coddep=document.getElementById("S4_1_DD_COD").value;

var distrito;
document.getElementById("S4_1_PP").value=document.getElementById("S4_1_PP_COD").options[document.getElementById("S4_1_PP_COD").selectedIndex].text;

distrito= document.getElementById('ver_rDistrito');


distrito.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "distrito_uproceso_a.php?codprov="+codprov+"&coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		distrito.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


///carga dist1111
function carga_nDis()
{
codprov=document.getElementById("S2_10_PP_COD").value;
coddep=document.getElementById("S2_10_DD_COD").value;

var distrito;
document.getElementById("S2_10_PP").value=document.getElementById("S2_10_PP_COD").options[document.getElementById("S2_10_PP_COD").selectedIndex].text;

distrito= document.getElementById('ver_nDistrito');


distrito.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "distrito_nproceso.php?codprov="+codprov+"&coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		distrito.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


///carga distrwr3222
function carga_vDis()
{
codprov=document.getElementById("S2_11_PP_COD").value;
coddep=document.getElementById("S2_11_DD_COD").value;
var distrito;

document.getElementById("S2_11_PP").value=document.getElementById("S2_11_PP_COD").options[document.getElementById("S2_11_PP_COD").selectedIndex].text;
distrito= document.getElementById('ver_vDistrito');


distrito.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "distrito_vproceso.php?codprov="+codprov+"&coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		distrito.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}

function carga_nCepo()
{
document.getElementById("S2_10_DI").value=document.getElementById("S2_10_DI_COD").options[document.getElementById("S2_10_DI_COD").selectedIndex].text;	
}

function carga_vCepo()
{
document.getElementById("S2_11_DI").value=document.getElementById("S2_11_DI_COD").options[document.getElementById("S2_11_DI_COD").selectedIndex].text;	
}