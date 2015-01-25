
<?php
	require_once("../Conexiones/conexion.php");
	include "seguridad.php";

require_once("../Conexiones/conexion.php");
        @session_start();
        //Preguntamos el id del administrador par sacar la facultad
        $nombreadmin = $_SESSION['nombreUsuario'];
        $sqlc = "SELECT idCuenta, Usuario, idFacultad FROM cuenta WHERE Usuario='".$nombreadmin."';";   
        $resultado = mysql_query($sqlc);
        $filax = mysql_fetch_array($resultado, MYSQL_BOTH);
        $idad = $filax[0];
        $nombreUsuario = $filax[1];
        $fac = $filax[2];

    require("pdf/fpdf.php");
    class PDF extends FPDF{}
    //Declaramos la hoja
    $pdf=new PDF('P','mm','A4');
    $pdf->SetMargins(20,18);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //datos de titulo
    $pdf->SetTextColor(0x00,0x00,0x00);
    $pdf->SetFont("Arial","b",9);
    $pdf->Cell(0,5,'Registro del Sistema Interactivo de Mensajes',0,1,'C');
    require_once("../Conexiones/conexion.php");
    $pdf->Ln();
$sqlrep="SELECT publicacion.Nombre, registro.idRegistro, registro.horareg, registro.diareg, registro.idCuenta, registro.idFacultad , publicacion.visitas FROM registro INNER JOIN publicacion ON registro.idFacultad = '".$fac."' and registro.idRegistro = publicacion.idRegistro ORDER BY registro.diareg";
$rep=mysql_query($sqlrep);
$pdf->Cell(100,5,'Nombre',1,0,'C');
$pdf->Cell(80,5,'Visitas',1,1,'C');
while ($row=mysql_fetch_array($rep)) {
    $nombrep=$row['Nombre'];
    $visitas=$row['visitas'];
    $pdf->Cell(100,5,$nombrep,1,0,'C');
    $pdf->Cell(80,5,$visitas,1,1,'C');
    # code...
}
$pdf->Output();


?>