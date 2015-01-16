<?php
require_once("../../conexiones/conexion.php");
@session_start();
$fac=$_SESSION['facultad'] ; 
$consulta = "SELECT * FROM horario WHERE idExperienciaEducativa = ".$_GET['id']." AND tipo = '1' ";
$query = mysql_query($consulta)or die(mysql_error());    
$var=0;
echo "<center><div class='marcascall'>";
  while ($fila = mysql_fetch_array($query)) { 
        if($fila!=""){
        echo "<table class='CSSTableGenerator'>";
        echo "<tr>";
        echo "<th><p class='xxxx'>Experiencia</p></th>";
        echo "<th><p class='xxxx'>Catedrático</p></th>";
        echo "<th><p class='xxxx'>Día</p></th>";
        echo "<th><p class='xxxx'>Hora Inicial</p></th>";
        echo "<th><p class='xxxx'>Hora Final</p></th>";
        echo"</tr>";
        echo "<tr>";
        ////////////////// materia  ////////////////
        $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$fila['idExperienciaEducativa']."";
        $resultadoma = mysql_query($consultama);
        $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
        //////////////////////////////////////////
        /////////// catedratico  //////////////
        $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$fila['idCatedratico']." ";
        $resultadoca = mysql_query($consultaca);
        $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filaca['nombre']." ";
        echo " ";
        echo "".$filaca['apellidopaterno']."";
        echo " ";
        echo "".$filaca['apellidomaterno']."</p></td>";
        echo"<td><p class='xxx'>".$fila['dia']." </p></td>";
        echo"<td><p class='xxx'>".$fila['horain']." </p></td>";
        echo"<td><p class='xxx'>".$fila['horafin']." </p></td>";
        echo "</tr>";
        $var=$var+1;
         echo"</table>";
        }
       
      }
        if($var==0){
          echo "<img  src='../../imagenes/nohorarios.png'>";
        }
       echo "</div></center>";
        

?>