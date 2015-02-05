<?php require_once("agregarpublicacioncontroller.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<title>Agregar Publicación</title>
<link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/png" />
<link rel="stylesheet" href="../css/css1a.css">
<link rel="stylesheet" href="../js/jquery-ui-1.11.2/jquery-ui.css">
<script src="../js/jquery-1.10.2.js"></script> 
<script src="../js/jquery-ui-1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="../js/jquery-ui-1.11.2/jquery-ui.theme.css">

<script>
  $(function() {
    $("#datepicker").datepicker();
  });
  $(function() {
    $("#datepicker1").datepicker();
  });
  $(function() {
    $("#datepicker2").datepicker();
  });
  $(function() {
    $("#datepicker3").datepicker();
  });
  $(function() {
    $("#datepicker4").datepicker();
  });
  $(function() {
    $( document ).tooltip();
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
        <li><a href="pagprin.php" >INICIO</a><a>/</a>
        <a href="Entidades/publicacion.php">PUBLICACIÓN</a><a>/</a>
        <a>AGREGAR PUBLICACIÓN</a></li>   
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
 <input type="text" id="nombre1p" title="Nombre de la publicación" name="nombre1p" maxlength="50"><div id="contador"></div></br>

 <label for for="autor1p" class="text1">Categoría:</label>
 <select name="autor1p" id="categoria" required>
        <option value=""  selected >--Elige Categoria--</option>
        <option>Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>
 </select><br><br>

 <label for="fecharea1p" class="text1">Fecha Inicio:</label>
 <input type="text" maxlength="10" id="datepicker" name="fecharea1p" >

 <label for="horarea1p" class="text1">Hora Inicio:</label>
 <input type="time" id="horarea1p" name="horarea1p" class="inhora" ><br><br>

 <label  class="text1">Fecha Término:</label>
 <input type="text" maxlength="10" id="datepicker2" name="fechater1p"  >
 
 <label for="horater1p" class="text1">Hora Término:</label>
 <input type="time" id="horater1p" name="horater1p" class="inhora" ><br><br>

 <label for="url1p" class="text1">URL:</label><br>
 <input type="url" id="url1p" name="url1p" title="Ejemplo: http://www.ejemplo.com"><br><br>

 <label for="lugar1p" class="text1">Lugar de Realización:</label><br>
 <input type="text" id="lugar1p" title="Lugar de realizacion de la publicacion" name="lugar1p"><br><br>

 <label class="text1">Contacto:</label><br>
 <input type="text" id="contacto1p" title="¿Como contactar la publicacion?(no url)" name="contacto1p"><br><br>

 <label class="text1">Imagen de la Publicación </label><br>
 <input type="file" value="Subir" id="btnsubir" name="imagen"><br><br>

<label  class="text1">Información Breve de la Publicación:</label><br>
 <textarea type="text" id="infob1p" title="Informacion que aparecera en el kiosko" name="infob1p" maxlength="500" ></textarea><div id="contador1"></div><br>

 <label for="info1p" class="text1">Información de la Publicación:</label><br>
 <textarea type="text" id="info1p" title="Informacion completa de la publicación" name="info1p" ></textarea><div id="contador2"></div><br>

 <label for="info1p" class="text1">Código QR:</label><br>
 <a class="text1"> Aquí usted podrá proporcionar el tamaño del código QR así como su resolución.</a><br>

 <?php
 echo  '
        &nbsp;<input name="data" id="data" type="hidden" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'PHP QR Code :)').'"/>&nbsp;
        <a class="text1">Resolución:&nbsp;</a>
        <select name="level"  id="resolucion" type="hidden">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'selected>H - best</option>
        </select>&nbsp;
        <br><a class="text1">Tamaño:&nbsp;</a>
        <select name="size" id="tamano" type="hidden">';
        
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
 <input type="radio" id="radio" name="color" value="#e74c3c" ><a class="text1" style="color:#e74c3c">Alizarin</a><br>
 <input type="radio" id="radio" name="color" value="#1abc9c"><a class="text1" style="color:#1abc9c">Turquoise</a><br>
 <input type="radio" id="radio" name="color" value="#34495e"><a class="text1" style="color:#34495e" checked="checked">Wet Asphalt</a><br>
 <input type="radio" id="radio" name="color" value="#f39c12"><a class="text1" style="color:#f39c12">Naranja</a><br>
 <input type="radio" id="radio" name="color" value="#9b59b6"><a class="text1" style="color:#9b59b6">Amatista</a><br>
 <input type="radio" id="radio" name="color" value="#3498db"><a class="text1" style="color:#3498db">Peter River</a><br>
 <input type="radio" id="radio" name="color" value="#2ecc71"><a class="text1" style="color:#2ecc71">Esmeralda</a><br>

 </div>

  <input type="hidden" id="radio" name="colorletra" value="white"  checked="checked"><br>

 <p class="text1">Día de Publicación:
 <input type="text" maxlength="10" id="datepicker3" name="diapub" /></p><br><br>

 <label class="text1">Hora de Publicación</label>
 <input type="time" name="horapub" class="inhora"><br><br>


<a class="text2">Vigencia</a><br>
    <a class="text1">La vigencia ayuda a que el sistema no muestre publicaciones pasadas.</a><br><br>
<label><a class="text1">Fecha término de Vigencia</a></label>
<input type="text" maxlength="10" id="datepicker4" name="fechvig"required/>



 

</fieldset><br><br>
 <!--////////////////////////////////////   Termina configuracion diseño publicacion   //////////////////////////////-->
 <center><input  type="submit"  value="Guardar" id="btnguardar" name="guardar" > </center>
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
$(document).ready(function(){
    var max_chars = 500;
    $('#maxii').html(max_chars);
    $('#infob1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador1').html(diff);   
    });
});
