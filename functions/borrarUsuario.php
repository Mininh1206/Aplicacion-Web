<?php

require_once "conexion.php";

$idUser = $_SESSION["IdUser"];

if ($idUser!=1){
    mysqli_query($conexion, "DELETE FROM usuario WHERE IdUser=$idUser");
}

require "exit.php";

?>