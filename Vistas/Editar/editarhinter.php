
<script src="../js/jquery-1.4.2.min.js"></script> 
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#catedratico").change(function(event){
            var id = $("#catedratico").find(':selected').val();
            $("#materia").load('genera-select-materia.php?id='+id);
        });
    });
</script>


<?php
include"../seguridad.php";
require_once("../conexiones/conexion.php");
 if (@$_POST['guardar']) {
if(isset($_POST['periodo'])and
($_POST['materia'])and
($_POST['catedratico'])and
($_POST['carrera'])and
($_POST['horaini'])and
($_POST['horafin'])and
($_POST['dia'])and
($_POST['lugar']!="")){ 

 $periodo1 = $_POST['periodo'];
     $materia1 = $_POST['materia'];
     $catedratico1 = $_POST['catedratico'];
     $carrera1 = $_POST['carrera'];
     $horaini1 = $_POST['horaini'];
     $horafin1 = $_POST['horafin'];
     $dia1 = $_POST['dia'];
     $lugar1 = $_POST['lugar'];
     $id1=$_POST['id'];
     $fecha1 =$_POST['fecha'];
     $vig1=$_POST['fechvig'];



     $sqlf="UPDATE fecha SET
dia = '".$dia1."', 
horain = '".$horaini1."', 
horafin = '".$horafin1."'
 WHERE idfecha='".$fecha1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());


$sqlq="UPDATE horariointersemestral SET
periodo = '".$periodo1."',
idmateria = '".$materia1."',
idcatedratico = '".$catedratico1."',
idcarrera = '".$carrera1."',
lugar = '".$lugar1."',
fechavig ='".$vig1."'
WHERE idhorariointersemestral='".$id1."'";
$resultadoq = mysql_query($sqlq) or die(mysql_error());
mysql_close();
if($sqlq){
    echo "<script>alert('Mi horario a sido agregado exitosamente'); window.location = '../horariointersemestral.php';</script>";
}


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idhinter'];
$mysqlid="SELECT idhorariointersemestral, periodo,  idmateria, idcatedratico,  idcarrera, idfacultad,idfecha, lugar, fechavig FROM horariointersemestral WHERE idhorariointersemestral=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);

    $periodo= $fil['periodo'];
     $materia = $fil['idmateria'];
     $catedratico = $fil['idcatedratico'];
     $carrera = $fil['idcarrera'];
     $fecha = $fil['idfecha'];
     $lugar = $fil['lugar'];
     $carrera = $fil['idcarrera'];
     $vig = $fil['fechavig'];
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
        
<title>Editar Horario Intersemestral</title>
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
                <li><a href="../horariosexamen.php">Horario Examen</a></li>
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
<label for="periodo1h" class="text1">Periodo:</label>
 <input type="text" id"periodo1h"  name="periodo" <?php echo "value='"; echo $periodo; echo"'";?> ><br>
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
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select nombre from materia where idmateria='".$materia."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fam = $fil[0];
    ?>
<label for="nrc1h" class="text1" id="nrcl1h">Materia:</label>
 
<select name="materia" id="materia" placeholder="Materia">
    <option selected <?php echo"value='"; echo $materia; echo "'"; echo ">"; echo $fam;?></option>
</select>
<br>



<label class="text1">Carrera:</label>
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
echo "</select><br>";
$sqlfecha="SELECT dia, horain, horafin FROM fecha WHERE idfecha='".$fecha."'";
$resulfecha = mysql_query($sqlfecha) or die(mysql_error());
    $fil = mysql_fetch_array($resulfecha, MYSQL_BOTH);
    $dia = $fil[0];
    $horaini = $fil[1];
    $horafin = $fil[2];
?>


 
 <label for="horarea1h" class="text1" id="horareal1h">Hora Inicio:</label>
 <input type="time" id="fecharea1h" name="horaini"required <?php echo"value='"; echo $horaini; echo "'";?> ><br>
 
 <label for="horareaf1h" class="text1" id="horareafl1h">Hora Termino:</label>
 <input type="time" id="horareaf1h" name="horafin" <?php echo"value='"; echo $horafin; echo "'";?>><br>
 
 
        <label for="dia1h" class="text1">Dia:</label>
            <input type="fecha" id="dia1h" name="dia" <?php echo"value='"; echo $dia; echo "'";?>><br>
           
 
    
        <label for="lugar1p" class="text1">Lugar de Realizacion:</label>
        <input type="text" id="lugar1p" placeholder="Lugar de realizacion de la publicacion" name="lugar"required
        <?php echo "value='"; echo $lugar; echo "'"; ?>><br><br>
</fieldset>
<fieldset><legend><a class="text2">Vigencia</a></legend>
    <a class="text1">La vigencia ayuda a que el sistema no muestre horarios pasados.</a><br><br>
<label><a class="text1">Fecha termino de Vigencia</a></label>
<input type="date" class="infecha" name="fechvig" <?php echo"value='"; echo $vig; echo"'"; ?> required/>
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</body>
<footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Coatlicue
    </footer>
</html>