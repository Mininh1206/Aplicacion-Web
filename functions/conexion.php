<?php

$host ="localhost";
$usuario = "root";
$contraseña = "";
$bd = "actividadphp";
//Crea una conexion con los parametros
$conexion = mysqli_connect($host, $usuario,$contraseña,$bd);

session_start();

function insertar_visita($idPag,$idUser,$conexion){
    $fecha = date('Y-m-d', time());
    $hora= date('H:i:s', time());

    mysqli_query($conexion,"INSERT INTO visita (IdPag, IdUser, FechaVis, HoraVis) VALUES ($idPag, $idUser, '$fecha', '$hora')");
    
}

/*Descomentar para comprobar si se ha conectado correctamente a la base de datos
if($conexion){
    echo "Conectada";
}else{
    echo "Desconectada";
}
*/
?>