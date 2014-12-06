<?php require_once ("../../Controller/agregarubicaciones.php"); ?>
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
Begin
document.oncontextmenu = function(){return false}
</script>
<title>Ubicación</title>
</head>

<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php" >INICIO</a></li>
        <li><a>/</a></li>   
        <li><a href="../Entidades/ubicaciones.php">UBICACIÓN</a></li>   
        <li><a>/</a></li>
        <li><A>AGREGAR UBICACIÓN</A></li>
    </ul>
</nav>
</div>

</div></center>
<body>
    <div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/ubicaciones.png"><br><br>
        </figure>
       

        
        <div id="bienvenida">
        <form method="post">
            <fieldset>
            <label><strong><a class="text1">Nombre:</a></strong></label><br>
            <input type="text" name="nombre" required><br><br>
            <label><strong><a class="text1">Descripción:</a></strong></label><br>
            <textarea name="descripcion"></textarea>
        
            <?php
            require_once("../../conexiones/conexion.php");
             @session_start();
            $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT  idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
                $resultado = mysql_query($sql) or die (mysql_error());
                $filass = mysql_fetch_array($resultado, MYSQL_BOTH);
                $id = $filass[0];

           
            $mysqlw="SELECT nombre FROM facultad WHERE idfacultad='".$id."';";
            $resulx=mysql_query($mysqlw) or die(mysql_error());
                $filaxs = mysql_fetch_array($resulx, MYSQL_BOTH);
                $fact = $filaxs[0];

                echo "<br><br><strong><a class='text1'>Facultad:</a></strong><br><a class='text1'>".$fact."</a>";
                echo "<br>";
            echo "<br><br>";
            ?>
            </fieldset>
        <input  type="submit"  value="GUARDAR" id="btnguardar" name="guardar" >
        </form>
    </div>
    </div>
</body>
    <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
