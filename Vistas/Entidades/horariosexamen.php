

<?php
include "seguridad.php";
if (@$_POST['agregar']) {
    header("location:agregarhexa.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="css/css1a.css">
<!-- JS -->
<script src="js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
 
    $('#cuerpo').hide();
    $('#cuerpo').fadeIn('slow');
});
</script>
<script type="text/javascript">
$(document).ready(function(event){
    $('#agregar').click(function{
       window.location = 'agregarp.php';
    });
});
</script>
    
    
<title>Horarios Examen</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="pagprin.php">Inicio</a></li>
        <li><a href="publicacion.php">Publicación</a></li>
            
        <li><a>Horarios</a>
            <ul>
                <li><a href="horarioescolar.php">Horario Escolar</a></li>
                <li><a href="horariosexamen.php">Horario Examen</a></li>
                <li><a href="horariotutoria.php">Horario Tutoría</a></li>
                 <li><a href="horariointersemestral.php">Horario Intersemestral</a></li>
        </ul></li>

        <li><a href="usuario.php">Usuario</a></li>
        <li><a href="facultad.php">Facultad</a></li>
        <li><a href="materia.php">Materia</a></li>
        <li><a href="registro.php">Registro</a></li>
        <li><a href="carrera.php">Carrera</a></li>  
        <li><a href="catedratico.php">Catedrático</a></li>    
        <li><a href="salir.php">Salir</a></li>  
    </ul>
</nav>
</div>

</div>

<body>
<div id="cuerpo">
<figure id="figura">
<img src="imagenes/horariosexamenes.png">
</figure>

 
 <?php
  echo "<div id='agregar'><form  method='post' action='agregarhexa.php'><img src='imagenes/add.gif' class='icon'>
                        <input type='submit' value='Agregar Horario'  name='agregar' class='conf'>
                        </form></div>";
 
 echo"

<br><br>";


    echo "<div>";
 @session_start();
 require_once("conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select idfacultad from administrador where nombre='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   
    
    //Preguntamos los nombres de las materias segun su idfacultad
     require_once("conexiones/conexion.php");
                @session_start();
                       
                          echo "<div id='contenedor_carrera'>";
                           echo "<table>";
                         echo"<tr>";
                            echo"
                            <th>NRC</a></th>
                            <th>NRC98</a></th>
                            <th>Experiencia</a></th>
                            <th>Catedrático</a></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            </tr>";
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT * FROM horarioexamenes WHERE idfacultad=".$fac.";";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        $num_total_registros=mysql_num_rows($resulf);
                       if ($num_total_registros > 0) {
    //Limito la busqueda
    $tamano_pag = 10;
        $pagina = false;
                        //examino pagina a mostrar e inicio
        if (isset($_GET["pagina"]))
                        $pagina=$_GET['pagina'];
                        if (!$pagina) {
                            $inicio=0;
                            $pagina=1;
                        }else{
                            $inicio=($pagina - 1) * $tamano_pag;
                        }
                        ///// Calculo todas las paginas
                        $total_paginas=ceil($num_total_registros / $tamano_pag);
                        ///realizamos consulta
                        require_once('conexiones/conexion.php');
                        $consultas="SELECT idhorarioexamen, idmateria, idcatedratico, idcarrera FROM horarioexamenes WHERE idfacultad=".$fac." ORDER BY idcarrera DESC LIMIT ".$inicio.",".$tamano_pag;
                        $rs=mysql_query($consultas)or die(mysql_error());

                        while($row1=mysql_fetch_array($rs)){
                                   echo "<tr>";
                                    $mysqlm="select nombre,nrc,nrc98 from materia where idmateria = '".$row1['idmateria']."'";
                                    $mysqlc="select nombre,apellidomaterno,apellidopaterno from catedratico where idcatedratico='".$row1['idcatedratico']."'";
                                    $resul1=mysql_query($mysqlm) or die(mysql_error());
                                    $resul2=mysql_query($mysqlc) or die(mysql_error());
                                    while ($m=mysql_fetch_array($resul1)) {

                                    echo "<td><a class='text10'>".$m['nrc']."</a></td>";

                                    echo "<td><a class='text10'>".$m['nrc98']."</a></td>";

                                    echo "<td><a class='text10'>".$m['nombre']."</a></td>";

                                    while ($c=mysql_fetch_array($resul2)) {
                                        echo "<td><a class='text10'>".$c['nombre']."</a>";
                                        echo "<a class='text10'> ".$c['apellidopaterno']." </a>";
                                        echo "<a class='text10'>".$c['apellidomaterno']."</a></td>";

                      

                        echo "<td>

 <form  method='post' action='modificar/editarhexa.php'>
    <input type='hidden' name='idhexa' value=".$row1['idhorarioexamen'].">
    <input type='submit' value='Editar'  name='Editar' class='conf'><img src='imagenes/editar.png' class='icon'>
     </form>
</td>";
                        echo "<td>
    <form  method='post' action='eliminarhorarioex.php'>
    <input type='hidden' name='idhex' value=".$row1['idhorarioexamen'].">
    <input class='conf' type='submit' name='Eliminar' value='Eliminar' alingn='center'>
    <img src='imagenes/borrar.png' class='icon'>
    
     </form>
</td>";
                                
                              
                               
                                echo"</tr>";
            }}}echo "</legend>";
        echo "</table></div></div>";
            echo '<p class="textlink">';

    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<a class="textlink" href="'.'?pagina='.($pagina-1).'"><img src="imagenes/izq.gif" border="0"></a>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo "<a class='textlink'>".$pagina."</a>";
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '  <a class="textlink" href="'.'?pagina='.$i.'">'.$i.'</a>  ';
        }
        if ($pagina != $total_paginas)
            echo '<a class="textlink"><a class="textlink" href="'.'?pagina='.($pagina+1).'"><img src="imagenes/der.gif" border="0"></a></a>';
    }
    echo '</p>';}
                            echo "</div>";  

        
       

?>

</div>
</body>
  <footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Coatlicue
    </footer>
</html>