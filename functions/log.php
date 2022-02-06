<?php
require 'conexion.php';
session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//Hacemos la consulta y la ejecutamos
$query = "SELECT COUNT(*) as result FROM usuario WHERE Username = '$usuario' and Password = '$contrasena' ";
$consulta = mysqli_query($conexion, $query);
//Paso el resultado de la consulta a un array
$array = mysqli_fetch_array($consulta);
//Si encuentra algun resultado crea la sesion con el numero de usuario y cambia de pagina
if($array['result']>0){
    $_SESSION["usuario"] = $usuario;
    header("location: ../prueba-sesion.php");
    
}else{
    //Datos incorrectos
    echo "Datos incorrectos";
}

?>