<?php include "../seguridadkiosko.php"; ?>
<script src="../../js/jquery-1.4.2.min.js"></script> 
<script src="../../js/jshorarios.js"></script>
<script language="Javascript" type="text/javascript">
// //<![CDATA[
// <!-- Begin
// document.oncontextmenu = function(){return false}
// // End -->
// //]]>
// </script>
<!DOCTYPE HTML>
<html lang="es">
    <head>
<!-- Metas -->
    <meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/horarioscss.css">
<link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
 <title>Sistema Interactivo de Mensajes</title>
    </head> 
    
  <div id="cen" >

             <div class="botonera"  id="HES" name="HES" title="Todas las publicaciones">
            <img class="icon" src="../../imagenes/iconos_55.png">
            <a class="texto">Horarios Escolar</a>
            </div>
            <div class="botonera" id="HI"  title="Todas las publicaciones">
            <img class="icon" src="../../imagenes/iconos_55.png">
            <a class="texto">Horarios Intersemestral</a>
            </div>
            <div class="botonera" id="HEX" title="Todas las publicaciones">
            <img class="icon" src="../../imagenes/iconos_55.png">
            <a class="texto">Horarios Exámen</a>
            </div>
            <div class="botonera" id="HT" title="Todas las publicaciones">
            <img class="icon" src="../../imagenes/iconos_55.png">
            <a class="texto">Horarios Tutorias</a>
            </div>  
            <div class="botonera" id="uno" title="Atrás">
            <a href="../principalkiosco.php"><img class="iconos" src="../../imagenes/iconos_21.png"></a>
            
            </div></center>
  </div>

<body>
    <center><div id="botoness">
<div id="atrassss">
    <div id="tituu">
        <h1><a class="text1z">Horarios</a></h1>
    </div>
    <div id="back">
<a href="../principalkiosco.php"><img class="iconos" src="../../imagenes/iconos_21.png"></a>

    </div>
</div>
<center>
    <div id="HES2">
<div class="marcax">
<div class="cuadro">
<img class="icon" src="../../imagenes/iconos_55.png">
<a class="texto">Horarios Escolar</a>
</div>
</div>
</div>
<div id="HI2">
<div class="marcax">
<div class="cuadro">
<img class="icon" src="../../imagenes/iconos_55.png">
<a class="texto">Horarios Intersemestral</a>
</div>
</div>
</div>
<div id="HEX2">
<div class="marcax">
<div class="cuadro">
<img class="icon" src="../../imagenes/iconos_55.png">
<a class="texto">Horarios Exámenes</a>
</div>
</div>
</div>
<div id="HT2">
<div class="marcax">
<div class="cuadro">
<img class="icon" src="../../imagenes/iconos_55.png">
<a class="texto">Horarios Tutorías</a>
</div>
</div>
</div>
    </div></center>

<!--inicia Horario escolar -->
<div id="horarioes1"></div>
    <?php echo"<div id='horarioes'>";
        require_once("../../conexiones/conexion.php");
            @session_start();
                        $fac=$_SESSION['facultad'] ;            
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT nombre, idcarrera,idfacultad FROM carrera WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       
                        while($row1=mysql_fetch_array($resulf)){
                           echo "<div class='marca'>";
                            echo "<div class='cuadroes' value='".$row1['idcarrera']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            
                        }
  echo "</div>";  ?>
<!--Inicia Horario Examenes-->
<div id="horarioex1"></div>
<?php echo "<div id='horarioex'>";   
                    require_once("../../conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT nombre, idcarrera,idfacultad FROM carrera WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        $lugarp=1;
                        while($row1=mysql_fetch_array($resulf)){
                                echo "<div class='marca'>";
                                echo "<div class='cuadroex' value='".$row1['idcarrera']."' ><p class='textox'> ".$row1['nombre']." </p></div></div>";
                        }
echo"</div>"; ?>
<!--Inicia Horario Tutorias-->
<div id="horariotu1"></div>
<?php echo "<div id='horariotu'>";   
      echo "</div>"; ?>
<!--Inicia Horario Intersemestral-->
<?php
echo "<div id='horariointer1'></div>";
echo "<div id='horariointer'>";
    require_once("../../conexiones/conexion.php");
        @session_start();
                        $fac=$_SESSION['facultad'] ;
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT nombre, idcarrera,idfacultad FROM carrera WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu) or die(mysql_error());
                        $lugrp=1;
                        while($row1=mysql_fetch_array($resulf)){
                            echo "<div class='marca'>";
                            echo "<div class='cuadrointer' value='".$row1['idcarrera']."'> <p class='textox'>".$row1['nombre']." </p></div></div>";
                           
                        }
                        echo "</div>"; ?>


        <?php
        $mysqlm="SELECT idCarrera FROM carrera WHERE idfacultad = '".$fac."'; ";
        $resulm=mysql_query($mysqlm) or die(mysql_error());
        while ($m=mysql_fetch_array($resulm)) {
             require_once("../../conexiones/conexion.php");
                @session_start();
                $fac=$_SESSION['facultad'] ; 
                $consulta = "SELECT * FROM experienciaeducativa WHERE idCarrera = '".$m['idCarrera']."'  ";
                $query = mysql_query($consulta)or die(mysql_error());
                echo "<div id='materia".$m['idCarrera']."' class='experiencias'>";    
                  while ($fila = mysql_fetch_array($query)) { 
                        if($fila!=""){
                         echo "<div class='marcaex'>";
                         echo "<div class='materias' value='".$fila['idExperienciaEducativa']."'>
                               <p class='textox'>".$fila['Nombre']."</p>
                               </div>
                               </div>";
                                            
                        }
                      
                      }
 echo "</div>";
        }
       
        ?>
    </div> 
    </body>
</html>