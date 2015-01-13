<?php 
    echo "<div>";
 @session_start();
 require_once("../../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   $mysqlfacu="SELECT * FROM horario WHERE idfacultad=".$fac." and idcarrera = ".$_GET['id'].";";
    $resulf=mysql_query($mysqlfacu) or die(mysql_error());
    $num_total_registros=mysql_num_rows($resulf);
    if ($num_total_registros!=0){ 
    //Preguntamos los nombres de las materias segun su idfacultad
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
                            //Preguntamos los nombres de las carreras segun su idfacultad
                        
                       
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
                        $consultas="SELECT * FROM horario WHERE idfacultad=".$fac." ORDER BY idcarrera DESC LIMIT ".$inicio.",".$tamano_pag;
                        $rs=mysql_query($consultas)or die(mysql_error());

                        while($row1=mysql_fetch_array($rs)){
                                   echo "<tr>";
                                    $mysqlm="SELECT nombre FROM experienciaeducativa WHERE idExperienciaEducativa = '".$row1['idExperienciaEducativa']."'";
                                    $mysqlc="SELECT nombre,apellidomaterno,apellidopaterno FROM catedratico WHERE idCatedratico='".$row1['idCatedratico']."'";
                                    $resul1=mysql_query($mysqlm) or die(mysql_error());
                                    $resul2=mysql_query($mysqlc) or die(mysql_error());
                                    while ($m=mysql_fetch_array($resul1)) {

                                    echo "<td><a class='text20'>".$row1['NRC']."</a></td>";

                                    echo "<td><a class='text20'>".$row1['NRCANT']."</a></td>";

                                    echo "<td><a class='text20'>".$m['nombre']."</a></td>";

                                    while ($c=mysql_fetch_array($resul2)) {
                                        echo "<td><a class='text20'>".$c['nombre']."</a>";
                                        echo "<a class='text20'> ".$c['apellidopaterno']." </a>";
                                        echo "<a class='text20'>".$c['apellidomaterno']."</a></td>";
                                    }
                                    echo "<td>";
                                    if ($row1['tipo']==1){ echo "<a class='text20'>Escolar</a></td>";}
                                    if ($row1['tipo']==2){ echo "<a class='text20'>Ordinario</a></td>";}
                                    if ($row1['tipo']==3){ echo "<a class='text20'>Extraordinario</a></td>";}
                                    if ($row1['tipo']==4){ echo "<a class='text20'>Título</a></td>";}
                                    if ($row1['tipo']==5){ echo "<a class='text20'>Tutoría</a></td>";}
                                    if ($row1['tipo']==6){ echo "<a class='text20'>Intersemestral</a></td>";}
                                   
                        echo "<td>

 <form  method='post' action='../Editar/editarhorario.php'>
    <input type='hidden' name='idhes' value=".$row1['idHorario'].">
    <input type='submit' value='Editar'  id='edit' name='Editar' class='conf'><img src='../../imagenes/editar.png' class='icon'>
     </form>";
                        echo "<td>
    <form  method='post' action='../../Controller/eliminarhorario.php'>
    <input type='hidden' name='idhes' value=".$row1['idHorario'].">
    <input class='conf' type='submit' id='delete' name='Eliminar' value='Eliminar' alingn='center'>
    <img src='../../imagenes/borrar.png' class='icon'>
     </form>";
                                
                              
                               
                                echo"</tr>";
            
        }}echo "</legend>";
        echo "</table></div></div>";
            echo '<p class="textlink">';

    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<a class="textlink" href="'.'?pagina='.($pagina-1).'">
        <img src="../../imagenes/izq.gif" border="0"></a>';
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
            echo '<a class="textlink"><a class="textlink" href="'.'?pagina='.($pagina+1).'">
        <img src="../../imagenes/der.gif" border="0"></a></a>';
    }
    echo '</p>';}
                            echo "</div>";  
}else{
     echo "<div id='contenedor_carrera'><center><img  src='../../imagenes/nohorarios.png'></center></div>";
}
?>