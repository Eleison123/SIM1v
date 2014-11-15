

<?php
include"seguridad.php";

        require_once("conexiones/conexion.php");
        $idtu = $_POST['idhtuto'];
        
           
        	$res=mysql_query("delete from horariotutoria where idtutoria=".$idtu."")or die(mysql_error());
        	mysql_close();
            if ($res) {
         echo "<script>alert('Mi horario ha sido eliminado');
            window.location = 'horariotutoria.php';</script>";
        }else {echo "<script>alert('Mi horario no ha sido eleiminado');</script>";}
?>
