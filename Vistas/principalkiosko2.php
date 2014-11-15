<?php
include"seguridadkiosko2.php";
?>

<!DOCTYPE HTML>
<html lang="es">
	<head>
<!-- Metas -->
<meta charset="utf-8"> 
<meta name=viewport content="width=device-width, initial-scale=1">
	
<!-- CSS -->
	<link rel="stylesheet" href="css/estilo2.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap-responsive.css">
<!-- JS -->

<script src="js/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('#body1').load("anuncio1kiosko.php");
});
</script>

<script type="text/javascript">
///////////// Recarga avisos prioridad alta,ahora cada 5min ////////////////
var tiempoa =setInterval(function(){
	$('#body1').load("anuncio1kiosko.php");
},300000);

</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#body2').load("anuncio2kiosko.php");

});</script>
<script type="text/javascript">
////////////// Recarga avisos prioridad baja,media cada 5 min ////////////7 
var tiempoap =setInterval(function(){
	$('#body2').load("anuncio2kiosko.php");
},300000);

</script>

 <title>Kiosko FEI</title>
	</head>	
	<div id="todo">
<body> 
	<div id="body1">
	
                   </div>
	<div id="body2">
 
   
    </div>
	</body>
</div>
</html>
