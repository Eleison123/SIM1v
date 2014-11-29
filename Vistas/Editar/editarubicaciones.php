<?php
include"../seguridad.php";
require_once("../../conexiones/conexion.php");
if (@$_POST['guardar']) {
       if(isset(
            $_POST['nombre'])and
            ($_POST['descripcion'])and
            ($_POST['id']!="")){ 

            $nombre1= mysql_real_escape_string($_POST['nombre']);
            $nombre1 = filter_var($nombre1, FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion1= mysql_real_escape_string($_POST['descripcion']);
            $descripcion1 = filter_var($descripcion1, FILTER_SANITIZE_SPECIAL_CHARS);
            $id1= $_POST['id'];
     $sqlf="UPDATE ubicacion SET
nombre = '".$nombre1."',
descripcion = '".$descripcion1."'
 WHERE idubicacion='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());
  echo "<script>alert('Mi Ubicacion ha sido Editada Exitosmente');
                window.location = '../Entidades/ubicaciones.php';</script>";


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idubi'];
$mysqlid="SELECT idubicacion, nombre, descripcion FROM ubicacion WHERE idubicacion=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);
     $carrera = $fil['idubicacion'];
     $nombre = $fil['nombre'];
     $descripcion=$fil['descripcion'];
  

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
        
<title>Editar Cuenta</title>
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
         <li><a href="../pagprin.php" >INICIO</a></li>
        <li><a href="../Entidades/publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="../Entidades/horario.php">HORARIO</a></li>
        <li><a href="../Entidades/cuenta.php">CUENTA</a></li>
        <li><a href="../Entidades/facultad.php">FACULTAD</a></li>
        <li><a href="../Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="../Entidades/registro.php">REGISTRO</a></li>
        <li><a href="../Entidades/carrera.php">CARRERA</a></li>  
        <li><a href="../Entidades/catedratico.php">CATEDRÁTICO</a></li>   
        <li><a href="../Entidades/ubicaciones.php" id="qwerty">UBICACIONES</a></li>   
        <li><a href="../Entidades/salir.php">SALIR</a></li> 
</nav>
</div>

</div></center>

<body>
    <div id="cuerpo">
<figure><br><br>
<img src="../../imagenes/carrera.png"><br><br>
</figure>


<form method="post" >
    <fieldset>
        <input type="text" hidden name="id" <?php echo "value='"; echo $carrera; echo "'"; ?>>
 <label class="text1">Nombre:</label><br>
 <input type="text" name="nombre" <?php echo"value='"; echo $nombre; echo "'"; ?> ><br>
 <label class="text1">Descripción:</label><br>
 <textarea name ="descripcion"><?php echo $descripcion ?></textarea>


        
 
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</body></div>
 <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>