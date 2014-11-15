


<script type="text/javascript">
	$(document).ready(function(){
		$('#rotar').cycle({
			fx:     'scrollLeft',
			timeout: 30000,
			delay:  -3000
		});
	});    
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#container').hide();
	$('#container').fadeIn('slow');
});
</script>

<div id="container">
	<div class="cycle-main"  onmouseout="$('#rot').cycle('resume');">
		<div id="rotar" class="content2">
<?php
	$numavi2=0;
require_once("../../conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        $prio=0;
                     
$sqlpu="SELECT idpublicacion,nombre,categoria,fecharea,horarea,fechater,horater,url,lugar,contacto,img,infobreve,info,qr,color,colorletra,diapublicacion,horapublicacion,prioridad,visitas,idregistro,idfacultad,fechavig FROM publicacion WHERE idfacultad='".$fac."' order by prioridad";
$respus=mysql_query($sqlpu) or die(mysql_error());
$total=mysql_num_rows($respus);
if ($total==0) {
	
echo"<div id='anuncio'style='background:white'>
 		<figure>
 		<img id='noav' src='../imagenes/Aviso.png'>
 		</figure>
 		</div>
 		</div>  </div>  </div>";
}
else{
while ($respu=mysql_fetch_array($respus)) {
	
	
                    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
///                     Asignamos Variables                                                               ///
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$idpub=$respu['idpublicacion'];
	$prioridad = $respu['prioridad'];
	$horareg= date("H:i:s");
    $fechareg = date("Y-m-d");
    $diapublicacion = $respu['diapublicacion'];
	$horapublicaicon = $respu['horapublicacion'];
	$fechater = $respu['fechavig'];
	$horater=$respu['horater'];
	if($fechareg>$fechater){
		$prioridadd=5;
			$res=mysql_query("UPDATE  publicacion SET prioridad =".$prioridadd." where idpublicacion=".$idpub."")or die(mysql_error());
		}
	if ($fechareg==$fechater) {
		if ($horareg>=$horater) {
			$prioridadd=5;
			$res=mysql_query("UPDATE  publicacion SET prioridad =".$prioridadd." where idpublicacion=".$idpub."")or die(mysql_error());
		}
		
	}

	if ($prioridad=="1"){
			if ($fechareg>=$diapublicacion) {
				$prio=1;
		
		
$fecharea=$respu['fecharea'];
$nombre = $respu['nombre'];
$categoria = $respu['categoria'];
$info = $respu['info'];
$infobreve = $respu['infobreve'];
$horarea = $respu['horarea'];
$lugar = $respu['lugar'];
$img = $respu['img'];
$qr= $respu['qr'];
$visitas = $respu['visitas'];
$color = $respu['color'];
$colorletra = $respu['colorletra'];
$url = $respu['url'];
$contacto = $respu['contacto'];

if ($img=="imgPublicaciones/") {
	$numavi2=$numavi2+1;
	echo"<div id='anuncio'style='background:".$color."'>";
 			
 			echo"<h1 style='color:".$colorletra."'id='titulo' class='texto10'>".$nombre."</h1>";
 			echo "<img class='sep' src='../imagenes/separador2.png'";
 			echo"<div >";
 				
 				echo"<div id='infor'>";
 					echo "<br><p style='color:".$colorletra."'  class='infor'>".$infobreve."</p><br>";
 					echo "</div>";
 					echo "<img class='sep' src='../imagenes/separador2.png'";
 					echo "<br>";
 					echo "<div id='bajo1'>";
 					echo"<table id='bajo3'><tr>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Lugar</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Contacto</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Inicio</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Termino</a></td></tr><tr>";
 					
 					if ($lugar!="") {
 						echo "<td><a style='color:".$colorletra."' class='texto1'>".$lugar."</a></td>";
 					}
 					if($contacto!=""){
 						echo "<td><a style='color:".$colorletra."' class='texto1'>".$contacto."</a></td>";
 					}
 					echo "<td><a style='color:".$colorletra."' class='texto1'>".$fecharea." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horarea."</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>".$fechater." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'>".$horater."</a></td>";
 					echo "</tr></table>";
 						echo "<div id='qr'>";
 						echo "<a style='color:".$colorletra."' class='texto1'></a>";
 						echo "<img id='qrimg' src='".$qr."'";
 						echo "</div>";
 					
 					
 				echo"</div>";
 			echo "</div>";
 		echo"</div>";
}
else{
	$numavi2=$numavi2+1;
	
			echo"<div id='anuncio1'style='background:".$color."'>";
 			echo"<img id='imagen' src=".$img."  >";
 			echo"<h1 style='color:".$colorletra."'  id='titulo' class='texto1'>".$nombre."</h1>";
 			echo "<img class='sepi' src='../imagenes/separador2.png'";
 			echo"<div >";
 				
 				echo"<div id='inforimg'>";
 					echo "<a style='color:".$colorletra."'  class='inform'>".$infobreve."</a><br>";
 					
 					echo "</div>";
 					
 					echo "<div id='bajo1'>";
 					echo "<img class='sepi' src='../imagenes/separador2.png'>";
 					echo "<br>";
 					echo"<table id='bajo31'><tr>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Lugar</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Contacto</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Inicio</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Término</a></td></tr><tr>";
 					
 					if ($lugar!="") {
 						echo "<td><a style='color:".$colorletra."' class='texto1'>".$lugar."</a></td>";
 					}
 					if($contacto!=""){
 						echo "<td><a style='color:".$colorletra."' class='texto1'>".$contacto."</a></td>";
 					}
 					echo "<td><a style='color:".$colorletra."' class='texto1'> ".$fecharea." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horarea."</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>".$fechater." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horater."</a></td>";
 					echo "</tr></table>";
 					echo"</div>";
 						echo "<div id='qr'>";
 						echo "<img id='qrimg' src='".$qr."'";
 						echo "</div>";
 					
 					
 				
 			echo "</div>";
 		echo"</div>";

 	
 }//terminaif images
 	}//termina seleccion de dia publicacion
}//termina if prioridad
else{
	if ($prioridad=="2") {
if ($fechareg>=$diapublicacion) {
				
		if ($prio=="0") {
			
		
		
$fecharea=$respu['fecharea'];
$nombre = $respu['nombre'];
$categoria = $respu['categoria'];
$info = $respu['info'];
$infobreve = $respu['infobreve'];
$horarea = $respu['horarea'];
$horater=$respu['horater'];
$lugar = $respu['lugar'];
$img = $respu['img'];
$qr= $respu['qr'];

$visitas = $respu['visitas'];
$color = $respu['color'];
$colorletra = $respu['colorletra'];
$url = $respu['url'];
$contacto = $respu['contacto'];

if ($img=="imgPublicaciones/") {
	$numavi2=$numavi2+1;
	echo"<div id='anuncio'style='background:".$color."'>";
 			
 			echo"<h1 style='color:".$colorletra."'id='titulo' class='texto10'>".$nombre."</h1>";
 			echo "<img class='sep' src='../imagenes/separador2.png'";
 			echo"<div >";
 				
 				echo"<div id='infor'>";
 					echo "<br><a style='color:".$colorletra."'  class='infor'>".$infobreve."</a><br>";
 					echo "</div>";
 					echo "<img class='sep' src='../imagenes/separador2.png'";
 					echo "<br>";
 					echo "<div id='bajo1'>";
 					echo"<table id='bajo3'><tr>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Lugar</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Contacto</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Inicio</a></td>";
 				
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Término</a></td></tr><tr>";
 					
 					if ($lugar!="") {
 						echo "<td><a style='color:".$colorletra."' class='texto1'>".$lugar."</a></td>";
 					}
 					if($contacto!=""){
 						echo "<td><a style='color:".$colorletra."' class='texto1'> ".$contacto."</a></td>";
 					}
 					echo "<td><a style='color:".$colorletra."' class='texto1'> ".$fecharea." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horarea."</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>".$fechater." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horater."</a></td>";
 					echo "</tr></table>";
 					echo"</div>";
 						echo "<div id='qr'>";
 						
 						echo "<img id='qrimg' src='".$qr."'";
 						echo "</div>";
 					
 					
 				
 			echo "</div>";
 		echo"</div>";
}
else{
	$numavi2=$numavi2+1;
			echo"<div id='anuncio'style='background:".$color."'>";
 			echo"<img id='imagen' src=".$img."  >";
 			echo"<h1 style='color:".$colorletra."'id='titulo' class='texto10'>".$nombre."</h1>";
 			echo "<img class='sepi' src='../imagenes/separador2.png'>";
 			echo"<div >";
 				
 				echo"<div id='inforimg'>";
 					echo "<a style='color:".$colorletra."'  class='infor'>".$infobreve."</a><br>";
 					echo "</div>";
 					
 					
 					echo "<div id='bajo1'>";
 					echo "<img class='sepi' src='../imagenes/separador2.png'>";
 					echo "<br>";
 					echo"<table id='bajo31'><tr>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Lugar</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Contacto</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Inicio</a></td>";
 					
 					echo "<td><a style='color:".$colorletra."' class='texto1'>Fecha Término</a></td></tr><tr>";
 					
 					if ($lugar!="") {
 						echo "<td><a style='color:".$colorletra."' class='texto1'>".$lugar."</a></td>";
 					}
 					if($contacto!=""){
 						echo "<td><a style='color:".$colorletra."' class='texto1'> ".$contacto."</a></td>";
 					}
 					echo "<td><a style='color:".$colorletra."' class='texto1'> ".$fecharea." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horarea."</a></td>";
 					echo "<td><a style='color:".$colorletra."' class='texto1'>".$fechater." / </a>";
 					echo "<a style='color:".$colorletra."' class='texto1'> ".$horater."</a></td>";
 					echo "</tr></table>";
 					echo"</div>";
 						echo "<div id='qr'>";
 						
 						echo "<img id='qrimg' src='".$qr."'";
 						echo "</div>";
 					
 					
 				
 			echo "</div>";
 		echo"</div>";

 	}//termina prio
 }//terminaif images
 	}//termina seleccion de dia publicacion



	
	}
}

}//termina While
if ($numavi2==0) {
	echo"<div id='anuncio'style='background:white'>
 		<figure>
 		<img id='noav' src='../imagenes/Aviso.png'>
 		</figure>
 		</div>
 		</div>  </div>  </div>";
}
}
echo "</div>  </div>  </div>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ?>  	
  