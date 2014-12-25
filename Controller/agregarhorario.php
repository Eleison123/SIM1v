<?php
// le metemos seguridad
include "../../Vistas/seguridad.php";
    // Si presiona guardar
    if (@$_POST['guardar']) {
        //agregamos al cnexión
        var_dump($_POST);
    require_once("../../conexiones/conexion.php");
        if(isset($_POST['fechapub'])and
                ($_POST['catedratico'])and
                ($_POST['horaini'])and
                ($_POST['horafin'])and
                ($_POST['dia'])and
                ($_POST['fechavig'])and
                ($_POST['lugar'])and
                ($_POST['tipo']!="")){ 

    // Filtramos caracteres especiales
    
        if($_POST['materia']!=""){$materia = mysql_real_escape_string($_POST['materia']);}
        if($_POST['catedratico']!=""){$catedratico = mysql_real_escape_string($_POST['catedratico']);}
        if($_POST['carrera']!=""){$carrera = mysql_real_escape_string($_POST['carrera']);}
        if($_POST['horain']!=""){$horaini = mysql_real_escape_string($_POST['horaini']);}
        if($_POST['horafin']!=""){$horafin = mysql_real_escape_string($_POST['horafin']);}
        if($_POST['dia']!=""){$dia = mysql_real_escape_string($_POST['dia']);}
        if($_POST['lugar']!=""){$lugar = mysql_real_escape_string($_POST['lugar']);}
        if($_POST['fechavig']!=""){$fechvig = mysql_real_escape_string($_POST['fechavig']);}
        if($_POST['bloque']!=""){$bloque = mysql_real_escape_string($_POST['bloque']);}
        if($_POST['seccion']!=""){$seccion = mysql_real_escape_string($_POST['seccion']);}
        if($_POST['nrc']!=""){$nrc = mysql_real_escape_string($_POST['nrc']);}
        if($_POST['nrcant']!=""){$nrcant = mysql_real_escape_string($_POST['nrcant']);}
        if($_POST['diapub']!=""){$diapub = mysql_real_escape_string($_POST['diapub']);}
        if($_POST['secretaria']!=""){$secretaria = mysql_real_escape_string($_POST['secretaria']);}
   
    // Convertimos etiquetas
    
     if($_POST['materia']!=""){$materia = filter_var($materia, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['catedratico']!=""){$catedratico = filter_var($catedratico, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['carrera']!=""){$carrera = filter_var($carrera, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['horain']!=""){$horaini = filter_var($horaini, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['horafin']!=""){$horafin = filter_var($horafin, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['dia']!=""){$dia = filter_var($dia, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['lugar']!=""){$lugar = filter_var($lugar, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['fechavig']!=""){$fechvig = filter_var($fechvig, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['bloque']!=""){$bloque = filter_var($bloque, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['seccion']!=""){$seccion = filter_var($seccion, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['nrc']!=""){$nrc = filter_var($nrc, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['nrcant']!=""){$nrcant = filter_var($nrcant, FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['diapub']!=""){$diapub=filter_var($diapub,FILTER_SANITIZE_SPECIAL_CHARS);}
     if($_POST['secretaria']!=""){$secretaria = filter_var($secretaria, FILTER_SANITIZE_SPECIAL_CHARS);}

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
$sql="INSERT INTO horario(
    idExperienciaEducativa, 
    idcatedratico, 
    idCarrera, 
    idFacultad, 
    idubicacion,
    fechavig, 
    dia, 
    horain, 
    horafin,
    diapub,
    horapub,
    tipo,
    NRC,
    NRCANT,
    Seccion,
    Bloque,
    Secretaria
    )
    VALUES(
        '".$materia."',
        '".$catedratico."', 
        '".$carrera."', 
        '".$facuser."',
        '".$lugar."',
        '".$fechvig."',
        '".$dia."',
        '".$horaini."',
        '".$horafin."',
        '".$diapub."',
        '".$horapub."',
        '".$tipo."',
        '".$nrc."',
        '".$nrcant."',
        '".$seccion."',
        '".$bloque."',
        '".$secretaria."'
        )";
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