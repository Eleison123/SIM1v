<?php include"../Vistas/seguridad.php";
        require_once("../conexiones/conexion.php");
        $idfcar = $_POST['idcarrera'];
        	$res1=mysql_query("DELETE FROM horario WHERE idcarrera=".$idfcar."")or die(mysql_error());
        	$res0=mysql_query("DELETE FROM experienciaeducativa WHERE idcarrera=".$idfcar."")or die(mysql_error());
            $res=mysql_query("DELETE FROM carrera WHERE idcarrera=".$idfcar."")or die(mysql_error());
            mysql_close();
        	if ($res) {
                echo "<script>alert('Carrera Eliminada Exitosmente');
                window.location = '../Vistas/Entidades/carrera.php';</script>";
            }else{
                echo "<script>alert('Mi Carrera no ha sido eliminada');</script>";
            }
?>