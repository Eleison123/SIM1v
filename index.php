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
    
<body ><img src="imagenes/coatli2.png" id="logocoa">
    <div id="forma">
	<form method="POST" name="login" class="loger">
     
	<div id="recuadro" >
	
		<label for="usuario">CUENTA:</label><br>
	    <input type="text" placeholder="NOMBRE CUENTA" id="usuario" name="usuario">
	

	<br><br>
	
	    <label for="contrasena">CONTRASEÑA:</label><br>
	    <input type="password"  placeholder="PASSWORD" id="contrasena" name="contrasena">
	
	<br>
	</div>
	<center><div id="botones">
		<input name="entrar"  class="boton" type="submit" value="INGRESAR"/>
	    </center>
	</form>
</div>
    </div>
</body>
    
</html>
