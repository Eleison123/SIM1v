<?php
include"seguridad.php";
?>

<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="css/css1a.css">
<!-- JS -->

        
<title>Modificar Usuario</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="pagprin.php">Inicio</a></li>
        <li><a>Publicación</a>
            <ul>
            <li><a href="agregarp.php">Agregar Publicación</a></li>
            <li><a href="modificarpublicacion.php" >Modificar Publicación</a></li>
            <li><a href="eliminarpublicacion.php">Eliminar Publicación</a></li>
            </ul>
        <li><a>Horarios</a>
            <ul>
                <li><a >Agregar Horario</a>
                    <ul>
                    <li><a href="agregarhe.php">Escolar</a></li>
                    <li><a href="agregarhexa.php">Exámenes</a></li>
                    <li><a href="agregarht.php">Tutoría</a></li>
                    <li><a href="agregarhinter.php">Intersemestral</a></li>
                    </ul>
                </li>
                <li><a href="">Modificar Horario</a>
                    <ul>
                    <li><a href="modificarhe.php">Escolar</a></li>
                    <li><a href="modificarhexa.php">Exámenes</a></li>
                    <li><a href="modificarhorariotu.php">Tutoría</a></li>
                    <li><a href="modificarhinter.php">Intersemestral</a></li>
                    </ul>
                </li>
                <li><a >Eliminar Horario</a>
                    <ul>
                    <li><a href="eliminarhorarioes.php">Escolar</a></li>
                    <li><a href="eliminarhorarioex.php">Exámenes</a></li>
                    <li><a href="eliminarhorariotutoria.php">Tutoría</a></li>
                    <li><a href="eliminarhorariointer.php">Intersemestral</a></li>
                    </ul>
                </li>
        </ul></li>

        <li><a >Usuario</a>
            <ul>
                <li><a href="agregarusuario.php">Agregar Usuario</a></li>
                <li><a href="modificarusuario.php">Modificar Usuario</a></li>
                <li><a href="eliminarusuario.php">Eliminar Usuario</a></li>
           </ul>
        </li>

        <li><a >Facultad</a>
            <ul>
            <li><a href="agregarfacultad.php">Agregar Facultad</a></li>
            <li><a href="modificarfacultad.php">Modificar Facultad</a></li>
            <li><a href="eliminarfacultad.php">Eliminar Facultad</a></li>
            </ul>
            
        </li>
        <li><a >Materia</a>
            <ul>
            <li><a href="agregarmateria.php">Agregar Materia</a></li>
            <li><a href="modificarmateria.php">Modificar Materia</a></li>
            <li><a href="eliminarmateria.php">Eliminar Materia</a></li>
            </ul>
            
        </li>
        <li><a >Registro</a>
            <ul>
            <li><a href="registro.php">Vizualizar</a></li>
            <li><a href="">Imprimir</a></li>
            </ul>
            
        </li>
        <li><a >Carrera</a>
            <ul>
                <li><a href="agregarcar.php">Agregar Carrera</a></li>
                <li><a href="modificarcarrera.php">Modificar Carrera</a></li>
                <li><a href="eliminarcarrera.php">Eliminar Carrera</a></li>
            </ul>
            
        </li>  
        <li><a >Catedrático</a>
            <ul>
                <li><a href="agregarcate.php">Agregar Catedrático</a></li>
                <li><a href="modificarcatedratico.php">Modificar Catedrático</a></li>
                <li><a href="eliminarcatedratico.php">Eliminar Catedrático</a></li>
            </ul>
            
        </li>    
        <li><a href="salir.php">Salir</a></li>  
    </ul>
</nav>
</div>

</div>


<body>
<div id="cuerpo">
<figure>
<img src="imagenes/separador.png">
</figure>
 <h2>Modificar Materia</h2>
 <fieldset><legend><a class="text1">Materias Disponibles</a></legend>
 <?php
 
 echo"<form name='modfac' method='post' action='modificar/editarmateria.php'>";
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
                            echo"<td><a class='text1'>Selección</a></td>
                            <td><a class='text1'>NRC</a></td>
                            <td><a class='text1'>NRC 98</a></td>
                            <td><a class='text1'>Materia</a></td>
                            <td><a class='text1'>Catedratico</a></td>
                            </tr>";
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idmateria, nrc, nrc98, nombre, idcatedratico, idfacultad, idcarrera FROM materia WHERE idfacultad=".$fac." ";
                        
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        while($row1=mysql_fetch_array($resulf)){
                                   echo "<tr>";
                                    echo"<td><input type='radio' value='".$row1['idmateria']."' name='idm' id='radio' ></td>";
                                    echo "<td><a class='text1'>".$row1['nrc']."</a></td> ";
                                    echo "<td><a class='text1'>".$row1['nrc98']."</a></td> ";
                                    echo" <td><a class='text1'>".$row1['nombre']."</a></td> ";
                                 $mysqlcate="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idcatedratico=".$row1['idcatedratico']." ";
                                 $mysqlcar="SELECT  nombre FROM carrera WHERE idcarrera=".$row1['idcarrera']." ";
                                 $resulcate=mysql_query($mysqlcate) or die(mysql_error());
                                 $resulcar=mysql_query($mysqlcar) or die(mysql_error());
                                   while ($c=mysql_fetch_array($resulcate)) {
                                      echo "<td><a class='text1'>".$c['nombre']."</a></td>";
                                  
                                        echo "<td><a class='text1'>".$c['apellidomaterno']."</a>";
                                     
                                        echo "<a class='text1'>".$c['apellidopaterno']."</a></td>";
                              while ( $car=mysql_fetch_array($resulcate)) {
                                echo "<td><a class='text1'>".$car['nombre']."</a></td>";
                              
                               
                                echo"</tr>";
            }}}
                            echo "</div>";  

        
        echo "</legend>";
        echo "</table></div></fieldset><br><br>";
        echo "<input type='submit' value='Editar' name='Editar' id='btnguardar'>";
?>
</div>
</body>
  <footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Cuatlicue
    </footer>
</html>