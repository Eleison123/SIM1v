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
	<link rel="stylesheet" href="../../css/ubicacion.css">
        <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
    <script src="../../js/runtime.js"></script>
    <script src="../../js/croquis.js"></script>
<script language="Javascript" type="text/javascript">
//<![CDATA[
<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
  </head>
 <title>Kiosco FEI</title>
	</head>	
  <div id="cen" >
    <div id="tituu">
<h1><a id="ubicate">Ubicaciones</a><h1></div>
    <div id="regs" title="Atrás" ><a href="../principalkiosco.php"><img class="icon" src="../../imagenes/iconos_21.png"></a></div>
  </div>
  <body style="margin: 0; overflow: hidden">
  	<div >
    <div id="swiffycontainer" >
    </div>
</div>

    <script>
      
      var stage = new swiffy.Stage(document.getElementById('swiffycontainer'),
          swiffyobject, {  });
      
      stage.start();
    </script>
  </body>
</div>
</html>
