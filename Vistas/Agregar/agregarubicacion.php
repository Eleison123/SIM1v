<?php require_once ("../../Controller/agregarcarrera.php"); ?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
<!-- JS -->
<script language="Javascript" type="text/javascript">
Begin
document.oncontextmenu = function(){return false}
</script>
<title>Agregar Ubicación</title>
</head>
<div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">Inicio</a></li>
        <li><a href="../Entidades/publicacion.php">Publicación</a></li>
        <li><a href="../Entidades/horario.php">Horarios</a></li>
        <li><a href="../Entidades/cuenta.php">Cuenta</a></li>
        <li><a href="../Entidades/facultad.php">Facultad</a></li>
        <li><a href="../Entidades/eeducativa.php">E.Educativa</a></li>
        <li><a href="../Entidades/registro.php">Registro</a></li>
        <li><a href="../Entidades/carrera.php">Carrera</a></li>  
        <li><a href="../Entidades/catedratico.php">Catedrático</a></li>
        <li><a href="../Entidades/catedratico.php">Ubicaciones</a></li>   
        <li><a href="../Entidades/salir.php">Salir</a></li> 
    </ul>
</nav>
</div>

</div>
<body>
    <div id="cuerpo">
        <figure>
            <img src="../../imagenes/agregarcarrera.png">
        </figure>
       

        
        <div id="bienvenida">
        <form method="post">
            <label><strong><a class="text1">Nombre:</a></strong></label><br>
            <input type="text" name="nombre" required><br>
            <label><strong><a class="text1">Descripción:</a></strong></label><br>
            <input type="textarea" name="desc">
        
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
        <input  type="submit"  value="Guardar" id="btnguardar" name="guardar" > <input type="reset" id="btnreset">
        </form>
    </div>
    </div>
</body>
    <footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Coatlicue
    </footer>
</html>
