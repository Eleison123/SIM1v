<?php
	@session_start();
	if(!isset($_SESSION['nombreUsuario'])){
		header("location:../index.php");
	}
?>