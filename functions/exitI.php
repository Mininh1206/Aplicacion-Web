<?php
//ejecuta la sesion en la que estamos
session_start();
//destruye la sesion
session_destroy();
//header("location: login.php");
setcookie("Modo","por inactividad",time() + (60 * 60 * 24 * 365), "/");
echo "<script>
window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/login.php');
</script>";
die();
?>