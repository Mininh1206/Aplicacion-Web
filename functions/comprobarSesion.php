<?php

//Tiempo en segundos para dar vida a la sesión.
$inactivo = 600; //10min en este caso.
//Calculamos tiempo de vida inactivo.
$vida_session = time() - $_SESSION['Inactivo'];
//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
if ($vida_session > $inactivo) {
   require "exit.php";
} else {  // si no ha caducado la sesion, actualizamos
    $_SESSION['tiempo'] = time();
}
?>