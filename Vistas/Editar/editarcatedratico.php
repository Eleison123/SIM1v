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
$sqlpre = "SELECT * FROM catedratico";
            $cosapregunta=mysql_query($sqlpre) or die(mysqli_error());
            $coinciden=0;
            $cadena2=$nombre1.$apellidopaterno1.$apellidomaterno1.$correo1;
            // $cadena2=ereg_replace("[]+","", $cadena2);
            while($row=mysql_fetch_array($cosapregunta)){
                    $cadena=$row['Nombre'].$row['Apellidopaterno'].$row['Apellidomaterno'].$row['Correo'];
                                // $cadena=ereg_replace("[]+","", $cadena);
                                if($cadena==$cadena2){
                                $coinciden=1;
                            }
                        }
                    
            
            if($coinciden==1){
                        echo "<script>alert('Ya existe mi Catedrático');
                            window.location ='../Entidades/catedratico.php';</script>";

            }else{

     $sqlf="UPDATE catedratico SET
        Nombre = '".$nombre1."', 
        Apellidomaterno = '".$apellidomaterno1."', 
        Apellidopaterno = '".$apellidopaterno1."', 
        Correo = '".$correo1."'
        WHERE idcatedratico='".$id1."'";
$resultadof = mysql_query($sqlf) or die(mysql_error());
mysql_close();
echo "<script>alert('Mi Catedrático ha sido editado exitosamente');
                window.location = '../Entidades/catedratico.php';</script>";
            }

}//termina si estan vacio
else{
    echo "<script>alert('Faltan de llenar Datos.')</script>";
}
}
else{
$hes=$_POST['idcar'];
$mysqlid="SELECT idCatedratico, Nombre, Apellidomaterno, Apellidopaterno, Correo FROM catedratico WHERE idCatedratico=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);
     $catedratico = $fil['idCatedratico'];
     $apellidomaterno = $fil['Apellidomaterno'];
     $nombre = $fil['Nombre'];
     $correo = $fil['Correo'];
     $apellidopaterno = $fil['Apellidopaterno'];
  

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
        <li><a>/</a></li> 
        <li><a href="../Entidades/catedratico.php" >CATEDRÁTICO</a></li>
        <li><a>/</a></li>
        <li><a>EDITAR CATEDRÁTICO</a></li>
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
       <center> <input type="submit" value="GUARDAR" id="btnguardar" name="guardar"></center>
 
</form>
</div>
</body>
  <div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</html>