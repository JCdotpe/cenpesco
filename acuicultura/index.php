<?php  session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include("conexion.php");
include("verificador.php");
$ide=date('dmHis');
$frm=$_POST['frm'];


?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de registro de CENPESCO</title>
<style type="text/css">
@import url("estilos.css"); 
</style>
<script type="text/javascript" src="vista.js"></script>
<script type="text/javascript" src="ingreso_ubigeo.js"></script>
<script type="text/javascript" src="ingreso_ubigeo1.js"></script>
<script type="text/javascript" src="ingreso_ubigeo2.js"></script>
<script type="text/javascript" src="ingreso_ubicacion.js"></script>
<script type="text/javascript" src="ingreso_ubicacion1.js"></script>
<script type="text/javascript" src="ingreso_ubicacion2.js"></script>

<script type="text/javascript" src="validacion_1.js"></script>
<script type="text/javascript" src="ingreso_obligatorio.js"></script>

<script type="text/javascript" language="javascript">
    function convertEnterToTab() {
      if(event.keyCode==13) {
        event.keyCode = 9;
      }
    }
    document.onkeydown = convertEnterToTab;    
  </script>
  
<script type="text/javascript">
function validar(e){
tecla_codigo = (document.all) ? e.keyCode : e.which;
if(tecla_codigo==9)return true;
patron =/[0-9]/;
tecla_valor = String.fromCharCode(tecla_codigo);
return patron.test(tecla_valor);
};

////validar

function handleEnter (field, event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		var i;
		for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
				break;
		i = (i + 1) % field.form.elements.length;
		field.form.elements[i].focus();
		return false;
	} 
	else
	return true;
} 
//solo numeros
// solo numeros
function numeros(e)
{ 
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /[0-9]/;
    n = String.fromCharCode(k);
    return patron.test(n);

}


</script>
<script language="javascript">
function frm_s1()
{
///primer formulario
  if (document.getElementById("nform").value == "") {
        alert('¡Por favor, ingrese el número de formulario');
        document.getElementById("nform").focus();
        return false;
    } 
	else  
	if (document.getElementById("ccdd").value == '') {
        alert('¡Por favor, seleccione un departamento!');
        document.getElementById("ccdd").focus();
        return false;
	} else 
		if (document.getElementById("ccpp").value== '') {
        alert('¡Por favor, seleccione una provincia!');
        document.getElementById("ccpp").focus();
        return false;
	} else 
		if (document.getElementById("ccdi").value == '') {
        alert('¡Por favor, seleccione un distrito!');
        document.getElementById("ccdi").focus();
        return false;
	} else 
	  	if (document.getElementById("cod_ccpp").value == '') {
        alert('¡Por favor, seleccione un centro poblado!');
        document.getElementById("cod_ccpp").focus();
        return false;
	} else 
		if (document.getElementById("tac").value == "") {
        alert('¡Por favor, ingrese un tipo de actividad!');
        document.getElementById("tac").focus();
        return false;
	} else 
	 		 
	   {  
	      return true;
	 	}

}


////mostramos seccion I

</script>
<?php
////validacion de formularios
if($_SESSION['formulario']==1)
{

//$_SESSION['aviso']='¡Sección I guardado con exito!';
}

?>


</head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js" type="text/javascript"></script>
<body onLoad="javascript:llamada('formulario1.php', 'cabecera')"> 
<table width="980" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <th height="31" align="center" valign="middle" class="titulo_general" scope="col">
      <form id="form1" name="form1" method="post" action="variables1.php">
        FORMULARIO CENSAL DE ACUICULTURA <br>
        
          <?php
		 // $key=verificador($_SESSION['id1']);
		  
		  if($_SESSION['id1']!=NULL )
		  {
          ?>
          <label>
            <input name="button" type="submit" class="texto_mediano" id="button" value=" Registrar un nuevo formulario " />
          </label>
          <input name="frm" type="hidden" id="frm" value="13" />
          <input name="opc" type="hidden" id="opc" value="3" />
          <?php
		  }
		  ?>
     
        <a name="indizador" id="indizador"></a></p>
    </form></th>
  </tr>
</table>
 <div data-bind="nextFieldOnEnter:true">
 <div id="cabecera" class="division"></div>
 <table width="980" border="0" align="center">
   <tr>
     <td align="center" valign="middle"><span class="subtitulo"><a href="javascript:llamada('formulario1.php?a=<?php echo $ide; ?>', 'cabecera')" class="subtitulo">SECCIÓN I</a></a>&nbsp;</span>&nbsp; <a href="javascript:llamada('formulario2.php?a=<?php echo $ide; ?>&frm=2', 'contenedor')" class="subtitulo">SECCIÓN II</a> &nbsp;&nbsp;  <a href="javascript:llamada('formulario3.php?a=<?php echo $ide; ?>&frm=3', 'contenedor')" class="subtitulo">SECCIÓN III</a> &nbsp;&nbsp; <a href="javascript:llamada('formulario4.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN IV</a> &nbsp;&nbsp;  <a href="javascript:llamada('formulario5.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN V</a> &nbsp;&nbsp; <a href="javascript:llamada('formulario6.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN VI</a> &nbsp;&nbsp;  <a href="javascript:llamada('formulario7.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN VII</a> &nbsp;&nbsp; <a href="javascript:llamada('formulario8.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN VIII</a> &nbsp;&nbsp; <a href="javascript:llamada('formulario9.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN IX</a> &nbsp;&nbsp; <a href="javascript:llamada('formulario10.php?a=<?php echo $ide; ?>', 'contenedor')" class="subtitulo">SECCIÓN X</a> &nbsp;</td>
   </tr>
 </table>
 <div id="contenedor" class="division">
</div>
   <script type="text/javascript">
    ko.bindingHandlers.nextFieldOnEnter = {
        init: function(element, valueAccessor, allBindingsAccessor) {
            $(element).on('keydown', 'input, select', function (e) {
                var self = $(this)
                , form = $(element)
                  , focusable
                  , next
                ;
                if (e.keyCode == 13) {
                    focusable = form.find('input,a,select,button,textarea').filter(':visible');
                    var nextIndex = focusable.index(this) == focusable.length -1 ? 0 : focusable.index(this) + 1;
                    next = focusable.eq(nextIndex);
                    next.focus();
                    return false;
                }
            });
        }
    };

    ko.applyBindings({});
    </script>
  <p>&nbsp;</p>

  <p>&nbsp;</p>
  <p><br />
    <center>  <p class="texto_mediano"><?php echo $_SESSION['aviso'];    ?></p><center>
    <br />
  </p>
</div>
</body>
</html>
