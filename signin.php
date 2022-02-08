<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "inc/head.html";
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
        $valido = false;


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
            if (empty($_POST["contrasena"])||empty($_POST["contrasena2"])) { // Si esta vacío salta error
                $errorContrasena = "Escribe una contraseña";
                $valido = false;
            } else {
                $contrasena = formatear($_POST["contrasena"]);
                $contrasena2 = formatear($_POST["contrasena2"]);
                // Revisa la integridad del texto
                if($contrasena != $contrasena2){
                    $errorContrasena2 = "Asegurate de que la dos contraseñas conicidan";
                    $valido = false;
                } 
                if (!validarContraseña($contrasena)) {
                    $errorContrasena = "Mínimo 8 caracteres. Al menos una letra mayúscula y un número.";
                    $valido = false;
                }
            }
            if (empty($_POST["fecha"])) { // Si esta vacío salta error
                $errorFecha = "Selecciona una fecha";
                $valido = false;
            } else {
                $fecha_actual = strtotime(date("d-m-Y"));
                $fecha_entrada = strtotime($_POST["fecha"]."+ 16 year" );
                echo $fecha_entrada." ".$fecha_actual;
                if ($fecha_actual < $fecha_entrada) {
                    $errorFecha = "La edad minima son 16 años.";
                    $valido = false;
                }
                
                $fecha = $_POST["fecha"];
            }
            if($valido){
                //inserccion SQL

            }

        }

        function validarContraseña($password, $min_len = 8, $max_len = 70, $req_digit = 1, $req_lower = 0, $req_upper = 1, $req_symbol = 0) {
            // Build regex string depending on requirements for the password
            $regex = '/^';
            if ($req_digit == 1) { $regex .= '(?=.*d)'; }              // Match at least 1 digit
            if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; }           // Match at least 1 lowercase letter
            if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; }           // Match at least 1 uppercase letter
            if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Zd])'; }    // Match at least 1 character that is none of the above
            $regex .= '.{' . $min_len . ',' . $max_len . '}$/';
        
            if(preg_match($regex, $password)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        function formatear($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
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
                    <input type="radio" name="sexo" value="mujer" id="mujer"><label for="mujer">Mujer</label>
                    <input type="radio" name="sexo" value="hombre" id="hombre"><label for="hombre">Hombre</label>
                    <input type="radio" name="sexo" value="otro" id="otro"><label for="otro">Otro</label>
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