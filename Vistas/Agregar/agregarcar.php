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
<title>Agregar Carrera</title>
</head>
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
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

</div></center>
<body>
    <div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/carrera.png"><br><br>
        </figure>
       

        
        <div id="bienvenida">
        <form method="post">
            <label><a class="text1">Nombre:</a></label>
            <input type="text" name="nombre" required><br><br>
            <label><a class="text1">Facultad:</a></label>
        
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

                echo "<a class='text1'>".$fact."</a>";
                echo "<br>";
                echo "<a class='text1'>*La carrera se guardara en la Facultad correspondiente del administrador.</a>";
            echo "<br><br>";
            ?>
        <input  type="submit"  value="Guardar" id="btnguardar" name="guardar" > <input type="reset" id="btnreset">
        </form>
    </div>
    </div>
</body></div>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
