<?php include"../Vistas/seguridad.php";
        require_once("../Conexiones/conexion.php");
        $idfcar = $_POST['idubicacion'];
        	$res1=mysql_query("DELETE FROM ubicacion WHERE idubicacion=".$idfcar."")or die(mysql_error());
        	
            mysql_close();
        	if ($res1) {
                echo "<script>alert('Mi Ubicacion ha sido Eliminada Exitosmente');
                window.location = '../Vistas/Entidades/ubicaciones.php';</script>";
            }else{
                echo "<script>alert('Mi Ubicacion no ha sido eliminada');</script>";
            }
?>