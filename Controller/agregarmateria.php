<?php
//le metemos seguridad
include"../seguridad.php";
    // si presiona guardar
    if (@$_POST['guardar']) {
        //le metemos la conexión
    require_once("conexiones/conexion.php");
        if(isset($_POST['nrc'])and
            ($_POST['catedratico'])and
            ($_POST['carrera'])and
            ($_POST['nrc98'])and
            ($_POST['nombre']!="")){ 
            //Limpiamos caracteres especiales
            $nombre= mysqli_real_escape_string($_POST['nombre']);
            $carrera= mysqli_real_escape_string($_POST['carrera']);
            $nrc= mysqli_real_escape_string($_POST['nrc']);
            $nrc98= mysqli_real_escape_string($_POST['nrc98']);
            $catedratico= mysqli_real_escape_string($_POST['catedratico']);
            //Limpiamos etiquetas
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $carrera = filter_var($carrera, FILTER_SANITIZE_SPECIAL_CHARS);
            $nrc = filter_var($nrc, FILTER_SANITIZE_SPECIAL_CHARS);
            $nrc98 = filter_var($nrc98, FILTER_SANITIZE_SPECIAL_CHARS);
            $catedratico = filter_var($fcatedratico, FILTER_SANITIZE_SPECIAL_CHARS);

            //preguntamos valores de la BD
            $sql = "SELECT nrc FROM materia WHERE nrc ='".$nrc."'";   
            $resultado1 = mysqli_query($sql) or die(mysql_error());
            $fila = mysqli_fetch_array($resultado1, MYSQL_BOTH);
            $nrcf= $fila[0];

            if ($nrc==$nrcf) {
                echo "<script>alert('Mi  materia ya existe.');
                window.location = 'agregareeducativa.php';</script>";
                # code...
            }else{
                //Obtenemos idfac del administrador
                @session_start();
                $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT idfacultad FROM administrador WHERE nombre='".$nombreadmin."';";    
                $resultado2 = mysqli_query($sql) or die(mysql_error());
                $fil = mysqli_fetch_array($resultado2, MYSQL_BOTH);
                $fac = $fil[0];
                $sqluser ="INSERT INTO experieciaeducativa(nrc, nrc98,nombre, idcatedratico, idfacultad, idcarrera) VALUES ('".$nrc."','".$nrc98."','".$nombre."','".$catedratico."','".$fac."','".$carrera."')";
                mysqli_query($sqluser) or die(mysql_error());
                mysqli_close();
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

            if ($sqluser) {
                 echo "<script>alert('Mi Experiencia Educativa ha sido agregada existosamente');
                 window.location = '../Vistas/Entidades/eeducativa.php';</script>";
            }else{echo "<script>alert('Mi Experiencia Educativa no ha sido agregada ');</script>";}
           
       
     }
            }
        }
?>