<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "functions/conexion.php";

    if (isset($_SESSION["IdUser"])) {
        header("location: index.php");
    }

    require "inc/head.html";
    ?>
    <link rel="stylesheet" href="css/login.css">
    <script src='https://www.google.com/recaptcha/api.js?render=6LdjI2seAAAAANHr5RKPZ2ycI9l3-wugm1qr-XHI'>
    </script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdjI2seAAAAANHr5RKPZ2ycI9l3-wugm1qr-XHI', {
                    action: 'ejemplo'
                })
                .then(function(token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
        });
    </script>
</head>

<body>

    <div class="fondo">

        <?php
        include "inc/menu.html";
        ?>

        <div class="contenedor">
            <form class="log-in-form" method="POST" action="functions/login.php">
                <h4 class="text-center">Inicia sesión con tu usuario</h4>
                <label>Usuario
                    <input type="text" placeholder="Usuario" name="usuario">
                </label>
                <label>Contraseña
                    <input type="password" placeholder="Contraseña" name="contrasena">
                </label>
                <input id="show-password" type="checkbox"><label for="show-passwor">Mostrar contraseña</label>
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                <p><input type="submit" class="button expanded" value="Iniciar sesión"></input></p>
                <p class="text-center"><a href="signin.php">¿No tienes cuenta aun?</a></p>
            </form>
        </div>
    </div>


    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>