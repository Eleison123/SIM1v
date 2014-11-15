<?php include "../seguridad.php"; ?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
<!-- JS -->
<script src="../../js/jquery-1.4.2.min.js"></script> 
<script type='text/javascript'>
 Begin
document.oncontextmenu = function(){return false} 
</script>
<script type="text/javascript">
$(document).ready(function(){
 
    $('#cuerpo').hide();
    $('#cuerpo').fadeIn('slow');
});
</script>
<script type="text/javascript">
$(document).ready(function(event){
    $('#agregar').click(function{
       window.location = '../Agregar/agregareeducativa.php';
    });
});
</script>
    
    
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
                        <input type='submit' value='Agregar Materia'  name='agregar' class='conf'>
                        </form></div>";
 echo"

<br><br>";


    echo "<div>";
 @session_start();
 require_once("../../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM Cuenta WHERE usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   
    
    //Preguntamos los nombres de las materias segun su idfacultad
     require_once("../../conexiones/conexion.php");
                @session_start();
                       
                          echo "<div id='contenedor_carrera'>";
                           echo "<table>";
                         echo"<tr>";
                            echo"
                            <th>NRC</th>
                            <th>NRC 98</th>
                            <th>Nombre</th>
                            <th>Catedrático</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            </tr>";
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT * FROM experienciaeducativa WHERE idfacultad=".$fac.";";
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
                        require_once('../../conexiones/conexion.php');
                        $consultas="SELECT idexperienciaeducativa,nrc,nrc98,nombre,idcatedratico FROM experienciaeducativa ORDER BY nombre DESC LIMIT ".$inicio.",".$tamano_pag;
                        $rs=mysql_query($consultas)or die(mysql_error());

                        while($row1=mysql_fetch_array($rs)){
                                   echo "<tr>";
                                   echo "<td><a class='text10'>".$row1['nrc']."</a></td>";
                                   echo "<td><a class='text10'>".$row1['nrc98']."</a></td>";
                                        echo "<td><a class='text10'>".$row1['nombre']."</a></td>";
                                $cat="SELECT nombre, apellidomaterno,apellidopaterno FROM catedratico WHERE idcatedratico =".$row1['idcatedratico']." "; 
                                $cate=mysql_query($cat)or die(mysql_error());
                                $c = mysql_fetch_array($cate, MYSQL_BOTH);
                                $nom = $c['nombre']; $am = $c['apellidomaterno']; $ap = $c['apellidopaterno'];
                                echo "<td><a class='text10'>".$c['nombre']."</a>";
                                echo "<a class='text10'> ".$c['apellidopaterno']." </a>";
                                echo "<a class='text10'>".$c['apellidomaterno']."</a></td>";
                                       

                   

                        echo "<td>

 <form  method='post' action='../Editar/editarmateria.php'>
    <input type='hidden' name='idm' value=".$row1['idexperienciaeducativa'].">
    <input type='submit' value='Editar'  name='Editar' class='conf'><img src='../../imagenes/editar.png' class='icon'>
     </form>
</td>";
                        echo "<td>
    <form  method='post' action='../../Controller/eliminarmateria.php'>
    <input type='hidden' name='idmateria' value=".$row1['idexperienciaeducativa'].">
    <input class='conf' type='submit' name='Eliminar' value='Eliminar' alingn='center'>
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

        
       

?>

</div>
</body><br><br><br><br>
<footer>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div></footer>
</html>