<?php
include"../Vistas/seguridad.php";
        require_once("../conexiones/conexion.php");
        $iduse = $_POST['iduser'];
        
            $rex=mysql_query("DELETE FROM registro WHERE idCuenta=".$iduse."")or die(mysql_error());
        	$res=mysql_query("DELETE FROM cuenta WHERE idCuenta=".$iduse."")or die(mysql_error());
            mysql_close();
            if ($res) {
		    echo "<script>alert('Mi Cuenta a sido eliminado exitosamente');
			window.location = '../Vistas/Entidades/cuenta.php';</script>";
            }else{echo "<script>alert('Mi cuenta no ha sido eleiminado');</script>";}
            
        	
        
  
?>

