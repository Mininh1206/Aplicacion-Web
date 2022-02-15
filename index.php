<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require "functions/conexion.php";

  require "inc/head.html";
  ?>
</head>

<body>

  <div class="fondo">
    <?php
    if (!isset($_SESSION["IdUser"])) {
      require "inc/menu.html";
    } else {
      setcookie("pinguinolandia",$_SERVER["REQUEST_URI"]);
      require "functions/comprobarSesion.php";
      require "inc/menuA.php";
      insertar_visita(1,$_SESSION["IdUser"],$conexion);
     
    }
    
    ?>
    
    <div class="contenedor">
      <div class="row" id="content">
        <div class="medium-8 columns">
          <div class="blog-post">
            <h3>El conservacionista que estudia a los pingüinos para salvarlos de la extinción <small>14/02/2022</small></h3>
            <img class="thumbnail" src="res/img/noticia3.jpg">
            <p>Pablo García Borboroglu lleva tres décadas investigando a estas aves marinas en Argentina, Chile y Nueva Zelanda, además de impulsar un programa educativo para protegerlas. Su impulso le ha valido ser uno de los laureados de los Premios Rolex a la Iniciativa 2019.</p>
            <div class="callout">
              <ul class="menu simple">
                <li><a href="#">Autor: Álvaro Manuel Martínez Molina</a></li>
              </ul>
            </div>
          </div>
          <div class="blog-post">
            <h3>Los cambios en el hielo alteran las colonias de pingüinos<small>12/02/2022</small></h3>
            <img class="thumbnail" src="res/img/noticia2.jpg">
            <p>Un estudio publicado este miércoles en Science Advances sobre el seguimiento de 175 pingüinos de Adelia (Pygoscelis adeliae) a lo largo de cuatro veranos (la época de reproducción coincide con meses estivales en la Antártida, entre diciembre y enero) concluye que estos animales ahorran energía al buscar comida y los pequeños se desarrollan más rápido cuando la cantidad de hielo marino disminuye o desaparece, un fenómeno inusual que ocurre cada 10 años y que se ha registrado por última vez entre 2016 y 2017.</p>
            <div class="callout">
              <ul class="menu simple">
                <li><a href="#">Autor: Daniel Marchena Jimenez</a></li>
              </ul>
            </div>
          </div>
          <div class="blog-post">
            <h3>Dos pingüinos macho roban un huevo en un zoo holandés para incubarlo <small>11/02/2022</small></h3>
            <img class="thumbnail" src="res/img/noticia1.jpg">
            <p>Amor de padres, en versión de pingüinos macho. Las relaciones entre estas aves marinas del mismo sexo ocurren en la naturaleza, pero en un zoo, donde sus vidas están controladas, es mucho más difícil llegar hasta el extremo de hacerse con un huevo para tener una cría. En un despiste de los cuidadores, lo han conseguido dos ejemplares del parque de animales DierenPark Amersfoort (en el centro del país). Se lo quitaron a una pareja heterosexual y ahora hacen turnos para incubarlo.</p>
            <div class="callout">
              <ul class="menu simple">
                <li><a href="#">Autor: Álvaro Manuel Martínez Molina</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="medium-3 columns" data-sticky-container>
          <div class="sticky" data-sticky data-anchor="content">
            <h4>Autores</h4>
            <ul>
              <li><a href="#">Álvaro Manuel</a></li>
              <li><a href="#">Daniel</a></li>
            </ul>
          </div>
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

</html>