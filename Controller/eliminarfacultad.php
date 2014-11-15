

<?php
include"../Vistas/seguridad.php";

        require_once("../conexiones/conexion.php");
        $idfac = $_POST['idfacultad'];
     
            
            $res8=mysql_query("delete from publicacion where idfacultad=".$idfac."")or die(mysql_error());
            $res6=mysql_query("delete from catedratico where idfacultad=".$idfac."")or die(mysql_error());
            $res5=mysql_query("delete from carrera where idfacultad=".$idfac."")or die(mysql_error());
            $res4=mysql_query("delete from cuenta where idfacultad=".$idfac."")or die(mysql_error());
        	$res1=mysql_query("delete from horario where idfacultad=".$idfac."")or die(mysql_error());
        	$res0=mysql_query("delete from experienciaeducativa where idfacultad=".$idfac."")or die(mysql_error());
            $res=mysql_query("delete from facultad where idfacultad=".$idfac."")or die(mysql_error());
            mysql_close();
            
        	if ($res) {
            echo "<script>alert('Mi facultad ha sido eliminada');
            window.location = '../Vistas/Entidades/facultad.php';</script>";
        }else{echo "<script>alert('Mi facultad no ha sido eleiminada');</script>";}
        
        
   
?>
