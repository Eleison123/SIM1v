<?php
if(@$_POST['entrar']){
	require_once("conexiones/conexion.php");
	
	if($_POST['facultad']){
		$facultad = mysql_real_escape_string($_POST['facultad']);
	}
	$sql = "SELECT idfacultad FROM facultad WHERE idfacultad='".$facultad."' ";	
	$resultado = mysql_query($sql);
	mysql_close();
	$fila = mysql_fetch_array($resultado, MYSQL_BOTH);
	$id = $fila[0];
	if(($facultad == $id)){
		session_start();
		$_SESSION['facultad'] = $facultad;
		header("location:Vistas/principalkiosko2.php");
	}else{
		echo "No existe el usuario";

	}
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="css/logkiosko.css">
<script type='text/javascript'>
/*Da un mensaje de error*/
var mensajeerror = "Boton derecho deshabilitado ¡Gracias!"; 
if(document.layers) window.captureEvents(Event.MOUSEDOWN); function bloquear(e){
if (navigator.appName == 'Netscape' && ( e.which == 2 || e.which == 3)) { alert(mensajeerror);return false; }
if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3)) {
alert(mensajeerror);return false; }} window.onmousedown=bloquear; document.onmousedown=bloquear;   
</script>

<body>
	<div id="contenedor">

	<div id="Log">

		<form method="POST" name="login">
			
				<a for="facultad"><h1>Facultad:</h1></a><br>
			    
			   		<?php
			   		echo "<select id='fac'name='facultad'>";
			   		require_once("conexiones/conexion.php");
						    //Preguntamos los nombres de las materias segun su idfacultad
						 $mysql="select idfacultad, nombre from facultad ";
						$resul=mysql_query($mysql) or die(mysql_error());
						while($row=mysql_fetch_array($resul)){
						    echo "<option value='".$row['idfacultad']."'>";
						    echo $row['nombre'];
						    echo "</option>";
						}
						echo"</select>";

					?>
					<br>
				
			<br/><div id="botones">
				<input name="entrar"  class="boton"type="submit" value="Ingresar"/>
			    
		</form>


	</div>

			</div><img id="logo" src="imagenes/log2.png">

</body>