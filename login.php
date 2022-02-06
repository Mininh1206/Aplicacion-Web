<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "inc/head.html";
    ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
    include "inc/menu.html";
    ?>
    
    <form class="log-in-form" method="POST" action="functions/log.php">
        <h4 class="text-center">Log in with you email account</h4>
        <label>Usuario
            <input type="text" placeholder="Usuario" name="usuario">
        </label>
        <label>Contraseña
            <input type="password" placeholder="Contraseña" name="contrasena">
        </label>
        <input id="show-password" type="checkbox"><label for="show-passwor">Mostrar contraseña</label>
        <p><input type="submit" class="button expanded" value="Log in"></input></p>
        <p class="text-center"><a href="#">Forgot your password?</a></p>
    </form>


    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>