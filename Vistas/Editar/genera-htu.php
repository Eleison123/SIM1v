<?php 
require_once("../conexiones/conexion.php");
    $consulta = "SELECT idtutoria,lugar,idcatedratico, idfecha FROM horariotutoria  ORDER BY idcatedratico";
    $query = mysql_query($consulta)or die(mysql_error());
 echo "<div class='marcas'>"; $var=0;
    while ($fila = mysql_fetch_array($query)) {
       $consultafech ="SELECT dia, horain,horafin FROM fecha WHERE idfecha=".$fila['idfecha']."";
        $resultadofech= mysql_query($consultafech);
        $filafech=mysql_fetch_array($resultadofech,MYSQL_BOTH);
        $horareg= date("H:i:s");
        $fechareg = date("Y-m-d");
        if($fechareg>$filafech['dia']){
       require_once("../conexiones/conexion.php");
          $res=mysql_query("DELETE from horariotutoria where idtutoria=".$fila['idtutoria']."")or die(mysql_error());
          mysql_close();
        }else{
  echo "<table class='CSSTableGenerator'>";
        echo "<tr> ";
  echo "<th><p class='xxxx'>Catedrático</p></td>";
  echo "<th><p class='xxxx'>Día</p></td>";
  echo "<th><p class='xxxx'>Hora Inicial</p></td>";
  echo "<th><p class='xxxx'>Hora Final</p></th>";
  echo "</tr>";
        echo "<tr> ";
        /////////// catedratico  //////////////7
        $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idcatedratico=".$fila['idcatedratico']." ";
        $resultadoca = mysql_query($consultaca);
        $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filaca['nombre']." ";
        echo " ";
        echo "".$filaca['apellidopaterno']."";
        echo " ";
        echo "".$filaca['apellidomaterno']."</p></td>";
        //////////////////////////////////////////////////////////////
        $consultafech ="SELECT dia, horain,horafin FROM fecha WHERE idfecha=".$fila['idfecha']."";
        $resultadofech= mysql_query($consultafech);
        $filafech=mysql_fetch_array($resultadofech,MYSQL_BOTH);
        echo"<td><p class='xxx'>".$filafech['dia']."</p></td>";
        echo"<td><p class='xxx'>".$filafech['horain']."</p></td>";
        echo"<td><p class='xxx'>".$filafech['horafin']."</p></td>";
        echo "</tr>";
      $var=$var+1;  
        
echo"</table>";
  
    }}
if ($var==0) {
  
  echo "<img src='imagenes/notutorias.png'>";
   
   mysql_close();
}

?>