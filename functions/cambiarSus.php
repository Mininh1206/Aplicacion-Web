<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "conexion.php";

    $idSus = $_POST["idSus"];
    $idUser = $_POST["idUser"];

    mysqli_query($conexion, "update usuario set IdSus=$idSus where IdUser=$idUser");
    header("location: ../index.php");
}
?>