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
        window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/login.php');
        </script>";
        die();
    }else{
        setcookie("pinguinolandia",$_SERVER["REQUEST_URI"]);
        insertar_visita(6,$_SESSION["IdUser"],$conexion);
        require "functions/comprobarSesion.php";
    }

    require "inc/head.html";
    ?>
</head>

<body>

    <div class="fondo">
        <?php
        require "inc/menuA.php";


        $nombre = $_SESSION["Nombre"];
        $usuario = $_SESSION["Username"];
        $contrasena = $_SESSION["Password"];
        $fecha = $_SESSION["FechaNac"];
        $sexo = $_SESSION["Sexo"];
        $errorNombre = $errorUsuario = $errorContrasena = $errorContrasena2 = $errorFecha = $errorSexo = "";
        $valido = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["nombre"])) { // Si esta vacío salta error
                $errorNombre = "Escribe un nombre";
                $valido = false;
            } else {
                $nombre = formatear($_POST["nombre"]);
                // Revisa la integridad del texto
                if (!preg_match("/^[a-zA-Z-' ]{10}/", $nombre)) {
                    $errorNombre = "Minimo 10 caracteres";
                    $valido = false;
                }
            }

            if (empty($_POST["usuario"])) { // Si esta vacío salta error
                $errorUsuario = "Escribe un usuario";
                $valido = false;
            } else {
                $usuario = formatear($_POST["usuario"]);
                // Revisa la integridad del texto
                if (!preg_match("/([A-Z+ a-z+ 0-9]{8})/", $usuario)) {
                    $errorUsuario = "Minimo 8 caracteres";
                    $valido = false;
                }
            }

            if (empty($_POST["contrasena"])) { // Si esta vacío salta error
                $errorContrasena = "Escribe una contraseña";
                $valido = false;
            } else {
                $contrasena = formatear($_POST["contrasena"]);
                // Revisa la integridad del texto
                if (!validaClave($contrasena)) {
                    $errorContrasena = "Mínimo 8 caracteres. Al menos una letra mayúscula y un número. $contrasena";
                    $valido = false;
                }
            }

            if (empty($_POST["fecha"])) { // Si esta vacío salta error
                $errorFecha = "Selecciona una fecha";
                $valido = false;
            } else {
                $fecha_actual = strtotime(date("d-m-Y"));
                $fecha_entrada = strtotime($_POST["fecha"] . "+ 16 year");
                if ($fecha_actual < $fecha_entrada) {
                    $errorFecha = "La edad minima son 16 años.";
                    $valido = false;
                }
                $fecha = $_POST["fecha"];
            }

            if (empty($_POST["sexo"])) { // Si esta vacío salta error
                $errorSexo = "Selecciona un sexo";
                $valido = false;
            } else {
                $sexo = $_POST["sexo"];
            }


            if ($_FILES['myImage']['name'] != null) {
                $check = getimagesize($_FILES["myImage"]["tmp_name"]);
                if ($check !== false) {
                    $image = $_FILES['myImage']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                }
            } else {
                if ($valido && !empty($_POST["sexo"])) {
                    unset($imgContent);
                }
            }


            if ($valido) {
                
                    if ($_SESSION["IdUser"]!=1) {
                        if (isset($imgContent)){
                            mysqli_query($conexion, "UPDATE usuario SET Nombre='$nombre', Username='$usuario', Password='$contrasena', FechaNac='$fecha', Sexo=$sexo, Avatar='$imgContent' WHERE IdUser={$_SESSION['IdUser']}");
                        } else{
                            mysqli_query($conexion, "UPDATE usuario SET Nombre='$nombre', Username='$usuario', Password='$contrasena', FechaNac='$fecha', Sexo=$sexo WHERE IdUser={$_SESSION['IdUser']}");
                        }
                        require_once "functions/refrescarSesion.php";
                    }
            }
        }


        function formatear($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function validaClave($clave)
        {
            if (strlen($clave) < 8) {
                return false;
            }
            if (strlen($clave) > 30) {
                return false;
            }
            if (!preg_match('`[A-Z]`', $clave)) {
                return false;
            }
            if (!preg_match('`[0-9]`', $clave)) {

                return false;
            }
            return true;
        }


        ?>
        <div class="contenedor">

            <div class="perfil">

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                    <label for="nombre">Nombre:
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
                        <span class="error"><?php echo $errorNombre; ?></span>
                    </label>

                    <label for="usuario">Usuario:
                        <input type="text" name="usuario" value="<?php echo $usuario; ?>">
                        <span class="error"><?php echo $errorUsuario; ?></span>
                    </label>
                    <label for="contrasena">Contraseña:
                        <input type="text" name="contrasena" value="<?php echo $contrasena; ?>">
                        <span class="error"><?php echo $errorContrasena; ?></span>
                    </label>
                    <label for="fecha">Fecha de nacimiento:
                        <input type="date" name="fecha" value="<?php echo $fecha; ?>">
                        <span class="error"><?php echo $errorFecha; ?></span>
                    </label>

                    <label>
                        <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "2" || $sexo == "Mujer") echo "checked"; ?> value="2" id="Mujer"><label for="Mujer">Mujer</label>
                        <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "1" || $sexo == "Hombre") echo "checked"; ?> value="1" id="Hombre"><label for="Hombre">Hombre</label>
                        <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "3" || $sexo == "Otro") echo "checked"; ?> value="3" id="Otro"><label for="Otro">Otro</label>
                        <span class="error"><?php echo $errorSexo; ?></span>
                    </label>

                    <div class="imagenPerfil">
                        <img class="avatarPerfil" src="data:image/*;base64, <?php echo base64_encode($_SESSION['Avatar']); ?>">

                        <input type="file" name="myImage" accept="image/*" />
                    </div>

                    <p><input type="submit" class="button" value="Guardar cambios"></input></p>

                </form>


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