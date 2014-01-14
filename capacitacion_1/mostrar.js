var contador=0;
var actualiza = 6000;  
function faltan()
 { 
 contador=contador+1;
if(contador>=2)
{
startrefresh();
}
 setTimeout("faltan()",actualiza);
         
 } 

 faltan();