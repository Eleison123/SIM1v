<?php
include"seguridad.php";

        require_once("conexiones/conexion.php");
        $idinter = $_POST['idhinter'];
      
           
        	$res=mysql_query("DELETE from horariointersemestral where idhorariointersemestral=".$idinter."")or die(mysql_error());
            if($res){
        	echo"<script>alert('Mi horario ha sido eliminado exitosamente');
            window.location = 'horariointersemestral.php';</script>";
        	
        }else{echo "<script>alert('Mi horario no ha sido eleiminado</script>";}
    
?>

