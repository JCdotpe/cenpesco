<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AULA VIRTUAL CENPESCO</title>
<style type="text/css">
@import url("css/estilo.css"); 
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<?php 
 error_reporting(E_ALL ^ E_NOTICE);
$errorusuario=$_GET['errorusuario'];

if($errorusuario=='si')
{
$mensaje="Sus datos ingresados son incorrectos";
}

 ?>
<body>
<div class="cuerpo">
<div class="cabecera">
  <div class="cabecera1" id="cabecera1"><img src="fondos/cabecera.jpg" width="880" height="180" align="middle" /></div>
</div>
</div>
<div align="center" class="acceso">
<form name="form1" method="post" action="control.php">
  <p><br>
    <span class="titulo1"><strong>Acceso al Aula Virtual del Proyecto Censal</strong></span></p>
  <p>
    <label><span class="subtitulo"><strong><strong>Seleccione una opción:&nbsp;&nbsp;&nbsp; 
             <input name="tipo_usuario" type="radio" id="radio" value="2" style="width:25px;height:25px;border: 2px #039" />
    </strong></strong></span></label>
    <strong><span class="subtitulo">Alumno&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>
      <input type="radio" name="tipo_usuario" id="radio" value="1"  style="width:25px;height:25px;border: 2px #039" />
    </label>
    Docente      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  
    </strong>
  <p><span class="subtitulo1"><strong>Ingrese su DNI</strong></span><br />
    <label>
      <input name="usuario" type="text" class="titulo1" id="usuario" size="16" maxlength="8" />
    </label>
    <br /><br />
    <span class="subtitulo1"><strong>Ingrese su clave</strong></span><br />
    <label>
      <input name="clave" type="password" class="titulo1" id="clave" size="14" />
    </label>
    <br /><br />
    <br />
    <label>
      <input name="button" type="submit" class="titulo1" id="button" value=" Ingresar al Aula " onclick="return formulario()" />
    </label>
  <br />
  <br />
  <span class="aviso"><strong><?php echo $mensaje; ?></strong></span>  
  <p><br />
  </form>
</div>
<script language="javascript">
function formulario()
{
  if (document.form1.usuario.value == "") {
        alert('¡Por favor, ingrese su número de DNI!');
        document.form1.usuario.focus();
        return false;
    } else if (document.form1.clave.value == "") {
        alert('¡Por favor, escriba su clave!');
        document.form1.clave.focus();
        return false;
    } else 
	 {
	      return true;
	 	}

	 	
}
</script>
</body>
</html>