<meta charset="utf-8">

<?php
include"../Vistas/seguridad.php";

        require_once("../conexiones/conexion.php");
        $idfcar = $_POST['idcate'];
       
        
        	$res1=mysql_query("delete from horario where idcatedratico=".$idfcar."")or die(mysql_error());
        	$res0=mysql_query("delete from experienciaeducativa where idcatedratico=".$idfcar."")or die(mysql_error());
            $res=mysql_query("delete from catedratico where idcatedratico=".$idfcar."")or die(mysql_error());
            mysql_close();
        	if ($res) {
                 echo "<script>alert('Mi Catedrático ha sido eliminado exitosmente');
                window.location = '../Vistas/Entidades/catedratico.php';</script>";

            }else{
               echo "<script>alert('Mi Catedrático no ha sido eliminado');</script>";
            }
        
    
?>
