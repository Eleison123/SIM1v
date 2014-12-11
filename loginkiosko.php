<?php
if(@$_POST['entrar']){
	require_once("conexiones/conexion.php");
	
	if($_POST['facultad']){
		$facultad = mysql_real_escape_string($_POST['facultad']);
	}
	$sql = "SELECT idfacultad FROM facultad WHERE idfacultad='".$facultad."' ";	
	$resultado = mysql_query($sql)or die (mysql_error());
	
	$fila = mysql_fetch_array($resultado, MYSQL_BOTH);
	$id = $fila[0];
	if(($facultad == $id)){
		session_start();
		$_SESSION['facultad'] = $facultad;
		header("location:Vistas/principalkiosko.php");
	}else{
		echo "No existe el usuario";

	}
}
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="css/logkiosko.css">
      <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/png" />
  <script language="Javascript" type="text/javascript">
//<![CDATA[

<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
<body>
    
    <img src="imagenes/coatli2.png" id="logg">
    <center><div id="contenedor">
	<div id="Log">

		<form method="POST" name="login">
			
				<center><a for="facultad">
                    <h1>Facultad</h1></a>
                </center>
			    
			   		<?php
			   		echo "<select id='fac'name='facultad'>";
			   		require_once("conexiones/conexion.php");
						    //Preguntamos los nombres de las materias segun su idfacultad
						 $mysql="SELECT idfacultad, nombre from facultad ";
						$resul=mysql_query($mysql) or die(mysql_error());
						while($row=mysql_fetch_array($resul)){
						    echo "<option value='".$row['idfacultad']."'>";
						    echo $row['nombre'];
						    echo "</option>";
						}
						echo"</select>";

					?>
					<br>
				
			<br/><center><div class="botones">
            <center><input name="entrar"  class="boton" type="submit" value="INGRESAR"/></center>
			    
		</form>


            </div></center>

			</div></center>

</body>