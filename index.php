<?php
require_once("Controller/logincuenta.php");
?>
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/png" />
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
<title>Bienvenido a SIM</title>
</head>
<body>
	<form method="POST" name="login" >
        <img src="imagenes/logocoa.jpg" id="logocoa">
	<div id="recuadro">
	
		<label for="usuario">CUENTA:</label>
	    <input type="text" placeholder="NOMBRE CUENTA" id="usuario" name="usuario">
	
	<br/>
	<br><br>
	
	    <label for="contrasenia">CONTRASEÑA:</label>
	    <input type="password"  placeholder="PASSWORD" id="contrasena"name="contrasena">
	
	<br>
	</div>
	<div id="botones">
		<input name="entrar"  class="boton" type="submit" value="INGRESAR"/>
	    <input type="reset" class="boton" value="RESET"/>
	</form>
</div>
</body>
</html>
