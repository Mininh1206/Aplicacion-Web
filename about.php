<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "functions/conexion.php";

    require "inc/head.html";

    ?>

    <link rel="stylesheet" href="css/about.css">
</head>

<body>

    <div class="fondo">
        <?php
        if (!isset($_SESSION["IdUser"])) {
            require "inc/menu.html";
        } else {
            setcookie("pinguinolandia", $_SERVER["REQUEST_URI"]);
            require "inc/menuA.php";
            insertar_visita(8, $_SESSION["IdUser"], $conexion);
        }

        ?>
        <div class="contenedor">

        </div>
    </div>

    <div class="contact-panel" id="contact-panel" data-toggler=".is-active">
        <a class="contact-panel-button" data-toggle="contact-panel">Contact us</a>
        <form method="GET" action="functions/mensajeAyuda.php">
            <div class="row">
                <label>Nombre completo:
                    <input type="text" placeholder="Nombre completo" name="nombre">
                </label>
            </div>
            <div class="row">
                <label>Email:
                    <input type="email" placeholder="Email" name="email">
                </label>
            </div>
            <div class="row">
                <label>Mensaje:
                    <textarea placeholder="Escribe lo que necesites..." rows="3" name="mensaje"></textarea>
                </label>
            </div>
            <div class="contact-panel-actions">
                <button class="cancel-button" data-toggle="contact-panel">Cancelar</button>
                <input type="submit" class="button submit-button" value="Enviar">
            </div>
        </form>
    </div>

    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
        // closes the panel on click outside
        $(document).mouseup(function(e) {
            var container = $('#contact-panel');
            if (!container.is(e.target) // if the target of the click isn't the container...
                &&
                container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                container.removeClass('is-active');
            }
        });
    </script>


</body>

</html>