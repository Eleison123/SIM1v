<?php
include"../seguridad.php";
require_once("../../conexiones/conexion.php");
if (@$_POST['guardar']) {


   
        if(isset($_POST['nombre'])and
           
            ($_POST['facultad'])and
            ($_POST['id'])and
            ($_POST['tipo']!="")){ 

            $nombre1= $_POST['nombre'];
            $contrasena1= $_POST['contrasena'];
            $tipo1= $_POST['tipo'];
           
            $facu1= $_POST['facultad'];
            $id1= $_POST['id'];

if($contrasena1!=""){
    $contrasena1=sha1($contrasena1);
     $sqlf="UPDATE cuenta SET
usuario = '".$nombre1."', 
contrasena = '".$contrasena1."', 
tipo = '".$tipo1."',
idfacultad = '".$facu1."'
 WHERE idcuenta='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());

if ($resultadof) {
   echo "<script>alert('Mi Cuenta ha sido editada exitosamente');
            window.location = '../Entidades/cuenta.php';</script>";
}}else{
         $sqlf="UPDATE cuenta SET
usuario = '".$nombre1."', 

tipo = '".$tipo1."',
idfacultad = '".$facu1."'
 WHERE idcuenta='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());

if ($resultadof) {
   echo "<script>alert('Mi usuario ha sido modificado exitosamente');
            window.location = '../usuario.php';</script>";
}

}
}else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";}
}
else{
$hes=$_POST['idad'];
$mysqlid="SELECT idcuenta, usuario, contrasena, tipo, idfacultad FROM cuenta WHERE idcuenta=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);

    
     $administrador = $fil['idcuenta'];
     $facultad = $fil['idfacultad'];
     $contrasena = $fil['contrasena'];
     $nombre = $fil['usuario'];
     $tipo = $fil['tipo'];

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
        <li><a href="../pagprin.php">INICIO</a></li>
        <li><a href="../Entidades/publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="../Entidades/horario.php">HORARIO</a></li>
        <li><a href="../Entidades/cuenta.php" id="qwerty">CUENTA</a></li>
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
</div></center>
<body>
    <div id="cuerpo">
<figure><br><br>
<img src="../../imagenes/cuenta.png"><br><br>
</figure>

<form method="post" >
    <fieldset>
        <input  hidden type="text" name="id" <?php echo"value='"; echo $administrador; echo "'"; ?>>

      <label class="text1">Nombre:</label><br>
      <input type="text" name="nombre" <?php echo"value='"; echo $nombre; echo "'";?>><br>

      <label class="text1">Contraseña:</label><br>
      <input type="password" name="contrasena" ><br>

      <label class="text1">Tipo</label><br>
      <select name="tipo"> 

        <?php
        if ($tipo=="1") {
             echo"<option selected value='".$tipo."'>Privilegios: Agregar,Editar, Eliminar y Hacer Reportes</option>";
            echo "<option value='2'>Privilegios: Agregar, Editar, Eliminar</option>";
            echo"<option value='3'>Privilegios: Agregar y Editar</option>";
        }
         if ($tipo=="2") {
             
            echo "<option value='1'>Privilegios: Agregar,Editar, Eliminar y Hacer Reportes</option>";
            echo"<option selected value='".$tipo."'>Privilegios: Agregar, Editar, Eliminar</option>";
            echo"<option value='3'> 3</option>";
        }
         if ($tipo=="3") {
             
            echo "<option value='1'>Privilegios: Agregar,Editar, Eliminar y Hacer Reportes</option>";
            echo"<option value='2'>Privilegios: Agregar, Editar, Eliminar</option>";
            echo"<option selected value='".$tipo."'>Privilegios: Agregar y Editar</option>";
        }
       
      ?>
      </select><br>
<label class="text1">Facultad:</label><br>
<?php
echo"<select name='facultad'>";
$SQLf="SELECT idfacultad,nombre FROM facultad";
$resul=mysql_query($SQLf) or die(mysql_error());
while($row=mysql_fetch_array($resul)){
    if ($row['idfacultad']!=$facultad) {
        echo"<option value=".$row['idfacultad'].">".$row['nombre']."</option>";
    }else{
        echo "<option selected value='".$facultad."'>".$row['nombre']."</option>";
    }
}
echo"</select>";
?>
        
 
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
      </div>
 
</form>
</body>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>