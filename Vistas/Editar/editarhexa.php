
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
require_once("../conexiones/conexion.php");
if(isset($_POST['fechaor'])and
($_POST['horaor'])and
($_POST['fechaex'])and
($_POST['horaex'])and
($_POST['fechati'])and
($_POST['horati'])and
($_POST['lugaror'])and
($_POST['lugarex'])and
($_POST['materia'])and
($_POST['actaor'])and
($_POST['actaex'])and
($_POST['actati'])and
($_POST['catedratico'])and
($_POST['carrera'])and
($_POST['lugarti']!="")){ 

     $fechaor1 = $_POST['fechaor'];
     $horaor1 = $_POST['horaor'];
     $fechaex1 = $_POST['fechaex'];
     $horaex1 = $_POST['horaex'];
     $fechati1 = $_POST['fechati'];
     $horati1 = $_POST['horati'];
     $lugaror1 = $_POST['lugaror'];
     $lugarex1 = $_POST['lugarex'];
     $lugarti1 = $_POST['lugarti'];
     $materia1 = $_POST['materia'];
     $carrera1 = $_POST['carrera'];
     $actaor1 = $_POST['actaor'];
     $actaex1 = $_POST['actaex'];
     $actati1 = $_POST['actati'];
     $carrera1 = $_POST['carrera'];
     $id = $_POST['id'];
     $catedratico1 = $_POST['catedratico'];


     
                //Se realiza registro
               
                

        
$sql="UPDATE horarioexamenes SET

fechaor ='".$fechaor1."',
 horaor = '".$horaor1."',
 fechaex = '".$fechaex1."',
 horaex ='".$horaex1."',
 fechati = '".$fechati1."',
 horati ='".$horati1."',
 idmateria = '".$materia1."',
 idcatedratico = '".$catedratico1."',
 lugaror ='".$lugaror1."',
 lugarex ='".$lugarex1."',
 lugarti ='".$lugarti1."',
 idcarrera = '".$carrera1."',
 actaor ='".$actaor1."',
 actaex = '".$actaex1."',
 actati =  '".$actati1."' WHERE idhorarioexamen=".$id."";
$resultado = mysql_query($sql) or die(mysql_error());
mysql_close();
//////////// Limpiamos Variables  ////////////
$fechaor1 = "";
     $horaor1 = "";
     $fechaex1 = "";
     $horaex1 = "";
     $fechati1 = "";
     $horati1 = "";
     $lugaror1 = "";
     $lugarex1 = "";
     $lugarti1 = "";
     $materia1 = "";
     $carrera1 = "";
     $actaor1 = "";
     $actaex1 = "";
     $actati1 = "";
echo "<script>alert('Mi horario ha sido editado');
            window.location = '../horariosexamen.php';</script>";
if ($resultado) {
}else{
    echo "Foto no subida";
}
mysql_close();
}
else{
echo "<script>alert('Falta llenar el formulario')</script>";
header("location:../horariosexamen.php");
}
}else{
    $hexa=$_POST['idhexa'];
$mysqlid="select idhorarioexamen,fechaor, horaor, fechaex, horaex, fechati, horati, idregistro, idmateria, idcatedratico, idfacultad, lugaror, lugarex, lugarti, idcarrera, actaor, actaex, actati,fechavig from horarioexamenes where idhorarioexamen='".$_POST['idhexa']."';";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);
 
     $fechaor = $fil['fechaor'];
     $horaor = $fil['horaor'];
     $fechaex = $fil['fechaex'];
     $horaex = $fil['horaex'];
     $fechati = $fil['fechati'];
     $horati = $fil['horati'];
     $lugaror = $fil['lugaror'];
     $lugarex = $fil['lugarex'];
     $lugarti = $fil['lugarti'];
     $materia = $fil['idmateria'];
     $carrera = $fil['idcarrera'];
     $actaor = $fil['actaor'];
     $actaex = $fil['actaex'];
     $actati = $fil['actati'];
      $catedratico = $fil['idcatedratico'];
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
   
    <?php
echo "<label class='text1' id='catel1h'>Catedratico:</label><br>"; 
 
 require_once("../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select idfacultad from administrador where nombre='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
    ?>
<select name="catedratico" id="catedratico" ><br>
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
 </select>
<br>
 <?php 
 echo"<input hidden name='id' value=' ".$hexa."'>";
 @session_start();
 require_once("../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select idfacultad from administrador where nombre='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];

    $sqln="select nombre from materia where idmateria=".$materia."";
     $resultadoss = mysql_query($sqln) or die(mysql_error());
    $mar = mysql_fetch_array($resultadoss, MYSQL_BOTH);
    $mart = $mar[0];
    ?>
<label for="nrc1h" class="text1" id="nrcl1h">Materia:</label><br>
<select name="materia" id="materia" required >
   <option selected <?php echo"value='"; echo $materia; echo"'"; echo">"; echo $mart; ?></option>

</select>

<br>
<?php
echo "</select>";
echo "<label class='text1' id='catel1h'>Carrera:</label><br>"; 
 
 require_once("../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "select idfacultad from administrador where nombre='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
    ?>
<select name="carrera" id="carrera"  <?php echo"value='";  echo $carrera; echo"'";?>>
    <?php

    
    //Preguntamos los nombres de las carreras segun su idfacultad
 $mysql="select idcarrera, nombre from carrera where idfacultad='".$fac."';";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    if ($row['idcarrera']!=$carrera) {
        # code...
echo "<option value='".$row['idcarrera']."'>";
    echo $row['nombre'];
    echo "</option>";
    }else{
    echo "<option selected value='".$carrera."'>";
    echo $row['nombre'];
    echo "</option>";
}
}

?>
</select>
  <fieldset><legend><a class="text1">Datos Ordinario</a></legend>
 <label for="horareaf1h" class="text1" id="horareafl1h">Fecha Ordinario:</label>
 <input type="date" id="horareaf1h" name="fechaor" class="infecha"<?php echo"value='";  echo $fechaor; echo"'";?>><br>   
 <label for="horarea1h" class="text1" >Hora Ordinario:</label>
 <input type="time" i name="horaor"  class="inhora" <?php echo"value='"; echo $horaor; echo"'";?>><br>
  <label  class="text1" id="horareafl1h">Entrega Acta Ordinario:</label>
 <input type="date" id="horareaf1h" name="actaor" class="infecha"<?php echo"value='";  echo $actaor; echo"'";?>><br>
 <label for="horarea1h" class="text1" id="horareal1h">Lugar de Realizacion Ordinario:</label>
 <input type="text" id="fecharea1h" name="lugaror" <?php echo"value='";  echo $lugaror; echo"'";?>><br>
</fieldset>
 

  <fieldset><legend><a class="text1">Datos Extraordinario</a></legend>
   <label for="horareaf1h" class="text1" id="horareafl1h">Fecha ExtraOrdinario:</label>
 <input type="date" id="horareaf1h" name="fechaex" class="infecha"<?php echo"value='";  echo $fechaex; echo"'";?>><br> 
 <label for="horarea1h" class="text1" id="horareal1h">Hora ExtraOrdinario:</label>
 <input type="time" id="fecharea1h" name="horaex" class="inhora"<?php echo"value='";  echo $horaex; echo"'";?>><br>
 <label  class="text1" id="horareafl1h">Entrega Acta Extraordinario:</label>
 <input type="date" id="horareaf1h" name="actaex" class="infecha"<?php echo"value='";  echo $actaex; echo"'";?>><br>
 <label for="horarea1h" class="text1" id="horareal1h">Lugar de Realizacion ExtraOrdinario:</label>
 <input type="text" id="fecharea1h" name="lugarex" <?php echo"value='";  echo $lugarex; echo"'";?>><br>
</fieldset>
 

<fieldset><legend><a class="text1">Datos Titulo</a></legend>
  <label for="horareaf1h" class="text1" id="horareafl1h">Fecha Titulo:</label>
 <input type="date" id="horareaf1h" name="fechati" <?php echo"value='";  echo $fechati; echo"'";?>><br>
 <label for="horarea1h" class="text1" id="horareal1h">Hora Titulo:</label>
 <input type="time" id="fecharea1h" name="horati" <?php echo"value='";  echo $horati; echo"'";?>><br>
 <label  class="text1" id="horareafl1h">Entrega Acta Titulo:</label>
 <input type="date" id="horareaf1h" name="actati" <?php echo"value='";  echo $actati; echo"'";?>><br>
 <label for="horarea1h" class="text1" id="horareal1h">Lugar de Realizacion Titulo:</label>
 <input type="text" id="fecharea1h" name="lugarti"<?php echo"value='";  echo $lugarti; echo"'";?>><br>
</fieldset>
<fieldset><legend><a class="text2">Vigencia</a></legend>
    <a class="text1">La vigencia ayuda a que el sistema no muestre horarios pasados.</a><br><br>
<label><a class="text1">Fecha termino de Vigencia</a></label>
<input type="date" class="infecha" name="fechvig" <?php echo"value='"; echo $vig; echo"'"; ?> required/>
</fieldset>
</fieldset><br><br>
    <input type="submit" value="Guardar" name="guardar" id="btnguardar"></input>
 
</form>
</body>
<footer id="footer">
        Code by Omar Santiaguillo Arcos 1v Coatlicue
    </footer>
</html>