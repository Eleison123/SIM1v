
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
include"seguridad.php";
require_once("../../Conexiones/conexion.php");
 if (@$_POST['guardar']) {
  
if(isset($_POST['fechavig'])and
($_POST['materia'])and
($_POST['catedratico'])and
($_POST['carrera'])and
($_POST['horaini'])and
($_POST['horafin'])and
($_POST['dia'])and
($_POST['lugar']!="")){ 

   
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
     $fecha1 = mysql_real_escape_string($_POST['fechapub']);
     $fecha1 = filter_var($fecha1, FILTER_SANITIZE_SPECIAL_CHARS);
     $fechavigen = mysql_real_escape_string($_POST['fechavig']);
     $fechavigen = filter_var($fechavigen, FILTER_SANITIZE_SPECIAL_CHARS);
     $nrcant = mysql_real_escape_string($_POST['nrc']);
     $nrcant = filter_var($nrcant, FILTER_SANITIZE_SPECIAL_CHARS);
     $tipo = mysql_real_escape_string($_POST['tipo']);
     $tipo = filter_var($tipo, FILTER_SANITIZE_SPECIAL_CHARS);
     $nrc = mysql_real_escape_string($_POST['nrc']);
     $nrc = filter_var($nrc, FILTER_SANITIZE_SPECIAL_CHARS);
     $seccion = mysql_real_escape_string($_POST['seccion']);
     $seccion = filter_var($seccion, FILTER_SANITIZE_SPECIAL_CHARS);
     $bloque = mysql_real_escape_string($_POST['bloque']);
     $bloque = filter_var($bloque, FILTER_SANITIZE_SPECIAL_CHARS);
     $secretaria = mysql_real_escape_string($_POST['secretaria']);
     $secretaria = filter_var($secretaria, FILTER_SANITIZE_SPECIAL_CHARS);
     $acta= $_POST['acta'];


$sqlq="UPDATE horario SET
idExperienciaEducativa = '".$materia1."',
tipo = '".$tipo."',
Seccion = '".$seccion."',
NRC = '".$nrc."',
NRCANT = '".$nrcant."',
Bloque = '".$bloque."',
acta = '".$acta."',
idcatedratico = '".$catedratico1."',
idcarrera = '".$carrera1."',
idubicacion = '".$lugar1."',
dia = '".$dia1."', 
horain = '".$horaini1."', 
horafin = '".$horafin1."',
fechavig ='".$fechavigen."'
WHERE idHorario='".$id1."'";
$resultadoq = mysql_query($sqlq) or die(mysql_error());
mysql_close();
 echo "<script>alert('Mi horario ha sido editado satisfactoriamente');
            window.location = '../Entidades/horario.php';</script>";


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idhes'];
$mysqlid="SELECT * FROM horario WHERE idHorario=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);

     $id = $fil['idHorario'];
     $facultad = $fil['idFacultad'];
     $ubicacion = $fil['idubicacion'];
     $NRC = $fil['NRC'];
     $NRCANT = $fil['NRCANT'];
     $seccion = $fil['Seccion'];
     $bloque = $fil['Bloque'];
     $secretaria = $fil['Secretaria'];
     $acta = $fil['acta'];    
     $materia = $fil['idExperienciaEducativa'];
     $catedratico = $fil['idCatedratico'];
     $carrera = $fil['idCarrera'];
     $diapub = $fil['diapub'];
     $horapub = $fil['horapub'];
     $lugar = $fil['idubicacion'];
     $horaini = $fil['horain'];
     $horafin = $fil['horafin'];
     $tipo = $fil['tipo'];
     $dia = $fil['dia'];
     $vig = $fil['fechavig'];

 }

?>
<!DOCTYPE html>
<html leng="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/css1a.css">
<link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../../js/agregarhorario.js"></script>
<link rel="stylesheet" href="../../js/jquery-ui-1.11.2/jquery-ui.css">
<script src="../../js/jquery-1.10.2.js"></script> 
<script src="../../js/jquery-ui-1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="../../js/jquery-ui-1.11.2/jquery-ui.theme.css">
<title>Editar Horario</title>
</head>
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    <div id="men">
<nav id="menu">
            <ul>
                <li><a href="../pagprin.php" >INICIO</a></li>
                <li><a>/</a></li>
                <li><a href="../Entidades/horario.php">HORARIO</a></li>
                <li><a>/</a></li>
                <li><a>AGREGRAR HORARIO</a></li>
    </ul>
</nav>
</div>
</div></center>
<body>
<div id="cuerpo"><br><br>
<figure>
<img src="../../imagenes/horario.png">
</figure><br><br>
 <fieldset>
 <legend class="text2">Datos del Horario</legend>
 <div id="formularioh">
 <form method="post">
    <input type="hidden" value='<?php echo $id; ?>' name="id">
<label class="text1">TIPO:</label><br>
<?php 
    if($tipo==1){$tipox="Escolar";}
    if($tipo==2){$tipox="Ordinario";}
    if($tipo==3){$tipox="Extraordinario";}
    if($tipo==4){$tipox="Título";}
    if($tipo==5){$tipox="Tutoría";}
    if($tipo==6){$tipox="Intersemestral";}
?>
            <select id="tipo" name="tipo">
                <?php echo "<option selected value='".$tipo."'>".$tipox."</option>";?>
            <!-- <option selected value="">Seleccionar tipo</option> -->
            <option value="1" id="he1">Escolar</option>
            <option value="2" id="ho2">Ordinario</option>
            <option value="3" id="hex3">Extraordinario</option>
            <option value="4" id="ht4">Título</option>
            <option value="5" id="ht5">Tutoría</option>
            <option value="6" id="ht5">Intersemestral</option>
            </select></br>
<label class="text1" id="nrc">NRC:</label><br>
<input type="text" id="nrc1"name="nrc" value='<?php echo $NRC; ?>' placeholder="Ejemplo: NTG34" maxlength="5"><br>
<label class="text1" id="nrcant">NRC ANTERIOR:</label><br>
<input type="text" id="nrcant1" name="nrcant" value='<?php echo $NRCANT; ?>' placeholder="Ejemplo: NTG86" maxlength="5"><br>
<label class="text1" id="sec">SECCIÓN:</label><br>
<input type="text" id="sec1" name="seccion" value='<?php echo $seccion; ?>' placeholder="Ejemplo: S4" maxlength="2"><br>
<label class="text1" id="blo">BLOQUE:</label><br>
<input type="text" id="blo1" name="bloque" placeholder="Ejemplo: B4" value='<?php echo $bloque; ?>' maxlength="2"><br>


 <label for="" class="text1" id="catel1h">CATEDRÁTICO:</label><br>
<?php 
 require_once("../../Conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sqlcate = "SELECT * FROM catedratico WHERE idCatedratico ='".$catedratico."';";    
    $resultadocate = mysql_query($sqlcate) or die(mysql_error());
    $filcate = mysql_fetch_array($resultadocate, MYSQL_BOTH);
    $nombrecate = $filcate['Nombre'];
    $apcate1 = $filcate['Apellidopaterno'];
    $apcate2 = $filcate['Apellidomaterno'];
    $nombrescate = $nombrecate." ".$apcate1." ".$apcate2;

    ?>
<select name="catedratico" id="catedratico" placeholder="catedratico">
    <option selected value='<?php echo $catedratico; ?>' ><?php echo $nombrescate ?></option>

    
    <?php
    //Preguntamos los nombres de las materias segun su idfacultad
 $mysql="SELECT idcatedratico, nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idfacultad='".$fac."';";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    echo "<option value='".$row['idcatedratico']."'>";
    echo $row['nombre'];
    echo " ";
    echo $row['apellidomaterno'];
    echo " ";
    echo  $row['apellidopaterno'] ;
    echo "</option>";
}

?>
</select><br>
<label class="text1">CARRERA:</label><br>
<?php 
 @session_start();
 require_once("../../Conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];

   $sqlcar = "SELECT * FROM carrera WHERE idCarrera ='".$carrera."';";    
    $resultadocar = mysql_query($sqlcar) or die(mysql_error());
    $filcar = mysql_fetch_array($resultadocar, MYSQL_BOTH);
    $nombrecar = $filcar['Nombre'];
    echo "<select name='carrera' id='carrera' placeholder='Carrera'>";
    //Preguntamos los nombres de las materias segun su idfacultad
    echo "<option selected value='".$carrera."'>".$nombrecar."</option>";
 $mysql="SELECT idcarrera, nombre FROM carrera WHERE idfacultad='".$fac."';";
$resul=mysql_query($mysql) or die(mysql_error());
while($row=mysql_fetch_array($resul)){

    echo "<option value='".$row['idcarrera']."'>";
    echo $row['nombre'];
    echo "</option>";
}
echo "</select>";

?>
<br>

 <label for="nrc1h" class="text1" id="nrcl1h">EXPERIENCIA EDUCATIVA:</label><br>

<select name="materia" id="materia" placeholder="Materia">
    <?php
    $sqlee = "SELECT nombre FROM experienciaeducativa WHERE idExperienciaEducativa='".$materia."';";    
    $resultadoee = mysql_query($sqlee) or die(mysql_error());
    $filee = mysql_fetch_array($resultadoee, MYSQL_BOTH);
    $ee = $filee[0];
    ?>
    <option selected value='<?php echo $materia; ?>'><?php echo $ee?></option>
  
</select><br>

        <label for="dia1h" class="text1">DÍA:</label><br>
            <select id="dia1h" name="dia">
            <option selected value='<?php echo $dia; ?>'><?php echo $dia; ?></option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            </select></br>

    <label class="text1">FECHA:</label><br>
    <input type="text" id="datepicker" value='<?php echo $dia; ?>' maxlength="10" name="dia"><br>
    <label class="text1">ENTREGA ACTA:</label><br>
    <input type="text" id="datepicker5" value='<?php echo $acta; ?>' maxlength="10" name="acta"><br>
    
 <label for="horarea1h" class="text1" id="horareal1h">HORA INICIO:</label><br>
 <input type="time" id="fecharea1h" name="horaini" value='<?php echo $horaini; ?>'class="inhora"required><br>
 
 <label for="horareaf1h" class="text1" id="horareafl1h">HORA TÉRMINO:</label><br>
 <input type="time" id="horareaf1h" name="horafin" value='<?php echo $horafin; ?>' class="inhora"></br>
    
        <label for="lugar1p" class="text1">LUGAR DE REALIZACIÓN:</label><br>
        <select id="lugar1p" name="lugar" required>
            <?php
            $sqlu = "SELECT nombre FROM ubicacion WHERE idubicacion='".$lugar."';";    
            $resultadou = mysql_query($sqlu) or die(mysql_error());
            $filu = mysql_fetch_array($resultadou, MYSQL_BOTH);
            $u = $filu[0];
            ?>
            <option value='<?php echo $lugar; ?>' selected><?php echo $u; ?></option>
            <?php   
                $sqlugar= "SELECT idubicacion,nombre FROM ubicacion WHERE idFacultad = '".$fac."';";
                $result=mysql_query($sqlugar) or die (mysql_error());
                while ($row2=mysql_fetch_array($result)) {
                    echo "<option value='".$row2['idubicacion']."'>";
                    echo $row2['nombre'];
                    echo "</option>";
                  }  
            ?>
        </select><br>
        <label class="text1">SECRETARIA:</label><br>
        <input type="text" name="secretaria" value='<?php echo $secretaria; ?>' id="secre" placeholder="Ejemplo: Catalina"><br>
</fieldset><br><br>
<fieldset><legend><a class="text2">Vigencia</a></legend>
    <a class="text1">*La vigencia ayuda a que el sistema no muestre horarios pasados.</a><br><br>

    <label><a class="text1">FECHA DE PUBLICACIÓN:</a></label><br>
    <input type="text" maxlength="10" value='<?php echo $diapub; ?>' id="datepicker2" class="infecha" name="fechapub"><br>

    <label><a class="text1">HORA PUBLICACIÓN:</a></label><br>
    <input type="time" class="inhora" value='<?php echo $horapub; ?>' name="horapub"><br>

<label><a class="text1">FECHA VIGENCIA:</a></label><br>
<input type="text" maxlength="10" id="datepicker4" value='<?php echo $vig; ?>' class="infecha" name="fechavig" required/>
</fieldset>
        <center><input type="submit" value="GUARDAR" id="btnguardar" name="guardar"></center>
  </form>
</div>
    </div>
</body>
    <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>
<script>
  $(function() {
    $("#datepicker").datepicker();
  });
  $(function() {
    $("#datepicker1").datepicker();
  });
  $(function() {
    $("#datepicker2").datepicker();
  });
  $(function() {
    $("#datepicker3").datepicker();
  });
  $(function() {
    $("#datepicker4").datepicker();
  });
  $(function() {
    $("#datepicker5").datepicker();
  });
  $(function() {
    $( document ).tooltip();
  });

  </script>