<?php

$seg_inac = 50; // Segundos que si el usuario no hace nada, se lo considera incativo 
$bd_servidor = "localhost";
$bd_usuario = "root";
$bd_contrasenya = "";
$bd_bdname = "la10uniformes";
$con = @mysql_connect($bd_servidor, $bd_usuario, $bd_contrasenya);
$bd_conect = @mysql_select_db($bd_bdname, $con);
if (!$con || !$bd_conect) {
    exit('Servidor no disponible, disculpe las molestias.');
}
?>