<?php
require_once("../../conexiones/conexion.php");
    $consultaor = "SELECT * FROM horario WHERE idCarrera = ".$_GET['id']." AND tipo = '2'  ORDER BY idExperienciaEducativa";
    $consultaex = "SELECT * FROM horario WHERE idCarrera = ".$_GET['id']." AND tipo = '3'  ORDER BY idExperienciaEducativa";
    $consultati = "SELECT * FROM horario WHERE idCarrera = ".$_GET['id']." AND tipo = '4'  ORDER BY idExperienciaEducativa";
    $queryor = mysql_query($consultaor)  or die(mysql_error());
    $queryex = mysql_query($consultaex)  or die(mysql_error());
    $queryti = mysql_query($consultati)  or die(mysql_error());
    echo "<div class='marcas'>";
    $var=0;
//////////////TODOS//////////////////////////////////////////////////////////////////////////////////////////////////////////
if($queryor!=""){if($queryex!=""){if($queryti!=""){ 
    while ($filaor = mysql_fetch_array($queryor)) { 
    while ($filaex = mysql_fetch_array($queryex)) {
    while ($filati = mysql_fetch_array($queryti)) {
        $fechareg = date("Y-m-d");
        if($fechareg>$filaor['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaor['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($fechareg>$filaex['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaex['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($fechareg>$filati['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filati['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($filaor['NRC']==$filaex['NRC']){if($filaex==$filati['NRC']){ 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filaor['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filaor['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaor!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaor['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaor['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['acta']."</p></td>";
                echo "</tr>";
             }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaex!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaex['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaex['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['acta']."</p></td>";
                echo "</tr>";
             }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filati!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filati['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filati['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filati['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filati['acta']."</p></td>";
                echo "</tr>";
             }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }}}}} }}}
////////////ORDINARIO Y EXTRA/////////////////////////////////////////////////////////////////////////////////////////////////////////
if($queryor!=""){if($queryex!=""){if($queryti==""){ 
    while ($filaor = mysql_fetch_array($queryor)) { 
    while ($filaex = mysql_fetch_array($queryex)) {
    while ($filati = mysql_fetch_array($queryti)) {
        $fechareg = date("Y-m-d");
        if($fechareg>$filaor['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaor['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($fechareg>$filaex['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaex['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($fechareg>$filati['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filati['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($filaor['NRC']==$filaex['NRC']){if($filaex==$filati['NRC']){ 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filaor['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filaor['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaor!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaor['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaor['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaex!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaex['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaex['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }} }}} }}}
////////ORDINARIO Y TITULO/////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($queryor!=""){if($queryex==""){if($queryti!=""){ 
    while ($filaor = mysql_fetch_array($queryor)) { 
    while ($filati = mysql_fetch_array($queryti)) {
        $fechareg = date("Y-m-d");
        if($fechareg>$filaor['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaor['idHorario'].";")or die(mysql_error());
            mysql_close();
        }

        if($fechareg>$filati['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filati['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
       if($filaex==$filati['NRC']){ 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filaor['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filaor['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaor!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaor['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaor['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filati!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filati['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filati['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filati['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filati['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }} }}} }
/////////EXTRA Y TITULO////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($queryor==""){if($queryex!=""){if($queryti!=""){ 
    while ($filaex = mysql_fetch_array($queryex)) {
    while ($filati = mysql_fetch_array($queryti)) {
        $fechareg = date("Y-m-d");
        if($fechareg>$filaex['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaex['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($fechareg>$filati['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filati['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
        if($filaex==$filati['NRC']){ 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filaex['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filaex['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaex!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaex['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaex['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filati!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filati['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filati['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filati['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filati['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
////////TITULO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }} }}} }
if($queryor==""){if($queryex==""){if($queryti!=""){ 
    while ($filati = mysql_fetch_array($queryti)) {
        $fechareg = date("Y-m-d");
        if($fechareg>$filati['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filati['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filati['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filati['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filati!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filati['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filati['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filati['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filati['acta']."</p></td>";
                echo "</tr>";
            }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////EXTRAORDINARIO/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }} }}
if($queryor==""){if($queryex!=""){if($queryti==""){ 
    while ($filaex = mysql_fetch_array($queryex)) {
        $fechareg = date("Y-m-d");
        if($fechareg>$filaex['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaex['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filaex['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filaex['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaex!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaex['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaex['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaex['acta']."</p></td>";
                echo "</tr>";
             }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }}}}
/////////ORDINARIO////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($queryor!=""){if($queryex==""){if($queryti==""){ 
    while ($filaor = mysql_fetch_array($queryor)) { 
        $fechareg = date("Y-m-d");
        if($fechareg>$filaor['fechavig']){
            @require_once("../conexiones/conexion.php");
            $res=mysql_query("DELETE from horario where idHorario=".$filaor['idHorario'].";")or die(mysql_error());
            mysql_close();
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<table class='CSSTableGenerator'>";
            echo "<tr>";
            echo "<th><p class='xxxxx'>Experiencia</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultama="SELECT nombre FROM ExperienciaEducativa WHERE idExperienciaEducativa = ".$filaor['idExperienciaEducativa']."";
            $resultadoma = mysql_query($consultama);
            $filam = mysql_fetch_array($resultadoma, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filam['nombre']."</p></td>";
            echo "<th><p class='xxxxx'>Catedrático</p></th>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $consultaca="SELECT nombre, apellidomaterno, apellidopaterno FROM catedratico WHERE idCatedratico=".$filaor['idCatedratico']." ";
            $resultadoca = mysql_query($consultaca);
            $filaca = mysql_fetch_array($resultadoca, MYSQL_BOTH);
            echo"<td><p class='xxx'>".$filaca['nombre']." ";
            echo " ";
            echo "".$filaca['apellidopaterno']."";
            echo " ";
            echo "".$filaca['apellidomaterno']."</p></td>";
            echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($filaor!=""){
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora</p></th>";
                echo "<th><p class='xxxxx'>Lugar</p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta</p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>".$filaor['dia']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['horain']."</p></td>";
                $consultaubi="SELECT * FROM ubicacion WHERE idubicacion=".$filaor['idubicaicon']." ";
                $resultadoca = mysql_query($consultaubi);
                $filaubica = mysql_fetch_array($resultadoca, MYSQL_BOTH);
                echo"<td><p class='xxx'>".$flaubica['nombre']."</p></td>";
                echo"<td><p class='xxx'>".$filaor['acta']."</p></td>";
                echo "</tr>";
             }else{
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Ordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
            }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Extraordinario</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo"<tr>";
                echo "<th><p class='xxxxx'>Fecha Título</p></th>";
                echo "<th><p class='xxxxx'>Hora </p></th>";
                echo "<th><p class='xxxxx'>Lugar </p></th>";
                echo "<th><p class='xxxxx'>Entrega de Acta </p></th>";
                echo"</tr>";
                echo "<tr>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo"<td><p class='xxx'>---</p></td>";
                echo "</tr>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo"</table>";
            echo "<br>";
            $var=$var+1;
                }}}}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($var==0) {
              
              echo "<img src='../../imagenes/nohorarios.png'>";
             
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        echo "</div>";

?>