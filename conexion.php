<?php
	$host = "127.0.0.1";
	$bd = "kiosco";
	$usuario = "root";//Poner usuario
	$password = "";//Cambiar password
	$conexion = mysql_connect($host, $usuario, $password);
	mysql_select_db($bd, $conexion);
	
?>