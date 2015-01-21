<?php
require_once("../../Conexiones/conexion.php");
@session_start();
$fac=$_SESSION['facultad'] ; 
$consulta = "SELECT * FROM experienciaeducativa WHERE idCarrera = ".$_GET['id']." ORDER BY Nombre";
$query = mysql_query($consulta)or die(mysql_error());    
$var=0;

  while ($fila = mysql_fetch_array($query)) { 
        if($fila!=""){
         echo "<div class='marca'>";
         echo "<div id='materias' value='".$fila['idExperienciaEducativa']."' >
               <p class='textox'>".$fila['Nombre']." </p>
               </div>
               </div>";
                            $var=$var+1;
        }
       
      }
       
        

?>