<?php
require "functions/conexion.php";
setcookie("error", "", time()-1000000);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
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
            require "functions/comprobarSesion.php";
            setcookie("pinguinolandia", $_SERVER["REQUEST_URI"]);
            insertar_visita(8, $_SESSION["IdUser"], $conexion);
            require "inc/menuA.php";
        }

        ?>
        <div class="contenedor">
            <article class="grid-container">
                <div class="grid-x align-center">
                    <div class="cell medium-8">
                        <div class="blog-post">
                            <h2>Sobre nosotros</h2>
                            <img class="thumbnail" src="res/img/noticia1.jpg">
                            <p>
                                Somos una asociacion que queremos favorecer el apadrinamiento de pingüinos, y a la vez brindarles todo nuestro apoyo y visibilidad. <br>
                                Esta pagina web ha sido desarrollada por Daniel Marchena Jimenez y Álvaro Manuel Martínez Molina.
                            </p>
                        </div>
                    </div>
                </div>
            </article>
            
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