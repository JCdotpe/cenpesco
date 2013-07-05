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
function carga_rCepo()
{
codprov=document.getElementById("S4_1_PP_COD").value;
coddep=document.getElementById("S4_1_DD_COD").value;
coddis=document.getElementById("S4_1_DI_COD").value;

var cepo;
document.getElementById("S4_1_DI").value=document.getElementById("S4_1_DI_COD").options[document.getElementById("S4_1_DI_COD").selectedIndex].text;

cepo= document.getElementById('ver_rCepo');


cepo.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "cepo_uproceso_a.php?codprov="+codprov+"&coddep="+coddep+"&coddis="+coddis,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		cepo.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


