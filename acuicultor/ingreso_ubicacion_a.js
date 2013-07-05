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
function carga_rProv()
{
coddep=document.getElementById("S4_1_DD_COD").value;

var provincia;
document.getElementById("S4_1_DD").value=document.getElementById("S4_1_DD_COD").options[document.getElementById("S4_1_DD_COD").selectedIndex].text;

provincia= document.getElementById('ver_rProvincia');


provincia.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "provincia_uproceso_a.php?coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		provincia.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


//carga dist1
function carga_nProv()
{
coddep=document.getElementById("S2_10_DD_COD").value;

var provincia;
document.getElementById("S2_10_DD").value=document.getElementById("S2_10_DD_COD").options[document.getElementById("S2_10_DD_COD").selectedIndex].text;

provincia= document.getElementById('ver_nProvincia');


provincia.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "provincia_nproceso.php?coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		provincia.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}

//carga dist2
function carga_vProv()
{
coddep=document.getElementById("S2_11_DD_COD").value;

var provincia;
document.getElementById("S2_11_DD").value=document.getElementById("S2_11_DD_COD").options[document.getElementById("S2_11_DD_COD").selectedIndex].text;

provincia= document.getElementById('ver_vProvincia');


provincia.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "provincia_vproceso.php?coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		provincia.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


