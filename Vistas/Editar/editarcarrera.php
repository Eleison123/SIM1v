


<?php
include"../seguridad.php";
require_once("../../conexiones/conexion.php");
if (@$_POST['guardar']) {
       if(isset($_POST['nombre'])and
            ($_POST['id']!="")){ 
            
            $nombre1= mysql_real_escape_string($_POST['nombre']);
            $nombre1 = filter_var($nombre1, FILTER_SANITIZE_SPECIAL_CHARS);
            //$contrasenia= md5($contrasena);
            
            $id1= $_POST['id'];


     $sqlf="UPDATE carrera SET
nombre = '".$nombre1."'
 WHERE idcarrera='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());


  echo "<script>alert('Mi Carrera ha sido Editada Exitosmente');
                window.location = '../Entidades/carrera.php';</script>";


}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idcar'];
$mysqlid="SELECT idcarrera, nombre FROM carrera WHERE idcarrera=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);
     $carrera = $fil['idcarrera'];
     $nombre = $fil['nombre'];
  

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
        <li><a href="../pagprin.php">Inicio</a></li>
        <li><a href="../Entidades/publicacion.php">Publicación</a></li>
        <li><a href="../Entidades/horario.php">Horarios</a></li>
        <li><a href="../Entidades/cuenta.php">Cuenta</a></li>
        <li><a href="../Entidades/facultad.php">Facultad</a></li>
        <li><a href="../Entidades/eeducativa.php">E.Educativa</a></li>
        <li><a href="../Entidades/registro.php">Registro</a></li>
        <li><a href="../Entidades/carrera.php">Carrera</a></li>  
        <li><a href="../Entidades/catedratico.php">Catedrático</a></li>
        <li><a href="../Entidades/catedratico.php">Ubicaciones</a></li>   
        <li><a href="../Entidades/salir.php">Salir</a></li>  
    </ul>
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


        
 
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</body></div>
 <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>