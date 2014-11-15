<?php require_once ("../../Controller/agregarcatedratico.php"); ?>
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
<title>Agregar Catedrático</title>
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
        <li><a href="../Entidades/facultad.php">FACULTAD</a></li>
        <li><a href="../Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="../Entidades/registro.php">REGISTRO</a></li>
        <li><a href="../Entidades/carrera.php">CARRERA</a></li>  
        <li><a href="../Entidades/catedratico.php" id="qwerty">CATEDRÁTICO</a></li>
        <li><a href="../Entidades/ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="../Entidades/salir.php">SALIR</a></li>   
    </ul>
</nav>
</div>

</div></center>

<div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/catedratico.png"><br><br>
        </figure>
        <div id="bienvenida">
        
        <form method="post">
            <fieldset><legend><a class="text1">Información del Catedrático</a></legend>
            <label class="text1">Nombre:</label><br>
            <input type="text" name="nombre" required><br><br>
            <label class="text1">Apellido Paterno:</label><br>
            <input type="text" name="appaterno" required><br><br>
            <label class="text1">Apellido Materno:</label><br>
            <input type="text" name="apmater" required><br><br>
            
            <label class="text1">Correo:</label><br>
            <input type="e-mail" name="correo"><br><br>
        
         
        
    <?php
    echo "<label class='text1'> Facultad:</label><br>";

    echo "<select name='facultad' id='facultad' placeholder='facultad'>";
    //Preguntamos los nombres de las materias segun su idfacultad
    require_once("../../conexiones/conexion.php");
    
             @session_start();
            $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT  idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
                $resultado = mysql_query($sql) or die (mysql_error());
                $filass = mysql_fetch_array($resultado, MYSQL_BOTH);
                $id = $filass[0];

 $mysql="SELECT idfacultad, nombre from facultad where idfacultad='".$id."';";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    echo "<option value='".$row['idfacultad']."'>";
    echo $row['nombre'];
    echo "</option>";
}
echo "</select>";
?>
<br>
        </fieldset>
        <input  type="submit"  value="Guardar" id="btnguardar" name="guardar" > <input type="reset" id="btnreset">
        </form>
    </div>
    </div>
</body></div>
  <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
