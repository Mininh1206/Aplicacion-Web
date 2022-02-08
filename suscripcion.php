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

    function cambiarSus($id, $idUser, $conexion)
    {
        $query = "update usuario set IdSus=$id where IdUser=$idUser";
        mysqli_query($conexion, $query);
    }

    require "inc/head.html";
    ?>

    <link rel="stylesheet" href="css/suscripcion.css">
</head>

<body>
    <div class="fondo">

        <?php
        require "inc/menuA.html";

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
                        <Seleccionar href='#' class='button' onclick='" . cambiarSus($row['IdSus'], $idUser, $conexion) . "'>Seleccionar</a>
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