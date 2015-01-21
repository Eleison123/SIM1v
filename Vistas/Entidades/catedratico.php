<?php include "seguridad.php"; ?>
<!DOCTYPE html>
<html leng="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/css1a.css">
<link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<script src="../../js/jquery-1.4.2.min.js"></script>  
<title>Catedrático</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">INICIO</a></li>
        <li><a href="publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="horario.php">HORARIO</a></li>
        <li><a href="cuenta.php">CUENTA</a></li>
        <li><a href="facultad.php">FACULTAD</a></li>
        <li><a href="eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="registro.php">REGISTRO</a></li>
        <li><a href="carrera.php">CARRERA</a></li>  
        <li><a href="catedratico.php" id="qwerty">CATEDRÁTICO</a></li>
        <li><a href="ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="salir.php">SALIR</a></li> 
    </ul>
</nav>
</div>

</div></center>

<body><br><br>
<div id="cuerpo">
<figure id="figura">
<img src="../../imagenes/catedratico.png">
</figure><br><br>

 
 <?php
 echo "<div id='agregar'><form  method='post' action='../Agregar/agregarcate.php'><img src='../../imagenes/add.gif' class='icon'>
                        <input type='submit' value='Agregar Catedrático'  name='agregar' class='conf'>
                        </form></div>";
 echo"

<br><br>";
 

    echo "<div>";
 @session_start();
 require_once("../../Conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idFacultad from cuenta where Usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   
    
    //Preguntamos los nombres de las materias segun su idfacultad
     require_once("../../Conexiones/conexion.php");
                @session_start();
                       
                          echo "<div id='contenedor_carrera'>";
                           echo "<table>";
                         echo"<tr>";
                            echo"
                            <th><left>Nombre Completo</left></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            
                            </tr>";
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT * FROM catedratico WHERE idFacultad=".$fac.";";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        $num_total_registros=mysql_num_rows($resulf);
                       if ($num_total_registros > 0) {
    //Limito la busqueda
    $tamano_pag = 15;
        $pagina = false;
                        //examino pagina a mostrar e inicio
        if (isset($_GET['pagina']))  
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
                        require_once('../../Conexiones/conexion.php');
                        $consultas="SELECT idCatedratico,Nombre,Apellidomaterno,Apellidopaterno FROM catedratico WHERE idFacultad= ".$fac." ORDER BY nombre DESC LIMIT ".$inicio.",".$tamano_pag;
                        $rs=mysql_query($consultas)or die(mysql_error());

                        while($row1=mysql_fetch_array($rs)){
                                   echo "<tr>";
                                   
                                        echo "<td><a class='text20'>".$row1['Nombre']." </a>";
                                        echo "<a class='text20'>".$row1['Apellidopaterno']." </a>";
                                        echo "<a class='text20'>".$row1['Apellidomaterno']."</a></td>";
                               
                                       

                       

                        echo "<td>

 <form  method='post' action='../Editar/editarcatedratico.php'>
    <input type='hidden' name='idcar' value=".$row1['idcatedratico'].">
    <input type='submit' value='Editar'  id='edit' name='Editar' class='conf'><img src='../../imagenes/editar.png' class='icon'>
     </form>
</td>";
                        echo "<td>
    <form  method='post' action='../../Controller/eliminarcatedratico.php'>
    <input type='hidden' name='idcate' value=".$row1['idcatedratico'].">
    <input class='conf' type='submit' id='delete' name='Eliminar' value='Eliminar' alingn='center'>
    <img src='../../imagenes/borrar.png' class='icon'>
    
     </form>
</td>";
                                
                              
                               
                                echo"</tr>";
            }echo "</legend>";
        echo "</table></div></div>";
            echo '<p class="textlink">';

    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<a class="textlink" href="'.'?pagina='.($pagina-1).'"><img src="../../imagenes/izq.gif" border="0"></a>';
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
            echo '<a class="textlink"><a class="textlink" href="'.'?pagina='.($pagina+1).'"><img src="../../imagenes/der.gif" border="0"></a></a>';
    }
    echo '</p>';}
                            echo "</div>";  

        
        
        echo "";

?>

</div>
</body><br><br><br>
 <footer>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div></footer>
</html>
<script type="text/javascript">
$(document).ready(function(event){
    $('#agregar').click(function{
       window.location = '../Agregar/agregarcate.php';
    });
});
</script>