<?php
            include"../Vistas/seguridad.php";
            require_once("../Conexiones/conexion.php");
            $idfac = $_POST['idfacultad'];
            $res8=mysql_query("DELETE FROM publicacion WHERE idfacultad=".$idfac."")or die(mysql_error());
            $res6=mysql_query("DELETE FROM catedratico WHERE idfacultad=".$idfac."")or die(mysql_error());
            $res5=mysql_query("DELETE FROM carrera WHERE idfacultad=".$idfac."")or die(mysql_error());
            $res4=mysql_query("DELETE FROM cuenta WHERE idfacultad=".$idfac."")or die(mysql_error());
        	$res1=mysql_query("DELETE FROM horario WHERE idfacultad=".$idfac."")or die(mysql_error());
        	$res0=mysql_query("DELETE FROM experienciaeducativa WHERE idfacultad=".$idfac."")or die(mysql_error());
            $res=mysql_query("DELETE FROM facultad WHERE idfacultad=".$idfac."")or die(mysql_error());
            mysql_close();
            
        	if($res){
            echo "<script>alert('Mi facultad ha sido eliminada'); window.location = '../Vistas/Entidades/facultad.php';</script>";
            }else{
                echo "<script>alert('Mi facultad no ha sido eleiminada');</script>";
            }
?>
