<?php include "../seguridad.php"; ?>
<!DOCTYPE html>
<html leng="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/horariocpanel.css">
<link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<script src="../../js/jquery-1.4.2.min.js"></script> 
<title>Experiencia Educativa</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<div id="cabeza">
    
    <center><div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">Inicio</a></li>
        <li><a href="publicacion.php">Publicación</a></li>
        <li><a href="horario.php">Horarios</a></li>
        <li><a href="cuenta.php">Cuenta</a></li>
        <li><a href="facultad.php">Facultad</a></li>
        <li><a href="eeducativa.php" id="qwerty">E.Educativa</a></li>
        <li><a href="registro.php">Registro</a></li>
        <li><a href="carrera.php">Carrera</a></li>  
        <li><a href="catedratico.php">Catedrático</a></li>
        <li><a href="ubicaciones.php">Ubicaciones</a></li>   
        <li><a href="salir.php">Salir</a></li>  
    </ul>
</nav>
</div>

</div></center>

<body>
<div id="cuerpo"><br><br>
<figure id="figura">
<img src="../../imagenes/e-educativa.png">
</figure><br><br><br>
 <?php
 
   echo "<div id='agregar'><form  method='post' action='../Agregar/agregareeducativa.php'><img src='../../imagenes/add.gif' class='icon'>
                        <input type='submit' value='Agregar Experiencia Educativa'  name='agregar' class='conf'>
                        </form></div>";
 echo"

<br><br>";
?>

<?php echo"<div id='horario'>";
        require_once("../../conexiones/conexion.php");
            @session_start();
                        $fac=$_SESSION['facultad'] ;            
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT nombre, idCarrera,idfacultad FROM carrera WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        while($row1=mysql_fetch_array($resulf)){
                           echo "<div class='marca'>";
                            echo "<div class='cuadrocar' value='".$row1['idCarrera']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            
                        }
                        ?>


</body><br><br><br></div>


<?php
$sqlcollage="SELECT Nombre,idCarrera,idFacultad FROM carrera WHERE idFacultad = '".$fac."';";
$resulcollage=mysql_query($sqlcollage)or die(mysql_error());
while ($collage=mysql_fetch_array($resulcollage)) {
    ///////////////////
     echo "<div id='materias".$collage['idCarrera']."' class='experiencias'>";    
     echo "<div class='regreso'>Regresar</div><br><br><br>";
    //Preguntamos los nombres de las materias segun su idfacultad
     require_once("../../conexiones/conexion.php");
                @session_start();
                       
                          echo "<div id='contenedor_carrera'>";
                           echo "<table>";
                         echo"<tr>";
                            echo"
                            
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th></th>
                            <th></th>
                            
                            
                            </tr>";
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT * FROM experienciaeducativa WHERE idCarrera = ".$collage['idCarrera'].";";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        $num_total_registros=mysql_num_rows($resulf);
                       // if ($num_total_registros > 0) {
                       //      //Limito la busqueda
                       //      $tamano_pag = 15;
                       //      $pagina = false;
                       //      //examino pagina a mostrar e inicio
                       //  if (isset($_GET["pagina"]))
                       //  $pagina=$_GET['pagina'];
                       //  if (!$pagina) {
                       //      $inicio=0;
                       //      $pagina=1;
                       //  }else{
                       //      $inicio=($pagina - 1) * $tamano_pag;
                       //  }
                       //  ///// Calculo todas las paginas
                       //  $total_paginas=ceil($num_total_registros / $tamano_pag);
                        ///realizamos consulta
                        require_once('../../conexiones/conexion.php');
                        $consultas="SELECT idexperienciaeducativa,nombre, idCarrera FROM experienciaeducativa WHERE  idCarrera = ".$collage['idCarrera'].";";
                         // ORDER BY nombre DESC LIMIT ".$inicio.",".$tamano_pag;
                        $rs=mysql_query($consultas)or die(mysql_error());

                        while($row1=mysql_fetch_array($rs)){
                                   echo "<tr>";
                                        echo "<td><a class='text20'>".$row1['nombre']."</a></td>";
                                        $car = $row1['idCarrera'];
                                        $consultacarrera = "SELECT Nombre FROM carrera WHERE idCarrera = $car";
                                        $cc = mysql_query($consultacarrera) or die (mysql_error());
                                         $ccc = mysql_fetch_array($cc, MYSQL_BOTH);
                                         echo "<td><a class='text20'>".$ccc['Nombre']."</a></td>";

                        echo "<td>

 <form  method='post' action='../Editar/editarmateria.php'>
    <input type='hidden' name='idm' value=".$row1['idexperienciaeducativa'].">
    <input type='submit' id='edit' value='Editar'  name='Editar' class='conf'><img src='../../imagenes/editar.png' class='icon'>
     </form>
</td>";
                        echo "<td>
    <form  method='post' action='../../Controller/eliminarmateria.php'>
    <input type='hidden' name='idmateria' value=".$row1['idexperienciaeducativa'].">
    <input class='conf' type='submit' id='delete' name='Eliminar' value='Eliminar' alingn='center'>
    <img src='../../imagenes/borrar.png' class='icon'>
    
     </form>
</td>";
                                
                              
                               
                                echo"</tr>";
            }echo "</legend>";
        echo "</table></div>";
            echo '<p class="textlink">';

    // if ($total_paginas > 1) {
    //     if ($pagina != 1)
    //         echo '<a class="textlink" href="'.'?pagina='.($pagina-1).'"><img src="../../imagenes/izq.gif" border="0"></a>';
    //     for ($i=1;$i<=$total_paginas;$i++) {
    //         if ($pagina == $i)
    //             //si muestro el �ndice de la p�gina actual, no coloco enlace
    //             echo "<a class='textlink'>".$pagina."</a>";
    //         else
    //             //si el �ndice no corresponde con la p�gina mostrada actualmente,
    //             //coloco el enlace para ir a esa p�gina
    //             echo '  <a class="textlink" href="'.'?pagina='.$i.'">'.$i.'</a>  ';
    //     }
    //     if ($pagina != $total_paginas)
    //         echo '<a class="textlink"><a class="textlink" href="'.'?pagina='.($pagina+1).'"><img src="../../imagenes/der.gif" border="0"></a></a>';
    // }
    echo '</p>';
// }
                            echo "</div>";
    //////////////////////
}

?>
<div id="escogido"></div>

<hr></div>
<footer>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</footer>
</html>

<script type="text/javascript">
$(document).ready(function(){
$('.experiencias').hide();
});
$(document).ready(function(){
    $('.cuadrocar').click(function(){
        var id= $(this).attr("value");
        $('#materias'+id).show();
        $('#horario').hide();
    });
});
$(document).ready(function(){
    $('.regreso').click(function(){
        $('.experiencias').hide();
        $('#horario').show();
    });
});

</script>