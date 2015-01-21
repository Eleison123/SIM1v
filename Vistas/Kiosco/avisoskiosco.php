
<?php
include"../seguridadkiosko.php";
?>
<script src="../../js/jquery-1.4.2.min.js"></script>
<script src="../../js/anuncios.js"></script>
<!DOCTYPE HTML>
<html leng="es">
	<head>
<!-- Metas -->
	<meta charset="utf-8"> 
	
<!-- CSS -->
	<link rel="stylesheet" href="../../css/avisoscss.css">
          <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/png" />
<!-- JS -->
<script language="Javascript" type="text/javascript">
//<![CDATA[
<!-- Begin
document.oncontextmenu = function(){return false}
// End -->
//]]>
</script>
 <title>Sistema Interactivo de Mensajes </title>
	</head>	
	
  <div id="cen" >
             <div class="botonera"  id="becas" title="Todas las publicaciones">
			<center><img class="iconos" src="../../imagenes/iconos_03.png"></center>
			
		    </div>
            <div class="botonera" id="empleo" title="Todas las publicaciones">
			<img class="iconos" src="../../imagenes/iconos_05.png">
			
		    </div>
            <div class="botonera" id="certificacion" title="Todas las publicaciones">
			<img class="iconos" src="../../imagenes/iconos_07.png">
			
		    </div>
		    <div class="botonera" id="seminario" title="Todas las publicaciones">
			<img class="iconos" src="../../imagenes/iconos_09.png">
			
		    </div>
		     <div class="botonera" id="junta" title="Todas las publicaciones">
			<img class="iconos" src="../../imagenes/iconos_11.png">
			
		    </div>
		     <div class="botonera" id="aviso" title="Todas las publicaciones">
			<img class="iconos" src="../../imagenes/iconos_13.png">
			
		    </div>
		     <div class="botonera" id="otro" title="Todas las publicaciones">
			<img class="iconos" src="../../imagenes/iconos_15.png">
		
		    </div>
            <div class="botonera" id="uno" title="Atrás">
			<a href="../principalkiosco.php">
        <img class="iconos" src="../../imagenes/iconos_21.png"></a>
			
		    </div>   
  </div>
  <body>
    <div id="botoncitos">
<div id="atrassss">
    <div id="tituu">
        <h1><a class="text111">Avisos</a></h1>
    </div>
    <div id="back">
<a href="../principalkiosco.php">
  <img class="iconos" src="../../imagenes/iconos_21.png"></a>

    </div>
</div>

<div id="becas3">
<div class="marcax"><div class="cuadro"><center><img class="icon" src="../../imagenes/iconos_03.png"></center>
     </div></div></div>

<div id="empleo3"><div class="marcax"><div class="cuadro"><center><img class="icon" src="../../imagenes/iconos_05.png"></center>
     </div></div></div>

<div id="certificacion3"><div class="marcax"><div class="cuadro"><center><img class="iconcer" src="../../imagenes/iconos_07.png"></center>
      </div></div></div>

<div id="seminario3"><div class="marcax"><div class="cuadro"><center><img class="icon" src="../../imagenes/iconos_09.png"></center>
      </div></div></div>

<div id="junta3"><div class="marcax"><div class="cuadro"><center><img class="icon" src="../../imagenes/iconos_11.png"></center>
      </div></div></div>

<div id="aviso3"><div class="marcax"><div class="cuadro"><center><img class="icon" src="../../imagenes/iconos_13.png"></center>
      </div></div></div>

<div id="otro3"><div class="marcax"><div class="cuadro"> <center><img class="icon" src="../../imagenes/iconos_15.png"></center>
      </div></div></div>


</div>

<div id="beca1" name="beca1"></div>
<div id="beca2" name="beca2">
	<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                        $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Beca") {

                           $var=$var+1;
                           echo "<div class='marca'>";
                            echo "<div class='cuadrobeca' value='".$row1['idpublicacion']."'><p class='textox'> ".$row1['nombre']."</p></div></div>";
                            }}
                        } 
                        if ($var==0) {
                          echo "<div class='nomarcas'> <img src='../../imagenes/noavisos.png'></div>'";
                        }
                        ?>
  </div>
<div id="empleo1" name="empleo1"></div>
<div id="empleo2" name="empleo2">
<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Empleo") {
                           	$var=$var+1;
                           echo "<div class='marca'>";
                            echo "<div class='cuadroempleo' value='".$row1['idpublicacion']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            }}
                        } 
                         if ($var==0) {
                          echo "<div class='nomarcas'> <img src='../../imagenes/noavisos.png'></div>'";
                        }
                        ?>
</div>
<div id="certificacion1" name="certificacion1"></div>
<div id="certificacion2" name="certificacion2">
<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Certificación") {
                           	$var=$var+1;
                           echo "<div class='marca'>";
                            echo "<div class='cuadrocertificacion' value='".$row1['idpublicacion']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            }}
                        } if ($var==0) {
                          echo "<div class='nomarcas'> <img src='../../imagenes/noavisos.png'></div>'";
                        } ?>
</div>
<div id="seminario1" name="seminario1"></div>
<div id="seminario2" name="seminario2">
<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Seminario") {
                            $var=$var+1;
                             echo "<div class='marca'>";
                            echo "<div class='cuadroseminario' value='".$row1['idpublicacion']."'><p class='textox'>".$row1['nombre']."</p></div></div>";
                            }}
                        }  if ($var==0) {
                          echo "<div class='nomarcas'> <img src='../../imagenes/noavisos.png'></div>'";
                        }?>
</div>
<div id="junta1" name="junta1"></div>
<div id="junta2" name="junta2">
<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Junta") {
                           	$var=$var+1;
                           echo "<div class='marca'>";
                            echo "<div class='cuadrojunta' value='".$row1['idpublicacion']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            }}
                        } if ($var==0) {
                          echo "<div class='nomarcas'> <img src='../../imagenes/noavisos.png'></div>'";
                        }?>
</div>
<div id="aviso1" name="aviso1"></div>
<div id="aviso2" name="aviso2">
<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Aviso") {
                           	$var=$var+1;
                           echo "<div class='marca'>";
                            echo "<div class='cuadroaviso' value='".$row1['idpublicacion']."' > <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            }}
                        } 
                        if ($var==0) {
                          echo "<div class='nomarcas'> <img src='../../imagenes/noavisos.png'></div>'";
                        }
                        ?>
</div>
<div id="otro1" name="otro1"></div>
<div id="otro2" name="otro2">
<?php
 require_once("../../Conexiones/conexion.php");
                @session_start();
                        $fac=$_SESSION['facultad'] ;
                        
                            //Preguntamos los nombres de las carreras segun su idfacultad
                         $mysqlfacu="SELECT idpublicacion,nombre, categoria,idfacultad,prioridad FROM publicacion WHERE idfacultad = '".$fac."'; ";
                        $resulf=mysql_query($mysqlfacu)or die(mysql_error());
                        $lugarp=1;
                       $var=0;
                        while($row1=mysql_fetch_array($resulf)){
                           if($row1['prioridad']<="4"){
                           if ($row1['categoria']=="Otro") {
                           	$var=$var+1;
                           echo "<div class='marca'>";
                            echo "<div class='cuadrootro' value='".$row1['idpublicacion']."'> <p class='textox'> ".$row1['nombre']." </p></div></div>";
                            }}
                        } if ($var==0) {
                          echo "<div class='nomarcas'> <center><img src='../../imagenes/noavisos.png'></center></div>";
                        }?>
</div>
      

  </body>
  </html>