<meta charset="utf-8">
<?php
include "seguridad.php";

        require_once("conexiones/conexion.php");
        $idexa = $_POST['idhex'];
        
           
        	$res=mysql_query("delete from horarioexamenes where idhorarioexamen=".$idexa."")or die(mysql_error());
        	mysql_close();
            if ($res) {
                echo "<script>alert('Mi horario ha sido eliminado');
            window.location = 'horariosexamen.php';</script>";
            }else{
                echo"<script>alert('Mi horario de examenes no ha sido eliminado');</script>";
            }
            
?>