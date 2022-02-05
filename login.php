<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "inc/head.html";
    ?>
    <title>Log in</title>
</head>

<body>
    <?php
    include "inc/menu.html";
    ?>
    <div style="margin: 5vh 35vw 0vh 35vw" class="aling-middle">
        <form action="controlador/log.php" method="POST" class="log-in-form" >
            <h4 class="text-center">Bienvenido</h4>
            <label>Usuario
                <input type="text" name="usuario" placeholder="Usuario">
            </label>
            <label>Password
                <input type="password" name="contrasena" placeholder="Contraseña">
            </label>
            <input id="show-password" type="checkbox"><label for="ver-contraseña">Ver la contraseña</label>
            <p><input type="submit" class="button expanded" value="Log in"></input></p>
        </form>
    </div>


    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>