<?php
 require_once("../../Controller/agregareeducativa.php");
    ?>

<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[
<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<title>Kiosco administrador</title>
</head>
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="../pagprin.php">Inicio</a></li>
        <li><a href="../Entidades/publicacion.php">Publicación</a></li>
        <li><a href="../Entidades/horario.php">Horarios</a></li>
        <li><a href="../Entidades/cuenta.php">Cuenta</a></li>
        <li><a href="../Entidades/facultad.php">Facultad</a></li>
        <li><a href="../Entidades/eeducativa.php" id="qwerty">E.Educativa</a></li>
        <li><a href="../Entidades/registro.php">Registro</a></li>
        <li><a href="../Entidades/carrera.php">Carrera</a></li>  
        <li><a href="../Entidades/catedratico.php">Catedrático</a></li>
        <li><a href="../Entidades/catedratico.php">Ubicaciones</a></li>   
        <li><a href="../Entidades/salir.php">Salir</a></li>   
    </ul>
</nav>
</div>

</div></div></center>

<body>
    <div id="cuerpo">
        <figure><br><br>
            <img src="../../imagenes/e-educativa.png"><br><br>
        </figure>
        

        
        
      <form method="POST">
        <fieldset><legend><a class="text1">Datos de Materia</a></legend>
            <label><a class="text1">NRC:</a></label>
            <input type="text" name="nrc" pleaceholder="NRC Vigente"><br><br>
            <label><a class="text1">NRC 98:</a></label>
            <input type="text" name="nrc98" pleaceholder="NRC Vigente"><br><br>
            <label><a class="text1">Nombre:</a></label>
            <input type="text" name="nombre" placeholder="Nombre de la Materia">  <br> <br>    

                        <?php 
                         require_once("../../conexiones/conexion.php");
                         @session_start();
                         //Preguntamos quien es el administrador para obtener la "idfacultad"
                            $nombreadmin = $_SESSION['nombreUsuario'];
                            $sql = "SELECT idfacultad FROM Cuenta WHERE usuario='".$nombreadmin."';";    
                            $resultado = mysql_query($sql) or die(mysql_error());
                            $fil = mysql_fetch_array($resultado, MYSQL_BOTH);
                            $fac = $fil[0];
                        
                            ?>
   <label><a class="text1">Catedratico:</a></label>                         
<select name="catedratico" id="catedratico" placeholder="catedratico">
    <?php
    require_once("../../conexiones/conexion.php");
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
echo "</select>";
?>
</select><br><br>
<label><a class="text1">Carrera:</a></label>

  <?php  
   echo "<select name='carrera'>";
    $caread="SELECT idcarrera, nombre , idfacultad FROM carrera WHERE idfacultad = '".$fac."';";
    $pregunta= mysql_query($caread) or die(mysql_error());
    
        while ($listado=mysql_fetch_array($pregunta)) {
            echo "<option value='".$listado['idcarrera']."'>";
            echo $listado['nombre'];
            echo "</option>";
        }
        echo "</select><br>";

?>
</fieldset>
<input type="submit"  value="Guardar" id="btnguardar" name="guardar"> <input type="reset" id="btnreset">
       
    </div>
    </form></div>
</body>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>