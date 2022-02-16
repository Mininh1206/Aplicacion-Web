<?php
$consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE IdUser={$_SESSION["IdUser"]}");
//Paso el resultado de la consulta a un array
$array = mysqli_fetch_array($consulta);

$_SESSION["Nombre"] = $array["Nombre"];
$_SESSION["Username"] = $array["Username"];
$_SESSION["Password"] = $array["Password"];
$_SESSION["Sexo"] = $array["Sexo"];
$_SESSION["FechaNac"] = $array["FechaNac"];
$_SESSION["Avatar"] = $array["Avatar"];
$_SESSION["IdSus"] = $array["IdSus"];
echo "<script>

            window.location.replace('https://proyecto-pinguinos.000webhostapp.com/perfil.php');

            </script>";
?>