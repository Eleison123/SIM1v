<?php

 
require_once("../conexiones/conexion.php");
 session_start();

    $consulta = "SELECT idcarrera, nombre, idfacultad FROM carrera WHERE idfacultad = ".$_SESSION['facultad']." ";

    $query = mysql_query($consulta)or die(mysql_error());
  
    while ($fila = mysql_fetch_array($query)) {
        echo "<div class='marca'>";
        echo "<div id='carreras' value='";
        echo $fila['idcarrera'];
        echo"'>";
        echo "<p class='textox'>";
        echo $fila['nombre'];
        echo "</p>";
        echo "</div>";
        echo "</div>";

    };

 

?>