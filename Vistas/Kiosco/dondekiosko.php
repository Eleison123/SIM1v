<?php
include "../seguridadkiosko.php";
?>

<!DOCTYPE HTML>
<div id="pantalla">
<html leng="es">
	<head>
<!-- Metas -->
	<meta charset="utf-8"> 
	
<!-- CSS -->
	<link rel="stylesheet" href="../../css/estilo.css">
        <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
    <script src="../../js/runtime.js"></script>
    <script src="../../js/croquis.js"></script>
  <script language="Javascript" type="text/javascript">
Begin
document.oncontextmenu = function(){return false}
</script>
  </head>
 <title>Kiosko FEI</title>
	</head>	
  <div id="cen" >
    <div id="tituu">
<h1><a id="ubicate">Ubicaciones</a><h1></div>
            <div class="botonera" id="regs" title="Atrás" >
			<a href="../principalkiosko.php"><img class="icon" src="../../imagenes/iconos_21.png"></a>
			
		    </div>
  </div>
  <body style="margin: 0; overflow: hidden">
  	<div >
    <div id="swiffycontainer" >
    </div>
</div>
<script>
$(document).ready(function(){
	$('#swiffycontainer').hide();
	$('#swiffycontainer').fadeIn('slow');
});
</script>
    <script>
      
      var stage = new swiffy.Stage(document.getElementById('swiffycontainer'),
          swiffyobject, {  });
      
      stage.start();
    </script>
  </body>
</div>
</html>
