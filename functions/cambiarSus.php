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
    window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/inicio.php');
    </script>";
    die();
}
?>