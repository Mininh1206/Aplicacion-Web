<?php
require "functions/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    if (!isset($_SESSION["IdUser"])) {
        //header("location: login.php");
        echo "<script>
        window.location.replace('https://proyecto-pinguinos.000webhostapp.com/login.php');
        </script>";
        die();
    } else {
        $idSus = $_SESSION["IdSus"];
        if ($idSus > 0 || $idSus == -1) {
            setcookie("pinguinolandia", $_SERVER["REQUEST_URI"]);
            insertar_visita(5, $_SESSION["IdUser"], $conexion);
        } else {
            //header("location: suscripcion.php");
            echo "<script>
            window.location.replace('https://proyecto-pinguinos.000webhostapp.com/suscripcion.php');
            </script>";
            die();
        }
        require "functions/comprobarSesion.php";
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
            <?php
            if ($idSus == -1) {
                $consulta = mysqli_query($conexion, "SELECT * FROM suscripcion WHERE IdSus=3");
            } else {
                $consulta = mysqli_query($conexion, "SELECT * FROM suscripcion WHERE IdSus=$idSus");
            }
            $resultado = mysqli_fetch_assoc($consulta);
            /*<img class="thumbnail" src="data:image/*;base64, <?php echo base64_encode($resultado["Icono"]); ?>">
            
            https://antartida.defensa.gob.es/acceda/apadrinamiento
            */
            ?>

            <div class="contenedor_ventajas">
                <?php
                $ventajas =  explode("<br>", $resultado["Ventajas"]);
                $nombre_ventajas = array("apadrina pingüino.", " de seguimiento.", "elige como donas.");
                $num_ventaja = 0;
                foreach ($ventajas as $ventaja) {
                    echo " <div style='margin:0 0.9vw;'> <h3>Ventaja $nombre_ventajas[$num_ventaja]</h3>
                        <p>$ventaja</p> </div>";
                    $num_ventaja++;
                }
                ?>
            </div>

            <img class="thumbnail" style="display:block;margin: auto;" src="data:image/*;base64, <?php echo base64_encode($resultado['Icono']); ?>">
        </div>
    </div>
    <?php
    require "inc/footer.html";
    ?>



    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>