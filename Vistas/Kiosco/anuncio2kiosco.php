<?php
include "../seguridadkiosko.php";
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#rot').cycle({
			fx:     'scrollLeft',
			timeout: 20000,
			delay:  -3000
		});
	});    
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#container2').hide();
	$('#container2').fadeIn('slow');});
</script>

<div id="container2">
	<div class="cycle-main"  onmouseout="$('#rot').cycle('resume');">
		<div id="rot" class="content2">
			<?php
  				///////////////////////// Iniciamos prioridades bajas ///////////////////////////////////
			require_once("../../Conexiones/conexion.php");
 			@session_start();
 			$fac=$_SESSION['facultad'] ;
 			$sqlpu="SELECT * FROM publicacion WHERE idFacultad='".$fac."' order by Prioridad";
 			$respus=mysql_query($sqlpu) or die(mysql_error());
 			$sql3="SELECT * FROM publicacion WHERE idFacultad='".$fac."' AND Prioridad = 3";
 			$sql4="SELECT * FROM publicacion WHERE idFacultad='".$fac."' AND Prioridad = 4";
 			$respus3=mysql_query($sql3) or die(mysql_error());
 			$respus4=mysql_query($sql4) or die(mysql_error());
 			$total3=mysql_num_rows($respus3);
 			$total4=mysql_num_rows($respus4);
 			$total=$total3 + $total4;
 			if($total==0){
 				echo "<div id='anuncio2' style='background:#e67e22 ' >";
										echo "<div id='titulox'>";
										echo"<h1 style='color:#ecf0f1' id='titulo'class='texto10'>Usa FEIBOOK</h1></div>";
										echo "";
										echo "<a class='texto1' style='color:#ecf0f1'>FEIBOOK ofrece a sus integrantes varios servicios y oportunidades, !Ven Conocenos!</a>";
										echo "</div>";
 			}
 			$nav=0;
 				while ($respu=mysql_fetch_array($respus)) {
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////
					///          	    Asignamos Variables                                                               ///
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////
						$idpub=$respu['idPublicacion'];
					    $prioridad = $respu['Prioridad'];
					    $horareg= date("H:i:s");
					    $fechareg = date("Y-m-d");
					    $diap = strtotime($respu['diapublicacion']);
					    $diapubli = date("Y-m-d",$diap);
					    $diapublicacion = $diapubli;
					    $horapublicaicon = $respu['horapublicacion'];
					    $fter = strtotime($respu['fechavig']);
					    $fechter = date("Y-m-d",$fter);
					    $fechater = $fechter;
					    $horater=$respu['horater'];
 							if($prioridad>="3"){
 								if($prioridad<="4"){
	 								if($fechareg>$fechater){
										$prioridaddd=5;
										$res=mysql_query("UPDATE publicacion SET Prioridad =".$prioridaddd." WHERE idPublicacion=".$idpub."")or die(mysql_error());
									}
 									if ($fechareg>=$diapublicacion) {
 										$nav=$nav+1;
										//////////////////Asignamos Variables//////////////////////////////////
										$nombre = $respu['Nombre'];
										$categoria = $respu['categoria'];
										$color = $respu['Color'];
										$colorletra = $respu['Colorletra'];
										$qr=$respu['QR'];
										/////////////////////////////////////////7
										echo "<div id='anuncio2' style='background: ".$color."' >";
										echo "<div id='titulox'>";
										echo"<h1 style='color:".$colorletra."' id='titulo'class='texto10'>".$nombre."</h1></div>";
										echo "";
										echo "<a class='texto1' style='color:".$colorletra."'>Categoría: ".$categoria."</a>";
										echo "<div id='qrbajo'>
										<img id='qrimg1' src='".$qr."'>
										</div>";
										echo "</div>";
									}
 								}
 							}
						

							}
echo "</div></div></div>"; 
 ?>