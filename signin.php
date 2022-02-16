<?php
require "functions/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "inc/head.html";
    if (isset($_SESSION["IdUser"])) {
        //header("location: index.php");
        echo "<script>
        window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/index.php');
        </script>";
        die();
    }


    ?>
    <link rel="stylesheet" href="css/login.css">
    <script src='https://www.google.com/recaptcha/api.js?render=6LdjI2seAAAAANHr5RKPZ2ycI9l3-wugm1qr-XHI'>
    </script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdjI2seAAAAANHr5RKPZ2ycI9l3-wugm1qr-XHI', {
                    action: 'ejemplo'
                })
                .then(function(token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
        });
    </script>
</head>

<body>
    <div class="fondo">
        <?php
        require "inc/menu.html";

        $nombre = $usuario = $contrasena = $contrasena2 = $fecha = $sexo = "";
        $errorNombre = $errorUsuario = $errorContrasena = $errorContrasena2 = $errorFecha = $errorSexo = "";
        $valido = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["nombre"])) { // Si esta vacío salta error
                $errorNombre = "Escribe un nombre";
                $valido = false;
            } else {
                $nombre = formatear($_POST["nombre"]);
                // Revisa la integridad del texto
                if (!preg_match("/^[A-ZÑÁÉÍÓÚÄËÏÖÜÀÈÌÔÙ][A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ ]{10,}$/", $nombre)) {
                    $errorNombre = "Minimo 10 caracteres sin símbolos ni números";
                    $valido = false;
                }
            }

            if (empty($_POST["usuario"])) { // Si esta vacío salta error
                $errorUsuario = "Escribe un usuario";
                $valido = false;
            } else {
                $usuario = formatear($_POST["usuario"]);
                // Revisa la integridad del texto
                if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ][A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ0-9 ]{8,}$/", $usuario)) {
                    $errorUsuario = "Minimo 8 caracteres sin símbolos";
                    $valido = false;
                }
            }

            if (empty($_POST["contrasena"]) || empty($_POST["contrasena2"])) { // Si esta vacío salta error
                $errorContrasena = "Escribe una contraseña";
                $valido = false;
            } else {
                $contrasena = formatear($_POST["contrasena"]);
                $contrasena2 = formatear($_POST["contrasena2"]);
                // Revisa la integridad del texto
                if ($contrasena != $contrasena2) {
                    $errorContrasena2 = "Asegurate de que la dos contraseñas conicidan";
                    $valido = false;
                } else if (!validaClave($contrasena)) {
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
                    $errorFecha = "La edad mínima son 16 años.";
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
                    if ($sexo == 2) {
                        $imgContent = addslashes(file_get_contents("res/img/usuario-mujer.png"));
                    } else {
                        $imgContent = addslashes(file_get_contents("res/img/usuario-hombre.png"));
                    }
                }
            }


            if ($valido) {
                $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                $recaptcha_secret = '6LdjI2seAAAAADfUwAPrFqnPYJTep4vTsnGdjBXa';
                $recaptcha_response = $_POST['recaptcha_response'];
                $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                $recaptcha = json_decode($recaptcha);
                if ($recaptcha->score >= 0.7) {
                    if (mysqli_query($conexion, "INSERT INTO `usuario` (`Nombre`, `Username`, `Password`, `Sexo`, `FechaNac`, `Avatar`, `IdSus`) VALUES ('$nombre', '$usuario', '$contrasena', '$sexo', '$fecha', '$imgContent', '0') ")) {
                        echo "<script>
                        window.location.replace('http://$_SERVER[HTTP_HOST]/actividadphp/login.php');
                        </script> ";
                    } else {
                        $errorUsuario = "Usuario duplicado";
                    }
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
            <form class="log-in-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <h4 class="text-center">Registrate</h4>
                <label>Nombre completo:
                    <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>">
                    <span class="error"><?php echo $errorNombre; ?></span>
                </label>
                <label>Usuario:
                    <input type="text" placeholder="Usuario" name="usuario" value="<?php echo $usuario; ?>">
                    <span class="error"><?php echo $errorUsuario; ?></span>
                </label>
                <label>Contraseña:
                    <input type="password" placeholder="Contraseña" name="contrasena" value="<?php echo $contrasena; ?>">
                    <span class="error"><?php echo $errorContrasena; ?></span>
                </label>
                <label>Repite la contraseña:
                    <input type="password" placeholder="Contraseña" name="contrasena2" value="<?php echo $contrasena2; ?>">
                    <span class="error"><?php echo $errorContrasena2; ?></span>
                </label>
                <label>Fecha de nacimiento:
                    <input type="date" name="fecha" value="<?php echo $fecha; ?>">
                    <span class="error"><?php echo $errorFecha; ?></span>
                </label>
                <label>Sexo:</lable> <br>
                    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "1") echo "checked"; ?> value="1" id="Hombre"><label for="Hombre">Hombre</label>
                    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "2") echo "checked"; ?> value="2" id="Mujer"><label for="Mujer">Mujer</label>
                    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "3") echo "checked"; ?> value="3" id="Otro"><label for="Otro">Otro</label>
                    <span class="error"><?php echo $errorSexo; ?></span>
                    <label>Foto de perfil:
                        <input type="file" name="myImage" accept="image/*" />
                    </label>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
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