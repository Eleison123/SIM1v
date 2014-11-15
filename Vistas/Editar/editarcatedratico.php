<?php include"../seguridad.php";
require_once("../../conexiones/conexion.php");
if (@$_POST['guardar']) {
       if(isset($_POST['nombre'])and
         ($_POST['id'])and
         ($_POST['apellidomaterno'])and
         ($_POST['apellidopaterno']!="")){
            $nombre1= $_POST['nombre'];
            $apellidopaterno1= $_POST['apellidopaterno'];
             $apellidomaterno1= $_POST['apellidomaterno'];
              $correo1= $_POST['correo'];
            $id1= $_POST['id'];


     $sqlf="UPDATE catedratico SET
nombre = '".$nombre1."', 
apellidomaterno = '".$apellidomaterno1."', 
apellidopaterno = '".$apellidopaterno1."', 
correo = '".$correo1."'
 WHERE idcatedratico='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());
mysql_close();
echo "<script>alert('Mi Catedrático ha sido editado exitosamente');
                window.location = '../Entidades/catedratico.php';</script>";


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idcar'];
$mysqlid="SELECT idcatedratico, nombre, apellidomaterno, apellidopaterno, correo FROM catedratico WHERE idcatedratico=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);
     $catedratico = $fil['idcatedratico'];
     $apellidomaterno = $fil['apellidomaterno'];
     $nombre = $fil['nombre'];
     $correo = $fil['correo'];
     $apellidopaterno = $fil['apellidopaterno'];
  

 }

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
 Begin
document.oncontextmenu = function(){return false}
</script>
        
<title>Editar Catedrático</title>
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
        <li><a href="../pagprin.php">INICIO</a></li>
        <li><a href="../Entidades/publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="../Entidades/horario.php">HORARIO</a></li>
        <li><a href="../Entidades/cuenta.php">CUENTA</a></li>
        <li><a href="../Entidades/facultad.php">FACULTAD</a></li>
        <li><a href="../Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="../Entidades/registro.php">REGISTRO</a></li>
        <li><a href="../Entidades/carrera.php">CARRERA</a></li>  
        <li><a href="../Entidades/catedratico.php" id="qwerty">CATEDRÁTICO</a></li>
        <li><a href="../Entidades/ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="../Entidades/salir.php">SALIR</a></li>   
    </ul>
</nav>
</div>

</div></center>

<body>
    <div id="cuerpo">
<figure><br><br>
<img src="../../imagenes/catedratico.png"><br><br>
</figure>


<form method="post" >
    <fieldset>
        <input type="text" hidden name="id" <?php echo "value='"; echo $catedratico; echo "'"; ?>>
 <label class="text1">Nombre:</label><br>
 <input type="text" name="nombre" <?php echo"value='"; echo $nombre; echo "'"; ?> ><br>

 <label class="text1">Apellido Materno:</label><br>
 <input type="text" name="apellidomaterno" <?php echo"value='"; echo $apellidomaterno; echo "'"; ?>><br>
  <label class="text1">Apellido Paterno:</label><br>
 <input type="text" name="apellidopaterno" <?php echo"value='"; echo $apellidopaterno; echo "'"; ?>><br>
  <label class="text1">Correo:</label><br>
 <input type="text" name="correo" <?php echo"value='"; echo $correo; echo "'"; ?>>
        
 
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</div>
</body>
  <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>