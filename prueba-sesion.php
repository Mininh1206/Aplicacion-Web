<?php
//Prueba de que funciona
session_start();
$usuario = $_SESSION["usuario"];
//Comprueba si hay una sesion iniciada si no es asi redirecciona al login para evitar el acceso si iniciar sesion
if(!isset($usuario)){
    header("location: login.php");
}else{
    echo "<h1>Inicio de sesion correcto $usuario <h1><br>" ;
//Prueba de cierre de sesion
    echo "<a href='controlador/exit.php'> Salir </a>";
}


?>