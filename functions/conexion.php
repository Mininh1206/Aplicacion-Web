<?php

$host ="localhost";
$usuario = "root";
$contraseña = "";
$bd = "actividadphp";
//Crea una conexion con los parametros
$conexion = mysqli_connect($host, $usuario,$contraseña,$bd);

session_start();

/*Descomentar para comprobar si se ha conectado correctamente a la base de datos
if($conexion){
    echo "Conectada";
}else{
    echo "Desconectada";
}
*/
?>