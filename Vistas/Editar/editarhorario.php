
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
require_once("../../conexiones/conexion.php");
 if (@$_POST['guardar']) {
if(isset($_POST['periodo'])and
($_POST['materia'])and
($_POST['catedratico'])and
($_POST['carrera'])and
($_POST['horaini'])and
($_POST['horafin'])and
($_POST['dia'])and
($_POST['lugar']!="")){ 

     $periodo1 = mysql_real_escape_string($_POST['periodo']);
     $periodo1 = filter_var($periodo1, FILTER_SANITIZE_SPECIAL_CHARS);
     $materia1 = mysql_real_escape_string($_POST['materia']);
     $materia1 = filter_var($materia1, FILTER_SANITIZE_SPECIAL_CHARS);
     $catedratico1 = mysql_real_escape_string($_POST['catedratico']);
     $catedratico1 = filter_var($catedratico1, FILTER_SANITIZE_SPECIAL_CHARS);
     $carrera1 = mysql_real_escape_string($_POST['carrera']);
     $carrera1 = filter_var($carrera1, FILTER_SANITIZE_SPECIAL_CHARS);
     $horaini1 = mysql_real_escape_string($_POST['horaini']);
     $horaini1 = filter_var($horaini1, FILTER_SANITIZE_SPECIAL_CHARS);
     $horafin1 = mysql_real_escape_string($_POST['horafin']);
     $horafin1 = filter_var($horafin1, FILTER_SANITIZE_SPECIAL_CHARS);
     $dia1 = mysql_real_escape_string($_POST['dia']);
     $dia1 = filter_var($dia1, FILTER_SANITIZE_SPECIAL_CHARS);
     $lugar1 = mysql_real_escape_string($_POST['lugar']);
     $lugar1 = filter_var($lugar1, FILTER_SANITIZE_SPECIAL_CHARS);
     $id1= mysql_real_escape_string($_POST['id']);
     $id1 = filter_var($id1, FILTER_SANITIZE_SPECIAL_CHARS);
     $fecha1 = mysql_real_escape_string($_POST['fecha']);
     $fecha1 = filter_var($fecha1, FILTER_SANITIZE_SPECIAL_CHARS);
     $fechavigen = mysql_real_escape_string($_POST['fechvig']);
     $fechavigen = filter_var($fechavigen, FILTER_SANITIZE_SPECIAL_CHARS);




     $sqlf="UPDATE fecha SET
dia = '".$dia1."', 
horain = '".$horaini1."', 
horafin = '".$horafin1."'
 WHERE idfecha='".$fecha1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());


$sqlq="UPDATE horarioescolar SET
periodo = '".$periodo1."',
idmateria = '".$materia1."',
idcatedratico = '".$catedratico1."',
idcarrera = '".$carrera1."',
lugar = '".$lugar1."',
fechavig ='".$fechavigen."'
WHERE idhorarioescolar='".$id1."'";
$resultadoq = mysql_query($sqlq) or die(mysql_error());
mysql_close();
 echo "<script>alert('Mi horario ha sido editado');
            window.location = '../horarioescolar.php';</script>";


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idHorario'];
$mysqlid="SELECT idHorario, periodo,tipo,  idExperienciaEducativa, idcatedratico, idfecha, idcarrera, idfacultad, lugar,fechavig FROM horario WHERE idExperienciaEducativa=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);

    $periodo= $fil['periodo'];
     $materia = $fil['idExperienciaEducativa'];
     $catedratico = $fil['idcatedratico'];
     $carrera = $fil['idcarrera'];
     $fecha = $fil['idfecha'];
     $lugar = $fil['lugar'];
     $carrera = $fil['idcarrera'];
     $vig= $fil['fechavig'];

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
        
<title>Editar Horario</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
         <li><a href="../pagprin.php" >INICIO</a></li>
        <li><a href="../Entidades/publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="../Entidades/horario.php" id="qwerty">HORARIO</a></li>
        <li><a href="../Entidades/cuenta.php">CUENTA</a></li>
        <li><a href="../Entidades/facultad.php">FACULTAD</a></li>
        <li><a href="../Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="../Entidades/registro.php">REGISTRO</a></li>
        <li><a href="../Entidades/carrera.php">CARRERA</a></li>  
        <li><a href="../Entidades/catedratico.php">CATEDRÁTICO</a></li>   
        <li><a href="../Entidades/ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="../Entidades/salir.php">SALIR</a></li>  
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
<label for="periodo1h" class="text1">Periodo:</label><br>
 <input type="text" id"periodo1h"  name="periodo" <?php echo "value='"; echo $periodo; echo"'";?> ><br>
 <input type="text"   hidden name="id" <?php echo "value='"; echo $hes; echo"'";?> >
 <input type="text"  hidden name="fecha" <?php echo "value='"; echo $fecha; echo"'";?> >
 
<label for="" class="text1" id="catel1h">Catedratico:</label><br>
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
 $mysql="SELECT idcatedratico, nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idfacultad='".$fac."';";
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
    $sql = "SELECT nombre FROM experienciaeducativa WHERE idExperienciaEducativa='".$materia."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fam = $fil[0];
    ?>
<label for="nrc1h" class="text1" id="nrcl1h">Materia:</label><br>
 
<select name="materia" id="materia" placeholder="Materia">
    <option selected <?php echo"value='"; echo $materia; echo "'"; echo ">"; echo $fam;?></option>
</select><br>




<label class="text1">Carrera:</label><br>
<?php 
 @session_start();
 require_once("../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad from cuenta where usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   
    echo "<select name='carrera' id='carrera' placeholder='Carrera'>";
    //Preguntamos los nombres de las materias segun su idfacultad
 $mysql="SELECT idcarrera, nombre FROM carrera WHERE idfacultad='".$fac."';";
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
 <input type="time" id="fecharea1h" name="horaini"required class="inhora"<?php echo"value='"; echo $horaini; echo "'";?> >
 
 <label for="horareaf1h" class="text1" id="horareafl1h">Hora Termino:</label>
 <input type="time" id="horareaf1h" name="horafin" class="inhora"<?php echo"value='"; echo $horafin; echo "'";?>><br>
 
 
        <label for="dia1h" class="text1">Dia:</label>
            <select id="dia1h" name="dia" class="infecha">
            <option selected  <?php echo "value='"; echo $dia; echo "'";echo ">"; echo $dia;?></option>
            <?php 
            if ($dia!="Lunes") {
                echo "<option value='Lunes'>Lunes</option>";
            }
            if ($dia!="Martes") {
                echo "<option value='Martes'>Martes</option>";
            }
            if ($dia!="Miercoles") {
                echo "<option value='Miercoles'>Miercoles</option>";
            }
            if ($dia!="Jueves") {
                echo "<option value='Jueves'>Jueves</option>";
            }
            if ($dia!="Viernes") {
                echo"<option value='Viernes'>Viernes</option>";
            }
            ?>
            
            </select><br><br>
 
    
        <label for="lugar1p" class="text1">Lugar de Realizacion:</label>
        <input type="text" id="lugar1p" placeholder="Lugar de realizacion de la publicacion" name="lugar"required
        <?php echo "value='"; echo $lugar; echo "'"; ?>><br><br>

</fieldset>
<fieldset><legend><a class="text2">Vigencia</a></legend>
    <a class="text1">La vigencia ayuda a que el sistema no muestre horarios pasados.</a><br><br>
<label><a class="text1">Fecha termino de Vigencia</a></label>

<input type="date" class="infecha" name="fechvig" <?php echo"value='"; echo $vig; echo"'"; ?> > 
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</body>
<footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Coatlicue
    </footer>
</html>