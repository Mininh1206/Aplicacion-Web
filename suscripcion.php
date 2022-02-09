<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    require "functions/conexion.php";

    if (!isset($_SESSION["IdUser"])) {
        header("location: login.php");
    } else {
        $idUser = $_SESSION["IdUser"];
    }

    require "inc/head.html";
    ?>

    <link rel="stylesheet" href="css/suscripcion.css">
</head>

<body>
    <div class="fondo">

        <?php
        require "inc/menuA.php";

        ?>

        <div class="contenedor contenedor-cartas">

            <?php

            $query = "SELECT * FROM suscripcion";
            $resultado = mysqli_query($conexion, $query);

            while ($row = mysqli_fetch_assoc($resultado)) {
                echo
                "<div class='card-user-container'>
                    <div class='card-user-avatar'>
                        <img src='https://placehold.it/200x200' alt='' class='user-image'>
                    </div>
                    <div class='card-user-bio'>
                        <h4 style='color:var(--blanco)'>{$row['NombreSus']}</h4>
                        <p style='text-align:left; color:var(--blanco)'>{$row['Ventajas']}</p>
                    </div>
                    <div class='card-user-button'>
                        <form method='POST' action='functions/cambiarSus.php'>
                            <input type='hidden' name='idUser' value='$idUser'/>
                            <input type='hidden' name='idSus' value='{$row['IdSus']}'/>
                            <input type='submit' class='button' value='Seleccionar'></input>
                        </form>
                    </div>
                </div>";
            }

            ?>

        </div>
    </div>

    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>

</html>