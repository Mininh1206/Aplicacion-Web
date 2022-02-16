<?php
//ejecuta la sesion en la que estamos
session_start();
//destruye la sesion
session_destroy();
//header("location: login.php");
echo "<script>
window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/login.php');
</script>";
die();
?>