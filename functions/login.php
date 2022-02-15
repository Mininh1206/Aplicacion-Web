<?php
require 'conexion.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//Hacemos la consulta y la ejecutamos
$query = "SELECT * FROM usuario WHERE Username = '$usuario' and Password = '$contrasena' ";
$consulta = mysqli_query($conexion, $query);
//Paso el resultado de la consulta a un array
$array = mysqli_fetch_array($consulta);
//Si encuentra algun resultado crea la sesion con el numero de usuario y cambia de pagina
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
$recaptcha_secret = '6LdjI2seAAAAADfUwAPrFqnPYJTep4vTsnGdjBXa'; 
$recaptcha_response = $_POST['recaptcha_response']; 
$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
$recaptcha = json_decode($recaptcha); 
if($recaptcha->score >= 0.7){
    if(isset($array[0])){
        $_SESSION["IdUser"] = $array["IdUser"];
        $_SESSION["Nombre"] = $array["Nombre"];
        $_SESSION["Username"] = $array["Username"];
        $_SESSION["Password"] = $array["Password"];
        $_SESSION["Sexo"] = $array["Sexo"];
        $_SESSION["FechaNac"] = $array["FechaNac"];
        $_SESSION["Avatar"] = $array["Avatar"];
        $_SESSION["IdSus"] = $array["IdSus"];
        $_SESSION["Inactivo"] = time();
        if(isset($_COOKIE["pinguinolandia"])){//Si existe
            header("location: {$_COOKIE["pinguinolandia"]}");
        }else{
            setcookie("pinguinolandia", "../index.php", time() + (60 * 60 * 24 * 365), "/");//Por un año
            header("location: ../index.php");
        }
       
       
        
    }else{
        header("location: ../login.php");
    }
}else{
    header("location: ../login.php");
}


