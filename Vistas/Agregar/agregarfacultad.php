<?php
require_once ("../../Controller/agregarfacultad.php");
    ?>

<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
     <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<title>Facultad</title>
</head>
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">INICIO</a></li>
        <li><a>/</a></li>
        <li><a href="../Entidades/facultad.php">FACULTAD</a></li>
       <li><a>/</a></li>
        <li><a id ="qwerty">AGREGAR FACULTAD</a></li>
    </ul>
</nav>
</div>

</div>
</div></center>

<body>
    <div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/facultad.png"><br><br>
        </figure>
        <tr>
          

        <div id="bienvenida">
        <form method="post">
            <fieldset>
            <label><a class="text1">Nombre*</a></label><br>
            <input type="text" name="nombre"><br>
            <label><a class="text1">Campus*</a></label><br>
            <input type="text"name="sede"><br></fieldset>
        <center><input  type="submit"  value="GUARDAR" id="btnguardar" name="guardar" ></center>
        </form>
    </div>
    </div>
</body>
 <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
