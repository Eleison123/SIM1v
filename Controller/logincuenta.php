<?php
if(@$_POST['entrar']){
	require_once("Conexiones/conexion.php");
	if($_POST['usuario']){
		$usuario = mysql_real_escape_string($_POST['usuario']);
        $usuario = filter_var($usuario, FILTER_SANITIZE_SPECIAL_CHARS);
	}
	if($_POST['contrasena']){
		$contrasenia = mysql_real_escape_string($_POST['contrasena']);
        $contrasenia = filter_var($contrasenia, FILTER_SANITIZE_SPECIAL_CHARS);
	}
    $salt='/$fei$';
    //$contrasenia=sha1($contrasenia);
	$contrasenia=sha1($salt . $contrasenia);
	$sql = "SELECT Usuario, Contrasena, idFacultad FROM cuenta WHERE Usuario='".$usuario."' and Contrasena='".$contrasenia."';";	
	$resultado = mysql_query($sql)or die (mysql_error());
	mysql_close();
	$fila = mysql_fetch_array($resultado, MYSQL_BOTH);
	$nombreUsuario = $fila[0];
	$passUsuario = $fila[1];
	$facultad = $fila[2];
	if(($usuario == $nombreUsuario) && ($contrasenia == $passUsuario)){
		session_start();
		$_SESSION['nombreUsuario'] = $usuario;
		$_SESSION['passUsuario'] = $contrasenia;
		$_SESSION['facultad'] = $facultad; 
		header("location:Vistas/pagprin.php");
	}else{
		echo "<script>alert('Usuario y/o Contraseña incorrectos')</script>";
		
	}
}
?>