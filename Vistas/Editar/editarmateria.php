


<?php
include"../seguridad.php";
require_once("../../conexiones/conexion.php");
if (@$_POST['guardar']) {


    if(isset($_POST['carrera'])and
            ($_POST['nombre']!="")){ 
            $nombre1= $_POST['nombre'];
            $carrera1= $_POST['carrera'];
             $id1=$_POST['id'];

     $sqlf="UPDATE experienciaeducativa SET
nombre = '".$nombre1."',
idcarrera = '".$carrera1."'
 WHERE idExperienciaEducativa='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());
if ($resultadof) {
     echo "<script>alert('Mi Experiencia Educativa ha sido modificada exitosamente');
                window.location = '../../Vistas/Entidades/eeducativa.php';</script>";
}




}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idm'];
$mysqlid="SELECT idExperienciaEducativa, nombre, idfacultad, idcarrera FROM experienciaeducativa WHERE idExperienciaEducativa=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);

    $id=$fil['idExperienciaEducativa'];
    $nombre= $fil['nombre'];
        $carrera= $fil['idcarrera'];
              $facultad= $fil['idfacultad'];
 }

?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
       <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
        
<title>Editar Experiencia Educativa</title>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
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

<form method="post" >
    <fieldset>

 
 <input type="text"   hidden name="id" <?php echo "value='"; echo $hes; echo"'";?> >

 <label class="text1">Nombre:</label><br>
 <input type="text" name="nombre" <?php echo "value='"; echo $nombre; echo "'"; ?>><br><br>
<label class="text1">Carrera:</label><br>
<?php
        @session_start();
 require_once("../../conexiones/conexion.php");
 //Preguntamos quien es el administrador para obtener la "idfacultad"
    $nombreadmin = $_SESSION['nombreUsuario'];
    $sql = "SELECT idfacultad FROM cuenta where usuario='".$nombreadmin."';";    
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


  ?>      <br>
</fieldset>
        <center><input type="submit" value="Guardar" id="btnguardar" name="guardar"></center>
 
</form>
</body></div>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>