<?php

 
require_once("../../conexiones/conexion.php");
 

    $consulta = "SELECT * FROM horario WHERE idCarrera = ".$_GET['id']." AND tipo = '2' OR tipo = '3' OR tipo = '4' ORDER BY idExperienciaEducativa";
    $query = mysql_query($consulta)or die(mysql_error());
  echo "<div class='marcas'>";
 $var=0;
  
    while ($fila = mysql_fetch_array($query)) { 
           $fechareg = date("Y-m-d");
if($fechareg>$fila['fechavig']){
       @require_once("../conexiones/conexion.php");
      
          $res=mysql_query("DELETE from horarioexamenes where idhorarioexamen=".$fila['idhorarioexamen'].";")or die(mysql_error());
          mysql_close();
        }else{

      echo "<table class='CSSTableGenerator'>";
        echo "<tr> ";
  echo "<th><p class='xxxxx'>Experiencia</p></th>";
 

        ////////////////// materia  ////////////////
        $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$fila['idmateria']."";
        $resultadoma = mysql_query($consultama);
        $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
        //////////////////////////////////////////
         echo "<th><p class='xxxxx'>Catedrático</p></th>";
        /////////// catedratico  //////////////7
        $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idcatedratico=".$fila['idcatedratico']." ";
        $resultadoca = mysql_query($consultaca);
        $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filaca['nombre']." ";
        echo " ";
        echo "".$filaca['apellidopaterno']."";
        echo " ";
        echo "".$filaca['apellidomaterno']."</p></td>";
        echo "</tr>";
        //////////////////////////////////////////////////////////////
        echo"<tr>";
        echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
        echo "<th><p class='xxxxx'>Hora </p></th>";
        echo "<th><p class='xxxxx'>Lugar </p></th>";
        echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
        echo"</tr>";
        echo "<tr>";
        echo"<td><p class='xxx'>".$fila['fechaor']."</p></td>";
        echo"<td><p class='xxx'>".$fila['horaor']."</p></td>";
        echo"<td><p class='xxx'>".$fila['lugaror']."</p></td>";
        echo"<td><p class='xxx'>".$fila['actaor']."</p></td>";
        echo "</tr>";
        //////////////////////////
        echo"<tr>";
        echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
        echo "<th><p class='xxxxx'>Hora</p></th>";
        echo "<th><p class='xxxxx'>Lugar</p></th>";
        echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
        echo"</tr>";
        echo "<tr>";
        echo"<td><p class='xxx'>".$fila['fechaex']."</p></td>";
        echo"<td><p class='xxx'>".$fila['horaex']."</p></td>";
        echo"<td><p class='xxx'>".$fila['lugarex']."</p></td>";
        echo"<td><p class='xxx'>".$fila['actaex']."</p></td>";
        echo "</tr>";
        ////////////////////////////////////
        echo"<tr>";
        echo "<th><p class='xxxxx'>Fecha Titulo</p></th>";
        echo "<th><p class='xxxxx'>Hora</p></th>";
        echo "<th><p class='xxxxx'>Lugar</p></th>";
        echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
        echo"</tr>";
        echo "<tr>";
        echo"<td><p class='xxx'>".$fila['fechati']."</p></td>";
        echo"<td><p class='xxx'>".$fila['horati']."</p></td>";
        echo"<td><p class='xxx'>".$fila['lugarti']."</p></td>";
        echo"<td><p class='xxx'>".$fila['actati']."</p></td>";
        echo "</tr>";
        /////////////////////////////

        
        
        
        
        echo"</table>";
        echo "<br>";
$var=$var+1;
    }}
if ($var==0) {
  
  echo "<img src='../../imagenes/nohorarios.png'>";
 
}
 echo "</div>";

?>