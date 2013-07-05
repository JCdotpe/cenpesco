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
coddep=document.getElementById("CCDD").value;

var provincia;
document.getElementById("CD").value=document.getElementById("CCDD").value;
document.getElementById("NOM_DD").value=document.getElementById("CCDD").options[document.getElementById("CCDD").selectedIndex].text;

provincia= document.getElementById('ver_provincia');


provincia.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "provincia_proceso.php?coddep="+coddep,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		provincia.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


function carga_rPoblado()
{
codprov=document.getElementById("CCPP").value;
coddep=document.getElementById("CCDD").value;
coddis=document.getElementById("CCDI").value;
ccpp=document.getElementById("COD_CCPP").value;
document.getElementById("CEP").value=document.getElementById("COD_CCPP").value;
document.getElementById("NOM_CCPP").value=document.getElementById("COD_CCPP").options[document.getElementById("COD_CCPP").selectedIndex].text;
nfrm=document.getElementById("NFORM").value;


var vista;
vista= document.getElementById('ver_aviso');
	
vista.innerHTML="..Cargando";
var ajax2=nuevoAjax();

ajax2.open("GET", "aviso.php?codprov="+codprov+"&coddep="+coddep+"&coddis="+coddis+"&ccpp="+ccpp+"&nfrm="+nfrm,true);
ajax2.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax2.onreadystatechange=function() {
		
		if (ajax2.readyState==4){
		
		vista.innerHTML = ajax2.responseText;
	
	 	}
	}
	
ajax2.send(null);
//document.getElementById("coddep").selectedIndex=0;
}