<?php
require_once("../../Conexiones/conexion.php");
    $consulta = "SELECT idExperienciaEducativa, Nombre FROM experienciaeducativa WHERE idCarrera = ".$_GET['id']."";

    $query = mysql_query($consulta);
  
    while ($fila = mysql_fetch_array($query)) {
        echo "<option value='";
        echo $fila['idExperienciaEducativa'];
        echo"'>";
        echo $fila['Nombre'];
        echo "</option>";
    };
?>

 
   