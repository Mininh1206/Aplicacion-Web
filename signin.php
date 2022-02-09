<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "inc/head.html";
    require "functions/conexion.php"
    ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="fondo">
        <?php
        include "inc/menu.html";

        $nombre = $usuario = $contrasena = $contrasena2 = $fecha = $sexo = "";
        $errorNombre = $errorUsuario = $errorContrasena = $errorContrasena2 = $errorFecha = $errorSexo = "";
        $valido = true;
        $imagen = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["nombre"])) { // Si esta vacío salta error
                $errorNombre = "Escribe un nombre";
                $valido = false;
            } else {
                $nombre = formatear($_POST["nombre"]);
                // Revisa la integridad del texto
                if (!preg_match("/^[a-zA-Z-' ]{10,}/", $nombre)) {
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
                    $errorFecha = "La edad minima son 16 años.";
                    $valido = false;
                }
                $fecha = $_POST["fecha"];
            }

                try{
                    $check = getimagesize($_FILES["myImage"]["tmp_name"]);   
                    if ($check !== false) {
                        $image = $_FILES['myImage']['tmp_name'];
                        $imgContent = addslashes(file_get_contents($image));
                    }
                }catch (Exception){
                    $imagen=false;
                }
                
            
            
            $sexo = $_POST["sexo"];

            if ($valido) {
                //inserccion SQL
                if($imagen){
                    if (mysqli_query($conexion, "INSERT INTO usuario (Nombre, Username, Password, FechaNac, Avatar, Sexo) VALUES ('$nombre', '$usuario', '$contrasena', '$fecha', '$imgContent', $sexo)")) {
                        header("location: login.php");
                    } else {
                        $errorUsuario = "Usuario duplicado";
                    }
                }else{
                    if (mysqli_query($conexion, "INSERT INTO usuario (Nombre, Username, Password, FechaNac, Sexo) VALUES ('$nombre', '$usuario', '$contrasena', '$fecha', $sexo)")) {
                        header("location: login.php");
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
            if (strlen($clave) > 12) {
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
                <label>Nombre:
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
                    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "2") echo "checked"; ?> value="2" id="Mujer"><label for="Mujer">Mujer</label>
                    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "1") echo "checked"; ?> value="1" id="Hombre"><label for="Hombre">Hombre</label>
                    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo == "3") echo "checked"; ?> value="3" id="Otro"><label for="Otro">Otro</label>
                    <label>Foto de perfil:
                        <input type="file" name="myImage" accept="image/*" />
                    </label>
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