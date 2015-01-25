<?php
 require_once("../../Controller/agregareeducativa.php");
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
<title>Experiencia Educativa</title>
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
        <li><a href="../Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a>/</a></li>
        <li><a>AGREGAR E.EDUCATIVA</a></li>
    </ul>
</nav>
</div>

</div></div></center>

<body>
    <div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/e-educativa.png"><br><br>
        </figure>
        

        
        
      <form method="POST">
        <fieldset><legend><a class="text1">Datos de Materia</a></legend>
            <!-- <label><a class="text1">NRC:</a></label><br>
            <input type="text" name="nrc" placeholder="NRC Vigente" maxlength="5"><br>
            <label><a class="text1">NRC ANT:</a></label><br>
            <input type="text" name="nrc98" placeholder="NRC Anterior" maxlength="5"><br>
            <label><a class="text1">Bloque:</a></label><br>
            <input type="text" name="bloque" placeholder="Ejemplo: B7" maxlength="2"><br>
            <label><a class="text1">Sección:</a></label><br> -->
            <!-- <input type="text" name="seccion" placeholder="Ejemplo: S1" maxlength="2"><br> -->
            <label><a class="text1">Nombre:</a></label><br>
            <input type="text" name="nombre" placeholder="Nombre de la Experiencia Educativa ">  <br>     

                        <?php 
                         require_once("../../Conexiones/conexion.php");
                         @session_start();
                         //Preguntamos quien es el administrador para obtener la "idfacultad"
                            $nombreadmin = $_SESSION['nombreUsuario'];
                            $sql = "SELECT idFacultad FROM cuenta WHERE Usuario='".$nombreadmin."';";    
                            $resultado = mysql_query($sql) or die(mysql_error());
                            $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
                            $fac = $fil[0];
                        
                            ?>
   
<label><a class="text1">Carrera:</a></label><br>

  <?php  
   echo "<select name='carrera'>";
    $caread="SELECT idCarrera, Nombre , idFacultad FROM carrera WHERE idFacultad = '".$fac."';";
    $pregunta= mysql_query($caread) or die(mysql_error());
    
        while ($listado=mysql_fetch_array($pregunta)) {
            echo "<option value='".$listado['idCarrera']."'>";
            echo $listado['Nombre'];
            echo "</option>";
        }
        echo "</select><br>";

?>
</fieldset>
<center><input type="submit"  value="GUARDAR" id="btnguardar" name="guardar"></center>
       
    </div>
    </form></div>
</body>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>