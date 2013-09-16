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
	
codprov=document.getElementById("ccpp").value;
coddep=document.getElementById("ccdd").value;

var distrito;
document.getElementById("cp").value=document.getElementById("ccpp").value;

document.getElementById("nom_pp").value=document.getElementById("ccpp").options[document.getElementById("ccpp").selectedIndex].text;

//document.getElementById("nom_pp").value=document.getElementById("ccpp").options[document.getElementById("ccpp").selectedIndex].text;
//alert (coddep);
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

//dISTR rESIDECIAL
function carga_rDis1()
{

rcodprov=document.getElementById("s2_10_pp_cod").value;
rcoddep=document.getElementById("s2_10_dd_cod").value;

var rdistrito;
//document.getElementById("nom_pp").value=document.getElementById("ccpp").options[document.getElementById("ccpp").selectedIndex].text;
//alert (coddep);
rdistrito= document.getElementById('ver_rDistrito');


rdistrito.innerHTML="..Cargando";
var ajax2=nuevoAjax();

ajax2.open("GET", "distrito_rproceso.php?codprov="+rcodprov+"&coddep="+rcoddep,true);
ajax2.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax2.onreadystatechange=function() {
		
		if (ajax2.readyState==4){
		
		rdistrito.innerHTML = ajax2.responseText;
	
	 	}
	}
	
ajax2.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


///nacimiento

//dISTR rESIDECIAL
function carga_nDis1()
{

ncodprov=document.getElementById("s2_11_pp_cod").value;
ncoddep=document.getElementById("s2_11_dd_cod").value;

var ndistrito;
//document.getElementById("nom_pp").value=document.getElementById("ccpp").options[document.getElementById("ccpp").selectedIndex].text;
//alert (coddep);
ndistrito= document.getElementById('ver_nDistrito');


ndistrito.innerHTML="..Cargando";
var ajax5=nuevoAjax();

ajax5.open("GET", "distrito_nproceso.php?codprov="+ncodprov+"&coddep="+ncoddep,true);
ajax5.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax5.onreadystatechange=function() {
		
		if (ajax5.readyState==4){
		
		ndistrito.innerHTML = ajax5.responseText;
	
	 	}
	}
	
ajax5.send(null);
//document.getElementById("coddep").selectedIndex=0;
}

//dISTR vivia
function carga_vDis1()
{



vcoddep= document.getElementById("s2_12_dd_cod").value;

vcodprov= document.getElementById("s2_12_pp_cod").value;

var vdistrito;
//document.getElementById("nom_pp").value=document.getElementById("ccpp").options[document.getElementById("ccpp").selectedIndex].text;
//alert (coddep);
vdistrito= document.getElementById('ver_vDistrito');


vdistrito.innerHTML="..Cargando";
var ajax7=nuevoAjax();

ajax7.open("GET", "distrito_vproceso.php?codprov="+vcodprov+"&coddep="+vcoddep,true);
ajax7.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax7.onreadystatechange=function() {
		
		if (ajax7.readyState==4){
		
		vdistrito.innerHTML = ajax7.responseText;
	
	 	}
	}
	
ajax7.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


//dISTR vivia
function carga_cDis1()
{

ccoddep= document.getElementById("s4_1_dd_cod").value;

ccodprov= document.getElementById("s4_1_pp_cod").value;

var cdistrito;
//document.getElementById("nom_pp").value=document.getElementById("ccpp").options[document.getElementById("ccpp").selectedIndex].text;
//alert (coddep);
cdistrito= document.getElementById('ver_cDistrito');


cdistrito.innerHTML="..Cargando";
var ajax9=nuevoAjax();

ajax9.open("GET", "distrito_cproceso.php?codprov="+ccodprov+"&coddep="+ccoddep,true);
ajax9.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax9.onreadystatechange=function() {
		
		if (ajax9.readyState==4){
		
		cdistrito.innerHTML = ajax9.responseText;
	
	 	}
	}
	
ajax9.send(null);
//document.getElementById("coddep").selectedIndex=0;
}
