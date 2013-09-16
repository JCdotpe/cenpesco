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
function cargaProv()
{
document.getElementById("ver_provincia").innerHTML="";
coddep=document.getElementById("ccdd").value;

var provincia;
document.getElementById("cd").value=document.getElementById("ccdd").value;

document.getElementById("nom_dd").value=document.getElementById("ccdd").options[document.getElementById("ccdd").selectedIndex].text;

provincia= document.getElementById('ver_provincia');


provincia.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "provincia_proceso.php?coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() 
	{

    if (ajax.readyState==4)
      {
		
		provincia.innerHTML = ajax.responseText;
      }
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}

function carga_rProv1()
{

document.getElementById("ver_rProvincia").innerHTML="";
rcoddep=document.getElementById("s2_10_dd_cod").value;

var rprovincia;
//document.getElementById("cd").value=document.getElementById("ccdd").value;

//document.getElementById("nom_dd").value=document.getElementById("ccdd").options[document.getElementById("ccdd").selectedIndex].text;

rprovincia= document.getElementById('ver_rProvincia');


rprovincia.innerHTML="..Cargando";
var ajax1=nuevoAjax();

ajax1.open("GET", "provincia_rproceso.php?coddep="+rcoddep,true);
ajax1.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax1.onreadystatechange=function() 
	{

    if (ajax1.readyState==4)
      {
		
		rprovincia.innerHTML = ajax1.responseText;
      }
	}
	
ajax1.send(null);
}

//Lugar de nacimiento

function carga_nProv1()
{

document.getElementById("ver_nProvincia").innerHTML="";
ncoddep=document.getElementById("s2_11_dd_cod").value;

var nprovincia;
//document.getElementById("cd").value=document.getElementById("ccdd").value;

//document.getElementById("nom_dd").value=document.getElementById("ccdd").options[document.getElementById("ccdd").selectedIndex].text;

nprovincia= document.getElementById('ver_nProvincia');


nprovincia.innerHTML="..Cargando";
var ajax4=nuevoAjax();

ajax4.open("GET", "provincia_nproceso.php?coddep="+ncoddep,true);
ajax4.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax4.onreadystatechange=function() 
	{

    if (ajax4.readyState==4)
      {
		
		nprovincia.innerHTML = ajax4.responseText;
      }
	}
	
ajax4.send(null);
}

//Lugar de viviia

function carga_vProv1()
{

document.getElementById("ver_vProvincia").innerHTML="";
vcoddep=document.getElementById("s2_12_dd_cod").value;

var vprovincia;
//document.getElementById("cd").value=document.getElementById("ccdd").value;

//document.getElementById("nom_dd").value=document.getElementById("ccdd").options[document.getElementById("ccdd").selectedIndex].text;

vprovincia= document.getElementById('ver_vProvincia');


vprovincia.innerHTML="..Cargando";
var ajax6=nuevoAjax();

ajax6.open("GET", "provincia_vproceso.php?coddep="+vcoddep,true);
ajax6.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax6.onreadystatechange=function() 
	{

    if (ajax6.readyState==4)
      {
		
		vprovincia.innerHTML = ajax6.responseText;
      }
	}
	
ajax6.send(null);
}



//Lugar del centro de produccion

function carga_cProv1()
{

document.getElementById("ver_cProvincia1").innerHTML="";

ccoddepa=document.getElementById("s4_1_dd_cod").value;

var cprovincia1;
//document.getElementById("cd").value=document.getElementById("ccdd").value;

//document.getElementById("nom_dd").value=document.getElementById("ccdd").options[document.getElementById("ccdd").selectedIndex].text;

cprovincia1= document.getElementById('ver_cProvincia1');


cprovincia1.innerHTML="..Cargando";
var ajax8=nuevoAjax();

ajax8.open("GET", "provincia_cproceso.php?coddep="+ccoddepa,true);
ajax8.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax8.onreadystatechange=function() 
	{

    if (ajax8.readyState==4)
      {
		
		cprovincia1.innerHTML = ajax8.responseText;
      }
	}
	
ajax8.send(null);
}





