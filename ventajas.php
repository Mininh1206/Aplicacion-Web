<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "functions/conexion.php";

    if (!isset($_SESSION["IdUser"])) {
        header("location: login.php");
    } else {
        $idSus = $_SESSION["IdSus"];
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

            <div class="row">
                <div class="medium-6 columns medium-push-6">
                    <img class="thumbnail" src="https://placehold.it/750x350">
                </div>
                <?php
                $ventajas =  explode("<br>", $resultado["Ventajas"]);
                $nombre_ventajas = array("apadrina pingüino.", " de seguimiento.", "elige como donas.");
                $num_ventaja = 0;
                foreach ($ventajas as $ventaja) {
                    echo "<div class='medium-6 columns medium-pull-6'>
                        <h3>Ventaja $nombre_ventajas[$num_ventaja]</h3>
                        <p>$ventaja sdfgfsdgfdfgdrgdfkgjdfkgkdfgkjdfsdfgffddffdsgdghfghdfkñghlgjlghjlfgjdlfgjdlkfgjdlkfgjdlkfgjdkljfgdkljfgdkljfgdkljfgdl</p>
                    </div>";
                    $num_ventaja++;
                }
                echo " </div>";
                ?>
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