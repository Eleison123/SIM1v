<?php include "../seguridad.php"; ?>
<!DOCTYPE html>
<html leng="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/horariocpanel.css">
<script src="../../js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(event){
    $('#agregar').click(function(){
       window.location = '../Agregar/agregarhorario.php';
    });
});
</script>
<link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" /> 

<title>Horario</title>
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
        <li><a href="publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="horario.php" id="qwerty">HORARIO</a></li>
        <li><a href="cuenta.php">CUENTA</a></li>
        <li><a href="facultad.php">FACULTAD</a></li>
        <li><a href="eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="registro.php">REGISTRO</a></li>
        <li><a href="carrera.php">CARRERA</a></li>  
        <li><a href="catedratico.php">CATEDRÁTICO</a></li>   
        <li><a href="ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="salir.php">SALIR</a></li> 
    </ul>
</nav>
</div>

</div></center>

<body>
<div id="cuerpo">
<figure id="figura"><br><br>
<img src="../../imagenes/horario.png"><br><br>
</figure><br><br><br>

 <?php
  echo "<div id='agregar'>
  <form  method='post' action='../Agregar/agregarhorario.php'>
  <img src='../../imagenes/add.gif' class='icon'>
  <input type='submit' value='Agregar Horario'  name='agregar' class='conf'>
  </form></div>";
 echo"<br><br>";

?>
<hr>
<?php echo"<div id='horario'>";
        require_once("../../conexiones/conexion.php");
            @session_start();
                        $fac=$_SESSION['facultad'] ;            
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT nombre, idcarrera,idfacultad FROM carrera WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        while($row1=mysql_fetch_array($resulf)){
                           echo "<div class='marca'>";
                            echo "<div class='cuadrocar' value='".$row1['idcarrera']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            
                        }
                        ?>


</body><br><br><br></div>
<div id="escogido"></div>

<hr></div>
<footer>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div>
</footer>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('.cuadrocar').click(function(){
        var id= $(this).attr("value");
        $('#escogido').show();
        $('#escogido').load('../Editar/generaescolar.php?id='+id);
        $('#horario').hide();
    });
});</script>