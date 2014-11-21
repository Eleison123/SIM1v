<?php
include"../seguridad.php";

        require_once("../Conexiones/conexion.php");
        $idmateria = $_POST['idhes'];
           
        	$res=mysql_query("DELETE FROM horario WHERE idhorario=".$idmateria."")or die(mysql_error());
        	
            mysql_close();
        	if ($res) {
         echo "<script>alert('Mi horario ha sido eliminado satisfactoriamente');
            window.location = '../Vistas/Entidades/horario.php';</script>";
        }else {echo "<script>alert('Mi horario no ha sido eleiminado');</script>";}
        
    
?>

