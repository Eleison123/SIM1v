<?php 
require_once("../seguridad.php");
require_once("../../Controller/agregarcuenta.php"); ?>

<!DOCTYPE html>
<html lang="es">
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
<title>Agregar Cuenta</title>
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
        <li><a href="../Entidades/cuenta.php">CUENTA</a></li>
        <li><A>/</A></li>  
        <li><a>AGREGAR CUENTA</a></li>
    </ul>
</nav>
</div>
</div></center>
<body>
</div>
    <div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/cuenta.png"><br><br>
        </figure>
        <div id="bienvenida">
        
        <form method="post">
            <fieldset><legend><a class="text2">Datos Usuario</a></legend>
            <label class="text1">Nombre:</label><br>
            <input type="text" name="nombre"><br><br>
            <label class="text1">Contraseña:</label><br>
            <input type="password"name="contrasena"maxlength="10"><br><br>
            <input type="hidden" name="tipo"maxlength="10" value="1">
        <!--
<label class="text1">Tipo:</label><br>
            <input id="tipo" type="radio" name="tipo" value="1"><a class="text1">Privilegios: Agregar,Editar, Eliminar y Hacer Reportes </a><br>
            <input id="tipo" type="radio" name="tipo" value="2"><a class="text1">Privilegios: Agregar, Editar, Eliminar</a></br>
            <input id="tipo" type="radio" name="tipo" value="3"><a class="text1">Privilegios: Agregar y Editar</a></br>
            <br><br>
        -->
    <?php
    echo "<label class='text1'> Facultad:</label><br>";
    echo "<select name='facultad' id='facultad' placeholder='facultad'>";
    //Preguntamos los nombres de las materias segun su idfacultad
    require_once("../../conexiones/conexion.php");
 $mysql="SELECT idfacultad, nombre FROM facultad;";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    echo "<option value='".$row['idfacultad']."'>";
    echo $row['nombre'];
    echo "</option>";
}
echo "</select>";
?>
<br></fieldset>
        
        <input  type="submit"  value="GUARDAR" id="btnguardar" name="guardar" > 
        </form>
    </div>
    </div>
</body>
   <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
