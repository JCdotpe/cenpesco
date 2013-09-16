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
function carga_cepo()
{
codprov=document.getElementById("ccpp").value;
coddep=document.getElementById("ccdd").value;
coddis=document.getElementById("ccdi").value;

var cepo;
document.getElementById("cdis").value=document.getElementById("ccdi").value;
document.getElementById("nom_di").value=document.getElementById("ccdi").options[document.getElementById("ccdi").selectedIndex].text;

cepo= document.getElementById('ver_cepo');


cepo.innerHTML="..Cargando";
var ajax=nuevoAjax();

ajax.open("GET", "cepo_proceso.php?codprov="+codprov+"&coddep="+coddep+"&coddis="+coddis,true);
ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax.onreadystatechange=function() {
		
		if (ajax.readyState==4){
		
		cepo.innerHTML = ajax.responseText;
	
	 	}
	}
	
ajax.send(null);
//document.getElementById("coddep").selectedIndex=0;
}

function carga_rPoblado()
{
	
codprov=document.getElementById("ccpp").value;
coddep=document.getElementById("ccdd").value;
coddis=document.getElementById("ccdi").value;
ccpp=document.getElementById("cod_ccpp").value;
nform=document.getElementById("nform").value;
document.getElementById("cep").value=document.getElementById("cod_ccpp").value;
//document.getElementById("nom_ccpp").value=document.getElementById("cod_ccpp").options[document.getElementById("cod_ccpp").selectedIndex].text;

//document.getElementById("s2_9_ccpp").value=document.getElementById("s2_9_ccpp_cod").options[document.getElementById("s2_9_ccpp_cod").selectedIndex].text;	

var vista1;
vista1= document.getElementById('vista_s1');

vista1.innerHTML="..Cargando";
var ajax_1=nuevoAjax();

ajax_1.open("GET", "aviso.php?codprov="+codprov+"&coddep="+coddep+"&coddis="+coddis+"&codcp="+ccpp+"&nform="+nform,true);
ajax_1.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax_1.onreadystatechange=function() {
		
		if (ajax_1.readyState==4){
		
		vista1.innerHTML = ajax_1.responseText;
	
	 	}
	}
	
ajax_1.send(null);

//campo tac

var vista2;
vista2= document.getElementById('vista_s2');
	
vista2.innerHTML="..Cargando";
var ajax_2=nuevoAjax();

ajax_2.open("GET", "aviso1.php?codprov="+codprov+"&coddep="+coddep+"&coddis="+coddis+"&codcp="+ccpp+"&nform="+nform,true);
ajax_2.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax_2.onreadystatechange=function() {
		
		if (ajax_2.readyState==4){
		
		vista2.innerHTML = ajax_2.responseText;
	
	 	}
	}
	
ajax_2.send(null);
}

//centro poblado  residencia

///carga dist
function carga_rCepo1()
{
	
rcodprov=document.getElementById("s2_10_pp_cod").value;
rcoddep=document.getElementById("s2_10_dd_cod").value;
rcoddis=document.getElementById("s2_10_di_cod").value;
//alert(rcodprov+'/'+rcoddep+'/'+rcoddis);
var rcepo;

rcepo= document.getElementById('ver_rCepo');


rcepo.innerHTML="..Cargando";
var ajax3=nuevoAjax();

ajax3.open("GET", "cepo_rproceso.php?codprov="+rcodprov+"&coddep="+rcoddep+"&coddis="+rcoddis,true);
ajax3.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax3.onreadystatechange=function() {
		
		if (ajax3.readyState==4){
		
		rcepo.innerHTML = ajax3.responseText;
	
	 	}
	}
	
ajax3.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


///carga centro poblados

function carga_cCepo1()
{
	
ccodprov=document.getElementById("s4_1_pp_cod").value;
ccoddep=document.getElementById("s4_1_dd_cod").value;
ccoddis=document.getElementById("s4_1_di_cod").value;
//alert(rcodprov+'/'+rcoddep+'/'+rcoddis);
var ccepo;

ccepo= document.getElementById('ver_cCepo');


ccepo.innerHTML="..Cargando";
var ajax9=nuevoAjax();

ajax9.open("GET", "cepo_cproceso.php?codprov="+ccodprov+"&coddep="+ccoddep+"&coddis="+ccoddis,true);
ajax9.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=ISO-8859-1');

		
	ajax9.onreadystatechange=function() {
		
		if (ajax9.readyState==4){
		
		ccepo.innerHTML = ajax9.responseText;
	
	 	}
	}
	
ajax9.send(null);
//document.getElementById("coddep").selectedIndex=0;
}


