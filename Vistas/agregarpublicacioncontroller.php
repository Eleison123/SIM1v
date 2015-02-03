<?php
//incluimos seguridad
include"seguridad.php";
//incluimos libreria para código QR
require"qrlib.php"; 

$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';
    /////////////////////////////////////// 
    if (@$_POST['guardar']) {
        require_once("../Conexiones/conexion.php");
        //Verificar que ningun dato venga vacio.
        if(isset($_POST['nombre1p'])and
        ($_POST['info1p'])and
        ($_POST['infob1p'])and
        ($_POST['autor1p'])and
        ($_POST['fecharea1p'])and
        ($_POST['fechater1p'])and
        ($_POST['prioridad1p']!="")){ 
            //comparamos fechas
            if ($_POST['fecharea1p']>$_POST['fechater1p']) {
                echo "<script>alert('Fecha de realización es despues de la Fecha de termino')</script>";
          }else{
           
            //Asignar los datos obtenidos a variables
            //limpuiamos caracteres especiales
            $nombre = mysql_real_escape_string($_POST['nombre1p']);
            $categoria = mysql_real_escape_string($_POST['autor1p']);
            $fecharea = mysql_real_escape_string($_POST['fecharea1p']);
            $horarea = mysql_real_escape_string($_POST['horarea1p']);
            $fechater = mysql_real_escape_string($_POST['fechater1p']);
            $horater = mysql_real_escape_string($_POST['horater1p']);
            // LAs url pueden trar caracteres especiales
            $url = $_POST['url1p'];
            $lugar = mysql_real_escape_string($_POST['lugar1p']);
            $contacto = mysql_real_escape_string($_POST['contacto1p']);
            $fechavig=mysql_real_escape_string($_POST['fechvig']);
            $infob = mysql_real_escape_string($_POST['infob1p']);
            $info = mysql_real_escape_string($_POST['info1p']);
            $color =$_POST['color'];
            $colorletra = $_POST['colorletra'];
            $diapu = mysql_real_escape_string($_POST['diapub']);
            $horapu = mysql_real_escape_string($_POST['horapub']);
            //$hvida = $_POST['horasvida'];
            $prioridad = mysql_real_escape_string($_POST['prioridad1p']);

            //limpiamos etiquetas
             $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
              $categoria = filter_var($categoria, FILTER_SANITIZE_SPECIAL_CHARS);
               $fecharea = filter_var($fecharea, FILTER_SANITIZE_SPECIAL_CHARS);
                $horarea = filter_var($horarea, FILTER_SANITIZE_SPECIAL_CHARS);
                 $fechater = filter_var($fechater, FILTER_SANITIZE_SPECIAL_CHARS);
                  $horater = filter_var($horater, FILTER_SANITIZE_SPECIAL_CHARS);
                   $url = filter_var($url, FILTER_SANITIZE_SPECIAL_CHARS);
                    $lugar = filter_var($lugar, FILTER_SANITIZE_SPECIAL_CHARS);
                     $contacto = filter_var($contacto, FILTER_SANITIZE_SPECIAL_CHARS);
                      $fechavig = filter_var($fechavig, FILTER_SANITIZE_SPECIAL_CHARS);
                       $infob = filter_var($infob, FILTER_SANITIZE_SPECIAL_CHARS);
                        $info = filter_var($info, FILTER_SANITIZE_SPECIAL_CHARS);
                         $diapu = filter_var($diapu, FILTER_SANITIZE_SPECIAL_CHARS);
                          $horapu = filter_var($horapu, FILTER_SANITIZE_SPECIAL_CHARS);
                           

    
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino1 =$_FILES['imagen']['name'];
            $destino= "../../imgPublicaciones/".$destino1."";
            $_FILES['imagen']['size'];
             $data= "Nombre:".$nombre.".Fecha Realización:.".$fecharea.".Hora Realización:.".$horarea.".Lugar:.".$lugar.".Contacto:.".$contacto.".URL:.".$url."";

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
     $data;
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
       
    } else {    
    
        //default data
        //echo 'You can provide data in GET parameter: <a href="?data=like_that">like that
        echo "</a><hr/>";    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } 
    
 $qr=$PNG_WEB_DIR.basename($filename);
                //Hacer Registro de la publicacion
             @session_start();
                $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT idCuenta, Usuario, idFacultad FROM cuenta WHERE Usuario='".$nombreadmin."';";    
                $resultado = mysql_query($sql) or die (mysql_error());
                $fila = mysql_fetch_array($resultado, MYSQL_BOTH);
                $idad = $fila[0];
                $nombreUsuario = $fila[1];
                $facuser = $fila[2];
                $horareg= date("H:i:s");
                 $fechareg = date("Y-m-d");
                $sqlr = "INSERT INTO registro(horareg, diareg, idCuenta, idfacultad) VALUES('".$horareg."','".$fechareg."','".$idad."','".$facuser."')";
                mysql_query($sqlr) or die(mysql_error());
                $reglast_id = mysql_insert_id();
    

$sql="INSERT INTO publicacion(nombre,categoria,fecharea,horarea,fechater,horater,url,lugar,contacto,img,infobreve,info,qr,color,colorletra,diapublicacion,horapublicacion,prioridad,visitas,idregistro,idfacultad,fechavig) 
VALUES('".$nombre."','".$categoria."','".$fecharea."','".$horarea."','".$fechater."','".$horater."','".$url."','".$lugar."','".$contacto."','".$destino."','".$infob."','".$info."','".$qr."','".$color."','".$colorletra."','".$diapu."','".$horapu."','".$prioridad."',0,'".$reglast_id."','".$facuser."','".$fechavig."')";


$resultado = mysql_query($sql) or die(mysql_error());
mysql_close();
if ($resultado) {
    move_uploaded_file($archivo, $destino);
    ///////////////// Limpiamos Variables ////////////////777
            $nombre = "";
            $nombreadmin="";
            $nombreUsuario="";
            $fila="";
            $idad="";
            $categoria = "";
            $fecharea = "";
            $horarea = "";
            $fechater = "";
            $horater = "";
            $url = "";
            $lugar = "";
            $contacto = "";
            $infob = "";
            $info = "";
            $color = "";
            $colorletra = "";
            $diapu = "";
            $horapu = "";
            $hvida = "";
            $prioridad = "";
            $sql="";
            $sqlr="";
            $resultado="";
            $archivo = "";
            $destino1 ="";
            $destino= "";
            $data= "";
            echo "<script>alert('Mi publicacion ha sido agregada');
            window.location = 'Entidades/publicacion.php';</script>";
}else{
    echo "<script>alert('Mi publicacion no ha sido agregada')</script>";
}
}
}
}
?>