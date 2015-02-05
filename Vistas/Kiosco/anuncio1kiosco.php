<script type="text/javascript">
    $(document).ready(function(){
        $('#rotar').cycle({
            fx:     'scrollLeft',
            timeout: 30000,
            delay:  -3000
        });
    });    
</script>
<div id="container">
    <div class="cycle-main"  onmouseout="$('#rot').cycle('resume');">
        <div id="rotar" class="content2">
<?php
    $numavi2=0;
    require_once("../../Conexiones/conexion.php");
    @session_start();
    $fac=$_SESSION['facultad'] ;
    $prio=0;               
    $sqlpu="SELECT * FROM publicacion WHERE idFacultad='".$fac."' order by prioridad";
    $respus=mysql_query($sqlpu) or die(mysql_error());
  
    $sql3="SELECT * FROM publicacion WHERE idFacultad='".$fac."' AND Prioridad = 1";
            $sql4="SELECT * FROM publicacion WHERE idFacultad='".$fac."' AND Prioridad = 2";
            $respus3=mysql_query($sql3) or die(mysql_error());
            $respus4=mysql_query($sql4) or die(mysql_error());
            $total3=mysql_num_rows($respus3);
            $total4=mysql_num_rows($respus4);
            $total=$total3 + $total4;
    if ($total==0) {
        echo"<div id='sinanuncio'><figure><center><img id='noav' src='../imagenes/Aviso.png'></center></figure></div></div></div></div>";
    }
    else{
    while ($respu=mysql_fetch_array($respus)) {               
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
///                     Asignamos Variables                                                               ///
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $fechavig =""; $fechareg="";
    $idpub    =$respu['idPublicacion'];
    $prioridad= $respu['Prioridad'];
    $horareg  = date("H:i:s");
    $fechareg = date("Y-m-d");
    $horapublicaicon = $respu['horapublicacion'];
    $diap     = strtotime($respu['diapublicacion']);
    $diapubli = date("Y-m-d",$diap);
    $diapublicacion = $diapubli;
    $fter     = strtotime($respu['fechavig']);
    $fechter  = date("Y-m-d",$fter);
    $fechavig = $fechter;
    $horater  = $respu['horater'];
    $fecharea="";
    $fechd="";
    if($fechareg > $fechavig){
        $prioridadd=5;
        $res=mysql_query("UPDATE  publicacion SET Prioridad =".$prioridadd." WHERE idpublicacion=".$idpub."")or die(mysql_error());
    }
    if ($prioridad=="1"){
            if ($fechareg>=$diapublicacion) {
                $prio=1;
                if($fechter!=0){ 
                    $fechter=$respu['fechater'];
                $fechterx=strtotime($fechter);
                $fechd = date("d",$fechterx);
                $fechm = date("m",$fechterx);
                $fechy = date("Y",$fechterx);
                $mex=$fechm;
                if($mex==1){ $mex=" de Enero ";}
                if($mex==2){ $mex=" de Febrero ";}
                if($mex==3){ $mex=" de Marzo ";}
                if($mex==4){ $mex=" de Abril ";}
                if($mex==5){ $mex=" de Mayo ";}
                if($mex==6){ $mex=" de Junio ";}
                if($mex==7){ $mex=" de Julio ";}
                if($mex==8){ $mex=" de Agosto ";}
                if($mex==9){ $mex=" de Septiembre ";}
                if($mex==10){ $mex=" de Octubre ";}
                if($mex==11){ $mex=" de Noviembre ";}
                if($mex==12){ $mex=" de Diciembre ";}
                }
                $fechasrea=$respu['fecharea'];
                if($fechasrea!=0){ 
                $fechar=strtotime($respu['fecharea']);
                $fecharea=date("d",$fechar);
                $fecharea1=date("m",$fechar);
                $mes=$fecharea1;
                if($mes==1){ $mes=" de Enero ";}
                if($mes==2){ $mes=" de Febrero ";}
                if($mes==3){ $mes=" de Marzo ";}
                if($mes==4){ $mes=" de Abril ";}
                if($mes==5){ $mes=" de Mayo ";}
                if($mes==6){ $mes=" de Junio ";}
                if($mes==7){ $mes=" de Julio ";}
                if($mes==8){ $mes=" de Agosto ";}
                if($mes==9){ $mes=" de Septiembre ";}
                if($mes==10){ $mes=" de Octubre ";}
                if($mes==11){ $mes=" de Noviembre ";}
                if($mes==12){ $mes=" de Diciembre ";}
                $fecharea2=date("Y",$fechar);
                }
                $nombre = $respu['Nombre'];
                $categoria = $respu['categoria'];
                $info = $respu['Info'];
                $infobreve = $respu['Infobreve'];
                $horarea = $respu['horarea'];
                $lugar = $respu['Lugar'];
                $img = $respu['img'];
                $qr= $respu['QR'];
                $visitas = $respu['Visitas'];
                $color = $respu['Color'];
                $colorletra = $respu['Colorletra'];
                $url = $respu['URL'];
                $contacto = $respu['Contacto'];
                $tipo = $respu['categoria'];
                
                if ($img=="../../imgPublicaciones/"){
                    $numavi2=$numavi2+1;
                        echo"<div id='anuncio1'style='background:".$color."'>";
                            // echo"<img id='imagen' src=".$img."  >";
                            echo"<h1 style='color:".$colorletra."'id='titulo' class='texto10'>".$nombre."</h1>";
                            if($categoria=="Aviso"){echo"<img  src='../imagenes/iconos_49.png' id='imagenx'>";}
                            if($categoria=="Beca"){echo"<img  src='../imagenes/iconos_63.png' id='imagenx'>";}
                            if($categoria=="Empleo"){echo"<img  src='../imagenes/iconos_46.png' id='imagenx'>";}
                            if($categoria=="Certificación"){echo"<img  src='../imagenes/iconos_37.png' id='imagenx' >";}
                            if($categoria=="Seminario"){echo"<img  src='../imagenes/iconos_43.png' id='imagenx' >";}
                            if($categoria=="Junta"){echo"<img  src='../imagenes/iconos_40.png' id='imagenx' >";}
                            if($categoria=="Otro"){echo"<img  src='../imagenes/iconos_60.png' id='imagenx'>";}
                                echo"<div >";
                                    echo"<div id='inform'>";
                                    echo "<p style='color:".$colorletra."'  class='inform'>".$infobreve."</p><br>";
                                    echo "</div>";
                                        echo "<div id='bajo1'>";
                                        echo "<br>";
                                        echo "<table id='bajo31'>";
                                        
                                        if ($fecharea==0){}else{ 
                                        echo "<tr><td><img src='../imagenes/icon-inicio.png' id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Inicio</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'> ".$fecharea.$mes.$fecharea2." / </a>"; 
                                        if($horarea==0){}else{
                                        echo "<a style='color:".$colorletra."' class='texto17'> ".$horarea."</a>";} 
                                        echo "</td></tr>";}
                                        if ($fechd==0){}else{ 
                                            echo "<tr><td><img src='../imagenes/icon-termino.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Término</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$fechd.$mex.$fechy." / </a>";
                                        if ($horater==0){}else{  
                                            echo "<a style='color:".$colorletra."' class='texto17'> ".$horater."</a>"; 
                                        }
                                        echo "</td></tr>";}
                                        if ($lugar!="") {
                                            echo "<tr><td><img src='../imagenes/icon-lugar.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Lugar</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$lugar."</a></td></tr>";
                                        }
                                        if($contacto!=""){
                                            echo "<tr><td><img src='../imagenes/icon-contacto.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Contacto</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$contacto."</a></td></tr>";
                                        }
                                        echo"<tr><td><a style='color:".$colorletra."' class='texto17'>  Categoría:</a></td>";
                                        echo"<td><a style='color:".$colorletra."' class='texto17'>".$tipo."</a></td></tr>";
                                        echo "</table>";
                                        echo"</div>";
                                        echo "<div id='qr'>";    
                                            echo "<img id='qrimg' src='".$qr."'";
                                        echo "</div>";
                                    echo "</div>";
                                echo"</div>";
                        echo "</div>";
                }
                else{
                    $numavi2=$numavi2+1;
                    echo "<div id='anuncio1'style='background:".$color."'>";
                    echo "<img id='imagen' src=".$img."  >";
                    echo "<h1 style='color:".$colorletra."'  id='titulo' class='texto1'>".$nombre."</h1>";
                    echo "";
                        echo "<div >";
                            echo "<div id='inform'>";
                            echo "<p style='color:".$colorletra."'  class='inform'>".$infobreve."</p><br>";
                            echo "</div>";
                                echo "<div id='bajo1'>";
                                    echo "<br>";
                                    echo "<table id='bajo31'>";
                                    if ($fecharea==0){}else{ 
                                        echo "<tr><td><img src='../imagenes/icon-inicio.png' id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Inicio</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'> ".$fecharea.$mes.$fecharea2." / </a>"; 
                                        if($horarea==0){}else{
                                        echo "<a style='color:".$colorletra."' class='texto17'> ".$horarea."</a>";} 
                                        echo "</td></tr>";}
                                        if ($fechd==0){}else{ 
                                            echo "<tr><td><img src='../imagenes/icon-termino.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Término</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$fechd.$mex.$fechy." / </a>";
                                        if ($horater==0){}else{  
                                            echo "<a style='color:".$colorletra."' class='texto17'> ".$horater."</a>"; 
                                        }
                                        echo "</td></tr>";}
                                        if ($lugar!="") {
                                        echo "<tr><td><img src='../imagenes/icon-lugar.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Lugar</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'>".$lugar."</a></td></tr>";
                                    }
                                    if($contacto!=""){
                                        echo "<tr><td><img src='../imagenes/icon-contacto.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Contacto</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'>".$contacto."</a></td></tr>";
                                    }
                                   echo"<tr><td><a style='color:".$colorletra."' class='texto17'>  Categoría:</a></td>";
                                   echo"<td><a style='color:".$colorletra."' class='texto17'>".$tipo."</a></td></tr>";
                                    echo "</table>";
                                echo "</div>";
                                    echo "<div id='qr'>";
                                    echo "<img id='qrimg' src='".$qr."'";
                                    echo "</div>";
                            echo "</div>";
                        echo"</div>";
                    echo "</div>";
        
                }
            }
    }
    if ($prioridad=="2"){
            if ($fechareg>=$diapublicacion) {     
                if ($prio==0) {
                    $fechter=$respu['fechater'];
                    if($fechter!=0){ 
                $fechterx=strtotime($fechter);
                $fechd = date("d",$fechterx);
                $fechm = date("m",$fechterx);
                $fechy = date("Y",$fechterx);
                $mex=$fechm;
                if($mex==1){ $mex=" de Enero ";}
                if($mex==2){ $mex=" de Febrero ";}
                if($mex==3){ $mex=" de Marzo ";}
                if($mex==4){ $mex=" de Abril ";}
                if($mex==5){ $mex=" de Mayo ";}
                if($mex==6){ $mex=" de Junio ";}
                if($mex==7){ $mex=" de Julio ";}
                if($mex==8){ $mex=" de Agosto ";}
                if($mex==9){ $mex=" de Septiembre ";}
                if($mex==10){ $mex=" de Octubre ";}
                if($mex==11){ $mex=" de Noviembre ";}
                if($mex==12){ $mex=" de Diciembre ";}
                }
                $fechasrea=$respu['fecharea'];
                if($fechasrea!=0){ 
                $fechar=strtotime($respu['fecharea']);
                $fecharea=date("d",$fechar);
                $fecharea1=date("m",$fechar);
                $mes=$fecharea1;
                if($mes==1){ $mes=" de Enero ";}
                if($mes==2){ $mes=" de Febrero ";}
                if($mes==3){ $mes=" de Marzo ";}
                if($mes==4){ $mes=" de Abril ";}
                if($mes==5){ $mes=" de Mayo ";}
                if($mes==6){ $mes=" de Junio ";}
                if($mes==7){ $mes=" de Julio ";}
                if($mes==8){ $mes=" de Agosto ";}
                if($mes==9){ $mes=" de Septiembre ";}
                if($mes==10){ $mes=" de Octubre ";}
                if($mes==11){ $mes=" de Noviembre ";}
                if($mes==12){ $mes=" de Diciembre ";}
                $fecharea2=date("Y",$fechar);
                }
                    $nombre = $respu['Nombre'];
                    $categoria = $respu['categoria'];
                    $info = $respu['Info'];
                    $infobreve = $respu['Infobreve'];
                    $horarea = $respu['horarea'];
                    $horater=$respu['horater'];
                    $lugar = $respu['Lugar'];
                    $img = $respu['img'];
                    $qr= $respu['QR'];
                    $visitas = $respu['Visitas'];
                    $color = $respu['Color'];
                    $colorletra = $respu['Colorletra'];
                    $url = $respu['URL'];
                    $contacto = $respu['Contacto'];
                    $tipo = $respu['categoria'];
                    if ($img=="../../imgPublicaciones/") {
                        $numavi2=$numavi2+1;
                        echo"<div id='anuncio1'style='background:".$color."'>";
                            // echo"<img id='imagen' src=".$img."  >";
                        echo"<h1 style='color:".$colorletra."'id='titulo' class='texto10'>".$nombre."</h1>";
                    if($categoria=="Aviso"){echo"<img id='imagenx' src='../imagenes/iconos_49.png' >";}
                    if($categoria=="Beca"){echo"<img id='imagenx' src='../imagenes/iconos_63.png' >";}
                    if($categoria=="Empleo"){echo"<img id='imagenx' src='../imagenes/iconos_46.png' >";}
                    if($categoria=="Certificación"){echo"<img id='imagenx' src='../imagenes/iconos_37.png' >";}
                    if($categoria=="Seminario"){echo"<img id='imagenx' src='../imagenes/iconos_43.png' >";}
                    if($categoria=="Junta"){echo"<img id='imagenx' src='../imagenes/iconos_40.png' >";}
                    if($categoria=="Otro"){echo"<img id='imagenx' src='../imagenes/iconos_60.png' >";}
                                echo"<div >";
                                    echo"<div id='inform'>";
                                    echo "<p style='color:".$colorletra."'  class='inform'>".$infobreve."</p><br>";
                                    echo "</div>";
                                        echo "<div id='bajo1'>";
                                        echo "<br>";
                                        echo "<table id='bajo31'>";
                                        if ($fecharea==0){}else{ 
                                        echo "<tr><td><img src='../imagenes/icon-inicio.png' id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Inicio</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'> ".$fecharea.$mes.$fecharea2." / </a>"; 
                                        if($horarea==0){}else{
                                        echo "<a style='color:".$colorletra."' class='texto17'> ".$horarea."</a>";} 
                                        echo "</td></tr>";}
                                        if ($fechd==0){}else{ 
                                            echo "<tr><td><img src='../imagenes/icon-termino.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Término</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$fechd.$mex.$fechy." / </a>";
                                        if ($horater==0){}else{  
                                            echo "<a style='color:".$colorletra."' class='texto17'> ".$horater."</a>"; 
                                        }
                                        echo "</td></tr>";}
                                        if ($lugar!="") {
                                            echo "<tr><td><img src='../imagenes/icon-lugar.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Lugar</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$lugar."</a></td></tr>";
                                        }
                                        if($contacto!=""){
                                            echo "<tr><td><img src='../imagenes/icon-contacto.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Contacto</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$contacto."</a></td></tr>";
                                        }
                                        echo"<tr><td><a style='color:".$colorletra."' class='texto17'>  Categoría:</a></td>";
                                        echo"<td><a style='color:".$colorletra."' class='texto17'>".$tipo."</a></td></tr>";

                                        echo "</table>";
                                        echo"</div>";
                                        echo "<div id='qr'>";    
                                            echo "<img id='qrimg' src='".$qr."'";
                                        echo "</div>";
                                    echo "</div>";
                                echo"</div>";
                        echo "</div>";
                    }
                    else{
                       $numavi2=$numavi2+1;
                    echo "<div id='anuncio1'style='background:".$color."'>";
                    echo "<img id='imagen' src=".$img."  >";
                    echo "<h1 style='color:".$colorletra."'  id='titulo' class='texto1'>".$nombre."</h1>";
                    echo "";
                        echo "<div >";
                            echo "<div id='inform'>";
                            echo "<p style='color:".$colorletra."'  class='inform'>".$infobreve."</p><br>";
                            echo "</div>";
                                echo "<div id='bajo1'>";
                                    echo "<br>";
                                    echo "<table id='bajo31'>";
                                    if ($fecharea==0){}else{ 
                                        echo "<tr><td><img src='../imagenes/icon-inicio.png' id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Inicio</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'> ".$fecharea.$mes.$fecharea2." / </a>"; 
                                        if($horarea==0){}else{
                                        echo "<a style='color:".$colorletra."' class='texto17'> ".$horarea."</a>";} 
                                        echo "</td></tr>";}
                                        if ($fechd==0){}else{ 
                                            echo "<tr><td><img src='../imagenes/icon-termino.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Fecha Término</a></td>";
                                            echo "<td><a style='color:".$colorletra."' class='texto17'>".$fechd.$mex.$fechy." / </a>";
                                        if ($horater==0){}else{  
                                            echo "<a style='color:".$colorletra."' class='texto17'> ".$horater."</a>"; 
                                        }
                                        echo "</td></tr>";}
                                        if ($lugar!="") {
                                        echo "<tr><td><img src='../imagenes/icon-lugar.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Lugar</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'>".$lugar."</a></td></tr>";
                                    }
                                    if($contacto!=""){
                                        echo "<tr><td><img src='../imagenes/icon-contacto.png'id='ti'><a style='color:".$colorletra."' class='texto17'>Contacto</a></td>";
                                        echo "<td><a style='color:".$colorletra."' class='texto17'>".$contacto."</a></td></tr>";
                                    }
                                   echo"<tr><td><a style='color:".$colorletra."' class='texto17'>  Categoría:</a></td>";
                                   echo"<td><a style='color:".$colorletra."' class='texto17'>".$tipo."</a></td></tr>";
                                    echo "</table>";
                                echo "</div>";
                                    echo "<div id='qr'>";
                                    echo "<img id='qrimg' src='".$qr."'";
                                    echo "</div>";
                            echo "</div>";
                        echo"</div>";
                    echo "</div>";
                    }//termina prio
                }//terminaif images
            }//termina seleccion de dia publicacion
    }//Termina prioridad 2
    }//Termina While
    }//termina else
   

echo "</div>  </div>  </div>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ?>  