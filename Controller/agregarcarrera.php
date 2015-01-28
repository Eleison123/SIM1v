
<?php
// Le metemos seguridad
include "../../Vistas/seguridad.php";
    //si presiona guardar
    if (@$_POST['guardar']) {
    // metemos la conexión
    require_once("../../Conexiones/conexion.php");
        if(isset($_POST['nombre'])!=""){ 
            // limpiamos caracteres especiales
            $nombre= mysql_real_escape_string($_POST['nombre']);
            // convertimosmos etiquetas 
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            //preguntamos
            $sql = "SELECT Nombre, idFacultad FROM carrera WHERE Nombre ='".$nombre."' ";   
            $resultado = mysql_query($sql) or die(mysql_error());
            $fila = mysql_fetch_array($resultado, MYSQL_BOTH);
            $nombrec = $fila[0];
            $facultadd= $fila[1];

    if($nombre ==$nombrec){
        echo "<script>alert('Mi Carrera ya existe');</script>"; }
        else{
            require_once("../../Conexiones/conexion.php");
             @session_start();
            $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT  idFacultad FROM cuenta WHERE Usuario='".$nombreadmin."';";    
                $resultado = mysql_query($sql);
                $filass = mysql_fetch_array($resultado, MYSQL_BOTH);
                $id = $filass[0];

        $sqlcare ="INSERT INTO carrera (Nombre, idFacultad) VALUES ('".$nombre."','".$id."')";
        $cosa=mysql_query($sqlcare) or die(mysql_error());
        mysql_close();
        // Limpiamos variables //
        $nombre="";
        $sql="";
        $id="";
        $nombrec="";
        $facultadd="";
        $nombreadmin="";
        $resultado="";
        $filass="";
        $fila="";


        echo"<script>alert('Mi Carrera ha sido  agregada satisfactoriamente');
        window.location = '../Entidades/carrera.php';</script>";
        
                
                
                }
        
         
            }
             

        }
        ?>