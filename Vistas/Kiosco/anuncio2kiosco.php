<?php
include"../seguridadkiosko.php";
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
			require_once("../../conexiones/conexion.php");
 			@session_start();
 			$fac=$_SESSION['facultad'] ;
 			$sqlpu="SELECT idpublicacion,nombre,categoria,fecharea,horarea,fechater,horater,url,lugar,contacto,img,infobreve,info,qr,color,colorletra,diapublicacion,horapublicacion,prioridad,visitas,idregistro,idfacultad,fechavig FROM publicacion WHERE idfacultad='".$fac."' order by prioridad";
 			$respus=mysql_query($sqlpu) or die(mysql_error());
 			$total=mysql_num_rows($respus);
 			
 			$nav=0;
 				while ($respu=mysql_fetch_array($respus)) {
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////
					///          	    Asignamos Variables                                                               ///
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////
						$idpub=$respu['idpublicacion'];
						$prioridad = $respu['prioridad'];
						$horareg= date("H:i:s");
    					$fechareg = date("Y-m-d");
    					$diapublicacion = $respu['diapublicacion'];
						$horapublicaicon = $respu['horapublicacion'];
						$fechater = $respu['fechavig'];
 							if($prioridad>="3"){
 								if($prioridad<="4"){
 								if($fechareg>$fechater){
									$prioridaddd=5;
			$res=mysql_query("UPDATE  publicacion SET prioridad =".$prioridaddd." where idpublicacion=".$idpub."")or die(mysql_error());
								}
 									if ($fechareg>=$diapublicacion) {
 										$nav=$nav+1;
										//////////////////Asignamos Variables//////////////////////////////////
										$nombre = $respu['nombre'];
										$categoria = $respu['categoria'];
									
										$color = $respu['color'];
										$colorletra = $respu['colorletra'];
										$qr=$respu['qr'];
										/////////////////////////////////////////7
										echo "<div id='anuncio2' style='background: ".$color."' >";
										echo "<div id='titulox'>";
										echo"<h1 style='color:".$colorletra."' id='titulo'class='texto10'>".$nombre."</h1></div>";
										echo "<hr>";
										echo "<a class='texto1' style='color:".$colorletra."'>".$categoria."</a>";
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