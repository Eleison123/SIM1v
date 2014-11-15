<?php
	session_start();
	if(!isset($_SESSION['facultad'])){
		header("location:loginkiosko2.php");
	}
?>