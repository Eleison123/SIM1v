<?php
include"seguridadkiosko2.php";
?>

<!DOCTYPE HTML>
<html lang="es">
<!-- Metas -->
<meta charset="utf-8"> 
<meta name=viewport content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="300000">
<link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/png" />
<title>Sistema Interactivo de Mensajes</title>
<!-- CSS -->
<link rel="stylesheet" href="../css/anuncio2.css">
<!-- JS -->
<script src="../js/jquery-1.11.0.min.js"></script>
<script src="../JS comprimido/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#body1').load("Kiosco/anuncio1kiosco.php");
});
</script>
<script type="text/javascript">
///////////// Recarga avisos prioridad alta,ahora cada 5min ////////////////
var tiempoa =setInterval(function(){
	$('#body1').load("Kiosco/anuncio1kiosco.php");
},300000);
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#body2').load("Kiosco/anuncio2kiosco.php");

});</script>
<script type="text/javascript">
////////////// Recarga avisos prioridad baja,media cada 5 min ////////////7 
var tiempoap =setInterval(function(){
	$('#body2').load("Kiosco/anuncio2kiosco.php");
},300000);
</script>

 <title>Kiosko FEI</title>
	</head>	
	<div id="todo">
<body> 
	<div id="body1"></div>
	<div id="body2"></div>
	</body>
</div>
</html>
