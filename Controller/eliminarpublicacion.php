<meta charset="utf-8">
<?php
include "../seguridad.php";

        require_once("../conexiones/conexion.php");
        $idpub = $_POST['idpubli'];
      
           
        	$res=mysql_query("DELETE FROM publicacion WHERE idpublicacion=".$idpub."")or die(mysql_error());
        	mysql_close();
        	if ($res) {
               echo "<script>alert('Mi publicación a sido eliminada exitosamente');
     window.location = '../publicacion.php';</script>";
                

            }else{
                echo "No se a eliminado mi publicación";
            }  
?>