<?php require_once ("../../Controller/agregarhorario.php"); ?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
<link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
<script src="../../js/jquery-1.4.2.min.js"></script> 
<script language="Javascript" type="text/javascript">
//<![CDATA[
<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#catedratico").change(function(event){
            var id = $("#catedratico").find(':selected').val();
            $("#materia").load('../Editar/genera-select-materia.php?id='+id);
        });
    });
</script>

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
            <option value="Lunes">Escolar</option>
            <option value="Martes">Ordinario</option>
            <option value="Miercoles">Extraordinario</option>
            <option value="Jueves">Título</option>
            <option value="Viernes">Tutoría</option>
            </select></br>
 
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
 <label for="nrc1h" class="text1" id="nrcl1h">EXPERIENCIA EDUCATIVA:</label><br>

<select name="materia" id="materia" placeholder="Materia">
    <option selected value="">Seleccionar Experiencia Educativa</option>
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

        <label for="dia1h" class="text1">DÍA:</label><br>
            <select id="dia1h" name="dia">
            <option selected value="">Seleccionar día</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            </select></br>
             
 <label for="horarea1h" class="text1" id="horareal1h">HORA INICIO:</label><br>
 <input type="time" id="fecharea1h" name="horaini" class="inhora"required><br>
 
 <label for="horareaf1h" class="text1" id="horareafl1h">HORA TÉRMINO:</label><br>
 <input type="time" id="horareaf1h" name="horafin" class="inhora"></br>
    
        <label for="lugar1p" class="text1">LUGAR DE REALIZACIÓN:</label><br>
        <select id="lugar1p" name="lugar" required>
            <option selected>Selecciona un lugar</option>
            <?php   
                $sqlugar= "SELECT idubicacion,nombre FROM ubicacion;";
                $result=mysql_query($sqlugar) or die (mysql_error());
                while ($row2=mysql_fetch_array($result)) {
                    echo "<option value='".$row2['idubicacion']."'>";
                    echo $row2['nombre'];
                    echo "</option>";
                  }  
            ?>
        </select>
</fieldset><br><br>
<fieldset><legend><a class="text2">Vigencia</a></legend>
    <a class="text1">*La vigencia ayuda a que el sistema no muestre horarios pasados.</a><br><br>
    <label><a class="text1">FECHA DE PUBLICACIÓN:</a></label><br>
    <input type="date" class="infecha" name="fechapub"><br>
    <label><a class="text1">HORA PUBLICACIÓN:</a></label><br>
    <input type="time" class="inhora" name="horapub"><br>
<label><a class="text1">FECHA VIGENCIA:</a></label><br>
<input type="date" class="infecha" name="fechavig" required/>
</fieldset>
        <input type="submit" value="GUARDAR" id="btnguardar" name="guardar">
    <input type="reset" id="btnreset" value="RESET">
  </form>
</div>
    </div>
</body>
    <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>