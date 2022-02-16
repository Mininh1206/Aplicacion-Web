<?php

require_once "conexion.php";

mysqli_query($conexion, "INSERT INTO ayuda (Nombre, Email, Mensaje) VALUES ('{$_GET["nombre"]}', '{$_GET["email"]}', '{$_GET["mensaje"]}')");

//header("location: ../about.php");
echo "<script>
window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/about.php');
</script>";
die();

?>