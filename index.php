<?php
require_once "functions/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once "inc/head.html";
  ?>
</head>

<body>

  <div class="fondo">
    <?php
    if (!isset($_SESSION["IdUser"])) {
      require_once "inc/menu.html";
    } else {
      header("location: inicio.php");
    }

    ?>

    <div class="contenedor">
      <h1 style="text-align: center;">Bienvenido</h1>
      <hr>
      <article class="grid-container">
        <div class="grid-x grid-margin-x">
          <div class="medium-6 cell small-order-2 medium-order-1">
            <h2>Proyecto Pingüino</h2>
            <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam porttitor mauris, quis sollicitudin sapien justo in libero. Vestibulum mollis mauris enim. Morbi euismod magna ac lorem rutrum elementum. Donec viverra auctor.</p>
          </div>
          <div class="medium-6 cell small-order-1 medium-order-2">
            <img class="thumbnail" src="res/img/pinguinos-inicio.png">
          </div>
        </div>
      </article>
    </div>
  </div>
  <?php
  require_once "inc/footer.html";
  ?>

  <script src="js/vendor/jquery-2.1.4.min.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>

</html>