<?php
include"seguridadkiosko.php";
?>

<!DOCTYPE HTML>
<div id="pantalla">
<html leng="es">
	<head>
<!-- Metas -->
	<meta charset="utf-8"> 
	<meta name="viewport" content=" user-scalable=no">
<!-- CSS -->
	<link rel="stylesheet" href="../css/estilo.css">
<!-- JS -->

<script src="../js/jquery-1.11.0.min.js"></script>
<script src="../JS comprimido/jquery.cycle.all.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('#body1').load("Kiosco/anuncio1kiosko.php");
});
</script>

<script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#rotar').cycle({
			fx:     'scrollLeft',
			timeout: 30000,
			delay:  -3000
		});
	});    
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#container').hide();
	$('#container').fadeIn('slow');
});
</script>

<script type="text/javascript">
///////////// Recarga avisos prioridad alta,ahora cada 5min ////////////////
var tiempoa =setInterval(function(){
	$('#body1').load("Kisco/anuncio1kiosko.php");
},300000);

</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#body2').load("Kiosco/anuncio2kiosko.php");

});</script>
<script type="text/javascript">
////////////// Recarga avisos prioridad baja,media cada 5 min ////////////7 
var tiempoap =setInterval(function(){
	$('#body2').load("Kiosco/anuncio2kiosko.php");
},300000);

</script>

 <title>Sistema Interactivo de Mensajes</title>
	</head>	
	
  <div id="cen" >
	  <div id="cont">
             <div class="botonera" id="uno" title="Todas las publicaciones">
			<a href="Kiosco/avisoskiosko.php"><img class="icon" src="../imagenes/avisosk.png"></a>
			
		    </div>
            
            <div class="botonera" id="dos" title="Informácion de ubicaciones">
            <a href="Kiosco/dondekiosko.php"><img class="icon" src="../imagenes/ubicacionesk.png"></a>
		    </div>
            
            
            <div class="botonera" id="tres" title="Horarios diversos">
			<a href="Kiosco/horarioskiosco.php"><img class="icon" src="../imagenes/horariosk.png"></a>
		    </div>
            </div>
  </div>
<body> 
	<div id="body1">
	
                   </div>
	<div id="body2">
 
   
    </div>
	</body>
</div>
</html>
