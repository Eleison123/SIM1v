<?php
include"../Vistas/seguridad.php";
        require_once("../Conexiones/conexion.php");
        $idmateria = $_POST['idmateria'];
       
            
        	$res1=mysql_query("DELETE FROM horario WHERE idExperienciaEducativa=".$idmateria."")or die(mysql_error());
        	$res=mysql_query("DELETE FROM experienciaeducativa WHERE idExperienciaEducativa=".$idmateria."")or die(mysql_error());
            mysql_close();
        	if ($res) {
                echo "<script>alert('Mi Experiencia Educativa ha sido eliminada exitosamente');
                window.location = '../Vistas/Entidades/eeducativa.php';</script>";
               
            

            }else{
                echo "<script>alert('Mi seleccion no ha sido eleiminada')</script>";
            }
        
    
?>

