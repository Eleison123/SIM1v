
<?php
	require_once("../conexiones/conexion.php");
	include "seguridad.php";

require_once("../conexiones/conexion.php");
        @session_start();
        //Preguntamos el id del administrador par sacar la facultad
        $nombreadmin = $_SESSION['nombreUsuario'];
        $sqlc = "SELECT idcuenta, usuario, idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";   
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
    require_once("../conexiones/conexion.php");
    $pdf->Ln();
$sqlrep="SELECT publicacion.nombre, registro.idregistro, registro.horareg, registro.diareg, registro.idcuenta, registro.idfacultad , publicacion.visitas FROM registro INNER JOIN publicacion ON registro.idfacultad = '".$fac."' and registro.idregistro = publicacion.idregistro ORDER BY registro.diareg";
$rep=mysql_query($sqlrep);
$pdf->Cell(100,5,'Nombre',1,0,'C');
$pdf->Cell(80,5,'Visitas',1,1,'C');
while ($row=mysql_fetch_array($rep)) {
    $nombrep=$row['nombre'];
    $visitas=$row['visitas'];
    $pdf->Cell(100,5,$nombrep,1,0,'C');
    $pdf->Cell(80,5,$visitas,1,1,'C');
    # code...
}
$pdf->Output();


?>