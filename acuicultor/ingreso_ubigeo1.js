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
function cargaDis()
{
codprov=document.getElementById("CCPP").value;
coddep=document.getElementById("CCDD").value;

var distrito;
document.getElementById("CP").value=document.getElementById("CCPP").value;
document.getElementById("NOM_PP").value=document.getElementById("CCPP").options[document.getElementById("CCPP").selectedIndex].text;

distrito= document.getElementById('ver_distrito');


distrito.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "distrito_proceso.php?codprov="+codprov+"&coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		distrito.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}

