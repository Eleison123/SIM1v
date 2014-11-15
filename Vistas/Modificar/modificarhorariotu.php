<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="css/css1a.css">
<!-- JS -->
<script type="text/javascript" src="js/validarp.js"></script>
 <script src="js/jquery.cycle.all.js"></script>
<script src="js/jquery-1.11.0.min.js"></script> 
        
<title>Modificar Horario Tutoría</title>
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
 <h1>Modificar Horario Tutoría</h1>
 <?php
 
 echo"<form name='modht' method='post' action='modificar/editarht.php'>";

echo"<fieldset>";
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
                       
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="select nombre, idcarrera,idfacultad from carrera where idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        while($row1=mysql_fetch_array($resulf)){
  
                            echo "<div id='contenedor_carrera'>";
                           echo "<table>";
                         echo "<tr><a class='text2'>".$row1['nombre']."</a></tr>"; 
                         echo"<tr>";
                            echo"<td><a class='text1'>Selección</a></td>
                            <td><a class='text1'>Materia</a></td>
                            <td><a class='text1'>Catedrático</a></td>
                            </tr>";
                             
                       
                            require_once("conexiones/conexion.php");
                            $mysql="SELECT idtutoria, lugar, idcatedratico, idfecha, idcarrera from horariotutoria where idcarrera='".$row1['idcarrera']."'";
                            $resul=mysql_query($mysql) or die(mysql_error());
                           
                                while($rw=mysql_fetch_array($resul)){ 
                                   echo "<tr>";
                                    echo"<td><input type='radio' value='".$rw['idtutoria']."' name='idhtuto' id='radio' ></td>";
                                    $mysqlm="select nombre, apellidomaterno, apellidopaterno from catedratico where idcatedratico = '".$rw['idcatedratico']."'";
                                    $mysqlc="SELECT dia FROM fecha WHERE idfecha =".$rw['idfecha']."";
                                    $resul1=mysql_query($mysqlm) or die(mysql_error());
                                    $resul2=mysql_query($mysqlc) or die(mysql_error());
                                    while ($m=mysql_fetch_array($resul1)) {
                                      echo "<td><a class='text1'>".$m['nombre']." ".$m['apellidomaterno']."  ".$m['apellidopaterno']."</a></td>";
                                      echo " ";
                                    while ($c=mysql_fetch_array($resul2)) {
                                        echo "<td><a class='text1'>".$c['dia']."</a></td>";
                              
                               
                                echo"</tr>";
            }}}
                            echo "</div>";  

        }
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