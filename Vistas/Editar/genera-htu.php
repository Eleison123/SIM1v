<?php 
require_once("../../Conexiones/conexion.php");
 @session_start();
$fac=$_SESSION['facultad'] ; 
    $consulta = "SELECT * FROM horario WHERE idFacultad = ".$fac." AND tipo = '5'  ORDER BY idcatedratico";
    $query = mysql_query($consulta)or die(mysql_error());
   $var=0;
    while ($fila = mysql_fetch_array($query)) {
        $horareg= date("H:i:s");
        $fechareg = date("Y-m-d");
        if($fechareg>$fila['dia']){
        require_once("../Conexiones/conexion.php");
        $res=mysql_query("DELETE from horario where idHorario=".$fila['idHorario']."")or die(mysql_error());
          mysql_close();
        }else{
          echo "<div class='marcas'>";
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
        echo"<td><p class='xxx'>".$fila['dia']."</p></td>";
        echo"<td><p class='xxx'>".$fila['horain']."</p></td>";
        echo"<td><p class='xxx'>".$fila['horafin']."</p></td>";
        echo "</tr>";
      $var=$var+1;  
        
echo"</table>";
  
    }}
if ($var==0) {
  
  echo "<div class='marcascall'><img src='../../imagenes/nohorarios.png'></div>";
   
   mysql_close();
}

?>