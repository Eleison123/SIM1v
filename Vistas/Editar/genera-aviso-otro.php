<?php
require_once("../../conexiones/conexion.php");


 session_start();

    $consulta = "SELECT * FROM publicacion WHERE idpublicacion = ".$_GET['id']."";

    $query = mysql_query($consulta)or die(mysql_error());
  
    while ($respu = mysql_fetch_array($query)) {
        $idpub=$respu['idPublicacion'];
    $prioridad = $respu['Prioridad'];
    $horareg= date("H:i:s");
    $fechareg = date("Y-m-d");
    $diapublicacion = $respu['diapublicacion'];
    $horapublicaicon = $respu['horapublicacion'];
    $fechater = $respu['fechavig'];
    if($fechareg>$fechater){
       
        $prioridad=5;
            $res=mysql_query("UPDATE  publicacion SET prioridad =".$prioridad." where idpublicacion=".$idpub."")or die(mysql_error()); 
            if($res){
            echo"<script>alert('Mi publicación ya termino!!')</script>";}
        }

$fecharea=$respu['fecharea'];
$nombre = $respu['Nombre'];
$categoria = $respu['categoria'];
$info = $respu['Info'];
$infobreve = $respu['Infobreve'];
$horarea = $respu['horarea'];
$horater=$respu['horater'];
$lugar = $respu['Lugar'];
$img = $respu['img'];
$qr= "../".$respu['QR'];

$visitas = $respu['Visitas'];
$color = $respu['Color'];
$colorletra = $respu['Colorletra'];
$url =$respu['URL'];
$contacto = $respu['Contacto'];



            if ($prioridad<=4) {

if ($img=="../../imgPublicaciones/") {
     echo"<div class='marcas'>";
 echo"<div id='contenedor'>";
    $visitas=$visitas+1;
    $vis=mysql_query("UPDATE publicacion SET visitas=".$visitas." where idpublicacion=".$idpub."")or die(mysql_error());
echo"<div id='anuncio' style='background:".$color."'>";
            
                    echo"<h1 style='color:".$colorletra."' id='titulo' class='texto1'>".$nombre."</h1>";
                    echo "<hr>";
         echo"<div class='infor'>";
                    echo "<br><a style='color:".$colorletra."'  class='infor'>".$info."</a>";
         echo "</div><br>";
            echo "<div id='bajo1'>";//inicia bajo1
                echo "<div id='infobajo'>";///inicia bajos
                        echo "<table id='bajo3'>";
                        echo"<tr>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Lugar</a></td>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Contacto</a></td>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Hora </a></td></tr>";
                        echo "<tr>";
                        if ($lugar!="") {
                        echo "<td><a style='color:".$colorletra."' class='texto2'>".$lugar."</a></td>";
                        }else{echo"<td></td>";}
                        if($contacto!=""){
                        echo "<td><a style='color:".$colorletra."' class='texto2'> ".$contacto."</a></td>";
                        }else{echo"<td></td>";}
                        if ($horarea!="") {
                        echo "<td><a style='color:".$colorletra."' class='texto2'>".$horarea." /</a>";
                        }else{echo "<td></td>";}
                        if ($horater!="") {
                            echo"<a style='color:".$colorletra."' class='texto2'>".$horater."</a></td> ";
                        }else{echo "<td></td>";}
                            echo "</tr></table><br>";
                            echo " <img id='qrimg'src='".$qr."'";
                echo "</div>";//termina bajos
               
            echo"</div>";//termian bajo1
           
     
    echo"</div>";//termina anuncio
    echo "</div></div>";
}else{
     echo"<div class='marcas'>";
 echo"<div id='contenedor'>";
            echo"<div id='anuncio'style='background:".$color."'>";
            echo"<img id='imagen' src='".$img."'>";
            $visitas=$visitas+1;
             $vis=mysql_query("UPDATE publicacion SET visitas=".$visitas." where idpublicacion=".$idpub."")or die(mysql_error());
            echo"<h1 style='color:".$colorletra."'id='titulo' class='texto1'>".$nombre."</h1>";
            echo "<hr>";
            echo"<div >";
                
                echo"<div id='infor'>";
                    echo "<a style='color:".$colorletra."' id='info' class='texto2'>".$info."<br>";
                    
                    echo "</div>";
                    echo "<hr>";
                    echo "<br>";
                    echo "<div id='bajo1'>";

                    echo "<div id='infobajo'>";
                    
                        echo "<table id='bajo3'>";
                        echo"<tr>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Lugar</a></td>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Contacto</a></td>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Hora Realización</a></td>";
                        echo "<td><a style='color:".$colorletra."' class='texto2'>Hora Termino</a></td></tr>";
                    
                        

                        echo "<tr>";
                        if ($lugar!="") {
                        echo "<td><a style='color:".$colorletra."' class='texto2'>".$lugar."</a></td>";
                        }else{echo"<td></td>";}
                        if($contacto!=""){
                        echo "<td><a style='color:".$colorletra."' class='texto2'> ".$contacto."</a></td>";
                        }else{echo"<td></td>";}
                        if ($horarea!="") {
                        echo "<td><a style='color:".$colorletra."' class='texto2'>".$horarea."</a></td>";
                        }else{echo "<td></td>";}
                        if ($horater!="") {
                            echo"<td><a style='color:".$colorletra."' class='texto2'>".$horater."</a></td> ";
                        }else{echo "<td></td>";}
                    echo "</tr></table><br>";


                        echo "<div id='qr'>";
                       
                        echo " <img id='qrimg'src='".$qr."'";
                        echo "</div>";//termina QR
                        
                      
                    echo "</div>";
                    
                    
                       
                        
                        
                    

                    
                echo"</div>";
            echo "</div>";
        echo"</div>"; echo"</div>";
    
            
    
 }//terminaif images
    }//termina seleccion de dia publicacion

};//termina While

echo "</div>";echo "</div>";

 

?>