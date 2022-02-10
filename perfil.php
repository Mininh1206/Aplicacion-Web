<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require "functions/conexion.php";

    if (!isset($_SESSION["IdUser"])) {
        header("location: login.php");
    }

    require "inc/head.html";
    ?>
</head>
<body>

    <div class="fondo">
        <?php
        require "inc/menuA.php";
        ?>
        <div class="contenedor">
            
        </div>
    </div>
    

    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>
</html>