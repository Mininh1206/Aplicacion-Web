<?php

require "conexion.php";

mysqli_query($conexion, "INSERT INTO ayuda (Nombre, Email, Mensaje) VALUES ('{$_GET["nombre"]}', '{$_GET["email"]}', '{$_GET["mensaje"]}')");

header("location: ../about.php");

?>