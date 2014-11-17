<?php 
include "seguridad.php"; 
include "qrlib.php";

?>
<?php
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
 
if (!file_exists($PNG_TEMP_DIR))
mkdir($PNG_TEMP_DIR);
 $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';
    /////////////////////////////////////// 
    if (@$_POST['guardar']) {
        require_once("../conexiones/conexion.php");
        //Verificar que ningun dato venga vacio.
         if(isset($_POST['nombre'])and
        ($_POST['info1p'])and
        ($_POST['infob1p'])and
        ($_POST['autor1p'])and
        ($_POST['fecharea1p'])and
        ($_POST['horarea1p'])and
        ($_POST['fechater1p'])and
        ($_POST['horater1p'])and
        ($_POST['prioridad1p']!="")){ 
            //comparamos fechas
            if ($_POST['fecharea1p']>$_POST['fechater1p']) {
                echo "<script>alert('Fecha de realización es despues de la Fecha de termino')</script>";
          }
           
            //Asignar los datos obtenidos a variables
            $id1 = $_POST['id'];
            $nombre1 = $_POST['nombre'];
            $categoria1 = $_POST['autor1p'];
            $fecharea1 = $_POST['fecharea1p'];
            $horarea1 = $_POST['horarea1p'];
            $fechater1 = $_POST['fechater1p'];
            $horater1 = $_POST['horater1p'];
            $url1 = $_POST['url1p'];
            $lugar1 = $_POST['lugar1p'];
            $contacto1 = $_POST['contacto1p'];
            $fechavig=$_POST['fechvig'];
            $infob1 = $_POST['infob1p'];
            $info1 = $_POST['info1p'];
           
            $color1 = $_POST['color'];
            $colorletra1 = $_POST['colorletra'];
            $diapu1 = $_POST['diapub'];
            $horapu1 = $_POST['horapub'];
            //$hvida = $_POST['horasvida'];
            $prioridad1 = $_POST['prioridad1p'];
            $archivo = $_FILES['imagess']['tmp_name'];
            $nombre = $_FILES['imagess']['name'];
            $destino1= "imgPublicaciones/".$nombre."";
             $_FILES['imagess']['size'];
            $data= "Nombre:".$nombre1.".Fecha Realización:.".$fecharea1.".Hora Realización:.".$horarea1.".Lugar:.".$lugar1.".Contacto:.".$contacto1.".URL:.".$url1."";

             //set it to writable location, a place for temp generated PNG files
      
    if (isset($_POST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_POST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($data)) { 
    
        //it's very important!
        if (trim($data) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
      
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
       
    } else {    
    
        //default data
        //echo 'You can provide data in GET parameter: <a href="?data=like_that">like that
        echo "</a><hr/>";    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } 
    
 $qr=$PNG_WEB_DIR.basename($filename);
if($destino1=="imgPublicaciones/"){
   
    $sqlf="UPDATE publicacion SET 
 nombre = '".$nombre1."',
categoria = '".$categoria1."',
fecharea = '".$fecharea1."',
horarea = '".$horarea1."',
fechater = '".$fechater1."',
horater = '".$horater1."',
url = '".$url1."',
lugar = '".$lugar1."',
contacto = '".$contacto1."',
infobreve = '".$infob1."',
info = '".$info1."',
qr = '".$qr."',
color = '".$color1."',
colorletra = '".$colorletra1."',
diapublicacion = '".$diapu1."',
horapublicacion = '".$horapu1."',
prioridad = '".$prioridad1."',
fechavig ='".$fechavig."'
 WHERE idpublicacion='".$id1."'";
$resse= mysql_query($sqlf) or die (mysql_error());
echo "<script>alert('Mi publicacion ha sido modificada');
            window.location = 'Entidades/publicacion.php';</script>";


}else{
 $sqlf="UPDATE publicacion SET 
 nombre = '".$nombre1."',
categoria = '".$categoria1."',
fecharea = '".$fecharea1."',
horarea = '".$horarea1."',
fechater = '".$fechater1."',
horater = '".$horater1."',
url = '".$url1."',
lugar = '".$lugar1."',
contacto = '".$contacto1."',
img = '".$destino1."',
infobreve = '".$infob1."',
info = '".$info1."',
qr = '".$qr."',
color = '".$color1."',
colorletra = '".$colorletra1."',
diapublicacion = '".$diapu1."',
horapublicacion = '".$horapu1."',
prioridad = '".$prioridad1."',
fechavig ='".$fechavig."'
 WHERE idpublicacion='".$id1."'";
 $resultadof = mysql_query($sqlf) or die(mysql_error());
 echo "<script>alert('Mi publicacion ha sido modificada');
            window.location = 'Entidades/publicacion.php';</script>";
     move_uploaded_file($archivo, $destino1);

}
//header("location:modificarpublicacion.php");


}
}else{

    require_once("../conexiones/conexion.php");
$hes=$_POST['idpub'];
            $mysqlid="SELECT idpublicacion,nombre,categoria,fecharea,horarea,fechater,horater,url,
            lugar,contacto,img,infobreve,info,qr,color,colorletra,diapublicacion,horapublicacion,
            prioridad,fechavig FROM publicacion WHERE idpublicacion=".$hes."";
$resulid=mysql_query($mysqlid) or die(mysql_error());
 $fil = mysql_fetch_array($resulid, MYSQL_BOTH);
     $id = $fil['idpublicacion'];
     $nombre = $fil['nombre'];
     $categoria = $fil['categoria'];
     $fecharea = $fil['fecharea'];
     $horarea = $fil['horarea'];
     $fechater = $fil['fechater'];
     $hoarter = $fil['horater'];
     $url = $fil['url'];
     $lugar = $fil['lugar'];
     $contacto = $fil['contacto'];
     $img = $fil['img'];
     $infobreve = $fil['infobreve'];
     $info = $fil['info'];
     $qr = $fil['qr'];
     $color = $fil['color'];
     $colorletra = $fil['colorletra'];
     $diapublicacion = $fil['diapublicacion'];
     $horapublicacion = $fil['horapublicacion'];
     $prioridad = $fil['prioridad'];  
     $fechavig=$fil['fechavig'];

 }

?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../css/css1a.css">
<!-- JS -->
<script src="../js/jquery-1.4.2.min.js"></script> 
<script language="Javascript" type="text/javascript">
 Begin
document.oncontextmenu = function(){return false}
</script>
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 50;

    $('#max').html(max_chars);
var esta = $('#nombre1p').val().length;
    $('#nombre1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars -esta;
        $('#contador').html(diff);   
    });
});

</script>
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 250;

    $('#maxii').html(max_chars);
var esta = $('#infob1p').val().length;
    $('#infob1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars ;
        $('#contador1').html(diff);   
    });
});

</script>
<script type="text/javascript">
$(document).ready(function(){

    var max_chars = 1000;

    $('#maxi').html(max_chars);
    var esta = $('#info1p').val().length;
    $('#info1p').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars  ;
        $('#contador2').html(diff);   
    });
});

</script>
        
<title>Editar Publicación</title>
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

<body>
    <div id="cuerpo"><br><br>
<figure>
<img src="../imagenes/publicacion.png">
</figure><br><br>


<form method="post" enctype="multipart/form-data" >
    <fieldset>
        <legend class="text2">Datos de la Publicación</legend>
        <input  hidden type="text" name="id" <?php echo "value='"; echo $id; echo "'"; ?>>

 <a class="text3">Aquí deberas proporcionar los datos que contiene tu publicación</a><br><br>


 <label class="text1">Nombre:</label>
 <input type="text" id="nombre1p" name="nombre" <?php echo"value='"; echo $nombre; echo "'";?>maxlength="50">
 <div id="contador"></div>
 <br>


 <label for for="autor1p" class="text1">Categoría:</label>
 <select name="autor1p" class="op" required>
    <?php
    if ($categoria=="Beca") {
        echo"
        <option selected>Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>";
    }
    if ($categoria=="Empleo") {
        echo"
        <option >Beca</option>
        <option selected>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>";
    }
    if ($categoria=="Certificación") {
        echo"
        <option >Beca</option>
        <option>Empleo</option>
        <option selected>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>";
    }
    if ($categoria=="Seminario") {
        echo"
        <option >Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option selected>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>";
    }
    if ($categoria=="Junta") {
        echo"
        <option >Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option selected>Junta</option>
        <option>Aviso</option>
        <option>Otro</option>";
    }
    if ($categoria=="Aviso") {
        echo"
        <option >Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option selected>Aviso</option>
        <option>Otro</option>";
    }
    if ($categoria=="Otro") {
        echo"
        <option >Beca</option>
        <option>Empleo</option>
        <option>Certificación</option>
        <option>Seminario</option>
        <option>Junta</option>
        <option>Aviso</option>
        <option selected>Otro</option>";
    }
        
        ?>
 </select><br><br>

 <label for="fecharea1p" class="text1">Fecha Realización:</label>
 <input type="date" id="fecharea1p" name="fecharea1p" <?php echo"value='"; echo $fecharea; echo"'"; ?> class="infecha">

 <label for="horarea1p" class="text1">Hora:</label>
 <input type="time" id="horarea1p" name="horarea1p" <?php echo "value='"; echo $horarea; echo "'"; ?> class="inhora"><br><br>

 <label for="fechater1p" class="text1">Fecha Término:</label>
 <input type="date" id="fechater1p" name="fechater1p" <?php echo "value='"; echo $fechater; echo "'"; ?> class="infecha">
 
 <label for="horater1p" class="text1">Hora:</label>
 <input type="time" id="horater1p" name="horater1p" <?php echo "value='"; echo $hoarter; echo "'"; ?> class="inhora"><br><br>

 <label for="url1p" class="text1">URL:</label>
 <input type="url" id="url1p" name="url1p" <?php echo "value='"; echo $url; echo "'"; ?>><br><br>

 <label for="lugar1p" class="text1">Lugar de Realización:</label>
 <input type="text" id="lugar1p" name="lugar1p" <?php echo "value='"; echo $lugar; echo "'"; ?>><br><br>

 <label class="text1">Contacto:</label>
 <input type="text" id="contacto1p"  name="contacto1p" <?php echo "value='"; echo $contacto; echo "'"; ?>><br><br>

 <label class="text1">Imagen de la Publicación </label>
 <input type="file"  id="imagess" name="imagess" value=<?php echo "'"; echo $img; echo "'"; ?>><br><br>
 <div id="image"><img id="image" src=<?php echo"'"; echo $img; echo "'";  ?>></div><br>

<label  class="text1">Información Breve de la Publicación:</label><br>
 <textarea type="text" id="infob1p"  name="infob1p" maxlength="250"><?php  echo $infobreve;  ?></textarea><div id="contador1"></div><br>

 <label for="info1p" class="text1">Información de la Publicación:</label><br>
 <textarea type="text" id="info1p" name="info1p" maxlength="1000"><?php echo $info; ?></textarea><div id="contador2"></div><br>

 <label for="info1p" class="text1">Código QR:</label>
 <a class="text1"> Aquí usted podrá proporcionar el tamaño del código QR así como su resolución.</a>

 <?php
 echo  '
        &nbsp;<input name="data" id="data" type="hidden" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'PHP QR Code :)').'" />&nbsp;
        <a class="text1"> Resolución:&nbsp;</a>
        <select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
        </select>&nbsp;
        <a class="text1">Tamaño:&nbsp;</a>
        <select name="size">';
        
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
        
    echo '</select>&nbsp';
    ?>
 </fieldset><br><br>
 <!--//////////////////////////////////////////////////////  Inicia seccion configuracion diseño publicacion    //////////////////////////////-->
 <fieldset>
 <legend class="text2">Configuración de la Publicación</legend>
 <a class="text3">Aquí puedes programar el día en el que se publicara, esto permitira tener la publicacion en el sistema mas no publicarla, así como unos detalles de visualización y prioridad de la publicación</a><br><br>

<label class="text1">Color de la Publicación:</label><br>
 <div id="divcolor">
 <input type="radio" id="radio" name="color" <?php echo "value='"; echo $color; echo "'"; ?> checked="checked"><a class="text1" style="color:black">Selección Anterior</a><br>
 <input type="radio" id="radio" name="color" value="#BA21E0" ><a class="text1" style="color:#BA21E0">Morado</a><br>
 <input type="radio" id="radio" name="color" value="#EA8DFE"><a class="text1" style="color:#EA8DFE">Rosa</a><br>
 <input type="radio" id="radio" name="color" value="#FF7575"><a class="text1" style="color:#FF7575">Rojo</a><br>
 <input type="radio" id="radio" name="color" value="#4985D6"><a class="text1" style="color:#4985D6">Azul Tecnológico</a><br>
 <input type="radio" id="radio" name="color" value="#29AFD6"><a class="text1" style="color:#29AFD6">Azul Cielo</a><br>
 <input type="radio" id="radio" name="color" value="#80B584"><a class="text1" style="color:#80B584">Verde Militar</a><br>
 <input type="radio" id="radio" name="color" value="#E6CE00"><a class="text1" style="color:#E6CE00">Amarillo Mostaza</a><br>
 <input type="radio" id="radio" name="color" value="#FFA04A"><a class="text1" style="color:#FFA04A">Naranja</a><br>
 <input type="radio" id="radio" name="color" value="#D0977B"><a class="text1" style="color:#D0977B">Café</a><br>
 </div>

 <label class="text1">Color Tipografía de la Publicación:</label><br>
 <input type="radio" id="radio" name="colorletra" value="black"><a class="text1">Negro</a>
  <input type="radio" id="radio" name="colorletra" value="white" selected><a class="text1">Blanco</a>
<input type="radio" id="radio" name="colorletra" <?php echo "value='"; echo $colorletra; echo "'"; ?> checked="checked"><a class="text1"> Selección Pasada</a><br><br>




 

 <label class="text1">Día de Publicación</label>
 <input type="date" name="diapub" <?php echo "value='"; echo $diapublicacion; echo "'"; ?> class="infecha"><br><br>

 <label class="text1">Hora Publicación</label>
 <input type="time" name="horapub" <?php echo "value='"; echo $horapublicacion; echo "'"; ?> class="inhora"><br><br>


       <label for="prioridad1p" class="text1">Prioridad:</label></td>
                <select name="prioridad1p" class="op" >
                    <?php 
                    if ($prioridad=="1") {
                echo"
                 <option value='1' selected>Ahora</option>
                <option value='2'>Alta</option>
                <option value='3'>Media</option>
                <option value='4'>Baja</option>";
                    }
                    if ($prioridad=="2") {
                      echo"
                 <option value='1' >Ahora</option>
                <option value='2' selected>Alta</option>
                <option value='3'>Media</option>
                <option value='4'>Baja</option>";  
                    }
                    if ($prioridad =="3") {
                        echo"
                 <option value='1' >Ahora</option>
                <option value='2'>Alta</option>
                <option value='3' selected>Media</option>
                <option value='4'>Baja</option>";
                    }
                if ($prioridad=="4") {
                    echo"
                 <option value='1' >Ahora</option>
                <option value='2'>Alta</option>
                <option value='3'>Media</option>
                <option value='4' selected>Baja</option>";
                }
                 if ($prioridad=="5") {
                    echo"
                    <option value='0'selected>Vencido</option>
                 <option value='1' >Ahora</option>
                <option value='2'>Alta</option>
                <option value='3'>Media</option>
                <option value='4'>Baja</option>";
                }
                ?>
        </select><br><br>  
<a class="text2">Vigencia</a><br>
<label><a class="text1">Fecha término de Vigencia</a></label>
<input type="date" class="infecha" name="fechvig" <?php echo "value='"; echo $fechavig; echo "'"; ?> required/>

        
 
</fieldset>
        <input type="submit" value="Guardar" id="btnguardar" name="guardar">
 
</form>
</div>
</body>
<footer>
<div id="final">
    <img src="../imagenes/footer.jpg" id="footer">
</div>
</footer>
</html>