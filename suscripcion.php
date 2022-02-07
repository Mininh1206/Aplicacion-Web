<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    require "functions/conexion.php";

    if (!isset($_SESSION["IdUser"])) {
        header("location: login.php");
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
        require "inc/menu.html";
        ?>

        <div class="contenedor contenedor-cartas">

            <div class="card-user-container">
                <div class="card-user-avatar">
                    <img src="https://placehold.it/200x200" alt="" class="user-image">
                </div>
                <div class="card-user-bio">
                    <h4>User Name</h4>
                    <p>UX/UI ,Front-end developer, Foundation interested. </p>
                    <span class="location"><span class="location-icon fa fa-map-marker"></span><span class="location-text">Makkah Al-Mukaramah</span></span>
                </div>
                <div class="card-user-button">
                    <a href="#" class="hollow button">Seleccionar</a>
                </div>
            </div>


            <div class="card-user-container">
                <div class="card-user-avatar">
                    <img src="https://placehold.it/200x200" alt="" class="user-image">
                </div>
                <div class="card-user-bio">
                    <h4>User Name</h4>
                    <p>UX/UI ,Front-end developer, Foundation interested. </p>
                    <span class="location"><span class="location-icon fa fa-map-marker"></span><span class="location-text">Makkah Al-Mukaramah</span></span>
                </div>
                <div class="card-user-button">
                    <a href="#" class="hollow button">Seleccionar</a>
                </div>
            </div>


            <div class="card-user-container">
                <div class="card-user-avatar">
                    <img src="https://placehold.it/200x200" alt="" class="user-image">
                </div>
                <div class="card-user-bio">
                    <h4>User Name</h4>
                    <p>UX/UI ,Front-end developer, Foundation interested. </p>
                    <span class="location"><span class="location-icon fa fa-map-marker"></span><span class="location-text">Makkah Al-Mukaramah</span></span>
                </div>
                <div class="card-user-button">
                    <a href="#" class="hollow button">Seleccionar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>

</html>