<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conexion.php";

    $idSus = $_POST["idSus"];
    $idUser = $_POST["idUser"];

    if ($idUser!=1){
        $_SESSION["IdSus"]=$idSus;
        mysqli_query($conexion, "update usuario set IdSus=$idSus where IdUser=$idUser");
    }
    
    //header("location: ../index.php");
    echo "<script>
    window.location.replace('https://proyecto-pinguinos.000webhostapp.com/inicio.php');
    </script>";
    die();
}
?>