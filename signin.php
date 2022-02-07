<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "inc/head.html";
    ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="fondo">
        <?php
        include "inc/menu.html";
        ?>
        <div class="contenedor">
            <form class="log-in-form" method="POST" action="functions/signin.php">
                <h4 class="text-center">Resgistrate</h4>
                <label>Nombre
                    <input type="text" placeholder="Usuario" name="Nombre">
                </label>
                <label>Usuario
                    <input type="text" placeholder="Usuario" name="usuario">
                </label>
                <label>Contraseña
                    <input type="password" placeholder="Contraseña" name="contrasena">
                </label>
                <label>Repite la contraseña
                    <input type="password" placeholder="Contraseña" name="contrasena2">
                </label>
                <div class="grid-x grid-padding-x">
                    <fieldset class="mediun-5 cell">
                        <legend>Choose Your Favorite</legend>
                        <input type="radio" name="sexo" value="mujer" id="mujer"><label for="mujer">Mujer</label>
                        <input type="radio" name="sexo" value="hombre" id="hombre"><label for="hombre">Hombre</label>
                        <input type="radio" name="sexo" value="otro" id="otro"><label for="otro">Otro</label>
                    </fieldset>
                </div>
               <p><input type="submit" class="button expanded" value="Sign in"></input></p>
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