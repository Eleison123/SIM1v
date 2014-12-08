<?php
//le metemos seguridad
include"../../Vistas/seguridad.php";
    // si presiona guardar
    if (@$_POST['guardar']) {
        //le metemos la conexión
    require_once("../../conexiones/conexion.php");
        if(isset(
            $_POST['nombre'])){ 
            //Limpiamos caracteres especiales
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $carrera= mysql_real_escape_string($_POST['carrera']);
            $nrc= mysql_real_escape_string($_POST['nrc']);
            $nrc98= mysql_real_escape_string($_POST['nrc98']);
            $catedratico= mysql_real_escape_string($_POST['catedratico']);
            //Limpiamos etiquetas
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $carrera = filter_var($carrera, FILTER_SANITIZE_SPECIAL_CHARS);
            $nrc = filter_var($nrc, FILTER_SANITIZE_SPECIAL_CHARS);
            $nrc98 = filter_var($nrc98, FILTER_SANITIZE_SPECIAL_CHARS);
            $catedratico = filter_var($catedratico, FILTER_SANITIZE_SPECIAL_CHARS);

            //preguntamos valores de la BD
            $sql = "SELECT nrc FROM experienciaeducativa WHERE nrc ='".$nrc."'";   
            $resultado1 = mysql_query($sql) or die(mysql_error());
            $fila = mysql_fetch_array($resultado1, MYSQL_BOTH);
            $nrcf= $fila[0];

            if ($nrc==$nrcf) {
                echo "<script>alert('Mi experiencia educativa ya existe.');
                window.location = '../Entidades/eeducativa.php';</script>";
                # code...
            }else{
                //Obtenemos idfac del administrador
                @session_start();
                $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
                $resultado2 = mysql_query($sql) or die(mysql_error());
                $fil = mysql_fetch_array($resultado2, MYSQL_BOTH);
                $fac = $fil[0];
                $sqluser ="INSERT INTO experienciaeducativa(nrc, nrc98,nombre, idcatedratico, idfacultad, idcarrera) VALUES ('".$nrc."','".$nrc98."','".$nombre."','".$catedratico."','".$fac."','".$carrera."')";
                mysql_query($sqluser) or die(mysql_error());
                mysql_close();
        ////////////// Limpiamos Variables   ////////////////7
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