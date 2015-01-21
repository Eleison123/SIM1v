<?php
require_once("../Conexiones/conexion.php");
    $consulta = "SELECT idcarrera FROM materia WHERE idmateria = ".$_GET['id']."";

    $sqlr=mysql_query($consulta);
     $fil = mysql_fetch_array($query, MYSQL_BOTH);
    $fac = $fil[0];
    $sqle="SELECT idcarrera,nombre FROM carrera where idcarrera=".$fac."";
  $query = mysql_query($sqle);
    while ($fila = mysql_fetch_array($query)) {

        echo "<option value='";
        echo $fila['idcarrera'];
        echo"'>";
        echo $fila['nombre'];
        echo "</option>";
    };
?>
