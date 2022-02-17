<?php

require_once "conexion.php";

$_SESSION['Inactivo'] = time();
echo "<script>
window.location.replace('http://$_SERVER[HTTP_HOST]".$_COOKIE["pinguinolandia"]."');
</script>";
?>