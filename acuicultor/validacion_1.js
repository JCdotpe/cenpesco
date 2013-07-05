// solo numeros
function numeros(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[0-9]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}

//LETRAS DEL ALAFABETO
function letras(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron=/^[a-zA-Z \u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/;


    n = String.fromCharCode(k);
    return patron.test(n);

}

//Binarios
function duo(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[1-2]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}
////carga  codigo de ubigeo
function  ubigeo()
{
 document.getElementById("CD").value=document.getElementById("CCDD").value;
	
}

///---------------------
function carga_poblado()
{
document.getElementById("CEP").value=document.getElementById("COD_CCPP").value;	
document.getElementById("NOM_CCPP").value=document.getElementById("COD_CCPP").options[document.getElementById("COD_CCPP").selectedIndex].text;
}