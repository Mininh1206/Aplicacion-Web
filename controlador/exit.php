<?php
//ejecuta la sesion en la que estamos
session_start();
//destruye la sesion
session_destroy();
header("location: ../login.php");
exit();
?>