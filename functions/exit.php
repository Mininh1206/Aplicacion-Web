<?php
//ejecuta la sesion en la que estamos
session_start();
//destruye la sesion
session_destroy();
//header("location: login.php");
echo "<script>
window.location.replace('https://proyecto-pinguinos.000webhostapp.com/login.php');
</script>";
die();
?>