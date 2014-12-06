<?php
// Le metemos seguridad
include "../../Vistas/seguridad.php";
    //si presiona guardar
    if (@$_POST['guardar']) {
    // metemos la conexión
    require_once("../../Conexiones/conexion.php");
        if(isset(
            $_POST['nombre'])){ 
            // limpiamos caracteres especiales
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $descripcion= mysql_real_escape_string($_POST['descripcion']);
            // convertimosmos etiquetas 
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($descripcion, FILTER_SANITIZE_SPECIAL_CHARS);
            //preguntamos
            $sql = "SELECT nombre, idfacultad FROM carrera WHERE nombre ='".$nombre."' ";   
            $resultado = mysql_query($sql) or die(mysql_error());
            $fila = mysql_fetch_array($resultado, MYSQL_BOTH);
            $nombrec = $fila[0];
            $facultadd= $fila[1];

    if($nombre ==$nombrec){
        echo "<script>alert('Mi Ubicacion ya existe');</script>"; }
        else{
            require_once("../../conexiones/conexion.php");
             @session_start();
            $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT  idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
                $resultado = mysql_query($sql);
                $filass = mysql_fetch_array($resultado, MYSQL_BOTH);
                $id = $filass[0];

        $sqlcare ="INSERT INTO ubicacion (nombre, idfacultad, descripcion) VALUES ('".$nombre."','".$id."','".$descripcion."')";
        $cosa=mysql_query($sqlcare) or die(mysql_error());
        mysql_close();
        // Limpiamos variables //
        $nombre="";
        $sql="";
        $id="";
        $nombrec="";
        $facultadd="";
        $nombreadmin="";
        $resultado="";
        $filass="";
        $fila="";
        $descripcion="";


        echo"<script>alert('Mi Ubicacion ha sido  agregada satisfactoriamente');
        window.location = '../Entidades/ubicaciones.php';</script>";
        
                
                
                }
        
         
            }
             

        }
        ?>