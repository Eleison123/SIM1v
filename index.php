<?php
require_once("Controller/logincuenta.php");
?>
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/login.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body>
	<form method="POST" name="login">
	<div id="recuadro">
	<tr>
		<td><label for="usuario">Usuario:</label></td>
	    <td><input type="text" placeholder="Nombre de Usuario" id="usuario" name="usuario"/></td>
	</tr>
	<br/>
	<br>
	<tr>
	    <td><label for="contrasenia">Contraseña:</label></td>
	    <td><input type="password"  placeholder="PASSWORD" id="contrasena"name="contrasena"/></td>
	</tr>
	<br>
	</div><div id="contenedor1"><img src="imagenes/log.png" id="efe"></div>
	<div id="botones">
		<input name="entrar"  class="boton"type="submit" value="Ingresar"/>
	    <input type="reset" class="boton" value="Restablecer"/>
	</form>
</div>
</body>
</html>
