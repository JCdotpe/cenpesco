function cambiar_color_over(n)
{ 
for(i=1;i<=29; i++)
{
	
document.getElementById("r"+i.toString()).bgColor="#F5F5F5"
document.getElementById("r"+i.toString()).style.color="#F00";	
}

document.getElementById(n.toString()).bgColor="#E74601"
document.getElementById(n.toString()).style.color="#6A1500";

}

function abrir_pagina(send)
{

window.open("index.php?id="+send, "_top");


}