<?php

require_once "conexion.php";

mysqli_query($conexion, "INSERT INTO ayuda (Nombre, Email, Mensaje) VALUES ('{$_GET["nombre"]}', '{$_GET["email"]}', '{$_GET["mensaje"]}')");

//header("location: ../about.php");
echo "<script>
window.location.replace('https://proyecto-pinguinos.000webhostapp.com/about.php');
</script>";
die();

?>