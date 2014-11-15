<?php require_once("agregarpublicacioncontroller.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../css/css1a.css">
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<title>Agregar Publicación</title>
<script src="../js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 50;

    $('#max').html(max_chars);

    $('#nombre1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador').html(diff);   
    });
});

</script>
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 250;

    $('#maxii').html(max_chars);

    $('#infob1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador1').html(diff);   
    });
});

</script>
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 500;

    $('#maxi').html(max_chars);

    $('#info1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador2').html(diff);   
    });
});

</script>
</head>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                        Inicia Menu                                                                                -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="portada">
    <img id="imgportada" src="../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
        <li><a href="pagprin.php" >INICIO</a></li>
        <li><a href="Entidades/publicacion.php" id="qwerty">PUBLICACIÓN</a></li>
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

</div></center>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--                                     Inicia Cuerpo                                                                                 -->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<body>
<div id="cuerpo">
<figure>
<img src="../imagenes/publicacion.png">
</figure>

 <!--///////////////////////////////     Inicia Formulario      /////////////////////////////////////////////////////////7--> 
 <form  method="post" enctype="multipart/form-data">
    <!-- //////////////////////////////    Inicia solicitud de informacion  publicacion  /////////////////////////////////-->
 <fieldset>
 <legend class="text2">Datos de la Publicación</legend>

 <a class="text3">Aquí deberas proporcionar los datos que contiene tu publicación</a><br><br>

 <label for="nombre1p" class="text1">Nombre:</label>
 <input type="text" id="nombre1p" placeholder="Nombre de la publicacion" name="nombre1p" maxlength="50"><div id="contador"></div></br>

 <label for for="autor1p" class="text1">Categoría:</label>
 <select name="autor1p" class="op" required>
        <option value=""  selected >--Elige Categoria--</option>
        <option>Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>
 </select><br><br>

 <label for="fecharea1p" class="text1">Fecha Realización:</label>
 <input type="date" id="fecharea1p" name="fecharea1p" class="infecha"required>

 <label for="horarea1p" class="text1">Hora Realización:</label>
 <input type="time" id="horarea1p" name="horarea1p" class="inhora" required><br><br>

 <label for="fechater1p" class="text1">Fecha Término:</label>
 <input type="date" id="fechater1p" name="fechater1p" class="infecha" required>
 
 <label for="horater1p" class="text1">Hora Término:</label>
 <input type="time" id="horater1p" name="horater1p" class="inhora" required><br><br>

 <label for="url1p" class="text1">URL:</label><br>
 <input type="url" id="url1p" name="url1p" ><br><br>

 <label for="lugar1p" class="text1">Lugar de Realización:</label><br>
 <input type="text" id="lugar1p" placeholder="Lugar de realizacion de la publicacion" name="lugar1p"><br><br>

 <label class="text1">Contacto:</label><br>
 <input type="text" id="contacto1p" placeholder="¿Como contactar la publicacion?(no url)" name="contacto1p"><br><br>

 <label class="text1">Imagen de la Publicación </label><br>
 <input type="file" value="Subir" id="btnsubir" name="imagen"><br><br>

<label  class="text1">Información Breve de la Publicación:</label><br>
 <textarea type="text" id="infob1p" placeholder="Informacion que aparecera en el kiosko" name="infob1p" maxlength="250" ></textarea><div id="contador1"></div><br>

 <label for="info1p" class="text1">Información de la Publicación:</label><br>
 <textarea type="text" id="info1p" placeholder="Informacion completa de la publicación" name="info1p" maxlength="500"></textarea><div id="contador2"></div><br>

 <label for="info1p" class="text1">Código QR:</label><br>
 <a class="text1"> Aquí usted podrá proporcionar el tamaño del código QR así como su resolución.</a><br>

 <?php
 echo  '
        &nbsp;<input name="data" id="data" type="hidden" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'PHP QR Code :)').'"/>&nbsp;
        <a class="text1">Resolución:&nbsp;</a>
        <select name="level" type="hidden">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'selected>H - best</option>
        </select>&nbsp;
        <br><a class="text1">Tamaño:&nbsp;</a>
        <select name="size" type="hidden">';
        
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'selected>'.$i.'</option>';
        
    echo '</select>&nbsp';
    ?>
 </fieldset><br><br>
 <!--//////////////////////////////////////////////////////  Inicia seccion configuracion diseño publicacion    //////////////////////////////-->
 <fieldset>
 <legend class="text2">Configuración de la Publicación</legend>
 <a class="text3">Aquí puedes programar el día en el que se publicara, esto permitira tener la publicacion en el sistema mas no publicarla, así como unos detalles de visualización y prioridad de la publicación</a><br><br>

<label for="prioridad1p" class="text1">Prioridad:</label></td>
                <select name="prioridad1p" class="op" required>
                <option value="" selected>Elige Prioridad</option>
                 <option value="1">Ahora</option>
                <option value="2">Alta</option>
                <option value="3">Media</option>
                <option value="4">Baja</option>
                
        </select><br><br>  

 <label class="text1">Color de la Publicación:</label><br>
 <div id="divcolor">
 <input type="radio" id="radio" name="color" value="#BA21E0" ><a class="text1" style="color:#FFAAFF">Morado</a><br>
 <input type="radio" id="radio" name="color" value="#EA8DFE"><a class="text1" style="color:#EA8DFE">Rosa</a><br>
 <input type="radio" id="radio" name="color" value="#FF7575"><a class="text1" style="color:#FF7575">Rojo</a><br>
 <input type="radio" id="radio" name="color" value="#4985D6"  checked="checked"><a class="text1" style="color:#4985D6">Azul Tecnológico</a><br>
 <input type="radio" id="radio" name="color" value="#29AFD6"><a class="text1" style="color:#29AFD6">Azul Cielo</a><br>
 <input type="radio" id="radio" name="color" value="#80B584"><a class="text1" style="color:#80B584">Verde Militar</a><br>
 <input type="radio" id="radio" name="color" value="#E6CE00"><a class="text1" style="color:#E6CE00">Amarillo Mostaza</a><br>
 <input type="radio" id="radio" name="color" value="#FFA04A"><a class="text1" style="color:#FFA04A">Naranja</a><br>
 <input type="radio" id="radio" name="color" value="#D0977B"><a class="text1" style="color:#D0977B">Café</a><br>
 </div>

 <label class="text1">Color Tipografía de la Publicación:</label><br>
 <input type="radio" id="radio" name="colorletra" value="black"><a class="text1">Negro</a><br>
  <input type="radio" id="radio" name="colorletra" value="white"  checked="checked"><a class="text1">Blanco</a><br><br>

 <label class="text1">Día de Publicación</label>
 <input type="date" name="diapub" class="infecha"><br><br>

 <label class="text1">Hora de Publicación</label>
 <input type="time" name="horapub" class="inhora"><br><br>


<a class="text2">Vigencia</a><br>
    <a class="text1">La vigencia ayuda a que el sistema no muestre publicaciones pasadas.</a><br><br>
<label><a class="text1">Fecha término de Vigencia</a></label>
<input type="date" class="infecha" name="fechvig"required/>



 

</fieldset><br><br>
 <!--////////////////////////////////////   Termina configuracion diseño publicacion   //////////////////////////////-->
 <input  type="submit"  value="Guardar" id="btnguardar" name="guardar" > 
</form>

<!--//////////////////////////////////////  Termina Formulario  ////////////////////////////////////////////-->

</div></div>
</body>
<footer>
<div id="final">
    <img src="../imagenes/footer.jpg" id="footer">
</div>
</footer>
</html>
