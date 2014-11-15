

<?php
include"seguridad.php";

        require_once("conexiones/conexion.php");
        $idmateria = $_POST['idhes'];
      
           
        	$res=mysql_query("delete from horarioescolar where idhorarioescolar=".$idmateria."")or die(mysql_error());
        	
            mysql_close();
        	if ($res) {
         echo "<script>alert('Mi horario ha sido eliminado satisfactoriamente');
            window.location = 'horarioescolar.php';</script>";
        }else {echo "<script>alert('Mi horario no ha sido eleiminado');</script>";}
        
    
?>

