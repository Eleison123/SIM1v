<?php

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
                            
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th></th>
                            <th></th>
                            
                            
                            </tr>";
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT * FROM experienciaeducativa WHERE idCarrera = ".$_GET['id'].";";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        $num_total_registros=mysql_num_rows($resulf);
                       if ($num_total_registros > 0) {
    //Limito la busqueda
    $tamano_pag = 15;
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
                        $consultas="SELECT idexperienciaeducativa,nombre, idCarrera FROM experienciaeducativa WHERE  idcarrera = ".$_GET['id']." ORDER BY nombre DESC LIMIT ".$inicio.",".$tamano_pag;
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
