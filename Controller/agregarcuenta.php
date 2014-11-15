<?php
// le metemos seguridad
include"../seguridad.php";
    // si presiona guardar
    if (@$_POST['guardar']) {
        //le metemos conexión
    require_once("../../conexiones/conexion.php");
        if(isset($_POST['nombre'])and
            ($_POST['contrasena'])and
            ($_POST['tipo']!="")){ 
            //limpiamos de caracteres especiales
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $contrasena=sha1($_POST['contrasena']);
            $tipo= mysql_real_escape_string($_POST['tipo']);
            //$contrasenia= md5($contrasena); MD5 ya no es segura por lo mismo no se implementa.
            $facu= mysql_real_escape_string($_POST['facultad']);

            // Limpiamos de etiquetas
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_var($tipo, FILTER_SANITIZE_SPECIAL_CHARS);
            $facu = filter_var($facu, FILTER_SANITIZE_SPECIAL_CHARS);

            $sqluser ="INSERT INTO cuenta (usuario, contrasena, tipo, idfacultad) VALUES ('".$nombre."','".$contrasena."','".$tipo."','".$facu."')";
            mysql_query($sqluser) or die(mysql_error());
        mysql_close();
        ////////////////////  Limpiamos Variables  //////////////////////
        $nombre= "";
            $contrasena= "";
            $tipo= "";
            $sqluser="";
            $facu= "";
            echo "<script>alert('Mi cuenta ha sido agregado exitosamente');
            window.location = '../../Vistas/Entidades/cuenta.php';</script>";
         

        }else{ echo "<script>alert('Faltan Datos en mi Formulario')</script>";}

}

?>