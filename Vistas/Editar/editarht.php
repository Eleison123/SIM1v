


<?php
include"../seguridad.php";
require_once("../conexiones/conexion.php");
if (@$_POST['guardar']) {


    if(isset($_POST['dia'])and
    ($_POST['horaini'])and
    ($_POST['horafin'])and
    ($_POST['lugar'])and
    ($_POST['carrera'])and
    ($_POST['catedratico']!="")){ 

         $dia1 = $_POST['dia'];
         $horaini1 = $_POST['horaini'];
         $horafin1 = $_POST['horafin'];
         $lugar1 = $_POST['lugar'];
         $catedratico1 = $_POST['catedratico'];
         $carrera1 = $_POST['carrera'];
         $fecha1= $_POST['fecha'];
         $id1= $_POST['id'];


     $sqlf="UPDATE fecha SET
dia = '".$dia1."', 
horain = '".$horaini1."', 
horafin = '".$horafin1."'
 WHERE idfecha='".$fecha1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());


$sqlq="UPDATE horariotutoria SET
lugar = '".$lugar1."',
idcatedratico = '".$catedratico1."',

idcarrera = '".$carrera1."'

WHERE idtutoria='".$id1."'";
$resultadoq = mysql_query($sqlq) or die(mysql_error());

echo "<script>alert('Mi horario a sido modificado exitosamente');
window.location = '../horariotutoria.php';</script>";


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idhtuto'];
$mysqlid="SELECT idtutoria, lugar, idcatedratico, idfacultad, idfecha, idcarrera FROM horariotutoria WHERE idtutoria=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);

    
     $catedratico = $fil['idcatedratico'];
     $carrera = $fil['idcarrera'];
     $fecha = $fil['idfecha'];
     $lugar = $fil['lugar'];
     $carrera = $fil['idcarrera'];

 }

?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../css/css1a.css">
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
        
<title>Editar Horario Examenes</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">Inicio</a></li>
        <li><a href="../publicacion.php">Publicación</a></li>
            
        <li><a>Horarios</a>
            <ul>
                <li><a href="../horarioescolar.php">Horario Escolar</a></li>
                <li><a href="../horariosexamen.php">Horario Exámen</a></li>
                <li><a href="../horariotutoria.php">Horario Tutoría</a></li>
                 <li><a href="../horariointersemestral.php">Horario Intersemestral</a></li>
        </ul></li>

        <li><a href="../usuario.php">Usuario</a></li>
        <li><a href="../materia.php">Facultad</a></li>
        <li><a href="../materia.php">Materia</a></li>
        <li><a href="../registro.php">Registro</a></li>
        <li><a href="../carrera.php">Carrera</a></li>  
        <li><a href="../catedratico.php">Catedrático</a></li>    
        <li><a href="../salir.php">Salir</a></li>  
    </ul>
</nav>
</div>

</div>

<body>
    <div id="cuerpo">
<figure>
<img src="../imagenes/editarhorario.png">
</figure>
<form method="post" >
    <fieldset>

 
 <input type="text"   hidden name="id" <?php echo "value='"; echo $hes; echo"'";?> >
 <input type="text"  hidden name="fecha" <?php echo "value='"; echo $fecha; echo"'";?> >
 
<label for="" class="text1" id="catel1h">Catedratico:</label>
<?php 
 
 @require_once("../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select idfacultad from administrador where nombre='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
    ?>
<select name="catedratico" id="catedratico" placeholder="catedratico">
    <?php
     @require_once("../conexiones/conexion.php");
    //Preguntamos los nombres de las materias segun su idfacultad
 $mysql="select idcatedratico, nombre, apellidomaterno, apellidopaterno from catedratico where idfacultad='".$fac."';";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    if ($row['idcatedratico']!=$catedratico) {
        # code...
    echo "<option value='".$row['idcatedratico']."'>";
    echo $row['nombre'];
    echo " ";
    echo $row['apellidomaterno'];
    echo " ";
    echo  $row['apellidopaterno'] ;
    echo "</option>";
    }else {
    echo "<option selected value='".$catedratico."'>";
    echo $row['nombre'];
    echo " ";
    echo $row['apellidomaterno'];
    echo " ";
    echo  $row['apellidopaterno'] ;
    echo "</option>";
    }
    
}

?>
</select><br>

<?php 
 @require_once("../conexiones/conexion.php");
$sqlfecha="SELECT dia, horain, horafin FROM fecha WHERE idfecha='".$fecha."'";
$resulfecha = mysql_query($sqlfecha) or die(mysql_error());
    $fil = mysql_fetch_array($resulfecha, MYSQL_BOTH);
    $dia = $fil[0];
    $horaini = $fil[1];
    $horafin = $fil[2];
?>


 
 <label for="horarea1h" class="text1" id="horareal1h">Hora Inicio:</label>
 <input type="time" id="fecharea1h" name="horaini"required class="inhora"<?php echo"value='"; echo $horaini; echo "'";?> >
 
 <label for="horareaf1h" class="text1" id="horareafl1h">Hora Termino:</label>
 <input type="time" id="horareaf1h" name="horafin" class="inhora"<?php echo"value='"; echo $horafin; echo "'";?>><br>
 
 
        <label for="dia1h" class="text1">Fecha:</label>
            <input type="date" id="dia1h" name="dia" class="infecha"<?php echo "value='"; echo $dia; echo "'"; ?> > <br>
            
        
        <label for="lugar1p" class="text1">Lugar de Realizacion:</label>
        <input type="text" id="lugar1p" placeholder="Lugar de realizacion de la publicacion" name="lugar"required
        <?php echo "value='"; echo $lugar; echo "'"; ?>><br><br>
<?php
        @session_start();
 require_once("../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select idfacultad from administrador where nombre='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   
    echo "<select name='carrera' id='carrera' placeholder='Carrera'>";
    //Preguntamos los nombres de las materias segun su idfacultad
 $mysql="select idcarrera, nombre from carrera where idfacultad='".$fac."';";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    if ($row['idcarrera']!=$carrera) {
    echo "<option value='".$row['idcarrera']."'>";
    echo $row['nombre'];
    echo "</option>";
    }else{
        echo "<option selected value='".$carrera."'>";
        echo $row['nombre'];
    echo "</option>";
    
}
}
echo "</select>";
  ?>      
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</body>
<footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Coatlicue
    </footer>
</html>