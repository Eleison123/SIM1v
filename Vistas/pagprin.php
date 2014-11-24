<?php include"seguridad.php"; ?>
<!DOCTYPE html>
<html leng="es">
<!--         Cabeza         -->
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../css/css1a.css">
<link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
<script src="../js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript">
        $(document).ready(function(){
         
            $('#cuerpo').hide();
            $('#cuerpo').fadeIn('slow');
        });
</script>

<title>Bienvenido SIM</title>
</head>
<!--         Termina Cabeza         -->
<div id="portada">
    <img id="imgportada" src="../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="pagprin.php" id="qwerty">INICIO</a></li>
		<li><a href="Entidades/publicacion.php">PUBLICACIÓN</a></li>
        <li><a href="Entidades/horario.php">HORARIO</a></li>
        <li><a href="Entidades/cuenta.php">CUENTA</a></li>
        <li><a href="Entidades/facultad.php">FACULTAD</a></li>
        <li><a href="Entidades/eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="Entidades/registro.php">REGISTRO</a></li>
        <li><a href="Entidades/carrera.php">CARRERA</a></li>  
        <li><a href="Entidades/catedratico.php">CATEDRÁTICO</a></li>   
        <li><a href="Entidades/ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="Entidades/salir.php">SALIR</a></li>  
    </ul>
</nav>
</div>
</div>
</center>

<body>
    <div id="cuerpo">

          <br>
      
      
<a class="text1">Sea bienvenido al módulo de administración del Sistema Interactivo de Mensajes, actualmente estando en su versión 1  "<strong>Coatlicue</strong>", con la capacidad de gestionar lo mostrado en el módulo de visualización. </a>
            <a class="text1">En el módulo de administración usted podrá gestionar:</a><br><br>
            <table>
            <tr><td><a class="text1">Horarios de clases.</a></td></tr>
            <tr><td><a class="text1">Horarios de exámenes ordinarios.</a></td></tr>
            <tr><td><a class="text1">Horarios de exámenes extraordinarios.</a></td></tr>
            <tr><td><a class="text1">Horarios de exámnes titulos.</a></td></tr>
            <tr><td><a class="text1">Horarios de Intersemestrales.</a></td></tr>
            <tr><td><a class="text1">Horarios de Tutorías.</a></td></tr>
            <tr><td><a class="text1">Experiencias Educativas.</a></td></tr>
            <tr><td><a class="text1">Cuentas.</a></td></tr>
            <tr><td><a class="text1">Catedráticos.</a></td></tr>
            <tr><td><a class="text1">Carreras.</a></td></tr>
            <tr><td><a class="text1">Facultades.</a></td></tr>
            <tr><td><a class="text1">Publicaciones.</a></td></tr>
            </table>
            <br>
            <img src="../imagenes/versiones.png" id="bienvenido">
           <br>
         
                <h4><a class="text1">Coatlicue</a></h4><br><br>
            <table>
            <tr><td><a class="text1"><strong>Desarrollado por:</strong> L.I.Román Omar Santiaguillo Arcos.</a></tr></td>
            <tr><td><a class="text1"><strong>Dirección:</strong> M.C.C.Gerardo Contreras Vega.</a></tr></td>
            <tr><td><a class="text1"><strong>Coodirector:</strong> E.I.S. Blanca Rosa Pensado.</a></tr></td>
            <tr><td><a class="text1"><strong>Asesores:</strong> M.C.C. Juan Carlos Pérez Arriaga , L.I.Victor Manuel Hernández Olivera.</a></tr></td>
         </table><br><br><br>
    
        
    </div>
</body>
<div id="final">
    <img src="../imagenes/footer.jpg" id="footer">
</div>
</html>
