<?php include "../seguridad.php"; ?>
<!DOCTYPE html>
<html leng="es">
<head>
<!-- Metas -->
<meta charset="utf-8">
<!-- CSS -->
<link rel="stylesheet" href="../../css/css1a.css">
    <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
<script src="../../js/jquery-1.4.2.min.js"></script> 
<script language="Javascript" type="text/javascript">
 Begin
document.oncontextmenu = function(){return false}
</script>
<script type="text/javascript">
$(document).ready(function(){
 
    $('#cuerpo').hide();
    $('#cuerpo').fadeIn('slow');
});
</script>
<script type="text/javascript">
$(document).ready(function(event){
    $('#agregar').click(function{
       window.location = 'agregarp.php';
    });
});
</script>
<title>Registro</title>
</head>
<div id="portada">
    <img id="imgportada" src="../../imagenes/header.jpg">
</div>
<center><div id="cabeza">
    
    <div id="men">
<nav id="menu">
    <ul>
       <li><a href="../pagprin.php">INICIO</a></li>
        <li><a href="publicacion.php">PUBLICACIÓNES</a></li>
        <li><a href="horario.php">HORARIO</a></li>
        <li><a href="cuenta.php">CUENTA</a></li>
        <li><a href="facultad.php">FACULTAD</a></li>
        <li><a href="eeducativa.php">E.EDUCATIVA</a></li>
        <li><a href="registro.php" id="qwerty">REGISTRO</a></li>
        <li><a href="carrera.php">CARRERA</a></li>  
        <li><a href="catedratico.php">CATEDRÁTICO</a></li>
        <li><a href="ubicaciones.php">UBICACIONES</a></li>   
        <li><a href="salir.php">SALIR</a></li>   
    </ul>
</nav>
</div>
</div></center>

<body>
<div id="cuerpo"><br><br>
    <img src="../../imagenes/registro.png"><br><br>

	<?php
		require_once("../../conexiones/conexion.php");
		@session_start();
		//Preguntamos el id del administrador par sacar la facultad
		$nombreadmin = $_SESSION['nombreUsuario'];
		$sqlc = "SELECT idcuenta, usuario, idfacultad FROM cuenta WHERE usuario='".$nombreadmin."';";	
		$resultado = mysql_query($sqlc);
		$filax = mysql_fetch_array($resultado, MYSQL_BOTH);
		$idad = $filax[0];
		$nombreUsuario = $filax[1];
		$fac = $filax[2];
		//Preguntamos el nombre d ela facultad
		$sqlf="SELECT nombre FROM facultad WHERE idfacultad='".$fac."'";
		$resulf= mysql_query($sqlf);
		$filu=mysql_fetch_array($resulf,MYSQL_BOTH);
		$nombre=$filu[0];
		
		echo "<a class='text1'><strong>Cuenta:</strong> ".$nombreadmin."</a><br>
        <div id='menureg'>
        <div id='ag'>
            <form  method='post' action='../regvisitas.php'>
                        <input type='submit'  value='Imprimir por Visitas'  name='agregar' class='conf'>
                        
            </form>
        </div>
        <div id='ag'>
            <form  method='post' action='../regfechas.php'>
                        <input type='submit'  value='Imprimir por Fechas' name='agregar' class='conf'>
                        
            </form>
        </div>
</div><br>
        ";
        echo "<legend><a class='text1'>Registros de Publicaciones</a></legend>";
        echo "<div id='contenedor_carrera'>";
		//Preguntamos datos del registro
        echo "<table >";
		echo "<tr>";
		echo "<th>Publicacion</th>";
		
		echo "<th>ID</th>";
		
		echo "<th>Hora</th>";
		
		echo "<th>Fecha</th>";
		echo "</tr><br><br>";
		$nombre=$filu[0];
        require_once("../../conexiones/conexion.php");
		$sqlr="SELECT publicacion.nombre, registro.idregistro, registro.horareg, registro.diareg, registro.idcuenta, registro.idfacultad FROM registro INNER JOIN publicacion ON registro.idfacultad = '".$fac."' and registro.idregistro = publicacion.idregistro ORDER BY registro.diareg";
		$resul=mysql_query($sqlr) or die(mysql_error());
		 

                        $num_total_registros=mysql_num_rows($resul);
                       if ($num_total_registros > 0) {
    //Limito la busqueda
    $tamano_pag = 10;
        $pagina = false;
                        //examino pagina a mostrar e inicio
        if (isset($_GET['pagina']))  
                        $pagina=$_GET['pagina'];
                        if (!$pagina) {
                            $inicio=0;
                            $pagina=1;
                        }else{
                            $inicio=($pagina - 1) * $tamano_pag;
                        }
                        ///// Calculo todas las paginas
                        $total_paginas=ceil($num_total_registros / $tamano_pag);
		
while($row=mysql_fetch_array($resul)){
	echo "<td><a class='text10'>".$row['nombre']."</a></td>";
	
    echo "<td><a class='text10'>".$row['idregistro']."</a></td>";
 
    echo "<td><a class='text10'>".$row['horareg']."</a></td>";
   
    echo "<td><a class='text10'>".$row['diareg']."</a></td>";
  
    echo "<td><br><br>";
   echo "</tr>";
}
echo "</table>";   echo "</div>";  
echo '<p class="textlink">';

    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<a class="textlink" href="'.'?pagina='.($pagina-1).'"><img src="imagenes/izq.gif" border="0"></a>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo "<a class='textlink'>".$pagina."</a>";
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '  <a class="textlink" href="'.'?pagina='.$i.'">'.$i.'</a>  ';
        }
        if ($pagina != $total_paginas)
            echo '<a class="textlink"><a class="textlink" href="'.'?pagina='.($pagina+1).'"><img src="imagenes/der.gif" border="0"></a></a>';
    }
    echo '</p>';}
                         

        
        
        echo "</div></div>";mysql_close();
	?>
	
  
</body><br><br>
<footer>
<div id="final">
    <img src="../../imagenes/footer.jpg" id="footer">
</div></footer>
</html>