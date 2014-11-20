<?php
// le metemos seguridad
include "../../Vistas/seguridad.php";
    // Si presiona guardar
    if (@$_POST['guardar']) {
        //agregamos al cnexión
    require_once("../../conexiones/conexion.php");
        if(isset($_POST['materia'])and
                ($_POST['fechapub'])and
                ($_POST['catedratico'])and
                ($_POST['carrera'])and
                ($_POST['horaini'])and
                ($_POST['horafin'])and
                ($_POST['dia'])and
                ($_POST['fechavig'])and
                ($_POST['lugar'])and
                ($_POST['tipo']!="")){ 

    // Filtramos caracteres especiales
     
     $materia = mysql_real_escape_string($_POST['materia']);
     $catedratico = mysql_real_escape_string($_POST['catedratico']);
     $carrera = mysql_real_escape_string($_POST['carrera']);
     $horaini = mysql_real_escape_string($_POST['horaini']);
     $horafin = mysql_real_escape_string($_POST['horafin']);
     $dia = mysql_real_escape_string($_POST['dia']);
     $lugar = mysql_real_escape_string($_POST['lugar']);
    $fechvig = mysql_real_escape_string($_POST['fechavig']);
   
    // Convertimos etiquetas
    
     $materia = filter_var($materia, FILTER_SANITIZE_SPECIAL_CHARS);
     $catedratico = filter_var($catedratico, FILTER_SANITIZE_SPECIAL_CHARS);
     $carrera = filter_var($carrera, FILTER_SANITIZE_SPECIAL_CHARS);
     $horaini = filter_var($horaini, FILTER_SANITIZE_SPECIAL_CHARS);
     $horafin = filter_var($horafin, FILTER_SANITIZE_SPECIAL_CHARS);
     $dia = filter_var($dia, FILTER_SANITIZE_SPECIAL_CHARS);
     $lugar = filter_var($lugar, FILTER_SANITIZE_SPECIAL_CHARS);
     $fechvig = filter_var($fechvig, FILTER_SANITIZE_SPECIAL_CHARS);

                @session_start();
                $nombreadmin = $_SESSION['nombreUsuario'];
                $sql = "SELECT idcuenta, usuario, idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";    
                $resultado = mysql_query($sql) or die (mysql_error());
                $fila = mysql_fetch_array($resultado, MYSQL_BOTH);
                $idad = $fila[0];
                $nombreUsuario = $fila[1];
                $facuser = $fila[2];
                $horareg= date("H:i:s");
                 $fechareg = date("Y-m-d");
                 
                 if ($horaini<$horafin) {
                            
                               
                 if ($fechvig>$fechareg) {
                //Hacer Registro
        

//Agregado del Horario                
$sql="INSERT INTO horario( idexperienciaeducativa, idcatedratico, idcarrera, idfacultad, idubicacion,fechavig, dia, horain, horafin)
             VALUES(  '".$materia."', '".$catedratico."', '".$carrera."', '".$facuser."','".$lugar."','".$fechvig."','".$dia."','".$horaini."','".$horafin."')";
$resultado = mysql_query($sql) or die(mysql_error());
mysql_close();
echo "<script> alert('Mi Horario ha sido agregado satisfactoriamente.'); 
window.location = '../../Vistas/Entidades/horario.php';</script>";
/////////////   Limpiamos Variables  ///////////////7
$periodo="";
$materia="";
$catedratico="";
$carrera="";
$horaini="";
$horafin="";
$dia="";
$dia="";
$lugar="";
$idad="";
$nombreUsuario="";
$facuser="";
$horareg="";
$fechareg="";
$fechvig="";
$sqlfecha="";
$sql="";
$sqlr="";



 }else{echo"<script>alert('Mis horas proporcionadas están mal.')</script>";} 
   }else{echo"<script>alert('Mis horas proporcionadas están mal.')</script>";}

}else{
    echo "<script>alert('Me faltan datos de llenar en el formulario.')</script>";}

}
?>