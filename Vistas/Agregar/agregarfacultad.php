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
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<title>Kiosko administrador</title>
</head>
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">INICIO</a></li>
        <li><a href="../Entidades/publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="../Entidades/horario.php">HORARIO</a></li>
        <li><a href="../Entidades/cuenta.php">CUENTA</a></li>
        <li><a href="../Entidades/facultad.php" id="qwerty">FACULTAD</a></li>
        <li><a href="../Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="../Entidades/registro.php">REGISTRO</a></li>
        <li><a href="../Entidades/carrera.php">CARRERA</a></li>  
        <li><a href="../Entidades/catedratico.php">CATEDRÁTICO</a></li>   
        <li><a href="../Entidades/ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="../Entidades/salir.php">SALIR</a></li>  
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
            <label><a class="text1">Nombre:</a></label><br>
            <input type="text" name="nombre"><br>
            <label><a class="text1">Sede:</a></label><br>
            <input type="text"name="sede"><br></fieldset>
        <input  type="submit"  value="Guardar" id="btnguardar" name="guardar" > <input type="reset" id="btnreset">
        </form>
    </div>
    </div>
</body>
 <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
