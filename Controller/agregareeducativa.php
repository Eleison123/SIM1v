<?php
//le metemos seguridad
include"../../Vistas/seguridad.php";
    // si presiona guardar
    if (@$_POST['guardar']) {
        //le metemos la conexión
    require_once("../../Conexiones/conexion.php");
        if(isset(
            $_POST['nombre'])){ 
            //Limpiamos caracteres especiales
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $carrera= mysql_real_escape_string($_POST['carrera']);
            //Limpiamos etiquetas
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $carrera = filter_var($carrera, FILTER_SANITIZE_SPECIAL_CHARS);

            //preguntamos valores de la BD
            $sql = "SELECT Nombre FROM experienciaeducativa WHERE Nombre ='".$nombre."'";   
            $resultado1 = mysql_query($sql) or die(mysql_error());
            $fila = mysql_fetch_array($resultado1, MYSQL_BOTH);
            $nrcf= $fila[0]['Nombre'];
            $ca = $fila[0]['idCarrera'];
            if ($nombre==$nrcf) {
                if($ca==$carrera){
                echo "<script>alert('Mi experiencia educativa ya existe.'); window.location = '../Entidades/eeducativa.php';</script>";
                }
            }else{
                //Obtenemos idfac del administrador
                @session_start();
                $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT idFacultad FROM cuenta WHERE Usuario='".$nombreadmin."';";    
                $resultado2 = mysql_query($sql) or die(mysql_error());
                $fil = mysql_fetch_array($resultado2, MYSQL_BOTH);
                $fac = $fil[0];
                $sqluser ="INSERT INTO experienciaeducativa(Nombre, idFacultad, idCarrera) VALUES ('".$nombre."','".$fac."','".$carrera."')";
                mysql_query($sqluser) or die(mysql_error());
                mysql_close();
        ////////////// Limpiamos Variables   ////////////////
            $nombre= "";
            $carrera= "";
            $nrc= "";
            $nrc="";
            $catedratico= "";
            $fil="";
            $resultado="";
            $resultado2="";
            $resultado1="";
            $resul="";
            $fac="";
            $sql="";
            $sqluser="";
            $nombreadmin="";

            if (!$sqluser) {
                 echo "<script>alert('Mi Experiencia Educativa ha sido agregada existosamente');
                 window.location = '../../Vistas/Entidades/eeducativa.php';</script>";
            }else{echo "<script>alert('Mi Experiencia Educativa no ha sido agregada ');</script>";}
           
       
     }
            }
        }
?>