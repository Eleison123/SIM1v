<?php 
///////////////////////
require_once("../../conexiones/conexion.php");
@session_start();
$nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad from Cuenta where usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];

    $sqlmater="SELECT * FROM horario WHERE idExperienciaEducativa = ".$_GET['id']." ";
    $resulmater=mysql_query($sqlmater) or die (mysql_error());
 echo "<div  class='experiencias'>";    
        echo "<div class='regreso'>Regresar</div><br><br><br>";
        require_once("../../conexiones/conexion.php");
         @session_start();
        echo "<div id='contenedor_carrera'>";
        echo "<table>";
        echo"<tr>";
        echo"
                            <th>NRC</th>
                            <th>NRC ANT</th>
                            <th>Experiencia</th>
                            <th>Catedrático</th>
                            <th>Tipo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </tr>";
    while ($mater=mysql_fetch_array($resulmater)){ 
    ///////////////////
    
       
        //Preguntamos los nombres de las materias segun su idfacultad
        
                                   echo "<tr>";
                                    $mysqlm="SELECT nombre FROM experienciaeducativa WHERE idExperienciaEducativa = '".$mater['idExperienciaEducativa']."'";
                                    $mysqlc="SELECT nombre,apellidomaterno,apellidopaterno FROM catedratico WHERE idCatedratico='".$mater['idCatedratico']."'";
                                    $resul1=mysql_query($mysqlm) or die(mysql_error());
                                    $resul2=mysql_query($mysqlc) or die(mysql_error());
                                    while ($m=mysql_fetch_array($resul1)) {

                                    echo "<td><a class='text20'>".$mater['NRC']."</a></td>";

                                    echo "<td><a class='text20'>".$mater['NRCANT']."</a></td>";

                                    echo "<td><a class='text20'>".$m['nombre']."</a></td>";
                                        }
                                    while ($c=mysql_fetch_array($resul2)) {
                                        echo "<td><a class='text20'>".$c['nombre']."</a>";
                                        echo "<a class='text20'> ".$c['apellidopaterno']." </a>";
                                        echo "<a class='text20'>".$c['apellidomaterno']."</a></td>";
                                    }
                                    echo "<td>";
                                    if ($mater['tipo']==1){ echo "<a class='text20'>Escolar</a></td>";}
                                    if ($mater['tipo']==2){ echo "<a class='text20'>Ordinario</a></td>";}
                                    if ($mater['tipo']==3){ echo "<a class='text20'>Extraordinario</a></td>";}
                                    if ($mater['tipo']==4){ echo "<a class='text20'>Título</a></td>";}
                                    if ($mater['tipo']==5){ echo "<a class='text20'>Tutoría</a></td>";}
                                    if ($mater['tipo']==6){ echo "<a class='text20'>Intersemestral</a></td>";}
                                   
                        echo "<td>

 <form  method='post' action='../Editar/editarhorario.php'>
    <input type='hidden' name='idhes' value=".$mater['idHorario'].">
    <input type='submit' value='Editar'  id='edit' name='Editar' class='conf'><img src='../../imagenes/editar.png' class='icon'>
     </form></td>";
                        echo "<td>
    <form  method='post' action='../../Controller/eliminarhorario.php'>
    <input type='hidden' name='idhes' value=".$mater['idHorario'].">
    <input class='conf' type='submit' id='delete' name='Eliminar' value='Eliminar' alingn='center'>
    <img src='../../imagenes/borrar.png' class='icon'>
     </form></td>";
                                
                              
                               
                                echo"</tr>";
            
        }echo "</legend>";
        echo "</table>";
  

                            echo "</div>";  

if($resulmater==""){
    echo "<div id='contenedor_carrera'><center><img  src='../../imagenes/nohorarios.png'></center></div>";
 }
echo "</div>";
//////////////////////////7
 
?>
<script type="text/javascript">
$(document).ready(function(){
    $('.regreso').click(function(){
         $('#hora').hide();
        $('#horario').show();
    });
});</script>