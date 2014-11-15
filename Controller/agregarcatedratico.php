<?php
// Le Metemos seguridad //
include"../../Vistas/seguridad.php";
    // Si presiona Guardar // 
    if (@$_POST['guardar']) {
        // Incluimos conexión//
        require_once("../../conexiones/conexion.php");
        if(isset($_POST['nombre'])and
            ($_POST['apmater'])and
            ($_POST['appaterno']!="")){ 
            //Revisamos que no tengan caracteres especiales y los quitamos//
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $appaterno= mysql_real_escape_string($_POST['appaterno']);
            $facu= mysql_real_escape_string($_POST['facultad']);
            $apmater= mysql_real_escape_string($_POST['apmater']);
            $correo= $_POST['correo'];
            // convertimos etiquetas //
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $appaterno = filter_var($appaterno, FILTER_SANITIZE_SPECIAL_CHARS);
            $facu = filter_var($facu, FILTER_SANITIZE_SPECIAL_CHARS);
            $apmater = filter_var($apmater, FILTER_SANITIZE_SPECIAL_CHARS);
            // Iniciamos inserción
            $sqluser ="INSERT INTO catedratico (nombre, apellidomaterno, apellidopaterno, correo, idfacultad) VALUES ('".$nombre."','".$apmater."','".$appaterno."','".$correo."','".$facu."')";
            $cosa= mysql_query($sqluser) or die(mysqli_error());
            mysql_close();
        // Lipiamos Variables //
        $nombre="";
        $appaterno="";
        $apmater="";
        $correo="";
        $facu="";
        $sqluser="";

        if ($cosa) {
            echo "<script>alert('Mi Catedrático ha sido agregado satisfactoriamente');
                window.location = '../Entidades/catedratico.php';</script>";
        }else{echo "<script>alert('Mi Catedrático no ha sido agregado');</script>";}
         
    

        }

}

?>