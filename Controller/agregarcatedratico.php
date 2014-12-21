<?php
// Le Metemos seguridad //
include"../../Vistas/seguridad.php";
    // Si presiona Guardar // 
    if (@$_POST['guardar']) {
        // Incluimos conexión//
        require_once("../../conexiones/conexion.php");
        if(isset($_POST['nombre'])and
            ($_POST['apmater'])and
            ($_POST['appaterno']!="")){ 
            //Revisamos que no tengan caracteres especiales y los quitamos//
            $nombre= mysql_real_escape_string($_POST['nombre']);
            $appaterno= mysql_real_escape_string($_POST['appaterno']);
            $facu= mysql_real_escape_string($_POST['facultad']);
            $apmater= mysql_real_escape_string($_POST['apmater']);
            $correo= $_POST['correo'];
            // convertimos etiquetas //
            $nombre = filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            $appaterno = filter_var($appaterno, FILTER_SANITIZE_SPECIAL_CHARS);
            $facu = filter_var($facu, FILTER_SANITIZE_SPECIAL_CHARS);
            $apmater = filter_var($apmater, FILTER_SANITIZE_SPECIAL_CHARS);
            // Iniciamos inserción
            $sqlpre = "SELECT * FROM catedratico";
            $cosapregunta=mysql_query($sqlpre) or die(mysqli_error());
            $coinciden=0;
            $cadena2=$nombre.$appaterno.$apmater;
            // var_dump($cadena2);
            if($cosapregunta!=""){
            // $cadena2=ereg_replace("[]+","", $cadena2);
            while($row=mysql_fetch_array($cosapregunta)){
                // var_dump($row['nombre']);
                    $cadena=$row['Nombre'].$row['Apellidopaterno'].$row['Apellidomaterno'];
                                // $cadena=ereg_replace("[]+","", $cadena);
                    // var_dump($cadena);
                                if($cadena==$cadena2){
                                $coinciden=1;
                                }
                        }
                    }
            
            if($coinciden==1){
                        echo "<script>alert('Ya existe mi Catedrático');
                            window.location ='../Entidades/catedratico.php';</script>";

            }else{
            
            $sqluser ="INSERT INTO catedratico (Nombre, Apellidomaterno, Apellidopaterno, Correo, idFacultad) VALUES ('".$nombre."','".$apmater."','".$appaterno."','".$correo."','".$facu."')";
            $cosa= mysql_query($sqluser) or die(mysqli_error());
            mysql_close();
        // Lipiamos Variables //
        $nombre="";
        $appaterno="";
        $apmater="";
        $correo="";
        $facu="";
        $sqluser="";
            
        if ($cosa) {
            echo "<script>alert('Mi Catedrático ha sido agregado satisfactoriamente');
                window.location = '../Entidades/catedratico.php';</script>";
        }else{echo "<script>alert('Mi Catedrático no ha sido agregado');</script>";}
         
            }

        }

}

?>