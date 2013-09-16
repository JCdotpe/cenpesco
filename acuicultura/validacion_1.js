//rellenar
//valores cero izquierd
function rellenar(quien,que){
cadcero='';
for(i=0;i<(5-que.length);i++){
cadcero+='0';
}
quien.value=cadcero+que;
}


//----------------------
function rellenar2(quien,que){
cadcero='';
for(i=0;i<(2-que.length);i++){
cadcero+='0';o
}
quien.value=cadcero+que;
}


//--------------------------------
function rellenar4(quien,que){
cadcero='';
for(i=0;i<(4-que.length);i++){
cadcero+='0';
}
quien.value=cadcero+que;
}



// solo numeros DIA
function dia1(a,b)
{ 

dia = document.getElementById('s2_3d').value;
if( (dia>0 && dia<=31) || dia==99)
{ 
rellenar2(a,b);	
}
else
{
alert("Por favor, ingrese un d\u00eda v\u00e1lido");
document.getElementById('s2_3d').value='';
document.getElementById('s2_3d').focus();
	
}
}

// solo numeros DIA ultimo

function dia2(a,b)
{ 

dia = document.getElementById('f_d').value;
if( (dia>0 && dia<=31) || dia==99)
{ 
rellenar2(a,b);	
}
else
{
alert("Por favor, ingrese un d\u00eda v\u00e1lido");
document.getElementById('f_d').value='';
document.getElementById('f_d').focus();
	
}
}

// solo numeros DIA
function anio1(a,b)
{ 

anio = document.getElementById('s2_3a').value;
if( (anio>=1930 && anio<=2005) || anio==9999)
{ 
//rellenar2(a,b);	
}
else
{
alert("Por favor, ingrese una fecha v\u00e1lida");
document.getElementById('s2_3a').value='';
document.getElementById('s2_3a').focus();
	
}
}

//---------------------
function dni1()
{
if(document.getElementById('s2_5').value != document.getElementById('s2_5r').value)
{
//alert("Ingrese correctamente su DNI");
document.getElementById('s2_5r').value='';
document.getElementById('s2_5r').focus;
}
}

// vÁLIDAD DOCUEMTNO DE IDENTIDAD
function dnis(a,b)
{ 

dni1 = document.getElementById('s2_5').value;
dni2 = document.getElementById('s2_5r').value;

if(dni1.length!=8)
{
alert("Le faltan digitos al DNI ingresado");
setTimeout(function() {  document.getElementById('s2_5').focus();  },1);
}



if( dni1 == dni2 )
{ 

}
else
{
alert("Por favor, ingrese correctamente su DNI");

document.getElementById('s2_5r').value='';

setTimeout(function() {  document.getElementById('s2_5r').focus();  },1);

}

}


////-----RUCS
function rucs(a,b)
{ 

r1 = document.getElementById('s2_6').value;
r2 = document.getElementById('s2_6r').value;

if(r1.length!=11)
{
alert("Le faltan digitos al RUC ingresado");
setTimeout(function() {  document.getElementById('s2_6').focus();  },1);
}


if( r1 == r2 )
{ 

}
else
{
alert("Por favor, ingrese correctamente su RUC");
document.getElementById('s2_6r').value='';
setTimeout(function() {  document.getElementById('s2_6r').focus();  },1);
	
}

}


//----------------------------------
function ruc1()
{

if(document.getElementById('s2_6').value != document.getElementById('s2_6r').value)
{
alert("Ingrese correctamente su RUC");
document.getElementById('s2_6r').value='';
document.getElementById('s2_6r').focus;
}
}

//------------------------------------------
function mes1(a,b)
{ 

mes = document.getElementById('s2_3m').value;
if((mes>0 && mes<=12) || mes==99)
{  
 rellenar2(a,b);	
}
else
{
alert("Por favor, ingrese un mes v\u00e1lido");
document.getElementById('s2_3m').value='';
document.getElementById('s2_3m').focus();	

}

}

//--------------------------------mes ultimo-
function mes2(a,b)
{ 

mes = document.getElementById('f_m').value;
if((mes>0 && mes<=12) || mes==99)
{  
 rellenar2(a,b);	
}
else
{
alert("Por favor, ingrese un mes v\u00e1lido");
document.getElementById('f_m').value='';
document.getElementById('f_m').focus();	

}

}


///ANIOOOOO
function anio2()
{ 

anio = document.getElementById('f_a').value;
if((anio>1925 && anio<=2000) || anio==9999 )
{ 
rellenar4(a,b);
}
else
{
alert("Por favor, ingrese un a\u00f1o v\u00e1lido");
document.getElementById('f_a').value='';
document.getElementById('f_a').focus();

}
}


///numeros y punto
function numeros_p(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[0-9{.}]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}



// solo numeros
function numeros(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[0-9]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}


//numero 0 y 5
function numeros05(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[0-5{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);
	
}


//numero 1 y 2
function numeros12(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-2{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

//numero  solo 1 y 2
function numeros_12(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-2]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}


///numeros del cero al tres
function numeros13(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-3{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

///numeros del uno a tres
function numeros13a(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-3]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}


///numeros del 1 al 4
function numeros14(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-4{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}


///numeros del 1 al 6
function numeros15(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-5{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}


///numeros del 1 al 6
function numeros16(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-6{9}]/;
    n = String.fromCharCode(k);
	
    return patron.test(n);
}


///numeros del 1 al 7
function numeros17(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-7{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}


	//numero 1 y 8
function numeros18(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-8{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}


///.............9
function numeros19(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-9]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}


//LETRAS DEL ALAFABETO
function letras(e)
{   
    k=(document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron=/^[a-zA-Z \u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/;
    n = String.fromCharCode(k);
	
    return patron.test(n);
	enter2tab(e);
}



//duo
function duo(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-2]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}


//Binarios
function binario(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[0-1{9}]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}

///---------------------


////validamos formulario 1

function mostrar_dep()
{

if(document.getElementById("cod_pais").value=='4028')
{ 
document.getElementById("depa").style.display = "";
document.getElementById("provi").style.display = "";
document.getElementById("distri").style.display = "";
}
else
{ 
document.getElementById("depa").style.display = "none";
document.getElementById("provi").style.display = "none";
document.getElementById("distri").style.display = "none";;

}

}


////validamos formulario 1

function mostrar_dep1()
{
 if(document.getElementById("cod_paisv").value=='4028')
{ 
document.getElementById("depa1").style.display = "";
document.getElementById("provi1").style.display = "";
document.getElementById("distri1").style.display = "";
}
else
{ 
document.getElementById("depa1").style.display = "none";
document.getElementById("provi1").style.display = "none";
document.getElementById("distri1").style.display = "none";;

}

}


///Regla N° 01
function regla1() 
{
estado_s2 = document.getElementById("s2_2");
 fila1 = document.getElementById("sec2_1");
 fila2 = document.getElementById("sec2_2");
 fila3 = document.getElementById("sec2_3");
if(estado_s2.value==2)
{
 fila1.style.display = "none";  
 fila2.style.display = "none"; 
 fila3.style.display = "none"; 
}
else
{
 fila1.style.display = "";  
 fila2.style.display = ""; 
 fila3.style.display = "";	
}

}


///Regla N° 02
function regla2() 
{

 campo = document.getElementById("s2_22");
 c1 = document.getElementById("s2_23");
 fila0 = document.getElementById("regla2_0");
 fila1 = document.getElementById("regla2_1");
if(campo.value==2)
{
 fila0.style.display = "none"; 
 fila1.style.display = "none";  
 c1.readOnly = true;
}
else
{
 fila0.style.display = "";
 fila1.style.display = "";  
 c1.readOnly = false;	
}

}


////para gradop  y año
function grado1(n)
{
 Nivel = document.getElementById('s2_13');	
Grado = document.getElementById('s2_13g');
Anio = document.getElementById('s2_13a');


if(Nivel.value==3)
{
Grado.readOnly = false;
Anio.readOnly = false;
Anio.value='';
Grado.value='';
}
if(Nivel.value==4)
{
Anio.readOnly = false;
Grado.readOnly = true;
Anio.value='';
Grado.value='';
document.getElementById('s2_13a').focus();
}

if(Nivel.value!=4 && Nivel.value!=3 )
{
document.getElementById(n).focus();
}

}



////para gradop  y año 2
function grado2(n)
{
 Nivel = document.getElementById('s2_20');	
Grado = document.getElementById('s2_20g');
Anio = document.getElementById('s2_20a');

if(Nivel.value==3)
{
Grado.readOnly = false;
Anio.readOnly = false;
Anio.value='';
Grado.value='';
}
if(Nivel.value==4)
{
Anio.readOnly = false;
Grado.readOnly = true;
Anio.value='';
Grado.value='';
document.getElementById('s2_20a').focus();
}

if(Nivel.value!=4 && Nivel.value!=3 )
{
document.getElementById(n).focus();
}

}



//----validad 99
function noventinueve(n)
{
num = document.getElementById(n).value;
if((num>=1 && num<=9) || num==99)
{

}
else
{
alert("Por favor, ingrese solo 1,2,3,4,5,6,7,8,9 y 99");
document.getElementById(n).value='';
document.getElementById(n).focus();
}
}



//-----------------------------
function ReplaceEnterWithTab() 
{
	if (event.keyCode == 13) event.keyCode = 9; 
	return false;
}



//----------------------------
function otros(n,otro,numero)
{
otr = document.getElementById(otro)
num = document.getElementById(n).value;
if(num==parseInt(numero))
{
otr.readOnly = false;
}
else
{
otr.value = '';
otr.readOnly = true;	
}
}

//----------------------------
function otros_1(n,otro,numero)
{
otr = document.getElementById(otro)
num = document.getElementById(n).value;
if(num==parseInt(numero))
{
otr.readOnly = false;
}
else
{
otr.value = '';
otr.readOnly = true;	
}

if(num>=4 && num<=8)
{
fila1 = document.getElementById("service1");
fila2 = document.getElementById("service2");
fila1.style.display = "none";
fila2.style.display = "none";
//document.getElementById('s3_600').readOnly = true;	
}
else
{
//document.getElementById('s3_600').readOnly = false;	
fila1 = document.getElementById("service1");
fila2 = document.getElementById("service2");
fila1.style.display = "";
fila2.style.display = "";
}
}

//otros validado
//----------------------------
function otros_v(n,otro,numero,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,nn)
{
otr = document.getElementById(otro)
num = document.getElementById(n).value;
if(num==parseInt(numero))
{
otr.readOnly = false;
}
else
{
otr.value = '';
otr.readOnly = true;	
}

///val 000
a=0; b=0; c=0; d=0; e=0; f=0; g=0; h=0; i=0; j=0;

if(q1!='')  {  if(document.getElementById(q1).value==1 || document.getElementById(q1).value==9) { a=1;  } else { a=0; } }
if(q2!='')  {  if(document.getElementById(q2).value==1 || document.getElementById(q2).value==9) { b=1;  } else { b=0; } }
if(q3!='')  {  if(document.getElementById(q3).value==1 || document.getElementById(q3).value==9) { c=1;  } else { c=0; } }
if(q4!='')  {  if(document.getElementById(q4).value==1 || document.getElementById(q4).value==9) { d=1;  } else { d=0; } }
if(q5!='')  {  if(document.getElementById(q5).value==1 || document.getElementById(q5).value==9) { e=1;  } else { e=0; } }
if(q6!='')  {  if(document.getElementById(q6).value==1 || document.getElementById(q6).value==9) {  f=1; } else { f=0; } }
if(q7!='')  {  if(document.getElementById(q7).value==1 || document.getElementById(q7).value==9) { g=1;  } else { g=0; } }
if(q8!='')  {  if(document.getElementById(q8).value==1 || document.getElementById(q8).value==9) { h=1;  } else { h=0; } }
if(q9!='')  {  if(document.getElementById(q9).value==1 || document.getElementById(q9).value==9) { i=1;  } else { i=0; } } 
if(q10!='') { if(document.getElementById(q10).value==1 ||  document.getElementById(q10).value==9) { j=1;  } else { j=0; } } 

sum=a+b+c+d+e+f+g+h+i+j;

if(sum==0) 
{ 
alert("Por favor, ingrese al menos un item");    
document.getElementById(q1).focus;
}


}



//--------------------------
function ninguno(nn,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,cc,nin,non)
{
vv= document.getElementById(nn).value;

non_d=document.getElementById(non).value;

a=0; b=0; c=0; d=0; e=0; f=0; g=0; h=0; i=0; j=0; k=0; l=0; m=0;

np=0;

if(q1!='')  {  a=document.getElementById(q1).value; }
if(q2!='')  {  b=document.getElementById(q2).value;}
if(q3!='')  {  c=document.getElementById(q3).value; }
if(q4!='')  {  d=document.getElementById(q4).value; }
if(q5!='')  {  e=document.getElementById(q5).value; }
if(q6!='')  {  f=document.getElementById(q6).value; }
if(q7!='')  {  g=document.getElementById(q7).value;}
if(q8!='')  {  h=document.getElementById(q8).value; }
if(q9!='')  {  i=document.getElementById(q9).value; } 
if(q10!='') {  j=document.getElementById(q10).value; } 
if(q11!='')  {  k=document.getElementById(q11).value; }
if(q12!='')  {  l=document.getElementById(q12).value;}
if(q13!='')  {  m=document.getElementById(q13).value; }

sum=a+b+c+d+e+f+g+h+i+j+k+l+m;

if(sum==0) 
{ 
alert("Por favor, ingrese al menos un dato v\u00e1lido");    
document.getElementById(q1).focus;
}

if(sum==cc && nin==0) 
{   
alert("Ya ingres\u00f3  datos v\u00e1lidos, corriga el valor ingresado");
document.getElementById(q1).focus;  
}

if( (sum>0 && sum<cc) && non_d==1) 
{   
alert("Ya ingres\u00f3  datos v\u00e1lidos, corriga el valor ingresado");
document.getElementById(q1).focus;  
}


}

//--------------------------------------------------------------------------------------------

function ninguno1(nn,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,cc,nin,non)
{
vv= document.getElementById(nn).value;

non_d=document.getElementById(non).value

a=0; b=0; c=0; d=0; e=0; f=0; g=0; h=0; i=0; j=0; k=0; l=0; m=0;
{
np=0;
if(q1!='')  {  if(document.getElementById(q1).value==1) { a=1;  } else { a=0; } }
if(q2!='')  {  if(document.getElementById(q2).value==1) { b=1;  } else { b=0; } }
if(q3!='')  {  if(document.getElementById(q3).value==1) { c=1;  } else { c=0; } }
if(q4!='')  {  if(document.getElementById(q4).value==1) { d=1;  } else { d=0; } }
if(q5!='')  {  if(document.getElementById(q5).value==1) { e=1;  } else { e=0; } }
if(q6!='')  {  if(document.getElementById(q6).value==1) {  f=1; } else { f=0; } }
if(q7!='')  {  if(document.getElementById(q7).value==1) { g=1;  } else { g=0; } }
if(q8!='')  {  if(document.getElementById(q8).value==1) { h=1;  } else { h=0; } }
if(q9!='')  {  if(document.getElementById(q9).value==1) { i=1;  } else { i=0; } } 
if(q10!='') { if(document.getElementById(q10).value==1) { j=1;  } else { j=0; } } 
if(q11!='')  {  if(document.getElementById(q11).value==1) { k=1;  } else { k=0; } }
if(q12!='')  {  if(document.getElementById(q12).value==1) { l=1; } else { l=0; } }
if(q13!='')  {  if(document.getElementById(q13).value==1) { m=1; } else { m=0; } }

sum=a+b+c+d+e+f+g+h+i+j+k+l+m;

if(sum==0) 
{ 
alert("Por favor, ingrese al menos un dato v\u00e1lido");    
document.getElementById(q1).focus;
}

if(sum==cc && nin==0) 
{   
alert("Ya ingres\u00f3  datos v\u00e1lidos, corriga el valor ingresado");
document.getElementById(q1).focus;  
}

if(sum>0 && non_d==1) 
{   
alert("Ya ingres\u00f3  datos v\u00e1lidos, corriga el valor ingresado");
document.getElementById(q1).focus;  
}

}
}

////---------  ingreso datos
function ningunoO(nn,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,cc,nin,non)
{
vv= document.getElementById(nn).value;

non_d=document.getElementById(non).value;

a=0; b=0; c=0; d=0; e=0; f=0; g=0; h=0; i=0; j=0; k=0; l=0; m=0;

np=0;
if(q1!='')  {  a=document.getElementById(q1).value; }
if(q2!='')  {  b=document.getElementById(q2).value;}
if(q3!='')  {  c=document.getElementById(q3).value; }
if(q4!='')  {  d=document.getElementById(q4).value; }
if(q5!='')  {  e=document.getElementById(q5).value; }
if(q6!='')  {  f=document.getElementById(q6).value; }
if(q7!='')  {  g=document.getElementById(q7).value;}
if(q8!='')  {  h=document.getElementById(q8).value; }
if(q9!='')  {  i=document.getElementById(q9).value; } 
if(q10!='') {  j=document.getElementById(q10).value; } 
if(q11!='')  {  k=document.getElementById(q11).value; }
if(q12!='')  {  l=document.getElementById(q12).value;}
if(q13!='')  {  m=document.getElementById(q13).value; }

sum=a+b+c+d+e+f+g+h+i+j+k+l+m;

if(sum==0) 
{ 
alert("Por favor, ingrese al menos un dato v\u00e1lido");    
document.getElementById(q1).focus;
}

}

///--------------------------------------------------------------------------------------------

function todos1(nn,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,tt,otro,n)
{
if(n==1) { otros(nn,otro,'1'); }

var hs = new Array();
if(q1!='') { hs[1]= parseInt(document.getElementById(q1).value); }
if(q2!='') { hs[2]= parseInt(document.getElementById(q2).value); }
if(q3!='') { hs[3]= parseInt(document.getElementById(q3).value); }
if(q4!='') { hs[4]= parseInt(document.getElementById(q4).value); }
if(q5!='') { hs[5]= parseInt(document.getElementById(q5).value); }
if(q6!='') { hs[6]= parseInt(document.getElementById(q6).value); }
if(q7!='') { hs[7]= parseInt(document.getElementById(q7).value); }
if(q8!='') { hs[8]= parseInt(document.getElementById(q8).value); }
if(q9!='') { hs[9]= parseInt(document.getElementById(q9).value); }
if(q10!='') { hs[10]= parseInt(document.getElementById(q10).value); }
if(q11!='') { hs[11]= parseInt(document.getElementById(q11).value); }
if(q12!='') { hs[12]= parseInt(document.getElementById(q12).value); }
if(q13!='') { hs[13]= parseInt(document.getElementById(q13).value); }

bandera=0;
for(i=1; i<=tt; i++)
{
if(hs[i]==0)  
{ 
bandera=1;

}
else
{
bandera=0;
}

}
if(bandera==1)
{ 
document.getElementById(q1).focus;
alert("Al menos ingrese un dato correcto");

}

}
//---------------------------------------
function entrada1(campo,may,men,exc,msj)
{
valor= document.getElementById(campo).value;	

if((valor>=parseFloat(men) && valor<=parseFloat(may)) || valor==parseFloat(exc))
{
	
}
else
{
alert(msj);
document.getElementById(campo).value='';
document.getElementById(campo).focus();	
}
	
}



////paraservixio de agua
function servicio1(s,c1,c2,c3)
{
 ss = document.getElementById(s);	
cc1 = document.getElementById(c1);
cc2 = document.getElementById(c2);
cc3 = document.getElementById(c3);

if(ss.value==1)
{
cc1.readOnly = false;
cc2.readOnly = true;
cc3.readOnly = true;
cc2.value='';
cc3.value='';
}

if(ss.value==2)
{
cc1.readOnly = true;
cc1.value='';
cc2.readOnly = false;
cc3.readOnly = false;
}


}

////Organización
function regla3() 
{

 campo = document.getElementById("s6_1_8");

 fila = document.getElementById("regla_b1");
 fila1 = document.getElementById("regla_b0");

if(campo.value==1)
{
 fila.style.display = "none"; 
 fila1.style.display = "none"; 

}
else
{
 fila.style.display = "";
 fila1.style.display = "";	
}

}

///PARA REMUNERACIONES
////para gradop  y año
function remuneracion1()
{
campo=document.getElementById('s7_1');
tt = document.getElementById('s7_1_t');	
hh = document.getElementById('s7_1_h');
mm = document.getElementById('s7_1_m');

pt = document.getElementById('s7_1_t_p');	
ph = document.getElementById('s7_1_h_p');
pm = document.getElementById('s7_1_m_p');
rp=document.getElementById('s7_1_r_p');

et = document.getElementById('s7_1_t_e');	
eh = document.getElementById('s7_1_h_e');
em = document.getElementById('s7_1_m_e');
ep=document.getElementById('s7_1_r_e');

sa=document.getElementById('s7_2');
td=document.getElementById('s7_3');
cd=document.getElementById('s7_3_c');


if(campo.value==1)
{
tt.readOnly = false;
hh.readOnly = false;
mm.readOnly = false;
pt.readOnly = false;

ph.readOnly = false;
pm.readOnly = false;
rp.readOnly = false;
et.readOnly = false;

eh.readOnly = false;
em.readOnly = false;
ep.readOnly = false;

ca.readOnly = false;
td.readOnly = false;
cd.readOnly = false;

}
else 
{
tt.readOnly = true;
hh.readOnly = true;
mm.readOnly = true;
pt.readOnly = true;

ph.readOnly = true;
pm.readOnly = true;
rp.readOnly = true;
et.readOnly = true;

eh.readOnly = true;
em.readOnly = true;
ep.readOnly = true;

ca.readOnly = true;
td.readOnly = true;
cd.readOnly = true;
}

}

function suma1(t,h,m)
{

to=document.getElementById(t).value;
ho=document.getElementById(h).value;
mu=document.getElementById(m).value;
n=parseInt(ho)+parseInt(mu);
if(parseInt(to)!=n) 
{   alert("El total no coincide con la suma de los campos");  
document.getElementById(t).focus();
}

}


////Financiamiento1
function regla4() 
{

campo = document.getElementById("s8_1_2a");
 f1 = document.getElementById("finance_1");
 f2 = document.getElementById("finance_2");
 f3 = document.getElementById("finance_3");
 f4 = document.getElementById("finance_4");
 f5 = document.getElementById("finance_5");
 f6 = document.getElementById("finance_6");

if(campo.value!='')
{
 f1.style.display = "none"; 
 f2.style.display = "none"; 
 f3.style.display = "none"; 
 f4.style.display = "none"; 
 f5.style.display = "none"; 
 f6.style.display = "none";
}
else

{
 f1.style.display = ""; 
 f2.style.display = ""; 
 f3.style.display = ""; 
 f4.style.display = ""; 
 f5.style.display = ""; 
 f6.style.display = "";
}

}

////Financiamiento2
function regla6() 
{

campo1 = document.getElementById("s8_1_4");
f0 = document.getElementById("finance_0");
 f1 = document.getElementById("finance_1");
 f2 = document.getElementById("finance_2");
 f3 = document.getElementById("finance_3");
 f4 = document.getElementById("finance_4");
 f5 = document.getElementById("finance_5");
 f6 = document.getElementById("finance_6");
 f7 = document.getElementById("finance_7");
 f8 = document.getElementById("finance_8");
 f9 = document.getElementById("finance_9");
 f10 = document.getElementById("finance_10");
 f11 = document.getElementById("finance_11");
 tt = document.getElementById("tabla_1");

if(campo1.value==1)
{
f0.style.display = "none"; 
 f1.style.display = "none"; 
 f2.style.display = "none"; 
 f3.style.display = "none"; 
 f4.style.display = "none"; 
 f5.style.display = "none"; 
 f6.style.display = "none";
 f7.style.display = "none"; 
 f8.style.display = "none";
 f9.style.display = "none"; 
 f10.style.display = "none";
 tt.style.display = "none";
 f11.style.display = "none";
}
else

{
f0.style.display = ""; 
 f1.style.display = ""; 
 f2.style.display = ""; 
 f3.style.display = ""; 
 f4.style.display = ""; 
 f5.style.display = ""; 
 f6.style.display = "";
 f7.style.display = ""; 
 f8.style.display = "";
 f9.style.display = ""; 
 f10.style.display = "";
 f11.style.display = ""; 
 tt.style.display = "";
}

}

////Financiamiento2
function regla5() 
{

campo = document.getElementById("s8_1_3");
 f1 = document.getElementById("finance_1");
 f2 = document.getElementById("finance_2");
 f3 = document.getElementById("finance_3");
 f4 = document.getElementById("finance_4");
 f5 = document.getElementById("finance_5");
 f6 = document.getElementById("finance_6");
 f7 = document.getElementById("finance_7");
 f8 = document.getElementById("finance_8");


if(campo.value==1)
{
 f1.style.display = "none"; 
 f2.style.display = "none"; 
 f3.style.display = "none"; 
 f4.style.display = "none"; 
 f5.style.display = "none"; 
 f6.style.display = "none";
 f7.style.display = "none"; 
 f8.style.display = "none";
 
}
else

{
 f1.style.display = ""; 
 f2.style.display = ""; 
 f3.style.display = ""; 
 f4.style.display = ""; 
 f5.style.display = ""; 
 f6.style.display = "";
 f7.style.display = ""; 
 f8.style.display = "";
}

}


////-------------------------------regla 4a
////Financiamiento1
function regla4a() 
{
campo = document.getElementById("s8_3_1");
 f5 = document.getElementById("finance_5");
 f6 = document.getElementById("finance_6");

if(campo.value!='')
{
 f5.style.display = "none"; 
 f6.style.display = "none";
}
else

{
 f5.style.display = ""; 
 f6.style.display = "";
}

}


////Conoce algún tipo de  seguro
function regla7() 
{
 campo3 = document.getElementById("s9_1");
 fila1 = document.getElementById("seguro1");
 fila2 = document.getElementById("seguro2");

if(campo3.value==1)
{
 fila1.style.display = "none"; 
 fila2.style.display = "none"; 

}
else
{
 fila1.style.display = "";
 fila2.style.display = "";	
}

}


////Calendario UNO
function regla8() 
{
 cal1 = document.getElementById("s9_4_1");
 fila1 = document.getElementById("calendario1");


if(cal1.value!=1)
{
 fila1.style.display = "none"; 


}
else
{
 fila1.style.display = "";
	
}

}

////Calendario dos
function regla9() 
{
 cal2 = document.getElementById("s9_5_1");
 fila1 = document.getElementById("calendario2");


if(cal2.value!=1)
{
 fila1.style.display = "none"; 


}
else
{
 fila1.style.display = "";

}

}


///Ha recibido capacitación
function regla10() 
{
 data = document.getElementById("s10_2");
 c1 = document.getElementById("capa1");
 c2 = document.getElementById("capa2");
 c3 = document.getElementById("capa3");
 c4 = document.getElementById("capa4");

if(data.value!=1)
{
 c1.style.display = "none"; 
 c2.style.display = "none"; 
 c3.style.display = "none"; 
 c4.style.display = "none"; 


}
else
{
 c1.style.display = ""; 
 c2.style.display = ""; 
 c3.style.display = ""; 
 c4.style.display = "";

}

}

///Ha recibido capacitación
function regla11() 
{
 data1 = document.getElementById("s10_6");
 a1 = document.getElementById("asistencia1");
 a2 = document.getElementById("asistencia2");
 a3 = document.getElementById("asistencia3");
 a4 = document.getElementById("asistencia4");

if(data1.value!=1)
{
 a1.style.display = "none"; 
 a2.style.display = "none"; 
 a3.style.display = "none"; 
 a4.style.display = "none"; 


}
else
{
a1.style.display = ""; 
a2.style.display = ""; 
a3.style.display = ""; 
a4.style.display = "";

}

}

//validamos numeros de hijos
////
function hijos(n) 
{ 

m=n.toString();

campo = document.getElementById(m).value;

for(i=1; i<=10; i++)
{

k=i.toString();

document.getElementById("hijo"+k).style.display = "none";	

}	


if(campo!='')
{

for(i=1; i<=campo; i++)
{

k=i.toString();

document.getElementById("hijo"+k).style.display = "";	

}	

}
}

function vgrado1(n,m,a)
{
ab = document.getElementById(n);
cb = document.getElementById(m).value;
campo=document.getElementById(a).value;
if(cb!='' && campo==3)
{
ab.value = '';
ab.readOnly = true;
cb.readOnly = false;
}
if(ab!='' && campo==3)
{
ab.value = '';
ab.readOnly = false;
cb.readOnly = true;
}
}

/////seccion 2 conyuge
function conyuge(v)
{
campo=document.getElementById(v).value;	
//document.getElementById("ec1").style.display = "";
if(campo>=3 && campo<=6)
{
document.getElementById('s2_22').focus();

}
else
{
document.getElementById('s2_20').focus();
	
}
}


function edad_m(aburrido,n)
{
cn=	document.getElementById(n);
cm = document.getElementById(aburrido);
if(cn.value!=0 && cn.value!='')
{
cm.readOnly = true;
cm.value='';
}
else
{
cm.readOnly = false;	
}

}

function edad_n(aburrido,n)
{
cn=	document.getElementById(n).value;
cm = document.getElementById(aburrido);
if(cn==2)
{
cm.readOnly = true;
cm.value = '';
}
else
{
cm.readOnly = false;	
}

}


function mayores(c,i)
{
campo=	document.getElementById(c).value;

if(campo<14)
{
va="s2_24_11_" + i.toString();
za="s2_24_11_" + i.toString() + "_o";
bb = document.getElementById(va);
bc = document.getElementById(za);
bb.readOnly = true;
bb.value = '';
bc.readOnly = true;
bc.value = '';
}
else
{
va="s2_24_11_" + i.toString();
za="s2_24_11_" + i.toString() + "_o";
bb = document.getElementById(va);
bc = document.getElementById(za);
bb.readOnly = false;
bc.readOnly = false;


}

}


function na1(a1,a2,a3,n)
{

c1=document.getElementById(a1).value;	
c2=document.getElementById(a1).value;
c3=document.getElementById(a3).value;
nn=c1+c2+c3;
if(nn==0) 
{ 
alert("Al menos seleccionar una alternativa"); 
document.getElementById(a3).focus();
}
}

function  na2(pre,n,cp)
{
u=document.getElementById(cp).value;
var p = new Array();
c=0;
for(i=1; i<=parseInt(n); i++)
{
p[i]=parseInt(document.getElementById(pre+i.toString()).value);	
c=c+p[i];
}
if(c==0 && u==0)
{
	
alert("Al menos seleccionar una alternativa"); 
document.getElementById(pre+i.toString()).focus();	
}

if(u=='' || u==' ')
{
alert("No deje en blanco este campo"); 
document.getElementById(pre+i.toString()).focus();	
}


}

function  nin(pre,n,cp)
{
u=document.getElementById(cp).value;
var p = new Array();
c=0;
for(i=1; i<=parseInt(n); i++)
{
p[i]=parseInt(document.getElementById(pre+i.toString()).value);	
c=c+p[i];
}

setTimeout(function() 
{ 
if(c==0 && (u==0 || u==''))
{ alert("Al menos seleccionar una alternativa"); document.getElementById(pre+i.toString()).focus();	return true;  }},1 );	

setTimeout(function() 
{ 
if(c>0 && (u==1 || u==''))
{ alert("No puede ingresar 1 en este campo, ingrese otro valor"); document.getElementById(pre+i.toString()).focus();	} },1);
}
///otro ecluyente
function  nino(pre,n,cp)
{
u=document.getElementById(cp).value;
var p = new Array();
c=0;
for(i=1; i<=parseInt(n); i++)
{
p[i]=parseInt(document.getElementById(pre+i.toString()).value);	
c=c+p[i];
}

setTimeout(function() 
{ 
if(c==0 && (u==0 || u==''))
{ alert("Al menos seleccionar una alternativa"); document.getElementById(pre+i.toString()).focus();	return true;  }},1 );	

}
//------------------------

function javas(e,a1,a2,a3,a4,a5)
{
v=document.getElementById(e).value;	
if(v==1)
{
a = document.getElementById(a1);
b= document.getElementById(a2);
c = document.getElementById(a3);
d= document.getElementById(a4);
e = document.getElementById(a5);

a.readOnly = false;
b.readOnly = false;
c.readOnly = false;
d.readOnly = false;
e.readOnly = false;

}
else
{
a = document.getElementById(a1);
b= document.getElementById(a2);
c = document.getElementById(a3);
d= document.getElementById(a4);
e = document.getElementById(a5);

a.readOnly = true;
b.readOnly = true;
c.readOnly = true;
d.readOnly = true;
e.readOnly = true;	
}
	
}

function saltar(campo,valor,cc)
{

v = document.getElementById(campo).value;

if(parseInt(v)==parseInt(cc))
{	

document.getElementById(valor).focus();	
}
if(cc=='')
{
document.getElementById(valor).focus();	
}
}

//---------------------
function saltar1(campo1,campo2,valor,cc,dd)
{

v1 = document.getElementById(campo1).value;
v2 = document.getElementById(campo2).value;

if((parseInt(v1)==parseInt(cc)) && (parseInt(v2)==parseInt(dd)))
{	

document.getElementById(valor).focus();	
}


}

//---------------------
function saltar_f(c1,c2,c3,c4)
{

v1 = document.getElementById(c1).value;
v2 = document.getElementById(c2).value;
v3 = document.getElementById(c3).value;
v4 = document.getElementById(c4).value;

if(parseInt(v1)==1 && parseInt(v2)==0 && parseInt(v3)==0 && parseInt(v4)==0)
{	
document.getElementById('s8_2_1').focus();	
}

if(parseInt(v1)==1 && parseInt(v2)==1 && parseInt(v3)==0 && parseInt(v4)==0)
{	
document.getElementById('s8_2_1').focus();	
}

if(parseInt(v1)==0 && parseInt(v2)==1 && parseInt(v3)==0 && parseInt(v4)==0)
{	
document.getElementById('s8_5_1').focus();	
}

if(parseInt(v1)==0 && parseInt(v2)==0 && parseInt(v3)==1 && parseInt(v4)==0)
{	
document.getElementById('s8_6_1').focus();	
}

if(parseInt(v1)==0 && parseInt(v2)==0 && parseInt(v3)==0 && parseInt(v4)==0)
{	
alert("Seleccione al menos una alternativa");
}

if(parseInt(v1)==0 && parseInt(v2)==0 && parseInt(v3)==0 && parseInt(v4)==1)
{	

alert("Guarde esta secci\u00f3n y pase a la siguiente");	
location.href ="#finish";
}


}


//---------------------
function saltar_edad(n,i)
{

nn = document.getElementById(n).value;



if(parseInt(nn)==0)
{	
document.getElementById("s2_24_4_"+i.toString()+"m").focus();	
}
else
{
document.getElementById("s2_24_5_"+i.toString()).focus();		
}

}


function salto(v,s)
{
va=	document.getElementById(v).value;

if(va!='')
{
document.getElementById(s).focus();	
}
}

function saltin(v,s,e,n)
{
va=	document.getElementById(v).value;
nn=document.getElementById(n).value;
if(va<=parseInt(e) && nn!='')
{
document.getElementById(s).focus();	
}
}


function saltar_b(campo,valor1,valor2)
{

v = document.getElementById(campo).value;

if(parseInt(v)==1)
{	
document.getElementById(valor1).focus();
}
if(parseInt(v)==2)
{
document.getElementById(valor2).focus();
}

if(parseInt(v)==0)
{
document.getElementById(valor2).focus();
}

}

//7avisar

function aviso(n,m)
{
if(document.getElementById(n).value=='')
{
alert(m);
document.getElementById(n).focus();	
}
}

//salto hijos

function salta_ie(anio,es,c1,c2,c3)
{
aan=document.getElementById(anio).value;
ees=document.getElementById(es).value;

if(ees==1)
{
document.getElementById(c1).focus();
}

if(aan>=14 && ees==2)
{
document.getElementById(c2).focus();
}

if(aan<14 && ees==2)
{
document.getElementById(c3).focus();
}
	
}

//salta seccion

function salta_s3(ca,va,sa)
{
campo=document.getElementById(ca).value;	

if(campo!=parseInt(va))
{
document.getElementById(sa).focus();	
}

}


function salta_pp(ca,s1,s2,s3)
{
campo=document.getElementById(ca).value;	

if(campo<=3)
{
document.getElementById(s1).focus();	
}
if(campo>3 && campo<8)
{
document.getElementById(s2).focus();	
}

if(campo==8)
{
document.getElementById(s3).focus();	
}

}


//salta vacio
function salta_va(c,s)
{
 nn=document.getElementById(c).value
if(nn!='')
{
 document.getElementById(s).focus();
}
}

//SALTAR SECCION V
function saltarv(c1,c2,c3)
{

v1 = document.getElementById(c1).value;
v2 = document.getElementById(c2).value;
v3 = document.getElementById(c3).value;


if((parseInt(v1)!=0 || parseInt(v2)!=0 )&& (parseInt(v3)==0) )
{	
document.getElementById('s5_6').focus();	
}

if((parseInt(v1)!=0 || parseInt(v2)!=0 )&& (parseInt(v3)==1) )
{	
document.getElementById('s5_2_4_h').focus();	
}


}

function salton(n,c)
{
if(	document.getElementById(n).value!='')
{
document.getElementById(c).focus();	
}
	
}

///sumar porcentaje
function  porcentaje1()
{
n1=0; n2=0; n3=0; n4=0;
if(document.getElementById('s8_6_1_1').value!='')
{
n1=parseInt(document.getElementById('s8_6_1_1').value);
}
if(document.getElementById('s8_6_2_1').value!='')
{
n2=parseInt(document.getElementById('s8_6_2_1').value);
}
if(document.getElementById('s8_6_3_1').value!='')
{
n3=parseInt(document.getElementById('s8_6_3_1').value);
}
if(document.getElementById('s8_6_4_1').value!='')
{
n4=parseInt(document.getElementById('s8_6_4_1').value);
}

total=n1+n2+n3+n4;

document.getElementById('s8_6_t_1').value=total+"%";
}

///logica salta cuando un campo es cero y otros es cero, o especifique

function saltarin1(v1,v2,s1,s2,p)
{

if(	document.getElementById(v1).value==1 && document.getElementById(v2).value==0 && p==0)
{
document.getElementById(s1).focus();	
}

if(	document.getElementById(v1).value==1 && document.getElementById(v2).value==1 && p==1)
{
document.getElementById(s1).focus();	
}

if(	document.getElementById(v1).value==0 && document.getElementById(v2).value==1 && p==1)
{
document.getElementById(s2).focus();	
}

if(	document.getElementById(v1).value==0 && document.getElementById(v2).value==0 && p==0)
{
document.getElementById(s2).focus();	
}
	
}

///-----------------------------------------
function  sec6(pre,cp,n)
{
u=document.getElementById(cp).value;
c=0;

if(u==1)
{
alert("Guarde esta secci\u00f3n y pase a la siguiente");
for(i=1; i<=parseInt(n); i++)
{
document.getElementById(pre+i.toString()).readOnly=true;	

}
}
else
{
for(i=1; i<=parseInt(n); i++)
{
document.getElementById(pre+i.toString()).readOnly=false;	

}	
}
}

// OTROS B
function otros_b(c,s1,s2)
{
u=document.getElementById(c).value;	

if(u==1)
{
document.getElementById(s1).focus();
}
if(u==0)
{
document.getElementById(s1).value='';
document.getElementById(s2).focus();	
}
}

////predio
function  preciov(ca1,ca2)
{
u=document.getElementById(ca1).value;
z=document.getElementById(ca2).value;
setTimeout(function() 
{ 
if(u==1 && (z=='' || z==' '))
{ alert("Debe ingresar el precio"); document.getElementById(ca2).focus();	return true;  }},1 );	

}