<?php

//Tiempo en segundos para dar vida a la sesión.
$inactivo = 600; //10min en este caso.
//Calculamos tiempo de vida inactivo.
$vida_session = time() - $_SESSION['Inactivo'];
//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
if ($vida_session > $inactivo) {
    ?>
    <script>
        if (confirm("Ha estado 10 minutos inactivo. ¿Quiere expandir la sesión?")){
            window.location.replace("functions/expandirSesion.php");
        } else{
            window.location.replace("functions/exitI.php");
        }
    </script>
<?php
} else {// si no ha caducado la sesion, actualizamos
    $_SESSION['Inactivo'] = time();
} 

?>