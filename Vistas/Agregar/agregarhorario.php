<?php require_once ("../../Controller/agregarhorario.php"); ?>
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
<title>Agregar Horario</title>
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
<label class="text1">TIPO:</label><br>
            <select id="tipo" name="tipo">
            <option selected value="">Seleccionar tipo</option>
            <option value="1" id="he1">Escolar</option>
            <option value="2" id="ho2">Ordinario</option>
            <option value="3" id="hex3">Extraordinario</option>
            <option value="4" id="ht4">Título</option>
            <option value="5" id="ht5">Tutoría</option>
            <option value="6" id="ht5">Intersemestral</option>
            </select></br>
<label class="text1" id="nrc">NRC:</label><br>
<input type="text" id="nrc1"name="nrc" placeholder="Ejemplo: NTG34" maxlength="5"><br>
<label class="text1" id="nrcant">NRC ANTERIOR:</label><br>
<input type="text" id="nrcant1" name="nrcant" placeholder="Ejemplo: NTG86" maxlength="5"><br>
<label class="text1" id="sec">SECCIÓN:</label><br>
<input type="text" id="sec1" name="seccion" placeholder="Ejemplo: S4" maxlength="2"><br>
<label class="text1" id="blo">BLOQUE:</label><br>
<input type="text" id="blo1" name="bloque" placeholder="Ejemplo: B4" maxlength="2"><br>


 <label for="" class="text1" id="catel1h">CATEDRÁTICO:</label><br>
<?php 
 
 require_once("../../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
    ?>
<select name="catedratico" id="catedratico" placeholder="catedratico">
    <option selected value="">Seleccionar Catedrático</option>
    
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
 require_once("../../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
    $resultado = mysql_query($sql) or die(mysql_error());
    $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
    $fac = $fil[0];
   
    echo "<select name='carrera' id='carrera' placeholder='Carrera'>";
    //Preguntamos los nombres de las materias segun su idfacultad
    echo "<option selected value=''>Seleccionar Carrera</option>";
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
    <option selected value="">Seleccionar Experiencia Educativa</option>
  
</select><br>



        <label for="dia1h" class="text1">DÍA:</label><br>
            <select id="dia1h" name="dia">
            <option selected value="">Seleccionar día</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            </select></br>

    <label class="text1">FECHA:</label><br>
    <input type="text" id="datepicker" maxlength="10" name="dfecha"><br>
    <label class="text1">ENTREGA ACTA:</label><br>
    <input type="text" id="datepicker5" maxlength="10" name="acta"><br>
    
 <label for="horarea1h" class="text1" id="horareal1h">HORA INICIO:</label><br>
 <input type="time" id="fecharea1h" name="horaini" class="inhora"required><br>
 
 <label for="horareaf1h" class="text1" id="horareafl1h">HORA TÉRMINO:</label><br>
 <input type="time" id="horareaf1h" name="horafin" class="inhora"></br>
    
        <label for="lugar1p" class="text1">LUGAR DE REALIZACIÓN:</label><br>
        <select id="lugar1p" name="lugar" required>
            <option selected>Selecciona una ubicación</option>
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
        <input type="text" name="secretaria" id="secre" placeholder="Ejemplo: Catalina"><br>
</fieldset><br><br>
<fieldset><legend><a class="text2">Vigencia</a></legend>
    <a class="text1">*La vigencia ayuda a que el sistema no muestre horarios pasados.</a><br><br>
    <label><a class="text1">FECHA DE PUBLICACIÓN:</a></label><br>
    <input type="text" maxlength="10" id="datepicker2" class="infecha" name="fechapub"><br>
    <label><a class="text1">HORA PUBLICACIÓN:</a></label><br>
    <input type="time" class="inhora" name="horapub"><br>
<label><a class="text1">FECHA VIGENCIA:</a></label><br>
<input type="text" maxlength="10" id="datepicker4" class="infecha" name="fechavig" required/>
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