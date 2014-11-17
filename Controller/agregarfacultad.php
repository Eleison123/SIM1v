<?php
// le metemos seguridad //
include"../seguridad.php";
    //si presiona guardar //
    if (@$_POST['guardar']){
    // se mete la conexión //
    require_once("../Conexiones/conexion.php");
        if(isset($_POST['nombre'])and
            ($_POST['sede']!="")){ 
            //limpiamos caracteres especiales
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $sede= mysqli_real_escape_string($_POST['sede']);
            //convertimos etiquetas 
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $sede = filter_var($sede, FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT nombre, sede FROM facultad WHERE nombre='".$nombre."' and sede='".$sede."'";   
    $resultado = mysql_query($sql) or die(mysql_error());
    $fila = mysqli_fetch_array($resultado, MYSQL_BOTH);
    $nombref = $fila[0];
    $sedef = $fila[1];
    if($nombre !=$nombref){
        $sqluser ="INSERT INTO facultad (nombre, sede) VALUES ('".$nombre."','".$sede."')";
        $cosa=mysql_query($sqluser) or die(mysql_error());
        mysqli_close();
        echo "<script>alert('Mi facultad ha sido agregada exitosamente');
            window.location = '../Entidades/facultad.php';</script>";
            }
            else{
                if ($sede != $sedef) {
                    $sqluser ="INSERT INTO facultad (nombre, sede) VALUES ('".$nombre."','".$sede."')";
                    $cosa=mysql_query($sqluser) or die(mysql_error());
                    mysql_close();
                    //limpiamos variables
                    $nombre="";
                    $sede="";
                    $sql="";
                    $resultado="";
                    $fila="";
                    $sqluser="";
                    $nombref="";
                    $sedef="";
                    echo "<script>alert('Mi facultad ha sido agregada satisfactoriamente');
            window.location = 'facultad.php';</script>";
                }
                else{
                   echo "Mi facultad ya existe"; 
                }
        
         echo "Mi facultad ya existe";
            }
             

        }

}
?>