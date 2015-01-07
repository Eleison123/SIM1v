<?php
require_once("../../conexiones/conexion.php");
    $consulta = "SELECT * FROM horario WHERE idcarrera = ".$_GET['id']." AND tipo = '6'  ORDER BY idExperienciaEducativa";
    $query = mysql_query($consulta)or die(mysql_error());
    echo "<div class='marcas'>";
     $var=0;
 while ($fila = mysql_fetch_array($query)) {
    
    
       $fechareg = date("Y-m-d");
if($fechareg>$fila['fechavig']){
       @require_once("../../conexiones/conexion.php");
     
          $res=mysql_query("DELETE from horario where idHorario=".$fila['idHorario'].";")or die(mysql_error());
          mysql_close();
        }else{
 
  echo "<table class='CSSTableGenerator'>";
  
        echo "<tr> ";
  echo "<th><p class='xxxx'>Periodo</p></th>";
  echo "<th><p class='xxxx'>Experiencia</p></th>";
  echo "<th><p class='xxxx'>Catedrático</p></th>";
  echo "<th><p class='xxxx'>Día</p></th>";
  echo "<th><p class='xxxx'>Hora Inicial</p></th>";
  echo "<th><p class='xxxx'>Hora Final</p></th>";
  echo "</tr>";
        echo "<tr> ";
       
        echo"<td><p class='xxx'>".$fila['periodo']."</p></td>";
        ////////////////// materia  ////////////////
        $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$fila['idExperienciaEducativa']."";
        $resultadoma = mysql_query($consultama);
        $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
        //////////////////////////////////////////
        /////////// catedratico  //////////////7
        $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idcatedratico=".$fila['idcatedratico']." ";
        $resultadoca = mysql_query($consultaca);
        $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filaca['nombre']." ";
        echo " ";
        echo "".$filaca['apellidopaterno']."";
        echo " ";
        echo "".$filaca['apellidomaterno']."</p></td>";
        $consultafech ="SELECT dia, horain,horafin FROM fecha WHERE idfecha=".$fila['idfecha']."";
        $resultadofech= mysql_query($consultafech);
        $filafech=mysql_fetch_array($resultadofech,MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filafech['dia']." </p></td>";
        echo"<td><p class='xxx'>".$filafech['horain']." </p></td>";
        echo"<td><p class='xxx'>".$filafech['horafin']." </p></td>";
        echo "</tr>";
        
        
        $var=$var+1;

    }

  }
echo"</table>";
 if ($var==0) {

  echo "<img src='../../imagenes/nohorarios.png'>";
 
}
 echo "</div>";
 $var="";
 mysql_close();

?>